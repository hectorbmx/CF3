<br><br>

<div class="container"><h1>Relacion de pagos socios </h1>
  <form method="post" action="lista_pagos2">
  <?php if (!empty($mensaje)) {?>
    <?php echo $mensaje; ?>  
  <?php } ?>      
<select class="form-select" aria-label="Default select example" name ="txtMes">
  <option value="">Selecciona el mes</option>
  <?php
    foreach ($meses as $key => $value) {
    ?>
        <option value="<?=$key?>"><?=$value?></option>    
    <?php  # code...
    }
    ?> 
</select>
<select class="form-select" aria-label="Default select example" name ="tPago">
  <option value="">Selecciona el tipo de pago</option>
  <option value="0">Todos</option>
  <?php
   foreach ($tipos_pago as $key => $value) {
    ?>
        <option value="<?=$key?>"><?=$value?></option>    
    <?php  # code...
    }
    ?> 
</select>
<button type="submit" class="btn btn-success">BUSCAR</button>
  </form>
    <br><br>
    <script >
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    <table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th># socio</th>
            <th>nombre</th>
            <th>tipo de pago</th>
            <th>Fecha Pago</th>
            <th>Vence</th>
            <th>Pago</th>         
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultados as $registro) {?>
            <tr>
            <td><?php echo $registro['id_socio'];?></td>
            <td><?php echo $registro['name'];?> <?php echo $registro['apellidos'];?></td>
            <td><?php echo $registro['nombre'];?></td>
            <td><?php echo $registro['fecha_pago'];?></td>
            <td><?php echo $registro['fecha2'];?></td>
            <td><?php echo $registro['total_pago'];?></td>
            
        
        </tr>
        <?php }?>
    <?php foreach ($cuenta as $total) {?>
        <tr>
            
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL DE ENTRADAS EN EL MES</td>
            <td>$<?php echo $total['pago'];?></td>    
            
           <?php } ?>
        </tr>
    </tbody>
</table>

</div>