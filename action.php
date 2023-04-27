<?php
include('conexion.php');
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');

$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);

//$metodoAction ==1, es crear un registro nuevo
if($metodoAction == 1){

    $fechaRegistro  = date('d-m-Y H:i:s A', time()); 
    $nombre       = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellidos         = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
    $categoria          = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
    $equipo        = filter_var($_POST['equipo'], FILTER_SANITIZE_STRING);
    $clave       = filter_var($_POST['clave'], FILTER_SANITIZE_STRING);
    $sexo         = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);

    //Informacion de la foto
    $filename       = $_FILES["foto"]["name"]; //nombre de la foto
    $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
    $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
    $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

//Se comprueba si la foto a cargar es correcto observando su extensión y tamaño, 100000 = 1 Mega 
if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
    //código para renombrar la foto 
    $logitudPass 	        = 8;
    $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
    $explode                = explode('.', $filename);
    $extension_foto         = array_pop($explode);
    $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

    //Verificando si existe el directorio, de lo contrario lo creo
    $dirLocal       = "Fotos";
    if (!file_exists($dirLocal)) {
        mkdir($dirLocal, 0777, true);
    }

    $miDir 		      = opendir($dirLocal); //Habro mi  directorio
    $urlFotoJugador    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

    //Muevo la foto a mi directorio.
    if(move_uploaded_file($sourceFoto, $urlFotoJugador)){
        $SqlInsertJugador = ("INSERT INTO tabla_jugadores(
            nombre,
            apellidos,
            categoria,
            equipo,
            clave,
            sexo,
            foto,
            fechaRegistro
        )
        VALUES(
            '".$nombre."',
            '".$apellidos."',
            '".$categoria."',
            '".$equipo."',
            '".$clave."',
            '".$sexo."',
            '".$nuevoNameFoto."',
            '".$fechaRegistro."'
        )");
        $resulInsert = mysqli_query($con, $SqlInsertJugador);
        ///print_r( $SqlInsertJugador);

    }
    closedir($miDir);
    header("Location:registros.php?a=1");

  }else{
    header("Location:registros.php?errorimg=1");
  }
}


//Actualizar registro 
if($metodoAction == 2){
    $idJugador      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

    $nombre       = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellidos       = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
    $categoria       = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
    $equipo       = filter_var($_POST['equipo'], FILTER_SANITIZE_STRING);
    $clave         = filter_var($_POST['clave'], FILTER_SANITIZE_STRING);
    $sexo           = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);

    $UpdateJugador    = ("UPDATE tabla_jugadores
        SET nombre='$nombre',
        apellidos='$apellidos', 
        categoria='$categoria',
        equipo='$equipo',
        clave='$clave', 
        sexo='$sexo'
        WHERE id='$idJugador' ");
    $resultadoUpdate = mysqli_query($con, $UpdateJugador);


    //Verificando si existe foto para actualizar
    if (!empty($_FILES["foto"]["name"])){
            $filename       = $_FILES["foto"]["name"]; //nombre de la foto
            $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
            $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
            $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
            $logitudPass 	        = 8;
            $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
            $explode                = explode('.', $filename);
            $extension_foto         = array_pop($explode);
            $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

            //Verificando si existe el directorio, de lo contrario lo creo
            $dirLocal       = "fotosJugadores";
            $miDir 		      = opendir($dirLocal); //Habro mi  directorio
            $urlFotoJugador    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

            //Muevo la foto a mi directorio.
        if(move_uploaded_file($sourceFoto, $urlFotoJugador)){
            $updateFoto = ("UPDATE tabla_jugadores SET foto='$nuevoNameFoto' WHERE id='$idJugador' ");
            $resultFoto = mysqli_query($con, $updateFoto);
        }
    }else{
        header("Location:registros.php?errorimg=1");
    }
  }

  header("Location:formEditar.php?update=1&id=$idJugador");
 }



//Eliminar 
if($metodoAction == 3){
    $idJugador  = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $namePhoto = filter_var($_REQUEST['namePhoto'], FILTER_SANITIZE_STRING);

    $SqlDeleteJugador = ("DELETE FROM tabla_jugadores WHERE  id='$idJugador'");
    $resultDeleteJugador = mysqli_query($con, $SqlDeleteJugador);
    
    if($resultDeleteJugador !=0){
        $fotoJugador = "fotosJugadores/".$namePhoto;
        unlink($fotoJugador);
    }
    
    $msj ="Jugador Borrado correctamente.";
    header("Location:registros.php?deletJugador=1&mensaje=".$msj);
 
}

?>