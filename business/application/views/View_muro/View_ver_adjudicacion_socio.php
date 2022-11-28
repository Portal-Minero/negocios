<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
 $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 
 
?>



<?php
  $this->load->view('includes/header');
?>

<script>

  function seleccion_vista_buscador_proyectos(p,t){
	  	 
	  document.getElementById("seleccion").value=p;
	  document.getElementById("parametro").value=t;
	      document.form1.submit(); 
	 
  }
  
  function grabar(){
      var link = "<?=URL_PM_APP_NEG;?>muro/listar_mis_adjudicaciones/0/0/";
	  window.location.href = link;
  }
		
 </script>

<body>
  
 <br><br>
<div class="container">
		
		
		
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;-moz-border-radius:8px 8px 0px 0px; " >
  
 
 <FONT COLOR="#066293"><h3>Información Adjudicación <?=$this->session->userdata('SES_nombre_completo_socio');?></h3></FONT>
</div>
	  <p></p>
	  
	 
  <div class="row">
    <?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/menu_general_proyectos',$sectores);
     ?> 
	 
	 
    <? foreach ($adjudicacion_socio as $row) { ?>
	
	
  </div>
    <div class="col-sm-10">
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;padding:8px;"><h5 style="color:white;height: 8px;">Adjudicación : <b><?=$row['nombre_adj'];?></b></div>
    
    <form id="form1" name="agregar_adj" method="agregar_adj" action="">
    <input type="hidden" name="id_socio_adj" id="id_socio_adj"  value="0"/>
    <br>
      <div>
      
     
				
				
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><label for="trim_fecha_adj" class="form-label">Adjudicación Trimestre </label>
			<p><b><FONT COLOR="#066293"><?=$row['tri_nombre'];?></FONT></b></p></td>
      <td><label for="ano_fecha_adj" class="form-label">Adjudicación Año</label>
					<p><b><FONT COLOR="#066293"><?=$row['ano_fecha_adj'];?></FONT></b></p>
      <td><label for="id_proy_adj" class="form-label">Nombre Proyecto</label>
				<p><b><FONT COLOR="#066293"><?=$row['id_proy_adj'];?></FONT></b></p></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><label for="inicio_contrato" class="form-label">Fecha Inicio Contrato</label>
				<p><b><FONT COLOR="#066293"><?=$row['fecha_ingreso_adj'];?></FONT></b></p></td>
      <td><label for="duracion_contrato" class="form-label">Duración Días Contrato </label>
				<p><b><FONT COLOR="#066293"><?=$row['duracion_contrato'];?> Días</FONT></b></p></td>
      <td><label for="id_lici_adj" class="form-label">Licitación:</label>
				<p><b><FONT COLOR="#066293"><?=$row['id_lici_adj'];?></FONT></b></p></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td> <label for="monto_aprox_adj" class="form-label">Monto Aproximado (USD) </label>
				<p><b><FONT COLOR="#066293"><?=$row['monto_aprox_adj'];?></FONT></b></p></td>
      <td><label for="id_rango" class="form-label">Rango Monto (USD)</label>
			<p><b><FONT COLOR="#066293"><?=$row['Nombre_rango'];?></FONT></b></p></td>
      <td>
	  <label for="id_sector" class="form-label">Sector Comprador</label>
			<p><b><FONT COLOR="#066293"><?=$row['Nombre_sector'];?></FONT></b></p>
			</td>
    </tr>
	<tr>
      <th scope="row">4</th>
      <td><label for="otro_comprador" class="form-label">Comprador</label>
				<p><b><FONT COLOR="#066293"><?=$row['otro_comprador'];?></FONT></b></p></td>
      <td><label for="pais" class="form-label">Pais</label>
			<p><b><FONT COLOR="#066293"><?=$row['Nombre_pais'];?></FONT></b></p></td>
      <td><label for="region" class="form-label">Región</label>
			<p><b><FONT COLOR="#066293"><?=$row['Nombre_region'];?></FONT></b></p></td>
    </tr>
	
  </tbody>
</table>

<label for="id_via" class="form-label">Vía de Adjudicación</label>
			<p><b><FONT COLOR="#066293"><ul>
  <li><?=$row['Nombre_via'];?></li>
</ul></FONT></b></p>
 <span class="equipos_suministros"><b>Equipos, Suministros y/o Servicios Adjudicados</b></span>
  <p><b><FONT COLOR="#066293"><p><b><FONT COLOR="#066293"><?=htmlentities($row['equipos_suministros']);?></FONT></b></p></FONT></b></p>  

<span class="descripcion_adj"><b>Descripción de la Adjudicación</b></span>
  <br><p><b><FONT COLOR="#066293"><?=$row['descripcion_adj'];?></FONT></b></p>  <hr>
      <br>
      <br><button onclick="grabar();" type="button" class="btn btn-primary btn-sm">Volver Listado</button>  <b id="rmsg"></b>
      
      
	  </div>
	  
      </form>
      
      	    
	  </div>
	  
    </div>
	 <?  } ?>
	
  <div class="col-sm-10">
	<br>
	  
	  
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