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
    chdir(dirname(__FILE__));
    include_once("includes/myPresentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/myUtilities.php");                            
    chdir(dirname(__FILE__));
    include_once("../../../includes/nusoap/mailWS.php");
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
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
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
        
        // default values
        $action = "";
        $msg = "";
        $uidparty="";
        
        //validar captcha (Not Used)
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
        if ($bAccess == "bAccess") {        
            if (valcaptcha($capt)) {
                $comuid="select idparty from core.email where content='".$demail."'";
                
                $uidparty=$dbl->executeScalar($comuid);

                $comgetsadmin="select code from core.party where id=$uidparty";
                $codesadmin=$dbl->executeScalar($comgetsadmin);
        
                if ($uidparty != "") {
                    $compwd="select password from core.party where id=".$uidparty;
                    
                    $upwd=$dbl->executeScalar($compwd);
                            
                    if ($upwd==md5($dpwd)){
    
                        $_SESSION["idpartyconsultant"]=$uidparty;

                        $comgetidconsultant="select id from core.consultant where 
                                idparty=".$uidparty;
        
                        $_SESSION['amidconsultant']=$dbl->executeScalar($comgetidconsultant);

                        $_SESSION['useractive']="active";

                        if ($codesadmin!="") {
                            $_SESSION['sadmin']="active";

                            utilities::redirect("personPL.php");

                        } else {

                            utilities::redirect("../exchange/agreementPL.php");
                        }

                    }
                    else {
                        utilities::alert("Usuario o Contraseña incorrecta.Intente Nuevamente");
                    } // Password Failed                
                                 
                } // Finding User
                else {
                    utilities::alert("El usuario no existe en el Sistema.");         
                } // Dont exist User
            }    
        }
        
        // Recovery Password
        if ($bpwd == "bpwd") {
                                       
            if ($demail != "") {

                // Generate new Password
                $newpassw = utilities::randomToken(6);  

                // Email Verify
                $comuidve="select idparty from core.email where content='".$demail."'";
                //echo "query: ".$comuidve."\n";
                $uidclink=$dbl->executeScalar($comuidve);
                //echo "resultado: ".$uidclink;        
                $existemail=($uidclink!="");
                if ($existemail) {

                    // Update Password
                    $comupd="update core.party set password='".md5($newpassw)."' where id=".$uidclink;
                    //echo "Query update: ".$comupd."\n";
                    $ress=$dbl->executeCommand($comupd); 
                    //echo "Resultado update: ".$ress."\n";
                    
                    if($ress==1){

                        // Generate email                        
                        $mws = new mailWS();
                        $subjectemail = "CAMBIO CONTRASENA EN SISTEMA DE PROTECCION CIVIL";
                        $headeremail = "Estimado Cliente,"."<br>";
                        $headeremail .= "Bienvenido al Sistema"."<br>"."<br>";
                        $bodyemail = "Hemos procesado su cambio de contrase&ntilde;a satisfactoriamente. Lo invitamos a ingresar en el sistema con los siguientes datos:"."<br>"."<br>";
                        $bodyemail .= "Usuario: ".$demail."<br>";
                        $bodyemail .= "Contrase&ntilde;a: ".$newpassw."<br>"."<br>";
                        $footeremail = "Gracias por utilizar nuestros servicios."."<br>"."<br>";
                        $mws -> sendEmail($subjectemail,
                                        array($demail),
                                        $headeremail,
                                        $bodyemail,
                                        $footeremail);
                        
                        utilities::alert("Cambio de Contraseña procesado correctamente. En unos minutos recibira por email la confirmación");

                        
                    } else {
                        utilities::alert("Hubo un error al querer enviar la contraseña");
                    }

                } else {
                    utilities::alert("El Usuario no se encuentra registrado.  ");
                }
                    
            } else {
                    utilities::alert("Debe colocarse el Usuario y la nueva contraseña llegará a su email");
            }         

        }
        // Back
        if ($bback == "bback") {
            utilities::redirect("frontend/index.php");
        } 	
    ?>

    <body  class="" >

        <?php
            echo '
            <div class="" style=" width: 10rem;     margin-bottom: 1rem;">
            <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
            max-width: 100%;
            height: auto;
            ">
            '. '</div>'; 
            
        ?>
        
        <FORM action="<?php echo $action;?>" method="post" name="ingresarjobs" class="italsis"
            style="box-shadow: 1px 2px 10px rgba(0,0,0,.3);max-width:500px">

        <?php       

            echo '
            <div class="container maxw-650 text-center"
            style="
            margin: auto; margin-top: 3rem;
            ">
            '; 

                    
        ?>
        <div style="letter-spacing: 0.5em;
            color: black;  
            font-weight: 100;
            text-align: center;
            font-size: 1rem;">
            Correo Electrónico
        </div>

        <?php

            myPresentationLayer::buildInputCheckEmailEventClass(
                "","demail","demail",$demail,
                "input  correo","title title text-left pdl-65 d-block",
                "onkeyup","this.value=this.value.toLowerCase();",
                "","","","",
                "","50","",$required,"","",""); 
        ?>

        <div style="letter-spacing: 0.5em;
            color: black;
            font-weight: 100;
            text-align: center;
            font-size: 1rem;">
            Contraseña
        </div>

        <?php

            myPresentationLayer::buildInputWithValidatorClass(
                "","dpwd","dpwd",$dpwd,
                "input correo","title text-left pdl-65 d-block","","",
                "","","","","","","",$required,"","","password");                      
        
            echo '<DIV>'; 
            echo '</DIV>'; 
            echo '</div>';

             
                myPresentationLayer::buildButtonOrImage("","bAccess","bAccess","bAccess",
                    "images/bacceder.png","mybutton ba","maxh-40");   
        ?>

        <div style="text-align:center;">        
            <div style="padding: 0px;">
                <button type="submit" name="bpwd" id="bpwd" value="bpwd" 
                        style="background: transparent;
                            border: none; 
                            padding: 0px">

                <p style="font-size: initial;
                    padding: 0px;
                    margin: auto;
                    cursor: pointer;
                    color: #223b94;
                    text-decoration: underline;">Olvidó su Contraseña</p>
                </button>      
            </div>

            <div>                                                    
                <a href="pwdchangePL.php" style="font-size: initial;
                    
                    color: #223b94;
                    text-decoration: underline;">Cambiar Contraseña</a>
            </div>
        </div>

        <?php  
            /*     
            if($_GET['action'] == 'exit'){
                session_destroy();
                header("Location: frontend/index.php");
            }*/
        ?>
        </FORM>
        
        <?php
            /*
            echo '<br><br><br>';
            chdir(dirname(__FILE__));
            include_once("footerindex.php"); */   
        ?>       
    </body>
       
</html>
