<?php
// Conexión a la Base de Datos
$conexion = mysqli_connect('localhost', 'root', '', 'clientes_volcano');
$cliente_id = $_POST['cliente_id'];
$monto = $_POST['monto'];
$fecha_pago = $_POST['fecha_pago'];
$metodo_pago = $_POST['metodo_pago'];
$referencia_pago = $_POST['referencia_pago'];

$sql = "INSERT INTO historial_pagos(cliente_id, monto, fecha_pago, metodo_pago, referencia_pago)
        VALUES ('$cliente_id', '$monto', '$fecha_pago', '$metodo_pago', '$referencia_pago')";

if ($conexion->query($sql) === TRUE) {
    header("Location: {$_SERVER['HTTP_REFERER']}?success=true");
    exit();
} else {
    echo "Error al registrar el pago: " . $conexion->error;
}

$conexion->close();
