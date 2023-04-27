<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- https://icons.getbootstrap.com/ -->
  </head>
<body background=banner-fut.jpg>
    
<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center mt-3">
        <a href="registros.php">
          <i class="bi bi-arrow-left-circle"></i>
        </a>
        Actualizar Datos  
      </h1>
      <hr class="mb-3">
    </div>


    
    <?php
    include('conexion.php');
    $idJugador     = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sqlJugadores   = ("SELECT * FROM tabla_jugadores WHERE id='$idJugador' LIMIT 1");
    $queryJugadores = mysqli_query($con, $sqlJugadores);
    $dataJugador   = mysqli_fetch_array($queryJugadores);
    ?>

    <div class="col-md-5 mb-3">
      <h3 class="text-center">Datos</h3>
      <form method="POST" action="action.php?metodo=2" enctype="multipart/form-data">
      <input type="text" name="id" value="<?php echo $dataJugador['id']; ?>" hidden>
      <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="<?php echo $dataJugador['nombre']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" value="<?php echo $dataJugador['apellidos']; ?>">
        </div>
         <div class="mb-3">
          <label class="form-label">Clave</label>
          <input type="text" class="form-control" name="clave" value="<?php echo $dataJugador['clave']; ?>">
        </div>
          
        <div class="mb-3">
        <label for="Sexo">Sexo</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" value="M" <?php echo $dataJugador['sexo']==='M' ?  'checked' : '' ?> checked>
            <label class="form-check-label" for="sexoM">
              Masculino
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" value="F" <?php echo $dataJugador['sexo']==='F' ?  'checked' : '' ?>>
          <label class="form-check-label" for="sexoF">
            Fememino
          </label>
        </div>
        </div>
        <div class="mb-3">
          <label for="Sexo">Categoria</label>
          <select class="form-select" name="categoria">
          <?php  
            if($dataJugador['categoria'] =="Primera"){
              echo '<option value="Primera" selected>Primera</option>';             
              echo'<option value="Segunda">Segunda</option>';
              echo'<option value="Tercera">Tercera</option>';
              echo '<option value="Juvenil">Juvenil</option>';
              echo '<option value="Veteranos">Veteranos</option>';
              echo '<option value="Master">Master</option>';
              echo '<option value="Femenil">Femenil</option>';
              echo '<option value="Infantil">Infantil</option>';
            }elseif($dataJugador['categoria'] =="Segunda"){
              echo '<option value="Segunda" selected>Segunda</option>';
              echo'<option value="Primera">Primera</option>';              
              echo'<option value="Tercera">Tercera</option>';
              echo '<option value="Juvenil">Juvenil</option>';
              echo '<option value="Veteranos">Veteranos</option>';
              echo '<option value="Master">Master</option>';
              echo '<option value="Femenil">Femenil</option>';
              echo '<option value="Infantil">Infantil</option>';
            }elseif($dataJugador['categoria'] =="Tercera"){
              echo '<option value="Tercera" selected>Tercera</option>';
              echo'<option value="Primera">Primera</option>';
              echo'<option value="Segunda">Segunda</option>';              
              echo '<option value="Juvenil">Juvenil</option>';
              echo '<option value="Veteranos">Veteranos</option>';
              echo '<option value="Master">Master</option>';
              echo '<option value="Femenil">Femenil</option>';
              echo '<option value="Infantil">Infantil</option>';
            }elseif($dataJugador['categoria'] =="Juvenil"){
              echo '<option value="Juvenil" selected>Juveni</option>';
              echo'<option value="Primera">Primera</option>';
              echo'<option value="Segunda">Segunda</option>';  
              echo'<option value="Tercera">Tercera</option>';              
              echo '<option value="Veteranos">Veteranos</option>';
              echo '<option value="Master">Master</option>';
              echo '<option value="Femenil">Femenil</option>';
              echo '<option value="Infantil">Infantil</option>';
            }elseif($dataJugador['categoria'] =="Veteranos"){
              echo '<option value="Veteranos" selected>Veteranos</option>';
              echo'<option value="Primera">Primera</option>';
              echo'<option value="Segunda">Segunda</option>';
              echo'<option value="Tercera">Tercera</option>';
              echo '<option value="Juvenil">Juvenil</option>';              
              echo '<option value="Master">Master</option>';
              echo '<option value="Femenil">Femenil</option>';
              echo '<option value="Infantil">Infantil</option>';
            }elseif($dataJugador['categoria'] =="Master"){
              echo '<option value="Master" selected>Master</option>';
              echo'<option value="Primera">Primera</option>';
              echo'<option value="Segunda">Segunda</option>';
              echo'<option value="Tercera">Tercera</option>';
              echo '<option value="Juvenil">Juvenil</option>';
              echo '<option value="Veteranos">Veteranos</option>';              
              echo '<option value="Femenil">Femenil</option>';
              echo '<option value="Infantil">Infantil</option>';
            }elseif($dataJugador['categoria'] =="Femenil"){
              echo '<option value="Femenil" selected>Femenil</option>';
              echo'<option value="Primera">Primera</option>';
              echo'<option value="Segunda">Segunda</option>';
              echo'<option value="Tercera">Tercera</option>';
              echo '<option value="Juvenil">Juvenil</option>';
              echo '<option value="Veteranos">Veteranos</option>';              
              echo '<option value="Master">Master</option>'; 
              echo '<option value="Infantil">Infantil</option>';
            }else{
              echo '<option value="Infantil" selected>Infantil</option>';
              echo'<option value="Primera">Primera</option>';
              echo'<option value="Segunda">Segunda</option>';
              echo'<option value="Tercera">Tercera</option>';
              echo '<option value="Juvenil">Juvenil</option>';   
              echo '<option value="Veteranos">Veteranos</option>';
              echo '<option value="Master">Master</option>';   
              echo '<option value="Femenil">Femenil</option>';              
            }
          ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Nueva Foto</label>
          <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg">
        </div>

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Actualizar datos 
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>
        
      </form>
    </div>

    <div class="col-md-5 mb-3">
        <label class="form-label">Foto</label>
        <br>
        <img src="Fotos/<?php echo $dataJugador['foto']; ?>" alt="foto perfil" class="card-img-top fotoPerfil">
    </div>



  </div>
</div>

<?php
  include('mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>