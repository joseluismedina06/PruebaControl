<?php
//Include the database configuration file
include '../base/baseBL.php';
$sbl=new baseBL();

if(!empty($_POST["selectidstate"])){
    
    $com="select code from base.phonetype where id='".$_POST["idphonetype"]."'";
    $phonetypecode=$sbl->executeScalar($com);
    if($phonetypecode!="movil"){
        //Fetch all state data
        $com="select id,name from base.state where idcountry='".$_POST['selectidstate']."' ";
        $query=$sbl->executeReader($com);
        $id="id";
        $name="name";
    }else{
        $com="select internationalphonecode from base.country where id='".$_POST['idcountrycode']."'";
        $countrycode=$sbl->executeScalar($com);           
        $com="SELECT base.isspgetcellphonesareacode('".$countrycode."')";
        $query=$sbl->executeReader($com);    
        $id="isspgetcellphonesareacode";
        $name="isspgetcellphonesareacode";        
    }    

    //Count total number of rows
    
    $rowCount=count($query);
    echo '<option value="">---Seleccione----</option>';
    //State option list
    if($rowCount>0 && $query!= FALSE){
        for($i=0;$i<$rowCount;$i++){ 
           echo '<option value="'.$query[$i][$id].'">'.$query[$i][$name].'</option>';
        }
    }
    else{
        echo'<option value="">---No posee Datos----</option>';
    }
}
if(!empty($_POST["selectidcity"])){
    //Fetch all state data
    $com="select id,name from base.city where idstate='".$_POST['selectidcity']."' ";
    $query=$sbl->executeReader($com);
    //Count total number of rows
    
    $rowCount=count($query);
    echo '<option value="">---Seleccione----</option>';
    //State option list
    if($rowCount>0 && $query!= FALSE){
        for($i=0;$i<$rowCount;$i++){ 
           echo '<option value="'.$query[$i]['id'].'">'.$query[$i]['name'].'</option>';
        }
    }
    else{
        echo'<option value="">---No posee Datos----</option>';
    }
}
//***********************************phone interno
if(!empty($_POST["idcountrycode"])){
    $com="select internationalphonecode from base.country where id='".$_POST['idcountrycode']."'";
    $countrycode=$sbl->executeScalar($com);
    echo $countrycode;
}
if(!empty($_POST["idareacode"])){
    $com="select code from base.phonetype where id='".$_POST["idphonetype"]."'";
    $phonetypecode=$sbl->executeScalar($com);
    if($phonetypecode!="movil"){
        $com="select areacode from base.state where id='".$_POST['idareacode']."'";
        $areacode=$sbl->executeScalar($com);
        echo $areacode;
    }else{
//        $com="select internationalphonecode from base.country where id='".$_POST['idcountrycode']."'";
//        $countrycode=$sbl->executeScalar($com);
        echo $_POST['idareacode'];        
    }  


    

}
//if(!empty($_POST["idcountrycode"]) && !empty($_POST["idphonetype"]) ){
//    $com="select code from base.phonetype where id='".$_POST["idphonetype"]."'";
//    $phonetypecode=$sbl->executeScalar($com);
//    if($phonetypecode=="movil"){
//        $com="select internationalphonecode from base.country where id='".$_POST['idcountrycode']."'";
//        $countrycode=$sbl->executeScalar($com);        
//        $com="SELECT base.isspgetcellphonesareacode('".$countrycode."')";
//        $query=$sbl->executeReader($com);
//        
////    $rowCount=count($query);
////    echo '<option value="">---Seleccione----</option>';
////    //State option list
////    if($rowCount>0 && $query!= FALSE){
////        for($i=0;$i<$rowCount;$i++){ 
////            if($phonetypecode=="movil"){
////                echo '<option value="'.$query[$i]['isspgetcellphonesareacode'].'">'.$query[$i]['isspgetcellphonesareacode'].'</option>';
////            }else{
////                echo '<option value="'.$query[$i]['areacode'].'">'.$query[$i]['areacode'].'</option>';
////            }
////           
////        }
////    }
////    else{
////        echo'<option value="">---No posee Datos----</option>';
////    }        
//        
//    }
//}
//if(!empty($_POST["countrycode"]) && !empty($_POST["idphonetype"]) ){
//    
//    $com="select code from base.phonetype where id='".$_POST["idphonetype"]."'";
//    $phonetypecode=$sbl->executeScalar($com);
//    if($phonetypecode=="movil"){
//        $com="SELECT base.isspgetcellphonesareacode('".$_POST["countrycode"]."')";
//        $query=$sbl->executeReader($com);
//    }else{
//        $com="select a.areacode from base.state a ,base.country b "
//                . "where b.internationalphonecode='".$_POST["countrycode"]."' "
//                . "and a.idcountry=b.id";
//        $query=$sbl->executeReader($com);
//    }
//
//   
//    $rowCount=count($query);
//    echo '<option value="">---Seleccione----</option>';
//    //State option list
//    if($rowCount>0 && $query!= FALSE){
//        for($i=0;$i<$rowCount;$i++){ 
//            if($phonetypecode=="movil"){
//                echo '<option value="'.$query[$i]['isspgetcellphonesareacode'].'">'.$query[$i]['isspgetcellphonesareacode'].'</option>';
//            }else{
//                echo '<option value="'.$query[$i]['areacode'].'">'.$query[$i]['areacode'].'</option>';
//            }
//           
//        }
//    }
//    else{
//        echo'<option value="">---No posee Datos----</option>';
//    }
//}
?>