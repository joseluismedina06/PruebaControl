<?php
    chdir(dirname(__FILE__));
	include_once("../../../includes/utilities.php");
	include_once("../../../includes/facadeMaster.php");
	


	class baseBL {

		// standard fields, code name
		protected $fm;
		protected $dl;
		
		protected $scheme;
		protected $table;
		protected $code;
		protected $name;
		protected $active;
		protected $deleted;
		
        //nueva linea para baseBL.php 03/04/2018
        protected $opdl;
        //fin nueva linea para baseBL.php 03/04/2018
              
		//03/04/2018 se agrego $opdl="" como nuevo parametro
		function __construct($scheme="",$table="",$code="",$name="",$active="",$deleted="",$opdl="") {

			$fm = new facadeMaster();
			$this->fm = $fm;
			//$this->dl = $fm->dl;
			//nueva linea para baseBL.php 03/04/2018
            if ($opdl == "dl" || $opdl == ""){
                $this->dl = $fm->dl; 
            }
            if ($opdl == "dlSQL"){
                $this->dl = $fm->dlSQL; 
            }
			//fin nueva linea para baseBL.php 03/04/2018
			$this->scheme = $scheme;
			$this->table = $table;
			$this->code = $code;
			$this->name = $name;
			$this->active = $active;
			$this->deleted = $deleted;
			
			
			
			
		} //constructor

		function __destruct() {
			
		} // destructor

		function buildArray(&$A)  {
		}

		function buildLinks($pag,$pn,&$sLink,&$dLink,&$pLink,&$cLink,&$fLink,&$fbnLink,&$action,$parS="") {
			
			$sLink = $pag."?urloper=save&pn=".$pn.$parS;
			$dLink = $pag."?urloper=delete&pn=".$pn.$parS;
			$pLink = $pag."?urloper=print&pn=".$pn.$parS;
			$cLink = $pag."?urloper=clear&pn=".$pn.$parS;
			$fLink = $pag."?urloper=find&pn=".$pn.$parS;
			$fbnLink = $pag."?urloper=findByName&pn=".$pn.$parS;			
		

			$action = $pag;

		} //buildLinks
		
		//Traida del 67 no esta en 65 ni 69
		function buildLinksPn($pag,$pnname,$pn,&$sLink,&$dLink,&$pLink,&$cLink,&$fLink,&$fbnLink,&$action,$parS="") {
			
			$sLink = $pag."?urloper=save&".$pnname."=".$pn.$parS;
			$dLink = $pag."?urloper=delete&".$pnname."=".$pn.$parS;
			$pLink = $pag."?urloper=print&".$pnname."=".$pn.$parS;
			$cLink = $pag."?urloper=clear&".$pnname."=".$pn.$parS;
			$fLink = $pag."?urloper=find&".$pnname."=".$pn.$parS;
			$fbnLink = $pag."?urloper=findByName&".$pnname."=".$pn.$parS;			
		

			$action = $pag;

		} //buildLinksPn

		function validate() {
			$valid = true;
			$msg = "";
			
			if (!utilities::valOk($this->code)) {
				$valid = false;
				$msg .= "A value must be given to field code ";
			} // validate code 
			
		
			if (!utilities::valOk($this->name)) {
				$valid = false;
				$msg .= "A value must be given to field name ";		
			} // validate name

			if ($msg != "")
				utilities::alert($msg);

			return ($valid);
		}


		function insertNP($showerror=1) {
			$this->buildArray($parAr);
			$name = $this->scheme.".isspins".$this->table;
			
			
			$nerr = $this->dl->executeSP($name,$parAr);
			$res = "";
			if ($showerror) { 
				$res = $nerr;
			}
			return ($res);
		}

		function updateNP($id,$showerror=1) {
			$this->buildArray($parAr);
			$arrId[] = $id;
			$parAr = array_merge($arrId,$parAr);
			$name = $this->scheme.".isspupd".$this->table;
			//echo $name."<br>";
			//print_r($parAr);
			//exit(1);
			$nerr = $this->dl->executeSP($name,$parAr);
			$res = "";
			if ($showerror) { 
				$res = $nerr;
			}
			
			return ($res);
		}

		function insert($parAr) {
			$nerr = false;
			if ($this->validate()) {
				$name = $this->scheme.".isspins".$this->table;
				//echo $name."<br>";
				//print_r($parAr);
				//echo "<br>";
				$nerr = $this->dl->executeSP($name,$parAr);
			}
			return ($nerr);
	   		
	   	} //insert

		function update($parAr) {
			$nerr = false;
			if ($this->validate()) {
				
				$name = $this->scheme.".isspupd".$this->table;
				$nerr = $this->dl->executeSP($name,$parAr);
				
			}
			return ($nerr);
	   		
	   	} //insert

		// assummed id, first position
		function select(&$parAr) {
			$nerr = false;
			$name = $this->scheme.".isspget".$this->table;
			$ne = count($parAr);
			for ($i=1;$i<$ne;$i++) {
				$parAr[$i] = "";
			}
			
			$nerr = $this->dl->executeSPget($name,$parAr[0],$parAr);
			
			return ($nerr);
	   		
	   	} //select


		function existsId($id) {
			$res = 0;
			$com = "SELECT count(*) FROM ".$this->scheme.$this->table." WHERE id =".$id;
			
			$arr = $this->dl->executeReader($com);
			$res = count($arr);
			
			return ($res);
	   		
	   	} //select


		function selectNameById($id) {
			$com = "SELECT name FROM ".$this->scheme.".".$this->table." WHERE id = ".$id;
			return $this->dl->executeScalar($com);
			
		}
		function selectByName(&$parAr,$name) {
			$nerr = false;
			$namesp = $this->scheme.".isspget".$this->table."byname";
			$ne = count($parAr);
			for ($i=0;$i<$ne;$i++) {
				$parAr[$i] = "";
			}
			$nerr = $this->dl->executeSPget($namesp,"'".$name."'",$parAr);
			
			return ($nerr);
	   		
	   	} //select


		// OBTAIN SEVERAL
		function selectByCol(&$parAr,$nameCol,$valueCol) {
			$nerr = false;
			$this->buildArray($parAr);
			$namesp = $this->scheme.".isspget".$this->table."by".$nameCol;
			$ne = count($parAr);
			for ($i=0;$i<$ne;$i++) {
				$parAr[$i] = "";
			}
			$nerr = $this->dl->executeSPget($namesp,"'".$valueCol."'",$parAr);
			
			return ($nerr);
	   		
	   	} //select

		// OBTAIN SEVERAL
		function selectByColLast(&$parAr,$nameCol,$valueCol) {
			$nerr = false;
			$this->buildArray($parAr);
			$namesp = $this->scheme.".isspget".$this->table."by".$nameCol."last";
			$ne = count($parAr);
			for ($i=0;$i<$ne;$i++) {
				$parAr[$i] = "";
			}
			$nerr = $this->dl->executeSPget($namesp,"'".$valueCol."'",$parAr);
			
			return ($nerr);
	   		
	   	} //select


		function execute($urloper,&$parAr,$name="") {
			
			if ($urloper == "update") {
				$nerr = $this -> update($parAr);
				if ($nerr === true) 
					$msg = "Operacion de Actualizacion OK. ";
				else
					$msg = "Operacion de Actualizacion Fallo. ";
				utilities::alert($msg);
			} // update

			if ($urloper == "insert") {
				$nerr = $this -> insert($parAr);
				if ($nerr === true) 
					$msg = "Operacion de Registro OK. ";
				else
					$msg = "Operacion de Registro Fallo. ";
				utilities::alert($msg);
			} // update

			if ($urloper == "find") {
				$nerr=$this -> select($parAr);
				
			}
			if ($urloper == "findByName") {
				$nerr=$this -> selectByName($parAr,$name);
				
			}
				
						
		}
			
		function fillGrid($arrCol,$par="",$np=0,$pageSize=10) {
			$com = "SELECT * FROM ".$this->scheme.".isspget".$this->table."()";
			return $this->dl->fillGrid($com, $arrCol,$par,$pageSize,$np);
		}
		
		//traida del 67 no esta en 65 ni 69
		function fillGridComPlain($com,$arrCol,$width=900,$arrWidth="") {
			return $this->dl->fillGridPlain($com, $arrCol,$width,$arrWidth);

		}
		
		function fillGridCom($com,$arrCol,$par="",$np=0,$pageSize=10) {
			return $this->dl->fillGrid($com, $arrCol,$par,$pageSize,$np);
		}
		
		//traida del 67 no esta en 65 ni 69
		function fillGridComPn($com,$arrCol,$pnname,$par="",$np=0,$pageSize=10,$width=900) {
			return $this->dl->fillGridPnname($com, $arrCol,$pnname,$par,$pageSize,$np,$width);
		}
			
		
		function fillGridDisplay($arrCol,$par="",$np=0,$pageSize=10) {
			$com = "SELECT * FROM ".$this->scheme.".isspget".$this->table."display()";
			return $this->dl->fillGrid($com, $arrCol,$par, $pageSize,$np);
		}

		function fillGridDisplayParameter($arrCol,$parName="",$parValue="",$np=0,$pageSize=10) {
			$com = "SELECT * FROM ".$this->scheme.".isspget".$this->table."display".$parName."(".$parValue.")";
			return $this->dl->fillGrid($com, $arrCol,$par, $pageSize,$np);
		}


		function fillGridDisplayMethod($method,$arrCol,$par,$np=0,$pageSize=10) {
			
			$com = "SELECT * FROM ".$this->scheme.".isspget".$this->table.$method."()";
			return $this->dl->fillGrid($com, $arrCol,$par, $pageSize,$np);
		}

		function fillGridByName($name,$arrCol,$np=0,$pageSize=10) {

			$com = $this->scheme.".isspget".$this->table."byname('".$name."')";			
		 	return $this->dl->fillGrid($com, $arrCol,$pageSize,$np);
		}	


		function fillForeignTableCombo($foreignTable,$curVal,$foreigncheme="") {
			if ($foreigncheme != "") {
				$com = "SELECT * FROM ".$foreigncheme.".isspget".$foreignTable."() ";
			}
			else {
				$com = "SELECT * FROM ".$this->scheme.".isspget".$foreignTable."() ";
			}
			
			//echo "baseBL:fillForeignTableCombo ".$com."<br>";
			
			return $this->dl->fillCombo($com,"id","name",$curVal);
		}
		
		//traida del 67 no esta en 65 ni 69
		function fillForeignTableComboParam($foreignTable,$curVal,$foreigncheme="",$param) {
			if ($foreigncheme != "") {
				$com = "SELECT * FROM ".$foreigncheme.".isspget".$foreignTable."() ";
			}
			else {
				$com = "SELECT * FROM ".$this->scheme.".isspget".$foreignTable."() ";
			}
			
			
			return $this->dl->fillCombo($com,"id",$param,$curVal);
		}

		function fillForeignTableComboActive($foreignTable,$curVal,$foreigncheme="") {
			if ($foreigncheme != "") {
				$com = "SELECT * FROM ".$foreigncheme.".isspget".$foreignTable."active() ";
			}
			else {
				$com = "SELECT * FROM ".$this->scheme.".isspget".$foreignTable."active() ";
			}
			
			//echo "baseBL:fillForeignTableCombo ".$com."<br>";
			
			return $this->dl->fillCombo($com,"id","name",$curVal);
		}

		function fillForeignTableComboWithRestriction($foreignTable,$curVal,$restCol,$restVal,$foreignscheme="") {
			
			
			if ($restCol != "" && $restVal != "") {
				if ($foreignscheme != "") {
					$com = "SELECT * FROM ".$foreignscheme.".isspget".$foreignTable."by".$restCol."(".$restVal.") ";
				
				}
				else {
					$com = "SELECT * FROM ".$this->scheme.".isspget".$foreignTable."by".$restCol."(".$restVal.") ";
				}
				//echo $com;
			}
			else {
				if ($foreignscheme != "") {
					$com = "SELECT * FROM ".$foreignscheme.".isspget".$foreignTable."() ";
				
				}
				else {
					$com = "SELECT * FROM ".$this->scheme.".isspget".$foreignTable."() ";
				}
				//echo $com;
			
			}
			//echo $com."<br>";
			return $this->dl->fillCombo($com,"id","name",$curVal);
		}
		
		function fillComboCom($com,$valCol,$showCol,$curVal) {
			return $this->dl->fillCombo($com,$valCol,$showCol,$curVal);
		}

		function executeReader($com) {
			return $this->dl->executeReader($com,false);
		}
		function executeCommand($com) {
			return $this->dl->executeCommand($com);
		}
		function executeScalar($com) {
			return $this->dl->executeScalar($com);
		}
		function executeSP($name,$parAr) {
			return $this->dl->executeSP($name,$parAr);
		}
		
		                /*21 de febrero 2018
		Autor: Isaac Sanabria, Christian Paez
		Funci�n checkuser Chequea Permisologia del usuario
		*/

                function checkuser($iduser,$url,$regis) {
        		$url2="'".$url."'";
			$com= "select * from security.userinfunction($iduser,$url2,'".$regis."')";
			//var_dump($com);
                        return $this->executeScalar($com);
		} 
                
                /*21 de febrero 2018
		Autor: Isaac Sanabria, Christian Paez
		Funci�n getModules($idsystem) obtiene una lista de los sistemas a los cuales tiene acceso el usuario logueado
		*/
		function getSystems($iduser,$regis){
			$com = "select * from security.isspgetsystemmenu($iduser,'".$regis."')";
			$response = $this->dl->executeReader($com);
			return $response;
		}              
 
                
        /*
		21 de febrero 2018
		Autor: Isaac Sanabria, Christian Paez
		Funci�n getModules($idsystem) obtiene una lista de los m�dulos segun un sistema "x"
		*/
		function getModules($idsystem,$iduser,$regis){
			$com = "select * from security.isspgetmodulemenu($iduser,$idsystem,'".$regis."')";
			$response = $this->dl->executeReader($com);
			return $response;
		}
                
		/*
		22 de febrero 2018
		Autor: Isaac Sanabria, Christian Paez
		Funci�n getFunctions($idmodule) obtiene una lista de las funciones segun un modulo "x"
		*/
		function getFunctions($idmodule,$iduser,$regis){
			$com = "select * from security.isspgetfunctionmenu($iduser,$idmodule,'".$regis."')";
			$response = $this->dl->executeReader($com);
			return $response;
		}   
                
                
        function fillForeignTableComboParamBoth($foreignTable,$curVal,$foreigncheme="",$param,$param2) {
            if ($foreigncheme != "") {
                $com = "SELECT * FROM ".$foreigncheme.".isspget".$foreignTable."() ";
            }
            else {
                $com = "SELECT * FROM ".$this->scheme.".isspget".$foreignTable."() ";
            }
                return $this->dl->fillCombo($com,$param2,$param,$curVal);
        }

	} //baseBL
?>