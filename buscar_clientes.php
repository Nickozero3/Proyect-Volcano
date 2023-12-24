<?php
// Conexión a la Base de Datos
$conexion = mysqli_connect('localhost', 'root', '', 'clientes_volcano');

//// Recuperar los datos enviados por AJAX
$busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : '';
$cliente_id = isset($_POST['cliente_id']) ? $_POST['cliente_id'] : '';

// quita etiquetas html
$busquedafix = mysqli_real_escape_string($conexion, $busqueda);


if (!empty($busquedafix)) {
    // Realiza la búsqueda por nombre o apellido que contengan la cadena proporcionada
    $sql = "SELECT id, nombre, apellido FROM clientes WHERE CONCAT(nombre, ' ', apellido) LIKE '%$busqueda%' OR id = '%$cliente_id%'";
    $result = $conexion->query($sql);

    // Muestra los resultados de la búsqueda
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<p class="resultado_cliente"; 
                        onclick="seleccionarCliente(' . $row['id'] . ', \'' . $row['nombre'] . ' ' . $row['apellido'] . '\')
                        "style="width: 90%;
                        background-color: #30364a;
                        color: white;
                        padding: 15px;
                        border: 1px solid black;
                        border-radius:10px;
                        box-shadow: 0 0 8px rgba(0, 0, 0, 1.2);
                        margin: 10px auto;">';
            echo ucfirst($row['nombre']) . ' ' . ucfirst($row['apellido']);
            echo '</p>';

            // Obtén y muestra el historial de pagos para este cliente
            $idCliente = $row['id'];
            $sqlPagos = "SELECT * FROM historial_pagos WHERE cliente_id like $idCliente ORDER BY fecha_pago DESC";
            $resultPagos = $conexion->query($sqlPagos);

            ob_start(); // Inicio del almacenamiento en búfer


            if ($resultPagos->num_rows > 0) {
                // Calcular próxima fecha de vencimiento
                $fechaVencimiento = null;

                while ($rowPago = $resultPagos->fetch_assoc()) {
                    $fecha = $rowPago['fecha_pago'];
                    $fechaVencimiento = date('d-m-y', strtotime($fecha . ' +1 month'));
                    break; // Solo necesitamos la fecha de vencimiento del primer pago
                }
                echo "<p style='color: red; font-size:x-large; text-align:center;'>Próxima fecha de vencimiento: $fechaVencimiento.</p>";

                

                // Reiniciar el puntero del resultado para iterar sobre los pagos nuevamente
                $resultPagos->data_seek(0);
                while ($rowPago = $resultPagos->fetch_assoc()) {
                    $fecha = $rowPago['fecha_pago'];
                    echo '<div style="font-size:large;">';
                    echo '<p> | Fecha: ' . date('d-m-Y', strtotime($fecha . ' +1 month' . '-1 month')) . " ";
                    echo ' | Monto: ' . $rowPago['monto'] . " ";
                    echo ' | Método: ' . $rowPago['metodo_pago'] . " ";
                    echo ' | Referencia: ' . $rowPago['referencia_pago'] . '</p>','</div>';
                }
            } else {
                echo '<p>No hay historial de pagos</p>';
            }

            $historialPagos = ob_get_clean(); // Obtengo y limpio el contenido del búfer

            // Enviar el historial de pagos al div existente
            echo '<script>';
            echo 'document.getElementById("historial_pagos").innerHTML = \'' . addslashes($historialPagos) . '\';';
            echo '</script>';
        }
    } else {
    }
} else {
    // Vaciar div historial_pagos
    echo '<script>';
    echo '$("#historial_pagos").html("");';
    echo '</script>';
}

$conexion->close();
