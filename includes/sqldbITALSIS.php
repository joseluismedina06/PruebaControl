<?php
/***************************************************************************
 *                                 sqldbITALSIS.php
 *                            -------------------
 *   begin                : Noviembre 14, 2014
 *   copyright            : Proyecto ITALSIS
 *   $
 *
 ***************************************************************************/
if(!defined("SQLITALSIS"))
{
        chdir(dirname(__FILE__));
	include_once("../db/driver/postgres.php");
	define("SQLITALSIS","postgresqlITALSIS");

	class sqldbITALSIS  extends \proteccioncivil\db\driver\postgres
	{

		function sqlFieldFlags($offset, $queryId = 0, $table = "")
		{
			$res = "";
			if(!$queryId)
			{
				$queryId = $this->queryResult;
			}
			if($queryId && $table != "")
			{
           			// case auto increment
             			$ar = split("[.]",$table);
			
				if (count($ar) > 1)
					$table = $ar[1];
				$query = "SELECT adnum FROM pg_attrdef WHERE adrelid=(";
  				$query .= "SELECT oid FROM pg_class WHERE relname='".$table."')";
			
			
  				$this->sqlQuery($query);
            			if ($this->sqlNumRows() > 0) {
   					$this->sqlFetchRow();
					$nc = $this->sqlFetchField('adnum');
				        if (($offset+1) == $nc)
                           		$res .= ' auto_increment';

				}
				// case Primary key 
				// 5 try
				for ($i = 1; $i <= 5; $i++) { 
					$query = "select conkey[".$i."] from pg_constraint WHERE conrelid=(";
  					$query .= "SELECT oid FROM pg_class WHERE relname='".$table."')";
					$this->sqlQuery($query);
					if ($this->sqlNumRows() > 0) {
   						$row =	$this->sqlFetchRow();
						$nc = (int)$this->sqlFetchField('conkey');
                        			if (($offset+1) == $nc)
                           				$res .= ' primary_key';
					}

				}	
			}
			return $res;
		} // function
	} // class sqldbITALSIS



} // if ... define

?>