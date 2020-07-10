<?php 
    session_start();
    error_reporting(0);
    
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
<html>
    <head>
        <script type="text/javascript" src="datepickercontrol.js"></script> 
        <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
        <title>Persona</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

<?php
    // base
    $bl=new baseBL();

    // default agregados en marzo 2019 por genesis amaiz 
        $active_address = $active_phone = $active_email = $active_socialmedia = 
        $active_bankinfo = $active_compliance = "Y";

    // default
        $active = "Y";
        $deleted = "N";
        $id = $code = $name = $observation
                
    //----- var Datos basicos
        = $idparty = $tipo = $idenficationumber =$documentid 
        = $firstname = $middlename = $lastname = $secondlastname 
        = $registerdate = $birthplace = $monthlyincome = $idcivilstate 
        = $ideconomicalactivity = $idcountrynationality = $idoccupation 
        = $idcountrybirth = $idgender                                 
    //        = $registerdate = $birthplace = $monthlyincome = $idcivilstate = $ideconomicalactivity 
    //        = $idcountrynationality = $idoccupation  
          
    //----- var Direcciones
        = $idaddresstype = $idcountry = $idstate = $idcity 
        = $suburb = $municipality =$avenue = $building = $floor = $buildingnumber 
        = $postalcode = $idpartyaddress =         
                
    //---------var telefonos       
        $idphonetype = $idcountrycode = $countrycode = $areacode = $phone = $number =$idpartyphone =
    //-----------var correos
        $email  = $idpartyemail =
    //---var redes sociales
        $idsocialmedia = $nick = $idpartysocialmedia= 
    //---Bancos
        $idbankaccounttype = 
        $idcountrybank = $idstatebank = $idcitybank =
        $bankname = $bankaccount = $observationbank = $addressbank =
        $aba = $abarouting = $swift = $iban =
        $idbankaccounttypeinterm = 
        $idcountryinterm = $idstateinterm = $idcityinterm = 
        $banknameinterm = $bankaccountinterm = $observationinterm = $addressinterm =
        $abainterm = $abaroutinginterm = $swiftinterm = $ibaninterm =                
    //---var cumplimientos
    //  $pep = $cpep = $fpep         
        $idcountrypep = $idcountrycpep = $idcountryfpep =        
        $typepep = $typecpep = $typefpep = 
        $numberpep = $numbercpep = $numberfpep =
        $documentidpep = $documentidcpep = $doucmentidfpep  = 
        $observationpep = $observationcpep = $observationfpep = "";
        
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
    $urloper = basePL::getReq($_REQUEST,"urloper");
    $pn = basePL::getReq($_REQUEST,"pn");			
    //$register = basePL::getReq($_REQUEST,"register");
        
    //----- ID PARTY and default
    $id = basePL::getReq($_REQUEST,"id");
    $code = basePL::getReq($_REQUEST,"code"); 
    $name = basePL::getReq($_REQUEST,"name");
    $observation = basePL::getReq($_REQUEST,"observation");
    //$active = basePL::getReqCheck($_REQUEST,"active");
    //$deleted = basePL::getReqCheck($_REQUEST,"deleted");    
    $idpartyaddress = basePL::getReq($_REQUEST,"idpartyaddress");
    $idpartyphone = basePL::getReq($_REQUEST,"idpartyphone");
    $idpartyemail = basePL::getReq($_REQUEST,"idpartyemail");
    $idpartysocialmedia = basePL::getReq($_REQUEST,"idpartysocialmedia");
    $idpartybankinfo = basePL::getReq($_REQUEST,"idpartybankinfo");
    //Montrar si existe data compliance
        $idpartycompliance = basePL::getReq($_REQUEST,"idpartycompliance");
        $pep = basePL::getReqCheck($_REQUEST,"pep");
        if($pep!="N" && $urloper != "clear"){
           $compliancedata="x"; 
        }else{
           $compliancedata="";  
        }
    
    // ARRAY PARA EL JAVASCRIPT DEL ACOORDION  
    $arrayPHP=array($idpartyaddress,$idpartyphone,$idpartyemail);
    $arrayPHPmsgERROR=array();
    
    //----- Datos basicos
    $identificacion=basePL::getReq($_REQUEST,"identificacion");
    $registerdate = basePL::getReq($_REQUEST,"registerdate");
    $bussinesname = basePL::getReq($_REQUEST,"bussinesname"); 
    $password = basePL::getReq($_REQUEST,"password"); 
    $buildingnamenumber = basePL::getReq($_REQUEST,"buildingnamenumber"); 

    //----- Direcciones
    $buildingnumber= basePL::getReq($_REQUEST,"buildingnumber"); 
    $suburb = basePL::getReq($_REQUEST,"suburb"); 
    $municipality = basePL::getReq($_REQUEST,"municipality"); 
    $postalcode = basePL::getReq($_REQUEST,"postalcode"); 
    $RFC = basePL::getReq($_REQUEST,"RFC");
    $idstate = basePL::getReq($_REQUEST,"idstate"); 
    $street = basePL::getReq($_REQUEST,"street"); 
    $idaddresstype = basePL::getReq($_REQUEST,"idaddresstype");   
    $idcountry = basePL::getReq($_REQUEST,"idcountry");
    
    //-----telef
    $idphonetype = basePL::getReq($_REQUEST,"idphonetype");      
    $phone = basePL::getReq($_REQUEST,"phone"); 
    
    //----correo
    $idemailtype = basePL::getReq($_REQUEST,"idemailtype");
    $email  = basePL::getReq($_REQUEST,"email");
  
    
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

    
  

    //----Varibles concatenadas    
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
            $com_party_exists ="select id from core.party where rfc='$RFC' ";
            $resul_party_exists=$dbl->executeScalar($com_party_exists);    

            if($resul_party_exists!=""){
                //buscar en person
                $com="select a.rfc,a.password,a.registerdate,b.* FROM core.enterprise AS b,core.party AS a WHERE 
                a.id= b.idparty and idparty='$resul_party_exists'"; 
            }else{
                $com="";               
            }
        }else{
            //buscar Empresa por id
            $com="Select a.rfc,a.password,a.registerdate,b.* FROM core.enterprise AS b,core.party AS a WHERE 
            a.id= b.idparty and b.id='$id'";    
// var_dump($com);
        }       
                
        $resul_person=$dbl->executeReader($com);
// var_dump($resul_person);

        //si existe extraer datos
        if ($resul_person[0] != "") { 
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
  // var_dump($landsurface);
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
           
            $active = $resul_person[0]["active"];
            $deleted = $resul_person[0]["deleted"];                
                     $date = str_replace(" 00:00:00", "", $registerdateandhour );

        }
       
        if($idpartyaddress == "" &&
            $idpartyphone == "" &&
            $idpartyemail == "" &&
            $idpartysocialmedia == "" &&
            //   $idpartycompliance == "" && 
            $urloper=="findid"){            
                if ($resul_person[0] != "") { 
                    //utilities::alert("Cliente Registrado en el Sistema");
                }else{
                    utilities::alert(" NO se encuentra registrado");
                }            
        }         

        //buscar una direccion segun su id y segun el idparty
        
        if ($idpartyaddress!= ""){
            $dbl= new baseBL();
            $com="SELECT * from core.address where idparty='$idparty' and id='$idpartyaddress'";
                   
            $resul_address=$dbl->executeReader($com);

            foreach($resul_address as $valkey){     
                    $idpartyaddressfiscal =  $valkey["id"];
                    $idaddresstypefiscaladdress = $valkey["idaddresstype"];

                    $idstate = $valkey["idstate"];
                    // $idcity = $valkey["idcity"]; streetbuildingaddress
                    $suburbfiscaladdress = $valkey["suburb"];
                    $municipalityfiscaladdress = $valkey["municipality"];
                    $buildingnumberfiscaladdress = $valkey["buildingnumber"]; 
                    $postalcodefiscaladdress = $valkey["postalcode"];               
                    $streetfiscaladdress = $valkey["street"]; 
                      
            }  
        }         
        //buscar un telef segun su id y segun el idparty
        if ($idpartyphone!= ""){
            $dbl=new baseBL();
            $com="SELECT * from core.phone where idparty='$idparty' and id='$idpartyphone'";       
            $resul_phone=$dbl->executeReader($com);

            foreach($resul_phone as $valkey){     
                $idphonetype = $valkey["idphonetype"];
                $phone = $valkey["content"];  
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


  
    
    //validar datos personales I
    //    if($fullname=="" ||  $firstname=="" ||  $lastname=="" || 
    //        $registerdate=="" ||  $idcountrynationality==""){
    //        $msj_error .= "Datos personales I estan incompletos. "; 
    //    }    
    if(($fullname=="" ||  $firstname=="" ||  $lastname=="" || 
        // $registerdate =="" ||
        // $birthplace =="" ||
        // $monthlyincome =="" ||
        // $idcivilstate =="" ||
        // $ideconomicalactivity =="" ||
        // $idcountrynationality =="" ||
        // $idoccupation =="" ||
        // $idcountrybirth =="" ||
        $curp=="") && ($registernumber!="")  
        // $idgender==""  
    ){
        $msj_error .= "Debe completar los datos personales obligatorios(*). "; 
        $arrayPHPmsgERROR[]=0;
    }      
    
    // //validar edad
    // if($registerdate!=""){
    //     list($año,$mes ,$día ) = split('[/.-]', $registerdate);
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
    // if($email=="" && $idphonetype =="" && $countrycode =="" && 
    //     $areacode =="" && $number =="" && $id=="" && $urloper == "save"){
            if($email=="" && $idphonetype =="" && $phone =="" && $id=="" && $urloper == "save"){
        $error_msg_first_regist .= "Debe registar minimo un teléfono y un correo. ";
        $arrayPHPmsgERROR[]=1;
        $arrayPHPmsgERROR[]=2;    
    } else {
        if($email==""&& $id=="" && $urloper == "save"){
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
  
    //validar correo 
    if($email!=""){
        if (!utilities::validEmail($email)){
              $msj_error .= "El correo es invalido, verifique. ";    
              $arrayPHPmsgERROR[]=2;
        }    
        $com="select id from core.email where email='$email' ";
        $resulvalidate=$dbl->executeReader($com); 
        if($resulvalidate!="" && $id==""){
            $error_msg_first_regist .="El correo:$email, ya se encuentra asociado a otro usuario. "; 
           $arrayPHPmsgERROR[]=2;
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
        if($documentid!=""){           
            $com_party_exists="select id from core.party where rfc='$documentid'";
            // var_dump($com_party_exists);
            $resul_party_exists=$dbl->executeScalar($com_party_exists);

            // var_dump("1---->".$com_party_exists);
            // var_dump("2---->".$resul_party_exists);
            //si existe buscar id de person
            if($resul_party_exists!=""){
                $com="select id FROM core.consultant where idparty='$resul_party_exists'";
                $id=$dbl->executeScalar($com);
                // var_dump("3-->".$com);
                // var_dump("4-->".$id);
                //si existe en person buscar el idparty y el idpartycompliance
                if ($id!=""){
                    //   if($msj_error==""){
                        $com="select idparty from core.consultant where id='$id'";
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
                    $com="Select core.isspinspartyid(NULL,'$fullname',NULL,'$password','$documentid','$registerdate',"
                        . "'$active','$deleted')";   
  

                    $idparty=$dbl->executeScalar($com);

                    $oper = "insert";                      
                }else{
                    //   utilities::alert($msj_error.$error_msg_first_regist);
                }                                  
            }            
        }
    }
    
    
    //----OBJETOS
    $dbl = new agreementBL($code, $name,$idparty,

  $bussinesname,
  $date,
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

      $active, $deleted);
    $addressbl = new partyaddressBL($code, 
        $name ,
        $idparty,
        $buildingnumberfiscaladdress,
        $suburbfiscaladdress,
        $municipalityfiscaladdress,
        $postalcodefiscaladdress,
        $idaddresstypefiscaladdress,
        $idstate,
        $idcity,
        $streetfiscaladdress,        
        $active,    
        $deleted);  

    $phonebl = new partyphoneBL($code, $name, $idparty, $idphonetype,
        $phone, $active_phone, $deleted);

    $emailbl = new partyemailBL($code,$name,$idparty,$idemailtype,$email,
        $active_email,$deleted);        
    // $socialmediabl = new partysocialmediaBL($code,$name,$idparty,$idsocialmedia,$nick,
    //     $observation,$active_socialmedia,$deleted);   
    // $bankinfobl = new partybankinfoBL($code,$name,$idparty,$idbankaccounttype,
    //         $idcountrybank,$idstatebank,$idcitybank,
    //         $bankname,$bankaccount,$observationbank,$addressbank,
    //         $aba,$abarouting,$swift,$iban,
    //         $idbankaccounttypeinterm, 
    //         $idcountryinterm,$idstateinterm,$idcityinterm, 
    //         $banknameinterm,$bankaccountinterm,$observationinterm,$addressinterm,
    //         $abainterm,$abaroutinginterm,$swiftinterm,$ibaninterm,$active_bankinfo,$deleted);   
    
    // $compliancebl = new partycomplianceBL($code,$name,$idparty,
    //     $pep,$cpep,$fpep,
    //     $idcountrypep,$idcountrycpep,$idcountryfpep,
    //     $documentidpep,$documentidcpep,$doucmentidfpep,
    //     $observationpep,$observationcpep,$observationfpep,$active_compliance,$deleted);  

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
    // if ($idpartysocialmedia != "") {
    //         $arPar_socialmedia[] = $idpartysocialmedia;
    // } 
    // if($urloper != "save" && $idpartysocialmedia == ""){
    //         $arPar_socialmedia[] = "";
    // }  
    // if ($idpartybankinfo != "") {
    //         $arPar_bankinfo[] = $idpartybankinfo;
    // } 
    // if($urloper != "save" && $idpartybankinfo == ""){
    //         $arPar_bankinfo[] = "";
    // }      
    // if ($idpartycompliance != "") {
    //     $arPar_compliance[] = $idpartycompliance;
    // }
    // if($urloper != "save" && $idpartycompliance == ""){
    //         $arPar_compliance[] = "";
    // }  
     


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
    if ($urloper == "save" && $idpartysocialmedia ==  "" && $idparty!="") {
            $opersocialmedia = "insert";
    }
    if ($urloper == "save" && $idpartysocialmedia != "" && $idparty!="") {
            $opersocialmedia = "update";
    }    
    if ($urloper == "save" && $idpartybankinfo ==  "" && $idparty!="") {
            $operbankinfo = "insert";
    }
    if ($urloper == "save" && $idpartybankinfo != "" && $idparty!="") {
            $operbankinfo = "update";
    }      
    if ($urloper == "save" && $idpartycompliance ==  "" && $idparty!="") {
            $opercompliance = "insert";
    }
    if ($urloper == "save" && $idpartycompliance != "" && $idparty!="") {
            $opercompliance = "update";
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
        $com="select id from core.consultant where idparty='$idparty'";
        $id=$dbl->executeScalar($com);              
    }else{
        $dbl->execute($oper,$arPar_person);
    }

    // crear arrays
    $addressbl->$buildArray($arPar_address);
    $phonebl->$buildArray($arPar_phone);    
    $emailbl->$buildArray($arPar_email);   

    // $socialmediabl->$buildArray($arPar_socialmedia);
    // $bankinfobl->$buildArray($arPar_bankinfo);
    // $compliancebl->$buildArray($arPar_compliance);

    //BL.all
    //**********************PENDIENTE POR MEJORAR 
    if(($idaddresstype!= "" || $idcountry!= "" ||$idstate!= "" ||$idcity!= "" ||$suburb!= "" ||
               $municipality !="" || $street!="" || $avenue!= "" ||$building!= "" || $floor !="" ||$buildingnumber!= "" || $postalcode !="")
                && ($urloper!="find") && $idparty!=""){
        $msg_BL_error .=$addressbl->validatemsg();
        if ($addressbl->validate()==true){
            //buscar que la direccion no este previamente asociada a esa persona
            $com="select id from party.partyaddress where idaddresstype='$idaddresstype'"
                    . " and idcountry='$idcountry' and idstate='$idstate' "
                    . " and idcity='$idcity' and suburb='$suburb' and municipality='$municipality' and avenue='$avenue'"
                    . " and building='$building' and floor='$floor' and buildingnumber='$buildingnumber' and postalcode='$postalcode' and idparty='$idparty' ";
            $resulvalidate=$dbl->executeReader($com); 
            
            //   if($resulvalidate!="" && $idpartyaddress==""){
            if($resulvalidate!="" ){
                $msg_BL_error .="Los datos de direccion ya se encuentran "
                        . "registrado para esta persona, pruebe con otra";
            }else{
                //   if($idparty!=""){
                    if($oper=="update" || $oper=="insert" ){
                        $msg .=$addressbl->executeaddress($operaddress,$arPar_address);
                    }else{
                        $addressbl->execute($operaddress,$arPar_address);
                    }                
                //----- var direcciones
                    $idaddresstype = $idcountry = $idstate = $idcity 
                    = $suburb =$municipality = $avenue =$street= $building=$floor  = $buildingnumber=$postalcode = ""; 
                    $idpartyaddress= "";    
                    $active_address = "Y";
                //   }
            }                                         
        }else{
            $arrayPHPmsgERROR[]=1;
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
            $arrayPHPmsgERROR[]=2;
        }   
    }                 
    if($email!= ""   && ($urloper!="find") && $idparty!=""){
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
                $email  =   ""; 
                $idemailtype  =   "";    
                $idpartyemail = "";
                $active_email = "Y";
            }                                   
        }else{
            $arrayPHPmsgERROR[]=3;
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
        $idcard = $arPar_person[4];	
        $curp = $arPar_person[5];

        $firstname = $arPar_person[6];
        $middlename = $arPar_person[7];
        $lastname = $arPar_person[8];
        $secondlastname = $arPar_person[9];
        $registernumber = $arPar_person[10];
        

        // $registerdate = $arPar_person[8];
        // $birthplace = $arPar_person[9];
        // $monthlyincome = $arPar_person[10];
        // $idcivilstate = $arPar_person[11];
        // $ideconomicalactivity = $arPar_person[12];
        // $idcountrynationality = $arPar_person[13];
        // $idoccupation = $arPar_person[14];
        // $idcountrybirth = $arPar_person[15];
        // $idgender  = $arPar_person[16];  
        $active = $arPar_person[11];
        $deleted = $arPar_person[12];

        
    }     
    if ($oper == "find" || $oper == "findByName") {

        //   $id = $arPar_address[0];
        //   $code = $arPar_address[1];
        //   $name = $arPar_address[2];
        //   $idparty = $arPar_address[3];
        // $idcountry = $arPar_address[5];

        $buildingnumber = $arPar_address[4];
        $suburb = $arPar_address[5];
        $municipality  = $arPar_address[6];
        
        $postalcode  = $arPar_address[7];
        $idaddresstype = $arPar_address[8];
        $idstate = $arPar_address[9];
        $idcity = $arPar_address[10];   
        $street = $arPar_address[11];     
        $active_address = $arPar_address[12];  

        // $avenue = $arPar_address[10];
        // $building = $arPar_address[11];
        // $floor  = $arPar_address[12];

        //   $observation = $arPar_address[12];

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

            //DIRECCION (PAIS,ESTADO y CIUDAD) DATOS PERSONALES
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
    
            //DIRECCION (PAIS,ESTADO y CIUDAD) addressbank
            $(document).ready(function(){
                $("#idcountrybank").on('change', function () {
                    $("#idcountrybank option:selected").each(function () {
                        selectidstate=$(this).val();
                        $.post("ajaxDatepartypersonBL.php", { selectidstate: selectidstate }, function(data) {
                            $("#idstatebank").html(data);                               
                        });			
                    });
                    $("#idstatebank option:selected").each(function () {
                        selectidcity="";
                        $.post("ajaxDatepartypersonBL.php", { selectidcity: selectidcity }, function(data) {
                            $("#idcitybank").html(data);                               
                        });			
                    });
               });
               $("#idstatebank").on('change', function () {
                    $("#idstatebank option:selected").each(function () {
                        selectidcity=$(this).val();
                        $.post("ajaxDatepartypersonBL.php", { selectidcity: selectidcity}, function(data) {
                            $("#idcitybank").html(data);                               
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
                
                
                
//    $(document).ready(function(){
//        $("#countrycode").on('change', function () {
//            $("#countrycode option:selected").each(function () {
//                selectidstate=$(this).val();
//                $.post("ajaxDatepartypersonBL.php", { selectidstate: selectidstate }, function(data) {
//                    $("#areacode").html(data);                               
//                });			
//            });
//       });                  
//    });  
//function phones (){
//
//     
//}
//                $(document).ready(function(){
//                    $("#idphonetype").on('change', function () {
//                        $("#idphonetype option:selected").each(function () {
//                            //id idphonetype
//                            
//                            idphonetype=$(this).val();
//                         $("#countrycode option:selected").each(function () {
//                            countrycode=$(this).val();
//                  		
//                        });
//                        
//                            $.post("ajaxDatepartypersonBL.php", { idphonetype: idphonetype,countrycode: countrycode },
//                                function(data) {
//                                $("#areacode").html(data);                               
//                            }                    
//                           );			
//                        });
//                   });
//                    $("#countrycode").on('change', function () {
//                        $("#countrycode option:selected").each(function () {
//                            //id idphonetype
//                            countrycode=$(this).val();
//                         $("#idphonetype option:selected").each(function () {
//                            
//                  		idphonetype=$(this).val();
////                                alert(idphonetype);
//                        });
//                        
//                            $.post("ajaxDatepartypersonBL.php", { idphonetype: idphonetype,countrycode: countrycode },
//                                function(data) {
//                                $("#areacode").html(data);                               
//                            }                    
//                           );			
//                        });
//                   });                
//                }); 



                //--------------------------------------



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
            
            
        </script>
    </head>
    <body>    
        <FORM action="<?php echo $action;?>" method="post" name="agreementPL" class="italsis">
		
<?php
    $dbl=new baseBL();  
    presentationLayer::buildFormTitle("Registro Consultor",""); 
    presentationLayer::buildIdInputHidden($id,"document.agreementPL",$fLink);

    myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);
    myPresentationLayer::buildInputHidden("idpartyaddress","idpartyaddress","idpartyaddress",$idpartyaddress);
    myPresentationLayer::buildInputHidden("idpartyphone","idpartyphone","idpartyphone",$idpartyphone);
    myPresentationLayer::buildInputHidden("idpartyemail","idpartyemail","idpartyemail",$idpartyemail);
    myPresentationLayer::buildInputHidden("idpartysocialmedia","idpartysocialmedia","idpartysocialmedia",$idpartysocialmedia);
    myPresentationLayer::buildInputHidden("idpartybankinfo","idpartybankinfo","idpartybankinfo",$idpartybankinfo);
    myPresentationLayer::buildInputHidden("idpartycompliance","idpartycompliance","idpartycompliance",$idpartycompliance);
 

    $comm="select a.rfc,b.* FROM core.consultant AS b,core.party AS a WHERE 
                a.id= b.idparty and a.rfc='$documentid'";  
    $resul_exist=$dbl->executeReader($comm);
echo "<div style='    display: flex;'>"; 
    myPresentationLayer::buildInitColumn3();  
		
        $onc = $bpl->buildEvent("personPL-agreementPL.php","findid");
        if($registernumber==""){    
            // myPresentationLayer::buildInputWithValidator(
            //     "Identificación","identificacion", "identificacion", $identificacion, 
            //      "", "", "","onblur",$onc);        
            myPresentationLayer::buildInputWithValidatorClass(
                "Identificación(*)","identificacion","identificacion",$identificacion,
                "input","title",
                "onblur",$onc,
                "","","","",
                "",$maxlength,"","","","","");            
        }
        if($registernumber!=""){  
                    

            myPresentationLayer::buildInputWithValidatorClass(
                "RFC(*)","documentid","documentid",$documentid,
                "input","title",
                "","",
                "","","","",
                "",$maxlength,"","","","","");                                        
            myPresentationLayer::buildInputWithValidatorClass(
                "Segundo Nombre(*)","middlename","middlename",$middlename,
                "input","title",
                "onkeypress","return isESLetter(event)",
                "","","","",
                "","50","","","","","");             

            myPresentationLayer::buildInputWithValidatorClass(
                "Número de Registro(*)","registernumber","registernumber",$registernumber,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","readonly","","","","");             
                             
    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3();  
            myPresentationLayer::buildInputWithValidatorClass(
                "Primer Nombre(*)","firstname","firstname",$firstname,
                "input","title",
                "onkeypress","return isESLetterNoSpace(event)",
                "","","","",
                "","50","","","","","");  
            myPresentationLayer::buildInputWithValidatorClass(
                "Segundo Apellido(*)","secondlastname","secondlastname",$secondlastname,
                "input","title",
                "onkeypress","return isESLetter(event)",
                "","","","",
                "","50","","","","","");                
            // myPresentationLayer::buildInputWithValidatorClass(
            //     "Curp","curp","curp",$curp,
            //     "input","title",
            //     "onkeypress","return isESNumber(event,this)",
            //     "","","","",
            //     "","25",""); 
  
            myPresentationLayer::buildInputWithValidatorClass(
                "Contraseña(*)","password","password",$password,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","","","","","password");   
                            
        
        
    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3(); 
            myPresentationLayer::buildInputWithValidatorClass(
                "Primer Apellido(*)","lastname","lastname",$lastname,
                "input","title",
                "onkeypress","return isESLetterNoSpace(event)",
                "","","","",
                "","50","","","","",""); 
            myPresentationLayer::buildInputWithValidatorClass(
                "Curp(*)","curp","curp",$curp,
                "input","title",
                "onkeypress","return isESLetterNumberNoSpace(event)",
                "onkeyup","this.value=this.value.toUpperCase();",
                "","",
                "","20","","","","","");   
            $year= date("Y");           
            $moths= date("m");
            $day= date("d");
            myPresentationLayer::buildInputCalendarWithValidatorClass(
                "Fecha de Registro(*)","registerdate","registerdate",$registerdate,
                "input date","title",$year,$moths,$day,"","","","","","",$required); 
                }                                      
    presentationLayer::buildEndColumn();

echo "</div>";    
        if($registernumber!=""){   
   

   
    
            echo'


                <div class="accordion" value="active_address">Direcciones</div>
                <div class="panel">';
        
    presentationLayer::buildInitColumn();
    
            $com="SELECT * FROM base.entitysubclass where code='ADDRESSTYPEVALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo de direccion(*)","idaddresstype","idaddresstype",$addressbl,
                $com, "id", "name", $idaddresstype,"input","title");  

            // myPresentationLayer::buildSelectClass(
            //     "Tipo de dirrecion(*)","idaddresstype","idaddresstype",$addressbl,
            //     "addresstype",$idaddresstype,"base","input","title","",$required);      
            $com="select * from base.city where idstate='$idstate'";
            myPresentationLayer::buildSelectWithComEventClass(
                "Ciudad","idcity","idcity",$addressbl,
                $com, "id", "name", $idcity,"input","title","DependentCombos()");     

            myPresentationLayer::buildInputWithValidatorClass(
                "Calle(*)","street","street",$street,
                "input","title",
                "onkeypress","",
                "","","","",
                "","20");   
            myPresentationLayer::buildInputWithValidatorClass(
                "Apto./Nro./Nombre(*)","buildingnumber","buildingnumber",$buildingnumber,
                "input","title",
                "onkeypress","return isESLetterNumber(event)",
                "","","","",
                "","20");                  

      
              
    presentationLayer::buildEndColumn();
    presentationLayer::buildInitColumn();
    
            $com="select * from base.state";
            myPresentationLayer::buildSelectWithComEventClass(
                "Estado","idstate","idstate",$addressbl,
                $com, "id", "name", $idstate,"input","title","DependentCombos()");     
    
            myPresentationLayer::buildInputWithValidatorClass(
                "Municipio(*)","municipality","municipality",$municipality,
                "input","title",
                "onkeypress","return isESNumberCaracter(event)",
                "","","","",
                "","12");     
                            

            myPresentationLayer::buildInputWithValidatorClass(
                "Colonia(*)","suburb","suburb",$suburb,
                "input","title",
                "onkeypress","return isESLetterNumber(event)",
                "","","","",
                "","20");  

            myPresentationLayer::buildInputWithValidatorClass(
                "Código Postal(*)","postalcode","postalcode",$postalcode,
                "input","title",
                "onkeypress","return isESNumberCaracter(event)",
                "","","","",
                "","12");
    presentationLayer::buildEndColumn(); 

            if ($idpartyaddress== "" ){

                $comp= "SELECT pprs.id, (SELECT a.name FROM base.entitysubclass as a where code='ADDRESSTYPEVALUES' and pprs.idaddresstype=a.id ) as idaddresstype, pprs.municipality,pprs.suburb, pprs.postalcode from core.address pprs where pprs.idparty='$idparty'";         
// var_dump($comp);
                if($resul_exist!=""){ 
                    $arrCol = array("Id","Tipo de Dir.","Municipio","Colonia","Cod. Postal");
                    $addressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyaddress");                         
                }
            }else{                    
                $comp= "SELECT pprs.id,
                    (SELECT a.name 
                        FROM base.addresstype a where pprs.idaddresstype=a.id ) as idaddresstype,
                    (SELECT b.name
                        FROM base.country b where pprs.idcountry=b.id) as idcountry,
                    (SELECT c.name
                        FROM base.state c where pprs.idstate=c.id) as idstate,	
                    (SELECT d.name
                        FROM base.city d where pprs.idcity=d.id) as idcity,
                    pprs.municipality,pprs.avenue,
                    pprs.postalcode

                from party.partyaddress pprs where pprs.idparty='$idparty' and pprs.id!='$idpartyaddress'";         

                $arrCol = array("Id","Tipo de dirrecion","Estado",
                                "Ciudad","Mun/Par","Av./Calle/Car","Cod. Postal");
                $addressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyaddress");                                            
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
            // var_dump($vvv);
            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo de teléfono(*)","idphonetype","idphonetype",$addressbl,
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
                    $arrCol = array("Id","Tipo de teléfono","Número");
                    $addressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyphone");                          
                }                                       
            }else{
                $comp="SELECT pprs.id,
                    (SELECT a.name
                        FROM base.phonetype a where pprs.idphonetype=a.id ) as idphonetype,
                    pprs.countrycode||''||pprs.areacode||''||pprs.number

                from party.partyphone pprs where pprs.idparty='$idparty' and pprs.id!='$idpartyphone'";         

                $arrCol = array("Id","Tipo de teléfono","Número");
                $addressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyphone");                                          
            }
        
            echo'</div> 
                

                <div class="accordion">Correos</div>
                <div class="panel">';
        
    presentationLayer::buildInitColumn();
    

                $com="SELECT * FROM base.entitysubclass where code='EMAILTYPEVALUES'";
            // $vvv=$dbl->executeReader($com);
            // var_dump($vvv);
            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo de correo(*)","idemailtype","idemailtype",$addressbl,
                $com, "id", "name", $idemailtype,"input","title","");                
    presentationLayer::buildEndColumn();  
    presentationLayer::buildInitColumn();
            // myPresentationLayer::buildInputCheckEmail(
            //     "Correo(*)","email","email",$email,"","","",);
            myPresentationLayer::buildInputWithValidatorClass(
                "Correo(*)","email","email",$email,
                "input","title",
                "onkeypress","",
                "","","","",
                "","50","",$required,"","","");              
    presentationLayer::buildEndColumn();  
                
            if($idpartyemail==""){
                $comp= "SELECT id,
                    content
                from core.email where idparty='$idparty'";         

                if($resul_exist!=""){
                    $arrCol = array("Id","Correo");
                    $addressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyemail");                         
                } 
            }else{
                $comp= "SELECT id,
                    content
                from core.email where idparty='$idparty' and id!='$idpartyemail'";   
                $arrCol = array("Id","Correo");
                $addressbl->fillGridDisplayPaginator($comp,$arrCol,$id,"idpartyemail");                      
            }                       
            echo'</div>';
                
  
            
        }
        
        if($registernumber!=""){ 
            $save="Y";
            $clear="Y";
            $back="Y";
            $dbl->buildFooterNoGrid($bpl,$dbl,$pn,$save,"N","N",$clear,"N",$back);
        }else{
            $save="N";
            $clear="N";
            $back="N";
        } 
                     
        if($registernumber==""){ 
		
            if($id==""){    
                $comp="select b.id, b.name, a.rfc from core.party a, core.consultant b where a.id=b.idparty  order by  name LIMIT 30";
            }

            $arrCol = array("Id","Nombre Completo","Identificacion");
            $dbl->fillGridDisplayPaginator($comp,$arrCol);                     
        }	
        
?>	  
        </form>
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
// alert(acc.length);            
// alert(arrayJS.length);
            // Mostramos los valores en caso de busqueda
            for(var i=1;i<arrayJS.length;i++){

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
    </body>
</html>
