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
        <div class="content">
            <div id="form-modal" class="hidden">
                <div class="form" id="form-container">
                    <h3>Nuevo Cliente</h3>
                    <form action="registrar.php" method="POST" autocomplete="off">

                        <div>
                            <label class="añadirlabel" for="fname">Nombre</label>
                            <input type="text" id="fname" name="nombre" placeholder="Tu nombre.." required>
                        </div>

                        <div>
                            <label class="añadirlabel" for="lname">Apellido</label>
                            <input type="text" id="lname" name="apellido" placeholder="Tu apellido.." required>

                        </div>

                        <div>
                            <label class="añadirlabel" for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Tu Email.." required>
                        </div>

                        <div>
                            <label class="añadirlabel" for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" placeholder="Tu Teléfono..." required>
                        </div>

                        <div>
                            <label class="añadirlabel" for="localidad">Localidad</label>
                            <select id="localidad" name="localidad" class="borde-coloreado" required>
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
                            <label class="añadirlabel" for="direccion">Dirección</label style="align-items:center;">

                            <textarea id="direccion" name="direccion" placeholder="Tu Dirección.." required></textarea>
                        </div>

                        <button type="submit" value="Enviar">Añadir</button>
                    </form>
                </div>
            </div>
            <button class="add" id="add" style="float:right;" onclick="showForm()">Añadir Cliente</button>

        </div>


        <div id="users-list">
            <?php
            // Conectar a la BD  -->
            $db = mysqli_connect("localhost", "root", "", "clientes_volcano");

            // Consulta para obtener los usuarios -->
            $query = "SELECT * FROM clientes ORDER BY nombre ASC";
            $result = mysqli_query($db, $query);

            // Mostrar usuarios con un bucle
            echo '<div style="margin-right: 10%;">';
            echo '<div style="border: 3px solid blue; padding: 15px; text-align:center; font-size: x-large; margin-bottom:20px; max-width: 90%;"> Listado de Clientes </div>'; // Listado de clientes 
            echo '<div style="overflow-x: auto; overflow-y: auto; max-height:700px">'; // Contenedor para hacer la tabla responsive
            echo '<table style="width: 100%; border-collapse: collapse; text-align: center; box-sizing: border-box;">';
            echo '<tr style="font-size:18px;">';
            echo '<th style="width: 10%; border: 2px solid black; padding-top:20px;">Nombre</th>';
            echo '<th style="width: 10%; border: 2px solid black; padding-top:20px;">Apellido</th>';
            echo '<th style="width: 15%; border: 2px solid black; padding-top:20px;">Correo Electrónico</th>';
            echo '<th style="width: 10%; border: 2px solid black; padding-top:20px;">Teléfono</th>';
            echo '<th style="width: 10%; border: 2px solid black; padding-top:20px;">Localidad</th>';
            echo '<th style="width: 15%; border: 2px solid black; padding-top:20px;">Dirección</th>';
            echo '<th style="width: 15%; border: 2px solid black; padding-top:20px; padding: 10px 20px; min-width: 150px;">Fecha Registro - Primer mes</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                $fields = ['Nombre', 'Apellido', 'Email', 'Telefono', 'Localidad', 'Direccion', 'FechaReg'];

                foreach ($fields as $field) {
                    $minWidthStyle = ($field === 'Email') ? 'min-width: 25ch;' : '';

                    echo '<td style="border: 2px solid black; padding: 10px 10px; ' . $minWidthStyle . '">' . ucfirst($row[$field]) . '</td>';
                }
                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
            ?>
        </div>


    </main>
    <script src="script.js"></script>
</body>

</html>