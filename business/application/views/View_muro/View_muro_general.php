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
  
  function boletines(){
  window.location.href = 'http://200.6.115.193/wp/app/business/muro/listado_boletines/';
  
  
  
  }
  </script>
  
</head>
<body>
  
  <br><br>
<div class="container">
<div id="informacion_cliente_muro" >
	<h3 style="color:#066293"><spam id="titulo_general" >Muro de Actividades</h3>			
</div><hr>
	  <button onclick="boletines();" type="button" class="btn btn-primary btn-sm"  >Ver Boletines Exclusivo De Socios</button>
	  <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
  Agradecemos reportar algún problema
</button>
		
		<br>
		
		<hr>
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;"  class="ocultar-div">
  
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
      <th scope="row"><strong>Nombre Usuario</strong></th>
      <td><?=$nombre_usuario?></td>
      <td><strong>Nombre Ejecutivo</strong></td>
      <td><?=$nombre_vendedor;?></td>
	  <td><b>Tipo Membresía</b></td>
      <td><?=$membresia;?></td>
    </tr>
    <tr>
      <th scope="row"><b>RUT o ID</b></th>
      <td><?=$rut_id_socio?></td>
      <td><strong>Email</strong></td>
      <td><?=$email_vendedor;?></td>
	  <td><b>Inicio</b></td>
      <td><?=$fecha_inicio;?></td>
    </tr>
	<tr>
      <th scope="row"><strong>Empresa </strong></th>
      <td><?=$nombre_socio?></td>
      <td><strong>Telefono </strong></td>
      <td><?=$fono_vendedor;?></td>
	  <td><strong>Renovación</strong></td>
      <td><?=$fecha_renovacion;?></td>
    </tr>
	
	
    
  </tbody>
</table>
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
    <?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/menu_general_proyectos',$sectores);
     ?> 
	 
	 
	  
    </div>
    <div class="col-sm-7">
	  <div id="recientemente_actualizado" >
	
	<div  style="background-color: #066293;"><h5 style="color:white;">Recientemente Actualizado</h5></div>
      <div>
		  <img src="<?=URL_PM_APP;?>imagen/portal-06.png"  width="28" height="28" />&nbsp;&nbsp;<b>Área de Proyectos</b>
		  <ul>
			  <?
                foreach ($recientemente_actualizado_proyectos as $row)
				  {
					  $date = date_create($row['Fecha_actualizacion_pro']);
				      echo "<li><a href='".URL_PM_APP_NEG."Fichaproyecto/ficha_proyectos/".$row['id_pro']."/1/0/' target='_parent'>".$row['Nombre_pro']."&nbsp;&nbsp;actualizado el&nbsp;&nbsp;".date_format( $date,"d/m/Y" )."</a></li>"; 
					  
					 
				     
				  }

            ?>
		  </ul> 
	  </div>
	  <hr>
	  <div>
		  <img src="<?=URL_PM_APP;?>imagen/portal-08.png"  width="28" height="28" />&nbsp;&nbsp;<b>Área de Licitaciones</b>
		  <ul>
			  <?
                foreach ($recientemente_actualizado_licitaciones as $row)
				  {
					  $date = date_create($row['Fecha_creacion_lici']);
				      echo "<li><a href='#' target='_parent'>".$row['Nombre_lici_completo']."&nbsp;&nbsp;actualizado el&nbsp;&nbsp;".date_format( $date,"d/m/Y" )."</a></li>"; 
				      
				     
				  }

            ?>
		  </ul>
	  </div>
	  
		    
		  
		  
	  </div>

    </div>
    <div class="col-sm-3">
      <div style="font-size: 11px;padding: 5px;">
          <p><b>Su historial más reciente</b></p>
		  <ul>
		  <?
                foreach ($actividad_usuario as $rowac){
				  echo "<li><a href='".URL_PM_APP_NEG."Fichaproyecto/ficha_proyectos/".$rowac['id_registro']."/1/0/'>".$rowac['texto']."</a></li>";
				}  
				  
		   ?>
				  
          </ul>
		  <hr>
          
	  </div>
    </div>
  </div>
  <!-- Modal -->
  
  
  
				
				
				
				
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><h4>Agradecemos su colaboración</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
			   
			   
			   <form>
						  <div class="form-group">
							<label for="exampleFormControlInput1">Remitente</label>
							<input type="text" id="camb_remitente" class="form-control"  placeholder=""  readonly value="<?=$this->session->userdata('SES_nombre_completo_socio');?>">
						  </div>
						  
						  <div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" id="camb_email" placeholder="name@example.com" value="<?=$this->session->userdata('SES_email_socio');?>" readonly>
						  </div>
						  
						  <div class="form-group">
							<label for="exampleFormControlInput1">Teléfono</label>
							<input type="text" id="camb_proyecto" class="form-control"  placeholder="" value="<?=$this->session->userdata('SES_fono_user_socio');?>"  readonly>
						  </div>
						  
						  
						  <div class="form-group">
							<label for="exampleFormControlTextarea1"><b>Sugerencias</b></label>
							<textarea class="form-control" id="camb_cambios" rows="3"></textarea>
						  </div>
				</form>

		   

			  </div>
			  <div class="modal-footer">
				
				<button onclick="enviar_sugerencias();" type="button" class="btn btn-primary" data-dismiss="modal" >Enviar Sugerencia</button>
			  </div>
			</div>
		  
</div>
<!-- Fin Modal -->
</div><br><br><br><br><br>
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