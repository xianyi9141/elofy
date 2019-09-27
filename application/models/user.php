<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
require_once(APPPATH . 'controllers/usuarios' . EXT);

class User extends App_controller {

    /**
    * Check if the user is logged in, if he's not,
    * send him to the login page
    * @return void
    */
	function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('admin/usuarios');
        }else{
        	$this->load->view('admin/login');
        }
	}

    /**
    * encript the password
    * @return mixed
    */
    function __encrip_password($password) {
        return md5($password);
    }

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{

		$dadosPagina = array();
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');

		$this->load->model('usuario');
		$usuario = new Usuario();
		$validaAcesso = $usuario->confirmarCredenciais($login,$senha);

		if($validaAcesso){

			$dados = $usuario->criarSessao($login);
			$this->session->set_userdata($usuario->criarSessao($login));
			redirect('admin/anteprojetos');

		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);
		}

	}

    /**
    * The method just loads the signup view
    * @return void
    */
	function signup()
	{
		$this->load->view('admin/signup_form');
	}


    /**
    * Create new user and store it in the database
    * @return void
    */
	function create_member()
	{

		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/signup_form');
		}

		else
		{
			$this->load->model('Users_model');

			if($query = $this->Users_model->create_member())
			{
				$this->load->view('admin/signup_successful');
			}
			else
			{
				$this->load->view('admin/signup_form');
			}
		}

	}

	/**
	 * check the username and the password with the database
	 * @return void
	 */
	function validate_credentials_temp()
	{
		$dadosPagina = array();
		$login = $this->input->post('username');
		$senha = $this->input->post('password');

		$this->load->model('usuario');
		$usuario = new Usuario();
		$validaAcesso = $usuario->confirmarCredenciais($login,$senha);

		if($validaAcesso){

			$dados = $usuario->criarSessao($login);
			$this->session->set_userdata($usuario->criarSessao($login));

			//$this->session->set_flashdata('message_error', 'false');

			redirect('dashboard');

		}
		else // incorrect username or password
		{
			// Set flash data
			//$this->session->set_flashdata('message_error', 'true');
			redirect('login');
			//$this->load->view('home', $data);
		}

	}
	
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	function validate_credentials_service()
	{
		header('Content-type: application/json');

		$dadosPagina = array();
		$id_usuario       	= $this->session->userdata('id');
//		$this->debugMark('teste', $this->input->post(''));
		$login 				= $this->input->post('username');
		$senha 				= $this->input->post('password');
        $redirectURL 		= $this->input->post('redirectUrl');
        $lembrar 			= $this->input->post('remember');
		$this->load->model('usuario');
		$this->load->model('servicedao');
		$usuario = new Usuario();
		$service = new servicedao();
		$validaAcesso = $usuario->confirmarCredenciais($login,$senha);

		// $out['login_status'] = $validaAcesso;
		// echo json_encode($out);
		// exit;
		
		if($validaAcesso==1){
			
			$userData		=	$usuario->criarSessao($login);
			
			$id_empresa		=	$userData['id_empresa'];
			$ipaddress		= 	$this->get_client_ip();
			
			$res			=	$service->get_ip_info($id_empresa,$ipaddress);


			
			if($res){

				if($this->session->userdata('logged_in')){
					$this->session->sess_destroy();
				}
				
				$this->session->set_userdata($userData);

				if($lembrar == null){
					/*
					$this->config->set_item('sess_expiration',120);
					$this->session->CI_Session();
					*/
				}

				$out['id_empresa'] = $id_empresa;

				$out['login_status'] = 'success';
				if (isset($redirectURL) && $redirectURL != ''){
					$out['redirect_url'] = $redirectURL;
				}
				else{
					$out['redirect_url'] = 'perfil';	
				}
			}else{
				$out['login_status'] = 'invalid';
				$out['mens'] = 'Você não tem permissão para fazer login neste IP.';
			}
        }
		else // incorrect username or password
		{
			$user = $usuario->confirmarCredenciaisEmailNotChecked($login,$senha);

			if(sizeof($user) > 0){
				$emailData = array (
						'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . $user[0]['hash_cadastro'],
						'emailDestino' => $user[0]['email_usuario'],
						'nomeDestino' =>  $user[0]['nome_usuario']
				);

				$emailCheck = new usuarios();
				$result = $emailCheck->emailConfirmarEmail( $emailData );
				$out['login_status'] = 'invalid';
				$out['mens'] = 'O email ainda não foi confirmado.';
			}else{
				$out['login_status'] = 'invalid';
			}

		}
		echo json_encode($out);
		exit;

	}

	function survey_validate_credentials_service()
	{
		header('Content-type: application/json');
		$dadosPagina = array();
		$login = $this->input->post('username');

		$this->load->model('usuario');
		$usuario = new Usuario();
		$validaAcesso = $usuario->confirmarSurveyCredenciais($login);

		if($validaAcesso){
			if($this->session->userdata('survey_logged_in')){
				$this->session->sess_destroy();
			}
			$user_data 	=	$usuario->surveycriarSessao($login);
			$this->session->set_userdata($user_data);
			$out['survey_login_status'] = 'success';
		}
		else // incorrect username or password
		{
			$user = $usuario->surveyconfirmarCredenciaisEmailNotChecked($login);
			if(sizeof($user) > 0){
				$emailData = array (
						'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . $user[0]['hash_cadastro'],
						'emailDestino' => $user[0]['email_usuario'],
						'nomeDestino' =>  $user[0]['nome_usuario']
				);

				$emailCheck = new usuarios();
				$result = $emailCheck->emailConfirmarEmail( $emailData );
				$out['survey_login_status'] = 'invalid';
				$out['mens'] = 'O email ainda não foi confirmado.';
			}else{
				$out['survey_login_status'] = 'invalid';
			}

		}
		echo json_encode($out);
		exit;
	}

	/**
    * Destroy the session, and logout the user.
    * @return void
    */
	function logout($target = NULL)
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	/**
    * Destroy the session, and logout the user.
    * @return void
    */
	function survey_logout()
	{
		$this->session->sess_destroy();
		redirect('survey-login');
	}

	/**
	 * Destroy the session, and logout the user.
	 * @return void
	 */
	function logout_home()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

}