<div class="container">
 <form action="" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
          <?php if(isset($mensaje)){?>
          <div class="alert alert-success" role="alert">
            <?php echo $mensaje;?> 
          </div>
          <?php } ?>
            <h5 class="card-title">Ingresa Datos de usuarios</h5>
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" class="form-control" name="inNombre" id="inNombre"  placeholder="Nombre"> 
            </div>
            <div class="form-group">
              <label for="">Apellidos</label>
              <input type="text" class="form-control" name="inApellidos" id="inApellidos"  placeholder="Apellidos"> 
            </div>
            <div class="form-group">
            <i class="fas fa-mobile-alt" style='font-size:32px'></i>
              <label for="">Celular</label>
              <input type="text" class="form-control" name="inCelular" id="inCelular"  placeholder="Celular"> 
            </div>
            <div class="form-group">
            <i class="fas fa-envelope" style='font-size:30px'></i>
              <label for="">Correo</label>
              <input type="text" class="form-control" name="inCorreo" id="inCorreo"  placeholder="Correo"> 
            </div>
            <div class="form-group">
            <i class='far fa-calendar-alt' style='font-size:36px'></i>
              <label for="">Fecha</label>
              <input type="date" class="form-control" name="inFecha" id="inFecha"  placeholder="Fecha"> 
            </div>
            
            <div class="form-check">
            <input class="form-check-input" name="inSexo" type="checkbox" value="1" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Hombre
            </label>
            <br>
              <input class="form-check-input" type="checkbox"name="inSexo" value="2" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Mujer
            </label>
          </div>
            <div class="form-group">
            <i class='fas fa-camera-retro' style='font-size:36px'></i>
              <label for="">Foto:</label>
              <input type="file" class="form-control" name="inFoto" id="inFoto"  placeholder="Foto:"> 
            </div>
            
            

            <button type="submit" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-danger">Cancelar</button>
            
            
        </div>
    </div>
 </form>
</div>

