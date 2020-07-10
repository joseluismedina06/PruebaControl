<?php
    chdir(dirname(__FILE__));
    include_once("../base/baseBL.php");
    $dbl=new baseBL();    
    class personBL extends baseBL {
		
        protected $code;
        protected $name;
        protected $idparty;		
        protected $idcard;
        protected $curp;
        protected $firstname;
        protected $middlename;
        protected $lastname;
        protected $secondlastname;
        // protected $birthdate;
        // protected $birthplace;
        // protected $monthlyincome;		
        // protected $idcivilstate;		
        // protected $ideconomicalactivity;		
        // protected $idcountrynationality;		
        // protected $idoccupation;
        // protected $idcountrybirth; 
        // protected $idgender;         
        protected $active;		
        protected $deleted;        

        function __construct($code, $name, $idparty, $idcard, $curp, $firstname, $middlename, $lastname, 
            $secondlastname, $active, 
            $deleted){
            
            $scheme="core";
            $table="consultant";
            $this->code = $code;
            $this->name = $name;
            $this->idparty = $idparty;		
            $this->idcard = $idcard;
            $this->curp = $curp;
            $this->firstname = $firstname;
            $this->middlename = $middlename;
            $this->lastname = $lastname;
            $this->secondlastname = $secondlastname;
            // $this->birthdate = $birthdate;
            // $this->birthplace = $birthplace;
            // $this->monthlyincome = $monthlyincome;		
            // $this->idcivilstate = $idcivilstate;		
            // $this->ideconomicalactivity = $ideconomicalactivity;		
            // $this->idcountrynationality = $idcountrynationality;		
            // $this->idoccupation = $idoccupation;
            // $this->idcountrybirth = $idcountrybirth;		
            // $this->idgender = $idgender;            
            $this->active = $active;		
            $this->deleted = $deleted;			
                
            parent::__construct($scheme,$table,$code,$name,$active,$deleted);               
        }

        
        function validate() {
            $valid = true;
            $msg = "";

//            if (!utilities::valOk($this->deleted)) {
//                    $valid = false;
//                    $msg .= "El deleted esta vacio";
//            } //             
//            
//            if (!utilities::valOk($this->active )) {
//                    $valid = false;
//                    $msg .= "El active  esta vacio";
//            } //             
//            
//            if (!utilities::valOk($this->idoccupation )) {
//                    $valid = false;
//                    $msg .= "El idoccupation  esta vacio";
//            } //             
//            
//            if (!utilities::valOk($this->idcountrynationality)) {
//                    $valid = false;
//                    $msg .= "El dato nacionalidad no puede estar vacio";
//            } //             
//            
//            if (!utilities::valOk($this->ideconomicalactivity)) {
//                    $valid = false;
//                    $msg .= "El ideconomicalactivity esta vacio";
//            } //             
//            
//            if (!utilities::valOk($this->idcivilstate)) {
//                    $valid = false;
//                    $msg .= "El idcivilstate esta vacio";
//            } //             
//            
//            if (!utilities::valOk($this->monthlyincome)) {
//                    $valid = false;
//                    $msg .= "El monthlyincome esta vacio";
//            } //             
//            
            // if (!utilities::valOk($this->birthplace)) {
            //         $valid = false;
            //         $msg .= "El dato lugar de nacimiento no puede estar vacio";
            // } //             
//            
            // if (!utilities::valOk($this->birthdate)) {
            //         $valid = false;
            //         $msg .= "El dato fecha de nacimiento no puede estar  vacio";
            // } //             
//            
//            if (!utilities::valOk($this->secondlastname)) {
//                    $valid = false;
//                    $msg .= "El secondlastname esta vacio";
//            } //       
//            
            if (!utilities::valOk($this->lastname)) {
                    $valid = false;
                    $msg .= "El dato Apellido  no puede estar vacio";
            } //              
//            
//            if (!utilities::valOk($this->middlename)) {
//                    $valid = false;
//                    $msg .= "El middlename esta vacio";
//            } //                    
            
            if (!utilities::valOk($this->firstname)) {
                    $valid = false;
                    $msg .= "El dato primer nombre no puede estar vacio";
            } // 
//            
            // if (!utilities::valOk($this->idparty)) {
            //         $valid = false;
            //         $msg .= "El idparty esta vacio";
            // } // 
                        if (!utilities::valOk($this->curp)) {
                    $valid = false;
                    $msg .= "El curp esta vacio";
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
               
                    if (!utilities::valOk($this->firstname)) {
                          $valid = false;
                          $msg .= "El dato primer nombre, ";
                    } // validate firstname

                    if (!utilities::valOk($this->lastname)) {
                          $valid = false;
                          $msg .= "El dato primer apellido, ";
                    } // validate lastname                    

                    // if (!utilities::valOk($this->birthdate)) {
                    //       $valid = false;
                    //       $msg .= "El dato fecha de nacimiento, ";
                    // } // validate birthdate  
                    
                    // if (!utilities::valOk($this->birthplace)) {
                    //       $valid = false;
                    //       $msg .= "El dato lugar de nacimento, ";
                    // } // validate birthplace 
                    
                    // if (!utilities::valOk($this->monthlyincome)) {
                    //       $valid = false;
                    //       $msg .= "El dato ingreso mensual, ";
                    // } // validate monthlyincome 
                    
                    // if (!utilities::valOk($this->idcivilstate)) {
                    //       $valid = false;
                    //       $msg .= "El dato estado civil, ";
                    // } // validate idcivilstate 
                    
                    // if (!utilities::valOk($this->ideconomicalactivity)) {
                    //       $valid = false;
                    //       $msg .= "El dato actividad economica, ";
                    // } // validate ideconomicalactivity		

                    // if (!utilities::valOk($this->idcountrynationality)) {
                    //       $valid = false;
                    //       $msg .= "El dato nacionalidad, ";
                    // } // validate idcountrynationality	                    

                    // if (!utilities::valOk($this->idoccupation)) {
                    //       $valid = false;
                    //       $msg .= "El dato ocupación, ";
                    // } // validate idoccupation

                    // if (!utilities::valOk($this->idcountrybirth)) {
                    //       $valid = false;
                    //       $msg .= "El dato pais de nacimiento, ";
                    // } // validate idcountrybirth                    
	
                    // if (!utilities::valOk($this->idgender)) {
                    //       $valid = false;
                    //       $msg .= "El dato genéro, ";
                    // } // validate idgender 
                     if (!utilities::valOk($this->curp)) {
                          $valid = false;
                          $msg .= "El dato curp, ";
                    } // validate idgender   
	
                if ($msg != ""){
                      $msg .= "No puede estar vacio";
                }    
                return ($msg);    
        }                
                
        function buildArray_person(&$A) {    
            $A[] = utilities::buildS($this->code);
            $A[] = utilities::buildS($this->name);
            $A[] = utilities::buildS($this->idparty);   
            $A[] = utilities::buildS($this->idcard);   
            $A[] = utilities::buildS($this->curp);	
            $A[] = utilities::buildS($this->firstname);
            $A[] = utilities::buildS($this->middlename);
            $A[] = utilities::buildS($this->lastname);
            $A[] = utilities::buildS($this->secondlastname);
            // $A[] = utilities::buildS($this->birthdate);
            // $A[] = utilities::buildS($this->birthplace);
            // $A[] = utilities::buildS($this->monthlyincome);
            // $A[] = utilities::buildS($this->idcivilstate);
            // $A[] = utilities::buildS($this->ideconomicalactivity);
            // $A[] = utilities::buildS($this->idcountrynationality);
            // $A[] = utilities::buildS($this->idoccupation);
            // $A[] = utilities::buildS($this->idcountrybirth );
            // $A[] = utilities::buildS($this->idgender );            
            $A[] = utilities::buildS($this->active);
            $A[] = utilities::buildS($this->deleted);
        }
        
        function buildArray_findid(&$A) {    
            $A[] = ($this->code);
            $A[] = ($this->name);
            $A[] = ($this->idparty);
            $A[] = ($this->idcard);
            $A[] = ($this->curp);	
            $A[] = ($this->firstname);
            $A[] = ($this->middlename);
            $A[] = ($this->lastname);
            $A[] = ($this->secondlastname);
            // $A[] = ($this->birthdate);
            // $A[] = ($this->birthplace);
            // $A[] = ($this->monthlyincome);
            // $A[] = ($this->idcivilstate);
            // $A[] = ($this->ideconomicalactivity);
            // $A[] = ($this->idcountrynationality);
            // $A[] = ($this->idoccupation);
            // $A[] = ($this->idcountrybirth );
            // $A[] = ($this->idgender );               
            $A[] = ($this->active);
            $A[] = ($this->deleted);
        }        
        
        
       function getdocumentparty($documentid) {
            // $com1 = "SELECT * FROM ". $this->scheme. ".isspget".$this->table."document('".$documentid."')"  ;
                     //echo $com1;
           
           $com="SELECT * FROM core.consultant AS b WHERE EXISTS  ( SELECT documentid 
           FROM core.party AS a  WHERE a.id= b.idparty 
           and '$documentid'= a.documentid)";
               $result = $this->executeReader($com);
             //  var_dump($result);
               return $result;
             }        
            
        function fillGridDisplayPaginator($com="",$arrCol=""){
            if ($com==""){
                $com="select * from ".$this->scheme.".isspget".$this->table."()";
            }            
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com);
           
            if ($arrCol=="") {
                $arrCol=array("Id","Codigo","Nombre","Activo","deleted"); 
            }
            presentationLayer::fillGridArrPaginator($arr, $arrCol);                   
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
                                        $msg = "Datos personales Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Datos personales Registro Fallido. "; 
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
            //myPresentationLayer::myshowButtons($save,$clean,"","","",$back); 
            myPresentationLayer::buildButtonOrImage(
                "Guardar","urloper","urloper","save","","btninicio","maxh-40",
                "Limpiar","urloper","urloper","clean","","btninicio","maxh-40",
                "Regresar","urloper","urloper","back","","btninicio","maxh-40"
                );
            echo '</TD>';
            echo '</TR>';
            echo '</TABLE>';

        }                                   
    }


?>