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
            <title>SENALIZACION</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
            <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    $infosignaling  = basePL::getReq($_REQUEST,"infosignaling");
    $definitionsignaling  = basePL::getReq($_REQUEST,"definitionsignaling");
    $locationsignaling  = basePL::getReq($_REQUEST,"locationsignaling");
    $maintenancesignaling  = basePL::getReq($_REQUEST,"maintenancesignaling");

  
  
  
        if($idpartyenterprise!="" && $urloper!="save"){
            $dbl=new baseBL();
            $com="SELECT 
infosignaling ,
definitionsignaling ,
locationsignaling ,
maintenancesignaling 

            FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $infosignaling = $resul[0]["infosignaling"];
  $definitionsignaling = $resul[0]["definitionsignaling"];
  $locationsignaling = $resul[0]["locationsignaling"];
  $maintenancesignaling = $resul[0]["maintenancesignaling"];

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
                    if($msj_error=="" && $error_msg_first_regist==""){
                        $com="SELECT id FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
                        $idsecurityplansubprogram=$dbl->executeScalar($com);
                        // $oper = "insert";  
                        if ($idsecurityplansubprogram=="") {
                            $com="INSERT INTO core.securityplancomplements 
                                (idparty,
 infosignaling ,
 definitionsignaling ,
 locationsignaling ,
 maintenancesignaling )
                                VALUES ('$idpartyenterprise',

 '$infosignaling' ,
 '$definitionsignaling' ,
 '$locationsignaling' ,
 '$maintenancesignaling' ) RETURNING id";
                                // var_dump($com);
                            $idsecurityplansubprogram=$dbl->executeScalar($com);
                            if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                                $path = "ejerciciosysimulacrosPL.php";
                                utilities::redirect($path);
                            }else{
                                utilities::alert("registro fallido");

                            }
                        }else{
                            $com="UPDATE core.securityplancomplements 
                            SET 
 infosignaling='$infosignaling',
 definitionsignaling='$definitionsignaling',
 locationsignaling='$locationsignaling',
 maintenancesignaling='$maintenancesignaling' 
                            WHERE idparty='$idpartyenterprise' RETURNING id";
                      // var_dump($com);
                            $idsecurityplansubprogram=$dbl->executeScalar($com);
                            if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                                // utilities::alert("correo ya registrado");
                                $path = "ejerciciosysimulacrosPL.php";
                                utilities::redirect($path);
                            }else{
                                utilities::alert("registro fallido");

                            }
                        }
                    }
        }
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("senalizacionPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.senalizacionPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


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
            $active = $arPar_person[11];
            $deleted = $arPar_person[12];

            
        }     
  

       
    ?>
             <!--Navegacion-->    
             <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
                
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
            <!--Fin Navegacion-->
        </head>
        <body>    
            <FORM action="<?php echo $action;?>" method="post" name="senalizacionPL" class="italsis" style="">
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
        presentationLayer::buildIdInputHidden($id,"document.senalizacionPL",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
    <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>SEÑALIZACIÓN</div>
           ',""); 

    echo '<div style="text-align: center;">

    <!--<span style="color:black; font-size: x-large; ">SEÑALIZACION</span>-->
    </div>';     

    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "infosignaling", "infosignaling", $infosignaling,
        "input textarea2","title", $rows, $cols,"width:80%");

    echo '<div style="text-align:left;"><br>

    <span style="color:black; font-size: x-large; ">Evidencia Fotográfica</span>
    </div>';  
    echo '<br>';

    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Anexar Evidencia Fotografica</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen, puede seleccionar hasta 20 imagenes:  </span>
    </div>';  
    echo '<br>';

myPresentationLayer::inputFileImg("SENAL-0","SENAL-0","SENAL-0-".$idpartyenterprise,"SENAL","show-SENAL-0-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-0-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

    echo '<br>';
    echo '<br>';

    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Definiciones</span>
    </div>';
    echo '<br>';
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "definitionsignaling", "definitionsignaling", 
        $definitionsignaling,"input textarea2","title", $rows, $cols,"width:80%");


    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Informativas</span>
    </div>';
    echo '<br>'; 
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>';
    echo '<br>';  
myPresentationLayer::inputFileImg("SENAL-1","SENAL-1","SENAL-1-".$idpartyenterprise,"SENAL","show-SENAL-1-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-1-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-1-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

echo '<br>';
echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Informativas de emergencias</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>';  
    echo '<br>';
myPresentationLayer::inputFileImg("SENAL-2","SENAL-2","SENAL-2-".$idpartyenterprise,"SENAL","show-SENAL-2-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-2-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-2-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
echo '<br>';
echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Informativas de emergencias de Desastres</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>';  
    echo '<br>';
myPresentationLayer::inputFileImg("SENAL-3","SENAL-3","SENAL-3-".$idpartyenterprise,"SENAL","show-SENAL-3-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-3-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-3-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

echo '<br>';
echo '<br>';
   echo '<div style="">
    <span style="color:black; font-size: x-large; ">Preventivas</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>';  
    echo '<br>';
myPresentationLayer::inputFileImg("SENAL-4","SENAL-4","SENAL-4-".$idpartyenterprise,"SENAL","show-SENAL-4-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-4-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-4-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

echo '<br>';
echo '<br>';

   echo '<div style="">
    <span style="color:black; font-size: x-large; ">Prohibitivas o Restrictivas</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>';  
    echo '<br>';
myPresentationLayer::inputFileImg("SENAL-5","SENAL-5","SENAL-5-".$idpartyenterprise,"SENAL","show-SENAL-5-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-5-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-5-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
echo '<br>';
echo '<br>';
   echo '<div style="">
    <span style="color:black; font-size: x-large; ">De obligación</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>'; 
    echo '<br>'; 
myPresentationLayer::inputFileImg("SENAL-6","SENAL-6","SENAL-6-".$idpartyenterprise,"SENAL","show-SENAL-6-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-6-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-6-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

echo '<br>';
echo '<br>';
  echo '<div style="">
    <span style="color:black; font-size: x-large; ">Aviso de Protección Civil</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen</span>
    </div>';  
    echo '<br>';
myPresentationLayer::inputFileImg("SENAL-7","SENAL-7","SENAL-7-".$idpartyenterprise,"SENAL","show-SENAL-7-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-7-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-7-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';




echo '<br>';
echo '<br>';

echo '<div style="">
    <span style="color:black; font-size: x-large; ">Ubicación</span>
    </div>'; 
    echo '<br>';
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "locationsignaling", "locationsignaling", 
        $locationsignaling,"input textarea2","title", $rows, $cols,"width:80%");

        echo '<br>';

    echo '<div style="">
    <span style="color:black; font-size: x-large; ">Anexar Imágenes con los Planos de Identificación de Riesgos del Inmueble</span>
    </div>'; 
    echo '<br>';
    echo '<div style="">
    <span style="color:black; font-size: medium; ">Favor de seleccionar imagen, puede seleccionar hasta 20 imagenes:  </span>
    </div>';  

    echo '<br>';
myPresentationLayer::inputFileImg("SENAL-8","SENAL-8","SENAL-8-".$idpartyenterprise,"SENAL","show-SENAL-8-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
    "","","","","");

       
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SENAL-8-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SENAL-8-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";     
    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
echo '<br>';
echo '<br>';

echo '<div style="">
    <span style="color:black; font-size: x-large; ">Mantenimiento</span>
    </div>'; 
    echo '<br>';
    myPresentationLayer::buildTextAreasInpunClassAndStyle(
        $title, "maintenancesignaling", "maintenancesignaling", 
        $maintenancesignaling,"input textarea2","title", $rows, $cols,"width:80%");





 
            myPresentationLayer::buildButtonOrImage("Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
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
