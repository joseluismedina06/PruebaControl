<?php 
    session_start();
    error_reporting(0);
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
    chdir(dirname(__FILE__));
    include_once("../exchange/partyphoneBL.php");
    

    basePL::buildjs();
    basePL::buildccs();
    
    myUtilities::buildmyccs(0);   
    myUtilities::buildmyjs(0);
    
?>


<html>
    <head>
        <script type="text/javascript" src="datepickercontrol.js"></script> 
        <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
        <title>Anexos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?php
        // base
        $bl=new baseBL();

        $phonebl=new partyphoneBL("","","","","","","");
        

        // Arrays JS Accordions
 
        $arrayPHP=array($idpartyaddress,$idpartyphone,$idpartyemail,$path);
        $arrayPHPmsgERROR=array();

        // Fin Array JS Accordions

        // default
        $active = "Y";
        $deleted = "N";
        $id = $code = $name = $observation

        = $idclink
        = $idclinker
                    
        //----- var Datos basic  
        /*
        = $email 
        = $password 
        = $firstname 
        = $lastname 
        = $birthdate 
        = $idgradeacademic
        = $idinstituteacademic_records
        = $idtitle
        = $ufromacademic_records
        = $untilacademic_records
        = $idcompany
        = $idcharge
        = $ufromexperience_record
        = $untilexperience_record 
        = $idinstitutecertifies_records
        = $idcertifies
        = $ufromcertifies_records
        = $untilcertifies_records
        = "";
        */
            
        //------var links
        =$sLink = $dLink = $pLink = $cLink = $flink = $fbnlink = "";
            
        //---var actions
        $action = "";
        $urloper = "";
        $readonly = "";
        $disabled = "";
        $buildArray_person = $buildArray = "";
            
        //---For pagination
        $pn = 0;

        //----Alerta
        $msj_error = $error_msg_first_regist= "";

        // default
        $urloper = basePL::getReq($_REQUEST,"urloper");
        $pn = basePL::getReq($_REQUEST,"pn");			
        //$register = basePL::getReq($_REQUEST,"register");
            
        //----- ID PARTY and default
        $id = basePL::getReq($_REQUEST,"id");
        $code = basePL::getReq($_REQUEST,"code"); 
        $name = basePL::getReq($_REQUEST,"name");
        //$observation = basePL::getReq($_REQUEST,"observation");
        //$active = basePL::getReqCheck($_REQUEST,"active");
        //$deleted = basePL::getReqCheck($_REQUEST,"deleted");    
        
        //----- Datos basicos   
        $idpartyenterprise=$_SESSION["idpartyenterprise"];

        //----- Document
        $iddocument=basePL::getReq($_REQUEST,"iddocument");
        $savedocument=basePL::getReq($_REQUEST,"savedocument");
        $iddocumenttype=basePL::getReq($_REQUEST,"iddocumenttype");
        $iddocumentstatus=basePL::getReq($_REQUEST,"iddocumentstatus");

        $iddocument2=basePL::getReq($_REQUEST,"iddocument2");
        $savedocument2=basePL::getReq($_REQUEST,"savedocument2");
        $iddocumenttype2=basePL::getReq($_REQUEST,"iddocumenttype2");
        $iddocumentstatus2=basePL::getReq($_REQUEST,"iddocumentstatus2");

        $iddocument3=basePL::getReq($_REQUEST,"iddocument3");
        $savedocument3=basePL::getReq($_REQUEST,"savedocument3");
        $iddocumenttype3=basePL::getReq($_REQUEST,"iddocumenttype3");
        $iddocumentstatus3=basePL::getReq($_REQUEST,"iddocumentstatus3");

        $path=basePL::getReq($_REQUEST,"path");
        $path2=basePL::getReq($_REQUEST,"path2");
        $path3=basePL::getReq($_REQUEST,"path3");

        //var_dump($savedocument);

        //----- var Datos basic
        //  
        //$legalframework  = basePL::getReq($_REQUEST,"legalframework");
        
        /*
        if($idpartyenterprise!="" && $legalframework==""){
            $dbl=new baseBL();
            $com="SELECT legalframework FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $legalframework=$dbl->executeScalar($com);
        }        

        //validar correo 
        if($idpartyenterprise==""){
            $msj_error .= "El idpartyenterprise es invalido, verifique. ";                
        }else{
            // if ($urloper == "save" && $legalframework=="") {
            //      $error_msg_first_regist .= "La justificación no puede estar vacio. "; 
            // }
        } */
        
        //msj ALERTA
        if(($msj_error!="" || $error_msg_first_regist!="")
            && $urloper == "save"){
            utilities::alert($msj_error.$error_msg_first_regist);
        }  

        /*
        // GUARDAR 
        if ($urloper == "save" && ($msj_error=="" && $error_msg_first_regist=="")) {
            $dbl=new baseBL();
                   if($msj_error=="" && $error_msg_first_regist==""){
                       $com="SELECT id from core.securityplancomplements 
                           WHERE idparty='$idpartyenterprise'";
                       $res=$dbl->executeScalar($com);
                           // var_dump($com);                            

                       if($res==""){
                         $com="INSERT INTO core.securityplancomplements 
                         (idparty,attachments)
                         VALUES ('$idpartyenterprise','$attachments') RETURNING id";
                           $idsecurityplancomplements=$dbl->executeScalar($com);
                           // var_dump($com);                            
                       }else{
                           $com="UPDATE core.securityplancomplements 
                           SET attachments='$attachments' WHERE idparty='$idpartyenterprise' RETURNING id";
                     // var_dump($com);
                           $idsecurityplancomplements=$dbl->executeScalar($com);                            
                       }


                           // var_dump($com);var
                           if ($idsecurityplancomplements>0 && $idsecurityplancomplements!="") {
                           
                               $path1 = "";

                               // utilities::redirect($path);
                           }else{
                               utilities::alert("registro fallido");
                               $path1 = "anexoPL.php";

                           }
                       // }                                          
                   }else{
                         utilities::alert($msj_error.$error_msg_first_regist);
                   }                                  
               // }            
           // }
           if ($path1=="") {
               utilities::alert("Cambiados guardados correctamente");
               $path="../exchange/agreementPL.php";
               utilities::redirect($path);               
           }
           
       } */

        // Documentos
        // Guardar savedocument

        if ($savedocument=="savedocument") {
            $dbl=new baseBL();

            // Establezco extensiones permitidas
            $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                    "dot","xlsm","xlsb","xltx");   


            // No es permitida la Extension?
            //NO
            if(myUtilities::validFile("path",5000000, $arrayFileType)==false){
                $valid = false;
                // myUtilities::alert("el archivo tiene que ser pdf");
            // SI            
            } else {
                $idparty=$_SESSION["idpartyenterprise"];
                $pathname="document/".$idparty."-". basename($_FILES['path']['name']);

                // Es un documento existente?

                //Si
                if ($iddocument=="") {

                    $com="SELECT id from core.document where iddocumenttype='$iddocumenttype' 
                        and idparty='$idparty' and delete='N'";
                    $idexist=$dbl->executeScalar($com);

                    // var_dump($idexist);
                    if($idexist==""){

                        if (move_uploaded_file($_FILES["path"]["tmp_name"], $pathname)) {

                            $docpanel='DOCANEX01';
                            $com ='INSERT INTO core.document 
                            (code,iddocumenttype,iddocumentstatus,"path",idparty)
                            VALUES ('."'".$docpanel."'".','.$iddocumenttype.','.$iddocumentstatus.','."'".$pathname."'".','.$idparty.') RETURNING id';
                            $iddocument=$dbl->executeScalar($com);
                            //var_dump($com);
                            if ($iddocument!="") {

                                utilities::alert("Registro Nuevo Documento Exitoso");
                                $iddocument =
                                $iddocumentstatus =
                                $iddocumenttype = 
                                $path = "";
                                $savedocument = "";
                            }else{
                                utilities::alert("Registro de Nuevo Documento Fallido");
                            }
                        }else{
                            utilities::alert("Error al guardar el archivo");
                        }
                    }else{
                        $com='UPDATE core.document 
                        SET 
                        iddocumenttype='.$iddocumenttype.' ,
                        iddocumentstatus='.$iddocumentstatus.',
                        "path" = '."'".$pathname."'".'
                        WHERE id='.$iddocument.' RETURNING id';
                        // var_dump($com);
                        $iddocument=$dbl->executeScalar($com);
                        // var_dump($iddocument);
                        if ($iddocument>0 && $iddocument!="") {
                            $iddocument =
                            $iddocumentstatus =
                            $iddocumenttype =
                            $savedocument = "";
                            $pathname =
                            $path = "";
                        }else{
                            utilities::alert("Registro Fallido de Documento");
                        }                  
                    }                
                } else {
                    if (move_uploaded_file($_FILES["path"]["tmp_name"], $pathname)) {
                        $com='UPDATE core.document 
                        SET 
                        iddocumenttype='.$iddocumenttype.' ,
                        iddocumentstatus='.$iddocumentstatus.',
                        "path" = '."'".$pathname."'".'
                        WHERE id='.$iddocument.' RETURNING id';
                        //var_dump($com);
                        $iddocument=$dbl->executeScalar($com);
                        //var_dump("iddocument->".$iddocument);

                        if ($iddocument>0 && $iddocument!="") {
                            $iddocument =
                            $iddocumentstatus =
                            $iddocumenttype =
                            $savedocument = "";
                            $pathname =
                            $path = "";
                        }else{
                            utilities::alert("Registro Fallido de Documento");
                        }
                    }else{                
                        utilities::alert("Registro Fallido de Documento");
                    }
                }
            }
        }
        
        // Cargar documento registrado previamente
        if ($iddocument!="" && $savedocument!="savedocument") {
                $doctype='DOCANEX01';
                $com='SELECT 
                    iddocumenttype,
                    iddocumentstatus,
                    "path"
                    FROM core.document WHERE id='.$iddocument.' and code='."'".$doctype."'";
                    //var_dump($com);
                    $resul=$dbl->executeReader($com);
                    if ($resul[0] != "") { 
                        $iddocumenttype = $resul[0]["iddocumenttype"];
                        $iddocumentstatus = $resul[0]["iddocumentstatus"];
                        $path = $resul[0]["path"];
                    }     
        } else {
        # code...
        }

        // Guardar savedocument2
        if ($savedocument2=="savedocument2") {
            $dbl=new baseBL();
            $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                    "dot","xlsm","xlsb","xltx");   

            if(myUtilities::validFile("path2",5000000, $arrayFileType)==false){
                $valid = false;
                // myUtilities::alert("el archivo tiene que ser pdf");            
            } else {
                $idparty=$_SESSION["idpartyenterprise"];
                $pathname2="document/".$idparty."-". basename($_FILES['path2']['name']);

                if ($iddocument2=="") {

                    $com="SELECT id from core.document where iddocumenttype='$iddocumenttype2' 
                        and idparty='$idparty' and delete='N'";
                    $idexist=$dbl->executeScalar($com);

                    // var_dump($idexist);
                    if($idexist==""){

                        if (move_uploaded_file($_FILES["path2"]["tmp_name"], $pathname2)) {
                            $docpanel2='DOCANEX02';    
                            $com ='INSERT INTO core.document 
                            (code,iddocumenttype,iddocumentstatus, "path",idparty)
                            VALUES ('."'".$docpanel2."'".','.$iddocumenttype2.','.$iddocumentstatus2.','."'".$pathname2."'".','.$idparty.') RETURNING id';
                            $iddocument2=$dbl->executeScalar($com);
                            //var_dump($com);
                            if ($iddocument2!="") {

                                utilities::alert("Registro exitoso");
                                $iddocument2 =
                                $iddocumentstatus2 =
                                $iddocumenttype2 = 
                                $path2 = "";
                                $savedocument2 = "";
                            }else{
                                utilities::alert("Registro de documento fallido");
                            }
                        }else{
                            utilities::alert("Error al guardar el archivo");
                        }
                    }else{
                        $com='UPDATE core.document 
                        SET 
                        iddocumenttype='.$iddocumenttype2.' ,
                        iddocumentstatus='.$iddocumentstatus2.',
                        "path" = '."'".$pathname2."'".'
                        WHERE id='.$iddocument2.' RETURNING id';
                        // var_dump($com);
                        $iddocument2=$dbl->executeScalar($com);
                        // var_dump($iddocument);
                        if ($iddocument2>0 && $iddocument2!="") {
                            $iddocument2 =
                            $iddocumentstatus2 =
                            $iddocumenttype2 =
                            $savedocument2 = "";
                            $pathname2 =
                            $path2 = "";
                        }else{
                            utilities::alert("registro fallido core.document");
                        }                  
                    }

                
                } else {
                    if (move_uploaded_file($_FILES["path2"]["tmp_name"], $pathname2)) {
                        $com='UPDATE core.document 
                        SET 
                        iddocumenttype='.$iddocumenttype2.' ,
                        iddocumentstatus='.$iddocumentstatus2.',
                        "path" = '."'".$pathname2."'".'
                        WHERE id='.$iddocument2.' RETURNING id';
                        //var_dump($com);
                        $iddocument2=$dbl->executeScalar($com);
                        //var_dump("iddocument->".$iddocument);

                        if ($iddocument2>0 && $iddocument2!="") {
                            $iddocument2 =
                            $iddocumentstatus2 =
                            $iddocumenttype2 =
                            $savedocument2 = "";
                            $pathname2 =
                            $path2 = "";
                        }else{
                            utilities::alert("registro fallido core.document");
                        }
                    }else{                
                        utilities::alert("registro fallido core.document");
                    }
                }
            }
        }
        
        if ($iddocument2!="" && $savedocument2!="savedocument2") {
                $doctype='DOCANEX02';
                $com='SELECT 
                    iddocumenttype,
                    iddocumentstatus,
                    "path"
                    FROM core.document WHERE id='.$iddocument2.' and code='."'".$doctype."'";
                    // var_dump($com);
                    $resul2=$dbl->executeReader($com);
                    if ($resul2[0] != "") { 
                        $iddocumenttype2 = $resul2[0]["iddocumenttype"];
                        $iddocumentstatus2 = $resul2[0]["iddocumentstatus"];
                        $path2 = $resul2[0]["path"];
                    }     
        } else {
        # code...
        }

        // Guardar savedocument3

        if ($savedocument3=="savedocument3") {
            $dbl=new baseBL();

            // Establezco extensiones permitidas
            $arrayFileType = array ("pdf","docx","xlsx","pptx","doc","docm","dotx","dotm",
                                    "dot","xlsm","xlsb","xltx");   


            // No es permitida la Extension?
            //NO
            if(myUtilities::validFile("path3",5000000, $arrayFileType)==false){
                $valid = false;
                // myUtilities::alert("el archivo tiene que ser pdf");
            // SI            
            } else {
                $idparty=$_SESSION["idpartyenterprise"];
                $pathname3="document/".$idparty."-". basename($_FILES['path3']['name']);

                // Es un documento existente?

                //Si
                if ($iddocument3=="") {

                    $com="SELECT id from core.document where iddocumenttype='$iddocumenttype3' 
                        and idparty='$idparty' and delete='N'";
                    //var_dump($com);
                    $idexist=$dbl->executeScalar($com);

                    //var_dump($idexist);
                    if($idexist==""){
                        //var_dump($pathname3);
                        if (move_uploaded_file($_FILES['path3']['tmp_name'],$pathname3)) {
                            //var_dump($pathname3);
                            $docpanel='DOCANEX03';
                            $com ='INSERT INTO core.document 
                            (code,iddocumenttype,iddocumentstatus,"path",idparty)
                            VALUES ('."'".$docpanel."'".','.$iddocumenttype3.','.$iddocumentstatus3.','."'".$pathname3."'".','.$idparty.') RETURNING id';
                            $iddocument3=$dbl->executeScalar($com);
                            //var_dump($com);
                            if ($iddocument3!="") {

                                utilities::alert("Registro Nuevo Documento Exitoso");
                                $iddocument3 =
                                $iddocumentstatus3 =
                                $iddocumenttype3 = 
                                $path3 = "";
                                $savedocument3 = "";
                            }else{
                                utilities::alert("Registro de Nuevo Documento Fallido");
                            }
                        }else{
                            utilities::alert("Error al guardar el archivo");
                        }
                    }else{
                        $com='UPDATE core.document 
                        SET 
                        iddocumenttype='.$iddocumenttype3.' ,
                        iddocumentstatus='.$iddocumentstatus3.',
                        "path" = '."'".$pathname3."'".'
                        WHERE id='.$iddocument3.' RETURNING id';
                        //var_dump($com);
                        $iddocument3=$dbl->executeScalar($com);
                        // var_dump($iddocument);
                        if ($iddocument3>0 && $iddocument3!="") {
                            $iddocument3 =
                            $iddocumentstatus3 =
                            $iddocumenttype3 =
                            $savedocument3 = "";
                            $pathname3 =
                            $path3 = "";
                        }else{
                            utilities::alert("Registro Fallido de Documento");
                        }                  
                    }                
                } else {
                    if (move_uploaded_file($_FILES["path3"]["tmp_name"], $pathname3)) {
                        $com='UPDATE core.document 
                        SET 
                        iddocumenttype='.$iddocumenttype3.' ,
                        iddocumentstatus='.$iddocumentstatus3.',
                        "path" = '."'".$pathname3."'".'
                        WHERE id='.$iddocument3.' RETURNING id';
                        //var_dump($com);
                        $iddocument3=$dbl->executeScalar($com);
                        //var_dump("iddocument->".$iddocument);

                        if ($iddocument3>0 && $iddocument3!="") {
                            $iddocument3 =
                            $iddocumentstatus3 =
                            $iddocumenttype3 =
                            $savedocument3 = "";
                            $pathname3 =
                            $path3 = "";
                        }else{
                            utilities::alert("Registro Fallido de Documento");
                        }
                    }else{                
                        utilities::alert("Registro Fallido de Documento");
                    }
                }
            }
        }
        
        // Cargar documento registrado previamente
        if ($iddocument3!="" && $savedocument3!="savedocument3") {
                $doctype3='DOCANEX03';
                $com='SELECT 
                    iddocumenttype,
                    iddocumentstatus,
                    "path"
                    FROM core.document WHERE id='.$iddocument3.' and code='."'".$doctype3."'";
                    //var_dump($com);
                    $resul3=$dbl->executeReader($com);
                    if ($resul3[0] != "") { 
                        $iddocumenttype3 = $resul3[0]["iddocumenttype"];
                        $iddocumentstatus3 = $resul3[0]["iddocumentstatus"];
                        $path3 = $resul3[0]["path"];
                    }     
        } else {
        # code...
        }


        if ($urloper == "Acta" && ($msj_error=="" && $error_msg_first_regist=="")) {
            echo "<script>window.open('actaPL.php');</script>";
           }

       // PDF

       if ($urloper == "pdf" && ($msj_error=="" && $error_msg_first_regist=="")) {
           /*
           $dbl=new baseBL();
                  if($msj_error=="" && $error_msg_first_regist==""){
                      $com="SELECT id from core.securityplancomplements 
                          WHERE idparty='$idpartyenterprise'";
                      $res=$dbl->executeScalar($com);
                          // var_dump($com);                            

                      if($res==""){
                        $com="INSERT INTO core.securityplancomplements 
                        (idparty,attachments)
                        VALUES ('$idpartyenterprise','$attachments') RETURNING id";
                          $idsecurityplancomplements=$dbl->executeScalar($com);
                          // var_dump($com);                            
                      }else{
                          $com="UPDATE core.securityplancomplements 
                          SET attachments='$attachments' WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com);
                          $idsecurityplancomplements=$dbl->executeScalar($com);                            
                      }


                          // var_dump($com);var
                          if ($idsecurityplancomplements>0 && $idsecurityplancomplements!="") {
                          
                              $path1 = "";

                              // utilities::redirect($path);
                          }else{
                              utilities::alert("registro fallido");
                              $path1 = "anexoPL.php";

                          }
                      // }                                          
                  }else{
                        utilities::alert($msj_error.$error_msg_first_regist);
                  }                                  
              // }            
          // }
          if ($path1=="") {*/
               echo "<script>window.open('pdfPL.php');</script>";
              /*//$path="pdfPL.php";
              //utilities::redirect($path);               
          }*/
          
        }

        /*
        
        
        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("marcolegalPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.marcolegalPL",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


        if ($id != "") {
                $arPar_registro[] = $id;
        } 
        if ($idpartyaddress != "") {
                $arPar_person[] = $idpartyaddress;
        }
        if($urloper != "save" && $idpartyaddress == ""){
                $arPar_person[] = "";
        }      
        if ($idpartyemail != "") {
                $arPar_email[] = $idpartyemail;
        }
        if($urloper != "save" && $idpartyemail == ""){
                $arPar_email[] = "";
        }   
  
         


        if ($urloper == "save" && $idpartyaddress ==  "" && $idparty!="") {
                $operaddress = "insert";
        }
        if ($urloper == "save" && $idpartyaddress != "" && $idparty!="") {
                $operaddress = "update";
        }    
    
        if ($urloper == "save" && $idpartyemail ==  "" && $idparty!="") {
                $operemail = "insert";
        }
        if ($urloper == "save" && $idpartyemail != "" && $idparty!="") {
                $operemail = "update";
        } 
    
      
        
        if($urloper=="findid" || $urloper=="find"){
            $buildArray_person="buildArray_findid";
            $buildArray="buildArray_findid";        
        }else{
            $buildArray_person="buildArray_person";
            $buildArray="buildArray";        
        }
        
        
        // crear array person
        // $registrobl->$buildArray_person($arPar_registro); 
        $personbl->$buildArray_person($arPar_person); 

        // BL.person
        // if($oper=="update" || $oper=="insert" ){        
        //     $msg .=$registrobl->executeperson($oper,$arPar_registro);   
        //     $com="select id from core.cinker where idclink='$idparty'";
        //     $id=$dbl->executeScalar($com);              
        // }else{
        //     $registrobl->execute($oper,$arPar_registro);
        // }     

        if($oper=="update" || $oper=="insert" ){        
            $msg .=$personbl->executeperson($oper,$arPar_person);   
            $com="select id from core.consultant where idparty='$idparty'";
            $id=$dbl->executeScalar($com);   

            $com="SELECT core.isspinsacademic_records(NULL,NULL,'$idclinker', '$idinstituteacademic_records', '$idtitle', '$ufromacademic_records', '$untilacademic_records','$active', '$deleted')";
            $dbl->executeScalar($com);
            $com="SELECT core.isspinsexperience_record(NULL,NULL,'$idclinker', '$idcompany', '$idcharge', '$ufromexperience_record', '$untilexperience_record','$active', '$deleted')";
            $dbl->executeScalar($com);
            $com="SELECT core.isspinscertifies_records(NULL,NULL,'$idclinker', '$idinstitutecertifies_records', '$idcertifies', '$ufromcertifies_records', '$untilcertifies_records','$active', '$deleted')";
            $dbl->executeScalar($com);
        }else{
            $personbl->execute($oper,$arPar_person);
        }

        
        if(($msj_error=="" && $error_msg_first_regist=="" )&&( $msg!="" || $msg_BL_error!="")
                && $urloper == "save"){
            utilities::alert($msg.$msg_BL_error);
        }
        
        $oper = $oper2 = $urloper;   
         
        if ($oper == "find" || $oper == "findByName") {
            $id = $arPar_person[0];
            $code = $arPar_person[1];
            $name = $arPar_person[2];
            $idparty = $arPar_person[3];    
            $idcard = $arPar_person[4];	
            $curp = $arPar_person[5];

            $firstname = $arPar_person[6];
            $middlename = $arPar_person[7];
            $lastname = $arPar_person[8];
            $secondlastname = $arPar_person[9];
            $registernumber = $arPar_person[10];
            

            // $birthdate = $arPar_person[8];
            // $birthplace = $arPar_person[9];
            // $monthlyincome = $arPar_person[10];
            // $idcivilstate = $arPar_person[11];
            // $ideconomicalactivity = $arPar_person[12];
            // $idcountrynationality = $arPar_person[13];
            // $idoccupation = $arPar_person[14];
            // $idcountrybirth = $arPar_person[15];
            // $idgender  = $arPar_person[16];  
            $active = $arPar_person[11];
            $deleted = $arPar_person[12];

            
        }     
        if ($oper == "find" || $oper == "findByName") {

            $idcertifies = $arPar_address[4];
            $suburb = $arPar_address[5];
            $municipality  = $arPar_address[6];
            
            $postalcode  = $arPar_address[7];
            $idgradeacademic = $arPar_address[8];
            $idtitle = $arPar_address[9];
            $idcompany = $arPar_address[10];   
            $idcharge = $arPar_address[11];     
            $active_address = $arPar_address[12];  
        }
        if ($oper == "find" || $oper == "findByName") {

            //   $id = $arPar_phone[0];
            //   $code = $arPar_phone[1];
            //   $name = $arPar_phone[2];
            //   $idparty = $arPar_phone[3];
            $idinstituteacademic_records = $arPar_phone[4];
            $viewnumber = $arPar_phone[5];
            //   $observation = $arPar_phone[8];
            $active_phone = $arPar_phone[7];
            //   $deleted = $arPar_phone[10];

        

        }   
        if ($oper == "find" || $oper == "findByName") {
            //   $id = $arPar_email[0];
            //   $code = $arPar_email[1];
            //   $name = $arPar_email[2];
            //   $idparty = $arPar_email[3];
            $idinstitutecertifies_records = $arPar_email[4];
            $email = $arPar_email[5];
            //   $observation = $arPar_email[5];
            $active_email = $arPar_email[6];
            //   $deleted = $arPar_email[7];
        }       */

       
    ?>
            <!--
            <script>
                    
                // FECHA 
                $("#birthdate").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");
                // FECHA 
                $("#ufromacademic_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#ufromexperience_record").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#ufromcertifies_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");                 
                // FECHA 
                $("#untilacademic_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#untilexperience_record").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change"); 
                // FECHA 
                $("#untilcertifies_records").on("change", function() {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format( this.getAttribute("data-date-format") )
                    );
                }).trigger("change");                 


                
        </script>-->
        <!--Navegacion-->    
            <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
            </script>
        <!--Fin Navegacion-->


        </head>
        <body>    
            <FORM action="<?php //echo $action;?>" method="post" name="anexoPL" class="italsis" enctype="multipart/form-data">
            <!--Navegacion-->
            <drawer-menu>
            <div align="center">
            <img src="images/logo-prot-civil.png" class="img-fluid" alt="" style="
                max-width: 50%;
                height: auto;"></div>
                <br>
                <div style="overflow:scroll">
                <div style="padding-left: 10px;"><a href="../party/marcolegalPL.php">01.-MARCO LEGAL</a></div>
                <div style="padding-left: 10px;"><a href="../exchange/agreementPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['identerprise']; ?>">02.-PRESENTACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/justificacionPL.php">03.-JUSTIFICACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/objetivosPL.php">04.-OBJETIVOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/alcancePL.php">05.-ALCANCE</a></div>
                <!--<div style="padding-left: 10px;"><a href="../party/ubicaciondelpredioPL.php">06.-UBICACIÓN DEL PREDIO</a></div>-->
                <div style="padding-left: 10px;"><a href="../party/subprogramadeprevencionPL.php">07.-SUBPROGRAMA DE PREVENCIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmorganizacionPL.php">07.1.-ORGANIZACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmdocumentacionPL.php">07.2.-DOCUMENTACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/analisisderiesgosPL.php">07.3.-ANÁLISIS DE RIESGOS</a></div>
                <div style="padding-left: 30px;"><a href="../party/ubicaciondelpredioPL.php">07.3.1.-UBICACIÓN DEL PREDIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmdirectorioPL.php">07.4.-DIRECTORIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nminventarioPL.php">07.5.-INVENTARIO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmmantenimientoPL.php">07.6.-MANTENIMIENTO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmcapacitacionPL.php">07.9.-CAPACITACIÓN</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmprogramadedifusionyconcientizacionPL.php">07.10.-PROGRAMA DE DIFUSION Y CONCIENTIZACION</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmsimulacrosPL.php">07.11.-SIMULACROS</a></div>
                <!--<div style="padding-left: 10px;"><a href="../party/senalizacionPL.php">09.-SEÑALIZACIÓN</a></div>-->
                <!--<div style="padding-left: 10px;"><a href="../party/ejerciciosysimulacrosPL.php">10.-EJERCICIOS Y SIMULACROS</a></div>-->
                <div style="padding-left: 10px;"><a href="../party/subprogramadeauxilioPL.php">8.-SUBPROGRAMA DE AUXILIOS</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmalertamientoPL.php">08.1.-ALERTAMIENTO</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmplanesdeemergenciaPL.php">08.2.-PLANES DE EMERGENCIA</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmevaluaciondedanosPL.php">08.3.-EVALUACION DE DAÑOS</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">09.-SUB PROGRAMA DE RECUPERACION</a></div>
                <div style="padding-left: 20px;"><a href="../party/nmvueltaalanormalidadPL.php">09.1.-VUELTA A LA NORMALIDAD</a></div>

                <!--<div style="padding-left: 10px;"><a href="../party/procedimientodeemergenciaparaevacuacionPL.php">12.-PROCEDIMIENTO DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/tiposdeemergenciasPL.php">13.-TIPOS DE EMERGENCIA</a></div>
                <div style="padding-left: 10px;"><a href="../party/funcionesdelequipodecombatecontraincendiosPL.php">14.-FUNCIONAMIENTO EQUIPO COMBATE</a></div>
                <div style="padding-left: 10px;"><a href="../party/subprogramaderecuperacionPL.php">15.-SUBPROGRAMA DE RECUPERACIÓN</a></div>
                <div style="padding-left: 10px;"><a href="../party/vueltaalanormalidadPL.php">16.-VUELTA A LA NORMALIDAD</a></div>-->
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">folder_open</i></div>
                <div style="float:left;"><a href="../party/anexoPL.php">ANEXOS</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">account_box</i></div>
                <div style="float:left;"><a href="personPL.php?urloper=find&pn=0&id=<?php echo $_SESSION['amidconsultant']; ?>">PERFIL</a></div>
                <div style="clear:both;float:left;padding-left: 10px;"><i class="material-icons">exit_to_app</i></div>
                <div style="float:left;"><a href="../party/exit.php">SALIR</a></div>
                </div>
            </drawer-menu>
            <!--Fin Navegacion-->       


    		<!--<FORM action="<?php //echo $action;?>" method="post" name="marcolegalPL" class="italsis">-->

        <?php
            $dbl=new baseBL();  
            // presentationLayer::buildFormTitle("Registro",""); 
            presentationLayer::buildIdInputHidden($id,"document.anexoPL",$fLink);
            myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

            presentationLayer::buildFormTitle('  
                <div data-drawer-open><div style="float:left;"><i class="material-icons">menu</i></div>ANEXOS</div>
                ',"");     

            echo '<br>';

            // Panel Anexo I
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Anexo I</div>
            <div class="panel">
            ';

            //echo '<span style="color:black; font-size: x-large;">Anexos I</span>';

            echo '<br>';
            echo '<br>';

            echo '<span style="color:black; font-size:large;">Imágenes</span>';

            echo '<br>';
            echo '<br>';

            // Carga de Imagen
       
            echo '<br>';
            echo '<div style="">
            <span style="color:black; font-size: medium; ">Favor de seleccionar imagen, puede seleccionar hasta 10 imagenes:  </span>
            </div>';  
            echo '<br>';
            myPresentationLayer::inputFileImg("ANEXO-0","ANEXO-0","ANEXO-0-".$idpartyenterprise,
                "ANEXO","show-ANEXO-0-","fa fa-images custom-file-label-icon", "","",
                "img-previewiddocument img-fluid",
                "","","","","");

            $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  
                and name like '%ANEXO-0-%' and delete='N'";
            $imgs=$dbl->executeReader($com);  


            echo '<div class="col-12 col-lg-8" id="show-ANEXO-0-" 
                style="margin-top:1rem; display: flow-root;">';

            $i=0;
            if($imgs!=""){
                foreach($imgs as $b){            
                    $contentimg=$b["content"]; 
                    $idimgs=$b["id"]; 
                    echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                            <img src='images/x.webp' style='width: 2rem;
                            position: static;
                            cursor: pointer;'/>";                     
                    echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" 
                        src="data:image/png;base64,'.$contentimg.'" /> </div>';         
                    $i++;
                } 
            }else{
                echo' <img class="img-fluid img-previewiddocument sin-img-user" 
                    src="images/sin-imagen.jpg" alt="sin-img"> ';        
            }
            echo'</div>';
       
            // Fin Carga de Imagen

            echo '<br>';
            echo '<br>';

            echo '<span style="color:black; font-size:large;">Documentos</span>';

            echo '<br>';
            echo '<br>';

            
            // Seccion Documentos
            echo '<div align=left>Documentos</div>';
            echo '<br>';

            
            // Columna 1
            presentationLayer::buildInitColumn3();

            $com="SELECT * FROM base.entitysubclass where code='DOCSANEXO1VALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo","iddocumenttype","iddocumenttype",$dbl,
                $com, "id", "name", $iddocumenttype,"input","title","");
            
            echo '
            <button type="submit" id="savedocument" value="savedocument" class="button" name="savedocument">
            Guardar
            </button>
            ';
            presentationLayer::buildEndColumn();
            // Fin Columna 1
            
            // Columna 2

            presentationLayer::buildInitColumn3();

            // Para que solo el sadmin pueda cambiar
            if ($_SESSION['sadmin']=="active") {
                $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
            } else {
                $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                and name='No Verificado'";
            }
            // Fin modificacion sadmin
            
            // $vvv=$dbl->executeReader($com);

            myPresentationLayer::buildSelectWithComEventClass(
                "Status","iddocumentstatus","iddocumentstatus",$dbl,
                $com, "id", "name", $iddocumentstatus,"input","title",""); 
                
            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2
            
            // Columna 3
            presentationLayer::buildInitColumn3();


            myPresentationLayer::buildInputWithValidatorClass(
                "","path","path",$path,
                "title","title",
                "","",
                "","","","",
                "","","","","ejemplo.pdf","","file");
            
            myPresentationLayer::buildHidden("","","","");
                
            presentationLayer::buildEndColumn();
            // Fin Columna 3    

            //var_dump($iddocument);
            
            
            if ($iddocument==""){
                $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus, '<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                    from core.document pprs where delete='N' and pprs.idparty='$idpartyenterprise' and pprs.code='DOCANEX01'";  
                 //var_dump($comp);       
                //if($resul_exist!=""){
                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument");                          
                //}                                       
            }else{
                $comp="SELECT pprs.id, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                    (SELECT a.name FROM base.entitysubclass a 
                    where pprs.iddocumentstatus=a.id ) as iddocumentstatus, '<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                    from core.document pprs where  delete='N' and  pprs.idparty='$idpartyenterprise' and pprs.id!='$iddocument' and pprs.code='DOCANEX01'";         
                 //var_dump($comp);       

                $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument");                                          
            }

            // Fin Documentos
            

            /*
            myPresentationLayer::buildInitColumn3();  
                // echo '<div style="">

            // <span style="color:black; font-size: x-large; ">Identificación de Instalaciones Estratégicas</span>
            // </div>'; 
            myPresentationLayer::buildInputWithValidatorClass(
                "Tipo","enterprisesecurityplanriskanalysysemergencydirectory","enterprisesecurityplanriskanalysysemergencydirectory",$enterprisesecurityplanriskanalysysemergencydirectory,
                "input","title",
                "onkeypress","",
                "","","","",
                "","","","","","",""); 

            //echo '<img class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$logosecurityplanriskanalysysemergencydirectory.'" />';         
            presentationLayer::buildEndColumn();
            myPresentationLayer::buildInitColumn3();  
            // echo '<div style="">

            // <span style="color:black; font-size: x-large; ">Amenaza:</span>
            // </div>'; 
            myPresentationLayer::buildInputWithValidatorClass(
                                "Status","phonesecurityplanriskanalysysemergencydirectory","phonesecurityplanriskanalysysemergencydirectory",$phonesecurityplanriskanalysysemergencydirectory,
                                "input","title",
                                "onkeypress","",
                                "","","","",
                                "","","","","","","");    
                                        
            presentationLayer::buildEndColumn();
            myPresentationLayer::buildInitColumn3(); 
            myPresentationLayer::buildInputWithValidatorClass(
                "","path","path",$path,
                "title","title",
                "","",
                "","","","",
                "","","","","ejemplo.pdf","","file");
            presentationLayer::buildEndColumn();



            // $comm="";  
            // $resul_exist=$dbl->executeReader($comm);

            if($idsecurityplanriskanalysysemergencydirectory==""){
                $comp= "SELECT a.id, a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise'";         
                // var_dump($comp);
                // if($resul_exist!=""){
                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemergencydirectory");                         
                // } 
            }else{
                $comp= "SELECT a.id, a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise' and a.id!='$idsecurityplanriskanalysysemergencydirectory'";   
                // var_dump($comp);

                $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                $registrobl->fillGridDisplayPaginator($comp,$arrCol,$id,"idsecurityplanriskanalysysemergencydirectory");                      
            }
            
            echo '
            <button type="submit" id="agregar7" value="savesecurityplanriskanalysysemergencydirectory" class="button" name="savesecurityplanriskanalysysemergencydirectory">
            Guardar
            </button>
            ';   

            */

            echo'</div>';
            // Fin Panel Anexo I

            
            // Anexo II
            echo '<br>';
            echo '<br>';
            echo '<br>';
        
            // Panel Anexo II
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Anexo II</div>
            <div class="panel">
            ';


            //echo '<span style="color:black; font-size: x-large;">Anexos II</span>';

            echo '<br>';
            echo '<br>';

            
            echo '<span style="color:black; font-size:large;">Documentos</span>';

            echo '<br>';
            echo '<br>';
               
           
       
            // Seccion Documentos
            echo '<div align=left>Documentos</div>';
            echo '<br>';

            
            // Columna 1
            presentationLayer::buildInitColumn3();

            $com="SELECT * FROM base.entitysubclass where code='DOCSANEXO2VALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo","iddocumenttype2","iddocumenttype2",$dbl,
                $com, "id", "name", $iddocumenttype2,"input","title","");
            
            echo '
            <button type="submit" id="savedocument2" value="savedocument2" class="button" name="savedocument2">
            Guardar
            </button>
            ';
            presentationLayer::buildEndColumn();
            // Fin Columna 1
            
            // Columna 2

            presentationLayer::buildInitColumn3();


            //$com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
            // $vvv=$dbl->executeReader($com);

            // Para que solo el sadmin pueda cambiar
            if ($_SESSION['sadmin']=="active") {
                $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
            } else {
                $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                and name='No Verificado'";
            }
            // Fin modificacion sadmin

            myPresentationLayer::buildSelectWithComEventClass(
                "Status","iddocumentstatus2","iddocumentstatus2",$dbl,
                $com, "id", "name", $iddocumentstatus2,"input","title",""); 
                
            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2
            
            // Columna 3
            presentationLayer::buildInitColumn3();


            myPresentationLayer::buildInputWithValidatorClass(
                "","path2","path2",$path2,
                "title","title",
                "","",
                "","","","",
                "","","","","ejemplo.pdf","","file");
            
            myPresentationLayer::buildHidden("","","","");
                
            presentationLayer::buildEndColumn();
            // Fin Columna 3    

            
            if ($iddocument==""){
                $comp="SELECT pprs.id, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                from core.document pprs where delete='N' and pprs.idparty='$idpartyenterprise' and pprs.code='DOCANEX02'";  
                // var_dump($comp);       
                //if($resul_exist!=""){
                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument2");                          
                //}                                       
            }else{
                $comp="SELECT pprs.id, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumentstatus=a.id ) as iddocumentstatus, '<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                from core.document pprs where  delete='N' and  pprs.idparty='$idpartyenterprise' and pprs.id!='$iddocument' and pprs.code='DOCANEX02'";         
                // var_dump($comp);       

                $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument2");                                          
            }

            // Fin Documentos

            echo'</div>';
            // Fin Panel Anexo II

            // Anexo III
            echo '<br>';
            echo '<br>';
            echo '<br>';
        
            // Panel Anexo III
            ////////////////////////////////////////
            echo '    
            <div class="accordion">Anexo III</div>
            <div class="panel">
            ';


           //echo '<span style="color:black; font-size: x-large;">Anexos III</span>';

           echo '<br>';
           echo '<br>';

        
           echo '<span style="color:black; font-size:large;">Documentos</span>';

           echo '<br>';
           echo '<br>';
               
            // Seccion Documentos
            echo '<div align=left>Documentos</div>';
            echo '<br>';

            
            // Columna 1
            presentationLayer::buildInitColumn3();

            $com="SELECT * FROM base.entitysubclass where code='DOCSANEXO3VALUES'";

            myPresentationLayer::buildSelectWithComEventClass(
                "Tipo","iddocumenttype3","iddocumenttype3",$dbl,
                $com, "id", "name", $iddocumenttype3,"input","title","");
            
            echo '
            <button type="submit" id="savedocument3" value="savedocument3" class="button" name="savedocument3">
            Guardar
            </button>
            ';
            presentationLayer::buildEndColumn();
            // Fin Columna 1
            
            // Columna 2

            presentationLayer::buildInitColumn3();


            //$com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
            // $vvv=$dbl->executeReader($com);

            // Para que solo el sadmin pueda cambiar
            if ($_SESSION['sadmin']=="active") {
                $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'";
            } else {
                $com="SELECT * FROM base.entitysubclass where code='STATUSTYPEVALUES'
                and name='No Verificado'";
            }
            // Fin modificacion sadmin

            myPresentationLayer::buildSelectWithComEventClass(
                "Status","iddocumentstatus3","iddocumentstatus3",$dbl,
                $com, "id", "name", $iddocumentstatus3,"input","title",""); 
                
            myPresentationLayer::buildHidden("","","","");

            presentationLayer::buildEndColumn();
            // Fin Columna 2
            
            // Columna 3
            presentationLayer::buildInitColumn3();


            myPresentationLayer::buildInputWithValidatorClass(
                "","path3","path3",$path3,
                "title","title",
                "","",
                "","","","",
                "","","","","ejemplo.pdf","","file");
            
            myPresentationLayer::buildHidden("","","","");
                
            presentationLayer::buildEndColumn();
            // Fin Columna 3    

            
            if ($iddocument3==""){
                $comp="SELECT pprs.id, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumentstatus=a.id ) as iddocumentstatus,'<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>'
                from core.document pprs where delete='N' and pprs.idparty='$idpartyenterprise' and pprs.code='DOCANEX03'";  
                // var_dump($comp);       
                //if($resul_exist!=""){
                    $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                    $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument3");                          
                //}                                       
            }else{
                $comp="SELECT pprs.id, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumenttype=a.id ) as iddocumenttype, 
                (SELECT a.name FROM base.entitysubclass a 
                where pprs.iddocumentstatus=a.id ) as iddocumentstatus, '<a href=\"../exchange/'||pprs.path||'\" target=\"_blank\">'||pprs.path||'</a>' 
                from core.document pprs where  delete='N' and  pprs.idparty='$idpartyenterprise' and pprs.id!='$iddocument3' and pprs.code='DOCANEX03'";         
                // var_dump($comp);       

                $arrCol = array("Identificador","Tipo de documento","Status","Ruta","Opción");
                $phonebl->fillGridDisplayPaginatorOpt($comp,$arrCol,$id,"iddocument3");                                          
            }

            // Fin Documentos  

            echo'</div>';
            // Fin Panel Anexo III

            
            echo '<br>';
            myPresentationLayer::buildButtonOrImage(
                "Cancelar","urloper","bAccess","save","","btninicio","maxh-40",
                "Guardar","urloper","bAccess","save","","btninicio","maxh-40",
                "Generar PDF","urloper","bAccess","pdf","","btninicio pdf","maxh-40",
                "Generar Acta de observaciones","urloper","bAccess","Acta","","btninicio Acta","maxh-40"
            );
        ?>  
    	  
        </form>
            <!--Script Accordeon-->
            <script>
                var acc = document.getElementsByClassName("accordion");
                var arrayJS =<?php echo json_encode($arrayPHP);?>; 
                var arrayJSmsgERROR =<?php echo json_encode($arrayPHPmsgERROR);?>; 
                var registerdate = "<?php echo $registerdate; ?>" ;
                var x;

                for (x in arrayJSmsgERROR) {   
                    acc[arrayJSmsgERROR[x]].classList.toggle("active");              
                    var panel = acc[arrayJSmsgERROR[x]].nextElementSibling; 
                    //panel.style.maxHeight = (panel.scrollHeight*2) + "px";
                    panel.style.maxHeight = "fit-content";
                }
                //alert(acc.length);  9          
                //alert(arrayJS.length); 3

                // Mostramos los valores en caso de busqueda
                for(var i=0;i<arrayJS.length;i++){

                // alert(acc[i].classList);

                // alert(arrayJS[i]);
                // alert(i);


                    if(arrayJS[i]!=""){
                        // alert(arrayJS[i]);
                        // alert(acc[i].classList);
                        acc[i].classList.toggle("active");   

                        var panel = acc[i].nextElementSibling;

                        if (panel.style.maxHeight){
                            panel.style.maxHeight = null;
                        }else{
                            //panel.style.maxHeight = ((panel.scrollHeight*2)+20) + "px";
                            panel.style.maxHeight = "fit-content";     
                        }   
                    }       
                

                    for (i = 0; i < acc.length; i++) {
                    //  Cuando el usuario hace clic en cualquier parte del documento
                        acc[i].addEventListener("click", function() {

                            //   La propiedad classList devuelve el nombre de la clase de un elemento,
                            //   como un objeto DOMTokenList. 
                            //   toggle Alternar entre agregar y eliminar un nombre de clase de un elemento con JavaScript
                            this.classList.toggle("active");   

                            //   nextElementSibling; Obtenga el contenido HTML del siguiente hermano 
                            //   de un elemento de la lista:        
                            var panel = this.nextElementSibling;    
                            //   maxHeight Establecer la altura máxima de un elemento <div>:        
                            if (panel.style.maxHeight){           
                                panel.style.maxHeight = null;         
                            // document.getElementById().checked= false;         
                            }else{
                            //   La propiedad scrollHeight devuelve la altura completa de un elemento en píxeles,
                            //   incluido el relleno, pero no el borde, la barra de desplazamiento o el margen.            
                                panel.style.maxHeight = panel.scrollHeight + "px";      
                            } 
                        });
                    }
                }
            </script>
            <!--Fin Script Accordion-->

            <!--Eliminacion de Imagen-->
            <script>
            $(function(){
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".eliminarimg",function(){
                // var parent = $(this).parents().get(1);
                var idimg    = $(this).attr("name");
                // var iddoc=$(this).val();
                // alert(iddoc);
                $.post("../exchange/ajaxDatepartyexchangeBL.php", { idimg: idimg }, function(data) {
                    // alert(data);
                    // $("#idstate").html(data);                               
                });                           
                $("#img-"+idimg).remove();
                $(this).remove();
            });
            }); 
            </script>
            <!--Fin Eliminacion de Imagen-->

    </body>
</html>
