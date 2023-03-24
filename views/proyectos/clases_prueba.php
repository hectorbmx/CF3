
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
<br><br>
<div class="container">
 <form action="" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
          <?php if(isset($mensaje)){?>
          <div class="alert alert-success" role="alert">
            <?php echo $mensaje;?> 
          </div>
          <?php } ?>
            <h5 class="card-title">Ingresa Datos de socio para las clases de prueba</h5>
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" class="form-control" name="inNombre" id="inNombre"  placeholder="Nombre" required> 
            </div>
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" class="form-control" name="inApellidos" id="inApellidos"  placeholder="Apellidos" required> 
            </div>
            <div class="form-group">
              <label for="">Celular</label>
              <input type="text" class="form-control" name="inCelular" id="inCelular"  placeholder="Celular" required> 
            </div>
            
            <div class="form-group">
              <label for="">Fecha</label>
              <input type="date" class="form-control" name="inFecha" id="inFecha"  placeholder="Fecha"> 
            </div>
            <div class="form-check">
  <input class="form-check-input" name="inVisita" type="checkbox" value="1" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Primera clase
  </label>
  <br>
    <input class="form-check-input" type="checkbox"name="inVisita" value="2" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Segunda clase
  </label>
</div>

            
            <button type="submit" class="btn btn-success">Agregar</button>
            
            <button type="submit" class="btn btn-danger">Cancelar</button>
            
            
        </div>
    </div>
 </form>
</div>

