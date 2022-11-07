<?php
  $this->load->view('includes/header');
  $this->load->helper('url');
  $pagina_menu = base_url()."muro/buscador_proyectos/";
  
  $timestamp = strtotime($datos_general->Fecha_actualizacion_pro); 
  $newDateFecha_actu = date("m-d-Y", $timestamp );
 
?>

<body>
<script src="http://200.6.115.193/wp/app/app/js/filtros.js"></script>
<script>

  function seleccion_menu_proyecto(p,t){
	  document.getElementById("seleccion").value=p;
	  document.getElementById("parametro").value=t;
	  document.form1.submit(); 
	 
  }
  
  function paginador(de,hasta){
	  alert(1);
	  
  }
  
  
 </script>
  
  
   
  
<div class="container" style="width: 70%;">

<div id="informacion_cliente_muro" >
				<div align="left"><a href="http://200.6.115.193/wp/app/business/"><img src="../../../app/imagen/casa.jpg" width="42" height="42" /></a>
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
		   <p align="center"><img src="http://200.6.115.193/wp/app/app/imagen/ultima.gif"  /></p>
  <p><b>
   <?
	   $descrip_ultima_informacion_pro = str_replace("\n","<br>",$datos_general->ultima_informacion_pro);
	   echo $descrip_ultima_informacion_pro;
   ?>
  
   </b></p>
	  </div>
	  <hr>
	  
	 
      
	  
	  
<div  id="contenedor_menu_lateral" style="background: none;border: 0px">
	       <img   src="http://200.6.115.193/wp/app/app/imagen/mostrar.gif" align="left">
		   <img   src="http://200.6.115.193/wp/app/app/imagen/galeria.png" align="right">
	  </div>
	  <br><br>
	 
	 
	  
  	 


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
						echo "<a href='".$tipo->id_tipo."'>".$tipo->Nombre_tipo."</a><br/>";
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
					<td><div align="left"><b><a href="#"><?=$datos_general->Nombre_fantasia_emp;?></a></b></div></td>
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
					    <li><b>País: <a href="<?=$datos_general->id_pais;?>"><?=$datos_general->Nombre_pais;?></a>    </b></li>
					    <li><b onclick="retorna_filtro_menu();";>Región: <a href="<?=$datos_general->id_region;?>"><?=$datos_general->Nombre_region;?></a></b></li>
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
	
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
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
					<td><div align="left"><a href="<?=$etapa_actual->id_etapa?>"><?=$etapa_actual->Nombre_etapa?></a></div></td>
					
					
					 
				   </tr>
				   <tr>
					<td><div align="left"><b>Responsable</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><a href='<?=$etapa_actual->id_emp?>'><?=$etapa_actual->Nombre_fantasia_emp?></a></div></td>
				   </tr>
				   <tr>
					<td><div align="left"><b>Tipo de Contrato</b></div></td>
                    <td><div align="left">&nbsp;&nbsp;&nbsp;</div></td>
					<td><div align="left"><a href='<?=$etapa_actual->id_tipo_contrato?>'><?=$etapa_actual->Nombre_tipo_contrato?></a></div></td>
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
            <li><a href="#"><?=$row['Nombre_obra'];?></a></li>
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
            <li><a href="#"><?=$row['Nombre_equipo'];?></a></li>
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
            <li><a href="#"><?=$row['Nombre_sumin'];?></a></li>
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
				 if($link==0){$li_ul = "<li>$nombre</li>";}else{ $li_ul = "<li><a href='#'>$nombre</a></li>"; }
				  
			 }
		     return  $li_ul;
		 }
		
	      /*-----------------------------------*/ 
		  
		   $descripciones="";
		   foreach ($get_servicios_pr as $row){ 
		  
		 ?>
			<ul>
			   <?=ordenanaUl($row['Nombre_serv'],$descripciones,1,0);?>
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
				 <table class="table table-responsive table-bordered" border="0">
					<thead>
					<tr >
						<th><div align="left"><h5> Proyecto <?=$datos_general->Nombre_pro;?>  | Fecha Actualización <?=$newDateFecha_actu;?></h5></div></th>
						
						<th><div align="right"><a class="urlinforma" href="#" rel="shadowbox;width=1000;height=600"><img src="http://200.6.115.193/wp/app/app/imagen/informar.png"></a></div></th>      
				   </tr>
				   </thead>
				   
				</table>
	  </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  </div> 
  
  


<!-- Fin Tabla Buscador -->


		  
	  </div>

    </div>
    <div class="col-sm-3">
	
	
	
      
	  <div style="font-size: 11px;padding: 5px;">
          
	    <label for="text_busca_nombre">Mapa</label>
		<a style="cursor:pointer;position:relative;height:160px;display:block" data-url="/maps/place/Jujuy,+Argentina/data=!4m2!3m1!1s0x9404a1f6e75c0087:0x815e91b230ce4e79?sa=X" href="#" jsaction="trigger.Ez7VMc" tabindex="0" data-ved="2ahUKEwjru8CHg9T4AhUzD7kGHRTrD50Q8gF6BAhoEAE"><img class="lu-fs" id="lu_map" src="/maps/vt/data=dpO6qW_h9d1BbhQThYFdFwz65I576OGZLaSCoHcaSpXkbFRzlwhw1UbicN5Fu3a2r9QbwTauzJkbMnzgqAGcRc5p7tVfmiYQ_vtEuT5pgL3nyNyJX8QxQxUbc_MPhPPGj0IxGisPYk40EDBMexwcUP5wJJe-XXYs0wx2tV3irlZ41hVr-zAdQX-_NCWR6ffJn5b97NFUxUcEDhzwKanS2guLekT2vHg2E68bSK63o5l4Ja12aFos" title="Mapa de Provincia de Jujuy" alt="Mapa de Provincia de Jujuy" data-atf="1" data-frt="0" width="241" height="160" border="0"><div jscontroller="hnlzI" class="adgvqc duf-h TUOsUe BSRXQc x5dMzc" jsaction="KQB0gd;rcuQ6b:npT2md" data-ved="2ahUKEwjru8CHg9T4AhUzD7kGHRTrD50QkNEBegQIaBAC"><img class="hLcKi oYQBg FIfWIe Tbiej u60jwe" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAAmElEQVR4Ae3a1xHDIBQAQfpvglLxr+M5572Z18AqC4YkSZIkSdF60DwzQIAAaQK6HWfBAXQVzmwgOKOA4AQQnAaC00BwGghOA8FpIDgNBKeB4ADaw9GEc74JR5Kkr39sy4ufT4e1N7fjAPo/nAaC00BwGghOA8FpIDgNBKeB4DQQnAKC00BwdoPTwfnlDd2AAAGSJEmSJGkDhfC3AD4fHSUAAAAASUVORK5CYII=" alt="" data-atf="1" data-frt="0" width="24" height="24"></div></a>
	  </div>
	  
	  
	  
	  <div style="font-size: 11px;padding: 5px;">
          <hr style ="height: 0.5px;  background-color: #f5f5f7;;">
			  
			  
		<div>
		  <br>	  
		  <p><b>Proyectos de Minería en Chile</b></p>
           <img   src="http://200.6.115.193/wp/app/app/imagen/índice.png" >
		</div>
		
		<div>
		<br>
		<p><b>Proyectos en etapa de Ingeniería Conceptual o Prefactibilidad en Chile:</b></p>
		 <img   src="http://200.6.115.193/wp/app/app/imagen/índice.png" >
        </div>
		
		
  
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
  $this->load->view('includes/foot');
?>