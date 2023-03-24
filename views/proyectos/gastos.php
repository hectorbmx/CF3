<br><br>
<div class="container">
    
    <br><br>
<script >
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th># gasto</th>
                <th>concepto</th>
                <th>cantidad</th>
                <th>fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $membresia) { ?>
                <tr>
                    <td scope="row"><?php echo $membresia['id']; ?></td>
                    <td><?php echo $membresia['concepto']; ?></td>
                    <td><?php echo $membresia['cantidad']; ?></td>
                    <td><?php echo $membresia['fecha']; ?></td>
                    <!--<td><#?php if($intvl = $membresia['fecha2']->diff($getdate())>30) {echo "vencido"; }else echo "vigente";?></td>-->
                    <!--<td><#?php if ($membresia['fecha2'] <= getdate()){echo "vencido"; }else echo "vigente"; ?></td>-->
                </tr>
                            <?php } ?>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">

<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
</svg>        
  Agregar gasto
</button>
<br>
<br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="registrar_gasto" method="post">
                                    
           <label for="nombreSocio">Concepto:</label>
           <input type="text" name="txtconcepto" class="form-control" value="" placeholder="">                                
           <label for="nombreSocio">Cantidad:</label>
           <input type="text" name="txtcantidad" class="form-control" value="" placeholder="">                                
           <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
           <button type="submit" class="btn btn-primary">Guardar Pago</button>
      </form>
                            </div>

        
      </div>
      
    </div>
  </div>
</div>

        </tbody>
    </table>
</div>