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
        "idparty": "3",
        "pipc":[
            {
                "fileorder":1,
                "textcontent": "Algo",
                "approved":"Y"
            }
        ]
    }
    ';
    */

    // Converts it into a PHP object
    $data = json_decode($json);

     // Add new comment panel to enterprises
     $cominspipccommentpanel="insert into core.pipcinspection(idparty,idpipcstep) 
     select e.idparty,p.id
     from core.enterprise e,core.pipcsteps p
     where idparty not in (select idparty from core.pipcinspection)";
     
    $resinspipccommentpanel=$dbl->executeCommand($cominspipccommentpanel);

    $errorMessage="";

    // Update CommentPanel fields
    foreach($data->pipc as $valor) {

        // Set array with panel
        $comupdpipcexternalinspection="update core.pipcinspection 
        set textcontent='$valor->textcontent',approved='$valor->approved'
        where idparty=$data->idparty and idpipcstep=(select id from core.pipcsteps where fileorder=$valor->fileorder) 
        returning id";

        $resupdpipcexternalinspection=$dbl->executeScalar($comupdpipcexternalinspection);

        if($resupdpipcexternalinspection==0) {
            $errorMessage=$errorMessage. "Error al actualizar el fileorder: $valor->fileorder"." ";
        }
        
    }

    // Check Approveds
    // Total
    $comgettotalapproveds="select count(id) from core.pipcinspection";

    $resgettotalapproveds=$dbl->executeScalar($comgettotalapproveds);


    // Approveds
    $comgetapproveds="select count(id) from core.pipcinspection
    where approved='Y'";

    $resgetapproveds=$dbl->executeScalar($comgetapproveds);

    // Update Status
    if($resgettotalapproveds-$resgetapproveds==0) {
        $comsetpipcstatus="update core.pipcstatus
            set idstatus=(select id from base.entitysubclass where code='PIPCSTATUSVALUES' and name='Aprobado')
            where idparty=$data->idparty returning id";

        
    } else {
        $comsetpipcstatus="update core.pipcstatus
            set idstatus=(select id from base.entitysubclass where code='PIPCSTATUSVALUES' and name='Necesita Correcciones')
            where idparty=$data->idparty returning id";
    }
    $ressetpipcstatus=$dbl->executeScalar($comsetpipcstatus);

    // Get Email Data
    // 

    // Send Notification Mail
    // Generate email
    /*                        
    $mws = new mailWS();
    $subjectemail = "NOTIFICACION DEL SISTEMA DE APROBACION DE PROTECCION CIVIL";
    $headeremail = "Estimado Consultor,"."<br>";
    $headeremail .= "Bienvenido al Sistema"."<br>"."<br>";
    $bodyemail = "Hemos procesado su cambio de contrase&ntilde;a satisfactoriamente. Lo invitamos a ingresar en el sistema con los siguientes datos:"."<br>"."<br>";
    $bodyemail .= "Usuario: ".$data->email."<br>";
    $bodyemail .= "Contrase&ntilde;a: ".$newpassw."<br>"."<br>";
    $footeremail = "Gracias por utilizar nuestros servicios."."<br>"."<br>";
    $mws -> sendEmail($subjectemail,
                    array($data->email),
                    $headeremail,
                    $bodyemail,
                    $footeremail);*/

    // Generate Out json
    if($errorMessage=="") {
        $response=array(
            'code'=> '0000',
            'message'=> 'Actualizacion OK.'
        );
    } else {
        $response=array(
            'code'=> '0100',
            'message'=>$errorMessage
        );
    }
    
    echo json_encode($response);

?>