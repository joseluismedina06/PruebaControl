<?php
	include_once("fpdf/fpdf.php");
 	include_once("printLayer.php");

	class generalRP extends PDFitalsis {
  
	        var $tit = "";
		var $infol1 = "";
		var $infol2 = "";
		var $infol3 = "";
		var $imagef = "";
		var $fontSizeTit = "";

              
  
		function Header() {
			$dimen=0.15;
			$salto=true;
			// Imagen 
			if ($this->PageNo() == 1) {
				$this->Image(PATHIMGDOLGRAM.$this->imagef,80,2,264*$dimen,90*$dimen);	
 		     	
				$this->SetFont('Arial','B',$this->fontSizeTit);
				$this->setY(2);
				$this->setX(5);
				$this->MultiCell(70,5,$this->infol1,0);
				$this->setY(6);
				$this->setX(5);
				$this->MultiCell(70,5,$this->infol2,0);
				$this->setY(10);
				$this->setX(5);
				$this->MultiCell(70,3,$this->infol3,0);
				$this->setY(18);
				$this->setX(5);
				$this->MultiCell(200,5,$this->tit,0,'C');
				$this->setY(25);
				
			}
			else {
				$this->Image(PATHIMGDOLGRAM.$this->imagef,80,2,264*$dimen,90*$dimen);	
				$this->SetFont('Arial','B',12);
				$this->setY(18);
			
				$this->setX(0);
				$this->MultiCell(200,5,$this->tit,0,'C');
				$this->setY(25);
			}
		

		
  		}

		function Footer()
		{
			$this->SetY(-15);
	    		//Arial italic 8
    			$this->SetFont('Arial','I',8);
    			//Número de página
    			$this->Cell(350,10,'Pag.'.$this->PageNo(),0,0,'C');
		}
		
		

 
       	 	function report($dl,$file,$fileLink,$com,$tit="",$infol1 = "", $infol2 = "", $infol3 = "",
				$headerCol="",$width="",$heigth=10,$fontSize=7,
				$link = "Exportar PDF",$end="",$txtEnd="",$imagef="Logo.jpg") {
			

			$this->tit = $tit;
			$this->infol1 = $infol1;
			$this->infol2 = $infol2;	
			$this->infol3 = $infol3;
			$this->imagef = $imagef;
						
			$this->SetFont('Arial','',6);
			$this->AddPage();
			$pl = new printLayer($dl,$width);
			

			
		
			$pl->fillReport($this,$com,$headerCol,$fontSize,$end,$txtEnd);
			$this->Close();
			$this->Output($file,"F");
	  		$file = "'".$file."'";
	  		$fileLink = "'".$fileLink."'";

			

		        echo '<a href="#" class="a_clRepLinks" onClick = "window.open('.$fileLink.')"> '.$link.' </a>';
        
	  
	    
	  
		}


		function reportArray($file,$fileLink,$res,$tit="",$infol1 = "", $infol2 = "", $infol3 = "",
				$headerCol="",$width="",$heigth=10,$fontSize=6,
				$link = "Exportar PDF",$end="",$txtEnd="",$imagef="Logo.jpg",$fontSizeTit=12) {
			

			$this->tit = $tit;
			$this->infol1 = $infol1;
			$this->infol2 = $infol2;	
			$this->infol3 = $infol3;
			$this->imagef = $imagef;
			$this->fontSizeTit = $fontSizeTit;

			
			$this->SetFont('Arial','',$fontSize);
			$this->AddPage();
			$pl = new printLayer("",$width);
			

			
		
			$pl->fillReportArray($this,$res,$headerCol,$fontSize,$end,$txtEnd);
			$this->Close();
			$this->Output($file,"F");
	  		$file = "'".$file."'";
	  		$fileLink = "'".$fileLink."'";

			

		        echo '<a href="#" class="a_clRepLinks" onClick = "window.open('.$fileLink.')"> '.$link.' </a>';
        
	  
	    
	  
		}

		function reportArrayNoLink($file,$res,$tit="",$infol1 = "", $infol2 = "", 
				$infol3 = "",$headerCol="",$width="",$heigth=10,$fontSize=6,
				$end="",$txtEnd="",$imagef="Logo.jpg") {
			

			$this->tit = $tit;
			$this->infol1 = $infol1;
			$this->infol2 = $infol2;	
			$this->infol3 = $infol3;
			$this->imagef = $imagef;

			
			$this->SetFont('Arial','',$fontSize);
			$this->AddPage();
			$pl = new printLayer("",$width);
			

			
		
			$pl->fillReportArray($this,$res,$headerCol,$fontSize,$end,$txtEnd);
			$this->Close();
			$this->Output($file,"F");
		}


		function reportArrayOnlyLink($fileLink,$link = "Exportar PDF") {
			$fileLink = "'".$fileLink."'";
			echo '<a href="#" class="a_clRepLinks" onClick = "window.open('.$fileLink.')"> '.$link.' </a>';	    
		}

        		

	}



?>
