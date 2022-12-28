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






function retorna_sectores_selecionados(){

var sector=0;
		/*-------------------------------------------------------*/
		
							$.ajax
							  ({
							   url: HttpUrl+'muro/retorna_sectores_selecionados//',
							   data : { sector : sector },
							   type : 'post',
							   cache: false,
							   
							   success: function(r3)
							   {
								 
								$("#div_sectores_interes").html(r3);
								$("#div_sectores_interes_msg").html('');
							   }
							  
							});
			/*-------------------------------------------------------*/
	
	
	
}	



function graba_sectores_selecionados(){



var sector_1   = $("#chec1").prop('checked');
var sector_2   = $("#chec2").prop('checked');
var sector_3   = $("#chec3").prop('checked');
var sector_4   = $("#chec4").prop('checked');
var sector_5   = $("#chec5").prop('checked');
var sector_6   = $("#chec6").prop('checked');
var sector_7   = $("#chec7").prop('checked');



		/*-------------------------------------------------------*/
		
							$.ajax
							  ({
							   url: HttpUrl+'muro/graba_sectores_selecionados/',
							   data : { sector_1 : sector_1, 
							   sector_2 : sector_2, 
							   sector_3 : sector_3, 
							   sector_4 : sector_4, 
							   sector_5 : sector_5, 
							   sector_6 : sector_6, 
							   sector_7 : sector_7
							   },
							   type : 'post',
							   cache: false,
							   
							   success: function(r3)
							   {
								 
								$("#div_sectores_interes_msg").html(r3);
							   }
							  
							});
			/*-------------------------------------------------------*/
	
	
	
}
