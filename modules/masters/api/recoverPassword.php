<?php
    //session_start();
    //header('Content-Type: text/html; charset=UTF-8');
    header("Content-Type: application/json");
    //error_reporting(E_ALL);
    error_reporting(0);

    chdir(dirname(__FILE__));
    include_once("../base/basePL.php");
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");
    chdir(dirname(__FILE__));
    include_once("includes/myPresentationLayer.php");
    chdir(dirname(__FILE__));
    include_once("includes/myUtilities.php");                            
    chdir(dirname(__FILE__));
    include_once("../../../includes/nusoap/mailWS.php");
    
    $dbl=new baseBL();

    // Takes raw data from the request
    $json = file_get_contents('php://input');

    /*
    $json='

    {
        "email": "artumarc@gmail.com"
    }
    ';*/
    

    // Converts it into a PHP object
    $data = json_decode($json);

    $message="";
    $code="";
    
    // Check User
    $comgetidparty="select idparty from core.email where content='".$data->email."'";
    $resgetidparty=$dbl->executeScalar($comgetidparty);
    //var_dump($resgetidparty);

    if($resgetidparty!=0) {

        // Generate new Password
        $newpassw = utilities::randomToken(6);  

        // Update Password
        $comupd="update core.party set password='".md5($newpassw)."' where id=".$resgetidparty;
        //echo "Query update: ".$comupd."\n";
        $ress=$dbl->executeCommand($comupd); 
        //echo "Resultado update: ".$ress."\n";

        // Generate email                        
        $mws = new mailWS();
        $subjectemail = "CAMBIO CONTRASENA EN SISTEMA DE APROBACION DE PROTECCION CIVIL";
        $headeremail = "Estimado Cliente,"."<br>";
        $headeremail .= "Bienvenido al Sistema"."<br>"."<br>";
        $bodyemail = "Hemos procesado su cambio de contrase&ntilde;a satisfactoriamente. Lo invitamos a ingresar en el sistema con los siguientes datos:"."<br>"."<br>";
        $bodyemail .= "Usuario: ".$data->email."<br>";
        $bodyemail .= "Contrase&ntilde;a: ".$newpassw."<br>"."<br>";
        $footeremail = "Gracias por utilizar nuestros servicios."."<br>"."<br>";
        $mws -> sendEmail($subjectemail,
                        array($data->email),
                        $headeremail,
                        $bodyemail,
                        $footeremail);
        
        $message="Cambio de Contraseña procesado correctamente";
        $code="0000";
                
    } else {
        // User dont exist
        $message="Usuario No se encuentra registrado en el sistema";
        $code="0200";
    }
     
    // Generate Out json
    if($resgetidparty==0) {
        $response=array(
            'code'=> $code,
            'message'=> $message
        );
    } else {
        $response=array(
            'code'=> $code,
            'message'=>$message,
            'idparty'=>$resgetidparty
        );
    }
    
    echo json_encode($response);
?>