<?php
//Include the database configuration file
include '../base/baseBL.php';
$sbl=new baseBL();

if(!empty($_POST["iddoc"])){
    
    $com="UPDATE core.document 
      SET 
      delete='Y' 
      WHERE id='".$_POST['iddoc']."' RETURNING id";

    $res=$sbl->executeScalar($com);
    echo $res;
    echo $com;

}
if(!empty($_POST["idimg"])){
    
    $com="UPDATE core.pictures 
      SET 
      delete='Y' 
      WHERE id='".$_POST['idimg']."' RETURNING id";

    $res=$sbl->executeScalar($com);
    echo $res;
    echo $com;

}


?>