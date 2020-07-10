    <?php 
        session_start();
        error_reporting(0);
        // informarme como puedo conseguir la planilla de antecedentes de servicios FP-023?
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
            <title>SubPrograma de Recuperación</title>
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
        = $untilcertifies_records */
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
        $recoversubprogram  = basePL::getReq($_REQUEST,"recoversubprogram");
        
        if($idpartyenterprise!="" && $recoversubprogram==""){
            $dbl=new baseBL();
            $com="SELECT recoversubprogram FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $recoversubprogram=$dbl->executeScalar($com);
        }        


        //validar correo 
        if($idpartyenterprise==""){
            $msj_error .= "Hay problemas con los datos de la Empresa, verifique. ";                
        }else{
            // if ($urloper == "save" && $recoversubprogram=="") {
            //      $error_msg_first_regist .= "La justificación no puede estar vacio. "; 
            // }
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
            // $com_party_exists="select id from core.clinker where email='$email'";
            // $resul_party_exists=$dbl->executeScalar($com_party_exists);

            // //si existe buscar id de person
            // if($resul_party_exists!=""){

            //     utilities::alert("correo ya registrado");
            // //sino existe se debe validar datos y registrar en party 
            // }else{
            if($msj_error=="" && $error_msg_first_regist==""){
                $com="SELECT id FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
                $idsecurityplancomplements=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplancomplements=="") {
                    $com="INSERT INTO core.securityplancomplements 
                        (idparty,recoversubprogram)
                        VALUES ('$idpartyenterprise','$recoversubprogram') RETURNING id";
                        // var_dump($com);
                    $idsecurityplancomplements=$dbl->executeScalar($com);
                    if ($idsecurityplancomplements>0 && $idsecurityplancomplements!="") {
                        $path = "nmvueltaalanormalidadPL.php";
                        utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido");

                    }
                }else{
                    $com="UPDATE core.securityplancomplements 
                    SET recoversubprogram='$recoversubprogram' WHERE idparty='$idpartyenterprise' RETURNING id";
                // var_dump($com);
                    $idsecurityplancomplements=$dbl->executeScalar($com);
                    if ($idsecurityplancomplements>0 && $idsecurityplancomplements!="") {
                        $path = "nmvueltaalanormalidadPL.php";
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
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("nmsubprogramaderecuperacionPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.nmsubprogramaderecuperacionPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


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
            <FORM action="<?php //echo $action;?>" method="post" name="nmdocumentacionPL" class="italsis">
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
        presentationLayer::buildIdInputHidden($id,"document.marcolegalPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
        <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>SUBPROGRAMA DE RECUPERACIÓN</div>
            ',"");     

        echo '<div align=center>';       
        myPresentationLayer::buildTextAreasInpunClass($title, "recoversubprogram", "recoversubprogram", $recoversubprogram,"input textarea","title", $rows, $cols);
        echo '</div>';      
    
        myPresentationLayer::buildButtonOrImage("Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
            "Guardar","urloper","bAccess","save","","btninicio","maxh-40");
    ?>	  

        </form>
        
    </body>
</html>
