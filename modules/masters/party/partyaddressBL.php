<?php
/**
* Class "partyaddressBL.PHP"
* @author "postgres, cpaez@durthis.com"
* @version "1.00 2018-04-03 Elaboracion; 2018-04-03 Modificacion, [Parametro]"
* Description: "bl y pl de partyaddress"  
* 
* Others additions: partyaddressBL.php:
* functions: 
*           
*
*/
    chdir(dirname(__FILE__));

    include_once("../base/baseBL.php");

    class partyaddressBL extends baseBL {

          protected $idparty;
          protected $idaddresstype;
          protected $idcountry;
          protected $idstate;
          protected $idcity;
          protected $zone;
          protected $parish;
          protected $avenue;
          protected $building;
          protected $floor;
          protected $apartment;
          protected $zipcode ;
          protected $observation;


          function __construct($code,$name,$idparty,$idaddresstype,$idcountry,
$idstate,$idcity,$zone,$parish, $avenue,$building,$floor,
$apartment,$zipcode,$observation,$active,$deleted) {

          $scheme = "core";
          $table = "address";
          $this->idparty  = $idparty;
          $this->idaddresstype  = $idaddresstype;
          $this->idcountry  = $idcountry;
          $this->idstate  = $idstate;
          $this->idcity  = $idcity;
          $this->zone  = $zone;
          $this->parish  = $parish;
          $this->avenue  = $avenue;
          $this->building  = $building;
          $this->floor  = $floor;
          $this->apartment  = $apartment;
          $this->zipcode  = $zipcode;
          $this->observation  = $observation;

          parent::__construct($scheme,$table,$code,$name,$active,$deleted);

          }

          function validate() {
                $valid = true;
                $msg = "";

               
                    if (!utilities::valOk($this->idaddresstype)) {
                          $valid = false;
                          $msg .= "El dato tipo de Dirección, ";
                    } // validate idaddresstype

                    // if (!utilities::valOk($this->idcountry)) {
                    //       $valid = false;
                    //       $msg .= "El dato pais, ";
                    // } // validate idcountry

                    if (!utilities::valOk($this->idstate)) {
                          $valid = false;
                          $msg .= "El dato Estado, ";
                    } // validate idstate

                    if (!utilities::valOk($this->idcity)) {
                          $valid = false;
                          $msg .= "El dato Ciudad, ";
                    } // validate idcity                    
         

                    if (!utilities::valOk($this->parish)) {
                        $valid = false;
                          $msg .= "El dato Municipio, ";
                    } // validate idcity   

                    if (!utilities::valOk($this->avenue)) {
                        $valid = false;
                          $msg .= "El dato Calle, ";
                    } // validate idcity                       
                    // if (!utilities::valOk($this->building)) {
                    //     $valid = false;
                    //       $msg .= "El dato Res./Casa/Edif./Bloque, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->floor)) {
                    //     $valid = false;
                    //       $msg .= "El dato Piso/Nivel, ";
                    // } // validate idcity                        
                    if (!utilities::valOk($this->apartment)) {
                        $valid = false;
                          $msg .= "El dato Apto./Nro./Nombre, ";
                    } // validate idcity   

                    if (!utilities::valOk($this->zone)) {
                        $valid = false;
                          $msg .= "El dato Colonia, ";
                    } // validate idcity                       
                    if (!utilities::valOk($this->zipcode)) {
                        $valid = false;
                          $msg .= "El dato Código postal, ";
                    } // validate idcity   

//                if ($msg != ""){
//                      $msg .= "No puede estar vacio";
//                      utilities::alert($msg);
//                }                    
                      return ($valid);
          }

          function validatemsg (){
                $msg = "";
            
                    if (!utilities::valOk($this->idaddresstype)) {

                          $msg .= "El dato tipo de Dirección, ";
                    } // validate idaddresstype

                    // if (!utilities::valOk($this->idcountry)) {

                    //       $msg .= "El dato pais, ";
                    // } // validate idcountry

                    if (!utilities::valOk($this->idstate)) {

                          $msg .= "El dato estado, ";
                    } // validate idstate

                    if (!utilities::valOk($this->idcity)) {
                          $msg .= "El dato ciudad, ";
                    } // validate idcity       



                    if (!utilities::valOk($this->parish)) {
                          $msg .= "El dato Municipio, ";
                    } // validate idcity   

                    if (!utilities::valOk($this->avenue)) {
                          $msg .= "El dato Calle, ";
                    } // validate idcity                       
                    // if (!utilities::valOk($this->building)) {
                    //       $msg .= "El dato Res./Casa/Edif./Bloque, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->floor)) {
                    //       $msg .= "El dato Piso/Nivel, ";
                    // } // validate idcity                        
                    if (!utilities::valOk($this->apartment)) {
                          $msg .= "El dato Apto./Nro./Nombre, ";
                    } // validate idcity   

                    if (!utilities::valOk($this->zone)) {
                          $msg .= "El dato Colonia, ";
                    } // validate idcity                       
                    if (!utilities::valOk($this->zipcode)) {
                          $msg .= "El dato Código postal, ";
                    } // validate idcity   

              
                if ($msg != ""){
                      $msg .= "No puede estar vacio. ";
                }    
                return ($msg);
          }          
          

          function buildArray(&$A) {
                $A[] = utilities::buildS($this->code);
                $A[] = utilities::buildS($this->name);
                $A[] = utilities::buildS($this->idparty);
                $A[] = utilities::buildS($this->apartment);
                $A[] = utilities::buildS($this->zone);
                $A[] = utilities::buildS($this->parish);

                // $A[] = utilities::buildS($this->idcountry);

                // $A[] = utilities::buildS($this->building);
                // $A[] = utilities::buildS($this->floor);
                $A[] = utilities::buildS($this->zipcode);
                // $A[] = utilities::buildS($this->observation);
                $A[] = utilities::buildS($this->idaddresstype);
                $A[] = utilities::buildS($this->idstate);
                $A[] = utilities::buildS($this->idcity); 
                $A[] = utilities::buildS($this->avenue);

                $A[] = utilities::buildS($this->active);
                $A[] = utilities::buildS($this->deleted);
          }
          function buildArray_findid(&$A) {
                $A[] = ($this->code);
                $A[] = ($this->name);
                $A[] = ($this->idparty);
                $A[] = ($this->apartment);
                $A[] = ($this->zone);
                $A[] = ($this->parish);                
                
                // $A[] = ($this->idcountry);


                // $A[] = ($this->building);
                // $A[] = ($this->floor );
                $A[] = ($this->zipcode );
                $A[] = ($this->idaddresstype);
                $A[] = ($this->idstate);
                $A[] = ($this->idcity);    
                $A[] = ($this->avenue);
                            
                // $A[] = ($this->observation);
                $A[] = ($this->active);
                $A[] = ($this->deleted);
          }          

          function fillGrid($pn=0,$parname="",$parvalue="") {
                $par = "";
                $arrCol = array("id","code","name","idparty","idaddresstype","
idcountry","idstate","idcity","zone","avenue","
building","apartment","observation","active","deleted");
                return parent::fillGrid($arrCol, $par, $pn, $pageSize=10);
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
        }   
        
        function executeaddress($urloper="",$parAr=""){
           
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
                                 
				if ($nerr === true) 
                                     
					$msg = "Direcciónes Actualizacion ok. "; 
				else
					$msg = "Direcciónes Actualizacion Fallida. "; 
//				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
                           
				$nerr = $this -> insert($parAr);
				if ($nerr === true) {
                                        $msg = "Direcciónes Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Direcciónes Registro Fallida. "; 
                                      //  $_SESSION["mensaje"]=$msg;                                    
//					$msg = "Insert Operation Failed. ";
//				utilities::alert($msg);
                                }
                              
                              
			} // update     
                          return ($msg);
        }        
          
    		static function buildSelectSon
        ($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="",$Valfather,$where) {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($event != "") {
				$event = 'onchange="'.$event.'"';
			}
//                        
			echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' >';
                        
                        if($Valfather!=""){
//                            $mod->fillForeignTableCombo($foreignTable,$curVal,$foreignscheme);
                $com="select * from ".$foreignscheme.".".$foreignTable." where ".$where."='".$Valfather."'";
          
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com); 
            if ($curVal!=""){
                $com="select * from ".$foreignscheme.".".$foreignTable." "
                        . "where ".$where."='".$Valfather."' and id='".$curVal."' ";
                $arr2=$dbl->executeReader($com); 
                $value=$arr2[0]['id'];
//                $valorabscar=";
                $see= $arr2[0]["name"];

            } else {
                $value="";
                $see="---Seleccione---";                
            }
    $rowCount=count($arr);
    
    //State option list
    if($rowCount>0 && $arr!= FALSE){
        for($i=0;$i<$rowCount;$i++){ 
           echo '<option value="">---Seleccione---</option><option value="'.$arr[$i]['id'].'">'.$arr[$i]['name'].'</option>';
        }
    }
    else{
        echo'<option value="">---No posee Datos----</option>';
    }            
                        }
			
			echo '</SELECT>';
                        //var_dump($arr2);
			echo '</LABEL>';
		}          
    }
?>