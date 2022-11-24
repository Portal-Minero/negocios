var C_base_url='http://'+window.location.host+'/wp/app/business/'; 
var C_base_url_imagen ='http://'+window.location.host+'wp/app/app/imagen/'; 


function val_campo_js(campo,largo){
	  
	  var text=campo;
	 // alert(text);
	  
	 
	  
	  if(text==""){ return false;}
	  
	  
	  if(largo == 1){
			  if (text.length < 4) {
				  return false;;
			  }
	  }
	  return true;
}


function valideKey(evt){
			
			// onkeypress="return valideKey(event);"
			var code = (evt.which) ? evt.which : evt.keyCode;
			
			if(code==8) { // backspace.
			  return true;
			} else if(code>=48 && code<=57) { // is a number.
			  return true;
			} else{ // other keys.
			  return false;
			}
}
 