<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
  $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
  
  $timestamp          = strtotime($datos_general->Fecha_actualizacion_pro); 
  $newDateFecha_actu  = date("m-d-Y", $timestamp );
  
  
/* ---------- programacion graficos de graficos_proyectos.php ------*/ 
$sector_grafico ="";
$array_color    = ['#FA0000', '#0b4ff8', '#45ad0a','#ff5733', '#95F2FF', '#FCFF33','#BD95FF', '#FF33DD', '#45ad0a','#37A400', '#0b4ff8', '#45ad0a','#00A1A4', '#A51107', '#FEACFF','#FCFF33','#ff5733', '#FF33DD'];



if($sector_elegido==9){ $sector_grafico = "Sugeridos";}
if($sector_elegido==0){ $sector_grafico = "Todos";}
if($sector_elegido==1){ $sector_grafico = "Minería";}
if($sector_elegido==2){ $sector_grafico = "Energía";}
if($sector_elegido==3){ $sector_grafico = "Infraestructura";}
if($sector_elegido==4){ $sector_grafico = "Inmobiliario";}
if($sector_elegido==5){ $sector_grafico = "Sanitario";}
if($sector_elegido==6){ $sector_grafico = "Industrial";}
if($sector_elegido==7){ $sector_grafico = "Forestal";}



$i          = 0;	
$data       = "";
$categories = "[";				  
foreach ($get_barra_grafico_proyectos as $row){
           $data=$data."{y: ".$row['total'].", color: '".$array_color[$i]."'}," ;
		   $categories =$categories. "'".$row['signo']. "',";
		   
		   
		   $i++;
} 
$data = rtrim($data, ",");
$categories = rtrim($categories, ",");
$categories = $categories. "]";




$i           = 0;	
$data_c       = "";
$categories_sector = "[";	

foreach ($get_barra_grafico_proyectos_sectores as $row){
           $data_c=$data_c."{y: ".$row['total'].", color: '".$array_color[$i]."'}," ;
		   $categories_sector =$categories_sector. "'".$row['Nombre_sector']. "',";
		   
		   
		   $i++;
} 
$data_c = rtrim($data_c , ",");
$categories_sector = rtrim($categories_sector, ",");
$categories_sector =$categories_sector. "]";


/* ---------- Fin programacion graficos ------*/ 


?>

<script src="<?=URL_PM_APP;?>js/filtros.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?=URL_PM_APP;?>highlights/js/highcharts.js"></script>
<script type="text/javascript" src="<?=URL_PM_APP;?>timeline_js/timeline-api.js"></script>
<script>SimileAjax.History.enabled = false;</script>
<script type="text/javascript" src="<?=URL_PM_APP;?>timeline_js/quarter-interval.js"></script>
<script type="text/javascript" src="<?=URL_PM_APP;?>js/timeline_proyecto.js"></script>

<body>




<script>
  
  function seleccion_menu_proyecto(p,t){
	  document.getElementById("seleccion").value=p;
	  document.getElementById("parametro").value=t;
	  document.form1.submit(); 
	 
  }
  
  
  
  function retorna_filtro_menu(parametro,id,sector){
	  
	  
	 
	   document.getElementById("__parametro_menu").value=parametro;
	   document.getElementById("__seleccion_menu").value=id;
	   document.getElementById("__va_menu").value=1;
	  
		
	   document.form_menu.submit(); 
	   
	 
	
  }
  
 </script>
 
<script>
 var estado_collapse=0;

  function ver_gantt_frm(){
		var x = document.getElementById("gantt");
		var y = document.getElementById("salto");
		if (x.style.display === "none") {
			x.style.display = "block";
			y.style.display = "block";
			
			ver_gantt();
		} else {
			x.style.display = "none";
			y.style.display = "none";
		}
	  
  }
  
  function oculta_gantt(){
	  var x = document.getElementById("gantt");
	  var y = document.getElementById("salto");
	  x.style.display = "none";
	  y.style.display = "none";
  }  
  
   function muestra_gantt(){
	  var x = document.getElementById("gantt");
	  var y = document.getElementById("salto");
	  x.style.display = "block";
	  y.style.display = "block";
  }  
  
  function mostrat_todo(){
	  if(estado_collapse==0){
		  $('.collapse').collapse('show');
		 
		  estado_collapse=1;
		  muestra_gantt();
		  ver_gantt();
		 
          document.querySelector('#mostrar_pesta').textContent = 'Cerrar Todo';
	  }else{
		  
		  
		   $('.collapse').collapse('hide');
		   estado_collapse=0;
		   oculta_gantt();
		   document.querySelector('#mostrar_pesta').textContent = 'Mostar Todo';
	  }

 }
 
 
 function mostrat_todocccc(){
  
  $('.collapse').collapse('show');
  var r = $('.collapse').collapse('show');
  alert  ( $('.collapse').value()    );
  muestra_gantt();
  ver_gantt();

 }
 
 
 
 function imprim1(){
	 location.reload();
var printContents = document.getElementById('accordion').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;}
</script>
	
  
  <br><br><br>

<div class="container" style="width: 70%;">



<div id="informacion_cliente_muro" >
				<div align="left"><h3 style="color:#066293"><spam id="titulo_general" >Ficha Proyecto</h3>	
</div>
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
  
    <?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/menu_opcion_izquierdo_general',$sectores);
     ?> 


	
	
	
    <div class="col-sm-7">
	  <div id="contenedor_menu" >
	
	<div><h3 style="color:#066293"><spam id="titulo_general" ><?=$datos_general->Nombre_pro;?></h3></div>
      
	  
	  <div  id="contenedor_menu_lateral" style="background: none;
">
		   <p align="center"><font face="Helvetica Neue,Helvetica,Arial,sans-serif" color="red" size=3><b>Ultima Información</b></font></p>
		   
  <p><b>
   <?
	   $descrip_ultima_informacion_pro = str_replace("\n","<br>",$datos_general->ultima_informacion_pro);
	   echo $descrip_ultima_informacion_pro;
   ?>
  
   </b></p>
	  </div>
	  <hr>
	  
	 
      
	  
	  
<div  id="contenedor_menu_lateral" style="background: none;border: 0px">
	       
		   <button type="button" id="mostrar_pesta" class="btn btn-primary btn-sm"  align="left" onclick="mostrat_todo()">Mostar Todo</button>
		   <button type="button" class="btn btn-primary btn-sm"  align="right">Adjuntos (0)</button>
		   <button type="button" class="btn btn-primary btn-sm"  align="right"  onclick="imprim1();">Imprimir</button>
	  </div>
	  <br><br>
	 
	 
	  
  	 


<!-- Inicio Tabla Buscador -->

  <div class="panel-group" id="accordion">
  
    <div class="panel panel-default">
			  <?

		if($tiene_rca > 0 ){ ?>
			
			          <DIV style="position: absolute; left: 380px; top: 200px; z-index: 1;">
						 <img src='https://pm.portalminero.com/images/evahamb.png' width='120' />
					   </DIV>
		<? }
	
	
?>
      <div class="panel-heading">
        <h4 class="panel-title">
          <a onclick="oculta_gantt();" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Información Básica</a>

        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
		
		<table class="table table-responsive table-bordered" >
		
		
		
		
					
				   <tbody>  
				   <tr>
					<td><div align="left"><b>Nombre Sector</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><b><?=$datos_general->Nombre_sector;?></b></div></td>
				   </tr>
				   <tr>
					<td><div align="left"><b>Tipos</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left">
					
					
                     <?
					    foreach($proyecto_tipos as $tipo){
						echo "<a href='javascript:retorna_filtro_menu(\"select_get_proyectos_tipo\",".$tipo->id_tipo.",0)'>".$tipo->Nombre_tipo."</a><br>";
					  }
                    ?>
					
					
					
					</div></td>
				   </tr>
				   <tr>
					<td><div align="left"><b>Inversión</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><b>USD <?=number_format($datos_general->Inversion_pro, 0, ",", ".");?> </b></div></td>
				   </tr>
				   <tr>
					<td><div align="left"><b>Producción</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><b><?=$datos_general->Produccion_pro;?>&nbsp;<?=$datos_general->Sigla_med;?></b></div></td>
					
					
				   </tr>
				   <tr>
					<td><div align="left"><b>Mandante</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><b><a href="javascript:retorna_filtro_menu('select_get_mandantes_proyecto',<?=$datos_general->id_man_emp;?>,1,0);"><?=$datos_general->Nombre_fantasia_emp;?></a></b></div></td>
				   </tr>
				   <tr>
					<td><div align="left"><b>Propietarios</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left">
					
					 <?
                      foreach($propietarios_proyecto as $tipo){
						echo $tipo->Razon_social_emp."<br/>";
					  }
                    ?>
					
					
					
					</div></td>
				   </tr>
				   <tr>
				     
					<td><div align="left"><b>Ubicación</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left">
					  <ul>
					    <li><b>País: <a href="javascript:retorna_filtro_menu('select_get_u_pais',<?=$datos_general->id_pais;?>,0);" ><?=$datos_general->Nombre_pais;?></a>    </b></li>
					     <li><b>Región: <a href="javascript:retorna_filtro_menu('select_get_u_region',<?=$datos_general->id_region;?>,0);" ><?=$datos_general->Nombre_region;?></a> </b></li>
					    <li><b> Comuna: <?=$datos_general->Nombre_comuna;?>  </b></li>
					    <li><b><?=$datos_general->Direccion_pro;?></b></li>
				      </ul>
					  
					  </div></td>
				   </tr>
				</tbody>
				</table>

		
		
		
		</div>
      </div>
    </div>
	
	<? $descrip_pro = str_replace("\n","<br>",$datos_general->Desc_pro); ?> 
	
    <div class="panel panel-default" >
      <div class="panel-heading">
        <h4 class="panel-title" >
          <a  onclick="oculta_gantt();" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Descripcion Proyecto</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><?=$descrip_pro;?></div>
      </div>
    </div>
	
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Estado Avance</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
		<table class="table table-responsive table-bordered" >
					<thead>
					<tr style="background-color: #f5f5f7;">
						<th><div >&nbsp;</div></th>
						<th><div>&nbsp;</div></th>  
                        <th><div>&nbsp;</div></th>      
				   </tr>
				   </thead>
				   <tbody>  
				   <tr>
					<td><div align="left"><b>Etapa Actual</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><a href="javascript:retorna_filtro_menu('select_get_proyectos_etapas',<?=$etapa_actual->id_etapa?>,0);" ><?=$etapa_actual->Nombre_etapa?></a></div></td>
							
					 					 
				   </tr>
				   <tr>
					<td><div align="left"><b>Responsable</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					
					<td><div align="left"><a href="javascript:retorna_filtro_menu('select_get_responsable_etapa_actual',<?=$etapa_actual->id_emp?>,0);" ><?=$etapa_actual->Nombre_fantasia_emp?></a></div></td>
					
				   </tr>
				   <tr>
					<td><div align="left"><b>Tipo de Contrato</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><?=$etapa_actual->Nombre_tipo_contrato?></div></td>
				   </tr>
				   <tr>
					<td><div align="left"><b>Última Información</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left">
					
					
					 <?
						   $descrip_ultima_informacion_pro = str_replace("\n","<br>",$datos_general->ultima_informacion_pro);
						   echo $descrip_ultima_informacion_pro;
					   ?>
					
					</div></td>
				   </tr>
				    
				   
				</tbody>
				</table>
		
		
		
		
		
		</div>
      </div>
    </div>
	
	
	<? if( ! empty($contacto_principal) ){$collapse="collapse4";?>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h4 class="panel-title">
					  <a  onclick="oculta_gantt();" data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Contacto</a>
					</h4>
				  </div>
				  <div id="<?=$collapse;?>" class="panel-collapse collapse">
					<div class="panel-body">
					
					
					<table class="table table-responsive table-bordered" >
								<thead>
								<tr style="background-color: #f5f5f7;">
									<th><span style="padding: 5.0px;color: rgb(255,255,255);background-color: rgb(102,102,102);top: -15.0px;left: -2.0px;">Contacto Principal</span></th>
									<th></th>      
							   </tr>
							   </thead>
							   <tbody>  
								<? foreach($contacto_principal as $tipo){ ?>
							   <tr>
								<td><div align="left"><b>Nombre Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Nombre_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Empresa Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Empresa_contact;?></a></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Cargo Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Cargo_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Email Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Email_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Teléfono Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Telefono_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Dirección Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Direccion_contact;?></div></td>
							   </tr>
							   <tr  style="background-color: #f5f5f7;">
								<td><div align="left"><b></b></div></td>
								<td><div align="left"></div></td>
							   </tr>
								<? } ?>
							</tbody>
							</table>
							
							
							
							<table class="table table-responsive table-bordered" >
								<thead>
								<tr style="background-color: #f5f5f7;">
									<th><span style="padding: 5.0px;color: rgb(255,255,255);background-color: rgb(102,102,102);top: -15.0px;left: -2.0px;">Otros Contactos</span></th>
									<th></th>      
							   </tr>
							   </thead>
							   <tbody>  
								<? foreach($contacto_otros as $tipo){ ?>
							   <tr>
								<td><div align="left"><b>Nombre Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Nombre_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Empresa Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Empresa_contact;?></a></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Cargo Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Cargo_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Email Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Email_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Teléfono Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Telefono_contact;?></div></td>
							   </tr>
							   <tr>
								<td><div align="left"><b>Dirección Contacto</b></div></td>
								<td><div align="left"><?=$tipo->Direccion_contact;?></div></td>
							   </tr>
							   <tr  style="background-color: #f5f5f7;">
								<td><div align="left"><b></b></div></td>
								<td><div align="left"></div></td>
							   </tr>
								<? } ?>
							</tbody>
							</table>
					
					
					
					
					</div>
				  </div>
    </div>
	
	 <? } ?>
	
	<? if( ! empty($get_etapas_proyecto) ){$collapse="collapse5";?>
	
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				
				  <a data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>"  onclick=" ver_gantt_frm();">Carta Gantt (Línea de Tiempo)</a>
				  <div id="salto" style="display: none;">&nbsp;<br></div>
				  <div name="gantt" id="gantt" class="gantt show_gnt timeline-container timeline-horizontal" style="box-shadow: 0px 0px 4px 1px #9a9a9a;padding:10px; height:250px; font-size:10px; display: none;">&nbsp;</div>
				</h4>
			  </div>
			 
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
			   
				<div class="panel-body">
				
				
				
				
				<table class="table table-responsive table-bordered" >
							<thead>
							<tr style="background-color: #f5f5f7;">
								<th><div >
								  <div align="left"><b>Etapas</b></div>
								</div></th>
								<th><div>
								  <div align="left">Fecha Inicio</div>
								</div></th>  
								<th><div>
								  <div align="left">Fecha Término</div>
								</div></th>      
						   </tr>
						   </thead>
						   <tbody>  
						   <? foreach($get_etapas_proyecto as $row){ ?>
							<tr>
							<td><div align="left"><?=$row['Nombre_etapa'];?></div></td>
							<td><div align="left"><?=$row['trim_inicio'];?>°&nbsp;Trimestre&nbsp;<?=$row['ano_inicio'];?></div></td>
							<td><div align="left"><?=$row['trim_fin'];?>°&nbsp;Trimestre&nbsp;<?=$row['ano_fin'];?></div></td>
							
							
							</tr>
							<? } ?>
						   
						</tbody>
						</table>
						
						
						
						<table class="table table-responsive table-bordered" >
							<thead>
							<tr style="background-color: #f5f5f7;">
								<th><div >
								  <div align="left"><b>Hitos Importantes</b></div>
								</div></th>
								 
								<th><div>
								  <div align="left"><b>Fecha</b></div>
								</div></th>      
						   </tr>
						   </thead>
						   <tbody>  
						   <? foreach($get_hitos_importantes as $row){ ?>
							<tr>
							<td><div align="left"><?=$row['Nombre_hito'];?></div></td>
							
							<td><div align="left"><?=$row['trim_hito'];?>°&nbsp;Trimestre de&nbsp; <?=$row['ano_hito'];?></div></td>
							
							
							</tr>
							<? } ?>
						   
						</tbody>
						</table>
				
				
				
				</div>
			  </div>
			</div>
	 <? } ?>
	
	
	
	<? if( ! empty($get_adjudicaciones_asociadas) ){$collapse="collapse12";?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Adjudicaciones Asociadas</a>
				</h4>
			  </div>
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
				<div class="panel-body">
				
				
				<ul>
				<? foreach ($get_adjudicaciones_asociadas as $row){ ?>
					<li><a href="javascript:retorna_filtro_adjudi(<?=$row['id_adj'];?>,0);"><?=$row['descripcion_adj'];?></a></li>
				<? } ?>
				</ul>
				
				
				</div>
			  </div>
			</div>
	 <? } ?>
	 
	 
	 <? if(  $get_licitaciones_detalle !="" ){$collapse="collapse13";?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Licitaciones Asociadas</a>
				</h4>
			  </div>
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
				<div class="panel-body">
				
				
				<? echo $get_licitaciones_detalle; ?>
				
				
				</div>
			  </div>
			</div>
	 <? } ?>
	 
	 
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a  onclick="oculta_gantt();" data-toggle="collapse" data-parent="#accordion" href="#collapse6">Historial</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
		
		<? $Historial_pro = str_replace("\n","<br>",$datos_general->Historial_pro); ?> 
		<?=$Historial_pro;?>
		
		
		</div>
      </div>
    </div>
	
	<? if( ! empty($get_obras_pr) ){$collapse="collapse7";?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Obras Principales</a>
				</h4>
			  </div>
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
				<div class="panel-body">
				
				<ul>
				<? foreach ($get_obras_pr as $row){ ?>
					<li><a href="javascript:retorna_filtro_menu('select_get_obras_principales',<?=$row['id_obra'];?>,0);"><?=$row['Nombre_obra'];?></a></li>
				<? } ?>
				</ul>
				
				</div>
			  </div>
			</div>
	
    <? } ?>
 
 
 
	<? if( ! empty($get_equipo_pr) ){$collapse="collapse8";?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a  onclick="oculta_gantt();" data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Equipos Principales</a>
				</h4>
			  </div>
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
				<div class="panel-body">
				
				<ul>
				<? foreach ($get_equipo_pr as $row){ ?>
					<li><a href="javascript:retorna_filtro_menu('select_get_equipos_principales',<?=$row['id_equipo'];?>,0);"><?=$row['Nombre_equipo'];?></a></li>
				<? } ?>
				</ul>
				
				</div>
			  </div>
			</div>
			
	<? } ?>
	
	
	<? if( ! empty($get_suminis_pr) ){$collapse="collapse9";?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Suministros Principales</a>
				</h4>
			  </div>
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
				<div class="panel-body">
				
				
				<ul>
				<? foreach ($get_suminis_pr as $row){ ?>
					<li><a href="javascript:retorna_filtro_menu('select_get_suministros_principales',<?=$row['id_sumin'];?>,0);"><?=$row['Nombre_sumin'];?></a></li>
				<? } ?>
				</ul>
				
				
				</div>
			  </div>
			</div>
	 <? } ?>
	
	
	<? if( ! empty($get_servicios_pr) ){$collapse="collapse10";?>
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a  onclick="oculta_gantt();" data-toggle="collapse" data-parent="#accordion" href="#<?=$collapse;?>">Servicios Principales</a>
				</h4>
			  </div>
			  <div id="<?=$collapse;?>" class="panel-collapse collapse">
				<div class="panel-body">
				
				<?
				 function ordenanaUl($nombre,$descripciones,$link,$id){
					 $pos    = 0;
					 $li_ul  = "";
					 $pos    = strpos($descripciones, $nombre);
					 if($pos==false){
						 if($link==0){$li_ul = "<li>$nombre</li>";}else{ $li_ul = "<li><a href='javascript:retorna_filtro_menu(\"select_get_servicios_principales\",$link,0);'>$nombre</a></li>"; }
						  
					 }
					 return  $li_ul;
				 }
				
				  /*-----------------------------------*/ 
				  
				   $descripciones="";
				   foreach ($get_servicios_pr as $row){ 
				  
				 ?>
					<ul>
					   <?=ordenanaUl($row['Nombre_serv'],$descripciones,$row['id_serv'],0);?>
						 <ul>
							<?= ordenanaUl($row['Nombre_cat_serv'],$descripciones,0,0); ?>
								<ul>
								 <?= ordenanaUl($row['Nombre_sub_serv'],$descripciones,0,0);?>
							   </ul>
						 </ul>
					</ul>
					<? 
					  $descripciones=$descripciones.$row['Nombre_serv'].$row['Nombre_cat_serv'].$row['Nombre_sub_serv'];
					 } 
					?>		
					
					<? //echo $descripciones;?>
				</div>
			  </div>                 
			</div>
	 <? } ?>
	<br>
	<div>
				 
	  </div>
	
	
	
	
  </div> 
  
  


<!-- Fin Tabla Buscador -->

<table class="table table-responsive table-bordered" border="0">
					<thead>
					<tr >
						<th><div align="left"><h5> Proyecto <?=$datos_general->Nombre_pro;?>  | Fecha Actualización <?=$newDateFecha_actu;?></h5></div></th>
						
						<th><div align="right"> <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
  Informar Cambios
</button>


</div></th>      
				   </tr>
				   </thead>
				   
				</table>
		  
	  </div>

    </div>
    <div class="col-sm-3">
	
	
	
      
	  
	  
	  
	  
	  <div style="font-size: 11px;padding: 5px;">
         
			  
			  
		<div>
		  <br>	  
		  <p><b>Proyectos de <?=$sector_grafico;?> Chile</b></p>
           <div id="graficos_totales_region" style=" margin: 2 auto"></div>
		</div>
		
		<div>
		<br>
		<p><b>Proyectos en etapa de <br> Construcción<br> y Montaje en Chile:</b></p>
		  <div id="graficos_categoria" style=" margin: 2 auto"></div>
        </div>
		
		
  
	  </div>
	  
    </div>
  </div>
 

<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"><h4>Informar Cambios Proyecto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
			   
			   
			   <form>
						  <div class="form-group">
							<label for="exampleFormControlInput1">Remitente</label>
							<input type="text" id="camb_remitente" class="form-control"  placeholder=""  readonly value="<?=$nombre_completo_socio;?>">
						  </div>
						  
						  <div class="form-group">
							<label for="exampleFormControlInput1">Email</label>
							<input type="email" class="form-control" id="camb_email" placeholder="name@example.com" value="<?=$email_socio;?>" readonly>
						  </div>
						  
						  <div class="form-group">
							<label for="exampleFormControlInput1">Proyecto</label>
							<input type="text" id="camb_proyecto" class="form-control"  placeholder="" value="<?=$datos_general->Nombre_pro;?>"  readonly>
						  </div>
						  
						  
						  <div class="form-group">
							<label for="exampleFormControlTextarea1"><b>Informar Cambios</b></label>
							<textarea class="form-control" id="camb_cambios" rows="3"></textarea>
						  </div>
				</form>

		   

			  </div>
			  <div class="modal-footer">
				
				<button onclick="enviar_cambios();" type="button" class="btn btn-primary" data-dismiss="modal" >Enviar Cambios</button>
			  </div>
			</div>
		  </div>
</div>
<!-- Fin Modal -->

  
</div>

</body>
<form id="form1" name="form1" method="post" action="<?=$pagina_menu;?>">
	<input type="hidden" name="seleccion" id="seleccion"  value="0"/>
	<input type="hidden" name="parametro" id="parametro"  value="0"/>
</form>

<form id="form_menu" name="form_menu" method="post" action="<?=$pagina_menu;?>">
    <input type="hidden" name="__va_menu" id="__va_menu"  value="0"/>
	<input type="hidden" name="__seleccion_menu" id="__seleccion_menu"  value="0"/>
	<input type="hidden" name="__parametro_menu" id="__parametro_menu"  value="0"/>
	<input type="hidden" name="seleccion" id="seleccion"  value="<?=$sector_elegido;?>"/>
</form>



<!-- Button trigger modal -->



<script>
  function enviar_cambios(){
	  alert('se fue');
  }
</script>  


<?php


     $datos=array();
	 $datos['data_c']            =  $data_c;
	 $datos['categories_sector'] =  $categories_sector;
	 $datos['data']              =  $data;
	 $datos['categories']        =  $categories;
	 
	 /*----------------- graficos proyectos --------------------*/
     $this->load->view('includes/graficos_proyectos',$datos);
?> 


<div class="js" style="display:none;"><?=$sector_elegido;?></div>
<div class="js2" style="display:none;">1</div>
<div class="nom_xml" style="display:none;"><?=$id_pro;?></div>

<div class="fecha_inicio" style="display:none;"><?=$ti_etapas[0];?></div>
<div class="fecha_desde" style="display:none;"><?=$ti_etapas[1];?></div>
<div class="fecha_hasta" style="display:none;"><?=$ti_etapas[2];?></div>
<div class="fecha_desde_f" style="display:none;"><?=$ti_etapas[3];?></div>
<div class="fecha_hasta_f" style="display:none;"><?=$ti_etapas[4];?></div>
<div class="id_usuario" style="display:none;">17</div>


<?php
  $this->load->view('includes/foot');
?>