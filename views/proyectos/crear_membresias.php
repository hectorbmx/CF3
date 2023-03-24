<div class="container">
 <form action="" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
          
            <div class="form-group">
            <h5 class="card-title">Ingresa Datos de la membresia</h5>
                  
                           
              <label for="">Nombre</label>
              
              <input type="text" class="form-control" name="inNombre" id="inNombre"  placeholder="Nombre"> 
            </div>
            <div class="form-group">
              <label for="">Descripcion</label>
              <input type="text" class="form-control" name="inDescripcion" id="inApellidos"  placeholder="Descripcion"> 
            </div>
            <div class="form-group">
              <label for="">Duracion</label>
              <input type="text" class="form-control" name="inDuracion" id="inCelular"  placeholder="Duracion en dias de la membresia"> 
            </div>
            <div class="form-group">
              <label for="">Costo</label>
              <input type="text" class="form-control" name="inCosto" id="inCorreo"  placeholder="Costo"> 
            </div>
            <?php if(isset($mensaje)) {?>
              <div class="alert alert-success" role="alert">
                <?php echo $mensaje; ?>
              </div>
              <?php } ?>
            <button type="submit" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-danger">Cancelar</button>
            
            
        </div>
    </div>
 </form>
</div>

