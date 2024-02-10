// Verifica si hay un parámetro 'success' en la URL
const urlParams = new URLSearchParams(window.location.search);
const successParam = urlParams.get('success');

if (successParam === 'true') {
  alert("Pago registrado exitosamente");
};






// Función para buscar clientes y mostrar los resultados
function buscarClientes() {
  var busqueda = $('#cliente_busqueda').val();
  var clienteId = $('#cliente_id').val(); // Obtener el valor del input oculto

  // Realizar la solicitud Ajax para buscar clientes
  $.ajax({
    url: 'buscar_clientes.php', // Reemplaza con el nombre de tu archivo PHP para buscar clientes
    method: 'POST',
    data: {
      busqueda: busqueda,
      cliente_id: clienteId // Incluir el valor del input oculto
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
  // /Ocultar los resultados de búsqueda
  $('#resultados_busqueda').html('');
}



// logica del formulario de registro de cliente
function showForm() {

  var formModal = document.getElementById('form-modal');
  formModal.classList.toggle('hidden');

  var addButton = document.getElementById('add');

  var container = document.getElementById('users-list');

  if (!formModal.classList.contains('hidden')) {
    container.style.filter = "blur(5px)";
  } else {
    container.style.filter = "none";
  }

  if (formModal.classList.contains('hidden')) {
    addButton.textContent = 'Añadir Cliente';
    document.body.style.filter = "none";
  } else {
    formModal.style.position = "absolute";
    formModal.style.width = "700px";
    formModal.style.margin = "0 auto";
    formModal.style.backgroundColor = "White";
    formModal.style.padding = "20px";
    formModal.style.paddingBottom = "2rem";
    formModal.style.border = "2px solid black";
    formModal.style.zIndex = "999";

    formModal.style.left = "25%"
    formModal.style.right = "25%"


    addButton.textContent = 'Cerrar formulario';
    addButton.style.position = "relative"
    addButton.style.zIndex = "999"
  }

}
