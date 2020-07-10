<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
* Modified ITALSIS NOV 14 2014
* Log: Replace _ with Camel Case
* Log: private p in prefix methods
*
*/

namespace proteccioncivil\db\driver;
chdir(dirname(__FILE__));
include_once("driver.php");
include_once("../../errorCollector.php");



/**
* PostgreSQL Database Abstraction Layer
* Minimum Requirement is Version 8.3+
*/
class postgres extends \proteccioncivil\db\driver\driver
{
	var $multiInsert = true;
	var $lastQueryText = '';
	var $connectError = '';

	/**
	* {@inheritDoc}
	*/
	function sqlConnect($sqlServer, $sqlUser, $sqlPassword, $database, $port = false, $persistency = false, $newLink = false)


	{
		$connectString = "connect_timeout = 20 ";

		if ($sqlUser)
		{
			$connectString .= "user=$sqlUser ";
		}

		if ($sqlPassword)
		{
			$connectString .= "password=$sqlPassword ";
		}

		if ($sqlServer)
		{
			// $sqlserver can carry a port separated by : for compatibility reasons
			// If $sqlserver has more than one : it's probably an IPv6 address.
			// In this case we only allow passing a port via the $port variable.
			if (substr_count($sqlServer, ':') === 1)
			{
				list($sqlServer, $port) = explode(':', $sqlServer);
			}

			if ($sqlServer !== 'localhost')
			{
				$connectString .= "host=$sqlServer ";
			}

			if ($port)
			{
				$connectString .= "port=$port ";
			}
		}

		$schema = '';

		if ($database)
		{
			$this->dbname = $database;
			if (strpos($database, '.') !== false)
			{
				list($database, $schema) = explode('.', $database);
			}
			$connectString .= "dbname=$database";
		}

		$this->persistency = $persistency;

		if ($this->persistency)
		{
			if (!function_exists('pg_pconnect'))
			{
				$this->connectError = 'ITALSIS proteccioncivil\db\driver\postgres: pg_pconnect function does not exist, is pgsql extension installed?';
				return $this->sqlError('');
			}
			$collector = new \proteccioncivil\errorCollector;
			$collector->install();
			$this->dbConnectId = (!$newLink) ? @pg_pconnect($connectString) : @pg_pconnect($connectString, PGSQL_CONNECT_FORCE_NEW);
		}
		else
		{
			if (!function_exists('pg_connect'))
			{
				$this->connectError = 'ITALSIS proteccioncivil\db\driver\postgres: pg_connect function does not exist, is pgsql extension installed?';
				return $this->sqlError('');
			}
			$collector = new \proteccioncivil\errorCollector;
			$collector->install();
			$this->dbConnectId = (!$newLink) ? @pg_connect($connectString) : @pg_connect($connectString, PGSQL_CONNECT_FORCE_NEW);
		}

		$collector->uninstall();

		if ($this->dbConnectId)
		{
			if ($schema !== '')
			{
				@pg_query($this->dbConnectId, 'SET search_path TO ' . $schema);
			}
			return $this->dbConnectId;
		}

		$this->connectError = $collector->formatErrors();
		return $this->sqlError('');
	}

	/**
	* {@inheritDoc}
	*/
	function sqlServerInfo($raw = false, $useCache = true)
	{
		global $cache;

		if (!$useCache || empty($cache) || ($this->sqlServerVersion = $cache->get('pgsqlVersion')) === false)
		{
			$queryId = @pg_query($this->dbConnectId, 'SELECT VERSION() AS version');
			$row = @pg_fetch_assoc($queryId, null);
			@pg_free_result($queryId);

			$this->sqlServerVersion = (!empty($row['version'])) ? trim(substr($row['version'], 10)) : 0;

			if (!empty($cache) && $useCache)
			{
				$cache->put('pgsqlVersion', $this->sqlServerVersion);
			}
		}

		return ($raw) ? $this->sqlServerVersion : 'PostgreSQL ' . $this->sqlServerVersion;
	}

	/**
	* SQL Transaction
	* @access private
	*/
	function psqlTransaction($status = 'begin')
	{
		switch ($status)
		{
			case 'begin':
				return @pg_query($this->dbConnectId, 'BEGIN');
			break;

			case 'commit':
				return @pg_query($this->dbConnectId, 'COMMIT');
			break;

			case 'rollback':
				return @pg_query($this->dbConnectId, 'ROLLBACK');
			break;
		}

		return true;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlQuery($query = '', $cacheTtl = 0)
	{
		if ($query != '')
		{
			global $cache;

			// EXPLAIN only in extra debug mode
			if (defined('DEBUG'))
			{
				$this->sqlReport('start', $query);
			}
			else if (defined('ITALSISDISPLAYLOADTIME'))
			{
				$this->curtime = microtime(true);
			}

			$this->lastQueryText = $query;
			$this->queryResult = ($cache && $cacheTtl) ? $cache->sqlLoad($query) : false;
			$this->sqlAddNumQueries($this->queryResult);

			if ($this->queryResult === false)
			{
				if (($this->queryResult = @pg_query($this->dbConnectId, $query)) === false)
				{
					// 11/16/2014 Error Management
					return $this->sqlError($query);
				}

				if (defined('DEBUG'))
				{
					$this->sqlReport('stop', $query);
				}
				else if (defined('ITALSISDISPLAYLOADTIME'))
				{
					$this->sqlTime += microtime(true) - $this->curTime;
				}

				if ($cache && $cacheTtl)
				{
					$this->openQueries[(int) $this->queryResult] = $this->queryResult;
					$this->queryResult = $cache->sqlSave($this, $query, $this->queryResult, $cacheTtl);
				}
				else if (strpos($query, 'SELECT') === 0 && $this->queryResult)
				{
					$this->openQueries[(int) $this->queryResult] = $this->queryResult;
				}
			}
			else if (defined('DEBUG'))
			{
				$this->sqlReport('fromcache', $query);
			}
		}
		else
		{
			return false;
		}

		return $this->queryResult;
	}

	/**
	* Build db-specific query data
	* @access private
	*/
	function psqlCustomBuild($stage, $data)
	{
		return $data;
	}

	/**
	* Build LIMIT query
	*/
	function psqlQueryLimit($query, $total, $offset = 0, $cacheTtl = 0)
	{
		$this->queryResult = false;

		// if $total is set to 0 we do not want to limit the number of rows
		if ($total == 0)
		{
			$total = 'ALL';
		}

		$query .= "\n LIMIT $total OFFSET $offset";

		return $this->sqlQuery($query, $cacheTtl);
	}

	/**
	* {@inheritDoc}
	*/
	function sqlAffectedRows()
	{
		print_r($this->queryResult);
		return ($this->queryResult) ? @pg_affected_rows($this->queryResult) : false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlFetchRow($queryId = false)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($cache && $cache->sqlExists($queryId))
		{
			return $cache->sqlFetchRow($queryId);
		}

		return ($queryId !== false) ? @pg_fetch_assoc($queryId, null) : false;
	}

	// 11/16/2014 Error Management
					
	function sqlError($query='') {
		return @pg_last_error();
	}

	/**
	* {@inheritDoc}
	*/
	function sqlRowSeek($rowNum, &$queryId)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($cache && $cache->sqlExists($queryId))
		{
			return $cache->sqlRowSeek($rowNum, $queryId);
		}

		return ($queryId !== false) ? @pg_result_seek($queryId, $rowNum) : false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlNextId()
	{
		$queryId = $this->queryResult;

		if ($queryId !== false && $this->lastQueryText != '')
		{
			if (preg_match("/^INSERT[\t\n ]+INTO[\t\n ]+([a-z0-9\_\-]+)/is", $this->lastQueryText, $tableName))
			{
				$query = "SELECT currval('" . $tableName[1] . "_seq') AS lastValue";
				$tempQId = @pg_query($this->dbConnectId, $query);

				if (!$tempQId)
				{
					return false;
				}

				$tempResult = @pg_fetch_assoc($tempQId, null);
				@pg_free_result($queryId);

				return ($tempResult) ? $tempResult['last_value'] : false;
			}
		}

		return false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlFreeResult($queryId = false)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($cache && !is_object($queryId) && $cache->sqlExists($queryId))
		{
			return $cache->sqlFreeResult($queryId);
		}

		if (isset($this->openQueries[(int) $queryId]))
		{
			unset($this->openQueries[(int) $queryId]);
			return @pg_free_result($queryId);
		}

		return false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlEscape($msg)
	{
		return @pg_escape_string($msg);
	}

	/**
	* Build LIKE expression
	* @access private
	*/
	function psqlLikeExpression($expression)
	{
		return $expression;
	}

	/**
	* Build NOT LIKE expression
	* @access private
	*/
	function psqlNotLikeExpression($expression)
	{
		return $expression;
	}

	/**
	* {@inheritDoc}
	*/
	function castExprToBigint($expression)
	{
		return 'CAST(' . $expression . ' as DECIMAL(255, 0))';
	}

	/**
	* {@inheritDoc}
	*/
	function castExprToString($expression)
	{
		return 'CAST(' . $expression . ' as VARCHAR(255))';
	}

	/**
	* return sql error array
	* 
	*/
	function psqlError()
	{
		// pg_last_error only works when there is an established connection.
		// Connection errors have to be tracked by us manually.
		if ($this->dbConnectId)
		{
			//$message = @pgLastError($this->dbConnectId);
			$message=@pg_last_error($this->dbConnectId);
		}
		else
		{
			$message = $this->connectError;
		}

		return array(
			'message'	=> $message,
			'code'		=> ''
		);
	}

	/**
	* Close sql connection
	* @access private
	*/
	function psqlClose()
	{
		return @pg_close($this->dbConnectId);
	}

	/**
	* Build db-specific report
	* @access private
	*/
	function psqlReport($mode, $query = '')
	{
		switch ($mode)
		{
			case 'start':

				$explainQuery = $query;
				if (preg_match('/UPDATE ([a-z0-9_]+).*?WHERE(.*)/s', $query, $m))
				{
					$explainQuery = 'SELECT * FROM ' . $m[1] . ' WHERE ' . $m[2];
				}
				else if (preg_match('/DELETE FROM ([a-z0-9_]+).*?WHERE(.*)/s', $query, $m))
				{
					$explainQuery = 'SELECT * FROM ' . $m[1] . ' WHERE ' . $m[2];
				}

				if (preg_match('/^SELECT/', $explainQuery))
				{
					$htmlTable = false;

					if ($result = @pg_query($this->dbConnectId, "EXPLAIN $explain_query"))
					{
						while ($row = @pg_fetch_assoc($result, null))
						{
							$htmlTable = $this->sqlReport('add_select_row', $query, $htmlTable, $row);
						}
					}
					@pg_free_result($result);

					if ($htmlTable)
					{
						$this->htmlHold .= '</table>';
					}
				}

			break;

			case 'fromcache':
				$endtime = explode(' ', microtime());
				$endtime = $endtime[0] + $endtime[1];

				$result = @pg_query($this->dbConnectId, $query);
				while ($void = @pg_fetch_assoc($result, null))
				{
					// Take the time spent on parsing rows into account
				}
				@pg_free_result($result);

				$splittime = explode(' ', microtime());
				$splittime = $splittime[0] + $splittime[1];

				$this->sqlReport('record_fromcache', $query, $endtime, $splittime);

			break;
		}
	}

	// Added on November 14th, 2014
	function sqlNumRows($queryId = 0)
	{
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		return ( $queryId ) ?  @pg_numrows($queryId) : false;
	}

	function sqlNumFields($queryId = 0)
	{
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		return ( $queryId ) ?  @pg_numfields($queryId) : false;
	}

	function sqlFieldName($offset, $queryId = 0)
	{
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		return ( $queryId ) ?  @pg_fieldname($queryId, $offset) : false;
	}


	function sqlAllRows($queryId = 0)
	{
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		return ( $queryId ) ?  @pg_fetch_all($queryId) : false;
	}

	function sqlAllRowsWithColumnsNames($queryId = 0)
	{
		$res = false;
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		if ($queryId ) {
			while ($row = @pg_fetch_assoc($queryId)) {	
				$res[] = $row;
			}
		}  
		else {
			$res = false;
		}
		return $res;
	}
	//Added on November 29 

	function sqlLastId($queryId = 0)
	{
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		return ( $queryId ) ?  @pg_last_oid($queryId) : false;
	}

	
        


	

}
