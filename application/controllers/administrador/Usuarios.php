<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
	 * Controlador Usuarios
	 * Author: Luis Alberto García Rodríguez
	*/
	public function __construct()
	{
		parent::__construct();
		//Verifica que el usuario este logueado
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url());
		}
		$this->load->model('administrador/M_usuarios');
	}

	public function index()
	{
		$titulo['titulo'] = "Lista Usuarios";
		$data['usuarios'] = $this->M_usuarios->get_usuarios();

		$this->load->view('layout/header', $titulo);
		$this->load->view('layout/aside');
		$this->load->view('administrador/lista_usuarios', $data);
		$this->load->view('layout/footer');
		$this->load->view('administrador/js_usuarios');
	}

	public function add_usuario()
	{
		$titulo['titulo'] = "Agregar Usuario";
		$data['roles'] = $this->M_usuarios->get_roles_usuario();

		$this->load->view('layout/header', $titulo);
		$this->load->view('layout/aside');
		$this->load->view('administrador/add_usuarios', $data);
		$this->load->view('layout/footer');
		$this->load->view('administrador/js_usuarios');
	}

	public function save_usuario()
	{
		// Recibe las contraseñas para verificar que coincidan
		$password 		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_password') ) );
		$password_2		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_password_2') ) );

		// si las contraseñas coinciden se tratará de guardar el usuario
		if ($password == $password_2) {
			$nombres 		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_nombres') ) );
			$ape_paterno 	= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_ape_paterno') ) );
			$ape_materno 	= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_ape_materno') ) );
			$telefono 		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_telefono') ) );
			$email			= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_email') ) );
			$username 		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_username') ) );
			$rol_usuario	= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_rol_usuario') ) );

			$data = array(
				'nombres' 		=> $nombres,
				'ape_paterno' 	=> $ape_paterno,
				'ape_materno' 	=> $ape_materno,
				'telefono' 		=> $telefono,
				'email' 		=> $email,
				'username' 		=> $username,
				'password' 		=> sha1($password),
				'tcat_roles_id' => $rol_usuario,
				'activo'		=> 'S'
				);
	
			if ($this->M_usuarios->save($data)) {
				$this->session->set_flashdata('usuario_agr', 'Usuario agregado con éxito...');			
				redirect(base_url('administrador/usuarios'));
			}
			else{
				$this->session->set_flashdata('error', 'No se pudo guardar el usuario...');
				redirect(base_url('administrador/usuarios/add_usuario'));
			}
		}
		else{
			$this->session->set_flashdata('error_contrasena', 'Las contraseñas de usuario no coinciden...');
			redirect(base_url('administrador/usuarios/add_usuario'));
		}
	}

	public function edit_usuario($id = '')
	{
		if (empty($id)) {
			redirect(base_url('administrador/usuarios'));
		}else{
			$titulo['titulo'] = "Editar Usuario";
			
			$id = $this->security->xss_clean( $this->db->escape_str($id) );

			$data['usuario'] 	= $this->M_usuarios->get_usuario($id);
			$data['roles'] 		= $this->M_usuarios->get_roles_usuario();

			$this->load->view('layout/header', $titulo);
			$this->load->view('layout/aside');
			$this->load->view('administrador/edit_usuarios', $data);
			$this->load->view('layout/footer');
			$this->load->view('administrador/js_usuarios');
		}
		
	}

	public function update_usuario()
	{
		$id 			= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_id_usuario') ) );
		$nombres 		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_edit_nombre') ) );
		$ape_paterno 	= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_edit_ape_paterno') ) );
		$ape_materno 	= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_edit_ape_materno') ) );
		$telefono 		= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_edit_telefono') ) );
		$email			= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_edit_email') ) );
		$rol_usuario	= $this->security->xss_clean( $this->db->escape_str( $this->input->post('txt_edit_rol') ) );

		$data = array(
			'nombres' 		=> $nombres, 
			'ape_paterno' 	=> $ape_paterno,
			'ape_materno' 	=> $ape_materno,
			'telefono' 		=> $telefono,
			'email' 		=> $email,
			'tcat_roles_id' => $rol_usuario
			);

		if ($this->M_usuarios->update($id, $data)) {
			$this->session->set_flashdata('usuario_act', 'Usuario actualizado con éxito...');
			redirect(base_url('administrador/usuarios'));
		}
		else{
			$this->session->set_flashdata('error', 'No se pudo actualizar el usuario');
			redirect(base_url('administrador/usuarios/edit_usuario/').$id);
		}
	}
	
	public function view_usuario($id = '')
	{
		if (empty($id)) {
			redirect(base_url('administrador/usuarios'));
		}else{
			$id 	= $this->security->xss_clean( $this->db->escape_str($id) );

			$data = $this->M_usuarios->get_usuario_modal($id);

			if ($data == TRUE) {
				$usuario = "
					<p><strong>#id: </strong>$data->id</p>
					<p><strong>Nombres: </strong>$data->nombres</p>
					<p><strong>Apellido paterno: </strong>$data->ape_paterno</p>
					<p><strong>Apellido materno: </strong>$data->ape_materno</p>
					<p><strong>Telefono: </strong>$data->telefono</p>
					<p><strong>Email: </strong>$data->email</p>
					<p><strong>Username: </strong>$data->username</p>
					<p><strong>Rol de usuario: </strong>$data->nombre_rol</p>
					";
			}
			else{
				$usuario = "<p style='color:red;'>Usuario no encontrado...</p>";
			}

			echo $usuario;
		}
	}

	public function delete_usuario($id = '')
	{
		if (empty($id)) {
			redirect(base_url('administrador/usuarios'));
		}else{
			$id 	= $this->security->xss_clean( $this->db->escape_str($id) );

			$data = array(
				'activo' => 'N'
				);
			
			$mensaje = "";

			if ($this->M_usuarios->update($id, $data) ) {
				$this->session->set_flashdata('usuario_elim', 'Usuario eliminado con éxito...');	
				$mensaje = "Usuario eliminado con éxito...";
			}
			else{
				$this->session->set_flashdata('error', 'No se pudo actualizar el usuario');
				$mensaje = "Usuario no eliminado...";
			}

			echo $mensaje;
		}
	}
}
?>