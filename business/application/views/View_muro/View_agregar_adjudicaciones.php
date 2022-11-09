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
  padding-left: 30px;-moz-border-radius:8px 8px 0px 0px; " >
  
 
 <FONT COLOR="#066293"><h3>Información Adjudicación <?=$this->session->userdata('SES_nombre_completo_socio');?></h3></FONT>
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
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Datos de la adjudicación</h5></div>
	<br>
      <div style="position:relative;-moz-border-radius: 10px;-webkit-border-radius: 10px;border-radius: 10px;background-color:#fff;height:40px; margin-bottom:2px;border:1px solid #109aa5;">
              <div style="position:relative;width:90%;float:right;padding:3px 9px;line-height:15px">Estimado(a) <?=$this->session->userdata('SES_nombre_completo_socio');?>, mientras más completa sea la información ingresada, más antecedentes tendrán los mandantes para visualizar su calidad como proveedor.</div>
              <div style="position:absolute; float:left; top:-14px; left:10px; right:auto; bottom:auto;"><img src="http://pm.portalminero.com/images/atencion.gif" style="filter:saturate(2.8);" width="39" height="51"></div></div>
	  	  
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