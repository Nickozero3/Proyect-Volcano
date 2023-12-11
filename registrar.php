<?php
// Conexión a la Base de Datos
$conexion = mysqli_connect('localhost', 'root', '', 'clientes_volcano');

// Verificamos la conexión
if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}
// Obtenemos las variables del formulario
$nombre = ucwords($_POST['nombre']);
$apellido = ucwords($_POST['apellido']);
$email = $_POST['email'];  // No capitalizamos el email por convención
$telefono = $_POST['telefono'];
$localidad = ucwords($_POST['localidad']);
$direccion = ucwords($_POST['direccion']);

// fecha registro
$fecha_reg = date("d/m/y");

// Insertar datos en la tabla clientes
$sql = "INSERT INTO clientes(Nombre, Apellido, Email, Telefono, Localidad, Direccion, FechaReg) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$localidad', '$direccion','$fecha_reg')";

// Ejecutamos la consulta
if (mysqli_query($conexion, $sql)) {
    // Redirigimos a otra página después de la inserción exitosa
    header("Location: clientes.php");
    echo '<script> alert("Cliente añadido exitosamente");</script>';
    exit(); // Aseguramos que el script se detenga después de la redirección
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}

// Cerramos la conexión
mysqli_close($conexion);
