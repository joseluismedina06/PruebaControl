<?php
/**
* Class "partyrelationshipPL.PHP"
* @author "dba, egoyo@italcambio.com"
* @version "1.00 2018-06-11 Elaboracion; 2018-06-11 Modificacion, [Parametro]"
* Description: "" 
* 
* Others additions: partyrelationshipPL.php:
* functions: 
*           
*
*/
    $version = "1.00";
    $msgversion = " Class partyrelationshipPL.PHP";
    $msgversion .= " @author dba, egoyo@italcambio.com";
    $msgversion .= " @version V ".$version.".- 2018-06-11";
    $msgversion .= " ";
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $veridio = str_repeat("&nbsp;", 69)."<a href='".$url."?V=Y'>V ".$version;
            
    session_start();
    //Establecer Codificacion de la Pagina
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(0);
    chdir(dirname(__FILE__));
    include_once("partyrelationshipBL.php");
    chdir(dirname(__FILE__));
    include_once("../base/basePL.php");
    chdir(dirname(__FILE__));
    include_once("../../../includes/presentationLayer.php");
        chdir(dirname(__FILE__));

    include_once("../base/baseBL.php");
    chdir(dirname(__FILE__));
    //include_once("selectfiltro.php");
    chdir(dirname(__FILE__));
    include_once("includes/myPresentationLayer.php");
    
    chdir(dirname(__FILE__));
    include_once("includes/myUtilities.php");
    
   
    basePL::buildjs();
    basePL::buildccs();
    
    myUtilities::buildmyjs(0);
    //myUtilities::buildmycss(0);
    
    
    //Utilitario para desplegar menu de funciones
    //utilities::trueUser();

?>

<html>
 <head>

  <title>RELACIONES</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="selectfiltro.php">
  </script>
<link rel="stylesheet" type="text/css" href="css.css" media="screen" />
 </head>


<?php	
    //links
    $sLink = $dLink = $pLink = $cLink = $flink = $fbnlink = "";
	
    //actions
    $action = "";
    $urloper = "";

    //For pagination
    $pn = 0;

    $urloper = basePL::getReq($_REQUEST,"urloper");
    $pn = basePL::getReq($_REQUEST,"pn");
    $parS = "";

    // default
    $active = "Y";
    $deleted = "N";
    $id = $code = $name = "";
    $com = "";

    $idpartysrc = $idpartydst = $idrelationshiptype = $observation = "";


    $id = basePL::getReq($_REQUEST,"id");
    $code = basePL::getReq($_REQUEST,"code");
    $name = basePL::getReq($_REQUEST,"name");
    $idpartysrc = basePL::getReq($_REQUEST,"idpartysrc");
    $idpartydst = basePL::getReq($_REQUEST,"idpartydst");
    $origen = basePL::getReq($_REQUEST,"Origen");
    $destino = basePL::getReq($_REQUEST,"Destino");
    $idrelationshiptype =  basePL::getReq($_REQUEST,"idrelationshiptype");
    $observation = basePL::getReq($_REQUEST,"observation");
    $active = basePL::getReqCheck($_REQUEST,"active");
    $deleted = basePL::getReqCheck($_REQUEST,"deleted");


    $sbl = new partyrelationshipBL($code,$name,$idpartysrc,$idpartydst,$idrelationshiptype,
    $observation,$active,$deleted);

       
    $sbl-> buildLinks("partyrelationshipPL.php",$pn,$sLink,$dLink,$pLink,
            $cLink,$fLink,$fbnLink,$action,$parS);	
    $bpl = new basePL("document.partyrelationshipPL",$sLink,$dLink,$pLink,
            $cLink,$fLink,$fbnLink);

    $oper = $urloper;
    if ($urloper == "save" && $id == "") {
        $oper = "insert";
    }
    if ($urloper == "save" && $id != "") {
        $oper = "update";
    }
    if ($urloper == "clear" && $id != "") {
    $id = "";
    $code = "";
    $name = "";
    $idpartysrc = "";
    $idpartydst = "";
    $origen = "";
    $destino = "";
    $idrelationshiptype =  "";
    $observation = "";
    $active = "";
    $deleted = "";
    }

    if ($id != "") {
       $arPar[] = $id;
    }

    if(isset($_GET["V"])){
        if($_GET["V"] =="Y"){
            utilities::alert($msgversion);
        }
    }
       
    $sbl->buildArray($arPar);
    $sbl->execute($oper,$arPar);
       
    if ($oper == "find" || $oper == "findByName") {
  
                $id = $arPar[0];
                $code = $arPar[1];
                $name = $arPar[2];
                $idpartysrc = $arPar[3];
                $idpartydst = $arPar[4];
                $idrelationshiptype = $arPar[5];
                $observation = $arPar[6];
                $active = $arPar[7];
                $deleted = $arPar[8];
        
        $qsearchNameentErprisepersonById= "SELECT pe.name
    	FROM party.party pe where pe.id = '".$idpartysrc."'";
        //var_dump($qsearchNameentErprisepersonById);
        $origen=$sbl->executeScalar($qsearchNameentErprisepersonById);   
        $qsearchNameentErprisepersonById2= "SELECT pe.name
    	FROM party.party pe where pe.id = '".$idpartydst."'";
        //var_dump($qsearchNameentErprisepersonById2);
        $destino=$sbl->executeScalar($qsearchNameentErprisepersonById2);                  
    }

?>
<!-- 
<body oncontextmenu="return false;">
-->
<body>
   
<FORM action="<?php echo $action;?>" method="post" name="partyrelationshipPL" 
      class="italsis">
	
<?php
       
    presentationLayer::buildFormTitle("Relaciones","");
    
    presentationLayer::buildInitColumn();
    
    presentationLayer::buildIdInput($id,"document.partyrelationshipPL",$fLink); 

    $res =$sbl->getInputInformation();

    partyrelationshipBL::getName ("Origen","Origen","idpartysrc","Origen",$origen,$res,"");
   
    partyrelationshipBL::getName ("Destino","Destino","idpartydst","Destino",$destino,$res,"");
    
    myPresentationLayer::buildInputHidden("idpartysrc","idpartysrc","idpartysrc",$idpartysrc);
    
    myPresentationLayer::buildInputHidden("idpartydst","idpartydst","idpartydst",$idpartydst);

    partyrelationshipBL::buildSelect("Relación","idrelationshiptype","idrelationshiptype",$sbl,"relationshiptype",$idrelationshiptype,"base","");

    presentationLayer::buildInput("Observación","observation","observation",$observation,"50");


    presentationLayer::buildEndColumn();
    presentationLayer::buildInitColumn();
    
    presentationLayer::buildCheck("Activo","active","active",$active);

    presentationLayer::buildEndColumn();

    presentationLayer::buildFooterNoGrid($bpl,$sbl,"","Y","N","N","Y","N");

    $arrCol = array("Id","Origen","Destino","Relación","Observación", "Activo");
    $comp= "select * from party.isspgetpartyrelationshipdisplay()";
    
    partyrelationshipBL::fillGridDisplayPaginator($comp,$arrCol);
    
    ?>
    </form>
    </body>
</html>
