<?php

class Tarea_model extends CI_Model {

	public $tabla = 'tareas';
	public $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		$this->return_as = 'array';
	}

	public function get_all() {
		$query = $this->db->get('tareas');
        return $query->result();
	}
	
	public function crear($tarea){
		$query = $this->db->insert_string('tareas', ['descripcion' => $tarea]);
		return $this->db->query($query);
	}

	public function eliminar($tarea){
		$query = $this->db->update_string('tareas', ['deleted' => '1'], 'id=' . $tarea);
		return $this->db->query($query);
	}
}

?>