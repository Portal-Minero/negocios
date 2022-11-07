//var HttpUrl ="http://" + document.domain + "/";
var HttpUrl ="http://200.6.115.193/wp/app/business/"+""
var G_Pub_inicio   = 0; 
var G_Pub_fin      = 50; 
/*-------------------------------------------*/




/* se gatilla cuando se cambia selecion de menu 
   restablece valores generales y llama a funcion retorna_por_menu(sector)
*/
function mustra_sector_por_menu(sector,menu){
	document.getElementById("linea_id_proyectos_filtro").value="";
	document.getElementById("sector_elegido").value="";
	
	
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
	limpia_linea_id_proyecto();	
	retorna_por_menu(sector);
}
 

function retorna_por_menu(sector){
	
/*
retorna cundo se selciona por menu
se gatilla del menu lateral o grilla orden  
app/business/muro/buscador_proyectos/


 */          

					     var sector_orden_elegido   = $("#orden_elegido").val();
			             var desc_acen              = $("#desc_acen").val();
						 
										 
						 
						// document.getElementById("text_busca_nombre").value="";
						 var linea_id_proyectos_filtro  = $("#linea_id_proyectos_filtro").val();
			             f_titulo_general(sector);
						 $.getJSON( HttpUrl+"buscador/busca_inicial/", { 
						 "inicio"         : G_Pub_inicio, 
						 "sector"         : sector, 
						 "linea_id_proyectos_filtro"         :linea_id_proyectos_filtro, 
						 "orden_elegido"  : sector_orden_elegido, 
						 "desc__acen"     : desc_acen, 
						 "fin"            : G_Pub_fin 
						 } )
						.done(function( data, textStatus, jqXHR ) {
						 
						if(data.length > 0 ){
							 
							 
							 
							 if(data[0].Jestado=="OK"){	
                               $("#contenedor_tbody").html(data[0].Jresultado);
							   $("#paginador_superior").html(data[0].Jpaginador_query); // son los cuadros de paginacion
							   $("#paginador_inferior").html(data[0].Jpaginador_query); // son los cuadros de paginacion
							   $("#mensaje_json").html(data[0].Jdice);
							   $("#mensaje_json").html(data[0].Jdice);
							   $("#sector_elegido").val(sector);
							    
							  
							   
							   
							 }
						}
													 
				 			
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
						   
								 //$("#msg_login").text('Fracaso !!!');
						   $("#mensaje_json").html(errorThrown); 
					});
					
			
		retorna_totales_sector(sector);	
       
}


function retorna_totales_sector(sector){

		/*-------------------------------------------------------*/
		
							$.ajax
							  ({
							   url: HttpUrl+'buscador/retorna_totales_sector/',
							   data : { sector : sector },
							   type : 'post',
							   cache: false,
							   
							   success: function(r3)
							   {
								 
								$("#contenedor_totales_sector").html(r3);
							   }
							  
							});
			/*-------------------------------------------------------*/
	
	
	
}	
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


function retorna_por_nombre(sector, nombre,orden){
                         var sector_orden_elegido   = $("#orden_elegido").val();
			             var desc_acen              = $("#desc_acen").val();
			
						 $.getJSON( HttpUrl+"buscador/busca_por_nombre/", { 
						 "inicio"  : G_Pub_inicio, 
						 "sector"  : sector, 
						 "fin"     : G_Pub_fin, 
						 "orden"   : sector_orden_elegido , 
						 "desc__acen"   : desc_acen , 
						 "nombre"  : nombre 
						 } )
						.done(function( data, textStatus, jqXHR ) {
						 
						if(data.length > 0 ){
							 
							 
							 
							 if(data[0].Jestado=="OK"){	
                               $("#contenedor_tbody").html(data[0].Jresultado);
							   $("#paginador_superior").html(data[0].Jpaginador_query); // son los cuadros de paginacion
							   $("#paginador_inferior").html(data[0].Jpaginador_query); // son los cuadros de paginacion
							   $("#mensaje_json").html(data[0].Jdice);
							   $("#mensaje_json").html(data[0].Jdice);
							   $("#sector_elegido").val()=sector;
							   
							   
							 }
						}
														 
							
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
						   
								 //$("#msg_login").text('Fracaso !!!');
						   $("#mensaje_json").html(errorThrown); 
					});
					
					
}

function retorna_por_paginador(sector,inicio,fin){
              
			             var sector_orden_elegido   = $("#orden_elegido").val();
			             var desc_acen              = $("#desc_acen").val();
						 var nombre                 = $("#text_busca_nombre").val();
                         var linea_id_proyectos_filtro  = ""; // $("#linea_id_proyectos_filtro").val();
						 
						 $.getJSON( HttpUrl+"buscador/carga_proyectos_pagina/", { 
						 "inicio"  : inicio, 
						 "sector"  : sector, 
						 "orden"   : sector_orden_elegido , 
						 "linea_id_proyectos_filtro"   : linea_id_proyectos_filtro , 
						 "desc__acen"   : desc_acen , 
						 "nombre"   : nombre , 
						 "fin"     : fin					 
						 } )
						.done(function( data, textStatus, jqXHR ) {
						 
						if(data.length > 0 ){
							   
							 
							 
							 if(data[0].Jestado=="OK"){	
							 
                               $("#contenedor_tbody").html(data[0].Jresultado);
							   
							   							  
							 }
						}
														 
							
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
						   
								 //$("#msg_login").text('Fracaso !!!');
						   $("#mensaje_json").html(errorThrown); 
					});
					 
					
}

function trae_pagina(de,hasta){
	var nombre='';
	var orden=0;
	 var  sector = document.getElementById("sector_elegido").value;
	 retorna_por_paginador(sector,de,hasta,nombre,orden);
	 
}



function f_titulo_general(sector){
	if(sector==9){ dice = 'Sugeridos' } 
	if(sector==0){ dice = 'Todos' } 	
	if(sector==1){ dice = 'Minería' } 
	if(sector==2){ dice = 'Energía' }
	if(sector==3){ dice = 'Infraestructura' }
	if(sector==4){ dice = 'Inmobiliario' }
	if(sector==5){ dice = 'Sanitario' }
	if(sector==6){ dice = 'Industrial' }
	if(sector==7){ dice = 'Forestal' }
	r3 ='Proyectos de Sector ' + dice;
	$("#titulo_general").html(r3);
}

function buscar_pro_nombre(){
	
	var  nombre = document.getElementById("text_busca_nombre").value;
	var  sector = document.getElementById("sector_elegido").value;
	
	if(nombre == ""){
		alert('Debe ingresar nombre a buscar');
		document.getElementById("text_busca_nombre").focus();
		return false;
	}
	
	if(nombre.length < 5 ){
		alert('Debe ingresar nombre mayor a 4 caracteres');
		document.getElementById("text_busca_nombre").focus();
		return false;
	}
	
	
	retorna_por_nombre(sector, nombre);
}

function Order_By(opcion,viene){
	
	 document.getElementById("orden_elegido").value=opcion;
	 var  sector = document.getElementById("sector_elegido").value;
	 
	 
	 var t_desc_acen   =  document.getElementById("desc_acen").value;
	 if(t_desc_acen==1){  document.getElementById("desc_acen").value=0;}
	 if(t_desc_acen==0){  document.getElementById("desc_acen").value=1;}
	 
	 if(viene == 1){
		 foto = document.getElementById("flecha_1").src
         foto = foto.split('/');
		 r=foto[foto.length-1];
  
		
		if(r=='arrowdown.png'){document.getElementById("flecha_1").src="../../../app/imagen/arrowup.png";}
		else{document.getElementById("flecha_1").src="../../../app/imagen/arrowdown.png" }
		
		
		document.getElementById("flecha_2").src="../../../app/imagen/arrowdown.png";
		document.getElementById("flecha_3").src="../../../app/imagen/arrowdown.png";
		 
	 }
	 
	  if(viene == 2){
		 foto = document.getElementById("flecha_2").src
         foto = foto.split('/');
		 r=foto[foto.length-1];
  
		
		if(r=='arrowdown.png'){document.getElementById("flecha_2").src="../../../app/imagen/arrowup.png";}
		else{document.getElementById("flecha_2").src="../../../app/imagen/arrowdown.png" }
		
		document.getElementById("flecha_1").src="../../../app/imagen/arrowdown.png";
		document.getElementById("flecha_3").src="../../../app/imagen/arrowdown.png";
		 
	 }
	 
	 
	 if(viene == 3){
		 foto = document.getElementById("flecha_3").src
         foto = foto.split('/');
		 r=foto[foto.length-1];
  
		
		if(r=='arrowdown.png'){document.getElementById("flecha_3").src="../../../app/imagen/arrowup.png";}
		else{document.getElementById("flecha_3").src="../../../app/imagen/arrowdown.png" }
		
		document.getElementById("flecha_1").src="../../../app/imagen/arrowdown.png";
		document.getElementById("flecha_2").src="../../../app/imagen/arrowdown.png";
		
		 
	 }
	 
	 var  nombre = document.getElementById("text_busca_nombre").value;
	 var  el_orden_elegido = document.getElementById("orden_elegido").value;
	
	 if(nombre.length > 4 ){
		 
		  retorna_por_nombre(sector, nombre,el_orden_elegido);
		 
	 }else{
	 
	      retorna_por_menu(sector);
	 
	 }
	
	  
  }

function seguir_proyecto(pro){
	alert('En Desarrollo pendiente');
	
}


function limpia_linea_id_proyecto(){

			/*-------------------------------------------------------*/
					
										$.ajax
										  ({
										   url: HttpUrl+'buscador/limpia_linea_id_proyecto/',
										   data : { sector : 0 },
										   type : 'post',
										   cache: false,
										   
										   success: function(r3)
										   {
											 
											//$("#contenedor_totales_sector").html(r3);
										   }
										  
										});
			/*-------------------------------------------------------*/

				document.getElementById("text_busca_nombre").value='';
				
	
}
