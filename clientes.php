<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="imgs/320500709_876919420155327_52128729890993267_n.jpg" type="image/jpg">
    <title>Nuevo Usuario</title>
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
        <div class="header">

            <div class="title">
                <h2>Clientes</h2>
            </div>

            <button class="add" onclick="showForm()">Añadir Cliente</button>

        </div>


        <div id="form-modal" class="hidden">

            <div class="form" id="form-container">
                <h3>Nuevo Cliente</h3>
                <form action="registrar.php" method="POST">

                    <div>
                        <label for="fname">Nombre</label>
                        <input type="text" id="fname" name="nombre" placeholder="Tu nombre..">
                    </div>

                    <div>
                        <label for="lname">Apellido</label>
                        <input type="text" id="lname" name="apellido" placeholder="Tu apellido..">

                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Tu Email..">
                    </div>

                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" placeholder="Tu Teléfono...">
                    </div>

                    <div>
                        <label for="localidad">Localidad</label>
                        <select id="localidad" name="localidad" class="borde-coloreado">
                            <option value="" disabled selected>Elige la localidad</option>
                            <option value="Valle Hermoso">Valle Hermoso</option>
                            <option value="La Falda">La Falda</option>
                            <option value="Huerta Grande">Huerta Grande</option>
                            <option value="Casa Granda">Casa Grande</option>
                            <option value="Villa Giardino">Villa Giardino</option>
                            <option value="Otro">Otro..</option>
                        </select>
                    </div>

                    <div>
                        <label for="direccion">Dirección</label style="align-items:center;">

                        <textarea id="direccion" name="direccion" placeholder="Tu Dirección.."></textarea>
                    </div>

                    <button type="submit" value="Enviar">Añadir</button>
                </form>

            </div>

        </div>



        <ul id="users-list">
            <?php
            // Conectar a la BD  -->
            $db = mysqli_connect("localhost", "root", "", "clientes_volcano");

            // Consulta para obtener los usuarios -->
            $query = "SELECT * FROM clientes ORDER BY nombre ASC";
            $result = mysqli_query($db, $query);

            // Mostrar usuarios con un bucle
            echo '<div style="margin-right: 10%;">';
            echo '<div style="border: 3px solid blue; padding: 10px; text-align: center; font-weight: bold; font-size: x-large;">Listado de Clientes</div>';
            echo '<div style="display:flex; flex-direction:row; list-style-type: none;  margin-top:20px; margin-bottom:20px; font-size: large;">';

            echo '<div style="flex: 0.8; border-left: 2px solid black; padding-left: 8px; border: 2px solid black;">Nombre</div>';
            echo '<div style="flex: 0.8; border-left: 2px solid black; padding-left: 5px; border: 2px solid black;">Apellido</div>';
            echo '<div style="flex: 1.2; border-left: 2px solid black; padding-left: 5px; border: 2px solid black;">Correo Electrónico</div>';
            echo '<div style="flex: 0.8; border-left: 2px solid black; padding-left: 5px; border: 2px solid black;">Teléfono</div>';
            echo '<div style="flex: 0.8; border-left: 2px solid black; padding-left: 5px; border: 2px solid black;">Localidad</div>';
            echo '<div style="flex: 1.0; border-left: 2px solid black; padding-left: 5px; border: 2px solid black;">Dirección</div>';
            echo '<div style="flex: 1.0; border-left: 2px solid black; padding-left: 5px; border: 2px solid black;">Fecha Registro - Primer mes</div>';
            echo '</div>';
            echo '</div>';


            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li style="list-style:none; font-size:large; padding-right:10%;">';
                echo '<ul style="display: flex; flex-direction: row; border-bottom: 1px solid black; padding: 5px; list-style-type: none; margin: 2px; padding: 2px; ">';
                echo '<li style="flex: 0.8; border-left: 2px solid black; padding-left: 5px; ">' . ucfirst($row['Nombre']) . '</li>';
                echo '<li style="flex: 0.8; border-left: 2px solid black; padding-left: 5px;">' . ucfirst($row['Apellido']) . '</li>';
                echo '<li style="flex: 1.2; border-left: 2px solid black; padding-left: 5px;">' . ucfirst($row['Email']) . '</li>';
                echo '<li style="flex: 0.8; border-left: 2px solid black; padding-left: 5px;">' . $row['Telefono'] . '</li>';
                echo '<li style="flex: 0.8; border-left: 2px solid black; padding-left: 5px;">' . ucfirst($row['Localidad']) . '</li>';
                echo '<li style="flex: 1; border-left: 2px solid black; padding-left: 5px;">' . ucfirst($row['Direccion']) . '</li>';
                echo '<li style="flex: 1; border-left: 2px solid black; padding-left: 5px; text-align:center;">' . $row['FechaReg'] . '</li>';
                echo '</ul>';
                echo '</li>';
            }

            echo '</table>';
            ?>
        </ul>

    </main>
    <script src="script.js"></script>
</body>

</html>