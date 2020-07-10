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

    // Add firts status to enterprises
    $cominspipcstatus="insert into core.pipcstatus(idparty,idstatus) 
	    select idparty,
	    (select id from base.entitysubclass where code='PIPCSTATUSVALUES' and name='Pendiente') as idstatus
	    from core.enterprise
        where idparty not in (select idparty from core.pipcstatus)";
        
    $resinspipcstatus=$dbl->executeCommand($cominspipcstatus);

    // Get array with status
    $comgetpipcstatusint="select e.idparty,e.bussinesname,e.codebranch,esc.name
    from
        core.enterprise e,
        base.entitysubclass esc,
        core.pipcstatus p
    where
        e.idparty=p.idparty and
        esc.id=p.idstatus";
    $resgetpipcstatusint=$dbl->executeReader($comgetpipcstatusint);

    // Generate Out json
    if($resgetpipcstatusint=="") {
        $response=array(
            'code'=> '0100',
            'message'=> 'Error al mostrar los datos de las empresas'
        );
    } else {
        $response=array(
            'code'=> '0000',
            'message'=>'Datos mostrados satisfactoriamente',
            'data'=>$resgetpipcstatusint
        );
    }
    
    echo json_encode($response);
?>