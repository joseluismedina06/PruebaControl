/* JS para desarrollos de Arturo Marcano */

function isESLetter(event) { 
    tecla =(document.all) ? event.keyCode : event.which; 
    if (tecla===8 || tecla===0) return true; 
    patron=/[qwertyuiopasdfghjklñzxcvbnm QWERTYUIOPASDFGHJKLÑZXCVBNMáéíóúÁÉÍÓÚüÜ']/; 
    te=String.fromCharCode(tecla); 
    return patron.test(te); 
}

function isESLetterNoSpace(event) 
{ 
    tecla =(document.all) ? event.keyCode : event.which; 
    if (tecla===8 || tecla===0) return true; 
    patron=/[qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNMáéíóúÁÉÍÓÚüÜ']/; 
    te=String.fromCharCode(tecla); 
    return patron.test(te); 
}

function isESNumber(event) {
	tecla =(document.all) ? event.keyCode : event.which;
	if (tecla===8|| tecla===0) return true;
	patron=/[1234567890]/;
	te=String.fromCharCode(tecla);
	return patron.test(te);
}

function isESDecimal(event) {
	tecla =(document.all) ? event.keyCode : event.which;
	if (tecla===8|| tecla===0) return true;
	patron=/[1234567890.,]/;
	te=String.fromCharCode(tecla);
	return patron.test(te);
}

function isESLetterCaracter(event) {
	tecla =(document.all) ? event.keyCode : event.which;
	if (tecla===8|| tecla===0) return true;
	patron=/[qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNMáéíóúÁÉÍÓÚüÜ'*+/"!$%&)=(:;.,_-|@]/;
	te=String.fromCharCode(tecla);
	return patron.test(te);
}

function isESLetterNumberNoSpace(event) {
	tecla =(document.all) ? event.keyCode : event.which;
	if (tecla===8|| tecla===0) return true;
	patron=/[qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNMáéíóúÁÉÍÓÚüÜ1234567890]/;
	te=String.fromCharCode(tecla);
	return patron.test(te);
}

//onchange="minRequiredCaracter(this.value,'.$minlength.' )" 
function minRequiredCaracter(val,min) { 
	if(val.length<min){ 
    	alert("El numero de elementos no corresponde al campo procesado");} 
}


// Funcion Display NewGrid
$(document).ready( function () {
    $('table.display').DataTable();
} );

function isESDecimalCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{10}$/
    return !(regexp.test(field.value))
  }
  // .
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  // other key
  return false

}





//Elaborado por: Genesis Amaiz sep 2018
function AutoNumberZeroCheck(e, field,long) {
    

     //var Documentid = document.getElementById("codecuenta").value;
    long=long-1;
    key = e.keyCode ? e.keyCode : e.which
    
        var x = field.value,
            y = field.value.length,
            z = 0,
            m = "",
            cero ="",
            patron = "",            
            nuevoValor    = "";
//if (Documentid == "")    {
//     
//        e = (e) ? e : window.event;
//    var charCode = (e.which) ? e.which : e.keyCode;
//    if ((charCode >= 48 && charCode <= 57) || 
//            (charCode >= 65 && charCode <= 90) || 
//            (charCode >= 97 && charCode <= 122) || 
//            (charCode == 8)) {
//        return true;
//    }
//    return false;
//    
//    
//    
//}
//if (Documentid == 1 || Documentid==5 || Documentid==4 || Documentid==6){
   // var long = 1;
//    if(Documentid == 1){
//        long=(8-1);
//    }
//    if(Documentid == 5 || Documentid==4 || Documentid==6 ){
//        long=(9-1);
//    }
   
//    if (key == 48 && x==""){
//         return false
//    }
 
    if (key == 8) {  
     
        if(x!=""){
            z = (long+2)-y;
            for (i = 0; i<z; i++) {
              m = '0'+m;   
            }
            for (i = 0; i<y-1; i++) {
                patron = '0'+patron;   
            }            
            cero = x.substring(0,long); 
            if (cero==patron){
               return field.value = cero.replace(patron, nuevoValor);
            }
            return field.value = m+field.value; 
        }
        return false
    }
      
    if (key > 47 && key < 58) {
        regexp = /[0-9]{10}$/
           
            if  (!(regexp.test(field.value))) {

                if(x=="" || long>=y){
                    z = long-y;                    
                    for (i = 0; i<z; i++) {
                        m = '0'+m;   
                    }           
                    return field.value = m+field.value; 
                }
                if(x!="") {               
                    cero = x.substring(0, 1);

                    if(cero!=0 && y==long){
                        alert ("cero!=0 && y==7");
                        return true; 
                    }
                    if(cero==0){
                        x = x.substring(1);
                        return field.value = x; 
                    }  
                }      
            }
//    }    
}



    return false
}

//Elaborado por: Genesis Amaiz sep 2018
function AutoNumberZeroCheckCI(e, field,long) {
    

     //var Documentid = document.getElementById("codecuenta").value;
    long=long-1;
    key = e.keyCode ? e.keyCode : e.which
    
        var x = field.value,
            y = field.value.length,
            z = 0,
            m = "",
            cero ="",
            patron = "",            
            nuevoValor    = "";
   
    if (key == 48 && x==""){
         return false
    }
 
    if (key == 8) {  
     
        if(x!=""){
            z = (long+2)-y;
            for (i = 0; i<z; i++) {
              m = '0'+m;   
            }
            for (i = 0; i<y-1; i++) {
                patron = '0'+patron;   
            }            
            cero = x.substring(0,long); 
            if (cero==patron){
               return field.value = cero.replace(patron, nuevoValor);
            }
            return field.value = m+field.value; 
        }
        return false
    }
      
    if (key > 47 && key < 58) {
        regexp = /[0-9]{10}$/
           
            if  (!(regexp.test(field.value))) {

                if(x=="" || long>=y){
                    z = long-y;                    
                    for (i = 0; i<z; i++) {
                        m = '0'+m;   
                    }           
                    return field.value = m+field.value; 
                }
                if(x!="") {               
                    cero = x.substring(0, 1);

                    if(cero!=0 && y==long){
                        alert ("cero!=0 && y==7");
                        return true; 
                    }
                    if(cero==0){
                        x = x.substring(1);
                        return field.value = x; 
                    }  
                }      
            }
//    }    
}



    return false
}

//------------------------------------------

  
//Elaborado por: Genesis Amaiz oct 2018
function CheckCountrycode(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
  
    if (key == 43 && field.value==""){
         return true
    }  
  
  if (key > 47 && key < 58 && field.value!="") {
    if (field.value == "") return true
    regexp = /[0-9]{10}$/
    return !(regexp.test(field.value))
  }
  return false

}