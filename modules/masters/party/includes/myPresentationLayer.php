<?php

    session_start();

    chdir(dirname(__FILE__));
    include_once("../../../../includes/presentationLayer.php");

    class myPresentationLayer extends presentationLayer {
			
        static function buildInputOnlyLetters(
            $title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
            
            echo '<LABEL>';
                echo '<SPAN>'.$title.' :</SPAN>';
            if ($onblur != "")
            $onblur = ' onBlur="'.$onblur.'" ';
            echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" ';
            echo $onblur; 
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.' pattern="[A-Za-z]"></INPUT>';
            echo '</LABEL>';	
        }
	
        static function buildInputCheckLetters(
            $title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
            
            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
            if ($onblur != "")
            $onblur = ' onBlur="'.$onblur.'" ';
            echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'"  '
                                            . 'onkeypress="return isESLetter(event)"  '
                                            . 'onblur="this.value=this.value.toUpperCase();" value = "'.$val.'" '
                                            . 'required pattern="[a-zA-Z]*"';
            echo $onblur;
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
            echo '</LABEL>';
        }
			
        /*
        static function fillGridArrPaginator($arr, $arrCol,$par="",
            $pageSize="",$pageNumber=0,$width=900,$check="0",$select="0") {

            //echo "cambiamos todo";
            $nr = count($arr);
            //echo $nr;
            //print $arr;
            $nc = count($arrCol);
            //$pnc = $pageNumber;
            //echo '<section>';
            echo '<table id="" class="display" width="100%">';
            //$pnc = $pageNumber;
            echo '<thead>';
            for($i=0; $i < $nc; $i++) {
                $name = $arrCol[$i];
                echo "<th>".$name."</th>";

            }
            //  echo '<button onclick="window.location.href=../../datatables/fpdf/reportes.php" >FPDF</button>';
            echo '  </thead>';

            echo '<tbody>';
            $end = 0;
            echo "</tr>";
            //print_r($arr);
            if (is_array($arr)) { // bring values
                for($i=0; $i < $nr; $i++) {
                echo "  <tr > ";

                $reg = $arr[$i];

                $j = 0; // assummes id, first column
                foreach ($reg as $col) {
                    if ($j == 0) {
                        echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".
                        $col."</a></td>";
                    }
                    else {
                        echo "<td>".$col."</td>";
                    }
                    $j++;

                }
                echo '</tr>';
            }

            }
            else {
                $end=1;
            }

            echo '</tbody>';
            echo '</table>';

            //echo '</section>'; 

        }
        */		
			
        static function fillGridArrVariableFind(
            $arr, $arrCol,$par="",$findvalue,$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

            $nr = count($arr);
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
            if (is_array($arr)) { // bring values
                for($i=0; $i < $nr; $i++) {
                    echo "  <tr > ";

                    $reg = $arr[$i];
                    if ($check) {
                        $name = "CH".$i;
                        $id = "CH".$i;

                        echo '<td><input type="checkbox" name ="'.$name.'"id = "'.$id.'"></td>';
                    }

                    if ($select) {
                        $name = "CB".$i;
                        $id = "CB".$i;

                        echo '<td><input type="radio" onclick="submit()" name ="'.$name.'"id = "'.$id.'"></td>';
                    }

                    $j = 0; // assummes id, first column
                    foreach ($reg as $col) {
                        if ($j == 0) {
                                                      echo "<td><a href='?urloper=".$findvalue."&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
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
                
        static function fillGridArrVariableFindAndID(
            $arr, $arrCol,$par="",$findvalue,$idvalue,$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

            $nr = count($arr);
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
            if (is_array($arr)) { // bring values
                for($i=0; $i < $nr; $i++) {
                    echo "  <tr > ";

                    $reg = $arr[$i];
                    if ($check) {
                        $name = "CH".$i;
                        $id = "CH".$i;

                        echo '<td><input type="checkbox" name ="'.$name.'"id = "'.$id.'"></td>';
                    }

                    if ($select) {
                        $name = "CB".$i;
                        $id = "CB".$i;

                        echo '<td><input type="radio" onclick="submit()" name ="'.$name.'"id = "'.$id.'"></td>';
                    }

                    $j = 0; // assummes id, first column
                    foreach ($reg as $col) {
                        if ($j == 0) {
                            echo "<td><a href='?urloper=".$findvalue."&pn=".$pageNumber."&".$idvalue."=".$col."'>".$col."</a></td>";
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
		
        static function buildInputHidden($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
            
            //echo '<LABEL>';
            //echo '<SPAN>'.$title.' :</SPAN>';
            if ($onblur != "")
                                          $onblur = ' onBlur="'.$onblur.'" ';
            echo '<INPUT '.$readonly.' name = "'.$name.'" type="hidden" id="'.$id.'" value = "'.$val.'" ';
            echo $onblur; 
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
            //echo '</LABEL>';	
        }

        static function buildFooterSave($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="N",$print="N",$clean="N",$find="N") {
            
            echo '<TABLE class="italsis">';  
            echo '<TR>';
            echo '<TD>'; 
            $pl->showButtons($save,$delete,$print,$clean,$find);
            echo '</TD>'; 
            echo '</TR>';
            echo '</TABLE>';
            $bl->fillGrid($pn,$parname,$parvalue);

        }

        static function buildSelectWithComEventWithCheckAll(
            $title,$name,$id,$mod,$com,$valCol,$showCol,$curVal,$event="",
            $namecheck,$idcheck,$valcheck,$disabledcheck="",$eventcheck="") {
            //echo '<table><tr><td>';        
            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
            $event = 'onchange="'.$event.'"';

            echo '<SELECT name="'.$name.'" class="italsisv2" id="'.$id.'" '.$event.' >';
            $mod->fillComboCom($com,$valCol,$showCol,$curVal);

            echo '</SELECT>';

            echo '<INPUT '.$disabledcheck.' name = "'.$namecheck.'"  type = "checkbox" class="italsisv2" id="'.$idcheck.'"';
            if ($valcheck == "Y" || $valcheck == "on") { 
                                          echo ' checked';
            }
            if ($eventcheck != "") {
                                          echo ' onClick="'.$eventcheck.'"';
            }
            echo ' >'; 
            echo ' </INPUT>';

            echo '</LABEL>';
            //echo '</td></tr></table>';

        }
		
        static function buildInputWithClass(
            $title,$name,$id,$val,$maxlength="50",$class="",$readonly="",$onblur="") {
                                      
            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
            if ($onblur != "")
            $onblur = ' onBlur="'.$onblur.'" ';
            echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" ';
            echo $onblur; 
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'" class="'.$class.'"></INPUT>';
            echo '</LABEL>';	
        }


        static function buildInputWithValidator(
            $title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="",$event1="",$js1="",
            $event2="",$js2="",$event3="",$js3="",$required="") {

            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
            if ($onblur != "")
              $onblur = ' onBlur="'.$onblur.'" ';
            echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'"  ';
            if ($event1!="") {
                                          echo ''.$event1.'="'.$js1.'" ';
            }
            if ($event2!="") {
                                          echo ''.$event2.'="'.$js2.'" ';
            }
            if ($event3!="") {
                                          echo ''.$event3.'="'.$js3.'" ';
            }                 
            echo    ''. 'onblur="this.value=this.value.toUpperCase();" value = "'.$val.'" '
                                                                        . $required.' ';
            echo $onblur;
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
            echo '</LABEL>';
        }

        static function buildInputWithValidatoraccountcatalog($name,$id,$val,$element="",
            $title="",$maxlength="50",$placeholder="",$readonly="",$onblur="",
            $required="",$disabled="",
            $event1="",$js1="",$event2="",$js2="",$event3="",$js3="") {
            
            echo '<LABEL>';
            echo $element;
            echo '</LABEL>';

            if ($onblur != "")

              $onblur = ' onBlur="'.$onblur.'" ';


            echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'"  ';
            echo $onblur;
            if ($event1!="") {
                echo ''.$event1.'="'.$js1.'" ';
            }
            if ($event2!="") {
                echo ''.$event2.'="'.$js2.'" ';
            }
            if ($event3!="") {
                echo ''.$event3.'="'.$js3.'" ';
            }                 
            echo    ''. 'onblur="this.value=this.value.toUpperCase();" value = "'.$val.'" '
            . $required.' '.$disabled.' ';

            echo 'maxlength="'.$maxlength.'" placeholder="'.$placeholder.'"></INPUT>';

        }
                
        static function buildLabelblack($element,$hello=""){
                      echo '<div class="italsisaccount"><LABEL >';
                echo '<SPAN>'.$element.' </SPAN>';

                echo '</LABEL></div><br>';                   
        }
        
        static function buildmyLabelblack($element,$hello=""){
                      echo '<div class="myLabelblack"><LABEL >';
                echo '<SPAN>'.$element.' </SPAN>';

                echo '</LABEL></div>';                   
        }
                
        static function buildCheckNotTitle($name,$id,$val,$disabled = "",$event="") {

            echo '<br><INPUT '.$disabled.' name = "'.$name.'"  type = "checkbox" id="'.$name.'"';
            if ($val == "Y" || $val == "on") { 
                echo ' checked';
            }
            if ($event != "") {
                echo ' onClick="'.$event.'"';
            }
            echo ' >'; 
            echo ' </INPUT>';

        } //buildCheck                
 
        static function buildRadioper($title,$name,$id,$val,$checked="",$disabled = "",$event="",$open=1,$close=1) {
            if ($open)
                                          echo '<LABEL>';
            echo '<SPAN>'.$title.' </SPAN>';
            if ($event != "")
                $event = ' onChange="submit()" ';
            if ($checked != "")
                $checked = " checked ";
            echo '<INPUT '.$disabled.' type="radio" '.$checked.$event.' name="'.$name.'" id="'.$id.'" value="'.$val.'"></INPUT>';
            if ($close)
                echo '</LABEL>';	
        }   
        
        static function buildCheckaccountcatalog($title,$name,$id,$val,$disabled = "",$event="", $checked="") {

            echo '<LABEL>';
            echo '<SPAN>'.$title.' </SPAN>';
            echo '<INPUT  name = "'.$name.'"  type ="checkbox" id="'.$name.'"';
            if ($val == "Y" || $val == "on" ) { 
                echo 'checked';
            }
            if ($val == "" || $val == NULL ) { 
                $val="N";
            }
            if ($event != "") {
                echo ' onClick="'.$event.'"';
            }
            echo ' '.$disabled.'>'; 
            echo ' </INPUT>';
            echo ' </LABEL>';
        } //buildCheck                

                
        static function buildRadiotodo(
            $title,$name,$id,$val,$checked="",$disabled = "",$event="",$open=1,$close=1) {
			
            echo '
            <table style="width:100%;">
                
                <tr>
                    <td style="width:15%;"><b><SPAN style="color:gray;   ">'.$arrayname.' </SPAN></b></td>';
                        for($i = 1; $i <= 3; $i++) {
                            echo '<td style="width:20%;">';                     
                                    if ($open)
                                    echo '<SPAN>'.$title.' </SPAN>';
                                    if ($event != "")
                                            $event = ' onChange="submit()" ';
                                    if ($checked != "")
                                            $checked = " checked ";
                                    echo '<INPUT '.$disabled.' type="radio" '.$checked.$event.' name="'.$name.'" id="'.$id.'" value="'.$val.'"></INPUT>';

                            echo '</td>'; 		                 
                        }
            echo    
                '</tr>
            </table>'; 	
        }               
                
        static function buildmyIdInputId($val,$form,$fLink,$disabled) {

            echo '<LABEL>';
            echo '<SPAN>Id :</SPAN>';
            echo '<INPUT '.$disabled.' name = "id"  type = "text" id="id" ';  
            echo ' value = "'.$val.'" size="10" maxlength="10"'; 
            echo ' onBlur="changeAction('.$form.','."'".$fLink."'".')"';
            echo ' placeholder="Internal Id"  >'; 
            echo ' </INPUT>	';
            echo ' </LABEL>';
        }
                
     //---------------NUEVO Elaborado por Genesis Amaiz sep 2018           
 /*===============================================
fillGridArrPaginator
Descripcion: funcion de mostrar arreglos
parametro : 
<-- $arr        : Contiene la informacion del resulset de una consulta a la BD ejemplo (executeReader)		
<-- $arrCol     : Contiele un arreglo con las columnas a mostrar en el fillGrid
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo 
<-- $pageSize   : Define la cantidad de registros a mostrar por pagina				
<-- $pageNumber : Define la cantidad de paginas
<-- $width      : Define el ancho del fillGrid			
<-- $check      : Define si se visualiza un cuadro check por registro
<-- $select     : Define si se visualiza la selecion por registro
Detalles: Muestra un grid  basado en un arreglo 
ubicación: Traida de web
==================================================*/               
        static function fillGridArrPaginatorMultiBL(
            $arr, $arrCol,$id,$idvarbl,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

            //echo "cambiamos todo";
            $nr = count($arr);
            //echo $nr;
            //print $arr;
            $nc = count($arrCol);
            //$pnc = $pageNumber;
            //echo '<section>';
            echo '<table id="" class="display" width="100%">';
            //$pnc = $pageNumber;
            echo '<thead>';
            for($i=0; $i < $nc; $i++) {
              $name = $arrCol[$i];
              echo "<th>".$name."</th>";        
            }
            //  echo '<button onclick="window.location.href=../../datatables/fpdf/reportes.php" >FPDF</button>';
            echo '  </thead>';

            echo '<tbody>';
            $end = 0;
            echo "</tr>";
            //print_r($arr);
            if (is_array($arr)) { // bring values
              for($i=0; $i < $nr; $i++) {
                echo "  <tr > ";

                $reg = $arr[$i];


                $j = 0; // assummes id, first column
                foreach ($reg as $col) {
                  if ($j == 0) {
                    echo "<td>
                    
                    <a href='?urloper=find&pn=".$pageNumber."&id=".$id."&".$idvarbl."=".$col."'>".$col."</a></td>";
                  }
                  else {
                    echo "<td>".$col."</td>";
                  }
                  $j++;

                }
                echo '</tr>';

              }

            }
            else {
              $end=1;
            }

            echo '</tbody>';
            echo '</table>';

            //echo '</section>'; 

        }                      

        //Elaborado por: Genesis Amaiz oct 2018
        static function buildSelectInputAutoNumberZeroCheckCI(
            $title,$name,$id,$mod,
            $foreignTable,$curVal,$foreignscheme="",$onblur="",$disabled="",
            $nameIP,$idIP,$val,$param = "", $param2 = "",$maxlength="50",$readonly="") {

            echo '<LABEL>';
            echo '<SPAN>Buscar CI:</SPAN>';
            if ($onblur != "")
                    $onblur = ' onBlur="'.$onblur.'" ';

            echo '<SELECT '.$disabled.' '.$readonly.' name="'.$name.'" id="'.$id.'" '.$event.' style="widht:10%" >';
            $mod->fillForeignTableComboParamBoth($foreignTable,$curVal,$foreignscheme, $param,$param2);
            echo '</SELECT>';
            echo '<INPUT '.$readonly.' '.$disabled.' name = "'.$nameIP.'" type="text" onkeypress="return AutoNumberZeroCheckCI(event,this,'.$maxlength.')" id="'.$idIP.'" value = "'.$val.'" title = "Por favor, rellene este campo." style="widht:40%"  ';

            echo $onblur;
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
            echo '</LABEL>';
        }                

        static function buildInputCalendarWithValidator($title,$name,$id,
            $val,$maxlength="50",$readonly="",$onblur="",$year="",
            $moths="",$day="",$event1="",$js1="",
            $event2="",$js2="",$event3="",$js3="",$required="") {

            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';

            if ($onblur != "")
              $onblur = ' onBlur="'.$onblur.'" ';

            echo '<INPUT '.$readonly.' name = "'.$name.'" type="date" id="'.$id.'"  ';

            if ($event1!="") {                            
                    echo ''.$event1.'="'.$js1.'" ';
            }
            if ($event2!="") {
                    echo ''.$event2.'="'.$js2.'" ';
            }
            if ($event3!="") {
                    echo ''.$event3.'="'.$js3.'" ';
            }                 
            echo    ''. 'onblur="this.value=this.value.toUpperCase();" value = "'.$val.'" '
                            . $required.' ';
            echo $onblur;
            echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'" max="'.$year.'-'.$moths.'-'.$day.'"'
                    . 'min="1900-01-01"></INPUT>';
            echo '</LABEL>';
        }                             


        static function myshowButtons ($save="Y",$clean="Y",$report="Y",$pdf="Y",$excel="Y",$back="Y") {

            if ($save == "Y") {
                echo '<BUTTON type="submit" name="urloper" id="urloper" align="center" class="mybutton" value = "save"><img src="../../../images/Save.png" width="100" height="50"></BUTTON>';

            }
            if ($clean == "Y") {
                echo '<BUTTON type="submit" name="urloper" id="urloper" align="center" class="mybutton" value="clear"><img src="../../../images/Clean.png" width="100" height="50"></BUTTON>';

            }
            if ($report == "Y") {
                echo '<BUTTON type="submit" name="xyz" id="xyz" align="center" class="mybutton" value="report"><img src="./img/reporte.png" width="32" height="28"></BUTTON>';

            }
            if ($pdf == "Y") {
                echo '<BUTTON type="submit" name="xyz" id="xyz" align="center" class="mybutton" value="pdf"><img src="./img/PDF-Icon.png" width="32" height="28"></BUTTON>';

            }
            if ($excel == "Y") {
                echo '<BUTTON type="submit" name="xyz" id="xyz" align="center" class="mybutton" value ="excel"><img src="./img/Excel-Icon.png" width="32" height="28"></BUTTON>';

            }
            if ($back == "Y") {
                echo '<BUTTON type="submit" name="urloper" id="urloper" align="center" class="mybutton" value ="back"><img src="./images/back2.png" width="100" height="50"></BUTTON>';

            }                          
        }

        static function buildInputCheckEmail($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="",$required="") {

            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
            if ($onblur != "")
              $onblur = ' onBlur="'.$onblur.'" ';
            echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'"  value = "'.$val.'"   onblur="validarEmail (value)" ';
            echo $onblur;
            echo 'maxlength="'.$maxlength.'" "'.$required.'" placeholder="name@example.com"></INPUT>';
            echo '</LABEL>';    

        }                


    //**************************NUEVOOOOOO******************************
    //  Autor: Génesis Amaíz enero 2019
    //  Descripcion: un selecte y un input juntos sirve para 
    //              cedula, telefonos, etc.
    //  function buildSelectInputValidatorClass
    //  $titleS: titulo del select
    //  $nameS: nombre del select   
    //  $idS: id del select
    //  $mod: base BL del PL que ejecutara la funcion (para el select)
    //  $foreignTable: tabla a consultar (para el select) 
    //  $curVal: valor retorno, o valor seleccionado del select
    //  $foreignscheme: esquema a consutar (para el select)
    //  $param: nombre de la columna de la tabla de los valores a mostrar en el select
    //  $param2: nombre de la columna de la tabla del valor a guardar en el select
    //  $titleI: titulo del input
    //  $nameI: nombre del input
    //  $idI: id del input
    //  $val: valor del input
    //  $classS: clase del select
    //  $classI: clase del input
    //  $classT: clase del titulo
    //  $event: evento del select
    //  $eventX: nombre del evento (para el input)
    //  $jsX: nombre del js (para el input) 
    //  $onblur=$maxlength=$readonly=$placeholder=$disabled: como su nombre lo indica                

        static function buildSelectInputValidatorClass(
            $titleS="",$nameS,$idS,$mod,
            $foreignTable,$curVal,$foreignscheme="",$param="", $param2="",
            $titleI="",$nameI,$idI,$val,                        
            $classS="",$classI="",$classT="",
            $event="", $event1="",$js1="",$event2="",$js2="",$event3="",$js3="",
            $onblur="",$maxlength="50",$required="",$readonly="",$placeholder="",
            $disabled="") {

            //SELECT
            if ($event != "") {
                $event = 'onchange="'.$event.'"';
            }

            //    if($classS==""){
            //        echo '<LABEL>';
            //    }

            echo '<SPAN class="'.$classT.'">'.$titleS.' </SPAN>';

            echo '<SELECT '.$disabled.' name="'.$nameS.'" id="'.$idS.'" '. $required.'';
                    echo ''.$event.' style=" width: 87px; margin-bottom: 0px;" class="'.$classS.'">';
                    $mod->fillForeignTableComboParamBoth($foreignTable,$curVal,
                        $foreignscheme, $param,$param2);
            echo '</SELECT>';

            $style="width:42%; margin-top: -33; margin-left: 100px; position:relative;";

            if($curVal!="" && $val !="" ){
                if ($onblur != "")
                $onblur = ' onBlur="'.$onblur.'" ';                            
            } 

            echo '<SPAN class="'.$classT.'"';
                    echo 'style="position:relative; top:-50px; margin-left:100px;">';
                    echo ''.$titleI.'';
            echo '</SPAN>';

            echo '<INPUT name="'.$nameI.'" id="'.$idI.'" value="'.$val.'"';
                    echo 'style="'.$style.'" class="'.$classI.'" type="text"';

                if ($event1!="") {                            
                    echo ''.$event1.'="'.$js1.'" ';
                }
                if ($event2!="") {
                    echo ''.$event2.'="'.$js2.'" ';
                }
                if ($event3!="") {
                    echo ''.$event3.'="'.$js3.'" ';
                }                         
                echo 'maxlength="'.$maxlength.'" '.$readonly.' '.$disabled.' ';
                echo 'placeholder="'.$placeholder.'" '.$onblur.' '. $required.'>';
            echo '</INPUT>';		
        } 

    //  Autor: Génesis Amaíz enero 2019
    //  function buildInputWithValidatorClass
    //  $title: titulo del select
    //  $name: nombre del select   
    //  $id: id del select
    //  $val: valor del input
    //  $classI: clase del input
    //  $classT: clase del titulo
    //  $eventX: nombre del evento (para el input)
    //  $jsX: nombre del js (para el input) 
    //  $onblur=$maxlength=$readonly=$placeholder=$disabled: como su nombre lo indica                   
        static function buildInputWithValidatorClass(
            $title="",$name,$id,$val,$classI="",$classT="",
            $event1="",$js1="",$event2="",$js2="",$event3="",$js3="",
            $onblur="",$maxlength="50",$readonly="",$required="",
            $placeholder="",$disabled="",$type=""){

            if ($type == ""){
                $type="text";
            }

            if ($onblur != "")
                $onblur='onBlur="'.$onblur.'"';

            echo '<SPAN class="'.$classT.'">'.$title.' </SPAN>';
            echo '<INPUT name = "'.$name.'" type="'.$type.'" id="'.$id.'"';
                echo ' value = "'.$val.'" class="'.$classI.'" ';
                if ($event1!="") {
                    echo ''.$event1.'="'.$js1.'" ';
                }
                if ($event2!="") {
                    echo ''.$event2.'="'.$js2.'" ';
                }
                if ($event3!="") {
                    echo ''.$event3.'="'.$js3.'" ';
                }
                if($type == "text"){
                echo 'onblur="this.value=this.value.toUpperCase();"';    
                }                        
                echo 'maxlength="'.$maxlength.'" placeholder="'.$placeholder.'"';
                echo ''.$readonly.' '.$required.' '.$onblur.' '.$disabled.'>';
            echo '</INPUT>';			
        } 
        
        // static function buildInputCheckEmailClass(
        //     $title="",$name,$id,$val,$classI="",$classT="",
        //     $event1="",$js1="",$event2="",$js2="",$event3="",$js3="",
        //     $onblur="",$maxlength="50",$readonly="",$required="",
        //     $placeholder="",$disabled="",$type=""){

        //     // if ($type == ""){
        //     //     $type="text";
        //     // }

        //     if ($onblur != "")
        //         $onblur='onBlur="'.$onblur.'"';

        //     echo '<SPAN class="'.$classT.'">'.$title.' </SPAN>';
        //     echo '<INPUT name = "'.$name.'" type="text" id="'.$id.'"';
        //         echo ' value = "'.$val.'" class="'.$classI.'" ';
        //         if ($event1!="") {
        //             echo ''.$event1.'="'.$js1.'" ';
        //         }
        //         if ($event2!="") {
        //             echo ''.$event2.'="'.$js2.'" ';
        //         }
        //         if ($event3!="") {
        //             echo ''.$event3.'="'.$js3.'" ';
        //         }
        //         // if($type == "text"){
        //         // echo 'onblur="this.value=this.value.toUpperCase();"';    
        //         // }        
        //         echo 'onblur="validarEmail (value)"';                
        //         echo 'maxlength="'.$maxlength.'" placeholder="'.$placeholder.'"';
        //         echo ''.$readonly.' '.$required.' '.$onblur.' '.$disabled.'>';
        //     echo '</INPUT>';            
        // } 
    //  Autor: Génesis Amaíz enero 2019
    //  function buildInputWithValidatorClass
    //  $title: titulo del select
    //  $name: nombre del select   
    //  $id: id del select
    //  $val: valor del input
    //  $classI: clase del input
    //  $classT: clase del titulo
    //  $year: año maximo
    //  $moths: mes maximo
    //  $day: dia maximo
    //  $eventX: nombre del evento (para el input)
    //  $jsX: nombre del js (para el input) 
    //  $required=$onblur=$readonly=$placeholder=$disabled: como su nombre lo indica   

        static function buildInputCalendarWithValidatorClass(
            $title,$name,$id,$val,$classI="",$classT="",
            $year="",$moths="",$day="",    
            $event1="",$js1="",$event2="",$js2="",$event3="",$js3="",
            $required="",$readonly="",$onblur="",$placeholder="",$disabled="") {

            if ($onblur != "")
              $onblur = ' onBlur="'.$onblur.'" ';

            echo '<SPAN class="'.$classT.'">'.$title.' :</SPAN>';

            echo '<INPUT lang="en" name = "'.$name.'" data-date="" data-date-format="DD/MM/YYYY" type="date" id="'.$id.'"  ';
    //                        echo ' value = "';echo date('d-m-Y',strtotime($val));echo'" class="'.$classI.'" ';
            echo ' value = "'.$val.'" class="'.$classI.'" '; 
    //                    echo '<br><INPUT  name = "'.$name.'" data-date="" data-date-format="MM/DD/YYYY" type="date" id="'.$id.'"  ';
    //                    echo ' value = "1995-09-23" class="'.$classI.'" ';                     

    //                    echo ' value = "'.$val.'" class="'.$classI.'" ';
                if ($event1!="") {                            
                    echo ''.$event1.'="'.$js1.'" ';
                }
                if ($event2!="") {
                    echo ''.$event2.'="'.$js2.'" ';
                }
                if ($event3!="") {
                    echo ''.$event3.'="'.$js3.'" ';
                }                 
    //                    echo    ''. 'onblur="this.value=this.value.toUpperCase();" '
                echo 'max="'.$year.'-'.$moths.'-'.$day.'"';            
                echo 'min="1900-01-01" placeholder="'.$placeholder.'" ';
                echo ''.$readonly.' '. $required.' '.$onblur.' '.$disabled.'>';
            echo'</INPUT><br>';
        }   

//  Autor: Génesis Amaíz enero 2019
//  function buildInputWithValidatorClass
//  $title: titulo del select
//  $name: nombre del select   
//  $id: id del select
//  $mod: base BL del PL que ejecutara la funcion (para el select)
//  $foreignTable: tabla a consultar (para el select) 
//  $curVal: valor retorno, o valor seleccionado del select
//  $foreignscheme: esquema a consutar (para el select)
//  $classI: clase del input
//  $classT: clase del titulo
//  $event: evento del select
//  $required=$onblur=$readonly=$placeholder=$disabled: como su nombre lo indica                
        static function buildSelectClass(
            $title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",
            $classI="",$classT="",$event="",$required="",$placeholder="",
            $readonly="",$disabled="") {

            if ($event != "") {
                $event = 'onchange="'.$event.'"';
            }                    
            echo '<SPAN class="'.$classT.'">'.$title.' </SPAN>';
            echo '<SELECT  name="'.$name.'" id="'.$id.'" class="'.$classI.'"';
                echo''.$disabled.' '.$event.' '.$readonly.' '. $required.' >';
                $mod->fillForeignTableCombo($foreignTable,$curVal,$foreignscheme);
            echo '</SELECT>';
        }      

//  Autor: Génesis Amaíz enero 2019
//  function buildInputCheckEmailEventClass
//  $title: titulo del select
//  $name: nombre del select   
//  $id: id del select
//  $val: valor del input
//  $classI: clase del input
//  $classT: clase del titulo
//  $required=$onblur=$readonly=$placeholder=$disabled: como su nombre lo indica                 
        static function buildInputCheckEmailEventClass(
            $title="",$name,$id,$val,$classI="",$classT="",
            $event1="",$js1="",$event2="",$js2="",$event3="",$js3="",
            $onblur="",$maxlength="50",$readonly="",$required="",
            $placeholder="",$disabled="",$type=""){
            // $maxlength="50",$onblur="",$required="",$readonly="") {
            if ($onblur != "")
              $onblur = 'onBlur="'.$onblur.'"';                    
            echo '<SPAN class="'.$classT.'">'.$title.' :</SPAN>';
            echo '<INPUT name = "'.$name.'" type="email" id="'.$id.'"';
                echo 'value = "'.$val.'" onblur="validarEmail (value)" ';
                echo 'maxlength="'.$maxlength.'" '.$required.' ';
                echo 'placeholder="name@example.com" class="'.$classI.'"';
                if ($event1!="") {
                    echo ' '.$event1.'="'.$js1.'" ';
                }
                if ($event2!="") {
                    echo ' '.$event2.'="'.$js2.'" ';
                }
                if ($event3!="") {
                    echo ' '.$event3.'="'.$js3.'" ';
                }                
                echo ''.$readonly.' '.$onblur.'>';
            echo '</INPUT>';       
        }     
 
//  Autor: Génesis Amaíz enero 2019
//  function buildCheckClass               
        static function buildCheckClass($title="",$name,$id,$val,$class,
            $required = "",$event="",$disabled = "") {
                                                    
            echo '<SPAN>'.$title.' </SPAN>';
            echo '<INPUT name="'.$name.'"  type="checkbox" id="'.$name.'"';
                    if ($val == "Y" || $val == "on") { 
                        echo ' checked';
                    }
                    if ($event != "") {
                        echo ' onClick="'.$event.'"';
                    }
                    echo ' class="'.$class.'" style="width: 20px;"';
                    echo ' '.$disabled.' '.$required.'>'; 
            echo ' </INPUT>';

        } //buildCheck      
                
        static function buildSelect2paramEventClass(
            $title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",
            $param = "", $param2 = "",$classI="",$classT="",$event="",
            $required="",$placeholder="",$readonly="",
            $disabled="") {

            echo '<SPAN class="'.$classT.'">'.$title.' </SPAN>';
                if ($event != "") {
                    $event = 'onchange="'.$event.'"';
                }

            echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'"';
                echo ' '.$event.' '.$required.' style="widht:10%" class="'.$classI.'">';
                $mod->fillForeignTableComboParamBoth($foreignTable,$curVal,$foreignscheme, $param,$param2);
            echo '</SELECT>';
        }                           
                                    
        static function buildSelectWithComEventClass($title,$name,$id,$mod,
            $com,$valCol,$showCol,$curVal,$classI="",$classT="",$event="") {

            echo '<SPAN class="'.$classT.'">'.$title.' </SPAN>';
            if ($event != "") {
                $event = 'onchange="'.$event.'"';
            }
			
            echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' class="'.$classI.'">';
            $mod->fillComboCom($com,$valCol,$showCol,$curVal);

            echo '</SELECT>';			
        }  
        
        static function buildButtonOrImage(
//                $pl="",$bl="",$pn=0,$parname="",$parvalue="",
                $title1,$name1,$id1,$value1,$img1="",$class1="",$classimg1="",
                                            $title2="",$name2="",$id2="",$value2="",$img2="",$class2="",$classimg2="",
                                            $title3="",$name3="",$id3="",$value3="",$img3="",$class3="",$classimg3="",
                                            $title4="",$name4="",$id4="",$value4="",$img4="",$class4="",$classimg4="",
                $title5="",$name5="",$id5="",$value5="",$img5="",$class5="",$classimg5="") {
            echo '<TABLE class="italsis">';
                echo '<TR style="background-color: transparent;">';
                    echo '<TD class="text-center tdico" style="padding:10px" >';

                        echo '<BUTTON type="submit" name="'.$name1.'" id="'.$id1.'" '
                            . 'align="center" class="'.$class1.'" value = "'.$value1.'">'.$title1.''
                            . '<img src="'.$img1.'" class="'.$classimg1.'"></BUTTON>';
                        echo '</TD><TD>';
                        if ($name2 != "") 
                            echo '<BUTTON type="submit" name="'.$name2.'" id="'.$id2.'" '
                            . 'align="center" class="'.$class2.'" value = "'.$value2.'">'.$title2.''
                            . '<img src="'.$img2.'" class="'.$classimg2.'"></BUTTON>';
                            echo '</TD><TD>';
                        if ($name3 != "") 
                            echo '<BUTTON type="submit" name="'.$name3.'" id="'.$id3.'" '
                            . 'align="center" class="'.$class3.'" value = "'.$value3.'">'.$title3.''
                            . '<img src="'.$img3.'" class="'.$classimg3.'"></BUTTON>';
                            echo '</TD><TD>';
                        if ($name4 != "") 
                            echo '<BUTTON type="submit" name="'.$name4.'" id="'.$id4.'" '
                            . 'align="center" class="'.$class4.'" value = "'.$value4.'">'.$title4.''
                            . '<img src="'.$img4.'" class="'.$classimg4.'"></BUTTON>';
                            echo '</TD><TD>';
                        if ($name5 != "") 
                            echo '<BUTTON type="submit" name="'.$name5.'" id="'.$id5.'" '
                            . 'align="center" class="'.$class5.'" value = "'.$value5.'">'.$title5.''
                            . '<img src="'.$img5.'" class="'.$classimg5.'"></BUTTON>';
                    echo '</TD>';
                echo '</TR>';
            echo '</TABLE>';
//            if($bl!=""){
//              $bl->fillGrid($pn,$parname,$parvalue);  
//            }
            


        }
        
        static function buildButtonOrImage2(
            //                $pl="",$bl="",$pn=0,$parname="",$parvalue="",
                            $title1,$name1,$id1,$value1,$img1="",$class1="",$classimg1="",
                                                        $title2="",$name2="",$id2="",$value2="",$img2="",$class2="",$classimg2="",
                                                        $title3="",$name3="",$id3="",$value3="",$img3="",$class3="",$classimg3="",
                                                        $title4="",$name4="",$id4="",$value4="",$img4="",$class4="",$classimg4="",
                            $title5="",$name5="",$id5="",$value5="",$img5="",$class5="",$classimg5="") {
                        echo '<TABLE class="italsis">';
                            echo '<TR style="background-color: transparent;">';
                                echo '<TD class="text-center tdico" >';
            
                                    echo '<BUTTON type="submit" name="'.$name1.'" id="'.$id1.'" '
                                        . 'align="center" class="'.$class1.'" value = "'.$value1.'">'.$title1.''
                                        . '<img src="'.$img1.'" class=""></BUTTON>';
                                    if ($name2 != "") 
                                        echo '<BUTTON type="submit" name="'.$name2.'" id="'.$id2.'" '
                                        . 'align="center" class="'.$class2.'" value = "'.$value2.'">'.$title2.''
                                        . '<img src="'.$img2.'" class=""></BUTTON>';
                                    if ($name3 != "") 
                                        echo '<BUTTON type="submit" name="'.$name3.'" id="'.$id3.'" '
                                        . 'align="center" class="'.$class3.'" value = "'.$value3.'">'.$title3.''
                                        . '<img src="'.$img3.'" class=""></BUTTON>';
                                    if ($name4 != "") 
                                        echo '<BUTTON type="submit" name="'.$name4.'" id="'.$id4.'" '
                                        . 'align="center" class="'.$class4.'" value = "'.$value4.'">'.$title4.''
                                        . '<img src="'.$img4.'" class=""></BUTTON>';
                                    if ($name5 != "") 
                                        echo '<BUTTON type="submit" name="'.$name5.'" id="'.$id5.'" '
                                        . 'align="center" class="'.$class5.'" value = "'.$value5.'">'.$title5.''
                                        . '<img src="'.$img5.'" class=""></BUTTON>';
                                echo '</TD>';
                            echo '</TR>';
                        echo '</TABLE>';
            //            if($bl!=""){
            //              $bl->fillGrid($pn,$parname,$parvalue);  
            //            }
                        
            
            
                    }




        static function buildTextAreasInpunClass($title,$name,$id,$val,$classI,$classT,$rows="4",$cols="50") {

            echo '<div class="'.$classT.'">'.$title.'</div>';
            echo '<TEXTAREA name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'"' ; 
            echo 'placeholder="'.$title.'" class="'.$classI.'">';
            echo $val;
            echo '</TEXTAREA>'; 
                    
        }   


        function inputFileImg(
            $name,       $idI,  $idImg,   $ruta="",   $idDiv2   ="",
            $classL ="", $classI="", $classD2  ="", $classImg ="",
            $titleI ="",
            $styleD1="", $val   ="", $textlabel="", $boolmultiple="")
        {
            echo'<div class="custom-file2" style="'.$styleD1.'">
                    <input  type  ="file" 
                            name  ="'.$name.'" 
                            id    ="'.$idI.'" 
                            class ="custom-file-input '.$classI.'" 
                            title ="'.$titleI.'" 
                            lang  ="es" 
                            value ="'.$val.'" 
                            multiple="'.$boolmultiple.'"';
                            // no esta terminado
            if($boolmultiple=='true'){
                echo 'onchange="archivo()"> '; 
            }else{
                echo 'onchange="img(event, this, ';  
            echo "'$idDiv2','$idImg','$ruta','$name','$idI'";  
            echo ')">';                
            }

            echo   '<i  class ="'.$classL.'" 
                            for   ="customFileLang" 
                            id    ="disenio2">'.$textlabel.'
                    </i>
                </div> ';  
            if($idDiv2==""){
                echo "holaa";
            }
            
            ?>
                <!--
                <script>

                    function img(evt,t,idDiv2,idImg,ruta,name,idI){
                                        
                        var classImg = "<?php echo $classImg; ?>";
                        var files = evt.target.files; // FileList object
                        // alert(files);
                        // console.log(files);
                        // Obtenemos la imagen del campo "file".
                        for (var i = 0, f; f = files[i]; i++) {
                        //Solo admitimos imágenes.
                        if (!f.type.match('image.*')) {
                            alert("El archivo debe ser jpg,png,etc");
                            continue;
                        }
                            
                        // console.log(f.type);

                        var reader = new FileReader();

                        reader.onload = (function(theFile) {
                            return function(e) {
                                // Insertamos la imagen
                                var respaldo=document.getElementById(idDiv2).innerHTML;
                                respaldo="";           
                                foto=e.target.result;

                                var data = new FormData();
                                var uploadimg = document.getElementById(idI);
                                data.append(name,uploadimg.files[0]);

                                jQuery.ajax({
                                    url: "js/guardar_foto.php?idimg="+idImg+"&ruta="+ruta+"&name="+name,
                                    data: data,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    method: 'POST',
                                    type: 'POST', // For jQuery < 1.9
                                    success: function(data){
                                        document.getElementById(idDiv2).innerHTML =data;        
                                        // alert(data);
                                    }
                                });                    
                                    
                                        // document.getElementById(idDiv2).innerHTML =respaldo+['<img id="',idImg+"-"+ruta,'" class="',classImg,'" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                    };
                                })(f);

                            reader.readAsDataURL(f);
                        }
                    }
                </script>
                -->
                <script>
                    function img(evt,t,idDiv2,idImg,ruta,name,idI) {
                                            
                        var classImg = "<?php echo $classImg; ?>";
                        
                        var files = evt.target.files; // FileList object
                        // alert(files);
                        // console.log(files);
                        // Obtenemos la imagen del campo "file".
                        for (var i = 0, f; f = files[i]; i++) {
                            //Solo admitimos imágenes.
                            if (!f.type.match('image.*')) {
                                alert("El archivo debe ser jpg,png,etc");
                                continue;
                            }
                                
                            // console.log(f.type);

                            var reader = new FileReader();

                            reader.onload = (function(theFile) {
                                return function(e) {
                                    // Insertamos la imagen
                                    var respaldo=document.getElementById(idDiv2).innerHTML;
                                    respaldo="";
                                        
                                    var data = new FormData();

                                    var uploadimg = document.getElementById(idI);
                                    
                                    // data.append(name, uploadimg.files[0]);
                                    data.append(name, theFile);

                                    jQuery.ajax({
                                        url: "js/guardar_foto.php?idimg="+idImg+"&ruta="+ruta+"&name="+name,
                                        data: data,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        method: 'POST',
                                        type: 'POST', // For jQuery < 1.9
                                        success: function(data) {
                                            document.getElementById(idDiv2).innerHTML=data;
                                            //location.reload();
                                        }
                                    });                  
                                            
                                    // document.getElementById(idDiv2).innerHTML =respaldo+['<img id="',idImg+"-"+ruta,'" class="',classImg,'" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                };
                            })(f);

                            reader.readAsDataURL(f);
                        }
                    }
                </script>

            <?php
        }


                static function buildRadioEventClassMult($title="",$name,$id,$val,$legth=1,$arrayTR="",$arrayvalR="",$classT="",$classTR="",$classR="",$classtd="",$checked="",$disabled = "",$event="",$open=1,$close=1) {
    
                    echo '<DIV class="'.$classT.'">'.$title.' </DIV>';      
                    echo '<table style="width:100%;">
                        <tr style="background-color: transparent;">
';//                      <td style="width:15%;" ></td>
                                      for($i = 0; $i <= $legth-1; $i++) {
                          echo '<td style="width:20%;" class="'.$classtd.'"><center>';                     
                                      if ($open)

                                          echo '<DIV class="'.$classTR.'">'.$arrayTR[$i].'  </DIV>';
                                          if ($event != "")
                                                  $event = ' onChange="submit()" ';
                                          if ($val==$arrayvalR[$i]){
                                              $checked = " checked ";
                                          } else {
                                            $checked = "";
                                          }
                                                  

                                          echo '<INPUT '.$disabled.' type="radio" '
                                                  . ''.$checked.$event.' name="'.$name.'" '
                                                  . 'id="'.$arrayTR[$i].'" value="'.$arrayvalR[$i].'" '
                                                  . 'class="'.$classR.'"></INPUT>';

                              echo    '</center></td>';     
                              
//                              var_dump($val);
                                      }
                    echo    '</tr>
                  </table>';    
                }                 
//-----------------------------------------------------------------   

static function buildInputWithValidatorClassAndStyle(
    $title="",$name,$id,$val,$classI="",$classT="",
    $event1="",$js1="",$event2="",$js2="",$event3="",$js3="",
    $onblur="",$maxlength="50",$readonly="",$required="",
    $placeholder="",$disabled="",$type="",$pstyle=""){

    if ($type == ""){
        $type="text";
    }

    if ($onblur != "")
        $onblur='onBlur="'.$onblur.'"';

    echo '<SPAN class="'.$classT.'">'.$title.' </SPAN>';
    echo '<INPUT name = "'.$name.'" type="'.$type.'" id="'.$id.'"';
        echo ' value = "'.$val.'" class="'.$classI.'" style="'.$pstyle.'"';
        if ($event1!="") {
            echo ''.$event1.'="'.$js1.'" ';
        }
        if ($event2!="") {
            echo ''.$event2.'="'.$js2.'" ';
        }
        if ($event3!="") {
            echo ''.$event3.'="'.$js3.'" ';
        }
        if($type == "text"){
        echo 'onblur="this.value=this.value.toUpperCase();"';    
        }                        
        echo 'maxlength="'.$maxlength.'" placeholder="'.$placeholder.'"';
        echo ''.$readonly.' '.$required.' '.$onblur.' '.$disabled.'>';
    echo '</INPUT>';			

}  

static function buildTextAreasInpunClassAndStyle($title,$name,$id,$val,$classI,$classT,$rows="4",$cols="50",$pstyle="") {

    echo '<div class="'.$classT.'">'.$title.'</div>';
    echo '<TEXTAREA name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'"' ; 
    echo 'placeholder="'.$title.'" class="'.$classI.'" style="'.$pstyle.'">';
    echo $val;
    echo '</TEXTAREA>'; 
            
} 

static function fillGridArrPaginatorMultiOptBL(
    $arr, $arrCol,$id,$idvarbl,$par="",$pageSize=10,$pageNumber=0,$width=900,
    $check="0",$select="0") {

    //echo "cambiamos todo";
    $nr = count($arr);
    //echo $nr;
    //print $arr;
    $nc = count($arrCol);
    //$pnc = $pageNumber;
    //echo '<section>';
    echo '<table id="" class="display" width="100%">';
    //$pnc = $pageNumber;
    echo '<thead>';
    for($i=0; $i < $nc; $i++) {
      $name = $arrCol[$i];
      echo "<th>".$name."</th>";        
    }
    //  echo '<button onclick="window.location.href=../../datatables/fpdf/reportes.php" >FPDF</button>';
    echo '  </thead>';

    echo '<tbody>';
    $end = 0;
    echo "</tr>";
    //print_r($arr);
    if (is_array($arr)) { // bring values
      for($i=0; $i < $nr; $i++) {
        echo "  <tr > ";

        $reg = $arr[$i];


        $j = 0; // assummes id, first column
        foreach ($reg as $col) {
          if ($j == 0) {
            echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$id."&".$idvarbl."=".$col."'>".$col."</a></td>";
          }else if(($nc-1)==$j){
             echo"<td  id='b_sol' type='button'>Eliminar</td>";

          }
          else {
            echo "<td>".$col."</td>";
          }
          $j++;

        }
        $j = count($reg);  

        if(($nc)==($j+1)){
             echo"<td > ";
        $j = 0; // assummes id, first column

        foreach ($reg as $col) {
          if ($j == 0) {
            echo "<input class='eliminar' id='b_sol' type='button' name='$col' style='    text-align: center;
                cursor: pointer;
                background: #66c1e4;
                color: white;
                border: #66c1e4 solid;
                font-size: 1rem;
                padding: 5px 0px;
                border-radius: 1rem;
                width: -webkit-fill-available;' value='Eliminar' > </input>";

            }
            $j++;
          }    
        echo "</td>";
        }
        echo '</tr>';

      }

    }
    else {
      $end=1;
    }

    echo '</tbody>';
    echo '</table>';

    //echo '</section>'; 

}


    }
    

        
		
?>