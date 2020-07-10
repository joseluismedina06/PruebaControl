<?php 
session_start();
?>
<SCRIPT language="javascript" src="../js/globals.js" type="text/javascript"></SCRIPT>
<link rel="stylesheet" type="text/css" href="../css/italsis.css">
<html>
<head>
<title>Providers File Upload</title>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>


<?php
	include_once("fileUpload.php");
	
	if (isset($_FILES["fileToUpload"])) {
		$fun = $_FILES["fileToUpload"];
		$dun = PATHPROVIDERS."ME/";
		$fU = new fileUpload($dun,$fun);
		$res = $fU->upload("3",$msg);
		if (!$res) {
			utilities::alert($msg);
		}
	}

	
?>

<body>

<form action="providerFU.php" method="post" enctype="multipart/form-data" class="italsis" >
	<?php	
		presentationLayer::buildInputFile("Select file to upload","fileToUpload","fileToUpload");
		presentationLayer::buildSubmit("Upload File","submit","submit");
	?>   
    

</form>

</body>
</html>