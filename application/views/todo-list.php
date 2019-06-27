<?php print_r($tareas); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>ToDo List</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>ToDo Application</h1>
			<div class="col-2">
				<form action="/ToDo/index.php/ToDoList/crearTarea" method="POST">
				
					<div>
						<input type="text" name="descripcion" placeholder="Nueva Tarea">
					</div>
					<input type="submit" value="Crear" name="submit">
				
				</form>

				<?php if ($tareas) { ?>
					<div>
						<ul>
						<?php foreach($tareas as $tarea) { ?>
							<?php if ( ! $tarea->deleted) { ?>
								<li><?php echo $tarea->descripcion; ?></li>
								<form  method="POST" action="/ToDo/index.php/ToDoList/eliminarTarea">
									<input type="hidden" name="delete" value="<?php echo $tarea->id; ?>">
									<input type="submit" value="Borrar">
								</form>
							<?php } ?>
						<?php } ?>
						</ul>
					</div>
				<?php } ?>
			</div>
		</div>

	</body>
</html>