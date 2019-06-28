mostrarTareas();

function mostrarTareas() {
	// Si se dispara luego de crear una tarea, dejar el input en blanco
	$('form#crear').find('input')[0].value = '';

	$.ajax({
		type: 'ajax',
		url: 'http://localhost/ToDo/index.php/ToDoList/mostrarTareas',
		dataType: 'json',
		success: function(data) {
			let html = '';
			data.forEach(item => {
				// Mostrar items que no han sido marcados como eliminados
				if (item.deleted === '0') {
					html +=	`<li class="list-group-item d-flex justify-content-between">
								<p class="text-center tarea">${item.descripcion}</p>
								<span>
									<form class="borrar">
										<input type="hidden" name="id" value="${item.id}">
										<button class="btn btn-danger" type="submit" name="submit">
											<i class="fas fa-trash-alt"></i>
										</button>
									</form>
								</span>
							</li>`;
				}
			});
			// Agregar el nuevo item a la lista de tareas
			$('#mostrar-tareas').html(html);
		},
		error: function() {
			// Mensaje si algo sale mal
			alert('Esto es vergonzoso. Por favor, intente cargar la página nuevamente.')
		}
	});
}

$('form#crear').submit(function(e) {
	// evitar que se dispare dos veces
	$('form#crear').off('submit');

	// detener antes que recargue la página
	e.preventDefault();
	let nuevaTarea = $(this).serialize();
	$.ajax({
		type: 'ajax',
		url: 'http://localhost/ToDo/index.php/ToDoList/crearTarea',
		method: 'POST',
		data: nuevaTarea,
		dataType: 'json',
		success: function(respuesta) {
			if (respuesta.exito) {
				// Cargar nuevamente las tareas
				mostrarTareas();
			} else {
				// Mensaje si algo sale mal
				alert('Ha habido un error al crear la nueva tarea. Por favor, intente nuevamente.');
			}
		},
		error: function() {
			// Mensaje si algo sale mal
			alert('Ha habido un error al crear la nueva tarea. Por favor, intente nuevamente.');
		}
	});
});

$('#mostrar-tareas').on('submit', 'form.borrar', function(e) {
	// evitar que se dispare dos veces
	$('#mostrar-tareas').off('submit');
	
	// detener antes que recargue la página
	e.preventDefault();
	let id = $(this).serialize();
	$.ajax({
		type: 'ajax',
		url: 'http://localhost/ToDo/index.php/ToDoList/borrarTarea',
		method: 'POST',
		data: id,
		dataType: 'json',
		success: function(respuesta){
			if (respuesta.exito) {
				// Cargar nuevamente las tareas
				mostrarTareas();
			} else {
				// Mensaje si algo sale mal
				alert('Ha habido un error al eliminar la tarea. Por favor, intente nuevamente.');
			}
		},
		error: function() {
			// Mensaje si algo sale mal
			alert('Ha habido un error al eliminar la tarea. Por favor, intente nuevamente.');
		}
	});
});