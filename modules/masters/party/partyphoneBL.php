<?php
/**
* Class "partyphoneBL.PHP"
* @author "postgres, cpaez@durthis.com"
* @version "1.00 2018-04-03 Elaboracion; 2018-04-03 Modificacion, [Parametro]"
* Description: "bl y pl de partyphone"  
* 
* Others additions: partyphoneBL.php:
* functions: 
*           
*
*/
    chdir(dirname(__FILE__));

    include_once("../base/baseBL.php");

    class partyphoneBL extends baseBL {

          protected $idparty;
          protected $idphonetype;

          protected $number;



          function __construct($code,$name,$idparty,$idphonetype, $number,$active,$deleted) {

          $scheme = "core";
          $table = "phone";
          $this->idparty  = $idparty;
          $this->idphonetype  = $idphonetype;
          $this->number  = $number;


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
//

                if (!utilities::valOk($this->number)) {
                      $valid = false;
                      $msg .= "El dato numero, ";
                } // validate number

                
                
                if (!utilities::valOk($this->idphonetype)) {
                      $valid = false;
                      $msg .= "El dato tipo de teléfono, ";
                } // validate idphonetype                
//
//                if (!utilities::valOk($this->observation)) {
//                      $valid = false;
//                      $msg = "A value must be given to field observation";
//                } // validate observation

//                if ($msg != ""){
//                    $msg .= "No puede estar vacio";
//                    utilities::alert($msg);
//                }
//                if ($msg != ""){
//                      
//                }                
                      return ($valid);
          }

        function validatemsg (){
            $msg = "";

                if (!utilities::valOk($this->number)) {
                      $msg .= "El dato numero, ";
                } // validate number


                
                if (!utilities::valOk($this->idphonetype)) {
                      $msg .= "El dato tipo de telefono, ";
                } // validate idphonetype               
            
            if ($msg != ""){
                $msg .= "No puede estar vacio";
            }          
            return ($msg);
        }
                
          
          
          function buildArray(&$A) {
                $A[] = utilities::buildS($this->code);
                $A[] = utilities::buildS($this->name);
                $A[] = utilities::buildS($this->idparty);
                $A[] = utilities::buildS($this->idphonetype);

                $A[] = utilities::buildS($this->number);

                $A[] = utilities::buildS($this->active);
                $A[] = utilities::buildS($this->deleted);
          }
          function buildArray_findid(&$A) {
                $A[] = ($this->code);
                $A[] = ($this->name);
                $A[] = ($this->idparty);
                $A[] = ($this->idphonetype);

                $A[] = ($this->number);
                $A[] = ($this->active);
                $A[] = ($this->deleted);
          }          

          function fillGrid($pn=0,$parname="",$parvalue="") {
                $par = "";
                $arrCol = array("id","code","name","idparty","idphonetype","
                number","observation","active","
                deleted");
                return parent::fillGrid($arrCol, $par, $pn, $pageSize=10);
          }
          
        function executephone($urloper="",$parAr=""){
//           var_dump($parAr);
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
                                 
				if ($nerr === true) 
                                     
					$msg = "Teléfonos Actualizacion ok. "; 
				else
					$msg = "Teléfonos Actualizacion Fallida. "; 
//				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
                           
				$nerr = $this -> insert($parAr);
				if ($nerr === true) {
                                        $msg = "Teléfonos Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Teléfonos Registro Fallida. "; 
                                      //  $_SESSION["mensaje"]=$msg;                                    
//					$msg = "Insert Operation Failed. ";
//				utilities::alert($msg);
                                }
                              
                              
			} // update     
                          return ($msg);
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
            myPresentationLayer::fillGridArrPaginatorMultiOptBL($arr, $arrCol,$id,$idvarbl);                   
        }
          
          
    }
?>