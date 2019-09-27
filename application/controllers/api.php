<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/CI_Controller_Middleware.php';

class api extends CI_Controller_Middleware {
	const HTTP_OK = 200;
	const HTTP_BAD_REQUEST = 400;
	const HTTP_UNAUTHORIZED = 401;

	const INVALID_MESSAGE = 'Invalido.';
	const WRONG_MESSAGE = 'Algo deu errado. Tente novamente.';

	protected $exclude = ['login', 'socialLogin', 'register', 'resetpassword', 'zapierpool', 'zapierlog', 'adduserfromzapier', 'removeuserfromzapier', 'movimentacao'];
	protected $me = [];

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Middleware
	 */
	protected function middleware()
	{
		return array('auth');
	}

    public function zapierpool_get(){
        $this->logRequest('zapierpool');


	    if ($userConnected = $this->verifyZapierHeader())
        {
            $this->response([
                'user' => $userConnected['login'],
                'company' => $userConnected['nome_empresa'],
            ]);
        }
        else{
            $this->response([
                'error' => self::HTTP_UNAUTHORIZED,
                'msg' => 'Invalid Zapier Token'
            ], self::HTTP_UNAUTHORIZED);
        }
        return;

    }

    private function verifyZapierHeader()
    {
        foreach ($this->getHeaderList() as $name => $value) {
           if ($name == "Zapier-Api-Key")
           {
               $token = $value;
               $this->load->model('servicedao');
               $zapier_record = $this->servicedao->get_user_by_zapier_token($token);
               return $zapier_record;
               break;
           }
        }
        return null;
        // se não puder adicionar ou o token for inválido, retorna nulo

    }



    public function adduserfromzapier_post()
    {

        $this->logRequest('adduserfromzapier_post');
        if($userConnected = $this->verifyZapierHeader())
        {
            $this->load->model('servicedao');
            if ($this->servicedao->test_user_with_login_exists($this->post('email_usuario')))
            {
                $this->response([
                    'status' => 0,
                    'msg' => 'usuário já existe com esse e-mail no elofy'
                ], self::HTTP_BAD_REQUEST);
                return;
            }

            if ($userConnected['admin'] == 1 || $userConnected['gestor'] == 1)
            {
                $userToAdd = [];
                $userToAdd['id_empresa'] = $userConnected['id_empresa'];
                $userToAdd['nome_usuario'] = $this->post('nome_usuario');
                $userToAdd['email_usuario'] = $this->post('email_usuario');
                $userToAdd['login'] = $this->post('email_usuario');
                // TODO: Mudar para ativo = 2 e tratar isso no sistema
//                $userToAdd['ativo'] = '2';
                $userToAdd['ativo'] = '1';
                $userToAdd['admin'] = '0';
                $userToAdd['avaliador'] = '0';
                $userToAdd['gerado_integracao'] = '1';
                $userToAdd['senha'] = sha1(uniqid('senhazapiercreate'));
                // não preciso saber o id no zapier da empresa pq o token pega isso pra mim e vincula os dois serviços
                //$userToAdd['id_empresa'] = $this->post('id_empresa_zapier');
                $userToAdd['hash_cadastro'] = md5(uniqid(rand(), true)); // 32 caracteres
                //TODO: Enviar email para reset de senha
                $this->load->library('../controllers/usuarios');
                $this->servicedao->create_user($userToAdd);
                $this->usuarios->sendResetPassMailZapier($userToAdd['hash_cadastro'], $userToAdd['nome_usuario'], $userToAdd['email_usuario']);
                $this->response([
                    'status' => 1,
                    'msg' => 'usuário adicionado ao elofy'
                ], self::HTTP_OK);
                return;
            }


        }

        $this->response([
            'error' => self::HTTP_UNAUTHORIZED,
            'msg' => 'Invalid Zapier Token'
        ], self::HTTP_UNAUTHORIZED);
        return;
    }

    public function removeuserfromzapier_post()
    {
        $this->logRequest('removeuserfromzapier_post');
        if($userConnected = $this->verifyZapierHeader())
        {
            if ($userConnected['admin'] == 1 || $userConnected['gestor'] == 1)
            {
                $userToRemove = [];
                $userToRemove['email_usuario'] = $this->post('email_usuario');
                $userToRemove['login'] = $this->post('email_usuario');
                $this->load->model('servicedao');
                $this->servicedao->remove_user($userToRemove);
                $this->response([
                    'status' => 1,
                    'msg' => 'usuário removido em elofy'
                ], self::HTTP_OK);
                return;
            }


        }else{

	        $this->response([
	            'error' => self::HTTP_UNAUTHORIZED,
	            'msg' => 'Invalid Zapier Token'
	        ], self::HTTP_UNAUTHORIZED);
	        return;
	    }
        $this->response([
            'error' => self::HTTP_BAD_REQUEST,
            'msg' => 'Undefined Error'
        ], self::HTTP_BAD_REQUEST);
        return;


    }





    public function logRequest($label)
    {
        if (!file_exists('log')) {
            mkdir('log', 0777, true);
        }
        $data = sprintf(
            "Request \'$label\ at:%s \n\n%s %s %s\n\nHTTP headers:\n",
            date('Y-m-d H:i:s'),
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI'],
            $_SERVER['SERVER_PROTOCOL']
        );
        foreach ($this->getHeaderList() as $name => $value) {
            $data .= $name . ': ' . $value . "\n";
        }
        $data .= "\nRequest body:\n";
        $data.=file_get_contents('php://input');
        $lastData = $this->zapierLogReadFile();
        file_put_contents("log/zapier.txt", "==============================\n$data\n$lastData");
    }
    public function zapierlog_get()
    {
        echo $this->zapierLogReadFile();
    }
    private function zapierLogReadFile()
    {
        $file = fopen("log/zapier.txt","r");
        $stream = '';
        while(! feof($file))
        {
            $stream.= (fgets($file). "<br />");
        }
        fclose($file);
        return $stream;
    }

    private function getHeaderList() {
        $headerList = [];
        foreach ($_SERVER as $name => $value) {
            if (preg_match('/^HTTP_/',$name)) {
                // convert HTTP_HEADER_NAME to Header-Name
                $name = strtr(substr($name,5),'_',' ');
                $name = ucwords(strtolower($name));
                $name = strtr($name,' ','-');
                // add to list
                $headerList[$name] = $value;
            }
        }
        return $headerList;
    }




    /**
	 * URI: middleware
	 * Method: ANY
	 */
	public function verifyJwtToken()
	{
		$uri = end(explode('/', current_url()));
		if (in_array($uri, $this->exclude)) {
		    return true;
		}
		$headers = $this->input->request_headers();
		if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
			$token = str_replace('Bearer ', '', $headers['Authorization']);
			$decodedToken = AUTHORIZATION::validateTimestamp($token);

			// return response if token is valid
			if ($decodedToken != false) {
				$this->me = $decodedToken;
				$this->session->set_userdata($this->me);
				$this->load->model('usuario');
				return $this->usuario->isUsuario($decodedToken->login);
			} else {
				return false;
			}
		}
		return false;
	}

	/**
	 * URI: /api/login
	 * Method: POST
	 */
	public function login_post()
	{
		// validate
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required' );

		if ($this->form_validation->run() == false) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		// get params
		$email = $this->post('email');
		$password = $this->post('password');

		// load model
		$this->load->model('usuario');

		// check db
		$validaAcesso = $this->usuario->confirmarCredenciais($email, $password);

		// get user and encode jwt token
		if ($validaAcesso) {
			$user = $this->usuario->criarSessao($email);
			$user['timestamp'] = now();

			$token = AUTHORIZATION::generateToken($user);
			$user['token'] = $token;
			$user['status'] = 1;
			if (!empty($user['image'])) {
				$user['orignal_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$user['image'];
				$user['xs_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$user['image'];
				$user['md_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$user['image'];
			}

			$this->response($user, self::HTTP_OK);
		}

		// login failed
		$this->response([
			'status' => 0,
			'message' => 'Dados Inválidos.'
		], self::HTTP_OK);
	}

	public function socialLogin_post() {
		// validate
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|valid_email' );

		if ($this->form_validation->run() == false) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		// get params
		$userId = $this->post('userId'); 
		$name = $this->post('name');
		$email = $this->post('email');
		$photo = $this->post('avatar');
		$loginType = $this->post('loginType');

		$this->load->model('usuario');

		// Check if already registered
		$existingUser = $this->usuario->checkIfUserExist($email);
		if ($existingUser) {
			// Update social email
			$data = $loginType == 1 ? ['email_google' => $email] : ['email_outlook' => $email];
			$this->usuario->atualizar($data, $existingUser->id_usuario);

			// Return with jwt token
			$user = $this->usuario->criarSessao($existingUser->login);
			$user['timestamp'] = now();

			$token = AUTHORIZATION::generateToken($user);
			$user['token'] = $token;
			$user['status'] = 1;
			if (!empty($user['image'])) {
				$user['orignal_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$user['image'];
				$user['xs_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$user['image'];
				$user['md_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$user['image'];
			}
			$this->response($user, self::HTTP_OK);
		}

		// login failed
		$this->response([
			'status' => 0,
			'message' => 'E-mail was not found please ask for login on Elofy to estabilsh connection.'
		], self::HTTP_OK);
	}

	/**
	 * URI: /api/register
	 * Method: POST
	 */
	public function register_post()
	{
		// validate
		$this->form_validation->set_rules ( 'businessName', 'Business name', 'trim|required' );
		$this->form_validation->set_rules ( 'username', 'User name', 'trim|required' );
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required|matches[confirmPassword]' );
		$this->form_validation->set_rules ( 'confirmPassword', 'Confirm password', 'required' );
		$this->form_validation->set_rules ( 'agree', 'Agree to terms and conditions', 'required' );

		if ($this->form_validation->run() == false || $this->post('agree') != 1) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		// load model
		$this->load->model('usuariosdao');
		$this->load->model('usuario');
		$this->load->library('../controllers/usuarios');

		// check exist
		if ($this->usuario->isUsuario($this->post('email')) != false) {
			$this->response([
				'status' => 0,
				'message' => 'E-mail jб utilizado.'
			], self::HTTP_OK);
		}

		$randWord = $this->usuarios->createRandWord(40);
		$data_to_store = array (
			'login' => $this->post('email'),
			'nome_usuario' => $this->post('username'),
			'nome_empresa' => $this->post('businessName'),
			'email_usuario' => $this->post('email'),
			'senha' => sha1 ($this->post('password')),
			'normal_user' => 1,
			'data_cadastro' => date("Y-m-d"),
			'ativo' => 0,
			'email_checked' => 0,
			'hash_cadastro' => $randWord
		);

		if ($this->usuariosdao->firstStore ($data_to_store)) {
			$emailData = array (
				'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . $randWord,
				'emailDestino' => $data_to_store['email_usuario'],
				'nomeDestino' =>  $data_to_store['nome_usuario']
			);
			$result = $this->usuarios->emailConfirmarEmail( $emailData );
			$this->response([
				'status' => 1,
				'message' => 'Registro realizado com sucesso.'
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 0,
			'message' => self::WRONG_MESSAGE
		], self::HTTP_OK);
	}


	/**
	 * Send email for reset password
	 * URI: /api/resetpassword
	 * Method: POST
	 */
	public function resetPassword_post()
	{
		// validate
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|valid_email' );

		if ($this->form_validation->run() == false) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		// load model
		$this->load->model('usuariosdao');
		$this->load->library('../controllers/usuarios');

		$user = $this->usuariosdao->getUsuarioByLoginEmail (null, $this->post('email'));
		if (empty($user) || $user[0]['email_usuario'] == '') {
			$this->response([
				'status' => 0,
				'message' => 'Nгo encontramos esse e-mail em nossa base de dados.'
			], self::HTTP_OK);
		}

		$randWord = $this->usuarios->createRandWord(40);
		$data_to_store = ['hash_cadastro' => $randWord];
		$result = $this->usuariosdao->update_usuario($user[0]['id_usuario'], $data_to_store);
		if (!$result) {
			$this->response([
				'status' => 0,
				'message' => self::WRONG_MESSAGE
			], self::HTTP_OK);
		}

		$emailData = array (
			'linkRecuperacao' => base_url('redefinir_senha') . '/' . $randWord,
			'emailDestino' => $user[0]['email_usuario'],
			'nomeDestino' =>  $user[0]['nome_usuario']
		);

		$result = $this->usuarios->emailEsqueciMinhaSenha($emailData);
		// if ($result != "Sucesso") {
		if ($result == 'Erro') {
			$this->response([
				'status' => 0,
				'message' => self::WRONG_MESSAGE
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 1,
			'message' => 'E-mail enviado com sucesso.'
		], self::HTTP_OK);
	}


	/**
	 * Update device token of user
	 * URI: /api/devicetoken
	 * Method: POST
	 */
	public function devicetoken_post()
	{
		// load model
		$this->load->model('usuariodao');
		$result = $this->usuariodao->updateDeviceToken($this->me->id, $this->post('token'));
		if ($result === FALSE) {
			$this->response([
				'status' => 0,
				'message' => 'Update device token failed.'
			], self::HTTP_OK);
		}
		$this->response([
			'status' => 1,
			'message' => 'Update device token successfully.'
		], self::HTTP_OK);
	}


	/**
	 * Add all goals
	 * URI: /api/goals
	 * Method: GET
	 */
	public function goals_get()
	{
		// load model
		$this->load->model('servicedao');

		$goals = $this->servicedao->get_goals_tatics_profile_with_user($this->me->id_empresa,$this->me->id);
		$result = array();
		foreach ($goals as $goal) {
			$item = array();
			foreach ($goal as $key=>$value) {
				if ($key == 'responsavel') {
					$user = array();
					$user['id'] = $goal['responsavel'];
					$user['name'] = $goal['responsavel_name'];
					if (!empty($goal['responsavel_image'])) {
						$user['image'] = base_url('assets/img') . '/' . $goal['responsavel_empresa'] . '/'. $goal['responsavel_image'];
						$user['xs_image'] = base_url('assets/img') . '/' . $goal['responsavel_empresa'] . '/50/'. $goal['responsavel_image'];
						$user['md_image'] = base_url('assets/img') . '/' . $goal['responsavel_empresa'] . '/150/'. $goal['responsavel_image'];
					}
					$item['user'] = $user;
				} else if (strpos($key, 'responsavel') !== false) {
					continue;
				} else {
					$item[$key] = $value;
				}
			}
			array_push($result, $item);
		}
		$this->response($result, self::HTTP_OK);
	}

	/**
	 * Get detail of goal
	 * URI: /api/goal/{id}
	 * Method: GET
	 */
	public function goal_get($id)
	{
		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->get_details_goals_tatics_by_id($id, null);
		$this->response($result[0], self::HTTP_OK);
	}

	/**
	 * Get measuerment of result key
	 * URI: /api/measurement/{id}
	 * Method: GET
	 */
	public function measurement_get($id)
	{
		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->get_medicoes_anexos_by_id_rchave($id);
		$this->response($result, self::HTTP_OK);
	}

	/**
	 * Add new measuerment
	 * URI: /api/measuerment
	 * Method: POST
	 */
	public function measurement_post()
	{
		// validate
		$this->form_validation->set_rules ( 'id', 'Result', 'integer|required' );
		$this->form_validation->set_rules ( 'date', 'Measurement date', 'required' );
		$this->form_validation->set_rules ( 'value', 'New measurement value', 'required' );

		if ($this->form_validation->run() == false) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		// load model
		$this->load->model('servicedao');

		$data_to_store = array (
			'id_resultado_chave' => $this->post('id'),
			'comentario' => $this->post('description') ?: '',
			'data_medicao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->post('date')))),
			'medicao' => $this->post('value'),
			'usuario_atualizador' => $this->me->id,
			'url_files' => array()
		);
		if ($this->servicedao->add_medicao($data_to_store) == TRUE) {
			$this->response([
				'status' => 1,
				'message' => 'Mediзгo atualizada com sucesso.'
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 0,
			'message' => self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Add all okrs of profile
	 * URI: /api/okrs
	 * Method: GET
	 */
	public function okrs_get()
	{
		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->search_all_global_tatics_key_activities_by_id_responsavel($this->me->id_empresa, $this->me->id);

		$this->response($result, self::HTTP_OK);
	}

	/**
	 * Get users, teams, years for filter
	 * URI: /api/filters
	 * Method: GET
	 */
	public function filters_get()
	{
		// load model
		$this->load->model('servicedao');

		// users
		$userForCompany = $this->servicedao->get_all_user_for_by_id_company_active($this->me->id_empresa);
		if (!empty($userForCompany)) {
			foreach ($userForCompany as $index=>$usercompany){
				$userForCompany[$index] = $usercompany;
				if (!empty($usercompany['image'])) {
					$img_url = $usercompany['image'];
					$userForCompany[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
					$userForCompany[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
					$userForCompany[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
				} else {
					$userForCompany[$index]['image'] 	= 	null;
					$userForCompany[$index]['xs_image'] = 	null;
					$userForCompany[$index]['md_image'] = 	null;
				}
			}
		}

		// teams
		$teams = $this->servicedao->get_all_teams($this->me->id_empresa);

		// years
		$yearForCompany = $this->servicedao->get_year_by_company($this->me->id);

		$this->response([
			'responsible' => $userForCompany,
			'teams' => $teams,
			'years' => $yearForCompany['year']
		], self::HTTP_OK);
	}


	/**
	 * Get cycles(quarters), goals for filter
	 * URI: /api/filter/{year}
	 * Method: GET
	 */
	public function filter_get($year)
	{
		// load model
		$this->load->model('servicedao');

		// quarters
		$quarters = $this->servicedao->get_cycles_by_year($this->me->id_empresa, $year);

		// goals
		$goals = $this->servicedao->get_global_goals_year($this->me->id, $year);

		$this->response([
			'quarters' => $quarters,
			'goals' => $goals
		] , self::HTTP_OK);
	}


	/**
	 * Get update history
	 * URI: /api/timeline
	 * Method: GET
	 */
	public function timeline_get()
	{
		// load model
		$this->load->model('servicedao');

		if($this->servicedao->set_all_feed_to_read_by_id_usuario($this->me->id))
		{
			$eventos = $this->servicedao->get_feed_by_id_usuario($this->me->id);
			$this->response([
				'status' => 1,
				'feeds' => $eventos
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 0,
			'message' => self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Get comments
	 * URI: /api/comments
	 * Method: GET
	 */
	public function comments_get()
	{
		$limit = $this->get('limit') ?: 12;
		$lastLoadedId = $this->get('lastLoadedId') ?: 0;

		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->get_elos_by_company_id($this->me->id_empresa, 0, 0, true, $limit, $this->me->id, $lastLoadedId);
		foreach ($result['elos'] as $key=>$elo) {
			$foundOcurrence = false;
			foreach ($result['elos'][$key]['usuarios_mencionados'] as $metionedUser) {
				if($metionedUser['id'] == $this->me->id)
				{
					$foundOcurrence = true;
					break;
				}
			}
			if (!$foundOcurrence) {
				$result['elos'][$key]['lido'] = "n/d";
				$result['elos'][$key]['novos_comentarios'] = "n/d";
				$result['elos'][$key]['novas_curtidas'] = "n/d";
			}
		}

		$this->response($result, self::HTTP_OK);
	}

	/**
	 * Publish comment
	 * URI: /api/comments
	 * Method: POST
	 */
	public function comments_post()
	{
		// validate
		$this->form_validation->set_rules ( 'comment', 'Comment', 'string|required' );
		$this->form_validation->set_rules ( 'users', 'User array', 'required' );

		if ($this->form_validation->run() == false) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		// load model
		$this->load->model('servicedao');
		$this->load->model('usuariodao');
		$this->load->helper('notification_helper');

		$users = explode(',', $this->post('users'));
		$usersJson = array();
		foreach ($users as $id) {
			array_push($usersJson, ['id' => trim($id)]);
		}

		$eloData = array(
			'usuario_atualizador' => $this->me->id,
			'descricao_elogio' => $this->post('comment'),
			'mencoes' => $usersJson
		);

		$result = $this->servicedao->set_elo($eloData);

		if ($result) {
			// send notifications
			$tokens = $this->usuariodao->getDeviceToken($users);
			$android = array();
			$iOS = array();
			foreach($tokens as $row) {
				$token = $row['device_token'];
				if (strlen($token) == 64) {
					array_push($iOS, $token);
				} else if (strlen($token) > 64) {
					array_push($android, $token);
				}
			}
			$payload = [
				'title' => 'New elos from '.$this->me->nome,
				'body' => $this->post('comment')
			];
			if (count($iOS) > 0) {
				PushNotification::iOS($payload, $iOS);
			}
			if (count($android) > 0) {
				PushNotification::android($payload, $android);
			}
			
			$this->response([
				'status' => 1,
				'message' => 'Comentбrio adicionado com sucesso.'
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 0,
			'message' => self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Get comments of speical comment
	 * URI: /api/comment/{id}
	 * Method: GET
	 */
	public function comment_get($id)
	{
		// load model
		$this->load->model('servicedao');

		$comments = $this->servicedao->get_comments_by_elo_id($id, 0, 999);

		$this->response($comments, self::HTTP_OK);
	}

	/**
	 * Publish comment to comment
	 * URI: /api/comment/{id}
	 * Method: POST
	 */
	public function comment_post($id)
	{
		// load model
		$this->load->model('servicedao');

		if ($this->servicedao->comment_elo($id, $this->me->id, $this->post('comment'))) {
			$this->response([
				'status' => 1,
				'message' => 'Comentбrio adicionado com sucesso.'
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 0,
			'message' => self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Like special comment
	 * URI: /api/likecomment/id
	 * Method: GET
	 */
	public function likeComment_get($id)
	{
		// load model
		$this->load->model('servicedao');

		if ($this->servicedao->like_elo($id, $this->me->id)) {
			$this->response([
				'status' => 1,
				'message' => 'Vocк curtiu!.'
			], self::HTTP_OK);
		}

		$this->response([
			'status' => 0,
			'message' => self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Get company users
	 * URI: /api/mentionusers
	 * Method: GET
	 */
	public function mentionUsers_get()
	{
		// load model
		$this->load->model('servicedao');

		$id_empresa = $this->me->id_empresa;
		$usuarios = $this->servicedao->get_admin_usuarios_time($id_empresa);
		if(!empty($usuarios)){
			foreach($usuarios as $index=>$user){
				$usuarios[$index] = $user;
				if(!empty($user['image'])){
					$usuarios[$index]['image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$user['image'];
					$usuarios[$index]['xs_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$user['image'];
					$usuarios[$index]['md_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$user['image'];
				}else{
					$usuarios[$index]['image'] = null;
					$usuarios[$index]['xs_image'] = null;
					$usuarios[$index]['md_image'] = null;
				}
			}
		}
		$this->response($usuarios, self::HTTP_OK);
	}

	/**
	 * Get activities
	 * URI: /api/activities
	 * Method: GET
	 */
	public function activities_get()
	{
		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->get_activities_for_profile( $this->me->id, date('Y'));
		$this->response($result, self::HTTP_OK);
	}

	/**
	 * Update activity status
	 * URI: /api/activity/{id}
	 * Method: POST
	 */
	public function activity_post($id)
	{
		// validate
		$this->form_validation->set_rules ( 'percent', 'percent', 'required|integer|in_list[0,50,100]' );
		$this->form_validation->set_rules ( 'atraso', 'atraso', 'required|integer|in_list[0,1]' );

		if ($this->form_validation->run() == false) {
			$this->response(['message' => self::INVALID_MESSAGE], self::HTTP_BAD_REQUEST);
		}

		$percent = $this->post('percent');
		$atraso = $this->post('atraso');

		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->update_activity_todo($this->me->id, $id, $percent, $atraso);
		$this->response([
			'status' => $result ? 1 : 0,
			'message' => $result ? 'Atualizado com sucesso.' : self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Remove activity
	 * URI: /api/dismissActivity/{id}
	 * Method: GET
	 */
	public function dismissActivity_get($id)
	{
		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->dismiss_activity_by_id($id);
		$this->response([
			'status' => $result ? 1 : 0,
			'message' => $result ? 'Atividade removida com sucesso.' : self::WRONG_MESSAGE
		], self::HTTP_OK);
	}

	/**
	 * Get surveys
	 * URI: /api/surveys
	 * Method: GET
	 */
	public function surveys_get()
	{
		// load model
		$this->load->model('servicedao');

		$surveys = $this->servicedao->get_all_survey($this->me->id, $this->me->id_empresa);

		$this->response($surveys, self::HTTP_OK);
	}

	/**
	 * Get survey detail
	 * URI: /api/survey/{id}
	 * Method: GET
	 */
	public function survey_get($id)
	{
		// load model
		$this->load->model('servicedao');

		$result = $this->servicedao->get_survey_questions_by_id_questionerio($this->me->id, $this->me->id_empresa, $this->get('question'), $id);

		$this->response($result[0], self::HTTP_OK);
	}

	/**
	 * Answer survey
	 * URI: /api/survey
	 * Method: POST
	 */
	public function survey_post()
	{
		// load model
		$this->load->model('servicedao');

		$data = [
			'id_pesquisa' => $this->post('id_pesquisa'),
			'questioerio_id' => $this->post('questioerio_id'),
			'answers' => json_decode($this->post('answers'), true)
		];
		$this->servicedao->save_new_survey_user($this->me->id_empresa, $this->me->id, $data);
		
		$this->response([
			'status' => 1,
			'message' => 'Comentбrio adicionado com sucesso.'
		], self::HTTP_OK);
	}

	/**
	 * URI: /geral/entities/movimentacao
	 * Method: POST
	 */
	public function movimentacao_post()
	{
		$codigoRetorno = 0;
		$message = "Success.";

		//validate for required fields
		$this->form_validation->set_rules ( 'hashintegraelofy', 'Hash', 'required' );
		if ($this->form_validation->run() == false) {
			$message = "Hash field is required.";
			$codigoRetorno = 1;
			$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
			return;
		}

		$this->form_validation->set_rules ( 'codigoMovimento', 'Codigo', 'required' );
		if ($this->form_validation->run() == false) {
			$message = "Codigo field is required.";
			$codigoRetorno = 1;
			$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
			return;
		}

		$this->form_validation->set_rules ( 'codigoEmpresa', 'Codigo', 'required' );
		if ($this->form_validation->run() == false) {
			$message = "Codigo Empresa field is required.";
			$codigoRetorno = 1;
			$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
			return;
		}

		$this->form_validation->set_rules ( 'codigoGrupoEconomico', 'Codigo', 'required' );
		if ($this->form_validation->run() == false) {
			$message = "Codigo Grupo field is required.";
			$codigoRetorno = 1;
			$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
			return;
		}

		$this->form_validation->set_rules ( 'dataMovimento', 'data', 'required' );
		if ($this->form_validation->run() == false) {
			$message = "dataMovimento is required.";
			$codigoRetorno = 1;
			$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
			return;
		}

		//validate for required fields according to codigoMovimento
		$codigoMovimento = $this->post('codigoMovimento');
		if ($codigoMovimento == 1 || $codigoMovimento == 2 || $codigoMovimento == 3 || $codigoMovimento == 4) {	
			$infoUsuario = json_decode($this->post('infoUsuario'));
			if(empty($infoUsuario)) {
				$message = "User Information field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->codigoUsuario) && $infoUsuario->codigoUsuario !== '')) {
				$message = "codigoUsuario field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->matricula) && $infoUsuario->matricula !== '')) {
				$message = "matricula field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->cpf) && $infoUsuario->cpf !== '')) {
				$message = "cpf field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->email_usuario) && $infoUsuario->email_usuario !== '')) {
				$message = "email_usuario field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->login) && $infoUsuario->login !== '')) {
				$message = "login field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->tipoUsuario) && $infoUsuario->tipoUsuario !== '')) {
				$message = "tipoUsuario field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->nomeCompleto) && $infoUsuario->nomeCompleto !== '')) {
				$message = "nomeCompleto field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->dataAdmissao) && $infoUsuario->dataAdmissao !== '')) {
				$message = "dataAdmissao field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoUsuario->dataDesligamento) && $infoUsuario->dataDesligamento !== '')) {
				$message = "dataDesligamento field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
		}

		if ($codigoMovimento == 1 || $codigoMovimento == 4 || $codigoMovimento == 6) {	
			$infoFunctional = json_decode($this->post('infoEstruturaFuncional'));
			if(empty($infoFunctional)) {
				$message = "infoEstruturaFuncional field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoFunctional->codigoUnidadeFuncional) && $infoFunctional->codigoUnidadeFuncional !== '')) {
				$message = "codigoUnidadeFuncional field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoFunctional->nomeUnidadeFuncional) && $infoFunctional->nomeUnidadeFuncional !== '')) {
				$message = "nomeUnidadeFuncional field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoFunctional->codigoUnidadePai) && $infoFunctional->codigoUnidadePai !== '')) {
				$message = "codigoUnidadePai field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoFunctional->codigoPrimeiroGestorUnidadeFuncional) && $infoFunctional->codigoPrimeiroGestorUnidadeFuncional !== '')) {
				$message = "codigoPrimeiroGestorUnidadeFuncional field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoFunctional->codigoSegundoGestorUnidadeFuncional) && $infoFunctional->codigoSegundoGestorUnidadeFuncional !== '')) {
				$message = "codigoSegundoGestorUnidadeFuncional field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
		}

		if ($codigoMovimento == 1 || $codigoMovimento == 3 || $codigoMovimento == 5) {
			$infoCargo = json_decode($this->post('infoCargo'));
			if(empty($infoCargo)) {
				$message = "infoCargo field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoCargo->codigoCargo) && $infoCargo->codigoCargo !== '')) {
				$message = "codigoCargo field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
			if (!(isset($infoCargo->nomeCargo) && $infoCargo->nomeCargo !== '')) {
				$message = "nomeCargo field is required.";
				$codigoRetorno = 1;
				$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
				return;
			}
		}

		$this->load->model('servicedao');
		$hashintegraelofy = $this->post('hashintegraelofy');
		$valid_hash = false;
		$hash_list = $this->servicedao->get_hash_list();
		if(!empty($hash_list)){
			foreach($hash_list as $index=>$hash_row){
				if ($hash_row['hash'] == $hashintegraelofy) {
					$valid_hash = true;
					break;
				}
			}
		}

		if (!$valid_hash) {
			$message = "hash is incorrect or expired.";
			$codigoRetorno = 1;
			$this->response(['codigoRetorno' => $codigoRetorno, 'mensagemRetorno' => $message], self::HTTP_BAD_REQUEST);
			return;
		}

		$infoUsuario = json_decode($this->post('infoUsuario'));
		$infoFunctional = json_decode($this->post('infoEstruturaFuncional'));
		$infoCargo = json_decode($this->post('infoCargo'));
		$dataAdmissao = '';
		$dataDesligamento = '';
		if (!empty($infoUsuario)) {
			$dataAdmissao = date_create_from_format('d/m/Y', $infoUsuario->dataAdmissao);
			$dataAdmissao = date_format($dataAdmissao, 'Y-m-d');
			$dataDesligamento = date_create_from_format('d/m/Y', $infoUsuario->dataDesligamento);
			$dataDesligamento = date_format($dataDesligamento, 'Y-m-d');
		}
		$dataMovimento = $this->post('dataMovimento');
		$dataMovimento = date_create_from_format('d/m/Y', $dataMovimento);
		$dataMovimento = date_format($dataMovimento, 'Y-m-d');
		$data_to_store = array (
			'hashintegraelofy' => $this->post('hashintegraelofy'),
			'codigoMovimento' => $codigoMovimento,
			'codigoEmpresa' => $this->post('codigoEmpresa'),
			'codigoGrupoEconomico' => $this->post('codigoGrupoEconomico'),
			'codigoUsuario' => empty($infoUsuario) ? '' : $infoUsuario->codigoUsuario,
			'matricula' => empty($infoUsuario) ? '' : $infoUsuario->matricula,
			'cpf' => empty($infoUsuario) ? '' : $infoUsuario->cpf,
			'email_usuario' => empty($infoUsuario) ? '' : $infoUsuario->email_usuario,
			'login' => empty($infoUsuario) ? '' : $infoUsuario->login,
			'tipoUsuario' => empty($infoUsuario) ? '' : $infoUsuario->tipoUsuario,
			'nomeCompleto' => empty($infoUsuario) ? '' : $infoUsuario->nomeCompleto,
			'dataAdmissao' => $dataAdmissao,
			'dataDesligamento' => $dataDesligamento,
			'codigoUnidadeFuncional' => empty($infoFunctional) ? '' : $infoFunctional->codigoUnidadeFuncional,
			'nomeUnidadeFuncional' => empty($infoFunctional) ? '' : $infoFunctional->nomeUnidadeFuncional,
			'codigoUnidadePai' => empty($infoFunctional) ? '' : $infoFunctional->codigoUnidadePai,
			'codigoPrimeiroGestorUnidadeFuncional' => empty($infoFunctional) ? '' : $infoFunctional->codigoPrimeiroGestorUnidadeFuncional,
			'codigoSegundoGestorUnidadeFuncional' => empty($infoFunctional) ? '' : $infoFunctional->codigoSegundoGestorUnidadeFuncional,
			'codigoCargo' => empty($infoCargo) ? '' : $infoCargo->codigoCargo,
			'nomeCargo' => empty($infoCargo) ? '' : $infoCargo->nomeCargo,
			'dataMovimento' => $dataMovimento
		);

       	$insert_id = $this->servicedao->add_movimento($data_to_store);

      	$this->response([
      		'id' => $insert_id,
			'codigoRetorno' => $codigoRetorno,
			'mensagemRetorno' => $message
		], self::HTTP_OK);

      	return true;
	}
}