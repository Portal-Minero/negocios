function aplicar_filtro(){
	
	var HttpUrl ="http://" + document.domain + "/";
		
	aplica_filtro_nuevo();
	
	}


/* aplica filtro de View_buscador_proyectos.php


*/
function aplica_filtro_nuevo(){
              
			  /*llama a la funcion que crea los id de la niea */
			              div = document.getElementById('mensajito');
                          div.style.display = 'block';      
						
						  var select_get_estados_proyecto= $("#select_get_estados_proyecto").val();
						  var select_get_proyectos_tipo= $("#select_get_proyectos_tipo").val();
						  var select_get_mandantes_proyecto= $("#select_get_mandantes_proyecto").val();
						  var select_get_u_pais= $("#select_get_u_pais").val();
						  var select_get_u_region= $("#select_get_u_region").val();
						  var select_get_obras_principales= $("#select_get_obras_principales").val();
						  var select_get_equipos_principales= $("#select_get_equipos_principales").val();
						  var select_get_suministros_principales= $("#select_get_suministros_principales").val();
						  var select_get_servicios_principales= $("#select_get_servicios_principales").val();
						  var select_get_proyectos_etapas= $("#select_get_proyectos_etapas").val();
						  var select_get_responsable_etapa_actual= $("#select_get_responsable_etapa_actual").val();
						  var sector= $("#sector_elegido").val();  
						
						  document.getElementById("text_busca_nombre").value="";
						
						
						
						
						 $.getJSON( HttpUrl+"buscador/aplica_filtro_inicial/", { 
						 "select_get_estados_proyecto"  : select_get_estados_proyecto, 
						 "select_get_proyectos_tipo"  : select_get_proyectos_tipo, 
						 "select_get_mandantes_proyecto"  : select_get_mandantes_proyecto, 
						 
						 "select_get_u_pais"  : select_get_u_pais, 
						 "select_get_u_region"  : select_get_u_region, 
						 "select_get_obras_principales"  : select_get_obras_principales, 
						 "select_get_equipos_principales"  : select_get_equipos_principales, 
						 "select_get_suministros_principales"  : select_get_suministros_principales, 
						 "select_get_servicios_principales"  : select_get_servicios_principales, 
						 "select_get_proyectos_etapas"  : select_get_proyectos_etapas, 
						 "select_get_responsable_etapa_actual"  : select_get_responsable_etapa_actual, 									 
						 "sector"  : sector	
						 
						 } )
						.done(function( data, textStatus, jqXHR ) {
						 
						if(data.length > 0 ){
							   
							 
							 
							 if(data[0].Jestado=="OK"){	
						 
                               $("#linea_id_proyectos_filtro").val(data[0].Jresultado);
							   
							   
							   if( document.getElementById("linea_id_proyectos_filtro").value=="" ){
								   alert('No se encontraron coincidencias para el filtro aplicado por UD');
							       repone_valor_combo();
							   
							   }
							    div = document.getElementById('mensajito');
                                div.style.display = 'none';   
							    muestra_filtro();
							   
							   							  
							 }
						}
														 
							
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
						   
								 //$("#msg_login").text('Fracaso !!!');
						   $("#mensaje_json").html(errorThrown); 
					});
					 
					
}

function muestra_filtro(){
	/*genera grilla */
	var sector= $("#sector_elegido").val();  

	retorna_por_menu(sector);
	
	
}

function repone_valor_combo(){
	
	document.getElementById("select_get_proyectos_tipo").selectedIndex=0;
	document.getElementById("select_get_mandantes_proyecto").selectedIndex=0;
	document.getElementById("select_get_u_pais").selectedIndex=0;
	document.getElementById("select_get_u_region").selectedIndex=0;
	document.getElementById("select_get_obras_principales").selectedIndex=0;
	document.getElementById("select_get_equipos_principales").selectedIndex=0;
	document.getElementById("select_get_servicios_principales").selectedIndex=0;
	document.getElementById("select_get_proyectos_etapas").selectedIndex=0;
	document.getElementById("select_get_responsable_etapa_actual").selectedIndex=0;
	document.getElementById("select_get_estados_proyecto").selectedIndex=0;
	document.getElementById("select_get_u_region").disabled=false;
	
}



  
						  
