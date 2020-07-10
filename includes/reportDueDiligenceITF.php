
<?php
	include_once("fpdf/fpdf.php");
	chdir(dirname(__FILE__));
 	include_once("printLayer.php");
	chdir(dirname(__FILE__));
	
 	
	class reportDueDiligenceITF extends PDFitalsis {
  

		function Header() {
			$dimen=0.25;
			// Imagen 
			$this->Image("/srv/www/htdocs/italsis/images/DD.jpg",2,2,1076*$dimen,701*$dimen);	
 		     	
			
				
		}
		function Footer()
		{
		}
		
		 
       	 	function report($firstName="", $middleName="", $lastName="", $secondLastName="",
				$documentid="", $birthdate="",$phone="",$address="",$citizenship="",
				$occupation="", $email="",$workaddress="", $workphone="",
				$agent="", $trdate="",$reference="",$amount="",$srccountry="",$dstcountry="",
				$recipient="", $familyrelationship="",$recipientbirthdate="",$recipientaddress="",
				$sourceoffunds="",
				$pospep1="",$entpep1="",$datepep1="",
				$pospep2="",$entpep2="",$datepep2="",
				$file="res.pdf",$link="Reporte") {
			
				
			
						
			$this->SetFont('Arial','B',10);
			$this->AddPage();
			$this->setY(33);
			$this->setX(50);
			$this->MultiCell(70,5,$firstName,0);
			$this->setY(33);
			$this->setX(175);
			$this->MultiCell(70,5,$middleName,0);
			$this->setY(40);
			$this->setX(50);
			$this->MultiCell(70,5,$lastName,0);
			$this->setY(40);
			$this->setX(175);
			$this->MultiCell(70,5,$secondLastName,0);
			$this->setY(45);
			$this->setX(80);
			$this->MultiCell(70,5,$documentid,0);
			$this->setY(50);
			$this->setX(100);
			$this->MultiCell(70,5,$birthdate,0);
			$this->setY(50);
			$this->setX(175);
			$this->MultiCell(70,5,$phone,0);
			$this->setY(55);
			$this->setX(50);
			$this->SetFont('Arial','',8);
			$this->MultiCell(100,5,$address,0);
			$this->SetFont('Arial','B',10);
			$this->setY(55);
			$this->setX(175);
			$this->MultiCell(70,5,$citizenship,0);
			$this->setY(60);
			$this->setX(50);
			$this->MultiCell(70,5,$occupation,0);
			$this->setY(60);
			$this->setX(175);
			$this->MultiCell(70,5,$email,0);
			$this->setY(65);
			$this->setX(50);
			$this->SetFont('Arial','',8);
			$this->MultiCell(100,5,$workaddress,0);
			$this->SetFont('Arial','B',10);
			$this->setY(65);
			$this->setX(175);
			$this->MultiCell(70,5,$workphone,0);
			$this->setY(74);
			$this->setX(50);
			$this->MultiCell(70,5,$agent,0);
			$this->setY(74);
			$this->setX(200);
			$this->MultiCell(70,5,$trdate,0);
			$this->setY(81);
			$this->setX(53);
			$this->MultiCell(70,5,"X",0);
			$this->setY(81);
			$this->setX(160);
			$this->MultiCell(70,5,$reference,0);
			$this->setY(86);
			$this->setX(50);
			$this->MultiCell(70,5,$amount,0);
			$this->setY(91);
			$this->setX(50);
			$this->MultiCell(70,5,$srccountry,0);
			$this->setY(91);
			$this->setX(160);
			$this->MultiCell(70,5,$dstcountry,0);
			$this->setY(97);
			$this->setX(100);
			$this->MultiCell(70,5,$recipient,0);
			$this->setY(97);
			$this->setX(200);
			$this->MultiCell(70,5,$familyrelationship,0);
			$this->setY(101);
			$this->setX(100);
			$this->MultiCell(70,5,$recipientbirthdate,0);
			$this->setY(101);
			$this->setX(203);
			$this->MultiCell(70,5,$recipientaddress,0);
			$this->setY(106);
			$this->setX(85);
			$this->MultiCell(70,5,$sourceoffunds,0);
			if ($pospep1 != "" || $pospep1 != "") {
				$this->setY(110);
				$this->setX(115);
				$this->MultiCell(70,5,"X",0);
			} 
			else {
				$this->setY(110);
				$this->setX(156);
				$this->MultiCell(70,5,"X",0);
			}
			$this->setY(116);
			$this->setX(40);
			$this->MultiCell(70,5,$pospep1,0);
			$this->setY(116);
			$this->setX(140);
			$this->MultiCell(70,5,$entpep1,0);
			$this->setY(116);
			$this->setX(220);
			$this->MultiCell(70,5,$datepep1,0);
			$this->setY(120);
			$this->setX(40);
			$this->MultiCell(70,5,$pospep2,0);
			$this->setY(120);
			$this->setX(140);
			$this->MultiCell(70,5,$entpep2,0);
			$this->setY(120);
			$this->setX(220);
			$this->MultiCell(70,5,$datepep2,0);								
			$this->Close();
			$this->Output("/srv/www/htdocs/italsis/includes/PDF/".$file,"F");
	  		$file = "'http://185.25.252.65/italsis/includes/PDF/".$file."'";
	  		
			

		        echo '<a href="#" class="a_clRepLinks" onClick = "window.open('.$file.')"> '.$link.' </a>';
        
	  	  
		}


		        		

	}

	/*$rep = new reportDueDiligenceITF("L");
	$rep->report("Manuel","Juan","Vazquez","Outomuro",
		     "9965231","13/05/1969","0416 610 62 09",
			"Calle Succre Chacao","Venezolano",
			"Ingeniero","mvazquezo@gmail.com",
			"Torre Camorucuo Avda Urdaneta","501 11 11",
			"ITF Avda Balboa","27/05/2016","67856455",
			"2300","Panama","Espana",
			"Maria Victoria Vazquez Leon","Hija",
			"27/05/2009","Chacao Caracas",
			"Sueldos y Salarios",
			"Ministro","Fundayacucho","01/04/2015",
			"Embajador","Italia","01/01/2013");*/



?>
