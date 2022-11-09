<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
 $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 
 $item_meu_proyecto ="";
 /*$item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(9,1)' ><b>Sugeridos para Ud.</b></li>\n";*/
 $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(0,1)' >Todos</a></li>\n";
 if(strpos($sectores, '1')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(1,1)' >Minería</a></li>\n";}
 if(strpos($sectores, '2')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(2,1)' >Energía</a></li>\n";}
 if(strpos($sectores, '3')){ $item_meu_proyecto=$item_meu_proyecto."<li> <a href='#' onclick='seleccion_vista_buscador_proyectos(3,1'  >Infraestructura</a></li>\n";}
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
<!DOCTYPE html>
<html lang="en">  
<head>
  <title>Portal Minero</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  
  <script>
  /* carga buscador_proyectos 
    lo envia al muro/buscador_proyectos
  
  */
  
  function seleccion_vista_buscador_proyectos(p,t){
	  	 
	  document.getElementById("seleccion").value=p;
	  document.getElementById("parametro").value=t;
	  document.form1.submit(); 
	 
  }
  </script>
  
</head>
<body>
  
  <br><br>
<div class="container">
		
		<div id="informacion_cliente_muro" >
	<h3 style="color:#066293"><spam id="titulo_general" >Informes Mensuales De Proyectos</h3>			
</div>
		<hr>
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;" class="ocultar-div">
  
 <table class="table table-bordered">
  <thead>
    <tr style="background-color: #f5f5f7;">
      <th scope="col"><b><FONT COLOR=" #066293" SIZE="2">Datos Usuario</FONT></b></th>
      <th scope="col">&nbsp;</th>
      <th scope="col"><b><FONT COLOR=" #066293" SIZE="2">Datos de Ejecutivo</FONT></b></th>
      <th scope="col">&nbsp;</th>
	  <th scope="col"><b><FONT COLOR=" #066293" SIZE="2">Membresía</FONT></b></th>
	  <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col"><strong>Nombre Usuario</strong></th>
       <th scope="col"><?=$nombre_usuario?></th>
       <th scope="col"><strong>Nombre Ejecutivo</strong></th>
       <th scope="col"><?=$nombre_vendedor;?></th>
	   <th scope="col"><b>Tipo Membresía</b></th>
       <th scope="col"><?=$membresia;?></th>
    </tr>
    <tr>
      <th scope="col"><b>RUT o ID</b></th>
      <th scope="col"><?=$rut_id_socio?></th>
      <th scope="col"><strong>Email</strong></th>
      <th scope="col"><?=$email_vendedor;?></th>
	  <th scope="col"><b>Inicio</b></th>
      <th scope="col"><?=$fecha_inicio;?></th>
    </tr>
	<tr>
      <th scope="col"><strong>Empresa </strong></th>
      <th scope="col"><?=$nombre_socio?></th>
      <th scope="col"><strong>Telefono </strong></th>
      <th scope="col"><?=$fono_vendedor;?></th>
	  <th scope="col"><strong>Renovación</strong></th>
      <th scope="col"><?=$fecha_renovacion;?></th>
    </tr>
	
	
    
  </tbody>
</table>
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
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
		  <li> Información Directorio</li>
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
		  <li>¿Qué es?</li>
		  <li>Solicitar</li>
	 </ul>
	  <hr>
	  <h5><b>Equipos Gran Minería</b></h5>
      <ul>
		  <li>Ver Equipos</li>
	</ul>
	  <hr>
	  <h5><b>Compañias Mineras</b></h5>
      <ul>
		  <li>Chile</li>
		  <li>Perú</li>
	 </ul>
	 
	 
	  </div>
	 
	  </div>
   
    <div class="col-sm-10">
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Listado de Boletines Socios</h5></div>
      <div>
		  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Fecha</th>
      <th scope="col" align="center">Ver</th>
    </tr>
  </thead>
  <tbody>
  <? 
  $i=1;
  foreach ($boletin_premium as $row) {?>
    <tr>
      <th scope="row"><?=$i;?></th>
      <td><?=$row['Texto_bol'];?></td>
      <td><?=$row['Fecha_bol'];?></td>
      <td> <a href="<?=$row['Link_bol'];?>" target="_blank"><img src="<?=URL_PM_APP;?>imagen/portal-08.png"  width="20" height="20"  /></a> </td>
    </tr>
    <? $i++; } ?>
  </tbody>
</table>
	  </div>
	  
		   
		
		  
	  </div>

    </div>
    <div class="col-sm-3">
      <div style="font-size: 11px;padding: 5px;">
         
          
	  </div>
    </div>
  </div>
  

</div>

</body>
<form id="form1" name="form1" method="post" action="<?=$pagina_menu;?>">
	<input type="hidden" name="seleccion" id="seleccion"  value="0"/>
	<input type="hidden" name="parametro" id="parametro"  value="0"/>
</form>




<?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/foot');
?> 