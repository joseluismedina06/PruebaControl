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
*/

namespace proteccioncivil\db\driver;
chdir(dirname(__FILE__));
include_once("driver.php");
include_once("../../errorCollector.php");

/**
* MSSQL Database Base Abstraction Layer
 */
abstract class mssqlbase extends \proteccioncivil\db\driver\driver
{
	/**
	* {@inheritDoc}
	*/
	public function sqlConcatenate($expr1, $expr2)
	{
		return $expr1 . ' + ' . $expr2;
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
	function sqlLowerText($column_name)
	{
		return "LOWER(SUBSTRING($column_name, 1, DATALENGTH($column_name)))";
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
	* Build db-specific query data
	* @access private
	*/
	function psqlCustomBuild($stage, $data)
	{
		return $data;
	}
}
