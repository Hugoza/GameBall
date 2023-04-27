<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- https://icons.getbootstrap.com/ -->
  </head>
<body>
<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
    <p class="text-center"><span>Registros</span> </p>
        <a href="./"><i class="bi bi-house"></i></a>
        <hr class="mb-3">
    
        <a href="cerrar.php">Cerrar</a>
        
    
    <?php
    
    include('conexion.php');
    $sqlJugadores   = ("SELECT * FROM tabla_jugadores ORDER BY id DESC");
    $queryJugadores = mysqli_query($con, $sqlJugadores);
    $totalJugadores = mysqli_num_rows($queryJugadores);

    ?>
    <div class="col-md-8">
    <h3 class="text-center">Registros <?php echo '(' . $totalJugadores . ')'; ?></h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Equipo</th>
                  <th scope="col">Clave</th>
                  <th scope="col">Sexo</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $conteo =1;
              while ($dataJugador = mysqli_fetch_array($queryJugadores)) { ?>
                <tr>
                  <td><?php echo  $conteo++ .')'; ?></td>
                  <td><?php echo $dataJugador['nombre']; ?></td>
                  <td><?php echo $dataJugador['apellidos']; ?></td>
                  <td><?php echo $dataJugador['categoria']; ?></td>
                  <td><?php echo $dataJugador['equipo']; ?></td>
                  <td><?php echo $dataJugador['clave']; ?></td>
                  <td><?php echo $dataJugador['sexo']==='M' ?  'Masculino' : 'Femenino' ?></td>
                  <td>
                  <a href="detalles.php?id=<?php echo $dataJugador['id']; ?>" class="btn btn-warning mb-2"   title="Ver datos del Jugador <?php echo $dataJugador['nombre']; ?>">
                  <i class="bi bi-tv"></i> Ver</a>
                    <a href="formEditar.php?id=<?php echo $dataJugador['id']; ?>" class="btn btn-info mb-2"   title="Actualizar datos del Jugador <?php echo $datajugador['nombre']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Actualizar</a>
                    <a href="action.php?id=<?php echo $dataJugador['id']; ?>&metodo=3&namePhoto=<?php echo $dataJugador['foto']; ?>" class="btn btn-danger mb-2" title="Borrar jugador <?php echo $dataJugador['nombre']; ?>">
                    <i class="bi bi-trash"></i> Borrar</a>
                  </td>
                </tr>
              <?php } ?>
            </table>
            <a href="./EXCEL.php" class="btn-small blue z-depth-2">Excel</a>
            <a href="./PDF.php" class="btn-small blue z-depth-2">PDF</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include('mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>