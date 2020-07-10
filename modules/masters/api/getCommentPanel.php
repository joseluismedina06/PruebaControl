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
        "idparty": "3"
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

    // Get array with panel
    $comgetpipccommentpanel="select e.idparty,e.bussinesname,e.codebranch,
        esc.name as status,s.name,s.filepath,s.filename,s.fileorder,
        i.textcontent,i.approved
        from
            core.enterprise e,
            core.pipcinspection i,
            core.pipcsteps s,
            base.entitysubclass esc,
            core.pipcstatus ps
        where
            e.idparty=i.idparty and
            i.idpipcstep=s.id and
            ps.idparty=e.idparty and
            ps.idstatus=esc.id and
            s.filename!='' and e.idparty=$data->idparty
        order by s.fileorder";
    $resgetpipccommentpanel=$dbl->executeReader($comgetpipccommentpanel);

    // Extract Enterprise Data
    $dataenterprise=array('idparty'=>$resgetpipccommentpanel[0]['idparty'],
        'bussinesname'=>$resgetpipccommentpanel[0]['bussinesname'],
        'codebranch'=>$resgetpipccommentpanel[0]['codebranch'],
        'status'=>$resgetpipccommentpanel[0]['status']
    );
    
    // Extract PIPC Data
    foreach ($resgetpipccommentpanel as &$valor) {
        unset($valor['idparty']);
        unset($valor['bussinesname']);
        unset($valor['codebranch']);
        unset($valor['status']);
        $valor+=['URL'=>$_SERVER['SERVER_NAME'].'/'.$valor['filepath'].'/'.$valor['filename']];
    }

    // Generate Out json
    if($resgetpipccommentpanel=="") {
        $response=array(
            'code'=> '0100',
            'message'=> 'Error al mostrar los datos de las empresas'
        );
    } else {
        $response=array(
            'code'=> '0000',
            'message'=>'Datos mostrados satisfactoriamente',
            'data'=>array(
                'idparty'=>$dataenterprise['idparty'],
                'bussinessname'=>$dataenterprise['bussinesname'],
                'codebranch'=>$dataenterprise['codebranch'],
                'status'=>$dataenterprise['status'],
                'pipc'=>$resgetpipccommentpanel
            )
        );
    }
    
    echo json_encode($response);
?>