<br><br>

<div class="container">
    <br><br>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">  Registrar resultado
</button>

<br><br>

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

      <p class="card-text">
      <h5>REFERENCIAS DE EJERCICIOS</h5>  

    <a target="blank"><?php echo $registro['referencias'];?></a> </p>

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
        <h5 class="modal-title" id="exampleModalLabel">Registra tus resultados de hoy:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> <!--Cuerpo del modal -->


           <form method ="POST" action ="resultados">
           <?php foreach ($socios as $socio) {?>
           <select class="form-select" aria-label="Default select example">
            <option selected>Selecciona tu nombre</option>
            <option value="<?php echo $socio['id']?>"><?php echo $socio['nombre']; ?> </option>
            </select>
          <?php } ?>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ID atleta</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" placeholder="Escribe tu ID de atleta">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label"># del entreno</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" placeholder="ingresa el # del entrenamiento">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Registra tus resultados</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" placeholder="escribe tus resultados">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Notas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" placeholder="escribe si tienes algun comentario de hoy">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
</div><!-- aqui termina el modal-->
</table>

</div>



