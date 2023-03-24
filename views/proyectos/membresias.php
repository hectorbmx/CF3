<br><br>
<div class="container">
    <a name="" id="" class="btn btn-primary" href="./crear_membresias" >Agregar membresia</a>
    <a name="" id="" class="btn btn-success" href="./crear" >Agregar socio</a>
    
    <br><br>
<table class="table">
    <thead>
        <tr>
            <th># membresia</th>
            <th>Nombre</th>
            <th>duracion</th>
            <th>costo</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($membresias as $membresia) {?>
            
            <tr>
            <td scope="row"><?php echo $membresia['id'];?></td>
            <td><?php echo $membresia['nombre'];?></td>
            <td><?php echo $membresia['descripcion'];?></td>
            <td><?php echo $membresia['costo'];?></td>
        
        </tr>
        <?php }?>
   
        <tr>
            <td scope="row">TOTALES</td>
            <td>???</td>
            <td>????</td>
        </tr>
    </tbody>
</table>
    
</div>

