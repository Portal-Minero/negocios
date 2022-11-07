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
   <script src="<?=URL_PM_APP?>js/directorio.js"></script>
  
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



	
	<script>
	$(document).ready(function() {
			$("#image").on('change', function() {				
				$(".announce").html('<div class="alert alert-info">Process...</div>');
				var formData = new FormData();
				var files = $('#image')[0].files[0];
				formData.append('file',files);
				$.ajax({
					url: '<?=URL_PM_APP_NEG;?>Directorio/sube_imagen/',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function(response) {
						if (response.slice(0, 7) != "[ERROR]") {
							var direccion ="<?=URL_PM_BASE;?>images_dp/"+response;
							$(".announce").html('<div class="alert alert-success">Uploaded OK</div>');
							$(".card-img-top").attr("src", direccion);
							$("#hiddenImagen").val(response);
							
							
						} else {
							var error_str = response.replace("[ERROR]", "");
							$(".announce").html('<div class="alert alert-danger">An error has ocurred: <b>' + error_str + '</b></div>');
						}
					}
				});
				return false;
			});
		});
  </script>
  <br><br>
 
<div class="container">
		
		
	
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;" >
  
 
 <FONT COLOR="#066293"><h3>Editar Directorio <?=$this->session->userdata('SES_nombre_completo_socio');?></h3></FONT>
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
	
		  <div >
		  
<div class="mb-3" align="center">
 <input type="hidden" name="hiddenImagen" id="hiddenImagen" value="<?=$row['Imagen'];?>" />
  <form method="post" action="#" enctype="multipart/form-data">
					<div class="card" style="width: 25rem;">
						 <p align="center"><img  class="card-img-top" src="<?=URL_PM_BASE?>images_dp/<?=$row['Imagen'];?>" style="max-width:200px;"></p>
						<div class="card-body">
							<div class="form-group">
								<label for="image">Cambiar Logo Empresa</label>
								
								<input type="file" class="btn btn-primary btn-s" name="image" id="image" >
							</div>
						</div>
					</div>
				</form>
</div>
     </div><br>
		  
		 
	 
	 
	 <div id="cuadro_uno" class="cuadro_datos_uno" >
		    <div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Información de la empresa.</h5></div>
			<form>
  <div class="form-group">
  
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" value="<?=$row['Nombre'];?>">
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">País</label>
    <input type="text" class="form-control" id="Pais" placeholder="País" value ="<?=$row['Pais'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ciudad</label>
    <input type="text" class="form-control" id="Ciudad" placeholder="Ciudad" value ="<?=$row['Ciudad'];?>">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlInput1">Dirección</label>
    <input type="text" class="form-control" id="Direccion" placeholder="Direccion" value ="<?=$row['Direccion'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Fono</label>
    <input type="text" class="form-control" id="Fono" placeholder="Fono" value ="<?=$row['Fono'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Fax</label>
    <input type="text" class="form-control" id="Fax" placeholder="Fax" value ="<?=$row['Fax'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="text" class="form-control" id="mail" placeholder="Email" value ="<?=$row['mail'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Casilla</label>
    <input type="text" class="form-control" id="Casilla" placeholder="Casilla" value ="<?=$row['Casilla'];?>">
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Sitio Web</label>
    <input type="text" class="form-control" id="Sitio" placeholder="Sitio Web" value ="<?=$row['Sitio'];?>">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descripción:</label>
    <textarea class="form-control" id="descripcion_full" rows="3"><?=$row['descripcion_full'];?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"> Productos y/o Servicios:</label>
    <textarea class="form-control" id="productos_servicios" rows="3"><? echo htmlentities($row['productos_servicios']);?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Sucursales:</label>
    <textarea class="form-control" id="sucursales" rows="3"><? echo nl2br(htmlentities($row['sucursales']));?></textarea>
  </div>
  
 
  <p align="right"><button onclick="informacion_directorio_update();" type="button" class="btn btn-primary btn-s"  >Graba Información</button></p>
  
</form>
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
    
	<input type="hidden" name="seleccion" id="Codigo"  value="<?=$row['Codigo'];?>"/>
	<input type="hidden" name="seleccion" id="tiene_directorio"  value="<?=$row['tiene_directorio'];?>"/>
	<input type="hidden" name="seleccion" id="seleccion"  value="0"/>
	<input type="hidden" name="parametro" id="parametro"  value="0"/>
</form>




</html>