function actualiza_dir(){
	
/*
retorna cundo se selciona por menu
se gatilla del menu lateral o grilla orden  
app/business/muro/buscador_proyectos/


 */          

					    
			             
						 
						
						var Nombre= $("#Nombre").val();
						var Pais= $("#Pais").val();
						var Ciudad= $("#Ciudad").val();
						var Direccion= $("#Direccion").val();
						var Fono= $("#Direccion").val();
						var Fax= $("#Fax").val();
						var mail= $("#mail").val();
						var Sitio= $("#Sitio").val();
						var descripcion_full= $("#descripcion_full").val();
						var productos_servicios= $("#productos_servicios").val();
						var sucursales= $("#sucursales").val();
						var Codigo= $("#Codigo").val();
						var tiene_directorio= $("#tiene_directorio").val();
						var Casilla= $("#Casilla").val();
						var image= $("#hiddenImagen").val();
						

						 alert('La información fue actualizada');
						 
						// document.getElementById("text_busca_nombre").value="";
						 
			             
						 $.getJSON( HttpUrl+"Directorio/informacion_directorio_grabar/", { 
						    "Nombre_p" : Nombre,
							"Pais_p" : Pais,
							"Ciudad_p" : Ciudad,
							"Direccion_p" : Direccion,
							"Fono_p" : Fono,
							"Fax_p" : Fax,
							"mail_p" : mail,
							"Sitio_p" : Sitio,
							"descripcion_full_p" : descripcion_full,
							"productos_servicios_p" : productos_servicios,
							"sucursales_p" : sucursales,
							"Codigo_p" : Codigo,
							"Casilla_p" : Casilla,
							"image_p" : image,
							"tiene_directorio_p" : tiene_directorio

						 } )
						.done(function( data, textStatus, jqXHR ) {
						  
						if(data.length > 0 ){
							 
							 
							 
							 if(data[0].Jestado=="OK"){	
							  
                               $("#msg_graba").html("Grabado");
							   
							 }
						}
													 
				 			
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
						   
								 //$("#msg_login").text('Fracaso !!!');
						         //$("#mensaje_json").html(errorThrown); 
					});
					
			
		//retorna_totales_sector(sector);	
       
}

function informacion_directorio_update(){
	  	  if(valida()){
			  actualiza_dir();
	      }
	  
  }
  
  
  function valida(){
	  	  
		  if(document.getElementById("Nombre").value==''){
			  alert('Debe Ingresar Nombre Empresa');
			  document.getElementById("Nombre").focus();;
			  return false;
	      }
		  if(document.getElementById("Pais").value==''){
			  alert('Debe Ingresar Nombre Pais');
			  document.getElementById("Pais").focus();;
			  return false;
	      }
		   if(document.getElementById("Ciudad").value==''){
			  alert('Debe Ingresar Nombre Ciudad');
			  document.getElementById("Ciudad").focus();;
			  return false;
	      }
		   if(document.getElementById("Direccion").value==''){
			  alert('Debe Ingresar Direccion');
			  document.getElementById("Direccion").focus();;
			  return false;
	      }
		  
		  if(document.getElementById("Fono").value==''){
			  alert('Debe Ingresar Fono');
			  document.getElementById("Fono").focus();;
			  return false;
	      }
		  
		  if(document.getElementById("mail").value==''){
			  alert('Debe Ingresar mail');
			  document.getElementById("mail").focus();;
			  return false;
	      }
		  if(document.getElementById("Sitio").value==''){
			  alert('Debe Ingresar sitio Web');
			  document.getElementById("Sitio").focus();;
			  return false;
	      }
		  if(document.getElementById("descripcion_full").value==''){
			  alert('Debe Ingresar descripcion de su Empresa');
			  document.getElementById("descripcion_full").focus();;
			  return false;
	      }
		  
	   return true;
  }