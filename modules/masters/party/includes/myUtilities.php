<?php
	session_start();
	
	chdir(dirname(__FILE__));
	include_once("../../../includes/utilities.php");
	
	class myUtilities extends utilities {
		
		static function buildmyjs($level = 3) {
			switch($level) {
                                case 0: $dir = "";
					break;    
				case 1: $dir = "../";
					break;
				case 2: $dir = "../../";
					break;
				case 3: $dir = "../../../";
					break;
			}
			
			echo '<SCRIPT language="javascript" src="'.$dir.'js/myJS.js" type="text/javascript"></SCRIPT>';
		}
		
		
		static function buildmyccs($level = 3,$intro="") {
			switch($level) {
                case 0: $dir = "";
					break;                            
				case 1: $dir = "../";
					break;
				case 2: $dir = "../../";
					break;
				case 3: $dir = "../../../";
					break;
				case 4: $dir = $intro."/";
					break;
			}
			echo '<link rel="stylesheet" type="text/css" href="'.$dir.'css/myCCS.css">';
			
		}


//*-------------- Agregado por genesis amaiz 30-5-19
                                                            
                                                            
            static function  validFile($name,$size,$arrayFileType){
                
					$valid = true;
					//echo $name;
					//var_dump($name);
					//var_dump($arrayFileType);
                    
//                    //extraer el ultimo componente de la ruta(se busca el nombre del archivo)
//                    $file = $dir . basename($_FILES[$name]['name']);
                    //Extraer tipo de extencion del archivo y convertirlo en minuscula
//                    $valFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                    //Extraer el tamaño del archivo
//                    $valsize = getimagesize($_FILES[$name]["tmp_name"]);
                    
                        // Extenciones permitidas
					//Extraer tipo de extencion del archivo y convertirlo en minuscula
					//var_dump($_FILES[$name]);
					$valFileType = strtolower(pathinfo($_FILES[$name]['name'],PATHINFO_EXTENSION)); 
					//var_dump($valFileType);                   
                    $true=0;
//                    var_dump(count($arrayFileType));
                    for($i=0; $i<=count($arrayFileType)-1; $i++){
                    
                        if($valFileType==$arrayFileType[$i]){
                            $true=$true+1;
                        }    
                        $stringFileType .=$arrayFileType[$i]." ";
               
                    }
                    
                    if($true==0){
                        $valid = false;
                        $msg.="Solo se permiten extensiones ".$stringFileType.". "; 
                    }
                    
                        //tamaño permitido
                    if ($_FILES[$name]["size"] > $size) {
                        $valid = false;
                        $msg.="Operacion fallida, este archivo no puede ser mayor a ".($size/1000000)."MB. "; 
                     }   
                     
          
                if($msg!=""){
//                    $msg = "Debe darse un valor al campo: ".$msg ;
                    utilities::alert($msg);     
                }
       
                
                              
                    return ($valid);             
            }


		
	}
?>	