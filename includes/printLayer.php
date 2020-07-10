<?php
	include_once("dataLayer.php");
  	include_once("fpdf/fpdf.php");
  
 
    
   
 	 class printLayer {
  
     
		 private $dl;
		 private $widths;
		 private $aligns;
     
	 
	 	function printLayer($dl="",$widths="",$aligns='') {

			$this->dl = $dl;
			$this->widths = $widths;
			$this->aligns = $aligns;

			
	 	} 
	
	
		function printdata(&$pdf,$data,$border=0) {
			
    			//Calculate the height of the row
    			$nb=0;
			$i=0;
			foreach ($data as $elem) {
    				$nb=max($nb,$this->NbLines($pdf,$this->widths[$i],$elem));
				$i++;
			}
    			$h=8*$nb;
    			//Issue a page break first if needed
    			$this->CheckPageBreak($pdf,$h);
    			//Draw the cells of the row
			$i = 0;
    			foreach ($data as $elem) 
    			{
				$w=$this->widths[$i];
        			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        			//Save the current position
        			$x=$pdf->GetX();
        			$y=$pdf->GetY();
        			//Draw the border
				if ($border) {
        				$pdf->Rect($x,$y,$w,$h);
				}
        			//Print the text
        			$pdf->MultiCell($w,10,$elem,0,$a);
        			//Put the position to the right of the cell
        			$pdf->SetXY($x+$w,$y);
				$i++;
    			}
    			//Go to the next line
    			$pdf->Ln($h);
			
			
			
		}

		function CheckPageBreak(&$pdf,$h)
		{
    			//If the height h would cause an overflow, add a new page immediately
    			if($pdf->GetY()+$h>$pdf->PageBreakTrigger)
        			$pdf->AddPage($pdf->CurOrientation);
		}

		function NbLines(&$pdf,$w,$txt)
		{
    			//Computes the number of lines a MultiCell of width w will take
    			$cw=&$pdf->CurrentFont['cw'];
    			if($w==0)
        			$w=$pdf->w-$pdf->rMargin-$pdf->x;
    			$wmax=($w-2*$pdf->cMargin)*1000/$pdf->FontSize;
    			$s=str_replace("\r",'',$txt);
    			$nb=strlen($s);
    			if($nb>0 and $s[$nb-1]=="\n")
        		$nb--;
    			$sep=-1;
    			$i=0;
    			$j=0;
    			$l=0;
    			$nl=1;
    			while($i<$nb)
    			{
        			$c=$s[$i];
        			if($c=="\n")
        			{
            				$i++;
            				$sep=-1;
            				$j=$i;
            				$l=0;
            				$nl++;
            				continue;
        			}
        			if($c==' ')
            				$sep=$i;
        			$l+=$cw[$c];
        			if($l>$wmax)
        			{
            				if($sep==-1)
            				{
                				if($i==$j)
                    					$i++;
            				}
            				else
                				$i=$sep+1;
            				$sep=-1;
            				$j=$i;
            				$l=0;
            				$nl++;
        			}
        			else
            				$i++;
    			}
    		return $nl;
	}
	     

		
	
      		function fillReport(&$pdf,$com,$headerCol,$fontSize=7,$end="",$txtEnd="") {

	
     			$res = $this->dl->executeReader($com);
			$nr = count($res);
			$pdf->SetFont('Arial','B',6);
			$this->printdata($pdf,$headerCol,1);
			$pdf->SetFont('Arial','',6);			
			for ($i=0;$i<$nr;$i++) {
             			$reg = $res[$i];
				$this->printdata($pdf,$reg);
				$pdf->Ln(16);
			}
			
			if ($end != "") {
				
				unset($reg);
				foreach($this->widths as $w) {
					$reg[] = "";
				}
				$ne = count($reg);
				$reg[$ne-2] = $txtEnd;
				$reg[$ne-1] = $end;
				$pdf->SetFont('Arial','B',6);
				$this->printdata($pdf,$reg);
				$pdf->SetFont('Arial','',6);	
			}
			  
			      		
			
	
		    			                 
		} // fillReport
			 

		function fillReportArray(&$pdf,$res,$headerCol,$fontSize=6,$end="",$txtEnd="") {

			$pdf->SetFont('Arial','B',$fontSize);
			$this->printdata($pdf,$headerCol,1);
			$pdf->SetFont('Arial','',$fontSize);

			foreach ($res as $reg) {
    				$this->printdata($pdf,$reg);
			}
			
			
			
			if ($end != "") {
				
				unset($reg);
				foreach($this->widths as $w) {
					$reg[] = "";
				}
				$ne = count($reg);
				$reg[$ne-2] = $txtEnd;
				$reg[$ne-1] = $end;
				$pdf->SetFont('Arial','B',$fontSize);
				$this->printdata($pdf,$reg);
				$pdf->SetFont('Arial','',$fontSize);	
			}
			  
			      		
			
	
		    			                 
		} // fillReportArray
			 
	}
	
	


	
     

?>
