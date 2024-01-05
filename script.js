// Función para buscar clientes y mostrar los resultados
function buscarClientes() {
  var busqueda = $('#cliente_busqueda').val();
  // Realizar la solicitud Ajax para buscar clientes
  $.ajax({
    url: 'buscar_clientes.php', // Reemplaza con el nombre de tu archivo PHP para buscar clientes
    method: 'POST',
    data: {
      busqueda: busqueda
    },
    success: function (data) {
      $('#resultados_busqueda').html(data);
    }
  });
}


// Verifica si hay un parámetro 'success' en la URL
const urlParams = new URLSearchParams(window.location.search);
const successParam = urlParams.get('success');

if (successParam === 'true') {
  alert("Pago registrado exitosamente");
};