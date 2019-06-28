<?php

class ToDoList extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Cargar base de datos y modelo
		$this->load->database();
		$this->load->model('tarea_model');

		$this->load->helper('url');
	}
	
	public function index()
	{		
		// incluir las vistas
		$this->load->view('partials/header');
		$this->load->view('index');
		$this->load->view('partials/footer');

		// header('Access-Control-Allow-Origin: http://localhost', false);
		
	}
	
	public function mostrarTareas() {
		$resultado = $this->tarea_model->mostrarTareas();
		echo json_encode($resultado);
	}
	
	public function crearTarea() {
		$resultado = $this->tarea_model->crearTarea();

		// establecer bandera que indica si es exitosa la opeación
		$mensaje['exito'] = false;
		if ($resultado) {
			$mensaje['exito'] = true;
		}
		echo json_encode($mensaje);
	}
	
	public function borrarTarea() {
		$resultado = $this->tarea_model->borrarTarea();

		// establecer bandera que indica si es exitosa la opeación
		$mensaje['exito'] = false;
		if ($resultado) {
			$mensaje['exito'] = true;
		}
		echo json_encode($mensaje);
	}
}