<?php
	echo "antes de connect";
	$db = pg_connect("host=10.100.100.2 dbname=italsis");
	//var_dump($db);
	echo "case 1"."<br>";
	echo "antes de connect";
	$db2 = pg_connect("host=10.100.100.2 dbname=italsis user=dba");
	//var_dump($db2);
	echo "case 2"."<br>";


	function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    		throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
	}
	set_error_handler("exception_error_handler");

	try {
   		 $conn= pg_connect("host=10.100.100.2 dbname=italsis user=dba password=12345678");
	} catch (Exception $e) {
   		 echo $e->getMessage();
	}

?>