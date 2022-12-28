<?php

$tit_sector = "";
if($tipo_lici==0){ $tit_sector = "Todas";}
if($tipo_lici==1){ $tit_sector = "Licitaciones Estimadas";}
if($tipo_lici==2){ $tit_sector = "Licitaciones Definidas";}
if($tipo_lici==3){ $tit_sector = "Licitaciones En Proceso de Adjudicación";}
if($tipo_lici==4){ $tit_sector = "Licitaciones Adjudicadas";}



			

$this->load->helper('url');
$pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 


/*

 $total_por_etapas=array();
 $i=0;
 foreach ($get_total_por_etapas as $row){
					         $total_por_etapas[$i] = $row['total']; 
							 $i++;
 }
*/
 //$sectores;
/*
$Object        = new DateTime();  
$DateAndTime   = $Object->format("Y-m-d h:i:s ");  */
//echo  $DateAndTime;
?>

<?php
  $this->load->view('includes/header');
?>

<body>
<script src="<?=URL_PM_APP?>js/filtros_licitacion.js"></script>
<script src="<?=URL_PM_APP?>js/grilla_licitacion.js"></script>
<script src="<?=URL_PM_APP?>js/licitacion.js"></script>


<script>
function popupproyecto(id_pro,sector){
	 var pagina_pro = '<?=base_url();?>Fichaproyecto/ficha_proyectos/'+id_pro+'/'+sector+'/1/';
	 
	
	document.getElementById('proyecto_modal').src = pagina_pro;
	
}

function ShowSelected(){
	
	var valor= $("#select_get_u_pais").val();
	
	
	if(valor==81){
		document.getElementById("select_get_u_region").disabled=false;
	    
	}else{
		 document.getElementById("select_get_u_region").disabled=true;
	}
	
}
 
  function seleccion_menu_proyecto(p,t){
	  document.getElementById("seleccion").value=p;
	  document.getElementById("parametro").value=t;
	  document.form_busquedas.submit(); 
	 
  }
  //alert(33);
  //document.getElementById("linea_id_proyectos_filtro").value="";

 </script>
  
  
 <br><br><br> 
 
 




<div class="container" style="width: 70%;">

<div id="informacion_cliente_muro" >
	<h3 style="color:#066293"><spam id="titulo_general" >Licitaciones <spam> <?=$tit_sector;?> </h3>			
</div>
	  <p>&nbsp;</p>
	  
	  
  <div class="row">
  
     <?php
		 /*----------------- menu izquierdo --------------------*/
		 $this->load->view('includes/menu_opcion_izquierdo',$sectores);
     ?>
	
	
	
    <div class="col-sm-7">
	  <div id="contenedor_menu" >
	
	
      <div class="ocultar-div">
				
	  </div>
	 
<div class="ocultar-div">	  
<button onclick="retorna_sectores_selecionados();" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
 Seleccione sus rubros para recibir en su correo
</button>
	  <hr>
</div>
	  
	  <div>
		  
	  </div>
	   
  <p id="mensaje_json" align="center">Mostrando 1 - 100 de un total de 698 resultados.</p>	
	   
 
  <div id="paginador_superior"  align="center">
  
  </div>
  <div id="mensajito" align="center"  style="display: none"><img id="flecha_1" src="../../../app/imagen/mv2.gif"  /></div>


<!-- Inicio Tabla Buscador -->

<table class="table table-responsive table-bordered">
    <thead>
        <tr style="background-color: #f5f5f7;">
            <th  style="cursor:pointer; width:300px;"  onclick="Order_By(1,1)">Nombre&nbsp;<img id= "flecha_1" src="<?=URL_PM_APP;?>imagen/arrowup.png"  /></th>    
            <th  class="ocultar-div" style="cursor:pointer;"  onclick="Order_By(2,2)">Sector&nbsp;<img  id="flecha_2"  src="<?=URL_PM_APP;?>imagen/arrowup.png"  /></th>   
            <th  class="ocultar-div" style="cursor:pointer;"  onclick="Order_By(3,2)">Estado&nbsp;<img  id="flecha_3"  src="<?=URL_PM_APP;?>imagen/arrowup.png"  /></th>   
            <th  class="ocultar-div" style="cursor:pointer;"  onclick="Order_By(4,2)">Pais&nbsp;<img    id="flecha_4"  src="<?=URL_PM_APP;?>imagen/arrowup.png"  /></th>   
            <th  class="ocultar-div" style="cursor:pointer;"  onclick="Order_By(5,3)">Region&nbsp;<img  id="flecha_5"  src="<?=URL_PM_APP;?>imagen/arrowup.png"  /></th>   
           
        </tr>
    </thead>
    <tbody id="contenedor_tbody">  
        
    </tbody>
</table>
<!-- Fin Tabla Buscador -->

 <div id="paginador_inferior"  align="center">
  
  </div>
		  
	  </div>

    </div>
    <div class="col-sm-3">
	
	
	
      
	  <div style="font-size: 11px;padding: 5px;">
          
			  <label for="text_busca_nombre">Buscar Por Nombre Licitacion</label>
			  <input type="text" name="text_busca_nombre" id="text_busca_nombre" style="height: 25px;"/>
			  <button type="button" class="btn btn-primary btn-sm" style="height: 25px !important;" onclick="buscar_pro_nombre();">Buscar</button>
	  </div>
	  
	  
	  
	  <div style="font-size: 11px;padding: 5px;">
          <hr style ="height: 0.5px;  background-color: #f5f5f7;;">
			  <p><h5><b style ="color:#066293;">Filtros Licitacion</b></h5></p>
			  
		<div><br>	  
			  <p><b>Sector</b></p>
				  <select name="select_get_sector" id="select_get_sector" style="width: 150px; ">
				  <option value='0'>Todos</option>
				        <?
                             foreach ($get_sectores as $row){
					         echo "<option value='".$row['id_sector']."'>".$row['Nombre_sector']."</option>"; }
                        ?>
				</select>
 
       </div>
	   
	   
	   <div><br>	  
			  <p><b>Empresa que Licita</b></p>
				  <select name="select_get_empresa_lici" id="select_get_empresa_lici" style="width: 150px; ">
				  <option value='0'>Todas</option>
				        <?
                             foreach ($get_empresa_licita as $row){
					         echo "<option value='".$row['id_mandante']."'>".$row['Razon_social_empresa']."</option>"; }
                        ?>
				</select>
 
       </div>
	   
 
          
		<div><br>
		<p><b>País :</b></p>
		  <select name="select_get_u_pais" id="select_get_u_pais" style="width: 150px; " onchange="ShowSelected();">
		  <option value="81">Chile</option>
		 <option value="0">Todos</option>
		 
			
			           <?
                             foreach ($paises as $row){
					         echo "<option value='".$row['id_pais']."'>".$row['Nombre_pais']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		
		<div><br>
		<p><b>Región:</b></p>
		  <select name="select_get_u_region" id="select_get_u_region" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_u_region as $row){
					         echo "<option value='".$row['id_region']."'>".$row['tNombre_region']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		<div><br>
		<p><b>Registros Requeridos:</b></p>
		  <select name="select_get_reg_re" id="select_get_reg_re" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_registro_proveedores as $row){
					         echo "<option value='".$row['id_registro']."'>".$row['Nombre_registro']."</option>"; }
                        ?>
			
		</select>
        </div>
		<div><br>
		<p><b>Estado Licitación:</b></p>
		  <select name="get_licitaciones_tipos" id="get_licitaciones_tipos" style="width: 150px; ">
		 <option value="">Todos</option>
					 <?
                             foreach ($get_licitaciones_tipos as $row){
					         echo "<option value='".$row['id_lici_tipo']."'>".$row['Nombre_lici_tipo']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		<div>
		<hr>
		 
		   <button type="button" class="btn btn-primary btn-sm"  onclick="aplicar_filtro(1);">Aplicar Filtros</button>
		   <button type="button" class="btn btn-primary btn-sm"  onclick="location.reload();">Borrar Filtros</button>
        </div>
  <hr style="height: 1px;
  background-color: #337ab7;">
  
  <h5><b style="color:#066293;">Buscar Licitaciones Relacionadas con:</b></h5>
  <div><br>
		<p><b>Obras Principales</b></p>
		  <select name="select_get_u_region" id="select_get_u_region" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_obras_principales as $row){
					         echo "<option value='".$row['id_obra']."'>".$row['Nombre_obra']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		
		
		<div><br>
		<p><b>Equipos Principales:</b></p>
		  <select name="get_equipos_principales" id="get_equipos_principales" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_equipos_principales as $row){
					         echo "<option value='".$row['id_equipo']."'>".$row['Nombre_equipo']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		
		
		<div><br>
		<p><b>Suministros Principales:</b></p>
		  <select name=" get_suministros_principales" id=" get_suministros_principales" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_suministros_principales as $row){
					         echo "<option value='".$row['id_sumin']."'>".$row['Nombre_sumin']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		
		<div><br>
		<p><b>Servicios Principales:</b></p>
		  <select name="get_servicios_principalesn" id="get_servicios_principales" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_servicios_principales as $row){
					         echo "<option value='".$row['id_serv']."'>".$row['Nombre_serv']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		<div><br>
		<p><b>Tipo de Proyecto</b></p>
		  <select name="get_proyectos_tipo" id="get_proyectos_tipo" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_proyectos_tipo as $row){
					         echo "<option value='".$row['id_tipo']."'>".$row['Nombre_tipo']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		<div><br>
		<p><b>Rubros Principales</b></p>
		  <select name="get_rubros_principales" id="get_rubros_principales" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                             foreach ($get_rubros_principales as $row){
					         echo "<option value='".$row['id_rubro']."'>".$row['Nombre_rubro']."</option>"; }
                        ?>
			
		</select>
        </div>
		<div>
		<hr>
		 
		   <button type="button" class="btn btn-primary btn-sm"  onclick="aplicar_filtro(2);">Aplicar Filtros</button>
		   <button type="button" class="btn btn-primary btn-sm"  onclick="location.reload();">Borrar Filtros</button>
        </div>
	  </div>
	  
    </div>
  </div>
  

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="width:180p;height:500%;">
  <div class="modal-dialog" role="document" style ="text-align: center;" >
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Proyecto <?=$tit_sector; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
	  
	  <iframe id="proyecto_modal" style="width:100%;height:700px;border:0px solid black;" id="inlineFrameExample"title="Proyectos"
			
			src="">
      </iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Ventana</button>
        
      </div>
    </div>
  </div>
</div>
</div>
<!-- Fin Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Notificación de Proyectos Nuevos</h4><br>Marque los sectores de su interés para recibir notificaciones de nuevos proyectos.
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="div_sectores_interes"></div>
		<div id="div_sectores_interes_msg" align="center" ></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  onclick="graba_sectores_selecionados();" type="button" class="btn btn-primary">Salvar cambios</button>
      </div>
    </div>
  </div>
  

<form id="form_busquedas" name="form_busquedas" method="post" action="<?=$pagina_menu;?>"/>
	<input type="hidden"   name="seleccion" id="seleccion"  value="0"/>
	<input type="hidden"   name="parametro" id="parametro"  value="0"/>
	<input type="hidden"   name="id_sectores" id="id_sectores"  value="<?=$id_sectores;?>"/>
	<input type="hidden"   name="orden_elegido" id="orden_elegido"  value="0"/>
	<input type="hidden"   name="desc_acen" id="desc_acen"  value="0"/>
	<input type="hidden"   name="tipo_lici" id="tipo_lici"  value="<?=$tipo_lici;?>"/>
	
	
</form>
</body>

<?php
$__va_menu=0;
		/***************  VIENE A BUSCAR DESDE LA FICHA ***************/
		if($__va_menu==1){

						
								   echo "<script>$(function(){
										$('#".$__parametro_menu."').val('".$__seleccion_menu."')
									});
						
									$(document).ready(function(){
										aplicar_filtro();
									});

									</script>";
						
		}
/*
<input type="hidden"   name="sector_elegido" id="sector_elegido"  value="<?=$sector_elegido;?>"/>



*/
		/***************  FIN VIENE A BUSCAR DESDE LA FICHA ***************/
?>
		


	
	
<?php
  $this->load->view('includes/foot');
?>