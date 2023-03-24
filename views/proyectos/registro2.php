<br><br><br>
<?php #header("refresh:10;/sistema/registro"); ?>
<div class="container">
  <div class="row">
    <div class="col-4">
  

    </div>
    <?php if (!empty($mensaje)) {?>
    
    <div class="col-6">
    <div class="alert alert-danger" role="alert">
                  <?php echo $mensaje; ?>  
                  <?php echo  "<a href=./registro><button>Regresa al registro</button></a>"; ?>
                  <?php } ?>      
    <div class="card" style="width: 18rem;">
    
    <?PHP foreach ($socio as $result ) { ?>
              <img src="img/<?php echo $result['foto'];?>" class="card-img-top" alt="...">
                
          <div class="card-body">
            <h5 class="card-title">Hola:<?php echo $result['nombre'];?></h5>
            <p class="card-text">Tu fecha de vencimiento es:<br> 
                                <?php echo $result['vencimiento'].'<br>';  
                                        if ($result['vencimiento']<= $hoy)echo "<button type='button' class='btn btn-danger'>Vencido</button>" ;
                                        elseif($result['vencimiento']>=$hoy)echo "<button type='button' class='btn btn-success'>Vigente</button>";?></p>
            <!-- <a href="./registro" class="btn btn-primary">Regresar al registro</a> -->
            <form action="" method="POST">
    <label for="">INGRESA TU CODIGO:</label>
    <input type="text" class="form-control" name="inId" id="inId"  placeholder="Ingresa tu codigo"><BR></BR>
  <button type="submit" class="btn btn-success" >Registrar</button>
</form>    
            <?php } ?>
          </div>
        </div>
      

    </div>
  </div>
</div>