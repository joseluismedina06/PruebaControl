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
        include_once("registroBL.php"); 
        chdir(dirname(__FILE__));
        include_once("personBL.php");          

        basePL::buildjs();
        basePL::buildccs();
     
        myUtilities::buildmyccs(0);   
        myUtilities::buildmyjs(0);
        
    ?>	    		
    <html>
        <head>
            <script type="text/javascript" src="datepickercontrol.js"></script> 
            <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
            <title>Directorios</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
            <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?php
        // base
        $bl=new baseBL();

        // default
        $active = "Y";
        $deleted = "N";
        $id = $code = $name = $observation

        /*
        = $idclink
        = $idclinker
                    
        //----- var Datos basic  
        = $email 
        = $password 
        = $firstname 
        = $lastname 
        = $birthdate 
        = $idgradeacademic
        = $idinstituteacademic_records
        = $idtitle
        = $ufromacademic_records
        = $untilacademic_records
        = $idcompany
        = $idcharge
        = $ufromexperience_record
        = $untilexperience_record 
        = $idinstitutecertifies_records
        = $idcertifies
        = $ufromcertifies_records
        = $untilcertifies_records*/
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

        //----- Datos basicos   
        $idpartyenterprise=$_SESSION["idpartyenterprise"];
                    
        //----- var Datos basic
        //  
        //$legalframework  = basePL::getReq($_REQUEST,"legalframework");

        $enterprisesecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"enterprisesecurityplanriskanalysysemergencydirectory");
        $phonesecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"phonesecurityplanriskanalysysemergencydirectory");
        $addresssecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"addresssecurityplanriskanalysysemergencydirectory");
        $idsecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"idsecurityplanriskanalysysemergencydirectory");
        $savesecurityplanriskanalysysemergencydirectory = basePL::getReq($_REQUEST,"savesecurityplanriskanalysysemergencydirectory");
        $logosecurityplanriskanalysysemergencydirectory=$_FILES['logosecurityplanriskanalysysemergencydirectory'];
        
        /*
        if($idpartyenterprise!="" && $legalframework==""){
            $dbl=new baseBL();
            $com="SELECT legalframework FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $legalframework=$dbl->executeScalar($com);
        }        
        */

        //validar correo 
        if($idpartyenterprise==""){
            $msj_error .= "Problemas con la Información de le Empresa, verifique. ";                
        }else{
            // if ($urloper == "save" && $legalframework=="") {
            //      $error_msg_first_regist .= "La justificación no puede estar vacio. "; 
            // }
        }
        
        //msj ALERTA
        if(($msj_error!="" || $error_msg_first_regist!="")
            && $urloper == "save"){
            utilities::alert($msj_error.$error_msg_first_regist);
        }  

        // GUARDAR
        /* 
        if ($urloper == "save" && ($msj_error=="" && $error_msg_first_regist=="")) {
             $dbl=new baseBL();
            //consultar si existe la ci          
            // $com_party_exists="select id from core.clinker where email='$email'";
            // $resul_party_exists=$dbl->executeScalar($com_party_exists);

            // //si existe buscar id de person
            // if($resul_party_exists!=""){

            //     utilities::alert("correo ya registrado");
            // //sino existe se debe validar datos y registrar en party 
            // }else{
            if($msj_error=="" && $error_msg_first_regist==""){
                $com="SELECT id FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
                $idsecurityplansitelocation=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansitelocation=="") {
                    $com="INSERT INTO core.securityplansitelocation 
                        (idparty,legalframework)
                        VALUES ('$idpartyenterprise','$legalframework') RETURNING id";
                        // var_dump($com);
                    $idsecurityplansitelocation=$dbl->executeScalar($com);
                    if ($idsecurityplansitelocation>0 && $idsecurityplansitelocation!="") {
                        $path = "nminventarioPL.php";
                        utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido");

                    }
                }else{
                    $com="UPDATE core.securityplansitelocation 
                    SET legalframework='$legalframework' WHERE idparty='$idpartyenterprise' RETURNING id";
                // var_dump($com);
                    $idsecurityplansitelocation=$dbl->executeScalar($com);
                    if ($idsecurityplansitelocation>0 && $idsecurityplansitelocation!="") {
                        $path = "nminventarioPL.php";
                        utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido");

                    }
                }                                          
            }else{
                utilities::alert($msj_error.$error_msg_first_regist);
            }                                  
                // }            
            // }
        }
        */

        // GUARDAR
        if ($urloper == "save" && ($msj_error=="" && $error_msg_first_regist=="")) {
            $path = "nminventarioPL.php";
            utilities::redirect($path);
        }

        // guardar securityplanriskanalysysemergencydirectory   
        //   
        if ($savesecurityplanriskanalysysemergencydirectory=="savesecurityplanriskanalysysemergencydirectory" ) {
            $dbl=new baseBL();
            if ($idsecurityplanriskanalysysemergencydirectory=="") {
                $img_content = file_get_contents($logosecurityplanriskanalysysemergencydirectory["tmp_name"]);    
                $img_base64 = chunk_split(base64_encode($img_content));
                $com="INSERT INTO core.securityplanriskanalysysemergencydirectory 
                (idparty,logo,enterprise,phone,address)
                VALUES ('$idpartyenterprise','$img_base64','$enterprisesecurityplanriskanalysysemergencydirectory','$phonesecurityplanriskanalysysemergencydirectory','$addresssecurityplanriskanalysysemergencydirectory') RETURNING id";
                $idsecurityplanriskanalysysemergencydirectory=$dbl->executeScalar($com);
                // var_dump($com);
                if ($idsecurityplanriskanalysysemergencydirectory!="") {
                    utilities::alert("Registro Exitoso");
                    $idsecurityplanriskanalysysemergencydirectory =
                    $enterprisesecurityplanriskanalysysemergencydirectory = 
                    $phonesecurityplanriskanalysysemergencydirectory = 
                    $addresssecurityplanriskanalysysemergencydirectory = 
                    $savesecurityplanriskanalysysemergencydirectory = "";
                    $logosecurityplanriskanalysysemergencydirectory =
                    $img_base64 = "";
                }else{
                    utilities::alert("Error al Registrar en el Directorio");
                }
            }else{
                $img_content = file_get_contents($logosecurityplanriskanalysysemergencydirectory["tmp_name"]);    
                $img_base64 = chunk_split(base64_encode($img_content));            
                $com="UPDATE core.securityplanriskanalysysemergencydirectory 
                SET 
                logo='$img_base64' ,
                enterprise='$enterprisesecurityplanriskanalysysemergencydirectory' ,
                phone='$phonesecurityplanriskanalysysemergencydirectory' ,
                address='$addresssecurityplanriskanalysysemergencydirectory' 
                WHERE id='$idsecurityplanriskanalysysemergencydirectory' RETURNING id";
                // var_dump($com);
            
                $idsecurityplanriskanalysysemergencydirectory=$dbl->executeScalar($com);
                if ($idsecurityplanriskanalysysemergencydirectory>0 && $idsecurityplanriskanalysysemergencydirectory!="") {
                    utilities::alert("Modificación Exitosa");

                    $idsecurityplanriskanalysysemergencydirectory =
                    $enterprisesecurityplanriskanalysysemergencydirectory = 
                    $phonesecurityplanriskanalysysemergencydirectory = 
                    $addresssecurityplanriskanalysysemergencydirectory = 
                    $savesecurityplanriskanalysysemergencydirectory = "";
                    $logosecurityplanriskanalysysemergencydirectory =
                    $img_base64 = "";                  
                }else{
                    utilities::alert("Registro Fallido en el Directorio");
                }
            }
        }
        
        if ($idsecurityplanriskanalysysemergencydirectory!="" && $savesecurityplanriskanalysysemergencydirectory!="savesecurityplanriskanalysysemergencydirectory") {
            $com="SELECT 
            logo,enterprise,phone,address
            FROM core.securityplanriskanalysysemergencydirectory WHERE id='$idsecurityplanriskanalysysemergencydirectory'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $logosecurityplanriskanalysysemergencydirectory = $resul[0]["logo"];
                $enterprisesecurityplanriskanalysysemergencydirectory = $resul[0]["enterprise"];
                $phonesecurityplanriskanalysysemergencydirectory = $resul[0]["phone"];
                $addresssecurityplanriskanalysysemergencydirectory = $resul[0]["address"];
            }     
        } else {
          # code...
        }
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
        
  
        $registrobl->buildLinks("nmdirectorioPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.nmdirectorioPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);

        /*
        if ($id != "") {
                $arPar_registro[] = $id;
        } 
        if ($idpartyaddress != "") {
                $arPar_person[] = $idpartyaddress;
        }
        if($urloper != "save" && $idpartyaddress == ""){
                $arPar_person[] = "";
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
        // $registrobl->$buildArray_person($arPar_registro); 
        $personbl->$buildArray_person($arPar_person); 

        // BL.person
        // if($oper=="update" || $oper=="insert" ){        
        //     $msg .=$registrobl->executeperson($oper,$arPar_registro);   
        //     $com="select id from core.cinker where idclink='$idparty'";
        //     $id=$dbl->executeScalar($com);              
        // }else{
        //     $registrobl->execute($oper,$arPar_registro);
        // }     

        if($oper=="update" || $oper=="insert" ){        
            $msg .=$personbl->executeperson($oper,$arPar_person);   
            $com="select id from core.consultant where idparty='$idparty'";
            $id=$dbl->executeScalar($com);   

            $com="SELECT core.isspinsacademic_records(NULL,NULL,'$idclinker', '$idinstituteacademic_records', '$idtitle', '$ufromacademic_records', '$untilacademic_records','$active', '$deleted')";
            $dbl->executeScalar($com);
            $com="SELECT core.isspinsexperience_record(NULL,NULL,'$idclinker', '$idcompany', '$idcharge', '$ufromexperience_record', '$untilexperience_record','$active', '$deleted')";
            $dbl->executeScalar($com);
            $com="SELECT core.isspinscertifies_records(NULL,NULL,'$idclinker', '$idinstitutecertifies_records', '$idcertifies', '$ufromcertifies_records', '$untilcertifies_records','$active', '$deleted')";
            $dbl->executeScalar($com);
        }else{
            $personbl->execute($oper,$arPar_person);
        }
        
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
            

            // $birthdate = $arPar_person[8];
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

            $idcertifies = $arPar_address[4];
            $suburb = $arPar_address[5];
            $municipality  = $arPar_address[6];
            
            $postalcode  = $arPar_address[7];
            $idgradeacademic = $arPar_address[8];
            $idtitle = $arPar_address[9];
            $idcompany = $arPar_address[10];   
            $idcharge = $arPar_address[11];     
            $active_address = $arPar_address[12];  
        }
        if ($oper == "find" || $oper == "findByName") {

            //   $id = $arPar_phone[0];
            //   $code = $arPar_phone[1];
            //   $name = $arPar_phone[2];
            //   $idparty = $arPar_phone[3];
            $idinstituteacademic_records = $arPar_phone[4];
            $viewnumber = $arPar_phone[5];
            //   $observation = $arPar_phone[8];
            $active_phone = $arPar_phone[7];
            //   $deleted = $arPar_phone[10];
        }   
        if ($oper == "find" || $oper == "findByName") {
            //   $id = $arPar_email[0];
            //   $code = $arPar_email[1];
            //   $name = $arPar_email[2];
            //   $idparty = $arPar_email[3];
            $idinstitutecertifies_records = $arPar_email[4];
            $email = $arPar_email[5];
            //   $observation = $arPar_email[5];
            $active_email = $arPar_email[6];
            //   $deleted = $arPar_email[7];
        }       
        */
       
    ?>
            <!--
            <script>
                    
                // FECHA 
                $("#birthdate").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");
                // FECHA 
                $("#ufromacademic_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#ufromexperience_record").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#ufromcertifies_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");                 
                // FECHA 
                $("#untilacademic_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#untilexperience_record").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#untilcertifies_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");                 
                
            </script>
            -->

            <!--Navegacion-->    
                <link rel="stylesheet" href="css/tinyDrawer.min.css">
                <script src="js/tinyDrawer.min.js"></script>
                <script>
                    tinyDrawer();
                </script>
            <!--Fin Navegacion-->


        </head>
        <body>    
            <FORM action="<?php //echo $action;?>" method="post" name="marcolegalPL" class="italsis" enctype="multipart/form-data">
            <!--Navegacion-->
            <drawer-menu>
            <div align="center">
            <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
                max-width: 50%;
                height: auto;"></div>
                <br>
                <div style="overflow:scroll">
                <div style="padding-left: 10px;"><a href="../party/marcolegalPL.php">01.-MARCO LEGAL</a></div>
                <div style="padding-left: 10px;"><a href="../exchange/agreementPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['identerprise']; ?>">02.-PRESENTACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/justificacionPL.php">03.-JUSTIFICACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/objetivosPL.php">04.-OBJETIVOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/alcancePL.php">05.-ALCANCE</a></div>
                <!--<div style="padding-left: 10px;"><a href="../party/ubicaciondelpredioPL.php">06.-UBICACIÓN DEL PREDIO</a></div>-->
                <div style="padding-left: 10px;"><a href="../party/subprogramadeprevencionPL.php">07.-SUBPROGRAMA DE PREVENCIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmorganizacionPL.php">07.1.-ORGANIZACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmdocumentacionPL.php">07.2.-DOCUMENTACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/analisisderiesgosPL.php">07.3.-ANÁLISIS DE RIESGOS</a></div>
                <div style="padding-left: 30px;"><a href="../party/ubicaciondelpredioPL.php">07.3.1.-UBICACIÓN DEL PREDIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmdirectorioPL.php">07.4.-DIRECTORIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nminventarioPL.php">07.5.-INVENTARIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmmantenimientoPL.php">07.6.-MANTENIMIENTO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmcapacitacionPL.php">07.9.-CAPACITACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmprogramadedifusionyconcientizacionPL.php">07.10.-PROGRAMA DE DIFUSION Y CONCIENTIZACION</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmsimulacrosPL.php">07.11.-SIMULACROS</a></div>
                <!--<div style="padding-left: 10px;"><a href="../party/senalizacionPL.php">09.-SEÑALIZACIÓN</a></div>-->
                <!--<div style="padding-left: 10px;"><a href="../party/ejerciciosysimulacrosPL.php">10.-EJERCICIOS Y SIMULACROS</a></div>-->
                <div style="padding-left: 10px;"><a href="../party/subprogramadeauxilioPL.php">8.-SUBPROGRAMA DE AUXILIOS</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmalertamientoPL.php">08.1.-ALERTAMIENTO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmplanesdeemergenciaPL.php">08.2.-PLANES DE EMERGENCIA</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmevaluaciondedanosPL.php">08.3.-EVALUACION DE DAÑOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">09.-SUB PROGRAMA DE RECUPERACION</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmvueltaalanormalidadPL.php">09.1.-VUELTA A LA NORMALIDAD</a></div>

                <!--<div style="padding-left: 10px;"><a href="../party/procedimientodeemergenciaparaevacuacionPL.php">12.-PROCEDIMIENTO DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/tiposdeemergenciasPL.php">13.-TIPOS DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/funcionesdelequipodecombatecontraincendiosPL.php">14.-FUNCIONAMIENTO EQUIPO COMBATE</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">15.-SUBPROGRAMA DE RECUPERACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/vueltaalanormalidadPL.php">16.-VUELTA A LA NORMALIDAD</a></div>-->
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">folder_open</i></div>
                <div style="float:left;"><a href="../party/anexoPL.php">ANEXOS</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">account_box</i></div>
                <div style="float:left;"><a href="personPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['amidconsultant']; ?>">PERFIL</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">exit_to_app</i></div>
                <div style="float:left;"><a href="../party/exit.php">SALIR</a></div>
                </div>
            </drawer-menu>
            <!--Fin Navegacion-->       


    		<!--<FORM action="<?php //echo $action;?>" method="post" name="marcolegalPL" class="italsis">-->
    <?php
        $dbl=new baseBL();  
        // presentationLayer::buildFormTitle("Registro",""); 
        presentationLayer::buildIdInputHidden($id,"document.nmdirectorioPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
        <div data-drawer-open><div style="float:left;">
        <i class="material-icons">menu</i></div>DIRECTORIOS</div>
            ',"");     

        echo '<br>';

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Números de Emergencias</span>
        </div>
        <br>
        <div style="">
        <span style="color:black; font-size: medium; ">
            Directorio de Servicios de Auxilio para Emergencias </span>
        </div>
        '; 

        echo '<br>';

        myPresentationLayer::buildInitColumn3();  
        // echo '<div style="">

        // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
        // </div>'; 
        myPresentationLayer::buildInputWithValidatorClass(
            "Institución o Empresa","enterprisesecurityplanriskanalysysemergencydirectory","enterprisesecurityplanriskanalysysemergencydirectory",$enterprisesecurityplanriskanalysysemergencydirectory,
            "input","title",
            "onkeypress","",
            "","","","",
            "","","","","","",""); 
                

        // myPresentationLayer::inputFileImg("uploadid2","uploadid2",$iduser,"foto-perfil","previewphoto2","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid");

        // echo '           <div class="col-12 col-lg-8" id="previewphoto2" style="margin-top: 1rem;">                  
        //                     <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> 
        //                   </div>';
    ?>
        <!--<input type="file" name="logosecurityplanriskanalysysemergencydirectory">-->
        <input type="file" name="logosecurityplanriskanalysysemergencydirectory"
        id="file">

    <?php

        //echo '<img class="img-previewiddocument img-fluid" src="data:image/png;base64,'.
        //$logosecurityplanriskanalysysemergencydirectory.'" />'; 
        
        echo '<img 
        id="logosecurityplanriskanalysysemergencydirectory" 
        class="img-previewiddocument img-fluid" 
        src="data:image/png;base64,'.$logosecurityplanriskanalysysemergencydirectory.'" />';
        
        presentationLayer::buildEndColumn();
        myPresentationLayer::buildInitColumn3();  
        // echo '<div style="">

        // <span style="color:black; font-size: x-large; ">Amenaza:</span>
        // </div>'; 
        myPresentationLayer::buildInputWithValidatorClass(
                            "Teléfono","phonesecurityplanriskanalysysemergencydirectory","phonesecurityplanriskanalysysemergencydirectory",$phonesecurityplanriskanalysysemergencydirectory,
                            "input","title",
                            "onkeypress","",
                            "","","","",
                            "","","","","","","");    
    ?>

    <?php             
        presentationLayer::buildEndColumn();
        myPresentationLayer::buildInitColumn3(); 
                        myPresentationLayer::buildInputWithValidatorClass(
                            "Dirección","addresssecurityplanriskanalysysemergencydirectory","addresssecurityplanriskanalysysemergencydirectory",$addresssecurityplanriskanalysysemergencydirectory,
                            "input","title",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        presentationLayer::buildEndColumn();

        // $comm="";  
        // $resul_exist=$dbl->executeReader($comm);

        if($idsecurityplanriskanalysysemergencydirectory==""){
            $comp= "SELECT a.id, a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise'";         
            // var_dump($comp);
            // if($resul_exist!=""){
            $arrCol = array("Identificador","Institución o Empresa","Teléfono","Dirección");
            $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemergencydirectory");                         
            // } 
        }else{
            $comp= "SELECT a.id, a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idsecurityplanriskanalysysemergencydirectory'";   
            // var_dump($comp);
            $arrCol = array("Identificador","Institución o Empresa","Teléfono","Dirección");
            $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemergencydirectory");                      
        }
            
        echo '
        <button type="submit" id="agregar7" value="savesecurityplanriskanalysysemergencydirectory" class="button" name="savesecurityplanriskanalysysemergencydirectory">
        Guardar
        </button>
        ';            
    ?>

    <?php
        myPresentationLayer::buildButtonOrImage("Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
            "Guardar","urloper","bAccess","save","","btninicio","maxh-40");    
        // myPresentationLayer::buildButtonOrImage("Aceptar","urloper","bAccess","save","","btninicio","maxh-40");
    ?>	  

        </form>

        <!-- Script para mostrar la imagen del directorio -->
        <script type="text/javascript">
            document.getElementById("file").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function(){
                img = document.getElementById('logosecurityplanriskanalysysemergencydirectory');

                img.src = reader.result;

                // preview.innerHTML = '';
                // preview.append(image);
                };
            } 
        </script>  
        <!-- Fin Script para mostrar la imagen del directorio -->
    </body>
</html>
