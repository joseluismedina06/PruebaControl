<?php
    //session_start();
    header('Content-Type: text/html; charset=UTF-8');
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
    
    $bl=new baseBL();

    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);

    // Print Entry Json
    print_r($data);

?>