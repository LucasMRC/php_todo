<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>ToDo List</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous" />
		<link href="https://fonts.googleapis.com/css?family=Caveat:400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">	
	</head>
	<body>
		<div class="container mt-5">
			<h1 class="text-center">Lista de Tareas</h1>
			<div class="col-md-4 mx-auto mt-5">
				<div>
					<ul class="list-group">
						<li class="list-group-item">
							<form action="/ToDo/index.php/ToDoList/crearTarea" method="POST">
							
								<div class="d-flex">
									<input class="form-control" type="text" name="descripcion" placeholder="Nueva Tarea">
									<button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-plus-circle"></i></button>
								</div>

							</form>
						</li>
						<?php if ($tareas) { ?>
							<?php foreach($tareas as $tarea) { ?>
								<?php if ( ! $tarea->deleted) { ?>
									<li class="list-group-item d-flex justify-content-between">
										<p><?php echo $tarea->descripcion; ?></p>
										<span>
											<form  method="POST" action="/ToDo/index.php/ToDoList/eliminarTarea">
												<input type="hidden" name="delete" value="<?php echo $tarea->id; ?>">
												<button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash-alt"></i></button>
											</form>
										</span>
									</li>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<!-- <script>
			$('li.d-flex').on(hover, function() {
				setTimeout(function() {
					$(this).children('li.d-flex button.btn').css('width', '2.5rem;')
				}, 3s)				
			});
		</script> -->
	</body>
</html>