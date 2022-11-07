<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
 $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
?>

   <script>
 
  function seleccion_vista_buscador_proyectos(p,t){
	  	 
	  document.getElementById("seleccion").value=p;
	  document.getElementById("parametro").value=t;
	  document.form1.submit(); 
	 
  }
  </script>
  
  
 <script>
   function ver_faenas_detalle(faenas,oemp,busca){
	   alert(0);
	   document.getElementById("parame_1").value=faenas;
	   document.getElementById("parame_2").value=oemp;
	   document.getElementById("parame_3").value=busca;
	   alert(faenas);
	   alert(oemp);
	   alert(busca);
	   
	   document.detfa.submit(); 
	   
   }
 </script>
  
  <style type="text/css">
.caja {
   margin:20px auto 40px auto;	
   border:1px solid #d9d9d9;
   height:30px;
   overflow: hidden;
   width: 230px;
   position:relative;
}
select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 30px;
   padding: 5px;
   width: 250px;
}
select:focus{ outline: none;}

.caja::after{
	content:"\025be";
	display:table-cell;
	padding-top:7px;
	text-align:center;
	width:30px;
	height:30px;
	background-color:#d9d9d9;
	position:absolute;
	top:0;
	right:0px;	
	pointer-events: none;
}	
		
</style>		



<body>
 
<script> 
function buscar(opcion){
	
	var _buscar = $("#buscar").val();
	
			if( _texto==""){
				alert("debe ingresar texto a buscar"); 
				return(false);
			}
			if( _categoria ==""){
				alert("debe ingresar categoría que desea buscar"); 
				return(false);
			}
	}
	
	
	if(opcion==2){
		    $("#procesos").val('');
			if(  _procesos==""){
				 alert("debe seleccionar proceso a buscar"); 
				 return(false);
			}
			
	}
	
	
	
	
	
	 	 

	    $.ajax
							  ({
							   url: ' <?=URL_PM_APP_NEG?>muro/buscar_equipos_mineria/',
							   data : {  texto :_texto, faena :  _faena,categoria : _categoria,pag : _pag , procesos :_procesos},
							   type : 'post',
							   cache: false,
							   
							   success: function(r3)
							   {
								 
								$("#resultado_busqueda").html(r3);
							   }
							  
		}); 
}




</script> 
  <br><br>
<div class="container">
		
		
		
		

<div id="informacion_cliente_muro"  style ="padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 3px;
  padding-left: 30px;" >
  
 
 <FONT COLOR="#066293"><h3>Buscar Empresas <?=$npais;?></h3></FONT>
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
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Formulario Búsqueda</h5></div>
      <div>
		
		
		<div class="mb-3">
  <label for="texto" class="form-label">Buscar Mineras de <?=$npais;?> por:</label>
  <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Texto a buscar">
</div><br>
<div class="mb-3">
  
  
  
   <label for="exampleFormControlTextarea1" class="form-label">Escoja Criterio Busqueda</label>
  <div class="form-group">
    <select class="combobox form-control" name="tipo" id="tipo">
       
        <option value="minerales"  selected="selected">Por Mineral</option>
        <option value="nombre">Por Faena</option>
		<option value="operador">Por Operador</option>
        
    </select>
  </div>
  
  
	  <button onclick="buscar(1);" type="button" class="btn btn-primary btn-sm"  >Buscar con los criterios seleccionados</button><br><br>
	 
	   
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
	
	
      <div id="resultado_busqueda">
		  
	  </div>
	  	  
	  </div>
	  
    </div>
  <div class="col-sm-10">
	<br>
	</div>
	
	
	
	
	
	
	
    
</div>
  



</div>



</body>
<form id="form1" name="form1" method="post" action="<?=$pagina_menu;?>">

	<input type="hidden" name="seleccion" id="seleccion"  value="0"/>
	<input type="hidden" name="parametro" id="parametro"  value="0"/>
</form>

<form id="detfa" name="detfa" method="post" action="<?=URL_PM_APP_NEG?>muro/trae_descripcion_faena/">

	<input type="hidden" name="parame_1" id="parame_1"  value="<?=$pais;?>"/>
	<input type="hidden" name="parame_2" id="parame_2"  value="0"/>
	<input type="hidden" name="parame_3" id="parame_3"  value="0"/>
	
</form>


 

</html>