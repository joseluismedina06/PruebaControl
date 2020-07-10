<?php 
    session_start();
    error_reporting(0);
    // informarme como puedo conseguir la planilla de antecedentes de servicios FP-023?
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

    basePL::buildjs();
    basePL::buildccs();
    
    myUtilities::buildmyccs(0);   
    myUtilities::buildmyjs(0);

    unset($_SESSION['useractive']);
    unset($_SESSION['sadmin']);
    myUtilities::redirect('index.php');
    
?>