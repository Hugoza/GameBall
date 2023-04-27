<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- https://icons.getbootstrap.com/ -->
  </head>
<body background="banner-fut.jpg">

<div class="container mt-5" >
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center mt-3">
        <a href="registrosnew.php">
          <i class="bi bi-arrow-left-circle"></i>
        </a>
        Credencial
      </h1>
      <hr class="mb-3">
    </div>

<?php
    include('conexion.php');
    $idJugador      = ($_REQUEST['id']);
    //$idJugador      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sqlJugadores   = ("SELECT * FROM tabla_jugadores WHERE id='$idJugador' LIMIT 1");
    $queryJugadores = mysqli_query($con, $sqlJugadores);
    $totalJugadores = mysqli_num_rows($queryJugadores);
?>

 <div>
 <?php
    while ($dataJugador = mysqli_fetch_array($queryJugadores)) { ?>
    <div  class="card" style="width: 30rem;">
        <img src="Fotos/<?php echo $dataJugador['foto']; ?>" alt="foto perfil" class="card-img-top fotoPerfil" class="col-md-3">
 </div>

 <div>
 <div class="col-md-9 mb-first" class="card-body" class="text-h1">
            <p style="text-align:right" class="titleAlumno"><?php echo $dataJugador['nombre']; ?></p>
            <p style="text-align:right" class="card-text titleJugador"><?php echo $dataJugador['apellidos']; ?></p>
        </div>
 </div>
 <div class="col-md-last" class="card">
 
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Clave:</strong> <?php echo $dataJugador['clave']; ?> </li>
            <li class="list-group-item"><strong>Sexo:</strong> <?php echo $dataJugador['sexo']; ?></li>
            <li class="list-group-item"><strong>Categoria:</strong>  <?php echo $dataJugador['categoria']; ?></li>
            <li class="list-group-item"><strong>Equipo:</strong>  <?php echo $dataJugador['equipo']; ?></li>
            <li class="list-group-item"><strong>Fecha Registro:</strong> <?php echo $dataJugador['fechaRegistro']; ?></li>
        </ul>
        <div class="card-body">

        <div class="d-grid gap-2 col-12 mx-auto">

        </div>
        </div>
    </div>
    <?php } ?>
 </div>



  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>