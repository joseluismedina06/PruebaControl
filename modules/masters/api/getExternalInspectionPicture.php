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
    
    $bl=new baseBL();

    // Takes raw data from the request
    $json = file_get_contents('php://input');

    /*
    $json='

    {
        "idparty": "3"
    }
    ';
    */

    // Converts it into a PHP object
    $data = json_decode($json);

    

    $comgetpicture="select name,content from core.pictures where code='INSPECTEXT' and idparty=$data->idparty";
    
    $res=$bl->executeReader($comgetpicture);

    if ($res==""){
        $response=array(
            'code'=> '0100',
            'message'=> 'Error al Recuperar las Imagenes'
        );
    }
    else
    {
        $response=array(
            'code'=> '0000',
            'message'=> 'Imagenes Recuperadas Correctamente',
            'images'=>$res
        );
    }
    
    echo json_encode($response);
?>