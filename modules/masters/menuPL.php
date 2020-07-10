<?php 
session_start();
	// Establecer Codificacion de la Pagina
    header('Content-Type: text/html; charset=UTF-8');
	
	chdir(dirname(__FILE__));
	include_once("../../includes/utilities.php");
	chdir(dirname(__FILE__));
	include_once("base/basePL.php");
	chdir(dirname(__FILE__));
	include_once("security/userfunctionBL.php");
	$model = new userfunctionBL($code, $name, $iduser, $idfunction, $active, $deleted);
	$menu = $model->getMenu($iduser,$regis);
	$x = 0;
	$m = 0;
	$cant_menu = count($menu);
    	basePL::buildjs(2);
    	basePL::buildccs(2);
?>
<head>
    <meta charset="utf-8">

<meta http-equiv="Expires" content="0">
 
<meta http-equiv="Last-Modified" content="0">
 
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 
<meta http-equiv="Pragma" content="no-cache">

<style type="text/css">
	*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; /*Arial*/
}

</style>
</head>
<?php

  header("Cache-Control: no-cache, must-revalidate"); 
 
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); 

  if ($_SESSION["iduser"] == null) {
		$path = "indexPortal.php";
		utilities::redirect($path);
  }
?>
<!-- CONSTRUCCION DINAMICA DEL MENU EN EL NAVBAR -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <?php
      $t=0;
        while ($t < count($menu)){
        $result = utilities::getValue($menu[$t],("items"));
        $cant_modules = count($result);
      ?> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $menu[$t]["titulo"];?></a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php 
            $m=0;
            while($m<$cant_modules){
              $result2 = utilities::getValue($result[$m],("items"));
              $cant_functions = count($result2);
          ?>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $result[$m]["nombre_modulo"];?></a>
            <ul class="dropdown-menu">
              <?php 
                $f=0;
                while($f < $cant_functions){
                  $result3 = utilities::getValue($result2[$f] ,("items"));
              ?>
                <a class="dropdown-item" href="<?php echo PATH.$result2[$f]["url"];?>"><?php echo $result2[$f]["nombre_funcion"];?></a>
              <?php 
              $f++;
              }
              ?>
            </ul>
          </li>
          <?php
            $m++; 
            }
          ?>
        </ul>

      </li>
      <?php
        $t++; 
        }
      ?>
    </ul>
  </div>
   <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php 
        $pos = strpos($_SERVER["REQUEST_URI"], "indexprueba.php");
        $posL = strpos($_SERVER["REQUEST_URI"], "libertyUsers.php");
        if($pos != 0||$posL != 0){
          $nl = 1;
        }else{
          $nl = 3;
        }
        basePL::buildexit($nl,$logo);
        ?>
      </li>
    </ul>
  </div>
</nav>
<!-- FIN CONSTRUCCION DINAMICA DEL MENU EN EL NAVBAR -->
<br>
<br>



