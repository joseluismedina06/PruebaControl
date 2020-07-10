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
*/

namespace proteccioncivil\db\driver;
chdir(dirname(__FILE__));
include_once("Idriver.php");


/**
* Database Abstraction Layer
*/
abstract class driver implements Idriver
{
	var $dbConnectId;
	var $queryResult;
	var $returnOnError = false;
	var $transaction = false;
	var $sqlTime = 0;
	var $numQueries = array();
	var $openQueries = array();

	var $curtime = 0;
	var $queryHold = '';
	var $htmlHold = '';
	var $sqlReport = '';

	var $persistency = false;
	var $user = '';
	var $server = '';
	var $dbname = '';

	// Set to true if error triggered
	var $sqlErrorTriggered = false;

	// Holding the last sql query on sql error
	var $sqlErrorSql = '';
	// Holding the error information - only populated if sqlErrorTriggered is set
	var $sqlErrorReturned = array();

	// Holding transaction count
	var $transactions = 0;

	// Supports multi inserts?
	var $multiInsert = false;

	/**
	* Current sql layer
	*/
	var $sqlLayer = '';

	/**
	* Wildcards for matching any (%) or exactly one (_) character within LIKE expressions
	*/
	var $anyChar;
	var $oneChar;

	/**
	* Exact version of the DBAL, directly queried
	*/
	var $sqlServerVersion = false;

	/**
	* Constructor
	*/
	function __construct()
	{
		$this->numQueries = array(
			'cached'	=> 0,
			'normal'	=> 0,
			'total'		=> 0,
		);

		// Fill default sql layer based on the class being called.
		// This can be changed by the specified layer itself later if needed.
		$this->sqlLayer = substr(get_class($this), strlen('proteccioncivil\db\driver\\'));

		// Do not change this please! This variable is used to easy the use of it - and is hardcoded.
		$this->anyChar = chr(0) . '%';
		$this->oneChar = chr(0) . '_';
	}

	/**
	* {@inheritdoc}
	*/
	public function getSqlLayer()
	{
		return $this->sqlLayer;
	}

	/**
	* {@inheritdoc}
	*/
	public function getDbName()
	{
		return $this->dbname;
	}

	/**
	* {@inheritdoc}
	*/
	public function getAnyChar()
	{
		return $this->anyChar;
	}

	/**
	* {@inheritdoc}
	*/
	public function getOneChar()
	{
		return $this->oneChar;
	}

	/**
	* {@inheritdoc}
	*/
	public function getDbConnectId()
	{
		return $this->dbConnectId;
	}

	/**
	* {@inheritdoc}
	*/
	public function getSqlErrorTriggered()
	{
		return $this->sqlErrorTriggered;
	}

	/**
	* {@inheritdoc}
	*/
	public function getSqlErrorSql()
	{
		return $this->sqlErrorSql;
	}

	/**
	* {@inheritdoc}
	*/
	public function getTransaction()
	{
		return $this->transaction;
	}

	/**
	* {@inheritdoc}
	*/
	public function getSqlTime()
	{
		return $this->sqlTime;
	}

	/**
	* {@inheritdoc}
	*/
	public function getSqlErrorReturned()
	{
		return $this->sqlErrorReturned;
	}

	/**
	* {@inheritdoc}
	*/
	public function getMultiInsert()
	{
		return $this->multiInsert;
	}

	/**
	* {@inheritdoc}
	*/
	public function setMultiInsert($multiInsert)
	{
		$this->multiInsert = $multiInsert;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlReturnOnError($fail = false)
	{
		$this->sqlErrorTriggered = false;
		$this->sqlErrorSql = '';

		$this->returnOnError = $fail;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlNumQueries($cached = false)
	{
		return ($cached) ? $this->numQueries['cached'] : $this->numQueries['normal'];
	}

	/**
	* {@inheritDoc}
	*/
	function sqlAddNumQueries($cached = false)
	{
		$this->numQueries['cached'] += ($cached !== false) ? 1 : 0;
		$this->numQueries['normal'] += ($cached !== false) ? 0 : 1;
		$this->numQueries['total'] += 1;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlClose()
	{
		if (!$this->dbConnectId)
		{
			return false;
		}

		if ($this->transaction)
		{
			do
			{
				$this->sqlTransaction('commit');
			}
			while ($this->transaction);
		}

		foreach ($this->openQueries as $queryId)
		{
			$this->sqlFreeresult($queryId);
		}

		// Connection closed correctly. Set dbConnectId to false to prevent errors
		if ($result = $this->psqlClose())
		{
			$this->dbConnectId = false;
		}

		return $result;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlQueryLimit($query, $total, $offset = 0, $cacheTtl = 0)
	{
		if (empty($query))
		{
			return false;
		}

		// Never use a negative total or offset
		$total = ($total < 0) ? 0 : $total;
		$offset = ($offset < 0) ? 0 : $offset;

		return $this->psqlQueryLimit($query, $total, $offset, $cacheTtl);
	}

	/**
	* {@inheritDoc}
	*/
	function sqlFetchRowSet($queryId = false)
	{
		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($queryId !== false)
		{
			$result = array();
			while ($row = $this->sqlFetchRow($queryId))
			{
				$result[] = $row;
			}

			return $result;
		}

		return false;
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
			return $cache->sqlRowseek($rowNum, $queryId);
		}

		if ($queryId === false)
		{
			return false;
		}

		$this->sqlFreeResult($queryId);
		$queryId = $this->sqlQuery($this->lastQueryText);

		if ($queryId === false)
		{
			return false;
		}

		// We do not fetch the row for rowNum == 0 because then the next resultset would be the second row
		for ($i = 0; $i < $rowNum; $i++)
		{
			if (!$this->sqlFetchRow($queryId))
			{
				return false;
			}
		}

		return true;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlFetchField($field, $rowNum = false, $queryId = false)
	{
		global $cache;

		if ($queryId === false)
		{
			$queryId = $this->queryResult;
		}

		if ($queryId !== false)
		{
			if ($rownum !== false)
			{
				$this->sqlRowSeek($rowNum, $queryId);
			}

			if ($cache && !is_object($queryId) && $cache->sqlExists($queryId))
			{
				return $cache->sqlFetchField($queryId, $field);
			}

			$row = $this->sqlFetchRow($queryId);
			return (isset($row[$field])) ? $row[$field] : false;
		}

		return false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlLikeExpression($expression)
	{
		$expression = utf8_str_replace(array('_', '%'), array("\_", "\%"), $expression);
		$expression = utf8_str_replace(array(chr(0) . "\_", chr(0) . "\%"), array('_', '%'), $expression);

		return $this->psqlLikeExpression('LIKE \'' . $this->sqlEscape($expression) . '\'');
	}

	/**
	* {@inheritDoc}
	*/
	function sqlNotLikeExpression($expression)
	{
		$expression = utf8_str_replace(array('_', '%'), array("\_", "\%"), $expression);
		$expression = utf8_str_replace(array(chr(0) . "\_", chr(0) . "\%"), array('_', '%'), $expression);

		return $this->psqlNotLikeExpression('NOT LIKE \'' . $this->sqlEscape($expression) . '\'');
	}

	/**
	* {@inheritDoc}
	*/
	public function sqlCase($condition, $actionTrue, $actionFalse = false)
	{
		$sqlCase = 'CASE WHEN ' . $condition;
		$sqlCase .= ' THEN ' . $actionTrue;
		$sqlCase .= ($actionFalse !== false) ? ' ELSE ' . $actionFalse : '';
		$sqlCase .= ' END';
		return $sqlCase;
	}

	/**
	* {@inheritDoc}
	*/
	public function sqlConcatenate($expr1, $expr2)
	{
		return $expr1 . ' || ' . $expr2;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlBufferNestedTransactions()
	{
		return false;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlTransaction($status = 'begin')
	{
		switch ($status)
		{
			case 'begin':
				// If we are within a transaction we will not open another one, but enclose the current one to not loose data (preventing auto commit)
				if ($this->transaction)
				{
					$this->transactions++;
					return true;
				}

				$result = $this->psqlTransaction('begin');

				if (!$result)
				{
					$this->sqlError();
				}

				$this->transaction = true;
			break;

			case 'commit':
				// If there was a previously opened transaction we do not commit yet...
				// but count back the number of inner transactions
				if ($this->transaction && $this->transactions)
				{
					$this->transactions--;
					return true;
				}

				// Check if there is a transaction (no transaction can happen if
				// there was an error, with a combined rollback and error returning enabled)
				// This implies we have transaction always set for autocommit db's
				if (!$this->transaction)
				{
					return false;
				}

				$result = $this->psqlTransaction('commit');

				if (!$result)
				{
					$this->sqlError();
				}

				$this->transaction = false;
				$this->transactions = 0;
			break;

			case 'rollback':
				$result = $this->psqlTransaction('rollback');
				$this->transaction = false;
				$this->transactions = 0;
			break;

			default:
				$result = $this->psqlTransaction($status);
			break;
		}

		return $result;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlBuildArray($query, $assocAry = false)
	{
		if (!is_array($assocAry))
		{
			return false;
		}

		$fields = $values = array();

		if ($query == 'INSERT' || $query == 'INSERT_SELECT')
		{
			foreach ($assocAry as $key => $var)
			{
				$fields[] = $key;

				if (is_array($var) && is_string($var[0]))
				{
					// This is used for INSERT_SELECT(s)
					$values[] = $var[0];
				}
				else
				{
					$values[] = $this->psqlValidateValue($var);
				}
			}

			$query = ($query == 'INSERT') ? ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')' : ' (' . implode(', ', $fields) . ') SELECT ' . implode(', ', $values) . ' ';
		}
		else if ($query == 'MULTI_INSERT')
		{
			trigger_Error('The MULTI_INSERT query value is no longer supported. Please use sqlMultiInsert() instead.', E_USER_ERROR);
		}
		else if ($query == 'UPDATE' || $query == 'SELECT' || $query == 'DELETE')
		{
			$values = array();
			foreach ($assocAry as $key => $var)
			{
				$values[] = "$key = " . $this->psqlValidateValue($var);
			}
			$query = implode(($query == 'UPDATE') ? ', ' : ' AND ', $values);
		}

		return $query;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlInSet($field, $array, $negate = false, $allowEmptySet = false)
	{
		if (!sizeof($array))
		{
			if (!$allowEmptySet)
			{
				// Print the backtrace to help identifying the location of the problematic code
				$this->sqlError('No values specified for SQL IN comparison');
			}
			else
			{
				// NOT IN () actually means everything so use a tautology
				if ($negate)
				{
					return '1=1';
				}
				// IN () actually means nothing so use a contradiction
				else
				{
					return '1=0';
				}
			}
		}

		if (!is_array($array))
		{
			$array = array($array);
		}

		if (sizeof($array) == 1)
		{
			@reset($array);
			$var = current($array);

			return $field . ($negate ? ' <> ' : ' = ') . $this->psqlValidateValue($var);
		}
		else
		{
			return $field . ($negate ? ' NOT IN ' : ' IN ') . '(' . implode(', ', array_map(array($this, 'psqlValidateValue'), $array)) . ')';
		}
	}

	/**
	* {@inheritDoc}
	*/
	function sqlBitAnd($columnName, $bit, $compare = '')
	{
		if (method_exists($this, 'psqlBitAnd'))
		{
			return $this->psqlBitAnd($columnName, $bit, $compare);
		}

		return $columnName . ' & ' . (1 << $bit) . (($compare) ? ' ' . $compare : '');
	}

	/**
	* {@inheritDoc}
	*/
	function sqlBitOr($columnName, $bit, $compare = '')
	{
		if (method_exists($this, 'psqlBitOr'))
		{
			return $this->psqlBitOr($columnName, $bit, $compare);
		}

		return $columnName . ' | ' . (1 << $bit) . (($compare) ? ' ' . $compare : '');
	}

	/**
	* {@inheritDoc}
	*/
	function castExprToBigint($expression)
	{
		return $expression;
	}

	/**
	* {@inheritDoc}
	*/
	function castExprToString($expression)
	{
		return $expression;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlLowerText($columnName)
	{
		return "LOWER($columnName)";
	}

	/**
	* {@inheritDoc}
	*/
	function sqlMultiInsert($table, $sqlAry)
	{
		if (!sizeof($sqlAry))
		{
			return false;
		}

		if ($this->multiInsert)
		{
			$ary = array();
			foreach ($sqlAry as $id => $psqlAry)
			{
				// If by accident the sql array is only one-dimensional we build a normal insert statement
				if (!is_array($psqlAry))
				{
					return $this->sqlQuery('INSERT INTO ' . $table . ' ' . $this->sqlBuildArray('INSERT', $sqlAry));
				}

				$values = array();
				foreach ($psqlAry as $key => $var)
				{
					$values[] = $this->psqlValidateValue($var);
				}
				$ary[] = '(' . implode(', ', $values) . ')';
			}

			return $this->sqlQuery('INSERT INTO ' . $table . ' ' . ' (' . implode(', ', array_keys($sqlAry[0])) . ') VALUES ' . implode(', ', $ary));
		}
		else
		{
			foreach ($sqlAry as $ary)
			{
				if (!is_array($ary))
				{
					return false;
				}

				$result = $this->sqlQuery('INSERT INTO ' . $table . ' ' . $this->sqlBuildArray('INSERT', $ary));

				if (!$result)
				{
					return false;
				}
			}
		}

		return true;
	}

	/**
	* Function for validating values
	* @access private
	*/
	function psqlValidateValue($var)
	{
		if (is_null($var))
		{
			return 'NULL';
		}
		else if (is_string($var))
		{
			return "'" . $this->sqlEscape($var) . "'";
		}
		else
		{
			return (is_bool($var)) ? intval($var) : $var;
		}
	}

	/**
	* {@inheritDoc}
	*/
	function sqlBuildQuery($query, $array)
	{
		$sql = '';
		switch ($query)
		{
			case 'SELECT':
			case 'SELECT_DISTINCT';

				$sql = str_replace('_', ' ', $query) . ' ' . $array['SELECT'] . ' FROM ';

				// Build table array. We also build an alias array for later checks.
				$tableArray = $aliases = array();
				$usedMultiAlias = false;

				foreach ($array['FROM'] as $tableName => $alias)
				{
					if (is_array($alias))
					{
						$usedMultiAlias = true;

						foreach ($alias as $multiAlias)
						{
							$tableArray[] = $tableName . ' ' . $multiAlias;
							$aliases[] = $multiAlias;
						}
					}
					else
					{
						$tableArray[] = $tableName . ' ' . $alias;
						$aliases[] = $alias;
					}
				}

				// We run the following code to determine if we need to re-order the table array. ;)
				// The reason for this is that for multi-aliased tables (two equal tables) in the FROM statement the last table need to match the first comparison.
				// DBMS who rely on this: Oracle, PostgreSQL and MSSQL. For all other DBMS it makes absolutely no difference in which order the table is.
				if (!empty($array['LEFT_JOIN']) && sizeof($array['FROM']) > 1 && $usedMultiAlias !== false)
				{
					// Take first LEFT JOIN
					$join = current($array['LEFT_JOIN']);

					// Determine the table used there (even if there are more than one used, we only want to have one
					preg_match('/(' . implode('|', $aliases) . ')\.[^\s]+/U', str_replace(array('(', ')', 'AND', 'OR', ' '), '', $join['ON']), $matches);

					// If there is a first join match, we need to make sure the table order is correct
					if (!empty($matches[1]))
					{
						$firstJoinMatch = trim($matches[1]);
						$tableArray = $last = array();

						foreach ($array['FROM'] as $tableName => $alias)
						{
							if (is_array($alias))
							{
								foreach ($alias as $multiAlias)
								{
									($multiAlias === $firstJoinMatch) ? $last[] = $tableName . ' ' . $multiMalias : $tableArray[] = $tableName . ' ' . $multiAlias;
								}
							}
							else
							{
								($alias === $firstJoinMatch) ? $last[] = $tableName . ' ' . $alias : $tableArray[] = $tableName . ' ' . $alias;
							}
						}

						$tableArray = array_merge($tableArray, $last);
					}
				}

				$sql .= $this->psqlCustomBuild('FROM', implode(' CROSS JOIN ', $tableArray));

				if (!empty($array['LEFT_JOIN']))
				{
					foreach ($array['LEFT_JOIN'] as $join)
					{
						$sql .= ' LEFT JOIN ' . key($join['FROM']) . ' ' . current($join['FROM']) . ' ON (' . $join['ON'] . ')';
					}
				}

				if (!empty($array['WHERE']))
				{
					$sql .= ' WHERE ' . $this->psqlCustomBuild('WHERE', $array['WHERE']);
				}

				if (!empty($array['GROUP_BY']))
				{
					$sql .= ' GROUP BY ' . $array['GROUP_BY'];
				}

				if (!empty($array['ORDER_BY']))
				{
					$sql .= ' ORDER BY ' . $array['ORDER_BY'];
				}

			break;
		}

		return $sql;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlError($sql = '')
	{
		global $auth, $user, $config;

		// Set var to retrieve errored status
		$this->sqlErrorTriggered = true;
		$this->sqlErrorSql = $sql;

		$this->sqlErrorReturned = $this->psqlError();

		if (!$this->returnOnError)
		{
			$message = 'SQL ERROR [ ' . $this->sqlLayer . ' ]<br /><br />' . $this->sqlErrorReturned['message'] . ' [' . $this->sqlErrorReturned['code'] . ']';

			// Show complete SQL error and path to administrators only
			// Additionally show complete error on installation or if extended debug mode is enabled
			// The DEBUG constant is for development only!
			if ((isset($auth) && $auth->acl_get('a_')) || defined('IN_INSTALL') || defined('DEBUG'))
			{
				$message .= ($sql) ? '<br /><br />SQL<br /><br />' . htmlspecialchars($sql) : '';
			}
			else
			{
				// If error occurs in initiating the session we need to use a pre-defined language string
				// This could happen if the connection could not be established for example (then we are not able to grab the default language)
				if (!isset($user->lang['SQL_ERROR_OCCURRED']))
				{
					$message .= '<br /><br />An sql error occurred while fetching this page. Please contact an administrator if this problem persists.';
				}
				else
				{
					if (!empty($config['boardContact']))
					{
						$message .= '<br /><br />' . sprintf($user->lang['SQL_ERROR_OCCURRED'], '<a href="mailto:' . htmlspecialchars($config['boardContact']) . '">', '</a>');
					}
					else
					{
						$message .= '<br /><br />' . sprintf($user->lang['SQL_ERROR_OCCURRED'], '', '');
					}
				}
			}

			if ($this->transaction)
			{
				$this->sqlTransaction('rollback');
			}

			if (strlen($message) > 1024)
			{
				// We need to define $msgLongText here to circumvent text stripping.
				global $msgLongText;
				$msgLongText = $message;

				trigger_error(false, E_USER_ERROR);
			}

			trigger_error($message, E_USER_ERROR);
		}

		if ($this->transaction)
		{
			$this->sqlTransaction('rollback');
		}

		return $this->sqlErrorReturned;
	}

	/**
	* {@inheritDoc}
	*/
	function sqlReport($mode, $query = '')
	{
		// 2014/11/14, drop, linked to phpbb
		return true;
	}

	/**
	* {@inheritDoc}
	*/
	function getEstimatedRowCount($tableName)
	{
		return $this->getRowCount($tableName);
	}

	/**
	* {@inheritDoc}
	*/
	function getRowCount($tableName)
	{
		$sql = 'SELECT COUNT(*) AS rowsTotal
			FROM ' . $this->sqlEscape($tableName);
		$result = $this->sqlQuery($sql);
		$rowsTotal = $this->sqlFetchfield('rowsTotal');
		$this->sqlFreeResult($result);

		return $rowsTotal;
	}
}
