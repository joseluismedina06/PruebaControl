<?php
/**
* Class "partygamaiz@durthis.comBL.PHP"
* @author "dba, gamaiz@durthis.com"
* @version "1.00 2018-09-18 Elaboracion; 2018-09-18 Modificacion, [Parametro]"
* Description: ""  
* 
* Others additions: partygamaiz@durthis.comBL.php:
* functions: 
*           
*
*/
    chdir(dirname(__FILE__));

    include_once("../base/baseBL.php");
    


    class partyemailBL extends baseBL {

          protected $idparty;
          protected $idemailtype;
          protected $email;
          


          function __construct($code,$name,$idparty,$idemailtype,$email,
$active,$deleted) {

          $scheme = "core";
          $table = "email";
          $this->idparty  = $idparty;
          $this->idemailtype  = $idemailtype;
          $this->email  = $email;
          

          parent::__construct($scheme,$table,$code,$name,$active,$deleted);

          }

          function validate() {
                $valid = true;
                $msg = "";


//                if (!utilities::valOk($this->code)) {
//                      $valid = false;
//                      $msg = "A value must be given to field code";
//                } // validate code
//
//                if (!utilities::valOk($this->name)) {
//                      $valid = false;
//                      $msg = "A value must be given to field name";
//                } // validate name
//
//                if (!utilities::valOk($this->idparty)) {
//                      $valid = false;
//                      $msg = "A value must be given to field idparty";
//                } // validate idparty

               if (!utilities::valOk($this->idemailtype)){
                     $valid = false;
                     $msg .= "El dato tipo de correo, ";                    
               }
               
                
                if (!utilities::valOk($this->email)) {
                      $valid = false;
                      $msg .= "El dato correo, ";
                      
                } // validate email
//
//                if (!utilities::valOk($this->observation)) {
//                      $valid = false;
//                      $msg = "A value must be given to field observation";
//                } // validate observation

//                if ($msg != ""){
////                    $msg .= "No puede estar vacio";
//                    utilities::alert($msg);
//                }
//                if ($msg != ""){
//                      
//                }                  
                      return ($valid);
          }

          function validatemsg() {
                $msg = ""; 

               if (!utilities::valOk($this->idemailtype)){
                     $valid = false;
                     $msg .= "El dato tipo de correo, ";                    
               }                 
                if (!utilities::valOk($this->email)) {
                      $valid = false;
                      $msg .= "El dato correo, ";
                      
                }  


                if ($msg != ""){
                      $msg .= "No puede estar vacio. ";
                }    
                return ($msg);          
          }
   
          
          
          function buildArray(&$A) {
                $A[] = utilities::buildS($this->code);
                $A[] = utilities::buildS($this->name);
                $A[] = utilities::buildS($this->idparty);
                $A[] = utilities::buildS($this->idemailtype);
                $A[] = utilities::buildS($this->email);
                
                $A[] = utilities::buildS($this->active);
                $A[] = utilities::buildS($this->deleted);
          }
          function buildArray_findid(&$A) {
                $A[] = ($this->code);
                $A[] = ($this->name);
                $A[] = ($this->idparty);
                $A[] = ($this->idemailtype);
                $A[] = ($this->email);
                
                $A[] = ($this->active);
                $A[] = ($this->deleted);
          }          

          function fillGrid($pn=0,$parname="",$parvalue="") {
                $par = "";
                $par = "";
                $arrCol = array("id","code","name","idparty","email","
                observation","active","deleted");
                return parent::fillGrid($arrCol, $par, $pn, $pageSize=10);
          }

        function fillGridDisplayPaginator($com="",$arrCol="",$id="",$idvarbl=""){
            if ($com==""){
                $com="select * from ".$this->scheme.".isspget".$this->table."()";
            }            
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com);
           
            if ($arrCol=="") {
                $arrCol=array("Id","Codigo","Nombre","Activo","deleted"); 
            }
            MyPresentationLayer::fillGridArrPaginatorMultiBL($arr, $arrCol,$id,$idvarbl);                   
        }  

          
        function executeemail($urloper="",$parAr=""){
           
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
                                 
				if ($nerr === true) 
                                     
					$msg = "Email Actualizacion ok. "; 
				else
					$msg = "Email  Actualizacion Fallida. "; 
//				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
                           
				$nerr = $this -> insert($parAr);
				if ($nerr === true) {
                                        $msg = "Email Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Email Registro Fallido. "; 
                                      //  $_SESSION["mensaje"]=$msg;                                    
//					$msg = "Insert Operation Failed. ";
//				utilities::alert($msg);
                                }
                              
                              
			} // update     
                          return ($msg);
        }          
          
    }
?>