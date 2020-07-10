<?php
	include_once("sqldbITALSIS.php");
	include_once("presentationLayer.php");
	
  	class dataLayer {

		private $server;
         	private $user;
	 	private $password;
	 	private $database;
		
	 	var $con; // connection object 


	 	function __construct($server,$user,$password,$database) {
			$this->server = $server;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
			
			
	 	} 

		


		function open() {
			$this->con = new sqldbITALSIS($this->server,$this->user,$this->password,$this->database);
                        $this->con->sqlConnect($this->server,$this->user,$this->password,$this->database);
                        
			
		} // open

		function close() {
			$this->con -> sqlClose();
		} // close


		function executeScalar($com) {
	   		$this->open();
			$con = $this->con;        	
			$resc = $con -> sqlQuery($com);
			
			$resc= $con->sqlAllRows($resc);

			$res = 0;
			if (is_array($resc)) {
				$nr = count($resc);
			
				if ($nr == 1) {
					$nc = count($resc[0]);
				
					if ($nc == 1) {
						foreach($resc[0] as $res);
					}
				}
			}
			
			$this->close();
			return $res;
						
	  	} //executeScalar

		function executeReader($com,$columnNames=true) {
	   		$this->open();
			$con = $this->con;        	
	        	$res = $con -> sqlQuery($com);
			if ($columnNames) 
				$res = $con->sqlAllRowsWithColumnsNames($res);
			else
				$res = $con->sqlAllRows($res);
			$this->close();
			return $res;
					
				
	  	} //executeReader

		function executeCommand($com) {
	   		$this->open();
			$con = $this->con;        	
	        	            $res = $con -> sqlQuery($com);
			//11/16/2014 when fails return error message, otherwise $resource
	        		
			if (is_string($res)) {
				//echo "ERROR: dataLayer::executeCommand ".$com."<br>";
				$nr = 0;
			}
			else {
				$nr = 1;
			}	
			$this->close();
			return $nr;
					
				
	  	} //executeReader



		function executeReaderPaged($com,$ne,$np,$columNames=true) {
	   		$this->open();
			$con = $this->con; 
			$comOrig = $com;
			$com .= " LIMIT ".$ne." OFFSET ".($ne*$np); 
			
			$res = $con -> sqlQuery($com);
			
			
			
			
			if ($columnNames) 
				$res = $con->sqlAllRowsWithColumnsNames($res);
			else
				$res = $con->sqlAllRows($res);

			
			
			$this->close();
			return $res;
					
				
	  	} //executeReaderPaged


		// $name contains scheme
		function executeSP($name,$parAr) {
			
			$this->open();
			$con = $this->con;  
			 
			$com = "SELECT ".$name."(";
			foreach ($parAr as $par) {	
				if (($par==NULL) && !(is_numeric($par))) {
    					$com.="NULL,";
				}
				else {
					
					$com.=$par.",";
				}
			}
			$com = substr($com,0,strlen($com)-1).")";

			
			//echo "SP = ".$com."<br>";
			
     			//11/16/2014 when fails return error message, otherwise $resource
	        	$res = $con -> sqlQuery($com);
			
			
			if (is_string($res)) {
				//echo "ERROR: dataLayer::executeSP ".$name."<br>";
				//print_r($parAr)."<br>";
				//echo "Res =".$res."<br>";
				//echo $com."<br>";
				
				$res = false;
			}
			else {
				$res = true;
			}
			$this->close();			
			return $res;
				
	  	} //executeSP	

		// 2018/05/05 MVO, insert and return id inserted
		function executeSPid($name,$parAr) {
			
			$this->open();
			$con = $this->con;  
			 
			$com = "SELECT ".$name."(";
			foreach ($parAr as $par) {	
				if (($par==NULL) && !(is_numeric($par))) {
    					$com.="NULL,";
				}
				else {
					
					$com.=$par.",";
				}
			}
			$com = substr($com,0,strlen($com)-1).")";

			
			
			
     			$res = $con -> sqlQuery($com);
			$qfr = $con -> sqlFetchRow($res);
			foreach ($qfr as $row);
			
			$this->close();			
			return $row;
				
	  	} //executeSPid	


		function executeSPget($name,$id,&$parAr) {
			
	   		$this->open();
			$con = $this->con;  
			 
			$com = "SELECT * FROM ".$name."(".$id.")";
			
			//echo $com."<br>";
			
     			//11/16/2014 when fails return error message, otherwise $resource
	        	$res = $con -> sqlQuery($com);
			
			if (is_string($res)) {
				$res = false;
			}
			else {
				$res = $con->sqlAllRows($res);
				// 11/16/2014
				// When not found, fills a record with one row in blank
				if (count($res) > 0) {
					$res = $res[0];
					if (count($res) > 0) {
						$i = 0;
						foreach ($res as $par) {
    							$parAr[$i] = $par;
							$i++;
						}	
					}
					else {
						$i = 0;
						foreach ($parAr as $par) {
    							$parAr[$i] = "";
							$i++;
						}	
						
					}
				}
				
				$res = true;
			}
			$this->close();
			//print_r($parAr);			
			return $res;
				
	  	} //executeSP	


		//$com = qurey
		//$val value field  
		//$opc showfield
		//$sel current falue
		function fillCombo($com,$val,$opc,$sel="") {
			$res = $this->executeReader($com);
			
			$nr = count($res); 
			echo '<option value="">---Seleccione ---</option>';
     			for ($i=0; $i < $nr; $i++) {
        			$reg = $res[$i];	
				if ($sel == $reg[$val])
					echo '<option value="'.$reg[$val].'" selected>'.$reg[$opc].' </option>';
				else
					echo '<option value="'.$reg[$val].'">'.$reg[$opc].'</option>';
	 		}
            		
      		}  // fillCombo



		
		
		function fillGrid($com, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900) {

			
			$res = $this->executeReaderPaged($com,$pageSize,$pageNumber,false);
			presentationLayer::fillGridArr($res, $arrCol,$par,$pageSize,$pageNumber,$width);
			
		}

		function fillGridPlain($com, $arrCol,$width=900,$arrWidth="") {

			$res = $this->executeReader($com,false);
			presentationLayer::fillGridArrPlain($res, $arrCol,$width,$arrWidth);
			
			
		}
	
		function fillGridPnname($com, $arrCol,$pnname,$par="",$pageSize=10,$pageNumber=0,$width=900) {

			
			$res = $this->executeReaderPaged($com,$pageSize,$pageNumber,false);
			presentationLayer::fillGridArrPnname($res, $arrCol,$pnname,$par,$pageSize,$pageNumber,$width);
			
		}
		
		
/////////////////////////////multiple selecion  checkbox////////////////////////////////////
// simplificar el codigo

      		function fillComboChecks1($name,$id,$mod,$com,$val,$opc,$sel="",$event="",$disabled="") {
      			$res = $this->executeReader($com);
      			$nr = count($res);
      			$nr2 = $nr / 3;
      			$nr2 = round($nr2);
      			$nr3 = $nr2 + $nr2;
      		
      			echo '<TABLE class="italsis">';
      			echo '<TH>';
      			echo '<div> Selecione</div>';
      			echo '</TH>';
      			echo '<TH>';
      			echo " Code";
      			echo '</TH>';
      			echo '<TH>';
      			echo "Name";
      			echo '</TH>';
      			
      			for ($i=0; $i < $nr; $i++) {
      				$reg = $res[$i];      		
      				if ($sel == $reg[$val]){
      					echo '<TR>';
      					echo '<SPAN>';
      					echo '<TD>';
      					echo '<INPUT '.$disabled.' name = "'.$name.$i.'"  type = "checkbox" id="'.$reg['id'].'" value="'.$reg['id'].'"';
      					echo '</SPAN>';
      					echo '</TD>';
      					if ($val) {
      						echo ' checked';
      					}
      					if ($event != "") {
      						echo ' onClick="'.$event.'"';
      					}
      					echo ' </INPUT>';
      					echo '<TD>';
      					echo $reg["code"];
      					echo '</TD>';
      					echo '<TD>';
      					echo $reg["name"];
      					echo '</TD>';
      				
      				}else{
      		
      					echo '<TR>';
      					echo '<SPAN>';
      					echo '<TD>';
      					echo '<INPUT '.$disabled.' name = "'.$name.$i.'"  type = "checkbox" id="'.$reg['id'].'" value="'.$reg['id'].'"';
      					echo '</SPAN>';
      					echo '</TD>';
      					if ($event != "") {
      						echo ' onClick="'.$event.'"';
      					}
      					//echo ' >';
      					echo ' </INPUT>';
      					echo '<TD>';
      					echo $reg["code"];
      					echo '</TD>';
      					echo '<TD>';
      					echo $reg["name"];
      					echo '</TD>';
      				
      					echo '</TR>';
      				}
      			}
      			echo '</TABLE>';
      			echo '</DIV>';
      			echo '<input type="hidden" id="nr" name="nr" value="'.$nr.'">';
      			echo '</div>';
      		}
      		
      		 function fillComboChecks($name,$id,$mod,$com,$val,$opc,$sel="",$event="",$disabled="",$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {
      		
      				
      				
      			$res = $this->executeReader($com);
      			$nr = count($res);
      			$nc = count($arrCol);
      			echo '<table class="italsis" width="'.$width.'" >';
      			echo "  <tr> ";
      		
      			$pnc = $pageNumber;
      		
      		
      			if ($check) {
      				echo "<th>Procesar</th>";
      		
      			}
      		
      			if ($select) {
      				echo "<th>Seleccionar</th>";
      		
      			}
      		
      		
      			for($i=0; $i < $nc; $i++) {
      				$name = $arrCol[$i];
      				echo "<th>".$name."</th>";
      		
      			}
      			$end = 0;
      			echo "</tr>";
      			//print_r($arr);
      			if (is_array($res)) { // bring values
      				for($i=0; $i < $nr; $i++) {
      					echo "  <tr > ";
      						
      					$reg = $res[$i];
      					if ($check) {
      						$name = "CH".$i;
      						$id = "CH".$i;
      		
      						echo '<td><input type="checkbox" name ="'.$name.'"id = "'.$id['id'].'"></td>';
      					}
      		
      					if ($select) {
      						$name = "CB".$i;
      						$id = "CB".$i;
      		
      						echo '<td><input type="radio" onclick="submit()" name ="'.$name.'"id = "'.$id['id'].'"></td>';
      					}
      						
      					$j = 0; // assummes id, first column
      					foreach ($reg as $col) {
      						if ($j == 0) {
      							//echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
      							echo "<td><input type= 'checkbox'></td>";
      							
      						}
      						else {
      							echo "<td>".$col."</td>";
      						}
      						$j++;
      							
      					}
      					echo '</tr>';
      		
      				}
      				if ($nr < $pageSize) { // added on 05/30/2015
      					$end = 1;
      				}
      			}
      			else {
      				$end=1;
      			}
      			echo "</table>";
      			if (!$select) {
      				echo '<table class="italsis">';
      				echo "<tr>";
      				echo "<td>";
      				$pn = $pnc-1;
      				if ($pn < 0)
      					$pn = 0;
      					$enl="pn=".$pn.$par;
      					echo "<a href='"."?".$enl."'>&lt</a>";
      					echo "</td>";
      					echo "<td>";
      					if ($end)
      						$pn = 0; // was $pnc
      						else
      							$pn = $pnc+1;
      							$enl="pn=".$pn.$par;
      							echo "<a href='"."?".$enl."'>&gt</a>";
      							echo "</td>";
      							echo "</tr>";
      								
      							echo "</table>";
      			}
      		
      		}
      		
 /////////////////////////////////////////////////////////////////////////////////////////

 /////////////////////////////multiple selecion  checkbox////////////////////////////////////
		function fillGridCheck($com, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900) {
		
			$res = $this->executeReaderPaged($com,$pageSize,$pageNumber,false);
			presentationLayer::fillGridArrChecksMultiple($res, $arrCol,$par,$pageSize,$pageNumber,$width);
				
		}

		//////Ajax 20-01-2016/////////
		/*
		 * Ejecuta el Stored Procedure y llama a la funci? que mostrara el Grid
		 *
		 * @param string $com: stored procedure a ejecutar
		 * @param array $arrCol: arreglo con los titulos de las columnas del Grid
		 * @param string $par
		 * @param int $pageSize
		 * @param int $pageNumber
		 * @param string $ajaxUrl: direcci? url al .php que procesara la petici? AJAX
		 */
		function fillGridAJAX($com, $arrCol,$par="",$pageSize=10,$pageNumber=0, $ajaxUrl="") {
		
			$res = $this->executeReaderPaged($com,$pageSize,$pageNumber,false);
			return presentationLayer::fillGridArrAJAX($res, $arrCol,$par,$pageSize,$pageNumber,$ajaxUrl);
		}
		///----------------------------------------------------------------//////
		

		
	} // class
?>