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

    $dbl=new baseBL();
        
    $idpartyenterprise=$_SESSION["idpartyenterprise"];

    // Get General Info
    $comgetfiscaladdress="select 
	        a.*,s.name as pstate 
        from 
	        core.address a,
	        base.state s 
        where idparty=$idpartyenterprise
        and a.idstate=s.id
        and idaddresstype=(select id from base.entitysubclass 
            where code='ADDRESSTYPEVALUES' and name='FISCAL')";
    $resgetfiscaladdress=$dbl->executeReader($comgetfiscaladdress);


    // Get array with PIPC Info
    $comgetpipccommentpanel="select e.idparty,e.bussinesname,e.codebranch,
    esc.name as status,s.name,s.filepath,s.filename,s.fileorder,
    i.textcontent,i.approved
    from
        core.enterprise e,
        core.pipcinspection i,
        core.pipcsteps s,
        base.entitysubclass esc,
        core.pipcstatus ps
    where
        e.idparty=i.idparty and
        i.idpipcstep=s.id and
        ps.idparty=e.idparty and
        ps.idstatus=esc.id and
        e.idparty=$idpartyenterprise
    order by s.fileorder";
    $resgetpipccommentpanel=$dbl->executeReader($comgetpipccommentpanel);

?>	
<!DOCTYPE html>
<html lang="es">
	<head>
        <meta charset="utf-8">
		<title>Acta de Observaciones</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
   
		<script>
		function miFuncion() {
					// window.print();
		}
		// window.onload=miFuncion;
		
		// $("table").parents('td').css("padding", "0px");
		</script>
		
		</style>
	</head>

	<body  style="margin:3cm" onload="window.print()" ”>

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

    $active = $resul_person[0]["active"];
    $deleted = $resul_person[0]["deleted"];                
             $registerdate = str_replace(" 00:00:00", "", $registerdateandhour );
}
?>		
    <!--body  style="margin:3cm">-->
      
      <div class="row">
      <div class="col-md-2">        
       <img src="LogoGobierno.png" height="100px" width="100px" >   
        </div>
      <div class="col-md-8">
      <h5 style="text-align: justify">SECRETARIA GENERAL DE GOBIERNO INSTITUTO <b> <?php  echo $bussinesname;  ?> </b>REQUERIMIENTOS DERIVADOS DE VALIDACION DOCUMENTAL DEL PROGRAMA INTERNO DE PROTECCION CIVIL E INSPECCION FISICA DE LAS INSTALACIONES 
        </h5>

      </div>
      <div class="col-md-2">
      <img src="images/logo-prot-civil.png" height="100px" width="100px">
     <!-- <img  src="LogoGobierno.png" align="right" height="100px" width="100px" >-->
      </div>
      
      </div>



      






      
       <!-- <img src="LogoGobierno.png" height="100px" width="100px" >   
        <img  src="LogoGobierno.png" align="right" height="100px" width="100px" > <br> <br>    
        <h5 style="text-align: justify">SECRETARIA GENERAL DE GOBIERNO INSTITUTO <b><?php echo /*$resgetpipccommentpanel[0]['buildingnamenumber']*/"BIMBO S.A de C.V." ?> </b>REQUERIMIENTOS DERIVADOS DE VALIDACION DOCUMENTAL DEL PROGRAMA INTERNO DE PROTECCION CIVIL E INSPECCION FISICA DE LAS INSTALACIONES 
        </h5>

        -->
        <style>
            div.a{
                    text-align:center;
            }
        </style>
        <FONT FACE="arial">
        <div style="text-align: justify">
            <br><br>

       <div class="container-fluid">
       <section class="main row">
            <article class="col-md-6">
            <h5><b>No. de oficio de validación: </b><?php  ?></h5> <br>

            </article>
            
                 <aside  class="col-md-6">             
            <h5><b>Fecha de Validación: </b><?php echo date('d-m-Y') ?></h5> <br>
           </aside>


            </section>
       </div>
            </div>



            <h5 style="padding-left:0.4cm"><b>
            Razón Social:</b> <?php  echo $bussinesname;  ?>
            </h5><br><h5 style="padding-left:0.4cm"><b>
            Domicilio: </b>
            <?php
                echo $resgetfiscaladdress[0]['street']." ".$resgetfiscaladdress[0]['buildnumber'].".";
                echo $resgetfiscaladdress[0]['suburb'].". ".$resgetfiscaladdress[0]['municipality'].".<br>";
                echo $resgetfiscaladdress[0]['pstate']." CP ".$resgetfiscaladdress[0]['postalcode'];
            ?>
            
            </h5><br><h5 style="padding-left:0.4cm"><b>
            <br>
            Observaciones:</b></h5><br>
            <div style="text-align: justify">
            <p style="padding-left:0.4cm">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Doloremque itaque dicta optio quibusdam possimus autem aspernatur 
            iusto consequatur ex mollitia? Sequi distinctio, excepturi illum ipsa 
            quod laborum ab dolores neque.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Doloremque itaque dicta optio quibusdam possimus autem aspernatur 
            iusto consequatur ex mollitia? Sequi distinctio, excepturi illum ipsa 
            quod laborum ab dolores neque.
            </p>
            <br>
            <?php
                
                foreach ($resgetpipccommentpanel as $value)
                {
                    echo $value['name']."<br>";
                    if ($value['textcontent']!="") {
                        echo $value['textcontent']."<br>";
                    } else {
                        echo "Sin Observaciones<br>";
                    }
                    echo "<br>";
                }
            ?>


        </div>  
        <br>
        <h5 style="padding-left:0.4cm"><b>*Campo de texto libre a insertar marco jurídico y plazo de días para su cumplimiento*</b></h5><br><br>



        <table class="tb" >
<tr>
  <td style="text-align:center"> <p style="font-size:9pt"><b><br>POR EL INSTITUTO: <br><br>___________________________________</p></b></td>
  <td style="text-align:center" ><p style="font-size:9pt"><b><br>POR EL RESPONSABLE DEL INMUEBLE: <br> <br>________________________________</p></b></td>
    <td style="text-align:center"><p style="font-size:9pt"><b>POR EL RESPONSABLE DE PIPC: <br> <br>_________________________________  </p></b></td>
    </tr>
    <tr>
<td style="text-align:center"><p style="font-size:9pt"> Firma y Nombre<br><br><br></p> </td>
    <td style="text-align:center"><p style="font-size:9pt">Firma y Nombre<br><br><br></p></td>
    <td style="text-align:center"><p style="font-size:9pt">Firma y Nombre<br><br><br></p>
    </td></tr>
</table>





</div>
         <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	</body>
</html>
