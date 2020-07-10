<?php
error_reporting(0);
chdir(dirname(__FILE__));
include_once("../../base/baseBL.php");

$dbl=new baseBL();

$nameI =$_GET['name'];
$idimg =$_GET['idimg'];
$code  =$_GET['ruta'];

$img=$_FILES[$nameI];

if(!empty($img["tmp_name"])){

    // extraer la extencion del archivo
    $imgFileType = strtolower(pathinfo(basename($img['name']),PATHINFO_EXTENSION));
    //extaer el tamaño del archivo almacenado en la memoria temporal
    $check = getimagesize($img["tmp_name"]); 


    if   ($check !== false) { $msjimg = ""; } 
    else { $msjimg .="Erro: en la memoria temporal. "; }
  
    // Check if file already exists
    // if (file_exists($target_file)) { $msjimg .="Ya existe un archivo con nombre. ".$target_file; }

    // Allow certain file formats
    if($imgFileType != "jpg" && 
        $imgFileType != "png" && 
        $imgFileType != "jpeg" && 
        $imgFileType != "gif" ) {
        $msjimg .="Solo se permiten extenciones JPG, JPEG, PNG & GIF. ";
    }

    // Check if $uploadOk is set to 0 by an error
    if ($msjimg != "") {
        $msjimg .="El archivo no se guardo.";
    } else {


    function resizeImg($origin,$destino,$newWidth,$newHeight,$jpgQuality)
    {   
        // getimagesize devuelve un array con: anchura,altura,tipo,cadena de 
        // texto con el valor correcto height="yyy" width="xxx"   
        $datos=getimagesize($origin);
     
        // comprobamos que la imagen sea superior a los tamaños de la nueva imagen
        if($datos[0]>$newWidth || $datos[1]>$newHeight)
        {
     
            // creamos una nueva imagen desde el original dependiendo del tipo
            if($datos[2]==1)
                $img=imagecreatefromgif($origin);
            if($datos[2]==2)
                $img=imagecreatefromjpeg($origin);
            if($datos[2]==3)
                $img=imagecreatefrompng($origin);
     
            // Redimensionamos proporcionalmente
            if(rad2deg(atan($datos[0]/$datos[1]))>rad2deg(atan($newWidth/$newHeight)))
            {
                $anchura=$newWidth;
                $altura=round(($datos[1]*$newWidth)/$datos[0]);
            }else{
                $altura=$newHeight;
                $anchura=round(($datos[0]*$newHeight)/$datos[1]);
            }
     
            // creamos la imagen nueva
            $newImage = imagecreatetruecolor($anchura,$altura);
     
            // redimensiona la imagen original copiandola en la imagen
            imagecopyresampled($newImage, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);
     
            // guardar la nueva imagen redimensionada donde indicia $destino
            if($datos[2]==1)
                imagegif($newImage,$destino);
            if($datos[2]==2)
                imagejpeg($newImage,$destino,$jpgQuality);
            if($datos[2]==3)
                imagepng($newImage,$destino);
     
            // eliminamos la imagen temporal
            imagedestroy($newImage);
            return true;
        }else{
            return false;
        }
    }

    $rutaorigen  = $img["tmp_name"];
    $destino_temporal=tempnam("tmp/","tmp");

    // if ($check[0] > 456 || $check[1] > 355) {

    //     if(resizeImg($rutaorigen, $destino_temporal, 456, 355, 100)){
    //         // abrimos el directorio de la img
    //         $fp=fopen($rutaorigen,"w");
    //         // reemplazamos la imagen original por la nueva
    //         fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
    //         //cerramos el directorio
    //         fclose($fp);                       
    //     }
    //     else{
    //         $error = 'Image dimensions must exceed 657 * 380';
    //     }
    // }else{

    // }


    $ultPosit=strripos($idimg,"-");
    $idparty=substr($idimg,($ultPosit+1));
    $subtring=substr($idimg,0,($ultPosit+1));

    $com="SELECT count(*) from core.pictures 
            where idparty='$idparty' 
            and name like '%$subtring%'";
    $count=$dbl->executeScalar($com);      

    do{
        $com="SELECT count(*) from core.pictures 
                where idparty='$idparty' 
                and name like 
                CONCAT('$subtring', '$count%')";
        $countExists=$dbl->executeScalar($com); 
        $count++; 
    }while($countExists!=0);

    $newname=$subtring.$count.".png";

    //PARA CODIFICAR
    $img_content = file_get_contents($img["tmp_name"]);    
    $img_base64 = chunk_split(base64_encode($img_content));

// $pack= unpack("H*",$img_content);
// $string=implode(",", $pack); 

    $com="INSERT INTO core.pictures 
    (code,idparty, name,content)
    VALUES ('$code','$idparty','$newname','$img_base64') RETURNING id";
    $idimgsql=$dbl->executeScalar($com);

    if ($idimgsql!="") {
        $com="SELECT * from core.pictures where idparty='$idparty'  and name like '$subtring%'  and delete='N'";
        $imgs=$dbl->executeReader($com); 
        $i=0;
        foreach($imgs as $b){            
            $contentimg=$b["content"];     
            $idimgs=$b["id"]; 
    $allimg .= "<div class='eliminarimg' name='$idimgs' style='display:inline-block'>
            <img src='images/x.webp' style='width: 2rem;
            position: absolute;
            cursor: pointer;'/>";                 
            $allimg .= '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /> </div>';         
            $i++;
        }   
        ?> 
        <?php      
    }

    // echo "---->".strlen($string);
    // echo "---->".strlen($img_base64);
    // echo "---->".$com; 




    } 
}else{
    echo "NO se selecciono ningun archivo";
}


exit($allimg);
?>