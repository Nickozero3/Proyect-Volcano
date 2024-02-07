<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="imgs/320500709_876919420155327_52128729890993267_n.jpg" type="image/jpg">
    <title>Gym</title>
</head>

<body>
    <header></header>
    <nav>
        <a href="index.php"><img src="imgs/320500709_876919420155327_52128729890993267_n.jpg" alt="Logo" /></a>
        <a href="index.php" class="boton">Panel Inicial</a>
        <a href="clientes.php" class="boton">Clientes</a>
        <a href="pagos.php" class="boton">Pagos</a>
    </nav>

    <main>
        <!-- Contenido principal de tu página -->
        <h1>Bienvenido a mi página</h1>
        <p>Este es un ejemplo de una página con un nav lateral.</p>




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

        ?>



    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>