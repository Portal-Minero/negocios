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
  padding-left: 30px;" class="ocultar-div">
  <FONT COLOR="#066293"><h3>¿Qué es Minería de Datos?</h3></FONT>
 
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
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Descripción minería de datos</h5></div>
      <div>
		 <p> Es un concepto que busca contribuir en la toma de decisiones estratégicas permitiendo explorar, comprender e identificar patrones de los datos que Portal Minero ha registrado, siendo una herramienta de primer nivel para definir <b>tácticas de negocios</b>.</p>
<p>Es también un conjunto de técnicas de análisis de datos que permiten:</p>



<ul>
  <li>Extraer patrones, tendencias y regularidades para describir y comprender mejor los datos además de predecir comportamientos seguros.</li>
   <li>La sumatoria entre Estadística, Inteligencia Artificial y Técnicas Gráficas es igual a <b>MINERÍA DE DATOS</b>.</li>
   
</ul>
<hr>
<p><h4>Ventajas del servicio</h4></p>
<ul>
  <li>Contribuye a la toma de decisiones estratégicas pues permite definir tácticas de negocios.</li>
   <li>Permite a las empresas explorar y comprender los datos e identificar patrones, relaciones y dependencias que entregan un panorama integrado del estado de las cosas (procesos, proyectos de inversión, entre otros).</li>
   
</ul>
<hr>
<p  align="center"><img style ="border-radius: 8px;box-shadow: 0 12px 8px 0 rgba(0, 0, 0, 0.15);" src="<?=URL_PM_APP?>imagen/min_datos.png"  /></p>
<hr>
<p  align="center"><a  target="_blank" class="btn btn-primary" href="https://www.portalminero.com/wp/formulario.php?9df23499430c5e30b9085c6c6de60862f3c193cf791002f5d15b8b914e35854f=27" role="button">Solicitar mas información</a></p>

<p  align="center">También puede solicitar mas información al correo <b>info@portalminero.com</b> o bien llamando al teléfono (56-2) 225 0164</p>
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