<?php  



require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=cf33','root',''));

$db = Flight::db();



Flight::route('/', function(){    

    $fecha_actual = (date("Y-m-d"));
    $sql="SELECT socios.id,socios.nombre,socios.apellidos,socios.foto,socios.celular,socios.correo,pagos_socios.fecha2 AS vencimiento
    FROM socios
   left JOIN pagos_socios ON pagos_socios.id_socio = socios.id
   ORDER BY vencimiento DESC";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $datosProyectos=$ejecutarSentencia->Fetchall();

    $parameters1 = array(
        'socios'=>$datosProyectos,
        'fecha_actual'=>$fecha_actual
     );
    Flight::render ('cabecera');
    Flight::render ('proyectos/listar',$parameters1); //esta variable es para mostrar los dtaos en la vista listar
    Flight::render ('pie');

});

Flight::route('POST /registar_pago', function(){
 $idCliente=Flight::request()->data->idCliente;
 $membresiatipo=Flight::request()->data->membresiatipo;
 $fechaPago=  date('Y-m-d');
 $fechainicio=Flight::request()->data->fechainicio;
 $fechafin=Flight::request()->data->fechafin;
 $precioMembresia=Flight::request()->data->precioMembresia;
 $inPagoTipo=Flight::request()->data->inPagoTipo;

 $sql="INSERT INTO pagos_socios(id_socio,id_membresia,fecha_pago,fecha1,fecha2,total_pago,tipo_pago) VALUES (?,?,?,?,?,?,?)";
 $ingresar=Flight::db()->prepare($sql);
 $ingresar->bindParam(1,$idCliente); 
 $ingresar->bindParam(2,$membresiatipo);
 $ingresar->bindParam(3,$fechaPago);
 $ingresar->bindParam(4,$fechainicio);
 $ingresar->bindParam(5,$fechafin);
 $ingresar->bindParam(6,$precioMembresia);
 $ingresar->bindParam(7,$inPagoTipo);

    $ingresar->execute();

    if ($ingresar) {
        echo "<script languaje='javascript'>alert('el pago se registro con exito'); location.href ='./';</script>";
     } 
});

Flight::route('POST /registrar_gasto', function(){
    $txtconcepto=Flight::request()->data->txtconcepto;
    $txtcantidad=Flight::request()->data->txtcantidad;
    $fechaGasto=  date('Y-m-d');

    
    $sql="INSERT INTO gastos(concepto,cantidad,fecha) VALUES (?,?,?)";

    $ingresar=Flight::db()->prepare($sql);
    $ingresar->bindParam(1,$txtconcepto); 
    $ingresar->bindParam(2,$txtcantidad);
    $ingresar->bindParam(3,$fechaGasto);
       $ingresar->execute();

       if ($ingresar) {

           echo "<script languaje='javascript'>alert('el pago se registro con exito'); location.href ='./gastos';</script>";
        } 

   });

Flight::route('POST /editar_socio', function(){

    $id=flight::request()->data->idCliente;
    $editCliente=flight::request()->data->editCliente;
    $editApellidos=Flight::request()->data->editApellidos;
    $editCel=Flight::request()->data->editCel;
    $editcorreo=Flight::request()->data->editCorreo;

    $sql="UPDATE sistema.socios SET nombre=?,apellidos=?,celular=?,correo=? where id=$id";

    $ingresar=Flight::db()->prepare($sql);
    $ingresar->bindParam(1,$editCliente);
    $ingresar->bindParam(2,$editApellidos);
    $ingresar->bindParam(3,$editCel); 
    $ingresar->bindParam(4,$editcorreo); 
    $ingresar->execute();

    if ($ingresar == TRUE) {

        echo "<script languaje='javascript'>alert('La modificacion se realizo con exito'); location.href ='./';</script>";

     } 
   });

   Flight::route('GET /reportes', function(){

    $sql="SELECT  COUNT(ID) AS total FROM registro WHERE FECHA > CURDATE() ";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $datosProyectos=$ejecutarSentencia->Fetchall();



    Flight::render ('cabecera');
    Flight::render ('proyectos/reportes',array('datos'=>$datosProyectos));
    Flight::render ('pie');

});

//VISTA REPORTE SOCIOS

Flight::route('GET /reporte_socios', function(){

    $sql="SELECT COUNT(id) AS total FROM socios";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $totalsocios=$ejecutarSentencia->Fetchall();
    $sql="SELECT COUNT(id) AS total FROM socios where sexo ='1'";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $sociosh=$ejecutarSentencia->Fetchall();


    $sql="SELECT COUNT(id) AS total FROM socios where sexo ='2'";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $sociosm=$ejecutarSentencia->Fetchall();

    $sql="SELECT SUM(total_pago)total FROM pagos_socios";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $anual=$ejecutarSentencia->Fetchall();

    $sql="SELECT COUNT(tipo_pago) AS total FROM pagos_socios where tipo_pago ='2'";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $pagoTarjeta=$ejecutarSentencia->Fetchall();

    $sql="SELECT SUM(cantidad) AS total FROM gastos";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $gastos=$ejecutarSentencia->Fetchall();

    
    date_default_timezone_set('America/Mexico_City');

    $dia= date("d");

    $sql="SELECT count(id) AS total FROM registro WHERE DAY(fecha) = $dia;";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $diario=$ejecutarSentencia->Fetchall();
    $mes = date("m");

    $sql="SELECT SUM(total_pago) AS total FROM pagos_socios WHERE MONTH(fecha_pago) = $mes;";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $mensual=$ejecutarSentencia->Fetchall();

    $parameters3 = array(

        'socioh'=>$sociosh,
        'total'=>$totalsocios,
        'sociom'=> $sociosm,
        'anual'=>$anual,
        'pagotarjeta'=>$pagoTarjeta,
        'gastos'=>$gastos,
        'diario'=>$diario,
        'mes'=>$mensual
     );

    Flight::render ('cabecera');
    Flight::render ('proyectos/reporte_socios',$parameters3);
    Flight::render ('pie');

});

//mostrar la vista crear nuevos usuarios

Flight::route('GET /crear', function(){

    Flight::render ('cabecera');
    Flight::render ('proyectos/crear');
    Flight::render ('pie');

});

Flight::route('POST /crear', function(){

    
    $inNombre=Flight::request()->data->inNombre;//recibes datos del post en la vista crear
    $inApellidos=Flight::request()->data->inApellidos;
    $inCelular=Flight::request()->data->inCelular;
    $inCorreo=Flight::request()->data->inCorreo;
    $inFecha=Flight::request()->data->inFecha;
    $inSexo=Flight::request()->data->inSexo;
   #$inMembresia=Flight::request()->data->inMembresia;
    $imagen=Flight::request()->files['inFoto'];
    $fecha=new DateTime();    
    $nombreArchivo=($imagen['name']!='')?$fecha->getTimestamp()."_".$imagen['name']:"";
    $tmpImagen=$imagen['tmp_name'];
    if ($tmpImagen!=""){
        move_uploaded_file($tmpImagen,"img/".$nombreArchivo);
    }
    $archivo=$nombreArchivo;
    $sql="INSERT INTO socios (nombre,apellidos,celular,correo,fecha_ingreso,sexo,foto) VALUES (?,?,?,?,?,?,?);";
    $ejecutar=Flight::db()->prepare($sql);
    $ejecutar->bindParam(1,$inNombre);
    $ejecutar->bindParam(2,$inApellidos);
    $ejecutar->bindParam(3,$inCelular);
    $ejecutar->bindParam(4,$inCorreo);
    $ejecutar->bindParam(5,$inFecha);
    $ejecutar->bindParam(6,$inSexo);
    $ejecutar->bindParam(7,$archivo);
    $ejecutar->execute();
    if ($ejecutar){
        $mensaje= "Registro agregado con exito";
    } else {
        $mensaje= "Algo salio mal";
    }

    Flight::render ('cabecera');
    Flight::render ('proyectos/crear',array ('mensaje'=>$mensaje));
    Flight::render ('pie');

   # flight::redirect('/');

});

Flight::route('GET /membresias', function(){

    $sql="SELECT * FROM membresias";

    $ejecutar=Flight::db()->prepare($sql);

    $ejecutar->execute();

    $result=$ejecutar->Fetchall();

    

    Flight::render ('cabecera');

    Flight::render ('proyectos/membresias',array('membresias'=>$result));

    Flight::render ('pie');

});

Flight::route('GET /crear_membresias', function(){

    Flight::render ('cabecera');

    Flight::render ('proyectos/crear_membresias');

    Flight::render ('pie');

});

Flight::route('POST /crear_membresias', function(){


    $inNombre=Flight::request()->data->inNombre;
    $inDescripcion=Flight::request()->data->inDescripcion;
    $inDuracion=Flight::request()->data->inDuracion;
    $inCosto=Flight::request()->data->inCosto;
    
    $sql="INSERT INTO membresias (nombre,descripcion,duracion,costo) VALUES (?,?,?,?);";
    $ejecutar=Flight::db()->prepare($sql);
    $ejecutar->bindParam(1,$inNombre);
    $ejecutar->bindParam(2,$inDescripcion);
    $ejecutar->bindParam(3,$inDuracion);
    $ejecutar->bindParam(4,$inCosto);
    $ejecutar->execute();
    if ($ejecutar){
        $mensaje ="Registro agregado con exito";
    }

    Flight::render ('cabecera');
    Flight::render ('proyectos/crear_membresias',array('mensaje'=>$mensaje));
    Flight::render ('pie');
});

Flight::route('GET /clases_prueba', function(){

    Flight::render ('cabecera');
    Flight::render ('proyectos/clases_prueba');
    Flight::render ('pie');

});


Flight::route('POST /clases_prueba', function(){ 
    $inNombre=Flight::request()->data->inNombre;
    $inApellidos=Flight::request()->data->inApellidos;
    $inCelular=Flight::request()->data->inCelular;
    $fecha=Flight::request()->data->inFecha;
    $inVisita=Flight::request()->data->inVisita;
    
    $sql="INSERT INTO clases_prueba (nombre,apellidos,celular,fecha,visita) VALUES (?,?,?,?,?);";
    $ejecutar=Flight::db()->prepare($sql);

    $ejecutar->bindParam(1,$inNombre);

    $ejecutar->bindParam(2,$inApellidos);

    $ejecutar->bindParam(3,$inCelular);

    $ejecutar->bindParam(4,$fecha);

    $ejecutar->bindParam(5,$inVisita);

    $ejecutar->execute();

    if ($ejecutar == TRUE) {

        echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href ='./clases_prueba';</script>";    

     } 

});

Flight::route('GET /registro', function(){

    Flight::render ('cabecera');
    Flight::render ('proyectos/registro');
    Flight::render ('pie');

});

Flight::route('POST /registro', function(){

    date_default_timezone_set('America/Mexico_City');
    $inId=Flight::request()->data->inId;
    $hoy= date('Y-m-d H:i:s');
    $sql="SELECT socios.id,socios.nombre,pagos_socios.fecha2 as vencimiento,socios.foto as foto FROM socios
    INNER JOIN pagos_socios ON pagos_socios.id_socio = socios.id where socios.id =(?) 
    ORDER BY pagos_socios.id desc LIMIT 1;";
       $ejecutarSentencia=Flight::db()->prepare($sql);
       $ejecutarSentencia->bindParam(1,$inId);
       $ejecutarSentencia->execute();
       $registro=$ejecutarSentencia->Fetchall();
       $mensaje= "";
       if (count($registro) <= 0){
           $mensaje= "No existe el usuario";
       }
       else{
        $sql="INSERT INTO registro (id_socio,fecha) VALUES (?,?);";
        $ejecutar=Flight::db()->prepare($sql);
        $ejecutar->bindParam(1,$inId);
        $ejecutar->bindParam(2,$hoy);
        $ejecutar->execute();   
       }
       $parameters2 = array(
           'socio'=>$registro,
           'mensaje'=>$mensaje,
           'hoy'=>$hoy
        );
   Flight::render ('cabecera');
   Flight::render ('proyectos/registro2',$parameters2);
   Flight::render ('pie');

});

Flight::route('GET /listar_visitas', function(){

    

    $sql="SELECT registro.id_socio as id,registro.fecha,socios.nombre,socios.apellidos,socios.foto
     FROM REGISTRO
     INNER JOIN SOCIOS on socios.id = registro.id_socio order by fecha desc";
    $ejecutarSentencia=Flight::db()->prepare($sql);
    $ejecutarSentencia->execute();
    $registros=$ejecutarSentencia->Fetchall();
    Flight::render ('cabecera');
    Flight::render ('proyectos/listar_visitas',array('registros'=>$registros));
    Flight::render ('pie');

});


//listar entrenos
Flight::route('GET /entreno', function(){ //esta es la url para accesar

    $sql="SELECT * FROM entrenos order by id desc";
    $ejecutar=Flight::db()->prepare($sql);
    $ejecutar->execute();
    $result=$ejecutar->Fetchall();

    $sql2="SELECT * FROM socios where status = 1";
    $ejecutar=Flight::db()->prepare($sql2);
    $ejecutar->execute();
    $result2=$ejecutar->Fetchall();

    $datosresultados = array(
        'entrenos' => $result,
        'socios' => $result2
    );       
    
    Flight::render ('cabecera');
    Flight::render ('proyectos/entrenos',$datosresultados); //de aqui sale la vista para la URL y envio de datos para la vista
    Flight::render ('pie');

});

Flight::route('GET /creaentreno', function(){ //esta es la url para accesar

    Flight::render ('cabecera');
    Flight::render ('proyectos/creaentrenos'); //de aqui sale la vista para la URL y envio de datos para la vista
    Flight::render ('pie');

});
//crear entre
Flight::route('POST /crear_entreno', function(){
    $entrenoNombre=Flight::request()->data->entrenoNombre;
    $calentamiento=flight::request()->data->calentamiento;
    $fuerza =flight::request()->data->fuerza;
    $descripcionEntreno=Flight::request()->data->descripcionEntreno;
    $tipoEntreno=Flight::request()->data->tipoEntreno;
    $referencias=Flight::request()->data->referencias;
    $fechaEntreno=Flight::request()->data->fechaEntreno;

    $sql="INSERT INTO entrenos(nombre,calentamiento,fuerza,descripcion,objetivo,referencias,fecha) VALUES (?,?,?,?,?,?,?)";

    $ingresar=Flight::db()->prepare($sql);
    $ingresar->bindParam(1,$entrenoNombre);
    $ingresar->bindParam(2,$calentamiento); 
    $ingresar->bindParam(3,$fuerza);
    $ingresar->bindParam(4,$descripcionEntreno);
    $ingresar->bindParam(5,$tipoEntreno);
    $ingresar->bindParam(6,$referencias);
    $ingresar->bindParam(7,$fechaEntreno);

       $ingresar->execute();
       if ($ingresar) {
        echo "<script languaje='javascript'>
        alert('el entreno se registro con exito'); location.href ='./creaentreno';
        </script>";
     } else {
        echo "algo fallo";
     }
     //  flight::redirect('/creaentreno');
   });

//registra tu resultado
Flight::route('POST /resultados', function(){
    $idsocio=Flight::request()->data->socio;
    $entreno=Flight::request()->data->entreno;
    $resultado1=Flight::request()->data->result1;
    $resultado2=Flight::request()->data->result2;
    $resultado3=Flight::request()->data->result3;
    $notas=Flight::request()->data->notas;
    
//    $sql="INSERT INTO entrenos(nombre,calentamiento,fuerza,descripcion,objetivo,referencias,fecha) VALUES (?,?,?,?,?,?,?)";
    $sql="INSERT INTO resultados(id_socio,id_entreno,resultado1,resultado2,resultado3,notas) VALUES (?,?,?,?,?,?)";

    $ingresar=Flight::db()->prepare($sql);
    $ingresar->bindParam(1,$idsocio);
    $ingresar->bindParam(2,$entreno); 
    $ingresar->bindParam(3,$resultado1);
    $ingresar->bindParam(4,$resultado2);
    $ingresar->bindParam(5,$resultado3);
    $ingresar->bindParam(6,$notas);

       $ingresar->execute();
       if ($ingresar) {
        echo "<script languaje='javascript'>
        alert('el entreno se registro con exito'); location.href ='./entreno';
        </script>";
     } else {
        echo "algo fallo";
     }
     //  flight::redirect('/creaentreno');
   });

//termina registra tu resultado



   Flight::route('GET /inventario', function(){

    $sql="SELECT * FROM productos";
    $ejecutar=Flight::db()->prepare($sql);
    $ejecutar->execute();
    $result=$ejecutar->Fetchall();
    
    Flight::render ('cabecera');
    Flight::render ('proyectos/inventario',array('inventario'=>$result));
    Flight::render ('pie');

});//inserta productos a la tabla productos

Flight::route('POST /crear_producto', function(){

$productoNombre=Flight::request()->data->productoNombre;//recibes datos del post en la vista 

$productoDescripcion=Flight::request()->data->productoDescripcion;

$productoCosto=Flight::request()->data->productoCosto;

$productoCostoventa=Flight::request()->data->productoCostoventa;

$imagen=Flight::request()->files['idFoto'];

$fecha=Flight::request()->data->fechaProducto;

$HOY = new DateTime();

$nombreArchivo=($imagen['name']!='')?$HOY->getTimestamp()."_".$imagen['name']:"";

$tmpImagen=$imagen['tmp_name'];

if ($tmpImagen!=""){

    move_uploaded_file($tmpImagen,"img/".$nombreArchivo);

}

$archivo=$nombreArchivo;


$sql="INSERT INTO productos (nombre,descripcion,costo,costo_venta,foto,fecha) VALUES (?,?,?,?,?,?);";
$ejecutar=Flight::db()->prepare($sql);
$ejecutar->bindParam(1,$productoNombre);
$ejecutar->bindParam(2,$productoDescripcion);
$ejecutar->bindParam(3,$productoCosto);
$ejecutar->bindParam(4,$productoCostoventa);
$ejecutar->bindParam(5,$archivo);
$ejecutar->bindParam(6,$fecha);
$ejecutar->execute();

flight::redirect('/inventario');

});   

   Flight::route('POST /crear_inventario', function(){

    $idProducto=Flight::request()->data->idProducto;

    $productoNombre=Flight::request()->data->productoNombre;

    $productoDescripcion=Flight::request()->data->productoDescripcion;

    $productoCosto=Flight::request()->data->productoCosto;

    $cantidadProducto=Flight::request()->data->cantidadProducto;

    $fechaProducto=Flight::request()->data->fechaProducto;

   

    $sql="INSERT INTO inventario(id_producto,nombre,descripcion,costo,cantidad,fecha) VALUES (?,?,?,?,?,?)";

    $ingresar=Flight::db()->prepare($sql);

    $ingresar->bindParam(1,$idProducto); 

    $ingresar->bindParam(2,$productoNombre); 

    $ingresar->bindParam(3,$productoDescripcion);

    $ingresar->bindParam(4,$productoCosto);

    $ingresar->bindParam(5,$cantidadProducto);

    $ingresar->bindParam(6,$fechaProducto);

       $ingresar->execute();

       flight::redirect('/inventario');

   

   });//lista el inventario de productos

   Flight::route('GET /productos_inventario', function(){

    $sql="SELECT i.id_producto,p.nombre,p.descripcion,i.costo,i.cantidad,p.foto as foto

     FROM inventario i

     INNER JOIN productos p where p.id = i.id_producto";

    $ejecutar=Flight::db()->prepare($sql);

    $ejecutar->execute();   

    $result=$ejecutar->Fetchall();

        

    Flight::render ('cabecera');

    Flight::render ('proyectos/productos_inventario',array('inventario'=>$result));

    Flight::render ('pie');

}); 

Flight::route('GET /lista_pagos', function(){



    $meses = array(
        "1" => "Enero",
        "2" => "Febrero",
        "3" => "Marzo",
        "4" => "Abril",
        "5" => "Mayo",
        "6" => "Junio",
        "7" => "Julio",
        "8" => "Agosto",
        "9" => "Septiembre",
        "10" => "Octubre",
        "11" => "Noviembre",
        "12" => "Diciembre",
        "13" => "Historico"
    );
    $datosVista['meses'] = $meses;

    Flight::render ('cabecera');
    Flight::render ('proyectos/listar_pagos',$datosVista);
    Flight::render ('pie');
});

Flight::route('POST /lista_pagos2', function(){
    $mes=Flight::request()->data->txtMes;
    $tpago=Flight::request()->data->tPago;

    // $todes= ('-1');



    $sql="SELECT sum(total_pago) AS pago FROM pagos_socios WHERE MONTH(fecha1) =(?);";

    $ejecutarSentencia=Flight::db()->prepare($sql);

    $ejecutarSentencia->bindParam(1,$mes);

    $ejecutarSentencia->execute();

    $totalmes=$ejecutarSentencia->Fetchall();

    

    $sql="SELECT MONTH(fecha_pago)mes,id_socio,socios.nombre as name,socios.apellidos,membresias.nombre,fecha_pago,fecha2,total_pago 
    FROM pagos_socios 
    INNER JOIN socios ON socios.id = pagos_socios.id_socio
    INNER JOIN membresias ON membresias.id =pagos_socios.id_membresia
    WHERE MONTH(fecha1) =(?)";

    $consultaTipoPago = "";
    if($tpago > 0)

    {

        $consultaTipoPago = " AND pagos_socios.tipo_pago =(?)";

    }

    $sql = $sql.$consultaTipoPago;

    echo $tpago;

    /*

    "AND tipo_pago = (?) OR (?) = '-1'";

    */



    $ejecutarSentencia=Flight::db()->prepare($sql);

    $ejecutarSentencia->bindParam(1,$mes);



    if($tpago > 0) $ejecutarSentencia->bindParam(2,$tpago);



    // $ejecutarSentencia->bindParam(3,$todes); 

    $ejecutarSentencia->execute();

    $registro=$ejecutarSentencia->Fetchall();

    $mensaje= "";

    if (count($registro) <= 0){

        $mensaje= "No hay entradas en este mes";

    }else ($mensaje="Pagos del mes $mes"



    );

    $meses = array(

        "1" => "Enero",

        "2" => "Febrero",

        "3" => "Marzo",

        "4" => "Abril",

        "5" => "Mayo",

        "6" => "Junio",

        "7" => "Julio",

        "8" => "Agosto",

        "9" => "Septiembre",

        "10" => "Octubre",

        "11" => "Noviembre",

        "12" => "Diciembre",

        "13" => "Historico"

    );

    $tpagos = array(

        "1" => "Mensualidad",
        "2" => "Mensualidad2",
        "3" => "Mensualidad Matutina",
        "4" => "Semana",
        "5" => "3 meses",
        "6" => "visita",
        "7" => "Anualidad"
    );

    $parametros = array(

        'meses'=>$meses,
        'resultados'=>$registro,
        'mensaje'=>$mensaje,
        'cuenta'=>$totalmes,
        'tipos_pago'=>$tpagos
    );

    Flight::render ('cabecera');
    Flight::render ('proyectos/listar_pagos2',$parametros);
    Flight::render ('pie');

});

Flight::route('GET /gastos', function(){

    $sql="SELECT  * from gastos ";

    $ejecutarSentencia=Flight::db()->prepare($sql);

    $ejecutarSentencia->execute();

    $datosProyectos=$ejecutarSentencia->Fetchall();



    Flight::render ('cabecera');

    Flight::render ('proyectos/gastos',array('datos'=>$datosProyectos));

    Flight::render ('pie');

}); 

Flight::set('flight.log_errors', true);



Flight::start();





?>