<?php

 $item_meu_proyecto ="";
 /*$item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(9,1)' ><b>Sugeridos para Ud.</b></li>\n";*/
 $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(0,1)' >Todos</a></li>\n";
 if(strpos($sectores, '1')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(1,1)' >Minería</a></li>\n";}
 if(strpos($sectores, '2')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(2,1)' >Energía</a></li>\n";}
 if(strpos($sectores, '3')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(3,1)'  >Infraestructura</a></li>\n";}
 if(strpos($sectores, '4')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(4,1)' >Inmobiliario</a></li>\n";}
 if(strpos($sectores, '5')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(5,1)' >Sanitario</a></li>\n";}
 if(strpos($sectores, '6')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(6,1)' >Industrial</a></li>\n";}
 if(strpos($sectores, '7')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(7,1)' >Forestal</a></li>\n";}
 
   
 $item_meu_adjudicaciones ="";
 if(strpos($sectores, '0')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(0,2)' >Ver Todas</a></li>\n";}
 if(strpos($sectores, '1')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(1,2)' >Minería</a></li>\n";}
 if(strpos($sectores, '2')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(2,2)' >Energía</a></li>\n";}
 if(strpos($sectores, '3')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(3,2' >Infraestructura</a></li>\n";}
 if(strpos($sectores, '4')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(4,2)' >Inmobiliario</a></li>\n";}
 if(strpos($sectores, '5')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(5,2)' >Sanitario</a></li>\n";}
 if(strpos($sectores, '6')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(6,2)' >Industrial</a></li>\n";}
 if(strpos($sectores, '7')){ $item_meu_adjudicaciones=$item_meu_adjudicaciones."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(7,2)' >Forestal</a></li>\n";}
?>
<div class="col-sm-2" >
      <div id="contenedor_menu_lateral" >
	  <h5><b>Mi Comunidad</b></h5>
      <ul>
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/inicio">Muro Actividades</a></li>
		  <li>Espacio Personal  </li>
		  
	  </ul>
	  <hr>
	 <h5><b>Perfil Empresa</b></h5>
      <ul>
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/informacion_membresia">Información Membresía</a></li>
		  <li><a href="<?=URL_PM_APP_NEG;?>Directorio/informacion_directorio">Información Directorio</a></li>
		  <li> Mis Adjudicaciones</li>
		  <li> Historial de Mis Cambios</li>
		  <li> Agregar Adjudicaciones</li>
		  <li> Comparador Básico</li>
		  <li> Curriculum Técnico </li>
    </ul>
	  <hr>
	 
	  
	  <h5><b>Proyectos</b></h5>
      <ul>
		  
		  <?=$item_meu_proyecto;?>
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/informes_mensuales">Informes</a></li>
		  <li>Estadistcas</li>
		 
    </ul>
	 <hr>
	<h5><b>Licitaciones</b></h5>
      <ul>
		  
		  <li>Ver Todas</li>
		  <li>Licitaciones Estimadas</li>
		  <li>Licitaciones Definidas</li>
		  <li>Licitaciones En Proceso de Adjudicación</li>
		  <li>Licitaciones Adjudicas</li>
	  </ul>
	  <hr>
	  <h5><b>Adjuducaciones</b></h5>
      <ul>
		  <li>Ver Todas</li>
		  <?=$item_meu_adjudicaciones;?>
	  </ul>
	  <hr>
	  <h5><b>Mineria de Datos</b></h5>
      <ul>
	  
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/informacion_mineria_datos">¿Qué es?</a></li>
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/informacion_mineria_datos_solicitar">Solicitar</a></li>
	 </ul>
	  <hr>
	  <h5><b>Articulación de Negocios</b></h5>
      <ul>
	      <li><a href="<?=URL_PM_APP_NEG;?>muro/informacion_articulacion_negocio">¿Cómo funciona?</a></li>
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/informacion_articulacion_negocio_solicitar">Solicitar</a></li>
		  
	  </ul>
	  <hr>
	  <h5><b>Equipos Gran Minería</b></h5>
      <ul>
		  <li><a href="<?=URL_PM_APP_NEG;?>muro/equipos_mineria">Ver Equipos</a></li>
	</ul>
	  <hr>
	  <h5><b>Compañias Mineras</b></h5>
      <ul>
		  <li>Chile</li>
		  <li>Perú</li>
	 </ul>
	</div>