<?php
	$port = $_SERVER["SERVER_PORT"];
	$host = $_SERVER["SERVER_NAME"];
	if ($port == "80") {
		$path = "http://".$host."/italsisdev/";
	}	
	else {
		$path = "https://".$host."/italsisdev/";
	}
	//if ($port != "443") {
	//	$path = "http://".$host.":".$port."/italsis/";
	//}	
	//else {
	//	$path = "https://".$host.":".$port."/italsis/";
	//}
	define("PATH", $path);
	//define("PATH", "http://185.25.252.67/italsis/");
	//define("PATH", "https://190.216.242.43:8080/italsis/");
	define("PATHPROVIDERS", "/var/www/italsis/modules/exchange/providers/");
	define("PATHPDF", "/srv/www/htdocs/italsis/");
	define("PATHMORE", "/srv/www/htdocs/italsis/includes/nusoap/");
	define("PATHTITAN", "/srv/www/htdocs/italsis/includes/nusoap/");
	define("PATHSERVIGLOBALES", "/srv/www/htdocs/italsis/includes/nusoap/");
	define("PATHJETPERU", "/srv/www/htdocs/italsis/includes/nusoap/");
	define("PATHMUNDIAL", "/srv/www/htdocs/italsis/includes/nusoap/");
	define("PATHPDFDOLGRAM", "/srv/www/htdocs/italsis/modules/transactions/dolgram/PDF/");
	define("PATHTXTDOLGRAM", "/srv/www/htdocs/italsis/modules/transactions/dolgram/TXT/");
	define("PATHOPERDOLGRAM", "/srv/www/htdocs/italsis/modules/transactions/dolgram/OPER/");
	define("PATHGOLD", "/srv/www/htdocs/italsis/modules/transactions/goldops/UPLOADS/");
	define("PATHPDFGOLD", "/srv/www/htdocs/italsis/modules/transactions/goldops/PDF/");
	define("PATHTXTGOLD", "/srv/www/htdocs/italsis/modules/transactions/goldops/TXT/");
	define("PATHIMGDOLGRAM", "/srv/www/htdocs/italsis/images/");
	define("PATHBLPL", "/srv/www/htdocs/italsis/BLPL/");

	
?>