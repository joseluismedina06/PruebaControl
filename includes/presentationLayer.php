<?php 
session_start();
/*===============================================
PresentationLayer
Descripcion:Todas las funcione para presentacion 
==================================================*/
	class presentationLayer {

/*===============================================
buildCheckAllDevices
Descripcion : Genera un tag HTML <checkbox> para dispositivos moviles
parametro :
 <-- $title    : titulo del checkbox                   
 <-- $name     : nombre de la variable en php
 <-- $id       : nombre de la variable en javascript               
 <-- $val      : nombre de la variable del valor optenido
 <-- $disabled : Enable o Disable del checkbox por defecto Enable = ""; Disable = "disable" 	   
 <-- $event    : llama a una funcion javascript  
Detalles: Incluye checkbox a dispositivos
srv: ALL 
==================================================*/
		static function buildCheckAllDevices($title,$name,$id,$val,$disabled = "",$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			echo '<INPUT '.$disabled.' name = "'.$name.'"  type = "checkbox" id="'.$name.'"';
			if ($val == "Y" || $val == "on") { 
				echo ' checked';
			}
			if ($event != "") {
				echo ' onClick="'.$event.'"';
			}
			echo ' >'; 
       			echo ' </INPUT>';
			echo ' </LABEL>';
		} //buildCheck
		

/*===============================================
buildCheck
Descripcion : Genera un tag HTML <checkbox>
parametro :
 <-- $title    : titulo del checkbox                   
 <-- $name     : nombre de la variable en php
 <-- $id	   : nombre de la variable en javascript               
 <-- $val      : nombre de la variable del valor optenido
 <-- $disabled : Enable o Disable del checkbox por defecto Enable = ""; Disable = "disable" 	   
 <-- $event    : llama a una funcion javascript   
Detalles: Incluye checkbox
srv: ALL 
==================================================*/		
		static function buildCheck($title,$name,$id,$val,$disabled = "",$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			echo '<INPUT '.$disabled.' name = "'.$name.'"  type = "checkbox" id="'.$name.'"';
			if ($val == "Y" || $val == "on") { 
				echo ' checked';
			}
			if ($event != "") {
				echo ' onClick="'.$event.'"';
			}
			echo ' >'; 
       			echo ' </INPUT>';
			echo ' </LABEL>';
		} //buildCheck

                static function buildChecksinpuntos($title,$name,$id,$val,$disabled = "",$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			echo '<INPUT '.$disabled.' name = "'.$name.'"  type = "checkbox" id="'.$name.'"';
			if ($val == "Y" || $val == "on") { 
				echo ' checked';
			}
			if ($event != "") {
				echo ' onClick="'.$event.'"';
			}
			echo ' >'; 
       			echo ' </INPUT>';
			echo ' </LABEL>';
		} //buildCheck

		
/*===============================================
buildFormTitle
Descripcion : Inserta un titulo HTML
parametro :
 <-- $title    : Titulo en tab <H1> del HTML                  
 <-- $subTitle : Subtitulo en tab <SPAN> del HTML 
 <-- $marquee  : Realiza el efecto de SCROLLDELAY si ($marquee != "")   
Detalles: Titulo y subtitulo de la vista del sistema y realiza movimiento del subtitulo
srv: 65 != (67&69) ; 67 = 69
65    = realiza SCROLLDELAY y tiene fijo el sustitulo de SCROLLDELAY.
67&69 = Solo titulo y subtitulo sin SCROLLDELAY
NOTA : Funciona igual sin el parametro ($marquee="")      
==================================================*/	
		static function buildFormTitle($title,$subTitle="Please fill all the texts in the fields.",$marquee="") {
			echo '<H1>'.$title; 
        		echo '<SPAN>'.$subTitle.'</SPAN>';
			if ($marquee != "") 
				echo '<MARQUEE SCROLLDELAY =100> Tasa de envios a Venezuela  '.$marquee.' VEB/USD </MARQUEE>';
    			echo '</H1>';
		}
		
		
/*===============================================
buildInitColumn
Descripcion : Inicio de columna con etiqueta <DIV> HTML para una division
parametro   : No tiene
Detalles    : Inicio de columna
srv: ALL 
==================================================*/
		static function buildInitColumn() {
			echo '<DIV class="formcolumn">';
		}
		
		
/*===============================================
buildInitColumn3
Descripcion : Inicio de columna con etiqueta <DIV> HTML para tres divisiones
parametro   : No tiene
Detalles    : Inicio de columna para tres divisiones
srv: ALL 
==================================================*/
		static function buildInitColumn3() {
			echo '<DIV class="formcolumn3">';
		}	

/*===============================================
buildEndColumn
Descripcion : Cierre de columna con etiqueta </DIV> HTML
parametro   : No tiene
Detalles    : Cierre de columna para cualquier division
srv: ALL 
==================================================*/
		static function buildEndColumn() {
			echo '</DIV>';
		}

		
/*===============================================
buildLabel
Descripcion : Etiqueta HTML <LABEL>
parametro   : 
<-- $val    : Contiene un texto a mostrar 
Detalles    : Etiqueta <LABEL>
srv: ALL 
==================================================*/
		static function buildLabel($val) {
			echo '<LABEL>';
        		echo $val;
			echo '</LABEL>';	
		}
		
		
/*===============================================
buildIdInput
Descripcion  : Inserta una etiqueta <INPUT type="text"> en HTML
parametro    :
 <-- $val    : Contiene un texto a mostrar                   
 <-- $form   : Referencia a la pagina PL donde se encuentra
 <-- $fLink  : Variable de accion a realizar  
Detalles     : Manejo de campo en presentacion del ID 
srv: ALL     
==================================================*/		
		static function buildIdInput($val,$form,$fLink) {
			echo '<LABEL>';
        		echo '<SPAN>Id :</SPAN>';
			echo '<INPUT name = "id"  type = "text" id="id" ';  
              		echo ' value = "'.$val.'" size="10" maxlength="10"'; 
              		echo ' onBlur="changeAction('.$form.','."'".$fLink."'".')"';
                	echo ' placeholder="Internal Id">'; 
       			echo ' </INPUT>	';
        		echo ' </LABEL>';
		}
		
/*===============================================
buildInputAllDevices
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML para dispositivos moviles
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 	
Detalles        : Manejo de campo en presentacion para dispositivos moviles
srv: ALL     
==================================================*/
		static function buildInputAllDevices($title,$name,$id,$val,
					$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}		
	

/*===============================================
buildInput
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 	
Detalles        : Manejo de campo en presentacion
srv: ALL     
==================================================*/	
		static function buildInput($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}
		
                static function buildInputhours($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<CENTER><LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="time" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL></CENTER>';	
		}
                
            	static function buildInputsinpuntos($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}

                static function buildInputsinpuntosh($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
//                        if ($onblur != "")
//				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' style="display:inline" name = "'.$name.'" type="text" onkeydown="'.$onblur.';" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo ' maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}


		
/*===============================================
buildInputNoSpace
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript
Funcion         : isNoSpace(event) 
Detalles        : Manejo de campo en presentacion que no acepta espacios
srv: ALL     
==================================================*/
		static function buildInputNoSpace($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isNoSpace(event)" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}
	
	
/*===============================================
buildInputUS
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 
Funcion         : isUSLetter(event)
Detalles        : Manejo de campo en presentacion con restriccion del abecedario americano
srv: ALL     
==================================================*/
		static function buildInputUS($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isUSLetter(event)" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}
		
		
/*===============================================
buildInputNumberAllDevices
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML en dispositivos moviles
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 
Funcion         : isNumber(event)
Detalles        : Manejo de campo en presentacion con restriccion de NO (copiar,pegar,mover,eliminar) y solo numericos en dispositivos moviles 
srv: ALL     
==================================================*/
		static function buildInputNumberAllDevices($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT  onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isNumber(event)" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}
		
		
/*===============================================
buildInputNumber
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 
Funcion         : isNumber(event)
Detalles        : Manejo de campo en presentacion con restriccion solo numericos 
srv: ALL     
==================================================*/		
		static function buildInputNumber($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isNumber(event)" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}		
	

/*===============================================
buildInputNumberDot
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 
Funcion         : isNumberDot(event)
Detalles        : Manejo de campo en presentacion con restriccion solo numericos con mascara de puntos 
srv: ALL     
==================================================*/	
		static function buildInputNumberDot($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isNumberDot(event)" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}	


/*===============================================
buildInputAddress
Descripcion     : Inserta una etiqueta <INPUT type="text"> en HTML
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $maxlength : Longitud maxima de carcateres por defecto 50  
 <-- $readonly  : Indica campo de solo lectura, para activar pasar parametro "readonly" 
 <-- $onblur    : Hace referencia a un evento en javascript 
Funcion         : isUSLetterOrNumber(event)
Detalles        : Manejo de campo en presentacion con restriccion de letra y numeros de abecedario americano
srv: ALL     
==================================================*/		
		static function buildInputAddress($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isUSLetterOrNumber(event)" id="'.$id.'" value = "'.$val.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';	
		}
		
		
/*===============================================
buildButton
Descripcion     : Inserta una etiqueta <INPUT type="submit"> en HTML
parametro       :
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial
Funcion         : isUSLetterOrNumber(event)
Detalles        : Agrega botom sumit en presentacion 
srv: ALL     
==================================================*/			
		static function buildButton($name,$id,$val) {
			echo '<LABEL>';
        		echo '<INPUT type="submit" id="'.$id.'" name ="'.$name.'" value = "'.$val.'" ></INPUT>';
			echo '</LABEL>';	
		}
		
		
/*===============================================
buildRadio
Descripcion   : Inserta una etiqueta <INPUT type="radio"> en HTML
parametro     :
 <-- $title   : Contiene el titulo del campo                   
 <-- $name    : Nombre de la variable de referencia en PHP
 <-- $id      : Nombre de la variable de referencia en javascript  
 <-- $val     : Valor inicial  
 <-- $checked : Indica campo que ya esta chequeado (check), para activar pasar parametro "checked" 
 <-- $event   : Funcion de javascript a realizar 
 <-- $open    : Con parametro distinto de "1" no abre la etiqueta <LABEL> ni <SPAN> del titulo 
 <-- $close   : Con parametro distinto de "1" no cierre la etiqueta <LABEL>  
Detalles      : Manejo de campo en presentacion agregando check radio
srv: ALL     
==================================================*/		
			static function buildRadio($title,$name,$id,$val,$checked="",$event="",$open=1,$close=1) {
			if ($open)
				echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($event != "")
				$event = ' onChange="submit()" ';
			if ($checked != "")
				$checked = " checked ";
			echo '<INPUT type="radio" '.$checked.$event.' name="'.$name.'" id="'.$id.'" value="'.$val.'"></INPUT>';
			if ($close)
				echo '</LABEL>';	
		}	
		

/*===============================================
buildTextAreaAllDevices
Descripcion     : Inserta una etiqueta <TEXTAREA> en HTML en dispositivos moviles
parametro       :
 <-- $title     : Contiene el titulo del campo                   
 <-- $name      : Nombre de la variable de referencia en PHP
 <-- $id        : Nombre de la variable de referencia en javascript  
 <-- $val       : Valor inicial  
 <-- $rows      : Indica el largo del <TEXTAREA>
 <-- $cols      : Indica el ancho del <TEXTAREA>
 <-- $maxlength : Cantidad de caracteres que permite el <TEXTAREA> por defecto "100"
Detalles        : Manejo de campo en presentacion para texto en dispositivos moviles
srv: ALL     
==================================================*/		
		static function buildTextAreaAllDevices($title,$name,$id,$val,$rows="4",$cols="50",$maxlength="100") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			echo '<TEXTAREA name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'" maxlength="'.$maxlength.'"' ; 
                       	echo 'placeholder="'.$title.'">';
			echo $val;
			echo '</TEXTAREA>';	
        		echo '</LABEL>';	
		}		
	

/*===============================================
buildTextArea
Descripcion : Inserta una etiqueta <TEXTAREA> en HTML 
parametro   :
 <-- $title : Contiene el titulo del campo                   
 <-- $name  : Nombre de la variable de referencia en PHP
 <-- $id    : Nombre de la variable de referencia en javascript  
 <-- $val   : Valor inicial  
 <-- $rows  : Indica el largo del <TEXTAREA>
 <-- $cols  : Indica el ancho del <TEXTAREA>
Detalles    : Manejo de campo en presentacion para texto
srv: ALL     
==================================================*/
		static function buildTextArea($title,$name,$id,$val,$rows="4",$cols="50") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			echo '<TEXTAREA name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'"' ; 
                       	echo 'placeholder="'.$title.'">';
			echo $val;
			echo '</TEXTAREA>';	
        		echo '</LABEL>';	
		}
                
                static function buildTextAreasinpunto($title,$name,$id,$val,$rows="4",$cols="50") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			echo '<TEXTAREA name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'"' ; 
                       	echo 'placeholder="'.$title.'">';
			echo $val;
			echo '</TEXTAREA>';	
        		echo '</LABEL>';	
		}
	

/*===============================================
buildTextAreaUS
Descripcion : Inserta una etiqueta <TEXTAREA> en HTML 
parametro   :
 <-- $title : Contiene el titulo del campo                   
 <-- $name  : Nombre de la variable de referencia en PHP
 <-- $id    : Nombre de la variable de referencia en javascript  
 <-- $val   : Valor inicial  
 <-- $rows  : Indica el largo del <TEXTAREA>
 <-- $cols  : Indica el ancho del <TEXTAREA>
 Funcion    : isUSLetter(event)
Detalles    : Manejo de campo en presentacion para texto que permite solo alfabeto americano
srv: ALL     
==================================================*/	
		static function buildTextAreaUS($title,$name,$id,$val,$rows="4",$cols="50") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			echo '<TEXTAREA onkeypress="return isUSLetter(event)" name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'"' ; 
                       	echo 'placeholder="'.$title.'">';
			echo $val;
			echo '</TEXTAREA>';	
        		echo '</LABEL>';	
		}
		
		
/*===============================================
buildTextAreaAddress
Descripcion : Inserta una etiqueta <TEXTAREA> en HTML 
parametro   :
 <-- $title : Contiene el titulo del campo                   
 <-- $name  : Nombre de la variable de referencia en PHP
 <-- $id    : Nombre de la variable de referencia en javascript  
 <-- $val   : Valor inicial  
 <-- $rows  : Indica el largo del <TEXTAREA>
 <-- $cols  : Indica el ancho del <TEXTAREA>
 Funcion    : isUSLetterOrNumber(event)
Detalles    : Manejo de campo en presentacion para texto que permite solo alfabeto americano y numeros
srv: ALL     
==================================================*/	
		static function buildTextAreaAddress($title,$name,$id,$val,$rows="4",$cols="50") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			echo '<TEXTAREA onkeypress="return isUSLetterOrNumber(event)" name = "'.$name.'" id="'.$id.'" rows="'.$rows.'" cols="'.$cols.'"' ; 
                       	echo 'placeholder="'.$title.'">';
			echo $val;
			echo '</TEXTAREA>';	
        		echo '</LABEL>';	
		}	
		
		
/*===============================================
buildInputPasswordAllDevices
Descripcion      : Inserta una etiqueta <INPUT type="password"> en HTML en dispositivos moviles
parametro        :
 <-- $title      : Contiene el titulo del campo                   
 <-- $name       : Nombre de la variable de referencia en PHP
 <-- $id         : Nombre de la variable de referencia en javascript  
 <-- $val        : Valor inicial  
 <-- $maxlength  : Cantidad de caracteres que permite el <INPUT> por defecto "50"
Detalles         : Manejo de campo en presentacion para texto tipo password en dispositivos moviles
srv: ALL     
==================================================*/
		static function buildInputPasswordAllDevices($title,$name,$id,$val,$maxlength="50") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			echo '<INPUT name = "'.$name.'" type="password" id="'.$id.'" value = "'.$val.'" '; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';	
        		echo '</LABEL>';	
		}
		

/*===============================================
buildInputPassword
Descripcion      : Inserta una etiqueta <INPUT type="password"> en HTML 
parametro        :
 <-- $title      : Contiene el titulo del campo                   
 <-- $name       : Nombre de la variable de referencia en PHP
 <-- $id         : Nombre de la variable de referencia en javascript  
 <-- $val        : Valor inicial  
 <-- $maxlength  : Cantidad de caracteres que permite el <INPUT> por defecto "50"
Detalles         : Manejo de campo en presentacion para texto tipo password 
srv: ALL     
==================================================*/
		static function buildInputPassword($title,$name,$id,$val,$maxlength="50") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			echo '<INPUT name = "'.$name.'" type="password" id="'.$id.'" value = "'.$val.'" '; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';	
        		echo '</LABEL>';	
		}
		
		
/*===============================================
buildInputFile
Descripcion : Inserta una etiqueta <INPUT type="file"> en HTML 
parametro   :
 <-- $title : Contiene el titulo del campo                   
 <-- $name  : Nombre de la variable de referencia en PHP
 <-- $id    : Nombre de la variable de referencia en javascript  
 <-- $val   : Valor inicial  
Detalles    : Manejo de campo en presentacion para utilizacion de archivos 
NOTA: En el prentationLayer de web no contiene el parametro de $val 
srv: ALL     
==================================================*/		
		static function buildInputFile($title,$name,$id,$val) {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			echo '<INPUT type="file" name="'.$name.'" id="'.$id.'" value = "'.$val.'">';
			echo '</LABEL>';
		}
		
		
/*===============================================
buildScriptCalendar
Descripcion   : Inserta un script <script> en HTML 
parametro     :
 <-- $name    : Nombre de la variable de referencia en PHP
 <-- $minYear : Valor de a�os como parametro minimo 
 <-- $maxYear : Valor de a�os como parametro maximo  
Detalles      : Manejo de campo en presentacion para utilizar de calendario en campo fecha en espa�ol 
srv: ALL     
==================================================*/			
		static function buildScriptCalendar($name,$minYear="1900",$maxYear="2030") {
			$script = "<script>";
			$script .= "$.datepicker.regional['es'] = {";
 			$script .= "closeText: 'Cerrar',";
 			$script .= "prevText: '<Ant',";
 			$script .= "nextText: 'Sig>',";
 			$script .= "currentText: 'Hoy',";
 			$script .= "monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],";
 			$script .= "monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],";
 			$script .= "dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],";
 			$script .= "dayNamesShort: ['Dom','Lun','Mar','Mi�','Juv','Vie','Sab'],";
 			$script .= "dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],";
 			$script .= "weekHeader: 'Sm',";
 			$script .= "dateFormat: 'dd/mm/yy',";
 			$script .= "firstDay: 1,";
 			$script .= "isRTL: false,";
 			$script .= "showMonthAfterYear: false,";
 			$script .= "yearSuffix: ''";
 			$script .= "};";
 			$script .= "$.datepicker.setDefaults($.datepicker.regional['es']);";
			$script .= "$(function () {";
			$script .= '$("#'.$name.'").datepicker({';
			$script .= "changeMonth: true,";
      			$script .= "changeYear: true,";
      			$script .= 'yearRange: "'.$minYear.':'.$maxYear.'"';
			$script .= "});";
			$script .= "});";
			$script .= "</script>";
			echo $script;
		}

                static function buildScriptCalendar2($name,$minYear="1900",$maxYear="2030") {
			$script = "<script>";
			$script .= "$.datepicker.regional['es'] = {";
 			$script .= "closeText: 'Cerrar',";
 			$script .= "prevText: '<Ant',";
 			$script .= "nextText: 'Sig>',";
 			$script .= "currentText: 'Hoy',";
 			$script .= "monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],";
 			$script .= "monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],";
 			$script .= "dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],";
 			$script .= "dayNamesShort: ['Dom','Lun','Mar','Mi�','Juv','Vie','Sab'],";
 			$script .= "dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],";
 			$script .= "weekHeader: 'Sm',";
                        $script .= "dateFormat: 'yy-mm-dd',";
 			$script .= "firstDay: 1,";
 			$script .= "isRTL: false,";
 			$script .= "showMonthAfterYear: false,";
 			$script .= "yearSuffix: ''";
 			$script .= "};";
 			$script .= "$.datepicker.setDefaults($.datepicker.regional['es']);";
			$script .= "$(function () {";
			$script .= '$("#'.$name.'").datepicker({';
			$script .= "changeMonth: true,";
      			$script .= "changeYear: true,";
      			$script .= 'yearRange: "'.$minYear.':'.$maxYear.'"';
			$script .= "});";
			$script .= "});";
			$script .= "</script>";
			echo $script;
		}	


/*===============================================
initTabs
Descripcion  : Funcion javascript para efecto de multiples pesta�as relacionada con buildTabs
parametro    :
<-- $name    : Variable de Identificador global del objeto en el HTML
Detalles     : Manejo de campo en presentacion para visualizar efecto de multiples pesta�as 
srv: ALL     
==================================================*/	
		function initTabs($name) {
			$script = '<script>';
  			$script .= '$(function() {';
    			$script .= '$( "#'.$name.'" ).tabs({';
			$script .= 'beforeLoad: function( event, ui ) {';
        			$script .= 'ui.jqXHR.fail(function() {';
          			$script .= 'ui.panel.html(" Falla ");';
        			$script .= '});';
      			$script .= '}';
    			$script .= '});';
  			$script .= '})';
  			$script .= '</script>';
			echo $script;

		}


/*===============================================
buildTabs
Descripcion  : Etiqueta HTML para efecto de multiples pesta�as relacionada con initTabs
parametro    :
<-- $name    : Variable de Identificador global del objeto en el HTML
<-- $arTitle : Arreglo de titulo de cada pesta�a
<-- $arPL    : Arreglo de URL de cada pesta�a		
Detalles     : Manejo de campo en presentacion para visualizar efecto de multiples pesta�as 
srv: ALL     
==================================================*/
		function buildTabs($name,$arTitle,$arPL) {
			$script = '<div id="'.$name.'">';
  			$script .= '<ul>';
			$nt = count($arTitle);
			for($i = 0;$i<$nt;$i++) {
    				$script.= '<li><a href="'.$arPL[$i].'">'.$arTitle[$i].'</a></li>';
			}
			$script .= '</ul>';

			$script.= '</div>';
			echo $script;
		}


/*===============================================
buildCaptchaPathAllDevices
Descripcion : Inserta una etiqueta con CAPTCHA de imagen para HTML en dispositivos moviles
parametro   :
<-- $pathI  : Ruta del archivo de CAPTCHA 
<-- $Title  : Titulo del tag en HTML
<-- $w      : Ancho del elemento
<-- $h      : Altura del elemento
<-- $noc    : Cantidad maxima de caracteres
Funcion     : captcha.php
Detalles    : Manejo de campo en presentacion para etiqueta con CAPTCHA de imagen para HTML en dispositivos moviles
srv: ALL     
==================================================*/
		static function buildCaptchaPathAllDevices($pathI,$title,$w=100,$h=40,$noc=5) {
			echo '<LABEL>';	
			echo '<SPAN>'.$title.'</SPAN>';
			$path = $pathI."/includes/captcha.php?width=".$w."&height=".$h."&characters=".$noc;
			echo '<IMG align="center" style="padding-right: 5px; border: 0" src="'.$path.'"></IMG>';
			echo '</label>';
		}
		

/*===============================================
buildCaptchaPath
Descripcion : Inserta una etiqueta con CAPTCHA de imagen para HTML 
parametro   :
<-- $pathI  : Ruta del archivo de CAPTCHA 
<-- $Title  : Titulo del tag en HTML
<-- $w      : Ancho del elemento
<-- $h      : Altura del elemento
<-- $noc    : Cantidad maxima de caracteres
Funcion     : captcha.php
Detalles    : Manejo de campo en presentacion para etiqueta con CAPTCHA de imagen para HTML 
srv: ALL     
==================================================*/
		static function buildCaptchaPath($pathI,$title,$w=100,$h=40,$noc=5) {
			echo '<LABEL>';	
			echo '<SPAN>'.$title.' :</SPAN>';
			$path = $pathI."/includes/captcha.php?width=".$w."&height=".$h."&characters=".$noc;
			echo '<IMG align="center" style="padding-right: 5px; border: 0" src="'.$path.'"></IMG>';
			echo '</label>';
		}


/*===============================================
buildCaptcha
Descripcion : Inserta una etiqueta con CAPTCHA de imagen para HTML 
parametro   :
<-- $Title  : Titulo del tag en HTML
<-- $w      : Ancho del elemento
<-- $h      : Altura del elemento
<-- $noc    : Cantidad maxima de caracteres
Funcion     : captcha.php
Detalles    : Manejo de campo en presentacion para etiqueta con CAPTCHA de validacion para HTML 
srv: ALL     
==================================================*/
		static function buildCaptcha($title,$w=100,$h=40,$noc=5) {
			echo '<LABEL>';	
			echo '<SPAN>'.$title.' :</SPAN>';
			$path = PATH."/includes/captcha.php?width=".$w."&height=".$h."&characters=".$noc;
			echo '<IMG align="center" style="padding-right: 5px; border: 0" src="'.$path.'"></IMG>';
			echo '</label>';
		}

	
/*===============================================
getCaptcha
Descripcion : Validacion de la imagen CAPTCHA para HTML 
parametro   : No tiene
Detalles    : Validacion de la imagen CAPTCHA para HTML introducida por el usuario 
srv: ALL     
==================================================*/
		static function getCaptcha() {
			return isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';
		}


/*===============================================
getUser
Descripcion : Validacion del user 
parametro   : No tiene
Detalles    : Valida si esta definido la variable user en la session
srv: ALL  
==================================================*/		
		static function getUser() {
			return isset($_SESSION['user']) ? $_SESSION['user'] : '';
		}	
	

/*===============================================
setUser
Descripcion : Validacion del user 
parametro   : 
<-- $user   : Variable del user
Detalles    : Define user como variable de session
srv: ALL   
==================================================*/	
		static function setUser($user) {
			$_SESSION["user"]=$user;
		}


/*===============================================
sessionLogged
Descripcion : Validacion session iniciada 
parametro   : No tiene
Detalles    : Valida si un user tiene una session iniciada
srv: ALL  
==================================================*/	
		static function sessionLogged() {
			$user = presentationLayer::getUser();
			if ($user == "") {
				utilities::redirect(PATH."index.php");	
			}
			return ($user);
		}	
		
		
/*===============================================
buildSubmit
Descripcion : Inserta un botom <BUTTON type="submit"> en HTML 
parametro   :
<-- $Title  : Contiene titulo del botom en HTML
<-- $name   : Nombre de la variable de referencia en PHP
<-- $id     : Nombre de la variable de referencia en javascript 
<-- $value  : Valor que toma la variable
Detalles    : Manejo de campo en presentacion para un botom <BUTTON type="submit"> en HTML 
srv: ALL     
==================================================*/
		static function buildSubmit($title,$name,$id,$value="") {
			echo '<DIV align="center">';
			echo '<BUTTON type="submit" name="'.$name.'" id="'.$id.'" align="center" class="css_button" value = "'.$value.'">'.$title.'</BUTTON>';
			echo '</DIV>';
		}
		
		
/*===============================================
buildSubmit2
Descripcion : Inserta varios botom <BUTTON type="submit"> en HTML (minimo 2, maximo 20) 
parametro   :
<-- $TitleN  : Contiene titulo del botom en HTML (donde N es un numero del 1 al 20)
<-- $nameN   : Nombre de la variable de referencia en PHP (donde N es un numero del 1 al 20)
<-- $idN     : Nombre de la variable de referencia en javascript (donde N es un numero del 1 al 20)  
<-- $valueN  : Valor que toma la variable (donde N es un numero del 1 al 20)
Detalles    : Manejo de campo en presentacion para varios botom <BUTTON type="submit"> en HTML 
srv: ALL     
==================================================*/		
		static function buildSubmit2($title1,$name1,$id1,$value1,
						$title2,$name2,$id2,$value2,
						$title3="",$name3="",$id3="",$value3="",
						$title4="",$name4="",$id4="",$value4="",
						$title5="",$name5="",$id5="",$value5="",
						$title6="",$name6="",$id6="",$value6="",
						$title7="",$name7="",$id7="",$value7="",
						$title8="",$name8="",$id8="",$value8="",
						$title9="",$name9="",$id9="",$value9="",
						$title10="",$name10="",$id10="",$value10="",
						$title11="",$name11="",$id11="",$value11="",
						$title12="",$name12="",$id12="",$value12="",
						$title13="",$name13="",$id13="",$value13="",
						$title14="",$name14="",$id14="",$value14="",
						$title15="",$name15="",$id15="",$value15="",
						$title16="",$name16="",$id16="",$value16="",
						$title17="",$name17="",$id17="",$value17="",
						$title18="",$name18="",$id18="",$value18="",
						$title19="",$name19="",$id19="",$value19="",
						$title20="",$name20="",$id20="",$value20="") {
			echo '<DIV align="center">';
			echo '<BUTTON type="submit" name="'.$name1.'" id="'.$id1.'" align="center" class="css_button" value = "'.$value1.'">'.$title1.'</BUTTON>';
			echo '<BUTTON type="submit" name="'.$name2.'" id="'.$id2.'" align="center" class="css_button" value = "'.$value2.'">'.$title2.'</BUTTON>';	
			if ($title3 != "") {
				echo '<BUTTON type="submit" name="'.$name3.'" id="'.$id3.'" align="center" class="css_button" value = "'.$value3.'">'.$title3.'</BUTTON>';	
			}
			if ($title4 != "") {
				echo '<BUTTON type="submit" name="'.$name4.'" id="'.$id4.'" align="center" class="css_button" value = "'.$value4.'">'.$title4.'</BUTTON>';	
			}
			if ($title5 != "") {
				echo '<BUTTON type="submit" name="'.$name5.'" id="'.$id5.'" align="center" class="css_button" value = "'.$value5.'">'.$title5.'</BUTTON>';	
			}
			if ($title6 != "") {
				echo '<BUTTON type="submit" name="'.$name6.'" id="'.$id6.'" align="center" class="css_button" value = "'.$value6.'">'.$title6.'</BUTTON>';	
			}
			if ($title7 != "") {
				echo '<BUTTON type="submit" name="'.$name7.'" id="'.$id7.'" align="center" class="css_button" value = "'.$value7.'">'.$title7.'</BUTTON>';	
			}	
			if ($title8 != "") {
				echo '<BUTTON type="submit" name="'.$name8.'" id="'.$id8.'" align="center" class="css_button" value = "'.$value8.'">'.$title8.'</BUTTON>';	
			}
			if ($title9 != "") {
				echo '<BUTTON type="submit" name="'.$name9.'" id="'.$id9.'" align="center" class="css_button" value = "'.$value9.'">'.$title9.'</BUTTON>';	
			}
			if ($title10 != "") {
				echo '<BUTTON type="submit" name="'.$name10.'" id="'.$id10.'" align="center" class="css_button" value = "'.$value10.'">'.$title10.'</BUTTON>';	
			}
			if ($title11 != "") {
				echo '<BUTTON type="submit" name="'.$name11.'" id="'.$id11.'" align="center" class="css_button" value = "'.$value11.'">'.$title11.'</BUTTON>';	
			}
			if ($title12 != "") {
				echo '<BUTTON type="submit" name="'.$name12.'" id="'.$id12.'" align="center" class="css_button" value = "'.$value12.'">'.$title12.'</BUTTON>';	
			}
			if ($title13 != "") {
				echo '<BUTTON type="submit" name="'.$name13.'" id="'.$id13.'" align="center" class="css_button" value = "'.$value13.'">'.$title13.'</BUTTON>';	
			}
			if ($title14 != "") {
				echo '<BUTTON type="submit" name="'.$name14.'" id="'.$id14.'" align="center" class="css_button" value = "'.$value14.'">'.$title14.'</BUTTON>';	
			}
			if ($title15 != "") {
				echo '<BUTTON type="submit" name="'.$name15.'" id="'.$id15.'" align="center" class="css_button" value = "'.$value15.'">'.$title15.'</BUTTON>';	
			}
			if ($title16 != "") {
				echo '<BUTTON type="submit" name="'.$name16.'" id="'.$id16.'" align="center" class="css_button" value = "'.$value16.'">'.$title16.'</BUTTON>';	
			}
			if ($title17 != "") {
				echo '<BUTTON type="submit" name="'.$name17.'" id="'.$id17.'" align="center" class="css_button" value = "'.$value17.'">'.$title17.'</BUTTON>';	
			}
			if ($title18 != "") {
				echo '<BUTTON type="submit" name="'.$name18.'" id="'.$id18.'" align="center" class="css_button" value = "'.$value18.'">'.$title18.'</BUTTON>';	
			}
			if ($title19 != "") {
				echo '<BUTTON type="submit" name="'.$name19.'" id="'.$id19.'" align="center" class="css_button" value = "'.$value19.'">'.$title19.'</BUTTON>';	
			}
			if ($title20 != "") {
				echo '<BUTTON type="submit" name="'.$name20.'" id="'.$id20.'" align="center" class="css_button" value = "'.$value20.'">'.$title20.'</BUTTON>';	
			}
		echo '</DIV>';
		}

		
/*===============================================
buildSelectAllDevices
Descripcion        : Inserta <SELECT> en HTML en dispositivos moviles  
parametro          :
<-- $Title         : Contiene titulo de la <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $foreignTable  : Nombre de la tabla de la base de datos
<-- $curVal        : Valor a mostrar
<-- $foreignscheme : Nombre del esquema de la BD
<-- $event         : Hace referencia a un evento en javascript
<-- $disabled      : Enable o Disable del <SELECT> por defecto Enable = ""; Disable = "disable" 
Funcion            : $mod->fillForeignTableCombo()
Detalles           : Manejo de campo en presentacion para <SELECT> en HTML en dispositivos moviles 
srv: ALL     
==================================================*/
		static function buildSelectAllDevices($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($event != "") {
				$event = 'onchange="'.$event.'"';
			}
			echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillForeignTableCombo($foreignTable,$curVal,$foreignscheme);
			echo '</SELECT>';
			echo '</LABEL>';
		}	
	

/*===============================================
buildSelectAllDevicesActive
Descripcion        : Inserta <SELECT> en HTML en dispositivos moviles  
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $foreignTable  : Nombre de la tabla de la base de datos
<-- $curVal        : Valor a mostrar
<-- $foreignscheme : Nombre del esquema de la BD
<-- $event         : Hace referencia a un evento en javascript
<-- $disabled      : Enable o Disable del <SELECT> por defecto Enable = ""; Disable = "disable" 
Funcion            : $mod->fillForeignTableComboActive()
Detalles           : Manejo de campo en presentacion para <SELECT> de acuerdo a un stored procedure ya creado con el esquema en HTML en dispositivos moviles 
srv: ALL     
==================================================*/
		static function buildSelectAllDevicesActive($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($event != "") {
				$event = 'onchange="'.$event.'"';
			}
			echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillForeignTableComboActive($foreignTable,$curVal,$foreignscheme);
			echo '</SELECT>';
			echo '</LABEL>';
		}
		
		
/* NOTA: ver diferencia en los dos anteriores y este. (fillForeignTableComboActive)		
/*===============================================
buildSelect
Descripcion        : Inserta <SELECT> en HTML 
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $foreignTable  : Nombre de la tabla de la base de datos
<-- $curVal        : Valor a mostrar
<-- $foreignscheme : Nombre del esquema de la BD
<-- $event         : Hace referencia a un evento en javascript
<-- $disabled      : Enable o Disable del <SELECT> por defecto Enable = ""; Disable = "disable" 
Funcion            : $mod->fillForeignTableCombo()
Detalles           : Manejo de campo en presentacion para <SELECT> en HTML
srv: ALL     
==================================================*/		
		static function buildSelect($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($event != "") {
				$event = 'onchange="'.$event.'"';
			}
			echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillForeignTableCombo($foreignTable,$curVal,$foreignscheme);
			echo '</SELECT>';
			echo '</LABEL>';
		}	
	


/*===============================================
buildSelectArr
Descripcion        : Inserta <SELECT> en HTML 
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $arr           : Valores contenidos en un arreglo a mostrar en el <SELECT>
<-- $curVal        : Valor a mostrar
Detalles           : Manejo de campo en presentacion para <SELECT> en HTML a partir de un arreglo
NOTA               : En el prentationLayer de web no contiene el parametro de $curVal 
srv: ALL     
==================================================*/	
		static function buildSelectArr($title,$name,$id,$arr,$curVal="",$event="") {

			echo '<LABEL>';
        			echo '<SPAN>'.$title.' :</SPAN>';
                        if ($event != "") {
			    $event = 'onchange="'.$event.'"';
			}
			$nr = count($arr); 
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			for ($i=0; $i < $nr; $i++) {
					if (($curVal != "") && ($arr[$i] == $curVal)) {
						echo '<option value="'.$arr[$i].'" SELECTED>'.$arr[$i].'</option>';
					}
					else {
        					echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
					}
	 		}
			echo '</SELECT>';
			echo '</LABEL>';

		}

                static function buildSelectArrsinpuntos($title,$name,$id,$arr,$curVal="",$event="") {

			echo '<LABEL>';
        			echo '<SPAN>'.$title.'</SPAN>';
                        if ($event != "") {
			    $event = 'onchange="'.$event.'"';
			}
			$nr = count($arr); 
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			for ($i=0; $i < $nr; $i++) {
					if (($curVal != "") && ($arr[$i] == $curVal)) {
						echo '<option value="'.$arr[$i].'" SELECTED>'.$arr[$i].'</option>';
					}
					else {
        					echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
					}
	 		}
			echo '</SELECT>';
			echo '</LABEL>';

		} 
                
             
                static function buildSelectArrsinpuntosh($title,$name,$id,$arr,$curVal="",$event="") {

//			echo '<LABEL>';
//        			echo '<SPAN>'.$title.'</SPAN>';
                        if ($event != "") {
			    $event = 'onchange="'.$event.'"';
			}
			$nr = count($arr); 
			echo '<SELECT style="display:none" name="'.$name.'" id="'.$id.'" '.$event.' >';
			for ($i=0; $i < $nr; $i++) {
					if (($curVal != "") && ($arr[$i] == $curVal)) {
						echo '<option value="'.$arr[$i].'" SELECTED>'.$arr[$i].'</option>';
					}
					else {
        					echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
					}
	 		}
			echo '</SELECT>';
//			echo '</LABEL>';

		} 
		
		
/*===============================================
buildSelectWithRestriction
Descripcion        : Inserta <SELECT> en HTML 
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $foreignTable  : Nombre de la tabla de la base de datos
<-- $curVal        : Valor a mostrar
<-- $restCol       : Valor por el cual esta retringido
<-- $restVal       : Resultado de un valor recibido por el stored procedure  
<-- $foreignscheme : Nombre del esquema de la BD
<-- $event         : Hace referencia a un evento en javascript
Funcion            : $mod->fillForeignTableComboWithRestriction()
Detalles           : Agregar una lista desplegable con restricion
srv: ALL      
==================================================*/		
		static function buildSelectWithRestriction($title,$name,$id,$mod,
				$foreignTable,$curVal,$restCol,$restVal,$foreignscheme="",$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($event != "") {
				$event = 'onchange="submit()"';
			}
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			//echo "antes"."<br>";
			$mod->fillForeignTableComboWithRestriction($foreignTable,$curVal,$restCol,$restVal,$foreignscheme);
			//echo "despues"."<br>";

			echo '</SELECT>';
			echo '</LABEL>';

			
		}		
		

/*===============================================
buildSelectWithComEvent
Descripcion        : Inserta <SELECT> en HTML 
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $com           : Script SELECT de una tabla segun el $mod de la instancia BL
<-- $valCol        : Valor de la columna a compara de la BD
<-- $showCol       : Valor de la columna a mostrar de la BD
<-- $curVal        : Resultado del valor recibido
<-- $event         : Hace referencia a un evento en javascript
Funcion            : $mod->fillComboCom()
Detalles           : Agregar una lista desplegable desde un $com especifico
srv: ALL      
==================================================*/		
		static function buildSelectWithComEvent($title,$name,$id,$mod,
				$com,$valCol,$showCol,$curVal,$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			$event = 'onchange="'.$event.'"';
			
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillComboCom($com,$valCol,$showCol,$curVal);
			
			echo '</SELECT>';
			echo '</LABEL>';

			
		}		
		

/*===============================================
buildSelectWithCom
Descripcion        : Inserta <SELECT> en HTML 
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $com           : Script SELECT de una tabla segun el $mod de la instancia BL
<-- $valCol        : Valor de la columna a compara de la BD
<-- $showCol       : Valor de la columna a mostrar de la BD
<-- $curVal        : Resultado del valor recibido
<-- $event         : Hace referencia a un evento submit()
Funcion            : $mod->fillComboCom()
Detalles           : Agregar una lista desplegable desde un $com especifico
srv: ALL      
==================================================*/		
		static function buildSelectWithCom($title,$name,$id,$mod,
				$com,$valCol,$showCol,$curVal,$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($event != "") {
				$event = 'onchange="submit()"';
			}
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillComboCom($com,$valCol,$showCol,$curVal);
			
			echo '</SELECT>';
			echo '</LABEL>';

			
		}
                
            	static function buildSelectWithComsinpunto($title,$name,$id,$mod,
				$com,$valCol,$showCol,$curVal,$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($event != "submit()") {
			    $event = 'onchange="'.$event.'"';
			}
                        else{
                            if ($event != "") {
                               $event = 'onchange="submit()"';
                            }
                        }
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillComboCom($com,$valCol,$showCol,$curVal);
			
			echo '</SELECT>';
			echo '</LABEL>';

			
		}

                static function buildSelectWithComsinpuntoh($title,$name,$id,$mod,
				$com,$valCol,$showCol,$curVal,$event="") {

//			echo '<LABEL>';
//        		echo '<SPAN>'.$title.'</SPAN>';
                        if ($event != "") {
                               $event = 'onchange="'.$event.'"';
                        }
			echo '<SELECT style="display:none" name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillComboCom($com,$valCol,$showCol,$curVal);
			
			echo '</SELECT>';
//			echo '</LABEL>';

			
		}


/*===============================================
buildSelectWithComAllDevices
Descripcion        : Inserta <SELECT> en HTML en dispositivos moviles   
parametro          :
<-- $Title         : Contiene titulo de la etiqueta <LABEL> con <SPAN> en HTML
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript   
<-- $mod           : Objeto instancia de la class BL
<-- $com           : Script SELECT de una tabla segun el $mod de la instancia BL
<-- $valCol        : Valor de la columna a compara de la BD
<-- $showCol       : Valor de la columna a mostrar de la BD
<-- $curVal        : Resultado del valor recibido
<-- $event         : Hace referencia a un evento submit()
Funcion            : $mod->fillComboCom()
Detalles           : Agregar una lista desplegable desde un $com especifico en dispositivos moviles  
srv: ALL      
==================================================*/
		static function buildSelectWithComAllDevices($title,$name,$id,$mod,
				$com,$valCol,$showCol,$curVal,$event="") {

			echo '<LABEL>';
        		echo '<SPAN>'.$title.'</SPAN>';
			if ($event != "") {
				$event = 'onchange="submit()"';
			}
			echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillComboCom($com,$valCol,$showCol,$curVal);
			
			echo '</SELECT>';
			echo '</LABEL>';

			
		}



/*===============================================
buildFooter
Descripcion   : Inserta <TABLE> en HTML 
parametro     :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new) con ($bl-> buildLinks)
<-- $pn       : Numero de paginas   
<-- $parname  : Nombre del parametro
<-- $parvalue : Valor del parametro
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'Y'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'Y'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'Y'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'Y'
Funcion       : $bl->fillGrid()
Detalles      : Agregar un grid de datos con paginacion con imagenes de accion a ejecutar  
srv: ALL      
==================================================*/
		static function buildFooter($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE class="italsis">';  
			echo '<TR>';
			echo '<TD>'; 
			$pl->showButtons($save,$delete,$print,$clean,$find);
			echo '</TD>'; 
			echo '</TR>';
			echo '</TABLE>';
			$bl->fillGrid($pn,$parname,$parvalue);
			
		}
		
		
/*===============================================
buildFooterDef
Descripcion  : Inserta botones en HTML en una etiqueta de <TABLE>  
parametro    :
<-- $titleN  : Contiene titulo del botom en HTML (donde N es un numero del 1 al 5)
<-- $nameN   : Nombre de la variable de referencia en PHP (donde N es un numero del 1 al 5)
<-- $idN     : Nombre de la variable de referencia en javascript (donde N es un numero del 1 al 5)   
<-- $valueN  : Valor que toma la variable (donde N es un numero del 1 al 5)
Detalles     : Inserta botones en HTML en una etiqueta de <TABLE> por defecto 1 maximo 5 botones    
srv: ALL      
==================================================*/		
		static function buildFooterDef($title1,$name1,$id1,$value1,
					$title2="",$name2="",$id2="",$value2="",
					$title3="",$name3="",$id3="",$value3="",
					$title4="",$name4="",$id4="",$value4="",
					$title5="",$name5="",$id5="",$value5="") {
			echo '<DIV align="center">';
			echo '<TABLE bgcolor="#D2E9FF">';
			echo '<TR bgcolor="#D2E9FF">';
			echo '<TD bgcolor="#D2E9FF">'; 
			echo '<BUTTON type="submit" name="'.$name1.'" id="'.$id1.'" align="center" class="css_button" value = "'.$value1.'">'.$title1.'</BUTTON>';
			if ($title2 != "") 
				echo '<BUTTON type="submit" name="'.$name2.'" id="'.$id2.'" align="center" class="css_button" value = "'.$value2.'">'.$title2.'</BUTTON>';
			if ($title3 != "") 
				echo '<BUTTON type="submit" name="'.$name3.'" id="'.$id3.'" align="center" class="css_button" value = "'.$value3.'">'.$title3.'</BUTTON>';
			if ($title4 != "") 
				echo '<BUTTON type="submit" name="'.$name4.'" id="'.$id4.'" align="center" class="css_button" value = "'.$value4.'">'.$title4.'</BUTTON>';
			if ($title5 != "") 
				echo '<BUTTON type="submit" name="'.$name5.'" id="'.$id5.'" align="center" class="css_button" value = "'.$value5.'">'.$title5.'</BUTTON>';
			
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			echo '</DIV>';

			
		}	
	

/*===============================================
buildFooterDisplayMethod
Descripcion : Inserta etiqueta de <TABLE> en HTML con grid   
parametro   :
<-- $pl     : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl     : Objeto instancia de la class BL referencia a ($bl = new) con ($bl-> buildLinks)
<-- $method : Variable string que direcciona a un stored procedure especifico ejemplo [esquema].isspget[tabla][$method]() sin parametro
<-- $pn     : Numero de paginas   
<-- $save   : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete : Establece si visualiza la imagen para la accion de eliminar por defecto 'Y'
<-- $print  : Establece si visualiza la imagen para la accion de imprimir por defecto 'Y'
<-- $clean  : Establece si visualiza la imagen para la accion de limpiar por defecto 'Y'
<-- $find   : Establece si visualiza la imagen para la accion de buscar por defecto 'Y'
Funcion     : $bl->fillGridDisplayMethod
Detalles    : Agregar un grid de datos con paginacion con imagenes de accion a ejecutar en el grid el campo id se muestran con el name  
srv: ALL      
==================================================*/	
		static function buildFooterDisplayMethod($pl,$bl,$method,$pn=0,$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE class="italsis"';  
			echo '<TR>';
			echo '<TD>'; 
			$pl->showButtons($save,$delete,$print,$clean,$find);
			echo '</TD>'; 
			echo '</TR>';
			echo '</TABLE>';
        	$bl->fillGridDisplayMethod($method,$pn);
			
			
		}


/*===============================================
buildFooterDisplay
Descripcion   : Inserta etiqueta de <TABLE> en HTML con grid    
parametro     :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new) con ($bl-> buildLinks)
<-- $pn       : Numero de paginas
<-- $parname  : Nombre del parametro (no aplica para la funcion $bl->fillGridDisplay) 
<-- $parvalue : Valor del parametro (no aplica para la funcion $bl->fillGridDisplay) 
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'Y'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'Y'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'Y'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'Y'
Funcion       : $bl->fillGridDisplay
Detalles      : Agregar un grid de datos con paginacion con imagenes de accion a ejecutar en el grid el campo id se muestran con el name ejemplo [esquema].isspget[tabla]display() sin parametro  
srv: ALL      
==================================================*/
		static function buildFooterDisplay($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE class="italsis"';  
			echo '<TR>';
			echo '<TD>'; 
			$pl->showButtons($save,$delete,$print,$clean,$find);
			echo '</TD>'; 
			echo '</TR>';
			echo '</TABLE>';
        	$bl->fillGridDisplay($pn,$parname,$parvalue);
			
			
		}


/*===============================================
buildFooterNoGrid
Descripcion   : Inserta etiqueta de <TABLE> en HTML sin el grid 
parametro     :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new) con ($bl-> buildLinks)
<-- $pn       : Numero de paginas
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'Y'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'Y'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'Y'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'Y'
Detalles      : Agregar imagenes de accion a ejecutar sin grid  
srv: ALL      
==================================================*/
		static function buildFooterNoGrid($pl,$bl,$pn=0,$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
		    echo '<TABLE class="italsis">';
		    echo '<TR>';
		    echo '<TD>';
		    $pl->showButtons($save,$delete,$print,$clean,$find);
		    echo '</TD>';
		    echo '</TR>';
		    echo '</TABLE>';
		    	
		}
	

/*===============================================
buildFooterNoButtons
Descripcion   : Inserta etiqueta de <TABLE> 
parametro     : No tiene
Detalles      : Agregar etiqueta de <TABLE> una columna <TD> y una fila <TR> 
srv: ALL      
==================================================*/
		static function buildFooterNoButtons() {
		    echo '<TABLE class="italsis">';
		    echo '<TR>';
		    echo '<TD>   ';
		    echo '</TD>';
		    echo '</TR>';
		    echo '</TABLE>';
		    	
		}
		
		
/*===============================================
fillGridArrNotPaged
Descripcion     : Inserta etiqueta de <TABLE> en HTML a partir de un arreglo    
parametro       :
<-- $arr        : Contiene un array()
<-- $arrCol     : Contiene un array() que representa las columnas
<-- $arrWidth   : Contiene un array() que representa el ancho de cada columna
<-- $width      : Define el ancho 
<-- $pageNumber : Define la cantidad de paginacion 
<-- $bgcolor    : Define el color de background
<-- $enl        : Enlace con un link para referenciarlo
Detalles        : Agregar etiqueta de <TABLE> en HTML a partir de un arreglo 
srv: 69 != (65&67) ; 65 = 67
69    = realiza $color = $oldcolor; despues de $j++; // color status 06/02/2017
65&67 = $j++; sin el siguiente $color = $oldcolor;  
==================================================*/		
		static function fillGridArrNotPaged($arr, $arrCol,$arrWidth="",
				$width="700",$pageNumber="0",$bgcolor="",$enl="") {
					

			$nr = count($arr);
			$nc = count($arrCol);
			echo '<table class="italsis" width="'.$width.'" >';
			echo "  <tr> ";			

			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				if (isset($arrWidth[$i])) {
					echo "<th width='".$arrWidth[$i]."'>".$name."</th>";
				}
				else {
					echo "<th>".$name."</th>";
				}
				
			}
			echo "</tr>";
			if (is_array($arr)) { // bring values
				for($i=0; $i < $nr; $i++) {
					$color = "";
					if (isset($bgcolor[$i])) {
						$color = ' bgcolor="'.$bgcolor[$i].'"';
					}
					echo "  <tr > ";
					
					$reg = $arr[$i];
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if ($j == 0 && ($pageNumber != "0")) {
							echo "<td><a href='?urloper=find&pn=".$pageNumber.$enl."&id=".$col."'>".$col."</a></td>";
						}
						else {
							if (isset($arrWidth[$j])) {
					 			echo "<td".$color." width='".$arrWidth[$i]."'>".$col."</td>";
							}
							else {
								echo "<td".$color.">".$col."</td>";
							
							}
						}
						$j++;
					
					}
					echo '</tr>';
					
				
				}
			}
			else {
				$end=1;
			}		
			echo "</table>";

		}		
		

/*===============================================
fillGridArrNotPagedNotLink
Descripcion     : Inserta etiqueta de <TABLE> en HTML   
parametro       :
<-- $arr        : Contiene un array()
<-- $arrCol     : Contiene un array() que representa las columnas
<-- $arrWidth   : Contiene un array() que representa el ancho de cada columna
<-- $width      : Define el ancho 
<-- $pageNumber : Define la cantidad de paginacion (No Aplica)
<-- $bgcolor    : Define el color de background
<-- $enl        : Enlace con un link para referenciarlo
Detalles        : Agregar etiqueta de <TABLE> en HTML a partir de un arreglo sin link y sin paginacion
srv: 69 no esta; 65 = 67
=================================================*/		
		static function fillGridArrNotPagedNotLink($arr, $arrCol,$arrWidth="",
				$width="700",$pageNumber="0",$bgcolor="",$enl="") {
					

			$nr = count($arr);
			$nc = count($arrCol);
			echo '<table class="italsis" width="'.$width.'" >';
			echo "  <tr> ";			

			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				if (isset($arrWidth[$i])) {
					echo "<th width='".$arrWidth[$i]."'>".$name."</th>";
				}
				else {
					echo "<th>".$name."</th>";
				}
				
			}
			echo "</tr>";
			if (is_array($arr)) { // bring values
				for($i=0; $i < $nr; $i++) {
					$color = "";
					if (isset($bgcolor[$i])) {
						$color = ' bgcolor="'.$bgcolor[$i].'"';
					}
					echo "  <tr > ";
					
					$reg = $arr[$i];
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if (isset($arrWidth[$j])) {
					 		echo "<td".$color." width='".$arrWidth[$i]."'>".$col."</td>";
						}
						else {
							echo "<td".$color.">".$col."</td>";
							
						}
						$j++;
					
					}
					echo '</tr>';
					
				
				}
			}
			else {
				$end=1;
			}		
			echo "</table>";

		}


/*===============================================
fillGridArrNotPagedNotCss
Descripcion     : Inserta etiqueta de <TABLE> en HTML    
parametro       :
<-- $arr        : Contiene un array()
<-- $arrCol     : Contiene un array() que representa las columnas
<-- $arrWidth   : Contiene un array() que representa el ancho de cada columna
<-- $width      : Define el ancho 
<-- $pageNumber : Define la cantidad de paginacion (No Aplica)
<-- $bgcolor    : Define el color de background
Detalles        : Agregar etiqueta de <TABLE> en HTML a partir de un arreglo sin link y sin paginacion sin ccs  
srv: ALL
=================================================*/	
		static function fillGridArrNotPagedNotCss($arr, $arrCol,$arrWidth="",
				$width="700",$pageNumber="0",$bgcolor="") {
					

			$nr = count($arr);
			$nc = count($arrCol);
			echo '<table width="'.$width.'" >';
			echo "  <tr> ";			

			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				if (isset($arrWidth[$i])) {
					echo "<th width='".$arrWidth[$i]."'>".$name."</th>";
				}
				else {
					echo "<th>".$name."</th>";
				}
				
			}
			echo "</tr>";
			if (is_array($arr)) { // bring values
				for($i=0; $i < $nr; $i++) {
					if (isset($bgcolor[$i])) {
						echo '<tr bgcolor="'.$bgcolor[$i].'"> ';
					}
					else {
						echo "  <tr > ";
					}
					$reg = $arr[$i];
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if ($j == 0 && ($pageNumber != "0")) {
							echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
						}
						else {
							if (isset($arrWidth[$j])) {
					 			echo "<td width='".$arrWidth[$i]."'>".$col."</td>";
							}
							else {
								echo "<td>".$col."</td>";
							
							}
						}
						$j++;
					
					}
					echo '</tr>';
					
				
				}
			}
			else {
				$end=1;
			}		
			echo "</table>";

		}


/*===============================================
fillGridArr
Descripcion     : Inserta etiqueta de <TABLE> en HTML con arreglo   
parametro       :
<-- $arr        : Contiene un array()
<-- $arrCol     : Contiene un array() que representa las columnas
<-- $par        : Parametro que se muestra en el URL  
<-- $pageSize   : Define la cantidad de registros  a mostrar por pagina
<-- $pageNumber : Define la cantidad de paginacion
<-- $width      : Define el ancho 
<-- $check      : Define si se visualiza un cuadro check por registro
<-- $select     : Define si se visualiza la selecion por registro
Detalles        : Agregar etiqueta de <TABLE> en HTML a partir de un arreglo 
srv: ALL
=================================================*/	
		static function fillGridArr($arr, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

			
			

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
							echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
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


/*===============================================
buildHeaderMETALOR
Descripcion     : Genera tag HTML <header>   
parametro       : No tiene
Detalles        : Genera tag HTML <header> Muestra el logo de la organizacion; utilizado en el sitema de metalor 
srv: traida del 67; No esta en 69
=================================================*/			
		static function buildHeaderMETALOR() {
			//<!-- Header -->
    			echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
  			//<!-- Top Section -->
      			echo '<DIV class="container">';
        		echo '<DIV class="row">';
        		echo '<DIV class="col-md-12">';
          		//<!-- Main Menu -->
          		echo '<NAV class="navbar navbar-default header-4" role="navigation">';
          		//<!-- Brand and toggle get grouped for better mobile display -->
          		echo '<DIV class="navbar-header">';
            		echo '<A href="#"><img class="logo" src="/italsis/images/metalor.png" alt="Metalor" title="Metalo"></a>';
            		//echo '<A href="#"><img class="logo" src="images/mg_logo.png" alt="MoneyGram" title="MoneyGram"></a>';
			//echo '<A href="#"><img class="logo" src="images/igmg.jpg" alt="Organizacion Italcambio -- MoneyGram" title="Organizacion Italcambio -- MoneyGram" align="center"></a>';

			echo '</DIV>';
        		echo '</NAV>';
    			echo '</DIV>';
     			echo '</DIV>';
      			echo '</DIV>';
    			echo '</HEADER>';
		}

	
/*===============================================
fillGridArrToolTip
Descripcion     : Inserta etiqueta de <TABLE> en HTML con arreglo   
parametro       :
<-- $arr        : Contiene un array()
<-- $arrCol     : Contiene un array() que representa las columnas
<-- $par        : Parametro que se muestra en el URL  
<-- $pageSize   : Define la cantidad de registros  a mostrar por pagina
<-- $pageNumber : Define la cantidad de paginacion
<-- $width      : Define el ancho 
<-- $check      : Define si se visualiza un cuadro check por registro
<-- $select     : Define si se visualiza la selecion por registro
Detalles        : Agregar etiqueta de <TABLE> en HTML a partir de un arreglo 
srv: ALL
=================================================*/	
		static function fillGridArrToolTip($arr, $arrCol,$arrT, $colTT,$widthCol="",
				$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

			
			

			$nr = count($arr);
			$nc = count($arrCol);
			echo '<table class="italsis" width="'.$width.'" >';
			echo "  <tr> ";

			$pnc = $pageNumber;
			 

			if ($check) {
				echo "<th width='40'>Procesar</th>";

			}	

			if ($select) {
				echo "<th width='40'>Seleccionar</th>";

			}	

				

			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				if (isset($widthCol[$i]) && $widthCol[$i] != "") { 
					echo "<th width='".$widthCol[$i]."'>".$name."</th>";
				}
				else {
					echo "<th>".$name."</th>";
				}
				
			}
			flush();
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
						
						echo '<td width="30"><input type="checkbox" name ="'.$name.'"id = "'.$id.'"></td>';
					}

					if ($select) {
						$name = "CB".$i;
						$id = "CB".$i;
						
						echo '<td width="30"><input type="radio" onclick="submit()" name ="'.$name.'"id = "'.$id.'"></td>';
					}
					
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if ($j == 0) {
							echo "<td width='30'><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
						}
						else {
					 		if (isset($widthCol[$j]) && $widthCol[$j] != "") {   
								echo "<td width='".$widthCol[$j]."' title='".$arrT[$i]."'>".$col."</td>";
							}
							else {
								echo "<td>".$col."</td>";
							}
						}
						$j++;
					
					}
					echo '</tr>';
				
				}
				if ($nr < $pageSize) { // added on 05/30/2015
					$end = 1;
				}
				flush();
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


/*===============================================
buildImgMainCashier
Descripcion   : Inserta menu de imagenes en el sistema metalor <HEADER> en HTML 
parametro     :
<-- $grossGld : Imagen de oro bruto
<-- $fineGld  : Imagen de oro refinado
<-- $delivery : Imagen de entrega de manuales
<-- $closing  : Imagen de cierre de caja principal
<-- $return   : Imagen de devolucion de producto refinado
<-- $exit     : Imagen de salida del sistema
Detalles      : Agregar menu de imagenes en el sistema metalor <HEADER> en HTML 
srv: traida del 67; no existe en el 69
=================================================*/	
    static function buildImgMainCashier($grossGld,$fineGld,$delivery,$closing,$return,$exit) {
      //<!-- Header -->
          echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
        //<!-- Top Section -->
            echo '<DIV class="container">';
            echo '<DIV class="row">';
            echo '<DIV class="col-md-12">';
              //<!-- Main Menu -->
              echo '<NAV class="navbar navbar-default header-4" role="navigation">';
              //<!-- Brand and toggle get grouped for better mobile display -->
              echo '<DIV class="navbar-header">';
      if ($grossGld != "") {
		$_SESSION["idphase"]=1;
			echo '<A href="'.$grossGld.'"><img class="logo" src="images/grossgold.jpg" alt="Oro Bruto" title="Oro Bruto"></a>';
		 }
      if ($fineGld != "") {
  $_SESSION["idphase"]=4;
        echo '<A href="'.$fineGld.'"><img class="logo" src="images/finegold.png" alt="Oro Refinado" title="Oro Refinado"></a>';
      }
      if ($delivery != "") {
  echo '<A href="'.$delivery.'"><img class="logo" src="images/delivery.png" alt="Entregas Manuales" title="Entregas Manuales"></a>';
      }
      if ($closing != "") {
  echo '<A href="'.$closing.'"><img class="logo" src="images/cierres.png" alt="Cierres Caja Principal" title="Cierres Caja Principal"></a>';
      }
      if ($return != "") {
  echo '<A href="'.$return.'"><img class="logo" src="images/devolucion.jpg" alt="Devoluciones" title="Devolucion Producto Refinado"></a>';
      }
      if ($exit != "") {
  echo '<A href="'.$exit.'"><img class="logo" src="images/exit.jpg" alt="Salir" title="Salir"></a>';
      }
      echo '</DIV>';
            echo '</NAV>';
          echo '</DIV>';
          echo '</DIV>';
            echo '</DIV>';
          echo '</HEADER>';
          
    }


/*===============================================
buildImgFactory
Descripcion   : Inserta menu de imagenes en el sistema metalor <HEADER> en HTML 
parametro     :
<-- $FactMet : Imagen de oro bruto
<-- $exit     : Imagen de salida del sistema
Detalles      : Agregar menu de imagenes en el sistema metalor <HEADER> en HTML 
srv: traida del 67; no existe en el 69
NOTA: Segun el llamado en menufactoryGOLD.php se llama con tres (03) parametros 
      {presentationLayer::buildImgFactory($pathMet,$pathFund,$pathExit);}
      y la funcion tiene dos (02) parametros �?.
=================================================*/		
	static function buildImgFactory ($FactMet,$exit) {
      //<!-- Header -->
          echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
        //<!-- Top Section -->
            echo '<DIV class="container">';
            echo '<DIV class="row">';
            echo '<DIV class="col-md-12">';
              //<!-- Main Menu -->
              echo '<NAV class="navbar navbar-default header-4" role="navigation">';
              //<!-- Brand and toggle get grouped for better mobile display -->
              echo '<DIV class="navbar-header">';
      if ($FactMet != "") {
	$_SESSION["idphase"]=2;
        echo '<A href="'.$FactMet.'"><img class="logo" src="images/fundicion.jpg" alt="Fabrica Metalor" title="Fabrica Metalor"></a>';
      }
      
      if ($exit != "") {
	echo '<A href="'.$exit.'"><img class="logo" src="images/exit.jpg" alt="Salir" title="Salir"></a>';
      }
      echo '</DIV>';
            echo '</NAV>';
          echo '</DIV>';
          echo '</DIV>';
            echo '</DIV>';
          echo '</HEADER>';
          
    }


/*===============================================
buildImgTreasury
Descripcion  : Inserta menu de imagenes en el sistema metalor <HEADER> en HTML 
parametro    :
<-- $pUpload : URL de carga de pagos PATH."modules/transactions/goldops/goldFU.php";
<-- $pPay    : URL de archivo banco PATH."modules/transactions/goldops/goldPagoElectronico.php";
<-- $pMove   : URL de traspasos PATH."modules/transactions/goldops/traspaso.php";
<-- $pAdv    : URL de adelanto PATH."modules/transactions/goldops/adelanto.php";
<-- $pRep    : URL de reportes PATH."modules/transactions/goldops/admreportPL.php";
<-- $pPri    : URL de precio PATH."modules/transactions/goldops/goldrate.php";
<-- $exit    : URL de salida PATH."indexGOLD.php";
Detalles      : Agregar menu de imagenes en el sistema metalor <HEADER> en HTML y como parametros los URL respectivos
srv: traida del 67; no existe en el 69
=================================================*/	
		static function buildImgTreasury($pUpload,$pPay,$pMove,$pAdv,$pRep,$pPri,$exit) {
			//<!-- Header -->
    			echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
  			//<!-- Top Section -->
      			echo '<DIV class="container">';
        		echo '<DIV class="row">';
        		echo '<DIV class="col-md-12">';
          		//<!-- Main Menu -->
          		echo '<NAV class="navbar navbar-default header-4" role="navigation">';
          		//<!-- Brand and toggle get grouped for better mobile display -->
          		echo '<DIV class="navbar-header">';
			if ($pUpload != "") {
				echo '<A href="'.$pUpload.'"><img class="logo" src="images/upload.png" alt="Carga Pagos" title="Carga Pagos"></a>';
			}
			if ($pPay != "") {
				echo '<A href="'.$pPay.'"><img class="logo" src="images/transferencia.png" alt="Archivo Banco" title="Archivo Banco"></a>';
			}
			if ($pMove != "") {
				echo '<A href="'.$pMove.'"><img class="logo" src="images/traspaso.jpg" alt="Traspasos" title="Traspasos"></a>';
			}
			if ($pAdv != "") {
				echo '<A href="'.$pAdv.'"><img class="logo" src="images/adelanto.jpg" alt="Adelantos" title="Adelantos"></a>';
			}
			if ($pRep != "") {
				echo '<A href="'.$pRep.'"><img class="logo" src="images/reporte.jpg" alt="Reportes" title="Reportes"></a>';
			}
			if ($pPri != "") {
				echo '<A href="'.$pPri.'"><img class="logo" src="images/gold.jpg" alt="Reportes" title="Precio"></a>';
			}
			if ($exit != "") {
				echo '<A href="'.$exit.'"><img class="logo" src="images/exit.jpg" alt="Salir" title="Salir"></a>';
      			}
			echo '</DIV>';
        		echo '</NAV>';
    			echo '</DIV>';
     			echo '</DIV>';
      			echo '</DIV>';
    			echo '</HEADER>';
    			
		}
		
		
/*===============================================
buildFormTitleSP
Descripcion   : Funcion que muestra un titulo <H1> y subtitulo <SPAN> en HTML 
parametro     :
<-- $title    : Muestra un titulo				 
<-- $subTitle : Muestra un subtitulo
Detalles      : Muestra un titulo y un subtitulo
srv: traida del 67; no existe en el 69
=================================================*/			
    static function buildFormTitleSP($title,$subTitle="Por favor llene los campos indicados con texto.") {
      echo '<H1>'.$title; 
            echo '<SPAN>'.$subTitle.'</SPAN>';
          echo '</H1>';
    }


/*===============================================
buildInputTwice
Descripcion    : Funcion que muestra tag input doble <INPUT> en HTML 
parametro      :
<-- $title1    : Primer titulo del primer input 
<-- $name1     : Nombre de la variable de referencia en PHP del primer titulo 
<-- $id1       : Nombre de la variable de referencia en javascript del primer titulo   		
<-- $val1      : Valor inicial del primer titulo	
<-- $title2    : Segundo titulo del segundo input		
<-- $name2     : Nombre de la variable de referencia en PHP del segundo titulo 
<-- $id2       : Nombre de la variable de referencia en javascript del segundo titulo   
<-- $val2      : Valor inicial del segundo titulo
<-- $maxlength : Establece el maximo de caracteres por defecto 50
<-- $readonly  : Etiqueta de solo lectura por defecto "" se puede modificar "readonly"
<-- $onblur    : Hace referencia a un evento en javascript
Detalles       : Muestra tag input doble <INPUT> en HTML
srv: traida del 67; no existe en el 69
NOTA: Falta mejorar la presentacion.
=================================================*/		
		static function buildInputTwice($title1,$name1,$id1,$val1,
						$title2,$name2,$id2,$val2,
						$maxlength="50",$readonly="",$onblur="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title1.' / '.$title2.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
			echo '<INPUT '.$readonly.' name = "'.$name1.'" type="text" id="'.$id1.'" value = "'.$val1.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title1.'">';
			echo '</INPUT>';
			echo '<INPUT '.$readonly.' name = "'.$name2.'" type="text" id="'.$id2.'" value = "'.$val2.'" ';
			echo $onblur; 
                       	echo 'maxlength="'.$maxlength.'" placeholder="'.$title2.'">';
			echo '</INPUT>';
			
			echo '</LABEL>';	
		}


/*===============================================
buildInputCheckFonts
Descripcion    : Funcion que muestra tag input <INPUT> en HTML 
parametro      :
<-- $title     : Titulo de la etiqueta 
<-- $name      : Nombre de la variable de referencia en PHP 
<-- $id        : Nombre de la variable de referencia en javascript 		
<-- $val       : Valor inicial 
<-- $maxlength : Establece el maximo de caracteres por defecto 50
<-- $readonly  : Etiqueta de solo lectura por defecto "" se puede modificar "readonly"
<-- $onblur    : Hace referencia a un evento en javascript
Funcion        : caracteres(event); toUpperCase(); pattern="[a-zA-Z]*"
Detalles       : Muestra tag input <INPUT> en HTML y realiza validaci�n a posteriori que sea de la "a" a la "z"
srv: traida del 67; no existe en el 69
=================================================*/			
    static function buildInputCheckFonts($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
      echo '<LABEL>';
      echo '<SPAN>'.$title.' :</SPAN>';
      if ($onblur != "")
        $onblur = ' onBlur="'.$onblur.'" ';
      echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'"  onkeypress="return caracteres(event)"  onblur="this.value=this.value.toUpperCase();" value = "'.$val.'" required pattern="[a-zA-Z]*"';
      echo $onblur;
      echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
      echo '</LABEL>';
      
    }


/*===============================================
buildInputCheckNum
Descripcion    : Funcion que muestra tag input <INPUT> en HTML 
parametro      :
<-- $title     : Titulo de la etiqueta 
<-- $name      : Nombre de la variable de referencia en PHP 
<-- $id        : Nombre de la variable de referencia en javascript 		
<-- $val       : Valor inicial 
<-- $maxlength : Establece el maximo de caracteres por defecto 50
<-- $readonly  : Etiqueta de solo lectura por defecto "" se puede modificar "readonly"
<-- $onblur    : Hace referencia a un evento en javascript
Funcion        : enteros(this, event)
Detalles       : Muestra tag input <INPUT> en HTML y realiza validaci�n de caracteres numericos
srv: traida del 67; no existe en el 69
NOTA: Verificar la funcion ya que no realizo lo indicado
=================================================*/	
    static function buildInputCheckNum($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
      
      echo '<LABEL>';
      echo '<SPAN>'.$title.' :</SPAN>';
      if ($onblur != "")
        $onblur = ' onBlur="'.$onblur.'" ';
    
      echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" onkeydown="return enteros(this, event)"  ';
      echo $onblur;
      echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
      echo '</LABEL>';
    }
	
	
	
/*===============================================
buildInputCheckEmail
Descripcion    : Funcion que muestra tag input <INPUT> en HTML 
parametro      :
<-- $title     : Titulo de la etiqueta 
<-- $name      : Nombre de la variable de referencia en PHP 
<-- $id        : Nombre de la variable de referencia en javascript 		
<-- $val       : Valor inicial 
<-- $maxlength : Establece el maximo de caracteres por defecto 50
<-- $readonly  : Etiqueta de solo lectura por defecto "" se puede modificar "readonly"
<-- $onblur    : Hace referencia a un evento en javascript
Funcion        : validarEmail (value); required placeholder="name@example.com"
Detalles       : Muestra tag input <INPUT> en HTML y realiza validaci�n del correo
srv: traida del 67; no existe en el 69
NOTA: Verificar la funcion ya que no realizo lo indicado
=================================================*/	
	static function buildInputCheckEmail($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
      echo '<LABEL>';
      echo '<SPAN>'.$title.' :</SPAN>';
      if ($onblur != "")
        $onblur = ' onBlur="'.$onblur.'" ';
      echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'"  value = "'.$val.'"   onblur="validarEmail (value)" ';
      echo $onblur;
      echo 'maxlength="'.$maxlength.'" required placeholder="name@example.com"></INPUT>';
      echo '</LABEL>';    
        
    }


/*===============================================
buildSelectParam
Descripcion        : Funcion que muestra tag <SELECT> en HTML 
parametro          :
<-- $title         : Titulo de la etiqueta 
<-- $name          : Nombre de la variable de referencia en PHP 
<-- $id            : Nombre de la variable de referencia en javascript 
<-- $mod           : Objeto instancia de la class BL
<-- $foreignTable  : Nombre de la tabla de la base de datos
<-- $curVal        : Valor a mostrar
<-- $foreignscheme : Nombre del esquema de la BD
<-- $event         : Hace referencia a un evento en javascript
<-- $disabled      : Enable o Disable del <SELECT> por defecto Enable = ""; Disable = "disable" 
<-- $param         : Hace referencia a un evento en javascript
Funcion            : validarEmail (value); required placeholder="name@example.com"
Detalles           : Muestra tag <SELECT> en HTML 
srv: traida del 67; no existe en el 69
NOTA: Verificar la funcion ya que no realizo lo indicado
=================================================*/	
	static function buildSelectParam($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="",$param) {
        echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
      if ($event != "") {
        $event = 'onchange="'.$event.'"';
        
      }
      echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' >';
      $mod->fillForeignTableComboParam($foreignTable,$curVal,$foreignscheme,$param);
      echo '</SELECT>';
      echo '</LABEL>';
    }
	
	
/*===============================================
buildFooterNoGridSave
Descripcion   : Inserta etiqueta de <TABLE> en HTML sin el grid 
parametro     :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new) con ($bl-> buildLinks)
<-- $pn       : Numero de paginas
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'N'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'N'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'N'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'N'
Detalles      : Agregar imagenes de accion a ejecutar sin grid solo la imagen save por defecto 'Y'   
srv: traida del 67; no existe en el 69
==================================================*/
   static function buildFooterNoGridSave($pl,$bl,$pn=0,$save="Y",$delete="N",$print="N",$clean="N",$find="N") {
        echo '<TABLE class="italsis">';
        echo '<TR>';
        echo '<TD>';
        $pl->showButtons($save,$delete,$print,$clean,$find);
        echo '</TD>';
        echo '</TR>';
        echo '</TABLE>';
          
    }
	

/*===============================================
fillGridArrPlain
Descripcion   : Inserta etiqueta de <TABLE> en HTML con un grid 
parametro     :
<-- $arr      : Contiene la informacion del resulset de una consulta a la BD ejemplo (executeReader)
<-- $arrCol   : Contiele un arreglo con las columnas a mostrar en el fillGrid
<-- $width    : Define el ancho del fillGrid por defecto 700 si no se envia informacion en el parametro
<-- $arrWidth : Define el ancho de cada columna del fillGrid enviado en un arregle
Detalles      : Muestra un fillGrid donde se envia informacion especifica para ser mostrada, mediante arreglos definidos   
srv: ALL ; Traida del 67;
==================================================*/	
	 	static function fillGridArrPlain($arr, $arrCol,$width="700",$arrWidth="") {
					
			$nr = count($arr);
			$nc = count($arrCol);
			echo '<table class="italsis" width="'.$width.'" >';
			echo "  <tr> ";			

			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				if (isset($arrWidth[$i])) {
					echo "<th width='".$arrWidth[$i]."'>".$name."</th>";
				}
				else {
					echo "<th>".$name."</th>";
				}
				
			}
			echo "</tr>";
			if (is_array($arr)) { // bring values
				for($i=0; $i < $nr; $i++) {
					echo "  <tr > ";
					
					$reg = $arr[$i];
					foreach ($reg as $col) {
						if (isset($arrWidth[$j])) {
					 		echo "<td width='".$arrWidth[$i]."'>".$col."</td>";
						}
						else {
							echo "<td>".$col."</td>";
							
						}
					}
					echo '</tr>';
					
				
				}
			}
			echo "</table>";

		}	
	
	
/*===============================================
fillGridArrPnname
Descripcion     : Inserta etiqueta de <TABLE> en HTML con un grid 
parametro       :
<-- $arr        : Contiene la informacion del resulset de una consulta a la BD ejemplo (executeReader)		
<-- $arrCol     : Contiele un arreglo con las columnas a mostrar en el fillGrid
<-- $pnname     : Nombre de la variable que se sustituye en la etiqueta de referencia (<a href=)				
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo 
<-- $pageSize   : Define la cantidad de registros a mostrar por pagina				
<-- $pageNumber : Define la cantidad de paginas
<-- $width      : Define el ancho del fillGrid			
<-- $check      : Define si se visualiza un cuadro check por registro
<-- $select     : Define si se visualiza la selecion por registro	 
Detalles        : Muestra un fillGrid donde se envia informacion especifica para ser mostrada, mediante arreglos definidos   
srv: ALL ; Traida del 67; No esta en el 69
==================================================*/	
		static function fillGridArrPnname($arr, $arrCol,$pnname,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

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
							echo "<td><a href='?urloper=find&".$pnname."=".$pageNumber."&id=".$col."'>".$col."</a></td>";
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
				$enl=$pnname."=".$pn.$par;
				echo "<a href='"."?".$enl."'>&lt</a>";	
				echo "</td>";
				echo "<td>";
				if ($end)
					$pn = 0; // was $pnc
				else
					$pn = $pnc+1;
				$enl=$pnname."=".$pn.$par;
				echo "<a href='"."?".$enl."'>&gt</a>";	
				echo "</td>";
				echo "</tr>";
			
				echo "</table>";
			}
		
		}	
	
	
/*===============================================
fillGridArrNotPagedId
Descripcion     : Inserta etiqueta de <TABLE> en HTML sin el grid 
parametro       :
<-- $arr        : Contiene la informacion del resulset de una consulta a la BD ejemplo (executeReader)		
<-- $arrCol     : Contiele un arreglo con las columnas a mostrar en el fillGrid
<-- $arrWidth   : Define el ancho de cada columna del fillGrid enviado en un arregle
<-- $width      : Define el ancho del fillGrid	
<-- $pageNumber : Define la cantidad de paginas
<-- $bgcolor    : Define el color del background		
<-- $enl        : 
Detalles        : Muestra un fillGrid donde se envia informacion especifica para ser mostrada, con referencia al id pero sin paginacion   
srv: ALL ; Traida del 67
NOTA: En el caso de la variable $enl, aunque se pasa como parametro no es usado en la funcion
==================================================*/
		static function fillGridArrNotPagedId($arr, $arrCol,$arrWidth="",
				$width="700",$pageNumber="0",$bgcolor="",$enl="") {
					

			$nr = count($arr);
			$nc = count($arrCol);
			echo '<table class="italsis" width="'.$width.'" >';
			echo "  <tr> ";			

			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				if (isset($arrWidth[$i])) {
					echo "<th width='".$arrWidth[$i]."'>".$name."</th>";
				}
				else {
					echo "<th>".$name."</th>";
				}
				if (($i%10)==0) {
					flush();
				}
				
			}
			echo "</tr>";
			if (is_array($arr)) { // bring values
				for($i=0; $i < $nr; $i++) {
					if (($i%10)==0) {
						flush();
					}
					$color = "";
					if (isset($bgcolor[$i])) {
						$color = ' bgcolor="'.$bgcolor[$i].'"';
					}
					echo "  <tr > ";
					
					$reg = $arr[$i];
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if ($j == 0) {
							echo "<td><a href='?urloper=find&id=".$col."'>".$col."</a></td>";
						}
						else {
							if (isset($arrWidth[$j])) {
					 			echo "<td".$color." width='".$arrWidth[$i]."'>".$col."</td>";
							}
							else {
								echo "<td".$color.">".$col."</td>";
							
							}
						}
						$j++;
					
					}
					echo '</tr>';
					
				
				}
			}
			else {
				$end=1;
			}		
			echo "</table>";

		}


/*===============================================
buildHeaderSistSimadi
Descripcion     : Funcion de mostrar un logo
parametro       : Sin Parametros
Detalles        : Muestra un logo ya predeterminado en la funcion   
srv: Traida de Web
==================================================*/
	static function buildHeaderSistSimadi() {
			//<!-- Header -->
			echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
			//<!-- Top Section -->
			echo '<DIV class="container">';
			echo '<DIV class="row">';
			echo '<DIV class="col-md-12">';
			//<!-- Main Menu -->
			echo '<NAV class="navbar navbar-default header-4" role="navigation">';
			//<!-- Brand and toggle get grouped for better mobile display -->
			echo '<DIV class="navbar-header">';
			//echo '<A href="#"><img class="logo" src="images/oi.png" alt="Organizacion Italcambio" title="Organizacion Italcambio"></a>';
			//echo '<A href="#"><img class="logo" src="images/mg_logo.png" alt="MoneyGram" title="MoneyGram"></a>';
			echo '<A href="#"><img class="logo" src="../../../images/headersimadi.jpg" alt="Organizacion Italcambio -- MoneyGram" title="Organizacion Italcambio -- MoneyGram"></a>';
		
			echo '</DIV>';
			echo '</NAV>';
			echo '</DIV>';
			echo '</DIV>';
			echo '</DIV>';
			echo '</HEADER>';
		}


/*===============================================
buildHeaderItalviajes
Descripcion     : Funcion de mostrar un logo
parametro       : Sin Parametros
Detalles        : Muestra un logo ya predeterminado en la funcion   
srv: Traida de Web
==================================================*/
		static function buildHeaderItalviajes() {
			//<!-- Header -->
			echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
			//<!-- Top Section -->
			echo '<DIV class="container">';
			echo '<DIV class="row">';
			echo '<DIV class="col-md-12">';
			//<!-- Main Menu -->
			echo '<NAV class="navbar navbar-default header-4" role="navigation">';
			//<!-- Brand and toggle get grouped for better mobile display -->
			echo '<DIV class="navbar-header">';
			//echo '<A href="#"><img class="logo" src="images/oi.png" alt="Organizacion Italcambio" title="Organizacion Italcambio"></a>';
			//echo '<A href="#"><img class="logo" src="images/mg_logo.png" alt="MoneyGram" title="MoneyGram"></a>';
			echo '<A href="#"><img class="logo" width="55%" height="8%" src="images/headeritalviajes.jpg" alt="Italviajes" title="Italviajes"></a>';
			echo '<br>';
			echo '<br>';
			echo '<br>';
			echo '</DIV>';
			echo '</NAV>';
			echo '</DIV>';
			echo '</DIV>';
			echo '</DIV>';
			echo '</HEADER>';
		}	
	

/*===============================================
buildHeaderSistItalviajes
Descripcion     : Funcion de mostrar un logo
parametro       : Sin Parametros
Detalles        : Muestra un logo ya predeterminado en la funcion   
srv: Traida de Web
==================================================*/	
	    static function buildHeaderSistItalviajes() {
			//<!-- Header -->
			echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
			//<!-- Top Section -->
			echo '<DIV class="container">';
			echo '<DIV class="row">';
			echo '<DIV class="col-md-12">';
			//<!-- Main Menu -->
			echo '<NAV class="navbar navbar-default header-4" role="navigation">';
			//<!-- Brand and toggle get grouped for better mobile display -->
			echo '<DIV class="navbar-header">';
			//echo '<A href="#"><img class="logo" src="images/oi.png" alt="Organizacion Italcambio" title="Organizacion Italcambio"></a>';
			//echo '<A href="#"><img class="logo" src="images/mg_logo.png" alt="MoneyGram" title="MoneyGram"></a>';
			echo '<A href="#"><img class="logo" width="55%" height="8%" src="../../../images/headeritalviajes.jpg" alt="Italviajes" title="Italviajes"></a>';
			echo '<br>';
			echo '<br>';
			echo '<br>';
			echo '</DIV>';
			echo '</NAV>';
			echo '</DIV>';
			echo '</DIV>';
			echo '</DIV>';
			echo '</HEADER>';
		}
	
	
/*===============================================
buildImgFonSimadi
Descripcion     : Funcion de mostrar un logo de imagen simadi
parametro       : Sin Parametros
Detalles        : Muestra un logo ya predeterminado en la funcion   
srv: Traida de Web
==================================================*/	
		static function buildImgFonSimadi() {
			echo  '<div align="center">';
			
			echo '<TABLE bgcolor="#D2E9FF">';
			echo '<TR bgcolor="#D2E9FF">';
			echo '<TD bgcolor="#D2E9FF">';
			
			echo '<A href="#"><img src="../../../images/fondosimadi.jpg" alt="Simadi" title="Fondo" height="500" width="660"></a>';
	
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			echo '</div>';
	
		}

		
/*===============================================
buildImgFonHotels
Descripcion     : Funcion de mostrar un logo de imagen simadi
parametro       : Sin Parametros
Detalles        : Muestra un logo ya predeterminado en la funcion   
srv: Traida de Web
==================================================*/
		static function buildImgFonHotels() {
			echo  '<div align="center">';
		
			echo '<TABLE bgcolor="#D2E9FF">';
			echo '<TR bgcolor="#D2E9FF">';
			echo '<TD bgcolor="#D2E9FF">';
		
			echo '<A href="#"><img src="../../../images/imagenfondohotels.jpg" alt="Simadi" title="Fondo" height="620" width="850"></a>';
		
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			echo '</div>';
		
		}


/*===============================================
buildImgFonEvaluations
Descripcion     : Funcion de mostrar un logo de imagen simadi
parametro       : Sin Parametros
Detalles        : Muestra una imagen de simadi en una tabla   
srv: Traida de Web
==================================================*/		
		static function buildImgFonEvaluations() {
			echo  '<div align="center">';
			
			echo '<TABLE bgcolor="#D2E9FF">';
			echo '<TR bgcolor="#D2E9FF">';
			echo '<TD bgcolor="#D2E9FF">';
			
			echo '<A href="#"><img src="../../../images/imagenfondoeva.jpg" alt="Simadi" title="Fondo" height="500" width="660"></a>';
	
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			echo '</div>';
	
		}


/*===============================================
buildImgFonEvent
Descripcion     : Funcion de mostrar un logo de imagen simadi
parametro       : Sin Parametros
Detalles        : Muestra una imagen de simadi en una tabla   
srv: Traida de Web
==================================================*/			
		static function buildImgFonEvent() {
			echo  '<div align="center">';
		
			echo '<TABLE bgcolor="#D2E9FF">';
			echo '<TR bgcolor="#D2E9FF">';
			echo '<TD bgcolor="#D2E9FF">';
		
			echo '<A href="#"><img src="../../../images/imagenfondoeven.jpg" alt="Simadi" title="Fondo" height="500" width="660"></a>';
		
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			echo '</div>';
		
		}


/*===============================================
buildImgFon
Descripcion     : Funcion de mostrar un logo de imagen de fondo simadi
parametro       : Sin Parametros
Detalles        : Muestra una imagen de simadi en una tabla   
srv: Traida de Web
==================================================*/	
		static function buildImgFon() {
			echo  '<div align="center">';
				
			echo '<TABLE bgcolor="#D2E9FF">';
			echo '<TR bgcolor="#D2E9FF">';
			echo '<TD bgcolor="#D2E9FF">';
				
			echo '<A href="#"><img src="../../../images/pantallaazul.jpg" alt="Simadi" title="Fondo" height="500" width="660"></a>';
		
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			echo '</div>';
		
		}
		
		
/*===============================================
buildCheckMultiple2Html
Descripcion  : Checkbox Multiples 
parametro    :
<-- $title   : Titulo del Checkbox Multiples 		
<-- $val     : Valor a mover 
<-- $event   : Hace referencia a un evento submit()
Detalles     : Funcion usada en Auditoria Calidad
Ubicaci�n: Traida de web
NOTA: Hay que corregir name y value, falta una linea en la segunda columna y
      hay que terminar cada linea con </font></input> para que salga bien.
==================================================*/
		static function buildCheckMultiple2Html($title,$val,$event="") {
			presentationLayer::buildInitColumn3();
			echo '<input type="checkbox" name="check_list[1]" alt="Checkbox" value="10,"><font COLOR="#000000">10';
			echo '<input type="checkbox" name="check_list[2]" alt="Checkbox" value="10.1,"><font COLOR="#000000">10.1';
			echo '<input type="checkbox" name="check_list[3]" alt="Checkbox" value="10.2,"><font COLOR="#000000">10.2';
			echo '<input type="checkbox" name="check_list[4]" alt="Checkbox" value="10.3,"><font COLOR="#000000">10.3';
			echo '<input type="checkbox" name="check_list[5]" alt="Checkbox" value="4,"><font COLOR="#000000">4';
			echo '<input type="checkbox" name="check_list[6]" alt="Checkbox" value="4.1,"><font COLOR="#000000">4.1';
			echo '<input type="checkbox" name="check_list[7]" alt="Checkbox" value="4.2,"><font COLOR="#000000">4.2';
			echo '<input type="checkbox" name="check_list[8]" alt="Checkbox" value="4.3,"><font COLOR="#000000">4.3';
			echo '<input type="checkbox" name="check_list[9]" alt="Checkbox" value="4.4,"><font COLOR="#000000">4.4';
			echo '<input type="checkbox" name="check_list[10]" alt="Checkbox" value="5,"><font COLOR="#000000">5';
			echo '<input type="checkbox" name="check_list[11]" alt="Checkbox" value="5.1,"><font COLOR="#000000">5.1';
			echo '<input type="checkbox" name="check_list[12]" alt="Checkbox" value="5.1.1,"><font COLOR="#000000">5.1.1';
			echo '<input type="checkbox" name="check_list[13]" alt="Checkbox" value="5.1.2,"><font COLOR="#000000">5.1.2';
			echo '<input type="checkbox" name="check_list[14]" alt="Checkbox" value="5.2,"><font COLOR="#000000">5.2';
			echo '<input type="checkbox" name="check_list[15]" alt="Checkbox" value="5.2.1,"><font COLOR="#000000">5.2.1';
			echo '<input type="checkbox" name="check_list[16]" alt="Checkbox" value="5.2.2,"><font COLOR="#000000">5.2.2';
			echo '<input type="checkbox" name="check_list[17]" alt="Checkbox" value="5.3,"><font COLOR="#000000">5.3';
			echo '<input type="checkbox" name="check_list[18]" alt="Checkbox" value="6,"><font COLOR="#000000">6';
			echo '<input type="checkbox" name="check_list[19]" alt="Checkbox" value="6.1,"><font COLOR="#000000">6.1';
			echo '<input type="checkbox" name="check_list[20]" alt="Checkbox" value="6.2,"><font COLOR="#000000">6.2';
			echo '<input type="checkbox" name="check_list[21]" alt="Checkbox" value="6.3,"><font COLOR="#000000">6.3';
			echo '<input type="checkbox" name="check_list[22]" alt="Checkbox" value="7,"><font COLOR="#000000">7';
			echo '<input type="checkbox" name="check_list[23]" alt="Checkbox" value="7.1,"><font COLOR="#000000">7.1';
			echo '<input type="checkbox" name="check_list[24]" alt="Checkbox" value="7.1.1,"><font COLOR="#000000">7.1.1';
			presentationLayer::buildEndColumn();
			presentationLayer::buildInitColumn3();
			
			echo '<input type="checkbox" name="check_list[26]" alt="Checkbox" value="7.1.3,"><font COLOR="#000000">7.1.3';
			echo '<input type="checkbox" name="check_list[27]" alt="Checkbox" value="7.1.4,"><font COLOR="#000000">7.1.4';
			echo '<input type="checkbox" name="check_list[28]" alt="Checkbox" value="7.1.5,"><font COLOR="#000000">7.1.5';
			echo '<input type="checkbox" name="check_list[29]" alt="Checkbox" value="7.1.6,"><font COLOR="#000000">7.1.6';
			echo '<input type="checkbox" name="check_list[30]" alt="Checkbox" value="7.2,"><font COLOR="#000000">7.2';
			echo '<input type="checkbox" name="check_list[31]" alt="Checkbox" value="7.3,"><font COLOR="#000000">7.3';
			echo '<input type="checkbox" name="check_list[32]" alt="Checkbox" value="7.4,"><font COLOR="#000000">7.4';
			echo '<input type="checkbox" name="check_list[33]" alt="Checkbox" value="7.5,"><font COLOR="#000000">7.5';
			echo '<input type="checkbox" name="check_list[34]" alt="Checkbox" value="7.5.1,"><font COLOR="#000000">7.5.1';
			echo '<input type="checkbox" name="check_list[35]" alt="Checkbox" value="7.5.2,"><font COLOR="#000000">7.5.2';
			echo '<input type="checkbox" name="check_list[36]" alt="Checkbox" value="7.5.3,"><font COLOR="#000000">7.5.3';
			echo '<input type="checkbox" name="check_list[37]" alt="Checkbox" value="8,"><font COLOR="#000000">8';
			echo '<input type="checkbox" name="check_list[38]" alt="Checkbox" value="8.1,"><font COLOR="#000000">8.1';
			echo '<input type="checkbox" name="check_list[39]" alt="Checkbox" value="8.2,"><font COLOR="#000000">8.2';
			echo '<input type="checkbox" name="check_list[40]" alt="Checkbox" value="8.2.1,"><font COLOR="#000000">8.2.1';
			echo '<input type="checkbox" name="check_list[41]" alt="Checkbox" value="8.2.2,"><font COLOR="#000000">8.2.2';
			echo '<input type="checkbox" name="check_list[42]" alt="Checkbox" value="8.2.3,"><font COLOR="#000000">8.2.3';
			echo '<input type="checkbox" name="check_list[43]" alt="Checkbox" value="8.2.4,"><font COLOR="#000000">8.2.4';
			echo '<input type="checkbox" name="check_list[44]" alt="Checkbox" value="8.3,"><font COLOR="#000000">8.3';
			echo '<input type="checkbox" name="check_list[45]" alt="Checkbox" value="8.3.1,"><font COLOR="#000000">8.3.1';
			echo '<input type="checkbox" name="check_list[46]" alt="Checkbox" value="8.3.2,"><font COLOR="#000000">8.3.2';
			echo '<input type="checkbox" name="check_list[47]" alt="Checkbox" value="8.3.3,"><font COLOR="#000000">8.3.3';
			echo '<input type="checkbox" name="check_list[48]" alt="Checkbox" value="8.3.4,"><font COLOR="#000000">8.3.4';
			presentationLayer::buildEndColumn();
			presentationLayer::buildInitColumn3();
			
			echo '<input type="checkbox" name="check_list[50]" alt="Checkbox" value="8.3.6,"><font COLOR="#000000">8.3.6';
			echo '<input type="checkbox" name="check_list[51]" alt="Checkbox" value="8.4,"><font COLOR="#000000">8.4';
			echo '<input type="checkbox" name="check_list[52]" alt="Checkbox" value="8.4.1,"><font COLOR="#000000">8.4.1';
			echo '<input type="checkbox" name="check_list[53]" alt="Checkbox" value="8.4.2,"><font COLOR="#000000">8.4.2';
			echo '<input type="checkbox" name="check_list[54]" alt="Checkbox" value="8.4.3,"><font COLOR="#000000">8.4.3';
			echo '<input type="checkbox" name="check_list[55]" alt="Checkbox" value="8.5,"><font COLOR="#000000">8.5';
			echo '<input type="checkbox" name="check_list[56]" alt="Checkbox" value="8.5.1,"><font COLOR="#000000">8.5.1';
			echo '<input type="checkbox" name="check_list[57]" alt="Checkbox" value="8.5.2,"><font COLOR="#000000">8.5.2';
			echo '<input type="checkbox" name="check_list[58]" alt="Checkbox" value="8.5.3,"><font COLOR="#000000">8.5.3';
			echo '<input type="checkbox" name="check_list[59]" alt="Checkbox" value="8.5.4,"><font COLOR="#000000">8.5.4';
			echo '<input type="checkbox" name="check_list[60]" alt="Checkbox" value="8.5.5,"><font COLOR="#000000">8.5.5';
			echo '<input type="checkbox" name="check_list[61]" alt="Checkbox" value="8.5.6,"><font COLOR="#000000">8.5.6';
			echo '<input type="checkbox" name="check_list[62]" alt="Checkbox" value="8.6,"><font COLOR="#000000">8.6';
			echo '<input type="checkbox" name="check_list[63]" alt="Checkbox" value="8.7,"><font COLOR="#000000">8.7';
			echo '<input type="checkbox" name="check_list[64]" alt="Checkbox" value="9,"><font COLOR="#000000">9';
			echo '<input type="checkbox" name="check_list[65]" alt="Checkbox" value="9.1,"><font COLOR="#000000">9.1';
			echo '<input type="checkbox" name="check_list[66]" alt="Checkbox" value="9.1.1,"><font COLOR="#000000">9.1.1';
			echo '<input type="checkbox" name="check_list[67]" alt="Checkbox" value="9.1.2,"><font COLOR="#000000">9.1.2';
			echo '<input type="checkbox" name="check_list[68]" alt="Checkbox" value="9.1.3,"><font COLOR="#000000">9.1.3';
			echo '<input type="checkbox" name="check_list[69]" alt="Checkbox" value="9.2,"><font COLOR="#000000">9.2';
			echo '<input type="checkbox" name="check_list[70]" alt="Checkbox" value="9.3,"><font COLOR="#000000">9.3';
			echo '<input type="checkbox" name="check_list[71]" alt="Checkbox" value="9.3.1,"><font COLOR="#000000">9.3.1';
			echo '<input type="checkbox" name="check_list[72]" alt="Checkbox" value="9.3.2,"><font COLOR="#000000">9.3.2';
			echo '<input type="checkbox" name="check_list[73]" alt="Checkbox" value="9.3.3,"><font COLOR="#000000">9.3.3';
			presentationLayer::buildEndColumn();
		} //buildCheckHtml Mutilple


/*===============================================
buildCheckMultiple2Php
Descripcion  : Checkbox Multiples 
parametro    :
<-- $val     : Valor a mover 
<-- $event   : Hace referencia a un evento submit()
Detalles     : Funcion usada en Auditoria Calidad
Ubicaci�n: Traida de web
==================================================*/		
		static function buildCheckMultiple2Php($val,$event="") {
		
			if(!empty($_POST['check_list']))
			{
				foreach($_POST['check_list'] as $check) {
					//	echo $check; //echoes the value set in the HTML form for each checked checkbox.
					//so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
					//in your case, it would echo whatever $row['Report ID'] is equivalent to.
					$varstring = $varstring . $check;
				}
					
			}
				
			return $varstring;
		}

		
/*===============================================
buildIdInputHidden
Descripcion  : Funcion para ocultar el input id
parametro    :
<-- $val     : Valor a mover 
<-- $form    : Nombre de el form en la pagina
<-- $fLink   : Valor del string de busqueda
Detalles     : Funcion usada en Auditoria Calidad
Ubicaci�n: Traida de web
==================================================*/		
		static function buildIdInputHidden($val,$form,$fLink) {
			//echo '<LABEL>';
			//echo '<SPAN>Id :</SPAN>';
			echo '<INPUT name = "id"  type = "hidden" id="id" ';
			echo ' value = "'.$val.'" size="10" maxlength="10"';
			echo ' onBlur="changeAction('.$form.','."'".$fLink."'".')"';
			echo ' placeholder="Internal Id">';
			echo ' </INPUT>	';
			//echo ' </LABEL>';
		}


/*===============================================
buildInputDocumentid
Descripcion    : Funcion para el input del documentos de identificaci�n  
parametro      :
<-- $title     : Titulo de la etiqueta 
<-- $name      : Nombre de la variable de referencia en PHP 
<-- $id        : Nombre de la variable de referencia en javascript 
<-- $val       : Valor inicial 
<-- $maxlength : Establece el maximo de caracteres por defecto 50
<-- $readonly  : Etiqueta de solo lectura por defecto "" se puede modificar "readonly"
<-- $onblur    : Hace referencia a un evento en javascript
Detalles       : Funcion usada para documentos de identificaci�n 
Ubicaci�n: Traida de web
==================================================*/	
		static function buildInputDocumentid($title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
			 echo '<LABEL>';
			 echo '<SPAN>'.$title.' :</SPAN>';
			 if ($onblur != "")
			 	$onblur = ' onBlur="'.$onblur.'" ';
			 	echo '<INPUT '.$readonly.' name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'"  onsubmit="return validardocumentid()"';
			 	echo $onblur;
			 	echo 'maxlength="'.$maxlength.'" placeholder="V123456789, E123456789 o P123456789"></INPUT>';
			 	echo '</LABEL>';
			}
			
			
/*===============================================
buildInputFind
Descripcion    : Funcion para el input del documentos de identificaci�n  
parametro      :
<-- $title     : Titulo de la etiqueta 
<-- $name      : Nombre de la variable de referencia en PHP 
<-- $id        : Nombre de la variable de referencia en javascript 
<-- $val       : Valor inicial 
<-- $maxlength : Establece el maximo de caracteres por defecto 50
<-- $form    : Nombre de el form en la pagina
<-- $fLink   : Valor del string de busqueda
Detalles       : Funcion usada para documentos de identificaci�n 
Ubicaci�n: Traida de web
==================================================*/
		static function buildInputFind($title,$name,$id,$val,$maxlength="50",$form="",$fLink="") {
			echo '<LABEL>';
			echo '<SPAN>'.$title.' :</SPAN>';
			
			echo '<INPUT  name = "'.$name.'" type="text" id="'.$id.'" value = "'.$val.'" ';
			if($form !=""  && $fLink!="" )
				echo ' onBlur="changeAction('.$form.','."'".$fLink."'".')"';
			echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';
		}	
	
	
/*===============================================
buildFooterEsp
Descripcion    : Inserta etiqueta de <TABLE> en HTML con el grid 
parametro      :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new)
<-- $pn       : Numero de paginas
<-- $parname  : Nombre del parametro 
<-- $parvalue : Valor del parametro 
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'N'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'N'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'N'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'N'
Detalles      : Agregar imagenes de accion a ejecutar sin grid solo la imagen save por defecto 'Y'   
Detalles       : Funcion usada para documentos de identificaci�n 
Ubicaci�n: Traida de web
NOTA: Para que funcione hay que colocar showButtonsEsp en basePL.php o modificar a showButtons
==================================================*/
		static function buildFooterEsp($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE>';
			echo '<TR>';
			echo '<TD>';
			$pl->showButtonsEsp($save,$delete,$print,$clean,$find);
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			$bl->fillGrid($pn,$parname,$parvalue);
				
		}
		
		
/*===============================================
fillGridArrNoLink
Descripcion     : Inserta etiqueta de <TABLE> en HTML con un grid 
parametro       :
<-- $arr        : Contiene la informacion del resulset de una consulta a la BD ejemplo (executeReader)		
<-- $arrCol     : Contiele un arreglo con las columnas a mostrar en el fillGrid
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo 
<-- $pageSize   : Define la cantidad de registros a mostrar por pagina				
<-- $pageNumber : Define la cantidad de paginas
<-- $width      : Define el ancho del fillGrid			
<-- $check      : Define si se visualiza un cuadro check por registro
<-- $select     : Define si se visualiza la selecion por registro	 
Detalles        : Muestra un fillGrid donde se envia informacion especifica para ser mostrada, mediante arreglos definidos pero sin link   
Ubicaci�n: Traida de web
==================================================*/
		static function fillGridArrNoLink($arr, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {

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
						echo "<td>".$col."</td>";
						
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


/*===============================================
buildFooterDisplayNoGrid
Descripcion    : Inserta etiqueta de <TABLE> en HTML con el grid 
parametro      :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new)
<-- $pn       : Numero de paginas
<-- $parname  : Nombre del parametro 
<-- $parvalue : Valor del parametro 
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'N'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'N'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'N'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'N'
Detalles      : Agregar imagenes de accion a ejecutar sin grid se visualizan todas las imagenes por defecto 'Y'   
Ubicaci�n: Traida de web
NOTA: esta funcion junto con la buildFooterEsp, buildFooterDisplayNoButtons se podria unificar para sacar una sola
==================================================*/
        static function buildFooterDisplayNoGrid($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE class="italsis"';
			echo '<TR>';
			echo '<TD>';
			$pl->showButtons($save,$delete,$print,$clean,$find);
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
		}


/*===============================================
buildFooterDisplayNoButtons
Descripcion    : Inserta etiqueta de <TABLE> en HTML con el grid 
parametro      :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new)
<-- $pn       : Numero de paginas
<-- $parname  : Nombre del parametro 
<-- $parvalue : Valor del parametro 
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'N'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'N'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'N'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'N'
Detalles      : Agregar imagenes de accion a ejecutar sin grid se visualizan todas las imagenes por defecto 'Y'   
Ubicaci�n: Traida de web
NOTA: esta funcion junto con la buildFooterEsp, buildFooterDisplayNoGrid
      se podria unificar para sacar una sola
==================================================*/
		static function buildFooterDisplayNoButtons($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
		/*	echo '<TABLE class="italsis"';
			echo '<TR>';
			echo '<TD>';
			$pl->showButtons($save,$delete,$print,$clean,$find);
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';*/
			$bl->fillGridDisplay($pn,$parname,$parvalue);								
		}
		

/*===============================================
buildCheckEvaluation
Descripcion        : Inserta etiqueta de <TABLE> en HTML
parametro          :
<-- $name          : Nombre de la tabla, variable php
<-- $id	           : Variable de javascript
<-- $mod           : Objeto instancia de la class BL
<-- $foreignTable  : Nombre de la tabla en bd
<-- $curVal        : Valor a mostrar
<-- $restCol       : Valor por el cual esta retringido
<-- $foreignscheme : Nombre de scheme en bd		     
<-- $event         : Hace referencia a un evento en javascript  
<--$restVal        : Resultado de un valor recibido por el stored procedure  
Detalles           : Funciones Utilizadas por la App Evaluations
Ubicaci�n: Traida de web
NOTA: Falta la funcion fillForeignTableComboWithRestrictionEvaluation
      el su respectivo PL para hacer referencia. (No pudo ser evaluada) 
==================================================*/
		static function buildCheckEvaluation($name,$id,$mod,
		$foreignTable,$curVal,$restCol,$restVal,$foreignscheme="",$event="") {
			echo '<TABLE class="italsis">';
			echo '<TH>';
			echo 'Instrucciones:<br>La presente evaluaci&oacute;n tiene como objetivo medir las competencias
				de los empleados y tiene que completarse con la mayor veracidad. La responsabilidad de la aplicaci&oacute;n
				recae sobre el Gerente, Jefe o Coordinador inmediato del empleado. Cada competencia tiene 4 opciones de respuesta,
				seleccione una sola opci&oacute;n para cada una. Para ello, tiene que leer con detenimiento las cuatro opciones
				y marcar una sola.';
			echo '</TH>';
			echo '<TABLE class="italsis">';
			echo '<TH>';
			echo 'Nivel de dominio';
			echo '</TH>';
			$mod->fillForeignTableComboWithRestrictionEvaluation($foreignTable,$curVal,$restCol,$restVal,$foreignscheme);
			echo '</TABLE>';
			echo '</TABLE>';
				
		} //buildCheckEvaluation
		
		
/*===============================================
fillGridArrEvaluation
Descripcion     : Inserta etiqueta de <TABLE> en HTML con un grid 
parametro       :
<-- $arr        : Contiene la informacion del resulset de una consulta a la BD ejemplo (executeReader)		
Detalles        : Funcion que muestra el resultado de la evaluaci�n 
Ubicaci�n: Traida de web
==================================================*/
		static function fillGridArrEvaluation($arr) {
			$reg = $arr[0];
			
			echo '<TH>';
			$pos = strpos($reg["name"],')');
			echo substr($reg["name"],0,$pos+1).'<br>';
			
			switch ($reg["idskill"]) {
				case 1:
					echo 'Mostrar excelentes est&aacute;ndares de servicio, demostrados en la plena satisfacci&oacute;n del cliente interno y
      						externo. Disposici&oacute;n para realizar el trabajo con base en el conocimiento de las necesidades y
      						expectativas de los clientes internos y externos.';
					break;
				case 2:
					echo "Es demostrar un alto nivel de conocimiento de todos los procesos operativos, funcionales y de servicio de la compa&ntilde;&iacute;a.
      							 Consiste en conocer los productos, servicios y filiales de la empresa.";
					break;
				case 3:
					echo "Mostrar un claro inter&eacute;s por el logro de objetivos y culminar satisfactoriamente las tareas o
      							metas asignadas. Se impulsa constantemente a cumplir con las tareas hasta verlas finalizadas.
      							Implica contribuir al alcance de metas de grupo.";
					break;
				case 4:
					echo "Realizar un trabajo libre de errores, desempe&ntilde;ado el mismo con exactitud, claridad y confiablidad,
      							para dar cumplimiento a los requerimientos del mismo, seg&uacute;n el tiempo estipulado, las normas que lo rigen,
      							los criterios preestablecidos y los recursos disponibles. Demuestra un alto nivel de desempe&ntilde;o y una fuerte
      							 preocupaci&oacute;n por conseguir los objetivos a su cargo. Es estar orientado hacia la b&uacute;squeda de la excelencia
      							en la gesti&oacute;n que hace para la organizaci&oacute;n.";
					break;
				case 5:
					echo "Capacidad para orientar su comportamiento de acuerdo a la misi&oacute;n, visi&oacute;n, valores, normas y
      							objetivos de la organizaci&oacute;n. Es cumplir con las responsabilidades adquiridas.";
					break;
				case 6:
					echo "Modificar la propia conducta de acuerdo a los cambios que le demanda el entorno y enfrentarse con flexibilidad
      							a dichos cambios positiva y constructivamente.";
					break;
				case 7:
					echo "Es la capacidad de entender una tarea, identificando sus implicaciones paso a paso. Incluye el organizar las partes
      							de una situaci&oacute;n de forma sistem&aacute;tica, al realizar comparaciones entre diferentes elementos o aspectos y
      							el establecer prioridades de una forma racional. Es Hacer an&aacute;lisis complejos a partir de resultados de indicadores
      							de gesti&oacute;n. Implica Organizar, analizar y hacer seguimiento a programaciones de trabajo";
					break;
			}
			echo '</TH>';
			
			foreach($arr as $func) {
				echo '<TR>';
				echo '<TD>';
				echo '<SPAN>';
				echo '<INPUT type=radio class=idskilllevel  name=idskilllevel  id=idskilllevel  value='.$func["idskilllevel"].' />';
				echo '</SPAN>';
				echo '</TD>';
				echo '<TD>';
				echo $func["description"];
				echo '</TD>';
				echo '</TR>';
			}
			
			
		}


/*===============================================
buildSkillPosition
Descripcion: Validar datos personales
parametro : 
<-- $bl              : Objeto instancia de la class BL
<-- $siguiente     	 : Accion siguiente
<-- $code            : Codigo a evaluar
<-- $idpositionlevel : Parametro con valor a mostrar 
<-- $idarea          : Id de area a evaluar
<-- $idevaluated     : Id para evaluar    
Detalles : Busqueda y evalua si el funcionario existe, valida el nivel del cargo y el area
ubicaci�n : Traida de web
==================================================*/	
		static function buildSkillPosition($bl,$siguiente,$code,$idpositionlevel,$idarea,$idevaluated) {
			global $idskill;

			
			$search = $bl->executeReaderSkillPosition($code,$idevaluated);
			$conta = count($search);
			
			//if ($conta>1) {echo "existe";} else {echo "no existe";} ;
			
			
			 if (($conta>1) and ($siguiente==0)) {
				
				foreach ($search as $per) {
					$nombre = $per["name"];
					$date = $per["period"];
					break;
				}

				if (!empty($idevaluated)) {
				echo "<script>var answer=confirm('El empleado ".$nombre." ya fue evaluado para el periodo: ".$date." Desea continuar?')</script>";
				echo "<script>if(!answer) window.location='http://intranet.grupoitalcambio.int/web/intranet/index.asp'</script>";
				}
			}
				$resultado = $bl->executeReaderSkillPosition($code,$idevaluated="");
				$resultado = $bl->executeReaderSkillPosition($code="",$idevaluated="");
				
				$cont = count($resultado);
				global $aux;
				$acum = $aux;
				if ($siguiente<$cont){
					foreach ($resultado[$siguiente] as $col) {
					
						$siguiente=$col;
						$idskill=$siguiente;
						$aux++;
				
					}
						
				}else {
//echo 'Competencias especificas';
//var_dump($idpositionlevel);
//var_dump($idarea);
$idskill = $bl->executeReaderSkillSpecific($idpositionlevel,$idarea);
//var_dump($skill);
}
				
				if ($acum == 7){
				
				#	header('Location:http://intranet.grupoitalcambio.int/web/intranet/index.asp');
					echo "<script>var answer=confirm('Evaluaci�n completada. Muchas Gracias!')</script>";
					echo "<script>window.location='http://intranet.grupoitalcambio.int/web/intranet/index.asp'</script>";					
					//echo "<script>window.location='http://intranet.grupoitalcambio.int/web/intranet/competencia_estandar/ListaEmpleadosSupervisados.asp'</script>";
					
					exit;
				}
						
			
			
		}
		

/*===============================================
buildHidden
Descripcion: Etiqueta <INPUT> en HTML (type="hidden")
parametro : 
<-- $name :	Nombre de la etiqueta 			
<-- $id   : Variable de javascript			
<-- $val  : Valor a Mostrar
Detalles  : Input para validar type="hidden"
ubicaci�n : Traida de web
==================================================*/
		static function buildHidden($name,$id,$val) {
			echo '<INPUT  name = "'.$name.'" type="hidden" id="'.$id.'" value = "'.$val.'" ';
			echo '</INPUT>';
		}
		
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
ubicaci�n: Traida de web
==================================================*/			
static function fillGridArrPaginator($arr, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {
    
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
              echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
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

		
		
/*===============================================
buildFooterDisplayEsp
Descripcion    : Inserta etiqueta de <TABLE> en HTML con el grid 
parametro      :
<-- $pl       : Objeto instancia de la class PL referencia a ($pl = new basePL)
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new)
<-- $pn       : Numero de paginas
<-- $parname  : Nombre del parametro 
<-- $parvalue : Valor del parametro 
<-- $save     : Establece si visualiza la imagen para la accion de guardar por defecto 'Y'
<-- $delete   : Establece si visualiza la imagen para la accion de eliminar por defecto 'N'
<-- $print    : Establece si visualiza la imagen para la accion de imprimir por defecto 'N'
<-- $clean    : Establece si visualiza la imagen para la accion de limpiar por defecto 'N'
<-- $find     : Establece si visualiza la imagen para la accion de buscar por defecto 'N'
Detalles      : Agregar imagenes de accion a ejecutar con grid solo la imagen todos por defecto 'Y'   
Ubicaci�n: Traida de web
NOTA: Para que funcione hay que colocar showButtonsEsp en basePL.php o modificar a showButtons
==================================================*/
        static function buildFooterDisplayEsp($pl,$bl,$pn=0,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE class="italsis"';
			echo '<TR>';
			echo '<TD>';
			$pl->showButtonsEsp($save,$delete,$print,$clean,$find);
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			$bl->fillGridDisplay($pn,$parname,$parvalue);
		}

	
/*===============================================
buildSelectHotels
Descripcion: Etiqueta HTML <SELECT>
parametro :
<-- $title         : Titulo del select 
<-- $mod           : Objeto instancia de la class BL
<-- $name          : Nombre de la tabla, variable php
<-- $curVal        : Valor a mostrar
<-- $id	           : Variable de javascript 
<-- $foreignscheme : Nombre de scheme en bd
<-- $foreignTable  : Nombre de la tabla en bd	       
<-- $disabled      : Valor por el cual esta retringido       		     
<-- $event         : Hace referencia a un evento en javascript  
Detalles: Funcion Utilizada por el Sistema de Hoteleria
ubicaci�n: Traida de web
==================================================*/	
		static function buildSelectHotels($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="") {
			echo '<LABEL>';
        		echo '<SPAN>'.$title.' :</SPAN>';
			if ($event != "") {
				$event = 'onchange="'.$event.'"';
			}
			echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' >';
			$mod->fillForeignTableComboHotels($foreignTable,$curVal,$foreignscheme);
			echo '</SELECT>';
			echo '</LABEL>';
		}

	
/*===============================================
buildFooterDisplayHotel
Descripcion: etiqueta html <TABLE> y  muestra informacion 
parametro : 
<-- $pl :   objeto instancia de la class pl
<-- $bl: objeto instancia de la class BL
<-- $pn	: numero de pagina 
<-- $parname : Nombre del parametro
<-- $parvalue   :  parametro con valor a mostrar 
<-- $save: establece si visualiza el boton guardar
<-- $delete: establece si visualiza el boton eliminar
<-- $print: establece si visualiza el boton imprimir   
<-- $clean : establece si visualiza el boton limpiar 
<-- $find establece si visualiza el boton buscar
<-- $hotel : Parametro de hoteles a mostrar
Detalles: Agregar botones, muestra un grid de informacion y paginacion
ubicaci�n: Traida de web
NOTA: Para que funcione hay que colocar fillGridDisplayHotelsBI en baseBL.php 
==================================================*/
		static function buildFooterDisplayHotel($pl,$bl,$pn=0,$hotel,$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
			echo '<TABLE class="italsis"';
			echo '<TR>';
			echo '<TD>';
			$pl->showButtons($save,$delete,$print,$clean,$find);
			echo '</TD>';
			echo '</TR>';
			echo '</TABLE>';
			$bl->fillGridDisplayHotelsBI($pn,$parname,$parvalue,$hotel);
		}

			
/*===============================================
fillGridArrHotels
Descripcion : funcion de mostrar arreglos en hoteleria
parametro : 
<-- $funcform   : Funci�n a formar 
<-- $arr        : Contiene un array de bd                  
<-- $arrCol     : Contiene un arreglo 
<-- $width      : Define el ancho
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo   
<-- $pageSize   : Define la cantidad de registros  a mostrar por pagina
<-- $pageNumber : Define la cantidad de paginas     
<-- $check      : Define si se visualiza un cuadro check por registro		
<-- $select     : Define si se visualiza la selecion por registro	
Detalles: Muestra un grid  basado en un arreglo para hoteleria
ubicaci�n: Traida de web
==================================================*/	
		static function fillGridArrHotels($funcform,$arr, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {
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
			    $arrCol[]="";
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
						if ($j == 1) {
							echo "<td><a href='?".$funcform."&urloper=find&pn=".$pageNumber."&id=".$arr[$i]['did']."'>".$col."</a></td>";
						}
						elseif($j <> 0){
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
		

/*===============================================
fillGridArrHotels
Descripcion: Funcion de mostrar arreglos en hoteleria
parametro : 
<-- $arr        : Contiene un array de bd                  
<-- $arrCol     : Contiene un arreglo 
<-- $width      : Define el ancho
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo   
<-- $pageSize   : Define la cantidad de registros  a mostrar por pagina
<-- $pageNumber : Define la cantidad de paginas     
<-- $check      : Define si se visualiza un cuadro check por registro		
<-- $select     : Define si se visualiza la selecion por registro	
Detalles: Muestra un grid  basado en un arreglo para hoteleria
ubicaci�n: Traida de web
==================================================*/
		static function fillGridArrPaginatorHotels($arr, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {
		
			//echo "cambiamos todo";
			$nr = count($arr);
			//echo $nr;
			//print $arr;
			//$nc = count($arrCol);
			//$pnc = $pageNumber;
			echo '<div class="dt-example">';
			echo '<div class="container">';
			echo '<section>';
			echo '<table id="example" class="display" width="50%" data-page-length="10" data-order="[[ 0, &quot;asc&quot; ]]">';
			//$pnc = $pageNumber;
			echo '<thead>';
			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				echo "<th>".$name."</th>";
					
			}
		//	echo '<button onclick="window.location.href=../../datatables/fpdf/reportes.php" >FPDF</button>';
			echo '	</thead>';
		
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
							echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
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
		
			echo '</div>';
			echo '</section>';
			echo '</div>';
		
		}

//NUEVAS POR Agregar
/*===============================================
fillGridArrChecksMultiple
Descripcion: Funcion de mostrar arreglos en hoteleria
parametro : 
<-- $arr        : Contiene un array de bd                  
<-- $arrCol     : Contiene un arreglo 
<-- $width      : Define el ancho
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo   
<-- $pageSize   : Define la cantidad de registros  a mostrar por pagina
<-- $pageNumber : Define la cantidad de paginas     
<-- $check      : Define si se visualiza un cuadro check por registro		
<-- $select     : Define si se visualiza la selecion por registro	
Detalles: Muestra un grid  basado en un arreglo para hoteleria
ubicaci�n: Traida de web
==================================================*/
		 static function fillGridArrChecksMultiple($arr, $arrCol,$par="",$pageSize=10,$pageNumber=0,$width=900,$check="0",$select="0") {
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
		
						echo '<td><input type="checkbox"  name ="'.$name.'"id = "'.$id['id'].'"></td>';
					}
		
					if ($select) {
						$name = "CB".$i;
						$id = "CB".$i;
		
						echo '<td><input type="radio" onclick="submit()" name ="'.$name.'"id = "'.$id['id'].'"></td>';
					}
		
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if ($j == 0) {
							echo "<td><a href='?urloper=find&pn=".$pageNumber."&id=".$col."'>".$col."</a></td>";
							//echo "<td><input type= 'checkbox' name =".$name." id = ".$id['id']."selected ></td>";
								
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

//////////////// Ajax 20-01-2016////////////////
/*===============================================
buildFooterAJAX
Descripcion: Muestra los botones de accion para llamar a la funcion AJAX y el Grid con los
             registros de la base de datos tambien con un enlace para llamar a la funcion AJAX
			 en la columna "id" para la consulta de los datos de un registro
parametro : 
<-- $pl       : objeto instancia de la class pl                  
<-- $bl       : objeto instancia de la class BL
<-- $pn       : numero de pagina
<-- $ajaxUrl  : Contiene un URL    
<-- $parname  : Define un parametro
<-- $parvalue : Define un valor del parametro
<-- $save     : Establece si visualiza el boton guardar por defecto 'Y'
<-- $delete   : Establece si visualiza el boton eliminar por defecto 'Y'
<-- $print    : Establece si visualiza el boton imprimir por defecto 'Y'  
<-- $clean    : Establece si visualiza el boton limpiar por defecto 'Y'
<-- $find     : Establece si visualiza el boton buscar por defecto 'Y'
Detalles: Muestra un grid  basado en una consulta a la BD 
ubicaci�n: Traida de web
==================================================*/		
		static function buildFooterAJAX($pl,$bl,$pn=0,$ajaxUrl="",$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
		
			echo '
				<script src="../../../js/ajax.js"></script>
				<table class="italsis">
					<tr>
						<td>';
			// Metodo para mostrar los botones de acci?n
			$pl->showButtonsAJAX($save,$delete,$print,$clean,$find, $ajaxUrl);
			echo '
						</td>
					</tr>
				</table>
				<div id="grid">';
			// Metodo para mostrar el Grid con los registros de la Base de datos
			echo $bl->fillGridAJAX($pn,$parname,$parvalue,$ajaxUrl);
			echo '
				</div>';
		}
		
		
/*===============================================
buildFooterDisplayAJAX
Descripcion: Muestra los botones de accion para llamar a la funcion AJAX y el Grid con los
             registros de la base de datos con la funcion AJAX en la columna "id" para la
			 consulta de los datos de un registro. LLama al Grid modo Display
parametro : 
<-- $pl       : objeto instancia de la class pl                  
<-- $bl       : objeto instancia de la class BL
<-- $pn       : numero de pagina
<-- $ajaxUrl  : Contiene un URL    
<-- $parname  : Define un parametro
<-- $parvalue : Define un valor del parametro
<-- $save     : Establece si visualiza el boton guardar por defecto 'Y'
<-- $delete   : Establece si visualiza el boton eliminar por defecto 'Y'
<-- $print    : Establece si visualiza el boton imprimir por defecto 'Y'  
<-- $clean    : Establece si visualiza el boton limpiar por defecto 'Y'
<-- $find     : Establece si visualiza el boton buscar por defecto 'Y'
Detalles: Muestra un grid  basado en una consulta a la BD 
ubicaci�n: Traida de web
==================================================*/		
		static function buildFooterDisplayAJAX($pl,$bl,$pn=0,$ajaxUrl="",$parname="",$parvalue="",$save="Y",$delete="Y",$print="Y",$clean="Y",$find="Y") {
		
			echo '
				<script src="../../../js/ajax.js"></script>
				<table class="italsis">
					<tr>
						<td>';
			// Metodo para mostrar los botones de acci?n
			$pl->showButtonsAJAX($save,$delete,$print,$clean,$find, $ajaxUrl);
			echo '
						</td>
					</tr>
				</table>
				<div id="grid">';
			// Metodo para mostrar el Grid con los registros de la Base de datos
			echo $bl->fillGridDisplayAJAX($pn,$parname,$parvalue,$ajaxUrl);
			echo '
				</div>';
		}


/*===============================================
fillGridArrAJAX
Descripcion: Metodo para mostrar el Grid con un evento onclick en la columna "id" para la funcion
             AJAX con la cual se obtiene una consulta de los datos de un registro
parametro : 
<-- $arr        : Contiene un array con los datos obtenidos de la consulta en "dataLayer"                
<-- $arrCol     : Contiene un arreglo con los titulos de las columnas del Grid
<-- $par        : Parametro que depende de otra funcion para hacer referencia a otro campo   
<-- $pageSize   : Define la cantidad de registros  a mostrar por pagina
<-- $pageNumber : Define la cantidad de paginas 
<-- $ajaxUrl    : Contiene un URL    
<-- $width      : Define el ancho    
<-- $check      : Define si se visualiza un cuadro check por registro		
<-- $select     : Define si se visualiza la selecion por registro	
Detalles: Muestra un grid  basado en una consulta a la BD 
ubicaci�n: Traida de web
==================================================*/		
		static function fillGridArrAJAX($arr, $arrCol,$par="",$pageSize=10,$pageNumber=0, $ajaxUrl="",$width=900,$check="0",$select="0") {
		
			$nr = count($arr);
			$nc = count($arrCol);
			$gridAjax = '';
		
			$gridAjax .= '
				<table class="italsis" width="'.$width.'" >
					<tr>';
		
			$pnc = $pageNumber;
		
			if ($check) {
				$gridAjax .= '
					<th>Procesar</th>';
			}
		
			if ($select) {
				$gridAjax .= '
					<th>Seleccionar</th>';
			}
		
			for($i=0; $i < $nc; $i++) {
				$name = $arrCol[$i];
				$gridAjax .= '
					<th>'.$name.'</th>';
			}
		
			$end = 0;
		
			$gridAjax .= '
				</tr>';
		
			if (is_array($arr)) { // bring values
				for($i=0; $i < $nr; $i++) {
					$gridAjax .= '
						<tr>';
		
					$reg = $arr[$i];
					if ($check) {
						$name = 'CH'.$i;
						$id = 'CH'.$i;
		
						$gridAjax .= '
							<td><input type="checkbox" name ="'.$name.'"id = "'.$id.'"></td>';
					}
		
					if ($select) {
						$name = 'CB'.$i;
						$id = 'CB'.$i;
		
						$gridAjax .= '
							<td><input type="radio" onclick="submit()" name ="'.$name.'"id = "'.$id.'"></td>';
					}
		
					$j = 0; // assummes id, first column
					foreach ($reg as $col) {
						if ($j == 0) {
							$action = "'find'";
							$url = "'".$ajaxUrl."'";
							$gridAjax .= '
								<td><a href="#" onclick="getUserAction('.$action.', '.$url.', '.$col.');">'.$col.'</a></td>';
						}
						else {
							$gridAjax .= '
					 			<td>'.$col.'</td>';
						}
						$j++;
					}
					$gridAjax .= '
						</tr>';
				}
				if ($nr < $pageSize) { // added on 05/30/2015
					$end = 1;
				}
			}
			else {
				$end=1;
			}
		
			$gridAjax .= '
				</table>';
		
			if (!$select) {
				$gridAjax .= '
					<table class="italsis">
						<tr>
							<td>';
		
				$pn = $pnc-1;
		
				if ($pn < 0)
					$pn = 0;
		
					$enl="pn=".$pn.$par;
		
					$gridAjax .= '
					<a href="'.'?'.$enl.'">&lt</a>
						</td>
						<td>';
		
					if ($end)
						$pn = 0; // was $pnc
						else
							$pn = $pnc+1;
		
							$enl="pn=".$pn.$par;
		
							$gridAjax .= '
								<a href="'.'?'.$enl.'">&gt</a>
							</td>
						</tr>
					</table>
					<input type="hidden" id="pagenumber" value="'.$pnc.'">';
			}
		
			return $gridAjax;
		}
 
//                funciones de tab para el detail view
                
/*===============================================
initTab
Descripcion: Genera un tag HTML <div> con el id "tabs"
parametro : 
Detalles: Incluye tambi�n un archivo JS para la manipulaci�n de jquery y los tabs "../../../js/buildDetail.js"
srv: ALL
==================================================*/		
        static function initTab(){
            echo '<SCRIPT language="javascript" src="../../../js/buildDetail.js" type="text/javascript"></SCRIPT>';
            echo '<div id="tabs">';
        }

	
/*===============================================
endTab
Descripcion : Genera un tag HTML </div> para cerrar el div del tab
parametro : 
Detalles: Genera solo una etiqueta para cerrar un div
srv: ALL
==================================================*/  
        static function endTab(){
            echo ' </div>';
        }

		
/*===============================================
buildMD
Descripcion : Genera un tag HTML <ul> con divisiones <div> para simular carpetas
parametro : 
<-- $bl         : Objeto instancia de la class BL            
<-- $scheme     : Nombre del esquema en el manejador de base de datos
<-- $array      : Contiene un array con los nombres de las tablas del esquema que seran mostrados sus PL                
<-- $titlearray : Contiene un array con los titulos que seran mostrados en cada pesta�a
Detalles: Genera un tag HTML <ul> para visualizar los PL en los tag <ul>
srv: ALL
==================================================*/  
        //static function buildMD($bl, $scheme, $array, $titlearray){
        static function buildMD($scheme, $array, $titlearray){
            $cant_options = count($array);
            $x = $j = $h = 0;
            echo '<ul>';
            while($x < $cant_options){
                echo '<li><a href="#tabs-'.$x.'">'.$titlearray[$x].'</a></li>';
                $x++;
            }
            $x = 0;
            echo '</ul>';
                        
            for ($x = 0; $x <= $cant_options; $x++){
                echo '<div id="tabs-'.$x.'">';
                require_once($_SERVER["DOCUMENT_ROOT"]. "/framework/modules/masters/".$scheme."/".$array[$x]."PL.php");
                echo '</div>';   
            }
        }                    
                    
//               fin de funciones del detail view2
                    
                    
/*===============================================
buildHeaderITALPORTAL
Descripcion: Dibuja el heder en el Italportal
parametro : 
Detalles: Dibuja el heder en el Italportal tomando imagen fija /italsis/images/italportal.png
ubicaci�n: Traida de web
==================================================*/                    
static function buildHeaderITALPORTAL($img="indexPortal",$alt="Organizacion Italcambio") {
			//<!-- Header -->
      echo '<HEADER id="mukam-header" class="mukam-header header mukam-header-large header-4 fadein scaleInv anim_1">';
  		echo '<center>';
      echo '<A href="#"><img class="logo" src="'.PATH.'images/'.$img.'.png" alt="'.$alt.'" title="Organizacion Italcambio"></a>';
      echo '</HEADER>';
		}
 

/*===============================================
buildImgITALPORTAL
Descripcion: Dibuja el heder en el Italportal con el menu principal
parametro : 
<-- $pRegister  : Url para interface de registro      
<-- $pLogin     : Url para ingreso al sistema 
Detalles: Dibuja el heder en el Italportal tomando imagen fija images/register.png y images/login.png
ubicaci�n: Traida de web
==================================================*/  
/*
static function buildImgITALPORTAL($pRegister,$pLogin) {
      //<!-- Header -->
      echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';
      //<!-- Main Menu -->
      echo '<NAV class="navbar header-4 wrapper" role="navigation">';
      //<!-- Brand and toggle get grouped for better mobile display -->
      echo '<DIV class="navbar-header">';
      echo '<A href="'.$pRegister.'"><img class="logo" src="images/register.png" alt="Registrarse" title="Registrarse"></a>';
      echo '<A href="'.$pLogin.'"><img class="logo" src="images/login.png" alt="Iniciar Sesion" title="Iniciar Sesion"></a>';
      echo '</DIV>';
      echo '</NAV>';
      echo '</HEADER>';      
    }
 */
static function buildImgITALPORTAL($pRegister,$pLogin, $pType) {
     
      //<!-- Header -->
      echo '<HEADER id="mukam-header" class="mukam-header mukam-header-large header-4 fadein scaleInv anim_1">';   
      //<!-- Main Menu -->
      echo '<NAV class="navbar header-4 wrapper" role="navigation">';    
      //<!-- Brand and toggle get grouped for better mobile display -->
      echo '<DIV class="navbar-header">';
      echo '<TABLE>';
      //if ($pRegister != ""){
      echo '<TR>';
      echo '<TD>';
      echo '<A href="'.$pRegister.'"><img class="logo" src="images/register.png" alt="Registrarse" title="Registrarse"></a>';
      //}
      echo '</TD>';
      echo '<TD>';
      echo '<DIV class="container login">';
      echo '<DIV class="card">';
      echo '<DIV class="face front">';
      echo '<img class="logo" src="images/login.png" alt="Iniciar Sesion" title="Iniciar Sesion">';	
      echo '</DIV>';
      echo '<DIV class="face back">';
      echo '<IMG class="logo" src="images/logintype.png" alt="Iniciar Sesion" title="Iniciar Sesion" usemap="#Map">';
      echo '<MAP name="Map">';
      echo '<AREA shape="circle" coords="72, 66, 62" href="'.$pLogin.'">';
      echo '<AREA shape="circle" coords="271, 66, 62" href="'.$pType.'">';
      echo '</MAP>';
      echo '</TD>';
      echo '</DIV>';
      echo '</DIV>';
      echo '</DIV>';
      echo '</TR>';
      echo '</TABLE>';
      echo '</DIV>';
      echo '</NAV>';
      echo '</HEADER>'; 
    }
 

/*===============================================
buildFooterBrands
Descripcion: Dibuja el Footer en las interfaces que lo llaman
parametro : 
Detalles: Dibuja el Footer en las interfaces que lo llaman fijo posee 'Todos los derechos reservados � Organizaci�n Italcambio. ' . $year ;
ubicaci�n: Traida de web
==================================================*/  
    static function buildFooterBrands() {
       
		  chdir(dirname(__FILE__));
  		include_once 'brands.php';
      echo '<div class="bar_footer">';
      $year = date ( 'Y' );
	  echo 'Todos los derechos reservados &#169; Organizaci&oacute;n Italcambio. ' . $year ;
      echo '</div>';
    }


/*===============================================
buildHeaderMenu
Descripcion : Muestra un menu  
parametro : 
<-- $iduser : ID del usuario
<-- $regis  : Parametro que indica el tipo de usuario para buscar en tablas de BD
Detalles    : Muestra el menu de acuerdo a la base de datos y el id de usuario
srv: ALL
==================================================*/ 	
    static function buildHeaderMenu($iduser,$regis,$logo='indexPortal',$title='Organizacion Italcambio') {
    	$iduser=$iduser;
        $regis=$regis;
        $logo=$logo;
        presentationLayer::buildHeaderITALPORTAL($logo,$title);
		chdir(dirname(__FILE__));
		include_once '../modules/masters/menuPL.php';
	}   
   
                
/*===============================================
buildFormTitleespecific
Descripcion   : Muestra un titulo y subtitulo con marquee especifico en la interface
parametro : 
<-- $title    : String que contiene el titulo dibujado en <H1>
<-- $subTitle : String que contiene el subtitulo dibujado con <SPAN> por defecto saldra "Please fill all the texts in the fields"
<-- $marquee  : String que contiene el marquee a mostrar con <MARQUEE SCROLLDELAY>
Detalles: Muestra un titulo especifico en la interface, de acuerdo a parametros
srv: ALL
==================================================*/   
    static function buildFormTitleespecific($title,$subTitle="Please fill all the texts in the fields.",$marquee="") {
            echo '<H1>'.$title; 
            echo '<SPAN>'.$subTitle.'</SPAN>';
            if ($marquee != "") 
                echo '<MARQUEE SCROLLDELAY =100> '.$marquee.' </MARQUEE>';
                echo '</H1>';
    }
 

/*===============================================
buildSelect2param
Descripcion: Muestra un titulo especifico en la interface
parametro : 
<-- $iduser : ID del usuario
<-- $regis  : Parametro que indica el tipo de usuario para buscar en tablas de BD
Detalles: Muestra un titulo especifico en la interface, de acuerdo a parametros
srv: ALL
==================================================*/  
    static function buildSelect2param($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$event="",$disabled="",$param = "", $param2 = "",$readonly="") {
        echo '<LABEL>';
        echo '<SPAN>'.$title.' :</SPAN>';
        if ($event != "")
            $event = ' onBlur="'.$event.'" ';

		echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$event.' style="widht:10%" >';
        $mod->fillForeignTableComboParamBoth($foreignTable,$curVal,$foreignscheme, $param,$param2);
        echo '</SELECT>';
        echo $event;
        echo '</LABEL>';
                
    }

/*===============================================
buildSelectArrEvent
Descripcion: Genera un tag <SELECT> en HTML
parametro : 
<-- $title  : Titulo del select 
<-- $name   : Variable de php
<-- $id	    : Variable de javascript 
<-- $arr    : Arreglo que contiene informacion a mostrar
<-- $curVal : Valor a mostrar
<-- $event  : Hace referencia a un evento en javascript 
Detalles    : Genera un tag <SELECT> en HTML desde un $arr
srv: ALL
==================================================*/    
    static function buildSelectArrEvent($title,$name,$id,$arr,$curVal="",$event="") {

	    echo '<LABEL>';
        if ($event != "") {
			$event = 'onChange="submit()"';
		}
        echo '<SPAN>'.$title.' :</SPAN>';
		$nr = count($arr); 
		echo '<SELECT name="'.$name.'" id="'.$id.'" '.$event.' >';
		for ($i=0; $i < $nr; $i++) {
            if (($curVal != "") && ($arr[$i] == $curVal)) {
                echo '<option value="'.$arr[$i].'" SELECTED>'.$arr[$i].'</option>';
            }
            else {
                echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
            }
	 	}
		echo '</SELECT>';
		echo '</LABEL>';

	}

	
/*===============================================
buildSelectInputCI
Descripcion: Etiqueta html <select> e <input>
parametro : 
<-- $title : titulo de la tabla                 
<-- $name: nombre de la tabla, variable php              
<-- $id    : variable de javascript             
<-- $mod : objeto instancia de la class BL       
<-- $foreignTable: nombre de la tabla en bd     
<-- $curVal: valor a mostrar	                 
<-- $foreignscheme :nombre de scheme en bd	                               
<-- $onblur: hace referencia a un evento en javascript 	 
<-- $disabled: hace referencia a un evento en javascript 
<-- $nameIP: nombre de la tabla, variable php   
<-- $idIP    : variable de javascript
<-- $val    : variable de javascript      
<-- $param    : variable de javascript
<-- $param2    : variable de javascript
<-- $maxlength    : variable de javascript	
<-- $readonly    : variable de javascript   
Detalles: Agregar una lista desplegable con un <INPUT>
==================================================*/
	static function buildSelectInputCI($title,$name,$id,$mod,$foreignTable,$curVal,$foreignscheme="",$onblur="",$disabled="",$nameIP,$idIP,$val,$param = "", $param2 = "",$maxlength="50",$readonly="") {
			echo '<LABEL>';
			echo '<SPAN>'.$title.' :</SPAN>';
			if ($onblur != "")
				$onblur = ' onBlur="'.$onblur.'" ';
		
			echo '<SELECT '.$disabled.' name="'.$name.'" id="'.$id.'" '.$onblur.' style="widht:10%" >';
			$mod->fillForeignTableComboParamBoth($foreignTable,$curVal,$foreignscheme, $param,$param2);
			echo '</SELECT>';
			echo '<INPUT '.$readonly.' name = "'.$nameIP.'" type="text" onkeypress="return isNumber(event)" id="'.$idIP.'" value = "'.$val.'" title = "Por favor, rellene este campo." style="widht:40%"  ';
			echo $onblur;
			echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
			echo '</LABEL>';
	}


/*===============================================
buildFooterGridID
Descripcion: Inserta Grid en HTML 
parametro : 
<-- $bl       : Objeto instancia de la class BL referencia a ($bl = new)
<-- $com      : Script SELECT de una tabla segun el $mod de la instancia BL
<-- $arrCol   : Contiene un arreglo con los titulos de las columnas del Grid
<-- $par      : Parametro que depende de otra funcion para hacer referencia a otro campo
<-- $pn       : Numero de paginas
<-- $pageSize : Define la cantidad de registros  a mostrar por pagina

Detalles: Inserta Grid en HTML desde un SELECT en objeto class BL 
==================================================*/
static function buildFooterGridID($bl,$com,$arrCol,$par="",$pn=0,$pageSize=10) {
		
			$bl->fillGridCom($com,$arrCol,$par="",$pn=0,$pageSize=10);
				
				
		}	
		
 //Fin presentationLayer (revision 65,67,69)
        

/*===============================================
buildInputCustomDocumentID (Manuel Vazquez)
buildSelectInputCI
Descripcion: Etiqueta html <select> e <input>
parametro : 
<-- $nameS          : nombre de la tabla, variable php                  
<-- $idS            : variable de javascript               
<-- $modS           : objeto instancia de la class BL             
<-- $foreignTableS  : nombre de la tabla en bd     
<-- $curValS        : valor a mostrar	                 
<-- $foreignschemeS : nombre de scheme en bd
<-- $title          : titulo de la tabla
<-- $name           : nombre de la tabla, variable php              
<-- $id             : variable de javascript 
<-- $val            : variable de javascript  
<-- $maxlength      : variable de javascript	
<-- $readonly       : variable de javascript                     	                               
<-- $onblur         : hace referencia a un evento en javascript 	 
<-- $disabled       : Valor por el cual esta retringido 
Detalles: Agregar una lista desplegable con un <INPUT>
==================================================*/
static function buildInputCustomDocumentID($nameS,$idS,$modS,$foreignTableS,
        $curValS,$foreignschemeS,$title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="",$disabledsel=""){
        echo '<LABEL>';
        echo '<SPAN>'.$title.' :</SPAN>';
        if ($onblur != "")
                $onblur = ' onBlur="'.$onblur.'" ';
        echo '<SELECT class="italsisv3" '.$disabledsel.' name="'.$nameS.'" id="'.$idS.'">';
        $modS->fillForeignTableCombo($foreignTableS,$curValS,$foreignschemeS);
        echo '</SELECT>';
        echo '<INPUT class="italsisv3" '.$readonly.' name = "'.$name.'" type="text" onkeypress="return isNumber(event)" id="'.$id.'" value = "'.$val.'" ';
        echo $onblur; 
        echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
        echo '</LABEL>';	
}

/*===============================================
buildSelectInputDocumentID (Isaac Sanabria)
Descripcion: etiqueta html <select> y <input>
parametro : 

 <-- $nameS: nombre de la tabla, variable php                 
 <-- $idS    : variable de javascript             
 <-- $modS : objeto instancia de la class BL            
 <-- $foreignTableS: nombre de la tabla en bd     
 <-- $curValS: valor a mostrar	                 
 <-- $foreignschemeS :nombre de scheme en bd
 <-- $nameCol   : columna a mostrar de la bd
 <-- $parCol    : columna a guardar de la bd
 <-- $title : titulo de la tabla
 <-- $name: nombre de la tabla, variable php}
 <-- $id    : variable de javascript
 <-- $val    : variable de javascript 
 <-- $maxlength    : variable de javascript
 <-- $readonly    : variable de javascript	                                 
 <-- $onblur: hace referencia a un evento en javascript 	                 

Detalles: agregar una lista desplegable y un input
==================================================*/               
                
    static function buildSelectInputDocumentID($nameS,$idS,$modS,$foreignTableS, $curValS,$foreignschemeS,
            $nameCol,$parCol,$title,$name,$id,$val,$maxlength="50",$readonly="",$onblur="") {
        
        echo '<LABEL>';
        echo '<SPAN>'.$title.' :</SPAN>';
        if ($onblur != "")
            $onblur = ' onBlur="'.$onblur.'" ';
            echo '<SELECT class="italsisv3" '.$disabled.' name="'.$nameS.'" '
                    . 'id="'.$idS.'">';
            $modS->fillForeignTableComboParamBoth($foreignTableS,$curValS,
                    $foreignschemeS,$nameCol,$parCol);
            echo '</SELECT>';
            echo '<INPUT class="italsisv3" '.$readonly.' name = "'.$name.'" '
                    . 'type="text" onkeypress="return isNumber(event)" '
                    . 'id="'.$id.'" value = "'.$val.'" ';
            echo $onblur; 
        echo 'maxlength="'.$maxlength.'" placeholder="'.$title.'"></INPUT>';
        echo '</LABEL>';              
    }

}
        
?>