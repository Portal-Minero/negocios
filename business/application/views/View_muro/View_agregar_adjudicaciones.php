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
      <div>
      
      <label for="inputPassword5" class="form-label">Nombre Adjudicacion <FONT COLOR="red">&nbsp;(*)</FONT></label>
				<input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
				
				
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
      <td><label for="inputPassword5" class="form-label">Adjudicación Trimestre <FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
			   
				
				<option value="">- trimestre -</option>
				<option value="1">1° Trimestre</option>
				<option value="2">2° Trimestre</option>
				<option value="3">3° Trimestre</option>
				<option value="4">4° Trimestre</option>
				
			</select></td>
      <td><label for="inputPassword5" class="form-label">Adjudicación Año<FONT COLOR="red">&nbsp;(*)</FONT></label>
					<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
					<option value="">- Año -</option>
					<? for ($i = 2010; $i <= 2073; $i++) { ?>
					
					  <option value="<?=$i;?>"><?=$i;?></option> 
					  <? }?>
					</select></td>
      <td><label for="inputPassword5" class="form-label">Nombre Proyecto</label>
				<input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"><span style="font-size:10px; font-weight:bold; color:#999;">Si corresponde,  indique el proyecto de inversión del cual proviene este contrato.</span></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><label for="inputPassword5" class="form-label">Fecha Inicio Contrato</label>
				<input type="date" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Texto adjudicacion"><span style="font-size:10px; font-weight:bold; color:#999;">En caso que corresponda.</span></td>
      <td><label for="inputPassword5" class="form-label">Duración Días Contrato </label>
				<input type="number" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Numero dias contrato"><span style="font-size:10px; font-weight:bold; color:#999;">Indice el numero de dias.</span></td>
      <td><label for="inputPassword5" class="form-label">Licitación:</label>
				<input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Texto Licitación"><span style="font-size:10px; font-weight:bold; color:#999;">Si corresponde, indique la licitación de la que proviene este contrato.</span></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td> <label for="inputPassword5" class="form-label">Monto Aproximado (USD) <FONT COLOR="red">&nbsp;(*)</FONT></label>
				<input type="number" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Numero dias contrato"></td>
      <td><label for="inputPassword5" class="form-label">Rango Monto (USD)<FONT COLOR="red">&nbsp;(*)</FONT><FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
			   
				
				<option value="">- Seleccione Rango (USD) -</option>
																					<option value="1">0 a 10.000</option>
																					<option value="2">10.001 a 20.000</option>
																					<option value="54">20.001 a 30.000</option>
																					<option value="55">30.001 a 40.000</option>
																					<option value="56">40.001 a 50.000</option>
																					<option value="3">50.001 a 75.000</option>
																					<option value="4">75.001 a 100.000</option>
																					<option value="5">100.001 a 200.000</option>
																					<option value="6">200.001 a 300.000</option>
																					<option value="7">300.001 a 400.000</option>
																					<option value="8">400.001 a 500.000</option>
																					<option value="9">500.001 a 600.000</option>
																					<option value="10">600.001 a 700.000</option>
																					<option value="11">700.001 a 800.000</option>
																					<option value="12">800.001 a 900.000</option>
																					<option value="13">900.001 a 1.000.000</option>
																					<option value="14">1.000.001 a 2.000.000</option>
																					<option value="15">2.000.001 a 3.000.000</option>
																					<option value="16">3.000.001 a 4.000.000</option>
																					<option value="17">4.000.001 a 5.000.000</option>
																					<option value="18">5.000.001 a 6.000.000</option>
																					<option value="19">6.000.001 a 7.000.000</option>
																					<option value="20">7.000.001 a 8.000.000</option>
																					<option value="21">8.000.001 a 9.000.000</option>
																					<option value="22">9.000.001 a 10.000.000</option>
																					<option value="25">10.000.001 a 20.000.000</option>
																					<option value="26">20.000.001 a 30.000.000</option>
																					<option value="27">30.000.001 a 40.000.000</option>
																					<option value="28">40.000.001 a 50.000.000</option>
																					<option value="29">50.000.001 a 60.000.000</option>
																					<option value="30">60.000.001 a 70.000.000</option>
																					<option value="31">70.000.001 a 80.000.000</option>
																					<option value="32">80.000.001 a 90.000.000</option>
																					<option value="33">90.000.001 a 100.000.000</option>
																					<option value="34">100.000.001 a 200.000.000</option>
																					<option value="35">200.000.001 a 300.000.000</option>
																					<option value="36">300.000.001 a 400.000.000</option>
																					<option value="37">400.000.001 a 500.000.000</option>
																					<option value="38">500.000.001 a 600.000.000</option>
																					<option value="39">600.000.001 a 700.000.000</option>
																					<option value="40">700.000.001 a 800.000.000</option>
																					<option value="41">800.000.001 a 900.000.000</option>
																					<option value="42">900.000.001 a 1.000.000.000</option>
																					<option value="43">1.000.000.001 a 2.000.000.000</option>
																					<option value="44">2.000.000.001 a 3.000.000.000</option>
<option value="45">3.000.000.001 a 4.000.000.000</option>
<option value="46">4.000.000.001 a 5.000.000.000</option>
<option value="47">5.000.000.001 a 6.000.000.000</option>
<option value="48">6.000.000.001 a 7.000.000.000</option>
<option value="50">8.000.000.001 a 9.000.000.000</option>
<option value="51">9.000.000.001 a 10.000.000.000</option>
<option value="53">Mayor a 10.000.000.001</option>
				
			</select></td>
      <td>
	  <label for="inputPassword5" class="form-label">Vía de Adjudicación<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
			   
				
				<option value="">- Sector Comprador: -</option>
																					<option value="">- Sector -</option>
																																<option value="2">Energía</option>
																						<option value="7">Forestal</option>
																						<option value="6">Industrial</option>
																						<option value="3">Infraestructura</option>
																						<option value="4">Inmobiliario</option>
																						<option value="1">Minería</option>
																						<option value="5">Sanitario</option>
																			</select>
				
			</select>
			</td>
    </tr>
	<tr>
      <th scope="row">4</th>
      <td><label for="inputPassword5" class="form-label">Comprador<FONT COLOR="red">&nbsp;(*)</FONT></label>
				<input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"></td>
      <td><label for="inputPassword5" class="form-label">Pais<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
			   
				
				<option value="">- Pais -</option>
																					<option value="1">Licitación Abierta</option>
																					<option value="2">Licitación Cerrada</option>
																					<option value="3">Adjudicación Directa</option>
																			</select>
				
			</select></td>
      <td><label for="inputPassword5" class="form-label">Región<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
			   
				
				<option value="">- Seleccione Región -</option>
																					<option value="1">Licitación Abierta</option>
																					<option value="2">Licitación Cerrada</option>
																					<option value="3">Adjudicación Directa</option>
																			</select>
				
			</select></td>
    </tr>
	
  </tbody>
</table>
<hr>
<label for="inputPassword5" class="form-label">Vía de Adjudicación<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="tipo" id="tipo">
			   
				
				<option value="">- Seleccione Vía de Adjudicación -</option>
																					<option value="1">Licitación Abierta</option>
																					<option value="2">Licitación Cerrada</option>
																					<option value="3">Adjudicación Directa</option>
																			</select>
				
			</select>
 <span class="input-group-text"><br><b>Equipos, Suministros y/o Servicios Adjudicados<FONT COLOR="red">&nbsp;(*)</FONT></b></span>
  <textarea class="form-control" aria-label="With textarea"></textarea>   

<span class="input-group-text"><br><b>Descripción de la Adjudicación<FONT COLOR="red">&nbsp;(*)</FONT></b></span>
  <textarea class="form-control" aria-label="With textarea"></textarea>  <hr>
      <FONT COLOR="red">&nbsp;<b>(*)  Los campos marcados son obligatorios</b></FONT><br>
      <br><button onclick="retorna_sectores_selecionados();" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  Grabar Adjudicación
</button>
      
      
	  </div>
	  	  
	  </div>
	  
    </div>
	
	
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