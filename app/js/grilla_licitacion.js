$(document).ready(  
/* se carga al momento de desplegar la grilla por primera vez */

          function() {
	         /*-------------------------------------------------------------------*/
			    $(document).ready(function() {
				//	alert(22);
					
					var sector                 = $("#id_sectores").val();
					
	 				
					linea_id_proyectos_filtro="";
					document.getElementById("text_busca_nombre").value="";
					var linea_id_proyectos_filtro  = $("#linea_id_proyectos_filtro").val();
					linea_id_proyectos_filtro="";
					
						 $.getJSON( HttpUrl+"Fichalicitacion/carga_inicial_licitacion/", { 
						 
						 "sector"  : sector
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
