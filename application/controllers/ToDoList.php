<?php

class ToDoList extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('tarea_model');
	}

	public function index()
	{
		$items = $this->tarea_model->get_all();
		
		$this->data['tareas'] = $items;

		$this->load->view('todo-list', $this->data);
		
	}
	
	public function crearTarea() {
		$nuevaTarea = $this->input->post('descripcion');
		
		$operacion = $this->tarea_model->crear($nuevaTarea);

		if ( ! $operacion) {
			echo 'Algo salió mal';
		} else {
			$this->index();
		}
	}
	
	public function eliminarTarea() {
		$id = $this->input->post('delete');
		$operacion = $this->tarea_model->eliminar($id);
	
		if ( ! $operacion) {
			echo 'Algo salió mal';
		} else {
			$this->index();
		}
	}
}