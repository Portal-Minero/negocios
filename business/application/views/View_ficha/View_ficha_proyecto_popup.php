<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
  $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
  
  $timestamp          = strtotime($datos_general->Fecha_actualizacion_pro); 
  $newDateFecha_actu  = date("m-d-Y", $timestamp );
  
  
/* ---------- programacion graficos ------*/ 
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
$categories_sector =$categories_sector. "]";
/* ---------- Fin programacion graficos ------*/ 


?>

<body>
<script src="<?=URL_PM_APP;?>js/filtros.js"></script>

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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?=URL_PM_APP;?>highlights/js/highcharts.js"></script>
  
  
  <br><br><br>  
<div class="container" style="width: 70%;">

<div  >
				<div align="left">
</div>
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
  
   


	
	
	
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
	  
	 
      
	  
	  

	 
	 
	  
  	 


<!-- Inicio Tabla Buscador -->


 
  <div class="panel-group" id="accordion">
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Información Básica</a>
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
						echo "<a sinhref='javascript:retorna_filtro_menu(\"select_get_proyectos_tipo\",".$tipo->id_tipo.",0)'>".$tipo->Nombre_tipo."</a><br>";
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
					<td><div align="left"><b><a sinsinhref="javascript:retorna_filtro_menu('select_get_mandantes_proyecto',<?=$datos_general->id_man_emp;?>,1,0);"><?=$datos_general->Nombre_fantasia_emp;?></a></b></div></td>
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
					    <li><b>País: <a sinhref="javascript:retorna_filtro_menu('select_get_u_pais',<?=$datos_general->id_pais;?>,0);" ><?=$datos_general->Nombre_pais;?></a>    </b></li>
					     <li><b>Región: <a sinhref="javascript:retorna_filtro_menu('select_get_u_region',<?=$datos_general->id_region;?>,0);" ><?=$datos_general->Nombre_region;?></a> </b></li>
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Descripcion Proyecto</a>
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
					<td><div align="left"><a sinhref="javascript:retorna_filtro_menu('select_get_proyectos_etapas',<?=$etapa_actual->id_etapa?>,0);" ><?=$etapa_actual->Nombre_etapa?></a></div></td>
							
					 					 
				   </tr>
				   <tr>
					<td><div align="left"><b>Responsable</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					
					<td><div align="left"><a sinhref="javascript:retorna_filtro_menu('select_get_responsable_etapa_actual',<?=$etapa_actual->id_emp?>,0);" ><?=$etapa_actual->Nombre_fantasia_emp?></a></div></td>
					
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
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Contacto</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
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
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Carta Gantt (Línea de Tiempo)</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
	
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Historial</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
		
		<? $Historial_pro = str_replace("\n","<br>",$datos_general->Historial_pro); ?> 
		<?=$Historial_pro;?>
		
		
		</div>
      </div>
    </div>
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Obras Principales</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
		
		<ul>
		<? foreach ($get_obras_pr as $row){ ?>
            <li><a sinhref="javascript:retorna_filtro_menu('select_get_obras_principales',<?=$row['id_obra'];?>,0);"><?=$row['Nombre_obra'];?></a></li>
		<? } ?>
        </ul>
		
		</div>
      </div>
    </div>
	
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Equipos Principales</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">
		
		<ul>
		<? foreach ($get_equipo_pr as $row){ ?>
            <li><a href="javascript:retorna_filtro_menu('select_get_equipos_principales',<?=$row['id_equipo'];?>,0);"><?=$row['Nombre_equipo'];?></a></li>
		<? } ?>
        </ul>
		
		</div>
      </div>
    </div>
	
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Suministros Principales</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse">
        <div class="panel-body">
		
		
		<ul>
		<? foreach ($get_suminis_pr as $row){ ?>
            <li><a sinhref="javascript:retorna_filtro_menu('select_get_suministros_principales',<?=$row['id_sumin'];?>,0);"><?=$row['Nombre_sumin'];?></a></li>
		<? } ?>
        </ul>
		
		
		</div>
      </div>
    </div>
	
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Servicios Principales</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse">
        <div class="panel-body">
		
		<?
		 function ordenanaUl($nombre,$descripciones,$link,$id){
			 $pos    = 0;
			 $li_ul  = "";
			 $pos    = strpos($descripciones, $nombre);
			 if($pos==false){
				 if($link==0){$li_ul = "<li>$nombre</li>";}else{ $li_ul = "<li><a sinhref='javascript:retorna_filtro_menu(\"select_get_servicios_principales\",$link,0);'>$nombre</a></li>"; }
				  
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
	<br>
	<div>
				 
	  </div>
	
	
	
	
  </div> 
  
  


<!-- Fin Tabla Buscador -->


		  
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
 



  
</div>

</body>





<!-- Button trigger modal -->

<script>
  function enviar_cambios(){
	  alert('se fue');
  }
</script>



<script type="text/javascript">
//column
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'graficos_totales_region',
			defaultSeriesType: 'bar',
			borderColor: '#066293',
			borderWidth:1,
			borderRadius:3,
            height:320,
			width:160,
			
			

		},
		
		style: {
                fontSize: '5'
				
            },
		title: {
			text: ''
		},
		yAxis: {
		title: {
			text: 'MWh'
		},
		labels: {
			style: {
				fontSize: '5px',
				color: 'green'
			}
		}
	},
		xAxis: {
			categories: <?=$categories;?>
			
			
		},
		yAxis: {
			min: 0,
			title: {
				text: '',
				
			}
		},
		legend: {
			backgroundColor: '#FFFFFF',
			reversed: true
		},
		tooltip: {
			formatter: function() {
				return ''+
					'Total Región: '+ this.y +'';
			}
		},
		
		plotOptions: {
			series: {
				stacking: 'normal'
			}
		},
			series: [{
			name: 'Total Proyectos<br> Región - Chile',color: 'black',
			showInLegend: "false",
			data: [
			<?=$data;?>
			
			
			
			]

			
		}]
		
		
	});
});


</script>


<script>
  function enviar_cambios(){
	  alert('se fue');
  }
</script>



<script type="text/javascript">
//column
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'graficos_categoria',
			defaultSeriesType: 'column',
			borderColor: '#066293',
			borderWidth:1,
			borderRadius:3,
            height:320,
			width:160,
			
			

		},
		
		style: {
                fontSize: '5'
				
            },
		title: {
			text: ''
		},
		yAxis: {
		title: {
			text: 'MWh'
		},
		labels: {
			style: {
				fontSize: '5px',
				color: 'green'
			}
		}
	},
		xAxis: {
			categories: <?=$categories_sector;?>
			
			
		},
		yAxis: {
			min: 0,
			title: {
				text: '',
				
			}
		},
		legend: {
			backgroundColor: '#FFFFFF',
			reversed: true
		},
		tooltip: {
			formatter: function() {
				return ''+
					'Total Sector: '+ this.y +'';
			}
		},
		
		plotOptions: {
			series: {
				stacking: 'normal'
			}
		},
			series: [{
			name: 'Total Proyectos<br> Sector - Chile',color: 'black',
			showInLegend: "false",
			data: [
			<?=$data_c;?>
			
			
			
			]

			
		}]
		
		
	});
});


</script>
<?php
  $this->load->view('includes/foot');
?>