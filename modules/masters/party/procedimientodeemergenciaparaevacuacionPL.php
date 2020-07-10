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
            <title>PROCEDIMIENTO DE EMERGENCIA PARA EVACUACION</title>
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
            = $untilcertifies_records
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
        $evacuationemergencyprocedure  = basePL::getReq($_REQUEST,"evacuationemergencyprocedure");
        
        if($idpartyenterprise!="" && $urloper!="save"){
            $dbl=new baseBL();
            $com="SELECT evacuationemergencyprocedure FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $evacuationemergencyprocedure=$dbl->executeScalar($com);
        }        


        //validar correo 
        if($idpartyenterprise==""){
                  $msj_error .= "El idpartyenterprise es invalido, verifique. ";                
        }else{
            // if ($urloper == "save" && $evacuationemergencyprocedure=="") {
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
                    if($msj_error=="" && $error_msg_first_regist==""){

                        $com="SELECT id from core.securityplancomplements 
                            WHERE idparty='$idpartyenterprise'";
                        $res=$dbl->executeScalar($com);
                            // var_dump($com);                            

                        if($res==""){
                          $com="INSERT INTO core.securityplancomplements 
                          (idparty,attachments)
                          VALUES ('$idpartyenterprise','$attachments') RETURNING id";
                            $idsecurityplancomplements=$dbl->executeScalar($com);
                            // var_dump($com);                            
                        }else{                        
                            $com="UPDATE core.securityplancomplements 
                            SET evacuationemergencyprocedure='$evacuationemergencyprocedure' WHERE idparty='$idpartyenterprise' RETURNING id";
                      // var_dump($com);
                            $idsecurityplancomplements=$dbl->executeScalar($com);
                            // var_dump($com);
                        }
                            if ($idsecurityplancomplements>0 && $idsecurityplancomplements!="") {
                                $path1 = "";
                                // utilities::redirect($path);
                            }else{
                                utilities::alert("registro fallido");

                                $path1 = "tiposdeemergenciasPL.php";
                            }
                        // }                                          
                    }else{
                          utilities::alert($msj_error.$error_msg_first_regist);
                    }                                  
                // }            
            // }
            if ($path1=="") {
                                $path = "tiposdeemergenciasPL.php";
                utilities::redirect($path);               
            }
        }
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("procedimientodeemergenciaparaevacuacionPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.procedimientodeemergenciaparaevacuacionPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


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

            //   $id = $arPar_address[0];
            //   $code = $arPar_address[1];
            //   $name = $arPar_address[2];
            //   $idparty = $arPar_address[3];
            // $idcountry = $arPar_address[5];

            $idcertifies = $arPar_address[4];
            $suburb = $arPar_address[5];
            $municipality  = $arPar_address[6];
            
            $postalcode  = $arPar_address[7];
            $idgradeacademic = $arPar_address[8];
            $idtitle = $arPar_address[9];
            $idcompany = $arPar_address[10];   
            $idcharge = $arPar_address[11];     
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

       
    ?>
            <script>

// nowcertifiesdate
            // function nowcertifiesdate (e,key, id) {
            //     document.getElementById("pep")
            // }

                // $("#nowcertifiesdate").on("change", function() {
                //     this.setAttribute(
                //         "data-date",
                //         moment(this.value, "YYYY-MM-DD")
                //         .format( this.getAttribute("data-date-format") )
                //     );
                // }).trigger("change");
                    
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

                    $(function(){
                    // Evento que selecciona la fila y la elimina 
                    $(document).on("click",".eliminarimg",function(){
                        // var parent = $(this).parents().get(1);
                        var idimg    = $(this).attr("name");
                        // var iddoc=$(this).val();
                        // alert(iddoc);
                        $.post("ajaxDatepartyexchangeBL.php", { idimg: idimg }, function(data) {
                          // alert(data);
                            // $("#idstate").html(data);                               
                        });                           
                        $("#img-"+idimg).remove();
                        $(this).remove();
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
            <FORM action="<?php echo $action;?>" method="post" name="procedimientodeemergenciaparaevacuacionPL" class="italsis">
    		<!--Navegacion-->
            <drawer-menu>
            <div align="center">
            <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
                max-width: 50%;
                height: auto;"></div>
                <br>
                <div style="overflow:scroll">
                <div style="padding-left: 10px;"><a href="../party/marcolegalPL.php">01.-MARCO LEGAL</a></div>
                <div style="padding-left: 10px;"><a href="../exchange/agreementPL.php">02.-PRESENTACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/justificacionPL.php">03.-JUSTIFICACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/objetivosPL.php">04.-OBJETIVOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/alcancePL.php">05.-ALCANCE</a></div>
                <div style="padding-left: 10px;"><a href="../party/ubicaciondelpredioPL.php">06.-UBICACIÓN DEL PREDIO</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramadeprevencionPL.php">07.-SUBPROGRAMA DE PREVENCIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/analisisderiesgosPL.php">08.-ANÁLISIS DE RIESGOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/senalizacionPL.php">09.-SEÑALIZACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/ejerciciosysimulacrosPL.php">10.-EJERCICIOS Y SIMULACROS</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramadeauxilioPL.php">11.-SUBPROGRAMA DE AUXILIOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/procedimientodeemergenciaparaevacuacionPL.php">12.-PROCEDIMIENTO DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/tiposdeemergenciasPL.php">13.-TIPOS DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/funcionesdelequipodecombatecontraincendiosPL.php">14.-FUNCIONAMIENTO EQUIPO COMBATE</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">15.-SUBPROGRAMA DE RECUPERACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/vueltaalanormalidadPL.php">16.-VUELTA A LA NORMALIDAD</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">folder_open</i></div>
                <div style="float:left;"><a href="../party/anexoPL.php">ANEXOS</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">account_box</i></div>
                <div style="float:left;"><a href="personPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['amidconsultant']; ?>">PERFIL</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">exit_to_app</i></div>
                <div style="float:left;"><a href="../party">SALIR</a></div>
                </div>
            </drawer-menu>
            <!--Fin Navegacion--> 
    <?php
        $dbl=new baseBL();  
        // presentationLayer::buildFormTitle("Registro",""); 
        presentationLayer::buildIdInputHidden($id,"document.procedimientodeemergenciaparaevacuacionPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
    <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>PROCEDIMIENTO DE EMERGENCIA PARA EVACUACIÓN</div>
           ',"");              

    // echo "<div style='display: flex;'>"; 
        // myPresentationLayer::buildInitColumn();  

        // $arrayvalR = array ($active,$deleted);    
        // $arraytitleR = array ("Si","No");
        // $arrayvalR = array ("Y","N");
        // myPresentationLayer::buildRadioEventClassMult(
        //         "Equipode Respiración Autonoma", "EquipodeRespiraciónAutonoma", "EquipodeRespiraciónAutonoma",
        //         $EquipodeRespiraciónAutonoma ,2,$arraytitleR,$arrayvalR ,
        //         "", "trclink","radioclinkin","tdradio", $checked, $disabled, $event); 

        //         myPresentationLayer::buildInputWithValidatorClass(
        //             "Población Externa","PoblacionExterna","PoblacionExterna",$PoblacionExterna,
        //             "input","title",
        //             "onkeypress","",
        //             "","","","",
        //             "","50","","","","",""); 

        //         myPresentationLayer::buildInputWithValidatorClass(
        //             "Tanques de gas L.P. Estacionario","TanquesdegasLPEstacionario","TanquesdegasLPEstacionario",$TanquesdegasLPEstacionario,
        //             "input","title",
        //             "onkeypress","",
        //             "","","","",
        //             "","50","","","","","");

        //         myPresentationLayer::buildInputWithValidatorClass(
        //             "Tanques de Gas L.P. No Estacionarios","TanquesdeGasLPNoEstacionarios","TanquesdeGasLPNoEstacionarios",$TanquesdeGasLPNoEstacionarios,
        //             "input","title",
        //             "onkeypress","",
        //             "","","","",
        //             "","50","","","","","");  
        //         myPresentationLayer::buildInputWithValidatorClass(
        //             "Cuenta con Dictamen de Gas L.P ","CuentaconDictamendeGasLP","CuentaconDictamendeGasLP",$CuentaconDictamendeGasLP,
        //             "input","title",
        //             "onkeypress","",
        //             "","","","",
        //             "","50","","","","",""); 
        //         myPresentationLayer::buildInputWithValidatorClass(
        //             "Gases Inflables","GasesInflables","GasesInflables",$GasesInflables,
        //             "input","title",
        //             "onkeypress","",
        //             "","","","",
        //             "","50","","","","","");
        //             
        //             
        //             EJERCICIOS Y SIMULACROS

echo '<div style="">
    <!--<span style="color:black; font-size: x-large; ">PROCEDIMIENTO DE EMERGENCIA PARA EVACUACION</span>-->
    </div>';      
    
    echo '<div align="center">';
    myPresentationLayer::buildTextAreasInpunClass($title, "evacuationemergencyprocedure", "evacuationemergencyprocedure", $evacuationemergencyprocedure,"input textarea","title", $rows, $cols);
    echo '</div>';        

    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Anexo Diagrama de Flujo</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen, puede seleccionar hasta 10 imagenes:  </span>
    </div>';
    echo '<br>';  

myPresentationLayer::inputFileImg("PROCEMERGEVAC-0","PROCEMERGEVAC-0","PROCEMERGEVAC-0-".$idpartyenterprise,"PROCEMERGEVAC","show-PROCEMERGEVAC-0-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%PROCEMERGEVAC-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-PROCEMERGEVAC-0-" style="margin-top:1rem; display: flow-root;">';
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
echo'    </div>';

                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Líquidos Combustibles (Gasolina,Disel.)","LiquidosCombustiblesGasolinaDisel","LiquidosCombustiblesGasolinaDisel",$LiquidosCombustiblesGasolinaDisel,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Sólidos Combustibles","SolidosCombustibles","SolidosCombustibles",$SolidosCombustibles,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Material Explosivo","MaterialExplosivo","MaterialExplosivo",$MaterialExplosivo,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Subestación Electrónica","SubestaciónElectronica","SubestacionElectrónica",$SubestacionElectrónica,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","","");








                
                
                // $com="SELECT * FROM base.title ";
                // myPresentationLayer::buildSelectWithComEventClass(
                //     "Formación academica","idtitle","idtitle",$personbl,
                //     $com, "id", "name", $idtitle,"input","title","DependentCombos()");  

                          
                                 
//         presentationLayer::buildEndColumn();
//         myPresentationLayer::buildInitColumn();  

// echo '<div style="
//     padding-top: 8rem;
// ">';

                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Capacidad","CapacidadTanquesdegasLPEstacionario","CapacidadTanquesdegasLPEstacionario",$CapacidadTanquesdegasLPEstacionario,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 

                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Cuantos","CuantosTanquesdeGasLPNoEstacionarios","CuantosTanquesdeGasLPNoEstacionarios",$CuantosTanquesdeGasLPNoEstacionarios,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","","");  
                // $year= date("Y");           
                // $moths= date("m");
                // $day= date("d");
                // myPresentationLayer::buildInputCalendarWithValidatorClass(
                //     "Fecha","dateCuentaconDictamendeGasLP","dateCuentaconDictamendeGasLP",$dateCuentaconDictamendeGasLP,
                //     "input date","title",$year,$moths,$day,"","","","","","",$required);
  




                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Cantidad de Litros","GasesInflables","GasesInflables",$GasesInflables,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","","");

                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Cantidad de Litros","LiquidosCombustiblesGasolinaDisel","LiquidosCombustiblesGasolinaDisel",$LiquidosCombustiblesGasolinaDisel,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Cantidad de Litros","SolidosCombustibles","SolidosCombustibles",$SolidosCombustibles,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Cantidad de K.G","MaterialExplosivo","MaterialExplosivo",$MaterialExplosivo,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","",""); 
                // myPresentationLayer::buildInputWithValidatorClass(
                //     "Cantidad","SubestaciónElectronica","SubestacionElectrónica",$SubestacionElectrónica,
                //     "input","title",
                //     "onkeypress","",
                //     "","","","",
                //     "","50","","","","","");            
// echo "</div>";
            
        // presentationLayer::buildEndColumn();
// echo "</div>";

echo '<br>';

            myPresentationLayer::buildButtonOrImage("Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
                "Guardar","urloper","bAccess","save","","btninicio","maxh-40");
    ?>	  
            </form>
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
