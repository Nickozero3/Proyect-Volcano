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


// Función para seleccionar un cliente y actualizar el campo oculto
function seleccionarCliente(id, nombre) {
  $('#cliente_id').val(id);
  $('#cliente_busqueda').val(nombre);
  $('#resultados_busqueda').html('');
}





// muestra el formulario
function showForm() {
  var formModal = document.getElementById('form-modal');
  formModal.classList.toggle('hidden');
}

