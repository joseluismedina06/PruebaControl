<?php
/***************************************************************************
 *                                 sqldbITALSISMSSQL.php
 *                            -------------------
 *   begin                : January 7, 2015
 *   copyright            : Proyecto ITALSIS
 *   $
 *
 ***************************************************************************/
if(!defined("SQLITALSISMSSQL"))
{
        chdir(dirname(__FILE__));
	include_once("../db/driver/mssql.php");
	define("SQLITALSISMSSQL","mssqlITALSIS");

	class sqldbITALSISMSSQL  extends \proteccioncivil\db\driver\mssql
	{

	} // class sqldbITALSISMSSQL



} // if ... define

?>