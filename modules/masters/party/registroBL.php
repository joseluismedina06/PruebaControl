<?php
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");
    $dbl=new baseBL();    
    class registroBL extends baseBL {
		
        protected $code;
        protected $name;
        protected $idclink;		
        protected $username;
        protected $email;
        protected $password;
        protected $date_create;
        // protected $lastname;
        // protected $secondlastname;
        // protected $registernumber;       
        protected $active;		
        protected $deleted;   
  

        function __construct($code, $name, $idclink, $username, $email, $password, $date_create,$active, 
            $deleted){
            
            $scheme="core";
            $table="clinker";
            $this->code = $code;
            $this->name = $name;
            $this->idclink = $idclink;		
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->date_create = $date_create;
            // $this->lastname = $lastname;
            // $this->secondlastname = $secondlastname;
            // $this->registernumber = $registernumber;
           
            $this->active = $active;		
            $this->deleted = $deleted;  
   

                
            parent::__construct($scheme,$table,$code,$name,$active,$deleted);               
        }

        
        function validate() {
            $valid = true;
            $msg = "";
            
            // if (!utilities::valOk($this->lastname)) {
            //         $valid = false;
            //         $msg .= "El dato Apellido  no puede estar vacio";
            // } //              
//            
           if (!utilities::valOk($this->date_create)) {
                   $valid = false;
                   $msg .= "El date_create esta vacio";
           } //                    
            
            if (!utilities::valOk($this->password)) {
                    $valid = false;
                    $msg .= "El dato primer nombre no puede estar vacio";
            } // 
//            
            // if (!utilities::valOk($this->idclink)) {
            //         $valid = false;
            //         $msg .= "El idclink esta vacio";
            // } // 
                        if (!utilities::valOk($this->email)) {
                    $valid = false;
                    $msg .= "El email esta vacio";
            } // 
//            
//            if (!utilities::valOk($this->name)) {
//                    $valid = false;
//                    $msg .= "El name completo esta vacio";
//            } // 
//            
//            if (!utilities::valOk($this->code)) {
//                    $valid = false;
//                    $msg .= "El code completo esta vacio";
//            } //             
			
            if ($msg != "")
                utilities::alert($msg);
                return ($valid);
        }
        
        function validatebirthdate($birthdate){
            $valid = false;
            $msg = "menor";
//            var_dump($birthdate);
            if ($msg != "")
                utilities::alert($msg);
                return ($valid);
        }
        
        function validatemsg (){
                $msg = "";
               
                    if (!utilities::valOk($this->password)) {
                          $valid = false;
                          $msg .= "El dato primer nombre, ";
                    } // validate password

                    if (!utilities::valOk($this->lastname)) {
                          $valid = false;
                          $msg .= "El dato primer apellido, ";
                    } // validate lastname                    

                    // } // validate idgender 
                     if (!utilities::valOk($this->email)) {
                          $valid = false;
                          $msg .= "El dato email, ";
                    } // validate idgender   
	
                if ($msg != ""){
                      $msg .= "No puede estar vacio";
                }    
                return ($msg);    
        }                
                
        function buildArray_person(&$A) {    
            $A[] = utilities::buildS($this->code);
            $A[] = utilities::buildS($this->name);
            $A[] = utilities::buildS($this->idclink);   
            $A[] = utilities::buildS($this->username);   
            $A[] = utilities::buildS($this->email);	
            $A[] = utilities::buildS($this->password);
            $A[] = utilities::buildS($this->date_create);
//             $A[] = utilities::buildS($this->lastname);
//             $A[] = utilities::buildS($this->secondlastname);
//             $A[] = utilities::buildS($this->registernumber);
// );            
            $A[] = utilities::buildS($this->active);
            $A[] = utilities::buildS($this->deleted);


        }
        
        function buildArray_findid(&$A) {    
            $A[] = ($this->code);
            $A[] = ($this->name);
            $A[] = ($this->idclink);
            $A[] = ($this->username);
            $A[] = ($this->email);	
            $A[] = ($this->password);
            $A[] = ($this->date_create);
            // $A[] = ($this->lastname);
            // $A[] = ($this->secondlastname);
            // $A[] = ($this->registernumber);
              
            $A[] = ($this->active);
            $A[] = ($this->deleted);


        }        
        
        
       function getdocumentparty($documentid) {
            // $com1 = "SELECT * FROM ". $this->scheme. ".isspget".$this->table."document('".$documentid."')"  ;
                     //echo $com1;
           
           $com="SELECT * FROM core.consultant AS b WHERE EXISTS  ( SELECT documentid 
           FROM core.party AS a  WHERE a.id= b.idclink 
           and '$documentid'= a.documentid)";
               $result = $this->executeReader($com);
             //  var_dump($result);
               return $result;
             }        
            
        function fillGridDisplayPaginator($com="",$arrCol="",$id="",$idvarbl=""){
            if ($com==""){
                $com="select * from ".$this->scheme.".isspget".$this->table."()";
            }            
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com);
           
            if ($arrCol=="") {
                $arrCol=array("Id","Código","Nombre","Activo","deleted"); 
            }
            MyPresentationLayer::fillGridArrPaginatorMultiBL($arr, $arrCol,$id,$idvarbl);
            echo ''; 

        } 	

        function executeperson($urloper="",$parAr=""){
           
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
                                 
				if ($nerr === true) 
                                     
					$msg = "Datos personales Actualizacion ok. "; 
				else
					$msg = "Datos personales Actualizacion Failed. "; 
//				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
                           // var_dump($parAr);
				$nerr = $this -> insert($parAr);
                           // var_dump($nerr);

				if ($nerr === true) {
                                        $msg = " Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Registro Fallido. "; 
                                      //  $_SESSION["mensaje"]=$msg;                                    
//					$msg = "Insert Operation Failed. ";
//				utilities::alert($msg);
                                }                             
			} // update     
                          return ($msg);
        }
        
        
        static function buildFooterNoGrid($pl,$bl,$pn=0,$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y",$back="") {
            echo '<TABLE class="italsis">';
            echo '<TR>';
            echo '<TD>';
            //$save="Y",$clean="Y",$report="Y",$pdf="Y",$excel="Y",$back="Y"
            //$pl->showButtons($save,$delete,$print,$clean,$find);
            myPresentationLayer::myshowButtons($save,$clean,"","","",$back); 
            echo '</TD>';
            echo '</TR>';
            echo '</TABLE>';

        }
        
        function fillGridDisplayPaginatorOpt($com="",$arrCol="",$id="",$idvarbl=""){
            if ($com==""){
                $com="select * from ".$this->scheme.".isspget".$this->table."()";
            }            
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com);
           
            if ($arrCol=="") {
                $arrCol=array("Id","Codigo","Nombre","Activo","deleted"); 
            }
            MyPresentationLayer::fillGridArrPaginatorMultiOptBL($arr, $arrCol,$id,$idvarbl);                   
        }
    }


?>