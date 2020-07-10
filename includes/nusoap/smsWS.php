<?php
	
	chdir(dirname(__FILE__));
	

	
//http://192.168.130.221/sendmsg?user=admin&passwd=italsms221$&cat=1&to=04241312365
//&text=(Italcambio)%20Estimado%20JOSE%20Su%20giro%20DOL5480000036%20esta%20disponible
//%20para%20cobro%20en%201 

	class smsWS {
		private $url; // Objeto PHP Mailer
		private $user; // credencial parameter
		private $passwd; // credencial parameter
		private $cat; // credencial parameter
		
		function __construct($url="http://192.168.130.221/sendmsg",
				     $user="admin",
				     $passwd="italsms221", 
				     $cat="1")
    		{
        		$this->url = $url;
			$this->user = $user;
			$this->passwd = $passwd;
			$this->cat = $cat;

						
    		} //__construct

		
		function sendSMS($to,$text) {
			$fullURL = $this->url."?user=".$this->user."&passwd=";
			$fullURL .= $this->passwd."&cat=".$this->cat."&to=".$to."&text=".$text;
			echo "FU = ".$fullURL."<br>";
			$str = file_get_contents($fullURL);
			echo $str."<br>";
    			
		}

	} // class	
	
	$sws = new smsWS();
	$sws->sendSMS("04241312365","Prueba Mensaje Desde Servidor APACHE PHP");

?>