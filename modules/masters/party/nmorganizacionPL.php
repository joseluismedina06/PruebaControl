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
        include_once("includes/mycss.css");                            
        chdir(dirname(__FILE__));
        include_once("includes/styles.css");     
        basePL::buildjs();
        basePL::buildccs();
     
        myUtilities::buildmyccs(0);   
        myUtilities::buildmyjs(0);
        
    ?>	    		
    <html>
        <head>
            <script type="text/javascript" src="datepickercontrol.js"></script> 
            <link type="text/css" rel="stylesheet" href="datepickercontrol.css"></link>        
            <title>Organización</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
            <SCRIPT language="javascript" src="../../../js/globals.js" type="text/javascript"></SCRIPT>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- <link rel="stylesheet" href="css/styles.css">  -->
            <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <?php
        // base
        $bl=new baseBL();

        // default
        $active = "Y";
        $deleted = "N";
        $id = $code = $name = $observation

        /*
        = $idclink
        = $idclinker
                    
        //----- var Datos basic  
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
        = $untilcertifies_records */
        = "";
            
        //------var links
        $sLink = $dLink = $pLink = $cLink = $flink = $fbnlink = "";
            
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
        $observation = basePL::getReq($_REQUEST,"observation");
        //$active = basePL::getReqCheck($_REQUEST,"active");
        //$deleted = basePL::getReqCheck($_REQUEST,"deleted");    

        //----- Datos basicos   
        $idpartyenterprise=$_SESSION["idpartyenterprise"];
            
        //----- var Datos basic
        $info = basePL::getReq($_REQUEST,"info");
        $uipcheadlinename = basePL::getReq($_REQUEST,"uipcheadlinename");
        $uipccoordinatorname = basePL::getReq($_REQUEST,"uipccoordinatorname");
        $uipcchiefname = basePL::getReq($_REQUEST,"uipcchiefname");
        $uipcfirstaidbrigadechiefname = basePL::getReq($_REQUEST,"uipcfirstaidbrigadechiefname");
        $uipcantifirebrigadename = basePL::getReq($_REQUEST,"uipcantifirebrigadename");
        $uipcevacuationbrigadename = basePL::getReq($_REQUEST,"uipcevacuationbrigadename");
        $uipcsearchbrigadename = basePL::getReq($_REQUEST,"uipcsearchbrigadename");

        $infobrigade = basePL::getReq($_REQUEST,"infobrigade");
        $infoorganizationchart = basePL::getReq($_REQUEST,"infoorganizationchart");
        $infobrigadeorganization = basePL::getReq($_REQUEST,"infobrigadeorganization");
        $moretenemployments = basePL::getReq($_REQUEST,"moretenemployments");
        // $save = basePL::getReq($_REQUEST,"save");

        $uipcheadlinenamebrigade = basePL::getReq($_REQUEST,"uipcheadlinenamebrigade");
        $uipccoordinatornamebrigade = basePL::getReq($_REQUEST,"uipccoordinatornamebrigade");
        $uipcchiefnamebrigade = basePL::getReq($_REQUEST,"uipcchiefnamebrigade");
        $uipcfirstaidbrigadechiefnamebrigade = basePL::getReq($_REQUEST,"uipcfirstaidbrigadechiefnamebrigade");
        $uipcantifirebrigadenamebrigade = basePL::getReq($_REQUEST,"uipcantifirebrigadenamebrigade");
        $uipcevacuationbrigadenamebrigade = basePL::getReq($_REQUEST,"uipcevacuationbrigadenamebrigade");
        $uipcsearchbrigadenamebrigade = basePL::getReq($_REQUEST,"uipcsearchbrigadenamebrigade");

        $uipcheadlinelocation = basePL::getReq($_REQUEST,"uipcheadlinelocation");
        $uipccoordinatorlocation = basePL::getReq($_REQUEST,"uipccoordinatorlocation");
        $uipcchieflocation = basePL::getReq($_REQUEST,"uipcchieflocation");
        $uipcfirstaidbrigadechieflocation = basePL::getReq($_REQUEST,"uipcfirstaidbrigadechieflocation");
        $uipcantifirebrigadelocation = basePL::getReq($_REQUEST,"uipcantifirebrigadelocation");
        $uipcevacuationbrigadelocation = basePL::getReq($_REQUEST,"uipcevacuationbrigadelocation");
        $uipcsearchbrigadelocation = basePL::getReq($_REQUEST,"uipcsearchbrigadelocation");
        $brigadeindetification = basePL::getReq($_REQUEST,"brigadeindetification");

        if($idpartyenterprise!="" && $urloper!="save"){
            $dbl=new baseBL();
            $com="SELECT 
                info,
                uipcheadlinename,
                uipccoordinatorname,
                uipcchiefname,
                uipcfirstaidbrigadechiefname,
                uipcantifirebrigadename,
                uipcevacuationbrigadename,
                uipcsearchbrigadename,
                infobrigade,
                infoorganizationchart,
                infobrigadeorganization,
                moretenemployments
            FROM core.securityplansubprogram WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $info = $resul[0]["info"];
                $uipcheadlinename = $resul[0]["uipcheadlinename"];
                $uipccoordinatorname = $resul[0]["uipccoordinatorname"];
                $uipcchiefname = $resul[0]["uipcchiefname"];
                $uipcfirstaidbrigadechiefname = $resul[0]["uipcfirstaidbrigadechiefname"];
                $uipcantifirebrigadename = $resul[0]["uipcantifirebrigadename"];
                $uipcevacuationbrigadename = $resul[0]["uipcevacuationbrigadename"];
                $uipcsearchbrigadename = $resul[0]["uipcsearchbrigadename"];
                $infobrigade = $resul[0]["infobrigade"];
                $infoorganizationchart = $resul[0]["infoorganizationchart"];
                $infobrigadeorganization = $resul[0]["infobrigadeorganization"];
                $moretenemployments = $resul[0]["moretenemployments"];
            }   

            $com="SELECT 
                uipcheadlinename ,
                uipcheadlinelocation ,
                uipccoordinatorname ,
                uipccoordinatorlocation ,
                uipcchiefname ,
                uipcchieflocation ,
                uipcfirstaidbrigadechiefname ,
                uipcfirstaidbrigadechieflocation ,
                uipcantifirebrigadename ,
                uipcantifirebrigadelocation ,
                uipcevacuationbrigadename ,
                uipcevacuationbrigadelocation ,
                uipcsearchbrigadename ,
                uipcsearchbrigadelocation ,
                brigadeindetification
            FROM core.securityplansubprogrambrigadedirectory WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
            if ($resul[0] != "") { 
                $uipcheadlinenamebrigade = $resul[0]["uipcheadlinename"];
                $uipcheadlinelocation = $resul[0]["uipcheadlinelocation"];
                $uipccoordinatornamebrigade = $resul[0]["uipccoordinatorname"];
                $uipccoordinatorlocation = $resul[0]["uipccoordinatorlocation"];
                $uipcchiefnamebrigade = $resul[0]["uipcchiefname"];
                $uipcchieflocation = $resul[0]["uipcchieflocation"];
                $uipcfirstaidbrigadechiefnamebrigade = $resul[0]["uipcfirstaidbrigadechiefname"];

                $uipcfirstaidbrigadechieflocation = $resul[0]["uipcfirstaidbrigadechieflocation"];
                $uipcantifirebrigadenamebrigade = $resul[0]["uipcantifirebrigadename"];
                $uipcantifirebrigadelocation = $resul[0]["uipcantifirebrigadelocation"];
                $uipcevacuationbrigadenamebrigade = $resul[0]["uipcevacuationbrigadename"];
                $uipcevacuationbrigadelocation = $resul[0]["uipcevacuationbrigadelocation"];
                $uipcsearchbrigadenamebrigade = $resul[0]["uipcsearchbrigadename"];
                $uipcsearchbrigadelocation = $resul[0]["uipcsearchbrigadelocation"];

                $brigadeindetification = $resul[0]["brigadeindetification"];
            }  

        }  

        //validar correo 
        if($idpartyenterprise==""){
            //$msj_error .= "El idpartyenterprise es invalido, verifique. "; 
            $msj_error .= "Hay un problema con la empresa, por favor verifique. ";                
        }else{
            // if ($urloper == "save" && $sitelocation=="") {
            //      $error_msg_first_regist .= "El campo Alcance no puede estar vacio. "; 
            // }
        }
        
        //msj ALERTA
        if(($msj_error!="" || $error_msg_first_regist!="")
            && $urloper == "save"){
            utilities::alert($msj_error.$error_msg_first_regist);
        }  

        // GUARDAR 
        if ($urloper == "save" && ($msj_error=="" && $error_msg_first_regist=="")) {
             $dbl=new baseBL();
            //consultar si existe la ci          
            // $com_party_exists="select id from core.clinker where email='$email'";
            // $resul_party_exists=$dbl->executeScalar($com_party_exists);

            // //si existe buscar id de person
            // if($resul_party_exists!=""){

            //     utilities::alert("correo ya registrado");
            // //sino existe se debe validar datos y registrar en party 
            // }else{
            if($msj_error=="" && $error_msg_first_regist==""){
                $com="SELECT id FROM core.securityplansubprogram WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogram=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogram=="") {
                    $com="INSERT INTO core.securityplansubprogram 
                        (idparty,
                            info,
                            uipcheadlinename,
                            uipccoordinatorname,
                            uipcchiefname,
                            uipcfirstaidbrigadechiefname,
                            uipcantifirebrigadename,
                            uipcevacuationbrigadename,
                            uipcsearchbrigadename,
                            infobrigade,
                            infoorganizationchart,
                            infobrigadeorganization,
                            moretenemployments)
                        VALUES ('$idpartyenterprise',
                            '$info',
                            '$uipcheadlinename',
                            '$uipccoordinatorname',
                            '$uipcchiefname',
                            '$uipcfirstaidbrigadechiefname',
                            '$uipcantifirebrigadename',
                            '$uipcevacuationbrigadename',
                            '$uipcsearchbrigadename',
                            '$infobrigade',
                            '$infoorganizationchart',
                            '$infobrigadeorganization',
                            '$moretenemployments') RETURNING id";
                    // var_dump($com);
                    
                    $idsecurityplansubprogram=$dbl->executeScalar($com);
                    /*
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        $path = "nmdocumentacionPL.php";
                        utilities::redirect($path);
                    }else{
                        utilities::alert("Registro Fallido");

                    }
                    */
                }else{
                    $com="UPDATE core.securityplansubprogram 
                    SET 
                        info='$info',
                        uipcheadlinename= '$uipcheadlinename',
                        uipccoordinatorname= '$uipccoordinatorname', 
                        uipcchiefname='$uipcchiefname',
                        uipcfirstaidbrigadechiefname='$uipcfirstaidbrigadechiefname', 
                        uipcantifirebrigadename='$uipcantifirebrigadename',
                        uipcevacuationbrigadename='$uipcevacuationbrigadename',
                        uipcsearchbrigadename='$uipcsearchbrigadename',
                        infobrigade='$infobrigade',
                        infoorganizationchart='$infoorganizationchart',
                        infobrigadeorganization='$infobrigadeorganization', 
                        moretenemployments='$moretenemployments' 
                    WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com);

                    
                    $idsecurityplansubprogram=$dbl->executeScalar($com);
                    /*
                    if ($idsecurityplansubprogram>0 && $idsecurityplansubprogram!="") {
                        // utilities::alert("correo ya registrado");
                        // $path = "analisisderiesgosPL.php";
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("Registro Fallido");
                        $path0 = "program1ok";
                    }
                    */
                }      
                // -----------------------------------

                $com="SELECT id FROM core.securityplansubprogrambrigadedirectory WHERE idparty='$idpartyenterprise'";
                $idsecurityplansubprogrambrigadedirectory=$dbl->executeScalar($com);
                // $oper = "insert";  
                if ($idsecurityplansubprogrambrigadedirectory=="") {
                    $com="INSERT INTO core.securityplansubprogrambrigadedirectory 
                        (idparty,
                        uipcheadlinename ,
                        uipcheadlinelocation ,
                        uipccoordinatorname ,
                        uipccoordinatorlocation ,
                        uipcchiefname ,
                        uipcchieflocation ,
                        uipcfirstaidbrigadechiefname ,
                        uipcfirstaidbrigadechieflocation ,
                        uipcantifirebrigadename ,
                        uipcantifirebrigadelocation ,
                        uipcevacuationbrigadename ,
                        uipcevacuationbrigadelocation ,
                        uipcsearchbrigadename ,
                        uipcsearchbrigadelocation ,
                        brigadeindetification)
                    VALUES ('$idpartyenterprise',
                        '$uipcheadlinenamebrigade ',
                        '$uipcheadlinelocation ',
                        '$uipccoordinatornamebrigade ',
                        '$uipccoordinatorlocation ',
                        '$uipcchiefnamebrigade ',
                        '$uipcchieflocation ',
                        '$uipcfirstaidbrigadechiefnamebrigade ',
                        '$uipcfirstaidbrigadechieflocation ',
                        '$uipcantifirebrigadenamebrigade ',
                        '$uipcantifirebrigadelocation ',
                        '$uipcevacuationbrigadenamebrigade ',
                        '$uipcevacuationbrigadelocation ',
                        '$uipcsearchbrigadenamebrigade ',
                        '$uipcsearchbrigadelocation ',
                        '$brigadeindetification') RETURNING id";
                    //var_dump($com);
                    
                    $idsecurityplansubprogrambrigadedirectory=$dbl->executeScalar($com);
                    /*
                    if ($idsecurityplansubprogrambrigadedirectory>0 && $idsecurityplansubprogrambrigadedirectory!="") {
                        $path = "nmdocumentacionPL.php";
                        utilities::redirect($path);
                    }else{
                        utilities::alert("Registro Fallido");
                    }
                    */
                }else{
                    $com="UPDATE core.securityplansubprogrambrigadedirectory 
                    SET 
                        uipcheadlinename='$uipcheadlinenamebrigade',
                        uipcheadlinelocation='$uipcheadlinelocation',
                        uipccoordinatorname='$uipccoordinatornamebrigade',
                        uipccoordinatorlocation='$uipccoordinatorlocation',
                        uipcchiefname='$uipcchiefnamebrigade',
                        uipcchieflocation='$uipcchieflocation',
                        uipcfirstaidbrigadechiefname='$uipcfirstaidbrigadechiefnamebrigade',
                        uipcfirstaidbrigadechieflocation='$uipcfirstaidbrigadechieflocation',
                        uipcantifirebrigadename='$uipcantifirebrigadenamebrigade',
                        uipcantifirebrigadelocation='$uipcantifirebrigadelocation',
                        uipcevacuationbrigadename='$uipcevacuationbrigadenamebrigade',
                        uipcevacuationbrigadelocation='$uipcevacuationbrigadelocation',
                        uipcsearchbrigadename='$uipcsearchbrigadenamebrigade',
                        uipcsearchbrigadelocation='$uipcsearchbrigadelocation',
                        brigadeindetification='$brigadeindetification'

                    WHERE idparty='$idpartyenterprise' RETURNING id";
                    // var_dump($com);
                    
                    $idsecurityplansubprogrambrigadedirectory=$dbl->executeScalar($com);
                    /*
                    if ($idsecurityplansubprogrambrigadedirectory>0 && $idsecurityplansubprogrambrigadedirectory!="") {
                        // utilities::alert("correo ya registrado");
                        // $path = "analisisderiesgosPL.php";
                        // utilities::redirect($path);
                    }else{
                        utilities::alert("registro fallido");
                        $path1 = "program1ok";
                    }
                    */

                    if($idsecurityplansubprogram>0 && $idsecurityplansubprogrambrigadedirectory>0) {
                        myUtilities::redirect('nmdocumentacionPL.php');
                    } else {
                        myUtilities::alert("Registro Fallido");
                    }

                } 
            }else{
                utilities::alert($msj_error.$error_msg_first_regist);
            }                                  
            // }            
            // }
        }
        
 
        /*
        if ($path0=="" && $path1==""  && $urloper == "save" ) {
            $path0=
            $path1="";
            $path = "nmdocumentacionPL.php";
            // $path = "senalizacionPL.php";

            utilities::redirect($path);
        }  


        //----OBJETOS
        $registrobl = new registroBL($code, $name=$fullname, $idclink,$username,$email, $password, 
            $date_create,$active, $deleted);

        $personbl = new personBL($code, $name=$fullname, $idclinker,$firstname, $middlename, $lastname,$secondlastname,
            $birthdate,$description=NULL, $idgradeacademic,$idinfostatus=1,  $active, $deleted);
              
  
        $registrobl->buildLinks("nmorganizacionPL.php",$pn,$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink,$action);    
        $bpl = new basePL("document.nmorganizacionPL.php",$sLink,$dLink,$pLink,$cLink,$fLink,$fbnLink);


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

        // crear arrays
      
        // $addressbl->$buildArray($arPar_address);
        // $phonebl->$buildArray($arPar_phone);    
        // $emailbl->$buildArray($arPar_email);   

        // $socialmediabl->$buildArray($arPar_socialmedia);
        // $bankinfobl->$buildArray($arPar_bankinfo);
        // $compliancebl->$buildArray($arPar_compliance);

                
        // if($email!= ""   && ($urloper!="find") && $idparty!=""){
        //     $msg_BL_error .=$emailbl->validatemsg($email);
        //     if ($emailbl->validate($email)==true ){ 
        //         //buscar que el correo no este previamente asociado
        //         $com="select id from core.email where content='$email' ";            
        //         $resulvalidate=$dbl->executeReader($com); 
                
        //         if($resulvalidate!="" && $idpartyemail==""){
        //             $msg_BL_error .=("Este correo:$email, ya se encuentra registrado. ");
        //         }else{
        //             //   if($idparty!=""){
        //                 if($oper=="update" || $oper=="insert" ){
        //                     $msg .=$emailbl->executeemail($operemail,$arPar_email); 

        //                 }else{
        //                     $emailbl->execute($operemail,$arPar_email); 
        //                 }                      
        //             //   }

        //         //-----------var correos
        //             $email  =   ""; 
        //             $idinstitutecertifies_records  =   "";    
        //             $idpartyemail = "";
        //             $active_email = "Y";
        //         }                                   
        //     }else{
        //         $arrayPHPmsgERROR[]=3;
        //     }  
        // }             
        //msj de error de las validaciones del bl
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
            $active = $arPar_person[11];
            $deleted = $arPar_person[12];            
        }    
        
        */
    ?>
        <script>
            // alert("ok");
            // nowcertifiesdate
            // function nowcertifiesdate (e,key, id) {
            //     alert("ok");
            // }
            // 
            // $('#nowcertifiesdate').prop('checked', true);
            // $("#nowcertifiesdate").on("click", function() {
            //     var checked = $(this).prop('checked');
            //     if (checked==true) {
            //         alert("ok");
            //     }
            //         alert("ok");

            //     // this.setAttribute(
            //     //     "data-date",
            //     //     moment(this.value, "YYYY-MM-DD")
            //     //     .format( this.getAttribute("data-date-format") )
            //     // );
            // }).trigger("change");

            /*
            // FECHA 
            $("#birthdate").on("change", function() {
                alert("ok");
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
            */

            // Funcion para la eliminacion de imagenes
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
            // Fin de la Funcion de eliminacion de imagenes

        </script>

            <!--Navegacion-->    
            <link rel="stylesheet" href="css/tinyDrawer.min.css">
            <script src="js/tinyDrawer.min.js"></script>
            <script>
                tinyDrawer();
            </script>
            <!--Fin Navegacion-->    

        </head>
        <body>    
            <FORM action="<?php echo $action;?>" method="post" name="nmorganizacionPL.php" class="italsis" style="">
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
    <?php
        $dbl=new baseBL();  
        // presentationLayer::buildFormTitle("Registro",""); 
        presentationLayer::buildIdInputHidden($id,"document.subprogramadeprevencionPL.php",$fLink);
        myPresentationLayer::buildInputHidden("idparty","idparty","idparty",$idparty);

        presentationLayer::buildFormTitle('  
            <div data-drawer-open><div style="float:left;">
            <i class="material-icons">menu</i></div>ORGANIZACION</div>
           ',"");  

        echo '<div style="text-align: center;">

        <!--<span style="color:black; font-size: x-large; ">SUBPROGRAMA DE PREVENCION</span>-->
        </div>'; 

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Subprograma de Prevención:</span>
        </div>'; 

        echo '<br>';

        myPresentationLayer::buildTextAreasInpunClassAndStyle(
            $title, "info", "info", $info,"input textarea2","title", $rows, $cols,"width:80%");

        echo '<br>'; 

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Responsable de Cada Tarea y sus Respectivas Funciones:</span>
        </div>'; 

        echo '<br>';

        myPresentationLayer::buildInitColumn();  

        echo '<div style="    margin-bottom: 1rem;" class="">
        <span style="color:black; font-size: x-large; ">Puesto dentro de la UIPC:</span>
        </div>'; 
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Titular:
            </span>
        </div>'; 
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Coordinador General/Suplente:
            </span>
        </div>';
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Jefe de la UIPC:
            </span>
        </div>';
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Jefe de Brigada de Primeros Auxilios:
            </span>
        </div>';
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Jefe de Brigada de Combate contra Incendios:
            </span>
        </div>';
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Jefe de Brigada de Evacuación del Inmueble:
            </span>
        </div>';
        echo '<div style="" class="x">
            <span style="color:black; font-size: large; ">
                Jefe de Brigada de Búsqueda y Rescate:
            </span>
        </div>';

        presentationLayer::buildEndColumn();

        myPresentationLayer::buildInitColumn();

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Nombre:</span>
        </div>'; 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcheadlinename","uipcheadlinename",$uipcheadlinename,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","","");    
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipccoordinatorname","uipccoordinatorname",$uipccoordinatorname,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcchiefname","uipcchiefname",$uipcchiefname,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcfirstaidbrigadechiefname","uipcfirstaidbrigadechiefname",$uipcfirstaidbrigadechiefname,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcantifirebrigadename","uipcantifirebrigadename",$uipcantifirebrigadename,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcevacuationbrigadename","uipcevacuationbrigadename",$uipcevacuationbrigadename,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcsearchbrigadename","uipcsearchbrigadename",$uipcsearchbrigadename,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","","");                                          
        presentationLayer::buildEndColumn();

        echo '<br>';

        myPresentationLayer::buildTextAreasInpunClassAndStyle($title, "infobrigade", "infobrigade", $infobrigade,"input textarea2","title", $rows, $cols,"width:80%");

        echo '<br>';

        echo '<div style="">

        <span style="color:black; font-size: x-large; ">Organigrama de los Brigadistas:</span>
        </div>'; 
        echo '<br>';

        // Carga de Imagenes

        myPresentationLayer::inputFileImg("ORGANIZACION-0","ORGANIZACION-0","ORGANIZACION-0-".$idpartyenterprise,"ORGANIZACION","show-ORGANIZACION-0-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
            "","","","","");

       
        $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ORGANIZACION-0-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  


        echo '<div class="col-12 col-lg-8" id="show-ORGANIZACION-0-" style="margin-top:1rem; display: flow-root;">';
        $i=0;
        if($imgs!=""){
            foreach($imgs as $b){            
                $contentimg=$b["content"];  
                $idimgs=$b["id"]; 
        echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                <img src='images/x.webp' style='width: 2rem;
                position: absolute;
                cursor: pointer;'/>";                  
        echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';         
                $i++;
            } 
        }else{
            echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
        }
        echo '</div>';

        // Fin Carga de Imagenes

        echo '<br>';

        myPresentationLayer::buildTextAreasInpunClassAndStyle(
            $title, "infoorganizationchart", "infoorganizationchart", 
            $infoorganizationchart,"input textarea2","title", $rows, $cols,"width:80%");

        echo '<br>';

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Identificación de las Brigadas:</span>
        </div>'; 
        echo '<br>';

        // Carga de Imagenes

        myPresentationLayer::inputFileImg("ORGANIZACION-1","ORGANIZACION-1","ORGANIZACION-1-".$idpartyenterprise,"ORGANIZACION","show-ORGANIZACION-1-","fa fa-images custom-file-label-icon", "","","img-previewiddocument img-fluid",
            "","","","","");

       
        $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ORGANIZACION-1-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  


        echo '<div class="col-12 col-lg-8" id="show-ORGANIZACION-1-" style="margin-top:1rem; display: flow-root;">';
        $i=0;
        if($imgs!=""){
            foreach($imgs as $b){            
                $contentimg=$b["content"];  
                $idimgs=$b["id"]; 
        echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                <img src='images/x.webp' style='width: 2rem;
                position: absolute;
                cursor: pointer;'/>";               
        echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';         
                $i++;
            } 
        }else{
            echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
        }
        echo '</div>';

        // Fin Carga de Imagenes

        echo '<br>';
        myPresentationLayer::buildTextAreasInpunClassAndStyle($title, "infobrigadeorganization", "infobrigadeorganization", $infobrigadeorganization,"input textarea2","title", $rows, $cols,"width:80%");


        echo '<br>';
        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Directorio de Brigadistas:</span>
        </div>'; 
        echo '<br>';

        echo '<div style="">
        <span style="color:black; font-size: large; ">¿La Empresa Cuenta con mas de Diez Empleados?</span>
        </div>'; 
        echo '<br>';

        $arrayvalR = array ($active,$deleted);    
        $arraytitleR = array ("Si","No");
        $arrayvalR = array ("Y","N");

        myPresentationLayer::buildRadioEventClassMult(
                "", "moretenemployments", "moretenemployments",
                $moretenemployments ,2,$arraytitleR,$arrayvalR ,
                "classr", "trclink","radioclinkin","tdradio", $checked, $disabled, $event);  

                echo '<br>';
        // --------------------------------------------
        myPresentationLayer::buildInitColumn3();  
        echo '<div style="    margin-bottom: 1rem;" class="">
        <span style="color:black; font-size: x-large; ">Puesto dentro de la UIPC:</span>
        </div>'; 
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Titular:
            </span>
        </div>'; 
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Coordinador General/Suplente:
            </span>
        </div>';
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Jefe de la UIPC:
            </span>
        </div>';
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Jefe de Brigada de Primeros Auxilios:
            </span>
        </div>';
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Jefe de Brigada de Combate contra Incendios:
            </span>
        </div>';
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Jefe de Brigada de Evacuación del Inmueble:
            </span>
        </div>';
        echo '<div style="" class="x3">
            <span style="color:black; font-size: larger; ">
                Jefe de Brigada de Búsqueda y Rescate:
            </span>
        </div>';

        presentationLayer::buildEndColumn();
        myPresentationLayer::buildInitColumn3();  
        echo '<div style="">

        <span style="color:black; font-size: x-large; ">Nombre:</span>
        </div>'; 

        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcheadlinenamebrigade","uipcheadlinenamebrigade",$uipcheadlinenamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","","");    
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipccoordinatornamebrigade","uipccoordinatornamebrigade",$uipccoordinatornamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcchiefnamebrigade","uipcchiefnamebrigade",$uipcchiefnamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcfirstaidbrigadechiefnamebrigade","uipcfirstaidbrigadechiefnamebrigade",$uipcfirstaidbrigadechiefnamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcantifirebrigadenamebrigade","uipcantifirebrigadenamebrigade",$uipcantifirebrigadenamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcevacuationbrigadenamebrigade","uipcevacuationbrigadenamebrigade",$uipcevacuationbrigadenamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcsearchbrigadenamebrigade","uipcsearchbrigadenamebrigade",$uipcsearchbrigadenamebrigade,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","","");                                          
        presentationLayer::buildEndColumn();
        myPresentationLayer::buildInitColumn3();

        echo '<div style="">
        <span style="color:black; font-size: x-large; ">Ubicación:</span>
        </div>';

        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcheadlinelocation","uipcheadlinelocation",$uipcheadlinelocation,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipccoordinatorlocation","uipccoordinatorlocation",$uipccoordinatorlocation,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcchieflocation","uipcchieflocation",$uipcchieflocation,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcfirstaidbrigadechieflocation","uipcfirstaidbrigadechieflocation",$uipcfirstaidbrigadechieflocation,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcantifirebrigadelocation","uipcantifirebrigadelocation",$uipcantifirebrigadelocation,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcevacuationbrigadelocation","uipcevacuationbrigadelocation",$uipcevacuationbrigadelocation,
                            "input","",
                            "onkeypress",")",
                            "","","","",
                            "","","","","","",""); 
        myPresentationLayer::buildInputWithValidatorClass(
                            "","uipcsearchbrigadelocation","uipcsearchbrigadelocation",$uipcsearchbrigadelocation,
                            "input","",
                            "onkeypress","",
                            "","","","",
                            "","","","","","",""); 

        presentationLayer::buildEndColumn();

        echo '<br>';
        echo '<br>';
        echo '<br>';

        echo '<div align="left">
        <span style="color:black; font-size: x-large; ">Identificación de las brigadas:</span>
        </div>'; 

        echo '<br>';
    
        myPresentationLayer::buildTextAreasInpunClassAndStyle($title, "brigadeindetification", "brigadeindetification", $brigadeindetification,"input textarea2","title", $rows, $cols,"width:80%");

        myPresentationLayer::buildButtonOrImage("Cancelar","urloper","cancelar","cancelar","","btninicio","maxh-40",
            "Guardar","urloper","bAccess","save","","btninicio","maxh-40");    
        // myPresentationLayer::buildButtonOrImage("Aceptar","urloper","bAccess","save","","btninicio","maxh-40");
    ?>	  
            </form>

            <!--
            <script>

                var birthdate = "<?php echo $birthdate; ?>" ;
                var ufromacademic_records = "<?php echo $ufromacademic_records; ?>" ;
                var ufromexperience_record = "<?php echo $ufromexperience_record; ?>" ;
                var ufromcertifies_records = "<?php echo $ufromcertifies_records; ?>" ;
                var untilacademic_records = "<?php echo $untilacademic_records; ?>" ;
                var untilexperience_record = "<?php echo $untilexperience_record; ?>" ;
                var untilcertifies_records = "<?php echo $untilcertifies_records; ?>" ;

                var x;

                $("#birthdate").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change");    
                $("#ufromacademic_records").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change"); 
                $("#ufromexperience_record").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change"); 
                $("#ufromcertifies_records").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change");
                $("#untilacademic_records").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change"); 
                $("#untilexperience_record").on("change", function() {
                    if(this.value!=""){
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change");   
                $("#untilcertifies_records").on("change", function() {
                    if(this.value!=""){
                        alert(this.value);
                        this.setAttribute(
                            "data-date",
                            moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
                        );
                    }else{
                        this.setAttribute(
                        "data-date",
                        moment().format('[dd/mm/yyyy]')
                        );               
                    }
                }).trigger("change");                               


                $("#nowacademicdate").on("click", function() {
                    var inp = document.getElementById("untilacademic_records");
                    if( $(this).is(':checked') ){        
                        now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        inp.setAttribute(
                            "data-date",
                            moment(today, "YYYY-MM-DD").format( inp.getAttribute("data-date-format") )
                        );

                        // Ponemos el atributo de solo lectura
                        inp.attr("readonly","readonly");
                        // Ponemos una clase para cambiar el color del texto y mostrar que
                        // esta deshabilitado
                        inp.addClass("readOnly");

                    } else {
                        inp.setAttribute(
                            "data-date",
                            moment().format('[dd/mm/yyyy]')
                        );  
                        // Eliminamos el atributo de solo lectura
                        inp.removeAttr("readonly");
                        // Eliminamos la clase que hace que cambie el color
                        inp.removeClass("readOnly");        
                    }
                });

                $("#nowexperiencedate").on("click", function() {
                    var inp = document.getElementById("untilexperience_record");
                    if( $(this).is(':checked') ){        
                        now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        inp.setAttribute(
                            "data-date",
                            moment(today, "YYYY-MM-DD").format( inp.getAttribute("data-date-format") )
                        );

                        // Ponemos el atributo de solo lectura
                        inp.attr("readonly","readonly");
                        // Ponemos una clase para cambiar el color del texto y mostrar que
                        // esta deshabilitado
                        inp.addClass("readOnly");

                    } else {
                        inp.setAttribute(
                            "data-date",
                            moment().format('[dd/mm/yyyy]')
                        );  
                        // Eliminamos el atributo de solo lectura
                        inp.removeAttr("readonly");
                        // Eliminamos la clase que hace que cambie el color
                        inp.removeClass("readOnly");        
                    }
                });

                $("#nowcertifiesdate").on("click", function() {
                    var inp = document.getElementById("untilcertifies_records");
                    if( $(this).is(':checked') ){        
                        now = new Date();
                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);

                        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                        inp.setAttribute(
                            "data-date",
                            moment(today, "YYYY-MM-DD").format( inp.getAttribute("data-date-format") )
                        );

                        // Ponemos el atributo de solo lectura
                        inp.attr("readonly","readonly");
                        // Ponemos una clase para cambiar el color del texto y mostrar que
                        // esta deshabilitado
                        inp.addClass("readOnly");

                    } else {
                        inp.setAttribute(
                            "data-date",
                            moment().format('[dd/mm/yyyy]')
                        );  
                        // Eliminamos el atributo de solo lectura
                        inp.removeAttr("readonly");
                        // Eliminamos la clase que hace que cambie el color
                        inp.removeClass("readOnly");        
                    }
                });

            </script> 
            -->
    </body>
</html>
