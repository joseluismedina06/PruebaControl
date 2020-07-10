    <?php 
        // session_start();
        error_reporting(0);
        
        chdir(dirname(__FILE__));
        include_once("../base/basePL.php");
        chdir(dirname(__FILE__));
        include_once("../base/baseBL.php");
        chdir(dirname(__FILE__));
        include_once("../../../includes/presentationLayer.php");
        chdir(dirname(__FILE__));    
        include_once("includes/myPresentationLayer.php");
        chdir(dirname(__FILE__));
        include_once("includes/myUtilities.php");      
        // chdir(dirname(__FILE__));
        // include_once("registroBL.php"); 
        // chdir(dirname(__FILE__));
        // include_once("personBL.php");           
    // chdir(dirname(__FILE__));
    // include_once("js/guardar_foto.php");       
        basePL::buildjs();
        basePL::buildccs();
     
        myUtilities::buildmyccs(0);   
        myUtilities::buildmyjs(0);
        
    ?>	
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <style>
    

    </style>

	<head>
		<title>Test</title>
		<script>
		function miFuncion() {
					// window.print();
		}
		// window.onload=miFuncion;
		
		// $("table").parents('td').css("padding", "0px");
		</script>
		<style type="text/css">
			.fg{
				background-color: #a4abd1;
			}
			.tb {
			    border-collapse: collapse;
			    width: 85%;
    			margin: auto;
				margin-bottom: 2rem;

			}	
			.tl{
				color: #223b94;
				font-size: 1.5rem;
			}	
			tr>span {
				text-align: -webkit-center;
			}	
			td{
				    /*border-bottom: 0.2rem #a4abd1 solid;*/
			    border: black 0.1rem solid;

			}
			td>table{
			    border-collapse: collapse;
			    width: 100%;
			    padding-right: 0px;
    			margin-top: 0px;				
			}
			td>table>tbody>tr>td{
				border: none;
				border-right: black 0.1rem solid;
			}
			h3{
				margin: 2rem 0rem 0.2rem 0rem;
			}
			h5{
				margin: 0rem;
				font-size: small;
			}
			h1{
				text-align: end;
				margin-top: 50rem;
    			margin-bottom: 50rem;
			}
			td>table>tbody>tr td:last-child{ border: none; }

			table + div{
				margin-top: 2rem;
				    margin-bottom: 1rem;				
			}
/*			table ~ span{
				margin-top: 2rem;
				margin-bottom: 1rem;
			}*/
/*			td:has(> table) { 
				padding: 0px;
			}*/
			td>h4{
				text-align: center;
			}
			table{
				font-size: 1.25rem;
			}
			.texC{
				text-align: center;
			}
			.logo{
				width: 5vw;
			}
		</style>
	</head>
	<body  style="margin:3cm"    onload="window.print()" ”>
    <style>
    div.a{
            text-align:center;
    }
    </style>
 <FONT FACE="arial">
<?php 






        chdir(dirname(__FILE__));
        include_once("../base/baseBL.php");
        $idpartyenterprise=$_SESSION["idpartyenterprise"];
        $dbl=new baseBL();


?>


<?php
		$com="Select a.rfc,a.password,a.registerdate,b.* FROM core.enterprise AS b,core.party AS a WHERE a.id= b.idparty and b.idparty='$idpartyenterprise'"; 
        $resul_person=$dbl->executeReader($com);


        //si existe extraer datos
        if ($resul_person[0] != "" ) { 
	$RFC = $resul_person[0]["rfc"];
	$id = $resul_person[0]["id"];
	$code = $resul_person[0]["code"];
	$name = $resul_person[0]["name"];
	$idparty = $resul_person[0]["idparty"];	
	$bussinesname = $resul_person[0]["bussinesname"];	
	$registerdateandhour = $resul_person[0]["registerdate"]; 
	$password = $resul_person[0]["password"];	
	$buildingnamenumber = $resul_person[0]["buildingnamenumber"];	

	$landsurface = $resul_person[0]["landsurface"];	

	$buildedsurface = $resul_person[0]["buildedsurface"];	
	$buildingheight = $resul_person[0]["buildingheight"];	
	$legalrepresentative = $resul_person[0]["legalrepresentative"];	
	$manager = $resul_person[0]["manager"];	
	$responsiblepipc = $resul_person[0]["responsiblepipc"];	
	$economicactivity = $resul_person[0]["economicactivity"];	
	$permanentshedule = $resul_person[0]["permanentshedule"];	
	$buildingage = $resul_person[0]["buildingage"];	
	$numemployees = $resul_person[0]["numemployees"];	
	$numbrigadista = $resul_person[0]["numbrigadista"];	
	$numlevels = $resul_person[0]["numlevels"];	
	$areadata = $resul_person[0]["areadata"];	
	$maxcapacity = $resul_person[0]["maxcapacity"];	
	$accidentinsurance = $resul_person[0]["accidentinsurance"];	
	$insurancecompany = $resul_person[0]["insurancecompany"];	
	$numextinguisherspqs = $resul_person[0]["numextinguisherspqs"];	
	$numextinguishersco2 = $resul_person[0]["numextinguishersco2"];	
	$numextinguishersh20 = $resul_person[0]["numextinguishersh20"];	
	$numextinguishersothers = $resul_person[0]["numextinguishersothers"];	
	$companysecurityprovider = $resul_person[0]["companysecurityprovider"];	
	$securityofficer = $resul_person[0]["securityofficer"];	
	$nummorningsecurityelements = $resul_person[0]["nummorningsecurityelements"];	
	$numeveningsecurityelements = $resul_person[0]["numeveningsecurityelements"];	
	$numnightsecurityelements = $resul_person[0]["numnightsecurityelements"];	
	$structuralopinion = $resul_person[0]["structuralopinion"];	
	$datestructuralopinion = $resul_person[0]["datestructuralopinion"];	
	$electricopinion = $resul_person[0]["electricopinion"];	
	$dateelectricopinion = $resul_person[0]["dateelectricopinion"];	
	$firenetwork = $resul_person[0]["firenetwork"];	
	$numhydrants = $resul_person[0]["numhydrants"];	
	$tankcapacity = $resul_person[0]["tankcapacity"];	
	$percenttankfire = $resul_person[0]["percenttankfire"];	
	$alertsystem = $resul_person[0]["alertsystem"];	
	$firedetection = $resul_person[0]["firedetection"];	
	$fireprotectionequipment = $resul_person[0]["fireprotectionequipment"];	
	$capacityfireprotectionequipment = $resul_person[0]["capacityfireprotectionequipment"];	
	$autonomousbreathingequipment = $resul_person[0]["autonomousbreathingequipment"];	
	$gastanklpstationary = $resul_person[0]["gastanklpstationary"];	
	$capacitygastanklpstationary = $resul_person[0]["capacitygastanklpstationary"];	
	$gastanklpnotstationary = $resul_person[0]["gastanklpnotstationary"];	
	$howgastanklpnotstationar = $resul_person[0]["howgastanklpnotstationar"];	
	$lpgasopinion = $resul_person[0]["lpgasopinion"];	
	$datelpgasopinion = $resul_person[0]["datelpgasopinion"];	
	$flammablegases = $resul_person[0]["flammablegases"];	
	$quantityflammablegases = $resul_person[0]["quantityflammablegases"];	
	$flammableliquids = $resul_person[0]["flammableliquids"];	
	$quantityflammableliquids = $resul_person[0]["quantityflammableliquids"];	
	$combustibleliquids = $resul_person[0]["combustibleliquids"];	
	$quantitycombustibleliquids = $resul_person[0]["quantitycombustibleliquids"];	
	$combustiblesolids = $resul_person[0]["combustiblesolids"];	
	$quantitycombustiblesolids = $resul_person[0]["quantitycombustiblesolids"];	
	$explosivematerial = $resul_person[0]["explosivematerial"];	
	$quantityexplosivematerial = $resul_person[0]["quantityexplosivematerial"];	
	$electricsubstation = $resul_person[0]["electricsubstation"];	
	$capacityelectricsubstation = $resul_person[0]["capacityelectricsubstation"];	
	$codebranch = $resul_person[0]["codebranch"]; 
           
            $active = $resul_person[0]["active"];
            $deleted = $resul_person[0]["deleted"];                
                     $registerdate = str_replace(" 00:00:00", "", $registerdateandhour );

        }
?>		

		<p style ="font-size:16pt"style="padding-left:2cm" ><b>1 PRESENTACION</b></p>
			<br>
				<!-- <td> -->
					<p style="font-size:14pt" ><b style="padding-left:1cm">INFORMACIÓN GENERAL DE LA EMPRESA</b></p>
				<!-- </td>			 -->
			<br>
		<table class="tb" >
            	
			<tr> 
				<td >
					<span>Nombre/Razón social:</span>
				</td>
				<td>
<?php
	echo $bussinesname;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Nombre y número del edificio:</span>
				</td>
				<td>
<?php
	echo $buildingnamenumber;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Dirección fiscal:</span>
				</td>
				<td>
<?php
			$com="SELECT id FROM base.entitysubclass where code='ADDRESSTYPEVALUES' and name='FISCAL'";
             $idaddresstype=$dbl->executeScalar($com);
                $com= "SELECT pprs.buildingnumber, 
                    (SELECT a.name 
                      FROM base.entitysubclass as a where code='ADDRESSTYPEVALUES' and pprs.idaddresstype=a.id ) as idaddresstype,
                    (SELECT c.name
                        FROM base.state c where pprs.idstate=c.id) as idstate,
                    pprs.municipality,
                    pprs.suburb,
                    pprs.street, 
                    pprs.postalcode 
                    from core.address pprs where pprs.idparty='$idpartyenterprise' 
                    and pprs.idaddresstype='$idaddresstype'";  
             $res=$dbl->executeReader($com);

    echo $res[0]["street"].",".$res[0]["buildingnumber"].",".$res[0]["suburb"].",".$res[0]["municipality"].",".$res[0]["idstate"].",".$res[0]["postalcode"]; 
?>					
				</td>
			</tr>
			<tr>
				<td >
					<span>RFC:</span>
				</td>
				<td>
<?php
	echo $RFC;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Dirección del edificio:</span>
				</td>
				<td>
<?php
			$com="SELECT id FROM base.entitysubclass where code='ADDRESSTYPEVALUES' and name='LOCAL'";
             $idaddresstype=$dbl->executeScalar($com);
                $com= "SELECT pprs.buildingnumber, 
                    (SELECT a.name 
                      FROM base.entitysubclass as a where code='ADDRESSTYPEVALUES' and pprs.idaddresstype=a.id ) as idaddresstype,
                    (SELECT c.name
                        FROM base.state c where pprs.idstate=c.id) as idstate,
                    pprs.municipality,
                    pprs.suburb,
                    pprs.street, 
                    pprs.postalcode 
                    from core.address pprs where pprs.idparty='$idpartyenterprise' 
                    and pprs.idaddresstype='$idaddresstype'";  
             $res=$dbl->executeReader($com);

    echo $res[0]["street"].",".$res[0]["buildingnumber"].",".$res[0]["suburb"].",".$res[0]["municipality"].",".$res[0]["idstate"].",".$res[0]["postalcode"]; 
?>				
				</td>
			</tr>
			<tr>
				<td>
					<span>Teléfonos:</span>
				</td>
				<td>
<?php
                $com="SELECT (SELECT a.name FROM base.entitysubclass a where pprs.idphonetype=a.id ) as idphonetype, pprs.content from core.phone pprs where pprs.idparty='$idpartyenterprise'";  
					$resul=$dbl->executeReader($com);
        foreach($resul as $b){            
            $idphonetype=$b["idphonetype"]; 
            $content=$b["content"]; 
		echo $idphonetype." ".$content." " ;     
        }
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Superficie de terreno:</span>
				</td>
				<td>
<?php
	echo $landsurface;     
?>					
				</td>
			</tr>
			<tr>
				<td >
					<span>Superficie construida:</span>
				</td>
				<td>
<?php
	echo $buildedsurface;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Representante legal:</span>
				</td>
				<td>
<?php
	echo $legalrepresentative;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Gerente:</span>
				</td>
				<td>
<?php
	echo $manager;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Consultor:</span>
				</td>
				<td>
<?php
	echo $responsiblepipc;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Giro:</span>
				</td>
				<td>
<?php
	echo $economicactivity;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Horario permanente de trabajo:</span>
				</td>
				<td>
<?php
	echo $permanentshedule;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Antigüedad del edificio:</span>
				</td>
				<td>
<?php
	echo $buildingage;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Número de niveles:</span>
				</td>
				<td>
<?php
	echo $numlevels;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Total de empleados:</span>
				</td>
				<td>
<?php
	echo $numemployees;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Total, de brigadistas:</span>
				</td>
				<td>
<?php
	echo $numbrigadista;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Nombre y número de áreas:</span>
				</td>
				<td>
<?php
	echo $areadata;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Capacidad máxima:</span>
				</td>
				<td>
<?php
	echo $maxcapacity;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Cantidad de extintores y tipo:</span>
				</td>
				<td>
<?php
	echo "P.Q.S:".$numextinguisherspqs.", CO2:".$numextinguishersco2.", H2O:".$numextinguishersh20.", Otros:".$numextinguishersothers;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Empresa que brinda la seguridad:</span>
				</td>
				<td>
<?php
	echo $companysecurityprovider;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Responsable del servicio:</span>
				</td>
				<td>
<?php
	echo $securityofficer;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>No. de elementos de seguridad:</span>
				</td>
				<td>
<?php
	echo "MATUTINO:".$nummorningsecurityelements.", VESPERTINO:".$numeveningsecurityelements.", NOCTURNO:".$numnightsecurityelements;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Cuenta con dictamen estructural:</span>
				</td>
				<td>
					<table>
						<tr>
							<td>
							<?php
								echo $structuralopinion;     
							?>									
							</td>
							<td >
								<span>Fecha:</span>
							</td>
							<td>
							<?php
								echo $datestructuralopinion;     
							?>					
							</td>							
						</tr>
					</table>				
				</td>
			</tr>
			<tr>
				<td>
					<span>Cuenta con dictamen eléctrico:</span>
				</td>
				<td>
					<table>
						<tr>
							<td>
			<?php
				echo $electricopinion;     
			?>					
							</td>
							<td>
								<span>Fecha:</span>
							</td>
							<td>
			<?php
				echo $dateelectricopinion;     
			?>					
							</td>							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<span>Sistema contra incendios:</span>
				</td>
				<td>
					<table>
						<tr>
							<td>
			<?php
				echo $firenetwork;     
			?>					
							</td>
							<td>
								<span>Número de hidrantes:</span>
							</td>
							<td>
			<?php
				echo $numhydrants;     
			?>					
							</td>							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<span>Capacidad de cisterna:</span>
				</td>
				<td>
<?php
	echo $tankcapacity;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Sistema de alertamiento:</span>
				</td>
				<td>
<?php
	echo $alertsystem;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Equipo de protección personal contra incendios:</span>
				</td>
				<td>
<?php
	echo $fireprotectionequipment;     
?>					
				</td>
			</tr>
			<tr>
				<td>
					<span>Equipo de respiración autónoma:</span>
				</td>
				<td>
<?php
	echo $autonomousbreathingequipment;     
?>					
				</td>
			</tr>
			<tr>
<!-- 				<td class="fg">
					<span>Población expuesta:</span>
				</td> -->
				<td>
<?php
	// echo $;     
?>					
				</td>
			</tr>
				
		
			<tr></tr>
		</table>
		<h3 align="center">Nombre y Firma del Representante Legal, protestando decir verdad:</h3>	
		<h5 align="center">	
<?php
	echo $legalrepresentative;     
?>	
		</h5>
		<h3 align="center">_________________________________</h3>
		<h3 align="center">Nombre de responsable de elaboración de programa interno de protección civil:</h3>	
		<h5 align="center">	
<?php
	echo $securityofficer;     
?>	
		</h5>		
        <h3 align="center">_________________________________</h3>
        <br>


        

        <p style="font-size:16pt" style="padding-left:2cm"><b>2 Índice </b></p><br><br>
        <p style="font-size:14pt;padding-left:1cm">

1.- Presentación<br><br>
2.-Índice<br><br>
3.-Marco Legal<br><br>
4.-Justificación<br><br>
5.-Objetivos<br><br>
6.-Alcance<br><br>
7.-Subprograma de prevención<br><br>
        7.1.-Organización<br><br>
        7.2.-Documentación<br><br>
        7.3.-Análisis de riesgos<br><br>
                 7.3.1.-Ubicación del predio<br><br>
        7.4.-Directorios<br><br>
        7.5.-Inventarios<br><br>
        7.6-Mantenimiento<br><br>
        7.7.-<br><br>
        7.8.-<br><br>
        7.9.-Capacitación<br><br>
        7.10.- Programa de difusión y concientización<br><br>
        7.11.-Simulacros<br><br>
8.-Subprograma de auxilio<br><br>
        8.1.-Alertamiento<br><br>
        8.2.-Planes de emergencia<br><br>
        8.3.-Evaluación de daños<br><br>
9.-Subprograma de prevención<br><br>
        9.1.-Vuelta a la normalidad<br><br>
        Anexos

        </p>
<div style="page-break-after:always;"></div>
        

<!-- MARCO LEGAR -->
 <p style="font-size:16pt" style="padding-left:2cm"><b>3 MARCO LEGAL</b></p> <param
<div style="font-size:12pt">
<p  style="text-align:justify">
<br>
<div style="text-align:justify">

<?php




            $com="SELECT legalframework FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            $legalframework=$dbl->executeScalar($com); 
            echo   str_replace("\n","<br>", $legalframework) ;
            ?>	       </p> </div>


<div style="page-break-after:always;"></div>
		 
		<!-- JUSTIFICACION -->
	<p style ="font-size:16pt"style="padding-left:2cm"><b>4 JUSTIFICACION</b> </p>
    <p  style="text-align:justify">
<br>
<?php
            $com="SELECT justification FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            $justification=$dbl->executeScalar($com);  
            
            echo   str_replace("\n","<br>", $justification) ;          
?>		<br>        <div style="page-break-after:always;"></div>

    </p>
		<!-- OBJETIVOS -->
    <br>
    	<p style="font-size:16pt" style="padding-left:2cm"><b>5 OBJETIVOS</b></p><br>        <p  style="text-align:justify">

<?php
            $com="SELECT objetives FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            $objetives=$dbl->executeScalar($com);  
            echo   str_replace("\n","<br>", $objetives) ;          
?>		<br>        <div style="page-break-after:always;"></div>

		</p>

		<!-- ALCANCE -->
		<br><p style="font-size:16pt" style="padding-left:2cm"><b>6 ALCANCE</b></p><br>        <p  style="text-align:justify">

<?php
            $com="SELECT scope FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
            $scope=$dbl->executeScalar($com);  
            echo   str_replace("\n","<br>", $scope) ;
?>		<br>        <div style="page-break-after:always;"></div>

</p>

<?php
            $com="SELECT 
  info,
  uipcheadlinename,
  uipccoordinatorname,
  uipcchiefname,
  uipcfirstaidbrigadechiefname,
  uipcantifirebrigadename,
  uipcevacuationbrigadename,
  uipcsearchbrigadename,
  infobrigade,
  infoorganizationchart,
  infobrigadeorganization,
  moretenemployments
            FROM core.securityplansubprogram WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $info = $resul[0]["info"];
  $uipcheadlinename = $resul[0]["uipcheadlinename"];
  $uipccoordinatorname = $resul[0]["uipccoordinatorname"];
  $uipcchiefname = $resul[0]["uipcchiefname"];
  $uipcfirstaidbrigadechiefname = $resul[0]["uipcfirstaidbrigadechiefname"];
  $uipcantifirebrigadename = $resul[0]["uipcantifirebrigadename"];
  $uipcevacuationbrigadename = $resul[0]["uipcevacuationbrigadename"];
  $uipcsearchbrigadename = $resul[0]["uipcsearchbrigadename"];
  $infobrigade = $resul[0]["infobrigade"];
  $infoorganizationchart = $resul[0]["infoorganizationchart"];
  $infobrigadeorganization = $resul[0]["infobrigadeorganization"];
  $moretenemployments = $resul[0]["moretenemployments"];
            } 
?>
        <div style="page-break-after:always;"></div>

		<!-- SUBPROGRAMA DE PREVENCIÓN -->
		<p style ="font-size:16pt"style="padding-left:2cm"><b> 7 SUBPROGRAMA DE PREVENCIÓN</b></p><br>
        <div style="font-weight:normal">
        <p  style="text-align:justify">
        
<?php
            echo   str_replace("\n","<br>", $info) ;        
?>		<br><BR>
		</div>

</p>
<div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b> 7.1  Organización </b></p><br>

    <p style="font-size:14pt" ><b style="padding-left:1cm">
        Responsable de Cada Tarea y sus Respectivas Funciones:
        </B></P>
    </div>

	<table class="tb">
		<tr>
			<td>
				<P  style="text-align:center">Puesto dentro de la UIPC:</P>
			</td>
			<td width=50%>
				<p style="text-align:center">Nombre</p>
			</td>
		</tr>
		<tr>
			<td>
				Titular
			</td>
			<td>
				<?php echo $uipcheadlinename; ?>
			</td>
		</tr>
		<tr>
			<td>
				Coordinador General/Suplente:
			</td>
			<td>
				<?php echo $uipccoordinatorname; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de la UIPC:
			</td>
			<td>
				<?php echo $uipcchiefname; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Primeros Auxilios:
			</td>
			<td>
				<?php echo $uipcfirstaidbrigadechiefname; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Combate contra Incendios:
			</td>
			<td>
				<?php echo $uipcantifirebrigadename; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Evacuación del Inmueble:
			</td>
			<td>
				<?php echo $uipcevacuationbrigadename; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Búsqueda y Rescate:
			</td>
			<td>
				<?php echo $uipcsearchbrigadename; ?>
			</td>
		</tr>


	</table>


		<div style="text-align: justify; padding-left:1cm;">
        <p style="font-size:12pt; font-weight:normal;">
<?php
            echo $infobrigade;          
?>		</p>
		</div>	


	<div style="padding-left:1cm">
    <p style="font-size:14pt" ><b >
		Organigrama de los Brigadistas:</b></p>
    

<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SUBPROGPREV-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SUBPROGPREV-0-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
               
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'"width="380px" height="300px"" />';         
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
?>

		<div style="font-Weight:normal">
<?php
            echo $infoorganizationchart;          
?>		
		</div>	

<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SUBPROGPREV-1-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-SUBPROGPREV-1-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"];              
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'width="380px" height="300px" />';         
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
?>
<br>
		<div style="font-weight:normal">
<?php
            echo $infobrigadeorganization;          
?>		
		</div>	
<br>
<div style="page-break-after:always;"></div>

    <p style="font-size:14pt" ><b>
            Directorio de Brigadistas:</b></p> <br><br>
        <p>¿La Empresa Cuenta con mas de Diez Empleados?</p>
        <br><br>
    </div>
<div style="font-weight:normal;padding-left:1cm;">

<?php
           if ($moretenemployments == "Y")
           {echo "Si";}
           else
           {echo "No";}    
           
?>		</div></div><br>
<?php

$com="SELECT 
  uipcheadlinename ,
  uipcheadlinelocation ,
  uipccoordinatorname ,
  uipccoordinatorlocation ,
  uipcchiefname ,
  uipcchieflocation ,
  uipcfirstaidbrigadechiefname ,
  uipcfirstaidbrigadechieflocation ,
  uipcantifirebrigadename ,
  uipcantifirebrigadelocation ,
  uipcevacuationbrigadename ,
  uipcevacuationbrigadelocation ,
  uipcsearchbrigadename ,
  uipcsearchbrigadelocation ,
  brigadeindetification
            FROM core.securityplansubprogrambrigadedirectory WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $uipcheadlinenamebrigade = $resul[0]["uipcheadlinename"];
  $uipcheadlinelocation = $resul[0]["uipcheadlinelocation"];
  $uipccoordinatornamebrigade = $resul[0]["uipccoordinatorname"];
  $uipccoordinatorlocation = $resul[0]["uipccoordinatorlocation"];
  $uipcchiefnamebrigade = $resul[0]["uipcchiefname"];
  $uipcchieflocation = $resul[0]["uipcchieflocation"];
  $uipcfirstaidbrigadechiefnamebrigade = $resul[0]["uipcfirstaidbrigadechiefname"];

  $uipcfirstaidbrigadechieflocation = $resul[0]["uipcfirstaidbrigadechieflocation"];
  $uipcantifirebrigadenamebrigade = $resul[0]["uipcantifirebrigadename"];
  $uipcantifirebrigadelocation = $resul[0]["uipcantifirebrigadelocation"];
  $uipcevacuationbrigadenamebrigade = $resul[0]["uipcevacuationbrigadename"];
  $uipcevacuationbrigadelocation = $resul[0]["uipcevacuationbrigadelocation"];
  $uipcsearchbrigadenamebrigade = $resul[0]["uipcsearchbrigadename"];
  $uipcsearchbrigadelocation = $resul[0]["uipcsearchbrigadelocation"];

  $brigadeindetification = $resul[0]["brigadeindetification"];


            }  

?>

		



<div style="padding-left:1cm">
    <p style="font-size:14pt" ><b>		Puesto dentro de la UIPC:</b></p><br>
    </div>

	<table class="tb">
		<tr>
			<td>
				<h4>Puesto dentro de la UIPC:</h4>
			</td>
			<td width=32%>
				<h4>Nombre</h4>
			</td>
			<td width=22%>
            <h4>Ubicacion</h4>
			</td>
		</tr>
		<tr>
			<td>
				Titular
			</td>
			<td>
				<?php echo $uipcheadlinenamebrigade; ?>
			</td>
			<td>
				<?php echo $uipcheadlinelocation; ?>
			</td>
		</tr>
		<tr>
			<td>
				Coordinador General/Suplente:
			</td>
			<td>
				<?php echo $uipccoordinatornamebrigade; ?>
			</td>
			<td>
				<?php echo $uipccoordinatorlocation; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de la UIPC:
			</td>
			<td>
				<?php echo $uipcchiefnamebrigade; ?>
			</td>
			<td>
				<?php echo $uipcchieflocation; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Primeros Auxilios:
			</td>
			<td>
				<?php echo $uipcfirstaidbrigadechiefnamebrigade; ?>
			</td>
			<td>
				<?php echo $uipcfirstaidbrigadechieflocation; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Combate contra Incendios:
			</td>
			<td>
				<?php echo $uipcantifirebrigadenamebrigade; ?>
			</td>
			<td>
				<?php echo $uipcantifirebrigadelocation; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Evacuación del Inmueble:
			</td>
			<td>
				<?php echo $uipcevacuationbrigadenamebrigade; ?>
			</td>
			<td>
				<?php echo $uipcevacuationbrigadelocation; ?>
			</td>
		</tr>
		<tr>
			<td>
				Jefe de Brigada de Búsqueda y Rescate:
			</td>
			<td>
				<?php echo $uipcsearchbrigadenamebrigade; ?>
			</td>
			<td>
				<?php echo $uipcsearchbrigadelocation; ?>
			</td>
		</tr>


	</table>

		<span style="color:black; font-size: x-large; ">
		Identificación de las brigadas:</span>
    </div>
		<div style="font-weight:normal">
<?php
            echo   str_replace("\n","<br>", $brigadeindetification) ;       
?>		
		</div>

        </div>
<br><br>        <div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b> 7.2  Documentación </b></p><br>

<?php
$consult="SELECT especificactivityprogram,compliancereport 
                FROM core.securityplanextras WHERE idparty='$idpartyenterprise'";
                $resul=$dbl->executeReader($consult);
                if ($resul[0] != "") { 
                    $especificactivityprogram = $resul[0]["especificactivityprogram"]; 
                    $compliancereport = $resul[0]["compliancereport"];
                    ?>
                    <div style="padding-left:1cm">
                    <p style ="font-size:14pt"><b> Programa de actividades específicas </b></p><br>

                    
                    <?php

                    echo   str_replace("\n","<br>", $especificactivityprogram) ;

                   echo"<br><br>";
                    ?>

                   <p style ="font-size:14pt"><b> Informe de Cumplimiento </b></p><br>
<?php
                    echo   str_replace("\n","<br>", $compliancereport) ;                }



                ?>
</div>
<div style="page-break-after:always;"></div>



<!-- ANALISIS DE RIESGOS -->
<p style ="font-size:16pt"style="padding-left:2cm"><b>7.3 ANALISIS DE RIESGOS</b></p><br>
        <div style="font-weight:normal">
<?php
            $com="SELECT 
  info ,
  location ,
  northstreet ,
  southstreet ,
  eaststreet ,
  weststreet ,
  northbuilding ,
  southbuilding ,
  eastbuilding ,
  westbuilding ,
  vitalservices ,
  idcimentation ,
  idstructure ,
  idwall ,
  idroof ,
  idfloor ,
  idenjarre ,
  idelectricalinstall ,
  idhidrosanitaryinstall ,
  idbathroomfurniture ,
  idcanceleria ,
  iddoors ,
  idstairs ,
  idfinishesfloors ,
  idfinisheswalls ,
  idfinishesdoors ,
  idfinishesstairs ,
  permanentcensus ,
  floatcensus ,
  ownproperty ,
  leasedproperty ,
  otherproperty ,
  surface ,
  antiquity ,
  numlevel ,
  highbuilding ,
  geotechnichallocation 

            FROM core.securityplanriskanalysis WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $info = $resul[0]["info"];
  $location = $resul[0]["location"];
  $northstreet = $resul[0]["northstreet"];
  $southstreet = $resul[0]["southstreet"];
  $eaststreet = $resul[0]["eaststreet"];
  $weststreet = $resul[0]["weststreet"];
  $northbuilding = $resul[0]["northbuilding"];
  $southbuilding = $resul[0]["southbuilding"];
  $eastbuilding = $resul[0]["eastbuilding"];
  $westbuilding = $resul[0]["westbuilding"];

  $vitalservices = $resul[0]["vitalservices"];
  $idcimentation = $resul[0]["idcimentation"];
  $idstructure = $resul[0]["idstructure"];
  $idwall = $resul[0]["idwall"];
  $idroof = $resul[0]["idroof"];
  $idfloor = $resul[0]["idfloor"];
  $idenjarre = $resul[0]["idenjarre"];
  $idelectricalinstall = $resul[0]["idelectricalinstall"];
  $idhidrosanitaryinstall = $resul[0]["idhidrosanitaryinstall"];
  $idbathroomfurniture = $resul[0]["idbathroomfurniture"];
  $idcanceleria = $resul[0]["idcanceleria"];
  $iddoors = $resul[0]["iddoors"];
  $idstairs = $resul[0]["idstairs"];
  $idfinishesfloors = $resul[0]["idfinishesfloors"];
  $idfinisheswalls = $resul[0]["idfinisheswalls"];
  $idfinishesdoors = $resul[0]["idfinishesdoors"];
  $idfinishesstairs = $resul[0]["idfinishesstairs"];
  $permanentcensus = $resul[0]["permanentcensus"];
  $floatcensus = $resul[0]["floatcensus"];
  $ownproperty = $resul[0]["ownproperty"];
  $leasedproperty = $resul[0]["leasedproperty"];
  $otherproperty = $resul[0]["otherproperty"];
  $surface = $resul[0]["surface"];
  $antiquity = $resul[0]["antiquity"];
  $numlevel = $resul[0]["numlevel"];
  $highbuildingsecurityplanriskanalysis = $resul[0]["highbuilding"];
  $geotechnichallocation = $resul[0]["geotechnichallocation"];
            }       

?>



		<div style="text-align: justify; margin-bottom: 1.5rem;">
<?php
            echo   str_replace("\n","<br>", $info) ;     
?>		
		</div></div>

        <div style="padding-left:1cm">
    <p style="font-size:14pt" ><b>
		LOCALIZACIÓN DEL INMUEBLE:</b></p><br>
    </div>
    <div style="padding-left:1cm">
    <p style="font-weight:normal">
   <?php
            echo   str_replace("\n","<br>", $location) ;

?>		
		</p></div><br>


        <TABLE class="tb" >
		<tr >
			<td ><p>CALLES CIRCUNDANTES</p>
					<table>
							<tr>
								<td style="border-top: black 0.10rem solid;  
								           border-right: black 0.10rem solid;" >
									Al norte
								</td>
								<td style="border-top: black 0.10rem solid;">
<?php
 echo $northstreet;
?>									
								</td>
							</tr>
							<tr>
								<td style="border-right: black .10rem solid; 
								           border-top: black .10rem solid;">
									Al sur
								</td>
								<td style="border-top: .10rem black solid;">
<?php
 echo $southstreet;
?>									
								</td>
							</tr>
							<tr>
								<td style="border-right: black .10rem solid; 
								           border-top: black 0.1rem solid;">
									Al este
								</td>
								<td style="border-top: 0.1rem black solid;">
<?php
 echo $eaststreet;
?>									
								</td>
							</tr>
							<tr>
								<td style="border-right: black 0.1rem solid; 
								           border-top: black 0.1rem solid;">
									Al oeste
								</td>
								<td style="border-top: 0.1rem black solid;">
<?php
 echo $weststreet;
?>									
								</td>
							</tr>
					</table>
			</td>
			<td style="border-left: black 0.1rem solid;">
				<p>EDIFICIOS ADYACENTES</p>
				<table style="border-top: black 0.1rem solid;">
					<tr>
						<td>
<?php
	echo $northbuilding;
?>							
						</td>
					</tr>
					<tr>
						<td style="border-top: 0.1rem black solid;">
<?php
	echo $southbuilding;
?>							
						</td>
					</tr>
					<tr>
						<td style="border-top: 0.1rem black solid;">
<?php
	echo $eastbuilding;
?>							
						</td>
					</tr>
					<tr>
						<td style="border-top: 0.1rem black solid;">
<?php
	echo $westbuilding;
?>							
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</TABLE>
    <div style="padding-left:1cm">
    
    <p style="font-size:14pt"> Servicios Vitales:</p><br>
    
		   <p style="font-weight:normal">

<?php
            echo   str_replace("\n","<br>", $vitalservices) ;  
?>		
		</div>
        <div style="padding-left:1cm">
    <br>
    <p style="font-size:14pt">
		Anexo de Planos de la Empresa:</p>
    

<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-ANALRIESG-0-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"]; 
;     
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'"width="380px" height="300px" />';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
?>



<br>

		<p style="font-size:14pt">
		Elementos Estructurales del Inmueble:</p><br>
    </div>

<table class="tb">
	<tr>
		<td>
			Cimentación
		</td>
		<td width="50%">
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='CIMENTATIONTYPEVALUES' 
            and id='$idcimentation'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Estructura
		</td>
		<td>
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='STRUCTURETYPEVALUES' 
            and id='$idstructure'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Muros
		</td>
		<td>
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='WALLTYPEVALUES' 
            and id='$idwall'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Techos
		</td>
		<td>
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='ROOFTYPEVALUES' 
            and id='$idroof'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Pisos
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='FLOORTYPEVALUES' 
            and id='$idfloor'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Enjarre
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='ENJARRETYPEVALUES' 
            and id='$idenjarre'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Instalación Eléctrica
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='ELECTRICALINSTALLTYPEVALUES' 
            and id='$idelectricalinstall'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Instalación Hidro-Sanitarias
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='HIDROSANITARYINSTALLTYPEVALUES' 
            and id='$idhidrosanitaryinstall'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Muebles de Baño
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='BATHROOMFURNITURETYPEVALUES' 
            and id='$idbathroomfurniture'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Cancelaría
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='CANCELERIATYPEVALUES' 
            and id='$idcanceleria'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Puertas
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='DOORSTYPEVALUES' 
            and id='$iddoors'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Escaleras
		</td>
		<td>
			<?php 
            $com="SELECT name FROM base.entitysubclass where code='STAIRSTYPEVALUES' 
            and id='$idstairs'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
</table>











	<div style="padding-left:1cm">
    <p style="font-size:14pt">		Acabados:</p>
    </div>

<table class="tb">
	<tr>
		<td>
			Pisos
		</td>
        
		<td width="50%">
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='FLOORTYPEVALUES' 
            and id='$idfinishesfloors'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Muros
		</td>
		<td>
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='WALLTYPEVALUES' 
            and id='$idfinisheswalls'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Puertas
		</td>
		<td>
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='DOORSTYPEVALUES' 
            and id='$idfinishesdoors'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
	<tr>
		<td>
			Escaleras
		</td>
		<td>
			<?php 

            $com="SELECT name FROM base.entitysubclass where code='STAIRSTYPEVALUES' 
            and id='$idfinishesstairs'";
    			$name=$dbl->executeScalar($com);  
			echo $name; ?>
		</td>
	</tr>
</table>



<div style="padding-left:1cm">
    <p style="font-size:14pt">		
		Censo de población:</p></div>
    </div>
<table class="tb">
	<tr>
		<td >
			Censo Permanente: 
		</td>
		<td style=text-align:center; width="50%">
			<?php  
			echo $permanentcensus; ?>
		</td>
	</tr>
	<tr>
		<td>
			Censo Flotante:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $floatcensus; ?>
		</td>
	</tr>
</table>

<div style="padding-left:1cm">
    <p style="font-size:14pt">		
		Uso del suelo:</p></div>
    </div>
<table class="tb">
	<tr>
		<td>
			Propiedad propia 
		</td>
		<td style=text-align:center; width="50%">
			<?php  
			echo $ownproperty; ?>
		</td>
	</tr>
	<tr>
		<td>
			Arrendada
		</td>
		<td style=text-align:center;>
			<?php  
			echo $leasedproperty; ?>
		</td>
	</tr>
	<tr>
		<td>
			Otra
		</td>
		<td style=text-align:center;>
			<?php  
			echo $otherproperty; ?>
		</td>
	</tr>
</table>

<div style="padding-left:1cm">
    <p style="font-size:14pt">		
		Información de Inmueble:</p></div>
    </div>
<table class="tb">
	<tr>
		<td>
			Superficie de Construcción
		</td>
		<td style=text-align:center; width="50%">
			<?php  
			echo $surface; ?>
		</td>
	</tr>
	<tr>
		<td>
			Antigüedad
		</td>
		<td style=text-align:center;>
			<?php  
			echo $antiquity; ?>
		</td>
	</tr>
	<tr>
		<td>
			Numero de Niveles
		</td>
		<td style=text-align:center;>
			<?php  
			echo $numlevel; ?>
		</td>
	</tr>
	<tr>
		<td>
			Altura del Edificio
		</td>
		<td style=text-align:center;>
			<?php  
			echo $highbuildingsecurityplanriskanalysis; ?>
		</td>
	</tr>
</table>
<div style="page-break-after:always;"></div>


<div style="padding-left:1cm">
    <p style="font-size:14pt">		
		Ubicación Geotécnica:</p></div>
    </div>
    <div style="padding-left:1cm"> <p style="font-weight:normal">
<?php
            echo $geotechnichallocation;          
?>		</p><br><br>
		</div>

<?php

            $com="SELECT 
  municipaltake ,
  numdrains ,
  numsubtank ,
  subtankcapacity ,
  numaerialtank ,
  aerialtankcapacity ,
  galvanizedpipeline ,
  cooperpipeline ,
  electricbomb ,
  siamesevalve ,
  municipalwaternetwork ,
  riverdrain ,
  electricalinstall ,
  generalswitch ,
  secundaryswitch ,
  shutdowncontacts ,
  lightingsystem ,
  emercyelectricplant ,
  physicsearthsystem ,
  airwashequipment ,
  numfueltank ,
  dieseltankcapacity ,
  magnatankcapacity ,
  premiumtankcapacity ,
  installdate ,
  warehouse ,
  storage ,
  adequatestowage ,
  deathfile ,
  openfile ,
  electricpower ,
  trashinstall ,
  trashtype ,
  automaticalarmsystem ,
  tvmonitoringsystem ,
  comunication ,
  internaldangerzone  

            FROM core.securityplanriskanalysyscomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $municipaltake = $resul[0]["municipaltake"];
  $numdrains = $resul[0]["numdrains"];
  $numsubtank = $resul[0]["numsubtank"];
  $subtankcapacity = $resul[0]["subtankcapacity"];
  $numaerialtank = $resul[0]["numaerialtank"];
  $aerialtankcapacity = $resul[0]["aerialtankcapacity"];
  $galvanizedpipeline = $resul[0]["galvanizedpipeline"];
  $cooperpipeline = $resul[0]["cooperpipeline"];
  $electricbomb = $resul[0]["electricbomb"];
  $siamesevalve = $resul[0]["siamesevalve"];
  $municipalwaternetwork = $resul[0]["municipalwaternetwork"];
  $riverdrain = $resul[0]["riverdrain"];
  $electricalinstall = $resul[0]["electricalinstall"];
  $generalswitch = $resul[0]["generalswitch"];
  $secundaryswitch = $resul[0]["secundaryswitch"];
  $shutdowncontacts = $resul[0]["shutdowncontacts"];
  $lightingsystem = $resul[0]["lightingsystem"];
  $emercyelectricplant = $resul[0]["emercyelectricplant"];
  $physicsearthsystem = $resul[0]["physicsearthsystem"];
  $airwashequipment = $resul[0]["airwashequipment"];
  $numfueltank = $resul[0]["numfueltank"];
  $dieseltankcapacity = $resul[0]["dieseltankcapacity"];
  $magnatankcapacity = $resul[0]["magnatankcapacity"];
  $premiumtankcapacity = $resul[0]["premiumtankcapacity"];
  $registerdateandhour = $resul[0]["installdate"];
  $warehouse = $resul[0]["warehouse"];
  $storage = $resul[0]["storage"];
  $adequatestowage = $resul[0]["adequatestowage"];
  $deathfile = $resul[0]["deathfile"];
  $openfile = $resul[0]["openfile"];
  $electricpower = $resul[0]["electricpower"];
  $trashinstall = $resul[0]["trashinstall"];
  $trashtype = $resul[0]["trashtype"];
  $automaticalarmsystem = $resul[0]["automaticalarmsystem"];
  $tvmonitoringsystem = $resul[0]["tvmonitoringsystem"];
  $comunication = $resul[0]["comunication"];
  $internaldangerzone = $resul[0]["internaldangerzone"];

            $installdate = str_replace(" 00:00:00", "", $registerdateandhour );

            }    

    
?>



<table class="tb">

	<tr>
		<td>
			Toma Municipal
		</td>
		<td style=text-align:center; width="50%">
			<?php  
if ($municipaltake=="Y") {
				echo "Si";
			} else if($municipaltake=="N"){
				echo "No";
			} ?>
		</td>
	</tr>	
	<tr>
		<td>
			Numero de Descargas al Drenaje:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $numdrains; ?>
		</td>
	</tr>
	<tr>
		<td>
			Numero de Cisternas:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $numsubtank; ?>
		</td>
	</tr>
	<tr>
		<td>
			Capacidad Total de la Cisterna:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $subtankcapacity; ?>
		</td>
	</tr>
	<tr>
		<td>
			Numero de Tinacos:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $numaerialtank; ?>
		</td>
	</tr>
	<tr>
		<td>
			Capacidad de Tinaco:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $aerialtankcapacity; ?>
		</td>
	</tr>
	<tr>
		<td>
			Tubería Galvanizada 
		</td>
		<td style=text-align:center;>
			<?php
if ($galvanizedpipeline=="Y") {
				echo "Si";
			} else if($galvanizedpipeline=="N"){
				echo "No";
			} 
		 ?>
		</td>
	</tr>
	<tr>
		<td>
			Tubería de Cobre
		</td>
		<td style=text-align:center;>
			<?php 
if ($cooperpipeline=="Y") {
				echo "Si";
			} else if($cooperpipeline=="N"){
				echo "No";
}
			?>
		</td>
	</tr>
	<tr>
		<td>
			Bomba Electrónica
		</td>
		<td style=text-align:center;>
			<?php 
if ($electricbomb=="Y") {
				echo "Si";
			} else if($electricbomb=="N"){
				echo "No";
}

		 ?>
		</td>
	</tr>
	<tr>
		<td>
			Válvula Siamesa Contra Riesgo de Incendios 
		</td>
		<td style=text-align:center;>
			<?php 
if ($siamesevalve=="Y") {
				echo "Si";
			} else if($siamesevalve=="N"){
				echo "No";
}

 ?>
		</td>
	</tr>
	<tr>
		<td>
			Red Hidráulica Municipal 
		</td>
		<td style=text-align:center;>
			<?php 
if ($municipalwaternetwork=="Y") {
				echo "Si";
			} else if($municipalwaternetwork=="N"){
				echo "No";
}

?>
		</td>
	</tr>
	<tr>
		<td>
			Drenaje Pluvial 
		</td>
		<td style=text-align:center;> 
			<?php 
if ($riverdrain=="Y") {
				echo "Si";
			} else if($riverdrain=="N"){
				echo "No";
}

 ?>
		</td>
	</tr>
</table>

<div style="padding-left:1cm">
    <p style="font-size:14pt">		

		Instalaciones Eléctricas:</p></div>
    </div><div style="padding-left:1cm">
		<p style="font-weight:normal">
<?php
            echo $geotechnichallocation;          
?>		<p>
		</div></div><br>

        <div style="padding-left:1cm">
    <p style="font-size:14pt">
		Especificaciones de transformadores:</p>
    </div>
<table class="tb">

	<tr>
		<td >
			Interruptor General
		</td>
		<td style=text-align:center; width="50%"> 
			<?php
if ($generalswitch=="Y") {
				echo "Si";
			} else if($generalswitch=="N"){
				echo "No";
}				  
 ?>
		</td>
	</tr>	
	<tr>
		<td>
			Interruptor Secundario
		</td>
		<td style=text-align:center;>
			<?php  
if ($secundaryswitch=="Y") {
				echo "Si";
			} else if($secundaryswitch=="N"){
				echo "No";
}			
		?>
		</td>
	</tr>
	<tr>
		<td>
			Contactos y Apagadores 
		</td>
		<td style=text-align:center;>
			<?php  
if ($shutdowncontacts=="Y") {
				echo "Si";
			} else if($shutdowncontacts=="N"){
				echo "No";
}			
?>
		</td>
	</tr>
	<tr>
		<td>
			Sistema de Alumbrado:
		</td>
		<td style=text-align:center;>
			<?php  
			echo $lightingsystem; ?>
		</td>
	</tr>
	<tr>
		<td>
			Planta de Luz Emergente 
		</td>
		<td style=text-align:center;>
			<?php  
if ($emercyelectricplant=="Y") {
				echo "Si";
			} else if($emercyelectricplant=="N"){
				echo "No";
}				
?>
		</td>
	</tr>
	<tr>
		<td>
			Sistema de Tierra Física
		</td>
		<td style=text-align:center;>
			<?php  
if ($physicsearthsystem=="Y") {
				echo "Si";
			} else if($physicsearthsystem=="N"){
				echo "No";
}				
	 ?>
		</td>
	</tr>
	<tr>
		<td>
			Equipo de Aire lavado 
		</td>
		<td style=text-align:center;>
			<?php 
if ($airwashequipment=="Y") {
				echo "Si";
			} else if($airwashequipment=="N"){
				echo "No";
}
 ?>
		</td>
	</tr>
</table>







<div style="padding-left:1cm">
    <p style="font-size:14pt">
		Instalaciones de Tanques de Combustible:</p></div>
    </div>
<table class="tb">

	<tr>
		<td>
			Cantidad de Tanques: 
		</td>
		<td style=text-align:center; width="50%">
			<?php  
			echo $numfueltank; ?>
		</td>
	</tr>	
	<tr>
		<td>
			Capacidad del Tanque 1 (disel):
		</td>
		<td style=text-align:center;>
			<?php  
			echo $dieseltankcapacity; ?>
		</td>
	</tr>
	<tr>
		<td>
			Capacidad del Tanque 2 (Magna):
		</td>
		<td style=text-align:center;>
			<?php  
			echo $magnatankcapacity; ?>
		</td>
	</tr>
	<tr>
		<td>
			Capacidad del Tanque 3 (Premium):  
		</td>
		<td style=text-align:center;>
			<?php  
			echo $premiumtankcapacity; ?>
		</td>
	</tr>
	<tr>
		<td>
			Fecha de Instalación 
		</td>
		<td style=text-align:center;>
			<?php  
			echo $installdate; ?>
		</td>
	</tr>

</table>




<div style="padding-left:1cm">
    <p style="font-size:14pt">Bodegas Y/O Almacén:</p>
</div>
<table class="tb">
	<tr>
		<td>
			Bodegas Y/O Almacén 
		</td>
		<td style=text-align:center; width="50%">
			<?php
if ($warehouse=="Y") {
				echo "Si";
			} else if($warehouse=="N"){
				echo "No";
}			  
 ?>
		</td>
	</tr>
	<tr>
		<td>
			Almacenamiento 
		</td>
		<td style=text-align:center;>
			<?php 
if ($storage=="Y") {
				echo "Si";
			} else if($storage=="N"){
				echo "No";
}				 
 ?>
		</td>
	</tr>
	<tr>
		<td>
			Estiba Adecuada  
		</td>
		<td style=text-align:center;>
			<?php  
			echo $adequatestowage; ?>
		</td>
	</tr>	
	<tr>
		<td>
			Archivo Muerto 
		</td>
		<td style=text-align:center;>
			<?php 
if ($deathfile=="Y") {
				echo "Si";
			} else if($deathfile=="N"){
				echo "No";
}				 
?>
		</td>
	</tr>	
	<tr>
		<td>
			Archivo Abierto 
		</td>
		<td style=text-align:center;>
			<?php
if ($openfile=="Y") {
				echo "Si";
			} else if($openfile=="N"){
				echo "No";
}			  
?>
		</td>
	</tr>	
	<tr>
		<td>
			Energía Electrónica 
		</td>
		<td style=text-align:center;>
			<?php  
if ($electricpower=="Y") {
				echo "Si";
			} else if($electricpower=="N"){
				echo "No";
}			
 ?>
		</td>
	</tr>	
	<tr>
		<td>
			Instalaciones para la Basura: 
		</td>
		<td style=text-align:center;>
			<?php  
			echo $trashinstall; ?>
		</td>
	</tr>	
	<tr>
		<td>
			Tipo de Basura Recolectada: 
		</td>
		<td style=text-align:center;>
			<?php  
			echo $trashtype; ?>
		</td>
	</tr>			
</table>
<div style="page-break-after:always;"></div>

<div style="padding-left:1cm">
    <p style="font-size:14pt">Instalaciones de Seguridad y Protección:</p>
</div>
<table class="tb">
	<tr>
		<td>
			Sistema de Alarma Automatica contra Robo
		</td>
		<td style=text-align:center; width="50%">
			<?php 
if ($automaticalarmsystem=="Y") {
				echo "Si";
			} else if($automaticalarmsystem=="N"){
				echo "No";
}
 ?>
		</td>		
	</tr>
	<tr>
		<td>
			Sistema de Monitoreo Por TV 
		</td>
		<td style=text-align:center;>
			<?php  
if ($tvmonitoringsystem=="Y") {
				echo "Si";
			} else if($tvmonitoringsystem=="N"){
				echo "No";
}
 ?>
		</td>		
	</tr>
	<tr>
		<td>
			Comunicación (Teléfonos)
		</td>
		<td style=text-align:center;>
			<?php 
if ($comunication=="Y") {
				echo "Si";
			} else if($comunication=="N"){
				echo "No";
}
 ?>
		</td>		
	</tr>	
</table>



<div style="padding-left:1cm">
    <p style="font-size:14pt">
		Determinación de las Zonas de Riesgo Internas:</p>
    </div>
		<div style="font-weight:normal;">
        <p style="font-size:12pt">
        <div style="padding-left:1cm">
<?php
            echo $internaldangerzone;          
?>		</div> <br>

<div style="padding-left:1cm">
<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-1-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  

    
echo '<div class="col-12 col-lg-8" id="show-ANALRIESG-1-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"];    
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'"width="380px" height="300px" />';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
  
?></div><br>        
	</p>	</div><div style="page-break-after:always;"></div>
    <?php

            $comzone1="SELECT 
  cimentation ,
  cimentationcutting ,
  cimentationretraction ,
  cimentationflaming ,
  cimentationtemperature ,
  cimentationcorrosive ,
  cimentationcomplexion ,
  cimentationflexion ,
  cimentationpanding ,
  cimentationcollapsing ,
  cimentationinclination ,
  cimentationsettlement ,
  cimentationcraking ,
  cimentationothers ,";
  $comzone1 .= '"column" ,';
   $comzone1 .= "
  columncutting ,
  columnretraction ,
  columnflaming ,
  columntemperature ,
  columncorrosive ,
  columncomplexion ,
  columnflexion ,
  columnpanding ,
  columncollapsing ,
  columninclination ,
  columnsettlement ,
  columncraking ,
  columnothers ,
  wall ,
  wallcutting ,
  wallretraction ,
  wallflaming ,
  walltemperature ,
  wallcorrosive ,
  wallcomplexion ,
  wallflexion ,
  wallpanding ,
  wallcollapsing ,
  wallinclination ,
  wallsettlement ,
  wallcraking ,
  wallothers ,
  roof ,
  roofcutting ,
  roofretraction ,
  roofflaming ,
  rooftemperature ,
  roofcorrosive ,
  roofcomplexion ,
  roofflexion ,
  roofpanding ,
  roofcollapsing ,
  roofinclination ,
  roofsettlement ,
  roofcraking ,
  roofothers ,
  stairs ,
  stairscutting ,
  stairsretraction ,
  stairsflaming ,
  stairstemperature ,
  stairscorrosive ,
  stairscomplexion ,
  stairsflexion ,
  stairspanding ,
  stairscollapsing ,
  stairsinclination ,
  stairssettlement ,
  stairscraking ,
  stairsothers ,
  trabes ,
  trabescutting ,
  trabesretraction ,
  trabesflaming ,
  trabestemperature ,
  trabescorrosive ,
  trabescomplexion ,
  trabesflexion ,
  trabespanding ,
  trabescollapsing ,
  trabesinclination ,
  trabessettlement ,
  trabescraking ,
  trabesothers ,
  structuraldamagehigh ,
  structuraldamagemedium ,
  structuraldamagelow ,
  structuraldamagenonexistent ,
  collapsehigh ,
  collapsemedium ,
  collapselow ,
  collapsenonexistent ,
  finishdamagehigh ,
  finishdamagemedium ,
  finishdamagelow ,
  finishdamagenonexistent ,
  severedamagehigh ,
  severedamagemedium ,
  severedamagelow ,
  severedamagenonexistent ,
  sinkinghigh ,
  sinkingmedium ,
  sinkinglow ,
  sinkingnonexistent ,
  inclinationhigh ,
  inclinationmedium ,
  inclinationlow ,
  inclinationnonexistent ,
  inundationhigh ,
  inundationmedium ,
  inundationlow ,
  inundationnonexistent ,
  firehigh ,
  firemedium ,
  firelow ,
  firenonexistent ,
  explosionhigh ,
  explosionmedium ,
  explosionlow ,
  explosionnonexistent ,
  gasleakhigh ,
  gasleakmedium ,
  gasleaklow ,
  gasleaknonexistent ,
  spillhazardousmaterialshigh ,
  spillhazardousmaterialsmedium ,
  spillhazardousmaterialslow ,
  spillhazardousmaterialsnonexistent ,
  pollutionhigh ,
  pollutionmedium ,
  pollutionlow ,
  pollutionnonexistent ,
  epidemichigh ,
  epidemicmedium ,
  epidemiclow ,
  epidemicnonexistent ,  
  bombthreathigh ,
  bombthreatmedium ,
  bombthreatlow ,
  bombthreatnonexistent ,
  highvoltagetower ,
  electricpowerpoles ,
  electrictransformers ,
  damagesewers ,
  damagesidewalks ,
  hightanks ,
  bigtrees ,
  overpasses ,
  pedestrianbridge ,
  muchtraffic ,
  highbuilding ,
  bigannouncements ,
  dangercanopies ,
  notoriouosinclination ,
  closestreets ,
  slopingstreets ,
  industriesorbussiness ,
  pemexinstall ,
  chemicalinsdustries ,
  industries ,
  schools ,
  hospitals

            FROM core.securityplanriskanalysyszone WHERE idparty='$idpartyenterprise'";
            // var_dump($comzone1);
            $resul=$dbl->executeReader($comzone1);
                if ($resul[0] != "") { 
  $cimentation = $resul[0]["cimentation"];
  $cimentationcutting = $resul[0]["cimentationcutting"];
  $cimentationretraction = $resul[0]["cimentationretraction"];
  $cimentationflaming = $resul[0]["cimentationflaming"];
  $cimentationtemperature = $resul[0]["cimentationtemperature"];
  $cimentationcorrosive = $resul[0]["cimentationcorrosive"];
  $cimentationcomplexion = $resul[0]["cimentationcomplexion"];
  $cimentationflexion = $resul[0]["cimentationflexion"];
  $cimentationpanding = $resul[0]["cimentationpanding"];
  $cimentationcollapsing = $resul[0]["cimentationcollapsing"];
  $cimentationinclination = $resul[0]["cimentationinclination"];
  $cimentationsettlement = $resul[0]["cimentationsettlement"];
  $cimentationcraking = $resul[0]["cimentationcraking"];
  $cimentationothers = $resul[0]["cimentationothers"];
  $column = $resul[0]["column"];
  $columncutting = $resul[0]["columncutting"];
  $columnretraction = $resul[0]["columnretraction"];
  $columnflaming = $resul[0]["columnflaming"];
  $columntemperature = $resul[0]["columntemperature"];
  $columncorrosive = $resul[0]["columncorrosive"];
  $columncomplexion = $resul[0]["columncomplexion"];
  $columnflexion = $resul[0]["columnflexion"];
  $columnpanding = $resul[0]["columnpanding"];
  $columncollapsing = $resul[0]["columncollapsing"];
  $columninclination = $resul[0]["columninclination"];
  $columnsettlement = $resul[0]["columnsettlement"];
  $columncraking = $resul[0]["columncraking"];
  $columnothers = $resul[0]["columnothers"];
  $wall = $resul[0]["wall"];
  $wallcutting = $resul[0]["wallcutting"];
  $wallretraction = $resul[0]["wallretraction"];
  $wallflaming = $resul[0]["wallflaming"];
  $walltemperature = $resul[0]["walltemperature"];
  $wallcorrosive = $resul[0]["wallcorrosive"];
  $wallcomplexion = $resul[0]["wallcomplexion"];
  $wallflexion = $resul[0]["wallflexion"];
  $wallpanding = $resul[0]["wallpanding"];
  $wallcollapsing = $resul[0]["wallcollapsing"];
  $wallinclination = $resul[0]["wallinclination"];
  $wallsettlement = $resul[0]["wallsettlement"];
  $wallcraking = $resul[0]["wallcraking"];
  $wallothers = $resul[0]["wallothers"];
  $roof = $resul[0]["roof"];
  $roofcutting = $resul[0]["roofcutting"];
  $roofretraction = $resul[0]["roofretraction"];
  $roofflaming = $resul[0]["roofflaming"];
  $rooftemperature = $resul[0]["rooftemperature"];
  $roofcorrosive = $resul[0]["roofcorrosive"];
  $roofcomplexion = $resul[0]["roofcomplexion"];
  $roofflexion = $resul[0]["roofflexion"];
  $roofpanding = $resul[0]["roofpanding"];
  $roofcollapsing = $resul[0]["roofcollapsing"];
  $roofinclination = $resul[0]["roofinclination"];
  $roofsettlement = $resul[0]["roofsettlement"];
  $roofcraking = $resul[0]["roofcraking"];
  $roofothers = $resul[0]["roofothers"];
  $stairs = $resul[0]["stairs"];
  $stairscutting = $resul[0]["stairscutting"];
  $stairsretraction = $resul[0]["stairsretraction"];
  $stairsflaming = $resul[0]["stairsflaming"];
  $stairstemperature = $resul[0]["stairstemperature"];
  $stairscorrosive = $resul[0]["stairscorrosive"];
  $stairscomplexion = $resul[0]["stairscomplexion"];
  $stairsflexion = $resul[0]["stairsflexion"];
  $stairspanding = $resul[0]["stairspanding"];
  $stairscollapsing = $resul[0]["stairscollapsing"];
  $stairsinclination = $resul[0]["stairsinclination"];
  $stairssettlement = $resul[0]["stairssettlement"];
  $stairscraking = $resul[0]["stairscraking"];
  $stairsothers = $resul[0]["stairsothers"];
  $trabes = $resul[0]["trabes"];
  $trabescutting = $resul[0]["trabescutting"];
  $trabesretraction = $resul[0]["trabesretraction"];
  $trabesflaming = $resul[0]["trabesflaming"];
  $trabestemperature = $resul[0]["trabestemperature"];
  $trabescorrosive = $resul[0]["trabescorrosive"];
  $trabescomplexion = $resul[0]["trabescomplexion"];
  $trabesflexion = $resul[0]["trabesflexion"];
  $trabespanding = $resul[0]["trabespanding"];
  $trabescollapsing = $resul[0]["trabescollapsing"];
  $trabesinclination = $resul[0]["trabesinclination"];
  $trabessettlement = $resul[0]["trabessettlement"];
  $trabescraking = $resul[0]["trabescraking"];
  $trabesothers = $resul[0]["trabesothers"];
  $structuraldamagehigh = $resul[0]["structuraldamagehigh"];
  $structuraldamagemedium = $resul[0]["structuraldamagemedium"];
  $structuraldamagelow = $resul[0]["structuraldamagelow"];
  $structuraldamagenonexistent = $resul[0]["structuraldamagenonexistent"];
  $collapsehigh = $resul[0]["collapsehigh"];
  $collapsemedium = $resul[0]["collapsemedium"];
  $collapselow = $resul[0]["collapselow"];
  $collapsenonexistent = $resul[0]["collapsenonexistent"];
  $finishdamagehigh = $resul[0]["finishdamagehigh"];
  $finishdamagemedium = $resul[0]["finishdamagemedium"];
  $finishdamagelow = $resul[0]["finishdamagelow"];
  $finishdamagenonexistent = $resul[0]["finishdamagenonexistent"];
  $severedamagehigh = $resul[0]["severedamagehigh"];
  $severedamagemedium = $resul[0]["severedamagemedium"];
  $severedamagelow = $resul[0]["severedamagelow"];
  $severedamagenonexistent = $resul[0]["severedamagenonexistent"];
  $sinkinghighsinkinghigh = $resul[0]["sinkinghigh"];
  $sinkingmediumsinkinghigh = $resul[0]["sinkingmedium"];
  $sinkinglowsinkinghigh = $resul[0]["sinkinglow"];
  $sinkingnonexistentsinkinghigh = $resul[0]["sinkingnonexistent"];
  $inclinationhigh = $resul[0]["inclinationhigh"];
  $inclinationmedium = $resul[0]["inclinationmedium"];
  $inclinationlow = $resul[0]["inclinationlow"];
  $inclinationnonexistent = $resul[0]["inclinationnonexistent"];
  $inundationhigh = $resul[0]["inundationhigh"];
  $inundationmedium = $resul[0]["inundationmedium"];
  $inundationlow = $resul[0]["inundationlow"];
  $inundationnonexistent = $resul[0]["inundationnonexistent"];
  $firehighsecurityplanriskanalysyszone = $resul[0]["firehigh"];
  $firemediumsecurityplanriskanalysyszone = $resul[0]["firemedium"];
  $firelowsecurityplanriskanalysyszone = $resul[0]["firelow"];
  $firenonexistentsecurityplanriskanalysyszone = $resul[0]["firenonexistent"];
  $explosionhigh = $resul[0]["explosionhigh"];
  $explosionmedium = $resul[0]["explosionmedium"];
  $explosionlow = $resul[0]["explosionlow"];
  $explosionnonexistent = $resul[0]["explosionnonexistent"];
  $gasleakhigh = $resul[0]["gasleakhigh"];
  $gasleakmedium = $resul[0]["gasleakmedium"];
  $gasleaklow = $resul[0]["gasleaklow"];
  $gasleaknonexistent = $resul[0]["gasleaknonexistent"];
  $spillhazardousmaterialshigh = $resul[0]["spillhazardousmaterialshigh"];
  $spillhazardousmaterialsmedium = $resul[0]["spillhazardousmaterialsmedium"];
  $spillhazardousmaterialslow = $resul[0]["spillhazardousmaterialslow"];
  $spillhazardousmaterialsnonexistent = $resul[0]["spillhazardousmaterialsnonexistent"];
  $pollutionhigh = $resul[0]["pollutionhigh"];
  $pollutionmedium = $resul[0]["pollutionmedium"];
  $pollutionlow = $resul[0]["pollutionlow"];
  $pollutionnonexistent = $resul[0]["pollutionnonexistent"];
  $epidemichighsecurityplanriskanalysyszone = $resul[0]["epidemichigh"];
  $epidemicmediumsecurityplanriskanalysyszone = $resul[0]["epidemicmedium"];
  $epidemiclowsecurityplanriskanalysyszone = $resul[0]["epidemiclow"];
  $epidemicnonexistentsecurityplanriskanalysyszone = $resul[0]["epidemicnonexistent"];  
  $bombthreathigh = $resul[0]["bombthreathigh"];
  $bombthreatmedium = $resul[0]["bombthreatmedium"];
  $bombthreatlow = $resul[0]["bombthreatlow"];
  $bombthreatnonexistent = $resul[0]["bombthreatnonexistent"];
  $highvoltagetower = $resul[0]["highvoltagetower"];
  $electricpowerpoles = $resul[0]["electricpowerpoles"];
  $electrictransformers = $resul[0]["electrictransformers"];
  $damagesewers = $resul[0]["damagesewers"];
  $damagesidewalks = $resul[0]["damagesidewalks"];
  $hightanks = $resul[0]["hightanks"];
  $bigtrees = $resul[0]["bigtrees"];
  $overpasses = $resul[0]["overpasses"];
  $pedestrianbridge = $resul[0]["pedestrianbridge"];
  $muchtraffic = $resul[0]["muchtraffic"];
  $highbuilding = $resul[0]["highbuilding"];
  $bigannouncements = $resul[0]["bigannouncements"];
  $dangercanopies = $resul[0]["dangercanopies"];
  $notoriouosinclination = $resul[0]["notoriouosinclination"];
  $closestreets = $resul[0]["closestreets"];
  $slopingstreets = $resul[0]["slopingstreets"];
  $industriesorbussiness = $resul[0]["industriesorbussiness"];
  $pemexinstall = $resul[0]["pemexinstall"];
  $chemicalinsdustries = $resul[0]["chemicalinsdustries"];
  $industries = $resul[0]["industries"];
  $schools = $resul[0]["schools"];
  $hospitals = $resul[0]["hospitals"];
            }       

// --------------------------tabla 1


    echo '<div style="text-align: center;">

    <span style="color:black; font-size:16pt; ">Zonas de Riesgos Internos de Acuerdo con los Terminamos de Referencia</span><br><br>
    </div>'; 
echo '

<table class="tb" style="font-size:12pt;">
    <tr>
        <td>
            Elementos    
        </td>
        <td>
            Si      
        </td>
        <td>
            No      
        </td>
        <td>
            Cortante      
        </td>
        <td>
            Retracción  
        </td>
        <td>
            Flameo     
        </td>
        <td>
            Temperatura     
        </td>
        <td>
            Corrosión
        </td>
        <td>
            Compexión      
        </td>
        <td>
            Flexión      
        </td>
        <td>
            Pandeo      
        </td>
        <td>
            Colapso      
        </td>
        <td>
            Inclinación      
        </td>
        <td>
            Asentamiento      
        </td>
        <td>
            Agretamiento      
        </td>
        <td>
            Otros      
        </td>
    </tr>
    <tr>       
        <td>
            Cimentación      
        </td>
        <td style=text-align:right; >
            <INPUT  type="radio" '
            . ' name="cimentation" id="" '
            . ' value="Y" '
; if ($cimentation == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentation" id="" '
            . ' value="N" '
; if ($cimentation == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationcutting" id="" '
            . ' value="Y" '
; if ($cimentationcutting == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationretraction" id="" '
            . ' value="Y" '
; if ($cimentationretraction == "Y"){ echo ' checked '; }        

         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationflaming" id="" '
            . ' value="Y" '
; if ($cimentationflaming == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationtemperature" id="" '
            . ' value="Y" '
; if ($cimentationtemperature == "Y"){ echo ' checked '; }        

         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationcorrosive" id="" '
            . ' value="Y" '

; if ($cimentationcorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationcomplexion" id="" '
            . ' value="Y" '

; if ($cimentationcomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationflexion" id="" '
            . ' value="Y" '

; if ($cimentationflexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationpanding" id="" '
            . ' value="Y" '

; if ($cimentationpanding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationcollapsing" id="" '
            . ' value="Y" '

; if ($cimentationcollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationinclination" id="" '
            . ' value="Y" '

; if ($cimentationinclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationsettlement" id="" '
            . ' value="Y" '

; if ($cimentationsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationcraking" id="" '
            . ' value="Y" '

; if ($cimentationcraking == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="cimentationothers" id="" '
            . ' value="Y" '

; if ($cimentationothers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>

    </tr>
    <tr>       
        <td>
            Columnas    
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="column" id="" '
            . ' value="Y" '

; if ($column == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="column" id="" '
            . ' value="N" '

; if ($column == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columncutting" id="" '
            . ' value="Y" '

; if ($columncutting == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columnretraction" id="" '
            . ' value="Y" '

; if ($columnretraction == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columnflaming" id="" '
            . ' value="Y" '

; if ($columnflaming == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columntemperature" id="" '
            . ' value="Y" '

; if ($columntemperature == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columncorrosive" id="" '
            . ' value="Y" '

; if ($columncorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columncomplexion" id="" '
            . ' value="Y" '

; if ($columncomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columnflexion" id="" '
            . ' value="Y" '

; if ($columnflexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columnpanding" id="" '
            . ' value="Y" '

; if ($columnpanding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columncollapsing" id="" '
            . ' value="Y" '

; if ($columncollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columninclination" id="" '
            . ' value="Y" '

; if ($columninclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columnsettlement" id="" '
            . ' value="Y" '

; if ($columnsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columncraking" id="" '
            . ' value="Y" '

; if ($columncraking == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="columnothers" id="" '
            . ' value="Y" '

; if ($columnothers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>

    </tr>
    <tr>       
        <td>
            Muros    
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wall" id="" '
            . ' value="Y" '

; if ($wall == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wall" id="" '
            . ' value="N" '

; if ($wall == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallcutting" id="" '
            . ' value="Y" '

; if ($wallcutting == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallretraction" id="" '
            . ' value="Y" '

; if ($wallretraction == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallflaming" id="" '
            . ' value="Y" '

; if ($wallflaming == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="walltemperature" id="" '
            . ' value="Y" '

; if ($walltemperature == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallcorrosive" id="" '
            . ' value="Y" '

; if ($wallcorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallcomplexion" id="" '
            . ' value="Y" '

; if ($wallcomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallflexion" id="" '
            . ' value="Y" '

; if ($wallflexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallpanding" id="" '
            . ' value="Y" '

; if ($wallpanding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallcollapsing" id="" '
            . ' value="Y" '

; if ($wallcollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallinclination" id="" '
            . ' value="Y" '

; if ($wallinclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallsettlement" id="" '
            . ' value="Y" '

; if ($wallsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallcraking" id="" '
            . ' value="Y" '

; if ($wallcraking == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="wallothers" id="" '
            . ' value="Y" '

; if ($wallothers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            Techos     
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roof" id="" '
            . ' value="Y" '

; if ($roof == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roof" id="" '
            . ' value="N" '

; if ($roof == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofcutting" id="" '
            . ' value="Y" '

; if ($roofcutting == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofretraction" id="" '
            . ' value="Y" '

; if ($roofretraction == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofflaming" id="" '
            . ' value="Y" '

; if ($roofflaming == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="rooftemperature" id="" '
            . ' value="Y" '

; if ($rooftemperature == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofcorrosive" id="" '
            . ' value="Y" '

; if ($roofcorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofcomplexion" id="" '
            . ' value="Y" '

; if ($roofcomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofflexion" id="" '
            . ' value="Y" '

; if ($roofflexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofpanding" id="" '
            . ' value="Y" '

; if ($roofpanding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofcollapsing" id="" '
            . ' value="Y" '

; if ($roofcollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofinclination" id="" '
            . ' value="Y" '

; if ($roofinclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofsettlement" id="" '
            . ' value="Y" '

; if ($roofsettlement == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofcraking" id="" '
            . ' value="Y" '

; if ($roofcraking == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="roofothers" id="" '
            . ' value="Y" '

; if ($roofothers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            Escaleras     
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairs" id="" '
            . ' value="Y" '

; if ($stairs == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairs" id="" '
            . ' value="N" '

; if ($stairs == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairscutting" id="" '
            . ' value="Y" '

; if ($stairscutting == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairsretraction" id="" '
            . ' value="Y" '

; if ($stairsretraction == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairsflaming" id="" '
            . ' value="Y" '

; if ($stairsflaming == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;> 
            <INPUT  type="radio" '
            . ' name="stairstemperature" id="" '
            . ' value="Y" '

; if ($stairstemperature == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairscorrosive" id="" '
            . ' value="Y" '

; if ($stairscorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairscomplexion" id="" '
            . ' value="Y" '

; if ($stairscomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairsflexion" id="" '
            . ' value="Y" '

; if ($stairsflexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairspanding" id="" '
            . ' value="Y" '

; if ($stairspanding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairscollapsing" id="" '
            . ' value="Y" '

; if ($stairscollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairsinclination" id="" '
            . ' value="Y" '

; if ($stairsinclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairssettlement" id="" '
            . ' value="Y" '

; if ($stairssettlement == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairscraking" id="" '
            . ' value="Y" '

; if ($stairscraking == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="stairsothers" id="" '
            . ' value="Y" '

; if ($stairsothers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>

    </tr>
    <tr>       
        <td>
            Trabes     
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabes" id="" '
            . ' value="Y" '

; if ($trabes == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabes" id="" '
            . ' value="N" '

; if ($trabes == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabescutting" id="" '
            . ' value="Y" '

; if ($trabescutting == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabesretraction" id="" '
            . ' value="Y" '

; if ($trabesretraction == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabesflaming" id="" '
            . ' value="Y" '

; if ($trabesflaming == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabestemperature" id="" '
            . ' value="Y" '

; if ($trabestemperature == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabescorrosive" id="" '
            . ' value="Y" '

; if ($trabescorrosive == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabescomplexion" id="" '
            . ' value="Y" '

; if ($trabescomplexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabesflexion" id="" '
            . ' value="Y" '

; if ($trabesflexion == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabespanding" id="" '
            . ' value="Y" '

; if ($trabespanding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabescollapsing" id="" '
            . ' value="Y" '

; if ($trabescollapsing == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabesinclination" id="" '
            . ' value="Y" '

; if ($trabesinclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabessettlement" id="" '
            . ' value="Y" '

; if ($trabessettlement == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabescraking" id="" '
            . ' value="Y" '

; if ($trabescraking == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="trabesothers" id="" '
            . ' value="Y" '

; if ($trabesothers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>

    </tr>

</table>

'; 
// --------------------------------------------------------------


// ----------------------parte 8


echo '  

    <table class="tb">
        <tr>
            <td>
                <span></span>
            </td>
            <td>
                <span>Alto</span>
            </td>
            <td>
                <span>Regular</span>
            </td>
            <td>
                <span>Bajo</span>
            </td>
            <td>
                <span>Inexistente</span>
            </td>
        </tr>
        <tr>       
        <td>
            <SPAN>Daño Estructural</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="structuraldamagehigh" id="" '
            . ' value="Y" '

; if ($structuraldamagehigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="structuraldamagemedium" id="" '
            . ' value="Y" '

; if ($structuraldamagemedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean" > '
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="structuraldamagelow" id="" '
            . ' value="Y" '

; if ($structuraldamagelow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="structuraldamagenonexistent" id="" '
            . ' value="Y" '

; if ($structuraldamagenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Colapso</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="collapsehigh" id="" '
            . ' value="Y" '

; if ($collapsehigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="collapsemedium" id="" '
            . ' value="Y" '

; if ($collapsemedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="collapselow" id="" '
            . ' value="Y" '

; if ($collapselow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="collapsenonexistent" id="" '
            . ' value="Y" '

; if ($collapsenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Daño en acabados</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="finishdamagehigh" id="" '
            . ' value="Y" '

; if ($finishdamagehigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="finishdamagemedium" id="" '
            . ' value="Y" '

; if ($finishdamagemedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="finishdamagelow" id="" '
            . ' value="Y" '

; if ($finishdamagelow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="finishdamagenonexistent" id="" '
            . ' value="Y" '

; if ($finishdamagenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Daño severo en muros no estructurales, balcones, escaleras</SPAN>      
        </td>
        <td style=text-align:right;> 
            <INPUT  type="radio" '
            . ' name="severedamagehigh" id="" '
            . ' value="Y" '

; if ($severedamagehigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="severedamagemedium" id="" '
            . ' value="Y" '

; if ($severedamagemedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="severedamagelow" id="" '
            . ' value="Y" '

; if ($severedamagelow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="severedamagenonexistent" id="" '
            . ' value="Y" '

; if ($severedamagenonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Hundimiento</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="sinkinghighsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkinghighsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="sinkingmediumsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkingmediumsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="sinkinglowsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkinglowsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="sinkingnonexistentsinkinghigh" id="" '
            . ' value="Y" '

; if ($sinkingnonexistentsinkinghigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Inclinación notoria de la edificación o de algun entrepiso</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inclinationhigh" id="" '
            . ' value="Y" '

; if ($inclinationhigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inclinationmedium" id="" '
            . ' value="Y" '

; if ($inclinationmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inclinationlow" id="" '
            . ' value="Y" '

; if ($inclinationlow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inclinationnonexistent" id="" '
            . ' value="Y" '

; if ($inclinationnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Hinundación</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inundationhigh" id="" '
            . ' value="Y" '

; if ($inundationhigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inundationmedium" id="" '
            . ' value="Y" '

; if ($inundationmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inundationlow" id="" '
            . ' value="Y" '

; if ($inundationlow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="inundationnonexistent" id="" '
            . ' value="Y" '

; if ($inundationnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Incedio</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="firehighsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firehighsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="firemediumsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firemediumsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="firelowsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firelowsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="firenonexistentsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($firenonexistentsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Explosión</SPAN>      
        </td>        
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="explosionhigh" id="" '
            . ' value="Y" '

; if ($explosionhigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="explosionmedium" id="" '
            . ' value="Y" '

; if ($explosionmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="explosionlow" id="" '
            . ' value="Y" '

; if ($explosionlow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="explosionnonexistent" id="" '
            . ' value="Y" '

; if ($explosionnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Fuga de gas</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="gasleakhigh" id="" '
            . ' value="Y" '

; if ($gasleakhigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="gasleakmedium" id="" '
            . ' value="Y" '

; if ($gasleakmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="gasleaklow" id="" '
            . ' value="Y" '

; if ($gasleaklow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="gasleaknonexistent" id="" '
            . ' value="Y" '

; if ($gasleaknonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Derrame de materiales peligrosos</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialshigh" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialshigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialsmedium" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialsmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialslow" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialslow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="spillhazardousmaterialsnonexistent" id="" '
            . ' value="Y" '

; if ($spillhazardousmaterialsnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Contaminación</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pollutionhigh" id="" '
            . ' value="Y" '

; if ($pollutionhigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pollutionmedium" id="" '
            . ' value="Y" '

; if ($pollutionmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pollutionlow" id="" '
            . ' value="Y" '

; if ($pollutionlow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pollutionnonexistent" id="" '
            . ' value="Y" '

; if ($pollutionnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Epidemias</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="epidemichighsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemichighsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="epidemicmediumsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemicmediumsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="epidemiclowsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemiclowsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="epidemicnonexistentsecurityplanriskanalysyszone" id="" '
            . ' value="Y" '

; if ($epidemicnonexistentsecurityplanriskanalysyszone == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Amenazas de bombas</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bombthreathigh" id="" '
            . ' value="Y" '

; if ($bombthreathigh == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bombthreatmedium" id="" '
            . ' value="Y" '

; if ($bombthreatmedium == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bombthreatlow" id="" '
            . ' value="Y" '

; if ($bombthreatlow == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bombthreatnonexistent" id="" '
            . ' value="Y" '

; if ($bombthreatnonexistent == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>    
    </table>
';
?>

        <div style="page-break-after:always;"></div>



		<!-- ANALISIS DE RIESGOS EXTERNOS-->
		<p style="font-size:14pt; text-align:center;"><b> ANALISIS DE RIESGOS EXTERNOS</b></p>

<?php
echo '  

    <table class="tb">
        <tr>
            <td>
                <span></span>
            </td>
            <td>
                <span>Si</span>
            </td>
            <td>
                <span>No</span>
            </td>
        </tr>
        <tr>       
        <td>
            <SPAN>Torres con Cable de Alta Tensión</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="highvoltagetower" id="" '
            . ' value="Y" '

; if ($highvoltagetower == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="highvoltagetower" id="" '
            . ' value="N" '

; if ($highvoltagetower == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Postes de Energía Eléctrica</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="electricpowerpoles" id="" '
            . ' value="Y" '

; if ($electricpowerpoles == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="electricpowerpoles" id="" '
            . ' value="N" '

; if ($electricpowerpoles == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Transformadores o Subestaciones Eléctricas</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="electrictransformers" id="" '
            . ' value="Y" '

; if ($electrictransformers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="electrictransformers" id="" '
            . ' value="N" '

; if ($electrictransformers == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Alcantarillas en Mal Estado</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="damagesewers" id="" '
            . ' value="Y" '

; if ($damagesewers == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="damagesewers" id="" '
            . ' value="N" '

; if ($damagesewers == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Banquetas Desniveladas</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="damagesidewalks" id="" '
            . ' value="Y" '

; if ($damagesidewalks == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="damagesidewalks" id="" '
            . ' value="N" '

; if ($damagesidewalks == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Depósitos Elevados de Agua o Combustible</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="hightanks" id="" '
            . ' value="Y" '

; if ($hightanks == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="hightanks" id="" '
            . ' value="N" '

; if ($hightanks == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Arboles Grandes o Viejos que puedan Caer</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bigtrees" id="" '
            . ' value="Y" '

; if ($bigtrees == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bigtrees" id="" '
            . ' value="N" '

; if ($bigtrees == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Pasos a Desnivel</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="overpasses" id="" '
            . ' value="Y" '

; if ($overpasses == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="overpasses" id="" '
            . ' value="N" '

; if ($overpasses == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Puentes Peatonales</SPAN>      
        </td>        
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pedestrianbridge" id="" '
            . ' value="Y" '

; if ($pedestrianbridge == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pedestrianbridge" id="" '
            . ' value="N" '

; if ($pedestrianbridge == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Alto Fluido Vehicular</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="muchtraffic" id="" '
            . ' value="Y" '

; if ($muchtraffic == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="muchtraffic" id="" '
            . ' value="N" '

; if ($muchtraffic == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Edificios Colindantes o Cercanos Muy Alto</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="highbuilding" id="" '
            . ' value="Y" '

; if ($highbuilding == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="highbuilding" id="" '
            . ' value="N" '

; if ($highbuilding == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Anuncios espectaculares</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bigannouncements" id="" '
            . ' value="Y" '

; if ($bigannouncements == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="bigannouncements" id="" '
            . ' value="N" '

; if ($bigannouncements == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Marquesinas o Pretiles Peligrosos</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="dangercanopies" id="" '
            . ' value="Y" '

; if ($dangercanopies == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="dangercanopies" id="" '
            . ' value="N" '

; if ($dangercanopies == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Inclinación Notoria en Inmuebles Colindantes</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="notoriouosinclination" id="" '
            . ' value="Y" '

; if ($notoriouosinclination == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="notoriouosinclination" id="" '
            . ' value="N" '

; if ($notoriouosinclination == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>       
        <td>
            <SPAN>Calles Cerradas a la Circulatorio</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="closestreets" id="" '
            . ' value="Y" '

; if ($closestreets == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="closestreets" id="" '
            . ' value="N" '

; if ($closestreets == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Calles con pedientes pronunciadas</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="slopingstreets" id="" '
            . ' value="Y" '

; if ($slopingstreets == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="slopingstreets" id="" '
            . ' value="N" '

; if ($slopingstreets == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>     
    <tr>       
        <td>
            <SPAN>Industrias o Negocios de o Sustancias químicas Peligrosos, gasolineras</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="industriesorbussiness" id="" '
            . ' value="Y" '

; if ($industriesorbussiness == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="industriesorbussiness" id="" '
            . ' value="N" '

; if ($industriesorbussiness == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Instalación de Pemex (oleoducto, gasoducto)</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="pemexinstall" id="" '
            . ' value="Y" '

; if ($pemexinstall == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;> 
            <INPUT  type="radio" '
            . ' name="pemexinstall" id="" '
            . ' value="N" '

; if ($pemexinstall == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>negocios que manejas sustancias peligrosas en la vía publica</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="chemicalinsdustries" id="" '
            . ' value="Y" '

; if ($chemicalinsdustries == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;> 
            <INPUT  type="radio" '
            . ' name="chemicalinsdustries" id="" '
            . ' value="N" '

; if ($chemicalinsdustries == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Industrias</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="industries" id="" '
            . ' value="Y" '

; if ($industries == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="industries" id="" '
            . ' value="N" '

; if ($industries == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Escuelas</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="schools" id="" '
            . ' value="Y" '

; if ($schools == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="schools" id="" '
            . ' value="N" '

; if ($schools == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr> 
    <tr>       
        <td>
            <SPAN>Hospitales</SPAN>      
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="hospitals" id="" '
            . ' value="Y" '

; if ($hospitals == "Y"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="hospitals" id="" '
            . ' value="N" '

; if ($hospitals == "N"){ echo ' checked '; }        
         echo ' class="radioboolean">'
            .'</INPUT>        
        </td>
    </tr>     
    </table>
';
?>



<!-- 	<div style="">
		<span style="color:black; font-size: x-large; ">
		Determinación de las Zonas de Riesgo Internas:</span>
    </div> -->
		<div style="text-align: justify; margin-bottom: 1.5rem;">
<?php
            echo $infonaturalthreats;          
?>		
		</div>


<?php

            $com="SELECT 
  infonaturalthreats ,
  earthquakenull ,
  earthquakelow ,
  earthquakemedium ,
  earthquakehigh ,
  earthquakeno ,
  volcanismnull ,
  volcanismlow ,
  volcanismmedium ,
  volcanismhigh ,
  volcanismno ,
  soilcollapsenull ,
  soilcollapselow ,
  soilcollapsemedium ,
  soilcollapsehigh ,
  soilcollapseno ,
  sinkingnull ,
  sinkinglow ,
  sinkingmedium ,
  sinkinghigh ,
  sinkingno ,
  crackingnull ,
  crackinglow ,
  crackingmedium ,
  crackinghigh ,
  crackingno ,
  mudnull ,
  mudlow ,
  mudmedium ,
  mudhigh ,
  mudno ,
  landslidesnull ,
  landslideslow ,
  landslidesmedium ,
  landslideshigh ,
  landslidesno ,
  acidrainnull ,
  acidrainlow ,
  acidrainmedium ,
  acidrainhigh ,
  acidrainno ,
  pouringrainnull ,
  pouringrainlow ,
  pouringrainmedium ,
  pouringrainhigh ,
  pouringrainno ,
  tropicalstormnull ,
  tropicalstormlow ,
  tropicalstormmedium ,
  tropicalstormhigh ,
  tropicalstormno ,
  floodingnull ,
  floodinglow ,
  floodingmedium ,
  floodinghigh ,
  floodingno ,
  hurricanesnull ,
  hurricaneslow ,
  hurricanesmedium ,
  hurricaneshigh ,
  hurricanesno ,
  electricstormnull ,
  electricstormlow ,
  electricstormmedium ,
  electricstormhigh ,
  electricstormno ,
  extremetemperaturesnull ,
  extremetemperatureslow ,
  extremetemperaturesmedium ,
  extremetemperatureshigh ,
  extremetemperaturesno ,
  thrombusnull ,
  thrombuslow ,
  thrombusmedium ,
  thrombushigh ,
  thrombusno ,
  hailstormnull ,
  hailstormlow ,
  hailstormmedium ,
  hailstormhigh ,
  hailstormno ,
  strongwindsnull ,
  strongwindslow ,
  strongwindsmedium ,
  strongwindshigh ,
  strongwindsno ,
  droughtsnull ,
  droughtslow ,
  droughtsmedium ,
  droughtshigh ,
  droughtsno ,
  firenull ,
  firelow ,
  firemedium ,
  firehigh ,
  fireno ,
  explosionsnull ,
  explosionslow ,
  explosionsmedium ,
  explosionshigh ,
  explosionsno ,
  chemicalspillnull ,
  chemicalspilllow ,
  chemicalspillmedium ,
  chemicalspillhigh ,
  chemicalspillno ,
  radiationsnull ,
  radiationslow ,
  radiationsmedium ,
  radiationshigh ,
  radiationsno ,
  enviromentalpollutionsnull ,
  enviromentalpollutionslow ,
  enviromentalpollutionsmedium ,
  enviromentalpollutionshigh ,
  enviromentalpollutionsno ,
  desertificationnull ,
  desertificationlow ,
  desertificationmedium ,
  desertificationhigh ,
  desertificationno ,
  epidemicnull ,
  epidemiclow ,
  epidemicmedium ,
  epidemichigh ,
  epidemicno ,
  intoxicationnull ,
  intoxicationlow ,
  intoxicationmedium ,
  intoxicationhigh ,
  intoxicationno ,
  poisoningnull ,
  poisoninglow ,
  poisoningmedium ,
  poisoninghigh ,
  poisoningno ,
  assaultsnull ,
  assaultslow ,
  assaultsmedium ,
  assaultshigh ,
  assaultsno ,
  interruptionbasicservicesnull ,
  interruptionbasicserviceslow ,
  interruptionbasicservicesmedium ,
  interruptionbasicserviceshigh ,
  interruptionbasicservicesno ,
  masspopulationconcentrationnull ,
  masspopulationconcentrationlow ,
  masspopulationconcentrationmedium ,
  masspopulationconcentrationhigh ,
  masspopulationconcentrationno ,
  manifestationsnull ,
  manifestationslow ,
  manifestationsmedium ,
  manifestationshigh ,
  manifestationsno ,
  terrorismnull ,
  terrorismlow ,
  terrorismmedium ,
  terrorismhigh ,
  terrorismno ,
  transportaccidentsnull ,
  transportaccidentslow ,
  transportaccidentsmedium ,
  transportaccidentshigh ,
  transportaccidentsno ,
  naturalphenomenasummary ,
  analysysfoundrisks

            FROM core.securityplanriskanalysysnaturalsthreats WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $infonaturalthreats = $resul[0]["infonaturalthreats"];
  $earthquakenull = $resul[0]["earthquakenull"];
  $earthquakelow = $resul[0]["earthquakelow"];
  $earthquakemedium = $resul[0]["earthquakemedium"];
  $earthquakehigh = $resul[0]["earthquakehigh"];
  $earthquakeno = $resul[0]["earthquakeno"];
  $volcanismnull = $resul[0]["volcanismnull"];
  $volcanismlow = $resul[0]["volcanismlow"];
  $volcanismmedium = $resul[0]["volcanismmedium"];
  $volcanismhigh = $resul[0]["volcanismhigh"];
  $volcanismno = $resul[0]["volcanismno"];
  $soilcollapsenull = $resul[0]["soilcollapsenull"];
  $soilcollapselow = $resul[0]["soilcollapselow"];
  $soilcollapsemedium = $resul[0]["soilcollapsemedium"];
  $soilcollapsehigh = $resul[0]["soilcollapsehigh"];
  $soilcollapseno = $resul[0]["soilcollapseno"];
  $sinkingnull = $resul[0]["sinkingnull"];
  $sinkinglow = $resul[0]["sinkinglow"];
  $sinkingmedium = $resul[0]["sinkingmedium"];
  $sinkinghigh = $resul[0]["sinkinghigh"];
  $sinkingno = $resul[0]["sinkingno"];
  $crackingnull = $resul[0]["crackingnull"];
  $crackinglow = $resul[0]["crackinglow"];
  $crackingmedium = $resul[0]["crackingmedium"];
  $crackinghigh = $resul[0]["crackinghigh"];
  $crackingno = $resul[0]["crackingno"];
  $mudnull = $resul[0]["mudnull"];
  $mudlow = $resul[0]["mudlow"];
  $mudmedium = $resul[0]["mudmedium"];
  $mudhigh = $resul[0]["mudhigh"];
  $mudno = $resul[0]["mudno"];
  $landslidesnull = $resul[0]["landslidesnull"];
  $landslideslow = $resul[0]["landslideslow"];
  $landslidesmedium = $resul[0]["landslidesmedium"];
  $landslideshigh = $resul[0]["landslideshigh"];
  $landslidesno = $resul[0]["landslidesno"];
  $acidrainnull = $resul[0]["acidrainnull"];
  $acidrainlow = $resul[0]["acidrainlow"];
  $acidrainmedium = $resul[0]["acidrainmedium"];
  $acidrainhigh = $resul[0]["acidrainhigh"];
  $acidrainno = $resul[0]["acidrainno"];
  $pouringrainnull = $resul[0]["pouringrainnull"];
  $pouringrainlow = $resul[0]["pouringrainlow"];
  $pouringrainmedium = $resul[0]["pouringrainmedium"];
  $pouringrainhigh = $resul[0]["pouringrainhigh"];
  $pouringrainno = $resul[0]["pouringrainno"];
  $tropicalstormnull = $resul[0]["tropicalstormnull"];
  $tropicalstormlow = $resul[0]["tropicalstormlow"];
  $tropicalstormmedium = $resul[0]["tropicalstormmedium"];
  $tropicalstormhigh = $resul[0]["tropicalstormhigh"];
  $tropicalstormno = $resul[0]["tropicalstormno"];
  $floodingnull = $resul[0]["floodingnull"];
  $floodinglow = $resul[0]["floodinglow"];
  $floodingmedium = $resul[0]["floodingmedium"];
  $floodinghigh = $resul[0]["floodinghigh"];
  $floodingno = $resul[0]["floodingno"];
  $hurricanesnull = $resul[0]["hurricanesnull"];
  $hurricaneslow = $resul[0]["hurricaneslow"];
  $hurricanesmedium = $resul[0]["hurricanesmedium"];
  $hurricaneshigh = $resul[0]["hurricaneshigh"];
  $hurricanesno = $resul[0]["hurricanesno"];
  $electricstormnull = $resul[0]["electricstormnull"];
  $electricstormlow = $resul[0]["electricstormlow"];
  $electricstormmedium = $resul[0]["electricstormmedium"];
  $electricstormhigh = $resul[0]["electricstormhigh"];
  $electricstormno = $resul[0]["electricstormno"];
  $extremetemperaturesnull = $resul[0]["extremetemperaturesnull"];
  $extremetemperatureslow = $resul[0]["extremetemperatureslow"];
  $extremetemperaturesmedium = $resul[0]["extremetemperaturesmedium"];
  $extremetemperatureshigh = $resul[0]["extremetemperatureshigh"];
  $extremetemperaturesno = $resul[0]["extremetemperaturesno"];
  $thrombusnull = $resul[0]["thrombusnull"];
  $thrombuslow = $resul[0]["thrombuslow"];
  $thrombusmedium = $resul[0]["thrombusmedium"];
  $thrombushigh = $resul[0]["thrombushigh"];
  $thrombusno = $resul[0]["thrombusno"];
  $hailstormnull = $resul[0]["hailstormnull"];
  $hailstormlow = $resul[0]["hailstormlow"];
  $hailstormmedium = $resul[0]["hailstormmedium"];
  $hailstormhigh = $resul[0]["hailstormhigh"];
  $hailstormno = $resul[0]["hailstormno"];
  $strongwindsnull = $resul[0]["strongwindsnull"];
  $strongwindslow = $resul[0]["strongwindslow"];
  $strongwindsmedium = $resul[0]["strongwindsmedium"];
  $strongwindshigh = $resul[0]["strongwindshigh"];
  $strongwindsno = $resul[0]["strongwindsno"];
  $droughtsnull = $resul[0]["droughtsnull"];
  $droughtslow = $resul[0]["droughtslow"];
  $droughtsmedium = $resul[0]["droughtsmedium"];
  $droughtshigh = $resul[0]["droughtshigh"];
  $droughtsno = $resul[0]["droughtsno"];
  $firenull = $resul[0]["firenull"];
  $firelow = $resul[0]["firelow"];
  $firemedium = $resul[0]["firemedium"];
  $firehigh = $resul[0]["firehigh"];
  $fireno = $resul[0]["fireno"];
  $explosionsnull = $resul[0]["explosionsnull"];
  $explosionslow = $resul[0]["explosionslow"];
  $explosionsmedium = $resul[0]["explosionsmedium"];
  $explosionshigh = $resul[0]["explosionshigh"];
  $explosionsno = $resul[0]["explosionsno"];
  $chemicalspillnull = $resul[0]["chemicalspillnull"];
  $chemicalspilllow = $resul[0]["chemicalspilllow"];
  $chemicalspillmedium = $resul[0]["chemicalspillmedium"];
  $chemicalspillhigh = $resul[0]["chemicalspillhigh"];
  $chemicalspillno = $resul[0]["chemicalspillno"];
  $radiationsnull = $resul[0]["radiationsnull"];
  $radiationslow = $resul[0]["radiationslow"];
  $radiationsmedium = $resul[0]["radiationsmedium"];
  $radiationshigh = $resul[0]["radiationshigh"];
  $radiationsno = $resul[0]["radiationsno"];
  $enviromentalpollutionsnull = $resul[0]["enviromentalpollutionsnull"];
  $enviromentalpollutionslow = $resul[0]["enviromentalpollutionslow"];
  $enviromentalpollutionsmedium = $resul[0]["enviromentalpollutionsmedium"];
  $enviromentalpollutionshigh = $resul[0]["enviromentalpollutionshigh"];
  $enviromentalpollutionsno = $resul[0]["enviromentalpollutionsno"];
  $desertificationnull = $resul[0]["desertificationnull"];
  $desertificationlow = $resul[0]["desertificationlow"];
  $desertificationmedium = $resul[0]["desertificationmedium"];
  $desertificationhigh = $resul[0]["desertificationhigh"];
  $desertificationno = $resul[0]["desertificationno"];
  $epidemicnull = $resul[0]["epidemicnull"];
  $epidemiclow = $resul[0]["epidemiclow"];
  $epidemicmedium = $resul[0]["epidemicmedium"];
  $epidemichigh = $resul[0]["epidemichigh"];
  $epidemicno = $resul[0]["epidemicno"];
  $intoxicationnull = $resul[0]["intoxicationnull"];
  $intoxicationlow = $resul[0]["intoxicationlow"];
  $intoxicationmedium = $resul[0]["intoxicationmedium"];
  $intoxicationhigh = $resul[0]["intoxicationhigh"];
  $intoxicationno = $resul[0]["intoxicationno"];
  $poisoningnull = $resul[0]["poisoningnull"];
  $poisoninglow = $resul[0]["poisoninglow"];
  $poisoningmedium = $resul[0]["poisoningmedium"];
  $poisoninghigh = $resul[0]["poisoninghigh"];
  $poisoningno = $resul[0]["poisoningno"];
  $assaultsnull = $resul[0]["assaultsnull"];
  $assaultslow = $resul[0]["assaultslow"];
  $assaultsmedium = $resul[0]["assaultsmedium"];
  $assaultshigh = $resul[0]["assaultshigh"];
  $assaultsno = $resul[0]["assaultsno"];
  $interruptionbasicservicesnull = $resul[0]["interruptionbasicservicesnull"];
  $interruptionbasicserviceslow = $resul[0]["interruptionbasicserviceslow"];
  $interruptionbasicservicesmedium = $resul[0]["interruptionbasicservicesmedium"];
  $interruptionbasicserviceshigh = $resul[0]["interruptionbasicserviceshigh"];
  $interruptionbasicservicesno = $resul[0]["interruptionbasicservicesno"];
  $masspopulationconcentrationnull = $resul[0]["masspopulationconcentrationnull"];
  $masspopulationconcentrationlow = $resul[0]["masspopulationconcentrationlow"];
  $masspopulationconcentrationmedium = $resul[0]["masspopulationconcentrationmedium"];
  $masspopulationconcentrationhigh = $resul[0]["masspopulationconcentrationhigh"];
  $masspopulationconcentrationno = $resul[0]["masspopulationconcentrationno"];
  $manifestationsnull = $resul[0]["manifestationsnull"];
  $manifestationslow = $resul[0]["manifestationslow"];
  $manifestationsmedium = $resul[0]["manifestationsmedium"];
  $manifestationshigh = $resul[0]["manifestationshigh"];
  $manifestationsno = $resul[0]["manifestationsno"];
  $terrorismnull = $resul[0]["terrorismnull"];
  $terrorismlow = $resul[0]["terrorismlow"];
  $terrorismmedium = $resul[0]["terrorismmedium"];
  $terrorismhigh = $resul[0]["terrorismhigh"];
  $terrorismno = $resul[0]["terrorismno"];
  $transportaccidentsnull = $resul[0]["transportaccidentsnull"];
  $transportaccidentslow = $resul[0]["transportaccidentslow"];
  $transportaccidentsmedium = $resul[0]["transportaccidentsmedium"];
  $transportaccidentshigh = $resul[0]["transportaccidentshigh"];
  $transportaccidentsno = $resul[0]["transportaccidentsno"];
  $naturalphenomenasummary = $resul[0]["naturalphenomenasummary"];
  $analysysfoundrisks = $resul[0]["analysysfoundrisks"];
            }  



            echo   str_replace("\n","<br>", $infonaturalthreats) ; 
            echo "<br>";
            ?>

            <div style="page-break-after:always;"></div>
<?php

echo '  

<table class="tb">
    <tr>
        <td>
            <span>Grupo</span>
        </td>
        <td>
            <span>Fenómeno Perturbador</span>
        </td>
        <td>
            <table>
                <tr>
                    <span>Si</span>
                </tr>
                <tr>
                    <td>
                        <span>Casi nula</span>
                    </td>
                    <td>
                        <span>Baja</span>
                    </td>
                    <td>
                        <span>Media</span>
                    </td>
                    <td>
                        <span>Alta</span>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <span>No</span>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Sismos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style=text-align:right;>
                        <INPUT  type="radio" '
                        . ' name="earthquakenull" id="1-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakenull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td style=text-align:right;>
                        <INPUT  type="radio" '
                        . ' name="earthquakelow" id="2-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakelow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td style=text-align:right;>
                        <INPUT  type="radio" '
                        . ' name="earthquakemedium" id="3-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakemedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td style=text-align:right;>
                        <INPUT  type="radio" '
                        . ' name="earthquakehigh" id="4-1" '
                        . ' value="Y" '
            
                    ; if ($earthquakehigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td style=text-align:right;>
            <INPUT  type="radio" '
            . ' name="earthquakeno" id="1" '
            . ' value="N" '

; if ($earthquakeno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Vulcanismo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="volcanismnull" id="1-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="volcanismlow" id="2-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="volcanismmedium" id="3-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="volcanismhigh" id="4-2" '
                        . ' value="Y" '
            
                    ; if ($volcanismhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="volcanismno" id="2" '
            . ' value="N" '

; if ($volcanismno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Colapso de sueldos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="soilcollapsenull" id="1-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapsenull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="soilcollapselow" id="2-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapselow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="soilcollapsemedium" id="3-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapsemedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="soilcollapsehigh" id="4-3" '
                        . ' value="Y" '
            
                    ; if ($soilcollapsehigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="soilcollapseno" id="3" '
            . ' value="N" '

; if ($soilcollapseno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Hundimiento</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="sinkingnull" id="1-4" '
                        . ' value="Y" '
            
                    ; if ($sinkingnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="sinkinglow" id="2-4" '
                        . ' value="Y" '
            
                    ; if ($sinkinglow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="sinkingmedium" id="3-4" '
                        . ' value="Y" '
            
                    ; if ($sinkingmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="sinkinghigh" id="4-4" '
                        . ' value="Y" '
            
                    ; if ($sinkinghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="sinkingno" id="4" '
            . ' value="N" '

; if ($sinkingno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Agretamiento de suelo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="crackingnull" id="1-5" '
                        . ' value="Y" '
            
                    ; if ($crackingnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="crackinglow" id="2-5" '
                        . ' value="Y" '
            
                    ; if ($crackinglow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="crackingmedium" id="3-5" '
                        . ' value="Y" '
            
                    ; if ($crackingmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="crackinghigh" id="4-5" '
                        . ' value="Y" '
            
                    ; if ($crackinghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="crackingno" id="5" '
            . ' value="N" '

; if ($crackingno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Flujo de lodo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="mudnull" id="1-6" '
                        . ' value="Y" '
            
                    ; if ($mudnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="mudlow" id="2-6" '
                        . ' value="Y" '
            
                    ; if ($mudlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="mudmedium" id="3-6" '
                        . ' value="Y" '
            
                    ; if ($mudmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="mudhigh" id="4-6" '
                        . ' value="Y" '
            
                    ; if ($mudhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="mudno" id="6" '
            . ' value="N" '

; if ($mudno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Deslizamientos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="landslidesnull" id="1-7" '
                        . ' value="Y" '
            
                    ; if ($landslidesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="landslideslow" id="2-7" '
                        . ' value="Y" '
            
                    ; if ($landslideslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="landslidesmedium" id="3-7" '
                        . ' value="Y" '
            
                    ; if ($landslidesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="landslideshigh" id="4-7" '
                        . ' value="Y" '
            
                    ; if ($landslideshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="landslidesno" id="7" '
            . ' value="N" '

; if ($landslidesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Lluvia ácida</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="acidrainnull" id="1-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="acidrainlow" id="2-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="acidrainmedium" id="3-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="acidrainhigh" id="4-8" '
                        . ' value="Y" '
            
                    ; if ($acidrainhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="acidrainno" id="8" '
            . ' value="N" '

; if ($acidrainno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Lluvias Torrenciales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="pouringrainnull" id="1-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="pouringrainlow" id="2-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="pouringrainmedium" id="3-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="pouringrainhigh" id="4-9" '
                        . ' value="Y" '
            
                    ; if ($pouringrainhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="pouringrainno" id="9" '
            . ' value="N" '

; if ($pouringrainno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Tormentas tropicales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="tropicalstormnull" id="1-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="tropicalstormlow" id="2-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="tropicalstormmedium" id="3-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="tropicalstormhigh" id="4-10" '
                        . ' value="Y" '
            
                    ; if ($tropicalstormhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="tropicalstormno" id="10" '
            . ' value="N" '

; if ($tropicalstormno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Inundaciones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="floodingnull" id="1-11" '
                        . ' value="Y" '
            
                    ; if ($floodingnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="floodinglow" id="2-11" '
                        . ' value="Y" '
            
                    ; if ($floodinglow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="floodingmedium" id="3-11" '
                        . ' value="Y" '
            
                    ; if ($floodingmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="floodinghigh" id="4-11" '
                        . ' value="Y" '
            
                    ; if ($floodinghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="floodingno" id="11" '
            . ' value="N" '

; if ($floodingno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Huracanes</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="hurricanesnull" id="1-12" '
                        . ' value="Y" '
            
                    ; if ($hurricanesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hurricaneslow" id="2-12" '
                        . ' value="Y" '
            
                    ; if ($hurricaneslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hurricanesmedium" id="3-12" '
                        . ' value="Y" '
            
                    ; if ($hurricanesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hurricaneshigh" id="4-12" '
                        . ' value="Y" '
            
                    ; if ($hurricaneshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hurricanesno" id="12" '
            . ' value="N" '

; if ($hurricanesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Tormentas Electricas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="electricstormnull" id="1-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="electricstormlow" id="2-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="electricstormmedium" id="3-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="electricstormhigh" id="4-13" '
                        . ' value="Y" '
            
                    ; if ($electricstormhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="electricstormno" id="13" '
            . ' value="N" '

; if ($electricstormno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Temperaturas Extremas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="extremetemperaturesnull" id="1-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperaturesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="extremetemperatureslow" id="2-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperatureslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="extremetemperaturesmedium" id="3-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperaturesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="extremetemperatureshigh" id="4-14" '
                        . ' value="Y" '
            
                    ; if ($extremetemperatureshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="extremetemperaturesno" id="14" '
            . ' value="N" '

; if ($extremetemperaturesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Trombas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="thrombusnull" id="1-15" '
                        . ' value="Y" '
            
                    ; if ($thrombusnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="thrombuslow" id="2-15" '
                        . ' value="Y" '
            
                    ; if ($thrombuslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="thrombusmedium" id="3-15" '
                        . ' value="Y" '
            
                    ; if ($thrombusmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="thrombushigh" id="4-15" '
                        . ' value="Y" '
            
                    ; if ($thrombushigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="thrombusno" id="15" '
            . ' value="N" '

; if ($thrombusno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Granizadas</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="hailstormnull" id="1-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hailstormlow" id="2-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hailstormmedium" id="3-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="hailstormhigh" id="4-16" '
                        . ' value="Y" '
            
                    ; if ($hailstormhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="hailstormno" id="16" '
            . ' value="N" '

; if ($hailstormno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Vientos fuertes</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="strongwindsnull" id="1-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="strongwindslow" id="2-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="strongwindsmedium" id="3-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="strongwindshigh" id="4-17" '
                        . ' value="Y" '
            
                    ; if ($strongwindshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="strongwindsno" id="17" '
            . ' value="N" '

; if ($strongwindsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Sequias</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="droughtsnull" id="1-18" '
                        . ' value="Y" '
            
                    ; if ($droughtsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="droughtslow" id="2-18" '
                        . ' value="Y" '
            
                    ; if ($droughtslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="droughtsmedium" id="3-18" '
                        . ' value="Y" '
            
                    ; if ($droughtsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="droughtshigh" id="4-18" '
                        . ' value="Y" '
            
                    ; if ($droughtshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="droughtsno" id="18" '
            . ' value="N" '

; if ($droughtsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Incendios</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="firenull" id="1-19" '
                        . ' value="Y" '
            
                    ; if ($firenull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="firelow" id="2-19" '
                        . ' value="Y" '
            
                    ; if ($firelow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="firemedium" id="3-19" '
                        . ' value="Y" '
            
                    ; if ($firemedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="firehigh" id="4-19" '
                        . ' value="Y" '
            
                    ; if ($firehigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="fireno" id="19" '
            . ' value="N" '

; if ($fireno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Explosiones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="explosionsnull" id="1-20" '
                        . ' value="Y" '
            
                    ; if ($explosionsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="explosionslow" id="2-20" '
                        . ' value="Y" '
            
                    ; if ($explosionslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="explosionsmedium" id="3-20" '
                        . ' value="Y" '
            
                    ; if ($explosionsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="explosionshigh" id="4-20" '
                        . ' value="Y" '
            
                    ; if ($explosionshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="explosionsno" id="20" '
            . ' value="N" '

; if ($explosionsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Fugas y derrames de productos quimicos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="chemicalspillnull" id="1-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspillnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="chemicalspilllow" id="2-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspilllow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="chemicalspillmedium" id="3-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspillmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="chemicalspillhigh" id="4-21" '
                        . ' value="Y" '
            
                    ; if ($chemicalspillhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="chemicalspillno" id="21" '
            . ' value="N" '

; if ($chemicalspillno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Radiaciones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="radiationsnull" id="1-22" '
                        . ' value="Y" '
            
                    ; if ($radiationsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="radiationslow" id="2-22" '
                        . ' value="Y" '
            
                    ; if ($radiationslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="radiationsmedium" id="3-22" '
                        . ' value="Y" '
            
                    ; if ($radiationsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="radiationshigh" id="4-22" '
                        . ' value="Y" '
            
                    ; if ($radiationshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="radiationsno" id="22" '
            . ' value="N" '

; if ($radiationsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Contaminación Ambiental</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionsnull" id="1-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionslow" id="2-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionsmedium" id="3-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="enviromentalpollutionshigh" id="4-23" '
                        . ' value="Y" '
            
                    ; if ($enviromentalpollutionshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="enviromentalpollutionsno" id="23" '
            . ' value="N" '

; if ($enviromentalpollutionsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Desertificacion</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="desertificationnull" id="1-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="desertificationlow" id="2-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="desertificationmedium" id="3-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="desertificationhigh" id="4-24" '
                        . ' value="Y" '
            
                    ; if ($desertificationhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="desertificationno" id="24" '
            . ' value="N" '

; if ($desertificationno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Epidemias en humanos y/o animales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="epidemicnull" id="1-25" '
                        . ' value="Y" '
            
                    ; if ($epidemicnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="epidemiclow" id="2-25" '
                        . ' value="Y" '
            
                    ; if ($epidemiclow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="epidemicmedium" id="3-25" '
                        . ' value="Y" '
            
                    ; if ($epidemicmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="epidemichigh" id="4-25" '
                        . ' value="Y" '
            
                    ; if ($epidemichigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="epidemicno" id="25" '
            . ' value="N" '

; if ($epidemicno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Intoxicacion en humanos y/o animales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="intoxicationnull" id="1-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="intoxicationlow" id="2-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="intoxicationmedium" id="3-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="intoxicationhigh" id="4-26" '
                        . ' value="Y" '
            
                    ; if ($intoxicationhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="intoxicationno" id="26" '
            . ' value="N" '

; if ($intoxicationno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Envenenamiento en humanos y/o animales</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="poisoningnull" id="1-27" '
                        . ' value="Y" '
            
                    ; if ($poisoningnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="poisoninglow" id="2-27" '
                        . ' value="Y" '
            
                    ; if ($poisoninglow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="poisoningmedium" id="3-27" '
                        . ' value="Y" '
            
                    ; if ($poisoningmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="poisoninghigh" id="4-27" '
                        . ' value="Y" '
            
                    ; if ($poisoninghigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="poisoningno" id="27" '
            . ' value="N" '

; if ($poisoningno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Asaltos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="assaultsnull" id="1-28" '
                        . ' value="Y" '
            
                    ; if ($assaultsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="assaultslow" id="2-28" '
                        . ' value="Y" '
            
                    ; if ($assaultslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="assaultsmedium" id="3-28" '
                        . ' value="Y" '
            
                    ; if ($assaultsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="assaultshigh" id="4-28" '
                        . ' value="Y" '
            
                    ; if ($assaultshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="assaultsno" id="28" '
            . ' value="N" '

; if ($assaultsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Interrupcion de servicios basicos</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicservicesnull" id="1-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicservicesnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicserviceslow" id="2-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicserviceslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicservicesmedium" id="3-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicservicesmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="interruptionbasicserviceshigh" id="4-29" '
                        . ' value="Y" '
            
                    ; if ($interruptionbasicserviceshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="interruptionbasicservicesno" id="29" '
            . ' value="N" '

; if ($interruptionbasicservicesno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Concentracion masiva de la población</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationnull" id="1-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationlow" id="2-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationmedium" id="3-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="masspopulationconcentrationhigh" id="4-30" '
                        . ' value="Y" '
            
                    ; if ($masspopulationconcentrationhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="masspopulationconcentrationno" id="30" '
            . ' value="N" '

; if ($masspopulationconcentrationno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Manifestaciones</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="manifestationsnull" id="1-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="manifestationslow" id="2-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="manifestationsmedium" id="3-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="manifestationshigh" id="4-31" '
                        . ' value="Y" '
            
                    ; if ($manifestationshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="manifestationsno" id="31" '
            . ' value="N" '

; if ($manifestationsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Terrorismo</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="terrorismnull" id="1-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="terrorismlow" id="2-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismlow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="terrorismmedium" id="3-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="terrorismhigh" id="4-32" '
                        . ' value="Y" '
            
                    ; if ($terrorismhigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="terrorismno" id="32" '
            . ' value="N" '

; if ($terrorismno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <span>Accidentes de transporte</span>
        </td>
        <td>
            <table style="width: -webkit-fill-available;">
                <tr>
                    <td style="width: 3.5rem;">
                        <INPUT  type="radio" '
                        . ' name="transportaccidentsnull" id="1-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentsnull == "Y"){ echo ' checked '; } 
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="transportaccidentslow" id="2-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentslow == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="transportaccidentsmedium" id="3-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentsmedium == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                    <td>
                        <INPUT  type="radio" '
                        . ' name="transportaccidentshigh" id="4-33" '
                        . ' value="Y" '
            
                    ; if ($transportaccidentshigh == "Y"){ echo ' checked '; }   
                     echo ' class="radioboolean rdy">'
                        .'</INPUT> 
                    </td>
                </tr>
            </table>       
        </td>
        <td>
            <INPUT  type="radio" '
            . ' name="transportaccidentsno" id="33" '
            . ' value="N" '

; if ($transportaccidentsno == "N"){ echo ' checked '; }        
         echo ' class="radioboolean rdy">'
            .'</INPUT>        
        </td>
    </tr>
</table>


';

?>        <div style="page-break-after:always;"></div>


<!--  parte 9.1 -->
<p style="font-size:14pt; padding-left:1cm;"><b>
Evidencia fotografica:</b></p><br>
<div style="padding-left:1cm;">
<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-2-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-22 col-lg-8" id="show-ANALRIESG-2-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"];    
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'" width="380px" height="300px" />';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>'; 
?></div><br><br>


<!--               parte 10  -->

<!-- 	<div style="">
		<span style="color:black; font-size: x-large; ">
		Determinación de las Zonas de Riesgo Internas:</span>
    </div> -->
		<div style="text-align:justify; font-size:12pt; ">
        <p style="font-weight:normal; padding-left:1cm;">
<?php
            echo $naturalphenomenasummary;          
?>		
</p>		</div><br><br>


	
		<p style="font-size:14pt; padding-left:1cm; "><br>
		Análisis de los Riesgos Encontrados:</p>
        <br>

    
		<div style="text-align: justify ; font-weight:normal; padding-left:1cm;">
<?php
            echo   str_replace("\n","<br>", $analysysfoundrisks) ;       
?>		
		</div><br>
        <div style="page-break-after:always;"></div>
		<p style="padding-left:1cm; font-size:14pt; "><b>
		Croquis de Identificación de Riesgos Externos:</b></p>
    </div><div style="padding-left:1cm">
<?php
echo '<div class="col-32 col-lg-8" id="show-ANALRIESG-3-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"];     
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'" width="380px" height="300px" />';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
?></div>
        <div style="page-break-after:always;"></div>

		<p style="padding-left:1cm; font-size:14pt; "><b>
		Identificación de Areas Externas de Mayor Riesgos:</b></p>
    </div><br>
<div style="padding-left:1cm">

<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANALRIESG-4-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-42 col-lg-8" id="show-ANALRIESG-4-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"];     
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'" width="380px" height="300px" />';       
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
?> <br><br>
<?php


		$consulta = "SELECT a.id, a.location, a.description FROM core.threatriskanalysys AS b,core.threats AS a WHERE 
                a.id= b.idthreat and b.idparty='$idpartyenterprise'";
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table  bgcolor='#ffffff' align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Lugar</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Amenazas</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$location=$b["location"]; 
					$description=$b["description"]; 

					echo $l= "
					<tr>	
						<td style=text-align:center >$i</td>
						<td Width=72%>$location</td>
						<td  width=22%>$description</td>
					</tr>";	     
					$i++;
				}						
				echo "</table>";
			}

?> </div>
		<p style="text-align:center; font-size:14pt;  "><b>
		Identificación de Instalaciones Estratégicas:<b></p>
    </div>


<?php
		$consulta = "SELECT a.id, a.description FROM core.securityplanriskanalysysstrategiclocations AS a WHERE  a.idparty='$idpartyenterprise'";
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table width='900' bgcolor='#ffffff' align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
			
					<td bgcolor=''  align='center' > <FONT color='' >Amenazas</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$description=$b["description"]; 

					echo $l= "
					<tr>	
						<td align='center'>$i</td>
						<td  width=90% >$description</td>
					</tr>";	     
					$i++;
				}						
				echo "</table>";
			}

?>


	
		<p style="text-align:center; font-size:14pt; "><b>
		Directorio del Personal:<b></p>
    </div>

<?php

		$consulta = "SELECT a.id, a.personname , a.position FROM core.securityplanriskanalysysdirectory AS a WHERE  a.idparty='$idpartyenterprise'";
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table width='900' bgcolor='#ffffff' align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Nombre</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Puesto</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$personname=$b["personname"]; 
					$position=$b["position"]; 

					echo $l= "
					<tr>	
						<td  align='center'>$i</td>
						<td  width=69%> $personname</td>
						<td  >$position</td>
					</tr>";	     
					$i++;
				}						
				echo "</table>";
			}

?>
<?php
$com="SELECT 
securityequipment ,
generalrecomendations ,
securitymeasures  

            FROM  core.securityplanriskanalysysmisc WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $securityequipment = $resul[0]["securityequipment"];
  $generalrecomendations = $resul[0]["generalrecomendations"];
  $securitymeasures = $resul[0]["securitymeasures"];
  

            }
            ?>


		<p style="padding-left:1cm; font-size:14pt; "><b>
		Equipos de Seguridad:</b></p><br><br>
    </div>
		<div style="text-align:justify; padding-left:1cm; font-weight:normal;">
<?php
            echo $securityequipment;         
?>		
		</div>
        <br><br>



	
		<p style="padding-left:1cm; font-size:14pt;  "><b>
		Recomendaciones Generales</b></p>
    </div><br><br>
		<div style="text-align: justify; font-size:12pt; font-weight:normal; padding-left:1cm;">
<?php
            echo   str_replace("\n","<br>", $generalrecomendations) ;
            
?>		<br><br>
		</div>

	
		<p style="padding-left:1cm; font-size:14pt;"><b>
		Medidas de seguridad<b></p>
    </div><br><br>
		<div style="text-align: justify; font-size:12pt;font-weight:normal;padding-left:1cm;">
<?php
            echo   str_replace("\n","<br>", $securitymeasures) ;       
?>		
		</div>		<br><br>


        <div style="page-break-after:always;"></div>


        <p style ="font-size:16pt"style="padding-left:2cm"><b>  7.3.1 Ubicación del predio </b></p><br>
        <div style="font-weight:normal">

<?php
            $com="SELECT 
                sitelocation,
                northstreet,
                southstreet,
                eaststreet,
                weststreet,
                northbuilding,
                southbuilding,
                eastbuilding,
                westbuilding,
                identificationstrategicfacilities,
                explosionsimulation
            FROM core.securityplansitelocation WHERE idparty='$idpartyenterprise'";
       
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
                    $sitelocation = $resul[0]["sitelocation"]; 
                    $northstreet = $resul[0]["northstreet"];
                    $southstreet = $resul[0]["southstreet"];
                    $eaststreet = $resul[0]["eaststreet"];
                    $weststreet = $resul[0]["weststreet"];
                    $northbuilding = $resul[0]["northbuilding"];
                    $southbuilding = $resul[0]["southbuilding"];
                    $eastbuilding = $resul[0]["eastbuilding"];
                    $westbuilding = $resul[0]["westbuilding"];
                    $identificationstrategicfacilities = $resul[0]["identificationstrategicfacilities"];
                    $explosionsimulation = $resul[0]["explosionsimulation"];
            } 
?>
	<TABLE class="tb">
		<tr>
            
			<td style="width:15%"><p style="font-size:14pt; text-align:center;">UBICACIÓN</td>
			<td><p style="font-size:12pt"> <?php echo $sitelocation; ?></p></td>
		</tr>
	</TABLE>
	<br><br><br>
	<TABLE class="tb" >
		<tr >
			<td ><p style="text-align:center">CALLES CIRCUNDANTES</p>
					<table>
							<tr>
								<td style="border-top: black 0.10rem solid;  
								           border-right: black 0.10rem solid;
                                           text-align:center;" >
									Al norte
								</td>
								<td style="border-top: black 0.10rem solid;">
<?php
 echo $northstreet;
?>									
								</td>
							</tr>
							<tr>
								<td style="border-right: black .10rem solid; 
								           border-top: black .10rem solid;
                                           text-align:center;">
									Al sur
								</td>
								<td style="border-top: .10rem black solid;">
<?php
 echo $southstreet;
?>									
								</td>
							</tr>
							<tr>
								<td style="border-right: black .10rem solid; 
								           border-top: black 0.1rem solid;
                                           text-align:center;">
									Al este
								</td>
								<td style="border-top: 0.1rem black solid;">
<?php
 echo $eaststreet;
?>									
								</td>
							</tr>
							<tr>
								<td style="border-right: black 0.1rem solid; 
								           border-top: black 0.1rem solid;
                                           text-align:center;">
									Al oeste
								</td>
								<td style="border-top: 0.1rem black solid;">
<?php
 echo $weststreet;
?>									
								</td>
							</tr>
					</table>
			</td>
			<td style="border-left: black 0.1rem solid;
            text-align:center;">
				<p>EDIFICIOS ADYACENTES</p>
				<table style="border-top: black 0.1rem solid;">
					<tr>
						<td>
<?php
	echo $northbuilding;
?>							
						</td>
					</tr>
					<tr>
						<td style="border-top: 0.1rem black solid;">
<?php
	echo $southbuilding;
?>							
						</td>
					</tr>
					<tr>
						<td style="border-top: 0.1rem black solid;">
<?php
	echo $eastbuilding;
?>							
						</td>
					</tr>
					<tr>
						<td style="border-top: 0.1rem black solid;">
<?php
	echo $westbuilding;
?>							
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</TABLE>

<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%UBICPRED-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-UBICPRED-0-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"]; 
            $idimgs=$b["id"];                   
    echo '<img  id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64,'.$contentimg.'"width="380px" height="300px" ; /> ';  

            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-pdf sin-img-user" src="images/sin-imagen.jpg" alt="sin-img" > ';        
    }
echo'    </div>';
?>

<p style="font-size:14pt" ><b style="padding-left:1cm">IDENTIFICACIÓN DE ÁREAS EXTERNAS DE MAYOR RIESGO</p>
<div style="text-align:center"> <p style="font-size:14pt">AMENAZAS</p></div>
<br>
<?php
		// $r=new Conex();
		// $link=$dbl->conectar();

		$consulta = "SELECT a.id, a.location, a.description FROM core.threatsitelocation AS b,core.threats AS a WHERE 
                a.id= b.idthreat and b.idparty='$idpartyenterprise'";
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table width='900' bgcolor='#ffffff' align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Lugar</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Amenazas</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$location=$b["location"]; 
					$description=$b["description"]; 

					echo $l= "
					<tr>	
						<td style=width:13% align=center>$i</td>
						<td  >$location</td>
						<td  >$description</td>
					</tr>";	     
					$i++;
				}						
				echo "</table>";
			}
?>
<p style="font-size:16pt"> <div style="padding-left:1cm"><b>IDENTIFICACIÓN DE INSTALACIONES ESTRATÉGICAS</b></p>
		<br><div style=font-weight:normal><p  style="text-align:justify">
<?php
            echo   str_replace("\n","<br>", $identificationstrategicfacilities) ;        
?>	</p></div><br>
<p style="font-size:16pt">Descripción de la Simulación</p><br>
		<div style=font-weight:normal>
        <p  style="text-align:justify">
<?php
            echo   str_replace("\n","<br>", $explosionsimulation) ;
?>	</p>
		</div>
        </div><div   style="padding-left:1cm">
<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%UBICPRED-1-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  

echo '<div class="col-12 col-lg-8" id="show-UBICPRED-1-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"];  
            $idimgs=$b["id"];               
    echo '<img id="img-'.$idimgs.'" class="img-pdf img-fluid" src="data:image/png;base64, '.$contentimg.'"width="380px" height="300px"" />';         
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-pdf sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';
?>

</div>
<br><Br>

<div style="page-break-after:always;"></div>


<p style ="font-size:16pt"style="padding-left:2cm"><b>7.4 Directorios</b></p><br>

	
		<p style="text-align:center; font-size:14pt; "><b>


		Números de Emergencias</b></p>
    </div>
<br><br>
<?php

		$consulta = "SELECT a.id, a.logo , a.enterprise , a.phone , a.address FROM core.securityplanriskanalysysemergencydirectory AS a WHERE  a.idparty='$idpartyenterprise'"; 
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table width='900' bgcolor='#ffffff' align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Logo</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Institución o Empresa</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Teléfono</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Dirección</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$logo=$b["logo"]; 
					$enterprise=$b["enterprise"]; 
					$phone=$b["phone"]; 
					$address=$b["address"]; 

					echo $l= "
					<tr>	
						<td  align='center'>$i</td>
						<td  align='center'><img class='img-logo' src='data:image/png;base64,$logo' width=50px height=50px/></td>
						<td >$enterprise</td>
						<td  align='center'>$phone</td>
						<td> $address</td>
					</tr>";	     
					$i++;
    echo '';


				}						
				echo "</table>";
			}

?>
        <div style="page-break-after:always;"></div>



        <p style ="font-size:16pt"style="padding-left:2cm"><b>7.5 Inventarios</b></p><br>
        
		<p style="text-align:center; font-size:14pt; font-weight:normal;"><b>
		Inventario de recursos Materiales Para Emergencias</b></p>
    </div>
<br><br>
<?php

		$consulta = "SELECT a.id, a.quantity , a.equipment , a.locationc FROM core.securityplanriskanalysysemerncyresources AS a WHERE  a.idparty='$idpartyenterprise' and a.code='INVMATEMER'";
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table  align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Cantidad</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Equipo</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Ubicacion</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$quantity=$b["quantity"]; 
					$equipment=$b["equipment"]; 
					$locationc=$b["locationc"]; 

					echo $l= "
					<tr>	
						<td  align=center>$i</td>
						<td align=center >$quantity</td>
						<td >$equipment</td>
						<td >$locationc</td>
					</tr>";	     
					$i++;
				}						
				echo "</table>";
			}

?>









		<p style="font-size:14pt; font-weight:normal; text-align:center; "><b>
		Inventario de recursos Materiales Para Emergencias</b></p>
    </div><br>

<?php

		$consulta = "SELECT a.id, a.quantity , a.equipment , a.locationc FROM core.securityplanriskanalysysemerncyresources AS a WHERE  a.idparty='$idpartyenterprise' and a.code='INVMATEMEREXT'"; 
    	$ejequery=$dbl->executeReader($consulta);  
		$cantidad=pg_num_rows($ejequery);
		$cantidad2=count($ejequery[0]);


		if(($ejequery[0]) && ($cantidad2 > 0)){

			echo $mostar="
			<table width='900' bgcolor='#ffffff' align='center' class='tb'>
				<tr>
					<td bgcolor=''  align='center' > <FONT color='' >N°</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Cantidad</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Equipo</FONT></td>
					<td bgcolor=''  align='center' > <FONT color='' >Ubicacion</FONT></td>
				</tr>";
				
				$i=1;
				foreach($ejequery as $b){            
					$quantity=$b["quantity"]; 
					$equipment=$b["equipment"]; 
					$locationc=$b["locationc"]; 

					echo $l= "
					<tr>	
						<td  align='center'>$i</td>
						<td  align='center'>$quantity</td>
						<td > $equipment</td>
						<td  >$locationc</td>
					</tr>";	     
					$i++;
				}						
				echo "</table>";
			}

?>
<br>
<div style="page-break-after:always;"></div>




		<!-- ANALISIS DE RIESGOS -->
		<p style ="font-size:16pt"style="padding-left:2cm"><b>7.6 Mantenimiento</b></p><br>
<?php
            $com="SELECT 
infosignaling ,
definitionsignaling ,
locationsignaling ,
maintenancesignaling 

            FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
            // var_dump($com);
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $infosignaling = $resul[0]["infosignaling"];
  $definitionsignaling = $resul[0]["definitionsignaling"];
  $locationsignaling = $resul[0]["locationsignaling"];
  $maintenancesignaling = $resul[0]["maintenancesignaling"];

            }       
?>
<br><br>
<!-- 	<div style="">
		<span style="color:black; font-size: x-large; ">
		Servicios Vitales:</span>
    </div> -->
		<div style="text-align: justify; font-size:12pt; font-weight:normal;">
<?php
            echo   str_replace("\n","<br>", $maintenancesignaling) ;        
?>		
		</div>
<br><br>

<div style="page-break-after:always;"></div>

<p style ="font-size:16pt"style="padding-left:2cm"><b>7.9 Capacitacioón</b></p><br>
<div style="font-weight:normal">


<?php
            $com="SELECT 
training 
FROM core.securityplanextras WHERE idparty='$idpartyenterprise'";
            $resul=$dbl->executeReader($com);
                if ($resul[0] != "") { 
  $training = $resul[0]["training"];

  echo   str_replace("\n","<br>", $training) ;        
                }
?></div>
<br><br>
<p style="font-size:14pt; font-weight:normal; padding-left:1cm; "><b>
Evidencia de la Capacitación</b></p>


<div style="padding-left:1cm">


<?php
$com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%TRAINING-0-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  


        echo '<div class="col-12 col-lg-8" id="show-TRAINING-0-" style="margin-top:1rem; display: flow-root;">';
        $i=0;
        if($imgs!=""){
            foreach($imgs as $b){            
                $contentimg=$b["content"];  
                $idimgs=$b["id"]; 
                echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                        <img src='images/x.webp' style='width: 2rem;
                        position: absolute;
                        cursor: pointer;'/>";     
                echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
                        $i++;
            } 
        }else{
            echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
        }
        echo '</div>';



?>


<br><br>



<div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b>7.10 Programa de difusión y concientización</b></p><br>
<div style="font-weight:normal">




<?php



            $com="SELECT 
            disseminationconsentprogram 
            FROM core.securityplanextras WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $disseminationconsentprogram = $resul[0]["disseminationconsentprogram"];
            
              echo   str_replace("\n","<br>", $disseminationconsentprogram) ;        
                            }
                            ?><br>
<p style="font-size:14pt; font-weight:normal; padding-left:1cm; "><b>
Evidencia</b></p>

<?php
                            $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%DIFUSION-0-%' and delete='N'";
                            $imgs=$dbl->executeReader($com);  
                    
                    
                            echo '<div class="col-12 col-lg-8" id="show-DIFUSION-0-" style="margin-top:1rem; display: flow-root;">';
                            $i=0;
                            if($imgs!=""){
                                foreach($imgs as $b){            
                                    $contentimg=$b["content"];  
                                    $idimgs=$b["id"]; 
                            echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                                    <img src='images/x.webp' style='width: 2rem;
                                    position: absolute;
                                    cursor: pointer;'/>";     
                            echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
                                    $i++;
                                } 
                            }else{
                                echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
                            }
                            echo '</div>';
            ?>


<div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b>7.11 Simulacros</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            simulationexercise 
            FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $simulationexercise = $resul[0]["simulationexercise"];
            
              echo   str_replace("\n","<br>", $simulationexercise) ;        
                            }
                            ?><br>
<p style="font-size:14pt; font-weight:normal; padding-left:1cm; "><b>
Evidencia</b></p><?php
$com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%SIMULATIO-0-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  


        echo '<div class="col-12 col-lg-8" id="show-SIMULATIO-0-" style="margin-top:1rem; display: flow-root;">';
            $i=0;
            if($imgs!=""){
                foreach($imgs as $b){            
                    $contentimg=$b["content"];  
                    $idimgs=$b["id"]; 
            echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                    <img src='images/x.webp' style='width: 2rem;
                    position: absolute;
                    cursor: pointer;'/>";     
            echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
                    $i++;
                } 
            }else{
                echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
            }
        echo'    </div>';


?>

<div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b>8 Subprograma de Auxilio</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            helpsubprogram 
            FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $helpsubprogram = $resul[0]["helpsubprogram"];
            
              echo   str_replace("\n","<br>", $helpsubprogram) ;        
                            }
                            ?>




<div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b>8.1 Alertamiento</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            alerting 
            FROM core.securityplanextras WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $alerting = $resul[0]["alerting"];
            
              echo   str_replace("\n","<br>", $alerting) ;        
                            }
                            ?>




<div style="page-break-after:always;"></div>
<p style ="font-size:16pt"style="padding-left:2cm"><b>8.2 Planes de emergencia</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            emergencyplans 
            FROM core.securityplanextras WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $emergencyplans = $resul[0]["emergencyplans"];
            
              echo   str_replace("\n","<br>", $emergencyplans) ;        
                            }
                            ?>




<div style="page-break-after:always;"></div>


<p style ="font-size:16pt"style="padding-left:2cm"><b>8.3 Evaluación de daños</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            damageevaluation 
            FROM core.securityplanextras WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $damageevaluation = $resul[0]["damageevaluation"];
            
              echo   str_replace("\n","<br>", $damageevaluation) ;        
                            }
                            ?>




<div style="page-break-after:always;"></div>


<p style ="font-size:16pt"style="padding-left:2cm"><b>9 Subprograma de prevención</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            recoversubprogram 
            FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $recoversubprogram = $resul[0]["recoversubprogram"];
            
              echo   str_replace("\n","<br>", $recoversubprogram) ;        
                            }
                            ?>




<div style="page-break-after:always;"></div>


<p style ="font-size:16pt"style="padding-left:2cm"><b>9.1 Vuelta a la normalidad</b></p><br>
<div style="font-weight:normal">

<?php


            $com="SELECT 
            cometonormal 
            FROM core.securityplancomplements WHERE idparty='$idpartyenterprise'";
                        $resul=$dbl->executeReader($com);
                            if ($resul[0] != "") { 
              $cometonormal = $resul[0]["cometonormal"];
            
              echo   str_replace("\n","<br>", $cometonormal) ;        
                            }
                            ?>
<br>
<p style="font-size:14pt; font-weight:normal; padding-left:1cm; "><b>
Evidencia</b><br></p><?php
$com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%COMETONORMAL-0-%' and delete='N'";
        $imgs=$dbl->executeReader($com);  


        echo '<div class="col-12 col-lg-8" id="show-COMETONORMAL-0-" style="margin-top:1rem; display: flow-root;">';
        $i=0;
        if($imgs!=""){
            foreach($imgs as $b){            
                $contentimg=$b["content"];  
                $idimgs=$b["id"]; 
        echo "<div class='eliminarimg' name='$idimgs' style='float: left;'>
                <img src='images/x.webp' style='width: 2rem;
                position: absolute;
                cursor: pointer;'/>";     
        echo '<img id="img-'.$idimgs.'" class="img-previewiddocument img-fluid" src="data:image/png;base64,'.$contentimg.'" /></div>';       
                $i++;
            } 
        }else{
            echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
        }
        echo'    </div>';
?>

<div style="page-break-after:always;"></div>


		<!-- ANEXOS -->
		<p style ="font-size:16pt"style="padding-left:2cm"><b> ANEXOS</b></p><br><br>
		<div style="text-align: justify; font-size:12pt; font-weight:normal;">



<?php
    $com="SELECT * from core.pictures where idparty='$idpartyenterprise'  and name like '%ANEXO-0-%' and delete='N'";
    $imgs=$dbl->executeReader($com);  


echo '<div class="col-12 col-lg-8" id="show-ANEXO-0-" style="margin-top:1rem; display: flow-root;">';
    $i=0;
    if($imgs!=""){
        foreach($imgs as $b){            
            $contentimg=$b["content"]; 
            $idimgs=$b["id"];                      
    echo '<img id="img-'.$idimgs.'" class="img-PDF img-fluid" src="data:image/png;base64,'.$contentimg.'" width="380px" height="300px"/> ';         
            $i++;
        } 
    }else{
        echo' <img class="img-fluid img-previewiddocument sin-img-user" src="images/sin-imagen.jpg" alt="sin-img"> ';        
    }
echo'    </div>';

?>


</font>
</p></div>

	</body>
</html>
