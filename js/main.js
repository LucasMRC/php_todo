$('#mostrar-tareas').on('click', 'p.tarea', function(e) {
	// evitar que se dispare dos veces
	$('#mostrar-tareas').off('click');

	$(e.currentTarget).toggleClass('realizada');
});
