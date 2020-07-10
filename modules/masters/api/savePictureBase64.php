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
        "idparty": "3",
        "image":"",
        "filename":"ejemplo.jpeg"
    }
    ';*/

    // Converts it into a PHP object
    $data = json_decode($json);

    

    $cominspicture="insert into core.pictures(code,name,idparty,content) 
        values ('INSPECTEXT','$data->filename',$data->idparty,'$data->image') returning id";

    $res=$bl->executeScalar($cominspicture);

    if ($res==0){
        $response=array(
            'code'=> '0100',
            'message'=> 'Error al Guardar la Imagen'
        );
    }
    else
    {
        $response=array(
            'code'=> '0000',
            'message'=> 'Imagen Guardada Correctamente'
        );
    }

    echo json_encode($response);
?>