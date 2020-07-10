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
            <title>EJERCICIOS Y SIMULACROS</title>
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
        $simulationexercise  = basePL::getReq($_REQUEST,"simulationexercise");
        
        if($idpartyenterprise!="" && $urloper!="save"){
            $dbl=new baseBL();
            $com="SELECT simulationexercise FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $simulationexercise=$dbl->executeScalar($com);
        }        


        //validar correo 
        if($idpartyenterprise==""){
                  $msj_error .= "El idpartyenterprise es invalido, verifique. ";                
        }else{
            // if ($urloper == "save" && $simulationexercise=="") {
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
                            WHERE idparty='$idpartyenterprise' ";
                        $res=$dbl->executeScalar($com);
//                         var_dump($com);
// var_dump($res);

                        if($res==""){
                          $com="INSERT INTO core.securityplancomplements 
                          (idparty,simulationexercise)
                          VALUES ('$idpartyenterprise','$simulationexercise') RETURNING id";
                            $idsecurityplancomplements=$dbl->executeScalar($com);
                            // var_dump($com);                            
                        }else{
                            $com="UPDATE core.securityplancomplements 
                            SET simulationexercise='$simulationexercise' WHERE idparty='$idpartyenterprise' RETURNING id";
                      // var_dump($com);
                            $idsecurityplancomplements=$dbl->executeScalar($com);
                            // var_dump($com);
                        }
                            if ($idsecurityplancomplements>0 && $idsecurityplancomplements!="") {
                                $path1 = "";

                                // utilities::redirect($path);
                            }else{
                                utilities::alert("registro fallido");

                                $path1 = "subprogramadeauxilioPL.php";
                            }
                        // }                                          
                    }else{
                          utilities::alert($msj_error.$error_msg_first_regist);
                    }                                  
                // }            
            // }
            if ($path1=="") {
                $path = "subprogramadeauxilioPL.php";
                utilities::redirect($path);               
            }
        }
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("ejerciciosysimulacrosPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.ejerciciosysimulacrosPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


        if ($id != "") {
                $arPar_registro[] = $id;
        } 
  
  
         


        if ($urloper == "save" && $idpartyaddress ==  "" && $idparty!="") {
                $operaddress = "insert";
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
//             $msg .=$personbl->executeperson($oper,$arPar_person);   
//             $com="select id from core.consultant where idparty='$idparty'";
//             $id=$dbl->executeScalar($com);   

// $com="SELECT core.isspinsacademic_records(NULL,NULL,'$idclinker', '$idinstituteacademic_records', '$idtitle', '$ufromacademic_records', '$untilacademic_records','$active', '$deleted')";
// $dbl->executeScalar($com);
// $com="SELECT core.isspinsexperience_record(NULL,NULL,'$idclinker', '$idcompany', '$idcharge', '$ufromexperience_record', '$untilexperience_record','$active', '$deleted')";
// $dbl->executeScalar($com);
// $com="SELECT core.isspinscertifies_records(NULL,NULL,'$idclinker', '$idinstitutecertifies_records', '$idcertifies', '$ufromcertifies_records', '$untilcertifies_records','$active', '$deleted')";
// $dbl->executeScalar($com);
        }else{
            $personbl->execute($oper,$arPar_person);
        }

        // crear arrays
      
  
       
        
       
        

        
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
    

       
    ?>
            <!--Navegacion-->    
            <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
            </script>
            <!--Fin Navegacion-->
        </head>
        <body>    
            <FORM action="<?php echo $action;?>" method="post" name="ejerciciosysimulacrosPL" class="italsis">
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
        presentationLayer::buildIdInputHidden($id,"document.ejerciciosysimulacrosPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
    <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>EJERCICIOS Y SIMULACROS</div>
           ',""); 


        //             EJERCICIOS Y SIMULACROS

echo '<div style="">
    <!--<span style="color:black; font-size: x-large; ">EJERCICIOS Y SIMULACROS</span>-->
    </div>';
    
    echo '<div align="center">';
    myPresentationLayer::buildTextAreasInpunClass($title, "simulationexercise", "simulationexercise", $simulationexercise,"input textarea","title", $rows, $cols);
    echo '</div>';    


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
