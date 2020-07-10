<?php
	chdir(dirname(__FILE__));
	include_once("../init.php");
	include_once("dataLayer.php");
	include_once("dataLayerMSSQL.php");
	include_once("dataLayerSQLSRV.php");

	class facadeMaster {
		public $dl;
		public $dlSQL;
		public $dlSQLItalgram;
		
		function __construct() {
			// servidor dade
			//$this->dl = new dataLayer("localhost:","postgres","prueba","audit");
			//$this->dl = new dataLayer("10.100.100.2","dba","12345678","italsisdev");
			//$this->dl = new dataLayer("developer.arturomarcano.com.ve","dba","12345678","proteccioncivil");
			$this->dl = new dataLayer("localhost","dba","12345678","pcdev");
			//$this->dl = new dataLayer("192.168.7.6","dba","M3x1c02020","pcdev");
			// Produccion $this->dlSQL = new dataLayerMSSQL("192.168.200.81","ICdwbi","usrdwbi81$","Exchange");
			// Prueba Desarrollonew2(192.168.200.65) Exchange iusr internet
			//$this->dlSQL = new dataLayerMSSQL("192.168.200.65","iusr","internet","audit");
			//$this->dlSQL = new dataLayerSQLSRV("desarrollonew2","iusr","internet","audit");
			$this->dlSQL = new dataLayerSQLSRV("desarrollonew2","iusr","internet","audit");
			////$this->dlSQL = new dataLayerMSSQL("192.168.200.65","","","Exchange");
			//$this->dlSQLItalgram = new dataLayerMSSQL("192.168.140.94\ITALGRAM","ICdwbi","usrdwbi81$","ITALGRAMINTER");
		}

		
	}
?>
