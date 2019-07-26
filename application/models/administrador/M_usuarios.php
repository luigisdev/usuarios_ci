<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model {

	/*
	* Author: Luis García
	* Modelo para t_usuarios
	*/
	public function get_usuarios()
	{
		$sql = "SELECT t_usuarios.id,
					t_usuarios.nombres,
					t_usuarios.ape_paterno,
					t_usuarios.ape_materno,
					t_usuarios.telefono,
					t_usuarios.email,
					t_usuarios.username,
					tcat_roles.nombre_rol
				FROM t_usuarios
				INNER JOIN tcat_roles
				ON t_usuarios.tcat_roles_id = tcat_roles.id
				WHERE t_usuarios.activo = 'S'; ";
		
		$resultado = $this->db->query($sql);

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		else{
			return FALSE;
		}
	}

	public function get_roles_usuario()
	{
		$resultados = $this->db->get('tcat_roles');

		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else{
			return FALSE;
		}
	}

	public function save($data = '')
	{
		return $this->db->insert('t_usuarios', $data);
	}

	public function get_usuario($id)
	{
		$this->db->where('id', $id);
		$resultado = $this->db->get('t_usuarios');
		
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return FALSE;
		}
	}

	public function get_usuario_modal($id)
	{
		$sql = "SELECT t_usuarios.id,
			t_usuarios.nombres,
			t_usuarios.ape_paterno,
			t_usuarios.ape_materno,
			t_usuarios.telefono,
			t_usuarios.email,
			t_usuarios.username,
			tcat_roles.nombre_rol
		FROM t_usuarios
		INNER JOIN tcat_roles
		ON t_usuarios.tcat_roles_id = tcat_roles.id
		WHERE t_usuarios.activo = 'S'
		AND t_usuarios.id = $id; ";

		$resultado = $this->db->query($sql);

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return FALSE;
		}	
	}

	public function update($id = '', $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('t_usuarios', $data);
	}

}
