<?php
//print_r($_POST);

$txtID        = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre    = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidoP = (isset($_POST['txtApellidoP']))?$_POST['txtApellidoP']:"";
$txtApellidoM = (isset($_POST['txtApellidoM']))?$_POST['txtApellidoM']:"";
$txtCorreo    = (isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtFoto      = (isset($_POST['txtFoto']))?$_POST['txtFoto']:"";
$accion       = (isset($_POST['accion']))?$_POST['accion']:"";

include("../Conexion/conexion.php");

switch($accion){

    case "btnAgregar":
        $sentencia = $pdo->prepare("INSERT INTO empleados(Nombre,ApellidoP,ApellidoM,Correo,Foto) 
                    VALUES (:Nombre,:ApellidoP,:ApellidoM,:Correo,:Foto)");
        
        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':ApellidoP',$txtApellidoP);
        $sentencia->bindParam(':ApellidoM',$txtApellidoM);
        $sentencia->bindParam(':Correo',$txtCorreo);
        $sentencia->bindParam(':Foto',$txtFoto);
        $sentencia->execute();

    break;
    case "btnModificar":
        echo "Modificar";
    break;
    case "btnEliminar":
        echo "Eliminar";
    break;
    case "btnCancelar":
        echo "Cancelar";
    break;
}

$sentencia = $pdo->prepare("SELECT * FROM `empleados` WHERE 1");
$sentencia->execute();
$listarEmpleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
print_r($listarEmpleados);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script-->
</head>
<body>
    <div class="container">
        <form action="" method="post" ectype="multipart/form-data">
        <label for="">ID:</label>
        <input type="text" name="txtID" placeholder="" id="txtID" require="">
        <br>
        <label for="">Nombre(s):</label>
        <input type="text" name="txtNombre" placeholder="" id="txtNombre" require="">
        <br>
        <label for="">Apellido Paterno:</label>
        <input type="text" name="txtApellidoP" placeholder="" id="txtApellidoP" require="">
        <br>
        <label for="">Apellido Materno:</label>
        <input type="text" name="txtApellidoM" placeholder="" id="txtApellidoM" require="">
        <br>
        <label for="">Correo:</label>
        <input type="text" name="txtCorreo" placeholder="" id="txtCorreo" require="">
        <br>
        <label for="">Foto:</label>
        <input type="text" name="txtFoto" placeholder="" id="txtFoto" require="">
        <br>
        <button value="btnAgregar" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" type="submit" name="accion">Cancelar</button>
        </form>
        <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php foreach($listarEmpleados as $empleado){ ?>
                <tr>
                    <td><?php echo $empleado['Foto'];?></td>
                    <td><?php echo $empleado['Nombre'];?> <?php echo $empleado['ApellidoP'];?> <?php echo $empleado['ApellidoM'];?></td>
                    <td><?php echo $empleado['Correo'];?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="txtID" value="<?php echo $empleado['ID']; ?>">
                    <input type="hidden" name="txtNombre" value="<?php echo $empleado['Nombre']; ?>">
                    <input type="hidden" name="txtApellidoP" value="<?php echo $empleado['ApellidoP']; ?>">
                    <input type="hidden" name="txtApellidoM" value="<?php echo $empleado['ApellidoM']; ?>">
                    <input type="hidden" name="txtCorreo" value="<?php echo $empleado['Correo']; ?>">
                    <input type="hidden" name="txtFoto" value="<?php echo $empleado['Foto']; ?>">
                    <input type="submit" value="Seleccionar" name="accion">
                    </form>
                    </td>
                </tr>
            <?php }?>
        </table>
    </div>
    </div>
</body>
</html>