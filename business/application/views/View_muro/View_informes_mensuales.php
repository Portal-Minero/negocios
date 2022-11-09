<?php
 $this->load->view('includes/header');
 $this->load->helper('url');
 $pagina_menu = URL_PM_APP_NEG."muro/buscador_proyectos/";
 $direc_pm ="https://pm.portalminero.com/informe_cliente/";  
 
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
		
		<div id="informacion_cliente_muro" >
	<h3 style="color:#066293"><spam id="titulo_general" >Informes Mensuales De Proyectos</h3>			
</div>
		<br>
		


	  
	  
	  
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
	
	<div  style="background-color: #066293;"><h5 style="color:white;height: 40px;"><br>&nbsp;&nbsp;Listado Mensual De Proyectos</h5></div>
      <div>
	 
<div style="width:100%; height:1000px; overflow: scroll;">
<table align="center" style="width:200px;">
  <tr> 
    <td>
	
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Agosto 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Agosto\Proyectos_Energía_Agosto_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Agosto\Proyectos_Minería_Agosto_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Agosto\Proyectos_Otros_Sectores_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Agosto\Estadisticas_Proyectos_Mineria_Energia_Agosto_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Agosto\Resumen_actualizaciones_mineria_energia_Agosto_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Agosto\Resumen_actualizaciones_otros_sectores_Agosto_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Julio 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Julio\Proyectos_Energía_Julio_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Julio\Proyectos_Minería_Julio_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Julio\Proyectos_Otros_Sectores_Julio_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Julio\Estadisticas_Proyectos_Mineria_Energia_Julio_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Julio\Resumen_actualizaciones_mineria_energia_Julio_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Julio\Resumen_actualizaciones_otros_sectores_Julio_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Junio 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Junio\Proyectos_Energía_Junio_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Junio\Proyectos_Minería_Junio_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Junio\Proyectos_Otros_Sectores_Junio_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Junio\Estadisticas_Proyectos_Mineria_Energia_Junio_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Junio\Resumen_actualizaciones_mineria_energia_Junio_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Junio\Resumen_actualizaciones_otros_sectores_Junio_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Mayo 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Mayo\Proyectos_Energia_Mayo_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Mayo\Proyectos_Minería_Mayo_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Mayo\Proyectos_Otros_Sectores_Mayo_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Mayo\Estadisticas_Proyectos_Mineria_Energia_Mayo_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Mayo\Resumen_actualizaciones_mineria_energia_Mayo_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Mayo\Resumen_actualizaciones_otros_sectores_Mayo_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Abril 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Proyectos_Energía_Abril_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Proyectos_Minería_Abril_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Proyectos_Otros_Sectores_Abril_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Estadisticas_Proyectos_Mineria_Energia_Abril_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		   <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Evolucion cuatrimestral Proyectos Abr 2021 - Abr 2022.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Resumen_actualizaciones_mineria_energia_Abril_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Abril\Resumen_actualizaciones_otros_sectores_Abril_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Marzo 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Marzo\Proyectos_Energía_Marzo_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Marzo\Proyectos_Minería_Marzo_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Marzo\Proyectos_Otros_Sectores_Marzo_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Marzo\Estadisticas_Proyectos_Mineria_Energia_Marzo_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Marzo\Resumen_actualizaciones_mineria_energia_Marzo_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Marzo\Resumen_actualizaciones_otros_sectores_Marzo_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Febrero 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Febrero\Proyectos_Energia_Febrero_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Febrero\Proyectos_Mineria_Febrero_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Febrero\Proyectos_Otros_Sectores_Febrero_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Febrero\Estadisticas_Proyectos_Mineria_Energia_Febrero_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Febrero\Resumen_actualizaciones_mineria_energia_Febrero_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Febrero\Resumen_actualizaciones_otros_sectores_Febrero_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	  
	 <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Enero 2022</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Enero\Proyectos_Energía_Enero_2022.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Enero\Proyectos_Mineria_Enero_2022.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Enero\Proyectos_Otros_Sectores_Enero_2022.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Enero\Estadisticas_Proyectos_Mineria_Energia_Enero_2022.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Enero\Resumen_actualizaciones_mineria_energia_Enero_2022.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2022\Enero\Resumen_actualizaciones_otros_sectores_Enero_2022.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Diciembre 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Proyectos_Energia_Diciembre_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Proyectos_Mineria_Diciembre_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Proyectos_Otros Sectores_Diciembre_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Estadisticas_Proyectos_Mineria_Energia_Diciembre_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Evolucion cuatrimestral Proyectos Dic 2020 - Dic 2021.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Resumen_actualizaciones_mineria_energia_Diciembre_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Diciembre\Resumen_actualizaciones_otros_sectores_Diciembre_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	 <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Noviembre 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Noviembre\Proyectos_Energía_Noviembre_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Noviembre\Proyectos_Minería_Noviembre_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Noviembre\Proyectos_Otros_Sectores_Noviembre_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Noviembre\Estadisticas_Proyectos_Mineria_Energia_Noviembre_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Noviembre\Resumen_actualizaciones_mineria_energia_Noviembre_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Noviembre\Resumen_actualizaciones_otros_sectores_Noviembre_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	 <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Octubre 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Octubre\Proyectos_Energía_Octubre_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Octubre\Proyectos_Mineria_Octubre_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Octubre\Proyectos_Otros_Sector_Octubre_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Octubre\Estadisticas_Proyectos_Mineria_Energia_Octubre_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Octubre\Resumen_actualizaciones_mineria_energia_Octubre_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Octubre\Resumen_actualizaciones_otros_sectores_Octubre_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Septiembre 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Septiembre\Proyectos_Energía_Septiembre_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Septiembre\Proyectos_Minería_Septiembre_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Septiembre\Proyectos_Otros_Sectores_Septiembre_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Septiembre\Estadisticas_Proyectos_Mineria_Energia_Septiembre_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Septiembre\Resumen_actualizaciones_mineria_energia_Septiembre_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Septiembre\Resumen_actualizaciones_otros_sectores_Septiembre_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Agosto 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Proyectos_Energía_Agosto_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Proyectos_Minería_Agosto_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Proyectos_Otros_Sectores_Agosto_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Estadisticas_Proyectos_Mineria_Energia_Agosto_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Evolucion cuatrimestral Proyectos Ago 2020 - Ago 2021.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Resumen_actualizaciones_mineria_energia_Agosto_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Agosto\Resumen_actualizaciones_otros_sectores_Agosto_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Julio 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Julio\Proyectos_Energía_Julio_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Julio\Proyectos_Minería_Julio_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Julio\Proyectos_Otros_Sectores_Julio_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Julio\Estadisticas_Proyectos_Mineria_Energia_Julio_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Julio\Resumen_actualizaciones_mineria_energia_Julio_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Julio\Resumen_actualizaciones_otros_sectores_Julio_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Junio 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Junio\Proyectos_Energía_Junio_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Junio\Proyectos_Minería_Junio_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Junio\Proyectos_Otros_Sectores_Junio_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Junio\Estadisticas_Proyectos_Mineria_Energia_Junio_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Junio\Resumen_actualizaciones_mineria_energia_Junio_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Junio\Resumen_actualizaciones_otros_sectores_Junio_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Mayo 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Mayo\Proyectos_Energía_Mayo_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Mayo\Proyectos_Minería_Mayo_20211.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Mayo\Proyectos_Otros_Sectores_Mayo_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Mayo\Estadisticas_Proyectos_Mineria_Energia_Mayo_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Mayo\Resumen_actualizaciones_mineria_energia_Mayo_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Mayo\Resumen_actualizaciones_otros_sectores_Mayo_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Abril 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Abril\Proyectos_Energía_Abril_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Abril\Proyectos_Minería_Abril_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Abril\Proyectos_Otros_Sectores_Abril_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Abril\Estadisticas_Proyectos_Mineria_Energia_Abril_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Abril\Resumen_actualizaciones_mineria_energia_Abril_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Abril\Resumen_actualizaciones_otros_sectores_Abril_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	 <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Marzo 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Marzo\Proyectos_Energía_Marzo_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Marzo\Proyectos_Minería_Marzo_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Marzo\Proyectos_Otros_sectores_Marzo_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Marzo\Estadisticas_Proyectos_Mineria_Energia_Marzo_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Marzo\Resumen_actualizaciones_mineria_energia_Marzo_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Marzo\Resumen_actualizaciones_otros_sectores_Marzo_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Febrero 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Febrero\Proyectos_Energía_Febrero_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Febrero\Proyectos_Minería_Febrero_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Febrero\Proyectos_Otros_Sectores_Febrero_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Febrero\Estadisticas_Proyectos_Mineria_Energia_Febrero_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Febrero\Resumen_actualizaciones_mineria_energia_Febrero_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Febrero\Resumen_actualizaciones_otros_sectores_Febrero_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Enero 2021</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Enero\Proyectos_Energía_Enero_2021.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Enero\Proyectos_Minería_Enero_2021.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Enero\Proyectos_Otros_Sectores_Enero_2021.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Enero\Estadisticas_Proyectos_Mineria_Energia_Enero_2021.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Enero\Resumen_actualizaciones_mineria_energia_Enero_2021.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2021\Enero\Resumen_actualizaciones_otros_sectores_Enero_2021.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Diciembre</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Proyectos_Energía_Diciembre_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Proyectos_Minería_Diciembre_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Proyectos_Otros_Sectores_Diciembre_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Estadisticas_Proyectos_Mineria_Energia_Diciembre_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
		  <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Evolucion cuatrimestral Proyectos Dic 2019 - Dic 2020.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Resumen_actualizaciones_mineria_energia_Diciembre_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Diciembre\Resumen_actualizaciones_otros_sectores_Diciembre_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Noviembre</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Noviembre\Proyectos_Energía_Noviembre_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Noviembre\Proyectos_Minería_Noviembre_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Noviembre\Proyectos_Otros_Sectores_Noviembre_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Noviembre\Estadisticas_Proyectos_Mineria_Energia_Noviembre_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Noviembre\Resumen_actualizaciones_mineria_energia_Noviembre_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Noviembre\Resumen_actualizaciones_otros_sectores_Noviembre_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Octubre 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Octubre\Proyectos_Energía_Octubre_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Octubre\Proyectos_Minería_Octubre_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Octubre\Proyectos_Otros_Sectores_Octubre_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Octubre\Estadisticas_Proyectos_Mineria_Energia_Octubre_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Octubre\Resumen_actualizaciones_mineria_energia_Octubre_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Octubre\Resumen_actualizaciones_otros_sectores_Octubre_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Septiembre 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Septiembre\Proyectos_Energía_Septiembre_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Septiembre\Proyectos_Minería_Septiembre_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Septiembre\Proyectos_Otros_Sectores_Septiembre_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Septiembre\Estadisticas_Proyectos_Mineria_Energia_Septiembre_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Septiembre\Resumen_actualizaciones_mineria_energia_Septiembre_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Septiembre\Resumen_actualizaciones_otros_sectores_Septiembre_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
	  
	
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Agosto 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Proyectos_Energía_Agosto_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Proyectos_Minería_Agosto_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Proyectos_Otros_Sectores_Agosto_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Estadisticas_Proyectos_Mineria_Energia_Agosto_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Evolucion cuatrimestral Proyectos Ago 2019 - Ago 2020.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Resumen_actualizaciones_mineria_energia_Agosto_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Agosto\Resumen_actualizaciones_otros_sectores_Agosto_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	 <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Julio 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Julio\Proyectos_Energía_Julio_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Julio\Proyectos_Minería_Julio_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Julio\Proyectos_Otros_Sectores_Julio_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Julio\Estadisticas_Proyectos_Mineria_Energia_Julio_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Julio\Resumen_actualizaciones_mineria_energia_Julio_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Julio\Resumen_actualizaciones_otros_sectores_Julio_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	 <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Junio 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Junio\Proyectos_Energía_Junio_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Junio\Proyectos_Minería_Junio_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Junio\Proyectos_Otros_Sectores_Junio_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Junio\Estadisticas_Proyectos_Mineria_Energia_Junio_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Junio\Resumen_actualizaciones_mineria_energia_Junio_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Junio\Resumen_actualizaciones_otros_sectores_Junio_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	
	  <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Mayo 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Mayo\Proyectos_Energía_Mayo_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Mayo\Proyectos_Minería_Mayo_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Mayo\Proyectos_Otros_Sectores_Mayo_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Mayo\Estadisticas_Proyectos_Mineria_Energia_Mayo_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Mayo\Resumen_actualizaciones_mineria_energia_Mayo_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Mayo\Resumen_actualizaciones_otros_sectores_Mayo_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	   
	   <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Abril 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Proyectos_Energía_Abril_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Proyectos_Minería_Abril_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Proyectos_Otros_Sectores_Abril_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Estadisticas_Proyectos_Mineria_Energia_Abril_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Evolucion cuatrimestral Proyectos Abr 2019 - Abr 2020.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Resumen_actualizaciones_mineria_energia_Abril_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Abril\Resumen_actualizaciones_otros_sectores_Abril_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Marzo 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Marzo\Proyectos_Energía_Marzo_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Marzo\Proyectos_Minería_Marzo_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Marzo\Proyectos_Otros_Sectores_Marzo_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Marzo\Estadisticas_Proyectos_Mineria_Energia_Marzo_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
         
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Marzo\Resumen_actualizaciones_mineria_energia_Marzo_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Marzo\Resumen_actualizaciones_otros_sectores_Marzo_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Febrero 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Febrero\Proyectos_Energía_Febrero_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Febrero\Proyectos_Minería_Febrero_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Febrero\Proyectos_Otros_Sectores_Febrero_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Febrero\Estadisticas_Proyectos_Mineria_Energia_Febrero_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
         
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Febrero\Resumen_actualizaciones_mineria_energia_Febrero_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Febrero\Resumen_actualizaciones_otros_sectores_Febrero_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Enero 2020</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Enero\Base_Proyectos_Energía_Enero_2020.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Enero\Base_Proyecto_Minería_Enero_2020.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Enero\Base_Proyectos_Otros_Sectores_Enero_2020.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Enero\Estadisticas_Proyectos_Mineria_Energia_Enero_2020.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
         
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Enero\Resumen_actualizaciones_mineria_energia_Enero_2020.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2020\Enero\Resumen_actualizaciones_otros_sectores_Enero_2020.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Diciembre 2019</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Base_Energía_Diciembre_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Base_Minería_Diciembre_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Base_Otros_Sectores_Diciembre_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Estadisticas_Proyectos_Mineria_Energia_Diciembre_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Evolucion cuatrimestral Proyectos Dic 2018 - Dic 2019.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Resumen_actualizaciones_mineria_energia_Diciembre_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Diciembre\Resumen_actualizaciones_otros_sectores_Diciembre_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Noviembre 2019</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Noviembre\Base_Energía_Noviembre_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Noviembre\Base_Minería_Noviembre_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Noviembre\Base_Otros_Sectores_Noviembre_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Noviembre\Estadisticas_Proyectos_Mineria_Energia_Noviembre_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Noviembre\Resumen_actualizaciones_mineria_energia_Noviembre_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Noviembre\Resumen_actualizaciones_otros_sectores_Noviembre_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Octubre 2019</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Octubre\Base_Proyectos_Energía_Octubre_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Octubre\Base_Proyectos_Minería_Octubre_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Octubre\Base_Proyectos_Otros_Sectores_Octubre_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Octubre\Estadisticas_Proyectos_Mineria_Energia_Octubre_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Octubre\Resumen_actualizaciones_mineria_energia_Octubre_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Octubre\Resumen_actualizaciones_otros_sectores_Octubre_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Septiembre 2019</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Septiembre\Base_Proyectos_Energía_Septiembre_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Septiembre\Base_Proyectos_Minería_Septiembre_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Septiembre\Base_Proyectos_Otros_Sectores_Septiembre_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Septiembre\Estadisticas_Proyectos_Mineria_Energia_Septiembre_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Septiembre\Resumen_actualizaciones_mineria_energia_Septiembre_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Septiembre\Resumen_actualizaciones_otros_sectores_Septiembre_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
    
	<hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Agosto 2019</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Base_Proyectos_Energía_Agosto_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Base_Proyectos_Minería_Agosto_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Base_Proyectos_Otros_Sectores_Agosto_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Estadisticas_Proyectos_Mineria_Energia_Agosto_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Evolucion cuatrimestral Proyectos Ago 2018 - Ago 2019.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Resumen_actualizaciones_mineria_energia_Agosto_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Agosto\Resumen_actualizaciones_otros_sectores_Agosto_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
	
	
	
    <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Julio 2019</span></h4>
    <div align="center">
      <table > 
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Julio\Base_Proyectos_Energía_Julio_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Julio\Base_Proyectos_Minería_Julio_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Julio\Base_Proyectos_Otros_Sectores_Julio_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Julio\Estadisticas_Proyectos_Mineria_Energia_Julio_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Julio\Resumen_actualizaciones_mineria_energia_Julio_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Julio\Resumen_actualizaciones_otros_sectores_Julio_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
    
        <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Junio 2019</span></h4>
    <div align="center">
      <table >
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\junio\Base_Proyectos_Energía_Junio_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\junio\Base_Proyectos_Minería_Junio_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\junio\Base_Proyectos_Otros_Sectores_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\junio\Estadisticas_Proyectos_Mineria_Energia_Junio_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\junio\Resumen_actualizaciones_mineria_energia_Junio_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\junio\Resumen_actualizaciones_otros_sectores_Junio_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
    
    <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Mayo 2019</span></h4>
    <div align="center">
      <table >
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Mayo\Base_proyectos_Energía_Mayo_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Mayo\Base_proyectos_Minería_Mayo_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Mayo\Base_proyectos_Otros_Sectores_Mayo_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Mayo\Estadisticas_Proyectos_Mineria_Energia_Mayo_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Mayo\Resumen_actualizaciones_mineria_energia_Mayo_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Mayo\Resumen_actualizaciones_otros_sectores_Mayo_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
    </div>
    <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Abril 2019</span></h4>
   <table >
     <tr>
        <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Base_Proyectos_Energía_Abril_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
         <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Base_Proyectos_Minería_Abril_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
         <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Base_Proyectos_Otros_Sectores_Abril_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Estadisticas_Proyectos_Mineria_Energia_Abril_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
        <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Evolucion_cuatrimestral_Proyectos_Abr.doc"><img src="<?=$direc_pm;?>imagen/cuatrimestral.png"  /></a></div></td>
      
        <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Resumen_actualizaciones_mineria_energia_Abril_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
       
       
        <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Abril\Resumen_actualizaciones_otros_sectores_Abril_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
        
        </tr>
  </table>
 
    
     
    <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Marzo 2019</span></h4>
    <div align="center">
      <table >
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Marzo\Base_proyectos_Energía_Marzo_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Marzo\Base_proyectos_Minería_Marzo_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Marzo\Base_proyectos_Otros_Sectores_Marzo_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Marzo\Estadisticas_Proyectos_Mineria_Energia_Marzo_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Marzo\Resumen_actualizaciones_mineria_energia_marzo_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Marzo\Resumen_actualizaciones_otros_sectores_Marzo_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
      
    </div>
	 
    <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Febrero 2019</span></h4>
    <div align="center">
      <table >
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Febrero\Base_proyectos_Energía_Febrero_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Febrero\Base_proyectos_Minería_Febrero_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Febrero\Base_proyectos_Otros_Sectores_Febrero_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Febrero\Estadisticas_Proyectos_Mineria_Energia_Febrero_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Febrero\Resumen_actualizaciones_mineria_energia_Febrero_2019-.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Febrero\Resumen_actualizaciones_otros_sectores_Febrero_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
      
      
      
      
      
      
    </div>
	 
    <hr><h4 style="text-align: center;"><span style="color: #f67e62;">Informes Enero 2019</span></h4>
    <div align="center">
      <table >
        <tr>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Enero\Base_Proyectos_Energía_Enero_2019.xls"><img src="<?=$direc_pm;?>imagen/ener_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Enero\Base_Proyectos_Minería_Enero_2019.xls"><img src="<?=$direc_pm;?>imagen/min_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Enero\Base_Proyectos_Otros_Sectores_Enero_2019.xls"><img src="<?=$direc_pm;?>imagen/otros_xls_enero_2019.png"  /></a></div></td>
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Enero\Estadisticas_Proyectos_Mineria_Energia_Enero_2019.doc"><img src="<?=$direc_pm;?>imagen/Min_ener_doc_enero_2019.png"  /></a></div></td>
          <td><div align="center"></div></td>
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Enero\Resumen_actualizaciones_mineria_energia_Enero_2019.pdf"><img src="<?=$direc_pm;?>imagen/Min_ener_pdf_enero_2019.png"  /></a></div></td>
          
          
          <td><div align="center"><a href="<?=$direc_pm;?>informes_2019\Enero\Resumen_actualizaciones_otros_sectores_Enero_2019.pdf"><img src="<?=$direc_pm;?>imagen/otros_pdf_enero_2019.png"  /></a></div></td>
          
          </tr>
      </table>
    </div>
    <div align="center"><h4>&nbsp;</h4></div>
    
     
   
    </td>
  </tr>
</table>
</div>
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

<br><br><br>


<?php
	 /*----------------- menu izquierdo --------------------*/
     $this->load->view('includes/foot');
?> 