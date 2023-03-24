<br><br>
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
                <th>Apellidos</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Vencimiento</th>
                <th>Foto</th>
                <th>Acciones</th>
                <th>Estatus</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($socios as $membresia) { ?>

                <tr>
                    <td scope="row"><?php echo $membresia['id']; ?></td>
                    <td><?php echo $membresia['nombre']; ?></td>
                    <td><?php echo $membresia['apellidos']; ?></td>
                    <td><?php echo $membresia['celular']; ?></td>
                    <td><?php echo $membresia['correo']; ?></td>
                    <td><?php echo $membresia['vencimiento']; ?></td>


                    <!--<td><#?php if($intvl = $membresia['fecha2']->diff($getdate())>30) {echo "vencido"; }else echo "vigente";?></td>-->
                    <!--<td><#?php if ($membresia['fecha2'] <= getdate()){echo "vencido"; }else echo "vigente"; ?></td>-->
                    <td> <img src="img/<?php echo $membresia['foto']; ?>" width="100"></td>

                    <td><input type="hidden" value="<?php echo $membresia['id']; ?>">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?php echo $membresia['id']; ?>">
                            Pago
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#eModal_<?php echo $membresia['id']; ?>">
                            Editar
                        </button>
                    </td>
                    <td><?php if (empty($membresia['vencimiento'])) echo "<button type='button' class='btn btn-info'>Sin pago              
                    </button>";
                        elseif ($membresia['vencimiento'] >= $fecha_actual) echo "<button type='button' class='btn btn-success'>vigente</button>" ;
                        elseif ($membresia['vencimiento'] < $fecha_actual) echo "<button type='button' class='btn btn-danger'>Vencido</button>";
                        ?></td>
                </tr>

                <div class="modal fade" id="exampleModal_<?php echo $membresia['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar pago</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="registar_pago" method="post">
                                    <input type="text" name="idCliente" class="form-control" value="<?php echo $membresia['id']; ?>">
                                    <label for="nombreSocio">Nombre socio:</label>
                                    <input type="text" name="nombreCliente" class="form-control" value="" placeholder="<?php echo $membresia['nombre'];
                                                                                                                        echo $membresia['apellidos']; ?>">

                                    <label for="date">Fecha de incio:</label>

                                    <input type="date" name="fechainicio" class="form-control">
                                    <label for="date">Fecha de fin:</label>
                                    <input type="date" name="fechafin" class="form-control">
                                    <label for="tipMembresia">Tipo de membresia:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Membresia</label>
                                        </div>
                                        <select class="custom-select" name="membresiatipo" id="inputGroupSelect01">
                                            <option name="membresiatipo" selected>Elije...</option>
                                            <option value="1">Mensualidad</option>
                                            <option value="2">Mes 3 x Semana</option>
                                            <option value="3">Mensualidad matutina</option>
                                            <option value="4">Semanal</option>
                                        </select>
                                    </div>
                                    <label for="costoMembresia">Costo de la membresia:</label>
                                    <input type="text" name="precioMembresia" class="form-control" placeholder="precio">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="inPagoTipo" type="checkbox" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Efectivo
                                </label>
                                <br>
                                <input class="form-check-input" type="checkbox" name="inPagoTipo" value="2" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Tarjeta
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar Pago</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal editar registro socio-->
                <div class="modal fade" name="idSocio" id="eModal_<?php echo $membresia['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Socio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="editar_socio" method="post">
                                    <input type="text" name="idCliente" class="form-control" value="<?php echo $membresia['id']; ?>">
                                    <label for="nombreSocio">Nombre socio:</label>
                                    <input type="text" name="editCliente" class="form-control" value="" placeholder="<?php echo $membresia['nombre']; ?>">
                                    <label for="date">Apellidos:</label>
                                    <input type="text" name="editApellidos" placeholder=" <?php echo $membresia['apellidos']; ?>" class="form-control">
                                    <label for="cel">Celular:</label>
                                    <input type="text" placeholder="<?php echo $membresia['celular']; ?>" name="editCel" class="form-control">
                                    <label for="editCorreo">Correo:</label>
                                    <input type="text" placeholder="<?php echo $membresia['correo']; ?>" name="editCorreo" class="form-control">



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </tbody>

    </table>

</div>