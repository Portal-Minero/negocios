<?php
/*
$tit_sector = "";
if($sector_elegido==9){ $tit_sector = "Sugeridos";}
if($sector_elegido==0){ $tit_sector = "Todos";}
if($sector_elegido==1){ $tit_sector = "Minería";}
if($sector_elegido==2){ $tit_sector = "Energía";}
if($sector_elegido==3){ $tit_sector = "Infraestructura";}
if($sector_elegido==4){ $tit_sector = "Inmobiliario";}
if($sector_elegido==5){ $tit_sector = "Sanitario";}
if($sector_elegido==6){ $tit_sector = "Industrial";}
if($sector_elegido==7){ $tit_sector = "Forestal";}
			
*/
$this->load->helper('url');
$pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 
 $tit_sector = "Todas";

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
	   
  <table border="1" align="center">
  <tbody id="paginador_superior">
   <tr>
    <td>&nbsp;1&nbsp;</td>
    <td>&nbsp;2&nbsp;</td>
    <td>&nbsp;3&nbsp;</td>
    <td>&nbsp;4&nbsp;</td>
    <td>&nbsp;5&nbsp;</td>
    <td>&nbsp;6&nbsp;</td>
    <td>&nbsp;Siguiente&nbsp;</td>
   </tr>
  </tbody>
  </table>
  <div id="mensajito" align="center"  style="display: none"><img id="flecha_1" src="../../../app/imagen/mv2.gif"  /></div>
<p>&nbsp;&nbsp;</p>

<!-- Inicio Tabla Buscador -->

<table class="table table-responsive table-bordered">
    <thead>
        <tr style="background-color: #f5f5f7;">
            <th  style="cursor:pointer;"  onclick="Order_By(1,1)">Nombre&nbsp;&nbsp;<img id="flecha_1" src="../../../app/imagen/arrowup.png"  /></th>    
            <th>País</th>
            <th>Región</th>
            <th  class="ocultar-div" style="cursor:pointer;"  onclick="Order_By(2,2)">Inversión (US$MM)&nbsp;&nbsp;<img  id="flecha_2"  src="../../../app/imagen/arrowup.png"  /></th>   
            <th  class="ocultar-div" style="cursor:pointer;"  onclick="Order_By(3,3)">Fecha Actualización&nbsp;&nbsp;<img  id="flecha_3"  src="../../../app/imagen/arrowup.png"  /></th>   
            <th  class="ocultar-div">Seguir</th>
        </tr>
    </thead>
    <tbody id="contenedor_tbody">  
        
    </tbody>
</table>
<!-- Fin Tabla Buscador -->

<table  border="1" align="center">
  <tbody id="paginador_inferior">
   <tr>
    <td>&nbsp;1&nbsp;</td>
    <td>&nbsp;2&nbsp;</td>
    <td>&nbsp;3&nbsp;</td>
    <td>&nbsp;4&nbsp;</td>
    <td>&nbsp;5&nbsp;</td>
    <td>&nbsp;6&nbsp;</td>
    <td>&nbsp;Siguiente&nbsp;</td>
   </tr>
  </tbody>
  </table>
<p>&nbsp;&nbsp;</p>
		  
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
				  <select name="select_get_proyectos_tipo" id="select_get_proyectos_tipo" style="width: 150px; ">
				  <option value='0'>Todos</option>
				        <?
                             foreach ($get_sectores as $row){
					         echo "<option value='".$row['id_sector']."'>".$row['tNombre_tipo']."</option>"; }
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
                          //   foreach ($get_u_region as $row){
					      //   echo "<option value='".$row['id_region']."'>".$row['tNombre_region']."</option>"; }
                        ?>
			
		</select>
        </div>
		<div><br>
		<p><b>Estado Licitación:</b></p>
		  <select name="select_get_es_licita" id="select_get_es_licita" style="width: 150px; ">
		 <option value="0">Todos</option>
		 
			           <?
                          //   foreach ($get_u_region as $row){
					      //   echo "<option value='".$row['id_region']."'>".$row['tNombre_region']."</option>"; }
                        ?>
			
		</select>
        </div>
		
		<div>
		<hr>
		 
		   <button type="button" class="btn btn-primary btn-sm"  onclick="aplicar_filtro();">Aplicar Filtros</button>
		   <button type="button" class="btn btn-primary btn-sm"  onclick="location.reload();">Borrar Filtros</button>
        </div>
  <hr style="height: 1px;
  background-color: #337ab7;">
  Buscar Licitaciones Relacionadas con:
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
  

<form id="form_busquedas" name="form_busquedas" method="post" action="<?=$pagina_menu;?>">
	<input type="hidden"   name="seleccion" id="seleccion"  value="0"/>
	<input type="hidden"   name="parametro" id="parametro"  value="0"/>
	<input type="hidden"   name="id_sectores" id="id_sectores"  value="<?=$id_sectores;?>"/>
	
	<input type="hidden"   name="orden_elegido" id="orden_elegido"  value="0"/>
	<input type="hidden"   name="desc_acen" id="desc_acen"  value="0"/>
	<input type="hidden"   name="linea_id_proyectos_filtro" id="linea_id_proyectos_filtro"  value=""/>
	
</form><br><br><br><br><br><br><br><br>
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