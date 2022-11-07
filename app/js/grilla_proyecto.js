$(document).ready(  
/* se carga al momento de desplegar la grilla por primera vez */

          function() {
	         /*-------------------------------------------------------------------*/
			    $(document).ready(function() {
					
					var sector                 = $("#id_sectores").val();
					var sector_orden_elegido   = 0;
	 				
					linea_id_proyectos_filtro="";
					document.getElementById("text_busca_nombre").value="";
					var linea_id_proyectos_filtro  = $("#linea_id_proyectos_filtro").val();
					linea_id_proyectos_filtro="";
					
						 $.getJSON( HttpUrl+"buscador/busca_inicial/", { 
						 "inicio"  : G_Pub_inicio, 
						 "sector"  : sector, 
						 "linea_id_proyectos_filtro"  : linea_id_proyectos_filtro, 
						 "orden_elegido"  : sector_orden_elegido, 
						 "fin"     : G_Pub_fin 
						 } )
						.done(function( data, textStatus, jqXHR ) {
						 
						if(data.length > 0 ){
							 
							 
							 
							 if(data[0].Jestado=="OK"){	
                               $("#contenedor_tbody").html(data[0].Jresultado);
							   $("#paginador_superior").html(data[0].Jpaginador_query);
							   $("#paginador_inferior").html(data[0].Jpaginador_query);
							   $("#mensaje_json").html(data[0].Jdice);
							   //$("#sector_elegido").val(sector);
								  
							 }
						}
														 
							
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
						   
								 //$("#msg_login").text('Fracaso !!!');
						   $("#mensaje_json").html(errorThrown); 
					});
					
					/*-------------------------------------------------------------------*/
					
					
					
					
					
											
});
	
				
	 }
);
