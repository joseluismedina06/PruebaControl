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
        chdir(dirname(__FILE__));
        include_once("includes/mycss.css");                            
        chdir(dirname(__FILE__));
        include_once("includes/styles.css");   
        // chdir(dirname(__FILE__));
        // include_once("js/guardar_foto.php");       
        basePL::buildjs();
        basePL::buildccs();
     
        myUtilities::buildmyccs(0);   
        myUtilities::buildmyjs(0);
        
    ?>	    		
    <html>
        <head>
            <script type="text/javascript" src="datepickercontrol.js"></script> 
            <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
            <title>Ubicación del Predio</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
            <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- <link rel="stylesheet" href="css/styles.css">  -->

            <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

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
        $sitelocation  = basePL::getReq($_REQUEST,"sitelocation");
        $sitelocation = basePL::getReq($_REQUEST,"sitelocation");
        $northstreet = basePL::getReq($_REQUEST,"northstreet");
        $southstreet = basePL::getReq($_REQUEST,"southstreet");
        $eaststreet = basePL::getReq($_REQUEST,"eaststreet");
        $weststreet = basePL::getReq($_REQUEST,"weststreet");
        $northbuilding = basePL::getReq($_REQUEST,"northbuilding");
        $southbuilding = basePL::getReq($_REQUEST,"southbuilding");
        $eastbuilding = basePL::getReq($_REQUEST,"eastbuilding");
        $westbuilding = basePL::getReq($_REQUEST,"westbuilding");
        $identificationstrategicfacilities = basePL::getReq($_REQUEST,"identificationstrategicfacilities");
        $explosionsimulation = basePL::getReq($_REQUEST,"explosionsimulation");        
        
        // var_dump($northbuilding);
        $description = basePL::getReq($_REQUEST,"description");
        $location = basePL::getReq($_REQUEST,"location");
        $idthreats = basePL::getReq($_REQUEST,"idthreats");

        $amenaza = basePL::getReq($_REQUEST,"amenaza");

        // identificationstrategicfacilities

        // ----------------imagenes 
        $directory="ubicpred";
        $dirint = dir($directory);

        if($idpartyenterprise!="" && $urloper!="save" && $amenaza!="Guardar amenaza"){
            // echo "string";

            $dbl=new baseBL();
            $com="SELECT 
                sitelocation,
                northstreet,
                southstreet,
                eaststreet,
                weststreet,
                northbuilding,
                southbuilding,
                eastbuilding,
                westbuilding,
                identificationstrategicfacilities,
                explosionsimulation
            FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
                    $sitelocation = $resul[0]["sitelocation"]; 
                    $northstreet = $resul[0]["northstreet"];
                    $southstreet = $resul[0]["southstreet"];
                    $eaststreet = $resul[0]["eaststreet"];
                    $weststreet = $resul[0]["weststreet"];
                    $northbuilding = $resul[0]["northbuilding"];
                    $southbuilding = $resul[0]["southbuilding"];
                    $eastbuilding = $resul[0]["eastbuilding"];
                    $westbuilding = $resul[0]["westbuilding"];
                    $identificationstrategicfacilities = $resul[0]["identificationstrategicfacilities"];
                    $explosionsimulation = $resul[0]["explosionsimulation"];
            }           
        }  

        // $array=array(
        //                 $sitelocation,
        //                 $northstreet,
        //                 $southstreet,
        //                 $eaststreet,
        //                 $weststreet,
        //                 $northbuilding,
        //                 $southbuilding,
        //                 $eastbuilding,
        //                 $westbuilding,
        //                 $identificationstrategicfacilities,
        //                 $explosionsimulation
        //                 );
        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
        // if (!utilities::valOk($)) {
        //                    $valid = false;
        //                    $msg .= "El deleted esta vacio";
        //            } // 



        //validar correo 
        if($idpartyenterprise==""){
            $msj_error .= "Problemas con los datos de la Empresa, verifique. ";                
        }else{
            // if ($urloper == "save" && $sitelocation=="") {
            //      $error_msg_first_regist .= "El campo Alcance no puede estar vacio. "; 
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
     
            if($msj_error=="" && $error_msg_first_regist==""){

                $com="UPDATE core.securityplansitelocation 
                SET 
                    sitelocation='$sitelocation',
                    northstreet='$northstreet',
                    southstreet='$southstreet',
                    eaststreet='$eaststreet',
                    weststreet='$weststreet',
                    northbuilding='$northbuilding',
                    southbuilding='$southbuilding',
                    eastbuilding='$eastbuilding',
                    westbuilding='$westbuilding',
                    identificationstrategicfacilities='$identificationstrategicfacilities',
                    explosionsimulation='$explosionsimulation'
                WHERE idparty='$idpartyenterprise' RETURNING id";
                // var_dump($com);
                $idsecurityplansitelocation=$dbl->executeScalar($com);
                if ($idsecurityplansitelocation>0 && $idsecurityplansitelocation!="") {
                    // utilities::alert("correo ya registrado");
                    $path = "nmdirectorioPL.php";
                    utilities::redirect($path);
                }else{
                    utilities::alert("registro fallido");

                }
                // }                                             
            }else{
                    utilities::alert($msj_error.$error_msg_first_regist);
            }                                  
                // }            
            // }
        }


        // guardar amenaza
        if ($amenaza=="Guardar amenaza" ) {
            $dbl=new baseBL();
            $com="INSERT INTO core.threats 
            (description,location)
            VALUES ('$description','$location') RETURNING id";
            $idthreats=$dbl->executeScalar($com);

            if ($idthreats!="") {
                $com ="SELECT id from core.securityplansitelocation where idparty='$idpartyenterprise'";
                $idsitelocation=$dbl->executeScalar($com);
                // var_dump($idsitelocation);
                if ($idsitelocation!="") {
                    $com="INSERT INTO core.threatsitelocation 
                    (idparty,idsitelocation,idthreat)
                    VALUES ('$idpartyenterprise','$idsitelocation','$idthreats') RETURNING id";
                    $idthreatsitelocation=$dbl->executeScalar($com);
                    // var_dump($com);
                    if ($idthreatsitelocation!="") {
                        utilities::alert("Registro exitoso");
                        $idthreats =
                        $location =
                        $description = "";
                    }else{
                        utilities::alert("Error al registrar threatsitelocation");
                    }
                }else{
                    utilities::alert("NO posee idsitelocation");
                }
            }else{
                utilities::alert("Registro de amenaza fallido");
            }
        }
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("ubicaciondelpredioPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.ubicaciondelpredioPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


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
        // $msg .=$personbl->executeperson($oper,$arPar_person);   
        // $com="select id from core.consultant where idparty='$idparty'";
        // $id=$dbl->executeScalar($com);   

        // $com="SELECT core.isspinsacademic_records(NULL,NULL,'$idclinker', '$idinstituteacademic_records', '$idtitle', '$ufromacademic_records', '$untilacademic_records','$active', '$deleted')";
        // $dbl->executeScalar($com);
        // $com="SELECT core.isspinsexperience_record(NULL,NULL,'$idclinker', '$idcompany', '$idcharge', '$ufromexperience_record', '$untilexperience_record','$active', '$deleted')";
        // $dbl->executeScalar($com);
        // $com="SELECT core.isspinscertifies_records(NULL,NULL,'$idclinker', '$idinstitutecertifies_records', '$idcertifies', '$ufromcertifies_records', '$untilcertifies_records','$active', '$deleted')";
        // $dbl->executeScalar($com);
        }else{
            // $personbl->execute($oper,$arPar_person);
        }

        // crear arrays
      
        // $addressbl->$buildArray($arPar_address);
        // $phonebl->$buildArray($arPar_phone);    
        // $emailbl->$buildArray($arPar_email);   

        // $socialmediabl->$buildArray($arPar_socialmedia);
        // $bankinfobl->$buildArray($arPar_bankinfo);
        // $compliancebl->$buildArray($arPar_compliance);

                
        // if($email!= ""   && ($urloper!="find") && $idparty!=""){
        //     $msg_BL_error .=$emailbl->validatemsg($email);
        //     if ($emailbl->validate($email)==true ){ 
        //         //buscar que el correo no este previamente asociado
        //         $com="select id from core.email where content='$email' ";            
        //         $resulvalidate=$dbl->executeReader($com); 
                
        //         if($resulvalidate!="" && $idpartyemail==""){
        //             $msg_BL_error .=("Este correo:$email, ya se encuentra registrado. ");
        //         }else{
        //             //   if($idparty!=""){
        //                 if($oper=="update" || $oper=="insert" ){
        //                     $msg .=$emailbl->executeemail($operemail,$arPar_email); 

        //                 }else{
        //                     $emailbl->execute($operemail,$arPar_email); 
        //                 }                      
        //             //   }

        //         //-----------var correos
        //             $email  =   ""; 
        //             $idinstitutecertifies_records  =   "";    
        //             $idpartyemail = "";
        //             $active_email = "Y";
        //         }                                   
        //     }else{
        //         $arrayPHPmsgERROR[]=3;
        //     }  
        // }     
       
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
            $active = $arPar_person[11];
            $deleted = $arPar_person[12];            
        }     
      
        */
       
    ?>
            <!--
            <script>
                    
                // FECHA 
                $("#birthdate").on("change", function() {
                    alert("ok");
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

            <!-- Eliminacion de Imagen-->
            <script>                 
                $(function(){
                // Evento que selecciona la fila y la elimina 
                $(document).on("click",".eliminarimg",function(){
                    // var parent = $(this).parents().get(1);
                    var idimg    = $(this).attr("name");
                    // var iddoc=$(this).val();
                    // alert(iddoc);
                    $.post("../exchange/ajaxDatepartyexchangeBL.php", { idimg: idimg }, function(data) {
                        // alert(data);
                        // $("#idstate").html(data);                               
                    });                           
                    $("#img-"+idimg).remove();
                    $(this).remove();
                });
                }); 
            </script>
            <!-- Fin Eliminacion de Imagen-->

            <!--Navegacion-->    
            <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
            </script>
            <!--Fin Navegacion-->

        </head>
        <body>    
            <FORM action="<?php echo $action;?>" method="post" name="ubicaciondelpredioPL" class="italsis" style=""  enctype='multipart/form-data'>
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
    <?php
        $dbl=new baseBL();  
        // presentationLayer::buildFormTitle("Registro",""); 
        presentationLayer::buildIdInputHidden($id,"document.ubicaciondelpredioPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);
        myPresentationLayer::buildInputHidden("idthreats","idthreats","idthreats",$idthreats);

        presentationLayer::buildFormTitle('  
        <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>UBICACIÓN DEL PREDIO</div>
            ',""); 

        echo '<div style="text-align: center;">
        <!--<span style="color:black; font-size: x-large; ">UBICACION del PREDIO</span>-->
        </div>';

        echo '<div style="text-align: left;">
        <span style="color:black; font-size: x-large; ">Ubicación</span>
        </div>';   
   
        myPresentationLayer::buildInputWithValidatorClassAndStyle(
            "","sitelocation","sitelocation",$sitelocation,
            "input","title",
            "","",
            "","","","",
            "","","","","","","","width:80%"); 

        echo "<div style='display: flex;'>"; 
        myPresentationLayer::buildInitColumn();  

        echo '<div style="text-align: left;">
        <span style="color:black; font-size: large; ">Calles Circundantes: </span>
        </div>';

        echo '<br>';

        myPresentationLayer::buildInputWithValidatorClass(
            "Al Norte:","northstreet","northstreet",$northstreet,
            "input","title",
            "","",
            "","","","",
            "","","","","","",""); 

        myPresentationLayer::buildInputWithValidatorClass(
            "Al Sur: ","southstreet","southstreet",$southstreet,
            "input","title",
            "","",
            "","","","",
            "","","",$required,"","","");

        myPresentationLayer::buildInputWithValidatorClass(
            "Al Este: ","eaststreet","eaststreet",$eaststreet,
            "input","title",
            "","",
            "","","","",
            "","","",$required,"","","");

        myPresentationLayer::buildInputWithValidatorClass(
            "Al Oeste: ","weststreet","weststreet",$weststreet,
            "input","title",
            "","",
            "","","","",
            "","50","",$required,"","","");
                         
        presentationLayer::buildEndColumn();
        myPresentationLayer::buildInitColumn();  

        echo '<div style="text-align: left;">
        <span style="color:black; font-size: large; ">Edificios Adyacentes:  </span>
        </div>';

        echo '<br>';

        myPresentationLayer::buildInputWithValidatorClass(
            "","northbuilding","northbuilding",$northbuilding,
            "input","title",
            "","",
            "","","","",
            "","","","","","",""); 

        myPresentationLayer::buildInputWithValidatorClass(
            "","southbuilding","southbuilding",$southbuilding,
            "input","title",
            "","",
            "","","","",
            "","","","","","",""); 

        myPresentationLayer::buildInputWithValidatorClass(
            "","eastbuilding","eastbuilding",$eastbuilding,
            "input","title",
            "onkeypress","",
            "","","","",
            "","","","","","","");  

        myPresentationLayer::buildInputWithValidatorClass(
            "","westbuilding","westbuilding",$westbuilding,
            "input","title",
            "onkeypress","",
            "","","","",
            "","","","","","","");    

        presentationLayer::buildEndColumn();

        echo "</div>";

        echo '<br>'; 

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Identificación de áreas externas de mayor riesgo</span>
        </div>';

        echo '<br>';

        // Carga de Imagenes
        myPresentationLayer::inputFileImg("UBICPRED-0","UBICPRED-0","UBICPRED-0-".$idpartyenterprise,"UBICPRED","show-UBICPRED-0-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
        "","","","","");

        $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%UBICPRED-0-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  

        echo '<div class="col-12 col-lg-8" id="show-UBICPRED-0-" style="margin-top:1rem; display: flow-root;">';
        $i=0;
        if($imgs!=""){
            foreach($imgs as $b){            
                $contentimg=$b["content"]; 
                $idimgs=$b["id"]; 
            echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                    <img src='images/x.webp' style='width: 2rem;
                    position: absolute;
                    cursor: pointer;'/>";                     
            echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /> </div>';  

                $i++;
            } 
        }else{
            echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
        }
        echo '</div>';

        // Fin Carga de Imagenes

        echo '<br>';
        echo '<br>'; 
        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Ingreso de Amenazas</span>
        </div><br>'; 
    
        myPresentationLayer::buildInitColumn();

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Lugar:</span>
        </div>'; 

        myPresentationLayer::buildInputWithValidatorClass(
            "","location","location",$location,
            "input","title",
            "onkeypress","",
            "","","","",
            "","","","","","",""); 

        presentationLayer::buildEndColumn();

        myPresentationLayer::buildInitColumn();

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Amenaza:</span>
        </div>';

        myPresentationLayer::buildInputWithValidatorClass(
                            "","description","description",$description,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","","");    


        // myPresentationLayer::buildButtonOrImage("Guardar","amenaza","bAccess","Guardar amenaza","","button","maxh-40");

    ?>

    <?php

                                        
        presentationLayer::buildEndColumn();

        echo '
        <div align="left">
            <button type="submit" id="agregar3" value="Guardar amenaza" class="button" name="amenaza">
                Guardar amenaza
            </button>
        </div>
        ';

        echo '<br>';

        // $comm="";  
        // $resul_exist=$dbl->executeReader($comm);

        if($idthreats==""){
            $comp= "SELECT a.id, a.location, a.description FROM core.threatsitelocation AS b,core.threats AS a WHERE 
            a.id= b.idthreat and b.idparty='$idpartyenterprise'";         
            // var_dump($comp);
            // if($resul_exist!=""){
                $arrCol = array("Identificador","Ubicación","Descripción");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idthreats");                         
            // } 
        }else{
            $comp= "SELECT a.id, a.location, a.description FROM core.threatsitelocation AS b,core.threats AS a WHERE a.id= b.idthreat and b.idparty='$idpartyenterprise' and a.id!='$idthreats'";   
            // var_dump($comp);

            $arrCol = array("Identificador","Ubicación","Descripción");
            $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idthreats");                      
        }  

        echo '<br>';

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas:</span>
        </div>'; 

        echo '<br>';

        myPresentationLayer::buildTextAreasInpunClassAndStyle(
            $title, "identificationstrategicfacilities", "identificationstrategicfacilities", 
            $identificationstrategicfacilities,"input textarea2","title", $rows, $cols,"width:80%");

        echo '<div style="">
        <br>
        <span style="color:black; font-size: x-large; ">Descripción de la Simulación:</span>
        </div>';

        echo '<br>';

        myPresentationLayer::buildTextAreasInpunClassAndStyle(
            $title, "explosionsimulation", "explosionsimulation", $explosionsimulation,
            "input textarea2","title", $rows, $cols,"width:80%");

        echo '<br>';

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Imagen de cada simulacro</span>
        </div>'; 

        echo '<br>';

        myPresentationLayer::inputFileImg("UBICPRED-1","UBICPRED-1","UBICPRED-1-".$idpartyenterprise,"UBICPRED","show-UBICPRED-1-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
            "","","","","");

        $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%UBICPRED-1-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  

        // Carga de Imagenes
        echo '<div class="col-12 col-lg-8" id="show-UBICPRED-1-" style="margin-top:1rem; display: flow-root;">';
        $i=0;
        if($imgs!=""){
            foreach($imgs as $b){            
                $contentimg=$b["content"];  
                $idimgs=$b["id"]; 
        echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                <img src='images/x.webp' style='width: 2rem;
                position: absolute;
                cursor: pointer;'/>";                 
        echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /> </div>';         
                $i++;
            } 
        }else{
            echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
        }
        echo '</div>';
        // Fin Carga de Imagenes

        myPresentationLayer::buildButtonOrImage("Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
            "Guardar","urloper","bAccess","save","","btninicio","maxh-40");    
        // myPresentationLayer::buildButtonOrImage("Aceptar","urloper","bAccess","save","","btninicio","maxh-40");
    ?>	  
        </form>

            <!--
            <script>

                var birthdate = "<?php echo $birthdate; ?>" ;
                var ufromacademic_records = "<?php echo $ufromacademic_records; ?>" ;
                var ufromexperience_record = "<?php echo $ufromexperience_record; ?>" ;
                var ufromcertifies_records = "<?php echo $ufromcertifies_records; ?>" ;
                var untilacademic_records = "<?php echo $untilacademic_records; ?>" ;
                var untilexperience_record = "<?php echo $untilexperience_record; ?>" ;
                var untilcertifies_records = "<?php echo $untilcertifies_records; ?>" ;

                var x;

                $("#birthdate").on("change", function() {
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
                $("#ufromacademic_records").on("change", function() {
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
                $("#ufromexperience_record").on("change", function() {
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
                $("#ufromcertifies_records").on("change", function() {
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
                $("#untilacademic_records").on("change", function() {
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
                $("#untilexperience_record").on("change", function() {
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
                $("#untilcertifies_records").on("change", function() {
                    if(this.value!=""){
                        alert(this.value);
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


                $("#nowacademicdate").on("click", function() {
                    var inp = document.getElementById("untilacademic_records");
                    if( $(this).is(':checked') ){        
                        now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        inp.setAttribute(
                            "data-date",
                            moment(today, "YYYY-MM-DD").format( inp.getAttribute("data-date-format") )
                        );

                        // Ponemos el atributo de solo lectura
                        inp.attr("readonly","readonly");
                        // Ponemos una clase para cambiar el color del texto y mostrar que
                        // esta deshabilitado
                        inp.addClass("readOnly");

                    } else {
                        inp.setAttribute(
                            "data-date",
                            moment().format('[dd/mm/yyyy]')
                        );  
                        // Eliminamos el atributo de solo lectura
                        inp.removeAttr("readonly");
                        // Eliminamos la clase que hace que cambie el color
                        inp.removeClass("readOnly");        
                    }
                });

                $("#nowexperiencedate").on("click", function() {
                    var inp = document.getElementById("untilexperience_record");
                    if( $(this).is(':checked') ){        
                        now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        inp.setAttribute(
                            "data-date",
                            moment(today, "YYYY-MM-DD").format( inp.getAttribute("data-date-format") )
                        );

                        // Ponemos el atributo de solo lectura
                        inp.attr("readonly","readonly");
                        // Ponemos una clase para cambiar el color del texto y mostrar que
                        // esta deshabilitado
                        inp.addClass("readOnly");

                    } else {
                        inp.setAttribute(
                            "data-date",
                            moment().format('[dd/mm/yyyy]')
                        );  
                        // Eliminamos el atributo de solo lectura
                        inp.removeAttr("readonly");
                        // Eliminamos la clase que hace que cambie el color
                        inp.removeClass("readOnly");        
                    }
                });

                $("#nowcertifiesdate").on("click", function() {
                    var inp = document.getElementById("untilcertifies_records");
                    if( $(this).is(':checked') ){        
                        now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        inp.setAttribute(
                            "data-date",
                            moment(today, "YYYY-MM-DD").format( inp.getAttribute("data-date-format") )
                        );

                        // Ponemos el atributo de solo lectura
                        inp.attr("readonly","readonly");
                        // Ponemos una clase para cambiar el color del texto y mostrar que
                        // esta deshabilitado
                        inp.addClass("readOnly");

                    } else {
                        inp.setAttribute(
                            "data-date",
                            moment().format('[dd/mm/yyyy]')
                        );  
                        // Eliminamos el atributo de solo lectura
                        inp.removeAttr("readonly");
                        // Eliminamos la clase que hace que cambie el color
                        inp.removeClass("readOnly");        
                    }
                });

            </script> 
            -->
    </body>
</html>
