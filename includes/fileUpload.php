<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<?php
	chdir(dirname(__FILE__));
        include_once("../modules/masters/dol/providerfileintegrationfieldBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/personBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/providerintegrationtypeBL.php");
	chdir(dirname(__FILE__));
	include_once("presentationLayer.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/operationBL.php");
	
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/baseBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/providerBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/cityBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/currencyBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/agentBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/operationaccountdepositBL.php");
	chdir(dirname(__FILE__));
	include_once("../modules/masters/dol/bankBL.php");
	chdir(dirname(__FILE__));
	include_once("cryptoIS.php");
	chdir(dirname(__FILE__));

	
	// Checks to do in a future
	// Determines if file is an image $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	// Determines if file exists file_exists($targetFile)
	// Determines file size if ($_FILES["fileToUpload"]["size"] > 500000) {
	// Determines file type $fileType = pathinfo($targetFile,PATHINFO_EXTENSION);
    
	class fileUpload {
		private $targetDir;
		private $uploadFile;
		private $targetFile;

		function __construct($targetDir="",$uploadFile="") {
			$this->targetDir = $targetDir;
			$this->uploadFile = $uploadFile;
			
 		
		}
		
		// $arR, array of Remittance
		// $arB, array of Benefficiary
		// $arIS, $arID array of Ids (source or destiny in operation)
		private function processPerson($arR,$arB,&$arIS,&$arID) {
			if (isset($arR)) {
				foreach ($arR as $P) {
				
					$iddocumenttype = $documentid = $firstname = $middlename =
					$lastname = $secondlastname = $idcountry = $idstate =
					$idcity = $homephone = $mobilephone = $email = $idoccupation =
                                	$birthdate = $idnationality = $idgender = $address = $zipcode = NULL;
                                	$active = "Y";
					$deleted = "N";
    					foreach ($P as $key => $value) {
						$$key = $value;
					}
					// Put Passport when documenttype is not in file
					if ($iddocumenttype == NULL || trim($iddocumenttype == ""))
						$iddocumenttype = 2; // PASSPORT
					$pbl = new personBL($iddocumenttype,$documentid,$firstname,
						$middlename,$lastname,$secondlastname,
				     		$idcountry,$idstate,$idcity,$homephone,
						$mobilephone,$email,$idoccupation,$birthdate,
						$idnationality,$idgender,$address,$zipcode,
                                     		$active,$deleted);
					$pbl->insertNP(); 
					$arIS[] = $pbl->getIdByDocumentId();
					
				}
				$i = 0;
				foreach ($arB as $P) {
				
					$iddocumenttype = $documentid = $firstname = $middlename =
					$lastname = $secondlastname = $idcountry = $idstate =
					$idcity = $homephone = $mobilephone = $email = $idoccupation =
                                	$birthdate = $idnationality = $idgender = $address = $zipcode = NULL;
                                	$active = "Y";
					$deleted = "N";
    					foreach ($P as $key => $value) {
						$$key = $value;
					}
					// Put Passport when documenttype is not in file
					if ($iddocumenttype == NULL || trim($iddocumenttype == ""))
						$iddocumenttype = 2; // PASSPORT
					// Put Id from Remmitance with some append when Id benef if not specified
					if ($documentid == NULL || trim($documentid == "")) {
						$documentid = trim($arR[$i]["documentid"])."-".$i;
					}
					$pbl = new personBL($iddocumenttype,$documentid,$firstname,
						$middlename,$lastname,$secondlastname,
				     		$idcountry,$idstate,$idcity,$homephone,
						$mobilephone,$email,$idoccupation,$birthdate,
						$idnationality,$idgender,$address,$zipcode,
                                     		$active,$deleted);
					$pbl->insertNP();
					$arID[] = $pbl->getIdByDocumentId();
					$i++; 
				}

			}
		}


		private function processOperation($idprovider,$arO,$arIS,$arID,&$AOID) {
			if (isset($arO)) {
				
				$abl = new agentBL();
				$i = 0;
				foreach ($arO as $O) {
				
					$transationid = $idpartner = $idproduct = $feeamount =
					$commissionamount = $taxamount = $basecurrencyid = $basecurrencyexchangerate =
					$basecurrencyamount = $sourcecurrencyid = $sourcecurrencyexchangerate =
					$sourcecurrencyamount = $destinycurrencyid = $destinycurrencyexchangerate =
					$destinycurrencyamount = $iddeliverytype = $idsource= $idsourcecustomertype =
					$iddestiny = $iddestinycustomertype = $sourcecountryid = $sourcestateid =
					$sourcecityid = $destinycountryid = $destinystateid = $destinycityid =
					$idoperationstatus = $date = $senddate = $receivedate = $idsourceagent =
					$keysender = $iddestinyagent = NULL;
					$active="Y";
					$deleted="N";
					$idsource = $arIS[$i];
					$iddestiny = $arID[$i];

					foreach ($O as $key => $value) {
						$$key = $value;
				                // convert currencies to Ids
						switch($key) {
							// convert currency iso to internal id
							case "sourcecurrencyid":
							case "destinycurrencyid":
							case "basecurrencyid":
								$cbl = new currencyBL(trim($value));
								$id = $cbl->getIdByIso();
								$$key = $id;
								// Special case VEB, ISO is VEF
								if ((trim($id) == "") && (trim($value) == "VEB")) {
									$cbl = new currencyBL("VEF");
									$id = $cbl->getIdByIso();
									$$key = $id;
								}
								 
								break;
							// check agent is defined
							case "idsourceagent":
								if ($abl->existsId($value) == 0)
									$$key = NULL;
								break;
							case "iddestinyagent":
								if ($abl->existsId($value) == 0)
									$$key = NULL;
								break;
							case "keysender":
								if (trim($value)=="") {
									$value = $O["keysenderalternate"];
									$$key = "REF Prov ".$idprovider."-".$value;
								}	
								break;
						}
						
					}	
					$i++;					
					
					$obl = new operationBL($transationid,$idprovider,$idpartner,$idproduct,
						$feeamount,$commissionamount,$taxamount,$basecurrencyid,
						$basecurrencyexchangerate,$basecurrencyamount,$sourcecurrencyid,
						$sourcecurrencyexchangerate,$sourcecurrencyamount,$destinycurrencyid,
						$destinycurrencyexchangerate,$destinycurrencyamount,$iddeliverytype,
						$idsource,$idsourcecustomertype,$iddestiny,$iddestinycustomertype,
						$sourcecountryid,$sourcestateid,$sourcecityid,$destinycountryid,
						$destinystateid,$destinycityid,$idoperationstatus,$date,$senddate,
						$receivedate,$idsourceagent,$keysender,$iddestinyagent,
						$active,$deleted);
			
					$obl->insertNP();

					$AOID[] = $obl->getIdByKeySender($idprovider,$keysender);					
				}
			}
		}

		private function processOperationAccount($arOA,$AOID) {
			if (isset($arOA)) {
				$i = 0;
				foreach ($arOA as $OA) {
					$idoperation = $idbank = $accountnumber = $observation = $idbankaccounttype = NULL;
					$active= "Y";
					$deleted = "N";
					foreach ($OA as $key => $value) {
						$$key = $value;
					}
					echo $idbankaccounttype."<br>";
					$bBL = new bankBL(rtrim($idbank),rtrim($idbank));
					$idbank = $bBL->getIdByName();
					if (trim($idbank==""))
						$idbank = $bBL->getIdByCode();
					if (trim(strtoupper($idbankaccounttype)) == "AHORRO")
						$idbankaccounttype = "1";
					if (trim(strtoupper($idbankaccounttype)) == "CORRIENTE")
						$idbankaccounttype = "2";

					$oadBL = new operationaccountdepositBL($AOID[$i],$idbank,
							$accountnumber,$observation,$idbankaccounttype,$active,$deleted);
					
				 	$oadBL->insertNP();
					$i++;
				}
				
			}
		}


		private function processFields($pfifBL,$idprovider,$fieldClass,$initial,&$arrCol,&$arrCR,&$arrCN) {
			$Rfields = $pfifBL->getFileFields($idprovider,$fieldClass);
			foreach ($Rfields as $field) {
				$cname = $field["dolcolumn"];
				$arrCol[] = $initial.$cname;
				$arrCR[] = $field["columnreport"];
				$arrCN[] = $field["columnnumber"];				
			}
			return $Rfields;
		}

		private function processFieldsPos($i,$Afields,$arrPos,&$A,$initial,$arCol,$sd,&$arr) {
			foreach ($Afields as $field) {
				$cname = $field["dolcolumn"];
				$cnumber = $field["columnnumber"]-1; // PHP arrays 0 based
				$pos = $arrPos[$initial.$cname];
				
				// special cases
				if ($cnumber < 0) {
					switch($cname) {
						case "sourcecurrencyid":
						case "destinycurrencyid":		
						case "basecurrencyid": 
							$A[$i][$cname].=str_replace($sd,"","USD")." ";
							$arr[$i][$pos].=str_replace($sd,"","USD")." ";
							break;
					}
				}
				else {
					$A[$i][$cname].=str_replace($sd,"",$arCol[$cnumber])." ";
					$arr[$i][$pos].=str_replace($sd,"",$arCol[$cnumber])." ";
				}
			}
		}

		function upload($idprovider,&$msg,$crypt=0) {
			$res = "0";
			$msg = "";
			$uploadF = $this->uploadFile;
			$this->targetFile = $this->targetDir.basename($uploadF["name"]);
			$fileType = pathinfo($this->targetFile,PATHINFO_EXTENSION);
			$pfifBL = new providerfileintegrationfieldBL();
			$pitBL = new providerintegrationtypeBL();
			if (!file_exists($this->targetFile)) {
				if (move_uploaded_file($uploadF["tmp_name"], $this->targetFile)) {
					$res = "1";
					
					$pitBL->getSeparators($idprovider,$cs,$sd);
					echo "IDP =".$idprovider."<br>";
					echo "CS =".$cs."<br>";
					echo "CD =".$cd."<br>";

					$Rfields = $this->processFields($pfifBL,$idprovider,"remitancy","R",$arrCol,$arrRCol,$arrCN);
					$Bfields = $this->processFields($pfifBL,$idprovider,"beneficiary","B",$arrCol,$arrRCol,$arrCN);
					$Ofields = $this->processFields($pfifBL,$idprovider,"operation","O",$arrCol,$arrRCol,$arrCN);
					
					$Afields = $this->processFields($pfifBL,$idprovider,"operationaccountdeposit","A",$arrCol,$arrRCol,$arrCN);
					
					
					$arrNd = array_unique($arrCol);
					$arrNdR = array_unique($arrRCol);
					$pos = 0;
					foreach ($arrNd as $col) {
						$arrPos[$col] = $pos;
						$pos++;
					}
					unset($arrCol);
				
					foreach ($arrNdR as $col) {
						$arrCol[] = $col;
					}
				
				
					$i = 0;
					$lines = file($this->targetFile);
					$cis = new cryptoIS();
					foreach ($lines as $line) {
						echo $line."<br>";
						foreach($arrPos as $elem) {
							$arr[$i][] = "";
						}
						$arCol = (explode($cs,utf8_encode($line)));
						if ($crypt) {
							$ne = count($arCol);
							for($c = 0; $c < $ne; $c++) {
								$arCol[$c] = $cis->decript($arCol[$c]);
							}
						}
						print_r($arCol);
						$this->processFieldsPos($i,$Rfields,$arrPos,$AR,"R",$arCol,$sd,$arr);
						$this->processFieldsPos($i,$Bfields,$arrPos,$AB,"B",$arCol,$sd,$arr);
						$this->processFieldsPos($i,$Ofields,$arrPos,$AO,"O",$arCol,$sd,$arr);
						$this->processFieldsPos($i,$Afields,$arrPos,$AA,"A",$arCol,$sd,$arr);
						$i++;
						unset($arCol);
					
					}
					$this->processPerson($AR,$AB,$AIS,$AID);
					$this->processOperation($idprovider,$AO,$AIS,$AID,$AOID);
					$this->processOperationAccount($AA,$AOID);

					presentationLayer::fillGridArr($arr, $arrCol);
	
				} // file could be uploaded
				
			}// file not uploaded previoously
			else {
				$msg = "File Uploaded Previously";
			}
			return($res);

		} // upload

		function buildFile($idprovider) {
			$pfifBL = new providerfileintegrationfieldBL();
			$pitBL = new providerintegrationtypeBL();
			$pitBL->getSeparators($idprovider,$cs,$sd);
			$Rfields = $this->processFields($pfifBL,$idprovider,"remitancy","R",$arrCol,$arrRCol,$arrCNR);
			$Bfields = $this->processFields($pfifBL,$idprovider,"beneficiary","B",$arrCol,$arrRCol,$arrCNB);

			
			$Ofields = $this->processFields($pfifBL,$idprovider,"operation","O",$arrCol,$arrRCol,$arrCNO);
			$Afields = $this->processFields($pfifBL,$idprovider,"operationaccountdeposit","A",$arrCol,$arrRCol,$arrCNA);
				
				
			
			
			$oBL = new operationBL();
			$BL = new baseBL();
			$arr = $oBL->getEndPoints(994);
			$pBL = new providerBL();
			$cBL = new cityBL();

			for ($i=1;$i<=28;$i++) {
				$file[$i]="";
			}

			
			
			$fs = fopen("DOL2015-03-24.txt","w");
			foreach ($arr as $ep) {
				$idoperation = $ep["id"];
				$idsender = $ep["idsource"];
				$idbenneficiary = $ep["iddestiny"];
				$com = "SELECT ";
				foreach($Rfields as $elem) {
					$com.= $elem["dolcolumn"].",";
					$fcol[] = $elem["columnnumber"];
				}
				$com = rtrim($com, ",");
				$com .= " FROM dol.person ";
				$com .= " WHERE id = ".$idsender;

				$res = $BL->executeReader($com);
				if (count($res) > 0) {
					$i = 0;
					foreach($res[0] as $data) {
						if ($arrCNR[$i] > 0) {
							$file[$arrCNR[$i]] = $data;
						}
						$i++;
					}
				}
				
				$com = "SELECT ";
				$i=0;
				// to avoid columns with repeated names an alias is used
				foreach($Bfields as $elem) {
					$com.= $elem["dolcolumn"]." AS C".$i.",";
					$fcol[] = $elem["columnnumber"];
					$i++;
				}
				$com = rtrim($com, ",");
				$com .= " FROM dol.person ";
				$com .= " WHERE id = ".$idbenneficiary;

				echo $com."<br>";

				$res = $BL->executeReader($com);
				if (count($res) > 0) {
					$i = 0;
					foreach($res[0] as $data) {
						if ($arrCNB[$i] > 0) {
							$file[$arrCNB[$i]] = $data;
						}
						$i++;
					}
				}
				
				$com = "SELECT ";
			
				foreach($Ofields as $elem) {
					// trick when files does not have keysender, keysenderalternate is used but does not existe in table
					if ($elem["dolcolumn"] == "keysenderalternate") {
						$com.= "keysender AS keysenderalternate,";
						$fcol[] = $elem["columnnumber"];
					}
					else {
						$com.= $elem["dolcolumn"].",";
						$fcol[] = $elem["columnnumber"];
					
					}
			
				}
				
				$com = rtrim($com, ",");
				$com .= " FROM dol.operation ";
				$com .= " WHERE id = ".$idoperation;
				$res = $BL->executeReader($com);
				echo $com."<br>";
				print_r($res);
				echo "<br>";
				print_r($arrCNO);
				echo "<br>";
				
				if (count($res) > 0) {
					$i = 0;
					foreach($res[0] as $data) {
						if ($arrCNO[$i] > 0) {
							$file[$arrCNO[$i]] = $data;
							echo $file[$arrCNO[$i]]."<br>";
						}
						$i++;
					}
				}

				print_r($file);
				echo "<br>";

				$com = "SELECT ";
			
				foreach($Afields as $elem) {
					$com.= $elem["dolcolumn"].",";
					$fcol[] = $elem["columnnumber"];
				}
				
				$com = rtrim($com, ",");
				$com .= " FROM dol.operationaccountdeposit ";
				$com .= " WHERE idoperation = ".$idoperation;
				$res = $BL->executeReader($com);
				echo $com."<br>";
				echo "C = ".count($res)."<br>";

				print_r($res);
				echo "<br>";
				$arrCNA[$i];
				echo "<br>";
				
				if (count($res) > 0) {
					$i = 0;
					if (count($res[0]) > 0) {
						foreach($res[0] as $data) {
							if ($arrCNA[$i] > 0) {
								$file[$arrCNA[$i]] = $data;
							}
							$i++;
						}
					}
				}

print_r($file);
				echo "<br>";


				$pBL->getProviderFileInfoById($idprovider,$providerCode,
					$lastfilebatchprocessed,$lastfileoperationprocessed);
				$file[1] = $providerCode;
				$file[2] = substr($file[2],0,10);
				$file[3] = $lastfilebatchprocessed;
				$file[28] = $pBL->getCodeProviderAgent($file[28]);
				$file[10] = "Euros";
				$file[23] = "ESP";
				$file[7] = 1/$file[7];
				$file[19] = $cBL->getNameById($file[19]);
print_r($file);
				echo "<br>";
				
				$ne = count($file);
				for($i = 1; $i < 28; $i++) {
					fwrite($fs,$file[$i]);
					fwrite($fs,";");
				}
				fwrite($fs,$file[$i]."\r\n");

				
			}
			fclose($fs);					

		}


		

	} // class

	$fu = new fileUpload();
	$fu->buildFile("3");
	//$msg = "";
	//$fu->upload("3",$msg,1);

?>
</html>