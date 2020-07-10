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

    class fiscaladdressBL extends baseBL {

// protected $code; 
// protected $name ;
protected $idparty;
  protected $buildingnumberfiscaladdress;
  protected $suburbfiscaladdress;
  protected $municipalityfiscaladdress;
  protected $postalcodefiscaladdress;
 protected $idaddresstypefiscaladdress;  
  // protected $RFC;
  protected $idstate;
  protected $idcity;
  protected $streetfiscaladdress;
  // protected $idphonetypefiscaladdress;
  // protected $phonefiscaladdress;        
    // protected $active; 
    // protected $deleted;


          function __construct($code, $name ,
$idparty,
  $buildingnumberfiscaladdress,
  $suburbfiscaladdress,
  $municipalityfiscaladdress,
  $postalcodefiscaladdress,
  // $RFC,

    $idaddresstypefiscaladdress,
      $idstate,
  $idcity,
  $streetfiscaladdress,
  //   $idphonetypefiscaladdress,
  // $phonefiscaladdress,        
    $active, $deleted) {

          $scheme = "core";
          $table = "address";
          $this->idparty  = $idparty;
// $this->code  = $code; 
// $this->name   = $name;
// $this->idparty  = $idparty;
  $this->buildingnumberfiscaladdress  = $buildingnumberfiscaladdress;
  $this->suburbfiscaladdress  = $suburbfiscaladdress;
  $this->municipalityfiscaladdress  = $municipalityfiscaladdress;
  $this->postalcodefiscaladdress  = $postalcodefiscaladdress;
  // $this->RFC  = $RFC;

    $this->idaddresstypefiscaladdress  = $idaddresstypefiscaladdress;
      $this->idstate  = $idstate ;
  $this->idcity  = $idcity ;
  $this->streetfiscaladdress  =   $streetfiscaladdress;

    // $this->idphonetypefiscaladdress  = $idphonetypefiscaladdress;
  // $this->phonefiscaladdress  = $phonefiscaladdress;        
    // $this->active  = $active; 
    // $this->deleted  = $deleted; 

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

                    if (!utilities::valOk($this->idstate)) {
                          $valid = false;
                          $msg .= "El dato Estado, ";
                    } // validate idstate

                    // if (!utilities::valOk($this->idcity)) {
                    //       $valid = false;
                    //       $msg .= "El dato ciudad, ";
                    // } // validate idcity                    
         

                    // if (!utilities::valOk($this->municipalityfiscaladdress)) {
                    //     $valid = false;
                    //       $msg .= "El dato municipio/parroquia, ";
                    // } // validate idcity   

                    if (!utilities::valOk($this->streetfiscaladdress)) {
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
                    // if (!utilities::valOk($this->buildingnumberfiscaladdress)) {
                    //     $valid = false;
                    //       $msg .= "El dato Apto./Nro./Nombre, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->suburbfiscaladdress)) {
                    //     $valid = false;
                    //       $msg .= "El dato Urb./Sector/Barrio/Vereda, ";
                    // } // validate idcity                       
                    // if (!utilities::valOk($this->postalcodefiscaladdress)) {
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

                    if (!utilities::valOk($this->idstate)) {

                          $msg .= "El dato Estado, ";
                    } // validate idstate

                    // if (!utilities::valOk($this->idcity)) {
                    //       $msg .= "El dato ciudad, ";
                    // } // validate idcity       



                    // if (!utilities::valOk($this->municipalityfiscaladdress)) {
                    //       $msg .= "El dato municipio/parroquia, ";
                    // } // validate idcity   

                    if (!utilities::valOk($this->streetfiscaladdress)) {
                          $msg .= "El dato Calle, ";
                    } // validate idcity                       
                    // if (!utilities::valOk($this->building)) {
                    //       $msg .= "El dato Res./Casa/Edif./Bloque, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->floor)) {
                    //       $msg .= "El dato Piso/Nivel, ";
                    // } // validate idcity                        
                    // if (!utilities::valOk($this->buildingnumberfiscaladdress)) {
                    //       $msg .= "El dato Apto./Nro./Nombre, ";
                    // } // validate idcity   

                    // if (!utilities::valOk($this->suburbfiscaladdress)) {
                    //       $msg .= "El dato Urb./Sector/Barrio/Vereda, ";
                    // } // validate idcity                       
                    // if (!utilities::valOk($this->postalcodefiscaladdress)) {
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
                $A[] = utilities::buildS($this->buildingnumberfiscaladdress);
                $A[] = utilities::buildS($this->suburbfiscaladdress);
                $A[] = utilities::buildS($this->municipalityfiscaladdress);
                $A[] = utilities::buildS($this->postalcodefiscaladdress);
                $A[] = utilities::buildS($this->idaddresstypefiscaladdress);
                $A[] = utilities::buildS($this->idstate);
                $A[] = utilities::buildS($this->idcity);
                $A[] = utilities::buildS($this->streetfiscaladdress);

                $A[] = utilities::buildS($this->active);
                $A[] = utilities::buildS($this->deleted);                                
                // $A[] = utilities::buildS($this->idcountry);


                // $A[] = utilities::buildS($this->avenue);
                // $A[] = utilities::buildS($this->building);
                // $A[] = utilities::buildS($this->floor);
                
                

                // $A[] = utilities::buildS($this->observation);

          }
          function buildArray_findid(&$A) {
                $A[] = ($this->code);
                $A[] = ($this->name);
                $A[] = ($this->idparty);
                $A[] = ($this->buildingnumberfiscaladdress);
                $A[] = ($this->suburbfiscaladdress);
                $A[] = ($this->municipalityfiscaladdress);
                $A[] = ($this->postalcodefiscaladdress);
                $A[] = ($this->idaddresstypefiscaladdress);
                $A[] = ($this->idstate);
                $A[] = ($this->idcity);
                $A[] = ($this->streetfiscaladdress);

                $A[] = ($this->active);
                $A[] = ($this->deleted);            
                // $A[] = ($this->code);
                // $A[] = ($this->name);
                // $A[] = ($this->idparty);
                // $A[] = ($this->idaddresstypefiscaladdress);
                // $A[] = ($this->idcountry);
                // $A[] = ($this->idstate);
                // $A[] = ($this->idcity);
                // $A[] = ($this->suburbfiscaladdress);
                // $A[] = ($this->municipalityfiscaladdress);
                // $A[] = ($this->avenue);
                // $A[] = ($this->building);
                // $A[] = ($this->floor );
                // $A[] = ($this->buildingnumberfiscaladdress);
                // $A[] = ($this->postalcodefiscaladdress );
                // $A[] = ($this->observation);
                // $A[] = ($this->active);
                // $A[] = ($this->deleted);
          }          

          function fillGrid($pn=0,$parname="",$parvalue="") {
                $par = "";
                $arrCol = array("id","code","name","idparty","idaddresstype","
idcountry","idstate","idcity","suburbfiscaladdress","avenue","
building","buildingnumberfiscaladdress","observation","active","deleted");
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
        
        function executeaddressfiscal($urloper="",$parAr=""){

           
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
                                 
				if ($nerr === true) 
                                     
					$msg = "Direccion de Fiscal Actualizacion ok. "; 
				else
					$msg = "Direccion de Fiscal Actualizacion Fallida. "; 
//				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
                           
				$nerr = $this -> insert($parAr);
         // var_dump("mmm-->".$nerr);
				if ($nerr === true) {
                                        $msg = "Direccion de Fiscal Registro ok. "; 
                                       //$_SESSION["mensaje"]=$msg;
//					$msg = "Insert Operation OK. ";
				}else{
                                        $msg = "Direccion de Fiscal Registro Fallida. "; 
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