<div class="container">

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Formulario para crear entrenamiento</h4>
       
<form action="crear_entreno" method="post">

<label for="entrenoNombre">Nombre del entrenamiento:</label>            

<input type="text" name ="entrenoNombre" class="form-control" value ="" required>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Calentamiento general</span>
</div>
<textarea class="form-control" name="calentamiento" aria-label="Descriocion entrenamiento" required></textarea>
</div><br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Fuerza o habilidad</span>
</div>
<textarea class="form-control" name="fuerza" aria-label="Descriocion entrenamiento" required></textarea>
</div><br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Acondicionamiento</span>
</div>
<textarea class="form-control" name="descripcionEntreno" aria-label="Descripcion entrenamiento" required></textarea>
</div><br>
<select class="custom-select" name ="tipoEntreno"id="inputGroupSelect01">
    <option name ="tipoEntreno" selected>Objetivo</option>
    <option value="1">Tiempo</option>
    <option value="2">Repeticiones</option>
    <option value="3">Rondas</option>
    <option value="4">Peso</option>
</select><br>
<br>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Referencias</span>
</div>
<textarea class="form-control" name="referencias" aria-label="Descriocion entrenamiento"></textarea>
</div><br> 
<label for="fechaEntreno">Fecha:</label>            
<input type="date" name ="fechaEntreno" class="form-control" value ="" >
<button type="submit" class="btn btn-primary">Guardar</button>
</div>

</form>
    </div>
</div>
    
</div>
