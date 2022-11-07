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
	var _pag   =0;
	var _texto = $("#texto").val();
	var _faena = $('#faena').val();
	var _categoria = $('#categoria').val();
	var _procesos  = $('#procesos').val();
	if(opcion==1){
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
  
 
 <FONT COLOR="#066293"><h3>Equipos en Gran Minería</h3></FONT>
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
  <label for="texto" class="form-label">Ingrese el texto a buscar</label>
  <input type="text" class="form-control" id="texto" name="texto" placeholder="Texto a buscar">
</div><br>
<div class="mb-3">
  <label for="faena" class="form-label">Seleccione la Faena</label>
  <div class="form-group">
    <select class="combobox form-control"  name="faena" id="faena">
        <option value="" selected="selected">Todas las Faenas</option>
        <option value="AL">Anglo American Chile</option>
        <option value="0403131415">Anglo American Chile</option>
								<option value="04">- División Chagres</option>
								<option value="03">- División El Soldado</option>
								<option value="13">- División Los Bronces</option>
								<option value="14">- División Mantos Blancos</option>
								<option value="15">- División Manto Verde</option>
								<option value="18">Minera Candelaria</option>
								<option value="19">Minera Cerro Colorado Ltda.</option>
								<option value="20">Minera del Pacífico (Romeral)</option>
								<option value="28">Minera del Pacífico (Huasco)</option>
								<option value="21">Minera Huasco S.A.</option>
								<option value="22">Minera Lomas Bayas</option>
								<option value="05">Minera Mantos de Oro - La Coipa</option>
								<option value="17">Minera Maricunga - Mina Refugio</option>
								<option value="01">Minera Zaldivar</option>
								<option value="2324252610">Codelco</option>
								<option value="23">- División Andina</option>
								<option value="24">- División Norte</option>
								<option value="25">- División Salvador</option>
								<option value="26">- División El Teniente</option>
								<option value="10">- Fundición y Refinería Ventanas</option>
								<option value="27">Fundición Altonorte Noranda Chile Ltda.</option>
								<option value="02">Minera Doña Inés de Collahuasi</option>
								<option value="12">Minera El Tesoro</option>
								<option value="08">Minera Escondida</option>
								<option value="06">Minera Los Pelambres</option>
								<option value="09">Minera Meridian - El Peñón</option>
								<option value="16">Minera Michilla S.A.</option>
								<option value="11">Minera Rayrock Ltda. - Iván Zar</option>
								<option value="07">Minera El Abra</option>
    </select>
  </div>
  
  
   <label for="exampleFormControlTextarea1" class="form-label">Escoja la categoría que desea buscar</label>
  <div class="form-group">
    <select class="combobox form-control" name="categoria" id="categoria">
        <option value="" selected="selected">Escoja la categoría</option>
        <option value="0">Por Equipos</option>
        <option value="1">Por Insumos</option>
        
    </select>
  </div>
  
  
	  <button onclick="buscar(1);" type="button" class="btn btn-primary btn-sm"  >Buscar con criterios seleccionados</button><br><br>
	  <hr style="height: 2px;  background-color: #066293;">
	  <p><b>* Adicionalmente</b>, usted puede <b>seleccionar un proceso de interés</b> y nuestro sistema le mostrará todas las faenas mineras que cuentan con ese proceso, con su descripción, equipos principales e insumos principales involucrados. <b>( No se tomaran en cuenta los valores seleccionados en el filtro de arriba )</b></p>
	   <label for="exampleFormControlTextarea1" class="form-label">Seleccione el Proceso a Buscar</label>
	   <div class="form-group">
	   
	     
		
    <select class="combobox form-control" name="procesos" id="procesos">
        <option value="" selected="selected">Seleccione el Proceso</option>
       	<option value="">Selecione un Proceso</option>
								<option value="aglomeracion">Aglomeración o Curado</option>
								<option value="almacenamiento">Almacenamiento</option>
								<option value="apilamiento">Apilamiento</option>
								<option value="carguio">Carguío</option>
								<option value="chancado">Chancado</option>
								<option value="cianuracion">Cianuración</option>
								<option value="clarificacion">Clarificación</option>
								<option value="concentra">Concentración</option>
								<option value="conver">Conversión</option>
								<option value="ripios">Descarga Ripios</option>
								<option value="electro">Electro-Obtención</option>
								<option value="embarque">Embarque</option>
								<option value="espesamiento">Espesamineto</option>
								<option value="sx">Extracción por Solventes(SX)</option>
								<option value="filtr">Filtrado</option>
								<option value="flotacion">Flotación</option>
								<option value="fortificacion">Fortificación</option>
								<option value="fundicion">Fundición</option>
								<option value="fusion">Fusión</option>
								<option value="lixiviacion">Lixiviación</option>
								<option value="mineroducto">Mineroducto</option>
								<option value="molienda">Molienda</option>
								<option value="perforacion">Perforación</option>
								<option value="pirorrefinacion">Pirorrefinado</option>
								<option value="refinacion">Refinación Electrolitica</option>
								<option value="secado">Secado</option>
								<option value="transporte">Transporte</option>
								<option value="anodico">Tratamiento de Barro Anodico</option>
								<option value="escorias">Tratamiento de Escorias</option>
								<option value="relaves">Tratamiento de Relaves</option>
								<option value="tronadura">Tronadura</option>
    </select>
	
  </div>
   <button  onclick="buscar(2);"  type="button" class="btn btn-primary btn-sm"  >Buscar solo por  proceso selecionado</button>
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

	<input type="hidden" name="parame_1" id="parame_1"  value="0"/>
	<input type="hidden" name="parame_2" id="parame_2"  value="0"/>
	<input type="hidden" name="parame_3" id="parame_3"  value="0"/>
	
</form>


 

</html>