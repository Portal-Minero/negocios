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
  
  
  
  
  function trae_region(){
  var _pais = $("#pais").val();
  
  $.ajax
							  ({
							   url: ' <?=URL_PM_APP_NEG?>muro/combo_region_pais/',
							   data : { pais :_pais },
							   type : 'post',
							   cache: false,
							   
							   success: function(r3)
							   {
								 
								$("#region").html(r3);
							   }
							  
		}); 
		
  }		


function grabar(){
	 
	    $("#rmsg").html(' ');
		var _nombre_adj          =   $("#nombre_adj").val();
		var _trim_fecha_adj      =   $("#trim_fecha_adj").val();
		var _ano_fecha_adj       =   $("#ano_fecha_adj").val();
		var _id_proy_adj         =   $("#id_proy_adj").val();
		var _inicio_contrato     =   $("#inicio_contrato").val();
		var _duracion_contrato   =   $("#duracion_contrato").val();
		var _id_lici_adj         =   $("#id_lici_adj").val();
		var _monto_aprox_adj     =   $("#monto_aprox_adj").val();
		var _id_rango            =   $("#id_rango").val();
		var _id_sector           =   $("#id_sector").val();
		var _otro_comprador      =   $("#otro_comprador").val();
		var _pais                =   $("#pais").val();
		var _region              =   $("#region").val();
		var _id_via              =   $("#id_via").val();
		var _equipos_suministros =   $("#equipos_suministros").val();
		var _descripcion_adj     =   $("#descripcion_adj").val();
		var _id_socio_adj        =   0;
/*---------------------------------------------------------------------------------------------------------------------------------*/
		if(  ! val_campo_js(_nombre_adj,1,0)  ){ alert("Debe indicar  Nombre de Adjudicaci??n, texto muy corto. "); $( "#nombre_adj" ).focus(); return false }
		if(  ! val_campo_js(_trim_fecha_adj,0,0) ){ alert("Debe indicar Fecha Adjudicaci??n  ");  $( "#trim_fecha_adj" ).focus(); return false }
		if(  ! val_campo_js(_ano_fecha_adj,0,0) ){ alert("Debe indicar A??o Adjudicaci??n ");  $( "#ano_fecha_adj" ).focus(); return false }
		if(  ! val_campo_js(_monto_aprox_adj,0,0) ){ alert("Debe indicar   _monto_aprox_adj ");  $( "#monto_aprox_adj" ).focus(); return false }
		if(  ! val_campo_js(_id_rango,0,0 ) ){ alert("Debe indicar Rango Monto (USD) ");  $( "#id_rango" ).focus(); return false }
       	if(  ! val_campo_js(_otro_comprador,1,0) ){ alert("Debe indicar _otro_comprador, texto muy corto.  "); $( "#otro_comprador" ).focus(); return false }
		if(  ! val_campo_js(_id_sector,0,0) ){ alert("Debe indicar _id_sector ");  $( "#id_sector" ).focus(); return false }
        if(  ! val_campo_js( _pais,0,0)  ){ alert("Debe indicar Pa??s ");  $( "#pais" ).focus(); return false }
        if(  ! val_campo_js( _region,0,0)  ){ alert("Debe indicar Regi??n ");  $( "#region" ).focus(); return false }
        if(  ! val_campo_js(_id_via,0,0 ) ){ alert("Debe indicar V??a de Adjudicaci??n ");  $( "#id_via" ).focus(); return false }
		if(  ! val_campo_js(_equipos_suministros,1,0) ){ alert("Debe indicar Equipos y suministros ");  $( "#equipos_suministros" ).focus(); return false }
        if(  ! val_campo_js(_descripcion_adj,1,0) ){ alert("Debe indicar Descripci??n de la Adjudicaci??n ");  $( "#descripcion_adj" ).focus(); return false } 
 
/*---------------------------------------------------------------------------------------------------------------------------------*/		



     $.ajax
							  ({
							    url: ' <?=URL_PM_APP_NEG?>muro/graba_adjudicaciones_usuario/',
							   data : { 

										nombre_adj         : _nombre_adj,
										trim_fecha_adj     : _trim_fecha_adj,
										ano_fecha_adj      : _ano_fecha_adj,
										id_proy_adj        : _id_proy_adj,
										inicio_contrato    : _inicio_contrato,
										duracion_contrato  : _duracion_contrato,
										id_lici_adj        : _id_lici_adj,
										monto_aprox_adj    : _monto_aprox_adj,
										id_rango           : _id_rango,
										id_sector          : _id_sector,
										otro_comprador     : _otro_comprador,
										pais               : _pais,
										region             : _region,
										id_via             : _id_via,
										equipos_suministros: _equipos_suministros,
										descripcion_adj    : _descripcion_adj,
										id_socio_adj      : _id_socio_adj


							   },
							   
							   type : 'post',
							   cache: false,
							   
							   success: function(r3)
							   {
								 
								$("#rmsg").html(r3);
							   }
							  
		}); 
		



 }		






		
 </script>

<body>
  
 <br><br>
<div class="container">
		
		
		
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;-moz-border-radius:8px 8px 0px 0px; " >
  
 
 <FONT COLOR="#066293"><h3>Informaci??n Adjudicaci??n <?=$this->session->userdata('SES_nombre_completo_socio');?></h3></FONT>
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
	
	<div  style="background-color: #066293;padding:8px;"><h5 style="color:white;height: 60px;"><br>Estimado(a)  <?=$this->session->userdata('SES_nombre_completo_socio');?>, mientras m??s completa sea la informaci??n ingresada, m??s antecedentes tendr??n los mandantes para visualizar su calidad como proveedor.</h5></div>
    
    <form id="form1" name="agregar_adj" method="agregar_adj" action="">
    <input type="hidden" name="id_socio_adj" id="id_socio_adj"  value="0"/>
    <br>
      <div>
      
      <label for="nombre_adj" class="form-label">Nombre Adjudicacion <FONT COLOR="red">&nbsp;(*)</FONT></label>
				<input type="text" id="nombre_adj" class="form-control" aria-describedby="passwordHelpBlock">
				
				
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
      <td><label for="trim_fecha_adj" class="form-label">Adjudicaci??n Trimestre <FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="trim_fecha_adj" id="trim_fecha_adj">
			   
				
				<option value="">- trimestre -</option>
				<option value="1">1?? Trimestre</option>
				<option value="2">2?? Trimestre</option>
				<option value="3">3?? Trimestre</option>
				<option value="4">4?? Trimestre</option>
				
			</select></td>
      <td><label for="ano_fecha_adj" class="form-label">Adjudicaci??n A??o<FONT COLOR="red">&nbsp;(*)</FONT></label>
					<select  style="width: 100%px" class="combobox form-control" name="ano_fecha_adj" id="ano_fecha_adj">
					<option value="">- A??o -</option>
					<? for ($i = 2010; $i <= 2073; $i++) { ?>
					
					  <option value="<?=$i;?>"><?=$i;?></option> 
					  <? }?>
					</select></td>
      <td><label for="id_proy_adj" class="form-label">Nombre Proyecto</label>
				<input type="text" id="id_proy_adj" class="form-control" aria-describedby="passwordHelpBlock"><span style="font-size:10px; font-weight:bold; color:#999;">Si corresponde,  indique el proyecto de inversi??n del cual proviene este contrato.</span></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><label for="inicio_contrato" class="form-label">Fecha Inicio Contrato</label>
				<input type="date" id="inicio_contrato" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Texto adjudicacion"><span style="font-size:10px; font-weight:bold; color:#999;">En caso que corresponda.</span></td>
      <td><label for="duracion_contrato" class="form-label">Duraci??n D??as Contrato </label>
				<input  onkeypress="return valideKey(event);" type="text" id="duracion_contrato" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Numero dias contrato"><span style="font-size:10px; font-weight:bold; color:#999;">Indice el numero de dias.</span></td>
      <td><label for="id_lici_adj" class="form-label">Licitaci??n:</label>
				<input type="text" id="id_lici_adj" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Texto Licitaci??n"><span style="font-size:10px; font-weight:bold; color:#999;">Si corresponde, indique la licitaci??n de la que proviene este contrato.</span></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td> <label for="monto_aprox_adj" class="form-label">Monto Aproximado (USD) <FONT COLOR="red">&nbsp;(*)</FONT></label>
				<input type="text" id="monto_aprox_adj" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Monto Aproximado"  pattern="[0-9]+" onkeypress="return valideKey(event);" ></td>
      <td><label for="id_rango" class="form-label">Rango Monto (USD)<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="id_rango" id="id_rango">
			   
				
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
	  <label for="id_sector" class="form-label">Sector Comprador<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="id_sector" id="id_sector">
			   
				
				
																					<option value="">- Sector -</option>
																						<option value="2">Energ??a</option>
																						<option value="7">Forestal</option>
																						<option value="6">Industrial</option>
																						<option value="3">Infraestructura</option>
																						<option value="4">Inmobiliario</option>
																						<option value="1">Miner??a</option>
																						<option value="5">Sanitario</option>
																			</select>
				
			</select>
			</td>
    </tr>
	<tr>
      <th scope="row">4</th>
      <td><label for="otro_comprador" class="form-label">Comprador<FONT COLOR="red">&nbsp;(*)</FONT></label>
				<input type="text" id="otro_comprador" class="form-control" aria-describedby="passwordHelpBlock"></td>
      <td><label for="pais" class="form-label">Pais<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="pais" id="pais" onchange="trae_region();">
           <option value="">- Seleccione Pais -</option>
			<option value="81">Chile</option>
			   <? foreach ($paises as $row)  {?>
				<option value="<? echo $row['id_pais']; ?>"><? echo $row['Nombre_pais']; ?></option>
				 <? } ?>
				</select>
				
			</select></td>
      <td><label for="region" class="form-label">Regi??n<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="region" id="region">
			   
				
				<option value="">- Seleccione Regi??n -</option>
				
				
																			</select>
				
			</select></td>
    </tr>
	
  </tbody>
</table>
<hr>
<label for="id_via" class="form-label">V??a de Adjudicaci??n<FONT COLOR="red">&nbsp;(*)</FONT></label>
			<select  style="width: 100%px" class="combobox form-control" name="id_via" id="id_via">
			   
				
				<option value="">- Seleccione V??a de Adjudicaci??n -</option>
																					<option value="1">Licitaci??n Abierta</option>
																					<option value="2">Licitaci??n Cerrada</option>
																					<option value="3">Adjudicaci??n Directa</option>
																			</select>
				
			</select>
 <span class="equipos_suministros"><br><b>Equipos, Suministros y/o Servicios Adjudicados<FONT COLOR="red">&nbsp;(*)</FONT></b></span>
  <textarea id="equipos_suministros" class="form-control" aria-label="With textarea"></textarea>   

<span class="descripcion_adj"><br><b>Descripci??n de la Adjudicaci??n<FONT COLOR="red">&nbsp;(*)</FONT></b></span>
  <textarea id="descripcion_adj" class="form-control" aria-label="With textarea"></textarea>  <hr>
      <FONT COLOR="red">&nbsp;<b>(*)  Los campos marcados son obligatorios</b></FONT><br>
      <br><button onclick="grabar();" type="button" class="btn btn-primary btn-sm">Enviar Adjudicaci??n</button>  <b id="rmsg"></b>
      
      
	  </div>
	  
      </form>
      
      	    
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