<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	/**
	 * Author: Luis García
	 * Modelo login
	 */
	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$resultados = $this->db->get('t_usuarios');
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
}
