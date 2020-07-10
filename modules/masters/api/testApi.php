<?php
    //session_start();
    //header('Content-Type: text/html; charset=UTF-8');
    header("Content-Type: application/json");
    //error_reporting(E_ALL);
    error_reporting(-1);

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
    include("apiSecurity.php");
    
    $bl=new baseBL();

    $a=new ApiSecurity();

    
    

    

?>