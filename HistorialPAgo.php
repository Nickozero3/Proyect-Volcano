<?php
$conexion = mysqli_connect('localhost', 'root', '', 'clientes_volcano');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los IDs y nombres de tabla1
$sql_tabla1 = "SELECT id, Nombre FROM clientes";
$result_tabla1 = $conexion->query($sql_tabla1);

if ($result_tabla1->num_rows > 0) {
    // Recorrer todos los IDs y nombres de tabla1
    while ($row_tabla1 = $result_tabla1->fetch_assoc()) {
        $id_tabla1 = $row_tabla1['id'];
        $nombre_tabla1 = $row_tabla1['Nombre'];

        // Consulta para verificar si existe algún dato en tabla2 con el mismo ID
        $sql_tabla2 = "SELECT * FROM historial_pagos WHERE cliente_id = $id_tabla1";
        $result_tabla2 = $conexion->query($sql_tabla2);

        if ($result_tabla2->num_rows < 1) {
            echo "No se encontraron datos en historial de pagos para el ID $id_tabla1 ($nombre_tabla1).<br>";
        } else {
            // echo "¡Se encontraron datos en historial de pagos para el ID $id_tabla1 ($nombre_tabla1)!<br>";
            // // Puedes realizar otras acciones si se encuentra algún dato
        }
    }
} else {
    echo "No hay datos en tabla1.";
}

// Cerrar la conexión
$conexion->close();

