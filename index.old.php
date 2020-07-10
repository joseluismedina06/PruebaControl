<?php
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(0);
    chdir(dirname(__FILE__));
    include_once("includes/utilities.php");
    
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);

    echo "API Rest 2.0 proteccioncivil - Elaborada por: Arturo A. Marcano S.";

