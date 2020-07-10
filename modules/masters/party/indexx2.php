<?php 
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(0);

    chdir(dirname(__FILE__));
    include_once("../base/basePL.php");
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");
    chdir(dirname(__FILE__));
    include_once("../security/userBL.php");
    //  chdir(dirname(__FILE__));
    //  include_once("includes/presentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/myPresentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/myUtilities.php");                            
    chdir(dirname(__FILE__));
    include_once("../../../includes/nusoap/mailWS.php");
//    chdir(dirname(__FILE__));
//    include_once("includes/mailWSjobs.php");      
    chdir(dirname(__FILE__));
    include("includes/navbarbase.php");                           
    chdir(dirname(__FILE__));
    include_once("includes/myPresentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/mycss.css");                            
    chdir(dirname(__FILE__));
    include_once("includes/styles.css"); 

    basePL::buildjs();
    basePL::buildccs();
 
    myUtilities::buildmyccs(0);   
    myUtilities::buildmyjs(0);   
                            
?>
<HTML>
    <HEAD>
        <TITLE>Login Protección Civil</TITLE>
        <!--<LINK href="css/italsis.css" rel="stylesheet" type="text/css">-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <SCRIPT language="javascript" src="js/globals.js" type="text/javascript"></SCRIPT>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
        <meta charset="UTF-8">
        <!-- Meta responsive tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <!--<LINK href="css/bootstrap.min.css" rel="stylesheet" media="screen">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- New CSS -->
        <link rel="stylesheet" href="css/styles.css">                                                              
    </HEAD>
<?php

    // presentationLayer::buildHeaderITALPORTAL();
    // FORM VARIABLES
                                
    $duser = $dpwd = $capt = $bpwd="";

    $demail = basePL::getReq($_REQUEST,"demail");	
    $dpwd = basePL::getReq($_REQUEST,"dpwd");
    $capt = basePL::getReq($_REQUEST,"capt");
    $bpwd = basePL::getReq($_REQUEST,"bpwd");
    $breg = basePL::getReq($_REQUEST,"breg");
    $bAccess = basePL::getReq($_REQUEST,"bAccess");	
    $bback = basePL::getReq($_REQUEST,"bback"); 
    
    // baseBL Object
    $dbl = new baseBL();
                
    $action = "";
    $msg = "";
    $uidparty="";
    
    //validar captcha
    function valcaptcha($capt) {
        $res = true;
        $regcapt = presentationLayer::getCaptcha();        
        if ($capt != $regcapt) {
            $res = false;
            utilities::alert("La imagen no coincide con el codigo de seguridad. Intente nuevamente");
        } // Captcha Failed
        return($res);
    }

    // Cambio de clave               
    if ($bpwd == "bchange") {
        //if (valcaptcha($capt)) { 
            $path = "pwdchangePL.php";
            utilities::redirect($path);
        //}
    }
        
    // Registro
    if ($breg == "breg") {
        //if (valcaptcha($capt)) {
            $_SESSION["regok"] = "1"; 
            $path = "registerjobsPL.php";
            utilities::redirect($path);
        //}
    }
     
    // checkExistUser                
    //if (utilities::valOk($demail) && utilities::valOk($dpwd)) {
    // check security.user
    if ($bAccess == "bAccess") {        
        if (valcaptcha($capt)) {
            $comuid="select id from core.clinker where email='".$demail."'";
            $uidparty=$dbl->executeScalar($comuid);
                        // var_dump($comuid);

            if ($uidparty != "") {
                $compwd="select password from core.clinker where id=".$uidparty;
                $upwd=$dbl->executeScalar($compwd);

           

                //$com="select idparty from party.partybankinfo where idparty='".$uidparty."' limit 1";
                //$respartybankinfo=$dbl->executeScalar($com);   
                // $com="select idparty from party.partydocument where idparty='".$uidparty."' limit 1";
                // $respartydocument=$dbl->executeScalar($com);                  
                // $com="select idparty from party.partyphone a, base.phonetype b where a.idparty='".$uidparty."' and b.code='movil' and b.id=a.idphonetype limit 1";
                // $respartyphone=$dbl->executeScalar($com); 
//                if($upwd=="" && ($respartybankinfo!="" && $respartyphone!="")){
                // if($upwd==""){                
                //     utilities::alert("Debe generar contraseña");
                // }else{
//                    if($respartybankinfo=="" || $respartyphone==""){
//        //                if (valcaptcha($capt)) {
////                            $_SESSION["idpartyjob"]=$uidparty;
//                            $_SESSION["demail"]=$demail;    
//                            utilities::redirect("../ICO/registerjobsPL.php");   
//        //                }
//
//                    }else{
                        // if ($upwd==md5($dpwd)){
                        if ($upwd==$dpwd){
        //                     if($respartydocument=="" || $respartyphone==""){
        //         //                if (valcaptcha($capt)) {
        // //                            $_SESSION["idpartyjob"]=$uidparty;
        //                         if($respartyphone!=""){
        //                            $_SESSION["respartyphone"]=$respartyphone; 
        //                         }
        //                             $_SESSION["idpartyjob"]=$uidparty;
        //                             $_SESSION["demail"]=$demail;    
        //                             utilities::redirect("registerjobsPL.php");   
        //         //                }

        //                     }else{
        //                    if (valcaptcha($capt)) {
                                    // $_SESSION["idpartyjob"]=$uidparty;
                                    $_SESSION["idpartyconsultant"]=$uidparty;
                                    utilities::redirect("../exchangeAcordion/agreementPL.php");
        //                    } // OK USER
                            // }                            

                        }
                        else {
                            utilities::alert("Usuario o Contraseña incorrecta.Intente Nuevamente");
                        } // Password Failed                
//                    }                      
                // }                                  
            } // Finding User
            else {
                utilities::alert("El usuario no existe en el Sistema.");         
            } // Dont exist User
        }    
    }
    /*  else {
            utilities::alert("Usuario y Contrasena deben ser indicados. Intente Nuevamente");
        } // User and Pass empty
    */   
    
        // Recuperar Contrasena
    if ($bpwd == "bpwd") {
//                                   
                if ($demail != "") {
                    // Generate new Password
                    $newpassw = utilities::randomToken(6);                        
                    // Email Verify
                    $comuidve="select idclink from core.clinker where email='".$demail."'";
                    $uidclink=$dbl->executeScalar($comuidve);
                    $existemail=($uidclink!="");
                    var_dump($comuidve);
//                    var_dump($uidpartyve);
//                    var_dump($existemail);
                    if ($existemail) {
//                         // Pass Verify
//                         $compwdvp="select spwd from security.userparty where idparty=".$uidparty;
//                         $upwdvp=$dbl->executeScalar($compwdvp);
//                         $existpass=($upwdvp!="");
// //                        var_dump($existpass);
//                         var_dump($compwdvp);                                               
                        // if ($existpass) {
                            // Update Password
                            $comupd="update core.clinker set password='".md5($newpassw)."' where idclink=".$uidclink;
                            $ress=$dbl->executeCommand($comupd); 
                            
                        // }
                        //  else {
                        //     // Insert Password
                        //     $comupd="insert into core.clinker(idclink,password) values (".$uidparty.",'".md5($newpassw)."')";
                        //     $ress=$dbl->executeCommand($comupd);  
                        // }
//                        var_dump($ress); 
                        var_dump($comupd);
                        if($ress==1){
                            // Generate email                        
                            $mws = new mailWS();
                            $subjectemail = "CAMBIO CONTRASENA EN SISTEMA DE ITALCAMBIO ONLINE";
                            $headeremail = "Estimado Cliente,"."<br>";
                            $headeremail .= "Bienvenido al Sistema"."<br>"."<br>";
                            $bodyemail = "Hemos procesado su cambio de contrasena satisfactoriamente. Lo invitamos a ingresar en el sistema con los siguientes datos:"."<br>"."<br>";
                            $bodyemail .= "Usuario: ".$demail."<br>";
                            $bodyemail .= "Contrase&ntilde;a: ".$newpassw."<br>"."<br>";
                            $footeremail = "Gracias por utilizar nuestros servicios."."<br>"."<br>";
                            //$footeremail .= " Italcambio Casa de Cambio ";
                            $mws -> sendEmail($subjectemail,
                                            array($demail),
                                            $headeremail,
                                            $bodyemail,
                                            $footeremail);
                            utilities::alert("Cambio de Contrasena procesado correctamente. En unos minutos recibira por email la confirmacion");

                            
                        }else{
                             utilities::alert("Hubo un error al querer enviar la contraseña");
                        }

                    }else {
                        utilities::alert("El Usuario no se encuentra registrado. ");
                    }
                        
                }else {
                        utilities::alert("Debe colocarse el Usuario y la nueva contrasena llegara a su email");
                }         
                // }

   }
    //cuando se presione regresar
    if ($bback == "bback") {
        //        unset($_SESSION['idparty']); 
        //        unset($_SESSION['demail']);
        utilities::redirect("frontend/index.php");
    } 	
?>
<br><br>
<body  class="">
    <!--<DIV id="mukam-layout">-->
<?php

    //presentationLayer::buildHeaderMetalor();
?>
<!--        <SECTION>
            <DIV class="bg-color grey">-->
    <FORM action="<?php echo $action;?>" method="post" name="ingresarjobs" class="italsis">
<?php       
    echo '<div class="" style="margin:auto; width: 20rem;     margin-bottom: 1rem;">
        <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
    max-width: 100%;
    height: auto;
">'
        . '</div>'; 
        echo '<div class="container maxw-650 text-center"
        style="
    margin: auto;
">'; 

            myPresentationLayer::buildInputCheckEmailEventClass(
                    "Correo Electronico(*)","demail","demail",$demail,
                    "input mb-16","title text-left pdl-65 d-block","35","",$required);

            myPresentationLayer::buildInputWithValidatorClass(
                "Contraseña(*):","dpwd","dpwd",$dpwd,
                "input inputpassword","title text-left pdl-65 d-block","","",
                "","","","","","","",$required,"","","password");                      

            // myPresentationLayer::buildInputWithValidatorClass(
            //     "C&oacute;digo de Seguridad(*):","capt","capt",$capt,
            //     "input inputpassword","title text-left pdl-65 d-block","","",
            //     "","","","",
            //     "","30","",$required);         

            echo '<DIV>'; 
                 // myPresentationLayer::buildCaptchaIco("Imagen(*):","","title");  
            echo '</DIV>'; 
        echo '</div>';

        echo '<br>';
//        myPresentationLayer::buildButtonOrImageEventClass("","bAccess","bAccess","bAccess","images/Acceder.svg","mybutton","maxh-40");
        echo '<br>';





        myPresentationLayer::buildButtonOrImage("","bAccess","bAccess","bAccess","images/Acceder.svg","mybutton ba","maxh-40",
                                                    "","bpwd","bpwd","bpwd","images/Generar.svg","mybutton bgc","maxh-40",
                                                    "","bpwd","bpwd","bchange","images/Cambiar.svg","mybutton bcc","maxh-40");   

                    
        if($_GET['action'] == 'exit'){
            session_destroy();
            header("Location: frontend/index.php");
        }


?>
    </FORM>
<!--            </DIV>
        </SECTION>-->
    <!--</DIV>-->
<?php

//    echo "newpassw=".$newpassw;

    echo '<br><br><br>';
    chdir(dirname(__FILE__));
    include_once("footerindex.php");      
?>       
</body>

<!--<FOOTER>-->
<?php
                        
    //  presentationLayer::buildFooterBrands();
?>              
<!--</FOOTER>-->
       
</html>
