<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/*
	* Author: Luis García
	*/

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$titulo['titulo'] = "Dashboard";
		
		$this->load->view('layout/header', $titulo);
		$this->load->view('layout/aside');
		$this->load->view('layout/dashboard');
		$this->load->view('layout/footer');
	}
}
