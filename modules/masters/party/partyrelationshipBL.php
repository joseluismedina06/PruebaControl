<?php
/**
* Class "partyrelationshipBL.PHP"
* @author "dba, egoyo@italcambio.com"
* @version "1.00 2018-06-11 Elaboracion; 2018-06-11 Modificacion, [Parametro]"
* Description: ""  
* 
* Others additions: partyrelationshipBL.php:
* functions: 
*           
*
*/

    chdir(dirname(__FILE__));

    include_once("../base/baseBL.php");

    class partyrelationshipBL extends baseBL {

        protected $idpartysrc;
        protected $idpartydst;
        protected $idrelationshiptype;
        protected $observation;


        function __construct($code,$name,$idpartysrc,$idpartydst,$idrelationshiptype,
            $observation,$active,$deleted) {
            $scheme = "party";
            $table = "partyrelationship";
            $this->idpartysrc  = $idpartysrc;
            $this->idpartydst  = $idpartydst;
            $this->idrelationshiptype  = $idrelationshiptype;
            $this->observation  = $observation;

            parent::__construct($scheme,$table,$code,$name,$active,$deleted);          
        }

        function validate() {
            $valid = true;
            $msg = "";

            //if (!utilities::valOk($this->code)) {
            //$valid = false;
            //$msg = "A value must be given to field code";
            //} // validate code
            //
            //if (!utilities::valOk($this->name)) {
            //$valid = false;
            //$msg = "A value must be given to field name";
            //} // validate name

            if (!utilities::valOk($this->idpartysrc)) {
                $valid = false;
                $msg = "A value must be given to field idpartysrc";
            } // validate idpartysrc

            if (!utilities::valOk($this->idpartydst)) {
                $valid = false;
                $msg = "A value must be given to field idpartydst";
            } // validate idpartydst

            if (!utilities::valOk($this->idrelationshiptype)) {
                $valid = false;
                $msg = "A value must be given to field idrelationshiptype";
            } // validate idrelationshiptype

            if (!utilities::valOk($this->observation)) {
                $valid = false;
                $msg = "A value must be given to field observation";
            } // validate observation

            if ($msg != ""){
                utilities::alert($msg);
            }
                return ($valid);

        }       
        
        function getInputInformation (){
            $res = "";
            $res = parent :: executeReader("SELECT name||'-'||documentid||'/'||id
            FROM party.party");
            return ($res);
        }
        
        function buildArray(&$A) {
            $A[] = utilities::buildS($this->code);
            $A[] = utilities::buildS($this->name);
            $A[] = utilities::buildS ($this->idpartysrc);
            $A[] = utilities::buildS ($this->idpartydst);
            $A[] = utilities::buildS ($this->idrelationshiptype);
            $A[] = utilities::buildS($this->observation);
            $A[] = utilities::buildS($this->active);
            $A[] = utilities::buildS($this->deleted);
        }
              
	static function buildSelectWithComm($title,$name,$id,$mod,
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
                
        function fillGridDisplayPaginator($com="",$arrCol=""){
            if ($com==""){
                $com="select * from ".$this->scheme.".isspget".$this->table."()";
            }            
            $dbl=new baseBL();
            $arr=$dbl->executeReader($com);
            if ($arrCol=="") {
               $arrCol=array("Id","Codigo","Nombre","Activo"); 
            }
            presentationLayer::fillGridArrPaginator($arr, $arrCol);                   
        } 
                
      	static function buildSelect($title,$name,$id,$mod,$foreignTable,$curVal,
        $foreignscheme="",$event="",$disabled="") {
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
                
        function getName ($title,$id,$idd,$name,$val,$res,$onblur){
            echo '<LABEL>';
            echo '<SPAN>'.$title.' :</SPAN>';
            echo ' <div class="autocomplete" style="width:300px;">';
            echo '<input id="'.$id.'" value="'.$val.'" type="text" '
                    . 'name="'.$name.'" placeholder="'.$title.'" '
                    . 'onselect="myfuncionbuscar()" >'
                    . '</div>' ;                                    
            ;?>
            <script>
            // obtenemos el array de valores mediante la conversion a json del
            // array de php 
    
            var arrayJS=<?php echo json_encode($res);?>; 
            var id=<?php echo json_encode($id);?>;          

            //convertir OBJETOS en string 
            str = JSON.stringify(arrayJS);

            //result: [{"?column?"...:"f t-V2","id":"315"}]
            var o = str.slice(1, -1);
            //result: {"?column?"...:"f t-V2","id":"315"}  
      
            //El método split() sirve para dividir o cortar una cadena de texto en 
            //sub-cadenas y luego retornar un arreglo(array) de estas.
            var res = o.split(",");
     
            // var g = typeof (res); // number


            //cuenta los elementos del array
            var h = res.length;  
            //importante no borrar
            var txt= res[0]; 
            // se crea el array donde se guardaran los valores
            var arryName = new Array();


            for (i = 0; i < h; i++) {    
                //aqui puedo armar los dos array
                // separandolo d un string o por numero pares e inpares etc...   
                var t = res[i].slice(13, -2);
                arryName.push(t);
            }

            function autocomplete(inp,arr) {
                var newarr = new Array();
                /* la función de autocompletar toma dos argumentos,
                el elemento de campo de texto y una matriz de posibles valores autocompletados: */
                var currentFocus;
                /* ejecuta una función cuando alguien escribe en el campo de texto: */
                inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
      
                    /* cierra cualquier lista ya abierta de valores autocompletados */
                    closeAllLists();
                    if (!val) { 
                        return false;
                    }
                    currentFocus = -1;
                    /*crea un elemento DIV que contendrá los elementos (valores):*/
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    /* agrega el elemento DIV como elemento secundario del contenedor de autocompletar:*/
                    this.parentNode.appendChild(a);
                    /*para cada elemento de la matriz...*/
                    for (i = 0; i < arr.length; i++) {
          
                        var m = arr[i].indexOf("/") ;
                        //elemplo posicion 21 del /
                        var d = arr[i].substr(0, m);
                        newarr.push(d);         
                        /*compruebe si el artículo comienza con las mismas letras que el valor del campo de texto:*/
                        if (newarr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                            /*crea un elemento DIV para cada elemento coincidente:*/      
                            b = document.createElement("DIV");
                            /*hacer que las letras coincidan en negrita:*/
                            b.innerHTML = "<strong>" + newarr[i].substr(0, val.length) + "</strong>";
          
                            b.innerHTML += newarr[i].substr(val.length);
                            /*inserte un campo de entrada que contendrá el valor del elemento de matriz actual*/
                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                            /*ejecutar una función cuando alguien hace clic en el valor del elemento (elemento DIV):*/
                            b.addEventListener("click", function(e) {
                                /*inserte el valor para el campo de texto de autocompletar:*/
                                //  inp.value = this.getElementsByTagName("input")[0].value;
                                var xx = this.getElementsByTagName("input")[0].value;
                                var xxx = xx.indexOf("/") ;
                                var mostrar = xx.substr(0, xxx);
                                var guardar = xx.substr(xxx+1);               
                                var idd=<?php echo json_encode($idd);?>;
                                inp.value = mostrar;
                                document.getElementById(idd).value=guardar;           
                                /*cerrar la lista de valores autocompletados,
                                (o cualquier otra lista abierta de valores autocompletados:*/
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                });
                /*ejecutar una función presiona una tecla en el teclado:*/
                inp.addEventListener("keydown", function(e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x) x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        /*Si se presiona la flecha ABAJO,
                        aumentar la variable de foco actual:*/
                        currentFocus++;
                        /*y hacer que el elemento actual sea más visible:*/
                        addActive(x);
                    } else if (e.keyCode == 38) { //arriba
                        /*arriba
                        / * Si se presiona la flecha ARRIBA,
                        disminuir la variable de foco actual:*/
                        currentFocus--;
                        /*y hacer que el elemento actual sea más visible:*/
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        /*Si se presiona la tecla ENTER, evita que se envíe el formulario,*/
                        e.preventDefault();
                        if (currentFocus > -1) {
                            /*y simular un clic en el elemento "activo":*/
                             if (x) x[currentFocus].click();
                        }
                    }
                });
                
                function addActive(x) {
                    /*una función para clasificar un artículo como "activo":*/
                    if (!x) return false;
                    /*comience por eliminar la clase "activa" en todos los elementos:*/
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    /*agregar clase "autocompletar-activo"":*/
                    x[currentFocus].classList.add("autocomplete-active");
                }
                function removeActive(x) {
                    /*una función para eliminar la clase "activa" de todos los elementos de autocompletar:*/
                    for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                }
                function closeAllLists(elmnt) {
                    /*cerrar todas las listas de autocompletar en el documento,
                    excepto el que pasó como argumento:*/
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                /*ejecutar una función cuando alguien hace clic en el documento:*/
                document.addEventListener("click", function (e) {
                closeAllLists(e.target);
                });
            }

            /*Una matriz que contiene todos los nombres de países en el mundo:*/
            //var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

            /*inicie la función de autocompletar en el elemento "myInput" y pase la matriz de países como posibles valores de autocompletar:*/

            autocomplete(document.getElementById(id), arryName);

            </script>
            <?php
            return ;
        }        
		static function buildjsGA() {
			echo '<SCRIPT language="javascript" src="js/js.js" type="text/javascript"></SCRIPT>';
                        
          }        
    }
?>