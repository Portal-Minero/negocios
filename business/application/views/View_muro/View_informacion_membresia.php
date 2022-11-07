<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
 $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 
 
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
		
		
		
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;" >
  
 
 <FONT COLOR="#066293"><h3>Información Membresía</h3></FONT>
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
    <?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/menu_general_proyectos',$sectores);
     ?> 
	  </div>
    <div class="col-sm-10">
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Datos Usuario</h5></div>
      <div>
		  <ul>
  <li><b>Nombre</b> : &nbsp;&nbsp;<?=$nombre_usuario?></li>
   <li><b>Ruto ID</b> : &nbsp;&nbsp;&nbsp;&nbsp;<?=$rut_id_socio?></li>
   <li><b>Email</b> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;epinto@portalminero.com</li>
   <li><b>Telefono</b> : &nbsp;-</li>
  
</ul>
	  </div>
	  	  
	  </div>
	  
    </div>
	
	
	<div class="col-sm-10">
	<br>
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Datos de Ejecutivo</h5></div>
      <div>
		  <ul>
  <li><b>Nombre</b> : &nbsp;&nbsp;<?=$nombre_vendedor;?></li>
   <li><b>Email</b> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$email_vendedor;?></li>
   <li><b>Telefono</b> : &nbsp;(+562) 2225 0164</li>
  
</ul>
	  </div>
	  	  
	  </div>
	  
    </div>
	
	
	<div class="col-sm-10">
	<br>
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Datos Empresa - Membresía</h5></div>
      <div>
		  <ul>
  <li><b>Nombre</b> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$nombre_socio?></li>
   <li><b>Contacto</b> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$nombre_usuario?></li>
   <li><b>Membresía</b> :&nbsp;&nbsp;<?=$membresia;?></li>
   <li><b>Inicio</b> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$fecha_inicio;?></li>
   <li><b>Renovación</b> : &nbsp;<?=$fecha_renovacion;?></li>
  
</ul>
	  </div>
	  	  
	  </div>
	  
    </div>
	
	
	<div class="col-sm-10">
	<br>
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Otros Usuarios de su Empresa</h5></div>
      <div>
	  <ul>
		  <? foreach ($usuarios_empresa as $row) {?>
		  
		  
  <li><?=$row['nombre_completo_socio'];?></li>
   
  

		  
		   <? } ?>
		   </ul>
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




</html>