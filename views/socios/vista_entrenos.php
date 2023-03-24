<br><br>
<div class="container">
    
    
    
    <br><br>
    

<table class="table">
    <thead>
        <tr>
            <th># entreno</th>
            <th>Nombre</th>
            <th>descripcion</th>
            <th>objetivo</th>
            <th>fecha</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entrenos as $registro) {?>
            
            <tr>
            <td scope="row"><?php echo $registro['id'];?></td>
            <td><?php echo $registro['nombre'];?></td>
            <td><?php echo $registro['descripcion'];?></td>
            <td><?php echo $registro['objetivo'];?></td>
            <td><?php echo $registro['fecha'];?></td>
        
        </tr>
        <?php }?>
   
        <tr>
            <td scope="row">TOTALES</td>
            <td>???</td>
            <td>????</td>
        </tr>
    </tbody>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Agregar entrenamiento
</button>
<br>
<br>
<?php foreach ($entrenos as $registro) {?>
<div class="card-group">
  <div class="card">
  <div class="card-header"><h4><?php echo $registro['nombre'];?></h4></div>
    <img src=""  class="card-img-top" alt="">
    <div class="card-body">

      <h4 class="card-title"></h4>
      <p class="card-text">
      <h5>Calentamiento</h5>  
      <?php echo $registro['calentamiento'];?></p>
      <p class="font-weight-bolder">
      <h5>Fuerza o habilidades</h5>  
      <?php echo $registro['fuerza'];?></p>
      <p class="card-text">
      <h5>W.O.D</h5>  
      <?php echo $registro['descripcion'];?></p>
      <h5>Objetivo de la clase:</h5>  
      <p class="card-text"><?php if ($registro['objetivo'] == 1) echo "Rounds" ;if ($registro['objetivo'] == 2) echo "Repeticiones" ;
                                  if ($registro['objetivo'] == 3) echo "Tiempo" ; ?></p>
    </div>
    
    <div class="card-footer">
      <small class="text-muted"><?php echo $registro['fecha'];?></small>
    </div>
  </div>
  
</div>
<br>
<?php }?>
<br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo entrenamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> <!--Cuerpo del modal -->
                <form action="crear_entreno" method="post">
                    <label for="entrenoNombre">Nombre del entrenamiento:</label>            
                    <input type="text" name ="entrenoNombre" class="form-control" value ="" >
                    <br>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Calentamiento general</span>
                    </div>
                    <textarea class="form-control" name="calentamiento" aria-label="Descriocion entrenamiento"></textarea>
                    </div><br>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Fuerza o habilidad</span>
                    </div>
                    <textarea class="form-control" name="fuerza" aria-label="Descriocion entrenamiento"></textarea>
                    </div><br>
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Descripcion WOD</span>
                    </div>
                    <textarea class="form-control" name="descripcionEntreno" aria-label="Descriocion entrenamiento"></textarea>
                    </div><br>
                    <select class="custom-select" name ="tipoEntreno"id="inputGroupSelect01">
                        <option name ="tipoEntreno" selected>Objetivo</option>
                        <option value="1">Tiempo</option>
                        <option value="2">Repeticiones</option>
                        <option value="3">Rondas</option>
                        <option value="4">Peso</option>
                    </select>
                    <label for="fechaEntreno">Fecha:</label>            
                    <input type="date" name ="fechaEntreno" class="form-control" value ="" >
                    
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div><!-- aqui termina el modal-->
</table>
    
</div>