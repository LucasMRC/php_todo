<?php

class Tarea_model extends CI_Model {

	public function mostrarTareas() {
		$query = $this->db->get('tareas');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function crearTarea() {
		$descripcion = $this->input->post('descripcion');
		// guardar nueva tarae en base de datos
		$this->db->set('descripcion', $descripcion);
		$this->db->insert('tareas');
		
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function borrarTarea() {
		$id = $this->input->post('id');
		// modificar el campo deleted de la tarea en base de datos
		$this->db->set('deleted', '1');
		$this->db->where('id', $id);
		$this->db->update('tareas');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}