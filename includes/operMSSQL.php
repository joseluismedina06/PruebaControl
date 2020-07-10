<?php
	include_once("../init.php");
	
	include_once("dataLayerMSSQL.php");
	include_once("presentationLayer.php");
	include_once("generalRP.php");


	//$server = "Netsql";

	$server = "192.168.200.81";
	$database = "Exchange";
	//$server = "192.168.140.94\ITALGRAM";
   	//$database = "ITALGRAMINTER";
	$user = "ICdwbi";
	$pwd = "usrdwbi81$";

	$dl = new dataLayerMSSQL($server,$user,$pwd,$database);



	$com = "select p.PAI_NOMBRE, count(b.Operacion), SUM(b.montodivisa) ";
	$com .= " from Remesas_FamiliaresBenef b ";
	$com .= " inner join MtPaisesmundo p on (p.PAI_ISO3 = b.cod_pais) ";
	$com .= " where DATEDIFF(YY,b.fecha_bcv,'12/01/2014')=0 ";
	$com .= " group by p.PAI_NOMBRE";

	$res = $dl->executeReader($com);
	$pl = new presentationLayer();
	$arrCol[] = "Country";
	$arrCol[] = "Oper #";
	$arrCol[] = "Amount";
	

	$pl->fillGridArr($res, $arrCol,$pageSize=1000,$pageNumber=0,$width=900);

?>	