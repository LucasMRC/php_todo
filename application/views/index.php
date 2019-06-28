<?php include('partials/header.php'); ?>

<div class="container mt-5">
	<h1 class="text-center">Lista de Tareas</h1>
	<div class="col-8 col-sm-6 col-md-5 col-lg-4 mx-auto mt-5">
				<div>
					<ul class="list-group">
						<li class="list-group-item">
							<form id="crear">
								<div class="d-flex">
									<input class="form-control text-center" type="text" name="descripcion" placeholder="Nueva Tarea" required>
									<button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-plus-circle"></i></button>
								</div>
							</form>
						</li>
					</ul>
					<!-- Lista donde se desplegarán las tareas -->
					<ul id="mostrar-tareas" class="list-group mb-5"></ul>
					
				</div>
			</div>
		</div>

<?php include('partials/footer.php'); ?>
