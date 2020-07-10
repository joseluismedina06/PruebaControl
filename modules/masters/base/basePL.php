<?php
	chdir(dirname(__FILE__));
	include_once("../../../init.php");	
	include_once("../../../includes/utilities.php");	


	class basePL {	
		private $form;
		private $sLink; // saveLink
		private	$dLink; // deleteLink
		private $pLink; // printLink
		private $cLink; // cleanLink
		private $fLink; // findLink
		

		function __construct($form = "",
			$sLink = "",
			$dLink = "",
			$pLink = "",
			$cLink = "",
			$fLink = "") {
			$this->form = $form;			
			$this->sLink = $sLink;
			$this->dLink = $dLink;
			$this->pLink = $pLink;
			$this->cLink = $cLink;
			$this->fLink = $fLink;


		}
		
	    public static function buildexit($nl=3,$logo) {
			return utilities::buildexit($nl,$logo);

		}

		public static function buildjs($nl=3) {
			return utilities::buildjs($nl);
		}
        //añadido tabs se desconoce el autor
		public static function buildDetail($nl=3) {
			return utilities::buildDetail($nl);
		}
        //fin tabs
		public static function buildccs($nl=3) {
			return utilities::buildccs($nl);
		}

		public static function getReq($R,$var) {
			return utilities::getReq($R,$var);
		}
		
		public static function getReqCheck($R,$var) {
			return utilities::getReqCheck($R,$var);
		}
			
		public function buildEvent($pag,$action) {
			$url = $pag."?urloper=".$action;
			$onClick = "changeAction(".$this->form.",'".$url."')";
			return $onClick;
		}

		function showButtons ($save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {

			
			if ($save == "Y") {
	  			echo '<img src="'.PATH.'images/Save.png" width="28" height="28" onClick = "changeAction('.$this->form.',';
				echo "'".$this->sLink."')".'"';
				echo ' title="Save">';
			}
			if ($delete == "Y") {
          			echo '<img src="'.PATH.'images/Delete.png" width="28" height="28" onClick = "changeAction('.$this->form.',';
				echo "'".$this->dLink."')".'"';
				echo ' title="Delete">';
			}
			if ($print == "Y") {
	    			echo '<img src="'.PATH.'images/Printer.png" width="27" height="28" onClick = "changeAction('.$this->form.',';
				echo "'".$this->pLink."')".'"';
				echo ' title="Print">';
			}
			if ($clean == "Y") {
	    			echo '<img src="'.PATH.'images/Clean.png" width="27" height="28" onClick = "changeAction('.$this->form.',';
				echo "'".$this->cLink."')".'"';
				echo ' title="Clean">';
			}
			if ($find == "Y") {
	    			echo '<img src="'.PATH.'images/Search.png" width="27" height="28" onClick = "changeAction('.$this->form.',';
				echo "'".$this->fLink."')".'"';
				echo ' title="Search">';
			}
			
		}
		

	} // basePL

?>

