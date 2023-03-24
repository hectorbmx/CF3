<div class="container">
    <a name="" id="" class="btn btn-primary" href="./crear">Agregar socio</a>
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
                <th>Nombre</th>
                <th>Fecha</th>
                <th>foto</th>
                
                
                

            </tr>
        </thead>
        <tbody>

            <?php foreach ($registros as $membresia) { ?>

                <tr>
                    <td scope="row"><?php echo $membresia['id']; ?></td>
                    <td><?php echo $membresia['nombre'];?> <?php echo $membresia['apellidos']; ?></td>
                    <td><?php echo $membresia['fecha']; ?></td>
                    <td> <img src="img/<?php echo $membresia['foto']; ?>" width="100"></td>
                    

                    <!--<td><#?php if($intvl = $membresia['fecha2']->diff($getdate())>30) {echo "vencido"; }else echo "vigente";?></td>-->
                    <!--<td><#?php if ($membresia['fecha2'] <= getdate()){echo "vencido"; }else echo "vigente"; ?></td>-->
                    
                    
                </tr>

              
            <?php } ?>


        </tbody>

    </table>

</div>