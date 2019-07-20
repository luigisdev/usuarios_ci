<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
	* Author: Luis García
	* Controlador para autenticación
	*/

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect(base_url('dashboard'));
		}
		else{
			$this->load->view('login');
		}
	}

	public function auth()
	{
		$username = $this->input->post('txt_username');
		$password = $this->input->post('txt_password');

		$this->security->xss_clean( $this->db->escape_str($username) );
		$this->security->xss_clean( $this->db->escape_str($password) );

		$res = $this->M_login->login($username, sha1($password));

		if ($res && $res->activo == "S") {
			$data = array (
				'id' => $res->id,
				'nombres' => $res->nombres,
				'rol' => $res->rol_id,
				'login' => TRUE
				);
			$this->session->set_userdata($data);
			redirect(base_url('dashboard'));
		}
		else{
			$this->session->set_flashdata('error', 'Usuario inactivo y/o usuario y/o contraseña son erroneos');
			redirect(base_url());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
