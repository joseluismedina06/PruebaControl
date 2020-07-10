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
 Modified ITALSIS NOV 14 2014
* Log: Replace _ with Camel Case
*/

namespace proteccioncivil\db\driver;

interface Idriver
{
	/**
	* Gets the name of the sql layer.
	*
	* @return string
	*/
	public function getSqlLayer();

	/**
	* Gets the name of the database.
	*
	* @return string
	*/
	public function getDbName();

	/**
	* Wildcards for matching any (%) character within LIKE expressions
	*
	* @return string
	*/
	public function getAnyChar();

	/**
	* Wildcards for matching exactly one (_) character within LIKE expressions
	*
	* @return string
	*/
	public function getOneChar();

	/**
	* Gets the time spent into the queries
	*
	* @return int
	*/
	public function getSqlTime();

	/**
	* Gets the connect ID.
	*
	* @return mixed
	*/
	public function getDbConnectId();

	/**
	* Indicates if an error was triggered.
	*
	* @return bool
	*/
	public function getSqlErrorTriggered();

	/**
	* Gets the last faulty query
	*
	* @return string
	*/
	public function getSqlErrorSql();

	/**
	* Indicates if we are in a transaction.
	*
	* @return bool
	*/
	public function getTransaction();

	/**
	* Gets the returned error.
	*
	* @return array
	*/
	public function getSqlErrorReturned();

	/**
	* Indicates if multiple insertion can be used
	*
	* @return bool
	*/
	public function getMultiInsert();

	/**
	* Set if multiple insertion can be used
	*
	* @param bool $multiInsert
	*/
	public function setMultiInsert($multiInsert);

	/**
	* Gets the exact number of rows in a specified table.
	*
	* @param string $tableName Table name
	* @return string	Exact number of rows in $tableName.
	*/
	public function getRowCount($tableName);

	/**
	* Gets the estimated number of rows in a specified table.
	*
	* @param string $tableName Table name
	* @return string	Number of rows in $tableName.
	*					Prefixed with ~ if estimated (otherwise exact).
	*/
	public function getEstimatedRowCount($tableName);

	/**
	* Run LOWER() on DB column of type text (i.e. neither varchar nor char).
	*
	* @param string $columnName	 The column name to use
	* @return string		A SQL statement like "LOWER($columnName)"
	*/
	public function sqlLowerText($columnName);

	/**
	* Display sql error page
	*
	* @param string		$sql	The SQL query causing the error
	* @return mixed		Returns the full error message, if $this->returnOnError
	*					is set, null otherwise
	*/
	public function sqlError($sql = '');

	/**
	* Returns whether results of a query need to be buffered to run a
	* transaction while iterating over them.
	*
	* @return bool	Whether buffering is required.
	*/
	public function sqlBufferNestedTransactions();

	/**
	* Run binary OR operator on DB column.
	*
	* @param string	$columnName	The column name to use
	* @param int	$bit			The value to use for the OR operator,
	*					will be converted to (1 << $bit). Is used by options,
	*					using the number schema... 0, 1, 2...29
	* @param string	$compare	Any custom SQL code after the check (e.g. "= 0")
	* @return string	A SQL statement like "$column | (1 << $bit) {$compare}"
	*/
	public function sqlBitOr($columnName, $bit, $compare = '');

	/**
	* Version information about used database
	*
	* @param bool $raw			Only return the fetched sqlServerVersion
	* @param bool $useCache	Is it safe to retrieve the value from the cache
	* @return string sql server version
	*/
	public function sqlServerInfo($raw = false, $useCache = true);

	/**
	* Return on error or display error message
	*
	* @param bool	$fail		Should we return on errors, or stop
	* @return null
	*/
	public function sqlReturnOnError($fail = false);

	/**
	* Build sql statement from an array
	*
	* @param	string	$query		Should be on of the following strings:
	*						INSERT, INSERT_SELECT, UPDATE, SELECT, DELETE
	* @param	array	$assoc_ary	Array with "column => value" pairs
	* @return	string		A SQL statement like "c1 = 'a' AND c2 = 'b'"
	*/
	public function sqlBuildArray($query, $assocAry = array());

	/**
	* Fetch all rows
	*
	* @param	mixed	 $queryId	Already executed query to get the rows from,
	*								if false, the last query will be used.
	* @return	mixed		Nested array if the query had rows, false otherwise
	*/
	public function sqlFetchRowSet($queryId = false);

	/**
	* SQL Transaction
	*
	* @param	string	$status		Should be one of the following strings:
	*								begin, commit, rollback
	* @return	mixed	Buffered, seekable result handle, false on error
	*/
	public function sqlTransaction($status = 'begin');

	/**
	* Build a concatenated expression
	*
	* @param	string	$expr1		Base SQL expression where we append the second one
	* @param	string	$expr2		SQL expression that is appended to the first expression
	* @return	string		Concatenated string
	*/
	public function sqlConcatenate($expr1, $expr2);

	/**
	* Build a case expression
	*
	* Note: The two statements actionTrue and actionFalse must have the same
	* data type (int, vchar, ...) in the database!
	*
	* @param	string	$condition		The condition which must be true,
	*							to use actionTrue rather then actionElse
	* @param	string	$actionTrue	SQL expression that is used, if the condition is true
	* @param	mixed	$actionFalse	SQL expression that is used, if the condition is false
	* @return	string		CASE expression including the condition and statements
	*/
	public function sqlCase($condition, $actionTrue, $actionFalse = false);

	/**
	* Build sql statement from array for select and select distinct statements
	*
	* Possible query values: SELECT, SELECT_DISTINCT
	*
	* @param	string	$query	Should be one of: SELECT, SELECT_DISTINCT
	* @param	array	$array	Array with the query data:
	*					SELECT		A comma imploded list of columns to select
	*					FROM		Array with "table => alias" pairs,
	*								(alias can also be an array)
	*		Optional:	LEFT_JOIN	Array of join entries:
	*						FROM		Table that should be joined
	*						ON			Condition for the join
	*		Optional:	WHERE		Where SQL statement
	*		Optional:	GROUP_BY	Group by SQL statement
	*		Optional:	ORDER_BY	Order by SQL statement
	* @return	string		A SQL statement ready for execution
	*/
	public function sqlBuildQuery($query, $array);

	/**
	* Fetch field
	* if rownum is false, the current row is used, else it is pointing to the row (zero-based)
	*
	* @param	string	$field		Name of the column
	* @param	mixed	$rownum		Row number, if false the current row will be used
	*								and the row curser will point to the next row
	*								Note: $rownum is 0 based
	* @param	mixed	 $queryId	Already executed query to get the rows from,
	*								if false, the last query will be used.
	* @return	mixed		String value of the field in the selected row,
	*						false, if the row does not exist
	*/
	public function sqlFetchField($field, $rownum = false, $queryId = false);

	/**
	* Fetch current row
	*
	* @param	mixed	 $queryId	Already executed query to get the rows from,
	*								if false, the last query will be used.
	* @return	mixed		Array with the current row,
	*						false, if the row does not exist
	*/
	public function sqlFetchRow($queryId = false);

	/**
	* Returns SQL string to cast a string expression to an int.
	*
	* @param  string $expression An expression evaluating to string
	* @return string             Expression returning an int
	*/
	public function castExprToBigint($expression);

	/**
	* Get last inserted id after insert statement
	*
	* @return	string		Autoincrement value of the last inserted row
	*/
	public function sqlNextId();

	/**
	* Add to query count
	*
	* @param bool $cached	Is this query cached?
	* @return null
	*/
	public function sqlAddNumQueries($cached = false);

	/**
	* Build LIMIT query
	*
	* @param	string	$query		The SQL query to execute
	* @param	int		$total		The number of rows to select
	* @param	int		$offset
	* @param	int		$cacheTtl	Either 0 to avoid caching or
	*				the time in seconds which the result shall be kept in cache
	* @return	mixed	Buffered, seekable result handle, false on error
	*/
	public function sqlQueryLimit($query, $total, $offset = 0, $cacheTtl = 0);

	/**
	* Base query method
	*
	* @param	string	$query		The SQL query to execute
	* @param	int		$cacheTtl	Either 0 to avoid caching or
	*				the time in seconds which the result shall be kept in cache
	* @return	mixed	Buffered, seekable result handle, false on error
	*/
	public function sqlQuery($query = '', $cacheTtl = 0);

	/**
	* Returns SQL string to cast an integer expression to a string.
	*
	* @param	string	$expression		An expression evaluating to int
	* @return string		Expression returning a string
	*/
	public function castExprToString($expression);

	/**
	 * Connect to server
	 *
	 * @param	string	$sqlserver		Address of the database server
	 * @param	string	$sqluser		User name of the SQL user
	 * @param	string	$sqlpassword	Password of the SQL user
	 * @param	string	$database		Name of the database
	 * @param	mixed	$port			Port of the database server
	 * @param	bool	$persistency
	 * @param	bool	$newLink		Should a new connection be established
	 * @return	mixed	Connection ID on success, string error message otherwise
	 */
	public function sqlConnect($sqlServer, $sqlUser, $sqlPassword, $database, $port = false, $persistency = false, $newLink = false);

	/**
	* Run binary AND operator on DB column.
	* Results in sql statement: "{$columnName} & (1 << {$bit}) {$compare}"
	*
	* @param string	$columnName	The column name to use
	* @param int	$bit			The value to use for the AND operator,
	*								will be converted to (1 << $bit). Is used by
	*								options, using the number schema: 0, 1, 2...29
	* @param string	$compare		Any custom SQL code after the check (for example "= 0")
	* @return string	A SQL statement like: "{$column} & (1 << {$bit}) {$compare}"
	*/
	public function sqlBitAnd($columnName, $bit, $compare = '');

	/**
	* Free sql result
	*
	* @param	mixed	 $queryId	Already executed query result,
	*								if false, the last query will be used.
	* @return	null
	*/
	public function sqlFreeResult($queryId = false);

	/**
	* Return number of sql queries and cached sql queries used
	*
	* @param	bool	$cached		Should we return the number of cached or normal queries?
	* @return	int		Number of queries that have been executed
	*/
	public function sqlNumQueries($cached = false);

	/**
	* Run more than one insert statement.
	*
	* @param string	$table		Table name to run the statements on
	* @param array	$sqlAry	Multi-dimensional array holding the statement data
	* @return bool		false if no statements were executed.
	*/
	public function sqlMultiInsert($table, $sqlAry);

	/**
	* Return number of affected rows
	*
	* @return	mixed		Number of the affected rows by the last query
	*						false if no query has been run before
	*/
	public function sqlAffectedRows();

	/**
	* DBAL garbage collection, close SQL connection
	*
	* @return	mixed		False if no connection was opened before,
	*						Server response otherwise
	*/
	public function sqlClose();

	/**
	* Seek to given row number
	*
	* @param	mixed	$rownum		Row number the curser should point to
	*								Note: $rownum is 0 based
	* @param	mixed	 $queryId	ID of the query to set the row cursor on
	*								if false, the last query will be used.
	*								$queryId will then be set correctly
	* @return	bool		False if something went wrong
	*/
	public function sqlRowSeek($rownum, &$queryId);

	/**
	* Escape string used in sql query
	*
	* @param	string	$msg	String to be escaped
	* @return	string		Escaped version of $msg
	*/
	public function sqlEscape($msg);

	/**
	* Correctly adjust LIKE expression for special characters
	* Some DBMS are handling them in a different way
	*
	* @param	string	$expression	The expression to use. Every wildcard is
	*						escaped, except $this->anyChar and $this->oneChar
	* @return string	A SQL statement like: "LIKE 'bertie_%'"
	*/
	public function sqlLikeExpression($expression);

	/**
	* Correctly adjust NOT LIKE expression for special characters
	* Some DBMS are handling them in a different way
	*
	* @param	string	$expression	The expression to use. Every wildcard is
	*						escaped, except $this->anyChar and $this->oneChar
	* @return string	A SQL statement like: "NOT LIKE 'bertie_%'"
	*/
	public function sqlNotLikeExpression($expression);

	/**
	* Explain queries
	*
	* @param	string	$mode		Available modes: display, start, stop,
	 *								addSelectRow, fromcache, recordFromcache
	* @param	string	$query		The Query that should be explained
	* @return	mixed		Either a full HTML page, boolean or null
	*/
	public function sqlReport($mode, $query = '');

	/**
	* Build IN or NOT IN sql comparison string, uses <> or = on single element
	* arrays to improve comparison speed
	*
	* @param	string	$field			Name of the sql column that shall be compared
	* @param	array	$array			Array of values that are (not) allowed
	* @param	bool	$negate			true for NOT IN (), false for IN ()
	* @param	bool	$allowEmptySet	If true, allow $array to be empty,
	*								this function will return 1=1 or 1=0 then.
	* @return string	A SQL statement like: "IN (1, 2, 3, 4)" or "= 1"
	*/
	public function sqlInSet($field, $array, $negate = false, $allowEmptySet = false);
}
