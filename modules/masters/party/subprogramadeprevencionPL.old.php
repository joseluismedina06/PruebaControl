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
        basePL::buildjs();
        basePL::buildccs();
     
        myUtilities::buildmyccs(0);   
        myUtilities::buildmyjs(0);
        
    ?>	    		
    <html>
        <head>
            <script type="text/javascript" src="datepickercontrol.js"></script> 
            <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
            <title>SUBPROGRAMA DE PREVENCION</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
            <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
            <!-- <link rel="stylesheet" href="css/styles.css">  -->

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
$info = basePL::getReq($_REQUEST,"info");
$uipcheadlinename = basePL::getReq($_REQUEST,"uipcheadlinename");
$uipccoordinatorname = basePL::getReq($_REQUEST,"uipccoordinatorname");
$uipcchiefname = basePL::getReq($_REQUEST,"uipcchiefname");
$uipcfirstaidbrigadechiefname = basePL::getReq($_REQUEST,"uipcfirstaidbrigadechiefname");
$uipcantifirebrigadename = basePL::getReq($_REQUEST,"uipcantifirebrigadename");
$uipcevacuationbrigadename = basePL::getReq($_REQUEST,"uipcevacuationbrigadename");
$uipcsearchbrigadename = basePL::getReq($_REQUEST,"uipcsearchbrigadename");
$infobrigade = basePL::getReq($_REQUEST,"infobrigade");
$infoorganizationchart = basePL::getReq($_REQUEST,"infoorganizationchart");
$infobrigadeorganization = basePL::getReq($_REQUEST,"infobrigadeorganization");
$moretenemployments = basePL::getReq($_REQUEST,"moretenemployments");
// $save = basePL::getReq($_REQUEST,"save");

        if($idpartyenterprise!="" && $urloper!="save"){
            $dbl=new baseBL();
            $com="SELECT 
  info,
  uipcheadlinename,
  uipccoordinatorname,
  uipcchiefname,
  uipcfirstaidbrigadechiefname,
  uipcantifirebrigadename,
  uipcevacuationbrigadename,
  uipcsearchbrigadename,
  infobrigade,
  infoorganizationchart,
  infobrigadeorganization,
  moretenemployments
            FROM core.securityplansubprogram WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $info = $resul[0]["info"];
  $uipcheadlinename = $resul[0]["uipcheadlinename"];
  $uipccoordinatorname = $resul[0]["uipccoordinatorname"];
  $uipcchiefname = $resul[0]["uipcchiefname"];
  $uipcfirstaidbrigadechiefname = $resul[0]["uipcfirstaidbrigadechiefname"];
  $uipcantifirebrigadename = $resul[0]["uipcantifirebrigadename"];
  $uipcevacuationbrigadename = $resul[0]["uipcevacuationbrigadename"];
  $uipcsearchbrigadename = $resul[0]["uipcsearchbrigadename"];
  $infobrigade = $resul[0]["infobrigade"];
  $infoorganizationchart = $resul[0]["infoorganizationchart"];
  $infobrigadeorganization = $resul[0]["infobrigadeorganization"];
  $moretenemployments = $resul[0]["moretenemployments"];
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
                  $msj_error .= "El idpartyenterprise es invalido, verifique. ";                
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
                // $com_party_exists="select id from core.clinker where email='$email'";
                // $resul_party_exists=$dbl->executeScalar($com_party_exists);

                // //si existe buscar id de person
                // if($resul_party_exists!=""){

                //     utilities::alert("correo ya registrado");
                // //sino existe se debe validar datos y registrar en party 
                // }else{
                    if($msj_error=="" && $error_msg_first_regist==""){
                        $com="SELECT id FROM core.securityplansubprogram WHERE idparty='$idpartyenterprise'";
                        $idsecurityplansubprogram=$dbl->executeScalar($com);
                        // $oper = "insert";  
                        if ($idsecurityplansubprogram=="") {
                            $com="INSERT INTO core.securityplansubprogram 
                                (idparty,
  info,
  uipcheadlinename,
  uipccoordinatorname,
  uipcchiefname,
  uipcfirstaidbrigadechiefname,
  uipcantifirebrigadename,
  uipcevacuationbrigadename,
  uipcsearchbrigadename,
  infobrigade,
  infoorganizationchart,
  infobrigadeorganization,
  moretenemployments)
                                VALUES ('$idpartyenterprise',
  '$info',
  '$uipcheadlinename',
  '$uipccoordinatorname',
  '$uipcchiefname',
  '$uipcfirstaidbrigadechiefname',
  '$uipcantifirebrigadename',
  '$uipcevacuationbrigadename',
  '$uipcsearchbrigadename',
  '$infobrigade',
  '$infoorganizationchart',
  '$infobrigadeorganization',
  '$moretenemployments') RETURNING id";
                                // var_dump($com);
                            $idsecurityplansubprogram=$dbl->executeScalar($com);
                            if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                                $path = "analisisderiesgosPL.php";
                                utilities::redirect($path);
                            }else{
                                utilities::alert("registro fallido");

                            }
                        }else{
                            $com="UPDATE core.securityplansubprogram 
                            SET 
                              info='$info',
                              uipcheadlinename= '$uipcheadlinename',
                              uipccoordinatorname= '$uipccoordinatorname', 
                              uipcchiefname='$uipcchiefname',
                              uipcfirstaidbrigadechiefname='$uipcfirstaidbrigadechiefname', 
                              uipcantifirebrigadename='$uipcantifirebrigadename',
                              uipcevacuationbrigadename='$uipcevacuationbrigadename',
                              uipcsearchbrigadename='$uipcsearchbrigadename',
                              infobrigade='$infobrigade',
                              infoorganizationchart='$infoorganizationchart',
                              infobrigadeorganization='$infobrigadeorganization', 
                              moretenemployments='$moretenemployments' 
                            WHERE idparty='$idpartyenterprise' RETURNING id";
                      // var_dump($com);
                            $idsecurityplansubprogram=$dbl->executeScalar($com);
                            if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                                // utilities::alert("correo ya registrado");
                                $path = "analisisderiesgosPL.php";
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
              
  
        $registrobl->buildLinks("subprogramadeprevencionPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.subprogramadeprevencionPL.php",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


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
// alert("ok");
// nowcertifiesdate
            // function nowcertifiesdate (e,key, id) {
            //     alert("ok");
            // }
// 
// $('#nowcertifiesdate').prop('checked', true);
                // $("#nowcertifiesdate").on("click", function() {
                //     var checked = $(this).prop('checked');
                //     if (checked==true) {
                //         alert("ok");
                //     }
                //         alert("ok");

                //     // this.setAttribute(
                //     //     "data-date",
                //     //     moment(this.value, "YYYY-MM-DD")
                //     //     .format( this.getAttribute("data-date-format") )
                //     // );
                // }).trigger("change");
                    



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

            <!--Navegacion-->    
            <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
            </script>
            <!--Fin Navegacion-->    

        </head>
        <body>    
            <FORM action="<?php echo $action;?>" method="post" name="subprogramadeprevencionPL.php" class="italsis" style="">
    		<!--Navegacion-->
            <drawer-menu>
            <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
                max-width: 50%;
                height: auto;">
                <a href="../party/marcolegalPL.php">01.-MARCO LEGAL</a>
                <a href="../exchange/agreementPL.php">02.-PRESENTACION</a>
                <a href="../party/justificacionPL.php">03.-JUSTIFICACION</a>
                <a href="../party/objetivosPL.php">04.-OBJETIVOS</a>
                <a href="../party/alcancePL.php">05.-ALCANCE</a>
                <a href="../party/ubicaciondelpredioPL.php">06.-UBIC DEL PREDIO</a>
                <a href="../party/subprogramadeprevencionPL.php">07.-SUBPR DE PREVENCION</a>
                <a href="../party/analisisderiesgosPL.php">08.-ANALISIS DE RIESGOS</a>
                <a href="../party/senalizacionPL.php">09.-SEÑALIZACION</a>
                <a href="../party/ejerciciosysimulacrosPL.php">10.-EJERCICIOS Y SIMULACROS</a>
                <a href="../party/subprogramadeauxilioPL.php">11.-SUBPR DE AUXILIOS</a>
                <a href="../party/procedimientodeemergenciaparaevacuacionPL.php">12.-PROC DE EMERGENCIA</a>
                <a href="../party/tiposdeemergenciasPL.php">13.-TIPOS DE EMERGENCIA</a>
                <a href="../party/funcionesdelequipodecombatecontraincendiosPL.php">14.-FUNC EQUIPO COMBATE</a>
                <a href="../party/subprogramaderecuperacionPL.php">15.-SUBPR DE RECUPERACION</a>
                <a href="../party/vueltaalanormalidadPL.php">16.-VUELTA A LA NORMALIDAD</a>
                <a href="../party/anexoPL.php">ANEXOS</a>
                <a href="../party/personPL.php">PERFIL</a>
                <a href="../party">SALIR</a>
            </drawer-menu>
            <!--Fin Navegacion-->
    <?php
        $dbl=new baseBL();  
        // presentationLayer::buildFormTitle("Registro",""); 
        presentationLayer::buildIdInputHidden($id,"document.subprogramadeprevencionPL.php",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
    <div data-drawer-open><img src="images/button_menu.png" witdh=50 height=20 style="float:left">SUBPROGRAMA DE PREVENCION</div>
           ',""); 

    echo '<div style="text-align: center;">

    <!--<span style="color:black; font-size: x-large; ">SUBPROGRAMA DE PREVENCION</span>-->
    </div>';     
    echo '<div style="">

    <span style="color:black; font-size: x-large; ">Subprograma de Prevención:</span>
    </div>'; 
    myPresentationLayer::buildTextAreasInpunClass($title, "info", "info", $info,"input textarea2","title", $rows, $cols);








    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Responsable de Cada Tarea y sus Respectivas Funciones:</span>
    </div>'; 

myPresentationLayer::buildInitColumn();  
    echo '<div style="    margin-bottom: 1rem;" class="">
    <span style="color:black; font-size: x-large; ">Puesto dentro de la UIPC:</span>
    </div>'; 
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Titular:
        </span>
    </div>'; 
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Coordinador General/Suplente:
        </span>
    </div>';
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Jefe de la UIPC:
        </span>
    </div>';
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Jefe de Brigada de Primeros Auxilios:
        </span>
    </div>';
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Jefe de Brigada de Combate contra Incendios:
        </span>
    </div>';
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Jefe de Brigada de Evacuación del Inmueble:
        </span>
    </div>';
    echo '<div style="" class="x">
        <span style="color:black; font-size: large; ">
            Jefe de Brigada de Búsqueda y Rescate:
        </span>
    </div>';

presentationLayer::buildEndColumn();
myPresentationLayer::buildInitColumn();  
    echo '<div style="">

    <span style="color:black; font-size: x-large; ">Nombre:</span>
    </div>'; 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipcheadlinename","uipcheadlinename",$uipcheadlinename,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","","");    
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipccoordinatorname","uipccoordinatorname",$uipccoordinatorname,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","",""); 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipcchiefname","uipcchiefname",$uipcchiefname,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","",""); 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipcfirstaidbrigadechiefname","uipcfirstaidbrigadechiefname",$uipcfirstaidbrigadechiefname,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","",""); 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipcantifirebrigadename","uipcantifirebrigadename",$uipcantifirebrigadename,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","",""); 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipcevacuationbrigadename","uipcevacuationbrigadename",$uipcevacuationbrigadename,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","",""); 
 myPresentationLayer::buildInputWithValidatorClass(
                    "","uipcsearchbrigadename","uipcsearchbrigadename",$uipcsearchbrigadename,
                    "input","",
                    "onkeypress","return isESLetterNoSpace(event)",
                    "","","","",
                    "","50","","","","","");                                          
presentationLayer::buildEndColumn();


    myPresentationLayer::buildTextAreasInpunClass($title, "infobrigade", "infobrigade", $infobrigade,"input textarea2","title", $rows, $cols);

echo '<div style="">
    <span style="color:black; font-size: x-large; ">Organigrama de los Brigadistas:</span>
    </div>'; 



myPresentationLayer::inputFileImg("SUBPROGPREV-0","SUBPROGPREV-0","SUBPROGPREV-0-".$idpartyenterprise,"SUBPROGPREV","show-SUBPROGPREV-0-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SUBPROGPREV-0-%'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SUBPROGPREV-0-" style="margin-top:1rem;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];       
    echo '<img class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" />';         
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

    echo '<br><br><br><br>';

    myPresentationLayer::buildTextAreasInpunClass($title, "infoorganizationchart", "infoorganizationchart", $infoorganizationchart,"input textarea2","title", $rows, $cols);


echo '<div style="">
    <span style="color:black; font-size: x-large; ">Identificación de las Brigadas:</span>
    </div>'; 

myPresentationLayer::inputFileImg("SUBPROGPREV-1","SUBPROGPREV-1","SUBPROGPREV-1-".$idpartyenterprise,"SUBPROGPREV","show-SUBPROGPREV-1-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SUBPROGPREV-1-%'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SUBPROGPREV-1-" style="margin-top:1rem;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];       
    echo '<img class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" />';         
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

    myPresentationLayer::buildTextAreasInpunClass($title, "infobrigadeorganization", "infobrigadeorganization", $infobrigadeorganization,"input textarea2","title", $rows, $cols);



echo '<div style="">
    <span style="color:black; font-size: x-large; ">Directorio de Brigadistas:</span>
    </div>'; 
        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");
        echo '<div align=center>';
        myPresentationLayer::buildRadioEventClassMult(
                "¿La Empresa Cuenta con mas de Diez Empleados?   ", "moretenemployments", "moretenemployments",
                $moretenemployments ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  
            echo '</div>';

            myPresentationLayer::buildButtonOrImage("Cancelar","urloper","cancelar","cancelar","","btninicio","maxh-40",
                "Guardar","urloper","bAccess","save","","btninicio","maxh-40");    
            // myPresentationLayer::buildButtonOrImage("Aceptar","urloper","bAccess","save","","btninicio","maxh-40");
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
        </body>
    </html>
