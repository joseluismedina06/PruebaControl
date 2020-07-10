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
* Modified ITALSIS JAN 7 2015
* Log: Replace _ with Camel Case
* Log: private p in prefix methods
*
*/

namespace proteccioncivil\db\driver;
chdir(dirname(__FILE__));
include_once("driver.php");
include_once("../../errorCollector.php");

/**
* MSSQL Database Abstraction Layer
* Minimum Requirement is MSSQL 2000+
*/
class mssql extends \proteccioncivil\db\driver\driver
{
	var $connect_error = '';

	/**
	* {@inheritDoc}
	*/
	function sqlConnect($sqlserver, $sqluser, $sqlpassword, $database, $port = false, $persistency = false, $newLink = false)
	{
		if (!function_exists('mssql_connect'))
		{
			$this->connect_error = 'mssql_connect function does not exist, is mssql extension installed?';
			return $this->sqlError('');
		}

		$this->persistency = $persistency;
		$this->user = $sqluser;
		$this->dbname = $database;

		$portDelimiter = (defined('PHP_OS') && substr(PHP_OS, 0, 3) === 'WIN') ? ',' : ':';
		$this->server = $sqlserver . (($port) ? $portDelimiter . $port : '');

		@ini_set('mssql.charset', 'UTF-8');
		@ini_set('mssql.textlimit', 2147483647);
		@ini_set('mssql.textsize', 2147483647);
		
		

		$this->dbConnectId = ($this->persistency) ? @mssql_pconnect($this->server, $this->user, $sqlpassword, $newLink) : @mssql_connect($this->server, $this->user, $sqlpassword, $newLink);


		if ($this->dbConnectId && $this->dbname != '')
		{
			if (!@mssql_select_db($this->dbname, $this->dbConnectId))
			{
				@mssql_close($this->dbConnectId);
				return false;
			}
		}

		return ($this->dbConnectId) ? $this->dbConnectId : $this->sqlError('');
	}

	/**
	* {@inheritDoc}
	*/
	function sqlServerInfo($raw = false, $useCache = true)
	{
		global $cache;

		if (!$useCache || empty($cache) || ($this->sqlServerVersion = $cache->get('mssql_version')) === false)
		{
			$resultId = @mssql_query("SELECT SERVERPROPERTY('productversion'), SERVERPROPERTY('productlevel'), SERVERPROPERTY('edition')", $this->dbConnectId);

			$row = false;
			if ($resultId)
			{
				$row = @mssql_fetch_assoc($resultId);
				@mssql_free_result($resultId);
			}

			$this->sqlServerVersion = ($row) ? trim(implode(' ', $row)) : 0;

			if (!empty($cache) && $useCache)
			{
				$cache->put('mssql_version', $this->sqlServerVersion);
			}
		}

		if ($raw)
		{
			return $this->sqlServerVersion;
		}

		return ($this->sqlServerVersion) ? 'MSSQL<br />' . $this->sqlServerVersion : 'MSSQL';
	}

	/**
	* {@inheritDoc}
	*/
	public function sqlConcatenate($expr1, $expr2)
	{
		return $expr1 . ' + ' . $expr2;
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
				return @mssql_query('BEGIN TRANSACTION', $this->dbConnectId);
			break;

			case 'commit':
				return @mssql_query('COMMIT TRANSACTION', $this->dbConnectId);
			break;

			case 'rollback':
				return @mssql_query('ROLLBACK TRANSACTION', $this->dbConnectId);
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
			else if (defined('PHPBB_DISPLAY_LOAD_TIME'))
			{
				$this->curtime = microtime(true);
			}

			$this->queryResult = ($cache && $cacheTtl) ? $cache->sqlLoad($query) : false;
			$this->sqlAddNumQueries($this->queryResult);

			if ($this->queryResult === false)
			{
				
				if (($this->queryResult = mssql_query($query, $this->dbConnectId)) === false)
				{
					$this->sqlError($query);
				}

				if (defined('DEBUG'))
				{
					$this->sqlReport('stop', $query);
				}
				else if (defined('PHPBB_DISPLAY_LOAD_TIME'))
				{
					$this->sqlTime += microtime(true) - $this->curtime;
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
	* Build LIMIT query
	*/
	function psqlQueryLimit($query, $total, $offset = 0, $cacheTtl = 0)
	{
		$this->queryResult = false;

		// Since TOP is only returning a set number of rows we won't need it if total is set to 0 (return all rows)
		if ($total)
		{
			// We need to grab the total number of rows + the offset number of rows to get the correct result
			if (strpos($query, 'SELECT DISTINCT') === 0)
			{
				$query = 'SELECT DISTINCT TOP ' . ($total + $offset) . ' ' . substr($query, 15);
			}
			else
			{
				$query = 'SELECT TOP ' . ($total + $offset) . ' ' . substr($query, 6);
			}
		}

		$result = $this->sqlQuery($query, $cacheTtl);

		// Seek by $offset rows
		if ($offset)
		{
			$this->sqlRowseek($offset, $result);
		}

		return $result;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlAffectedrows()
	{
		return ($this->dbConnectId) ? @mssql_rows_affected($this->dbConnectId) : false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlFetchrow($queryId = false)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($cache && $cache->sqlExists($queryId))
		{
			return $cache->sqlFetchrow($queryId);
		}

		if ($queryId === false)
		{
			return false;
		}

		$row = @mssql_fetch_assoc($queryId);

		// I hope i am able to remove this later... hopefully only a PHP or MSSQL bug
		if ($row)
		{
			foreach ($row as $key => $value)
			{
				$row[$key] = ($value === ' ' || $value === null) ? '' : $value;
			}
		}

		return $row;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlRowseek($rownum, &$queryId)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($cache && $cache->sqlExists($queryId))
		{
			return $cache->sql_rowseek($rownum, $queryId);
		}

		return ($queryId !== false) ? @mssql_data_seek($queryId, $rownum) : false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlNextid()
	{
		$resultId = @mssqlQuery('SELECT SCOPE_IDENTITY()', $this->dbConnectId);
		if ($resultId)
		{
			if ($row = @mssql_fetch_assoc($resultId))
			{
				@mssql_free_result($resultId);
				return $row['computed'];
			}
			@mssql_free_result($resultId);
		}

		return false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlFreeresult($queryId = false)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($cache && !is_object($queryId) && $cache->sqlExists($queryId))
		{
			return $cache->sql_freeresult($queryId);
		}

		if (isset($this->openQueries[(int) $queryId]))
		{
			unset($this->openQueries[(int) $queryId]);
			return @mssql_free_result($queryId);
		}

		return false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlEscape($msg)
	{
		return str_replace(array("'", "\0"), array("''", ''), $msg);
	}

	/**
	* {@inheritDoc}
	*/
	function sqlLowerText($columnName)
	{
		return "LOWER(SUBSTRING($columnName, 1, DATALENGTH($columnName)))";
	}

	/**
	* Build LIKE expression
	* @access private
	*/
	function psqlLikeExpression($expression)
	{
		return $expression . " ESCAPE '\\'";
	}

	/**
	* Build NOT LIKE expression
	* @access private
	*/
	function psqlNotLikeExpression($expression)
	{
		return $expression . " ESCAPE '\\'";
	}

	/**
	* return sql error array
	* @access private
	*/
	function psqlError()
	{
		if (function_exists('mssql_get_last_message'))
		{
			$error = array(
				'message'	=> @mssql_get_last_message(),
				'code'		=> '',
			);

			// Get error code number
			$resultId = @mssqlQuery('SELECT @@ERROR as code', $this->dbConnectId);
			if ($resultId)
			{
				$row = @mssql_fetch_assoc($resultId);
				$error['code'] = $row['code'];
				@mssql_free_result($resultId);
			}

			// Get full error message if possible
			$sql = 'SELECT CAST(description as varchar(255)) as message
				FROM master.dbo.sysmessages
				WHERE error = ' . $error['code'];
			$resultId = @mssqlQuery($sql);

			if ($resultId)
			{
				$row = @mssql_fetch_assoc($resultId);
				if (!empty($row['message']))
				{
					$error['message'] .= '<br />' . $row['message'];
				}
				@mssql_free_result($resultId);
			}
		}
		else
		{
			$error = array(
				'message'	=> $this->connect_error,
				'code'		=> '',
			);
		}

		return $error;
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
	* Close sql connection
	* @access private
	*/
	function psqlClose()
	{
		return @mssql_close($this->dbConnectId);
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
				$html_table = false;
				@mssqlQuery('SET SHOWPLAN_TEXT ON;', $this->dbConnectId);
				if ($result = @mssqlQuery($query, $this->dbConnectId))
				{
					@mssql_next_result($result);
					while ($row = @mssql_fetch_row($result))
					{
						$html_table = $this->sqlReport('add_select_row', $query, $html_table, $row);
					}
				}
				@mssqlQuery('SET SHOWPLAN_TEXT OFF;', $this->dbConnectId);
				@mssql_free_result($result);

				if ($html_table)
				{
					$this->html_hold .= '</table>';
				}
			break;

			case 'fromcache':
				$endtime = explode(' ', microtime());
				$endtime = $endtime[0] + $endtime[1];

				$result = @mssqlQuery($query, $this->dbConnectId);
				while ($void = @mssql_fetch_assoc($result))
				{
					// Take the time spent on parsing rows into account
				}
				@mssql_free_result($result);

				$splittime = explode(' ', microtime());
				$splittime = $splittime[0] + $splittime[1];

				$this->sqlReport('record_fromcache', $query, $endtime, $splittime);

			break;
		}
	}

	function sqlAllRows($queryId = 0)
	{
		if( !$queryId )
		{
			$queryId = $this->queryResult;
		}

		if ($queryId ) {
			while ($row = $this->sqlFetchrow($queryId)) {	
				$res[] = $row;
			}
		}  
		else {
			$res = false;
		}
		return $res;
	}
}
