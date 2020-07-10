<?php
	class utilities {
            
            
		static function randomToken($cn){ 
			$car = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789@%$#()[]\|!abcdefghijklmnopqrstuvwxyz^*+=;,<>'; 
			$n = strlen($car); 
			$n--;
			$token=""; 
				for($i = 0;$i < $cn; $i++){ 
					$pos = rand(0,$n); 
					$token .= substr($car,$pos,1); 
				} 

			return $token; 
		}

		static function randomTokenSms($cn){ 
			$car = '0123456789'; 
			$n = strlen($car); 
			$n--;
			$token=""; 
				for($i = 0;$i < $cn; $i++){ 
					$pos = rand(0,$n); 
					$token .= substr($car,$pos,1); 
				} 

			return $token; 
		}

		static function epoch() {
			return time();
		}

		static function DOLsreference() {
			usleep(250000); // try to avoid same reference
			return "DOL".time();
		}

		static function supressApost($str) {
			return str_replace("'"," ",$str);
		}

		function currentDateTimeServiGlobales() {
			date_default_timezone_set("America/Panama");
			$sct = date("Ymdhis");
			return $sct;
		}

		//yyyy/mm/dd
		function currentTimeMore() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/Panama");
			$sct = date("Y/m/d");
			return $sct;
		}	
		
		//dd/mm/yyyy 
		function currentDateJetPeru() {
			date_default_timezone_set("America/Panama");
			$sct = date("d/m/Y");
			return $sct;
		}

		// yyyymmdd 
		function currentDateMundial() {
			date_default_timezone_set("America/Panama");
			$sct = date("Ymd");
			return $sct;
		}

		// yyyymmdd_hhmm 
		function currentDateTimeMundial() {
			date_default_timezone_set("America/Panama");
			$sct = date("Ymd_Hi");
			return $sct;
		}
		//YYYY-MM-DD 
		function currentDateTitan() {
			date_default_timezone_set("America/Panama");
			$sct = date("Y-m-d");
			return $sct;
		}

		// ddmmyyyy_hhmiss
		function currentDateTimeTitan() {
			date_default_timezone_set("America/Panama");
			$sct = date("dmY_his");
			return $sct;
		}
		function nextDaySQL() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/Panama");
			$sct = date("Y-m-d",time() + 86400);
			return $sct;
		}

		function currentTimeSQL() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/Panama");
			$sct = date("Y-m-d");
			return $sct;
		}

		function currentDateTimeSQL() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/Panama");
			$sct = date("Y-m-d H:i:s");
			return $sct;
		}
		
		function currentTimeSQLVzla() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/La_Paz");
			$sct = date("Y-m-d");
			return $sct;
		}

		function currentDateTimeSQLVzla() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/La_Paz");
			$sct = date("Y-m-d H:i:s");
			return $sct;
		}


		function addSeconds($date, $sec) {
			return date("Y-m-d H:i:s", strtotime($date) + $sec);
		}

		function currentTime() {
			//2015-05-29T10:16:26
			date_default_timezone_set("America/Panama");
			$sct = date("d/m/Y")." ". date("H:i:s");
			return $sct;
		}	

		/*=============
		$date: Format yyyy-mm-dd--> dd/mm/yyyy
		======== */
		static function formatDateCalendarES ($date) {
			$l = strlen($date);
			$res = "";
			if ($l >= 10) {
				$res = substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4);
				
			}
			return($res);
		}

		/*=============
		$date: Format dd/mm/yyyy--> yyyy-mm-dd 
		======== */
		
		static function conveertDateEN ($date) {
			$l = strlen($date);
			$res = "";
			if ($l >= 10) {
				$res = substr($date,6,4)."-".substr($date,3,2)."-".substr($date,0,2);
				
			}
			return($res);

		}

		/*=============
		$date: Format dd/mm/yyyy hh:mm:ss--> yyyy-mm-dd hh:mm;ss
		======== */
		
		static function conveertDateENLong ($date) {
			$l = strlen($date);
			$res = "";
			if ($l >= 10) {
				$res = substr($date,6,4)."-".substr($date,3,2)."-".substr($date,0,2).substr($date,10);
				
			}
			return($res);

		}

		static function getReq($R,$var) {
			$res = "";
			if (isset($R[$var])) {
				$res = $R[$var];
			}
			return $res;
		}

		static function getReqCheck($R,$var) {
			$res = "N";
			if (isset($R[$var])) {
				$res = $R[$var];
				if ($res == "on") {
					$res = "Y";
				}
			}
			return $res;
		}

		static function valOk($val) {
			$res = false;
			if (isset($val) && ($val != "")){
				$res = true;
			}
			return ($res);
		}

		static function validEmail($email) {		
			return(filter_var($email, FILTER_VALIDATE_EMAIL));
		}

		static function alert ($msg) {
			$msg = str_replace('"','', $msg);
			$msg = str_replace("'","", $msg);
			echo '<SCRIPT language="javascript" type="text/javascript">';
			echo 'alert("'.$msg.'");';
			echo '</SCRIPT>';
		}
		
		static function buildS($par) {	
			$res = "";
			if ($par == NULL)
				$res = NULL;
			else
				$res = "'".$par."'";
			return($res);
		}
		
		static function redirect($url){
			if (headers_sent()){
				die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
			} else{
				header('Location: ' . $url);
				die();
			}
		}

			
		static function fileUpload($targetDir, $fileName,$tmpFileName) {
			$targetFile = $targetDir.$fileName;
			move_uploaded_file($tmpFileName,$targetFile); 
			

		}

		static function getIP() {
				$ipaddress = '';
				if ($_SERVER['HTTP_CLIENT_IP'])
					$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				else if($_SERVER['HTTP_X_FORWARDED_FOR'])
					$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else if($_SERVER['HTTP_X_FORWARDED'])
					$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				else if($_SERVER['HTTP_FORWARDED_FOR'])
					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				else if($_SERVER['HTTP_FORWARDED'])
					$ipaddress = $_SERVER['HTTP_FORWARDED'];
				else if($_SERVER['REMOTE_ADDR'])
					$ipaddress = $_SERVER['REMOTE_ADDR'];
				else
					$ipaddress = 'UNKNOWN';

				return $ipaddress;
		}
			
		// Funciones agregadas: 15-03-2018
		static function buildjs($level = 3) {
			switch($level) {
				case 1: $dir = "../";
					break;
				case 2: $dir = "../../";
					break;
				case 3: $dir = "../../../";
					break;
			}
						//javascript para menu
						echo '<SCRIPT language="javascript" src="'.$dir.'js/jquery-3.3.1.min.js" type="text/javascript"></SCRIPT>';
			echo '<SCRIPT language="javascript" src="'.$dir.'js/bootstrap.min.js" type="text/javascript"></SCRIPT>';
						///////////////////////////////////////////////////////////////
			echo '<SCRIPT language="javascript" src="'.$dir.'js/globals.js" type="text/javascript"></SCRIPT>';
			echo '<SCRIPT language="javascript" src="'.$dir.'js/jquery-1.10.2.min.js" type="text/javascript"></SCRIPT>';
			echo '<SCRIPT language="javascript" src="'.$dir.'js/jquery-ui-1.11.4/jquery-ui.js" type="text/javascript"></SCRIPT>';

						echo '<SCRIPT language="javascript" src="'.$dir.'js/jquery.dataTables.js" type="text/javascript"></SCRIPT>';

		}
		
		static function buildccs($level = 3) {
			switch($level) {
				case 1: $dir = "../";
					break;
				case 2: $dir = "../../";
					break;
				case 3: $dir = "../../../";
					break;
			}
			echo '<link rel="stylesheet" type="text/css" href="'.$dir.'css/italsis.css">';
			echo '<link rel="stylesheet" type="text/css" href="'.$dir.'js/jquery-ui-1.11.4/jquery-ui.css">';
						
			echo '<link rel="stylesheet" type="text/css" href="'.$dir.'css/jquery.dataTables.css">';
		} 
		
		static function buildexit($level = 3,$logo) {
			switch($level) {
				case 1: $dir = "./";
				break;
				case 2: $dir = "../../";
				break;
				case 3: $dir = "../../../";
				break;
			}

			//echo '<a class="nav-link" href="'.$dir.'indexPortal.php">Cerrar Sesi&oacute;n</a>';
			echo '<a class="nav-link" href="'.$dir.$logo.'.php?action=exit">Cerrar Sesi&oacute;n</a>';
			//session_destroy();		

		}


		static function getValue($array, $key, $default = null)
		{
			if ($key instanceof \Closure) {
				return $key($array, $default);
			}
		
			if (is_array($key)) {
				$lastKey = array_pop($key);
				foreach ($key as $keyPart) {
					$array = static::getValue($array, $keyPart);
				}
				$key = $lastKey;
			}
		
			if (is_array($array) && (isset($array[$key]) || array_key_exists($key, $array)) ) {
				return $array[$key];
			}
		
			if (($pos = strrpos($key, '.')) !== false) {
				$array = static::getValue($array, substr($key, 0, $pos), $default);
				$key = substr($key, $pos + 1);
			}
		
			if (is_object($array)) {
				return $array->$key;
			} elseif (is_array($array)) {
				return (isset($array[$key]) || array_key_exists($key, $array)) ? $array[$key] : $default;
			} else {
				return $default;
			}
		}
			
		// Funcion agregada por Arturo Marcano sobre codigo creado por Isaac Sanabria
		static function trueUser($logo='indexPortal',$title='Organizacion Italcambio') {
			if(isset($_SESSION['iduser']) ){

				$idmenu =$_SESSION["iduser"];
				$regis = $_SESSION["regis"];
				//  var_dump($regis);

			presentationLayer::buildHeaderMenu($idmenu,$regis,$logo,$title);
			}

			$bl = new baseBL();
			
			$url = PATH.$_SERVER['REQUEST_URI'];
			//var_dump($url);
			//$trurl=strstr($url,'?',true);
			//var_dump($trurl);
			//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			// var_dump($port);


			if ($bl->checkuser($idmenu,$url, $regis) =="0" or $bl->checkuser($idmenu,$url, $regis) == ""){
				//die();
				if($logo== 'indexPortal'){ 
						utilities::redirect('../../../indexPortal.php');
				} else{
					utilities::redirect('../../../indexLiberty.php');
				}
			}
		}
		
			
		static function showErrors() {
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
		}

		function genHash($ne){ 
			$clist = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
			$nc = strlen($clist); 
			$nc--; 

			$hash=NULL; 
				for($x=1;$x<=$ne;$x++){ 
					$pos = rand(0,$nc); 
					$hash .= substr($clist,$pos,1); 
				} 

			return $hash; 
		}

		// For proteccioncivil
		static function getValidDevice($pdevice) {
			if($pdevice=="1234567890qwertyuiop") {
				return true;
			} else {
				return false;
			}
		}
		
		static function setSessionID() {
			return "1234567890qwertyuiop";
		}
	}	
?>