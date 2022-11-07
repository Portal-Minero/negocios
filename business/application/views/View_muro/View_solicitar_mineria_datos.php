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
  padding-left: 30px;" class="ocultar-div">
  <FONT COLOR="#066293"><h3>Solicitar más información de <?=$producto?></h3></FONT>
 
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
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Formulario <?=$producto?></h5></div>
      <div>
		<div class="modal-body">
			   
			   
			   <form>
			  <p><h4>Información de Socio</h4><p>
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
					<p><h4>Requerimiento</h4><p>	
<div class="form-group">
							<label for="exampleFormControlInput1">Empresa a Contactar</label>
							<input type="email" class="form-control" id="camb_email" placeholder="Empresa" value="">
						  </div>
<div class="form-group">
							<label for="exampleFormControlInput1">Persona</label>
							<input type="email" class="form-control" id="camb_email" placeholder="Persona" value=""
						  </div>
<div class="form-group">
							<label for="exampleFormControlInput1">Cargo</label>
							<input type="email" class="form-control" id="camb_email" placeholder="Cargo" value="" >
						  </div>						  
						  
						  <div class="form-group">
							<label for="exampleFormControlTextarea1"><b>Comentarios:</b></label>
							<textarea class="form-control" id="camb_cambios" rows="3"></textarea>
						  </div>
						  
						  
				</form>

		   

			  </div>
			  <div class="modal-footer">
				
				<button onclick="enviar_sugerencias();" type="button" class="btn btn-primary" data-dismiss="modal" >Enviar Solicitud</button>
			  </div>
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