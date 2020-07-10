<?php 
    session_start();
    error_reporting(0);
 


 //fecha  
 //Nombre y Número del Edificio 
    chdir(dirname(__FILE__));
    include_once("../base/basePL.php");
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");
    chdir(dirname(__FILE__));
    include_once("../../../includes/presentationLayer.php");
    chdir(dirname(__FILE__));    
    include_once("includes/myPresentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/myUtilities.php");      
    chdir(dirname(__FILE__));
    include_once("agreementBL.php");   
    chdir(dirname(__FILE__));
    include_once("partyaddressBL.php");  
    chdir(dirname(__FILE__));
    include_once("partyphoneBL.php");
    chdir(dirname(__FILE__));
    include_once("partyemailBL.php");

    basePL::buildjs();
    basePL::buildccs();
 
    myUtilities::buildmyccs(0);   
    myUtilities::buildmyjs(0);
    
?>


<?php

    if($_SESSION['useractive']!="active") {
        myUtilities::redirect('../party/index.php');
    }


    // Codigo SCIAN

    include "scian/class/pgSQL.php";
    include "scian/class/dataClass.php";

    $pgSQL = new PgSQL();
    $conn = $pgSQL->OpenConnection();

    $data = new Data();
    $json_data = $data->GetData($conn);

    // Fin Codigo SCIAN
?>

<html>
    <head>
        <script type="text/javascript" src="datepickercontrol.js"></script> 
        <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
        <title>Empresa</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!--Codigo SCIAN-->
        <link rel="stylesheet" href="scian/dist/themes/default/style.min.css" />
        <!--<script src="scian/js/jquery.min.js"></script>-->
        <script src="scian/dist/jstree.min.js"></script>
        <link rel="stylesheet" href="scian/css/stylescian.css">
        <!-- Fin Codigo SCIAN-->

<?php
    // base
    $bl=new baseBL();

    // default
    $active = "Y";
    $deleted = "N";
    $id = $code = $name = $observation
                
    //----- var Datos basicos
    =  $idparty = $tipo = $idenficationumber  = $idpartyaddress = $RFC 
    = "";
        
    //------var links
    $sLink = $dLink = $pLink = $cLink = $flink = $fbnlink = "";
        
    //---var actions
    $action = "";
    $urloper = "";
    $readonly = "";
    $disabled = "";
    $buildArray_person = $buildArray = "";
        
    //---For pagination
    $pn = 0;

    //----Alerta
    $msj_error = $error_msg_first_regist= "";

    // default
    $idpartyconsultant=$_SESSION["idpartyconsultant"];
    $urloper = basePL::getReq($_REQUEST,"urloper");
    $pn = basePL::getReq($_REQUEST,"pn");			
    //$register = basePL::getReq($_REQUEST,"register");
        
    //----- ID PARTY and default
    $id = basePL::getReq($_REQUEST,"id");
    $code = basePL::getReq($_REQUEST,"code"); 
    $name = basePL::getReq($_REQUEST,"name");
  
    $idpartyaddress = basePL::getReq($_REQUEST,"idpartyaddress");

    $idpartyphone = basePL::getReq($_REQUEST,"idpartyphone");
    $idpartyemail = basePL::getReq($_REQUEST,"idpartyemail");
    $idpartysocialmedia = basePL::getReq($_REQUEST,"idpartysocialmedia");
    $idpartybankinfo = basePL::getReq($_REQUEST,"idpartybankinfo");
    //Montrar si existe data compliance
    $idpartycompliance = basePL::getReq($_REQUEST,"idpartycompliance");
    
    // ARRAY PARA EL JAVASCRIPT DEL ACORDION  
 
    $arrayPHP=array($idpartyaddress,$idpartyphone,$idpartyemail);
    $arrayPHPmsgERROR=array();

    $identificacion=basePL::getReq($_REQUEST,"identificacion");
    // $idcity = basePL::getReq($_REQUEST,"idcity");     
    

    $bussinesname = basePL::getReq($_REQUEST,"bussinesname"); 
    $registerdate = basePL::getReq($_REQUEST,"registerdate"); 
    $password = basePL::getReq($_REQUEST,"password"); 
    $buildingnamenumber = basePL::getReq($_REQUEST,"buildingnamenumber");

    $buildingnumber= basePL::getReq($_REQUEST,"buildingnumber"); 
    $suburb = basePL::getReq($_REQUEST,"suburb"); 
    $municipality = basePL::getReq($_REQUEST,"municipality"); 
    $postalcode = basePL::getReq($_REQUEST,"postalcode"); 
    $RFC = basePL::getReq($_REQUEST,"RFC");
    $idstate = basePL::getReq($_REQUEST,"idstate"); 
    $street = basePL::getReq($_REQUEST,"street"); 
    $idaddresstype = basePL::getReq($_REQUEST,"idaddresstype");

    $idemailtype = basePL::getReq($_REQUEST,"idemailtype");   

    $email = basePL::getReq($_REQUEST,"email"); 

    $idphonetype = basePL::getReq($_REQUEST,"idphonetype");    
    $phone = basePL::getReq($_REQUEST,"phone"); 

    $landsurface= basePL::getReq($_REQUEST,"landsurface"); 
    $buildedsurface= basePL::getReq($_REQUEST,"buildedsurface"); 
    $buildingheight= basePL::getReq($_REQUEST,"buildingheight"); 

    $legalrepresentative= basePL::getReq($_REQUEST,"legalrepresentative"); 
    $manager= basePL::getReq($_REQUEST,"manager"); 
    $responsiblepipc= basePL::getReq($_REQUEST,"responsiblepipc"); 
    $economicactivity= basePL::getReq($_REQUEST,"economicactivity"); 
    $permanentshedule= basePL::getReq($_REQUEST,"permanentshedule"); 
    $numemployees= basePL::getReq($_REQUEST,"numemployees");

    $buildingage= basePL::getReq($_REQUEST,"buildingage"); 
    $numlevels= basePL::getReq($_REQUEST,"numlevels"); 
    $areadata= basePL::getReq($_REQUEST,"areadata");  
    $maxcapacity= basePL::getReq($_REQUEST,"maxcapacity");   

    $companysecurityprovider= basePL::getReq($_REQUEST,"companysecurityprovider"); 
    $securityofficer= basePL::getReq($_REQUEST,"securityofficer"); 
    $nummorningsecurityelements= basePL::getReq($_REQUEST,"nummorningsecurityelements"); 
    $numeveningsecurityelements= basePL::getReq($_REQUEST,"numeveningsecurityelements"); 
    $numnightsecurityelements= basePL::getReq($_REQUEST,"numnightsecurityelements"); 

    $numbrigadista= basePL::getReq($_REQUEST,"numbrigadista"); 
    $accidentinsurance = basePL::getReqCheck($_REQUEST,"accidentinsurance"); 
    $insurancecompany= basePL::getReq($_REQUEST,"insurancecompany"); 
    $numextinguisherspqs= basePL::getReq($_REQUEST,"numextinguisherspqs"); 
    $numextinguishersco2= basePL::getReq($_REQUEST,"numextinguishersco2"); 
    $numextinguishersh20= basePL::getReq($_REQUEST,"numextinguishersh20"); 
    $numextinguishersothers= basePL::getReq($_REQUEST,"numextinguishersothers"); 
    $structuralopinion = basePL::getReqCheck($_REQUEST,"structuralopinion"); 
    $datestructuralopinion= basePL::getReq($_REQUEST,"datestructuralopinion"); 
    $electricopinion = basePL::getReqCheck($_REQUEST,"electricopinion"); 
    $dateelectricopinion= basePL::getReq($_REQUEST,"dateelectricopinion"); 
    $firenetwork = basePL::getReqCheck($_REQUEST,"firenetwork"); 
    $numhydrants= basePL::getReq($_REQUEST,"numhydrants"); 
    $tankcapacity= basePL::getReq($_REQUEST,"tankcapacity"); 
    $percenttankfire= basePL::getReq($_REQUEST,"percenttankfire"); 
    $alertsystem = basePL::getReqCheck($_REQUEST,"alertsystem"); 
    $firedetection = basePL::getReqCheck($_REQUEST,"firedetection"); 
    $fireprotectionequipment = basePL::getReqCheck($_REQUEST,"fireprotectionequipment");
    $capacityfireprotectionequipment= basePL::getReq($_REQUEST,"capacityfireprotectionequipment"); 
    $autonomousbreathingequipment= basePL::getReqCheck($_REQUEST,"autonomousbreathingequipment"); 
    $gastanklpstationary= basePL::getReqCheck($_REQUEST,"gastanklpstationary"); 
    $capacitygastanklpstationary= basePL::getReq($_REQUEST,"capacitygastanklpstationary"); 
    $gastanklpnotstationary= basePL::getReqCheck($_REQUEST,"gastanklpnotstationary"); 
    $howgastanklpnotstationar= basePL::getReq($_REQUEST,"howgastanklpnotstationar"); 
    $lpgasopinion= basePL::getReqCheck($_REQUEST,"lpgasopinion"); 
    $datelpgasopinion= basePL::getReq($_REQUEST,"datelpgasopinion"); 

    $flammablegases= basePL::getReqCheck($_REQUEST,"flammablegases"); 
    $quantityflammablegases= basePL::getReq($_REQUEST,"quantityflammablegases"); 
    $flammableliquids= basePL::getReqCheck($_REQUEST,"flammableliquids"); 
    $quantityflammableliquids= basePL::getReq($_REQUEST,"quantityflammableliquids"); 
    $combustibleliquids= basePL::getReqCheck($_REQUEST,"combustibleliquids"); 
    $quantitycombustibleliquids= basePL::getReq($_REQUEST,"quantitycombustibleliquids"); 
    $combustiblesolids= basePL::getReqCheck($_REQUEST,"combustiblesolids"); 
    $quantitycombustiblesolids= basePL::getReq($_REQUEST,"quantitycombustiblesolids"); 
    $explosivematerial= basePL::getReqCheck($_REQUEST,"explosivematerial"); 
    $quantityexplosivematerial= basePL::getReq($_REQUEST,"quantityexplosivematerial"); 
    $electricsubstation= basePL::getReqCheck($_REQUEST,"electricsubstation"); 
    $capacityelectricsubstation= basePL::getReq($_REQUEST,"capacityelectricsubstation"); 
    $codebranch= basePL::getReq($_REQUEST,"codebranch");
    
    // Enterprise Complements
    // Extintores
	$extinguisherh20= basePL::getReqCheck($_REQUEST,"extinguisherh20");
	$extinguisherco2= basePL::getReqCheck($_REQUEST,"extinguisherco2");
	$extinguisherpqs= basePL::getReqCheck($_REQUEST,"extinguisherpqs"); 
	$extinguisherk= basePL::getReqCheck($_REQUEST,"extinguisherk"); 
	$extinguisherother= basePL::getReqCheck($_REQUEST,"extinguisherother"); 
	$capextinguisherh20= basePL::getReqCheck($_REQUEST,"capextinguisherh20");
	$capextinguisherco2= basePL::getReqCheck($_REQUEST,"capextinguisherco2");
	$capextinguisherpqs= basePL::getReqCheck($_REQUEST,"capextinguisherpqs"); 
	$capextinguisherk= basePL::getReqCheck($_REQUEST,"capextinguisherk"); 
	$capextinguisherother= basePL::getReqCheck($_REQUEST,"capextinguisherother");
	// Señalamientos de Seguridad y Tipologias
	// Señales informativas
	$evacuationroute= basePL::getReqCheck($_REQUEST,"evacuationroute"); 
	$leastriskarea= basePL::getReqCheck($_REQUEST,"leastriskarea"); 
	$firstaid= basePL::getReqCheck($_REQUEST,"firstaid"); 
	$stretcher= basePL::getReqCheck($_REQUEST,"stretcher"); 
	$meetingpoint= basePL::getReqCheck($_REQUEST,"meetingpoint"); 
	$emergencyexit= basePL::getReqCheck($_REQUEST,"emergencyexit"); 
	$emergencystair= basePL::getReqCheck($_REQUEST,"emergencystair"); 
	$onlydesabilitiespeople= basePL::getReqCheck($_REQUEST,"onlydesabilitiespeople"); 
	$emergencycommunication= basePL::getReqCheck($_REQUEST,"emergencycommunication"); 
	$informationmodule= basePL::getReqCheck($_REQUEST,"informationmodule"); 
	$lookout= basePL::getReqCheck($_REQUEST,"lookout"); 
	// Señales Informativas de Emergencia
	$extinguisher= basePL::getReqCheck($_REQUEST,"extinguisher"); 
	$hydrant= basePL::getReqCheck($_REQUEST,"hydrant"); 
	$alarmactivation= basePL::getReqCheck($_REQUEST,"alarmactivation"); 
	$emergencyphone= basePL::getReqCheck($_REQUEST,"emergencyphone"); 
	$emergencyequipment= basePL::getReqCheck($_REQUEST,"emergencyequipment"); 
	// Señales de Precaución
	$slipperyfloor= basePL::getReqCheck($_REQUEST,"slipperyfloor"); 
	$toxicsubstance= basePL::getReqCheck($_REQUEST,"toxicsubstance"); 
	$corrosivesubstance= basePL::getReqCheck($_REQUEST,"corrosivesubstance"); 
	$flammablematerials= basePL::getReqCheck($_REQUEST,"flammablematerials"); 
	$oxidizingmaterials= basePL::getReqCheck($_REQUEST,"oxidizingmaterials"); 
	$riskexplosionmaterials= basePL::getReqCheck($_REQUEST,"riskexplosionmaterials"); 
	$electricrisk= basePL::getReqCheck($_REQUEST,"electricrisk"); 
	$laserradiationrisk= basePL::getReqCheck($_REQUEST,"laserradiationrisk"); 
	$biologicalrisk= basePL::getReqCheck($_REQUEST,"biologicalrisk"); 
	$ionizingradiation= basePL::getReqCheck($_REQUEST,"ionizingradiation"); 
	// Señales Prohibitivas o Restrictivas
	$dontsmoking= basePL::getReqCheck($_REQUEST,"dontsmoking"); 
	$dontfire= basePL::getReqCheck($_REQUEST,"dontfire"); 
	$dontuseelevatoronemergency= basePL::getReqCheck($_REQUEST,"dontuseelevatoronemergency"); 
	$dontunauthorizedpersons= basePL::getReqCheck($_REQUEST,"dontunauthorizedpersons"); 
	$dontrun= basePL::getReqCheck($_REQUEST,"dontrun"); 
	$dontscream= basePL::getReqCheck($_REQUEST,"dontscream"); 
	$dontpush= basePL::getReqCheck($_REQUEST,"dontpush"); 
	// Señales de Obligación
	$usebadge= basePL::getReqCheck($_REQUEST,"usebadge"); 
	$registrationaccess= basePL::getReqCheck($_REQUEST,"registrationaccess"); 
	$parkobligation= basePL::getReqCheck($_REQUEST,"parkobligation"); 
	$vehicleinspection= basePL::getReqCheck($_REQUEST,"vehicleinspection"); 
	$packageinspection= basePL::getReqCheck($_REQUEST,"packageinspection"); 
	// Equipo de Proteccion Personal
	// Cabeza
	$impacthelmet= basePL::getReqCheck($_REQUEST,"impacthelmet"); 
	$dielectrichelmet= basePL::getReqCheck($_REQUEST,"dielectrichelmet"); 
	$hood= basePL::getReqCheck($_REQUEST,"hood"); 
	// Ojos y Cara
	$protectiongoggles= basePL::getReqCheck($_REQUEST,"protectiongoggles"); 
	$goggles= basePL::getReqCheck($_REQUEST,"goggles"); 
	$faceshield= basePL::getReqCheck($_REQUEST,"faceshield"); 
	$welderhelmet= basePL::getReqCheck($_REQUEST,"welderhelmet"); 
	$weldergoggles= basePL::getReqCheck($_REQUEST,"weldergoggles"); 
	// Oidos
	$earplug= basePL::getReqCheck($_REQUEST,"earplug"); 
	$acousticshell= basePL::getReqCheck($_REQUEST,"acousticshell"); 
	// Aparato Respiratorio
	$particulaterespirator= basePL::getReqCheck($_REQUEST,"particulaterespirator"); 
	$gasvaporrespirator= basePL::getReqCheck($_REQUEST,"gasvaporrespirator"); 
	$disposablemask= basePL::getReqCheck($_REQUEST,"disposablemask"); 
	$selfrespirator= basePL::getReqCheck($_REQUEST,"selfrespirator"); 
	// Extremidades Superiores
	$chemicalglove= basePL::getReqCheck($_REQUEST,"chemicalglove"); 
	$dielectricglove= basePL::getReqCheck($_REQUEST,"dielectricglove"); 
	$extremetemperatureglove= basePL::getReqCheck($_REQUEST,"extremetemperatureglove"); 
	$glove= basePL::getReqCheck($_REQUEST,"glove"); 
	$sleeve= basePL::getReqCheck($_REQUEST,"sleeve"); 
	// Tronco
	$hightemperatureapron= basePL::getReqCheck($_REQUEST,"hightemperatureapron"); 
	$chemicalapron= basePL::getReqCheck($_REQUEST,"chemicalapron"); 
	$overol= basePL::getReqCheck($_REQUEST,"overol"); 
	$coat= basePL::getReqCheck($_REQUEST,"coat"); 
	$clothingdangeroussubstances= basePL::getReqCheck($_REQUEST,"clothingdangeroussubstances"); 
	// Extremidades Inferiores
	$occupationalfootwear= basePL::getReqCheck($_REQUEST,"occupationalfootwear"); 
	$impactfootwear= basePL::getReqCheck($_REQUEST,"impactfootwear"); 
	$conductivefootwear= basePL::getReqCheck($_REQUEST,"conductivefootwear"); 
	$dielectricfootwear= basePL::getReqCheck($_REQUEST,"dielectricfootwear"); 
	$chemicalfootwear= basePL::getReqCheck($_REQUEST,"chemicalfootwear"); 
	$leggins= basePL::getReqCheck($_REQUEST,"leggins"); 
	$waterproofboats= basePL::getReqCheck($_REQUEST,"waterproofboats"); 
	// Otros
	$equipmentagainstfall= basePL::getReqCheck($_REQUEST,"equipmentagainstfall"); 
	$equipmentfirebrigade= basePL::getReqCheck($_REQUEST,"equipmentfirebrigade"); 


    // active character varying(1) DEFAULT 'Y'::character varying,
    // delete character varying(1) DEFAULT 'N'::character varying,
    
    // DocumentsEnterprise
    $savedocumententerprise = basePL::getReq($_REQUEST,"savedocumententerprise"); 
    $iddocumententerprise = basePL::getReq($_REQUEST,"iddocumententerprise"); 
    $iddocumenttypeenterprise = basePL::getReq($_REQUEST,"iddocumenttypeenterprise"); 
    $iddocumentstatusenterprise = basePL::getReq($_REQUEST,"iddocumentstatusenterprise");

    // DocumentsPay
    $savedocumentpay = basePL::getReq($_REQUEST,"savedocumentpay"); 
    $iddocumentpay = basePL::getReq($_REQUEST,"iddocumentpay"); 
    $iddocumenttypepay = basePL::getReq($_REQUEST,"iddocumenttypepay"); 
    $iddocumentstatuspay = basePL::getReq($_REQUEST,"iddocumentstatuspay");

    // DocumentsDictum
    $savedocumentdictum = basePL::getReq($_REQUEST,"savedocumentdictum"); 
    $iddocumentdictum = basePL::getReq($_REQUEST,"iddocumentdictum"); 
    $iddocumenttypedictum = basePL::getReq($_REQUEST,"iddocumenttypedictum"); 
    $iddocumentstatusdictum = basePL::getReq($_REQUEST,"iddocumentstatusdictum");

    // DocumentsInsurance
    $savedocumentinsurance = basePL::getReq($_REQUEST,"savedocumentinsurance"); 
    $iddocumentinsurance = basePL::getReq($_REQUEST,"iddocumentinsurance"); 
    $iddocumenttypeinsurance = basePL::getReq($_REQUEST,"iddocumenttypeinsurance"); 
    $iddocumentstatusinsurance = basePL::getReq($_REQUEST,"iddocumentstatusinsurance");

    //var_dump('iddocumententerprise: '.$iddocumententerprise);

    //----Variables concatenadas    
    if($identificacion!=""){      
        $RFC =$identificacion;       
    }
  
        
    if($urloper=="save" ){
        $RFC = basePL::getReq($_REQUEST,"RFC");
        //$idparty = basePL::getReq($_REQUEST,"idparty");
    }
         
    if ($urloper == "clear" ) {
        $RFC = basePL::getReq($_REQUEST,"RFC");
        $idparty = basePL::getReq($_REQUEST,"idparty");                     

        //----- var Direcciones

        $bussinesname =
        $registerdate =
        $buildingnamenumber =

        $landsurface =
        $buildedsurface =
        $buildingheight =

        $legalrepresentative =
        $manager =
        $responsiblepipc =
        $economicactivity =
        $permanentshedule =
        $numemployees =

        $buildingage =
        $numlevels =
        $areadata =
        $maxcapacity =

        $companysecurityprovider =
        $securityofficer =
        $nummorningsecurityelements =
        $numeveningsecurityelements =
        $numnightsecurityelements =

        $numbrigadista =
        $accidentinsurance =
        $insurancecompany =
        $numextinguisherspqs =
        $numextinguishersco2 =
        $numextinguishersh20 =
        $numextinguishersothers =
        $structuralopinion =
        $datestructuralopinion =
        $electricopinion =
        $dateelectricopinion =
        $firenetwork =
        $numhydrants =
        $tankcapacity =
        $percenttankfire =
        $alertsystem =
        $firedetection =
        $fireprotectionequipment =
        $capacityfireprotectionequipment =
        $autonomousbreathingequipment =
        $gastanklpstationary =
        $capacitygastanklpstationary =
        $gastanklpnotstationary =
        $howgastanklpnotstationar =
        $lpgasopinion =
        $datelpgasopinion =
        
        $flammablegases =
        $quantityflammablegases =
        $flammableliquids =
        $quantityflammableliquids =
        $combustibleliquids =
        $quantitycombustibleliquids =
        $combustiblesolids =
        $quantitycombustiblesolids =
        $explosivematerial =
        $quantityexplosivematerial =
        $electricsubstation =
        $capacityelectricsubstation =
        $codebranch =

        // Enterprise Complements
        // Extintores
        $extinguisherh20= 
        $extinguisherco2= 
        $extinguisherpqs= 
        $extinguisherk= 
        $extinguisherother=  
        $capextinguisherh20= 
        $capextinguisherco2= 
        $capextinguisherpqs= 
        $capextinguisherk= 
        $capextinguisherother= 
        // Señalamientos de Seguridad y Tipologias
        // Señales informativas
        $evacuationroute= 
        $leastriskarea=  
        $firstaid= 
        $stretcher=  
        $meetingpoint= 
        $emergencyexit= 
        $emergencystair=  
        $onlydesabilitiespeople= 
        $emergencycommunication= 
        $informationmodule= 
        $lookout= 
        // Señales Informativas de Emergencia
        $extinguisher=  
        $hydrant= 
        $alarmactivation= 
        $emergencyphone= 
        $emergencyequipment= 
        // Señales de Precaución
        $slipperyfloor= 
        $toxicsubstance=  
        $corrosivesubstance= 
        $flammablematerials=  
        $oxidizingmaterials= 
        $riskexplosionmaterials= 
        $electricrisk=  
        $laserradiationrisk= 
        $biologicalrisk= 
        $ionizingradiation= 
        // Señales Prohibitivas o Restrictivas
        $dontsmoking=  
        $dontfire= 
        $dontuseelevatoronemergency=  
        $dontunauthorizedpersons= 
        $dontrun= 
        $dontscream= 
        $dontpush=  
        // Señales de Obligación
        $usebadge=  
        $registrationaccess= 
        $parkobligation=  
        $vehicleinspection=  
        $packageinspection= 
        // Equipo de Proteccion Personal
        // Cabeza
        $impacthelmet= 
        $dielectrichelmet= 
        $hood= 
        // Ojos y Cara
        $protectiongoggles= 
        $goggles= 
        $faceshield= 
        $welderhelmet=  
        $weldergoggles= 
        // Oidos
        $earplug=  
        $acousticshell=  
        // Aparato Respiratorio
        $particulaterespirator= 
        $gasvaporrespirator= 
        $disposablemask= 
        $selfrespirator= 
        // Extremidades Superiores
        $chemicalglove= 
        $dielectricglove=  
        $extremetemperatureglove= 
        $glove= 
        $sleeve= 
        // Tronco
        $hightemperatureapron=  
        $chemicalapron= 
        $overol= 
        $coat= 
        $clothingdangeroussubstances= 
        // Extremidades Inferiores
        $occupationalfootwear=  
        $impactfootwear= 
        $conductivefootwear= 
        $dielectricfootwear= 
        $chemicalfootwear= 
        $leggins= 
        $waterproofboats=  
        // Otros
        $equipmentagainstfall=  
        $equipmentfirebrigade= 

        $active = $deleted =
        $buildingnumber =
        $suburb =
        $municipality =
        $postalcode =

        // $RFC =
        $idaddresstype =
        $idstate =
        $idcity =
        $street =

        $idphonetype =
        $phone =
        $idemailtype =
        $email =  

        //-----var ID PARTY
        $idpartyaddress = $idpartyphone =
        $idpartyemail = $idpartysocialmedia  = $idpartybankinfo = $idpartycompliance = "";



        //----Alerta
        $msj_error = $error_msg_first_regist = "";
    } 
 
    if ($urloper == "back" ) {
        $id = $code = $name = $observation
        //----- var Datos basicos
        // = $idparty = $tipo = $idenficationumber =$RFC
        = $idparty = $identificacion =$RFC =
              
        //------var links
        $sLink = $dLink = $pLink = $cLink = $flink = $fbnlink = 	
        //---var actions
        $action = 
        $urloper = "";
        //-----var ID PARTY
        $idpartyaddress = $idpartyphone =
        $idpartyemail = $idpartysocialmedia = $idpartybankinfo = $idpartycompliance = "";
        //----Alerta
        $msj_error = $error_msg_first_regist= "";
        // $arrayPHPmsgERROR = "";
        unset($arrayPHPmsgERROR);
    }     

    //BUSCAR por CI o por ID
    if (($urloper=="findid" || $urloper=="find") && ($RFC!="" || $id!="")){

        $dbl=new baseBL();       
        
        //buscar Empresa por ci
        if($id==""){    
            //buscar en party
            //$com_party_exists ="select id from core.party where rfc='$RFC' ";

            $com_party_exists ="select p.id from core.party p,core.enterprise e 
                where rfc='$RFC' and  e.codebranch='$codebranch' and p.id=e.idparty";
                $resul_party_exists=$dbl->executeScalar($com_party_exists); 

            // if (condition) {
            //     # code...
            //   }  

            if($resul_party_exists!=""){
                //buscar en consultingenterprise
                $comConsultingenterprise = "SELECT id FROM core.consultingenterprise 
                      WHERE idpartyenterprise='$resul_party_exists' 
                      AND idpartyconsultant='$idpartyconsultant'";
                $res=$dbl->executeScalar($comConsultingenterprise);        
                if ($res!="") {
                    //buscar en enterprise
                    $com="select a.rfc,a.password,a.registerdate,b.* FROM core.enterprise AS b,core.party AS a WHERE 
                    a.id= b.idparty and idparty='$resul_party_exists'";
                }else{
                    utilities::alert("Esta empresa pertenece a otro consultor");
                    $RFC="";
                }
            }else{
                $com="";               
            }
        }else{
            //buscar Empresa por id
            $com="Select a.rfc,a.password,a.registerdate,b.* FROM core.enterprise AS b,core.party AS a WHERE 
            a.id= b.idparty and b.id='$id'"; 
            
            //Buscar Enterprise complemennts
            $comcomplements="select * from core.enterprisecomplements where idparty=$resul_party_exists";

            $resul_person_complements=$dbl->executeReader($comcomplements);

        }       
                
        $resul_person=$dbl->executeReader($com);


        //si existe extraer datos
        if ($resul_person[0] != "" ) { 
            $RFC = $resul_person[0]["rfc"];
            $id = $resul_person[0]["id"];
            $code = $resul_person[0]["code"];
            $name = $resul_person[0]["name"];
            $idparty = $resul_person[0]["idparty"];	
            $bussinesname = $resul_person[0]["bussinesname"];	
            $registerdateandhour = $resul_person[0]["registerdate"]; 
            $password = $resul_person[0]["password"];	
            $buildingnamenumber = $resul_person[0]["buildingnamenumber"];	
  
            $landsurface = $resul_person[0]["landsurface"];	

            $buildedsurface = $resul_person[0]["buildedsurface"];	
            $buildingheight = $resul_person[0]["buildingheight"];	
            $legalrepresentative = $resul_person[0]["legalrepresentative"];	
            $manager = $resul_person[0]["manager"];	
            $responsiblepipc = $resul_person[0]["responsiblepipc"];	
            $economicactivity = $resul_person[0]["economicactivity"];	
            $permanentshedule = $resul_person[0]["permanentshedule"];	
            $buildingage = $resul_person[0]["buildingage"];	
            $numemployees = $resul_person[0]["numemployees"];	
            $numbrigadista = $resul_person[0]["numbrigadista"];	
            $numlevels = $resul_person[0]["numlevels"];	
            $areadata = $resul_person[0]["areadata"];	
            $maxcapacity = $resul_person[0]["maxcapacity"];	
            $accidentinsurance = $resul_person[0]["accidentinsurance"];	
            $insurancecompany = $resul_person[0]["insurancecompany"];	
            $numextinguisherspqs = $resul_person[0]["numextinguisherspqs"];	
            $numextinguishersco2 = $resul_person[0]["numextinguishersco2"];	
            $numextinguishersh20 = $resul_person[0]["numextinguishersh20"];	
            $numextinguishersothers = $resul_person[0]["numextinguishersothers"];	
            $companysecurityprovider = $resul_person[0]["companysecurityprovider"];	
            $securityofficer = $resul_person[0]["securityofficer"];	
            $nummorningsecurityelements = $resul_person[0]["nummorningsecurityelements"];	
            $numeveningsecurityelements = $resul_person[0]["numeveningsecurityelements"];	
            $numnightsecurityelements = $resul_person[0]["numnightsecurityelements"];	
            $structuralopinion = $resul_person[0]["structuralopinion"];	
            $datestructuralopinion = $resul_person[0]["datestructuralopinion"];	
            $electricopinion = $resul_person[0]["electricopinion"];	
            $dateelectricopinion = $resul_person[0]["dateelectricopinion"];	
            $firenetwork = $resul_person[0]["firenetwork "];	
            $numhydrants = $resul_person[0]["numhydrants"];	
            $tankcapacity = $resul_person[0]["tankcapacity"];	
            $percenttankfire = $resul_person[0]["percenttankfire"];	
            $alertsystem = $resul_person[0]["alertsystem"];	
            $firedetection = $resul_person[0]["firedetection"];	
            $fireprotectionequipment = $resul_person[0]["fireprotectionequipment"];	
            $capacityfireprotectionequipment = $resul_person[0]["capacityfireprotectionequipment"];	
            $autonomousbreathingequipment = $resul_person[0]["autonomousbreathingequipment"];	
            $gastanklpstationary = $resul_person[0]["gastanklpstationary"];	
            $capacitygastanklpstationary = $resul_person[0]["capacitygastanklpstationary"];	
            $gastanklpnotstationary = $resul_person[0]["gastanklpnotstationary"];	
            $howgastanklpnotstationar = $resul_person[0]["howgastanklpnotstationar"];	
            $lpgasopinion = $resul_person[0]["lpgasopinion"];	
            $datelpgasopinion = $resul_person[0]["datelpgasopinion"];	
            $flammablegases = $resul_person[0]["flammablegases"];	
            $quantityflammablegases = $resul_person[0]["quantityflammablegases"];	
            $flammableliquids = $resul_person[0]["flammableliquids"];	
            $quantityflammableliquids = $resul_person[0]["quantityflammableliquids"];	
            $combustibleliquids = $resul_person[0]["combustibleliquids"];	
            $quantitycombustibleliquids = $resul_person[0]["quantitycombustibleliquids"];	
            $combustiblesolids = $resul_person[0]["combustiblesolids"];	
            $quantitycombustiblesolids = $resul_person[0]["quantitycombustiblesolids"];	
            $explosivematerial = $resul_person[0]["explosivematerial"];	
            $quantityexplosivematerial = $resul_person[0]["quantityexplosivematerial"];	
            $electricsubstation = $resul_person[0]["electricsubstation"];	
            $capacityelectricsubstation = $resul_person[0]["capacityelectricsubstation"];	
            $codebranch = $resul_person[0]["codebranch"]; 

            // Enterprise Complements
            // Extintores
            $extinguisherh20= $resul_person_complements[0]["extinguisherh20"]; 
            $extinguisherco2=$resul_person_complements[0]["extinguisherco2"]; 
            $extinguisherpqs= $resul_person_complements[0]["extinguisherpqs"]; 
            $extinguisherk= $resul_person_complements[0]["extinguisherk"]; 
            $extinguisherother=  $resul_person_complements[0]["extinguisherother"]; 
            $capextinguisherh20= $resul_person_complements[0]["capextinguisherh20"]; 
            $capextinguisherco2= $resul_person_complements[0]["capextinguisherco2"]; 
            $capextinguisherpqs= $resul_person_complements[0]["capextinguisherpqs"]; 
            $capextinguisherk= $resul_person_complements[0]["capextinguisherk"]; 
            $capextinguisherother= $resul_person_complements[0]["capextinguisherother"]; 
            // Señalamientos de Seguridad y Tipologias
            // Señales informativas
            $evacuationroute= $resul_person_complements[0]["evacuationroute"]; 
            $leastriskarea=  $resul_person_complements[0]["leastriskarea"]; 
            $firstaid= $resul_person_complements[0]["firstaid"]; 
            $stretcher=  $resul_person_complements[0]["stretcher"]; 
            $meetingpoint= $resul_person_complements[0]["meetingpoint"]; 
            $emergencyexit= $resul_person_complements[0]["emergencyexit"]; 
            $emergencystair=  $resul_person_complements[0]["emergencystair"]; 
            $onlydesabilitiespeople= $resul_person_complements[0]["onlydesabilitiespeople"]; 
            $emergencycommunication= $resul_person_complements[0]["emergencycommunication"]; 
            $informationmodule= $resul_person_complements[0]["informationmodule"]; 
            $lookout= $resul_person_complements[0]["lookout"]; 
            // Señales Informativas de Emergencia
            $extinguisher=  $resul_person_complements[0]["extinguisher"]; 
            $hydrant= $resul_person_complements[0]["hydrant"]; 
            $alarmactivation= $resul_person_complements[0]["alarmactivation"]; 
            $emergencyphone= $resul_person_complements[0]["emergencyphone"]; 
            $emergencyequipment= $resul_person_complements[0]["emergencyequipment"]; 
            // Señales de Precaución
            $slipperyfloor= $resul_person_complements[0]["slipperyfloor"]; 
            $toxicsubstance= $resul_person_complements[0]["toxicsubstance"]; 
            $corrosivesubstance= $resul_person_complements[0]["corrosivesubstance"]; 
            $flammablematerials= $resul_person_complements[0]["flammablematerials"]; 
            $oxidizingmaterials= $resul_person_complements[0]["oxidizingmaterials"]; 
            $riskexplosionmaterials= $resul_person_complements[0]["riskexplosionmaterials"]; 
            $electricrisk= $resul_person_complements[0]["electricrisk"]; 
            $laserradiationrisk= $resul_person_complements[0]["laserradiationrisk"]; 
            $biologicalrisk= $resul_person_complements[0]["biologicalrisk"]; 
            $ionizingradiation= $resul_person_complements[0]["ionizingradiation"]; 
            // Señales Prohibitivas o Restrictivas
            $dontsmoking=  $resul_person_complements[0]["dontsmoking"]; 
            $dontfire= $resul_person_complements[0]["dontfire"]; 
            $dontuseelevatoronemergency=  $resul_person_complements[0]["dontuseelevatoronemergency"]; 
            $dontunauthorizedpersons= $resul_person_complements[0]["dontunauthorizedpersons"]; 
            $dontrun= $resul_person_complements[0]["dontrun"]; 
            $dontscream= $resul_person_complements[0]["dontscream"]; 
            $dontpush= $resul_person_complements[0]["dontpush"]; 
            // Señales de Obligación
            $usebadge= $resul_person_complements[0]["usebadge"];  
            $registrationaccess= $resul_person_complements[0]["registrationaccess"]; 
            $parkobligation= $resul_person_complements[0]["parkobligation"];  
            $vehicleinspection= $resul_person_complements[0]["vehicleinspection"]; 
            $packageinspection= $resul_person_complements[0]["packageinspection"]; 
            // Equipo de Proteccion Personal
            // Cabeza
            $impacthelmet= $resul_person_complements[0]["impacthelmet"]; 
            $dielectrichelmet= $resul_person_complements[0]["dielectrichelmet"]; 
            $hood= $resul_person_complements[0]["hood"]; 
            // Ojos y Cara
            $protectiongoggles= $resul_person_complements[0]["protectiongoggles"]; 
            $goggles= $resul_person_complements[0]["goggles"]; 
            $faceshield= $resul_person_complements[0]["faceshield"]; 
            $welderhelmet= $resul_person_complements[0]["welderhelmet"]; 
            $weldergoggles= $resul_person_complements[0]["weldergoggles"]; 
            // Oidos
            $earplug= $resul_person_complements[0]["earplug"];  
            $acousticshell= $resul_person_complements[0]["acousticshell"]; 
            // Aparato Respiratorio
            $particulaterespirator= $resul_person_complements[0]["particulaterespirator"]; 
            $gasvaporrespirator= $resul_person_complements[0]["gasvaporrespirator"]; 
            $disposablemask= $resul_person_complements[0]["disposablemask"]; 
            $selfrespirator= $resul_person_complements[0]["selfrespirator"]; 
            // Extremidades Superiores
            $chemicalglove= $resul_person_complements[0]["chemicalglove"]; 
            $dielectricglove= $resul_person_complements[0]["dielectricglove"]; 
            $extremetemperatureglove= $resul_person_complements[0]["extremetemperatureglove"]; 
            $glove= $resul_person_complements[0]["glove"]; 
            $sleeve= $resul_person_complements[0]["sleeve"]; 
            // Tronco
            $hightemperatureapron= $resul_person_complements[0]["hightemperatureapron"];  
            $chemicalapron= $resul_person_complements[0]["chemicalapron"]; 
            $overol= $resul_person_complements[0]["overol"]; 
            $coat= $resul_person_complements[0]["coat"]; 
            $clothingdangeroussubstances= $resul_person_complements[0]["clothingdangeroussubstances"]; 
            // Extremidades Inferiores
            $occupationalfootwear= $resul_person_complements[0]["occupationalfootwear"];  
            $impactfootwear= $resul_person_complements[0]["impactfootwear"]; 
            $conductivefootwear= $resul_person_complements[0]["conductivefootwear"]; 
            $dielectricfootwear= $resul_person_complements[0]["dielectricfootwear"]; 
            $chemicalfootwear= $resul_person_complements[0]["chemicalfootwear"]; 
            $leggins= $resul_person_complements[0]["leggins"]; 
            $waterproofboats= $resul_person_complements[0]["waterproofboats"]; 
            // Otros
            $equipmentagainstfall= $resul_person_complements[0]["equipmentagainstfall"];  
            $equipmentfirebrigade= $resul_person_complements[0]["equipmentfirebrigade"]; 

            $active = $resul_person[0]["active"];
            $deleted = $resul_person[0]["deleted"];                
            $registerdate = str_replace(" 00:00:00", "", $registerdateandhour );

        }
       
        if($idpartyaddress == "" &&
            $idpartyphone == "" &&
            $idpartyemail == "" &&
            $idpartysocialmedia == "" &&
            //   $idpartycompliance == "" && 
            $urloper=="findid") {            
                if ($resul_person[0] != "") { 
                    //utilities::alert("Cliente Registrado en el Sistema");
                }else{
                    if ($RFC!="") {
                        utilities::alert(" NO se encuentra registrado");
                    }
                }            
        }         
        
        //buscar una direccion segun su id y segun el idparty
         
        
        if ($idpartyaddress!= ""){
            $dbl= new baseBL();
            $com="SELECT * from core.address where idparty='$idparty' and id='$idpartyaddress'";
                   
            $resul_address=$dbl->executeReader($com);

            foreach($resul_address as $valkey){     
                $idaddresstype = $valkey["idaddresstype"];
                $idcountry = $valkey["idcountry"];
                $idstate = $valkey["idstate"];
                $idcity = $valkey["idcity"];
                $suburb = $valkey["suburb"];
                $municipality = $valkey["municipality"];
                $avenue = $valkey["avenue"];
                $building = $valkey["building"];
                $street = $valkey["street"];
                $buildingnumber = $valkey["buildingnumber"]; 
                $postalcode = $valkey["postalcode"]; 
                //  $active_address = $valkey["active"];
            }  
        }         
        //buscar un telef segun su id y segun el idparty
        if ($idpartyphone!= ""){
            $dbl=new baseBL();
            $com="SELECT * from core.phone where idparty='$idparty' and id='$idpartyphone'";       
            $resul_phone=$dbl->executeReader($com);

            foreach($resul_phone as $valkey){     
                $idphonetype = $valkey["idphonetype"];
                // $countrycode = $valkey["countrycode"];
                // $areacode = $valkey["areacode"];
                $phone = $valkey["content"];
                //  $active_phone = $valkey["active"];
                
                // $com="select id from base.country where internationalphonecode='".$countrycode."'";
                // $idcountrycode=$bl->executeScalar($com);                
              
                // $phone = $countrycode.$areacode.$number;    
            } 
        }   

        //buscar una email segun su id y segun el idparty
        if ($idpartyemail!= ""){

            $dbl=new baseBL();
            $com="SELECT * from core.email where idparty='$idparty' and id='$idpartyemail'";       
            $resul_email=$dbl->executeReader($com);

            foreach($resul_email as $valkey){     
                $email = $valkey["content"];
                $idemailtype = $valkey["idemailtype"];

                //   $active_email = $valkey["active"];
            }       

        }
       
    }   

    
    //validar datos Empresales I
    //    if($fullname=="" ||  $firstname=="" ||  $lastname=="" || 
    //        $birthdate=="" ||  $idcountrynationality==""){
    //        $msj_error .= "Datos Empresales I estan incompletos. "; 
    //    }    
    if(($bussinesname=="" ||  $registerdate=="" ||  $buildingnamenumber=="" || 
        // $birthdate =="" ||
        // $birthplace =="" ||
        // $monthlyincome =="" ||
        // $idcivilstate =="" ||
        // $ideconomicalactivity =="" ||
        // $idcountrynationality =="" ||
        // $idoccupation =="" ||
        // $idcountrybirth =="" ||
        // $password=="" ||
        $landsurface=="" ||
        $buildedsurface=="" ||
        $buildingheight=="" ||
        $legalrepresentative=="" ||
        $manager=="" ||
        $responsiblepipc=="" ||
        $economicactivity=="" ||
        $permanentshedule=="" ||
        $buildingage=="" ||
        $numemployees=="" ||

        $numlevels=="" ||
        $areadata=="" ||
        $maxcapacity=="" 





        ) && ($RFC!="")  
        // $idgender==""  
    ){
        // $agreementdbl = new agreementBL();
        // $msg_BL_error .=$agreementdbl->validatemsg();
        // if ($dbl->validate()==true){      
        $msj_error .= "Debe completar los datos Basicos Empresariales obligatorios(*). "; 
        // }
        if (
            $landsurface=="" ||
            $buildedsurface=="" ||
            $buildingheight=="" ||
            $legalrepresentative=="" ||
            $manager=="" ||
            $responsiblepipc=="" ||
            $economicactivity=="" ||
            $permanentshedule=="" ||
            $buildingage=="" ||
            $numemployees=="" ||

            $numlevels=="" ||
            $areadata=="" ||
            $maxcapacity=="" ) {
                $arrayPHPmsgERROR[]=3;
                $arrayPHPmsgERROR[]=4;
                $arrayPHPmsgERROR[]=5;
        }
    }      
    
    //validar edad
    // if($birthdate!=""){
    //     list($año,$mes ,$día ) = split('[/.-]', $birthdate);
    //         $toyear= date("Y");           
    //         $tomoths= date("m")+1;
    //         $today= date("d");
    //         $edad = ($toyear + 1900) - $año;

    //     if ($tomoths<$mes){
    //         $edad--;
    //     }
    //     if (($mes == $tomoths) && ($today < $día)){
    //         $edad--;
    //     }
    //     if ($edad > 1900){
    //         $edad -= 1900;
    //     }
    //     if ($edad<18 ){
    //         $msj_error .=("Fecha de nacimiento pertenece a un menor de edad. ");
    //     }        
    // }
    
    //validar registro por primera vez
    if($email=="" && $idemailtype =="" && $idphonetype =="" && $phone =="" && $id=="" && $urloper == "save"){
        $error_msg_first_regist .= "Debe registar minimo un teléfono y un correo. ";
        $arrayPHPmsgERROR[]=1;
        $arrayPHPmsgERROR[]=2;    
    } else {
        if($email=="" && $id=="" && $urloper == "save"){
            $error_msg_first_regist .= "Debe registar un correo. ";
            $arrayPHPmsgERROR[]=2; 
        }
        // if($idphonetype =="" && $countrycode =="" && $areacode =="" && 
        //         $number =="" && $id=="" && $urloper == "save"){
        if($idphonetype =="" &&  
                $phone =="" && $id=="" && $urloper == "save"){
            $error_msg_first_regist .= "Debe registar un teléfono. ";
            $arrayPHPmsgERROR[]=1;
        }  
        if(($idphonetype !="" || $phone !="")
                && $id=="" && $urloper == "save"){
            $dbl=new baseBL(); 

            // if(($idphonetype !="" || $countrycode !="" || $areacode !="" || $number !="")
            //         && $id=="" && $urloper == "save"){

            // $arrayphone=array($idphonetype,$countrycode,$areacode,$number);

            $arrayphone=array($idphonetype,$phone);
            if (in_array("", $arrayphone)) {
                $error_msg_first_regist .= "Los datos del teléfono estan incompletos. ";
                $arrayPHPmsgERROR[]=1;
            }
            $com="select id from core.phone where idphonetype='$idphonetype' and "
                    . "and content='$phone' ";
                        
            $resulvalidate=$dbl->executeReader($com);  
            if($resulvalidate!=""){
                $error_msg_first_regist .="El Teléfono ya se encuentra asociado a otro usuario. ";
                $arrayPHPmsgERROR[]=1;
            }             
        }

        if(($idemailtype !="" || $email !="")
                && $id=="" && $urloper == "save"){
            $arrayemail=array($idemailtype,$email);
            if (in_array("", $arrayemail)) {
                $error_msg_first_regist .= "Los datos del correo estan incompletos. ";
                $arrayPHPmsgERROR[]=2;
            }          
        }    
        
    }
                 

    if(  $buildingnumber=="" &&
        $suburb=="" &&
        $municipality=="" &&
        $postalcode=="" &&
        // $RFC=="" &&
        // $idaddresstype=="" &&
        $idstate=="" &&
        // $idcity=="" &&
        $street=="" && $id=="" && $urloper == "save"){
            $error_msg_first_regist .= "Debe registar minimo una direccion Fiscal. ";
            $arrayPHPmsgERROR[]=0;
    }else{
        if(($buildingnumber!="" ||
            $suburb!="" ||
            $municipality!="" ||
            $postalcode!="" ||
            // $RFC!="" ||
            // $idaddresstype!="" ||
            $idstate!="" ||
            // $idcity!="" ||
            $street!="")
            && $id=="" && $urloper == "save"){
                $dbl=new baseBL(); 
                $arrayaddress=array($buildingnumber,$suburb,$municipality,$postalcode,$idstate,$street);
   
                if (in_array("", $arrayaddress)) {
                    $error_msg_first_regist .= "Los datos de la direccion fiscal estan incompletos. ";
                    $arrayPHPmsgERROR[]=0;
                }
                $com="select id from party.partyaddress where idaddresstype='$idaddresstype' "
                        . " and idstate='$idstate' "
                        . " and municipality='$municipality' "
                        . " and street='$street' "
                        . " and suburb='$suburb' "
                        . " and buildingnumber='$buildingnumber' "
                        . " and postalcode='$postalcode' ";
                        
                $resulvalidate=$dbl->executeReader($com); 
                if($resulvalidate!=""){
                    $error_msg_first_regist .="Esta direccion ya se encuentra asociado a otra empresa/usuario. ";
                    $arrayPHPmsgERROR[]=0;
                }         
        }

    }
  
    
    //msj ALERTA
    if(($msj_error!="" || $error_msg_first_regist!="")
        && $urloper == "save"){
        utilities::alert($msj_error.$error_msg_first_regist);
    }  
    
    
    // GUARDAR 
    if ($urloper == "save" && ($msj_error=="" && $error_msg_first_regist=="")) {
         $dbl=new baseBL();
        //consultar si existe la ci

        if($RFC!=""){           
            $com_party_exists="select id from core.party where rfc='$RFC'";
         
            $resul_party_exists=$dbl->executeScalar($com_party_exists);

    
            //si existe buscar id de person
            if($resul_party_exists!=""){
                $com="select id FROM core.enterprise where idparty='$resul_party_exists'";
                $id=$dbl->executeScalar($com);
           
                //si existe en person buscar el idparty y el idpartycompliance
                if ($id!=""){
                    //   if($msj_error==""){
                        $com="select idparty from core.enterprise where id='$id'";
                        $idparty=$dbl->executeScalar($com);  
                        $oper = "update";   
                //sino existe, se debe validar datos para registrar    
                } else {
                    if($msj_error=="" && $error_msg_first_regist==""){
                        $idparty=$resul_party_exists;
                        $oper = "insert";                        
                    }else{
                        //   utilities::alert($msj_error.$error_msg_first_regist);
                    }              
                }
            //sino existe se debe validar datos y registrar en party 
            }else{
                if($msj_error=="" && $error_msg_first_regist==""){
                    $com="Select core.isspinspartyid(NULL,'$bussinesname',NULL,'".md5($password)."','$RFC','$registerdate',"
                        . "'$active','$deleted')";   

                    $idparty=$dbl->executeScalar($com);

                    $com="INSERT INTO core.consultingenterprise 
                            (idpartyconsultant,idpartyenterprise)
                        VALUES ('$idpartyconsultant','$idparty')";
                    $dbl->executeScalar($com);

                    $oper = "insert";                      
                }else{
                    //   utilities::alert($msj_error.$error_msg_first_regist);
                }                                  
            }            
        }
    }


    //var_dump($ID);
                        
    // var_dump($idparty);

    //var_dump('Antes de entrar a guardar: '.$iddocumententerprise);

    // guardar savedocumententerprise
    if ($savedocumententerprise=="savedocumententerprise" ) {
        $dbl=new baseBL();
        $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                "dot","xlsm","xlsb","xltx");   

        if(myUtilities::validFile("pathenterprise",5000000, $arrayFileType)==false){
            $valid = false;
            // myUtilities::alert("el archivo tiene que ser pdf");            
        } else {
            $idparty=$_SESSION["idpartyenterprise"];
            $pathnameenterprise="document/".$idparty."-". basename($_FILES['pathenterprise']['name']);

            if ($iddocumententerprise=="") {

                $com="SELECT id from core.document where iddocumenttype='$iddocumenttypeenterprise' 
                      and idparty='$idparty' and delete='N'";
                //var_dump($com);
                $idexist=$dbl->executeScalar($com);

                // var_dump($idexist);
                if($idexist==""){

                    if (move_uploaded_file($_FILES["pathenterprise"]["tmp_name"], $pathnameenterprise)) {
                        $doctype='DOCSENTERPRISE';
                        $com ='INSERT INTO core.document 
                        (code,iddocumenttype,iddocumentstatus, "path",idparty)
                        VALUES ('."'".$doctype."'".','.$iddocumenttypeenterprise.','.$iddocumentstatusenterprise.','."'".$pathnameenterprise."'".','.$idparty.') RETURNING id';
                        $iddocumententerprise=$dbl->executeScalar($com);
                        // var_dump($com);
                        if ($iddocumententerprise!="") {

                            utilities::alert("Registro exitoso");
                            $iddocumententerprise =
                            $iddocumentstatusenterprise =
                            $iddocumenttypeenterprise = 
                            $pathenterprise = "";
                            $savedocumententerprise = "";
                        }else{
                            utilities::alert("Registro de documento fallido");
                        }
                    }else{
                          utilities::alert("Error al guardar el archivo");
                    }
                }else{
                    // Solucion Temporal
                    $iddocumententerprise=$idexist;

                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypeenterprise.' ,
                    iddocumentstatus='.$iddocumentstatusenterprise.',
                    "path" = '."'".$pathnameenterprise."'".'
                    WHERE id='.$iddocumententerprise.' RETURNING id';
                    //var_dump($com);
                    $iddocumententerprise=$dbl->executeScalar($com);
                    // var_dump($iddocument);
                    if ($iddocumententerprise>0 && $iddocumententerprise!="") {
                        $iddocumententerprise =
                        $iddocumentstatusenterprise =
                        $iddocumenttypeenterprise =
                        $savedocumententerprise = "";
                        $pathnameenterprise =
                        $pathenterprise = "";
                    }else{
                        utilities::alert("registro fallido core.document 1");
                    }                  
                }

              
            } else {
                if (move_uploaded_file($_FILES["pathenterprise"]["tmp_name"], $pathnameenterprise)) {
                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypeenterprise.' ,
                    iddocumentstatus='.$iddocumentstatusenterprise.',
                    "path" = '."'".$pathnameenterprise."'".'
                    WHERE id='.$iddocumententerprise.' RETURNING id';
                    //var_dump($com);
                    $iddocumententerprise=$dbl->executeScalar($com);
                    //var_dump("iddocument->".$iddocument);

                    if ($iddocumententerprise>0 && $iddocumententerprise!="") {
                        $iddocumententerprise =
                        $iddocumentstatusenterprise =
                        $iddocumenttypeenterprise =
                        $savedocumententerprise = "";
                        $pathnameenterprise =
                        $pathenterprise = "";
                    }else{
                        utilities::alert("registro fallido core.document 2");
                    }
              }else{                
                    utilities::alert("registro fallido core.document 3");
              }
            }
        }
    }
        
    if ($iddocumententerprise!="" && $savedocumententerprise!="savedocumententerprise") {
              $com='SELECT 
                iddocumenttype,
                iddocumentstatus,
                "path"
                FROM core.document WHERE id='.$iddocumententerprise.'';
                // var_dump($com);
                $resulenterprise=$dbl->executeReader($com);
                if ($resulenterprise[0] != "") { 
                    $iddocumenttypeenterprise = $resulenterprise[0]["iddocumenttype"];
                    $iddocumentstatusenterprise = $resulenterprise[0]["iddocumentstatus"];
                    $pathenterprise = $resulenterprise[0]["path"];
                }     
    } else {
    # code...
    }

    // guardar savedocumentpay
    if ($savedocumentpay=="savedocumentpay" ) {
        $dbl=new baseBL();
        $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                "dot","xlsm","xlsb","xltx");   

        if(myUtilities::validFile("pathpay",5000000, $arrayFileType)==false){
            $valid = false;
            // myUtilities::alert("el archivo tiene que ser pdf");            
        } else {
            $idparty=$_SESSION["idpartyenterprise"];
            $pathnamepay="document/".$idparty."-". basename($_FILES['pathpay']['name']);

            if ($iddocumentpay=="") {

                $com="SELECT id from core.document where iddocumenttype='$iddocumenttypepay' 
                      and idparty='$idparty' and delete='N'";
                //var_dump($com);
                $idexist=$dbl->executeScalar($com);

                // var_dump($idexist);
                if($idexist==""){

                    if (move_uploaded_file($_FILES["pathpay"]["tmp_name"], $pathnamepay)) {
                        $doctype='DOCSPAY';
                        $com ='INSERT INTO core.document 
                        (code,iddocumenttype,iddocumentstatus, "path",idparty)
                        VALUES ('."'".$doctype."'".','.$iddocumenttypepay.','.$iddocumentstatuspay.','."'".$pathnamepay."'".','.$idparty.') RETURNING id';
                        $iddocumentpay=$dbl->executeScalar($com);
                        //var_dump($com);
                        if ($iddocumentpay!="") {

                            utilities::alert("Registro exitoso");
                            $iddocumentpay =
                            $iddocumentstatuspay =
                            $iddocumenttypepay = 
                            $pathpay = "";
                            $savedocumentpay = "";
                        }else{
                            utilities::alert("Registro de documento fallido");
                        }
                    }else{
                          utilities::alert("Error al guardar el archivo");
                    }
                }else{
                    // Solucion Temporal
                    $iddocumentpay=$idexist;

                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypepay.' ,
                    iddocumentstatus='.$iddocumentstatuspay.',
                    "path" = '."'".$pathnamepay."'".'
                    WHERE id='.$iddocumentpay.' RETURNING id';
                    //var_dump($com);
                    $iddocumentpay=$dbl->executeScalar($com);
                    // var_dump($iddocument);
                    if ($iddocumentpay>0 && $iddocumentpay!="") {
                        $iddocumentpay =
                        $iddocumentstatuspay =
                        $iddocumenttypepay =
                        $savedocumentpay = "";
                        $pathnamepay =
                        $pathpay = "";
                    }else{
                        utilities::alert("registro fallido core.document 1");
                    }                  
                }

              
            } else {
                if (move_uploaded_file($_FILES["pathpay"]["tmp_name"], $pathnamepay)) {
                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypepay.' ,
                    iddocumentstatus='.$iddocumentstatuspay.',
                    "path" = '."'".$pathnamepay."'".'
                    WHERE id='.$iddocumentpay.' RETURNING id';
                    //var_dump($com);
                    $iddocumentpay=$dbl->executeScalar($com);
                    //var_dump("iddocument->".$iddocument);

                    if ($iddocumentpay>0 && $iddocumentpay!="") {
                        $iddocumentpay =
                        $iddocumentstatuspay =
                        $iddocumenttypepay =
                        $savedocumentpay = "";
                        $pathnamepay =
                        $pathpay = "";
                    }else{
                        utilities::alert("registro fallido core.document 2");
                    }
              }else{                
                    utilities::alert("registro fallido core.document 3");
              }
            }
        }
    }
        
    if ($iddocumentpay!="" && $savedocumentpay!="savedocumentpay") {
              $com='SELECT 
                iddocumenttype,
                iddocumentstatus,
                "path"
                FROM core.document WHERE id='.$iddocumentpay.'';
                // var_dump($com);
                $resulpay=$dbl->executeReader($com);
                if ($resulpay[0] != "") { 
                    $iddocumenttypepay = $resulpay[0]["iddocumenttype"];
                    $iddocumentstatuspay = $resulpay[0]["iddocumentstatus"];
                    $pathpay = $resulpay[0]["path"];
                }     
    } else {
    # code...
    }

    // guardar savedocumentdictum
    if ($savedocumentdictum=="savedocumentdictum" ) {
        $dbl=new baseBL();
        $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                "dot","xlsm","xlsb","xltx");   

        if(myUtilities::validFile("pathdictum",5000000, $arrayFileType)==false){
            $valid = false;
            // myUtilities::alert("el archivo tiene que ser pdf");            
        } else {
            $idparty=$_SESSION["idpartyenterprise"];
            $pathnamedictum="document/".$idparty."-". basename($_FILES['pathdictum']['name']);

            if ($iddocumentdictum=="") {

                $com="SELECT id from core.document where iddocumenttype='$iddocumenttypedictum' 
                      and idparty='$idparty' and delete='N'";
                //var_dump($com);
                $idexist=$dbl->executeScalar($com);

                // var_dump($idexist);
                if($idexist==""){

                    if (move_uploaded_file($_FILES["pathdictum"]["tmp_name"], $pathnamedictum)) {
                        $doctype='DOCSDICTUM';
                        $com ='INSERT INTO core.document 
                        (code,iddocumenttype,iddocumentstatus, "path",idparty)
                        VALUES ('."'".$doctype."'".','.$iddocumenttypedictum.','.$iddocumentstatusdictum.','."'".$pathnamedictum."'".','.$idparty.') RETURNING id';
                        $iddocumentdictum=$dbl->executeScalar($com);
                        // var_dump($com);
                        if ($iddocumentdictum!="") {

                            utilities::alert("Registro exitoso");
                            $iddocumentdictum =
                            $iddocumentstatusdictum =
                            $iddocumenttypedictum = 
                            $pathdictum = "";
                            $savedocumentdictum = "";
                        }else{
                            utilities::alert("Registro de documento fallido");
                        }
                    }else{
                          utilities::alert("Error al guardar el archivo");
                    }
                }else{
                    // Solucion Temporal
                    $iddocumentdictum=$idexist;

                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypedictum.' ,
                    iddocumentstatus='.$iddocumentstatusdictum.',
                    "path" = '."'".$pathnamedictum."'".'
                    WHERE id='.$iddocumentdictum.' RETURNING id';
                    //var_dump($com);
                    $iddocumentdictum=$dbl->executeScalar($com);
                    // var_dump($iddocument);
                    if ($iddocumentdictum>0 && $iddocumentdictum!="") {
                        $iddocumentdictum =
                        $iddocumentstatusdictum =
                        $iddocumenttypedictum =
                        $savedocumentdictum = "";
                        $pathnamedictum =
                        $pathdictum = "";
                    }else{
                        utilities::alert("registro fallido core.document 1");
                    }                  
                }

              
            } else {
                if (move_uploaded_file($_FILES["pathdictum"]["tmp_name"], $pathnamedictum)) {
                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypedictum.' ,
                    iddocumentstatus='.$iddocumentstatusdictum.',
                    "path" = '."'".$pathnamedictum."'".'
                    WHERE id='.$iddocumentdictum.' RETURNING id';
                    //var_dump($com);
                    $iddocumentdictum=$dbl->executeScalar($com);
                    //var_dump("iddocument->".$iddocument);

                    if ($iddocumentdictum>0 && $iddocumentdictum!="") {
                        $iddocumentdictum =
                        $iddocumentstatusdictum =
                        $iddocumenttypedictum =
                        $savedocumentdictum = "";
                        $pathnamedictum =
                        $pathdictum = "";
                    }else{
                        utilities::alert("registro fallido core.document 2");
                    }
              }else{                
                    utilities::alert("registro fallido core.document 3");
              }
            }
        }
    }
        
    if ($iddocumentdictum!="" && $savedocumentdictum!="savedocumentdictum") {
              $com='SELECT 
                iddocumenttype,
                iddocumentstatus,
                "path"
                FROM core.document WHERE id='.$iddocumentdictum.'';
                // var_dump($com);
                $resuldictum=$dbl->executeReader($com);
                if ($resuldictum[0] != "") { 
                    $iddocumenttypedictum = $resuldictum[0]["iddocumenttype"];
                    $iddocumentstatusdictum = $resuldictum[0]["iddocumentstatus"];
                    $pathdictum = $resuldictum[0]["path"];
                }     
    } else {
    # code...
    }

    // guardar savedocumentinsurance
    if ($savedocumentinsurance=="savedocumentinsurance" ) {
        $dbl=new baseBL();
        $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                "dot","xlsm","xlsb","xltx");   

        if(myUtilities::validFile("pathinsurance",5000000, $arrayFileType)==false){
            $valid = false;
            // myUtilities::alert("el archivo tiene que ser pdf");            
        } else {
            $idparty=$_SESSION["idpartyenterprise"];
            $pathnameinsurance="document/".$idparty."-". basename($_FILES['pathinsurance']['name']);

            if ($iddocumentinsurance=="") {

                $com="SELECT id from core.document where iddocumenttype='$iddocumenttypeinsurance' 
                      and idparty='$idparty' and delete='N'";
                //var_dump($com);
                $idexist=$dbl->executeScalar($com);

                // var_dump($idexist);
                if($idexist==""){

                    if (move_uploaded_file($_FILES["pathinsurance"]["tmp_name"], $pathnameinsurance)) {
                        $doctype='DOCSINSURANCE';
                        $com ='INSERT INTO core.document 
                        (code,iddocumenttype,iddocumentstatus, "path",idparty)
                        VALUES ('."'".$doctype."'".','.$iddocumenttypeinsurance.','.$iddocumentstatusinsurance.','."'".$pathnameinsurance."'".','.$idparty.') RETURNING id';
                        $iddocumentinsurance=$dbl->executeScalar($com);
                        // var_dump($com);
                        if ($iddocumentinsurance!="") {

                            utilities::alert("Registro exitoso");
                            $iddocumentinsurance =
                            $iddocumentstatusinsurance =
                            $iddocumenttypeinsurance = 
                            $pathinsurance = "";
                            $savedocumentinsurance = "";
                        }else{
                            utilities::alert("Registro de documento fallido");
                        }
                    }else{
                          utilities::alert("Error al guardar el archivo");
                    }
                }else{
                    // Solucion Temporal
                    $iddocumentinsurance=$idexist;

                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypeinsurance.' ,
                    iddocumentstatus='.$iddocumentstatusinsurance.',
                    "path" = '."'".$pathnameinsurance."'".'
                    WHERE id='.$iddocumentinsurance.' RETURNING id';
                    //var_dump($com);
                    $iddocumentinsurance=$dbl->executeScalar($com);
                    // var_dump($iddocument);
                    if ($iddocumentinsurance>0 && $iddocumentinsurance!="") {
                        $iddocumentinsurance =
                        $iddocumentstatusinsurance =
                        $iddocumenttypeinsurance =
                        $savedocumentinsurance = "";
                        $pathnameinsurance =
                        $pathinsurance = "";
                    }else{
                        utilities::alert("registro fallido core.document 1");
                    }                  
                }

              
            } else {
                //var_dump($pathnameinsurance);
                if (move_uploaded_file($_FILES["pathinsurance"]["tmp_name"], $pathnameinsurance)) {
                    $com='UPDATE core.document 
                    SET 
                    iddocumenttype='.$iddocumenttypeinsurance.' ,
                    iddocumentstatus='.$iddocumentstatusinsurance.',
                    "path" = '."'".$pathnameinsurance."'".'
                    WHERE id='.$iddocumentinsurance.' RETURNING id';
                    //var_dump($com);
                    $iddocumentinsurance=$dbl->executeScalar($com);
                    //var_dump("iddocument->".$iddocument);

                    if ($iddocumentinsurance>0 && $iddocumentinsurance!="") {
                        $iddocumentinsurance =
                        $iddocumentstatusinsurance =
                        $iddocumenttypeinsurance =
                        $savedocumentinsurance = "";
                        $pathnameinsurance =
                        $pathinsurance = "";
                    }else{
                        utilities::alert("registro fallido core.document 2");
                    }
              }else{                
                    utilities::alert("registro fallido core.document 3");
              }
            }
        }
    }
        
    if ($iddocumentinsurance!="" && $savedocumentinsurance!="savedocumentinsurance") {
              $com='SELECT 
                iddocumenttype,
                iddocumentstatus,
                "path"
                FROM core.document WHERE id='.$iddocumentinsurance.'';
                // var_dump($com);
                $resulinsurance=$dbl->executeReader($com);
                if ($resulinsurance[0] != "") { 
                    $iddocumenttypeinsurance = $resulinsurance[0]["iddocumenttype"];
                    $iddocumentstatusinsurance = $resulinsurance[0]["iddocumentstatus"];
                    $pathinsurance = $resulinsurance[0]["path"];
                }     
    } else {
    # code...
    }

    //----OBJETOS
    $dbl = new agreementBL($code, $name,$idparty,

    $bussinesname,
    $registerdate,
    $buildingnamenumber,

    $landsurface,
    $buildedsurface,
    $buildingheight,

    $legalrepresentative,
    $manager,
    $responsiblepipc,
    $economicactivity,
    $permanentshedule,
    $numemployees,

    $buildingage,
    $numlevels,
    $areadata,
    $maxcapacity,

    $companysecurityprovider,
    $securityofficer,
    $nummorningsecurityelements,
    $numeveningsecurityelements,
    $numnightsecurityelements,

    $numbrigadista,
    $accidentinsurance,
    $insurancecompany,
    $numextinguisherspqs,
    $numextinguishersco2,
    $numextinguishersh20,
    $numextinguishersothers,
    $structuralopinion,
    $datestructuralopinion,
    $electricopinion,
    $dateelectricopinion,
    $firenetwork,
    $numhydrants,
    $tankcapacity,
    $percenttankfire,
    $alertsystem,
    $firedetection,
    $fireprotectionequipment,
    $capacityfireprotectionequipment,
    $autonomousbreathingequipment,
    $gastanklpstationary,
    $capacitygastanklpstationary,
    $gastanklpnotstationary,
    $howgastanklpnotstationar,
    $lpgasopinion,
    $datelpgasopinion,
    
    $flammablegases,
    $quantityflammablegases,
    $flammableliquids,
    $quantityflammableliquids,
    $combustibleliquids,
    $quantitycombustibleliquids,
    $combustiblesolids,
    $quantitycombustiblesolids,
    $explosivematerial,
    $quantityexplosivematerial,
    $electricsubstation,
    $capacityelectricsubstation,
    $codebranch,

    $active, $deleted);

    $partyaddressbl = new partyaddressBL($code, $name ,
    $idparty,
    $buildingnumber,
    $suburb,
    $municipality,
    $postalcode,
    // $RFC,
    $idaddresstype,
    $idstate,
    $idcity,
    $street,

    // $idphonetype,
    // $phone,        
    $active, $deleted); 


    $phonebl = new partyphoneBL($code, $name, $idparty, $idphonetype,
        $phone, $active, $deleted);
 
    $emailbl = new partyemailBL($code,$name,$idparty,$idemailtype,$email,
        $active,$deleted);       

 

    $dbl->buildLinks("agreementPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
    $bpl = new basePL("document.agreementPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


    if ($id != "") {
            $arPar_person[] = $id;
    } 
    if ($idpartyaddress != "") {
            $arPar_address[] = $idpartyaddress;
    }
    if($urloper != "save" && $idpartyaddress == ""){
            $arPar_address[] = "";
    }
           
    if ($idpartyphone != "") {
            $arPar_phone[] = $idpartyphone;
    }
    if($urloper != "save" && $idpartyphone == ""){
            $arPar_phone[] = "";
    } 
    if ($idpartyemail != "") {
            $arPar_email[] = $idpartyemail;
    }
    if($urloper != "save" && $idpartyemail == ""){
            $arPar_email[] = "";
    }
     


    if ($urloper == "save" && $idpartyaddress ==  "" && $idparty!="") {
            $operaddress = "insert";
    }
    if ($urloper == "save" && $idpartyaddress != "" && $idparty!="") {
            $operaddress = "update";
    }       
    if ($urloper == "save" && $idpartyphone ==  "" && $idparty!="") {
            $operphone = "insert";
    }
    if ($urloper == "save" && $idpartyphone != "" && $idparty!="") {
            $operphone = "update";
    }     
    if ($urloper == "save" && $idpartyemail ==  "" && $idparty!="") {
            $operemail = "insert";
    }
    if ($urloper == "save" && $idpartyemail != "" && $idparty!="") {
            $operemail = "update";
    }    
    
    if($urloper=="findid" || $urloper=="find"){
        $buildArray_person="buildArray_findid";
        $buildArray="buildArray_findid";        
    }else{
        $buildArray_person="buildArray_person";
        $buildArray="buildArray";        
    }
    
    
    // crear array person
    $dbl->$buildArray_person($arPar_person); 

    // BL.person
    if($oper=="update" || $oper=="insert" ){        
        $msg .=$dbl->executeperson($oper,$arPar_person);   
        $com="select id from core.enterprise where idparty='$idparty'";
        $id=$dbl->executeScalar($com);

        $comcheckcomplements="select id from core.enterprisecomplements where idparty='$idparty'";
        //var_dump($comcheckcomplements);
        $idcomplements=$dbl->executeScalar($comcheckcomplements);

        if($idcomplements=="") {
            // Guardar Enterprise Complements
            $cominscomplements="insert into core.enterprisecomplements(
                code,name,idparty,
                extinguisherh20,
                extinguisherco2, 
                extinguisherpqs, 
                extinguisherk, 
                extinguisherother,  
                capextinguisherh20, 
                capextinguisherco2, 
                capextinguisherpqs, 
                capextinguisherk, 
                capextinguisherother, 
                evacuationroute, 
                leastriskarea,
                firstaid,
                stretcher, 
                meetingpoint,
                emergencyexit,
                emergencystair,
                onlydesabilitiespeople,
                emergencycommunication,
                informationmodule,
                lookout,
                extinguisher,
                hydrant, 
                alarmactivation, 
                emergencyphone,
                emergencyequipment, 
                slipperyfloor, 
                toxicsubstance,  
                corrosivesubstance,
                flammablematerials, 
                oxidizingmaterials, 
                riskexplosionmaterials,
                electricrisk,  
                laserradiationrisk,
                biologicalrisk, 
                ionizingradiation,
                dontsmoking,
                dontfire,
                dontuseelevatoronemergency, 
                dontunauthorizedpersons, 
                dontrun,
                dontscream,
                dontpush, 
                usebadge, 
                registrationaccess,
                parkobligation, 
                vehicleinspection,
                packageinspection,
                impacthelmet,
                dielectrichelmet,
                hood,
                protectiongoggles,
                goggles,
                faceshield,
                welderhelmet, 
                weldergoggles,
                earplug,
                acousticshell,
                particulaterespirator,
                gasvaporrespirator,
                disposablemask, 
                selfrespirator,
                chemicalglove,
                dielectricglove,
                extremetemperatureglove,
                glove,
                sleeve,
                hightemperatureapron, 
                chemicalapron,
                overol,
                coat,
                clothingdangeroussubstances,
                occupationalfootwear,
                impactfootwear,
                conductivefootwear,
                dielectricfootwear,
                chemicalfootwear,
                leggins,
                waterproofboats,
                equipmentagainstfall,
                equipmentfirebrigade
                ) values (
                '','',$idparty,
                '$extinguisherh20',
                '$extinguisherco2', 
                '$extinguisherpqs', 
                '$extinguisherk', 
                '$extinguisherother',  
                '$capextinguisherh20', 
                '$capextinguisherco2', 
                '$capextinguisherpqs', 
                '$capextinguisherk', 
                '$capextinguisherother', 
                '$evacuationroute', 
                '$leastriskarea',
                '$firstaid',
                '$stretcher', 
                '$meetingpoint',
                '$emergencyexit',
                '$emergencystair',
                '$onlydesabilitiespeople',
                '$emergencycommunication',
                '$informationmodule',
                '$lookout',
                '$extinguisher',
                '$hydrant', 
                '$alarmactivation', 
                '$emergencyphone',
                '$emergencyequipment', 
                '$slipperyfloor', 
                '$toxicsubstance',  
                '$corrosivesubstance',
                '$flammablematerials', 
                '$oxidizingmaterials', 
                '$riskexplosionmaterials',
                '$electricrisk',  
                '$laserradiationrisk',
                '$biologicalrisk', 
                '$ionizingradiation',
                '$dontsmoking',
                '$dontfire',
                '$dontuseelevatoronemergency', 
                '$dontunauthorizedpersons', 
                '$dontrun',
                '$dontscream',
                '$dontpush', 
                '$usebadge', 
                '$registrationaccess',
                '$parkobligation', 
                '$vehicleinspection',
                '$packageinspection',
                '$impacthelmet',
                '$dielectrichelmet',
                '$hood',
                '$protectiongoggles',
                '$goggles',
                '$faceshield',
                '$welderhelmet', 
                '$weldergoggles',
                '$earplug',
                '$acousticshell',
                '$particulaterespirator',
                '$gasvaporrespirator',
                '$disposablemask', 
                '$selfrespirator',
                '$chemicalglove',
                '$dielectricglove',
                '$extremetemperatureglove',
                '$glove',
                '$sleeve',
                '$hightemperatureapron', 
                '$chemicalapron',
                '$overol',
                '$coat',
                '$clothingdangeroussubstances',
                '$occupationalfootwear',
                '$impactfootwear',
                '$conductivefootwear',
                '$dielectricfootwear',
                '$chemicalfootwear',
                '$leggins',
                '$waterproofboats',
                '$equipmentagainstfall',
                '$equipmentfirebrigade'
            )";

            //var_dump($cominscomplements);
            
            $dbl->executeReader($cominscomplements);

        };

        if($idcomplements!="") {
            $comupdcomplements="update core.enterprisecomplements set (
                
                extinguisherh20='$extinguisherh20',
                extinguisherco2='$extinguisherco2', 
                extinguisherpqs='$extinguisherpqs', 
                extinguisherk='$extinguisherk', 
                extinguisherother='$extinguisherother',  
                capextinguisherh20='$capextinguisherh20', 
                capextinguisherco2='$capextinguisherco2', 
                capextinguisherpqs='$capextinguisherpqs', 
                capextinguisherk='$capextinguisherk', 
                capextinguisherother='$capextinguisherother', 
                evacuationroute='$evacuationroute', 
                leastriskarea='$leastriskarea',
                firstaid='$firstaid',
                stretcher='$stretcher', 
                meetingpoint='$meetingpoint',
                emergencyexit='$emergencyexit',
                emergencystair='$emergencystair',
                onlydesabilitiespeople='$onlydesabilitiespeople',
                emergencycommunication='$emergencycommunication',
                informationmodule='$informationmodule',
                lookout='$lookout',
                extinguisher='$extinguisher',
                hydrant='$hydrant', 
                alarmactivation='$alarmactivation', 
                emergencyphone='$emergencyphone',
                emergencyequipment='$emergencyequipment', 
                slipperyfloor='$slipperyfloor', 
                toxicsubstance='$toxicsubstance',  
                corrosivesubstance='$corrosivesubstance',
                flammablematerials='$flammablematerials', 
                oxidizingmaterials='$oxidizingmaterials', 
                riskexplosionmaterials='$riskexplosionmaterials',
                electricrisk='$electricrisk',  
                laserradiationrisk='$laserradiationrisk',
                biologicalrisk='$biologicalrisk', 
                ionizingradiation='$ionizingradiation',
                dontsmoking='$dontsmoking',
                dontfire='$dontfire',
                dontuseelevatoronemergency='$dontuseelevatoronemergency', 
                dontunauthorizedpersons='$dontunauthorizedpersons', 
                dontrun='$dontrun',
                dontscream='$dontscream',
                dontpush='$dontpush', 
                usebadge='$usebadge', 
                registrationaccess='$registrationaccess',
                parkobligation='$parkobligation', 
                vehicleinspection='$vehicleinspection',
                packageinspection='$packageinspection',
                impacthelmet='$impacthelmet',
                dielectrichelmet='$dielectrichelmet',
                hood='$hood',
                protectiongoggles='$protectiongoggles',
                goggles='$goggles',
                faceshield='$faceshield',
                welderhelmet='$welderhelmet', 
                weldergoggles='$weldergoggles',
                earplug='$earplug',
                acousticshell='$acousticshell',
                particulaterespirator='$particulaterespirator',
                gasvaporrespirator='$gasvaporrespirator',
                disposablemask='$disposablemask', 
                selfrespirator='$selfrespirator',
                chemicalglove='$chemicalglove',
                dielectricglove='$dielectricglove',
                extremetemperatureglove='$extremetemperatureglove',
                glove='$glove',
                sleeve='$sleeve',
                hightemperatureapron='$hightemperatureapron', 
                chemicalapron='$chemicalapron',
                overol='$overol',
                coat='$coat',
                clothingdangeroussubstances='$clothingdangeroussubstances',
                occupationalfootwear='$occupationalfootwear',
                impactfootwear='$impactfootwear',
                conductivefootwear='$conductivefootwear',
                dielectricfootwear='$dielectricfootwear',
                chemicalfootwear='$chemicalfootwear',
                leggins='$leggins',
                waterproofboats='$waterproofboats',
                equipmentagainstfall='$equipmentagainstfall',
                equipmentfirebrigade='$equipmentfirebrigade'
            )";

            //var_dump($comupdcomplements);
            
            $dbl->executeReader($comupdcomplements);
        }
        
    

    }else{
        $dbl->execute($oper,$arPar_person);
    }

    // crear arrays
    $partyaddressbl->$buildArray($arPar_address);
    $phonebl->$buildArray($arPar_phone);
    $emailbl->$buildArray($arPar_email);


    // $phonebl->$buildArray($arPar_phone);    
 
  

    //BL.all
    //**********************PENDIENTE POR MEJORAR 
    if(($idaddresstype!= "" || $idstate!= "" ||$idcity!= "" ||$suburb!= "" ||

        $municipality !="" || $postalcode !=""

        ||$buildingnumber!= ""
        || $street!= "" ) && ($urloper!="find") && $idparty!=""){

        $msg_BL_error .=$partyaddressbl->validatemsg();
        if ($partyaddressbl->validate()==true){
            //buscar que la direccion no este previamente asociada a esa Empresa
            // $com="select id from core.address where idaddresstype='$idaddresstype'"
            //         . " and idstate='$idstate' "
            //         // . " and idcity='$idcity' "
            //         . " and suburb='$suburb' and municipality='$municipality'"
            //         . " and buildingnumber='$buildingnumber' and postalcode='$postalcode' and idparty='$idparty' ";
            $com="select id from core.address where "
                    . "idaddresstype='$idaddresstype'"
                    . " and idstate='$idstate' "
                    // . " and idcity='$idcity' "
                    . " and street='$street' "
                    . " and suburb='$suburb' and municipality='$municipality'"
                    . " and buildingnumber='$buildingnumber' and postalcode='$postalcode' and idparty='$idparty' ";                    
            // $com="select id from core.address where "
            //         . "idparty='$idparty' ";     
            // $com="select a.id from core.address a,base.entitysubclass b where a.idparty='$idparty' and b.name='FISCAL' and a.idaddresstype=b.id  and b.code='ADDRESSTYPEVALUES'";
            $resulvalidate=$dbl->executeReader($com); 

            //   if($resulvalidate!="" && $idpartyaddress==""){
            if($resulvalidate!="" ){


                $msg_BL_error .="Los datos de direccion ya se encuentran "
                        . "registrado para esta Empresa, pruebe con otra. ";
                    // if($oper=="update" || $oper=="insert" ){
  
                    //     $msg .=$partyaddressbl->executeaddress($operaddress,$arPar_address);

                    // }else{
                   
                    //     $bl->execute($operaddress,$arPar_address);
                    // } 
            }else{
               
                //   if($idparty!=""){
                    if($oper=="update" || $oper=="insert" ){
                        $msg .=$partyaddressbl->executeaddress($operaddress,$arPar_address);
                    }else{
                        $partyaddressbl->execute($operaddress,$arPar_address);
                    }                
                //----- var direcciones
                    $idaddresstype = 
                    $idstate = 
                    // $idcity = 
                    $suburb =
                    $municipality = 
                    $buildingnumber=
                    $street =
                    $postalcode = ""; 
                    $idpartyaddress= "";    
                    // $active_address = "Y";
                //   }
            }                                         
        }else{
            $arrayPHPmsgERROR[]=0;
        }     
    }   





    // if(($idphonetype!= "" || $countrycode!= "" || $areacode!= "" || $number!= "" )
    //         && ($urloper!="find") && $idparty!=""){
    if(($idphonetype!= "" || $phone!= "" )
            && ($urloper!="find") && $idparty!=""){
        $msg_BL_error .=$phonebl->validatemsg();
        if ($phonebl->validate()==true){
            
            //buscar que el tlf no este previamente asociado
            $com="select id from core.phone where idphonetype='$idphonetype' and"
                    . " content='$phone' ";
            $resulvalidate=$dbl->executeReader($com); 

            if($resulvalidate!="" && $idpartyphone==""){
                $msg_BL_error .=("Los datos del teléfono, ya se encuentra registrado. ");
            }else{
                //   if($idparty!=""){            
                    if($oper=="update" || $oper=="insert" ){
                        $msg .=$phonebl->executephone($operphone,$arPar_phone);

                    }else{
                        $phonebl->execute($operphone,$arPar_phone);
                    }              
                    //---------var telefonos       
                    $idphonetype = $idcountrycode = $countrycode = $areacode = $phone = $phone = "";
                    $idpartyphone = "";   
                    $active_phone = "Y";
                //   }
            }                               
        }else{
            $arrayPHPmsgERROR[]=1;
        }   
    }          

    if(($idemailtype!= "" || $email!= "" )
            && ($urloper!="find") && $idparty!=""){
        $msg_BL_error .=$emailbl->validatemsg($email);
        if ($emailbl->validate($email)==true ){ 
            //buscar que el correo no este previamente asociado
            $com="select id from core.email where content='$email' ";            
            $resulvalidate=$dbl->executeReader($com); 
            
            if($resulvalidate!="" && $idpartyemail==""){
                $msg_BL_error .=("Este correo:$email, ya se encuentra registrado. ");
            }else{
                //   if($idparty!=""){
                    if($oper=="update" || $oper=="insert" ){
                        $msg .=$emailbl->executeemail($operemail,$arPar_email); 

                    }else{
                        $emailbl->execute($operemail,$arPar_email); 
                    }                      
                //   }

            //-----------var correos
                $email  = $idemailtype =  "";   
                $idpartyemail = "";
                $active_email = "Y";
            }                                   
        }else{
            $arrayPHPmsgERROR[]=2;
        }  
    }     
   
    
     
    

    
    //msj de error de las validaciones del bl
    if(($msj_error=="" && $error_msg_first_regist=="" )&&( $msg!="" || $msg_BL_error!="")
            && $urloper == "save"){
        utilities::alert($msg.$msg_BL_error);
    }
    
    $oper = $oper2 = $urloper;   
     
    if ($oper == "find" || $oper == "findByName") {
        $id = $arPar_person[0];
        $code = $arPar_person[1];
        $name = $arPar_person[2];
        $idparty = $arPar_person[3];    

        $bussinesname = $arPar_person[4]; 
        $registerdate = $arPar_person[5]; 
        $buildingnamenumber = $arPar_person[6]; 


        $landsurface = $arPar_person[7]; 
        $buildedsurface = $arPar_person[8]; 
        $buildingheight = $arPar_person[9]; 

        $legalrepresentative = $arPar_person[10]; 
        $manager = $arPar_person[11]; 
        $responsiblepipc = $arPar_person[12];
        $economicactivity = $arPar_person[13];
        $permanentshedule = $arPar_person[14];
        $numemployees = $arPar_person[15];

        $buildingage = $arPar_person[16]; 
        $numlevels = $arPar_person[17]; 
        $areadata = $arPar_person[18]; 
        $maxcapacity = $arPar_person[19]; 

        $companysecurityprovider = $arPar_person[20]; 
        $securityofficer = $arPar_person[21]; 
        $nummorningsecurityelements = $arPar_person[22]; 
        $numeveningsecurityelements = $arPar_person[23]; 
        $numnightsecurityelements = $arPar_person[24];

        $numbrigadista = $arPar_person[25];
        $accidentinsurance = $arPar_person[26];
        $insurancecompany = $arPar_person[27];
        $numextinguisherspqs = $arPar_person[28]; 
        $numextinguishersco2 = $arPar_person[29];
        $numextinguishersh20 = $arPar_person[30]; 
        $numextinguishersothers = $arPar_person[31];
        $structuralopinion = $arPar_person[32]; 
        $datestructuralopinion = $arPar_person[33]; 
        $electricopinion = $arPar_person[34]; 
        $dateelectricopinion = $arPar_person[35];
        $firenetwork = $arPar_person[36];
        $numhydrants = $arPar_person[37]; 
        $tankcapacity = $arPar_person[38];
        $percenttankfire = $arPar_person[39]; 
        $alertsystem = $arPar_person[40];
        $firedetection = $arPar_person[41];
        $fireprotectionequipment = $arPar_person[42];
        $capacityfireprotectionequipment = $arPar_person[43]; 
        $autonomousbreathingequipment = $arPar_person[44]; 
        $gastanklpstationary = $arPar_person[45];
        $capacitygastanklpstationary = $arPar_person[46];
        $gastanklpnotstationary = $arPar_person[47];
        $howgastanklpnotstationar = $arPar_person[48];
        $lpgasopinion = $arPar_person[49];
        $datelpgasopinion = $arPar_person[50];
  
        $flammablegases = $arPar_person[51];
        $quantityflammablegases = $arPar_person[52];
        $flammableliquids = $arPar_person[53];
        $quantityflammableliquids = $arPar_person[54];
        $combustibleliquids = $arPar_person[55];
        $quantitycombustibleliquids = $arPar_person[56];
        $combustiblesolids = $arPar_person[57];
        $quantitycombustiblesolids = $arPar_person[58];
        $explosivematerial = $arPar_person[59];
        $quantityexplosivematerial = $arPar_person[60];
        $electricsubstation = $arPar_person[61];
        $capacityelectricsubstation = $arPar_person[62];
        $codebranch = $arPar_person[63];
 
        $active = $arPar_person[64];
        $deleted = $arPar_person[65];
    }  


    if ($oper == "find" || $oper == "findByName") {

        //   $id = $arPar_address[0];
        //   $code = $arPar_address[1];
        //   $name = $arPar_address[2];
        //   $idparty = $arPar_address[3];
        $buildingnumber = $arPar_address[4];
        $suburb = $arPar_address[5];
        $municipality  = $arPar_address[6];
        $postalcode  = $arPar_address[7];
        $idaddresstype = $arPar_address[8];
        $idstate = $arPar_address[9];
        $idcity = $arPar_address[10];        
        $street = $arPar_address[11];
        
        // $idcountry = $arPar_[5];
        // $idstate = $arPar_[9];
        // $floor  = $arPar_[12];
        
        
        //   $observation = $arPar_address[12];
        $active_address = $arPar_address[12];
        //   $deleted = $arPar_address[14];                  
    }



    

    if ($oper == "find" || $oper == "findByName") {

        //   $id = $arPar_phone[0];
        //   $code = $arPar_phone[1];
        //   $name = $arPar_phone[2];
        //   $idparty = $arPar_phone[3];
        $idphonetype = $arPar_phone[4];
        $phone = $arPar_phone[5];
        //   $observation = $arPar_phone[8];
        $active_phone = $arPar_phone[7];
        //   $deleted = $arPar_phone[10];

    }   
       
    if ($oper == "find" || $oper == "findByName") {
        //   $id = $arPar_email[0];
        //   $code = $arPar_email[1];
        //   $name = $arPar_email[2];
        //   $idparty = $arPar_email[3];
        $idemailtype = $arPar_email[4];
        $email = $arPar_email[5];
        //   $observation = $arPar_email[5];
        $active_email = $arPar_email[6];
        //   $deleted = $arPar_email[7];
    }   
   
?>
        <script>

            //cunado se registre un dato (tlf, direcciom, email, m.social) 
            //por primera vez el active no se desactive    
            //function NotUncheckPerson(e,thi,id,idpartyact) {
            //    var idd= JSON.stringify(id);
            //    var patron = /"/g;
            //    var id = idd.replace(patron, "");
            //    if (idpartyact==undefined){
            //        document.getElementById(id).checked= true;
            //    }
            //}

            //DIRECCION (PAIS,ESTADO y CIUDAD) DATOS EmpresaLES
            $(document).ready(function(){
                $("#idcountry").on('change', function () {
                    $("#idcountry option:selected").each(function () {
                        selectidstate=$(this).val();
                        $.post("ajaxDatepartypersonBL.php", { selectidstate: selectidstate }, function(data) {
                            $("#idstate").html(data);                               
                        });			
                    });
                    $("#idstate option:selected").each(function () {
                        selectidcity="";
                        $.post("ajaxDatepartypersonBL.php", { selectidcity: selectidcity }, function(data) {
                            $("#idcity").html(data);                               
                        });			
                    });
               });
               $("#idstate").on('change', function () {
                    $("#idstate option:selected").each(function () {
                        selectidcity=$(this).val();
                        $.post("ajaxDatepartypersonBL.php", { selectidcity: selectidcity }, function(data) {
                            $("#idcity").html(data);                               
                        });			
                    });
               });                   
            });    

            $(document).ready(function(){
                $("#idcountryinterm").on('change', function () {
                    $("#idcountryinterm option:selected").each(function () {
                        selectidstate=$(this).val();
                        $.post("ajaxDatepartypersonBL.php", { selectidstate: selectidstate }, function(data) {
                            $("#idstateinterm").html(data);                               
                        });			
                    });
                    $("#idstateinterm option:selected").each(function () {
                        selectidcity="";
                        $.post("ajaxDatepartypersonBL.php", { selectidcity: selectidcity }, function(data) {
                            $("#idcityinterm").html(data);                               
                        });			
                    });
               });
               $("#idstateinterm").on('change', function () {
                    $("#idstateinterm option:selected").each(function () {
                        selectidcity=$(this).val();
                        $.post("ajaxDatepartypersonBL.php", { selectidcity: selectidcity}, function(data) {
                            $("#idcityinterm").html(data);                               
                        });			
                    });
               });                   
            });  
    

     

            //------PHONES
            $(document).ready(function(){
                $("#idphonetype").on('change', function () {
                    idphonetype=$(this).val();
                    var idcountrycode = selectidstate = $("#idcountrycode").val();
                    var idareacode= $("#areacode").val();

                    if(idcountrycode!=""){
                        //dibujar el estado
                        $.post("ajaxDatepartypersonBL.php", { selectidstate: selectidstate,
                            idphonetype: idphonetype, idcountrycode: idcountrycode }, function(data) {
                            $("#areacode").html(data);    
                        });                              
                    }
                    $.post("ajaxDatepartypersonBL.php", { idcountrycode: idcountrycode },
                        function(data) {
                        $("#phone").val(data);   
                    });   
                   // document.getElementById("phone").disabled = true; 
                });

                //cuando presione Estado
                $("#areacode").on('change', function () {
                    //extraer el tipo de movil
                    var idphonetype=$("#idphonetype").val();                        
                    var idcountrycode= $("#idcountrycode").val();
                    var idareacode= $("#areacode").val();

                    //dibujar el number                      
                    $.post("ajaxDatepartypersonBL.php", { 
                        idphonetype: idphonetype,
                        idcountrycode: idcountrycode, 
                        idareacode: idareacode },
                        function(data) {
                            $("#phone").val(data); 
                            $("#lengthareacode").val(data.length);
                        });     
                   // document.getElementById("phone").disabled = false;    
                   
                }); 

                //cuando presione pais
                $("#idcountrycode").on('change', function () {
                    //extraer id del pais
                    var idcountrycode = selectidstate = $("#idcountrycode").val();
                    //extraer el tipo de movil
                    var idphonetype=$("#idphonetype").val();

                    if(idphonetype!=""){
                        //dibujar el estado
                        $.post("ajaxDatepartypersonBL.php", { selectidstate: selectidstate,
                            idphonetype: idphonetype }, function(data) {
                            $("#areacode").html(data);                               
                        });                            
                    }

                    //dibujar el number
                    $.post("ajaxDatepartypersonBL.php", { idcountrycode: idcountrycode },
                        function(data) {
                        $("#phone").val(data);   
                    });	
                    //document.getElementById("phone").disabled = true; 
                    
               });                
            }); 
                
            // FECHA 
            $("#birthdate").on("change", function() {
                this.setAttribute(
                    "data-date",
                    moment(this.value, "YYYY-MM-DD")
                    .format( this.getAttribute("data-date-format") )
                );
            }).trigger("change");
                
                




            var coordinatebank = "<?php echo $coordinatebank; ?>" ;
            var coordinatebankinterm = "<?php echo $coordinatebankinterm; ?>" ;

            if (coordinatebank=="Y"){
                window.onload = displaycoordinatebank;
                if(coordinatebankinterm=="Y"){
                    window.onload = displaycoordinatebankinterm;
                }
            }
            
            function enableWithoutDeletingData(e, field ){
                var lengt = document.getElementById("lengthareacode").value,
                    key = e.keyCode ? e.keyCode : e.which,
                    y = field.value.length;
                if(y>=lengt && lengt!=""){
                    if(y==lengt && key==8){
                        return false 
                    }else{
                        return true
                    }                    
                }
                return false   
            }            
            
                    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla

                 
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminar",function(){
                        var parent = $(this).parents().get(1);
                        var iddoc    = $(this).attr("name");
                        // var iddoc=$(this).val();
                        // alert(iddoc);
                        $.post("ajaxDatepartyexchangeBL.php", { iddoc: iddoc }, function(data) {
                          // alert(data);
                            // $("#idstate").html(data);                               
                        });                           
                        $(parent).remove();
                    });
                    });         
        </script>


        <!--Navegacion-->    
        <link rel="stylesheet" href="css/tinyDrawer.min.css">
        <script src="js/tinyDrawer.min.js"></script>
        <script>
            tinyDrawer();
        </script>
        <!--Fin Navegacion-->
    </head>
    <body>    
        <FORM action="<?php echo $action;?>" method="post" name="agreementPL" class="italsis" enctype="multipart/form-data">
        
<?php
    //var_dump("Valor de la session que viene del login: ".$_SESSION['amidconsultant']);
    // $dbl=new baseBL();  
    if($idparty==""){  
    // Hay que agregar el menu al titulo de la pagina
    // Y la imagen del boton
    // Hay que agregar el menu al titulo de la pagina
    // Y la imagen del boton
    echo '
    <!--Navegacion-->
    <drawer-menu>
        <div align=center>
        <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
            max-width: 50%;
            height: auto;"></div>
            <br>
            <div>
            <div style="float:left;padding-left: 10px;"><i class="material-icons">assignment</i></div>
            <div style="float:left;"><a href="../party/personPL.php?urloper=find&pn=0&id='.$_SESSION['amidconsultant'].'">PERFIL DEL CONSULTOR</a></div>
            <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">exit_to_app</i></div>
            <div style="float:left;"><a href="../party/exit.php">SALIR</a></div>
            </div>
        </drawer-menu>
        <!--Fin Navegacion-->
    ';    



    presentationLayer::buildFormTitle('  
    <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>INFORMACION GENERAL DE LA EMPRESA</div>
           ',"");         
    }else{
        $_SESSION["idpartyenterprise"]=$idparty;

        $comgetidenterprise="select id from core.enterprise where idparty=$idparty";
        $_SESSION["identerprise"]=$bl->executeScalar($comgetidenterprise);

        $comgetconsultant="select c.id from core.consultant c,core.consultingenterprise ce 
            where ce.idpartyenterprise=".$idparty." and ce.idpartyconsultant=c.idparty";
        $resgetconsultant=$bl->executeScalar($comgetconsultant);

        echo '
    <!--Navegacion-->
    <drawer-menu>
        <div align=center>
        <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
            max-width: 50%;
            height: auto;"></div>
            <br>
            <div>
            <div style="float:left;padding-left: 10px;"><i class="material-icons">assignment</i></div>
            <div style="float:left"><a href="../party/marcolegalPL.php">PLAN DE PROTECCION</a></div>
            <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">account_box</i></div>
            <div style="float:left"><a href="../party/personPL.php?urloper=find&pn=0&id='.$resgetconsultant.'">PERFIL DEL CONSULTOR</a></div>
            <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">exit_to_app</i></div>
            <div style="float:left"><a href="../party">SALIR</a></div>
            </div>
        </drawer-menu>
        <!--Fin Navegacion-->
    ';    

    presentationLayer::buildFormTitle('  
    <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>INFORMACION GENERAL DE LA EMPRESA</div>
           ',"");
    }

    presentationLayer::buildIdInputHidden($id,"document.agreementPL",$fLink);

    myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);
    myPresentationLayer::buildInputHidden("idpartyaddress","idpartyaddress","idpartyaddress",$idpartyaddress);

    myPresentationLayer::buildInputHidden("idpartyphone","idpartyphone","idpartyphone",$idpartyphone);
    myPresentationLayer::buildInputHidden("idpartyemail","idpartyemail","idpartyemail",$idpartyemail);
    myPresentationLayer::buildInputHidden("idpartysocialmedia","idpartysocialmedia","idpartysocialmedia",$idpartysocialmedia);
    myPresentationLayer::buildInputHidden("idpartybankinfo","idpartybankinfo","idpartybankinfo",$idpartybankinfo);
    myPresentationLayer::buildInputHidden("idpartycompliance","idpartycompliance","idpartycompliance",$idpartycompliance);
    myPresentationLayer::buildInputHidden("iddocument","iddocument","iddocument",$iddocument);

 

    $comm="select a.rfc,b.* FROM core.enterprise AS b,core.party AS a WHERE 
                a.id= b.idparty and a.rfc='$RFC'";  
    $resul_exist=$dbl->executeReader($comm);

echo "<div style='display: flex;'>"; 
    myPresentationLayer::buildInitColumn3();
		
        $onc = $bpl->buildEvent("agreementPL.php","findid");
        if($RFC==""){    
             
            myPresentationLayer::buildInputWithValidatorClassWithSearchButton(
                "RFC de la Empresa (*)","identificacion","identificacion",$identificacion,
                "input","title",
                //"onblur",$onc,
                "onkeypress","",
                "","","","",
                "",$maxlength,"","","","","");
            
            echo '<br>';
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Sucursal","codebranch","codebranch",$codebranch,
                "input","title",
                //"onkeypress","",
                "onblur",$onc,
                "","","","",
                "","50","","","","");
                
            
                                 
        }
        if($RFC!=""){  
            myPresentationLayer::buildInputWithValidatorClass(
                "Nombre/Razón Social(*)","bussinesname","bussinesname",$bussinesname,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");
            // Se oculta la contraseña a peticion del cliente
            /*      
            myPresentationLayer::buildInputWithValidatorClass(
                "Contraseña(*)","password","password",$password,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","","password"); */
            // Se asigna valor fijo    
            $password="sinpassword";                        
    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3();


            $year= date("Y");           
            $moths= date("m");
            $day= date("d");
            myPresentationLayer::buildInputCalendarWithValidatorClass(
                "Fecha(*)","registerdate","registerdate",$registerdate,
                "input date","title",$year,$moths,$day,"","","","","","",$required);   
            myPresentationLayer::buildInputWithValidatorClass(
                "R.F.C(*)","RFC","RFC",$RFC,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","readonly","","","",""); 

    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Nombre Comercial (*)","buildingnamenumber","buildingnamenumber",$buildingnamenumber,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 
            myPresentationLayer::buildInputWithValidatorClass(
                "Sucursal(*)","codebranch","codebranch",$codebranch,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");             
        }
    presentationLayer::buildEndColumn();
echo "</div>";        
        if($RFC!=""){   

            echo'


                <div class="accordion" value="active_address">Direcciones</div>
                <div class="panel">';
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Calle(*)","street","street",$street,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50");   
            myPresentationLayer::buildInputWithValidatorClass(
                "Municipio(*)","municipality","municipality",$municipality,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");  

            $com="SELECT a.id FROM core.address as a, base.entitysubclass as b where a.idparty='$idparty' and a.idaddresstype=b.id and b.name='FISCAL'  ";
            $idfirstregister=$dbl->executeScalar($com);

            $com="SELECT b.name FROM core.address as a, base.entitysubclass as b 
            where a.id='$idpartyaddress' and a.idaddresstype=b.id";
            $nameaddresstype=$dbl->executeScalar($com);

            if (($id=="" && $idfirstregister=="")
              || ($idpartyaddress!="" && $nameaddresstype=="FISCAL")) {
              $com="SELECT id FROM base.entitysubclass where code='ADDRESSTYPEVALUES' and name='FISCAL'";
              $idaddresstype=$dbl->executeScalar($com);

              myPresentationLayer::buildInputHidden("idaddresstype","idaddresstype","idaddresstype",$idaddresstype);
              myPresentationLayer::buildInputWithValidatorClass(
                "Tipo de Dirección(*)","Tipo de direccion(*)","Tipo de Dirección(*)","FISCAL",
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","readonly","","","","");               
              
            }else{
              $com="SELECT * FROM base.entitysubclass where code='ADDRESSTYPEVALUES' and name!='FISCAL' ";

               myPresentationLayer::buildSelectWithComEventClass(
                  "Tipo de Dirección(*)","idaddresstype","idaddresstype",$dbl,
                  $com, "id", "name", $idaddresstype,"input","title","DependentCombos()");
            }

            
    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Número(*)","buildingnumber","buildingnumber",$buildingnumber,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");     
  
            $com="select * from base.state";
            myPresentationLayer::buildSelectWithComEventClass(
                "Estado(*)","idstate","idstate",$dbl,
                $com, "id", "name", $idstate,"input","title","DependentCombos()");



    //         $idaddresstype=$dbl->executeScalar($com);
    presentationLayer::buildEndColumn(); 
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Colonia(*)","suburb","suburb",$suburb,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");     
            myPresentationLayer::buildInputWithValidatorClass(
                "Código Postal(*)","postalcode","postalcode",$postalcode,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");  

                                    
    presentationLayer::buildEndColumn();        


            if ($idpartyaddress== "" ){

                $comp= "SELECT pprs.id, 
                    (SELECT a.name 
                      FROM base.entitysubclass as a where code='ADDRESSTYPEVALUES' and pprs.idaddresstype=a.id ) as idaddresstype,
                    (SELECT c.name
                        FROM base.state c where pprs.idstate=c.id) as idstate,
                    pprs.municipality,
                    pprs.suburb,
                    pprs.street, 
                    pprs.postalcode 
                    from core.address pprs where pprs.idparty='$idparty'";         

                if($resul_exist!=""){ 
                    $arrCol = array("Identificador","Tipo de Dirección","Estado",
                                "Municipio","Colonia","Calle","Código Postal");
                    $partyaddressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyaddress");                         
                }
            }else{                    
                // $comp= "SELECT pprs.id,
                //     (SELECT a.name 
                //         FROM base.addresstype a where pprs.idaddresstype=a.id ) as idaddresstype,
                //     (SELECT b.name
                //         FROM base.country b where pprs.idcountry=b.id) as idcountry,
                //     (SELECT c.name
                //         FROM base.state c where pprs.idstate=c.id) as idstate,  
                //     (SELECT d.name
                //         FROM base.city d where pprs.idcity=d.id) as idcity,
                //     pprs.municipality,pprs.avenue,
                //     pprs.postalcode

                // from party.partyaddress pprs where pprs.idparty='$idparty' and pprs.id!='$idpartyaddress'";         

                $comp= "SELECT pprs.id, 
                    (SELECT a.name 
                      FROM base.entitysubclass as a where code='ADDRESSTYPEVALUES' and pprs.idaddresstype=a.id ) as idaddresstype,
                    (SELECT c.name
                        FROM base.state c where pprs.idstate=c.id) as idstate,
                    pprs.municipality,
                    pprs.suburb,
                    pprs.street, 
                    pprs.postalcode 
                    from core.address pprs where pprs.idparty='$idparty' 
                    and pprs.id!='$idpartyaddress'";

                $arrCol = array("Identificador","Tipo de Dirección","Estado",
                                "Municipio","Colonia","Calle","Código Postal");
                $partyaddressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyaddress");                                            
            }

            echo'</div>


                <div class="accordion">Teléfonos</div>
                <div class="panel">';
            
    presentationLayer::buildInitColumn();
    
            // myPresentationLayer::buildSelect2paramEventClass(
            //     "Tipo de teléfono(*)","idphonetype","idphonetype",$phonebl,
            //     "entitysubclass",$idphonetype,"base", "name", "id", "input","title","");        
       
            $com="SELECT * FROM base.entitysubclass where code='PHONETYPEVALUES'";
            // $vvv=$dbl->executeReader($com);

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo de teléfono(*)","idphonetype","idphonetype",$dbl,
                $com, "id", "name", $idphonetype,"input","title","phones()");              
            //      $com="SELECT * FROM dolgram.isspgetmgcountryorderbynamespanish()";
            // myPresentationLayer::buildSelectWithComEventClass(
            //     "Pais(*)","idcountrycode","idcountrycode",$phonebl,
            //     $com, "id", "name", $idcountrycode,"input","title","phones()");           
  
    presentationLayer::buildEndColumn();
    presentationLayer::buildInitColumn();
    

            myPresentationLayer::buildInputWithValidatorClass(
                "Número(*)","phone","phone",$phone,
                "input","title",
                "onkeypress","return isESNumber(event)",
                // "onkeydown","return enableWithoutDeletingData(event, this)","","",
                "","","","",
                "","10","","","","");     

    presentationLayer::buildEndColumn();  
                
            if ($idpartyphone==""){
      
                    
                $comp="SELECT pprs.id, (SELECT a.name FROM base.entitysubclass a where pprs.idphonetype=a.id ) as idphonetype, pprs.content from core.phone pprs where pprs.idparty='$idparty'";         

                if($resul_exist!=""){
                    $arrCol = array("Identificador","Tipo de teléfono","Número");
                    $phonebl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyphone");          

                }                                       
            }else{
                $comp="SELECT pprs.id, (SELECT a.name FROM base.entitysubclass a where pprs.idphonetype=a.id ) as idphonetype, pprs.content from core.phone pprs where pprs.idparty='$idparty' and pprs.id!='$idpartyphone'";         

                $arrCol = array("Identificador","Tipo de teléfono","Número");
                $phonebl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyphone");                                          
            }
        
            echo'</div> 
                

                <div class="accordion">Correos</div>
                <div class="panel">';
        
    presentationLayer::buildInitColumn();
    

                $com="SELECT * FROM base.entitysubclass where code='EMAILTYPEVALUES'";
            // $vvv=$dbl->executeReader($com);

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo de correo(*)","idemailtype","idemailtype",$dbl,
                $com, "id", "name", $idemailtype,"input","title","");                
    presentationLayer::buildEndColumn();  
    presentationLayer::buildInitColumn();
            // myPresentationLayer::buildInputCheckEmail(
            //     "Correo(*)","email","email",$email,"","","",);
            // myPresentationLayer::buildInputWithValidatorClass(
            //     "Correo(*)","email","email",$email,
            //     "input","title",
            //     "onkeypress","this.value=this.value.toLowerCase();",
            //     "","","","",
            //     "","50","",$required,"","","");      
            myPresentationLayer::buildInputCheckEmailEventClass(
                "Correo(*)","email","email",$email,
                "input","title",
                "onkeyup","this.value=this.value.toLowerCase();",
                "","","","",
                "","50","",$required,"","","");         
    presentationLayer::buildEndColumn();  
                // $emailbl = new $partyemailBL();
            if($idpartyemail==""){
                $comp= "SELECT id,
                    content
                from core.email where idparty='$idparty'";         

                if($resul_exist!=""){
                    $arrCol = array("Identificador","Correo");
                    $emailbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyemail");                         
                } 
            }else{
                $comp= "SELECT id,
                    content
                from core.email where idparty='$idparty' and id!='$idpartyemail'";   
                $arrCol = array("Identificador","Correo");
                $emailbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyemail");                      
            }

            echo'</div>';
            // Fin Panel Correo
            
            // Panel Datos del Inmueble
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Datos del Inmueble</div>
            <div class="panel">
            ';
            // Columna1
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildInputWithValidatorClass(
                "Superficie del Terreno (mts)(*)","landsurface","landsurface",$landsurface,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Antiguedad del Edificion (*)","buildingage","buildingage",$buildingage,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");  
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad Máxima (*)","maxcapacity","maxcapacity",$maxcapacity,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Superficie Construida (mts) (*)","buildedsurface","buildedsurface",$buildedsurface,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","",""); 
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Nº de Niveles (*)","numlevels","numlevels",$numlevels,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildInputWithValidatorClass(
                "Altura de la Edificación (mts) (*)","buildingheight","buildingheight",$buildingheight,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","",""); 
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Nombre y Número de Áreas (*)","areadata","areadata",$areadata,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            echo'</div>';
            // Fin Panel Datos del Inmueble

            // Panel Seguros de Responsabilidad Civil
            //////////////////////////////////////////
            echo '    
            <div class="accordion">Seguros de Responsabilidad Civil</div>
            <div class="panel">
            ';

            // Columna1
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';            
            myPresentationLayer::buildCheckClass(
            "","accidentinsurance","accidentinsurance",$accidentinsurance,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Seguro de Responsabilidad Civil contra Daños a Terceros</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildInputWithValidatorClass(
                "Empresa Aseguradora","insurancecompany","insurancecompany",$insurancecompany,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            if ($idparty!="") {
                // Seccion Documentos
                echo '<div align=left>Documentos</div>';
                echo '<br>';

                // Columna 1
                presentationLayer::buildInitColumn3();
        
                $com="SELECT * FROM base.entitysubclass where code='DOCSINSURANCEVALUES'";

                myPresentationLayer::buildSelectWithComEventClass(
                    "Tipo","iddocumenttypeinsurance","iddocumenttypeinsurance",$dbl,
                    $com, "id", "name", $iddocumenttypeinsurance,"input","title","");
                
                echo '
                <button type="submit" id="savedocumentinsurance" value="savedocumentinsurance" class="button" name="savedocumentinsurance">
                Guardar
                </button>
                ';
                presentationLayer::buildEndColumn();
                // Fin Columna 1
                
                // Columna 2

                presentationLayer::buildInitColumn3();
        

                //$com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                // $vvv=$dbl->executeReader($com);

                // Para que solo el sadmin pueda cambiar
                if ($_SESSION['sadmin']=="active") {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                } else {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                    and name='No Verificado'";
                }
                // Fin modificacion sadmin

                myPresentationLayer::buildSelectWithComEventClass(
                    "Status","iddocumentstatusinsurance","iddocumentstatusinsurance",$dbl,
                    $com, "id", "name", $iddocumentstatusinsurance,"input","title",""); 
                    
                myPresentationLayer::buildHidden("","","","");

                presentationLayer::buildEndColumn();
                // Fin Columna 2
                
                // Columna 3
                presentationLayer::buildInitColumn3();


                myPresentationLayer::buildInputWithValidatorClass(
                    "","pathinsurance","pathinsurance",$pathinsurance,
                    "title","title",
                    "","",
                    "","","","",
                    "","","","","ejemplo.pdf","","file");
                
                myPresentationLayer::buildHidden("","","","");
                    
                presentationLayer::buildEndColumn();
                // Fin Columna 3    

                if ($iddocument==""){
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                    from core.document pprs where delete='N' and pprs.idparty='$idparty' 
                    and code='DOCSINSURANCE'";  
                    // var_dump($comp);       
                    if($resul_exist!=""){
                        $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                        $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumentinsurance");                          
                    }                                       
                }else{
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                    from core.document pprs where  delete='N' and  pprs.idparty='$idparty' 
                    and pprs.id!='$iddocumentinsurance' and code='DOCSINSURANCE'";         
                    // var_dump($comp);       

                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumentinsurance");                                          
                }

                // Fin Documentos
            }

            echo'</div>';
            // Fin Panel Seguros de Responsabilidad Civil

            /*
            // Panel Documentos Responsabilidad Civi
            ////////////////////////////////////////
            echo'
            <div class="accordion">Documentos Responsabilidad Civil</div>
            <div class="panel">';
            
            
            
            echo'</div> ';
            // Fin Panel Documentos Responsabilidad Civil
            */
            

            /*    
            echo'</div>
                

                <div class="accordion">Características Geográficas</div>
                <div class="panel">';
        
    myPresentationLayer::buildInitColumn3();
                               
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
                         
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
                 
    presentationLayer::buildEndColumn();                     
            echo'</div>';*/
    ?>
            <!-- Codigo SCIAN -->
            
        <div id="id01" class="modal">
            <div class="modal-content">
                <div class="container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="button display-topright">&times;</span>
                    
                    <span class="treeTitle">Códigos SCIAN</span>
                    <!-- Initialize jsTree -->
                    <div id="data_jstree">
            
                    </div>
                </div>
            </div>
        </div>

        <!-- Store folder list in JSON format -->
        <div class="modal">
            <textarea id='txt_jsondata'><?= json_encode($json_data) ?></textarea>
        </div>
            <!-- Fin Codigo SCIAN -->




     <?php           
            // Panel Estructura Laboral
            ////////////////////////////
            echo'
                

                <div class="accordion">Estructura Laboral</div>
                <div class="panel">';
        
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Representante Legal (*)","legalrepresentative","legalrepresentative",$legalrepresentative,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Giro (*)","economicactivity","economicactivity",$economicactivity,
                "input","title",
                "onclick","document.getElementById('id01').style.display='block', adjust_style()",
                "","","","",
                "","50","readonly","","",""); 
                 
            ?>
            
            <!--<input type="text" id="codigo_scian" name="codigo_scian" /><img src="scian/img/plus.png" width="16px" alt="Seleccionar código" id="mostrar" onclick="document.getElementById('id01').style.display='block', adjust_style()" />-->
            

            <?php
            
                                                  
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Gerente (*)","manager","manager",$manager,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");  
            myPresentationLayer::buildInputWithValidatorClass(
                "Horario Permanente de Trabajo (*)","permanentshedule","permanentshedule",$permanentshedule,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 
                                                
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Consultor (*)","responsiblepipc","responsiblepipc",$responsiblepipc,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 
            myPresentationLayer::buildInputWithValidatorClass(
                "Total de Empleados (*)","numemployees","numemployees",$numemployees,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");  

    presentationLayer::buildEndColumn();                     
            echo'</div>'; 

            // Fin Panel Estructura Laboral


            /*
            echo'
                

                <div class="accordion">Condición del Edificio</div>
                <div class="panel">';
        
    myPresentationLayer::buildInitColumn3();
                                        
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
            
                            
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
                   
    presentationLayer::buildEndColumn();                     
            echo'</div>';*/

            echo'
                

                <div class="accordion">Vigilancia</div>
                <div class="panel">';
        
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Empresa que brinda la seguridad","companysecurityprovider","companysecurityprovider",$companysecurityprovider,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");  
            myPresentationLayer::buildInputWithValidatorClass(
                "N°. de Elementos de Seguridad Vespertino","numeveningsecurityelements","numeveningsecurityelements",$numeveningsecurityelements,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");                                      
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Responsable del Servicio","securityofficer","securityofficer",$securityofficer,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");  
            myPresentationLayer::buildInputWithValidatorClass(
                "N°. de Elementos de Seguridad Nocturno","numnightsecurityelements","numnightsecurityelements",$numnightsecurityelements,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");                             
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "N°. de Elementos de Serguridad Matutino","nummorningsecurityelements","nummorningsecurityelements",$nummorningsecurityelements,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");    
    presentationLayer::buildEndColumn();                     
            echo'</div>';
            echo'
                

                <div class="accordion">Equipo contra Incendios</div>
                <div class="panel">';
        
    myPresentationLayer::buildInitColumn3();
            myPresentationLayer::buildInputWithValidatorClass(
                "Brigadistas","numbrigadista","numbrigadista",$numbrigadista,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");   


             
             
            myPresentationLayer::buildInputWithValidatorClass(
                "Nº de Hidrantes","numhydrants","numhydrants",$numhydrants,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");  

            

               
              
                                                                                                               
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();

                    
            
                         
 
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Cisterna","tankcapacity","tankcapacity",$tankcapacity,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");                
            
            
            
            



                                                                                        
    presentationLayer::buildEndColumn();  
    myPresentationLayer::buildInitColumn3();




               
            
               
            echo '<div style="display: flex; margin-top: 16px;">';                              
            myPresentationLayer::buildCheckClass(
            "","firenetwork","firenetwork",$firenetwork,"check",$required,""); echo '<span style="color: black; font-size: 0.65rem;">Sistema de Red contra Incendios</span></div>';
            /*   
            myPresentationLayer::buildInputWithValidatorClass(
                "Porcentaje para Incendios","percenttankfire","percenttankfire",$percenttankfire,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");  */
               
                  
                                                                                                                               
    presentationLayer::buildEndColumn(); 
            
            /*
            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas
    
            // Panel Extintores
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Extintores</div>
            <div class="panel">
            ';
            // Columna1
            myPresentationLayer::buildInitColumn3();

            // Cuenta con Extintor H20
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersh20","extinguishersh20",$extinguishersh2O,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor H2O</span></div>';

            // Cuenta con Extintor CO2
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersco2","extinguishersco2",$extinguishersco2,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor CO2</span></div>';

            // Cuenta con Extintor PQS
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguisherspqs","extinguisherspqs",$extinguisherspqs,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor H2O</span></div>';

            // Cuenta con Extintor K
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersk","extinguishersk",$extinguishersk,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor K</span></div>';
            
            // Cuenta con Extintor Otros
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersothers","extinguishersothers",$extinguishersothers,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor Otros</span></div>';
            
            
            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();
            
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores H20","numextinguishersh20","numextinguishersh20",$numextinguishersh20,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores de CO2","numextinguishersco2","numextinguishersco2",$numextinguishersco2,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores P.Q.S.","numextinguisherspqs","numextinguisherspqs",$numextinguisherspqs,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores K","numextinguishersk","numextinguishersk",$numextinguishersk,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores Otros","numextinguishersothers","numextinguishersothers",$numextinguishersothers,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");  


            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores H20","capextinguishersh20","capextinguishersh20",$capextinguishersh20,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores de CO2","capextinguishersco2","capextinguishersco2",$capextinguishersco2,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores P.Q.S.","capextinguisherspqs","capextinguisherspqs",$capextinguisherspqs,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores K","capextinguishersk","capextinguishersk",$capextinguishersk,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores Otros","capextinguishersothers","capextinguishersothers",$capextinguishersothers,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            presentationLayer::buildEndColumn();
            // Fin Columna 3

            
            echo'</div>';
            // Fin Panel Extintores
            */



            echo'</div>'; 
            // Fin Panel Equipos contra Incendios 

            /*
            // Panel Tipos de Alertamiento
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Tipos de Alertamiento</div>
            <div class="panel">
            ';
            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","alertsystem","alertsystem",$alertsystem,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Sistema de Alertamiento</span></div>';

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Equipo de Proteccion contra Incendios","capacityfireprotectionequipment","capacityfireprotectionequipment",$capacityfireprotectionequipment,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","",""); 

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';       
            myPresentationLayer::buildCheckClass(
            "","firedetection","firedetection",$firedetection,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Detección contra Incendios en Red</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';
            myPresentationLayer::buildCheckClass(
            "","autonomousbreathingequipment","autonomousbreathingequipment",$autonomousbreathingequipment,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipos de Respiración Autónoma</span></div>'; 

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';                
            myPresentationLayer::buildCheckClass(
            "","fireprotectionequipment","fireprotectionequipment",$fireprotectionequipment,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipo de Protección Personal contra Incendios</span></div>'; 

            presentationLayer::buildEndColumn();
            // Fin Columna 3

            echo'</div>';
            // Fin Panel Tipos de Alertamiento
            */

            // Panel Extintores
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Extintores</div>
            <div class="panel">
            ';
            // Columna1
            myPresentationLayer::buildInitColumn3();

            // Cuenta con Extintor H20
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersh20","extinguishersh20",$extinguishersh2O,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor H2O</span></div>';

            // Cuenta con Extintor CO2
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersco2","extinguishersco2",$extinguishersco2,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor CO2</span></div>';

            // Cuenta con Extintor PQS
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguisherspqs","extinguisherspqs",$extinguisherspqs,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor P.Q.S.</span></div>';

            // Cuenta con Extintor K
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersk","extinguishersk",$extinguishersk,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor K</span></div>';
            
            // Cuenta con Extintor Otros
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","extinguishersothers","extinguishersothers",$extinguishersothers,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Extintor Otros</span></div>';
            
            
            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();
            
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores H20","numextinguishersh20","numextinguishersh20",$numextinguishersh20,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores de CO2","numextinguishersco2","numextinguishersco2",$numextinguishersco2,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores P.Q.S.","numextinguisherspqs","numextinguisherspqs",$numextinguisherspqs,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores K","numextinguishersk","numextinguishersk",$numextinguishersk,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Extintores Otros","numextinguishersothers","numextinguishersothers",$numextinguishersothers,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");  


            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores H20","capextinguishersh20","capextinguishersh20",$capextinguishersh20,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores de CO2","capextinguishersco2","capextinguishersco2",$capextinguishersco2,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores P.Q.S.","capextinguisherspqs","capextinguisherspqs",$capextinguisherspqs,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores K","capextinguishersk","capextinguishersk",$capextinguishersk,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Extintores Otros","capextinguishersothers","capextinguishersothers",$capextinguishersothers,
                "input","title",
                "onkeypress","return isESNumber(event)",
                "","","","",
                "","50","","","",""); 

            presentationLayer::buildEndColumn();
            // Fin Columna 3

            
            echo'</div>';
            // Fin Panel Extintores
            
            // Panel Dictamen
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Dictamenes</div>
            <div class="panel">
            ';
            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            // Cuenta con Dictamen Eléctrico
            echo '<div style="display: flex; margin-top: 16px;">';                    
            myPresentationLayer::buildCheckClass(
            "","electricopinion","electricopinion",$electricopinion,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Dictamen Eléctrico</span></div>';

            // Cuenta con Dictamen Estructural
            echo '<div style="display: flex; margin-top: 16px;">'; 
            myPresentationLayer::buildCheckClass(
            "","structuralopinion","structuralopinion",$structuralopinion,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Dictamen Estructural</span></div>';

            // Cuenta con Dictamen Gas L.P.
            echo '<div style="display: flex; margin-top: 16px;">';                        
            myPresentationLayer::buildCheckClass(
            "","lpgasopinion","lpgasopinion",$lpgasopinion,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cuenta con Dictamen de Gas L.P.</span></div>';

            // Tiene Tanque L.P. No Estaciocionario
            echo '<div style="display: flex; margin-top: 16px;">';                
            myPresentationLayer::buildCheckClass(
            "","gastanklpnotstationary","gastanklpnotstationary",$gastanklpnotstationary,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Cilindro de GAS L.P.</span></div>';

            // Tiene Tanque L.P. Estacionario
            echo '<div style="display: flex; margin-top: 16px;">';      
            myPresentationLayer::buildCheckClass(
            "","gastanklpstationary","gastanklpstationary",$gastanklpstationary,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Tanques de Gas L.P. Estacionario</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();
            
            // Fecha del Dictamen Eléctrico
            myPresentationLayer::buildInputWithValidatorClass(
                "Fecha del Dictamen Eléctrico","dateelectricopinion","dateelectricopinion",$dateelectricopinion,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 
            
            // Fecha del Dictamen Estructural
            myPresentationLayer::buildInputWithValidatorClass(
                "Fecha del Dictamen Estructural","datestructuralopinion","datestructuralopinion",$datestructuralopinion,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","");
            
            // Fecha del Dictamen de Gas L.P.
            myPresentationLayer::buildInputWithValidatorClass(
                "Fecha de Dictamen de Gas L.P.","datelpgasopinion","datelpgasopinion",$datelpgasopinion,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","",""); 
            
            // Cuantos Tanques L.P. No Estacionarios
            myPresentationLayer::buildInputWithValidatorClass(
                "Cuantos Cilindros de GAS L.P.","howgastanklpnotstationar","howgastanklpnotstationar",$howgastanklpnotstationar,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","",""); 

            // Capacidad de Tanque L.P. No Estacionarios
            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Tanque L.P. Estacionarios","capacitygastanklpstationary","capacitygastanklpstationary",$capacitygastanklpstationary,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildHidden("","","","");

            myPresentationLayer::buildHidden("","","","");

            myPresentationLayer::buildHidden("","","","");

            myPresentationLayer::buildHidden("","","","");

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 3

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';

            echo '<br>';
            
            echo '<br>';

            echo '<br>';

            echo '<br>';
            

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            if ($idparty!="") {
                // Seccion Documentos
                echo '<div align=left>Documentos</div>';
                echo '<br>';

                // Columna 1
                presentationLayer::buildInitColumn3();
        
                $com="SELECT * FROM base.entitysubclass where code='DOCSDICTUMVALUES'";

                myPresentationLayer::buildSelectWithComEventClass(
                    "Tipo","iddocumenttypedictum","iddocumenttypedictum",$dbl,
                    $com, "id", "name", $iddocumenttypedictum,"input","title","");
                
                echo '
                <button type="submit" id="savedocumentdictum" value="savedocumentdictum" class="button" name="savedocumentdictum">
                Guardar
                </button>
                ';
                presentationLayer::buildEndColumn();
                // Fin Columna 1
                
                // Columna 2

                presentationLayer::buildInitColumn3();
        

                //$com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                // $vvv=$dbl->executeReader($com);

                // Para que solo el sadmin pueda cambiar
                if ($_SESSION['sadmin']=="active") {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                } else {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                    and name='No Verificado'";
                }
                // Fin modificacion sadmin

                myPresentationLayer::buildSelectWithComEventClass(
                    "Status","iddocumentstatusdictum","iddocumentstatusdictum",$dbl,
                    $com, "id", "name", $iddocumentstatusdictum,"input","title",""); 
                    
                myPresentationLayer::buildHidden("","","","");

                presentationLayer::buildEndColumn();
                // Fin Columna 2
                
                // Columna 3
                presentationLayer::buildInitColumn3();


                myPresentationLayer::buildInputWithValidatorClass(
                    "","pathdictum","pathdictum",$pathdictum,
                    "title","title",
                    "","",
                    "","","","",
                    "","","","","ejemplo.pdf","","file");
                
                myPresentationLayer::buildHidden("","","","");
                    
                presentationLayer::buildEndColumn();
                // Fin Columna 3    

                if ($iddocument==""){
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                    from core.document pprs where delete='N' and pprs.idparty='$idparty' 
                    and code='DOCSDICTUM'";  
                    // var_dump($comp);       
                    if($resul_exist!=""){
                        $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                        $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumentdictum");                          
                    }                                       
                }else{
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                    from core.document pprs where  delete='N' and  pprs.idparty='$idparty' 
                    and pprs.id!='$iddocumentdictum' and code='DOCSDICTUM'";         
                    // var_dump($comp);       

                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumentdictum");                                          
                }

                // Fin Documentos
            }


            echo'</div>';
            // Fin Panel Dictamen

            // Panel Señalamientos de Seguridad y Tipología
            ///////////////////////////////////////////////
            echo '    
            <div class="accordion">Señalamientos de Seguridad y Tipología</div>
            <div class="panel">
            ';

            // Señales Informativas
            echo '<div align=left>Señales Informativas</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","evacuationroute","evacuationroute",$evacuationroute,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Ruta de Evacuación</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","stretcher","stretcher",$stretcher,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Camilla</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","emergencystair","emergencystair",$emergencystair,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Escalera de Emergencia</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","informationmodule","informationmodule",$informationmodule,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Módulo de Información</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","leastriskarea","leastriskarea",$leastriskarea,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Zona de Menor Riesgo</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","meetingpoint","meetingpoint",$meetingpoint,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Punto de Reunión</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","onlydesabilitiespeople","onlydesabilitiespeople",$onlydesabilitiespeople,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Uso Exclusivo para Personas con Descapacidad</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","lookout","lookout",$lookout,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Puesto de Vigilancia</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","firstaid","firstaid",$firstaid,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Primeros Auxilios</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","emergencyexit","emergencyexit",$emergencyexit,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Salidas de Emergencia</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","emergencycommunication","emergencycommunication",$emergencycommunication,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipo de Comunicación de Emergencia</span></div>';

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Señales Informativas de Emergencia
            echo '<div align=left>Señales Informativas de Emergencia</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","extinguisher","extinguisher",$extinguisher,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Extintor</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","emergencyphone","emergencyphone",$emergencyphone,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Telefono de Emergencia</div>';


            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","hydrant","hydrant",$hydrant,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Hidrante</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","emergencyequipment","emergencyequipment",$emergencyequipment,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipo de Emergencia</span></div>';


            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","alarmactivation","alarmactivation",$alarmactivation,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Activación de Alarma</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Señales de Precaución
            echo '<div align=left>Señales de Precaución</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","slipperyfloor","slipperyfloor",$slipperyfloor,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Piso Resbaloso</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","flammablematerials","flammablematerials",$flammablematerials,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Materiales Inflamables o Combustibles</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","electricrisk","electricrisk",$electricrisk,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Riesgo Eléctrico</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","ionizingradiation","ionizingradiation",$ionizingradiation,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Radiaciones Ionizantes</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","toxicsubstance","toxicsubstance",$toxicsubstance,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Sustancia Tóxica</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","oxidizingmaterials","oxidizingmaterials",$oxidizingmaterials,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Materiales oxidantes y comburentes</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","laserradiationrisk","laserradiationrisk",$laserradiationrisk,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Riesgo por radiación laser</span></div>';

            myPresentationLayer::buildHidden("","","","");


            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","corrosivesubstance","corrosivesubstance",$corrosivesubstance,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Sustancia Corrosiva</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","riskexplosionmaterials","riskexplosionmaterials",$riskexplosionmaterials,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Materiales con riesgo de explosión</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","biologicalrisk","biologicalrisk",$biologicalrisk,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Riesgo Biológico</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Señales Prohibitivas o Restrictivas
            echo '<div align=left>Señales Prohibitivas o Restrictivas</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontsmoking","dontsmoking",$dontsmoking,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Prohibido Fumar</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontunauthorizedpersons","dontunauthorizedpersons",$dontunauthorizedpersons,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Prohibido el paso a personas no autorizadas</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontpush","dontpush",$dontpush,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>No empujar</span></div>';


            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontfire","dontfire",$dontfire,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Prohibido encender fuego</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontrun","dontrun",$dontrun,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">No correr</span></div>';

            myPresentationLayer::buildHidden("","","","");


            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontuseelevatoronemergency","dontuseelevatoronemergency",$dontuseelevatoronemergency,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">No utilizar elevador en caso de emergencia</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dontscream","dontscream",$dontscream,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">No gritar</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Señales de Obligación
            echo '<div align=left>Señales de Obligación</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","usebadge","usebadge",$usebadge,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Uso de gafete</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","vehicleinspection","vehicleinspection",$vehicleinspection,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;"></span>Revisión obligatoria de vehículos</span></div>';


            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","registrationaccess","registrationaccess",$registrationaccess,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Registro obligatorio para acceso</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","packageinspection","packageinspection",$packageinspection,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Revisión obligatoria de portafolios, bolsas y bultos</span></div>';


            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","parkobligation","parkobligation",$parkobligation,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Obligación de estacionar los vehículos con el frente hacia la salida</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas
            
                
            echo'</div>';
            // Fin Panel Señalamientos de Seguridad y Tipología


            // Panel Equipo de Protección Personal
            //////////////////////////////////////
            echo' 
            <div class="accordion">Equipo de Protección Personal</div>
            <div class="panel">';

            // Cabeza
            echo '<div align=left>Cabeza</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","impacthelmet","impacthelmet",$impacthelmet,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Casco contra impacto</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dielectrichelmet","dielectrichelmet",$dielectrichelmet,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Casco Dieléctrico</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","hood","hood",$hood,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Capuchas</span></div>';
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Ojos y Cara
            echo '<div align=left>Ojos y Cara</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","protectiongoggles","protectiongoggles",$protectiongoggles,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Anteojos de protección</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","welderhelmet","welderhelmet",$welderhelmet,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Careta para soldador</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","goggles","goggles",$goggles,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Goggles</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","weldergoggles","weldergoggles",$weldergoggles,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Gafas para soldador</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","faceshield","faceshield",$faceshield,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Pantalla facial</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Oidos
            echo '<div align=left>Oidos</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","earplug","earplug",$earplug,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Tapones Auditivos</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","acousticshell","acousticshell",$acousticshell,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Conchas Acústicas</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Aparato Respiratorio
            echo '<div align=left>Aparato Respiratorio</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","particulaterespirator","particulaterespirator",$particulaterespirator,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Respirador contra partículas</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","selfrespirator","selfrespirator",$selfrespirator,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipo de respiración autónomo</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","gasvaporrespirator","gasvaporrespirator",$gasvaporrespirator,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Respirador contra gases y vapores</span></div>';

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","disposablemask","disposablemask",$disposablemask,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Mascarilla desechable</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Extremidades Superiores
            echo '<div align=left>Extremidades Superiores</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","chemicalglove","chemicalglove",$chemicalglove,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Guantes contra sustancias químicas</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","glove","glove",$glove,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Guantes</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dielectricglove","dielectricglove",$dielectricglove,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Guantes dieléctricos</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","sleeve","sleeve",$sleeve,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Mangas</span></div>';

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","extremetemperatureglove","extremetemperatureglove",$extremetemperatureglove,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Guantes contra temperaturas extremas</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Tronco
            echo '<div align=left>Tronco</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","hightemperatureapron","hightemperatureapron",$hightemperatureapron,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Mandil contra altas temperaturas</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","coat","coat",$coat,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Bata</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","chemicalapron","chemicalapron",$chemicalapron,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Mandil contra sustancias químicas</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","clothingdangeroussubstances","clothingdangeroussubstances",$clothingdangeroussubstances,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Ropa contra sustancias peligrosa</span></div>';

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","overol","overol",$overol,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Overol</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Extremidades Inferiores
            echo '<div align=left>Extremidades Inferiores</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","occupationalfootwear","occupationalfootwear",$occupationalfootwear,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Calzado ocupacional</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","dielectricfootwear","dielectricfootwear",$dielectricfootwear,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Calzado dieléctrico</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","waterproofboats","waterproofboats",$waterproofboats,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Botas impermeables</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","impactfootwear","impactfootwear",$impactfootwear,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Calzado contra impactos</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","chemicalfootwear","chemicalfootwear",$chemicalfootwear,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Calzado contra sustancias químicas</span></div>';


            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","conductivefootwear","conductivefootwear",$conductivefootwear,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Calzado conductivo</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","leggins","leggins",$leggins,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Polainas</span></div>';

            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            // Otros
            echo '<div align=left>Otros</div>';

            // Columna1
            myPresentationLayer::buildInitColumn3();
            
            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","equipmentagainstfall","equipmentagainstfall",$equipmentagainstfall,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipo de protección contra caídas de altura</span></div>';

            presentationLayer::buildEndColumn();
            // Fin Columna 1

            // Columna2
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","equipmentfirebrigade","equipmentfirebrigade",$equipmentfirebrigade,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Equipo para brigadista contra incendio</span></div>';

            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2

            // Columna3
            myPresentationLayer::buildInitColumn3();
            
            myPresentationLayer::buildHidden("","","","");
            
            presentationLayer::buildEndColumn();
            // Fin Columna 3

            // Fin de Columnas
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,"N","N","N","N","N","N");

            echo '<br>';
            echo '<br>';
            echo '<br>';
            // Fin de Columnas

            echo'</div>';
            // Fin Panel Equipo de Protección Personal

            // Panel Materiales y Combustibles Peligrosos
            /////////////////////////////////////////////////////
            echo' 
            <div class="accordion">Materiales y Combustibles Peligrosos</div>
            <div class="panel">';
        
            // Columna1
            myPresentationLayer::buildInitColumn3();

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","flammablegases","flammablegases",$flammablegases,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Gases Inflamables</span></div>';


            echo '<div style="display: flex; margin-top: 16px;">'; 
            myPresentationLayer::buildCheckClass(
            "","flammableliquids","flammableliquids",$flammableliquids,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Líquidos Inflamables</span></div>';


            echo '<div style="display: flex; margin-top: 16px;">';
            myPresentationLayer::buildCheckClass(
            "","combustibleliquids","combustibleliquids",$combustibleliquids,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Líquidos Combustibles (Gasolina, Diesel)</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';               
            myPresentationLayer::buildCheckClass(
            "","explosivematerial","explosivematerial",$explosivematerial,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Material Explosivo</span></div>';

             
            echo '<div style="display: flex; margin-top: 16px;">';
            myPresentationLayer::buildCheckClass(
            "","combustiblesolids","combustiblesolids",$combustiblesolids,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Sólidos Combustibles</span></div>';

            echo '<div style="display: flex; margin-top: 16px;">';
            myPresentationLayer::buildCheckClass(
            "","electricsubstation","electricsubstation",$electricsubstation,"check",$required,""); 
            echo '<span style="color: black; font-size: 0.65rem;">Subestación Eléctrica</span></div>';
                                                                     
            presentationLayer::buildEndColumn();
    
            // Columna 2
            myPresentationLayer::buildInitColumn3();

            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Gases Inflamables","quantityflammablegases","quantityflammablegases",$quantityflammablegases,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");

            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Líquidos Inflamabes","quantityflammableliquids","quantityflammableliquids",$quantityflammableliquids,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","",""); 
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Líquidos Combustibles","quantitycombustibleliquids","quantitycombustibleliquids",$quantitycombustibleliquids,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");
                
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Material Explosivo en Kg","quantityexplosivematerial","quantityexplosivematerial",$quantityexplosivematerial,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");
            
            myPresentationLayer::buildInputWithValidatorClass(
                "Cantidad de Sólidos Combustibles en Kg","quantitycombustiblesolids","quantitycombustiblesolids",$quantitycombustiblesolids,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");

            myPresentationLayer::buildInputWithValidatorClass(
                "Capacidad de Subestacion Eléctrica","capacityelectricsubstation","capacityelectricsubstation",$capacityelectricsubstation,
                "input","title",
                "onkeypress","return isESDecimalCheck(event,this)",
                "","","","",
                "","50","","","","");

            presentationLayer::buildEndColumn(); 
            
            // Columnna 3
            myPresentationLayer::buildInitColumn3();
            // Empty                                                                         
            presentationLayer::buildEndColumn();                     
            echo'</div>';

            // Fin Panel Elemntos Altamente Inflamables (Inventario)

            /*
            // Panel Documentos
            ////////////////////
            echo'
            <div class="accordion">Documentos</div>
            <div class="panel">';
            
            // Columna 1
            presentationLayer::buildInitColumn3();
       
            $com="SELECT * FROM base.entitysubclass where code='DOCUMENTTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo","iddocumenttype","iddocumenttype",$dbl,
                $com, "id", "name", $iddocumenttype,"input","title","");
            
            echo '
            <button type="submit" id="savedocument" value="savedocument" class="button" name="savedocument">
            Guardar
            </button>
            ';
            presentationLayer::buildEndColumn();
            // Fin Columna 1
            
            // Columna 2

            presentationLayer::buildInitColumn3();
    

            $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
            // $vvv=$dbl->executeReader($com);

            myPresentationLayer::buildSelectWithComEventClass(
                "Status","iddocumentstatus","iddocumentstatus",$dbl,
                $com, "id", "name", $iddocumentstatus,"input","title","");         

            presentationLayer::buildEndColumn();
            // Fin Columna 2
            
            // Columna 3
            presentationLayer::buildInitColumn3();


            myPresentationLayer::buildInputWithValidatorClass(
                "","path","path",$path,
                "title","title",
                "","",
                "","","","",
                "","","","","ejemplo.pdf","","file");  
                
            presentationLayer::buildEndColumn();
            // Fin Columna 3    

            if ($iddocument==""){
                $comp="SELECT pprs.id, (SELECT a.name FROM base.entitysubclass a where pprs.iddocumenttype=a.id ) as iddocumenttype, (SELECT a.name FROM base.entitysubclass a where pprs.iddocumentstatus=a.id ) as iddocumentstatus  ,pprs.path from core.document pprs where delete='N' and pprs.idparty='$idparty' ";  
                // var_dump($comp);       
                if($resul_exist!=""){
                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument");                          
                }                                       
            }else{
                $comp="SELECT pprs.id, (SELECT a.name FROM base.entitysubclass a where pprs.iddocumenttype=a.id ) as iddocumenttype, (SELECT a.name FROM base.entitysubclass a where pprs.iddocumentstatus=a.id ) as iddocumentstatus  ,pprs.path from core.document pprs where  delete='N' and  pprs.idparty='$idparty' and pprs.id!='$iddocument'";         
                // var_dump($comp);       

                $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument");                                          
            }
            
            echo'</div> ';
            // Fin Panel Documentos
            */
            


            if ($idparty!="") {
            
                // Panel Documentos
                ////////////////////
                echo'
                <div class="accordion">Documentos</div>
                <div class="panel">';
                
                // Columna 1
                presentationLayer::buildInitColumn3();
        
                $com="SELECT * FROM base.entitysubclass where code='DOCSENTERPRISEVALUES'";
                // $vvv=$dbl->executeReader($com);

                myPresentationLayer::buildSelectWithComEventClass(
                    "Tipo","iddocumenttypeenterprise","iddocumenttypeenterprise",$dbl,
                    $com, "id", "name", $iddocumenttypeenterprise,"input","title","");                   
            

                echo '
                <button type="submit" id="savedocumententerprise" value="savedocumententerprise" 
                    class="button" name="savedocumententerprise">
                    Guardar
                </button>
                ';

                presentationLayer::buildEndColumn();
                presentationLayer::buildInitColumn3();
        

                //$com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                // $vvv=$dbl->executeReader($com);

                // Para que solo el sadmin pueda cambiar
                if ($_SESSION['sadmin']=="active") {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                } else {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                    and name='No Verificado'";
                }
                // Fin modificacion sadmin

                myPresentationLayer::buildSelectWithComEventClass(
                    "Status","iddocumentstatusenterprise","iddocumentstatusenterprise",$dbl,
                    $com, "id", "name", $iddocumentstatusenterprise,"input","title","");         

                presentationLayer::buildEndColumn();  
                presentationLayer::buildInitColumn3();


                myPresentationLayer::buildInputWithValidatorClass(
                    "","pathenterprise","pathenterprise",$pathenterprise,
                    "title","title",
                    "","",
                    "","","","",
                    "","","","","ejemplo.pdf","","file");    

                
                presentationLayer::buildEndColumn();
                    if ($iddocument==""){
                        $comp="SELECT pprs.id, 
                        (SELECT a.name FROM base.entitysubclass a 
                        where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                        (SELECT a.name FROM base.entitysubclass a 
                        where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                        from core.document pprs where delete='N' and pprs.idparty='$idparty' 
                        and code='DOCSENTERPRISE'";  
                        // var_dump($comp);       
                        if($resul_exist!=""){
                            $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opcion");
                            $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumententerprise");                          
                    }                                       
                }else{
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                    from core.document pprs where  delete='N' and  pprs.idparty='$idparty' 
                    and pprs.id!='$iddocumententerprise' and code='DOCSENTERPRISE'";         
                    // var_dump($comp);       

                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opcion");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumententerprise");                                          
                }
            
                echo'</div> ';
                // Fin Panel Documentos

                // Panel Pago
                //////////////////////////////////////////////////
                echo '    
                <div class="accordion">Pagos</div>
                <div class="panel">
                ';

                // Seccion Documentos
                echo '<div align=left>Documentos</div>';
                echo '<br>';

                // Columna 1
                presentationLayer::buildInitColumn3();
        
                $com="SELECT * FROM base.entitysubclass where code='DOCSPAYVALUES'";

                myPresentationLayer::buildSelectWithComEventClass(
                    "Tipo","iddocumenttypepay","iddocumenttypepay",$dbl,
                    $com, "id", "name", $iddocumenttypepay,"input","title","");
                
                echo '
                <button type="submit" id="savedocumentpay" value="savedocumentpay" 
                class="button" name="savedocumentpay">
                Guardar
                </button>
                ';
                presentationLayer::buildEndColumn();
                // Fin Columna 1
                
                // Columna 2

                presentationLayer::buildInitColumn3();
        

                //$com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                // $vvv=$dbl->executeReader($com);

                // Para que solo el sadmin pueda cambiar
                if ($_SESSION['sadmin']=="active") {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
                } else {
                    $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                    and name='No Verificado'";
                }
                // Fin modificacion sadmin

                myPresentationLayer::buildSelectWithComEventClass(
                    "Status","iddocumentstatuspay","iddocumentstatuspay",$dbl,
                    $com, "id", "name", $iddocumentstatuspay,"input","title",""); 
                    
                myPresentationLayer::buildHidden("","","","");

                presentationLayer::buildEndColumn();
                // Fin Columna 2
                
                // Columna 3
                presentationLayer::buildInitColumn3();


                myPresentationLayer::buildInputWithValidatorClass(
                    "","pathpay","pathpay",$pathpay,
                    "title","title",
                    "","",
                    "","","","",
                    "","","","","ejemplo.pdf","","file");
                
                myPresentationLayer::buildHidden("","","","");
                    
                presentationLayer::buildEndColumn();
                // Fin Columna 3    

                if ($iddocumentpay==""){
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                    from core.document pprs where delete='N' and pprs.idparty='$idparty' 
                    and code='DOCSPAY'";  
                    // var_dump($comp);       
                    if($resul_exist!=""){
                        $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                        $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumentpay");                          
                    }                                       
                }else{
                    $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                    from core.document pprs where  delete='N' and  pprs.idparty='$idparty' 
                    and pprs.id!='$iddocumentpay' and code='DOCSPAY'";         
                    // var_dump($comp);       

                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocumentpay");                                          
                }

                // Fin Documentos

                echo'</div>';
                // Fin Panel Pagos

            }
        }

        if($RFC!=""){ 
            $save="Y";
            $clear="Y";
            $back="Y";
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,$save,"N","N",$clear,"N",$back);
            /*myPresentationLayer::buildButtonOrImage(
                "Guardar","urloper","urloper","save","","btninicio","maxh-40",
                "Limpiar","urloper","urloper","clean","","btninicio","maxh-40",
                "Regresar","urloper","urloper","back","","btninicio","maxh-40"
                );*/
        }else{
            $save="N";
            $clear="N";
            $back="N";
        }             


        // Si el rfc es vacio, al inicio de la pantalla sin elegir empresa
        if($RFC==""){ 
        
            if($id==""){    
                // $comp="select id,bussinesname from core.enterprise";
                $comp="select a.id,a.bussinesname from core.enterprise a, core.consultingenterprise b where a.idparty=b.idpartyenterprise and b.idpartyconsultant='$idpartyconsultant' "; 
     
            }

            $arrCol = array("Identificador","Nombre");
            $dbl->fillGridDisplayPaginator($comp,$arrCol);                     
        }





            // myPresentationLayer::buildFooterNoGrid($bpl,$dbl,$pn,"Y","N","N","Y","N");
            
            // if ($id=="") {
                
                
                // $bl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyaddress");                  
            // } else {
            //     $com="select * from exchange.isspgetagreementwithoutdeletedbyid(".$id.")";
            // }            
            // $dbl->fillGridDisplayPaginator($com,$arrCol);	
        
?>	  
        </form>

        <!--Script Accordion-->
        <script>
            var acc = document.getElementsByClassName("accordion");
            var arrayJS =<?php echo json_encode($arrayPHP);?>; 
            var arrayJSmsgERROR =<?php echo json_encode($arrayPHPmsgERROR);?>; 
            var registerdate = "<?php echo $registerdate; ?>" ;
            var x;

            for (x in arrayJSmsgERROR) {   
                acc[arrayJSmsgERROR[x]].classList.toggle("active");              
                var panel = acc[arrayJSmsgERROR[x]].nextElementSibling; 
                panel.style.maxHeight = (panel.scrollHeight*2) + "px";
            }
            //alert(acc.length);  9          
            //alert(arrayJS.length); 3

            // Mostramos los valores en caso de busqueda
            for(var i=0;i<arrayJS.length;i++){

            // alert(acc[i].classList);

            // alert(arrayJS[i]);
            // alert(i);

                if(arrayJS[i]!=""){
                // alert(arrayJS[i]);
                // alert(acc[i].classList);
                    acc[i].classList.toggle("active");   

                    var panel = acc[i].nextElementSibling;

                    if (panel.style.maxHeight){
                        panel.style.maxHeight = null;
                    }else{
                        panel.style.maxHeight = ((panel.scrollHeight*2)+20) + "px";     
                    }   
                }       
            }

            for (i = 0; i < acc.length; i++) {
            //  Cuando el usuario hace clic en cualquier parte del documento
                acc[i].addEventListener("click", function() {

                    //   La propiedad classList devuelve el nombre de la clase de un elemento,
                    //   como un objeto DOMTokenList. 
                    //   toggle Alternar entre agregar y eliminar un nombre de clase de un elemento con JavaScript
                    this.classList.toggle("active");   

                    //   nextElementSibling; Obtenga el contenido HTML del siguiente hermano 
                    //   de un elemento de la lista:        
                    var panel = this.nextElementSibling;    
                    //   maxHeight Establecer la altura máxima de un elemento <div>:        
                    if (panel.style.maxHeight){           
                        panel.style.maxHeight = null;         
                    // document.getElementById().checked= false;         
                    }else{
                    //   La propiedad scrollHeight devuelve la altura completa de un elemento en píxeles,
                    //   incluido el relleno, pero no el borde, la barra de desplazamiento o el margen.            
                        panel.style.maxHeight = panel.scrollHeight + "px";      
                    } 
                });
            }

            // Fin Script Accordion

            $("#registerdate").on("change", function() {
                if(this.value!=""){
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                    );
                }else{
                    this.setAttribute(
                    "data-date",
                    moment().format('[dd/mm/yyyy]')
                    );               
                }
            }).trigger("change");    


        </script> 

        <!-- Codigo SCIAN -->
        <script type="text/javascript">
            $('#economicactivity').click(function(){
                var jsondata = JSON.parse($('#txt_jsondata').val());

                $('#data_jstree').jstree({ 'core' : {
                    'data' : jsondata,
                    'multiple': false,
                    'themes': {
                        'name'      : 'default',
                        'variant'   : 'medium',
                        'icons'     : false
                    }
                } });
            });

            $('#data_jstree')
                // listen for event
                .on('changed.jstree', function (e, data) {
                    var i, j, r = [];
                    for(i = 0, j = data.selected.length; i < j; i++) {
                        r.push(data.instance.get_node(data.selected[i]).text);
                    }

                    var text = r.join(', ');
                    var text_array = text.split(' ');
                    alert("Selección: " + text_array[0]);
                    //$('#codigo_scian').val(text_array[0]);
                    $('#economicactivity').val(text_array[0]);

                })

            // $('#data_jstree').on("changed.jstree", function (e, data) {
            //     // open a new window with your url
            //     // window.open("http://www.google.com/");
            //     // call a function
            //     myFunction();
            // });

            // function myFunction() {
            //     alert("Hola");
            // }
        </script>

        <script type="text/javascript">
            function adjust_style() {
                var x = document.getElementsByTagName('head');

                x[0].children[6].href = '../../../css/italsisScian.css';
            }
        </script>

        <script type="text/javascript">
            function revert_style() {
                var x = document.getElementsByTagName('head');

                x[0].children[6].href = '../../../css/italsis.css';
            }
        </script>

        <!-- Fin Codigo SCIAN -->
    </body>
</html>
