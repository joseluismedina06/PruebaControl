<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
error_reporting(0);
?>
<HTML>
<HEAD>
    <!--<META charset="utf-8">-->
    <TITLE>Cambio de Contraseña </TITLE>
<!--    <SCRIPT language="javascript" src="../../js/globals.js" type="text/javascript"></SCRIPT>-->

        <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
<!--        <title>Persona</title>-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
        
        
        
    <meta charset="UTF-8">

    <!-- Meta responsive tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<title>Persona</title>-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- New CSS -->
    <link rel="stylesheet" href="css/styles.css">         
    
    
</HEAD>


<?php
    chdir(dirname(__FILE__));
    include_once("../base/basePL.php");
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");    
    chdir(dirname(__FILE__));
    include_once("includes/myPresentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/myUtilities.php");	
    chdir(dirname(__FILE__));
    include_once("pwdchangepersonjobsBL.php");     
    chdir(dirname(__FILE__));
    include("includes/navbarbase.php");        
    basePL::buildjs();
    basePL::buildccs();
 
    myUtilities::buildmyccs(0);   
    myUtilities::buildmyjs(0); 
    
//    presentationLayer::buildHeaderITALPORTAL();
    

    
// FORM VARIABLES
    $email = 
    $capt =        
    $pwd = 
    $newpwd = 
    $repeatnewpwd =    
    $bback = 
    $path = "";

	
    $email = basePL::getReq($_REQUEST,"email");
    $capt = basePL::getReq($_REQUEST,"capt");    
    $pwd = basePL::getReq($_REQUEST,"pwd");  
    $newpwd = basePL::getReq($_REQUEST,"newpwd");
    $repeatnewpwd = basePL::getReq($_REQUEST,"repeatnewpwd"); 
    $bback = basePL::getReq($_REQUEST,"bback");  
    $bpwd = basePL::getReq($_REQUEST,"bpwd");
    $pwdchangepersonjobsBL = new pwdchangepersonjobsBL($code,$name,$email,$pwd,$newpwd,$repeatnewpwd,$active,$deleted);  
    

    // var_dump($repeatnewpwd);
    if ($bback == "bback") {
        $path = "index.php";
        utilities::redirect($path);
    }

    
	
    if ($bpwd == "bpwd") {

//        if (utilities::valOk($dguser) && utilities::valOk($dgpwd) && utilities::valOk($dgpwdn) && utilities::valOk($dgpwdnc)) {
if ($pwdchangepersonjobsBL->validate()==true){ 
            // if ($capt != presentationLayer::getCaptcha()) {
            //     utilities::alert("La imagen no coincide con el código de seguridad. Intente nuevamente ".$capt);
            // } // Captcha Failed
            // else {
               // $nr = $ubl->updPwd($dguser,$dgpwdn);
                $nr =$pwdchangepersonjobsBL->updPwd();
                if ($nr > 0) {
                    utilities::alert("Cambio Exitoso");
                    // $path = "indexx.php";
                    // utilities::redirect($path);
                }
                else {
                    utilities::alert("No pudo realizar el cambio de contraseña");
                }

            // } // Captcha OK
//        } // fields filled
//        else {
//            if (utilities::valOk($email) || utilities::valOk($pwd) || utilities::valOk($newpwd) || utilities::valOk($repeatnewpwd)) {
//                utilities::alert("Correo Electronico, Contraseña Actual, Nueva Contraseña y Repetir Nueva Contraseña deben ser indicados. Intente Nuevamente");
//            }
//
//        } // incomplete fields
}
    }
	
?>

<BODY class="" >
    <!--<DIV id="mukam-layout">-->

        <!--<SECTION>-->
        <!--<DIV class="bg-color grey">-->
            <br> <br>
                <FORM action="<?php echo $action;?>" method="post" name="index" class="italsis" style="
    position: relative;
    overflow: auto;
">
                <?php
//                    presentationLayer::buildFormTitle ("Cambio de Contrase&ntildea","");
    echo '<br><DIV class="MinorMainTitleCenter"><br>';
    echo '<span >Cambio de Contrase&ntildea</span><br>';  
    echo '</DIV><br><br><br>';                
                    echo '<center style="display: flex;">';
    myPresentationLayer::buildInitColumn3();
        // myPresentationLayer::buildInputCheckEmailEventClass(
        //     "Correo Electronico(*)","email","email",$email,
        //     "input inputs","title ml-0","35","",$required);  
            myPresentationLayer::buildInputCheckEmailEventClass(
                "Correo Electronico(*)","email","email",$email,
                "input inputs","title  ml-0",
                "onkeypress","this.value=this.value.toLowerCase();",
                "","","","",
                "","35","",$required,"","",""); 

        myPresentationLayer::buildInputWithValidatorClass(
            "Repetir Nueva contraseña(*):","repeatnewpwd","repeatnewpwd",$repeatnewpwd,
            "input inputpassword","title ml-0","","","","","","","","","",$required,"","","password"); 
                 
                         
                    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3();
                    
        myPresentationLayer::buildInputWithValidatorClass(
            "Contraseña Actual(*):","pwd","pwd",$pwd,
            "input inputpassword","title ml-0","onkeyup","CheckPassword(this.value)",
            "","","","","","","",$required,"","","password");  
        
        // myPresentationLayer::buildInputWithValidatorClass(
        //     "C&oacute;digo de Seguridad(*):","capt","capt",$capt,
        //     "input inputs","title ml-0","","",
        //     "","","","",
        //     "","30","",$required);                     

        

                    echo '<br>';
                    presentationLayer::buildEndColumn();
    myPresentationLayer::buildInitColumn3();    
        myPresentationLayer::buildInputWithValidatorClass(
            "Nueva Contraseña(*):","newpwd","newpwd",$newpwd,
            "input inputpassword","title ml-0","onkeyup","CheckPassword(this.value)",
            "","","","","","","",$required,"","","password");   
         // myPresentationLayer::buildCaptchaIco("Imagen(*):");  

    presentationLayer::buildEndColumn();
              
 

             
//                    myPresentationLayer::buildFooterDefIco("Cambiar Contrase&ntildea","bpwd","bpwd","bpwd","Regresar","bback","bback","bback");
                     echo '</center>';
                     myPresentationLayer::buildButtonOrImage("","bpwd","bpwd","bpwd","images/save.svg","mybutton","mybuttonbig",
                                            "","bback","bback","bback","images/back.svg","mybutton","mybuttonbig");
            ?>
                </FORM>
                </BR>
                </BR>


        <!--</DIV>-->
        <!--</SECTION>-->
    <!--</DIV>-->
 
         
      </body>
</html>


