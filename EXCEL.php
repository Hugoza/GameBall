<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=User list.xls');
?>
<?php
//$conexion=mysqli_connect('localhost','id18996912_ch3c0','}Ctc4m0]j*@tbZKe','id18996912_formulario');
$conexion=mysqli_connect('localhost','root','','liga_futbol');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imprimir</title>
</head>
<body>

    <br>
    <table border="1" >
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Categoria</td>
            <td>Equipo</td>
            <td>Clave</td>
            <td>Foto</td>
            <td>Fecha de Registro</td>
        </tr> 

        <?php
          $sql="SELECT * from tabla_jugadores";
          $result=mysqli_query($conexion,$sql);

          while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
            <td><?php echo $mostrar['id']?></td>
            <td><?php echo $mostrar['nombre']?></td>
            <td><?php echo $mostrar['apellidos']?></td>
            <td><?php echo $mostrar['categoria']?></td>
            <td><?php echo $mostrar['equipo']?></td>
            <td><?php echo $mostrar['clave']?></td>
            <td><?php echo $mostrar['foto']?></td>
            <td><?php echo $mostrar['fechaRegistro']?></td>
        </tr>

        <?php
    }
        ?>
    </table>

</body>
</html>