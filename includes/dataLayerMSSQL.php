<?php
	include_once("sqldbITALSISMSSQL.php");
	include_once("presentationLayer.php");
	

  	class dataLayerMSSQL {

		private $server;
         	private $user;
	 	private $password;
	 	private $database;
		
	 	var $con; // connection object 


	 	function __construct($server,$user,$password,$database) {
			$this->server = $server;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
	 	} 

		
		function open() {
			
			$this->con = new sqldbITALSISMSSQL($this->server,$this->user,$this->password,$this->database);
			//echo "antes de connect";
			$res = $this->con->sqlConnect($this->server,$this->user,$this->password,$this->database);
			//echo "despueses de connect";
			
			//var_dump($res);
                        
                        
			
		} // open

		function close() {
			$this->con -> sqlClose();
		} // close


		function executeScalar($com) {
	   		$this->open();
			$con = $this->con;        	
	        	$resc = $con -> sqlQuery($com);
			$resc= $con->sqlAllRows($resc);
			
			$nr = count($resc);
			$res = "";
			if ($nr == 1) {
				$nc = count($resc[0]);
				
				if ($nc == 1) {
					foreach($resc[0] as $res);
				}
			}
			
			$this->close();
			return $res;
					
				
	  	} //executeScalar

		function executeReader($com,$columNames=true) {
	   		$this->open();
			$con = $this->con;   	
	        	$res = $con -> sqlQuery($com);
			$res = $con -> sqlAllRows($res);
			$this->close();
						
			return $res;
					
				
	  	} //executeReader

		function executeCommand($com) {
	   		$this->open();
			$con = $this->con;  
			//echo $com."<br>";      	
	        	$res = $con -> sqlQuery($com);
			$this->close();
					
			//print_r($res);	
			return $res;
					
				
	  	} //executeCommand


		function fillGrid($com, $arrCol,$pageSize=10,$pageNumber=0) {
			
			$res = $this->executeReader($com,false);
			presentationLayer::fillGridArr($res, $arrCol,$pageSize,$pageNumber);
			
		}

				
	} // class
?>