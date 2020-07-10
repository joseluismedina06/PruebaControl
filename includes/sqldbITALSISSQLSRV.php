<?php
/***************************************************************************
 *                                 sqldbITALSISSQLSRV.php
 *                            -------------------
 *   begin                : January 7, 2015
 *   copyright            : Proyecto ITALSIS
 *   $
 *
 ***************************************************************************/
if(!defined("SQLITALSISSQLSRV"))
{
        chdir(dirname(__FILE__));
	include_once("../db/driver/mssqlnative.php");
	define("SQLITALSISSQLSRV","sqlsrvITALSIS");

	class sqldbITALSISSQLSRV  extends \proteccioncivil\db\driver\mssqlnative
	{

	} // class sqldbITALSISSQLSRV



} // if ... define

?>