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
    //chdir(dirname(__FILE__));
    //include_once("../../../includes/nusoap/mailWS.php");
    
    $dbl=new baseBL();

    // Takes raw data from the request
    $json = file_get_contents('php://input');

    /*
    $json='

    {
        "email": "artumarc@gmail.com",
        "pwd": "123456"
    }
    ';
    */

    // Converts it into a PHP object
    $data = json_decode($json);

    $message="";
    $code="";
    $typeuser="";

    // Check User
    $comgetidparty="select idparty from core.email where content='".$data->email."'";
    $resgetidparty=$dbl->executeScalar($comgetidparty);
    //var_dump($resgetidparty);

    if($resgetidparty!=0) {

        // Check Type User
        $comgettypeuser="select code from core.party where id=$resgetidparty";
        $codetypeuser=$dbl->executeScalar($comgettypeuser);
        //var_dump($codetypeuser);

        // Check Password
        $compwd="select password from core.party where id=".$resgetidparty;            
        $upwd=$dbl->executeScalar($compwd);
        //var_dump($upwd);
                            
        if ($upwd==md5($data->pwd)){
            $message="Usuario Autenticado Correctamente";
            $code="0000";
            $typeuser=$codetypeuser;
        } else {
            $message="La clave es Incorrecta";
            $code="0100";
        }
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
            'typeuser'=>$typeuser,
            'idparty'=>$resgetidparty
        );
    }
    
    echo json_encode($response);
?>