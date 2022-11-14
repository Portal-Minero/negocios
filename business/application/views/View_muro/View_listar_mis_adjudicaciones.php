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
  
 
 <FONT COLOR="#066293"><h3>Mis Adjudicaciones</h3></FONT>
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
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Mis Adjudicaciones Pendientes</h5></div>
      <div>
<p><b>En esta lista se visualizan las adjudicaciones ingresadas por usted, que aún no son revisadas</b></p> <hr>
<div class="table-responsive">		 
			<table class="table">
			  <thead class="thead-light">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Comprador</th>
				  <th scope="col">Fecha de Adjudicación</th>
				  <th scope="col">Ver</th>
				  <th scope="col">Fecha Ingreso</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>@mdo</td>
				   <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td>Jacob</td>
				  <td>Thornton</td>
				  <td>@fat</td>
				   <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">3</th>
				  <td>Larry</td>
				  <td>the Bird</td>
				  <td>@twitter</td>
				   <td>@mdo</td>
				</tr>
			  </tbody>
			</table>
</div>

	  </div>
	  	  
	  </div>
	  
    </div>
	
	
	<div class="col-sm-10">
	<br>
	  <div id="recientemente_actualizado" style="padding-top: 15px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 40px;">
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Mis Adjudicaciones</h5></div>
      <div>
		 
		 
		 <p><b>En esta lista se visualizan sus adjudicaciones publicadas y aprobadas en Portal Minero.</b></p> <hr>
		 <div class="table-responsive">		 
			<table class="table">
			  <thead class="thead-light">
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Comprador</th>
				  <th scope="col">Fecha de Adjudicación</th>
				  <th scope="col">Ver</th>
				   <th scope="col">Informar Cambios</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>@mdo</td>
				  <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td>Jacob</td>
				  <td>Thornton</td>
				  <td>@fat</td>
				  <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">3</th>
				  <td>Larry</td>
				  <td>the Bird</td>
				  <td>@twitter</td>
				  <td>@mdo</td>
				</tr>
			  </tbody>
			</table>
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




<?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/foot');
?> 