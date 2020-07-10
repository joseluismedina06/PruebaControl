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
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ficha de Registro</title>
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
    <table class="tb" >
<tr>

<td colspan="2" width=55% style="text-align:center"> <b>
Ficha de Registro por Instituto.</b>
   	</td>

</tr>

<tr>
  <td>Nombre del instituto:</td>
  <td width=>Codigo</td>
</tr>  
<tr>
  <td>Insertar logo del Instituto:</td>
  <td>Codigo</td>
</tr>  
<tr>
  <td>Estado:</td>
  <td>Codigo</td>
</tr>  
<tr>
  <td>Insertar logo de gobierno del estado:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Director del instituto:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Dirección:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Usuario protección civil interno:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Correo:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Teléfono:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Usuario protección civil externo:</td>
  <td>Codigo</td>
</tr> 
<tr>
<td>Correo:</td>
  <td>Codigo</td>
</tr> 
<tr>
  <td>Teléfono:</td>
  <td>Codigo</td>
</tr> 

</table>      
    </body>
    </html>