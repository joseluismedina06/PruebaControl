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

    class buildingaddressBL extends baseBL {
 protected $code; 
 protected $name;
          protected $idparty;
  protected $buildingnumberbuildingaddress;
  protected $suburbbuildingaddress;
  protected $municipalitybuildingaddress;
  protected $postalcodebuildingaddress;
    protected $idaddresstypebuildingaddress;        
  protected $idstatebuildingaddress;
  protected $idcitybuildingaddress;
  protected $streetbuildingaddress;


          function __construct($code,$name,$idparty,
          $buildingnumberbuildingaddress,
          $suburbbuildingaddress,
          $municipalitybuildingaddress,
          $postalcodebuildingaddress,
            $idaddresstypebuildingaddress,
             $idstatebuildingaddress,
 $idcitybuildingaddress,
 $streetbuildingaddress,

            $active,$deleted) {

          $scheme = "core";
          $table = "address";
          $this->idparty  = $idparty;
          $this->buildingnumberbuildingaddress = $buildingnumberbuildingaddress;
          $this->suburbbuildingaddress = $suburbbuildingaddress;
          $this->municipalitybuildingaddress = $municipalitybuildingaddress;
          $this->postalcodebuildingaddress = $postalcodebuildingaddress;
            $this->idaddresstypebuildingaddress = $idaddresstypebuildingaddress;
                         $this->idstatebuildingaddress = $idstatebuildingaddress;
 $this->idcitybuildingaddress =  $idcitybuildingaddress;
 $this->streetbuildingaddress = $streetbuildingaddress;

          parent::__construct($scheme,$table,$code,$name,$active,$deleted);

          }

          function validate() {
                $valid = true;
                $msg = "";

               
                    // if (!utilities::valOk($this->idaddresstype)) {
                    //       $valid = false;
                    //       $msg .= "El dato tipo de direccion, ";
                    // } // validate idaddresstype

                    // if (!utilities::valOk($this->idcountry)) {
                    //       $valid = false;
                    //       $msg .= "El dato pais, ";
                    // } // validate idcountry

                    // if (!utilities::valOk($this->idstate)) {
                    //       $valid = false;
                    //       $msg .= "El dato estado, ";
                    // } // validate idstate

                    // if (!utilities::valOk($this->idcity)) {
                    //       $valid = false;
                    //       $msg .= "El dato ciudad, ";
                    // } // validate idcity                    
         

                    // if (!utilities::valOk($this->parish)) {
                    //     $valid = false;
                    //       $msg .= "El dato municipio/parroquia, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->avenue)) {
                    //     $valid = false;
                    //       $msg .= "El dato Av./Calle/Carretera/Carrera, ";
                    // } // validate idcity                       
                    // if (!utilities::valOk($this->building)) {
                    //     $valid = false;
                    //       $msg .= "El dato Res./Casa/Edif./Bloque, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->floor)) {
                    //     $valid = false;
                    //       $msg .= "El dato Piso/Nivel, ";
                    // } // validate idcity                        
                    // if (!utilities::valOk($this->apartment)) {
                    //     $valid = false;
                    //       $msg .= "El dato Apto./Nro./Nombre, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->zone)) {
                    //     $valid = false;
                    //       $msg .= "El dato Urb./Sector/Barrio/Vereda, ";
                    // } // validate idcity                       
                    // if (!utilities::valOk($this->zipcode)) {
                    //     $valid = false;
                    //       $msg .= "El dato Cod.Zip, ";
                    // } // validate idcity   

//                if ($msg != ""){
//                      $msg .= "No puede estar vacio";
//                      utilities::alert($msg);
//                }                    
                      return ($valid);
          }

          function validatemsg (){
                $msg = "";
            
                    // if (!utilities::valOk($this->idaddresstype)) {

                    //       $msg .= "El dato tipo de direccion, ";
                    // } // validate idaddresstype

                    // if (!utilities::valOk($this->idcountry)) {

                    //       $msg .= "El dato pais, ";
                    // } // validate idcountry

                    // if (!utilities::valOk($this->idstate)) {

                    //       $msg .= "El dato estado, ";
                    // } // validate idstate

                    // if (!utilities::valOk($this->idcity)) {
                    //       $msg .= "El dato ciudad, ";
                    // } // validate idcity       



                    // if (!utilities::valOk($this->parish)) {
                    //       $msg .= "El dato municipio/parroquia, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->avenue)) {
                    //       $msg .= "El dato Av./Calle/Carretera/Carrera, ";
                    // } // validate idcity                       
                    // if (!utilities::valOk($this->building)) {
                    //       $msg .= "El dato Res./Casa/Edif./Bloque, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->floor)) {
                    //       $msg .= "El dato Piso/Nivel, ";
                    // } // validate idcity                        
                    // if (!utilities::valOk($this->apartment)) {
                    //       $msg .= "El dato Apto./Nro./Nombre, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->zone)) {
                    //       $msg .= "El dato Urb./Sector/Barrio/Vereda, ";
                    // } // validate idcity                       
                    // if (!utilities::valOk($this->zipcode)) {
                    //       $msg .= "El dato Cod.Zip, ";
                    // } // validate idcity   

              
                if ($msg != ""){
                      $msg .= "No puede estar vacio";
                }    
                return ($msg);
          }          
          

          function buildArray(&$A) {
                $A[] = utilities::buildS($this->code);
                $A[] = utilities::buildS($this->name);
                $A[] = utilities::buildS($this->idparty);
           $A[] = utilities::buildS($this->buildingnumberbuildingaddress);
          $A[] = utilities::buildS($this->suburbbuildingaddress);
          $A[] = utilities::buildS($this->municipalitybuildingaddress);
          $A[] = utilities::buildS($this->postalcodebuildingaddress);
            $A[] = utilities::buildS($this->idaddresstypebuildingaddress);
            $A[] = utilities::buildS($this->idstatebuildingaddress);
            $A[] = utilities::buildS($this->idcitybuildingaddress);  
            $A[] = utilities::buildS($this->streetbuildingaddress); 
                $A[] = utilities::buildS($this->active);
                $A[] = utilities::buildS($this->deleted);


          }
          function buildArray_findid(&$A) {
                $A[] = ($this->code);
                $A[] = ($this->name);
                $A[] = ($this->idparty);
           $A[] = ($this->buildingnumberbuildingaddress);
          $A[] = ($this->suburbbuildingaddress);
          $A[] = ($this->municipalitybuildingaddress);
          $A[] = ($this->postalcodebuildingaddress);
            $A[] = ($this->idaddresstypebuildingaddress);
            $A[] = ($this->idstatebuildingaddress);
            $A[] = ($this->idcitybuildingaddress);
            $A[] = ($this->streetbuildingaddress); 

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
                $arrCol=array("Id","Codigo","Nombre","Activo","deleted"); 
            }
            MyPresentationLayer::fillGridArrPaginatorMultiBL($arr, $arrCol,$id,$idvarbl);                   
        }   
        
        function executeaddress($urloper="",$parAr=""){
           
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
                                 
				if ($nerr === true) 
                                     
					$msg = "Direccion Edificio Actualizacion ok. "; 
				else
					$msg = "Direccion Edificio Actualizacion Fallida. "; 
//				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
                           
				$nerr = $this -> insert($parAr);
				if ($nerr === true) {
                                        $msg = "Direccion Edificio Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Direccion Edificio Registro Fallida. "; 
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
                        // var_dump($arr2);
			echo '</LABEL>';
		}          
    }
?>