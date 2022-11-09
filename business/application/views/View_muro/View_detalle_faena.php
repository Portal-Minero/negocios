<? foreach($detalle_faena as $r2){ ?>
<br>
<div id="cuadro_uno" class="cuadro_datos_uno">
<table class="table table-striped">
  <thead>
    
  </thead>
  <tbody>
    <tr>
      <td><b>Nombre</b></td>
      <td><?=$r2['nombre'];?></td>
    </tr>
    <tr>
      <td><b>Estado</b></td>
      <td><?=$r2['estado'];?></td>
    </tr>
     <tr>
      <td><b>Minerales</b></td>
      <td><?=$r2['minerales'];?></td>
    </tr>
	 <tr>
      <td><b>Operador</b></td>
      <td><?=$r2['operador'];?></td>
    </tr>
	 <tr>
      <td><b>País</b></td>
      <td><?=$r2['pais'];?></td>
    </tr>
	 <tr>
      <td><b>Dirección</b></td>
      <td><?=$r2['direccion'];?></td>
    </tr>
	 <tr>
      <td><b>Fono</b></td>
      <td><?=$r2['fono'];?></td>
    </tr>
	 <tr>
      <td><b>Fax</b></td>
      <td><?=$r2['fax'];?></td>
    </tr>
	 <tr>
      <td><b>Sitio Web</b></td>
      <td><?=$r2['web'];?></td>
    </tr>
  </tbody>
</table>


<? } ?>


		    
	
   
  </div><br>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Ventana</button>