<?php
    chdir(dirname(__FILE__));
    include_once("../masters/base/baseBL.php");     
    chdir(dirname(__FILE__));
    include_once("../../../includes/nusoap/mailWS.php");    

    class pwdchangepersonjobsBL extends baseBL {
        protected $code;
        protected $name;
        protected $email;
        protected $pwd ; 
        protected $newpwd ; 
        protected $repeatnewpwd;                                 
                
        function __construct($code,$name,$email,$pwd,$newpwd,$repeatnewpwd,$active,$deleted) {
            // $scheme="security";
            // $table="userparty";
            $this->code = $code;
            $this->name = $name;
            $this->email = $email;
            $this->pwd = $pwd;
            $this->newpwd = $newpwd;		
            $this->repeatnewpwd = $repeatnewpwd;                     
            $this->active = $active;		
            $this->deleted = $deleted;
                        
            parent::__construct($scheme,$table,$code,$name,$active,$deleted);
        }   
                
        function validate() {
            $dbl=new baseBL();
            $valid = true;
            $msg = "";
            
            if (!utilities::valOk($this->email)) {
                $valid = false;
                $msg .= " Correo Electronico. ";                            
            }

            
            if (!utilities::valOk($this->pwd)) {
                $valid = false;
                $msg .= " Contraseña Actual. ";                            
            }

            /*
            $com ="SELECT idparty FROM core.email  WHERE 
            content='".$this->email."' and ";
            // password='".md5($this->pwd)."'";      
            $com .=" password='$this->pwd'";
            */      
            //var_dump($com);
            $com="SELECT e.idparty 
                FROM core.email e,core.party p  
                WHERE e.content='".$this->email."' 
                and p.password=md5('".$this->pwd."') 
                and e.idparty=p.id;";    

            $res=$dbl->executeScalar($com);
            if ($res==""){
                $valid = false;
                $msgerror .= "El correo o contraseña es invalida. ";                                  
            }  

            
            if (!utilities::valOk($this->newpwd)) {
                $valid = false;
                $msg .= "Nueva Contraseña. ";
            }


            if ($this->newpwd != $this->repeatnewpwd){
                    $valid = false;
                    $msgerror .= "Las contraseñas no coinciden. ";
            }else{
                $msgpwd ="";
                if(strlen($this->newpwd) < 8){
                    $valid = false;
                    $msgpwd .= "La contraseña es demasiado corta. ";
                }
                if(strlen($this->newpwd) > 25){
                    $valid = false;
                    $msgpwd .= "La contraseña es demasiado larga. ";
                }
                if ($msgpwd ==""){
                    if(!preg_match('/(?=[@#%&+*$.]|-|_)/', $this->newpwd)){
                        $valid = false;
                        $msgpwd2 .= "uno de los siguientes simbolos: @#%&+*$.-_ ";
                    }
                    if(!preg_match('/(?=\d)/', $this->newpwd)){ 
                        $valid = false;
                        $msgpwd2 .= "un digito. ";
                    }
                    if(!preg_match('/(?=[a-z])/', $this->newpwd)){ 
                        $valid = false;
                        $msgpwd2 .= "una letra minuscula. ";
                    }
                    if(!preg_match('/(?=[A-Z])/', $this->newpwd)){ 
                        $valid = false;
                        $msgpwd2 .= "una letra mayuscula. ";
                    }
                    if ($msgpwd2 !=""){
                        $msgerror .= "La contraseña debe contener al menos ".$msgpwd2;
                    }             
                }         
                $msgerror .= $msgpwd;
            }

            if (!utilities::valOk($this->repeatnewpwd)) {
                                          $valid = false;
                                          $msg .= "Repetir Nueva Contraseña. ";
            }                      

            if ($msg!="" || $msgcheck!="" || $msgerror!=""){
                $fullmsg ="";
                if($msg!=""){
                    $fullmsg = "Debe darse un valor al campo: ".$msg ;
                }
                if ($msgcheck!=""){
                    $fullmsg .= $msgcheck;
                } 
                if ($msgerror!="" && $fullmsg==""){
                    $fullmsg .= $msgerror;
                }                            
                utilities::alert($fullmsg);
            }

            return ($valid);
        }

//        function buildArray(&$A) {    
//            $A[] = utilities::buildS($this->code);
//            $A[] = utilities::buildS($this->name);
//            $A[] = utilities::buildS($this->newpwd);
//            $A[] = utilities::buildS($this->repeatnewpwd);                         
//            $A[] = utilities::buildS($this->active);
//            $A[] = utilities::buildS($this->deleted);
//
//        }        
        
        
        function updPwd (){
            $dbl=new baseBL();

            //$com ="SELECT idclink FROM core.clinker  WHERE 
            //        email='$this->email'"; 
            //         // and b.spwd='".md5($this->pwd)."'     
            //$com .=" and password='$this->pwd'";
            
            $com="SELECT e.idparty 
                FROM core.email e,core.party p  
                WHERE e.content='".$this->email."' 
                and p.password=md5('".$this->pwd."') 
                and e.idparty=p.id;"; 
            //echo $com;

            $idparty=$dbl->executeScalar($com); 
            
            
            $com="Update core.party set  "
                    // . "password='".md5($this->newpwd)."'"
                    . "password='".md5($this->newpwd)."'"
                    . " where "
                    . "id=$idparty";                  
            $res=$dbl->executeCommand($com);
            

            return ($res);
                  
        }		
		
    }


?>