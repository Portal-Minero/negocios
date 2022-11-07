<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
 $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 $id_user_socio= 0;
 
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
  
  
  function informacion_directorio_update(){
	  	  
	 
	  window.location.href = "<?=URL_PM_APP_NEG;?>Directorio/informacion_directorio_update/";
  }
  </script>
   
</head>
<body>
  
  <br><br>
<div class="container">
		
		
		
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;" >
  
 
 <FONT COLOR="#066293"><h3>Información Directorio Socio</h3></FONT>
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
    <?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/menu_general_proyectos',$sectores);
     ?> 
	  </div>
	  
	  
	  
	<? foreach ($datos_general as $row) {
		$id_user_socio= $row['id_user_socio'];
	?>  
	
    <div class="col-sm-10">
	<p align="right"><button onclick="informacion_directorio_update();" type="button" class="btn btn-primary btn-s"  >Editar Información</button></p><hr>
		  <div >
		    
		 <p align="center"><img src="<?=URL_PM_BASE?>images_dp/<?=$row['Imagen'];?>" style="max-width:200px;"></p>

     </div><br>
		  <div id="cuadro_uno" class="cuadro_datos_uno" >
		    <div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Descripción General</h5></div>
			<?=$row['descripcion_full'];?>

     </div><br>
		  <div id="cuadro_uno" class="cuadro_datos_uno" >
		    <div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Datos de Contacto</h5></div>
			<ul>
			  <li><b>Nombre</b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['Razon_social_socio'];?></li>
			  <li><b>Dirección</b>&nbsp;&nbsp;<?=$row['Direccion'];?></li>
			  <li><b>Ciudad</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['Ciudad'];?></li>
			  <li><b>País</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['Pais'];?></li>
			  <li><b>Teléfono</b>&nbsp;&nbsp;<?=$row['Fono'];?></li>
			  <li><b>Mail</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['mail'];?></li>
			  
			  <li><b>Sitio Web</b>&nbsp;&nbsp;<a href="http://<?=$row['Sitio'];?>" target="_blank"><?=$row['Sitio'];?></a></li>
			</ul>

     </div><br>
	 
	 
	 <div id="cuadro_uno" class="cuadro_datos_uno" >
		    <div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Sucursales</h5></div>
			<? echo nl2br(htmlentities($row['sucursales']));?>

     </div><br>
	 
	 <div id="cuadro_uno" class="cuadro_datos_uno" >
	 
		    <div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Productos o Servicios</h5></div>
			
			  <? echo nl2br(htmlentities($row['productos_servicios']));?>
			  
			  
			
			

     </div><br>
	
	<? } ?>  
	
	

	
	
	
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




</html>