<br><br>

<div class="container"><h1>Relacion de pagos socios </h1>
  <form method="post" action="lista_pagos2">
<select class="form-select" aria-label="Default select example" name ="txtMes">
  <option value="">Selecciona el mes</option>
    <?php
    foreach ($meses as $key => $value) {
    ?>
        <option value="<?=$key?>"><?=$value?></option>    
    <?php 
    }
    ?>
</select>
<button type="submit" class="btn btn-success">BUSCAR</button>
  </form>
    <br><br>
  

</div>