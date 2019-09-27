<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
class chatService extends App_controller {

	
    public function __construct()
    {
        parent::__construct();
		// vai ser o modelo que tu vai acessar	
       
    }
    
    //Coleta todos os canais do usuário agrupando por globais e Independentes;
    public function getCanaisByUserId()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	$this->load->model('chatdao');
    	$chat = new chatdao();

    	$id = $this->session->userdata('id');
    	
    	$out = $chat->getCanaisByIdUser($id);
    	
    	echo json_encode($out);
    	exit;
    }
    
    public function getCanaisByEmpresaId()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	$this->load->model('chatdao');
    	$chat = new chatdao();
    	
    	$id = $this->session->userdata('id_empresa');
    	$completa = $this->input->post('complete');
    	
    	$out = $chat->getCanaisByIdEmpresa($id, $completa);
    	
    	echo json_encode($out);
    	exit;
    }
    
       
    //Coleta todos os usuarios já relacionados ao canal
    public function getUserRelatedToCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );    	
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_canal = $this->input->post('id');
    			
    			$out = $chat->getUserRelatedToCanal( $id_canal);
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
    //Coleta todos os usuarios abilitados a serem cadastrados
    public function getUserAbleToRelateToCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_canal = $this->input->post('id');
    			$id_empresa = $this->session->userdata('id_empresa');
    			
    			$out = $chat->getUserAbleToRelateToCanal( $id_canal, $id_empresa);
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
    //Coleta o último canal comentado e suas útimas mensagens em ordem de data.
    public function getDetailsCanalMessagesByIdCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_canal = $this->input->post('id');
    			$idRefer = $this->input->post('reference_id');
    			$idRefer = ($idRefer != '') ? $idRefer : null;
    			$id_usuario = $this->session->userdata('id');
    			$completa = $this->input->post('complete');
    			$limit = $this->input->post('qnt');
    			
    			if($chat->getUserHasCanal($id_usuario, $id_canal)){
    				$users = $chat->getActiveUserRelatedToCanal( $id_canal);
    				
    				//$this->debugMark(sizeof($users[0]), $users);
    				
    				$out['canal'] = $chat->getCanalDetailsByIdCanal( $id_canal, $completa);
    				$out['users'] = sizeof($users) > 0 ?  $users :  array();
    				$out['current_datetime'] = date("Y-m-d H:i");
    				$out['mens'] = $chat->getMensByIdCanalUserAccess( $id_canal, $id_usuario, $idRefer, 'desc', $limit);
    			}else{
    				$out['error'] = true;
    				$out['error_message'] = 'Usuário não possui relação com esse canal.';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
    //Cria um novo canal, identificando ele como Relacionado ao um Objetivo Global, ou sendo um canal independente.
    //Pode ser apenas um canal com seus dados ou pode receber também uma lista de usuários e lista de times.
    public function addCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$teams = $this->input->post('teams');
    			$usuarios = $this->input->post('usuarios');
    			$id_usuario = $this->input->post('user');
    			$id_user_session = $this->session->userdata('id');
    			$tipo = $this->input->post('tipo');
    			
    			
    			$data_to_store = array (
    					'nome' => $this->input->post('name'),
    					'descricao' => $this->input->post('description') ? $this->input->post('description') : '',
    					'id_empresa' => $this->session->userdata('id_empresa'),
    					'tipo' => 1,
    					'responsavel' => ($id_usuario != '' && $id_usuario != null) ? $id_usuario : $id_user_session,
    					'usuario_atualizador' => $id_user_session,
    					'imagem' => $this->session->userdata('image'),
    					'ativo' => 1,
    					'teams' => $teams,
    					'usuarios' => $usuarios,
    					
    			);
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$return = $chat->addCanal( $data_to_store );
    			if ($return) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				// TODO : Caso o usuario seja adm, retona a lista de canais da empresa
    				//$out ['canais']  = $chat->getCanaisByIdUser($id_user_session);
    				$out ['canal']  =  $chat->getCanalDetailsByIdCanal( $return);
    				
    				
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Canal';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    
    	echo json_encode($out);
    	exit;
    }
    
    //Desabilita o Canal. Na prática, não aceita novas mensagens e aparece como uma flag de inativo.
    public function editCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'name', 'Nome', '' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', '' );
    		$this->form_validation->set_rules ( 'description', 'Descrição', '' );
    		$this->form_validation->set_rules ( 'active', 'Ativo', '' );
    		
    		if ($this->form_validation->run ()) {
    			
    			
    			$id_canal = $this->input->post('id');
    			$id_user_session = $this->session->userdata('id');
    			
    			$data_to_store = array('id_canal' =>  $id_canal, 'usuario_atualizador' => $id_user_session);
    			
    			if( $this->input->post('name') != null){
    				$data_to_store['nome'] = $this->input->post('name');
    			}
    			
    			if( $this->input->post('description') != null){
    				$data_to_store['descricao'] = $this->input->post('description');
    			}
    			
    			if($this->input->post('user') != '' && $this->input->post('user') != null){
    				$data_to_store['responsavel'] = $this->input->post('user');
    			}
    			
    			if($this->input->post('active') != '' && $this->input->post('active') != null){
    				$data_to_store['ativo'] = $this->input->post('active');
    			}
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			
    			if ( $chat->editCanal( $data_to_store ) == TRUE) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				// TODO : Caso o usuario seja adm, retona a lista de canais da empresa
    				//$out ['canais']  = $chat->getCanaisByIdUser($id_user_session);
    				$out ['canal']  =  $chat->getCanalDetailsByIdCanal($id_canal);
    				
    				
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Editar Canal';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	
    	echo json_encode($out);
    	exit;
    }
    
    // não está pronta, metodo problemático
    //Adiciona um usuário a um Canal já existente;
    public function addUsuarioCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Usuário', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$id_canal = $this->input->post('id');
    			$id_usuario = $this->input->post('user');
    			$id_user_session = $this->session->userdata('id');
    			$teams = $this->input->post('teams');
    			
    			$data_to_store = array (
    					'id_canal' => $this->input->post('id'),
    					'id_usuario' => $id_usuario,
    					'usuario_atualizador' => $id_user_session,
    					'ativo' => 1,
    					
    			);
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			
    			if ( $chat->addUsuarioCanal( $data_to_store ) == TRUE) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out['users'] = $chat->getActiveUserRelatedToCanal($id_canal);
    				
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Usuário';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	
    	echo json_encode($out);
    	exit;
    }
    
    public function addUsuariosCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$id_canal = $this->input->post('id');
    			$usuarios = $this->input->post('usuarios');
    			$id_user_session = $this->session->userdata('id');
    			$teams = $this->input->post('teams');
    			
    			$data_to_store = array (
    					'id_canal' => $this->input->post('id'),
    					'usuario_atualizador' => $id_user_session,
    					'teams' => $teams,
    					'usuarios' => $usuarios,
    					
    			);
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			
    			if ( $chat->addUsuariosCanal( $data_to_store ) == TRUE) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out['users'] = $chat->getActiveUserRelatedToCanal($id_canal);
    				
    				
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Canal';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	
    	echo json_encode($out);
    	exit;
    }
    
    
    //Ativa e desativa um usuário
    public function editUsuarioCanal()
    {
    	header('Content-type: application/json');
    	
    	$this->get_acesso_user ( true );
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Usuario', 'required' );
    		$this->form_validation->set_rules ( 'active', 'Ativo', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_canal = $this->input->post('id');
    			$id_user_session = $this->session->userdata('id');
    			
    			$data_store = array(
    					'id_canal' => $this->input->post('id'),
    					'id_usuario' => $this->input->post('user'),
    					'usuario_atualizador' => $id_user_session,
    					'ativo' => $this->input->post('active'),
    			);
    			
    			
    			if ( $chat->editUsuarioCanal($data_store) == TRUE) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out['users'] = $chat->getActiveUserRelatedToCanal($id_canal);
    				
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Canal';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	
    	
    	echo json_encode($out);
    	exit;
    }
    
    
    //Metodo que coleta mensagens de um determinado canal.
    //Deve verificar se o usuário pertence a aquele canal;
    //Deve ter um limitador para limite superior e inferior da consulta; O ordenador padrão sempre será a data de inclusão no sistema;
    //Outro parametro pode ser a direção da busca, se for superior, envia a útilma mensagem do limite superior para busca de datas menores que ela, se inferior, consulta dados para datas maiores que ela;
    public function getMensagensCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'reference_id', 'reference_id', 'required' );
    		$this->form_validation->set_rules ( 'direction', 'direction', 'required' );
    		$this->form_validation->set_rules ( 'qnt', 'qnt', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_canal = $this->input->post('id');
    			$idRefer = $this->input->post('reference_id');
    			$idRefer = ($idRefer != '') ? $idRefer : null;
    			$id_usuario = $this->session->userdata('id');
    			$direction = $this->input->post('direction');
    			$limit = $this->input->post('qnt');
    			
    			$out['mens'] = $chat->getMensByIdCanalUserAccessNav( $id_canal, $id_usuario, $idRefer, $direction, $limit);
    			$out['current_datetime'] = date("Y-m-d H:i");
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    /* 
    Pode receber paramentros de busca( essa parte será complicada);
    Recebe limites superiores e inferiores;
    Outro parametro pode ser a direção da busca, se for superior, envia a útilma mensagem do limite superior para busca de datas menores que ela, se inferior, consulta dados para datas maiores que ela;
    Retorna uma tupla que indexa os registros encontrados no limite superior e no limite inferior;
    Retorna tambem a lista de Mensagens enviadas 
    */
    public function  seachMensagemCanal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'mens', 'Mensagem', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
    public function addMessage()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$this->load->helper('file');
    	
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'mens', 'Mensagem', 'required' );
    		$this->form_validation->set_rules ( 'idMens', 'idMens', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_user_session = $this->session->userdata('id');
    			$id_canal = $this->input->post('id');
    			$id_empresa = $this->session->userdata('id_empresa');
    			$idReferenceOrder = $this->input->post('idMens');
    			//echo $teste = utf8_decode( $this->input->post('mens'));
    			//$this->debugMark($teste);
    			
    			if(isset($_FILES["file"]))
    			{
    				
    				$fileNameDoc = $_FILES["file"]["name"];
    				$target_file_doc = UPLOAD . basename($fileNameDoc);
    				$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
    				$url_image = '';
    				
    				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_doc)) {
    					
    					$nome = $this->createRandWord(40).'.'.$fileTypeDoc;
    					
    					$fileToSave = CHAT . $id_empresa . '/' . $id_canal ;
    					
    					if( !file_exists( CHAT . $id_empresa )){
    						mkdir( CHAT . $id_empresa, 0777, true);
    						chmod( CHAT . $id_empresa, 0777);
    					}
    					
    					if( !file_exists( CHAT . $id_empresa .'/'.$id_canal )){
    						mkdir( CHAT . $id_empresa .'/'.$id_canal , 0777, true);
    						chmod( CHAT . $id_empresa .'/'.$id_canal , 0777);
    					}
    					
    					copy ( $target_file_doc , $fileToSave . '/' . $nome);
    					unlink($target_file_doc);
    					
    					$url_image = base_url('assets/chat') . '/'. $id_empresa .'/'. $id_canal.'/'.$nome;
    				}
    			}else{
    				$url_image = '';
    			}
    			
    			
    			//die;
    			
    			$data_store = array(
    					'id_canal' => $id_canal,
    					'id_usuario' => $id_user_session,
    					'descricao' => $this->input->post('mens'),
    					'file' => $url_image, 
    					'mime' => get_mime_by_extension($url_image)
    			);
    			
    			
    			
    			if ( $chat->addMens($data_store) == TRUE) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['mens'] = $chat->getMensByIdCanalUserAccessNav($id_canal, $id_user_session, $idReferenceOrder, 'desc');
    				$out['current_datetime'] = date("Y-m-d H:i");
    				//$this->debugMark($emoji);
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Canal';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
   private function codeToSymbol($em) {
    	if($em > 0x10000) {
    		$first = (($em - 0x10000) >> 10) + 0xD800;
    		$second = (($em - 0x10000) % 0x400) + 0xDC00;
    		return json_decode('"' . sprintf("\\u%X\\u%X", $first, $second) . '"');
    	} else {
    		return json_decode('"' . sprintf("\\u%X", $em) . '"');
    	}
    }
    
    public function editMessage()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$this->load->helper('file');
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'id_mensagem', 'Mensagem', 'required' );
    		$this->form_validation->set_rules ( 'mens', 'Mensagem', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_user_session = $this->session->userdata('id');
    			$id_canal = $this->input->post('id');
    			$id_canal_mensagem = $this->input->post('id_mensagem');
    			$id_empresa = $this->session->userdata('id_empresa');
    			
    			if(isset($_FILES["file"]))
    			{
    				
    				$fileNameDoc = $_FILES["file"]["name"];
    				$target_file_doc = UPLOAD . basename($fileNameDoc);
    				$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
    				$url_image = '';
    				
    				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_doc)) {
    					
    					$nome = $this->createRandWord(40).'.'.$fileTypeDoc;
    					
    					$fileToSave = CHAT . $id_empresa . '/' . $id_canal ;
    					
    					if( !file_exists( CHAT . $id_empresa )){
    						mkdir( CHAT . $id_empresa, 0777, true);
    						chmod( CHAT . $id_empresa, 0777);
    					}
    					
    					if( !file_exists( CHAT . $id_empresa .'/'.$id_canal )){
    						mkdir( CHAT . $id_empresa .'/'.$id_canal , 0777, true);
    						chmod( CHAT . $id_empresa .'/'.$id_canal , 0777);
    					}
    					
    					copy ( $target_file_doc , $fileToSave . '/' . $nome);
    					unlink($target_file_doc);
    					
    					$url_image = base_url('assets/chat') . '/'. $id_empresa .'/'. $id_canal.'/'.$nome;
    				}
    			}else{
    				$url_image = '';
    			}
    			
    			$data_store = array(
    					'id_canal' => $id_canal,
    					'id_canal_mensagem' => $id_canal_mensagem,
    					'id_usuario' => $id_user_session,
    					'descricao' => $this->input->post('mens'),
    					'file' => $url_image,
    					'mime' => get_mime_by_extension($url_image)
    			);
    			
    			if ( $chat->editMens($data_store) == TRUE) {
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out['current_datetime'] = date("Y-m-d H:i");
    				
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Canal';
    			}
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
    
    //Recebe uma string e retorna a lista de usuários participantes do Canal;
    public function getUserParticipantByString()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Usuario', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_canal = $this->input->post('id');
    			$strUser = $this->input->post('user');
    			
    			$out = $chat->getUserRelatedToCanal($id_canal, $strUser);
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
    //Lista de canais em que o usuario foi citado.
    public function listarCitacoes()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'id', 'Canal', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Usuario', 'required' );
    		
    		if ($this->form_validation->run ()) {
    			
    			$this->load->model('chatdao');
    			$chat = new chatdao();
    			
    			$id_usuario = $this->session->userdata('id');
    			
    			$out = $chat->getCitacoesByidUsuario( $id_usuario);
    			
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    			$out['current_datetime'] = date("Y-m-d H:i");
    		}
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi Enviado.';
    	}
    	
    	echo json_encode($out);
    	exit;
    }
    
}













