<?php 

$string = file_get_contents("KIU_BOX_Issue_3640220381249.XML");                                   
$xml = simplexml_load_string($string); 
$i =1;
echo "LOC = ".$xml['RecordLocator']."<br>";
echo "KIU_TktDisplay"."<br>";
$td = $xml->KIU_TktDisplay;
print_r($td);
echo "TicketItemInfo"."<br>";
$ti = $td->TicketItemInfo;
print_r($ti);
echo "<br>";
 

//$atr = "$xml->@attributes";
//var_dump($$atr);
//echo "<br>";
//echo "Loc = ".$xml->attributes["RecordLocator"]."<br>";
//echo "<br>";
//var_dump($xml->attributes);
//echo "<br>"; 
//print_r($xml); 

?> 