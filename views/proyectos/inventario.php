
<br><br>
<div class="container">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Agregar producto
</button>

    <br><br>
    
    <br><br>
<table class="table">

    <thead>
        <tr>
            <th>#Producto</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>costo</th>
            <th>Imagen</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inventario as $membresia) {?>
            
            <tr>
            <td scope="row"><?php echo $membresia['id'];?></td>
            <td><?php echo $membresia['nombre'];?></td>
            <td><?php echo $membresia['descripcion'];?></td>
            <td>$<?php echo $membresia['costo'];?></td>
            <td> <img src="img/<?php echo $membresia['foto'];?>" width="100"></td>
            <td><a href=""><button type="button" class="btn btn-success"><i class="fas fa-cart-plus" style='font-size:24px'></i></button></a>
            <input type="hidden" value="<?php echo $membresia['id'];?>"> 
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_<?php echo $membresia['id'];?>">
            
            
            <i class='fas fa-cash-register'>Agrega inventario</i>
            </button></td>
        </tr>
        <!-- Modal 2-->
<div class="modal fade" id="Modal_<?php echo $membresia['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega producto al inventario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body"> <!--Cuerpo del modal -->
                <form action="crear_inventario" method="post">
                <label for="idProducto">Id del producto:</label>            
                    <input type="text" name ="idProducto" class="form-control" value ="<?php echo $membresia['id'];?>" >
                    <label for="productoNombre">Nombre del producto:</label>            
                    <input type="text" name ="productoNombre" class="form-control" value ="<?php echo $membresia['nombre'];?>" >
                    <br>
                    <label for="productoDescripcion">descripcion:</label>            
                    <input type="text" name ="productoDescripcion" class="form-control" value ="<?php echo $membresia['descripcion'];?>" >
                    <br>
                   
                    <label for="productoCosto">Costo compra:</label>            
                    <input type="text" name ="productoCosto" class="form-control" value ="<?php echo $membresia['costo'];?>" >
                    <br>
                    <label for="cantidadProducto">cantidad comprada:</label>            
                    <input type="text" name ="cantidadProducto" class="form-control" value ="" >
                    <br>
                    

                    <label for="fechaProducto">Fecha compra:</label>            
                    <input type="date" name ="fechaProducto" class="form-control" value ="" >
                    
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div><!-- aqui termina el modal-->
        <?php }?>
   
        <tr>
            <td scope="row">TOTALES</td>
            <td>???</td>
            <td>????</td>
            <td>????</td>
            <td>????</td>
        </tr>
    </tbody>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> <!--Cuerpo del modal -->
                <form action="crear_producto" method="post" enctype="multipart/form-data">
                    <label for="productoNombre">Nombre del producto:</label>            
                    <input type="text" name ="productoNombre" class="form-control" value ="" >
                    <br>
                    <label for="productoDescripcion">descripcion:</label>            
                    <input type="text" name ="productoDescripcion" class="form-control" value ="" >
                    <br>
                   
                    <label for="productoCosto">Costo compra:</label>            
                    <input type="text" name ="productoCosto" class="form-control" value ="" >
                    <br>
                    <label for="productoCostoventa">Costo venta:</label>            
                    <input type="text" name ="productoCostoventa" class="form-control" value ="" >
                    <br>
                    <label for="idFoto">Agrega una foto del producto:</label>            
                    <input type="file" name ="idFoto" class="form-control" value ="" >
                    <br>

                    <label for="fechaProducto">Fecha registro:</label>            
                    <input type="date" name ="fechaProducto" class="form-control" value ="" >
                    
                
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

