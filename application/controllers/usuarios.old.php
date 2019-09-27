<?php
require_once (APPPATH . 'controllers/App_controller' . EXT);

class usuarios extends App_controller {

	const VIEW_FOLDER = 'admin/usuarios';

	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'usuariosdao' );
	}

	public function index() {
		$data = array ();
		$data = array_merge ( $data, $this->get_acesso_user ( true ) );

		// all the posts sent by the view
		$search_string = $this->input->post ( 'search_string' );
		$order = $this->input->post ( 'order' );
		$order_type = $this->input->post ( 'order_type' );

		// pagination settings
		$config ['per_page'] = 30;

		$config ['base_url'] = base_url () . 'admin/usuario';
		$config ['use_page_numbers'] = TRUE;
		$config ['num_links'] = 20;
		$config ['full_tag_open'] = '<nav class="navbar navbar-default navbar-fixed-bottom"><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
		$config ['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		$config ['next_tag_open'] = '<li>';
		$config ['next_tagl_close'] = '</li>';
		$config ['prev_tag_open'] = '<li>';
		$config ['prev_tagl_close'] = '</li>';
		$config ['first_tag_open'] = '<li>';
		$config ['first_tagl_close'] = '</li>';
		$config ['last_tag_open'] = '<li>';
		$config ['last_tagl_close'] = '</li>';

		// limit end
		$page = $this->uri->segment ( 3 );

		// math to get the initial record to be select in the database
		$limit_end = ($page * $config ['per_page']) - $config ['per_page'];
		if ($limit_end < 0) {
			$limit_end = 0;
		}

		// if order type was changed
		if ($order_type) {
			$filter_session_data ['order_type'] = $order_type;
		} else {
			// we have something stored in the session?
			if ($this->session->userdata ( 'order_type' )) {
				$order_type = $this->session->userdata ( 'order_type' );
			} else {
				// if we have nothing inside session, so it's the default "Asc"
				$order_type = 'Asc';
			}
		}
		// make the data type var avaible to our view
		$data ['order_type_selected'] = $order_type;

		// we must avoid a page reload with the previous session data
		// if any filter post was sent, then it's the first time we load the content
		// in this case we clean the session filter data
		// if any filter post was sent but we are in some page, we must load the session data

		// filtered && || paginated
		if ($search_string !== false && $order !== false || $this->uri->segment ( 3 ) == true) {

			/*
			 * The comments here are the same for line 79 until 99
			 *
			 * if post is not null, we store it in session data array
			 * if is null, we use the session data already stored
			 * we save order into the the var to load the view with the param already selected
			 */
			if ($search_string) {
				$filter_session_data ['search_string_selected'] = $search_string;
			} else if ($search_string == '' and $page == null) {
			} else {
				$search_string = $this->session->userdata ( 'search_string_selected' );
			}
			$data ['search_string_selected'] = $search_string;

			if ($order) {
				$filter_session_data ['order'] = $order;
			} else {
				$order = $this->session->userdata ( 'order' );
			}
			$data ['order'] = $order;

			// save session data into the session
			if (isset ( $filter_session_data )) {
				$this->session->set_userdata ( $filter_session_data );
			}

			// fetch sql data into arrays
			$data ['count_products'] = $this->usuariodao->count_usuario ( $search_string, $order );
			$config ['total_rows'] = $data ['count_products'];

			// fetch sql data into arrays
			if ($search_string) {
				if ($order) {
					$data ['usuario'] = $this->usuariodao->get_usuario ( $search_string, $order, $order_type, $config ['per_page'], $limit_end );
				} else {
					$data ['usuario'] = $this->usuariodao->get_usuario ( $search_string, '', $order_type, $config ['per_page'], $limit_end );
				}
			} else {
				if ($order) {
					$data ['usuario'] = $this->usuariodao->get_usuario ( '', $order, $order_type, $config ['per_page'], $limit_end );
				} else {
					$data ['usuario'] = $this->usuariodao->get_usuario ( '', '', $order_type, $config ['per_page'], $limit_end );
				}
			}
		} else {

			// clean filter data inside section
			$filter_session_data ['usuario_selected'] = null;
			$filter_session_data ['search_string_selected'] = null;
			$filter_session_data ['order'] = null;
			$filter_session_data ['order_type'] = null;
			$this->session->set_userdata ( $filter_session_data );

			// pre selected options
			$data ['search_string_selected'] = '';
			$data ['order'] = 'id';

			// fetch sql data into arrays
			$data ['count_products'] = $this->usuariodao->count_usuario ();
			$data ['usuario'] = $this->usuariodao->get_usuario ( '', '', $order_type, $config ['per_page'], $limit_end );
			$config ['total_rows'] = $data ['count_products'];
		} // !isset($search_string) && !isset($order)

		// initializate the panination helper
		$this->pagination->initialize ( $config );

		// load the view
		$data ['main_content'] = 'admin/usuario/list';
		$this->load->view ( 'includes/template', $data );
	} // index

	public function add() {
		$data = array ();
		$data = array_merge ( $data, $this->get_acesso_user ( true ) );

		// if save button was clicked, get the data sent via post
		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			// form validation

			$this->form_validation->set_rules ( 'instituicao', 'instituicao', 'required' );
			$this->form_validation->set_rules ( 'login', 'login', 'required' );
			$this->form_validation->set_rules ( 'nome', 'nome', 'required' );
			$this->form_validation->set_rules ( 'local', 'local', '' );
			$this->form_validation->set_rules ( 'id_local_execucao', 'id_local_execucao', 'required' );
			$this->form_validation->set_rules ( 'email', 'email', 'required' );
			/*
			 * $this->form_validation->set_rules('senha', 'senha', 'required');
			 * $this->form_validation->set_rules('tokensenha', 'tokensenha', 'required');
			 * $this->form_validation->set_rules('ativo', 'ativo', 'required');
			 */
			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );

			// if the form has passed through the validation
			if ($this->form_validation->run ()) {
				$data_to_store = array (
						'instituicao' => $this->input->post ( 'instituicao' ),
						'login' => $this->input->post ( 'login' ),
						'nome' => $this->input->post ( 'nome' ),
						'local' => $this->input->post ( 'local' ),
						'email' => $this->input->post ( 'email' ),
						'senha' => sha1 ( $this->input->post ( 'senha' ) ),
						'tokensenha' => $this->input->post ( 'tokensenha' ),
						'id_local_execucao' => $this->input->post ( 'id_local_execucao' ),
						'ativo' => $this->input->post ( 'ativo' )
				);
				// if the insert has returned true then we show the flash message
				if ($this->usuariosdao->store_usuario ( $data_to_store )) {
					$data ['flash_message'] = TRUE;
				} else {
					$data ['flash_message'] = FALSE;
				}
			}
		}

		$data = array_merge ( $data, $this->foreingController () );
		// load the view
		$data ['main_content'] = 'admin/usuarios/add';
		$this->load->view ( 'includes/template', $data );
	}

	public function update() {
		$data = array ();
		$data = array_merge ( $data, $this->get_acesso_user ( true ) );

		// product id
		$id = $this->uri->segment ( 4 );

		// if save button was clicked, get the data sent via post
		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
			// form validation

			$this->form_validation->set_rules ( 'instituicao', 'instituicao', 'required' );
			$this->form_validation->set_rules ( 'login', 'login', 'required' );
			$this->form_validation->set_rules ( 'nome', 'nome', 'required' );
			$this->form_validation->set_rules ( 'local', 'local', '' );
			$this->form_validation->set_rules ( 'id_local_execucao', 'id_local_execucao', 'required' );
			$this->form_validation->set_rules ( 'email', 'email', 'required' );
			/*
			 * $this->form_validation->set_rules('senha', 'senha', 'required');
			 * $this->form_validation->set_rules('tokensenha', 'tokensenha', 'required');
			 * $this->form_validation->set_rules('ativo', 'ativo', 'required');
			 */
			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );
			// if the form has passed through the validation
			if ($this->form_validation->run ()) {

				$data_to_store = array (
						'instituicao' => $this->input->post ( 'instituicao' ),
						'login' => $this->input->post ( 'login' ),
						'nome' => $this->input->post ( 'nome' ),
						'local' => $this->input->post ( 'local' ),
						'email' => $this->input->post ( 'email' ),
						'senha' => sha1 ( $this->input->post ( 'senha' ) ),
						'tokensenha' => $this->input->post ( 'tokensenha' ),
						'ativo' => $this->input->post ( 'ativo' ),
						'id_local_execucao' => $this->input->post ( 'id_local_execucao' )
				);
				/*
				 * 'senha' => $this->input->post('senha'),
				 * 'tokensenha' => $this->input->post('tokensenha'),
				 * 'ativo' => $this->input->post('ativo')
				 */

				// if the insert has returned true then we show the flash message
				if ($this->usuariosdao->update_usuario ( $id, $data_to_store ) == TRUE) {
					$this->session->set_flashdata ( 'flash_message', 'updated' );
				} else {
					$this->session->set_flashdata ( 'flash_message', 'not_updated' );
				}
				redirect ( 'admin/usuarios/update/' . $id . '' );
			} // validation run
		}

		// if we are updating, and the data did not pass trough the validation
		// the code below wel reload the current data

		// product data
		$data ['usuario'] = $this->usuariosdao->get_usuario_by_id ( $id );
		$data = array_merge ( $data, $this->foreingController () );
		// load the view
		$data ['main_content'] = 'admin/usuarios/edit';
		$this->load->view ( 'includes/template', $data );
	}

	public function delete() {
		$data = array ();
		$data = array_merge ( $data, $this->get_acesso_user ( true ) );

		// product id
		$id = $this->uri->segment ( 4 );
		$this->usuariosdao->delete_usuario ( $id );
		redirect ( 'admin/usuarios' );
	} // edit

	public function usuarioCadastro() {
		$data = array ();

		// if save button was clicked, get the data sent via post
		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			$this->form_validation->set_rules ( 'nomeEmpresa', 'Empresa', 'required' );
			$this->form_validation->set_rules ( 'nome', 'Nome', 'required' );
			$this->form_validation->set_rules ( 'email', 'Email', 'required' );
			$this->form_validation->set_rules ( 'senha', 'Senha', 'required|matches[senhaConfirmacao]' );
			$this->form_validation->set_rules ( 'senhaConfirmacao', 'Repita sua Senha', 'required' );
			$this->form_validation->set_rules ( 'termos', 'Aceite os Termos', 'required' );
			/*
			 *
			 * $this->form_validation->set_rules('tokensenha', 'tokensenha', 'required');
			 * $this->form_validation->set_rules('ativo', 'ativo', 'required');
			 */
			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );

			// if the form has passed through the validation
			if ($this->form_validation->run ()) {
				$data_to_store = array (
						'login' => $this->input->post ( 'email' ),
						'nome_usuario' => $this->input->post ( 'nome' ),
						'nome_empresa' => $this->input->post ( 'nomeEmpresa' ),
						'email_usuario' => $this->input->post ( 'email' ),
						'login' => $this->input->post ( 'email_usuario' ),
						'senha' => sha1 ( $this->input->post ( 'senha' ) ),
						'ativo' => 1
				);

				if ($this->usuariosdao->firstStore ( $data_to_store )) {
					$data ['flash_message'] = TRUE;
				} else {
					$data ['flash_message'] = FALSE;
				}
			}
		}

		// $data = array_merge($data, $this->foreingController());

		$data ['main_content'] = 'portal/cadastro';
		$this->load->view ( 'includes/template_login', $data );
	}

	public function usuarioCadastroService() {
		header ( 'Content-type: application/json' );

		// if save button was clicked, get the data sent via post
		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			$this->form_validation->set_rules ( 'nomeEmpresa', 'Empresa', 'required' );
			$this->form_validation->set_rules ( 'nome', 'Nome', 'required' );
			$this->form_validation->set_rules ( 'email', 'Email', 'required' );
			$this->form_validation->set_rules ( 'senha', 'Senha', 'required|matches[senha2]' );
			$this->form_validation->set_rules ( 'senha2', 'Repita sua Senha', 'required' );
			$this->form_validation->set_rules ( 'termos', 'Aceite os Termos', 'required' );

			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );

			if ($this->form_validation->run ()) {
				if ($this->emailJaCadastrado ( $this->input->post ( 'email' ) )) {
					$out ['mensResponse'] = 'Esse email já possui cadastro em nosso sistema, acesse seu email para maiores informações ou acesse o link Esqueci minha Senha.';
					$out ['error'] = true;
					$out ['error_message'] = 'Esse email já possui cadastro em nosso sistema, acesse seu email para maiores informações ou acesse o link Esqueci minha Senha.';
				} else {

					$randWord = $this->createRandWord ( 40 );
					$data_to_store = array (
							'login' => $this->input->post ( 'email' ),
							'nome_usuario' => $this->input->post ( 'nome' ),
							'nome_empresa' => $this->input->post ( 'nomeEmpresa' ),
							'email_usuario' => $this->input->post ( 'email' ),
							'senha' => sha1 ( $this->input->post ( 'senha' ) ),
							'normal_user' => $this->input->post ( 'normal_user' ),
							'data_cadastro' => date("Y-m-d"),
							'ativo' => 0,
							'email_checked' => 0,
							'hash_cadastro' => $randWord

					);

					if ($this->usuariosdao->firstStore ( $data_to_store )) {

						$emailData = array (
								'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . $randWord,
								'emailDestino' => $data_to_store['email_usuario'],
								'nomeDestino' =>  $data_to_store['nome_usuario']
						);
						// TODO: caso email n possa ser enviado, será dado um rollback no banco de dados.
						$result = $this->emailConfirmarEmail( $emailData );

						$out ['mensResponse'] = 'Seu usuário foi cadastrado com Sucesso.';
						$out ['error'] = false;
						$out ['error_message'] = '';

					} else {
						$out ['mensResponse'] = 'Ocorreu um problema em seu cadastro, por favor tente mais tarde.';
						$out ['error'] = true;
						$out ['error_message'] = 'Ocorreu um problema em seu cadastro, por favor tente mais tarde.';
					}
				}
			} else {
				$out ['mensResponse'] = 'Ocorreu um erro na validação dos dados.';
				$out ['error'] = true;
				$out ['error_message'] = 'Ocorreu um problema em seu cadastro, por favor tente mais tarde.';
			}
			/*
			 * $out['submitted_data']['nome'] = $this->input->post('nome');
			 * $out['submitted_data']['nomeEmpresa'] = $this->input->post('nomeEmpresa');
			 * $out['submitted_data']['email'] = $this->input->post('email');
			 * $out['submitted_data']['senha'] = $this->input->post('senha');
			 * $out['submitted_data']['senha2'] = $this->input->post('senha2');
			 * $out['submitted_data']['termos'] = $this->input->post('termos');
			 */
		} else {
			$out ['mensResponse'] = 'Sem dados no formulário.';
		}

		echo json_encode ( $out );
		exit ();
	}

	function foreingController() {
		$this->load->model ( 'local_execucaodao' );
		$local = new local_execucaodao ();
		$data ['local'] = $local->get_local_execucao ( null, 'titulo' );

		return $data;
	}

	public function usuarioRecPassService($data = null) {

		header ( 'Content-type: application/json' );

		// if save button was clicked, get the data sent via post
		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			// form validation

			$this->form_validation->set_rules ( 'email', 'Email', 'required' );

			if ($this->form_validation->run ()) {
				$data2 = array ();
				$data2 = $this->usuariosdao->getUsuarioByLoginEmail ( null, $this->input->post ( 'email' ) );

				if (empty ( $data2 ) || $data2 [0]['email_usuario'] == '') {

					$out ['mensResponse'] = 'Ocorreu um erro na digitação de seus dados. Ou talvez um problema de inconsistência. Por favor entre em contato com a administração.';
					$out ['error'] = false;
					$out ['error_message'] = 'Login não encontrato';
				} else {

					$randWord = $this->createRandWord ( 40 );
					$data_to_store = array (
							'hash_cadastro' => $randWord

					);
					if ($this->usuariosdao->update_usuario( $data2[0]['id_usuario'], $data_to_store ) == TRUE) {

						$emailData = array (
								'linkRecuperacao' => base_url ( 'redefinir_senha' ) . '/' . $randWord,
								'emailDestino' => $data2[0]['email_usuario'],
								'nomeDestino' =>  $data2[0]['nome_usuario']
						);

						$result = $this->emailEsqueciMinhaSenha( $emailData );

						if ($result == "Sucesso") {

							$out ['error'] = false;
							$out ['error_message'] = '';

						} else {
							$out ['error'] = true;
							$out ['error_message'] = 'O email não pode ser enviado';
						}
					} else {
						$out ['error'] = true;
						$out ['error_message'] = 'Ocorreu um problema no processo, por favor tente mais tarde ou entre em contato com nossa equipe.';
					}
				}
			} else {

				$out ['error'] = true;
				$out ['error_message'] = 'Preencha o campo email.';
			}
		}
		echo json_encode ( $out );
		exit ();
	}

	function recover_passService($key = null) {

		header ( 'Content-type: application/json' );

		if ($key) {

			// product id
			$result = $this->usuariosdao->getUsuarioByKey ( $key );
			if (sizeof ( $result ) > 0) {

				$id = $result [0] ['id_usuario'];

				// if save button was clicked, get the data sent via post
				if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
					// form validation

					$this->form_validation->set_rules ( 'pass', 'Senha', 'required' );
					$this->form_validation->set_rules ( 'pass2', 'Confirmar Senha', 'required|matches[pass]' );


					if ($this->form_validation->run ()) {

						$data_to_store = array (
								'senha' => sha1 ( $this->input->post ( 'pass' ) ),
								'hash_cadastro' => '',
								'ativo' => 1,
								'email_checked' => 1

						);
						// $this->debugMark(null, $data_to_store);

						// if the insert has returned true then we show the flash message
						if ($this->usuariosdao->update_usuario ( $id, $data_to_store ) == TRUE) {
							$out ['error'] = false;
							$out ['error_message'] = '';
						} else {
							$out ['error'] = true;
							$out ['error_message'] = 'Erro ao redefinir a senha.';
						}
						// redirect('recuperar_senha');
					}else{
						$out ['error'] = true;
						$out ['error_message'] = 'Erro na entrada de dados da redefinição da senha. Campo vazio ou passwords não são iguais.';
					}
				}
			}else{
				$out ['error'] = true;
				$out ['error_message'] = 'Palavra chave para alteração de senha não encontrada no sistema.';
			}
		}
		echo json_encode ( $out );
		exit ();

	}

	function confirmaEmailService($key = null) {

		header ( 'Content-type: application/json' );

		if ($key) {

			$result = $this->usuariosdao->getUsuarioByKey ( $key );
			if (sizeof ( $result ) > 0) {

				$id = $result [0] ['id_usuario'];

				$data_to_store = array (
						'ativo' => 1,
						'email_checked' => 1,
						'hash_cadastro' => ''

				);
				if ($this->usuariosdao->update_usuario ( $id, $data_to_store ) == TRUE) {
					$out ['error'] = false;
					$out ['error_message'] = '';
				} else {
					$out ['error'] = true;
					$out ['error_message'] = 'Erro ao confirmar a email.';
				}
						// redirect('recuperar_senha');

			}else{
				$out ['error'] = true;
				$out ['error_message'] = 'Palavra chave para confirmação de email não encontrada no sistema.';
			}
		}
		echo json_encode ( $out );
		exit ();

	}

	function confirmaEmail($key = null) {

		if ($key) {

			$result = $this->usuariosdao->getUsuarioByKey ( $key );
			if (sizeof ( $result ) > 0) {

				$id = $result [0] ['id_usuario'];

				$data_to_store = array (
						'ativo' => 1,
						'email_checked' => 1,
						'hash_cadastro' => ''

				);
				if ($this->usuariosdao->update_usuario ( $id, $data_to_store ) == TRUE) {

					$data['main_content'] = 'portal/confirmarEmail';
					$this->load->view('includes/template_login', $data );

				} else {
					redirect('');
				}
				// redirect('recuperar_senha');

			}else{
				redirect('');
			}
		}else{
			redirect('');
		}

	}

	public function add_usuario_empresaService() {

		header ( 'Content-type: application/json' );
		$this->get_acesso_user ( true );


		$this->load->model ( 'usuariosdao' );
		$userDao = new usuariosdao();

		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			$id_empresa = $this->session->userdata('id_empresa');

			$this->form_validation->set_rules ( 'nome', 'Nome', 'required' );
			$this->form_validation->set_rules ( 'email', 'Email', 'required' );

			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );

			if ($this->form_validation->run ()) {
				if ($this->emailJaCadastrado ( $this->input->post ( 'email' ) )) {
					$out ['error'] = true;
					$out ['error_message'] = 'Esse email já possui cadastro em nosso sistema, acesse seu email para maiores informações ou acesse o link Esqueci minha Senha.';
				} else {


					if(isset($_FILES["imagem"]))
					{

						$fileNameDoc = $_FILES["imagem"]["name"];
						$target_file_doc = UPLOAD . basename($fileNameDoc);
						$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
						$url_image = '';

						if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file_doc)) {

							$nome = $this->createRandWord(40).'.'.$fileTypeDoc;

							$fileToSave = IMG . $id_empresa ;

							if( !file_exists( IMG . $id_empresa )){
								mkdir( $fileToSave , 0777, true);
								chmod( $fileToSave , 0777);
							}

							copy ( $target_file_doc , $fileToSave . '/' . $nome);
							unlink($target_file_doc);

							$url_image = base_url('assets/img') . '/'. $id_empresa .'/'.$nome;
							$img_name = $nome;
						}
					}else{
						$url_image = '';
						$img_name = '';
					}


					$randWord = $this->createRandWord ( 40 );
					$data_to_store = array (
							'login' => $this->input->post ( 'email' ),
							'nome_usuario' => $this->input->post ( 'nome' ),
							'email_usuario' => $this->input->post ( 'email' ),
							'id_idioma' => $this->input->post ( 'id_idioma' ),
							'id_empresa' => $id_empresa,
							'ativo' => $this->input->post('active') == "true" ? 1 : 0,
							'admin' => $this->input->post('admin') == "true" ? 1 : 0,
							'avaliador' => $this->input->post('avaliador') == "true" ? 1 : 0,
							'hash_cadastro' => $randWord,
							'url_image' => $img_name,
							'normal_user' => $this->input->post('normal_user') == "true" ? 1 : 0,
							'goal_register' => $this->input->post('goal_register') == "true" ? 1 : 0,
							'maintenance_user' => $this->input->post('maintenance_user') == "true" ? 1 : 0,
							'user_reviewer' => $this->input->post('user_reviewer') == "true" ? 1 : 0,
							'team' => $this->input->post('team'),
					);

                    $birthday	=	$this->input->post ( 'birthday' );
                    if(!empty($birthday)){

                        $birthday =	strtotime(str_replace("/","-", $this->input->post ( 'birthday' )));
                        $data_to_store['data_aniversario'] =  date("Y-m-d", $birthday);
                    }

					$this->load->model('servicedao');
					$service = new servicedao();
					$id_empresa 			= 	$this->session->userdata('id_empresa');
					$id_usuario 			= 	$this->session->userdata('id');
					$data_to_store['id_cargo'] =  $service->get_cargo_id($id_empresa,  $this->input->post ( 'cargo' ), $id_usuario);
					
					if ($this->usuariosdao->store_usuario( $data_to_store )) {


						$emailData = array (
								'linkRecuperacao' => base_url ( 'redefinir_senha' ) . '/' . $randWord,
								'emailDestino' => $data_to_store['email_usuario'],
								'nomeDestino' =>  $data_to_store['nome_usuario']
						);

						$result = $this->emailConvidarUsuario( $emailData );
						$out ['error'] = false;
						$out ['error_message'] = '';

					} else {
						$out ['error'] = true;
						$out ['error_message'] = 'Ocorreu um problema em seu cadastro, por favor tente mais tarde.';
					}
				}
			} else {
				$out ['error'] = true;
				$out ['error_message'] = 'Ocorreu um erro na validação dos dados.';
			}

		} else {
			$out ['error'] = true;
			$out ['error_message'] = 'Sem dados no formulário.';
		}

		$this->load->model('servicedao');
		$service = new servicedao();

		$userForCompany = $service->get_all_user_for_by_id_company($id_empresa);
    	if($userForCompany){
			foreach($userForCompany as $index=>$user){
				$user_data[$index] = $user;
				if(!empty($user['image'])){
					$img_url = $user['image'];
					$user_data[$index]['image'] = base_url('assets/img') . '/'. $id_empresa .'/'.$img_url;
					$user_data[$index]['xs_image'] = base_url('assets/img') . '/'. $id_empresa .'/50/'.$img_url;
					$user_data[$index]['md_image'] = base_url('assets/img') . '/'. $id_empresa .'/150/'.$img_url;
				}else{
					$user_data[$index]['image'] 	= null;
					$user_data[$index]['xs_image'] 	= null;
					$user_data[$index]['md_image'] 	= null;
				}
			}
		}
		$out['users'] =  $user_data;

		echo json_encode($out);
		exit ();
	}

	public function resize($old_image_path,$path,$image_name)
	{
		$sizes = array(150,50);
		foreach($sizes as $size)
		{
			if( !file_exists($path.'/'.$size)){
				mkdir($path.'/'.$size , 0777, true);
				chmod($path.'/'.$size, 0777);
			}
			$this->load->library('image_lib');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $old_image_path;
			$config['create_thumb'] 	= FALSE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']            = $size;
			$config['height']           = $size;
			$config['new_image']        = $path.'/'.$size.'/'.$image_name;

			$this->image_lib->clear();
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		}
	}

	public function edit_usuario_empresaService()

	{
		header ( 'Content-type: application/json' );
		$this->get_acesso_user ( true );
		$id_empresa = $this->session->userdata('id_empresa');

		$this->load->model ( 'usuariosdao' );
		$userDao = new usuariosdao();

		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			$this->form_validation->set_rules ( 'id', 'Usuário', 'required' );
			$this->form_validation->set_rules ( 'nome', 'Nome', 'required' );
			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );


			if ($this->form_validation->run ()) {

					if(isset($_FILES["imagem"]))
					{

						$fileNameDoc = $_FILES["imagem"]["name"];
						$target_file_doc = UPLOAD . basename($fileNameDoc);
						$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
						$url_image = '';

						if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file_doc)) {

							$nome = $this->createRandWord(40).'.'.$fileTypeDoc;

							$fileToSave = IMG . $id_empresa ;

							if( !file_exists( IMG . $id_empresa )){
								mkdir( $fileToSave , 0777, true);
								chmod( $fileToSave , 0777);
							}

							copy ( $target_file_doc , $fileToSave . '/' . $nome);
							$resize = $this->resize($target_file_doc,$fileToSave,$nome);
							unlink($target_file_doc);


							//$url_image = base_url('assets/img') . '/'. $id_empresa .'/'.$nome;
							$return_image = $nome;
							$url_image = $nome;
						}
					}else{
						$url_image = '';
					}
					$data_to_store	=	array();
					if($this->input->post ( 'status' )){
						$data_to_store['ativo'] = $this->input->post ( 'status' ) == "true" ? 1 : 0;
					}
					if($this->input->post ( 'avaliador' )){
						$data_to_store['avaliador'] = $this->input->post ( 'avaliador' ) == "true" ? 1 : 0;
					}
					if($this->input->post ( 'normal_user' )){
						$data_to_store['normal_user'] = $this->input->post ( 'normal_user' ) == "true" ? 1 : 0;
					}
					if($this->input->post ( 'goal_register' )){
						$data_to_store['goal_register'] = $this->input->post ( 'goal_register' ) == "true" ? 1 : 0;
					}
					if($this->input->post ( 'maintenance_user' )){
						$data_to_store['maintenance_user'] = $this->input->post ( 'maintenance_user' ) == "true" ? 1 : 0;
					}
					if($this->input->post ( 'user_reviewer' )){
						$data_to_store['user_reviewer'] = $this->input->post ( 'user_reviewer' ) == "true" ? 1 : 0;
					}
					$data_to_store['team'] = $this->input->post ( 'team' );
					if($this->input->post ( 'admin' )){
						if($this->input->post ( 'admin' ) == "true"){
							$data_to_store['admin'] = 1;
							$data_to_store['normal_user'] = 1;
							$data_to_store['goal_register'] = 1;
							$data_to_store['maintenance_user'] = 1;
							$data_to_store['user_reviewer'] = 1;
						}else{
							$data_to_store['admin'] = 0;
						}
					}

                    $id = $this->input->post ( 'id' );
					$data_to_store['nome_usuario'] =  $this->input->post ( 'nome' );

					$birthday	=	$this->input->post ( 'birthday' );
					if(!empty($birthday)){
						$birthday =	strtotime(str_replace("/","-", $this->input->post ( 'birthday' )));
						$data_to_store['data_aniversario'] =  date("Y-m-d", $birthday);
					}

					$this->load->model('servicedao');
					$service = new servicedao();
					$id_empresa 			= 	$this->session->userdata('id_empresa');
					$id_usuario 			= 	$this->session->userdata('id');
					if($this->input->post ( 'cargo' )!=""){
						$data_to_store['id_cargo'] =  $service->get_cargo_id($id_empresa,  $this->input->post ( 'cargo' ), $id_usuario);
					}

					if($url_image != ''){
						$data_to_store['url_image'] = $url_image;
					}
					if ($this->usuariosdao->update_usuario( $id, $data_to_store )) {

						$this->load->model('servicedao');
						$service = new servicedao();

						$userForCompany = $service->get_users_details_by_id($id);
						if(isset($return_image)){

							$userForCompany[0]['xs_image'] = base_url('assets/img') . '/'. $userForCompany[0]['id_empresa'] .'/50/'.$return_image;
								$userForCompany[0]['md_image'] = base_url('assets/img') . '/'. $userForCompany[0]['id_empresa'] .'/150/'.$return_image;
								$userForCompany[0]['image'] = base_url('assets/img') . '/'. $userForCompany[0]['id_empresa'] .'/'.$return_image;
						}else{
							if(!empty($userForCompany[0]['image'])){
								$userForCompany[0]['xs_image'] = base_url('assets/img') . '/'. $userForCompany[0]['id_empresa'] .'/150/'.$userForCompany[0]['image'];
								$userForCompany[0]['md_image'] = base_url('assets/img') . '/'. $userForCompany[0]['id_empresa'] .'/150/'.$userForCompany[0]['image'];
								$userForCompany[0]['image'] = base_url('assets/img') . '/'. $userForCompany[0]['id_empresa'] .'/'.$userForCompany[0]['image'];
							}else{
								$userForCompany[0]['xs_image'] 	= 	null;
								$userForCompany[0]['md_image'] 	= 	null;
								$userForCompany[0]['image'] 	= 	null;
							}
						}


						$out['user'] =  (sizeof($userForCompany) > 0 ? $userForCompany[0] : array());

						$out ['mensResponse'] = 'Seu usuário foi cadastrado com Sucesso.';
						$out ['error_message'] = '';
						$out ['error'] = false;

					} else {
						$out ['error'] = true;
						$out ['error_message'] = 'Ocorreu um problema em seu cadastro, por favor tente mais tarde.';
					}

			} else {
				$out ['error'] = true;
				$out ['error_message'] = 'Ocorreu um erro na validação dos dados.';
			}

		} else {
			$out ['error'] = true;
			$out ['error_message'] = 'Sem dados no formulário.';
		}

		echo json_encode ( $out );
		exit ();
	}

	private function emailJaCadastrado($email) {
		return ($this->usuariosdao->existeEmail ( $email ) > 0) ? true : false;
	}


	public function sendResetPassMailZapier($userTableToken){

            $emailData = array (
                'linkRecuperacao' => base_url ( 'redefinir_senha' ) . '/' . $userTableToken,
                'emailDestino' => $data2[0]['email_usuario'],
                'nomeDestino' =>  $data2[0]['nome_usuario']
            );

            $result = $this->emailEsqueciMinhaSenha( $emailData, 'resetzapier_senha.htm' );

            if ($result == "Sucesso") {

                $out ['error'] = false;
                $out ['error_message'] = '';

            } else {
                $out ['error'] = true;
                $out ['error_message'] = 'O email não pode ser enviado';
            }

            echo json_encode ( $out );
            exit ();

    }


	// TODO: Usar este método para enviar email ao usuário criado do zapier
	public function emailEsqueciMinhaSenha($emailData, $template = "recuperar_senha.htm") {

		/*
		$emailData = array (
				'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . "rand",
				'emailDestino' => "aspolavori@yahoo.com.br",
				'nomeDestino' =>  "Anderson"
		);
		 */

		$fileName = EMAIL . $template;

		if ( !file_exists($fileName) ) {
			return false;
		}

		$fp = fopen($fileName, "r");
		if ( !$fp ) {
			return false;
		}

		$email = fread($fp,filesize($fileName));
		fclose($fp);

		$email= str_replace('%&link&%', $emailData['linkRecuperacao'], $email);
		$email= str_replace('%&link_base&%', base_url('assets'), $email);

		/*
		echo $email;
		die;
		 */

		$result = $this->send_email_SMTP ( "team@elofy.com.br", "Elofy", null, null, 'Esqueci minha senha', $email, $emailData['emailDestino'], $emailData['nomeDestino'] );

		return $result;
	}

	public function emailConfirmarEmail($emailData) {

		/*
		$emailData = array (
				'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . "rand",
				'emailDestino' => "aspolavori@yahoo.com.br",
				'nomeDestino' =>  "Anderson"
		);
		*/

		$fileName = EMAIL . "confirmar_email.htm";

		if ( !file_exists($fileName) ) {
			return false;
		}

		$fp = fopen($fileName, "r");
		if ( !$fp ) {
			return false;
		}

		$email = fread($fp,filesize($fileName));
		fclose($fp);

		$email= str_replace('%&link&%', $emailData['linkRecuperacao'], $email);
		$email= str_replace('%&user&%', $emailData['nomeDestino'], $email);
		$email= str_replace('%&link_base&%', base_url('assets'), $email);
		$email= str_replace('%&email&%', $emailData['emailDestino'], $email);

		//echo $email;

		$result = $this->send_email_SMTP ( "team@elofy.com.br", "Elofy", null, null, 'Confirmar Email', $email, $emailData['emailDestino'], $emailData['nomeDestino'] );

		return $result;
	}

	private function emailConvidarUsuario($emailData) {

		$fileName = EMAIL . "aceitar_convite.htm";
		/*
		$emailData = array (
				'linkRecuperacao' => base_url ( 'confirmaEmail' ) . '/' . "rand",
				'emailDestino' => "aspolavori@yahoo.com.br",
				'nomeDestino' =>  "Anderson"
		);
		 */
		if ( !file_exists($fileName) ) {
			return false;
		}

		$fp = fopen($fileName, "r");
		if ( !$fp ) {
			return false;
		}

		$email = fread($fp,filesize($fileName));
		fclose($fp);

		$email= str_replace('%&link&%', $emailData['linkRecuperacao'], $email);
		$email= str_replace('%&user&%', $emailData['nomeDestino'], $email);
		$email= str_replace('%&link_base&%', base_url('assets'), $email);
		$email= str_replace('%&email&%', $emailData['emailDestino'], $email);
		/*
		echo $email;
		die;
		 */
		$result = $this->send_email_SMTP ( "team@elofy.com.br", "Elofy", null, null, 'Convite Elofy', $email, $emailData['emailDestino'], $emailData['nomeDestino'] );

		return $result;
	}

	public function usuarioRedefinirSenha($key){

		if ($key) {
			$result = $this->usuariosdao->getUsuarioByKey ( $key );
			if(sizeof($result) <= 0){
				redirect('');
			}
			$data['usuario'] = $result[0];

			$data['main_content'] = 'portal/redefinirSenha';
			$this->load->view('includes/template_login', $data );
		}else{
			redirect('');
		}

	}

	public function UsuarioRecPass($data = null) {

		// if save button was clicked, get the data sent via post
		if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

			// form validation

			$this->form_validation->set_rules ( 'email', 'email', '' );
			$this->form_validation->set_rules ( 'login', 'login', '' );

			$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert">
    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    					</button>
    					<strong>', '</strong></div>' );

			if (($this->input->post ( 'login' )) || ($this->input->post ( 'email' ))) {

				// $this->debugMark($this->input->post('login'));
				$data2 = array ();
				$data2 = $this->usuariosdao->getUsuarioByLoginEmail ( $this->input->post ( 'login' ), $this->input->post ( 'email' ) );

				if (empty ( $data2 )) {
					$data ['mens'] = 'Ocorreu um erro na digitação de seus dados. Ou talvez um problema de inconsistência. Por favor entre em contato com a administração do SGPLAN.';
				} else {
					if ($data2 [0] ['email'] == '') {
						$data ['mens'] = 'Você não possui um email cadastrado em nosso sistema. Por favor entre em contato com a administração do SGPLAN para cadastrar um email válido.';
					} else {

						$randWord = $this->createRandWord ( 20 );
						$data_to_store = array (
								'hash_cadastro' => $randWord

						);
						if ($this->usuariosdao->update_usuario ( $data2 [0] ['id_usuario'], $data_to_store ) == TRUE) {

							$mensUser = 'Você precisa redefinir sua senha, clique no link abaixo para que o procedimento seja realizado.<br/><br/>Login: <b>' . $data2 [0] ['login'] . '</b><br/><br/>';
							$mensUser = $mensUser . '<a href="' . base_url ( 'recuperar_senha' ) . '/' . $randWord . '" >Recuperar Senha</a>';

							$emailData = array (
									'emailsTo' => array (
											$data2 [0] ['email']
									),
									'emailsCc' => array (),
									'titulo' => 'Redefinir Senha',
									'emailBody' => $mensUser,
									'nomeRemetente' => 'SGPLAN',
									'emailRemetente' => 'sgplan@dnit.gov.br'
							);

							$result = $this->emailJson ( $emailData );

							if ($result->sucesso) {
								$data ['mens'] = 'Você recebera um email contendo as instruções para alterar sua senha. Caso não receba o email em até 24hrs, por favor entre em contato com a administração do SGPLAN.';
							} else {
								$data ['mens'] = 'Ocorreu um problema no processo, por favor tente mais tarde ou entre em contato com nossa equipe.';
							}
						} else {
							$data ['mens'] = 'Ocorreu um problema no processo, por favor tente mais tarde ou entre em contato com nossa equipe.';
						}
					}
				}
			} else {
				$data ['mens'] = 'Preencha ao menos um valor.';
			}
		}

		$data ['main_content'] = 'portal/usuarios/recuperar_senha';
		$this->load->view ( 'includes/portal_template', $data );
	}

	function recover_pass($key = null) {
		if ($key) {

			$data = array ();
			$data = array_merge ( $data, $this->get_acesso_user () );

			// product id
			$result = $this->usuariosdao->getUsuarioByKey ( $key );
			if (sizeof ( $result ) > 0) {

				$id = $result [0] ['id_usuario'];

				// if save button was clicked, get the data sent via post
				if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
					// form validation

					$this->form_validation->set_rules ( 'pass', 'Senha', 'required' );
					$this->form_validation->set_rules ( 'pass2', 'Confirmar Senha', 'required|matches[pass]' );

					$this->form_validation->set_error_delimiters ( '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>', '</strong></div>' );
					// if the form has passed through the validation
					if ($this->form_validation->run ()) {

						$data_to_store = array (
								'senha' => sha1 ( $this->input->post ( 'pass' ) ),
								'hash_cadastro' => '',
								'email_checked' => 1

						);
						// $this->debugMark(null, $data_to_store);

						// if the insert has returned true then we show the flash message
						if ($this->usuariosdao->update_usuario ( $id, $data_to_store ) == TRUE) {
							$data ['mens'] = 'Sua senha foi alterada com sucesso.';
						} else {
							$data ['mens'] = 'Ocorreu um problema, por favor entre em contato conosco.';
						}
						// redirect('recuperar_senha');
					}
				}
			}
		}

		$data ['main_content'] = 'portal/usuarios/recuperar_senha2';
		$this->load->view ( 'includes/portal_template', $data );
	}

	function emailTest() {

		echo !extension_loaded('openssl')?"Not Available":"Available";

		 $emailData = array (
		 'emailDestino' => "aspolavori@yahoo.com.br",
		 'nomeDestino' =>  "Anderson"
		 );

		$email = 'teste';

		//echo $email;

		$result = $this->send_email_SMTP ( "testelofy@gmail.com", "Elofy", null, null, 'Confirmar Email', $email, $emailData['emailDestino'], $emailData['nomeDestino'], true );

		return $result;
	}



	public function edit_usuario_logo_empresa() {

		header ( 'Content-type: application/json' );

		if ($this->input->server( 'REQUEST_METHOD') === 'POST') {
			if(isset($_FILES["imagem"])){
				$fileNameDoc = time().$_FILES["imagem"]["name"];
				$target_file_doc = UPLOAD. basename($fileNameDoc);
				$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
				$url_image = '';
				if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file_doc)) {
					$url_image = basename($fileNameDoc);
					$data = array(
						   'logo_empresa' => $url_image,
					   );
					$this->db->where('id_empresa', $this->input->post('id_empresa'));
					$this->db->update('ttl_empresa', $data);
					unlink(UPLOAD.$this->session->userdata('logo_empresa'));
					$this->session->set_userdata('logo_empresa',$url_image);
				}
			}else{
				$url_image = $this->session->userdata('logo_empresa');
			}
			$response	=	array('error'=>0,'path'=>base_url('assets/upload/'.$url_image));
		}else{
			$response	=	array('error'=>1,'path'=>'');
		}
		echo json_encode ( $response );
		die;
	}
}
