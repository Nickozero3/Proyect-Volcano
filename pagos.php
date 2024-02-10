<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="imgs/320500709_876919420155327_52128729890993267_n.jpg" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Agrega la referencia a jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Gym</title>
</head>

<body style="background-color:rgb(184, 184, 184);" class="text-black">
    <header></header>
    <nav>
        <a href="index.php"><img src="imgs/320500709_876919420155327_52128729890993267_n.jpg" alt="Logo" /></a>
        <a href="index.php" class="boton">Panel Inicial</a>
        <a href="clientes.php" class="boton">Clientes</a>
        <a href="pagos.php" class="boton">Pagos</a>
    </nav>

    <main style="display:flex; flex-direction: column; padding-top:3rem;">
        <h2>Registrar Pago</h2>

        <form class="pagos" action="añadir_Pago.php" method="POST" oninput="buscarClientes()" onclick="buscarClientes()" autocomplete="off">
            <div style="text-align:center;font-size: 20px; padding-bottom:20px; border-bottom:1px solid #000; margin-bottom:50px;">
                <label for="cliente_id">Buscar y Seleccionar Cliente:</label>
                <!-- Agrega un campo de entrada para buscar clientes -->
                <input style="font-size: 16px;" placeholder="Introduzca Nombre y Apellido antes de seleccionar" type="text" name="cliente_busqueda" id="cliente_busqueda" onclick="buscarClientes()" autocomplete="off">
                <!-- Contenedor para mostrar los resultados de la búsqueda -->
                <div id="resultados_busqueda" style="max-height:300px; overflow-y:auto; width:40rem; margin: 0 auto;"></div>
            </div>
            <!-- Input oculto para almacenar el ID del cliente seleccionado -->
            <input type="hidden" name="cliente_id" id="cliente_id" onclick="buscarClientes()" method="POST">


            <div class="centrado">
                <div>
                    <label id="monto">Servicio:</label>
                    <select name="monto" id="monto" required; style="font-size: 20px;" required>
                        <option value="" disabled selected>Seleccione un monto</option>
                        <option value="5900"> Musculacion 3 Dias a la semana x 5900$</option>
                        <option value="6800"> Musculacion 5 Dias a la semana x 6800$</option>
                        <option value="8000"> Musculacion libre a la semana x 8000$</option>
                    </select>
                </div>

                <div>
                    <label id="fecha_pago">Fecha de Pago:</label>
                    <input style="font-size: 20px;" type="date" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div>
                    <label id="metodo_pago">Método de Pago:</label>
                    <select style="font-size:large" id="metodo_pago" name="metodo_pago" class="borde-coloreado" required>
                        <option value="" disabled selected>Elige el Metodo</option>
                        <option value="MercadoPago">Mercado Pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Otro">Otro..</option>
                    </select>
                </div>

                <div>
                    <label id="referencia_pago">Referencia de Pago:</label>
                    <input style="font-size:large" placeholder="¿a quien?..." type="text" name="referencia_pago" required>
                </div>

                <button class="m-5" type="submit">Registrar Pago</button>
            </div>
        </form>

        <h2 style="text-align:center; padding-top:20px; border-top:1px solid #000">Historial de pagos</h2>
        <div id="historial_pagos" style='color: green; '>
            <div>
                <p style="color:#000">Ingresa un Nombre o Apellido para la búsqueda</p>
            </div>
        </div>
    </main>
    <script src="script.js">
        // Al inicio de la página
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.get('pago') === 'acreditado') {

            Swal.fire({
                icon: 'success',
                title: 'Pago acreditado',
                text: 'El pago se registró correctamente!'
            });

        }
    </script>
</body>

</html>