<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
class service extends App_controller {

	private static $itensTeams = array();

    public function __construct()
    {
        parent::__construct();
		// vai ser o modelo que tu vai acessar
        $this->load->model('servicedao');

    }

    // M�todo respons�vel por retornar as informa��es do usu�rio logado.
	public function getUserLoggedIn()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();

		$id_usuario       = $this->session->userdata('id');
		$id_empresa       = $this->session->userdata('id_empresa');
		$nome_empresa     = $this->session->userdata('nome_empresa');
        $empressa_detail  = $service->get_empressa_by_id($id_empresa);
        $my_carreer  = $empressa_detail['my_carreer'];
        $label_carreer  = $empressa_detail['label_carreer'];
        $individual = $empressa_detail['individual'];
        $team = $empressa_detail['team'];
        $shared = $empressa_detail['shared'];
        $label_individual = $empressa_detail['label_individual'];
        $label_team = $empressa_detail['label_team'];
        $label_shared = $empressa_detail['label_shared'];
        $elos  = $empressa_detail['elos'];
        $feedback  = $empressa_detail['feedback'];
        $okr  = $empressa_detail['okr'];
        $crossfeed  = $empressa_detail['crossfeed'];
        $activities  = $empressa_detail['activities'];
        $performance_pessoal  = $empressa_detail['performance_pessoal'];
        $ldap_enabled = $empressa_detail['ldap_enabled'];
        $nineBox1 = $empressa_detail['nineBox1'];
        $nineBox1desc = $empressa_detail['nineBox1desc'];
        $nineBox2 = $empressa_detail['nineBox2'];
        $nineBox2desc = $empressa_detail['nineBox2desc'];
        $nineBox3 = $empressa_detail['nineBox3'];
        $nineBox3desc = $empressa_detail['nineBox3desc'];
        $nineBox4 = $empressa_detail['nineBox4'];
        $nineBox4desc = $empressa_detail['nineBox4desc'];
        $nineBox5 = $empressa_detail['nineBox5'];
        $nineBox5desc = $empressa_detail['nineBox5desc'];
        $nineBox6 = $empressa_detail['nineBox6'];
        $nineBox6desc = $empressa_detail['nineBox6desc'];
        $nineBox7 = $empressa_detail['nineBox7'];
        $nineBox7desc = $empressa_detail['nineBox7desc'];
        $nineBox8 = $empressa_detail['nineBox8'];
        $nineBox8desc = $empressa_detail['nineBox8desc'];
        $nineBox9 = $empressa_detail['nineBox9'];
        $nineBox9desc = $empressa_detail['nineBox9desc'];
        $contrato_metas = $empressa_detail['contrato_metas'];
        $workflow = $empressa_detail['workflow'];
        $maf = $empressa_detail['maf'];

        // limite de elos trazido do seu time.
        $elosLimit = (int) $service->get_elos_limit_by_user_id($id_usuario);

        $elos_sent_today = (int) $service->get_elos_sent_count($id_usuario);
        
		$usuarioDetalhes = $service->get_users_details_by_id($id_usuario);
        $normal_user = $usuarioDetalhes[0]['normal_user'];
        $goal_register = $usuarioDetalhes[0]['goal_register'];
        $maintenance_user = $usuarioDetalhes[0]['maintenance_user'];
        $user_reviewer = $usuarioDetalhes[0]['user_reviewer'];
        $feed_admin = $usuarioDetalhes[0]['feed_admin'];
        $id_gestor = $usuarioDetalhes[0]['id_gestor'];

		$usuarioviewTime = $service->get_users_view_time_by_id($id_usuario);

		$nome = $usuarioDetalhes[0]['name'];
		$image = $usuarioDetalhes[0]['image'];
		$email_usuario = $usuarioDetalhes[0]['email'];
		$avaliador = $usuarioDetalhes[0]['appraiser'];
		$id_idioma = $usuarioDetalhes[0]['id_idioma'];
		$admin = $usuarioDetalhes[0]['admin'];
		$data_aniversario = $usuarioDetalhes[0]['birthday'];
		$data_desligamento = $usuarioDetalhes[0]['dismissal'];
		$descricao_bio = $usuarioDetalhes[0]['descricao_bio'];
		$nascimento = $usuarioDetalhes[0]['nascimento'];
		$classe = "objetivos";


		$favoritos = $service->get_objetos_favoritos($id_usuario, $classe);
		$favTemp = array();

		foreach($favoritos as $fav){
			$favTemp[] = $fav['favorites'];
		}

		$eventos = $service->get_feed_not_readed_by_id_usuario($id_usuario);

		$alerts = $service->get_alerts($id_usuario, $id_empresa);

		$out['id'] 				= 	$id_usuario;
		if(!empty($usuarioviewTime)){
			$out['usuarioviewTime'] = 	$usuarioviewTime[0];
		}
		if(!empty($image)){
			$orignal_image = 	base_url('assets/img') . '/'. $id_empresa .'/'.$image;
			$xs_image = 	base_url('assets/img') . '/'. $id_empresa .'/50/'.$image;
			$md_image = 	base_url('assets/img') . '/'. $id_empresa .'/150/'.$image;
			$md_image = $orignal_image;
		}else{
			$orignal_image = null;
			$xs_image = 	null;
			$md_image = 	null;
		}

		$time_cargo = $service->get_time_cargo_by_id($id_usuario);

		$out['name'] = $nome;
		$out['image'] = $orignal_image;
		$out['xs_image'] = $xs_image;
		$out['md_image'] = $md_image;
		$out['email'] = $email_usuario;
		$out['avaliador'] = $avaliador;
		$out['id_idioma'] = $id_idioma;
		$out['admin'] = $admin;
		$out['birthday'] = $data_aniversario;
		$out['dismissal'] = $data_desligamento;
		$out['normal_user'] = isset($normal_user)?$normal_user:'0';
		$out['goal_register'] = isset($goal_register)?$goal_register:'0';
		$out['maintenance_user'] = isset($maintenance_user)?$maintenance_user:'0';
		$out['user_reviewer'] = isset($user_reviewer)?$user_reviewer:'0';
		$out['feed_admin'] = isset($feed_admin)?$feed_admin:'0';
		$out['data_aniversario'] = $data_aniversario;
		$out['empresa'] = array('nome_empresa' => $nome_empresa,
                                'id_empresa' => $id_empresa,
                                'individual' => $individual,
                                'team' => $team,
                                'shared' => $shared,
                                'label_individual' => $label_individual,
                                'label_team' => $label_team,
                                'label_shared' => $label_shared,
                                'ldap_enabled' => $ldap_enabled,
                                'nineBox1' => $nineBox1,
                                'nineBox1desc' => $nineBox1desc,
                                'nineBox2' => $nineBox2,
                                'nineBox2desc' => $nineBox2desc,
                                'nineBox3' => $nineBox3,
                                'nineBox3desc' => $nineBox3desc,
                                'nineBox4' => $nineBox4,
                                'nineBox4desc' => $nineBox4desc,
                                'nineBox5' => $nineBox5,
                                'nineBox5desc' => $nineBox5desc,
                                'nineBox6' => $nineBox6,
                                'nineBox6desc' => $nineBox6desc,
                                'nineBox7' => $nineBox7,
                                'nineBox7desc' => $nineBox7desc,
                                'nineBox8' => $nineBox8,
                                'nineBox8desc' => $nineBox8desc,
                                'nineBox9' => $nineBox9,
                                'nineBox9desc' => $nineBox9desc,
                                'contrato_metas' => $contrato_metas,
                                'workflow' => $workflow,
                                'maf' => $maf
                                 );
		$out['favorites'] = (sizeof($favTemp) > 0 ? $favTemp : '' );
		$out['feed'] = (sizeof($eventos) > 0 ? $eventos : array());
		$out['alerts'] = (sizeof($alerts) > 0 ? $alerts: array());
		$out['elos_limit'] = isset($elosLimit)?$elosLimit:'0';
		$out['elos_sent_today'] = isset($elos_sent_today)?$elos_sent_today:'0';
		$out['my_carreer'] = $my_carreer;
		$out['label_carreer'] = $label_carreer;
		$out['elos'] = $elos;
		$out['feedback'] = $feedback;
		$out['okr'] = $okr;
		$out['crossfeed'] = $crossfeed;
		$out['id_gestor'] = $id_gestor;
		$out['profile_logo'] = $empressa_detail['profile_logo'];
		$out['activities'] = $activities;
		$out['performance_pessoal'] = $performance_pessoal;
		$out['gestor'] = $this->session->userdata('gestor');
		$out['email_google'] 	= $usuarioDetalhes[0]['email_google'];
		$out['email_linkedin'] 	= $usuarioDetalhes[0]['email_linkedin'];
		$out['email_slack'] 	= $usuarioDetalhes[0]['email_slack'];
	//	$out['email_outlook'] 	= $usuarioDetalhes[0]['email_outlook'];
		$out['access_delete_direcionar'] 	= $usuarioDetalhes[0]['access_delete_direcionar'];
		$out['descricao_bio'] = $descricao_bio;
		$out['nascimento'] = $nascimento;
		$out['nome_time'] = $time_cargo[0]['nome_time'];
		$out['nome_cargo'] = $time_cargo[0]['nome_cargo'];
		$this->session->unset_userdata('email_google');	
		$this->session->unset_userdata('email_linkedin');
		$this->session->unset_userdata('email_slack');
	//	$this->session->unset_userdata('email_outlook');
		if($usuarioDetalhes[0]['email_google'] != ''){
			$this->session->set_userdata('email_google',$usuarioDetalhes[0]['email_google']);
		}else{
			$this->session->unset_userdata('email_google');	
		}
		if($usuarioDetalhes[0]['email_linkedin'] != null){
			$this->session->set_userdata('email_linkedin',$usuarioDetalhes[0]['email_linkedin']);
		}else{
			$this->session->unset_userdata('email_linkedin');	
		}
		
		if($usuarioDetalhes[0]['email_slack'] != null){
			$this->session->set_userdata('email_slack',$usuarioDetalhes[0]['email_slack']);
		}else{
			$this->session->unset_userdata('email_slack');	
		}

	//	if($usuarioDetalhes[0]['email_outlook'] != null){
	//		$this->session->set_userdata('email_outlook',$usuarioDetalhes[0]['email_outlook']);
	//	}else{
	//		$this->session->unset_userdata('email_outlook');	
	//	}
		
		echo $this->getEncryptJson($out);

		 // echo json_encode($out);
		exit;

    }

    function getEncryptJson($val) {
    	$this->load->library("encryption");

		$nonceValue = 'elofy_nonce';
		$json = json_encode($val);
		$encryptedJson = $this->encryption->encrypt($json, $nonceValue);

		$returnVal = array();
		$returnVal['response'] = $encryptedJson;
		$returnVal['json_length'] = strlen($json);

		return json_encode($returnVal);
    }

	function getmyteammembers(){
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$id_usuario = $this->session->userdata('id');
		$this->load->model('servicedao');
		$service = new servicedao();

		$usuarios = $service->get_user_team_members_profile($id_usuario);
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
		echo json_encode($usuarios);
		exit;
	}

	public function getAffordableTeams()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id');
    	$user_id = isset($_GET['user_id'])?$_GET['user_id']:null;
        $onlyActives = isset($_GET['onlyActives'])?$_GET['onlyActives']:false;

    	$result = $service->get_affordable_teams_by_id($id_empresa,$id_usuario,$user_id, $onlyActives);
    	$out = $result;

    	echo json_encode($out);
    	exit();
    }

    public function getAffordableUsers()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$user_id = isset($_GET['user_id'])?$_GET['user_id']:null;

    	$result = $service->get_affordable_users_by_id($id_empresa,$user_id);
    	$out = $result;

    	echo json_encode($out);
    	exit();
    }
	
	function getAdminusuariosTime(){
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$this->load->model('servicedao');
		$service = new servicedao();

		$usuarios = $service->get_admin_usuarios_time($id_empresa);
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
		echo json_encode($usuarios);
		exit;
	}

	function getNonadminusuariosTime(){
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$this->load->model('servicedao');
		$service = new servicedao();

		$usuarios = $service->get_admin_usuarios_time($id_empresa);
		// $usuarios = $service->get_user_team_members_profile($id_usuario);
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

		echo json_encode($usuarios);
		exit;
	}

	function getCycleReviewTime(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$service 	= new servicedao();
        $usuarios 	= $service->get_cycle_review_time($id_empresa,$id_usuario);
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
        echo json_encode($usuarios);
        exit;
    }

	public function getUserGoalsProfile()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$service 	= 	new servicedao();
    	$result 	= 	array();
	
		$id_usuario = 	$this->session->userdata('userid');
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$id_ciclo 	= 	$this->session->userdata('id_ciclo');

		$result 	= 	$service->get_user_goals( $id_empresa, $id_usuario, $id_ciclo);
    	echo json_encode($result);
    }

    function getAvalicaoDetailsById(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$id_usuario = $this->input->post('user_id');
		$year = $this->input->post('year');
		$id_ciclo = $this->input->post('cycle');

		$result = $service->get_goals_by_id_and_ciclo( $id_empresa, $id_usuario, $id_ciclo);
    	echo json_encode($result);
	}
    function getProfileGoalDetailById(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$goal_id = $this->input->post('goal_id');
    	$id_usuario = $this->input->post('user_id');
    	$id_ciclo = $this->input->post('cycle');

		$result = $service->get_profile_goal_detail_by_id( $goal_id,$id_usuario,$id_ciclo);
    	echo json_encode($result);
	}
    function getAvalicaoDetailDetailById(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out 			= 	array();
    	$service 		= 	new servicedao();
    	$result 		= 	array();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->input->post('user_id');
    	$id_ciclo 		= 	$this->input->post('cycle');
    	$avalicao_id 	= 	$this->input->post('avalicao_id');
		$this->session->set_userdata('userid',$id_usuario);
		$this->session->set_userdata('id_ciclo',$id_ciclo);
		$this->session->set_userdata('id_protocolo_avaliacao',$avalicao_id);
		$result = $service->get_avaliacao_details_by_id($id_usuario,$id_ciclo);
    	echo json_encode($result);
	}

    function getLastEvaluations(){
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$id_usuario = $this->input->get('id_usuario');
		$this->load->model('servicedao');
		$service = new servicedao();

		$usuarios = $service->get_last_evaluations($id_usuario);

		echo json_encode($usuarios);
		exit;
	}

//update reopenid
	function reOpenResult()
	{
		// $data = $this->input->post('data');
		// $data = json_decode($data);
		$idrc = $this->input->post('idrc');
		$idua = $this->input->post('idua');

		$this->load->model('servicedao');
		$service = new servicedao();

		$reopenData = $service->get_reopen_data($idrc, $idua);
		echo json_encode($reopenData);
		return;
	}

	function saveReopenData()
	{
		$data = $this->input->post('data');
		$data = json_decode($data);
		$type = $this->input->post('type');
		
		$this->load->model('servicedao');
		$service = new servicedao();

		$service->save_reopen_data($data, $type);

		return;
	}

	//generate pdf
	function getPdfHtml($idua, $idrc)
	{
	
	}

	function getPdfContent($idua, $idrc)
	{
		$id_em	=	$this->session->userdata('id_empresa');
		$userID	=	$this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$queryFooter = $service->get_footer_image($id_em);
		$query1 = $service->get_result_q1($userID);
		$query2 = $service->get_result_q2($idua, $idrc);
		$query3 = $service->get_result_q3($idua, $idrc,$id_em);
		$query7 = $service->get_result_q7($idua, $idrc,$id_em);

		$header = '<html><head>
					    <title>Relatório de Desempenho Individual</title>
					    <link href="'.base_url().'assets/portal/css/pdfstyle.css" rel="stylesheet" type="text/css">
					    <link rel="stylesheet" href="'.base_url().'assets/portal/pdf/bootstrap.min.css" rel="stylesheet" />
					    <style type="text/css">
								.quebrapagina {
								   page-break-before: always;
								}
</style>
					</head><body>';
		$footer = '</body></html>';

		$logo_empresa = $query1["logo_empresa"];
		$logo_footer = $queryFooter["url_image_footer"];
		$customer_data = $query2;
		$header_data = $query7;		

		$htmlOutput = '<header>
			                <div class="banner">
			                    <img src="'.base_url().'assets/upload/'.$logo_empresa.'"/>
			                    <div style="float:left; padding-top:8px;"><span style="font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relatório de Desempenho Individual</span></div>
			                </div>
				        </header>

				        <footer>
							<div class="footer">
			                    <center><img src="'.base_url().'assets/upload/'.$logo_footer.'"/></center>
			                </div>
				        </footer>';

		$htmlOutput .= '<main><section class="container">
							<div class="row margin-top-40">
		';

		if (count($header_data) > 0){
			$originDateFrom = $header_data["0"]["data_inicio"];
			$changedDateFrom = date("d/m/Y", strtotime($header_data["0"]["data_inicio"]));
			$originDateTo = $header_data["0"]["data_fim"];
			$changedDateTo = date("d/m/Y", strtotime($header_data["0"]["data_fim"]));
			$htmlOutput .= '<div class="col-md-12 margin-bottom-20 no_padding">
			                <div class="title">
			                    <p class="title_name margin-bottom-5"><b>Colaborador:  </b>'.$header_data["0"]["nome"].'</b></p>
								<p class="sub_name"><b>Conceito:&nbsp;&nbsp;&nbsp;'.$header_data["0"]["media_final"].' </b></p>	
								<p class="sub_name"><b>Cargo:&nbsp;&nbsp;&nbsp;</b>'.$header_data["0"]["cargo"].'</b></p>
			                    <p class="sub_name"><b>Gestor:&nbsp;&nbsp;&nbsp;</b>'.$header_data["0"]["gestor"].'</p>
			                    <p class="sub_name"><b>Período de Avaliação:&nbsp;&nbsp;&nbsp;</b>'.$changedDateFrom.'&nbsp;a&nbsp;'.$changedDateTo.'</p>
			                </div></div>';

			$htmlOutput .= '<div class="col-md-12 no_padding">';

		}



		if ( count($customer_data) > 0) {
			$idcpt = $customer_data["0"]["id_competencia"];
			

// loop start
			$nome_categoria = $customer_data["0"]["nome_categoria"]; $i = 0;
			$htmlOutputCompetencia = '<p class="tb_title margin-top-20 border-bottom-8">'.$nome_categoria.'</p>';

			foreach($customer_data as $row)
			{
				if ($nome_categoria != $row["nome_categoria"]) 
				{
					$nome_categoria = $row["nome_categoria"];
					$htmlOutputCompetencia .= '</div><div class="col-md-12 no_padding">';
					$htmlOutputCompetencia .= '<p class="tb_title margin-top-20 border-bottom-8">'.$nome_categoria.'</p>'; 
				}

				$htmlOutputCompetencia .= '<div class="row margin-top-5">';
				$htmlOutputCompetencia .= '<div style="float:left; padding-left:15px;"><p class="sub_name"><b>Ítem Avaliado:</b>'.$row["nome_competencia"].'</p></div>';
				$htmlOutputCompetencia .= '</div>';
				
				
				$htmlOutputCompetencia .= '<div class="row margin-top-5">';
				$htmlOutputCompetencia .= '<div style="float:left; padding-left:15px;"><p class="sub_name"><b>Conceito: </b>'.$row["score"].'</p></div>';
				$htmlOutputCompetencia .= '</div>';
				if ($row["descricao"]!= null){	
				$htmlOutputCompetencia .= '<div>
								<p class="sub_name"><b>Descrição: </b>'.$row["descricao"].'</p></div>';
				
				$htmlOutputCompetencia .= '<div class="border-bottom-4 margin-bottom-10">';
			}
				$query4 = $service->get_result_q4($idua, $idrc,$row["id_competencia"]);				
				if (count($query4)) {
					foreach ($query4 as $row1)
					{
						$htmlOutputCompetencia .= '<div>						
						<p class="sub_name"><b>Tipo Comentário:  </b>'.$row1["tipo"].'</b></p>
						<p class="sub_name"><b>Conceito:&nbsp;&nbsp;&nbsp;'.$row1["conceito"].' </b></p>';
						if($row1["descricao"] != null){	
						$htmlOutputCompetencia .= '<p class="sub_name"><b>Descrição: 	 </b>'.$row1["descricao"].'</p>';
					}
						$htmlOutputCompetencia .= '</div>';
					}
    			}
	
				$query5 = $service->get_result_q5($idua, $idrc,$row["id_competencia"],3);
				if (count($query5) > 0) {
					if($query5["0"]["id_competencia"] != null ){
					$htmlOutputCompetencia .= '<div>					
							<p class="sub_name"><b>Avaliação pelos Pares:&nbsp;&nbsp;&nbsp;</b>'.$query5["0"]["final"].'</b></p></div>';	
					if (count($query5) >0) {
						foreach ($query5 as $row)
						{
							
							$htmlOutputCompetencia .= '<div>						
							<p class="sub_name"><b>Descrição: 	 </b>'.$row["descricao"].'</p></div>';
						}
					}	
				}		
			}
				$query6 = $service->get_result_q5($idua, $idrc,$row["id_competencia"],4);
				if (count($query6) > 0 ) {
					if($query5["0"]["id_competencia"] != null ){
						$htmlOutputCompetencia .= '<div>					
						<p class="sub_name"><b>Avaliação pela Equipe:&nbsp;&nbsp;&nbsp;</b>'.$query6["0"]["final"].'</b></p></div>';	
					foreach ($query6 as $row2)
					{
						
						$htmlOutputCompetencia .= '<div>						
						<p class="sub_name"><b>Descrição: 	 </b>'.$row2["descricao"].'</p></div>';
					}
				}	
}
				$htmlOutputCompetencia .= '</div>';    			
			}
			$htmlOutputCompetencia .= '</div>';
		}

		
		
										
		if (count($query3)) {
				foreach ($query3 as $row1) {
					$id_pergunta = $row1["id_pergunta"];
					$htmlOutputPerguntas .= '<div class="row margin-top-5">';
					$htmlOutputPerguntas .= '<div style="float:left; padding-left:15px;"><p class="tb_title margin-top-40"><b>Ítem Avaliado:</b>'.$row1["pergunta"].'</p></div>';
					$htmlOutputPerguntas .= '</div>';
					$query4 = $service->get_result_q3($idua, $idrc,$id_em,$id_pergunta);
						foreach ($query4 as $row2)
						{
							if ($row2["tipopergunta"] != null and $row2["tipopergunta"] == 'q' ){
							$htmlOutputPerguntas .='<div class="col-md-12 border-bottom-last no_padding">
						                 <p class="sub_name">'.$row2["tipo"].'</p>
						                <p class="description">'.$row2["resposta"].'</p>
						            </div>';
						    } else {

						    $htmlOutputPerguntas .='<div class="col-md-12 border-bottom-last no_padding">
						                 <p class="tb_title margin-top-40">'.$row2["tipo"].'</p>
						              	<p class="sub_name"><b>Conceito:'.$row2["conceito"].' </b></p>
						                <p class="description">'.$row2["resposta"].'</p>
						            </div>';		

						    }        
						}
			}
		}
		

	


		$htmlOutputFinal .='<div class="col-md-12 no_padding">
			                <p class="tb_title margin-top-10">Data:</p>
			            </div>';

		$nome = "";
		$gestor = "";
		if (count($header_data) > 0) {
			$nome = $header_data["0"]["nome"];
			$gestor = $header_data["0"]["gestor"];
		}
		$htmlOutputFinal= '<div class="col-md-12 no_padding margin-top-100">
			                <div class="row no_margin">
			                    <div class="no_padding" style="border-top: 2px solid black; width:35%; float:left">
			                        <p class="p_center" style="font-size:14px;">'.$nome.'</p>
			                    </div>
			                    <div class="no_padding" style="border-top: 2px solid black; width:35%; float:right">
			                        <p class="p_center" style="font-size:14px;">'.$gestor.'</p>
			                    </div>
			                </div>
			            </div>
		';

		$htmlOutputFinal .= '</div></section></main>';
		if ($id_em == 83){
			$html = $header.$htmlOutput.$htmlOutputPerguntas.$htmlOutputCompetencia.$htmlOutputFinal.$footer;	
		} else {
			$html = $header.$htmlOutput.$htmlOutputCompetencia.$htmlOutputPerguntas.$htmlOutputFinal.$footer;
		}	
		
		return $html;

	}

	public function pdfGen($data) {
		$pdfData = rawurldecode($data);
		$pdfData = json_decode($pdfData);
		$idua = $pdfData->id_usuario_avaliado;
		$idrc = $pdfData->id_revisao_ciclo;
        $html = $this->getPdfHtml($idua, $idrc);
		$this->generatePDF($html);
	}

	public function generatePDF($html) 
	{
		$this->load->library("gen");
        // $this->gen->loadHtml($html);
        // $this->gen->set_paper("A4", "portrait");
        // $this->gen->render();
        // log_message('error', '----------pdf generate error!-------');
        // $this->gen->stream("relatório performance.pdf", array("Attachment" => 0));
        $this->gen->generate($html, "relatório performance");
	}

	public function generateResultPDF() {
		$idua = $this->input->post('id_usuario_avaliado');
    	$idrc = $this->input->post('id_revisao_ciclo');
		// $html = $this->getPdfHtml($idua, $idrc);
		$html = $this->getPdfContent($idua, $idrc);
		// echo $html;
		$this->generatePDF($html);
	}

    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
    public function getGlobalGoals()
    {
    	// header obrigatorio
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$goals = $service->get_global_goals($this->session->userdata('id'));

    	$retorno = array();

    	if($goals != null){

	    	foreach ($goals as $value) {

			    $user = $service->get_data_resp($value['responsavel']);
			    array_pop($value);
			    $value['user'] = $user;
			    array_push($retorno, $value);
			}

    	}

    	echo json_encode($retorno);

    }

    // Retorna os Objetivos taticos de um usuário
    public function getTaticsGoals()
    {
    	// header obrigatorio
    	header('Content-type: application/json');
    	$this->get_acesso_user( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$id_usuario = $this->session->userdata('id');


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );
    	}else{

    	}


    	$goals = $service->get_tatics_goals($id_usuario);

    	//$this->debugMark('teste', $goals);

    	$retorno = array();

    	if($goals != null){

    		$i = 0;
	    	foreach ($goals as $value) {

			    $user = $service->get_data_resp($value['responsavel']);
			    $goals[$i]['user'] = $user[0];
			    $i++;
			}

    	}

    	echo json_encode($goals);
    	exit;
    }

    // GET KEYS DETAILS  GET DETALHES DAS RCHAVE
    public function getDatailsKeyById()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$id = $this->input->post('id');
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$global = $service->get_datails_key_by_id($id);
		
		
    	echo json_encode($global[0]);
    	exit;

    }
	
    public function updateAllKeyResultsDaily()
    {
    	$this->load->model('servicedao');
    	$service 		= 	new servicedao();
    	$key_results 	= 	$service->get_all_key_results_daily();
		
    	if(!empty($key_results)){
    		foreach ($key_results as $keyresult) {
				$service->run_sql_command($keyresult);
    		}
    	}
    	return true;
    }
	
	public function updateAllKeyResultsWeekly()
    {
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$key_results = $service->get_all_key_results_weekly();
		
    	if(!empty($key_results)){
    		foreach ($key_results as $keyresult) {
				$service->run_sql_command($keyresult);
    		}
    	}
    	return true;
    }
	
	public function updateAllKeyResultsMonthly()
    {
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$key_results = $service->get_all_key_results_monthly();
		
    	if(!empty($key_results)){
    		foreach ($key_results as $keyresult) {
				$service->run_sql_command($keyresult);
    		}
    	}
    	return true;
    }
	
    public function updateRchaveDetails()
	{
		header('Content-type: application/json');

		$data = $this->input->post();

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->update_rchave_detail_by_id($data);
		echo json_encode($result);
	}

	public function getGlobalsCycles()
	{
		header('Content-type: application/json');

		$id_empresa = $this->session->userdata('id_empresa');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->get_gloabls_cycles($id_empresa);
		echo json_encode($result);
	}

    //M�todo repons�vel por retornadas os objetivos globais por ano.
    public function getGlobalGoalsYear()
    {
    	// header obrigatorio
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);
		$id_usuario = $this->session->userdata('id');

    	$year = $this->input->post('year');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$goals = $service->get_global_goals_year($this->session->userdata('id'), $year);
    	$retorno = array();
    	if($goals != null){

    		foreach ($goals as $value) {
    			$allactivities	= array();
				$allkey_results	= array();
    			$user = $service->get_data_resp($value['responsavel']);
    			$type='parent';
    			if ($value['estrategico'] == '1') {
    				$type = 'child';
    			}
    			$tatics = $service->get_objetivos_tatico_by_id_objetivo($value['id'],$id_usuario, $type);
    			$tags = $service->get_all_tags_limit($value['id']);
    			$estrategico = $value['estrategico'];

    			if(!empty($tatics)){
					foreach($tatics as $tatic){
						$key_results = $service->get_rchave_by_objetivo_tatico($tatic['id']);
						if(!empty($key_results)){
							foreach($key_results as $index=>$key){
								$key_results[$index]['objetivo']=	array('title'=>$tatic['title'],'percentage'=>$tatic['percentage']);
								$activities 	= 	$service->get_details_activities_r_key($key['id']);
								if(!empty($activities)){
									foreach($activities as $index2=>$activity){
										$activities[$index2]['objetivo']=	array('title'=>$tatic['title'],'percentage'=>$tatic['percentage']);
										$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
									}
									$allactivities	=	array_merge($allactivities, $activities);
								}
							}
							$allkey_results	=	array_merge($allkey_results, $key_results);
						}
					}
				} else {
					$key_results = $service->get_rchave_by_objetivo_tatico($value['id']);
					if(!empty($key_results)){
						foreach($key_results as $index=>$key){
							$key_results[$index]['objetivo']=	array('title'=>$value['title'],'percentage'=>$value['percentage']);
							$activities 	= 	$service->get_details_activities_r_key($key['id']);
							if(!empty($activities)){
								foreach($activities as $index2=>$activity){
									$activities[$index2]['objetivo']=	array('title'=>$value['title'],'percentage'=>$value['percentage']);
									$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
								}
								$allactivities	=	array_merge($allactivities, $activities);
							}
						}
						$allkey_results	=	array_merge($allkey_results, $key_results);
					}
				}
    			array_pop($value);
    			$value['user'] 			= isset($user[0])?$user[0]:[];
    			$value['tatics'] 		= $tatics;
    			$value['keys'] 			= $allkey_results;
    			$value['activities'] 	= $allactivities;
    			$value['tags'] 			= $tags;
    			$value['estrategico'] 	= $estrategico;
    			array_push($retorno, $value);
    		}
    	}
    	echo json_encode($retorno);
	}

    public function getGlobalGoalsYearObjetivoPessoal()
    {
    	// header obrigatorio
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');

    	$year = $this->input->post('year');
    	$type = $this->input->post('type');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$goals = $service->get_global_goals_year_objetivo_pessoal($this->session->userdata('id'),$id_empresa, $year,$type);
    	echo json_encode($goals);
    }

    
    // Metodo coleta todos os times de uma empresa
     public function getGlobalParentGoalsYear(){

        header('Content-type: application/json');
        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $service 	= 	new servicedao();

        $id_usuario = 	$this->session->userdata('id');
        $id_empresa = 	$this->session->userdata('id_empresa');

        $year 		= 	$this->input->post('year');
        $goal_id 	= 	$this->input->post('goal_id');
		
		$parents	=	array();
        $result 	= 	$this->getAllParentGoalsTreeRecursive($goal_id, $parents);
        echo json_encode($result);
    }

    // Metodo coleta todos os times de uma empresa
    private function getAllParentGoalsTreeRecursive($goal_id, $parents=array()){

        $this->load->model('servicedao');
        $service = new servicedao();
		$global = $service->get_goal_details_by_id($goal_id);
		
		if(isset($global[0]['parent_id']) && $global[0]['parent_id']!=NULL){
			$parent 	= 	$service->get_goal_details_by_id($global[0]['parent_id']);
			$parents[]	=	$parent[0];
			if(isset($parent[0]['parent_id']) && $parent[0]['parent_id']	!=	NULL){
				return $this->getAllParentGoalsTreeRecursive($parent[0]['parent_id'], $parents);
			}
		}
        return $parents;

    }
    public function getGlobalChildGoalsYear()
    { 
        
        // header obrigatorio
        header('Content-type: application/json');
        $this->get_acesso_user(true);
        $id_usuario = $this->session->userdata('id');
        $id_empresa = $this->session->userdata('id_empresa');

        $year = $this->input->post('year');
        $goal_id = $this->input->post('goal_id');

        $this->load->model('servicedao');
        $service 	= 	new servicedao();
        $result 	= 	$service->get_child_goals_by_goal_id($goal_id);
        echo json_encode($result);
    }



    // ADS METODO
    public function addObjetivoFavorito()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$classe = 'objetivos';

    	$id_usuario = $this->session->userdata('id');
    	$id_objeto = $this->input->post('id');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$goals = $service->add_favorito_usuarios($id_usuario, $id_objeto, $classe);

    	$favoritos = $service->get_objetos_favoritos($id_usuario, $classe);

    	$favTemp = array();

    	foreach($favoritos as $fav){
    		$favTemp[] = $fav['favorites'];
    	}

    	$out['favorites'] = (sizeof($favTemp) > 0 ? $favTemp : '' );

    	if($goals){
    		$out ['error'] = false;
    		$out ['error_message'] = '';
    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Ocorreu um erro ao tentar favoritar o Objetivo. Por favor tente mais tarde.';
    	}

    	echo json_encode($out);
    }

    //ADS METODO
    public function removeObjetivoFavorito()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$classe = 'objetivos';

    	$id_usuario = $this->session->userdata('id');
    	$id_objeto = $this->input->post('id');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$goals = $service->remove_favorito_usuarios($id_usuario, $id_objeto, $classe);

    	$favoritos = $service->get_objetos_favoritos($id_usuario, $classe);

    	$favTemp = array();

    	foreach($favoritos as $fav){
    		$favTemp[] = $fav['favorites'];
    	}

    	$out['favorites'] = (sizeof($favTemp) > 0 ? $favTemp : '' );

    	if($goals == true || $goals == null){
    		$out ['error'] = false;
    		$out ['error_message'] = '';

    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Ocorreu um erro ao tentar desfavoritar o Objetivo. Por favor tente mais tarde.';
    	}
    	echo json_encode($out);
    }

    // ADD METODO
    public function addObjetivoGlobal()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
		
		$this->load->model('servicedao');
		$service = new servicedao();
		$year = $this->input->post('year');
		
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

	    	$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
	    	//$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
	    	$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );

	    	if ($this->form_validation->run ()) {
	    		$tags = explode( ",", $this->input->post('tags'));
	    		$teams = $this->input->post('teams');
	    		$responsaveis = $this->input->post('responsibles');
	    		$year = $this->input->post('year');

	    		$data_to_store = array (
	    				'nome' => $this->input->post('name'),
	    				'parent_id' =>null,
	    				'descricao' => $this->input->post('description'),
	    				'id_empresa' => $this->session->userdata('id_empresa'),
	    				'responsavel' => $this->input->post('user'),
	    				'usuario_atualizador' => $this->session->userdata('id'),
	    				'usuario' => $this->session->userdata('id'),
	    				'ativo' => 1,
	    				'tags' => $tags,
	    				'teams' => $teams,
	    				'year' => $year,
	    				'responsaveis' => $responsaveis,
	    				'parent_id' => null
	    		);
				
	    		$this->load->model('chatdao');
	    		$chat = new chatdao();

	    		$id_objetivo = $service->add_globals_labels( $data_to_store );
	    		unset($data_to_store['parent_id']);
	    		if ( $id_objetivo) {
	    			$data_to_store['tipo'] = 0;
	    			$data_to_store['id_objetivo']  = $id_objetivo;

	    			if($chat->addCanal($data_to_store) == TRUE){
	    				$out ['error'] = false;
	    				$out ['error_message'] = '';
	    			}else{
	    				$out ['error'] = true;
	    				$out ['error_message'] = 'O Objetivo foi criado corretamente, mas ocorreu erro na criação do Canal.';
	    			}

	    		} else {
	    			$out ['error'] = true;
	    			$out ['error_message'] = 'Erro ao Cadastrar Global';
	    		}

	    	}else{
	    		$out['error'] = true;
	    		$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
	    	}

    	}

		$goals = $service->get_global_goals_year($this->session->userdata('id'), $year);

    	if($goals != null){

            $out['globals'] = array();

    		foreach ($goals as $value) {

    			$user = $service->get_data_resp($value['responsavel']);
    			array_pop($value);
    			$value['user'] = $user['0'];
    			array_push($out['globals'], $value);
    		}
    	}
	   echo json_encode($out);
    }


    // Metodo responsável por coletar todos os usuários de ativos e inativos de uma empresa
    public function getAllUserForCompany()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');

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

    	echo json_encode($user_data);
    }

    // Metodo responsável por coletar todos os usuários de ativos e inativos de uma empresa
    public function getAllUserForCompanyActive()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');

    	$userForCompany = $service->get_all_user_for_by_id_company_active($id_empresa);
    	if(!empty($userForCompany)){
				foreach($userForCompany as $index=>$usercompany){
					$userForCompany[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$userForCompany[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
						$userForCompany[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
						$userForCompany[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
					}else{
						$userForCompany[$index]['image'] 	= 	null;
						$userForCompany[$index]['xs_image'] = 	null;
						$userForCompany[$index]['md_image'] = 	null;
					}
				}
			}
    	echo json_encode($userForCompany);
    }
	public function getAllUserFromCompanyByTypeOrLevel()
	    {
	    	header('Content-type: application/json');

	    	$this->get_acesso_user ( true );

	    	$this->load->model('servicedao');
	    	$service = new servicedao();
	    	$id_empresa = $this->session->userdata('id_empresa');
	    	$type = $this->input->get('type');
	    	$level = $this->input->get('level');
	    	$type = (!is_null($type) && $type != '')?$type:null;
	    	$level = (!is_null($level) && $level != '')?$level:null;

	    	$userForCompany = $service->get_all_user_from_company_by_type_or_level($id_empresa, $type, $level);
	    	echo json_encode($userForCompany);
	    }

    public function getGestors()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');

    	$gestorForCompany = $service->get_all_gestor_for_by_id_company_active($id_empresa);
    	if(!empty($gestorForCompany)){
				foreach($gestorForCompany as $index=>$usercompany){
					$gestorForCompany[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$gestorForCompany[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
						$gestorForCompany[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
						$gestorForCompany[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
					}else{
						$gestorForCompany[$index]['image'] 	= 	null;
						$gestorForCompany[$index]['xs_image'] = 	null;
						$gestorForCompany[$index]['md_image'] = 	null;
					}
				}
			}
    	echo json_encode($gestorForCompany);
    }

	public function dismissAcivitiesProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');

		$id = 	$this->input->post('id');

		$service = new servicedao();

		$details = $service->dismiss_activity_by_id($id);

		echo json_encode($details);

	}

    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
    public function getSearchTags()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$goals = $service->get_search_tags($this->session->userdata('id'));

    	$retorno = array();

    	if($goals != null){

    		foreach ($goals as $value) {

    			$user = $service->get_data_resp($value['responsavel']);
    			array_pop($value);
    			$value['user'] = $user;
    			array_push($retorno, $value);
    		}

    	}

    	echo json_encode($retorno);

    }

    public function getDetailsUserById()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
		$id_empresa = $this->session->userdata('id_empresa');
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id = $this->input->get('user_id');
    	$users = $service->get_users_details_by_id($id);
		if(!empty($users[0]['image'])){
			$image 	  = base_url('assets/img') . '/'. $id_empresa .'/'.$users[0]['image'];
			$xs_image = base_url('assets/img') . '/'. $id_empresa .'/50/'.$users[0]['image'];
			$md_image = base_url('assets/img') . '/'. $id_empresa .'/150/'.$users[0]['image'];
			$users[0]['image'] 	  = $image;
			$users[0]['xs_image'] = $xs_image;
			$users[0]['md_image'] = $md_image;
		}else{
			$users[0]['image'] 	= null;
			$users[0]['xs_image'] = null;
			$users[0]['md_image'] = null;
		}
		$users[0]['birthday'] = ($users[0]['birthday'] != null ) ? $users[0]['birthday'] : "";
		$users[0]['dismissal'] = ($users[0]['dismissal'] != null ) ? $users[0]['dismissal'] : "";
		
    	echo json_encode($users[0]);

    }
    public function getDetailsUserByIds()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
		$id_empresa = 	$this->session->userdata('id_empresa');
    	$service 	= 	new servicedao();
		$ids 		= 	0;
		if(!empty($this->input->post('ids'))){
			$ids 		= 	array_reverse($this->input->post('ids'));
		}
    	$users 		= 	$service->get_users_details_by_ids($ids);
    	$records	=	array();
		if(!empty($users)){
			foreach($users as $user){
				if($user['image'] != ""){
					$image 	  = base_url('assets/img') . '/'. $id_empresa .'/'.$user['image'];
					$xs_image = base_url('assets/img') . '/'. $id_empresa .'/50/'.$user['image'];
					$md_image = base_url('assets/img') . '/'. $id_empresa .'/150/'.$user['image'];
					$user['image'] 	  = $image;
					$user['xs_image'] = $xs_image;
					$user['md_image'] = $md_image;
				}else{
					$user['image'] 	= null;
					$user['xs_image'] = null;
					$user['md_image'] = null;
				}
				$user['birthday'] 	= 	($user['birthday'] != null ) ? $user['birthday'] : "";
				$user['dismissal'] 	= 	($user['dismissal'] != null ) ? $user['dismissal'] : "";
				
				$records[]			=	$user;
			}
		}
    	echo json_encode($records);

    }

    public function getUsersDetails()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$users = $service->get_users_details();

    	echo json_encode($users);

    }


    //M�todo respons�vel por retornar dados do ciclo por ano.
    public function getDataCycle()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$year = $this->input->post('year');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_data_cycle($year);

    	echo json_encode($cycle);

    }

	 public function getRevisionCycleByCompany()
	    {
	    	// header obrigatorio
	    	header('Content-type: application/json');

	    	$this->get_acesso_user ( true );

	    	$idCompany = $this->session->userdata('id_empresa');

	    	$this->load->model('servicedao');
	    	$service = new servicedao();

	    	$cycles = $service->get_cycles_by_company($idCompany);

	    	echo json_encode($cycles);

	    }

    public function getCycleByIdObjetivo()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_objetivo = $this->input->post('id');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_cycles_by_id_objetivo($id_objetivo);
    	//$this->debugMark($id_objetivo, $cycle);

    	echo json_encode($cycle);

    }

    public function getCycleByYear()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$year = $this->input->post('year');
    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_cycles_by_year($id_empresa, $year);
    	//$this->debugMark($id_objetivo, $cycle);

    	echo json_encode($cycle);

    }
    public function getCyclePeriod()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_cycle_period($id_empresa);
    	//$this->debugMark($id_objetivo, $cycle);

    	echo json_encode($cycle);

    }

	public function getModifyCycleDetail()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$id_ciclo 	= $this->input->post('id_ciclo');
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_modify_cycle_detail($id_ciclo);
    	//$this->debugMark($id_objetivo, $cycle);

    	echo json_encode($cycle);

    }

    public function insertCiclo()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
		
		$inicio = strtotime($this->input->post('inicio_vigencia'));
		$fim = strtotime($this->input->post('fim_vigencia'));
    	$data_to_store = array (
				'id_janela' => $this->input->post('id_janela'),
				'nome_ciclo' => $this->input->post('nome_ciclo'),
				'inicio_vigencia' => date('Y-m-d',$inicio),
				'fim_vigencia' => date('Y-m-d',$fim),
				'metologia' => $this->input->post('metologia'),
				'replicar_indicadores' => $this->input->post('replicar_indicadores'),
				'aberto' => $this->input->post('aberto'),
				'ativo' => 1
		);
		$replicas = json_decode($this->input->post('replicas'));

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_ciclo = $service->add_ciclo( $data_to_store, $replicas);
		echo $id_ciclo;
    }

    public function editCiclo()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
		
		$inicio = strtotime($this->input->post('inicio_vigencia'));
		$fim = strtotime($this->input->post('fim_vigencia'));
		$id_ciclo = $this->input->post('id_ciclo');
    	$data_to_store = array (
				'id_janela' => $this->input->post('id_janela'),
				'nome_ciclo' => $this->input->post('nome_ciclo'),
				'inicio_vigencia' => date('Y-m-d',$inicio),
				'fim_vigencia' => date('Y-m-d',$fim),
				'metologia' => $this->input->post('metologia'),
				'replicar_indicadores' => $this->input->post('replicar_indicadores'),
				'aberto' => $this->input->post('aberto'),
				'ativo' => 1
		);
    	$replicas = json_decode($this->input->post('replicas'));

		$this->load->model('servicedao');
		$service = new servicedao();
		$result = $service->edit_ciclo($data_to_store, $id_ciclo, $replicas);
		echo $result;
    }

    public function getCycleByYearId()
    {
    	// header obrigatorio
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$id_janela 	= $this->input->post('id_janela');
    	$id_empresa = $this->session->userdata('id_empresa');
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$cycle = $service->get_cycles_by_year_id($id_empresa, $id_janela);
    	echo json_encode($cycle);
    }

    public function getCyclesIdByDate()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$date = $this->input->post('date');
    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_cycle_id_by_date($id_empresa, $date);
    	//$this->debugMark($id_objetivo, $cycle);

    	echo json_encode($cycle);

    }

    public function getCylesForSettings()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');
    	$nome = $this->input->post('nome');
    	$aberto = $this->input->post('aberto');
    	$active = $this->input->post('active');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$cycle = $service->get_cycle_for_settings($id_empresa, $nome, $aberto, $active);

    	echo json_encode($cycle);

    }

    //M�todo respons�vel por retornar os anos por empresa.
    public function getYearByCompany()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$yearForCompany = $service->get_year_by_company($this->session->userdata('id'));

    	echo json_encode($yearForCompany);

    }
    //M�todo respons�vel por retornar os anos por empresa.
    public function getYearWithIdByCompany()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$yearForCompany['year'] = $service->get_year_with_id_by_company($this->session->userdata('id'));

    	echo json_encode($yearForCompany);

    }
	
	//M�todo respons�vel por retornar os anos por empresa.
    public function getYearByCompanywithJanela()
    {
    	// header obrigatorio
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$yearForCompany = $service->get_year_by_company_with_janela($this->session->userdata('id'));

    	echo json_encode($yearForCompany);

    }

    // coletar todas as tags relacionadas a empresa
    public function getAllTags(){
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$tags = $service->get_all_tags($id_empresa);

    	echo json_encode($tags);
    }

    // GET DETAILS ACTIVITIES, DETALHES ATIVIDADES
    public function getDetailsActivities(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id = $this->input->post('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$retorno = array();

    	$activities = $service->get_details_activities($id);

    	if($activities != null){
	    	$user = $service->get_data_resp($activities[0]['user']);
	    	$activities[0]['user'] = $user[0];

	    	$users = $service->get_users_by_activities($activities[0]['id']);
	    	$activities[0]['users'] = $users;

	    	$tags = $service->get_tags_by_activities($activities[0]['id']);
	    	$activities[0]['tags'] = $tags;
    	}

    	echo json_encode($activities[0]);
    }

	// Metodo coleta todos os times de uma empresa
    public function getAllTeams(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$teams = $service->get_all_teams($id_empresa);

    	echo json_encode($teams);
    }

    public function getAllTeamsAccordingPermission(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$teams = $service->get_all_teams_according_permission($id_empresa);

    	echo json_encode($teams);
    }

    // Metodo coleta todos os times de uma empresa
    public function getCompetenciaByIdEmperssaCargo(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$comptencias = $service->get_comptencia_by_id_emperssa($id_empresa);

    	echo json_encode($comptencias);
    }
    public function getCargoByIdEmperssa(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$cargos = $service->get_cargo_by_id_emperssa($id_empresa);

    	echo json_encode($cargos);
    }
    public function getIntegrationsByIdEmperssa(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$result = $service->get_integration_by_id_emperssa($id_empresa);

    	echo json_encode($result);
    }
	
	public function testconnection(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service 		= 	new servicedao();
		$host 			= 	$this->input->post('host');
		$port 			= 	$this->input->post('port');
		$uname 			= 	$this->input->post('uname');
		$password 		= 	$this->input->post('password');
		$database 		= 	$this->input->post('database');
		
		$config_app = array(
            'hostname' => $host,
            'username' => $uname,
            'password' => $password,
            'database' => $database,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => FALSE
        );
		$server 		= 	$this->load->database($config_app,true);
		try{
			$connected = $server->initialize();
			if($connected){
				$result	=	array('error'=>false,'message'=>'Successfully connected');
			}else{
				$result	=	array('error'=>true,'message'=>'Error Establishing connection');
			}
		} catch (Exception $e) {
			$result	=	array('error'=>true,'message'=>$e->getMessage());
		}
    	echo json_encode($result);
    }
	
	public function testsqlquery(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service 		= 	new servicedao();
		$host 			= 	$this->input->post('host');
		$port 			= 	$this->input->post('port');
		$uname 			= 	$this->input->post('uname');
		$password 		= 	$this->input->post('password');
		$database 		= 	$this->input->post('database');
		$sql 			= 	$this->input->post('sql');
		
		$config_app = array(
            'hostname' => $host,
            'username' => $uname,
            'password' => $password,
            'database' => $database,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => FALSE
        );
		$server 		= 	$this->load->database($config_app,true);
		try{
			$connected 	= 	$server->initialize();
			if($connected){
				$query 		= 	$server->query($sql);
				$response 	= 	$query->result_array();
				$result		=	array('error'=>false,'message'=>$response);
			}else{
				$result		=	array('error'=>true,'message'=>'Error Establishing connection');
			}
		} catch (Exception $e) {
			$result	=	array('error'=>true,'message'=>$e->getMessage());
		}
    	echo json_encode($result);
    }
	
    public function getIntegrationsByType(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');
    	$type = $this->input->post('type');

    	$result = $service->get_integration_by_type($id_empresa,$type);

    	echo json_encode($result);
    }

    public function getQuestionarioByIdEmperssaCargo(){

        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $id_empresa = $this->session->userdata('id_empresa');

        $typeFilter = $this->input->post('type_filter');

        $questionario = $service->get_questionario_by_id_emperssa($id_empresa, $typeFilter, false);

        echo json_encode($questionario);
    }

    public function getCarreerById(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_usuario = $this->input->post('id_usuario');
    	$crossfeed_status 	= $this->input->post('crossfeed_status');
    	$crossfeed_time 	= $this->input->post('crossfeed_time');
    	$crossfeed_type 	= $this->input->post('crossfeed_type');

    	$crossfeed_status 	= $crossfeed_status?$crossfeed_status[0]:'';
    	$crossfeed_time 	= $crossfeed_time?$crossfeed_time[0]:'';
    	$crossfeed_type 	= $crossfeed_type?$crossfeed_type[0]:'';

    	if($id_usuario == $this->session->userdata('id')){
    		$result = $service->get_carreer_by_id_usuario($id_usuario,$crossfeed_status,$crossfeed_time,$crossfeed_type);
    	}else{
    		$result = $service->get_carreer_by_id_usuario_for_others($id_usuario,$crossfeed_status,$crossfeed_time,$crossfeed_type);
    	}
    	

    	echo json_encode($result);
    }
    public function getReceivedCarreerById(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_usuario = $this->input->post('id_usuario');
    	$crossfeed_status 	= $this->input->post('crossfeed_status');
    	$crossfeed_time 	= $this->input->post('crossfeed_time');
    	$crossfeed_type 	= $this->input->post('crossfeed_type');

    	$crossfeed_status 	= $crossfeed_status?$crossfeed_status[0]:'';
    	$crossfeed_time 	= $crossfeed_time?$crossfeed_time[0]:'';
    	$crossfeed_type 	= $crossfeed_type?$crossfeed_type[0]:'';

    	if($id_usuario == $this->session->userdata('id')){
    		$result = $service->get_received_carreer_by_id_usuario($id_usuario,$crossfeed_status,$crossfeed_time,$crossfeed_type);
    	}else{
    		$result = $service->get_received_carreer_by_id_usuario_for_others($id_usuario,$crossfeed_status,$crossfeed_time,$crossfeed_type);
    	}

    	echo json_encode($result);
    }
    
    public function getAllDpObjectivos(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_usuario = $this->session->userdata('id');

    	$result = $service->get_dp_objectivos_by_id_usuario($id_usuario);

    	echo json_encode($result);
    }
    public function getDpObjectivosDetailByIdObj(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();


    	$id_dp_objetivo = $this->input->post('id');

    	$result = $service->get_dp_objectivos_detail_by_id($id_dp_objetivo);

    	echo json_encode($result);
    }


    public function getDpMetaDetailsByMeta(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$meta_id = $this->input->post('meta_id');
    	$global_goal_id = $this->input->post('global_goal_id');

    	$result = $service->get_meta_detail_by_id_meta($meta_id,$global_goal_id);

    	echo json_encode($result);
    }
    public function getDpActivitiesByMeta(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$id_meta = $this->input->post('id');

    	$result = $service->get_dp_activities_by_rchaveId($id_meta);

    	echo json_encode($result);
    }
	
	public function getDpGoalDetailById(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();


    	$id_dp_objetivo = $this->input->post('id');

    	$result = $service->get_dp_goal_detail_by_id($id_dp_objetivo);

    	echo json_encode($result);
    }

    public function getQuestionarioByIdEmperssaCargos(){

        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $id_empresa = $this->session->userdata('id_empresa');

        $typeFilter = 'p';

        $questionario = $service->get_questionario_by_id_emperssa($id_empresa, $typeFilter, true);

        echo json_encode($questionario);
    }

    public function getDpMetaDetailByIdMeta(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$service = new servicedao();


    	$id_dp_rchave = $this->input->post('id');

    	$result = $service->get_dp_meta_detail_by_id($id_dp_rchave);
    	//print_r($result);die;

    	echo json_encode($result);
    }

    public function addMinorGoals()
    {
    	header('Content-type: application/json');
	    	$this->get_acesso_user ( true );
	    	$out = array();

			$id_dp_objetivo  = 	($this->input->post('parent_id')!=0?$this->input->post('parent_id'):0);
			$name			=	$this->input->post('name');
			$goal_name			=	$this->input->post('goal_name');
			$goal_prazo			=	$this->input->post('goal_prazo');
			//print_r($this->input->post('meta_value'));die;

			$update_goal_data = array(
	                'nome_dp_objetivo' => $goal_name,
	                'data_limite' => date("Y-m-d", strtotime(str_replace('/', '-', $goal_prazo))),
					);

            $data_to_store = array (
                'id_dp_objetivo' => $id_dp_objetivo,
                'nome_dp_rchave' => $name,
                'meta' => 0,
            );

            $this->load->model('servicedao');
            $service        =   new servicedao();
            $update_goal    =   $service->update_minor_goal_objective($update_goal_data,$id_dp_objetivo);
            $id_objetivo    =   $service->save_minor_goals($data_to_store) ;
            if ($id_objetivo) {
                $activities			=	$this->input->post('activities');
                if(!empty($activities) && count($activities)>0){
                    foreach($activities as $activity){
						$data_activities 	=	array(
											'id_dp_rchave'=>$id_objetivo,
											'nome_dp_atividade'=>$activity['name'],
											'data_inicio'=>date("Y-m-d"),
                                            'data_fim'=>date("Y-m-d", strtotime(str_replace('/', '-', $activity['activity_end']))),
											'usuario_atualizador'=>$this->session->userdata('id'),
										);
						$service->add_minor_goal_activity($data_activities);
					}
				}
				$out ['error'] = false;
				$out ['error_message'] = '';
    			} 

    	echo json_encode($out);
    	exit();
    }
    public function updateMinorGoals()
    {
    	header('Content-type: application/json');
	    	$this->get_acesso_user ( true );
	    	$out = array();
			

	    	$id_dp_objetivo  	= 	($this->input->post('parent_id')!=0?$this->input->post('parent_id'):0);
	    	$meta_id  			= 	($this->input->post('meta_id')!=0?$this->input->post('meta_id'):0);
			$name				=	$this->input->post('name');
			$goal_name			=	$this->input->post('goal_name');
			$goal_prazo			=	$this->input->post('goal_prazo');

			$id_empresa = $this->session->userdata('id_empresa');
			$id_usuario = $this->session->userdata('id');
			$id_dp_rchave = $meta_id;
			//print_r($this->input->post('meta_value'));die;
			$update_goal_data = array(
	                'nome_dp_objetivo' => $goal_name,
	                'data_limite' => date("Y-m-d", strtotime(str_replace('/', '-', $goal_prazo))),
					);

            $data_to_store = array (
                'nome_dp_rchave' => $name,
                'meta' => 0,
            );
            $all_activites 	=	array();	
            $this->load->model('servicedao');
            $service        =   new servicedao();
            $update_goal    =   $service->update_minor_goal_objective($update_goal_data,$id_dp_objetivo);
            $status    =   $service->update_minor_goals_by_id($data_to_store,$id_dp_rchave) ;
            if ($status == true) {
                $activities			=	$this->input->post('activities');
                //$service->delete_activities_by_id_rchave($id_dp_rchave);
                if(!empty($activities) && count($activities)>0){
                	//$service->delete_activities_by_id_rchave($id_dp_rchave);
                    foreach($activities as $activity){
						$data_activities 	=	array(
											'nome_dp_atividade'=>$activity['name'],
											'data_inicio'=>date("Y-m-d"),
                                            'data_fim'=>date("Y-m-d", strtotime(str_replace('/', '-', $activity['activity_end']))),
											'usuario_atualizador'=>$this->session->userdata('id'),
										);
						if(isset($activity['id']) && $activity['id'] != ''){
							$service->update_minor_goal_activity_by_id($data_activities,$activity['id']);
							$all_activites[] 	=	$activity['id'];
						}else{
							$data_act = array('meta_id'=>$id_dp_rchave,
											  'name'=>$activity['name'],
											  'activity_start' => date("Y-m-d"),
											  'activity_end' => $activity['activity_end'],
										);
							$new_id 	=	$service->save_user_dp_activity($id_empresa,$id_usuario,$data_act);
							$all_activites[] 	=	$new_id;
						}	
					}
				}
				// else{
				$service->delete_activities_by_id_rchave($id_dp_rchave, $all_activites);
				// }
				$out ['error'] = false;
				$out ['error_message'] = '';
    		} 
    	echo json_encode($out);
    	exit();
    }

    public function saveGlobalDpForm()
    {
    	header('Content-type: application/json');
	    	$this->get_acesso_user ( true );
	    	$out = array();
 			$data			 =	$this->input->post();
			$id_cargo 		 = 	isset($data['cargos'][0])?$data['cargos'][0]:null;
			$id_dp_objetivo  = 	$data['id_dp_objetivo_glob'];
			$name			 =	$this->input->post('nome_dp_rchave');
			
 			$update_goal_data = array(
	            'nome_dp_objetivo' => $data['nome_obj_glob'],
	            'situacao' => $data['active_status_rht'],
	            'id_cargo' => $id_cargo,
	            'data_limite' => date("Y-m-d", strtotime(str_replace('/', '-', $data['date_limit_glob']))),
			);

			$save_goal_meta_data = array(
				'id_dp_objetivo' => $id_dp_objetivo,
				'nome_dp_rchave' => $name,
                'meta' => 0,
			);

		   $this->load->model('servicedao');
           $service     =   new servicedao();
		   $update_goal =   $service->update_minor_goal_objective($update_goal_data,$data['id_dp_objetivo_glob']);
		   if (isset($data['nome_dp_rchave']) && !empty($data['nome_dp_rchave'])) {
				$service->save_minor_goals($save_goal_meta_data) ;
		   }
		   
           if(isset($data['goal_meta_name']) && !empty($data['goal_meta_name'])){
			
           		foreach ($data['goal_meta_name'] as $key => $value) {
           			if(isset($value['situacao'])){
           				$situacao = $value['situacao'];
           			}else{
           				$situacao = 0;
           			}
           			$update_data = array(
						'nome_dp_rchave' => $value['name'],
           				'situacao' => $situacao 
           			);
           			$meta_id = $key;
           			$update_meta = $service->update_minor_goals_by_id($update_data,$meta_id);
           		}
		   }
		   

		$out ['error'] = false;
		$out ['error_message'] = '';

    	echo json_encode($out);
    	exit();
    }

//    public function removeQuestionarioById()
//    {
//        header('Content-type: application/json');
//
//
//
//        $this->get_acesso_user(true);
//
//        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
//
//            $this->form_validation->set_rules ( 'id', 'id', 'required' );
//
//
//            if ($this->form_validation->run ()) {
//
//
//                $id = $this->input->post('id');
//
//                $this->load->model('servicedao');
//                $service = new servicedao();
//
//                if($service->remove_questionario($id)){
//                    $out ['error'] = false;
//                    $out ['error_message'] = '';
//
//                }else{
//                    $out ['error'] = true;
//                    $out ['error_message'] = 'Erro ao tentar deletar questionario';
//                }
//
//            }else{
//
//                $out ['error'] = true;
//                $out ['error_message'] = 'O id do questionário não informado';
//            }
//
//
//        }else{
//            $out ['error'] = true;
//            $out ['error_message'] = 'Nenhum formulário foi submetido.';
//
//        }
//
//        echo json_encode($out);
//        exit;
//    }
    public function removeQuestionarioById()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

            $this->form_validation->set_rules ( 'id', 'id', 'required' );


            if ($this->form_validation->run ()) {

                $id = $this->input->post('id');
                $id_usuario = $this->session->userdata('id');
                $admin = $this->session->userdata('admin');

                $data = array(
                    'ativo' => 0,
                    'usuario_atualizador' => $id_usuario,
                );

                $this->load->model('servicedao');
                $service = new servicedao();


                if($service->userResponsibleQuestionary($id, $id_usuario) || $admin){
                    if($service->edit_questionary($id, $data)){
                        $out ['error'] = false;
                        $out ['error_message'] = '';
                    }else{
                        $out ['error'] = true;
                        $out ['error_message'] = 'Ocorreu um erro ao tentar redefinir o Questionário. Por favor tente mais tarde.';
                    }
                }else{
                    $out['error'] = true;
                    $out['error_message'] = 'O usuário não possui permissão para executar essa ação.';
                }

            }else{

                $out ['error'] = true;
                $out ['error_message'] = 'O id do Questionário não está informado.';
            }


        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';

        }

        echo json_encode($out);
        exit;

    }
    public function removeQuestionFromQuestionary()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {


                $question = $this->input->post('question');
                $questionaryId = $this->input->post('questionaryId');
                $id_usuario = $this->session->userdata('id');
                $admin = $this->session->userdata('admin');

                $question['ativo'] = 0;
                $question['usuario_atualizador'] = $id_usuario;

                $this->load->model('servicedao');
                $service = new servicedao();


                if($service->userResponsibleQuestionary($questionaryId, $id_usuario) || $admin){

                    if($ret = $service->add_update_question($question, $questionaryId)){
                        $out ['error'] = false;
                        $out ['error_message'] = '';
                    }else{
                        $out ['error'] = true;
                        $out ['error_message'] = 'Ocorreu um erro ao tentar redefinir a Pergunta. Por favor tente mais tarde.';
                    }
                }else{
                    $out['error'] = true;
                    $out['error_message'] = 'O usuário não possui permissão para executar essa ação.';
                }


        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';

        }

        echo json_encode($out);
        exit;

    }

    public function addOrUpdateQuestionario() //add_questionario
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

            $data_to_store = array (
                'id_questionarios' => $this->input->post('id_questionarios'),
                'id_empresa' => $this->session->userdata('id_empresa'),
                'tipo_questionario' => $this->input->post('tipo_questionario'),
                'nome_questionario' => $this->input->post('nome_questionario'),
                'usuario_atualizador' => $this->session->userdata('id'),
                'ativo' => ( $this->input->post('ativo') ) ? $this->input->post('ativo') : 0
            );


            $this->load->model('servicedao');
                $service = new servicedao();

                if($t = $service->add_update_questionario($data_to_store)){
                    $out ['added_object_id'] = $t[0];
                    $out ['error'] = false;
                    $out ['error_message'] = '';
                    $out ['exist_error_message'] = $t[1];

                }else{
                    $out ['error'] = true;
                    $out ['error_message'] = 'Ocorreu um erro ao tentar Adicionar um Questionário. Por favor tente mais tarde.';
                     $out ['exist_error_message'] = '';
                }

        } else {
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';
            $out ['exist_error_message'] = '';
        }

        echo json_encode($out);
        exit;

    }

    public function getQuestionsByQuestionaryId()
    {
        header('Content-type: application/json');

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
            $this->load->model('servicedao');
            $service = new servicedao();

            $out = $service->get_questions_by_questionary_id($this->input->post('id_questionarios'));

            foreach ($out as $question)
            {
                $question['type'] = $question['tipo'];
                //$question['type'] = returnFrontQuestionTypeByDBQuestionType($question['tipo']);
            }

        } else {
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';
        }
        echo json_encode($out);
        exit;

    }

    public function addCategory() //add_questionario
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

            $data_to_store = array (
                'id_empresa' => $this->session->userdata('id_empresa'),
                'nome_categoria' => $this->input->post('name'),
                'usuario_atualizador' => $this->session->userdata('id'),
            );

            $this->load->model('servicedao');
                $service = new servicedao();

                if($t = $service->add_category($data_to_store)){
                    $out ['error'] = false;
                    $out ['error_message'] = '';

                }else{
                    $out ['error'] = true;
                    $out ['error_message'] = 'Ocorreu um erro ao tentar Adicionar um Questionário. Por favor tente mais tarde.';
                }

        } else {
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';
        }

        echo json_encode($out);
        exit;

    }
    public function addCycle() //Cycle config
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

            $data_to_store = array (
                'id_empresa' => $this->session->userdata('id_empresa'),
                'nome' => $this->input->post('name')
            );

            $this->load->model('servicedao');
                $service = new servicedao();

                if($t = $service->add_cycle($data_to_store)){
                    $out ['error'] = false;
                    $out ['error_message'] = '';

                }else{
                    $out ['error'] = true;
                    $out ['error_message'] = 'Ocorreu um erro ao tentar Adicionar um Ciclo. Por favor tente mais tarde.';
                }

        } else {
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';
        }

        echo json_encode($out);
        exit;

    }

    public function getAllCategories() //add_questionario
    {
        header('Content-type: application/json');
        $this->get_acesso_user(true);
        $this->load->model('servicedao');
    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');
    	$categories = $service->get_all_categories($id_empresa);
        echo json_encode($categories);
        exit;

    }

//    public function returnFrontQuestionTypeByDBQuestionType($dbType, $hasDbAnswer = false){
//        switch ($dbType)
//        {
//            case 'o':
//                return 'multiplaescolha';
//            case 'q':
//                if ($hasDbAnswer) return 'objetiva_yesno';
//                else return 'qualitativa';
//            case 'e':
//                // por enquanto só separando por rating, depois tenho que colocar pra coracao tmb
//                return 'rating';
//        }
//    }


    public function returnDBQuestionTypeByFrontQuestionType($frontType)
    {
        switch ($frontType)
        {
            case 'multiplaescolha':
                return 'o';
			case 'multiplaescolhaAppraisal':
                return 'a';
            case 'qualitativa':
                return 'q';
            case 'rating_estrela':
                return 'e';
            case 'rating_nps':
                return 'n';
            case 'rating_coracao':
                return 'c';
            case 'rating_emoji':
                return 'i';
            case 'objetiva_yesno':
                return 'o';
            case 'escala_favora':
                return 'f';
            case 'escala_evolucao':
                return 'g';
            case 'competencia':
            	return 't';
        }
    }

    public function addOrUpdateQuestion()
    {
        header('Content-type: application/json');
        $this->get_acesso_user(true);
        if ($this->input->server('REQUEST_METHOD' ) === 'POST') {

            $idUsuario = $this->session->userdata('id');
            $idEmpresa = $this->session->userdata('id_empresa');
            $questions = $this->input->post('questions');
            if(isset($this->input->post('questionary')['id_questionarios'])) $questionaryId = $this->input->post('questionary')['id_questionarios'];
            $out ['error'] = false;
            $out ['error_message'] = '';
            $count = 1;
			
            foreach ($questions as $question)
            {
            	if(isset($question['escala']) && $question['escala'] != ''){
            		$escala = $question['escala'];
            	}else{
            		$escala = 5;
            	}
            	if(isset($question['type']) && $question['type'] == 'escala_favora'){
            		$favorabilidade = 1;
            	}else{
            		$favorabilidade = 0;
            	}
            	if(isset($question['perguntacat']) && $question['perguntacat'] != ''){
            		$id_categoria_pergunta = $question['perguntacat'];
            	}else{
            		$id_categoria_pergunta = NULL;
            	}
                ///RECURSE HERE
                $data_to_store = array (
                    'usuario_atualizador' => $idUsuario,
                    'id_pergunta' => (array_key_exists('id_pergunta',$question))? $question['id_pergunta']:NULL,
                    'id_empresa' => $idEmpresa,
                    'pergunta' => $question['pergunta'],
                    'escala' => $escala,
                    'tipo' => $this->returnDBQuestionTypeByFrontQuestionType($question['type']),
                    'ativo' => (array_key_exists('ativo',$question))? $question['ativo']:0,
                    'respostas' => (array_key_exists('respostas', $question)?$question['respostas']:NULL),
                    'id_categoria_pergunta' => $id_categoria_pergunta,
                    'favorabilidade' => $favorabilidade,
                    'ordem' => $question['pergunta_order'],
                    'mandatory' => (array_key_exists('pergunta_mandatory',$question)) ? ($question['pergunta_mandatory'] == 'true') ? 1: 0 :0,
                );

                $this->load->model('servicedao');
                $service 	= 	new servicedao();

                $ret 		= 	$service->add_update_question($data_to_store, $questionaryId);
                if(!$ret){
                    $out ['error'] = true;
//                    $out ['error_message'.$count] = 'Erro ao adicionar pergunta [id='.$data_to_store.id_pergunta.'].';
                    $count++;
                }

                // END RECURSION
            }
        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';

        }
        echo json_encode($out);
        exit;
    }


    // Metodo coleta todos os times de uma empresa
     public function getAllTeamsTree(){

    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$id_empresa = $this->session->userdata('id_empresa');
    	$teams = $service->get_all_teams_no_parent($id_empresa);

    	$result = $this->getAllTeamsTreeRecursive($teams);

    	echo json_encode($result);
    }

    // Metodo coleta todos os times de uma empresa
    private function getAllTeamsTreeRecursive($teams){

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	for($i = 0 ; $i < sizeof($teams) ; $i++)
    	{
    		$tmpArray = $service->get_all_teams_by_parent_id($teams[$i]['id']);
    		//$this->debugMark($teams[$i]['parent_id'], $tmpArray);
    		if(sizeof($tmpArray) > 0)
    		{
    			$teams[$i]['sub'] =  $this->getAllTeamsTreeRecursive($tmpArray);
    		}else{
    			$teams[$i]['sub'] =  array();
    		}
    	}
    	return $teams;

    }

    private function getAllTeamsTreeRecursiveOnlyId($teams){

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	for($i = 0 ; $i < sizeof($teams) ; $i++)
    	{
    		$tmpArray = $service->get_all_teams_id_by_id($teams[$i]['id']);
    		//$this->debugMark($teams[$i]['parent_id'], $tmpArray);
    		if(sizeof($tmpArray) > 0)
    		{
    			$teams[$i]['sub'] =  $this->getAllTeamsTreeRecursiveOnlyId($tmpArray);
    		}else{
    			$teams[$i]['sub'] =  array();
    		}
    	}
    	return $teams;

    }

    public function getAllTeamsWithoutRelation()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$id_empresa = $this->session->userdata('id_empresa');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$teamsToExclude = $service->get_all_teams_id_by_id($id);
    			$result = $this->getAllTeamsTreeRecursiveOnlyId($teamsToExclude);

    			array_walk_recursive($result, array($this, 'teamsIdsTreeToArray'));
    			$notIncludedTeam = self::$itensTeams;
    			$notIncludedTeam[$id] = "false";

    			$allTeams = $service->get_all_teams($id_empresa);

    			$i = 0;
    			$teams = array();
    			foreach($allTeams as $item)
    			{
    				if(!isset($notIncludedTeam[$item['id']])){
    					$teams[] = $item;
    				}
    				$i++;
    			}

    			$out = $teams;

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Time não referenciado.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum dado foi submetido.';

    	}
    	echo json_encode($out);

    }

    private function teamsIdsTreeToArray($item, $key)
    {
    	if($key == 'id'){
    		self::$itensTeams[$item] = "false";
    	}
    }

    //M�todo respons�vel por retornar os detalhes dos objetivos globais por tag.
    public function searchAllGlobalTaticsTag()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$tag = $this->input->post('tag');
    	$id = $this->session->userdata('id');

    	$service = new servicedao();

    	$details = $service->search_all_global_tatics_tag($tag, $id);

    	echo json_encode($details);

	}
	/* FUNÇÃO PARA RETORNAR LISTA DE OBJETIVOS PENDENTES DE APROVAÇÃO PARA GESTOR */
	public function searchObjectivesByGestor()
    {
    	header('Content-type: application/json');
		
		$this->load->model('servicedao');
    	$service = new servicedao();

    	$id_usuario = $this->input->get('id_user');
    	$details = $service->search_objectives_by_gestor($id_usuario);

    	echo json_encode($details);

    }
    public function searchAllGlobalTaticByUser()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$id_empresa = $this->session->userdata('id_empresa');

    	$service = new servicedao();
    	$year = $this->input->get('year');
    	$id_time = $this->input->get('id_time');
    	$id_cycle = $this->input->get('id_cycle');
    	$id_usuario = $this->input->get('id_user');
    	$estrategico = $this->input->get('is_estrategico');
    	$situation = $this->input->get('situation');
    	$type = $this->input->get('type');
    	$color = $this->input->get('color');
    	$workflow = $this->input->get('workflow');
    	$details = $service->search_all_global_tatics_key_activities_by_id_responsavel( $id_empresa,$id_usuario,$year,$id_time,$id_cycle, $estrategico, $situation, $type, $color, $workflow);

    	echo json_encode($details);

    }
	public function searchAllGlobalTaticByUserHierarchical()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	
    	$id_empresa = $this->session->userdata('id_empresa');

    	$service = new servicedao();
    	$year = $this->input->get('year');
    	$id_time = $this->input->get('id_time');
    	$id_cycle = $this->input->get('id_cycle');
    	$id_usuario = $this->input->get('id_usuario');
    	$estrategico = $this->input->get('is_estrategico');
    	$situation = $this->input->get('situation');
    	$type = $this->input->get('type');
    	$color = $this->input->get('color');

    	$details = $service->get_global_tatics_hierarchical( $id_empresa,$id_usuario,$year,$id_time,$id_cycle, $estrategico, $situation, $type, $color);
    	$result = $this->getAllGoalsTreeRecursiveOkr($details);
    	echo json_encode($result);

    }

    private function getAllGoalsTreeRecursiveOkr($goals,$is_child=false){

    	$this->load->model('servicedao');
    	$service = new servicedao();

		foreach($goals as $i=>&$goal){
    		$tmpArray = $service->get_all_goals_by_parent_id($goal['id']);
    		if(!empty($tmpArray)){
    			$goal['sub'] =  $this->getAllGoalsTreeRecursiveOkr($tmpArray, true);
    			$goal['user'] = $service->get_user_profile_by_id($goal['responsavel']);
    			$goal['is_child']	=	$is_child;
    		}else{
    			$goal['sub'] =  array();
    			$goal['user'] = $service->get_user_profile_by_id($goal['responsavel']);
    			$goal['is_child']	=	$is_child;
    		}

    	}
    	return $goals;
    }

    public function searchMyAllGlobalTatic()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->input->get('id_user');
    	$year = $this->input->get('year');
    	$id_time = $this->input->get('id_time');
    	$id_cycle = $this->input->get('id_cycle');

    	$service = new servicedao();

    	$details = $service->search_my_all_global_tatics_key_activities_by_id_responsavel( $id_empresa,$id_usuario,$year,$id_time,$id_cycle);

    	echo json_encode($details);

    }

    public function getImportKeyResults()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_empresa = $this->session->userdata('id_empresa');

    	$service = new servicedao();

    	$keyresult = $service->get_import_keyresults( $id_empresa);

    	echo json_encode($keyresult);

    }

    public function getImportIndicadors()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_empresa = $this->session->userdata('id_empresa');

    	$service = new servicedao();

    	$keyresult = $service->get_import_indicadors( $id_empresa);

    	echo json_encode($keyresult);

    }

    public function removeKeyresultContrataMetas()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_key = $this->input->post('key_id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$keyresult = $service->remove_keyresult_contrato_metas( $id_key);

    	echo json_encode($keyresult);

    }

	public function searchMyAllGlobalTaticProfile()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->session->userdata('id');
    	$year = $this->input->post('year');
    	$id_ciclo = $this->input->post('cycle');

    	$service = new servicedao();

    	$details = $service->search_my_all_global_tatic_profile( $id, $year, $id_ciclo);

    	echo json_encode($details);

    }

	public function getAcivitiesProfile()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');

    	$id 		= 	$this->session->userdata('id');
    	$year 		= 	date('Y');
    	$id_ciclo 	= 	$this->input->post('cycle');

    	$service = new servicedao();

    	$details = $service->get_activities_for_profile( $id, $year, $id_ciclo);


    	echo json_encode($details);

    }

    public function getAcivitiesProfileCareer()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');
    	$situacao 		= array();
    	$contributers 	= array();
    	$id_usuario 	= 	$this->input->post('id_usuario');
    	$ativade_time 	= 	$this->input->post('ativade_time');
    	$situacao 		= 	$this->input->post('situacao');
    	$service = new servicedao();

    	$details = $service->get_activities_for_profile_career( $id_usuario, $ativade_time,$situacao);


    	echo json_encode($details);

    }

    public function getAcivitiesHierarchy()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');
    	$id_usuario 	= 	$this->input->post('id_usuario');
    	$id_empresa 	= 	$this->session->userdata('id_empresa');

    	$filter 		= 	$this->input->post('filter');
    	$f_responsavel	= 	$this->input->post('f_responsavel');
    	$f_cycle 		= 	$this->input->post('f_cycle');
    	$f_team 		= 	$this->input->post('f_team');
    	$filter_time	= 	$this->input->post('filter_time');

    	$service = new servicedao();

    	$result = $service->get_activities_hierarchy($id_usuario, $id_empresa, $filter, $f_responsavel, $f_cycle, $f_team, $filter_time);
    	echo json_encode($result);
    }

    public function getAcivitiesProfileCareerHierarchy()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');
    	$situacao 		= array();
    	$contributers 	= array();
    	$id_usuario 	= 	$this->input->post('id_usuario');

    	$filter 		= 	$this->input->post('filter');
    	$f_responsavel	= 	$this->input->post('f_responsavel');
    	$f_cycle 		= 	$this->input->post('f_cycle');
    	$f_team 		= 	$this->input->post('f_team');
    	$objid 			= 	$this->input->post('objid');

    	$service = new servicedao();

    	$details = $service->get_activities_for_profile_career_hierarchy($id_usuario, $filter, $f_responsavel, $f_cycle, $f_team, $objid);
    	echo json_encode($details);
    }


    public function searchMyAllActivitiesOkr()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');

    	$id_usuario 	= 	$this->input->get('user_id');
    	$id_time 		= 	$this->input->get('id_time');
    	$situation = $this->input->get('situation');


    	$service = new servicedao();

    	$details = $service->search_my_all_activities( $id_empresa,$id_usuario,$id_time, $situation);

    	echo json_encode($details);

    }
    
    public function downloadAllActivitiesOkr()
    {

    	$default = ['nome_atividade'=>'Nome atividade',
    				'responsavel_ativ'=>'Responsavel atividade',
    				'data_ini_ativ'=>'Data ini atividade',
    				'data_fim_ativ'=>'Data fim atividade',
    				'progresso_ativ'=>'Progresso atividade'];

    	$default = $this->protege($default);

    	$selected_columns = $_POST;
    	if(!empty($selected_columns)){
    		$new_array = array_merge($default,$selected_columns);
    	}else{
    		$new_array = $default;
    	}
    	$str = '';
    	foreach ($new_array as $key => $value) {
    		$str .= $key." as '".$value."',";
    	}

    	if($str != ''){
    		$new_string = rtrim($str,',');
    	}else{
    		$new_string = '';
    	}
    	
		$id_empresa = $this->session->userdata('id_empresa');

		$filename = "activities-".date('d-m-Y').".csv";

		$this->load->model('servicedao');
        $service = new servicedao();
        $query = $service->get_rel_objective_activities($id_empresa, $new_string);

		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        // $this->db->select($new_string);
        // $this->db->from('ttl_rel_obj_atividade');
        // $this->db->where('id_empresa',$id_empresa);
		// $query =  $this->db->get();
        // $data 	= 	utf8_decode($this->dbutil->csv_from_result($query, $delimiter, $newline));
        $data 	= 	$this->dbutil->csv_from_result($query, $delimiter, $newline);
		force_download($filename, $data);
    }

    function csvDownloadRevisaoCicloStore()
	{

		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$admin =null;
		$usuarioLogado = $this->session->userdata('id');

		if($this->session->userdata('admin') == 1){
			$admin 	= 1;
		}
		$this->get_acesso_user ( true );
        $filename = "resultados-".date('d-m-Y').".csv";

		$id_time = $this->input->post('id_time');
    	$id_cycle = $this->input->post('id_cycle');
    	$id_usuario = $this->input->post('id_user');
    	$id_nivel = $this->input->post('id_nivel');
    	$id_gestor = $this->input->post('id_gestor');
    	$gestor = $this->input->post('gestor');
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $this->load->model('servicedao');
        $service = new servicedao();
		$result = $service->get_revisao_ciclo_score_result($usuarioLogado,$admin,$id_time,$id_cycle,$id_usuario,$id_nivel,$id_gestor,$gestor,$id_empresa,0);
		$data 	= 	$this->dbutil->csv_from_result($result, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;
        force_download($filename, $data);




	}

    function csvDownloadFeedbacks()
	{
		if ($this->input->post('ini_date')) $ini_date = $this->input->post('ini_date'); else $ini_date = null;
		if ($this->input->post('end_date')) $end_date = $this->input->post('end_date'); else $end_date = null;
		if ($this->input->post('teams')) $times_id = explode(',', $this->input->post('teams')); else $times_id = null;
		if ($this->input->post('teamsRemetente')) $teamsRemetente = explode(',', $this->input->post('teamsRemetente')); else $teamsRemetente = null;
		if ($this->input->post('users')) $users_id = explode(',', $this->input->post('users')); else $users_id = null;
		if ($this->input->post('usersRemetente')) $usersRemetente = explode(',', $this->input->post('usersRemetente')); else $usersRemetente = null;
		if ($this->input->post('tipos_feedbacks')) $tipos_id = explode(',', $this->input->post('tipos_feedbacks')); else $tipos_id = null;
		if ($this->input->post('acaos')) $acaos = explode(',', $this->input->post('acaos')); else $acaos = null;
		if ($this->input->post('filtroSemRetorno')) $filtroSemRetorno = $this->input->post('filtroSemRetorno'); else $filtroSemRetorno = null;
		$id_usuario = $this->session->userdata('id');
		if($this->session->userdata('admin') == 1){
			$admin 	= 1;
		}
		$this->get_acesso_user ( true );
        $filename = "feedbacks-".date('d-m-Y').".csv";
		
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $this->load->model('servicedao');
        $service = new servicedao();
        $result = $service->get_all_feedbacks($times_id, $teamsRemetente, $users_id, $usersRemetente, $tipos_id, $acaos, false, $ini_date, $end_date, $filtroSemRetorno);
		$data 	= 	$this->dbutil->csv_from_result($result, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;
        force_download($filename, $data);
	}

	
    
    public function getUserUpdatesProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');

		$service = new servicedao();

		$details = $service->get_user_updates_for_profile_section($id_usuario);

		echo json_encode($details);

	}

	public function getSearchUserUpdatesProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario = $this->input->post('user_id');
		$id_empresa = $this->session->userdata('id_empresa');

		$service = new servicedao();

		$details = $service->get_search_user_updates_for_profile($id_usuario);

		echo json_encode($details);

	}

	public function searchUserDataProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario = $this->input->post('user_id');
		$cycle = $this->input->post('cycle');
		$year = $this->input->post('year');

		$id_empresa = $this->session->userdata('id_empresa');

		$service = new servicedao();

		$out['myobjectivos']	= $service->get_goals_tatics_profile($id_empresa,$id_usuario);
		$out['mytatics']		= $service->search_my_all_global_tatic_profile($id_usuario,$year,$cycle);

		$details = $service->get_my_recieved_feedbacks_public( $id_usuario);
    	if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
						$service = new servicedao();
						$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){

						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
		$out['feedback_recived'] = $details;


		$givens = $service->get_my_given_feedbacks_public( $id_usuario);
			if(!empty($givens)){
				foreach($givens as $index=>$detail){
					$givens[$index] = $detail;
					$givens[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){
						$givens[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$givens[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$givens[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$givens[$index]['image'] = null;
						$givens[$index]['xs_image'] = null;
						$givens[$index]['md_image'] = null;
					}
				}
			}
		$out['feedback_given'] = $givens;

		$requested = $service->get_my_requested_feedbacks_public( $id_usuario);

			if(!empty($requested)){
				foreach($requested as $index=>$detail){
					$requested[$index] = $detail;
					$requested[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){
						$requested[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$requested[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$requested[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$requested[$index]['image'] = null;
						$requested[$index]['xs_image'] = null;
						$requested[$index]['md_image'] = null;
					}
				}
			}
		$out['feedback_requested'] = $requested;
		$out['activites'] = $service->get_activities_for_profile( $id_usuario, $year, $cycle);
		echo json_encode($out);

	}

	public function getUserUpdateByIDProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->session->userdata('id');
		$id_empresa 	= 	$this->session->userdata('id_empresa');
		$id_protocolo 	= 	$this->input->post('id_protocolo');
		$service 		= 	new servicedao();
		$details 		= 	$service->get_user_update_by_id_for_profile($id_protocolo, $id_usuario, $id_empresa);
		echo json_encode($details);
	}

	public function getSearchUserUpdateByIDProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->input->post('user_id');
		$id_empresa 	= 	$this->session->userdata('id_empresa');
		$id_protocolo 	= 	$this->input->post('id_protocolo');
		$service 		= 	new servicedao();
		$details 		= 	$service->get_user_update_by_id_for_profile($id_protocolo, $id_usuario, $id_empresa);
		echo json_encode($details);
	}

	public function getUserStatusByIDProtocoloProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->session->userdata('id');
		$id_empresa 	= 	$this->session->userdata('id_empresa');
		$id_protocolo 	= 	$this->input->post('id_protocolo');
		$service 		= 	new servicedao();
		$details = $service->get_privacy_status_by_id_protocolo($id_protocolo,$id_usuario);
		echo json_encode($details);
	}
	public function getSearchUserStatusByIDProtocoloProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->input->post('user_id');
		$id_empresa 	= 	$this->session->userdata('id_empresa');
		$id_protocolo 	= 	$this->input->post('id_protocolo');
		$service 		= 	new servicedao();
		$details = $service->get_privacy_status_by_id_protocolo($id_protocolo,$id_usuario);
		echo json_encode($details);
	}

	public function checkinStatusUpdateById()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->session->userdata('id');
		$id_empresa 	= 	$this->session->userdata('id_empresa');
		$id_protocolo 	= 	$this->input->post('id_protocolo');
		$status 		= 	$this->input->post('status');
		$service 		= 	new servicedao();
		$details 		= 	$service->checkin_status_update_by_id_for_profile($id_protocolo, $status);
		echo json_encode($details);
	}
    public function getUserQuestionsForUpdatesProfile()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');
        $id_empresa = $this->session->userdata('id_empresa');
        $tipo = $this->input->post('tipo');

        $service = new servicedao();

        $details = $service->get_user_questions_for_updates_for_profile($id_empresa,$id_usuario, $tipo);
        echo json_encode($details);

    }
    public function getUserQuestionsForDevelopmentProfile()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');
        $id_empresa = $this->session->userdata('id_empresa');
        $id_feedback = $this->input->post('id_feedback');

        $service = new servicedao();

        $details = $service->get_user_questions_for_development_for_profile($id_empresa,$id_usuario,$id_feedback);
        echo json_encode($details);

    }
    public function getUserProfileById()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_user = $this->input->post('user_id');

        $service = new servicedao();

        $details = $service->get_user_profile_by_id($id_user);
        echo json_encode($details);

    }
    public function getUserDevQuestions()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');
        $id_empresa = $this->session->userdata('id_empresa');

        $service = new servicedao();

        $details = $service->get_development_questions_by_id($id_empresa);
        echo json_encode($details);

    }
    public function getUserAnswersByIdForUpdatesProfile()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');
        $id_empresa = $this->session->userdata('id_empresa');
        $id_pergunta = $this->input->post('id');

        $service = new servicedao();

        $details = $service->get_answers_for_updates_for_profile_by_id($id_empresa,$id_usuario,$id_pergunta);

        echo json_encode($details);

    }
	public function getAllQuickSurvey()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');
			$id_usuario = $this->session->userdata('id');
			$id_empresa = $this->session->userdata('id_empresa');

			$service = new servicedao();

			$details = $service->get_all_quick_survey_by_user($id_empresa,$id_usuario);
			echo json_encode($details);

		}
	public function saveQuickSurvey()
	  {
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$data = $this->input->post();

		$service = new servicedao();

		$details = $service->save_quick_survey_user($id_empresa,$id_usuario,$data);
		echo json_encode($details);

	}

	public function saveNewSurvey()
	  {
		header('Content-type: application/json');

		// $this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$data = $this->input->post();

		$service = new servicedao();

		$details = $service->save_new_survey_user($id_empresa,$id_usuario,$data);
		$redirectto 	=	"perfil";
		if($this->session->userdata('survey_logged_in')){
			$redirectto 	=	"";
		}

		if (isset($data['pares']) && count($data['pares'])>0)
        {
            foreach ($data['pares'] as $par) {
                $alerta_data = array (
                    'id_usuario' => $par,
                    'id_empresa' => $id_empresa,
                    'descricao' => 'Adicionado como par em uma pesquisa',
                    'id_pesquisa' => $data['id_pesquisa'],
                    'ativo' => 1,
                    'usuario_atualizador' => $id_usuario,
                );
                $alert_save_activity = $service->add_survey_alert($alerta_data);
            }

        }
		echo json_encode(array('status'=>$details, 'redirectto'=>$redirectto));

	}

	public function getAllSurvey()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id');
        $group_by_type = ($this->input->get('group_by_type')=='true')?true:false;
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$data = $service->get_all_survey_by_id($id_usuario,$id_empresa, $group_by_type);

    	echo json_encode($data);
    }



	public function getEvaluatedUsersBySurveyId()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
        $id_usuario = $this->session->userdata('id');
    	$idSurvey = $this->input->post('id_pesquisa');
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$data = $service->get_evaluated_users_by_survey_id($idSurvey, $id_usuario);

    	echo json_encode($data);
    }



    public function getSurveyQuestionsById()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id');
    	$id_questionario = $this->input->post('id_questionario');
    	$id_pesquisa = $this->input->post('id_pesquisa');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$data = $service->get_survey_questions_by_id_questionerio($id_usuario,$id_empresa,$id_questionario,$id_pesquisa);

    	echo json_encode($data);
    }
	
	public function getSurveyQuestionsBySurveyId()
    {
    	header('Content-type: application/json');

    	// $this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id');
    	$id_pesquisa = $this->input->post('id_pesquisa');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$data = $service->get_survey_questions_by_id_pesquisa($id_usuario,$id_empresa,$id_pesquisa);
		$data['logintype'] = 'logged_in';	
		if($this->session->userdata('survey_logged_in')){
			$data['logintype'] = 'survey_logged_in';
		}
    	echo json_encode($data);
    }

    public function saveUserCommentProfile()
		{
			header('Content-type: application/json');

			// $this->get_acesso_user ( true );

			$this->load->model('servicedao');
			$id_usuario = $this->session->userdata('id');
			$id_empresa = $this->session->userdata('id_empresa');
			$data_to_store = $this->input->post();

			$service = new servicedao();

			$details = $service->save_user_comment_for_profile($id_empresa,$id_usuario,$data_to_store);

			echo json_encode($details);

		}
	public function deleteCommentProfile()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$comment_id = $this->input->post('comment_id');

		$service = new servicedao();

		$details = $service->delete_comment_for_profile($comment_id);

		echo json_encode($details);

	}

	private function my_array_unique($array, $keep_key_assoc = false){

	    $duplicate_keys = array();
	    $tmp = array();       

	    foreach ($array as $key => $val){
	        // convert objects to arrays, in_array() does not support objects
	        if (is_object($val))
	            $val = (array)$val;

	        if (!in_array($val, $tmp))
	            $tmp[] = $val;
	        else
	            $duplicate_keys[] = $key;
	    }

	    foreach ($duplicate_keys as $key)
	        unset($array[$key]);

	    return $keep_key_assoc ? $array : array_values($array);
	}

	public function saveUserUpdateDataProfile()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		$details 			= 	$service->save_update_checkin_values($id_empresa,$id_usuario,$data_to_store);


		if($details){
			$privacy = $data_to_store['public'];
			if($privacy == 1){
				//pega gestor do usuário que fez checkin
				$usuarios = $service->get_gestor_of_user($id_usuario);
				// membros do meu time
				$usuarios = array_merge($usuarios, $service->get_users_teammates($id_usuario));
				// pega gestor do time que o usuário que fez checkin pertence
				$usuarios = array_merge($usuarios, $service->get_responsavel_of_users_team($id_usuario));
				// limpar duplicatas!
				$usuarios = $this->my_array_unique($usuarios);
				// remover o usuario que fez o checkin
				foreach($usuarios as $key => &$usuario) {
				    if ($usuario['id'] == $id_usuario) {
				        unset($usuarios[$key]);
				    }
				}
			}else{
				//pega gestor do usuário que fez checkin
				$usuarios = $service->get_gestor_of_user($id_usuario);
				// pega gestor do time que o usuário que fez checkin pertence
				$usuarios = array_merge($usuarios, $service->get_responsavel_of_users_team($id_usuario));
				// limpar duplicatas!
				$usuarios = $this->my_array_unique($usuarios);
				// remover o usuario que fez o checkin
				foreach($usuarios as $key => &$usuario) {
				    if ($usuario['id'] == $id_usuario) {
				        unset($usuarios[$key]);
				    }
				}

			}
			if(!empty($usuarios)){
				foreach ($usuarios as $key => $user) {
					$data_store = array('id_usuario'=>$user['id'],'id_empresa'=>$user['id_empresa'],'id_questionario'=>$data_to_store['questioerio_id'],'usuario_atualizador'=> $id_usuario);
					$save_alerts = $service->save_alert_update_checkin_values($data_store);
				}
			}
		}
		echo json_encode($details);
	}
	public function saveUserUpdateDataCareer()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		$details 			= 	$service->save_one_to_one_values($id_empresa,$id_usuario,$data_to_store);

		echo json_encode($details);
	}
	public function saveUserDevlopmentUpdateDataProfile()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		if($service->save_development_update_values($id_empresa,$id_usuario,$data_to_store) == true){
			$out ['error'] = false;
			$out ['error_message'] = '';
			
			$deadline 			= 	date("Y-m-d", strtotime(str_replace('/', '-', $data_to_store['feedback_deadline'])));
			$feedback_deadline 	= $deadline.' 23:59:59';

            $alerta_data = array (
                'id_usuario' => $data_to_store['feedbacktouser'],
                'id_empresa' => $id_empresa,
                'descricao' => $data_to_store['feedback_description'],
                'id_questionario' => $service->get_dev_questionario_id($id_empresa),
                'desenvolvimento' => 1,
                'tipo' => 'solicitado',
                'ativo' => 1,
				'usuario_atualizador' => $id_usuario,
				'prazo_final' => $feedback_deadline
            );
            $alert_save_activity = $service->add_feedback_alert($alerta_data);

		}else{
			$out ['error'] = true;
    		$out ['error_message'] = 'Not added';
		}
		echo json_encode($out);
	}
	public function updateFeedbackDeadline()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$service 			= 	new servicedao();
		$id_feedback 		= 	$this->input->post('id_feedback');
		$deadline 			= 	$this->input->post('deadline');
		$feedback_deadline = '';
		if(!empty($deadline)){
			$deadline 			= 	date("Y-m-d", strtotime(str_replace('/', '-', $deadline)));
			$feedback_deadline 	= $deadline.' 23:59:59';
		}
		
		if($service->update_feedback_deadline($id_feedback,$feedback_deadline) == true){
			$out ['error'] = false;
    		$out ['error_message'] = '';

		}else{
			$out ['error'] = true;
    		$out ['error_message'] = 'Not updated';
		}
		echo json_encode($out);
	}
	public function updateFeedbackPrivacyStatus()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$service 			= 	new servicedao();
		$id_feedback 		= 	$this->input->post('id_feedback');
		$feedback_status 	= 	$this->input->post('feedback_status');
		
		
		if($service->update_feedback_privacy_status($id_feedback,$feedback_status) == true){
			$out ['error'] = false;
    		$out ['error_message'] = '';

		}else{
			$out ['error'] = true;
    		$out ['error_message'] = 'Not updated';
		}
		echo json_encode($out);
	}
	public function replyUserDevlopmentUpdateDataProfile()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		if($service->reply_development_update_values($id_empresa,$id_usuario,$data_to_store) == true){
			$out ['error'] = false;
    		$out ['error_message'] = '';

            $alerta_data = array (
                'id_usuario' => $data_to_store['id_feedback_destino'],
                'id_empresa' => $id_empresa,
                'descricao' => $data_to_store['feedback_resposta'],
                'id_questionario' => $service->get_dev_questionario_id($id_empresa),
                'desenvolvimento' => 1,
                'tipo' => 'recebido',
                'ativo' => 1,
                'usuario_atualizador' => $id_usuario,
            );
            $alert_save_activity = $service->add_feedback_alert($alerta_data);

        }else{
			$out ['error'] = true;
    		$out ['error_message'] = 'Not added';
		}
		echo json_encode($out);
	}
	public function saveUserDpGoals()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		$details 			= 	$service->save_user_dp_goals($id_empresa,$id_usuario,$data_to_store);
		echo json_encode($details);
	}
	public function saveUserDpActivity()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		$details 			= 	$service->save_user_dp_activity($id_empresa,$id_usuario,$data_to_store);
		echo json_encode($details);
	}
	public function updateUserDpActivity()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		$details 			= 	$service->update_user_dp_activity($id_empresa,$id_usuario,$data_to_store);
		echo json_encode($details);
	}

	public function updateUserActivityDp()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$activity_id 		= 	$this->input->post('activity_id');
		$type 				= 	$this->input->post('type');
		$data 				= 	$this->input->post('data');
		$activity_id 		= 	$this->input->post('activity_id');
		$service 			= 	new servicedao();
		$details 			= 	$service->update_dp_activity($activity_id,$type,$data);
		echo json_encode($details);
	}
	/* NOVA FUNÇÃO PARA ATUALIZAÇÃO DE METAS PDI */
	public function updateUserMetaDp()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$meta_id 			= 	$this->input->post('meta_id');
		$type 				= 	$this->input->post('type');
		$data 				= 	$this->input->post('data');
		//$meta_id 			= 	$this->input->post('meta_id');
		$service 			= 	new servicedao();
		$details 			= 	$service->update_dp_meta($meta_id,$type,$data);
		echo json_encode($details);
	}
	public function updateUserDpObjetivoStatus()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$data_to_store 		= 	$this->input->post();
		$service 			= 	new servicedao();
		$details 			= 	$service->update_user_dp_objectivo_status($id_empresa,$id_usuario,$data_to_store);
		echo json_encode($details);
	}
	public function deleteUserDpActivity()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$activity_id 		= 	$this->input->post('activity_id');
		$service 			= 	new servicedao();
		$details 			= 	$service->delete_user_dp_activity_by_id($activity_id);

		$out ['error'] = false;
		$out ['error_message'] = '';
		$out ['meta_id'] =$details;
		echo json_encode($out);
	}
	public function deleteUserDpMeta()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$meta_id 			= 	$this->input->post('meta_id');
		$service 			= 	new servicedao();
		$details 			= 	$service->delete_user_dp_meta_by_id($meta_id);

		$out ['error'] = false;
		$out ['error_message'] = '';
		$out ['meta_id'] =$details;
		echo json_encode($out);
	}
	public function deleteUserDpObjective()
	{
		header('Content-type: application/json');
		$this->get_acesso_user (true);
		$this->load->model('servicedao');
		$id_usuario 		= 	$this->session->userdata('id');
		$id_empresa 		= 	$this->session->userdata('id_empresa');
		$objective_id 		= 	$this->input->post('objective_id');
		$service 			= 	new servicedao();
		$details 			= 	$service->delete_user_dp_objective_by_id($objective_id);
		echo json_encode($details);
	}
	public function getUserDevelopmentUpdateByIDFeedback()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->session->userdata('id');
		$id_empresa 	= 	$this->session->userdata('id_empresa');
		$id_feedback 	= 	$this->input->post('id_feedback');
		$service 		= 	new servicedao();
		$details 		= 	$service->get_user_development_update_by_id($id_feedback, $id_usuario, $id_empresa);
		echo json_encode($details);
	}
	
//profile activity
	function getActivityChartData1()
	{
		$id_empresa	= $this->session->userdata('id_empresa');

		$this->load->model('servicedao');
		$service = new servicedao();

		$activityChartData = $service->get_activity_chart_data1($id_empresa);
		echo json_encode($activityChartData);
	}

	function getActivityChartData2()
	{
		$id_usuario 	= 	$this->session->userdata('id');
		$id_empresa		= 	$this->session->userdata('id_empresa');

		$this->load->model('servicedao');
		$service = new servicedao();

		$activityChartData = $service->get_activity_chart_data2($id_empresa, $id_usuario);
		echo json_encode($activityChartData);
	}

	public function updateActivityProgress()
	{
		header('Content-type: application/json');

		$id_usuario 	= 	$this->session->userdata('id');
		$activity_id 	= 	$this->input->post('activity_id');
		$flag 			= 	$this->input->post('flag');
		$percentage 	= 	$this->input->post('percentage');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->update_activity_progress($id_usuario, $activity_id, $flag, $percentage);
		echo json_encode($result);
	}

	public function updateActivityDetails()
	{
		header('Content-type: application/json');

		$data = $this->input->post();

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->update_activity_details($data);
		echo json_encode($result);
	}

	public function addActivityDetails()
	{
		header('Content-type: application/json');

		$out = array();

		$id_usuario = 	$this->session->userdata('id');
		$id_empressa = 	$this->session->userdata('id_empresa');
		$data = $this->input->post();

		$this->load->model ('servicedao');
		$service = new servicedao();

		$id_activity 	= $service->add_activity_details($id_usuario, $id_empressa, $data);
		if ( isset($id_activity) &&  $id_activity != '') {

			$alerta_data = array (
				'id_usuario' => $data['responsavel'],
				'id_empresa' => $id_empressa,
				'tipo_entidade' => 1,
				'id_entidade' => $id_activity,
				'nome_entidade' => $data['nome'],
				'descricao' => $data['descricao'],
				'progresso' => 0,
			);

			$alert_save_activity = $service->add_atividade_alert($alerta_data);
		}
		echo $id_activity;
	}

	public function updateSituationToFinished()
	{
		header('Content-type: application/json');

		$activity_id 	= 	$this->input->post('activity_id');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->update_situation_to_finished($activity_id);
		echo json_encode($result);
	}

	public function addActivityComment()
	{
		header('Content-type: application/json');

		$id_usuario 	= 	$this->session->userdata('id');
		$activity_id 	= 	$this->input->post('activity_id');
		$comment		= 	$this->input->post('comment');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->add_activity_comment($id_usuario, $activity_id, $comment);
		echo json_encode($result);
	}

	public function getActivityComments()
	{
		header('Content-type: application/json');

		$id_usuario 	= 	$this->session->userdata('id');
		$activity_id 	= 	$this->input->post('activity_id');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->get_activity_comments($id_usuario, $activity_id);
		echo json_encode($result);
	}

	public function getActivityObjectives()
	{
		header('Content-type: application/json');

		$id_empresa = 	$this->session->userdata('id_empresa');
		$id_usuario 	= 	$this->session->userdata('id');

		$filter 		= 	$this->input->post('filter');
    	$f_responsavel	= 	$this->input->post('f_responsavel');
    	$f_cycle 		= 	$this->input->post('f_cycle');
    	$f_team 		= 	$this->input->post('f_team');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->get_activity_objectives($id_empresa, $id_usuario, $filter, $f_responsavel, $f_cycle, $f_team);
		echo json_encode($result);
	}

	public function getActivityResultados()
	{
		header('Content-type: application/json');

		$objective_id 	= 	$this->input->post('objective_id');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->get_activity_resultados($objective_id);
		echo json_encode($result);
	}

	public function getCareerForUser()
	{
		header('Content-type: application/json');

		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$id_usuario 	= 	$this->input->post('id_usuario');
		$status 		= 	$this->input->post('status');
		$objective_time 	= 	$this->input->post('objective_time');
		$end_date 		= 	$this->input->post('end_date');
		$service 		= 	new servicedao();
		if($status == ''){
			$status = 1;
		}else if($status == 2){
			$status = '';
		}
		$details 		= 	$service->get_career_by_user($id_usuario,$status,$objective_time);
		echo json_encode($details);
	}

	function getMyTimeForProfile(){
		header('Content-type: application/json');

		$this->get_acesso_user (true);
		$id_usuario = 	$this->session->userdata('id');
		$id_empresa = 	$this->session->userdata('id_empresa');
		$team_id 	= 	$this->session->userdata('id_time');
		$start_date = 	$this->input->post('start_date');
		$end_date = 	$this->input->post('end_date');
		$this->load->model('servicedao');
		$service 	= 	new servicedao();
		$usuarios 	= 	$service->get_my_time_by_empresa_id($id_empresa, $id_usuario,$start_date,$end_date, $team_id);

		echo json_encode($usuarios);
		exit;
	}

	public function getAllUserForTeamProfile()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');

    	$userForCompany = $service->get_all_team_user_for_by_id_company_active($id_empresa);
    	if(!empty($userForCompany)){
				foreach($userForCompany as $index=>$usercompany){
					$userForCompany[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$userForCompany[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
						$userForCompany[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
						$userForCompany[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
					}else{
						$userForCompany[$index]['image'] 	= 	null;
						$userForCompany[$index]['xs_image'] = 	null;
						$userForCompany[$index]['md_image'] = 	null;
					}
				}
			}
			//print_r($userForCompany);die;
    	echo json_encode($userForCompany);
    }

    public function getAllUsersCombo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	

    	$userForCompany = $service->get_all_users_combo_active($id_empresa);
    	if(!empty($userForCompany)){
				foreach($userForCompany as $index=>$usercompany){
					$userForCompany[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$userForCompany[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
						$userForCompany[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
						$userForCompany[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
					}else{
						$userForCompany[$index]['image'] 	= 	null;
						$userForCompany[$index]['xs_image'] = 	null;
						$userForCompany[$index]['md_image'] = 	null;
					}
				}
			}
			//print_r($userForCompany);die;
    	echo json_encode($userForCompany);
    }

    public function getAllUsersFromGestor(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_gestor = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');

    	$usersFromGestor = $service->get_all_users_from_gestor($id_gestor);
    	if(!empty($usersFromGestor)){
				foreach($usersFromGestor as $index=>$usercompany){
					$usersFromGestor[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$usersFromGestor[$index]['image'] 	= 	base_url('assets/img') . '/'. $id_empresa .'/'.$img_url;
						$usersFromGestor[$index]['xs_image'] = 	base_url('assets/img') . '/'. $id_empresa .'/50/'.$img_url;
						$usersFromGestor[$index]['md_image'] = 	base_url('assets/img') . '/'. $id_empresa .'/150/'.$img_url;
					}else{
						$usersFromGestor[$index]['image'] 	= 	null;
						$usersFromGestor[$index]['xs_image'] = 	null;
						$usersFromGestor[$index]['md_image'] = 	null;
					}
				}
			}
			//print_r($usersFromGestor);die;
    	echo json_encode($usersFromGestor);


    }
    public function getAllUsersFromGestorByCycle(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_gestor = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');
		$admin = $this->session->userdata('admin');

    	$id_cycle = $this->input->post('id_cycle');

    	$usersFromGestor = $service->get_all_users_from_gestor_by_cycle($admin,$id_gestor, $id_cycle);
    	if(!empty($usersFromGestor)){
				foreach($usersFromGestor as $index=>$usercompany){
					$usersFromGestor[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$usersFromGestor[$index]['image'] 	= 	base_url('assets/img') . '/'. $id_empresa .'/'.$img_url;
						$usersFromGestor[$index]['xs_image'] = 	base_url('assets/img') . '/'. $id_empresa .'/50/'.$img_url;
						$usersFromGestor[$index]['md_image'] = 	base_url('assets/img') . '/'. $id_empresa .'/150/'.$img_url;
					}else{
						$usersFromGestor[$index]['image'] 	= 	null;
						$usersFromGestor[$index]['xs_image'] = 	null;
						$usersFromGestor[$index]['md_image'] = 	null;
					}
				}
			}
			//print_r($usersFromGestor);die;
    	echo json_encode($usersFromGestor);


    }
	
	public function get_current_user_team_member()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_usuario = $this->session->userdata('id');

    	$userForCompany = $service->get_current_user_team_member($id_usuario);
    	if(!empty($userForCompany)){
				foreach($userForCompany as $index=>$usercompany){
					$userForCompany[$index] = $usercompany;
					if(!empty($usercompany['image'])){
						$img_url = $usercompany['image'];
						$userForCompany[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
						$userForCompany[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
						$userForCompany[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
					}else{
						$userForCompany[$index]['image'] 	= 	null;
						$userForCompany[$index]['xs_image'] = 	null;
						$userForCompany[$index]['md_image'] = 	null;
					}
				}
			}
			//print_r($userForCompany);die;
    	echo json_encode($userForCompany);
    }


	public function getGoalsByParentIdOkr()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$parent_id = $this->input->get('parent_id');

    	$service = new servicedao();

    	$goals = $service->search_all_global_goals_by_parent_id( $parent_id);

		$result = $this->getAllGoalsTreeRecursiveOkr($goals);
    	echo json_encode($result);

    }



    public function getMyCompenciasProfile()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->session->userdata('id');

    	$service = new servicedao();
    	$details = $service->get_user_comencia( $id);

    	echo json_encode($details);

    }

	public function addNewSkillsByCompanyId()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');
    	$new_skills = $this->input->post('new_skill');
    	$new_gerals = $this->input->post('geral');

    	$service = new servicedao();
    	$details = $service->add_new_skills_by_company_id($id_usuario, $id_empresa, $new_skills, $new_gerals);

    	echo json_encode($details);

    }
	public function addNewSkillsByCompanyIdWithoutGeralCargo()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_usuario = 	$this->session->userdata('id');
    	$id_empresa = 	$this->session->userdata('id_empresa');
		$new_skill = 	$this->input->post('new_skill');
    	$service 	= 	new servicedao();
    	$details 	= 	$service->add_new_skills_on_cargo($id_usuario, $id_empresa, $new_skill);

    	echo json_encode($details);

    }

	public function getAllSkillsByCompanyID()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_empresa = $this->session->userdata('id_empresa');

    	$service = new servicedao();
    	$details = $service->get_skills_by_company_id( $id_empresa);

    	echo json_encode($details);

    }
	public function getAllSkillsByCompanyIDCargo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id_empresa = $this->session->userdata('id_empresa');

    	$service = new servicedao();
    	$details = $service->get_skills_by_company_id( $id_empresa);

    	echo json_encode($details);

    }

	public function getMySkillsProfile()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->session->userdata('id');

    	$service = new servicedao();
    	$details = $service->get_my_skills_for_graph( $id);

    	echo json_encode($details);

    }

	public function getMyFeedbacksProfile()
    {
		header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->session->userdata('id');

    	$service = new servicedao();
    	$details = $service->get_my_recieved_feedbacks( $id);
    	if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
						$service = new servicedao();
						$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){

						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
    	echo json_encode($details);

    }

    public function getFeedbackNotification()
    {
		header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->session->userdata('id');

    	$service = new servicedao();
    	$details = $service->get_feedback_notification( $id);

    	echo json_encode($details);

    }

    public function getFeedbackReplyNotification()
    {
		header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->session->userdata('id');

    	$service = new servicedao();
    	$details = $service->get_feedback_reply_notification( $id);

    	echo json_encode($details);

    }

    public function readFeedbackNotification()
	{
		header('Content-type: application/json');

		$id = $this->session->userdata('id');
		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->read_feedback_notification($id);
		echo json_encode($result);
	}

	public function readFeedbackReplyNotification()
	{
		header('Content-type: application/json');

		$id = $this->session->userdata('id');
		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->read_feedback_reply_notification($id);
		echo json_encode($result);
	}
	
	public function getUserFeedbacksProfile()
    {
		header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$this->load->model('servicedao');

    	$id = $this->input->post('user_id');

    	$service = new servicedao();
    	$details = $service->get_my_recieved_private_feedbacks( $id);
    	if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
						$service = new servicedao();
						$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){

						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
    	echo json_encode($details);

    }

	public function getMyGivenFeedbacksProfile()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

			$id = $this->session->userdata('id');

			$service = new servicedao();
			$details = $service->get_my_given_feedbacks( $id);
			if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
					$service = new servicedao();
					$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){
						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
			echo json_encode($details);

	}
	public function getMyPrivateNotesProfile()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

			$id = $this->session->userdata('id');

			$service = new servicedao();
			$details = $service->get_my_private_notes_profile( $id);
			if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
					$service = new servicedao();
					$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){
						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
			//print_r($details);die;
			echo json_encode($details);

	}

	public function getMyRequestedFeedbacksProfile()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

			$id = $this->session->userdata('id');

			$service = new servicedao();
			$details = $service->get_my_requested_feedbacks($id);

			if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
					$service = new servicedao();
					$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){
						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
			echo json_encode($details);

		}
	public function getFeedbackById()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

    		$id = $this->input->get('id');

			$service = new servicedao();
			$details = $service->get_feedback_by_id($id);
			if(!empty($details)){
					$service = new servicedao();
					$details['valore'] = $service->get_valores_by_valore_id( $details['id']);
					if(!empty($details['image'])){
						$details['image'] = base_url('assets/img') . '/'. $details['id_empresa'] .'/'.$details['image'];
						$details['xs_image'] = base_url('assets/img') . '/'. $details['id_empresa'] .'/50/'.$details['image'];
						$details['md_image'] = base_url('assets/img') . '/'. $details['id_empresa'] .'/150/'.$details['image'];
					}else{
						$details['image'] = null;
						$details['xs_image'] = null;
						$details['md_image'] = null;
					}
			}
			echo json_encode($details);

		}
	public function getMyRequestedFeedbacksByMe()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

			$id = $this->session->userdata('id');

			$service = new servicedao();
			$details = $service->get_my_requested_feedbacks_by_me( $id);

			if(!empty($details)){
				foreach($details as $index=>$detail){
					$details[$index] = $detail;
					$service = new servicedao();
					$details[$index]['valore'] = $service->get_valores_by_valore_id( $detail['id']);
					if(!empty($detail['image'])){
						$details[$index]['image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/'.$detail['image'];
						$details[$index]['xs_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/50/'.$detail['image'];
						$details[$index]['md_image'] = base_url('assets/img') . '/'. $detail['id_empresa'] .'/150/'.$detail['image'];
					}else{
						$details[$index]['image'] = null;
						$details[$index]['xs_image'] = null;
						$details[$index]['md_image'] = null;
					}
				}
			}
			echo json_encode($details);

		}

	public function getMyPerformancePotentialProfile()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

			$id = $this->session->userdata('id');

			$service = new servicedao();
			$details = $service->get_my_performance_potential( $id);

			echo json_encode($details[0]);

		}

	public function getUsersPdi()
		{
			header('Content-type: application/json');

			$this->get_acesso_user ( true );

			$this->load->model('servicedao');

			$id = $this->session->userdata('id');

			$service = new servicedao();
			$details = $service->get_users_pdis( $id);

			echo json_encode($details);

		}




    // Coleta todos os times
    public function getAllTeamsMembers()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$teams = $service->get_all_teams_members($id_empresa);

    	echo json_encode($teams);
    }

    // Coleta os detalhes dos times
    public function getTeamsDetails()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_time = $this->input->post('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$teams = $service->get_teams_details_by_id_time($id_time);


    	echo json_encode($teams[0]);
    }

    public function getCargoDetailsById()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_cargo = $this->input->post('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$teams = $service->get_cargo_details_by_id_cargo($id_cargo);


    	echo json_encode($teams);
    }
    public function getIntegrationDetailsById()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );

    	$id_integration = $this->input->post('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$teams = $service->get_integration_details_by_id($id_integration);


    	echo json_encode($teams);
    }

    //M�todo respons�vel por retornar os detalhes de um objetivo global.
    public function getDetailsGoalsById()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	$id = $this->input->get('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$global = $service->get_details_goals_by_id($id, null);

    	echo json_encode($global[0]);
    	exit;
    }

    public function getDetailsGoalsTaticsById()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	$id = $this->input->post('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$global = $service->get_details_goals_tatics_by_id($id, null);
    	echo json_encode($global[0]);
    	exit;
    }

    public function getResultadosDetailsById()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);
    	$id_key 	= $this->input->post('id_key');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$res = $service->get_resultados_details_by_id($id_key);
    	echo json_encode($res);
    	exit;
    }

    public function editKeyresultDetailMedicao()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);
    	$id_key 	= $this->input->post('id_key');
    	$inferior 	= $this->input->post('inferior');
    	$superior 	= $this->input->post('superior');
    	$target 	= $this->input->post('target');
    	$peso 		= $this->input->post('peso');
    	$nome 		= $this->input->post('nome');
    	$descricao 	= $this->input->post('descricao');
    	$forma 		= $this->input->post('forma');
    	$acomp 		= $this->input->post('acomp');
    	$pattern	= $this->input->post('pattern');
    	$calculo	= $this->input->post('calculo');
    	$unidade_meta = $this->input->post('unidade');
    	$direcao = $this->input->post('direcao');
    	$minimo_date 		= $this->input->post('minimo_date');
    	$target_date 		= $this->input->post('target_date');
    	$maximo_date 		= $this->input->post('maximo_date');
    	$sistema_origem 	= $this->input->post('sistema_origem');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$res = $service->edit_key_result_medicao($id_key, $inferior, $superior, $target, $peso, $nome, $descricao, $forma, $sistema_origem, $acomp, $pattern, $calculo, $unidade_meta, $direcao, $minimo_date, $target_date, $maximo_date);
    	echo json_encode($res);
    	exit;
    }

    public function getGoalsTaticsProfile()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);

    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$global = $service->get_goals_tatics_profile($id_empresa,$id_usuario);
    	echo json_encode($global);
    	exit;
    }

    public function getKeyresultHistory()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);

    	$keyresult_id = $this->input->post('keyresult_id');
    	$forma = $this->input->post('forma');

    	$this->load->model('servicedao');

    	$service = new servicedao();
    	
    	$result = $service->get_key_result_history_by_keyresult($keyresult_id, $forma);
    	echo json_encode($result);
    	exit;
    }

    public function editKeyresultHistory()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);

    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id');

    	$id = $this->input->post('id');
    	$id_forma = $this->input->post('id_forma');
    	$key_p = $this->input->post('key_p');
    	$val_p = $this->input->post('val_p');
    	$key_m = $this->input->post('key_m');
    	$val_m = $this->input->post('val_m');
    	$key_v = $this->input->post('key_v');
    	$val_v = $this->input->post('val_v');
    	$key_d = $this->input->post('key_d');
    	$val_d = $this->input->post('val_d');
    	$forma = $this->input->post('forma');
    	$acomp = $this->input->post('acomp');
    	$pattern = $this->input->post('pattern');
    	$id_usuario = $this->session->userdata('id');
    	$keyresult_id = $this->input->post('keyresult_id');
    	$category_num = $this->input->post('category_num');

    	$url_file = array();
      	$base = base_url('assets/empresa') ;

      	if(isset($_FILES["files"]))
		{
		    for($i = 0;  $i < sizeof($_FILES["files"]["name"]); $i++ ){

		          $fileNameDoc = $_FILES["files"]["name"][$i];
		          $target_file_doc = UPLOAD . basename($fileNameDoc);
		          $fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);

		          if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file_doc)) {

		                $nome = $this->createRandWord(40).'.'.$fileTypeDoc;

		                $fileToSave = EMPRESA . '/' . $id_empresa . "/keys/" . $keyresult_id . "/historica/" ;

		                if( !file_exists( EMPRESA . '/' .  $id_empresa )){
		                      mkdir( $fileToSave , 0777, true);
		                      chmod( $fileToSave , 0777);
		                }

		                if( !file_exists( EMPRESA . '/' . $id_empresa . "/keys/" )){
		                      mkdir( $fileToSave , 0777, true);
		                      chmod( $fileToSave , 0777);
		                }

		                if( !file_exists( EMPRESA . '/' . $id_empresa . "/keys/" . $keyresult_id )){
		                      mkdir( $fileToSave , 0777, true);
		                      chmod( $fileToSave , 0777);
		                }

		                if( !file_exists( EMPRESA . '/' . $id_empresa . "/keys/" . $keyresult_id . "/historica/" )){
		                      mkdir( $fileToSave , 0777, true);
		                      chmod( $fileToSave , 0777);
		                }

		                copy ( $target_file_doc , $fileToSave . '/' . $nome);
		                unlink($target_file_doc);

		                $url_file[$i]['anexo'] = ($nome) ;
		                $url_file[$i]['descricao'] = ($base . '/' . $id_empresa . "/keys/" . $keyresult_id . "/historica/".$nome) ;
		          }else{
		                $out ['error'] = true;
		                $out ['error_message'] = 'Erro ao Realizar o upload de um dos Arquivos.';
		                echo json_encode($out);
		                exit;
		          }

		    }
		}

    	$this->load->model('servicedao');

    	$service = new servicedao();
    	
    	$result = $service->edit_key_result_history($id, $id_forma, $key_p, $val_p, $key_m, $val_m, $key_v, $val_v, $key_d, $val_d, $forma, $acomp, $pattern, $id_usuario, $keyresult_id);
    	if ($result == true && sizeof($url_file) > 0) {
    		$result = $service->add_contrato_anexo($url_file, $keyresult_id, $category_num, $id_usuario);
    	}
    	echo json_encode($result);
    	exit;
    }


    public function protege($string)
    {
		$string = preg_replace('/[^[:alpha:]_]/', '',$string);
 		return	$string= preg_replace(("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i"),"",$string);
    }
   
    public function exportOkr()
    {
    	header('Content-type: application/json');

    	$id_empresa = $this->session->userdata('id_empresa');
    	$times_id = $this->protege(explode(',', $this->input->post('teams')));
    	$cycles_id = $this->protege(explode(',', $this->input->post('cycles')));
    	$year = $this->protege($this->input->post('year'));
    	$responsavels = $this->protege(explode(',', $this->input->post('responsavels')));

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$id_empresa = $id_empresa;
    	$times_id   = $times_id;
    	$cycles_id  = $cycles_id;
    	$year   = $year;
    	$responsavels  = $responsavels;

    	

    	$result = $service->get_okr_export_list($id_empresa, $times_id, $cycles_id, $year, $responsavels);
    	// echo json_encode($result);

        $filename = "okr-".date('d-m-Y').".csv";

		
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
		$data 	= 	$this->dbutil->csv_from_result($result, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;
        force_download($filename, $data);

    }

    // ADS METODOS 22/07
    public function editarNomeGlobal()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'nome', 'Nome', 'required' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array('nome' => $this->input->post('nome'));

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['nome'] =$data['nome'];
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o Nome não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function editTypeTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('tipo' => $this->input->post('tipo'));

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->edit_objetivo($id, $data)){
            $out ['error'] = false;
            $out ['error_message'] = '';
            if($data['tipo'] == 'i'){
                $tipo = 'Individual';
            }else if($data['tipo'] == 'c'){
                $tipo = 'Shared';
            }
            else if($data['tipo'] == 't'){
                $tipo = 'Team';
            }
            $out ['tipo'] =$tipo;
            $global = $service->get_details_goals_tatics_by_id($id, null);
            $goal_data = $global[0];
            $out ['tatic'] =$goal_data;
        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        echo json_encode($out);
        exit;
    }
    public function removeCycleTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('id_ciclo' => $this->input->post('id_ciclo'));

        $this->load->model('servicedao');
        $service = new servicedao();

        $cycle_data = $service->get_cycles_by_id_objetivo_related($id);
        if(count($cycle_data) > 1){
        	if($service->remover_ciclos_objetivo_by_id_objetivo($id, $data)){

            $cycles = $service->get_cycles_by_id_objetivo_related($id);
            $out ['error'] = false;
            $out ['error_message'] = '';
            $out ['cycles'] = $cycles;

	        }else{
	            $out ['error'] = true;
	            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
	        }
        }else{
        	 $out ['error'] = true;
	            $out ['error_message'] = 'Atleast one quarter must be selected';
	            $out ['cycles'] = $cycle_data;
        }

        echo json_encode($out);
        exit;
    }

    public function removeSharedTeam()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('id_time' => $this->input->post('id_time'));

        $this->load->model('servicedao');
        $service = new servicedao();
        $teams = $service->get_shared_teams_by_id_objectivo($id);
		$team 	= 	$service->get_team_by_objid($id);
		if(!empty($team)){
			$teams[]	=	$team[0];
		}
        if(count($teams) >= 2){
        	if($service->remover_teams_objetivo_by_id_objetivo($id, $data)){  
			
            $out ['error'] = false;
            $out ['error_message'] = '';
            $out ['shared_teams'] = $teams;

	        }else{
	            $out ['error'] = true;
	            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
	        }
        }else{
        	$out ['error'] = true;
            $out ['error_message'] = 'At least one team must be selected';
            $out ['shared_teams'] = $teams;
        }

        echo json_encode($out);
        exit;
    }
    public function addCycleTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('id_ciclo' => $this->input->post('id_ciclo'));

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->add_ciclos_objetivo_by_id_objetivo($id, $data)){

            $cycles = $service->get_cycles_by_id_objetivo_related($id);
            $out ['error'] = false;
            $out ['error_message'] = '';
            $out ['cycles'] = $cycles;

        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        echo json_encode($out);
        exit;
    }
    public function addSharedTeamTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('id_time' => $this->input->post('id_time'));

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->add_teams_data_objetivo_by_id_objetivo($id, $data)){

            $teams 	= 	$service->get_shared_teams_by_id_objectivo($id);
            $team 	= 	$service->get_team_by_objid($id);
			$teams[]	=	$team[0];
            $out ['error'] = false;
            $out ['error_message'] = '';
            $out ['shared_teams'] = $teams;

        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        echo json_encode($out);
        exit;
    }
    public function editStatusTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('situacao' => $this->input->post('status'));

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->edit_objetivo($id, $data)){
            $out ['error'] = false;
            $out ['error_message'] = '';
           
            $out ['status'] =$this->input->post('status');
        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        echo json_encode($out);
        exit;
    }

    public function editTagsTatic()
    {
        header('Content-type: application/json');
        $this->get_acesso_user ( true );
        $out = array();


        $tags 	= 	explode( ",", $this->input->post('tags'));
        $id 	= 	$this->input->post('id');

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->edit_tags_objetivo($id, $tags)){
			$out	=	$service->get_etiquetas_objetivo($id);
            //$out ['active'] =$data['ativo'];
        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        // if ( $service->update_resultados_chave( $data_to_store ) == TRUE) {

        //     $rchave = $service->get_rchave_by_objetivo_tatico($id_objetivo);

        //     $out ['error'] = false;
        //     $out ['error_message'] = false;
        //     $out ['keys'] = $rchave;

        // } else {
        //     $out ['error'] = true;
        //     $out ['error_message'] = 'Erro ao Resultado Chave.';
        // }

        echo json_encode($out);
    }

    public function editAtivoTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('ativo' => $this->input->post('active'));

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->edit_objetivo($id, $data)){
            $out ['error'] = false;
            $out ['error_message'] = '';
            $out ['active'] =$data['ativo'];
        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        echo json_encode($out);
        exit;
    }
    public function editCorTatic()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        $id = $this->input->post('id');
        $data = array('cor' => $this->input->post('value'));

        $this->load->model('servicedao');
        $service = new servicedao();

        if($service->edit_objetivo($id, $data)){
            $out ['error'] = false;
            $out ['error_message'] = '';
            $out ['cor'] =$data['cor'];
        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Ocorreu um erro ao tentar renomear o objetio. Por favor tente mais tarde.';
        }

        echo json_encode($out);
        exit;
    }

    public function editarResponsavelGlobal()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'responsavel', 'Responsavel', 'required' );

    		if ($this->form_validation->run ()) {

		    	$id = $this->input->post('id');
		    	$data = array('responsavel' => $this->input->post('responsavel'));
		    	$this->load->model('servicedao');
		    	$service = new servicedao();

		    	$responsavel_data = $service->get_objective_details_by_id($id);
		    	if($responsavel_data['responsavel'] != ''){

		    	if($service->edit_objetivo($id, $data)){

		    		$this->load->model('usuariosdao');
		    		$usr = new usuariosdao();

                    $usuario = $usr->get_user_logged_in($this->input->post('responsavel'));
                    $out ['error_message'] = '';
                    $user_img = $usuario[0]['image'];
                    if($user_img != ''){
                        $image    = base_url('assets/img') . '/'. $usuario[0]['id_empresa'] .'/'.$user_img;
                        $xs_image = base_url('assets/img') . '/'. $usuario[0]['id_empresa'] .'/50/'.$user_img;
                        $md_image = base_url('assets/img') . '/'. $usuario[0]['id_empresa'] .'/150/'.$user_img;
                    }else{
                        $image    = null;
                        $xs_image = null;
                        $md_image = null;
                    }
                    

		    		$out ['responsible'] = array('id' => $usuario[0]['id'], 'name' => $usuario[0]['name'], 'image' =>$image, 'xs_image' =>$xs_image, 'md_image' =>$md_image);

			    	}else{
			    		$out ['error'] = true;
			    		$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir o responsavel do Objetivo. Por favor tente mais tarde.';
			    	}
		    	}else{
		    		$out ['error'] = true;
		    		$out ['error_message'] = 'Atleast one responsavel must be selected';
		    	}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o Responsavel não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function editarCorObjetivo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'cor', 'Cor', '' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array('cor' => $this->input->post('cor'));

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['cor'] =$data['cor'];
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir a cor do Objetivo. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou a Cor não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function editarDescricaoObjetivo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'descricao', 'Descrição', '' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array('descricao' => $this->input->post('descricao'));

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['descricao'] =$data['descricao'];
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir a Descrição. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou a Descrição não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }
	
	public function editGoalParentData()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );

    		if ($this->form_validation->run ()) {
			
    			$id 			= 	$this->input->post('id');
    			$estrategico = $this->input->post('estrategico');
				if($estrategico && $estrategico == 1){
					$id_parent	=	0;
				}else{
					$estrategico 	= 	0;
					$id_parent	=	$this->input->post('parent_id');
				}
				/* $link_type	=	$this->input->post('link_type'); */
				if (trim($id_parent) === ''){$id_parent	=0;}
    			$data = array('parent_id' => $id_parent);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
					$goal_data 	=	$service->get_details_goals_tatics_by_id($id, null);
					if(isset($goal_data[0])){
						$out ['goaldata'] =	$goal_data[0];
					}else{
						$out ['goaldata'] =	[];
					}
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir a Descrição. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou a Descrição não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    //TODO : REVISAR ESSAS REGRAS
    public function removerObjetivo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$id_usuario = $this->session->userdata('id');
    			$admin = $this->session->userdata('admin');

    			$data = array(
    					'ativo' => 0,
    					'usuario_atualizador' => $id_usuario,
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->userResponsibleObjective($id, $id_usuario) || $admin){
    				if($service->edit_objetivo($id, $data)){
    					$out ['error'] = false;
    					$out ['error_message'] = '';
    					$out ['descricao'] =$data['descricao'];
    				}else{
    					$out ['error'] = true;
    					$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir a Descrição. Por favor tente mais tarde.';
    				}
    			}else{
    				$out['error'] = true;
   					$out['error_message'] = 'O usuário não possui permissão para executar essa ação.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou a Descrição não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function removerCoResponsavelGlobal()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'responsavel', 'Responsavel', 'required' );

    		if ($this->form_validation->run ()) {


    			$id = $this->input->post('id');
    			$idUsuario = $this->input->post('responsavel');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->delete_coresponsavel_objetivo($id, $idUsuario)){

    				$coResp = $service->get_corresponsaveis_objetivo($id);
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['coresponsaveis'] = $coResp;
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir o responsavel do Objetivo. Por favor tente mais tarde.';
    			}

	    	}else{

	    		$out ['error'] = true;
	    		$out ['error_message'] = 'O id do Objetivo ou o Responsavel não estão preechidos.';
	    	}


	    }else{
	    	$out ['error'] = true;
	    	$out ['error_message'] = 'Nenhum formulário foi submetido.';

	    }

    	echo json_encode($out);
    	exit;

    }

    public function addCoResponsavelGlobal()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id_usuario', 'Usuário', 'required' );
    		$this->form_validation->set_rules ( 'id', 'Objetivo', 'required' );
    		$this->form_validation->set_rules ( 'id_time', 'Time', '' );

    		if ($this->form_validation->run ()) {

		    	$id = $this->input->post('id');
		    	$id_user_session = $this->session->userdata('id');
		    	$data = array(
		    			'id_objetivo' => $id,
		    			'id_usuario' => $this->input->post('id_usuario'),
		    			'id_time' => $this->input->post('id_time'),

		    	);

		    	$this->load->model('servicedao');
		    	$service = new servicedao();

		    	if($service->add_objetivo_responsaveis($data)){

		    		$data['usuario_atualizador'] = $id_user_session;
		    		$data['ativo'] =  1;

		    		$this->load->model('chatdao');
		    		$chat = new chatdao();

		    		if($chat->addUsuarioCanalById_objetivo($data)){
		    			$out ['error'] = false;
		    			$out ['error_message'] = '';
		    		}else{
		    			$out ['error'] = true;
		    			$out ['error_message'] = 'O usuário adicioando ao Global não foi adicionado ao Grupo.';

		    		}

		    		$coResp = $service->get_corresponsaveis_objetivo($id);
		    		$out ['coresponsaveis'] = $coResp;
		    	}else{
		    		$out ['error'] = true;
		    		$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir o responsavel do Objetivo. Por favor tente mais tarde.';
		    	}
    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o Responsavel não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function removerTagObjetivo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {


    		$this->form_validation->set_rules ( 'id_etiqueta', 'TAG', 'required' );
    		$this->form_validation->set_rules ( 'id', 'Objetivo', 'required' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$id_etiqueta = $this->input->post('id_etiqueta');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->delete_etiqueta_objetivo($id, $id_etiqueta)){

    				$etiquetas = $service->get_etiquetas_objetivo($id);
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['etiquetas'] = $etiquetas;
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar Remover a TAG do Objetivo. Por favor tente mais tarde.';
    			}
    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou a TAG não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }
    //
    public function addTagObjetivo()
    {

    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$id_usuario = $this->session->userdata('id');

    		$this->form_validation->set_rules ( 'id_etiqueta', 'TAG', 'required' );
    		$this->form_validation->set_rules ( 'id', 'Objetivo', 'required' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array(
    					'id_objetivo' => $this->input->post('id'),
    					'id_etiqueta' => $this->input->post('id_etiqueta'),
    					'usuario_atualizador' => $id_usuario,
    					'id_empresa' => $this->session->userdata('id_empresa')

    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->add_etiqueta_objetivo($data)){
    				$etiquetas = $service->get_etiquetas_objetivo($id);
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['etiquetas'] = $etiquetas;

    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar Adicionar uma TAG do Objetivo. Por favor tente mais tarde.';
    			}
    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o TAG não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;

    }
    // tested
    public function editarTimesPesos()
    {

    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id_objetivo', 'Objetivo', 'required' );
    		$this->form_validation->set_rules ( 'teams', 'Times/Pesos', '' );

    		if ($this->form_validation->run ()) {

    			$id_objetivo = $this->input->post('id_objetivo');
    			$id_usuario = $this->session->userdata('id');

    			$data = $this->input->post('teams');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->editar_objetivo_peso_times($id_usuario, $id_objetivo, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['teams'] = $data;

    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir os Times/Pesos. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'Os Times/Pesos não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;

    }

    public function editarTimeObjetivo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'id_time', 'Time', '' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array('id_time' => $this->input->post('id_time'));

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
                    $service->update_team_peso($data['id_time'],$id);

    				$times = $service->get_team_by_id_for_goals($data['id_time']);
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['team'] = isset($times[0])?$times[0]:[];
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir o Time do Objetivo. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o Time não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function change_user_password()

	{
		header ( 'Content-type: application/json' );
		$this->get_acesso_user ( true );
		$id_empresa = $this->session->userdata('id_empresa');

		$this->load->model ( 'servicedao' );
		$service = new servicedao();
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password');
		$id_usuario = $this->input->post('id');
		$result 	= $service->update_usuario_password($id_usuario,$new_password,$current_password);
		$out ['error'] 			= 	!$result;
		$out ['error_message'] 	= 	'';
		echo json_encode($out);
    	exit;
	}

	public function updateEstrategico()
	{
		header('Content-type: application/json');

		$tatic_id 		= 	$this->input->post('taticid');
		$estrategico 	= 	$this->input->post('estrategico');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->update_estrategico($tatic_id, $estrategico);
		echo json_encode($result);
	}

    // VERIFICAR AS REGRAS  DE CICLOS
    public function addObjetivoTaticos()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		//$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );
    		$this->form_validation->set_rules ( 'parent_id', 'Objetivo Global', '' );
    		$this->form_validation->set_rules ( 'team', 'Time', '' );
    		$this->form_validation->set_rules ( 'weight', 'Peso', 'required' );
    		$this->form_validation->set_rules ( 'cycles', 'Ciclos', 'required' );
			
    		if ($this->form_validation->run ()) {

    			$tags 			= 	explode( ",", $this->input->post('tags'));
    			$ciclos 		= 	$this->input->post('cycles');
    			$responsaveis 	= 	$this->input->post('resptimes');
    			
    			$id_parent 		= 	($this->input->post('parent_id')!=0?$this->input->post('parent_id'):0);
    			if($this->input->post('addType')){
    				$id_parent = null;
    			}
    			$tipo			=	$this->input->post('tipo');

                if($tipo=="t" || $tipo=="c"){
                    $responsavel    =   $this->session->userdata('id');
                    $resptimes      =   $responsaveis;
                }else if($tipo=="i"){
                    $user           =   $this->input->post('user');
                    if(strpos($user, ":") > 0){
                        $exp            =   explode(":", $user);
                        $responsavel    =   isset($exp[1])?$exp[1]:0;
                    }else{
                        $responsavel    =   $user;
                    }
                    $resptimes      =   array();
                }else{
                        $responsavel    =   $this->input->post('user');
                        $resptimes      =   array();
                }
				if($this->input->post('estrategico')==1){
					$id_parent	=	null;
				}
                $data_to_store = array (
                    'parent_id' => $id_parent,
                    'tipo' => $this->input->post('tipo'),
                    'nome' => $this->input->post('name'),
                    'descricao' => $this->input->post('description'),
                    'id_empresa' => $this->session->userdata('id_empresa'),
                    'responsavel' => $responsavel,
                    'usuario_atualizador' => $this->session->userdata('id'),
                    'peso' => $this->input->post('weight'),
                    'id_time' => $this->input->post('team'),
                    'usuario' => $this->session->userdata('id'),
                    'ativo' => 1,
                    'tags' => $tags,
                    'ciclos' => $ciclos,
                    'responsaveis' => $resptimes,
                    'estrategico' => $this->input->post('estrategico')
                );
				if($this->input->post('color')){
					$data_to_store['cor'] = $this->input->post('color');	
				}

                $this->load->model('servicedao');
                $service        =   new servicedao();
                $id_objetivo    =   $service->add_objetivos_taticos($data_to_store) ;
                if ($id_objetivo) {
                    $keyresults             =   $this->input->post('keyresults');
                    if(!empty($keyresults) && count($keyresults)>0){
                        foreach($keyresults as $key_result){
                        	$medicao        = 0 ;
    						$progresso      = 0;
    						$manutencao = 0;
    						$ponto_partida = $key_result['start'];
    						$meta = 	$key_result['goal'];	

    					

 
							if($key_result['type']==0){
								$tipo_calculo	=	0;
								$direcao		=	0;
								$type			=	0;
							}else if($key_result['type']==1){
								$tipo_calculo	=	0;
								$direcao		=	1;
								$type		=	1;
							}else if($key_result['type']==2){
								$tipo_calculo	=	1;
								$direcao		=	1;
								$type			=	2;
							}

							
							if($ponto_partida == $meta){
								$progresso = 100;
								$medicao = $key_result['start'];
								$manutencao = 1;

							}	

							$data_key 	=	array(


												'id_objetivo'=>$id_objetivo,
												'id_empresa'=>$this->session->userdata('id_empresa'),
												'id_time'=>$this->input->post('team'),
												'tags'=>$tags,
                                                'direcao'=>$direcao,
												'tipo_calculo'=>$tipo_calculo,
												'type'=>$type,
												'nomeRChave'=>$key_result['name'],
                                                'frequencia'=>4,
												'peso'=>1,
												'medicao'=>$medicao,
												'progresso'=>$progresso,
												'manutencao'=> $manutencao,
												'unidade_meta'=>$key_result['medida'],
												'ponto_partida'=>$key_result['start'],
												'meta_final_prevista'=>$key_result['goal'],
												'responsavel'=>$this->session->userdata('id'),
												'responsaveis'=>$responsaveis,
												'usuario_atualizador'=>$this->session->userdata('id'),
											);
							$service->add_resultados_chave($data_key,FALSE);
						}
					}
					if($id_parent){
						$tatics 			= 	$service->get_objetivos_tatico_by_id_objetivo($id_parent,$this->session->userdata('id'));
						$taticswithteams 	= 	$service->get_teamwithtatics_by_id_objetivo($id_parent);
					}else{
						$tatics 			= 	$service->get_objetivos_tatico_by_id_objetivo($id_objetivo,$this->session->userdata('id'),'self');
						$taticswithteams 	= 	$service->get_teamwithtatics_by_id_objetivo($id_objetivo,'self');
					}
    				$out ['error'] = false;
    				$out ['tatics'] = $tatics;
    				$out ['added_id'] = $id_objetivo;
    				$out ['teamsWithTatics'] = $taticswithteams;
    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Cadastrar Objetivo Tático';
    			}
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}

    	echo json_encode($out);
    	exit();
    }

    public function editarPesoTaticos()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'weight', 'Peso', '' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array('peso' => $this->input->post('weight'));

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['peso'] =$data['peso'];
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir o Peso. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o Peso não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function editarAvaliacaoObjetivo()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user(true);


    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'id', 'required' );
    		$this->form_validation->set_rules ( 'avaliacao', 'Avaliação', '' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = array('avaliacao' => $this->input->post('avaliacao'));

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->edit_objetivo($id, $data)){
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['avaliacao'] =$data['avaliacao'];
    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar redefinir a Avaliação. Por favor tente mais tarde.';
    			}

    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou a Avaliação não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;
    }

    public function editarCiclosTatico()
    {

    	header('Content-type: application/json');

    	$this->get_acesso_user(true);

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$id_usuario = $this->session->userdata('id');

    		$this->form_validation->set_rules ( 'id', 'Objetivo', 'required' );
    		$this->form_validation->set_rules ( 'cycles', 'Ciclos', 'required' );

    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$data = $this->input->post('cycles');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->editar_ciclos_objetivo_by_id_objetivo($id, $data)){

    				$cycles = $service->get_cycles_by_id_objetivo_related($id);
    				$out ['error'] = false;
    				$out ['error_message'] = '';
    				$out ['cycles'] = $cycles;

    			}else{
    				$out ['error'] = true;
    				$out ['error_message'] = 'Ocorreu um erro ao tentar Editar Ciclos do Objetivo. Por favor tente mais tarde.';
    			}
    		}else{

    			$out ['error'] = true;
    			$out ['error_message'] = 'O id do Objetivo ou o Ciclos não estão preechidos.';
    		}


    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Nenhum formulário foi submetido.';

    	}

    	echo json_encode($out);
    	exit;

    }

    // ADS METODOS 22/07

    // ADS METODOS 25/07

    public function addResultadoChave()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id_tatic', 'Objetivo Tatico', 'required' );
    		// $this->form_validation->set_rules ( 'id_team', 'Time', 'required' );
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		//$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
    		$this->form_validation->set_rules ( 'frequency', 'Frequência', 'required' );
    		$this->form_validation->set_rules ( 'measurement', 'Unidade', 'required' );
    		$this->form_validation->set_rules ( 'goal', 'Meta', 'required' );
    		$this->form_validation->set_rules ( 'weight', 'Peso', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );

    		$this->form_validation->set_rules ( 'responsibles', 'Responsáveis', '' );
    		$this->form_validation->set_rules ( 'tags', 'Tags', '' );

    		$ponto_partida = $this->input->post('ponto_partida');
            $meta = $this->input->post('goal');
            $inferior = $this->input->post('inferior');
            $superior = $this->input->post('superior');
            $direcao = 1;
            $tipo_calculo = $this->input->post('tipo_calculo');

    		if ($this->form_validation->run ()) {
				
				$this->load->model('servicedao');
    			$service = new servicedao();

    			$tags = explode( ",", $this->input->post('tags'));
    			$responsaveis 	= $this->input->post('responsibles');
    			$id_time 		= $this->input->post('id_team');
    			$id_objetivo 	= $this->input->post('id_tatic');
    			$manutencao 	= $this->input->post('chkd_manutencao');
    			$periodicidade 	= $this->input->post('periodicidade');
    			$medicao        = 0;
    			$progresso      = 0;

				
				if($tipo_calculo==0){ // menor melhor
					$tipo_calculo	=	0;
					$direcao		=	0;
					$type			=	0;
				}else if($tipo_calculo==1){ // maior melhor
					$tipo_calculo	=	0;
					$direcao		=	1;
					$type		=	1;
				}else if($tipo_calculo==2){  //plano de ação
					$tipo_calculo	=	1;
					$direcao		=	1;
					$type			=	2;
				}
				if($ponto_partida > $meta && $type < 2){
            		$direcao = 0;
            		$type	=  0;
          	    } else if ($ponto_partida < $meta && $type < 2) {	
            		$direcao = 1;	
            		$type    = 1;
            	}	

				if($manutencao == 1){
					$manutencao = 1;
					$ponto_partida = $this->input->post('goal');
					$medicao = $this->input->post('goal');
					$progresso = 100;
				}else{
					$manutencao = 0;
					$ponto_partida = $this->input->post('ponto_partida');
				}
				
    			$data_to_store = array (
    					'id_objetivo' 			=> $id_objetivo,
    					'id_time' 				=> $id_time,
    					'nomeRChave' 			=> $this->input->post('name'),
    					'descricao' 			=> $this->input->post('description'),
    					'frequencia' 			=> $this->input->post('frequency'),
    					'unidade_meta' 			=> $this->input->post('measurement'),
    					'meta_final_prevista' 	=> $this->input->post('goal'),
    					'ponto_partida' 		=> $ponto_partida,
    					'peso' 					=> $this->input->post('weight'),
    					'responsavel' 			=> $this->input->post('user'),
    					'usuario_atualizador' 	=> $this->session->userdata('id'),
    					'medicao' 				=> $medicao,
    					'progresso' 			=> $progresso,
    					'ativo' 				=> 1,
    					'responsaveis' 			=> $responsaveis,
    					'tags' 					=> (sizeof($tags) > 0 ) ? $tags : array(),
    					'id_empresa' 			=> $this->session->userdata('id_empresa'),
    					'tipo_calculo' 			=> $tipo_calculo,
    					'type' 					=> $type,
    					'direcao' 				=> $direcao,
    					'id_integracao' 		=> $this->input->post('id_integracao'),
    					'frequencia_int' 		=> $this->input->post('frequencia_int'),
    					'manutencao' 			=> $manutencao,
    					'periodicidade' 		=> $periodicidade,
    					'limite_inferior'		=> $inferior,
    					'limite_superior'		=> $superior

    			);

    			if ( $service->add_resultados_chave( $data_to_store,TRUE ) == TRUE) {

    				$rchave = $service->get_rchave_by_objetivo_tatico($id_objetivo);

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['keys'] = $rchave;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Resultado Chave.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}

    	echo json_encode($out);
    	exit();
    }

    public function addIndicador()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id_tatic', 'Objetivo Tatico', 'required' );
    		// $this->form_validation->set_rules ( 'id_team', 'Time', 'required' );
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		//$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
    		$this->form_validation->set_rules ( 'frequency', 'Frequência', 'required' );
    		$this->form_validation->set_rules ( 'measurement', 'Unidade', 'required' );
    		$this->form_validation->set_rules ( 'goal', 'Meta', 'required' );
    		$this->form_validation->set_rules ( 'weight', 'Peso', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );

    		$this->form_validation->set_rules ( 'responsibles', 'Responsáveis', '' );
    		$this->form_validation->set_rules ( 'tags', 'Tags', '' );

            $meta = $this->input->post('goal');
            $inferior = $this->input->post('inferior');
            $superior = $this->input->post('superior');
            $direcao = 1;
            $tipo_calculo = $this->input->post('tipo_calculo');

    		if ($this->form_validation->run ()) {
				
				$this->load->model('servicedao');
    			$service = new servicedao();

    			$tags = explode( ",", $this->input->post('tags'));
    			$responsaveis 	= $this->input->post('responsibles');
    			$id_time 		= $this->input->post('id_team');
    			$id_objetivo 	= $this->input->post('id_tatic');
    			$periodicidade 	= $this->input->post('periodicidade');
    			$medicao        = 0;
    			$progresso      = 0;

				
				if($tipo_calculo==0){ // menor melhor
					$tipo_calculo	=	0;
					$direcao		=	0;
					$type			=	0;
				}else if($tipo_calculo==1){ // maior melhor
					$tipo_calculo	=	0;
					$direcao		=	1;
					$type		=	1;
				}else if($tipo_calculo==2){  //plano de ação
					$tipo_calculo	=	1;
					$direcao		=	1;
					$type			=	2;
				}
				
    			$data_to_store = array (
    					'id_objetivo' 			=> $id_objetivo,
    					'id_time' 				=> $id_time,
    					'nomeRChave' 			=> $this->input->post('name'),
    					'descricao' 			=> $this->input->post('description'),
    					'frequencia' 			=> $this->input->post('frequency'),
    					'unidade_meta' 			=> $this->input->post('measurement'),
    					'meta_final_prevista' 	=> $this->input->post('goal'),
    					'peso' 					=> $this->input->post('weight'),
    					'responsavel' 			=> $this->input->post('user'),
    					'usuario_atualizador' 	=> $this->session->userdata('id'),
    					'medicao' 				=> $medicao,
    					'progresso' 			=> $progresso,
    					'ativo' 				=> 1,
    					'responsaveis' 			=> $responsaveis,
    					'tags' 					=> (sizeof($tags) > 0 ) ? $tags : array(),
    					'id_empresa' 			=> $this->session->userdata('id_empresa'),
    					'tipo_calculo' 			=> $tipo_calculo,
    					'type' 					=> $type,
    					'direcao' 				=> $direcao,
    					'id_integracao' 		=> $this->input->post('id_integracao'),
    					'frequencia_int' 		=> $this->input->post('frequencia_int'),
    					'periodicidade' 		=> $periodicidade,
    					'limite_inferior'		=> $inferior,
    					'limite_superior'		=> $superior,
    					'forma_calculo'			=> $this->input->post('forma'),
    					'tipo_acompanhamento'	=> $this->input->post('accompan'),
    					'pattern'		=> $this->input->post('pattern'),
    					'forma_atualizacao' => 2
    			);

    			if ($this->input->post('accompan') == 1) {
    				$data_to_store['limite_inferior'] = null;
    				$data_to_store['meta_final_prevista'] = 0;
    				$data_to_store['limite_superior'] = null;
    				$minimo_date = $this->input->post('minimo_date');
    				if ($minimo_date != '') {
    					// $minimo_date =	strtotime(str_replace("/","-", $minimo_date));
    					// $minimo_date = date("Y-m-d", $minimo_date);
    					$minimo_date = date_create_from_format('d/m/Y', $minimo_date);
						$minimo_date = date_format($minimo_date, 'Y-m-d');
    				} else {
    					$minimo_date = null;
    				}
    				
    				$data_to_store['minimo_date'] = $minimo_date;
    				
    				$target_date = $this->input->post('target_date');
    				if ($target_date != '') {
    					$target_date = date_create_from_format('d/m/Y', $target_date);
						$target_date = date_format($target_date, 'Y-m-d');
    				} else {
    					$target_date = null;
    				}

    				$data_to_store['target_date'] = $target_date;

    				$maximo_date = $this->input->post('maximo_date');
    				if ($maximo_date != '') {
    					$maximo_date = date_create_from_format('d/m/Y', $maximo_date);
						$maximo_date = date_format($maximo_date, 'Y-m-d');
    				} else {
    					$maximo_date = null;
    				}

    				$data_to_store['maximo_date'] = $maximo_date;
    			}

    			if ( $service->add_resultados_chave( $data_to_store,TRUE ) == TRUE) {

    				$rchave = $service->get_rchave_by_objetivo_tatico($id_objetivo);

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['keys'] = $rchave;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Resultado Chave.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}

    	echo json_encode($out);
    	exit();
    }

    public function importResultadoChave()
    {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$user_id 	= 	$this->session->userdata('id');
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$tatic_id = $this->input->post('tatic_id');

    	$data = $service->get_user_team($id_empresa,$user_id);
		$id_time	=	$data['id_time'];

		$key_id = $this->input->post('key_id');

    	$data_to_store = array (
				'id_objetivo' 			=> $tatic_id,
				'id_time' 				=> $id_time,
				'nomeRChave' 			=> $this->input->post('nomeRChave'),
				'descricao' 			=> $this->input->post('descricao'),
				'frequencia' 			=> $this->input->post('frequencia'),
				'unidade_meta' 			=> $this->input->post('unidade_meta'),
				'ponto_partida' 		=> $this->input->post('ponto_partida'),
				'meta_final_prevista' 	=> $this->input->post('meta_final_prevista'),
				'responsavel' 			=> $user_id,
				'usuario_atualizador' 	=> $user_id,
				'ativo' 				=> 1,
				'tipo_calculo' 			=> $this->input->post('tipo_calculo'),
				'type' 					=> $this->input->post('type'),
				'direcao' 				=> $this->input->post('direcao'),
				'id_integracao' 		=> $this->input->post('id_integracao'),
				'frequencia_int' 		=> $this->input->post('frequencia_int'),
				'manutencao' 			=> $this->input->post('manutencao'),
				'periodicidade' 		=> $this->input->post('periodicidade'),
				'medicao' 				=> $this->input->post('medicao'),
				'medicao_projetada' 	=> $this->input->post('medicao_projetada'),
				'desempenho' 			=> $this->input->post('desempenho'),
				'progresso' 			=> $this->input->post('progresso'),
				'progresso_projetado' 	=> $this->input->post('progresso_projetado'),
				'progresso_ajustado' 	=> $this->input->post('progresso_ajustado') ? $this->input->post('progresso_ajustado') : null,
				'peso'			 		=> $this->input->post('peso'),
				'link'			 		=> 1,
				'limite_inferior' 		=> $this->input->post('limite_inferior'),
				'limite_superior' 		=> $this->input->post('limite_superior'),
				'class_medicao' 		=> $this->input->post('class_medicao'),
				'pattern' 				=> $this->input->post('pattern'),
				'id_kr_sistema_origem' 	=> $this->input->post('id_kr_sistema_origem'),
				'forma_atualizacao' 	=> $this->input->post('forma_atualizacao')

		);

		if ( $service->import_resultados_chave( $data_to_store, $user_id, $key_id, TRUE ) == TRUE) {

			// $rchave = $service->get_rchave_by_objetivo_tatico($tatic_id);

			$out ['error'] = false;
			$out ['error_message'] = false;

		} else {
			$out ['error'] = true;
			$out ['error_message'] = 'Erro ao Resultado Chave.';
		}

		echo json_encode($out);
    	exit();
    }

    public function editarResultadoChave()
    { 
        header('Content-type: application/json');
        $this->get_acesso_user ( true );
        $out = array();

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

            $this->form_validation->set_rules ( 'id', 'Resultado Chave', 'required' );
            $this->form_validation->set_rules ( 'id_tatic', 'Objetivo Tatico', 'required' );
            //$this->form_validation->set_rules ( 'id_team', 'Time', 'required' );
            $this->form_validation->set_rules ( 'name', 'Nome', 'required' );
        //  $this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
            $this->form_validation->set_rules ( 'frequency', 'Frequência', 'required' );
            $this->form_validation->set_rules ( 'measurement', 'Unidade', 'required' );
            $this->form_validation->set_rules ( 'goal', 'Meta', 'required' );
            $this->form_validation->set_rules ( 'weight', 'Peso', 'required' );
            $this->form_validation->set_rules ( 'user', 'Responsável', 'required' );

            $this->form_validation->set_rules ( 'responsibles', 'Responsáveis', '' );
            $this->form_validation->set_rules ( 'tags', 'Tags', '' );

            $ponto_partida = $this->input->post('ponto_partida');
            $meta = $this->input->post('goal');
            $inferior = $this->input->post('inferior');
            $superior = $this->input->post('superior');
            $direcao = 1;
            $tipo_calculo = $this->input->post('tipo_calculo');

         
            if ($this->form_validation->run ()) {


                $tags 			= explode( ",", $this->input->post('tags'));
                $responsaveis 	= $this->input->post('responsibles');
                $id 			= $this->input->post('id');
                $id_objetivo 	= $this->input->post('id_tatic');
                $periodicidade 	= $this->input->post('periodicidade');
                $manutencao 	= $this->input->post('chkd_manutencao');




				
				if($tipo_calculo==0){ // menor melhor
					$tipo_calculo	=	0;
					$direcao		=	0;
					$type			=	0;
				}else if($tipo_calculo==1){ // maior melhor
					$tipo_calculo	=	0;
					$direcao		=	1;
					$type		=	1;
				}else if($tipo_calculo==2){  //plano de ação
					$tipo_calculo	=	1;
					$direcao		=	1;
					$type			=	2;
				}
				if($ponto_partida > $meta && $type < 2){
            		$direcao = 0;
            		$type	=  0;
          	    } else if ($ponto_partida < $meta && $type < 2) {	
            		$direcao = 1;	
            		$type    = 1;
            	}	

		//		if(($this->input->post('tipo_calculo')==2 || $this->input->post('tipo_calculo')=='? number:2 ?') && $this->input->post('chkd_tipo') == 1){
		//			$tipo_calculo	=	1;
		//		}else{
		//			$tipo_calculo	=	0;
		//		}
				if($manutencao == 1){
					$manutencao = 1;
					$ponto_partida = $this->input->post('goal');
				}else{
					$manutencao = 0;
					$ponto_partida = $this->input->post('ponto_partida');
				}
				
                $data_to_store = array (
                        'id' => $id,
                        'id_time' => $this->input->post('id_team'),
                        'nomeRChave' => $this->input->post('name'),
                        'descricao' => $this->input->post('description'),
                        'frequencia' => $this->input->post('frequency'),
                        'unidade_meta' => $this->input->post('measurement'),
                        'meta_final_prevista' => $this->input->post('goal'),
                        'peso' => $this->input->post('weight'),
                        'ponto_partida' => $ponto_partida,
                        'responsavel' => $this->input->post('user'),
                        'usuario_atualizador' => $this->session->userdata('id'),
                        'ativo' => 1,
                        'responsaveis' => $responsaveis,
                        'tags' => $tags,
                        'id_empresa' => $this->session->userdata('id_empresa'),
                        'tipo_calculo' => $tipo_calculo,
                        'type' => $type,
                        'direcao' => $direcao,
                        'id_integracao' => $this->input->post('id_integracao'),
                        'frequencia_int' => $this->input->post('frequencia_int'),
                        'periodicidade' => $periodicidade,
                        'manutencao' => $manutencao,
                        'limite_inferior' => $inferior,
						'limite_superior' => $superior,
						'pattern' => $this->input->post('pattern')
                );


                $this->load->model('servicedao');
                $service = new servicedao();

                if ( $service->update_resultados_chave( $data_to_store ) == TRUE) {

                    $rchave = $service->get_rchave_by_objetivo_tatico($id_objetivo);

                    $out ['error'] = false;
                    $out ['error_message'] = false;
                    $out ['keys'] = $rchave;

                } else {
                    $out ['error'] = true;
                    $out ['error_message'] = 'Erro ao Resultado Chave.';
                }

            }else{
                $out['error'] = true;
                $out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
            }

        }

        echo json_encode($out);
    }

    public function deleteResultadoChave()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    			$id = $this->input->post('id');
    			$id_usuario = $this->session->userdata('id');
    			$admin = $this->session->userdata('admin');


    			$data_to_store = array (
    					'ativo' => 0,
    					'usuario_atualizador' => $id_usuario,
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if ( $service->delete_key_result_by_id( $data_to_store, $id ) == TRUE) {

    				$out ['error'] = false;
    				$out ['error_message'] = false;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Resultado Chave.';
    			}

    	}

    	echo json_encode($out);
    }

    // TODO : REVISAR ESSAS REGRAS
    public function removeResultadoChave()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Resultado Chave', 'required' );
    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$id_usuario = $this->session->userdata('id');
    			$admin = $this->session->userdata('admin');


    			$data_to_store = array (
    					'id_resultado_chave' => $id,
    					'ativo' => 0,
    					'usuario_atualizador' => $id_usuario,

    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->userResponsibleResultKey($id, $id_usuario) || $admin){
	    			if ( $service->update_resultados_chave( $data_to_store ) == TRUE) {

	    				$rchave = $service->get_rchave_by_objetivo_tatico($id_objetivo);

	    				$out ['error'] = false;
	    				$out ['error_message'] = false;
	    				$out ['keys'] = $rchave;

	    			} else {
	    				$out ['error'] = true;
	    				$out ['error_message'] = 'Erro ao Resultado Chave.';
	    			}
    			}else{
    				$out['error'] = true;
    				$out['error_message'] = 'O usuário não possui permissão para executar essa ação.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}

    	echo json_encode($out);
    }

    public function add_medicao()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Resultado Chave', 'required' );
    		$this->form_validation->set_rules ( 'date', 'Data Medição', 'required' );
    		$this->form_validation->set_rules ( 'comentary', 'Comentário', '' );
    		$this->form_validation->set_rules ( 'value', 'Medição', 'required' );


    		if ($this->form_validation->run ()) {

    			$id = $this->input->post('id');
    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_rchave =  $id;


    			$url_file = array();
    			$base = base_url('assets/empresa') ;

    			if(isset($_FILES["files"]))
    			{
    				for($i = 0;  $i < sizeof($_FILES["files"]["name"]); $i++ ){

    					$fileNameDoc = $_FILES["files"]["name"][$i];
    					$target_file_doc = UPLOAD . basename($fileNameDoc);
    					$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);


    					if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file_doc)) {

    						$nome = $this->createRandWord(40).'.'.$fileTypeDoc;


    						$fileToSave = EMPRESA . '/' . $id_empresa . "/keys/" . $id_rchave . "/medicao/" ;

    						if( !file_exists( EMPRESA . '/' .  $id_empresa )){
    							mkdir( $fileToSave , 0777, true);
    							chmod( $fileToSave , 0777);
    						}

    						if( !file_exists( EMPRESA . '/' . $id_empresa . "/keys/" )){
    							mkdir( $fileToSave , 0777, true);
    							chmod( $fileToSave , 0777);
    						}

    						if( !file_exists( EMPRESA . '/' . $id_empresa . "/keys/" . $id_rchave )){
    							mkdir( $fileToSave , 0777, true);
    							chmod( $fileToSave , 0777);
    						}

    						if( !file_exists( EMPRESA . '/' . $id_empresa . "/keys/" . $id_rchave . "/medicao/" )){
    							mkdir( $fileToSave , 0777, true);
    							chmod( $fileToSave , 0777);
    						}

    						copy ( $target_file_doc , $fileToSave . '/' . $nome);
    						unlink($target_file_doc);

    						$url_file[$i]['anexo'] = ($nome) ;
    						$url_file[$i]['descricao'] = ($base . '/' . $id_empresa . "/keys/" . $id_rchave . "/medicao/".$nome) ;
    					}else{
    						$out ['error'] = true;
    						$out ['error_message'] = 'Erro ao Realizar o upload de um dos Arquivos.';
    					}

    				}
    			}


    			$id = $this->input->post('id');
    			$percepcao = $this->input->post('percepcao') == 'null' ? null : $this->input->post('percepcao');
    			$data_to_store = array (
    					'id_resultado_chave' => $id,
    					'comentario' => $this->input->post('comentary'),
    					'data_medicao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('date')))),
    					'medicao' => $this->input->post('value'),
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'percepcao' => $percepcao,
    					'url_files' => $url_file
    			);


    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$service->update_keyresult_percepcao($percepcao, $id);

				$id_empresa = $this->session->userdata('id_empresa');

    			if ( $service->add_medicao( $data_to_store ) == TRUE) {

    				$resultKey = $service->get_datails_key_by_id($id);
    				$id_parent = $resultKey[0]['id_projeto'];
					$resultKeys = $service->get_rchave_by_objetivo_tatico($id_parent);
    				$resultObj = $service->get_global_goals_by_id_global($id_parent,$id_empresa);
    				$medicoes = $service->get_medicoes_anexos_by_id_rchave($id);

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['keys'] 		= $resultKeys;
    				$out ['rkey_perc'] = $resultKey[0]['percentage'];
    				$out ['rkey_parent_perc'] = $resultObj[0]['percentual'];
    				$out ['medicoes'] = $medicoes;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Resultado Chave.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}

    	echo json_encode($out);
    	exit();
    }

    public function update_user()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
			$id = $this->input->post('id');
			$this->load->model('servicedao');
			$service = new servicedao();
			$service->update_medicao( $id );
			$out['success'] = true;
    	}
    	echo json_encode($out);
    	exit();
    }

    public function getMedicaoByIdRChave()
    {

    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Resultado Chave', 'required' );

    		if ($this->form_validation->run ()) {

    			$id =  $this->input->post('id');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$out['medicoes'] = $service->get_medicoes_anexos_by_id_rchave($id);
    			$out['error'] = false;
    			$out['error_message'] = '';

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}else{
    		$out['error'] = true;
    		$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';

    	}


    	echo json_encode($out);
    	exit();
    }

    public function getMedicaosByIdKey()
    {

    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Resultado Chave', 'required' );

    		if ($this->form_validation->run ()) {

    			$id =  $this->input->post('id');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$out['medicoes'] = $service->get_medicoes_by_id_rchave($id);
    			$out['error'] = false;
    			$out['error_message'] = '';

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}else{
    		$out['error'] = true;
    		$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';

    	}


    	echo json_encode($out);
    	exit();
    }

    public function getContratosByIdKey()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);

    	$keyresult_id = $this->input->post('id');

    	$this->load->model('servicedao');

    	$service = new servicedao();
    	
    	$result = $service->get_contratos_by_keyresult($keyresult_id);
    	echo json_encode($result);
    	exit;
    }

    // TODO
    public function addAtividade()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'key_id', 'Resultado Chave', 'required' );
    		$this->form_validation->set_rules ( 'tatic_id', 'Tático', '' );
    		// $this->form_validation->set_rules ( 'id_team', 'Time', 'required' );
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		//$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
    		//$this->form_validation->set_rules ( 'hour', 'Horas', 'required' );
    		$this->form_validation->set_rules ( 'init', 'Inicio', 'required' );
    		$this->form_validation->set_rules ( 'end', 'Fim', 'required' );
    		$this->form_validation->set_rules ( 'percentage', 'Porcentagem', '' );
    		//$this->form_validation->set_rules ( 'tipo_atividade', 'Tipo Atividade', '' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );


    		$this->form_validation->set_rules ( 'responsibles', 'Responsáveis', '' );
    		$this->form_validation->set_rules ( 'tags', 'Tags', '' );

    		if ($this->form_validation->run ()) {


    			$tags = explode( ",", $this->input->post('tags'));
    			$responsaveis = $this->input->post('responsibles');
    			$id_rchave = $this->input->post('key_id');
    			$progresso = $this->input->post('percentage');

    			$data_to_store = array (
    					'id_resultado_chave' => $id_rchave,
    					'id_empresa' => $this->session->userdata('id_empresa'),
    					'parent_id' => $this->input->post('tatic_id'),
    					'id_time' => $this->input->post('id_team'),
    					'nome' => $this->input->post('name'),
    					'hora' => $this->input->post('hour'),
    					'descricao' => $this->input->post('description'),
    					'data_ini' => $this->format_date($this->input->post('init')),
    					'data_fim' => $this->format_date($this->input->post('end')),
    					'responsavel' => $this->input->post('user'),
    					'progresso' => ($progresso < 0 || $progresso == '') ? 0 : $progresso,
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'ativo' => 1,
    					'responsaveis' => $responsaveis,
    					'tags' => $tags,
    					'ativo' => $this->input->post('status'),

    			);
				
    			$this->load->model('servicedao');
    			$service = new servicedao();
    			$id_activity = $service->add_atividade( $data_to_store );
    			if ( isset($id_activity) &&  $id_activity != '') {

    				$alerta_data = array (
    					'id_usuario' => $this->input->post('user'),
    					'id_empresa' => $this->session->userdata('id_empresa'),
    					'tipo_entidade' => 1,
    					'id_entidade' => $id_activity,
    					'nome_entidade' => $this->input->post('name'),
    					'descricao' => $this->input->post('description'),
    					'progresso' => 0,
    				);

    				$alert_save_activity = $service->add_atividade_alert($alerta_data);

    				if(!empty($responsaveis)){
    					foreach ($responsaveis as $key => $resp) {
    						$alerta_data_resp = array (
		    					'id_usuario' => $resp,
		    					'id_empresa' => $this->session->userdata('id_empresa'),
		    					'tipo_entidade' => 1,
		    					'id_entidade' => $id_activity,
		    					'nome_entidade' => $this->input->post('name'),
		    					'descricao' => $this->input->post('description'),
		    					'progresso' => 0,
		    				);
		    				$alert_save_activity = $service->add_atividade_alert($alerta_data_resp);
    					}
    				}

    				$result = $service->get_datails_key_by_id($id_rchave);
    				$atividade = $result[0]['activities'];

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['activities'] = $atividade;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Inserir Atividade.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}

    	echo json_encode($out);
    	exit();
    }

    public function getActivitiesAddedAlert() {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$result = $service->get_activities_added_alert();

    	if(!empty($result)){
    		foreach ($result as $key => $record) {
    			$user = $service->get_user_by_id_usuario($record['id_usuario']);
    			if($record['tipo_entidade'] == 2){
    				$replace_array 	= array(
	                                    $record['nome_entidade'],
										$user['nome_usuario'],
										$record['descricao'],
	                                    base_url('planejamento#!/tatic/'.$record['id_entidade'])
										);

					$status = $this->sendMail('send_new_comment',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
    			}else{
    				$replace_array 			= 	array(
												$user['nome_usuario'],
												base_url('perfil'),
												$record['nome_entidade']
											);

    				$status = $this->sendMail('activity_added',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
    			}
				if($status == 'Sucesso'){
					$update_record = $service->update_alert_status_by_id($record['id_alerta']);
				}
    		}
    		echo 'Mail sent to all users';
    	}else{
    		echo 'No user found';
    	}

	}
    public function getSurveyPairAddedAlert() {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$result = $service->get_survey_pair_added_alert();

    	if(!empty($result)){
    		foreach ($result as $key => $record) {
    			$user = $service->get_user_by_id_usuario($record['id_usuario']);
    			if ($record['corpo_email'] != '0')
                {
                    $descriptionBody = '
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr><td valign="top">
                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                        <td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px">
                        <table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#fafafa;border-collapse:collapse">
                        <tbody><tr><td valign="top" style="padding:18px;color:#f2f2f2;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%;">
                        <div style="text-align:left"><span style="color:#000000">'.$record['corpo_email'].'</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
                    ';
                } else $descriptionBody = '';

    			$replace_array 			= 	array(
												$user['nome_usuario'],
												$descriptionBody,
												// base_url('perfil')
												base_url('survey/#!/'.$record['id_pesquisa'])
											);
    			$subjectReplacement = null;
                if ($record['titulo_email'] != '0') $subjectReplacement = $record['titulo_email'];


                $status = $this->sendMail('survey_pair_added',$user['email_usuario'],$user['nome_usuario'],$replace_array, $subjectReplacement, $user['id_empresa']);
				
					$update_record = $service->update_survey_alert_status_by_id($record['id_alerta']);
				
    		}
    		echo 'Mail sent to all users';
    	}else{
    		echo 'No user found';
    	}

	}




    public function getFeedbacksAlert() {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$result = $service->get_feedback_added_alert();

    	if(!empty($result)){
    		foreach ($result as $key => $record) {

    			// testa se é crossfeed
    			if ($record['desenvolvimento']=='1') {
                    //$user_update = $service->get_user_updates_for_email_by_id_questionerio($record['id_questionario']);
                    //if ($record['tipo']=="recebido") print_r($this->getQuestionsForAlert($user_update));
					//$replace_array = array( $record['nome_usuario_receiver'], "sem questões", base_url('perfil'), $record['nome_usuario_sender'] );
					//$data_prazo = date("d/m/Y", $record['prazo_final']);
					$data_prazo = date('d/m/Y', strtotime(str_replace('.', '-', $record['prazo_final'])));
					$replace_array = array( $record['nome_usuario_receiver'], $record['descricao'], base_url('perfil'), $record['nome_usuario_sender'], $data_prazo);
                    $actionPrefix = 'crossfeed_';
                }
    			else {
    			    if ($record['tipo'] == 'solicitado') {
                        $feedbackBody = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr><td valign="top">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
                                        <tbody><tr><td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#2069ec;border-collapse:collapse"><tbody><tr>
                                        <td valign="top" style="padding:18px;color:#fff;font-family:Helvetica;font-size:16px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                        <div style="text-align:center"><strong><span style="color:#fff"><img height="50" src="' . base_url('assets/img') . '/' . $record['id_empresa_sender'] . '/150/' . $record['image_sender'] . '" style="border:0px;width:50px;height:50px;margin:0px;outline:none;text-decoration:none;border-radius: 40px;object-fit: cover;" width="50"></span></strong><span style="color:#fff"><strong>De:</strong> ' . $record['nome_usuario_sender'] . '</span><div style="text-align:left"><br>
                                        <span style="color:#fff">' . $record['descricao'] . '</span></div>
                                        </div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
                    }else   
    			    if ($record['tipo'] == 'pares') {
                        $feedbackBody = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr><td valign="top">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
                                        <tbody><tr><td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#2069ec;border-collapse:collapse"><tbody><tr>
                                        <td valign="top" style="padding:18px;color:#fff;font-family:Helvetica;font-size:16px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                        <div style="text-align:center"><strong><span style="color:#fff"><img height="50" src="' . base_url('assets/img') . '/' . $record['id_empresa_sender'] . '/150/' . $record['image_sender'] . '" style="border:0px;width:50px;height:50px;margin:0px;outline:none;text-decoration:none;border-radius: 40px;object-fit: cover;" width="50"></span></strong><span style="color:#fff"><strong>De:</strong> ' . $record['nome_usuario_sender'] . '</span><div style="text-align:left"><br>
                                        <span style="color:#fff">' . $record['descricao'] . '</span></div>
                                        </div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
                    }

                    else{
    			        $tipo_feedback = ($record['tipo_feedback'] == 'r')?'Reconhecimento':'Oportunidade de Melhoria';
    			        $feedbackBody = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr><td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
                                        <tbody><tr><td style="padding-top:0px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#2069ec;border-collapse:collapse">
                                        <tbody><tr><td valign="top" style="padding:18px;color:#fff;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:left;word-break:break-word;line-height:150%"><span style="color:#fff">
                                        <img height="70" src="' . base_url('assets/img') . '/' . $record['id_empresa_sender'] . '/150/' . $record['image_sender'] . '" style="border:0px;width:70px;height:70px;margin:0px;outline:none;text-decoration:none;border-radius: 40px;object-fit: cover;" width="70"><span>
                                        &nbsp; &nbsp; De: </span><span style="color:#fd5ecd;">' . $record['nome_usuario_sender'] . '</span><br>
                                        <span>&nbsp; &nbsp; </span>Tipo:<span style="color:#fd5ecd">'.$tipo_feedback.'</span></span><br><br>
                                        <span style="color:#fff">' . $record['descricao'] . '</span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
                                        ';
                    }
                    $values = $service->get_values_from_feedback($record['id_feedback']);
    			    if ($values && count($values) > 0) {
    			       $feedbackBody .= '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr><td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
                                        <tbody><tr><td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#ffffff;border-collapse:collapse"><tbody><tr>
                                        <td valign="top" style="padding:18px;color:#f2f2f2;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%"><div style="text-align:left"><strong>
                                        <span style="color:#144588">Valores relacionados:</span></strong><br><br><span style="color:#000000">';

                        foreach ($values as $value) {
                            $feedbackBody .= '<img height="20" src="https://ci3.googleusercontent.com/proxy/s05TekAkkD6kncLgGpJtrkr6R_Nl_K64u7B_uPInDcInQC0JfLmC87PgGfYW7EsLLkX_PUnYtHNJieVuu0zuA4FIuBvFKKv3Fqilo6M4fIAJkPJSMMDDIruMYNF844Y0USZsO8nQoDmstladtDG0F8dS9uY2JZ7wGFgGljw=s0-d-e1-ft#https://gallery.mailchimp.com/ba480a77e10370e250dc6b1d1/images/e35b2b8a-68cb-4b36-a790-dd9ba7fa1716.png" style="border:0px;width:20px;height:20px;margin:0px;outline:none;text-decoration:none" width="20">&nbsp;'.$value['nome_valor'].'<br>';
    			        }
    			        $feedbackBody .= '</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
                    }
                    $replace_array = array( $record['nome_usuario_receiver'], $feedbackBody, base_url('perfil'), $record['nome_usuario_sender'] );
    			    $actionPrefix = 'feedback_';
                }
                if ($record['ativo'] == 1) {
					$status = $this->sendMail($actionPrefix.$record['tipo'],$record['email_usuario_receiver'],$record['nome_usuario_receiver'],$replace_array, null, $record['id_empresa']);
					$record['ativo'] = 0;
					if($status == 'Sucesso'){
						$update_record = $service->update_feedback_alert_status_by_id($record['id_alerta']);
					}
				}
    		}
    		echo 'Mail sent to all users';
    	}else{
    		echo 'No user found';
    	}

	}

	private function getQuestionsTemplateForAlert($questions)
    {
        $body_msg = '';
        if(!empty($questions)){
            foreach ($questions as $key => $question) {
                if($question['type'] == 'q'){
                    $body_msg .= '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                                        <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                                        <td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#fafafa;border-collapse:collapse">
                                        <tbody><tr><td valign="top" style="padding:18px;color:#222222;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                        <div style="text-align:left"><span style="font-size:14px"><span style="color:#144588"><strong>'.$question['question'].'</strong></span><br>'.$question['answers'][0]['resposta_qualitativa'].'</span></div>
                                        </td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody>
                                  </table>';


                }
                if($question['type'] == 'c'){

                    $body_msg .= '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                                        <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                                        <td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#fafafa;border-collapse:collapse">
                                        <tbody><tr><td valign="top" style="padding:18px;color:#222222;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                        <div style="text-align:left"><span style="font-size:14px"><span style="color:#144588"><strong>'.$question['question'].'</strong></span><br><br>';

                    if (!empty($question['answers'])) {
                        for ($i = 0; $i < $question['answers'][0]['rating_score']; $i++) {
                            $body_msg .= '<label><img src="http://app.elofy.com.br/assets/portal/img/pink_heart.png" style="margin-left:10px;" /></label>';
                        }
                    }
                    if($question['escala'] == 10){
                        for($i = 0;

                            $i<(10-$question['answers'][0]['rating_score']);$i++){
                            $body_msg .= '<label><img src="http://app.elofy.com.br/assets/portal/img/pink_light_heart.png" style="margin-left:10px;" /></label>';
                        }
                    }else{
                        if (!empty($question['answers'])) {
                            for ($i = 0; $i < (5 - $question['answers'][0]['rating_score']); $i++) {
                                $body_msg .= '<label><img src="http://app.elofy.com.br/assets/portal/img/pink_light_heart.png" style="margin-left:10px;" /></label>';
                            }
                        }
                    }

                    $body_msg .= '</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
                }


                if($question['type'] == 'e'){
                    $body_msg .= '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                                        <td valign="top"><table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr>
                                        <td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px"><table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#fafafa;border-collapse:collapse">
                                        <tbody><tr><td valign="top" style="padding:18px;color:#222222;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                        <div style="text-align:left"><span style="font-size:14px"><span style="color:#144588"><strong>'.$question['question'].'</strong></span><br><br>';

                    for($i = 0;$i<$question['answers'][0]['rating_score'];$i++){
                        $body_msg .= '<label><img src="http://elofy.stage02.obdemo.com/star.png" style="margin-left:10px;" /></label>';
                    }
                    if($question['escala'] == 10){
                        for($i = 0;$i<(10-$question['answers'][0]['rating_score']);$i++){
                            $body_msg .= '<label><img src="http://elofy.stage02.obdemo.com/heart_img4.png" style="margin-left:10px;" /></label>';
                        }
                    }else{
                        for($i = 0;$i<(5-$question['answers'][0]['rating_score']);$i++){
                            $body_msg .= '<label><img src="http://elofy.stage02.obdemo.com/star1.png" style="margin-left:10px;" /></label>';
                        }
                    }

                    $body_msg .= '</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
                }
            }
        }
        return $body_msg;
    }

	public function getCheckinAddedAlert() {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$result = $service->get_checkin_added_alert();

		
    	if(!empty($result)){
    		foreach ($result as $key => $record) {
    			$authoriser = $service->get_user_profile_by_id($record['usuario_atualizador']);
				$user_update = $service->get_user_updates_for_email_by_id_questionerio_auto($record['id_questionario'],$authoriser['id_empresa'],$authoriser['id']);
    			$user = $service->get_user_by_id_usuario($record['id_usuario']);

    			$body_msg = $this->getQuestionsTemplateForAlert($user_update['questions']);

				$related_goals =	'';
				if(!empty($user_update['goals'])){

                    $related_goals = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse"><tbody><tr><td valign="top">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse">
                                        <tbody><tr><td style="padding-top:9px;padding-left:18px;padding-bottom:9px;padding-right:18px">
                                        <table border="0" cellspacing="0" width="100%" style="min-width:100%!important;background-color:#ffffff;border-collapse:collapse">
                                        <tbody><tr><td valign="top" style="padding:18px;color:#222222;font-family:Helvetica;font-size:14px;font-weight:normal;text-align:center;word-break:break-word;line-height:150%">
                                        <div style="text-align:left"><span style="font-size:14px"><span style="color:#144588"><strong>Objetivos relacionados</strong></span><br><br>';

                    foreach ($user_update['goals'] as $key => $goal) {
                    	$related_goals .= $goal['title'].'<br>';
                    }
                    $related_goals.= '</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';
                }

    			$replace_array 	= array(
                                        $authoriser['name'],
										$body_msg,
										$related_goals,
                                        $user['nome_usuario'],
                                        base_url('perfil')

									);
				$status = $this->sendMail('checkin_added',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
			
    			
				if($status == 'Sucesso'){
					$update_record = $service->update_checkin_alert_status_by_id($record['id_alerta']);
				}
				
               }   
    		echo 'Mail sent to all users';
    	}else{
    		echo 'No user found';
    	}

	}

    public function editaAtividade()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Atividade', 'required' );
    		$this->form_validation->set_rules ( 'key_id', 'Resultado Chave', 'required' );
    		//$this->form_validation->set_rules ( 'parent_id', 'Atividade', '' );
    		// $this->form_validation->set_rules ( 'id_team', 'Time', 'required' );
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		//*$this->form_validation->set_rules ( 'description', 'Descrição', 'required' );
    		//$this->form_validation->set_rules ( 'hour', 'Horas', 'required' );
    		$this->form_validation->set_rules ( 'init', 'Inicio', 'required' );
    		$this->form_validation->set_rules ( 'end', 'Fim', 'required' );
    		$this->form_validation->set_rules ( 'percentage', 'Porcentagem', '' );
    		//$this->form_validation->set_rules ( 'tipo_atividade', 'Tipo Atividade', '' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );


    		$this->form_validation->set_rules ( 'responsibles', 'Responsáveis', '' );
    		$this->form_validation->set_rules ( 'tags', 'Tags', '' );


    		if ($this->form_validation->run ()) {


    			$id_atividade = $this->input->post('id');
    			$tags = explode( ",", $this->input->post('tags'));
    			$responsaveis = $this->input->post('responsibles');
    			$id_rchave = $this->input->post('key_id');

    			$data_to_store = array (
    					'id_atividade' => $id_atividade,
    					'id_resultado_chave' => $id_rchave,
    					'id_empresa' => $this->session->userdata('id_empresa'),
    					'id_time' => $this->input->post('id_team'),
    					'nome' => $this->input->post('name'),
    					'descricao' => $this->input->post('description'),
    					'hora' => $this->input->post('hour'),
    					'data_ini' => $this->format_date($this->input->post('init')),
    					'data_fim' => $this->format_date($this->input->post('end')),
    					'responsavel' => $this->input->post('user'),
    					'progresso' => $this->input->post('percentage'),
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'ativo' => 1,
    					'responsaveis' => $responsaveis,
    					'tags' => $tags,
    					'ativo' => $this->input->post('status'),
    			);


    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if ( $service->update_atividade( $data_to_store ) == TRUE) {

    				// SE ATIVIDADE POSSUI RESULTADO CHAVE, DEVOLVE A LISTA DE ATIVIDADES DO RESULTADO CHAVE

    				$result = $service->get_datails_key_by_id($id_rchave);
    				$atividade = $result[0]['activities'];

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['activities'] = $atividade;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Editar Atividade.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();
    }

    // TODO :REVISAR essas regras
    public function removerAtividade()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Atividade', 'required' );

    		if ($this->form_validation->run ()) {


    			$id_atividade = $this->input->post('id');
    			$id_usuario = $this->session->userdata('id');
    			$admin = $this->session->userdata('admin');

    			$data_to_store = array (
    					'id_atividade' => $id_atividade,
    					'ativo' => 0,
    					'usuario_atualizador' => $id_usuario
    			);


    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if($service->userResponsibleActivity($id_atividade, $id_usuario) || $admin ){

    				if ( $service->update_atividade( $data_to_store ) == TRUE) {

    					$result = $service->get_datails_key_by_id($id_rchave);
    					$atividade = $result[0]['activities'];

    					$out ['error'] = false;
    					$out ['error_message'] = false;
    					$out ['activities'] = $atividade;

    				} else {
    					$out ['error'] = true;
    					$out ['error_message'] = 'Erro ao Editar Atividade.';
    				}

    			}else{
    				$out['error'] = true;
    				$out['error_message'] = 'O usuário não possui permissão para executar essa ação.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();
    }

    // ADS METODOS 25/07

    public function getDashBoardDetails()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();

	    	$out['total_okr'] = $service->get_tatics_goals_by_id_empresa_count($id_empresa);
	    	$out['total_okr_done'] = $service->get_tatics_goals_by_id_empresa_done($id_empresa);
	    	$out['total_okr_undone'] = $service->get_tatics_goals_by_id_empresa_undone($id_empresa);
	    	$out['total_okr_canceled'] = $service->get_tatics_goals_by_id_empresa_canceled($id_empresa);


	    echo json_encode($out);
    	exit();


    }


    //03082017
    public function add_team()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'team', 'Time', '' );
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );
    		$this->form_validation->set_rules ( 'status', 'Ativo', '' );
    		$this->form_validation->set_rules ( 'users', 'Responsáveis', '' );


    		if ($this->form_validation->run ()) {


    			$id_empresa = $this->session->userdata('id_empresa');
    			$responsaveis = $this->input->post('users');
    			$atualizacao_data = $this->input->post('atualizacao');
    			$tags = explode( ",", $this->input->post('tags'));
    			if($atualizacao_data){
    				$atualizacao = $atualizacao_data;
    			}else{
    				$atualizacao = 0;
    			}
    			$parent_id = ($this->input->post('team')) ? $this->input->post('team') : null;

    			$data_to_store = array (
    					'id_empresa' => $id_empresa,
    					'parent_id' => $parent_id,
    					'nome_unidade' => $this->input->post('name'),
    					'id_usuario_responsavel' => $this->input->post('user'),
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'ativo' => ( $this->input->post('status') ) ? $this->input->post('status') : 0 ,
    					'responsaveis' => $responsaveis,
    					'atualizacao' => $atualizacao,
    					'tags' => $tags,
    			);


    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if ( $service->add_team( $data_to_store ) == TRUE) {

    				$teams = $service->get_all_teams_no_parent($id_empresa);
    				$result = $this->getAllTeamsTreeRecursive($teams);

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['teams'] = $result;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Inserir Time.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();

    }

    public function editar_team()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Time', 'required' );
    		$this->form_validation->set_rules ( 'team', 'Time Pai', '' );
    		$this->form_validation->set_rules ( 'name', 'Nome', 'required' );
    		$this->form_validation->set_rules ( 'user', 'Responsável', 'required' );
    		$this->form_validation->set_rules ( 'status', 'Ativo', 'required' );
    		$this->form_validation->set_rules ( 'users', 'Responsáveis', '' );

    		if ($this->form_validation->run ()) {


    			$id = $this->input->post('id');
    			$id_empresa = $this->session->userdata('id_empresa');
    			$responsaveis = $this->input->post('users');
    			$tags = explode(',',$this->input->post('tags'));
    			$atualizacao = $this->input->post('atualizacao');
    			$parent_id = ($this->input->post('team')) ? $this->input->post('team') : null;

    			$data_to_store = array (
    					'id_time' => $id,
    					'id_empresa' => $id_empresa,
    					'parent_id' => $parent_id,
    					'nome_unidade' => $this->input->post('name'),
    					'id_usuario_responsavel' => $this->input->post('user'),
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'ativo' =>$this->input->post('status'),
    					'responsaveis' => $responsaveis,
    					'atualizacao' => $atualizacao,
    					'tags' => $tags,
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if ( $service->update_team( $data_to_store ) == TRUE) {

    				$teams = $service->get_all_teams_no_parent($id_empresa);
    				$result = $this->getAllTeamsTreeRecursive($teams);

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['teams'] = $result;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Editar Time.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();
    }

    public function getMembersForTeams()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id_usuario');
    	$team_id = isset($_GET['team_id'])?$_GET['team_id']:null;
        $onlyActives = isset($_GET['onlyActives'])?$_GET['onlyActives']:false;
    	$result = $service->get_members_for_teams_by_id($id_empresa,$id_usuario,$team_id, $onlyActives);
    	$out = $result;

    	echo json_encode($out);
    	exit();
    }

	public function getMembersForTeamsUsers()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_usuario = $this->session->userdata('id_usuario');
		$team_id = isset($_GET['team_id'])?$_GET['team_id']:null;
    	$result = $service->get_members_for_teams_user($id_empresa,$id_usuario,$team_id);
    	$out = $result;
    	echo json_encode($out);
    	exit();
    }
    public function addCargo()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
			//print_r('in');die;

    		$this->form_validation->set_rules ( 'name', 'Nome', '' );
    		$this->form_validation->set_rules ( 'descricao', 'Descricao', 'required' );
    		$this->form_validation->set_rules ( 'critico', 'Criticao', 'required' );


    		if ($this->form_validation->run ()) {


    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');

    			$data_to_store = array (
    					'id_empresa' => $id_empresa,
    					'nome_cargo' => $this->input->post('name'),
    					'descricao_cargo' => $this->input->post('descricao'),
    					'critico' => $this->input->post('critico'),
    					'ativo' => $this->input->post('status'),
    					'tempo_prench_vaga' => $this->input->post('tempo'),
    					'usuario_atualizador' => $this->session->userdata('id')
    			);
				$compensia = $this->input->post('comensia');
				$questionerio = $this->input->post('questionerio');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$id_cargo = $service->add_new_cargo( $data_to_store , $compensia, $questionerio);

    			$out ['error'] = false;
    			$out ['error_message'] = false;
    			$out ['id_cargo'] = $id_cargo;


    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();

    }

    public function editCargo()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
			//print_r('in');die;

    		$this->form_validation->set_rules ( 'name', 'Nome', '' );
    		$this->form_validation->set_rules ( 'descricao', 'Descricao', 'required' );
    		$this->form_validation->set_rules ( 'critico', 'Criticao', 'required' );


    		if ($this->form_validation->run ()) {


    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');

    			$data_to_store = array (
    					'id_empresa' => $id_empresa,
    					'nome_cargo' => $this->input->post('name'),
    					'descricao_cargo' => $this->input->post('descricao'),
    					'critico' => $this->input->post('critico'),
    					'ativo' => $this->input->post('status'),
    					'tempo_prench_vaga' => $this->input->post('tempo'),
    					'usuario_atualizador' => $this->session->userdata('id')
    			);
				$compensia = $this->input->post('comensia');
				$questionerio = $this->input->post('questionerio');
				$id_cargo = $this->input->post('id');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$id_cargo = $service->edit_new_cargo( $data_to_store , $compensia, $questionerio, $id_cargo);

    			$out ['error'] = false;
    			$out ['error_message'] = false;
    			$out ['id_cargo'] = $id_cargo;
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();

    }

    public function addIntegration()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
			//print_r('in');die;

    		$this->form_validation->set_rules ( 'nomeIntegration', 'Nome', '' );


    		if ($this->form_validation->run ()) {


    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');

    			$data_to_store = array (
    					'id_empresa' => $id_empresa,
    					'nome' => $this->input->post('name'),
    					'tipo' => $this->input->post('type'),
    					'connection' => $this->input->post('host'),
    					'porta' => $this->input->post('port'),
    					'database' => $this->input->post('database'),
    					'comando_sql' => $this->input->post('sql'),
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'username' => $this->input->post('uname'),
    					'password' => $this->input->post('password'),
    					'ativo' => $this->input->post('ativo'),
    					'soap_address' => $this->input->post('soap'),
    					'name_space' => $this->input->post('namespace'),
    					'metodo' => $this->input->post('keyresult'),
    					'parametrows' => $this->input->post('parameter'),
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$id_cargo = $service->add_new_integration( $data_to_store );

    			$out ['error'] = false;
    			$out ['error_message'] = false;
    			$out ['id_cargo'] = $id_cargo;


    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();

    }

    public function editIntegration()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
			//print_r('in');die;

    		$this->form_validation->set_rules ( 'nomeIntegration', 'Nome', '' );


    		if ($this->form_validation->run ()) {


    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');

    			$data_to_store = array (
    					'id_empresa' => $id_empresa,
    					'nome' => $this->input->post('name'),
    					'tipo' => $this->input->post('type'),
    					'connection' => $this->input->post('host'),
    					'porta' => $this->input->post('port'),
    					'database' => $this->input->post('database'),
    					'comando_sql' => $this->input->post('sql'),
    					'usuario_atualizador' => $this->session->userdata('id'),
    					'username' => $this->input->post('uname'),
    					'password' => $this->input->post('password'),
    					'ativo' => $this->input->post('ativo'),
    					'soap_address' => $this->input->post('soap'),
    					'name_space' => $this->input->post('namespace'),
    					'metodo' => $this->input->post('keyresult'),
    					'parametrows' => $this->input->post('parameter'),
    			);
				$id_integration = $this->input->post('id');

    			$this->load->model('servicedao');
    			$service = new servicedao();

    		    $service->edit_integration( $data_to_store , $id_integration);

    			$out ['error'] = false;
    			$out ['error_message'] = false;
    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();

    }

    public function saveEmpressa()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');
    			$atualizacao_data = $this->input->post('atualizacao');
    			if($atualizacao_data){
    				$atualizacao = $atualizacao_data;
    			}else{
    				$atualizacao = 0;
    			}
    			$data_to_store = array (
					'nome_empresa' => $this->input->post('nome_empresa'),
					'nome_usuario' => $this->input->post('nome_usuario'),
					'email_usuario' => $this->input->post('email_usuario'),
					'planejamento' => $this->input->post('planejamento'),
					'workflow' => $this->input->post('workflow'),
					'missao' => $this->input->post('missao'),
					'visao' => $this->input->post('visao'),
					'proposito' => $this->input->post('proposito'),
					'numero_colaboradores' => $this->input->post('numero_colab'),
					'numero_licencas' => $this->input->post('numero_licencas'),
					'data_vencimento' => date('Y-m-d',strtotime($this->input->post('data_vencimento'))),
                    'individual' => $this->input->post('individual'),
                    'label_individual' => $this->input->post('label_individual'),
                    'team' => $this->input->post('team'),
                    'label_team' => $this->input->post('label_team'),
                    'shared' => $this->input->post('shared'),
					'label_shared' => $this->input->post('label_shared'),
					'elo' => $this->input->post('elo'),
					'my_carreer' => $this->input->post('my_carreer'),
					'label_carreer' => $this->input->post('label_carreer'),
					'elos' => $this->input->post('elos'),
					'feedback' => $this->input->post('feedback'),
					'okr' => $this->input->post('okr'),
					'crossfeed' => $this->input->post('crossfeed'),
					'activities' => $this->input->post('activities'),
					'performance_pessoal' => $this->input->post('performance_pessoal'),
					// ldap server
					'ldap_enabled' => $this->input->post('ldap_enable'),
					'maf' => $this->input->post('maf'),
		            'ldap_server' => $this->input->post('ldap_server'),
		            'ldap_port' => $this->input->post('ldap_port'),
		            'ldap_bind_dn' => $this->input->post('ldap_bind_dn'),
		            // 'ldap_bind_pass' => $this->input->post('ldap_bind_pass'),
		            'ldap_base_dn' => $this->input->post('ldap_base_dn'),
		            'nineBox1' => $this->input->post('nineBox1'),
		            'nineBox1desc' => $this->input->post('nineBox1desc'),
		            'nineBox2' => $this->input->post('nineBox2'),
		            'nineBox2desc' => $this->input->post('nineBox2desc'),
		            'nineBox3' => $this->input->post('nineBox3'),
		            'nineBox3desc' => $this->input->post('nineBox3desc'),
		            'nineBox4' => $this->input->post('nineBox4'),
		            'nineBox4desc' => $this->input->post('nineBox4desc'),
		            'nineBox5' => $this->input->post('nineBox5'),
		            'nineBox5desc' => $this->input->post('nineBox5desc'),
		            'nineBox6' => $this->input->post('nineBox6'),
		            'nineBox6desc' => $this->input->post('nineBox6desc'),
		            'nineBox7' => $this->input->post('nineBox7'),
		            'nineBox7desc' => $this->input->post('nineBox7desc'),
		            'nineBox8' => $this->input->post('nineBox8'),
		            'nineBox8desc' => $this->input->post('nineBox8desc'),
		            'nineBox9' => $this->input->post('nineBox9'),
		            'nineBox9desc' => $this->input->post('nineBox9desc'),
				);

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
					$data_to_store['imagem_header_email'] = $img_name;
				}

				if(isset($_FILES["footer"]))
				{

					$fileNameDoc = $_FILES["footer"]["name"];
					$target_file_doc = UPLOAD . basename($fileNameDoc);
					$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
					$url_image = '';

					if (move_uploaded_file($_FILES["footer"]["tmp_name"], $target_file_doc)) {

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
					$data_to_store['url_image_footer'] = $img_name;
				}
			

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$result = $service->save_the_empressa( $data_to_store);
    			if($result == 1){
    				$this->session->set_userdata('okr',$this->input->post('okr'));
    				$this->session->set_userdata('feedback',$this->input->post('feedback'));
    				$this->session->set_userdata('crossfeed',$this->input->post('crossfeed'));
    				$this->session->set_userdata('performance_pessoal',$this->input->post('performance_pessoal'));
    			}
    			

    			$out ['error'] = false;
    			$out ['error_message'] = false;

    	}
    	echo json_encode($out);
    	exit();

    }

    public function get_user_without_team()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$result = $service->get_users_without_team($id_empresa);

    	$out = $result;

    	echo json_encode($out);
    	exit();
    }
    public function getEmpressaDetail(){
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$out 		= 	array();
    	$service 	= 	new servicedao();
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$result 	= 	$service->get_empressa_by_id($id_empresa);
    	$out 		= 	$result;
    	echo json_encode($out);
    	exit();
    }

    public function getAllValoresEmpresa()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$result = $service->get_valerea_by_empressa($id_empresa);

    	$out = $result;
    	echo json_encode($out);
    	exit();
    }

    public function saveValores()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');

    			$data_to_store = array (
					'id_empresa' 	=> $id_empresa,
					'nome_valor' 	=> $this->input->post('type_value'),
					'descricao' 	=> $this->input->post('type_description'),
					'usuario_atualizador' 	=> $id_usuario,
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$result = $service->save_new_valores( $data_to_store);

    			$out ['error'] = false;
    			$out ['error_message'] = false;

    	}
    	echo json_encode($out);
    	exit();

    }

    public function getValoresById()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$valore_id = $this->input->get('id');
    	$result = $service->get_valerea_by_id($valore_id);

    	$out = $result;

    	echo json_encode($out);
    	exit();
    }

    public function editValores()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    			$id_empresa = $this->session->userdata('id_empresa');
    			$id_usuario = $this->session->userdata('id');
    			$id 		= $this->input->post('type_id');

    			$data_to_store = array (
					'nome_valor' 	=> $this->input->post('type_value'),
					'descricao' 	=> $this->input->post('type_description'),
					'usuario_atualizador' 	=> $id_usuario,
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			$result = $service->update_valores( $data_to_store,$id);

    			$out ['error'] = false;
    			$out ['error_message'] = false;

    	}
    	echo json_encode($out);
    	exit();

    }
    public function deleteValorebyId()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$valore_id =  $this->input->post('id');
    	$this->load->model('servicedao');
    	$service = new servicedao();
		$result = $service->delete_valores_by_id($valore_id);

		$out ['error'] = false;
		$out ['error_message'] = false;

    	echo json_encode($out);
    	exit();

    }

    public function edit_feed()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Feed', 'required' );
    		$this->form_validation->set_rules ( 'readed', 'Lido', 'required' );

    		if ($this->form_validation->run ()) {


    			$id = $this->input->post('id');
    			$id_usuario = $this->session->userdata('id');

    			$data_to_store = array (
    					'id_evento_usuario' => $id,
    					'lido' =>  $this->input->post('readed'),
    					'id_usuario' => $id_usuario,
    			);

    			$this->load->model('servicedao');
    			$service = new servicedao();

    			if ( $service->update_feed( $data_to_store ) == TRUE) {

    				$eventos = $service->get_feed_not_readed_by_id_usuario($id_usuario);

    				$out ['error'] = false;
    				$out ['error_message'] = false;
    				$out ['feed'] = $eventos;

    			} else {
    				$out ['error'] = true;
    				$out ['error_message'] = 'Erro ao Editar Feed.';
    			}

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();
    }

    public function getMyFeedProfile()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_usuario = $this->session->userdata('id');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	if($service->set_all_feed_to_read_by_id_usuario($id_usuario))
    	{
    		$eventos = $service->get_feed_by_id_usuario($id_usuario);

    		$out ['feed'] = $eventos;
    		$out ['error'] = false;
    		$out ['error_message'] = false;

    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = 'Erro ao Marcar os Feeds com lidos';
    	}


    	echo json_encode($out);
    	exit();
    }

    // NÃO MAIS UTILIZADA
    public function getRChavePendentByUser()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_usuario = $this->session->userdata('id');

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$result = $service->get_all_pendent_okr_by_responsible($id_usuario);
    	$out['okr'] = $result;

    	echo json_encode($out);
    	exit();
    }

    public function get_alerts()
    {

    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');

    	$result = $service->get_alerts($id_usuario, $id_empresa);

    	$out['alerts'] = $result;

    	echo json_encode($out);
    	exit();

    }


    public function editar_avalicao()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Avaliacao', 'required' );
    		$this->form_validation->set_rules ( 'avaliation', 'Lido', 'required' );

    		if ($this->form_validation->run ()) {


    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}
    	echo json_encode($out);
    	exit();
    }
    
    public function getAvaliacoes()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'team', 'Time', '' );
    		$this->form_validation->set_rules ( 'cycle', 'Ciclo', '' );
    		$this->form_validation->set_rules ( 'user', 'Usuário', '' );

    		if ($this->form_validation->run ()) {

    			$id_time  = $this->input->post('team');
    			$id_ciclo = $this->input->post('cycle');
    			$id_usuario = $this->input->post('user');

    			$result = $service->get_avaliacoes_by_id_empresa($id_empresa, $id_usuario, $id_time, $id_ciclo);

    		}

    	}

    	$out['relatorio'] = $result;


    	echo json_encode($out);
    	exit();
    }

    public function getOkrAvaliacoes()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'year', 'Ano', '' );
    		$this->form_validation->set_rules ( 'cycle', 'Ciclo', '' );
    		$this->form_validation->set_rules ( 'user', 'Usuário', '' );

    		if ($this->form_validation->run ()) {

    			$ano = $this->input->post('year');
    			$id_ciclo = $this->input->post('cycle');
    			$id_usuario = $this->input->post('user');

    			$result = $service->get_tatics_goals_by_id_usuario_ano_id_ciclo( $id_empresa, $id_usuario, $ano, $id_ciclo);

    		}

    	}

    	echo json_encode($result);
    	exit();
    }

    public function getUserAvaliacoes()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

    	$ano = $this->input->post('year');
		$id_ciclo = $this->input->post('cycle');
		$id_usuario = $this->input->post('user');


		$result = $service->get_tatics_goals_by_id_usuario_ano_id_ciclo( $id_empresa, $id_usuario, $ano, $id_ciclo);

    	echo json_encode($result);
    }

    public function changeObjectivoStatusById()
		{

			header('Content-type: application/json');
			$this->get_acesso_user ( true );
			$out = array();

			$id_empresa = $this->session->userdata('id_empresa');

			$this->load->model('servicedao');
			$service = new servicedao();
			$result = array();

			$objectivo_id = $this->input->post('objectivo_id');
			$active = $this->input->post('active');


			$result = $service->change_objectivo_status_by_id( $objectivo_id, $active);

			echo json_encode($result);
		}

	public function getUserGoals()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$service 	= 	new servicedao();
    	$result 	= 	array();
		$id_usuario = 	$this->session->userdata('userid');
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$id_ciclo 	= 	$this->input->get('cycle');
    	$id_usuario 	= 	$this->input->get('user');
		$result 	= 	$service->get_user_goals( $id_empresa, $id_usuario, $id_ciclo);
    	echo json_encode($result);
    }
	
	public function getUserGoalsForReviewProfile()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$service 	= 	new servicedao();
    	$result 	= 	array();
		$id_usuario = 	$this->session->userdata('userid');
    	$id_empresa = 	$this->session->userdata('id_empresa');
    	$id_ciclo 	= 	$this->input->get('cycle');
    	$id_usuario 	= 	$this->input->get('user');
    	$cycle_start 	= 	$this->input->get('cycle_start');
    	$cycle_end 	= 	$this->input->get('cycle_end');
		$result 	= 	$service->get_user_goals_for_review_profile( $id_empresa, $id_usuario, $cycle_start, $cycle_end);
    	echo json_encode($result);
    }

    public function insertMyFeedbackProfile() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$idFeedback 	= 	$this->input->post('idFeedback');
    	$id_usuario 	= 	$this->session->userdata('id');
    	$tousers 		= 	$this->input->post('tousers');
    	$description 	= 	$this->input->post('description');
    	$visibility 	= 	0;//$this->input->post('visibility');
    	$valore_id 	= 	$this->input->post('valore_id');
    	$score 	= 	$this->input->post('score');
    	$tipo_feedback 	= 	$this->input->post('tipo_feedback');

		$result = $service->insert_new_feedback( $id_usuario, $tousers, $description, $visibility, $valore_id, $score, $tipo_feedback, $idFeedback);

        foreach ($tousers as $key=>$touser) {
            $alerta_data = array (
                'id_usuario' => $touser,
                'id_empresa' => $id_empresa,
                'descricao' => $description,
                'tipo' => 'recebido',
                'ativo' => 1,
                'usuario_atualizador' => $id_usuario,
                'id_feedback' => $result[$key]
            );
            $alert_save_activity = $service->add_feedback_alert($alerta_data);
        }

        $reading_data = array(
        	'id_feedback' => $result,
        	'id_usuario_destino' => $touser,
        	'usuario_atualizador' => $id_usuario,
        	'lido' => 0
        );
        $service->add_feedback_reading($reading_data);

        echo $result;
	}

	public function insertMyPrivateNoteProfile() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();
    	$id_usuario 	= 	$this->session->userdata('id');
    	$to_user 		= 	$this->input->post('to_user');
    	$description 	= 	$this->input->post('description');
    	$private_notes 	= 	1;
    	$valore_id 	= 	$this->input->post('valore_id');

		$result = $service->insert_private_note_profile( $id_usuario,$to_user, $description, $private_notes, $valore_id);

    	echo json_encode($result);
	}

	public function updateTodoProfile() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();
    	$id_usuario 	= 	$this->session->userdata('id');
    	$activity_id 	= 	$this->input->get('activity_id');
    	$todo 			= 	$this->input->get('todo');
    	$atraso 		= 	$this->input->get('atraso');

		$result = $service->update_activity_todo( $id_usuario, $activity_id, $todo, $atraso);

    	echo json_encode($result);
	}
	public function updateDesempnhoById() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();
    	$desempnho  = $this->input->post('desempnho');
		$id_usuario 	= 	$this->session->userdata('userid');
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_ciclo 		= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
		$result = $service->update_desempnho_by_id( $id_protocolo_avaliacao, $desempnho);

    	echo json_encode($result);
	}

	public function updateValoreSkillsById() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service 		= 	new servicedao();
    	$result 		= 	array();
    	$id_usuario 	= 	$this->session->userdata('userid');
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_ciclo 		= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
		$values			=	$this->input->post('valoreids');
		$skillids		=	$this->input->post('skillids');
		if($values){
			$avg_valor		=	number_format(array_sum($values)/count($values),2);
		}else{
			$avg_valor		=	null;
		}
		if($skillids){
			$avg_skill		=	number_format(array_sum($skillids)/count($skillids),2);
		}else{
			$avg_skill		=	null;
		}
		$result 		= 	$service->update_valor_skills_by_id( $id_usuario, $id_ciclo, $avg_valor, $avg_skill);
		if(!empty($values)){
			$service->save_valores_review($id_usuario, $values, $id_ciclo, $id_protocolo_avaliacao);
		}
		if(!empty($skillids)){
			$service->save_skills($id_usuario, $skillids, $id_ciclo, $id_protocolo_avaliacao);
		}
    	echo json_encode($result);
	}

	public function getUserPDIReview()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user(true);

    	$id_usuario 	= 	$this->session->userdata('userid');
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_ciclo 		= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$avaliacoes = $service->get_user_avaliacoes_details($id_protocolo_avaliacao, $id_usuario, $id_ciclo);

    	echo json_encode($avaliacoes[0]);
    	exit;
    }

	public function updateFinalReviewById() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');
    	$this->load->model('servicedao');
    	$service 			= 	new servicedao();
    	$result 			= 	array();
    	$valore  			= 	$this->input->post('valore');
    	$desempnho  		= 	$this->input->post('desempnho');
    	$performance  		= 	number_format($this->input->post('performance'),2);
    	$avaliacao_quali  	= 	$this->input->post('avaliacao_quali');
    	$geral  			= 	$this->input->post('geral');
		$id_usuario 		= 	$this->session->userdata('userid');
    	$id_empresa 		= 	$this->session->userdata('id_empresa');
    	$id_ciclo 			= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');

		$result = $service->update_final_review_by_id( $id_protocolo_avaliacao, $valore, $desempnho, $performance,$avaliacao_quali,$geral);

    	echo json_encode($result);
	}

	public function requestFeedbackProfile() {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();
    	$id_usuario 	= 	$this->session->userdata('id');
    	$requestuser 	= 	$this->input->post('requestuser');
    	$description 	= 	$this->input->post('description');
    	$prazo 	= 	$this->input->post('prazo');

		$result = $service->request_new_feedback( $id_usuario, $requestuser, $description, $prazo);

        $alerta_data = array (
            'id_usuario' => $requestuser[0],
            'id_empresa' => $id_empresa,
            'descricao' => $description,
            'tipo' => 'solicitado',
            'ativo' => 1,
            'usuario_atualizador' => $id_usuario,
            'id_feedback' => $result
        );

        $alert_save_activity = $service->add_feedback_alert($alerta_data);


        echo json_encode($result);
    }

	public function getUserPotential()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$result = array();

    	$id_empresa = $this->session->userdata('id_empresa');

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

		$id_usuario 				= 	$this->session->userdata('userid');
		$user_details 				=	$service->get_users_details_by_id($id_usuario);
		if(!empty($user_details) && isset($user_details[0]['id_cargo'])){
			$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
			$result = $service->get_user_potential_questions($id_usuario, $id_protocolo_avaliacao, $user_details[0]['id_cargo']);
		}
    	echo json_encode($result);
    }
	public function getUserPotentialForReviewProfile()
    {
		header('Content-type: application/json');
    	$this->get_acesso_user (true);
    	$result 					= 	array();
    	$id_empresa 				= 	$this->session->userdata('id_empresa');
    	$service 					= 	new servicedao();
    	$result 					= 	array();
		$id_protocolo_avaliacao 	= 	$this->input->post('avalicao_id');
		$id_usuario 				= 	$this->input->post('id_usuario');
		$user_details 				=	$service->get_users_details_by_id($id_usuario);
		if(!empty($user_details) && isset($user_details[0]['id_cargo'])){
			$result = $service->get_user_potential_questions($id_usuario, $id_protocolo_avaliacao, $user_details[0]['id_cargo']);
		}
    	echo json_encode($result);
    }

	public function getCargos()
    {
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();
		$id_empresa 			= 	$this->session->userdata('id_empresa');
		$result = $service->get_cargos($id_empresa);
    	echo json_encode($result);
    }

	/*public function getUserSkills()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

		$id_usuario 			= 	$this->session->userdata('userid');
		$id_protocolo_avaliacao = 	$this->session->userdata('id_protocolo_avaliacao');

		$result = $service->get_user_skills($id_usuario,$id_protocolo_avaliacao);

    	echo json_encode($result);
    }*/

	public function getUserSkillsForReview()
    {
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$out 		= 	array();
    	$service 	= 	new servicedao();
    	$result 	= 	array();
		
		$id_usuario = $this->input->get('id_usuario');
		$id_protocolo_avaliacao = $this->input->get('avalicao_id');
		$result 	= 	$service->get_user_skills($id_usuario,$id_protocolo_avaliacao);
    	echo json_encode($result);
    }
	public function getUserValoresForReview()
    {
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

		$id_usuario = $this->input->get('id_usuario');
		$id_protocolo_avaliacao = $this->input->get('avalicao_id');
    	$id_empresa = $this->session->userdata('id_empresa');
		$result = $service->get_user_valores_review($id_usuario,$id_protocolo_avaliacao,$id_empresa);
    	echo json_encode($result);
    }

	public function getUserPDI()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user(true);

    	$id_usuario = $this->session->userdata('userid');
    	$id_empresa = $this->session->userdata('id_empresa');
    	$id_ciclo = $this->session->userdata('id_ciclo');

    	$this->load->model('servicedao');

    	$service = new servicedao();

    	$global = $service->get_my_objective_for_cycle($id_usuario, $id_ciclo);

		$id_protocolo_avaliacao = $this->session->userdata('id_protocolo_avaliacao');
    	$avaliacoes = $service->get_user_avaliacoes_details($id_protocolo_avaliacao, $id_usuario, $id_ciclo);

    	$tatics = $service->get_details_goals_tatics_by_id_empresa_id_cyclo_and_user($id_usuario, $id_ciclo);

    	echo json_encode(array('tatics'=>$tatics,'global'=>$global,'avaliacoes'=>$avaliacoes[0]));
    	exit;
    }


    public function saveNewPerformance()
    {

		$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

		$id_usuario 				= 	$this->session->userdata('userid');
		$newperformances 			= 	$this->input->post('new_per');
		$id_ciclo 					= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
		$result = $service->save_new_performance($id_usuario, $newperformances, $id_ciclo, $id_protocolo_avaliacao);
    	echo json_encode($result);
    }

	public function saveGeral()
    {
		$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

		$id_usuario 				= 	$this->session->userdata('userid');
		$geral 						= 	$this->input->post('geral');
		$avaliacao_quali 			= 	$this->input->post('avaliacao_quali');
		$id_ciclo 					= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');

		$result = $service->save_geral($geral, $avaliacao_quali,$id_protocolo_avaliacao);
    	echo json_encode($result);
    }

	public function savePotentialAnswers()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

    	$answers 					= 	$this->input->post('answers');
		$id_usuario 				= 	$this->session->userdata('userid');
		$id_ciclo 					= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');


		$result = $service->save_answers($id_usuario, $answers, $id_ciclo, $id_protocolo_avaliacao);

    	echo json_encode($result);
    }
	public function savePotentialAnswersForReviewProfile()
    {
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();
		$answers 					= 	$this->input->post('answers');
		$id_usuario 				= 	$this->session->userdata('userid');
		$id_ciclo 					= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
		$result = $service->save_answers($id_usuario, $answers, $id_ciclo, $id_protocolo_avaliacao);

    	echo json_encode($result);
    }

	public function saveSkills()
    {

		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();

    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$result = array();

		$skills 					= 	$this->input->post('skills');
		$id_usuario 				= 	$this->session->userdata('userid');
		$id_ciclo 					= 	$this->session->userdata('id_ciclo');
		$id_protocolo_avaliacao 	= 	$this->session->userdata('id_protocolo_avaliacao');
		$result = $service->save_skills($id_usuario, $skills, $id_ciclo, $id_protocolo_avaliacao);

    	echo json_encode($result);
    }

	/*public function saveCurrentSession()
 {

	header('Content-type: application/json');
    	$this->get_acesso_user ( true );

	 	$this->session->set_userdata(array(
	 									'userid'=>$this->input->post('userid'),
	 									'id_protocolo_avaliacao'=>$this->input->post('id_protocolo_avaliacao'),
	 									'id_ciclo'=>$this->input->post('id_ciclo'),
	 									'year'=>$this->input->post('year'),
	 								));
	 	echo json_encode(array(true));
     }*/

    // Metodo coleta todos os times de uma empresa
    public function getGlobalsTree(){

    	header('Content-type: application/json');
    	//$this->get_acesso_user ( true );

    	$this->load->model('servicedao');
    	$service = new servicedao();

    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

    		$this->form_validation->set_rules ( 'id', 'Objetivo', 'required' );

    		if ($this->form_validation->run ()) {

    			$id =  $this->input->post('id');
				
				$id_empresa = $this->session->userdata('id_empresa');
    			$globals = $service->get_global_goals_by_id($id,$id_empresa);
    			//$this->debugMark('teste', $globals);

    			$result = $this->getGlobalsTreeRecursive($globals);

    		}else{
    			$out['error'] = true;
    			$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';
    		}

    	}else{
    		$out['error'] = true;
    		$out['error_message'] = 'Os Campos Obrigatórios não foram preenchidos, por favor preencha e reenvie o formulário.';

    	}

    	echo json_encode($result);
    }

    // Metodo coleta todos os times de uma empresa
    private function getGlobalsTreeRecursive($globals){

    	$this->load->model('servicedao');
		$id_empresa = $this->session->userdata('id_empresa');
    	$service = new servicedao();

    	for($i = 0 ; $i < sizeof($globals) ; $i++)
    	{
    		$tmpArray = $service->get_all_globals_by_parent_id($globals[$i]['id'],$id_empresa);
    		//$this->debugMark($teams[$i]['parent_id'], $tmpArray);
    		if(sizeof($tmpArray) > 0)
    		{
    			$globals[$i]['sub'] =  $this->getGlobalsTreeRecursive($tmpArray);
    		}else{
    			$globals[$i]['sub'] =  array();
    		}
    	}
    	return $globals;
    }

    public function orgranograma()
    {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$service->get_organograma();
    }
    public function getUserTeam()
    {
    	$this->load->model('servicedao');
    	$service = new servicedao();
		$id_empresa = $this->session->userdata('id_empresa');
		$user_id = 	$this->input->post('user_id');
		$data = $service->get_user_team($id_empresa,$user_id);
    	if(!empty($data)){
			echo json_encode($data['id_time']);
		}else{
			echo json_encode(0);
		}
    }

    public function setElo()
    {
        header('Content-type: application/json');

        $this->get_acesso_user(true);

        if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {

        	$mencoes = json_decode($this->input->post('mencoes'), true);
            $eloData = array(
                'usuario_atualizador' => $this->session->userdata('id'),
                'descricao_elogio' => $this->input->post('descricao_elogio'),
                'mencoes' => $mencoes,
                'tipo' => $this->input->post('tipo'),
                'imagens' => array(),
                'id_empresa' => $this->session->userdata('id_empresa')
            );

			foreach ($_FILES as $key => $value) {
				$fileNameDoc = $value["name"];
				$target_file_doc = UPLOAD . basename($fileNameDoc);
				$fileTypeDoc = pathinfo($target_file_doc,PATHINFO_EXTENSION);
				$url_image = '';

				if (move_uploaded_file($value["tmp_name"], $target_file_doc)) {

					$nome = $this->createRandWord(40).'.'.$fileTypeDoc;

					$fileToSave = IMG . $this->session->userdata('id_empresa') ;

					if( !file_exists( IMG . $this->session->userdata('id_empresa') )){
						mkdir( $fileToSave , 0777, true);
						chmod( $fileToSave , 0777);
					}

					copy ( $target_file_doc , $fileToSave . '/' . $nome);
					unlink($target_file_doc);

					// $url_image = base_url('assets/img') . '/'. $id_empresa .'/'.$nome;
					$img_name = $nome;
					$eloData["imagens"][] = $img_name;
				}
			}


            $out ['error'] = false;
            $out ['error_message'] = '';

            $this->load->model('servicedao');
            $service = new servicedao();
            $ret = $service->set_elo($eloData);
            if(!$ret){
                $out ['error'] = true;
            } 

        }else{
            $out ['error'] = true;
            $out ['error_message'] = 'Nenhum formulário foi submetido.';
        }
        echo json_encode($out);
        exit;
    }

    public function getElosByCompanyId()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $companyId = $this->input->post('companyId');
        $limit = $this->input->post('limit');
        $lastEloIdLoaded = $this->input->post('lastEloIdLoaded');
        $hashtagFilter = $this->input->post('hashtagFilter');

        $returnObj = $service->get_elos_by_company_id($companyId, 0, 0, true, $limit, $this->session->userdata('id'), $lastEloIdLoaded, $hashtagFilter);

        //remover tag "lido" de elos que não são para o usuário em questão
        $userId = $this->session->userdata('id');
        foreach ($returnObj['elos'] as $key=>$elo) {
//            $arr = explode(",", $returnObj['elos'][$key]['usuarios_mencionados']);
            $foundOcurrence = false;
            if ($returnObj['elos'][$key]['usuarios_mencionados']){
	            foreach ($returnObj['elos'][$key]['usuarios_mencionados'] as $metionedUser) {
	                if($metionedUser['id'] == $userId)
	                {
	                    $foundOcurrence = true;
	                    break;
	                }
	            }
	        }
            if (!$foundOcurrence) {
                $returnObj['elos'][$key]['lido'] = "n/d";
                $returnObj['elos'][$key]['novos_comentarios'] = "n/d";
                $returnObj['elos'][$key]['novas_curtidas'] = "n/d";
            }
        }

        echo json_encode($returnObj);

    }
    public function getElosIHaveBeenMentioned()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $userId = $this->session->userdata('id');
        $limit = $this->input->post('limit');
        $lastEloIdLoaded = $this->input->post('lastEloIdLoaded');

        $returnObj = $service->get_elos_by_mentioned_member_id($userId, 0, 0, true, $limit, $userId, $lastEloIdLoaded);

        foreach ($returnObj['elos'] as $key=>$elo) {
//            $arr = explode(",", $returnObj['elos'][$key]['usuarios_mencionados']);
            $showRead = false;
            if (isset($elo['tipo']) && $elo['tipo'] == 'comment') $showRead = true;
            else {
                foreach ($returnObj['elos'][$key]['usuarios_mencionados'] as $metionedUser) {
                    if ($metionedUser['id'] == $userId) {
                        $showRead = true;
                        break;
                    }
                }
            }
            if (!$showRead) {
                $returnObj['elos'][$key]['lido'] = "n/d";
                $returnObj['elos'][$key]['novos_comentarios'] = "n/d";
                $returnObj['elos'][$key]['novas_curtidas'] = "n/d";
            }
        }


        echo json_encode($returnObj);

    }
    public function getEloComments()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $eloId = $this->input->post('elo_id');
        $lastId = $this->input->post('lastLoadedId');
        $limit = $this->input->post('limit');

        $comments = $service->get_comments_by_elo_id($eloId, $lastId, $limit);

        if (count($comments['comments']) > 0) {
            $userId = $this->session->userdata('id');
            $commentsIds = [];
            foreach ($comments['comments'] as $key => &$comment) {
                $commentsIds[] = $comment['id'];
            }
            $service->set_comment_mention_as_read($commentsIds, $userId);
        }

        echo json_encode($comments);

    }
    public function getElosStatsFromCurrentUser()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $userId = $this->session->userdata('id');
        $hourInterval = $this->input->get('tophash_hour_interval');


        $stats = $service->get_elos_stats_by_id($userId);

        $stats['topHashtags'] = $service->get_top_hashtags_from_elos($this->session->userdata('id_empresa'), $hourInterval);

        echo json_encode($stats);

    }
    public function getLikesFromElo()
    {
        header('Content-type: application/json');

        $this->load->model('servicedao');

        $service = new servicedao();

        $eloId = $this->input->post('id');

        $likes = $service->get_likes_from_elo_id($eloId);

        echo json_encode($likes);
    }
    public function getUnreadElosTotal()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');

        $service = new servicedao();

        $count = $service->get_unread_elos_count($id_usuario);

        echo json_encode($count);

    }
    public function getLastNotifications(){

        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');

        $service = new servicedao();

        $notifications = $service->get_last_notifications($id_usuario);

        echo json_encode($notifications);

    }
    public function getCycleNotifications(){

        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id_usuario = $this->session->userdata('id');

        $service = new servicedao();

        $notifications = $service->get_cycle_notifications($id_usuario);

        echo json_encode($notifications);

    }
    public function markEloAsRead()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $ids = $this->input->post('ids');
        $reader_id = $this->session->userdata('id');

        $service = new servicedao();

        $count = $service->mark_elo_as_read($ids, $reader_id);
        $count2 = $service->mark_like_as_read_by_elo_owner($ids, $reader_id);

        echo json_encode($count);

	}
	public function marcarOkrAprovadoComoLido()
    {
        header('Content-type: application/json');

        $this->load->model('servicedao');
        $id = $this->input->post('id');

        $service = new servicedao();

        $count = $service->marcar_okr_aprovado_como_lido($id);

        echo json_encode($count);

    }
	public function marcarOkrReprovadoComoLido()
    {
        header('Content-type: application/json');

        $this->load->model('servicedao');
        $id = $this->input->post('id');

        $service = new servicedao();

        $count = $service->marcar_okr_reprovado_como_lido($id);

        echo json_encode($count);

    }

    public function likeElo()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );
        $viewerId = $this->session->userdata('id');

        $this->load->model('servicedao');
        $id = $this->input->post('id');

        $service = new servicedao();

        $count = $service->like_elo($id, $viewerId);

        echo json_encode($count);

    }
    public function deleteFeed()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        $id = $this->input->post('id');

        $service = new servicedao();

        $result = $service->delete_feed($id);

		echo json_encode($result);
    }
    public function editFeed()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');
        
        $id = $this->input->post('id');
        $description = $this->input->post('description');
        $mencoes = json_decode($this->input->post('mencoes'), true);

        $service = new servicedao();

        $result = $service->edit_feed($id, $description);

        if ($mencoes) {
        	$service->update_elogio_mencoes($mencoes, $id);	
        }

        $service->update_elogio_hashtag($description, $id);

		echo json_encode($result);
    }
    public function commentElo()
    {
        header('Content-type: application/json');

        $this->get_acesso_user ( true );
        $commenterId = $this->session->userdata('id');

        $this->load->model('servicedao');
        $id = $this->input->post('id');
        $comment = $this->input->post('comment');
        $mentions = $this->input->post('mencoes');

        $service = new servicedao();

        $response = $service->comment_elo($id, $commenterId, $comment, $mentions);
        if ($response) $response = ["user_id"=>$commenterId, "comment_text"=>$comment];

        echo json_encode($response);

	}

	/**
	 * @raptor add pesquisa menu
	 */
	
	public function getPesquisaByUsuario(){
		header('Content-type: application/json');

        $this->get_acesso_user ( true );
        $commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_pesquisa_by_usuario();
		echo json_encode($response);
	}

	public function getUsersByEmpresa(){
		header('Content-type: application/json');
        $this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_users_by_empresa();
		echo json_encode($response);
	}

	public function getPublicPesquisaByUsuario(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_usuario = $this->session->userdata('id');
		$id_empresa  = $this->session->userdata('id_empresa');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_public_pesquisa_by_usuario($this->input->get('id_pesquisa'), $id_usuario, $id_empresa);
		
		echo json_encode($response);
	}

	public function getPublicPesquisaToSelect(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_empresa  = $this->session->userdata('id_empresa');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_public_pesquisa_to_select_by_empresa($id_empresa);
		
		echo json_encode($response);
	}

	public function getQuestionarios(){
		header('Content-type: application/json');
		$this->get_acesso_user(true);
		$commenterId 	= 	$this->session->userdata('id');
		$service 		= 	new servicedao();
		$tipo 			= 	$this->input->get('tipo');
		$id_empresa     = $this->session->userdata('id_empresa');
		$response 		= 	$service->get_questionarios($tipo,$id_empresa);
		echo json_encode($response);
	}
	
	public function getUsersByTeams(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$userType = $this->input->get('userType'); 
		$userType = isset($userType)?$userType:null;
		$userLevel = $this->input->get('userLevel'); 
		$userLevel = isset($userLevel)?$userLevel:null;
		$response = $service->get_users_by_teams($this->input->get('strTeams'), $userType, $userLevel);
		
		echo json_encode($response);
	}

	public function getTeamsByTeamsId(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_teams_by_teams_id($this->input->get('strTeams'));
		
		echo json_encode($response);
	}

	public function getUsersByIds(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_users_by_ids($this->input->get('strUsers'));
		
		echo json_encode($response);
	}


	public function getAllGestor(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_time = $this->input->get('id_time');
		$id_category = $this->input->get('id_category');
		$id_pergunta = $this->input->get('id_pergunta');
		$fechado = $this->input->get('fechado');

		$response = $service->get_all_gestors($id_time,$id_category,$id_pergunta, $fechado);
		
		echo json_encode($response);
	}

	public function getAllCargos(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_time = $this->input->get('id_time');
		$id_category = $this->input->get('id_category');
		$id_pergunta = $this->input->get('id_pergunta');
		$id_gestor = $this->input->get('id_gestor');

		$response = $service->get_all_cargos($id_time,$id_category,$id_pergunta,$id_gestor);
		
		echo json_encode($response);
	}

	public function getAllCategory(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_time = $this->input->get('id_time');
		$id_pesquisa = $this->input->get('id_pesquisa');
		$fechado = $this->input->get('fechado');
		$response = $service->get_all_category($id_time, $fechado,$id_pesquisa);
		
		echo json_encode($response);
	}

	public function getAllTeamsPesquisa(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');
		$id_tags = $this->input->get('id_tags');
		$fechado = $this->input->get('fechado');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_all_teams_pesquisa($id_tags, $fechado);
		
		echo json_encode($response);
	}
	public function getAllTagsPesquisa(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_all_tags_pesquisa();
		
		echo json_encode($response);
	}
	public function getAllSurveyPesquisa(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$type = $this->input->get('type');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_all_surveys_pesquisa($type);
		
		echo json_encode($response);
	}

	public function closeYouTimeByIdProtocol() {
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_protocolo = $this->input->post('id_protocolo');

		$result = $service->close_you_time_by_id_protocolo($id_protocolo);

		echo json_encode($result);
	}

	public function confirmYouTimeByIdProtocol() {
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_protocolo = $this->input->post('id_protocolo');

		$result = $service->confirm_you_time_by_id_protocolo($id_protocolo);

		echo json_encode($result);
	}

	public function getYouTimeByIdProtocol() {
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_protocolo = $this->input->post('id_protocolo');

		$result = $service->get_you_time_by_idprotocol($id_protocolo);

		echo json_encode($result);
	}

	public function getYouTimeNotification() {
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_usuario = $this->session->userdata('id');

		$result = $service->get_you_time_notification($id_usuario);

		echo json_encode($result);
	}

	public function getYouTimeByUserCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_usuario = $this->input->post('id_user');
		$id_cycle = $this->input->post('id_cycle');

		$result = $service->get_you_time_by_user_cycle($id_usuario, $id_cycle);

		echo json_encode($result);
	}

	public function getRevisaoCicloPerformanceDoTime(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$admin =null;
		$this->load->model('servicedao');
		$service = new servicedao();
		$usuarioLogado = $this->session->userdata('id');

		if($this->session->userdata('admin') == 1){
			$admin 	= 1;
		}
    	$id_cycle = $this->input->post('id_cycle');
    	$id_empresa = $this->session->userdata('id_empresa');
    	
		$results = $service->get_revisao_ciclo_score_performance_do_time_tab($usuarioLogado,$admin,$id_empresa,$id_cycle);
		if(!empty($results)){
			foreach($results as &$result){
				$result['youtime'] = $service->get_you_time_by_user_cycle($result['id_usuario_avaliado'], $result['id_revisao_ciclo']);
			}
		}

		echo json_encode($results);
	}

	public function getAllRevisaoCiclo(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$admin =null;
		$this->load->model('servicedao');
		$service = new servicedao();
		$usuarioLogado = $this->session->userdata('id');

		if($this->session->userdata('admin') == 1){
			$admin 	= 1;
		}
		$id_time = $this->input->post('id_time');
    	$id_cycle = $this->input->post('id_cycle');
    	$id_usuario = $this->input->post('id_user');
    	$id_nivel = $this->input->post('id_nivel');
    	$id_gestor = $this->input->post('id_gestor');
    	$gestor = $this->input->post('gestor');
    	$id_empresa = $this->session->userdata('id_empresa');
    	
		$response = $service->get_revisao_ciclo_score_result($usuarioLogado,$admin,$id_time,$id_cycle,$id_usuario,$id_nivel,$id_gestor,$gestor,$id_empresa,1);

		echo json_encode($response);
	}
	public function getAllFeedbacksByCompany(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$admin =null;
		$this->load->model('servicedao');
		$service = new servicedao();
		$teams = $this->input->post('teams');
		$teamsRemetente = $this->input->post('teamsRemetente');
		$users = $this->input->post('users');
		$usersRemetente = $this->input->post('usersRemetente');
		$acaos = $this->input->post('acaos');
		$ini_date = $this->input->post('ini_date');
		$end_date = $this->input->post('end_date');
		$filtroSemRetorno = $this->input->post('filtroSemRetorno');
		$tipos_feedback = $this->input->post('tipos_feedback');
		$response = $service->get_all_feedbacks($teams, $teamsRemetente, $users, $usersRemetente, $tipos_feedback, $acaos, true, $ini_date, $end_date, $filtroSemRetorno);

		echo json_encode($response);
	}
	public function getFeedbackChartData()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$id_empresa = $this->session->userdata('id_empresa');
    	$teams = $this->input->post('teams');
		$teamsRemetente = $this->input->post('teamsRemetente');
		$users = $this->input->post('users');
		$usersRemetente = $this->input->post('usersRemetente');
		$acaos = $this->input->post('acaos');
		$ini_date = $this->input->post('ini_date');
		$end_date = $this->input->post('end_date');
		$filtroSemRetorno = $this->input->post('filtroSemRetorno');
		$tipos_feedback = $this->input->post('tipos_feedback');

    	$resultAcao = $service->get_feedback_chart_acao($id_empresa);
    	$resultTipo = $service->get_feedback_chart_tipo($id_empresa);
    	$resultTime = $service->get_feedback_chart_time($id_empresa);
    	$resultGestor = $service->get_feedback_chart_gestor($id_empresa);
    	$resultValoreArea = $service->get_feedback_chart_valore_area($id_empresa);
    	$out = array('acao' => $resultAcao, 'tipo' => $resultTipo, 'time' => $resultTime, 'gestor' => $resultGestor, 'va' => $resultValoreArea);

    	echo json_encode($out);
    	exit();
    }
	public function getFeedbackComments()
	{
		header('Content-type: application/json');

		$feedback_id 	= 	$this->input->post('feedback_id');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->get_feedback_comments($feedback_id);
		echo json_encode($result);
	}
	public function addFeedbackComment()
	{
		header('Content-type: application/json');

		$id_usuario 	= 	$this->session->userdata('id');
		$feedback_id 	= 	$this->input->post('feedback_id');
		$comment		= 	$this->input->post('comment');
		$touser				= 	$this->input->post('touser');

		$this->load->model ('servicedao');
		$service = new servicedao();

		$result 	= $service->add_feedback_comment($id_usuario, $feedback_id, $comment, $touser);

		$reading_data = array(
        	'id_feedback_comentario' => $result,
        	'id_usuario_destino' => $touser,
        	'usuario_atualizador' => $id_usuario,
        	'lido' => 0
        );
        $service->add_feedback_reply_reading($reading_data);

		echo json_encode($result);
	}
	public function getAllKeyResults(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_empresa = $this->session->userdata('id_empresa');
		$nome = $this->input->post('nome');
		$times = $this->input->post('times');
		$responsavels = $this->input->post('responsavels');
		$objectives = $this->input->post('objectives');
		$cycles = $this->input->post('cycles');
		$active = $this->input->post('active');
		$response = $service->get_all_keyresults($id_empresa, $nome, $times, $responsavels, $objectives, $cycles, $active, true);

		echo json_encode($response);
	}
	public function getRchaveHistory(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$codigo = $this->input->post('codigo');
		$nome = $this->input->post('nome');
		$response = $service->get_rchave_history($codigo, $nome);

		echo json_encode($response);
	}
	public function getRchaveHistoryDetailsById(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id = $this->input->post('id');
		$response = $service->get_rchave_history_details_by_id($id);

		echo json_encode($response);
	}
	public function saveRchaveHistory(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();

		$id = $this->input->post('id');
		$data = array(
    		'id_kr_sistema_origem' => $this->input->post('codigo'),
    		'nome' => $this->input->post('nome'),
    		'minimo' => $this->input->post('minimo'),
    		'target' => $this->input->post('target'),
    		'maximo' => $this->input->post('maximo'),
    	);

    	for ($i=1; $i < 16; $i++) { 
    		$category = 'categoria_' . $i;
    		$data[$category] = $this->input->post($category);
    		$meta = 'meta_' . $i;
    		$data[$meta] = $this->input->post($meta);
    		$valor = 'valor_' . $i;
    		$data[$valor] = $this->input->post($valor);
    	}
		
		$response = $service->update_key_result_history($id, $data);

		echo json_encode($response);
	}
	public function saveRchaveHistoryHeader(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();

		$id_history = $this->input->post('id_history');
		$data = array(
    		'id_kr_sistema_origem' => $this->input->post('codigo'),
    		'minimo' => $this->input->post('minimo'),
    		'target' => $this->input->post('target'),
    		'maximo' => $this->input->post('maximo'),
    		'peso' => $this->input->post('peso'),
    		'nome' => $this->input->post('nome'),
    		'descricao' => $this->input->post('descricao'),
    		'forma_atualizacao' => $this->input->post('bloque'),
    		'pattern' => $this->input->post('tipo'),
    		'forma_calculo' => $this->input->post('formula'),
    		'unidade_meta' => $this->input->post('unidade'),
    		'polaridade' => $this->input->post('polar')
    	);
		
		$response = $service->update_key_result_history($id_history, $data);

		echo json_encode($response);
	}
	public function addRchaveHistoryHeader(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();

		$data = array(
    		'id_kr_sistema_origem' => $this->input->post('codigo'),
    		'minimo' => $this->input->post('minimo'),
    		'target' => $this->input->post('target'),
    		'maximo' => $this->input->post('maximo'),
    		'peso' => $this->input->post('peso'),
    		'nome' => $this->input->post('nome'),
    		'descricao' => $this->input->post('descricao'),
    		'forma_atualizacao' => $this->input->post('bloque'),
    		'pattern' => $this->input->post('tipo'),
    		'forma_calculo' => $this->input->post('formula'),
    		'unidade_meta' => $this->input->post('unidade'),
    		'polaridade' => $this->input->post('polar')
    	);
		
		$response = $service->add_key_result_history($data);

		echo $response;
	}
	public function saveRchaveHistoryValues()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$id = $this->input->post('id');
    	$key_m = $this->input->post('key_m');
    	$val_m = $this->input->post('val_m');
    	$key_v = $this->input->post('key_v');
    	$val_v = $this->input->post('val_v');
    	$tipo = $this->input->post('tipo');

    	if ($tipo == 4) {
    		if ($val_m != '') {
				$val_m = date_create_from_format('d/m/Y', $val_m);
				$val_m = date_format($val_m, 'Y-m-d');
			} else {
				$val_m = null;
			}
			if ($val_v != '') {
				$val_v = date_create_from_format('d/m/Y', $val_v);
				$val_v = date_format($val_v, 'Y-m-d');
			} else {
				$val_v = null;
			}
			
    		$key_m .= "_date";
    		$key_v .= "_date";
    	}

    	$data = array(
    		$key_m => $val_m,
    		$key_v => $val_v
    	);

    	$response = $service->update_key_result_history($id, $data);

		echo json_encode($response);
    }
	function csvDownloadIndicators()
	{
		if ($this->input->post('search_name')) $nome = $this->input->post('search_name'); else $nome = null;
		if ($this->input->post('teams')) $times = explode(',', $this->input->post('teams')); else $times = null;
		if ($this->input->post('responsavels')) $responsavels = explode(',', $this->input->post('responsavels')); else $responsavels = null;
		if ($this->input->post('objectives')) $objectives = explode(',', $this->input->post('objectives')); else $objectives = null;
		if ($this->input->post('cycles')) $cycles = explode(',', $this->input->post('cycles')); else $cycles = null;
		if ($this->input->post('activos')) $active = explode(',', $this->input->post('activos')); else $active = null;
		$id_empresa = $this->session->userdata('id_empresa');

        $filename = "indicators-".date('d-m-Y').".csv";
		
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $this->load->model('servicedao');
        $service = new servicedao();
        $result = $service->get_all_keyresults($id_empresa, $nome, $times, $responsavels, $objectives, $cycles, $active, false);
		$data 	= 	$this->dbutil->csv_from_result($result, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;
        force_download($filename, $data);
	}
	public function getObjectives(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_empresa = $this->session->userdata('id_empresa');
		$response = $service->get_all_objectives($id_empresa);

		echo json_encode($response);
	}
	public function getCodigoes(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_codigoes();

		echo json_encode($response);
	}
	public function getRchaveHistoricNames(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_rchave_historic_names();

		echo json_encode($response);
	}
	public function getAllRevisaoCiclo9Box(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$teams = $this->input->post('teams');
		$cycles = $this->input->post('cycles');
		$responsibles = $this->input->post('responsibles');
		$nivies = $this->input->post('nivies');
		$usuarios = $this->input->post('usuarios');
		$id_empresa = $this->session->userdata('id_empresa');
		$response = $service->get_revisao_ciclo_score_nine_box($teams, $cycles, $responsibles, $nivies, $usuarios, $id_empresa);

		echo json_encode($response);
	}

	public function updateNineBoxByUser(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_revisao_ciclo_score = $this->input->post('id_revisao_ciclo_score');
		$value = $this->input->post('nine_box_value');
		$response = $service->update_nine_box_by_id($id_revisao_ciclo_score, $value);

		echo json_encode($response);
	}

	public function updateNineBoxDetailsByUser(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_revisao_ciclo_score = $this->input->post('id_revisao_ciclo_score');
		$nine_box = $this->input->post('nine_box_value');
		$feedback = $this->input->post('feedback');
		$response = $service->update_nine_box_details_by_id($id_revisao_ciclo_score, $nine_box, $feedback);

		echo json_encode($response);
	}

	public function resetNineBoxCalibrado(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_revisao_ciclo_score = $this->input->post('id_revisao_ciclo_score');
		$response = $service->reset_nine_box_calibrado($id_revisao_ciclo_score);

		echo json_encode($response);
	}

	public function getCareerVisibleByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_usuario = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle = $this->input->post('cycle');

		$response = $service->get_career_visible_by_cycle($cycle, $id_usuario);

		echo json_encode($response);
	}

	public function getResultsFromUserByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle = $this->input->post('cycle');
		$user_id = $this->input->post('user_id');

		if (!$user_id) $user_id = $this->session->userdata('id');
		$response = $service->get_results_from_user_by_cycle($user_id, $cycle);

		echo json_encode($response);
	}
	public function getUserAveragesScores(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$user_id = $this->input->post('user_id');
		$id_empresa = $this->session->userdata('id_empresa');
		$response = $service->get_user_average_scores($user_id);

		echo json_encode($response);
	}

	public function getCommentsByValue(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_valores = $this->input->post('id_valores');
		$id_usuario = $this->input->post('id_usuario');
		$id_ciclo = $this->input->post('id_ciclo');
		$id_tipo_avaliacao = $this->input->post('id_tipo_avaliacao');
		$response = $service->get_comments_by_value($id_valores, $id_usuario, $id_ciclo, $id_tipo_avaliacao);

		echo json_encode($response);
	}
	public function getCommentsByOutraEtapa(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta = $this->input->post('id_pergunta');
		$id_usuario = $this->input->post('id_usuario');
		$id_ciclo = $this->input->post('id_ciclo');
		$id_tipo_avaliacao = $this->input->post('id_tipo_avaliacao');
		$response = $service->get_comments_by_outraetapa($id_pergunta, $id_usuario, $id_ciclo, $id_tipo_avaliacao);

		echo json_encode($response);
	}

	public function getCommentsByPotencial(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta = $this->input->post('id_pergunta');
		$id_usuario = $this->input->post('id_usuario');
		$id_ciclo = $this->input->post('id_ciclo');
		$id_tipo_avaliacao = $this->input->post('id_tipo_avaliacao');
		$response = $service->get_comments_by_potencial($id_pergunta, $id_usuario, $id_ciclo, $id_tipo_avaliacao);

		echo json_encode($response);
	}
	public function getCommentsByResultado(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta = $this->input->post('id_pergunta');
		$id_usuario = $this->input->post('id_usuario');
		$id_ciclo = $this->input->post('id_ciclo');
		$id_tipo_avaliacao = $this->input->post('id_tipo_avaliacao');
		$response = $service->get_comments_by_resultado($id_pergunta, $id_usuario, $id_ciclo, $id_tipo_avaliacao);

		echo json_encode($response);
	}
	public function getCommentsByCompetencia(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_competencia = $this->input->post('id_competencia');
		$id_usuario = $this->input->post('id_usuario');
		$id_ciclo = $this->input->post('id_ciclo');
		$id_tipo_avaliacao = $this->input->post('id_tipo_avaliacao');
		$response = $service->get_comments_by_competencia($id_competencia, $id_usuario, $id_ciclo, $id_tipo_avaliacao);

		echo json_encode($response);
	}
	public function getAllCyclesByUser(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_usuario = $this->input->post('id_usuario');
		$response = $service->get_all_cycles_by_user($id_usuario);

		echo json_encode($response);
	}

	public function getLastCycleByUser(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_usuario = $this->input->post('id_usuario');
		$response = $service->get_last_cycle_by_user($id_usuario);

		echo json_encode($response);
	}

	public function getValoresFromUsuarioByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->get_valores_from_usuario_by_cycle($cycle_id, $user_id);

		echo json_encode($response);
	}

	public function getEvaluationAccess(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->get_evaluation_access($cycle_id, $user_id);

		echo json_encode($response);
	}

	public function grantEvaluationAccess(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->grant_evaluation_access($cycle_id, $user_id);

		// chamada e-mail
		if($response){
			//sendCycleReviewEmail();
		}
		

		echo json_encode($response);
	}
	public function revokeEvaluationAccess(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->revoke_evaluation_access($cycle_id, $user_id);

		echo json_encode($response);
	}
	public function getOutraEtapaFromUsuarioByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->get_outraetapa_from_usuario_by_cycle($cycle_id, $user_id);

		echo json_encode($response);
	}
	public function getPotencialFromUsuarioByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->get_potencial_from_usuario_by_cycle($cycle_id, $user_id);

		echo json_encode($response);
	}
	public function getCompetenciaFromUsuarioByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		if (!$user_id) $user_id = $this->session->userdata('id');
		$response = $service->get_competencia_from_usuario_by_cycle($cycle_id, $user_id);

		echo json_encode($response);
	}

	public function getResultadoFromUsuarioByCycle(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );

		$this->load->model('servicedao');
		$service = new servicedao();
		$cycle_id = $this->input->post('cycle_id');
		$user_id = $this->input->post('user_id');
		$response = $service->get_resultado_from_usuario_by_cycle($cycle_id, $user_id);

		echo json_encode($response);
	}

	public function getSingleScoresByRevisaoCicloId(){
		header('Content-type: application/json');
		$this->get_acesso_user(true);
		$this->load->model('servicedao');
		$service = new servicedao();
		$revisao_ciclo_id = $this->input->post('revisao_ciclo_id');
		$user_id = $this->input->post('user_id');
		$type = $this->input->post('type');
		$response = $service->get_single_scores_from_revisao_ciclo_id($revisao_ciclo_id, $user_id, $type);

		echo json_encode($response);
	}

	public function saveCalibratedScores(){
		header('Content-type: application/json');
		$this->get_acesso_user(true);

		$this->load->model('servicedao');
		$service = new servicedao();
		
		$failed = false;
		$scores = json_decode($this->input->post("scores"), true);
		// echo '--- '. gettype($scores). ' -------';
		foreach ($scores as $key => $score) {
			$response = $service->save_update_calibrated_scores($score['id_revisao_ciclo_avaliacoes_fase'], $score['score_calibrado']);
			if (!$response) $failed = true;
		}

		if (!$failed) $response = array('error'=>false, 'success'=>true, 'message'=>'Successfully saved');
		else $response = array('error'=>true, 'success'=>false, 'message'=>'Error saving');

		echo json_encode($response);
	}
	public function saveCalibratedAverage(){
		header('Content-type: application/json');
		$this->get_acesso_user(true);

		$this->load->model('servicedao');
		$service = new servicedao();

		$id = $this->input->post("id_revisao_ciclo_score");
		$average = $this->input->post("calibrated_average");
		$type = $this->input->post("type");
		
		$response = $service->save_update_calibrated_average($id, $average, $type);

		echo json_encode($response);
	}

	public function saveScoreSuggestion(){
		header('Content-type: application/json');
		$this->get_acesso_user(true);

		$this->load->model('servicedao');
		$service = new servicedao();

		$id = $this->input->post("id_revisao_ciclo_score");
		$suggestion = $this->input->post("id_recomendacao");
		
		$response = $service->save_score_suggestion($id, $suggestion);

		echo json_encode($response);
	}

	public function getAllPergunta(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');
		
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_time = $this->input->get('id_time');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_category = $this->input->get('id_category');
		$fechado = $this->input->get('fechado');
		$response = $service->get_all_perguntas($id_time,$id_category,$fechado,$id_pesquisa);
		
		echo json_encode($response);
	}

	public function getUsersTeamsList(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_users_teams_list($this->input->get('strUsers'), $this->input->get('strTeams'));
		
		echo json_encode($response);
	}

	public function getPesquisaById(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');
		$id_pesquisa = $this->input->get('id_pesquisa');
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_pesquisa_id($id_pesquisa);
		
		echo json_encode($response);
	}
	
	public function clSurvey(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_pesquisa = $this->input->post('id_pesquisa');
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->close_survey($id_pesquisa);
		
		echo json_encode($response);
	}
	
	public function setPesquisaOfUsuario1(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->set_pesquisa_usuario_one($this->input);
		
		echo json_encode($response);
	}

	public function addPublicOfUsuario(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->add_public_of_usuario($this->input);
		
		echo json_encode($response);
	}

	public function sendPesquisaMessage(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->send_pesquisa_message($this->input);
		
		echo json_encode($response);
	}

	public function generateZapierToken(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$user = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->generate_zapier_token($user);

		echo json_encode($response);
	}
	public function getZapierToken(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$user = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_zapier_token($user);

		echo json_encode($response);
	}

	public function generateApiToken(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$expire_date = $this->input->post('expire_date');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->generate_api_token($id_usuario, $id_empresa, $expire_date);

		echo json_encode($response);
	}
	public function getApiToken(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_api_token($id_usuario, $id_empresa);

		echo json_encode($response);
	}

	public function getPesquisaFullInfoById(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_pesquisa_full_info_by_id($this->input->get('id_pesquisa'));
		
		echo json_encode($response);
	}

	public function getQuestionList(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_question_list($this->input->get('id_pesquisa'), $this->input->get('escala'));
		echo json_encode($response);
	}

	public function getFilterCatPerguntaGester(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_times 		= $this->input->get('id_times');
		$id_cats 		= $this->input->get('id_cats');
		$id_perguntas 	= $this->input->get('id_perguntas');
		$id_gestors 	= $this->input->get('id_gestors');
		$type 			= $this->input->get('type');

		$response = $service->get_filter_cat_pergunta_gestor_list($id_times,$id_cats,$id_perguntas,$id_gestors,$type);
		echo json_encode($response);
	}

	public function getPesquisaRespostasList(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pesquisa = $this->input->get('id_pesquisa');
		$search_data = $this->input->get('search_data');
		$response = $service->get_pesquisa_respostas_list($id_pesquisa,$search_data);
		echo json_encode($response);
	}

	public function getPesquisaRespostasTypeQ(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_categoria 	= $this->input->get('id_cats');
		$id_gestors 	= $this->input->get('id_gest');
		$id_times 		= $this->input->get('id_times');
		$fechado 		= $this->input->get('fechado');
		$tempo_empresa 		= $this->input->get('selected_tempo_empresa');
		$response = $service->get_pesquisa_respostas_type_q($id_pergunta,$id_pesquisa,$id_categoria,$id_gestors,$id_times,$tempo_empresa, $fechado);
		echo json_encode($response);
	}
	public function getPesquisaRespostasTypeO(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_categoria 	= $this->input->get('id_cats');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$fechado 		= $this->input->get('fechado');
		$tempo_empresa 		= $this->input->get('selected_tempo_empresa');
		$response = $service->get_pesquisa_respostas_type_o($id_pergunta,$id_pesquisa,$id_categoria,$id_gestors,$id_times,$tempo_empresa, $fechado);
		echo json_encode($response);
	}

	public function getRatingDatas10(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$type 			= $this->input->get('type');
		$group_by 		= $this->input->get('group_by');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$fechado 		= $this->input->get('fechado');
		// $id_cargos 		= $this->input->get('id_cargos');
		$tempo_empresa 		= $this->input->get('selected_tempo_empresa');
		$response = $service->get_rating_datas_10($id_pergunta,$id_pesquisa,$id_users,$id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado);
		echo json_encode($response);
	}

	public function getAdesaoPesquisa(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$response = $service->get_adesao_pesquisa($id_pesquisa);
		echo json_encode($response);

	}
	public function getMatrixCategoryTeam(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');
		$response = $service->get_matrix_category_team($id_pergunta, $id_pesquisa, $id_users, $id_categoria, $id_gestors, $id_times, $tempo_empresa);
		echo json_encode($response);
	}
	public function getMatrixQuestionTeam(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');
		$response = $service->get_matrix_question_team($id_pergunta, $id_pesquisa, $id_users, $id_categoria, $id_gestors, $id_times, $tempo_empresa);
		echo json_encode($response);
	}
	public function getMatrixQuestionGestor(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');
		$response = $service->get_matrix_question_gestor($id_pergunta, $id_pesquisa, $id_users, $id_categoria, $id_gestors, $id_times, $tempo_empresa);
		echo json_encode($response);
	}
	public function getMatrixCategoryGestor(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();

		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');

		$response = $service->get_matrix_category_gestor($id_pergunta, $id_pesquisa, $id_users, $id_categoria, $id_gestors, $id_times, $tempo_empresa);
		echo json_encode($response);
	}

	public function getRatingDatas5(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$type 			= $this->input->get('type');
		$group_by 		= $this->input->get('group_by');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$fechado 		= $this->input->get('fechado');
		// $id_cargos 		= $this->input->get('id_cargos');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');


		$response = $service->get_rating_datas_5($id_pergunta, $id_pesquisa, $id_users,$id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado);
		echo json_encode($response);
	}

	public function getGlabalRatingDatas10(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service 		= new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$type 			= $this->input->get('type');
		$group_by 		= $this->input->get('group_by');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$fechado 		= $this->input->get('fechado');
		// $id_cargos 		= $this->input->get('id_cargos');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');

		$response = $service->get_glabal_rating_datas10($id_pergunta, $id_pesquisa, $id_users,$id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado);
		echo json_encode($response);
	}

	public function getGlabalRatingDatas5(){
		header('Content-type: application/json');
		$this->load->model('servicedao');
		$service = new servicedao();
		$id_pergunta 	= $this->input->get('id_pergunta');
		$id_pesquisa 	= $this->input->get('id_pesquisa');
		$id_users 		= $this->input->get('id_users');
		$id_categoria 	= $this->input->get('id_categoria');
		$type 			= $this->input->get('type');
		$group_by 		= $this->input->get('group_by');
		$id_gestors 	= $this->input->get('id_gestors');
		$id_times 		= $this->input->get('id_times');
		$fechado 		= $this->input->get('fechado');
		// $id_cargos 		= $this->input->get('id_cargos');
		$tempo_empresa 	= $this->input->get('selected_tempo_empresa');

		$response = $service->get_glabal_rating_datas5($id_pergunta, $id_pesquisa, $id_users,$id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado);
		echo json_encode($response);
	}

	public function exportPesquisaRespostasList(){
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Type: application/vnd.ms-excel');
				header("Content-Disposition: attachment; filename=filename.csv");
		
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		$delimiter = ",";
		$newline = "\r\n";
		$filename = "respostas-".date('d-m-Y').".csv";
	//	if (!$this->input->get('id_pesquisa') || $this->input->get('id_pesquisa') == 0 ) $tab = 'v_pesquisas_respostas';
	//	else $tab = 'ttl_snapshot_pesquisas_respostas';
	$tab = 'v_pesquisas_respostas';
		$sql = "SELECT
		IF(v.anonima = 1, 'anonimo', v.nome_usuario) AS usuario,
		v.nome_time_funcional AS time,
		IF(v.pergunta IS NULL, '', v.pergunta) AS pergunta,
		IF(v.resposta_qualitativa IS NULL, '', v.resposta_qualitativa) AS comentario,
		IF(v.rating_score IS NULL, '', v.rating_score) AS rating,
		IF(v.nome_categoria IS NULL, '', v.nome_categoria) AS categoria,
		CASE WHEN v.rating_score = '1' THEN 'Discordo totalmente' WHEN v.rating_score = '2' THEN 'Discordo' WHEN v.rating_score = '3' THEN 'Neutro' WHEN v.rating_score = '4' THEN 'Concordo' WHEN v.rating_score = '5' THEN 'Totalmente de acordo' END AS favorability,
		IF(v.resposta IS NULL, '', v.resposta) AS posta,
		u1.nome_usuario avaliado
		FROM ttl_usuario u,
				$tab v
				LEFT JOIN ttl_usuario u1
				ON v.usuario_avaliado = u1.id_usuario
		WHERE u.id_usuario = v.id_usuario
		AND v.id_pesquisa".$this->input->get('id_pesquisa');

		$q = $this->db->query($sql);
		
		$data = $this->dbutil->csv_from_result($q, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;

		force_download($filename, $data);
	}
	
	public function getPeopleDevelopement(){

        header('Content-type: application/json');

        $this->get_acesso_user ( true );

        $this->load->model('servicedao');

        $service = new servicedao();

        $id_empresa = $this->session->userdata('id_empresa');

        $id_surveys = $this->input->post('id_surveys');
        $id_tags = $this->input->post('id_tags');
        $id_teams = $this->input->post('id_teams');
        $id_gestors = $this->input->post('id_gestors');
        $id_users = $this->input->post('id_users');
        $start_time = $this->input->post('start_time');

        $questionario = $service->get_people_developement($id_empresa,$id_surveys,$id_tags,$id_teams,$id_gestors,$id_users,$start_time);

        echo json_encode($questionario);
    }

	public function exportPeopleDevelopement(){

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment; filename=filename.csv");

        $id_empresa = $this->session->userdata('id_empresa');
        $id_surveys = $this->input->post('id_surveys');
        $id_tags = $this->input->post('id_tags');
        $id_teams = $this->input->post('id_teams');
        $id_gestors = $this->input->post('id_gestors');
        $id_users = $this->input->post('id_users');
        $start_time = $this->input->post('start_time');

        $filename = "desenvolvimentopessoal-".date('d-m-Y').".csv";
		
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $this->load->model('servicedao');
        $service = new servicedao();
        $result = $service->get_people_developement($id_empresa,$id_surveys,$id_tags,$id_teams,$id_gestors,$id_users,$start_time, false);
        //$data = utf8_decode( $this->dbutil->csv_from_result($result, $delimiter, $newline) );
        
		$data 	= 	$this->dbutil->csv_from_result($result, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;
		
		force_download($filename, $data);
    }
	
	public function getSurveyDetailsForDevelopement(){

        header('Content-type: application/json');
        $this->get_acesso_user ( true );
        $this->load->model('servicedao');
        $service = new servicedao();
        $id_empresa = $this->session->userdata('id_empresa');
        $survey_id = $this->input->post('survey_id');
        $user_id = $this->input->post('user_id');
        $questionario = $service->get_survey_details_developement($survey_id, $id_empresa, $user_id);
        echo json_encode($questionario);
    }
	
	public function getAllQuestionsPeopleDevelopement(){

        header('Content-type: application/json');
        $this->get_acesso_user ( true );
        $this->load->model('servicedao');
        $service = new servicedao();
        $id_empresa = $this->session->userdata('id_empresa');
        $survey_id = $this->input->get('survey_id');
        $user_id = $this->input->get('user_id');
        $questionario = $service->get_all_questions_people_developement($survey_id, $user_id);
        echo json_encode($questionario);
    }

    public function getAcivityDetailProfileCareer()
    {
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');
    	$activity_id 	= 	$this->input->post('activity_id');

    	$service = new servicedao();

    	$details = $service->get_activity_detail_by_id_for_profile_career($activity_id);


    	echo json_encode($details);

    }
    /**
	 * @raptor add CycleConfiguration menu
	 */
	
	public function getCycleConfigList(){
		header('Content-type: application/json');
        $this->get_acesso_user (true);
        $commenterId = $this->session->userdata('id');

		$this->load->model('servicedao');
		$service = new servicedao();
		$response = $service->get_cycle_configuration_list();
		echo json_encode($response);
	}
	public function getRavisaoCicloById(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');

		$id 		= $this->input->get('id');
		$this->load->model('servicedao');
		$service 	= new servicedao();
		$response 	= $service->get_ravisao_ciclo_by_id($id);
		echo json_encode($response);
	}
	public function getCycleByCycleId(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
		$id 		 = $this->input->get('id');
		$service 	 = new servicedao();
		$response 	 = $service->get_cycle_by_id($id, $id_empresa,null);
		echo json_encode($response);
	}

	public function getCycleByCycleIdProfileBanner(){
		header('Content-type: application/json');
		$this->get_acesso_user ( true );
		$commenterId = $this->session->userdata('id');
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
		$id 		 = $this->input->get('id');
		$service 	 = new servicedao();
		$response 	 = $service->get_cycle_by_id($id, $id_empresa,1);
		echo json_encode($response);
	}

	public function saveCycleConfiguration(){
		header('Content-type: application/json');
		$service 		= 	new servicedao();
		
    	$result 		= 	array();
    	$request		=	$this->input->post('request');
    	$userTeams		=	$this->input->post('userTeams');
    	$disableform	=	$this->input->post('disableform');
    	$all_members	=	$this->input->post('all_members');
    	$tipo_nota_final	=	$this->input->post('tipo_nota_final');
    	$id_empressa 	= 	$this->session->userdata('id_empresa');
    	
		
		if($all_members == 1){
			$teams = $service->get_all_user_for_by_id_company_active($id_empressa);
			if(!empty($teams)){
				foreach ($teams as $key => $value) {
					$userTeams[$key]['id_usuario'] = $value['id'];
				}
			}
		}
		// echo '<pre>';
		// print_r($userTeams);die;
		$result 		= 	$service->save_new_configuration_cycle($request,$userTeams,$disableform,$tipo_nota_final);
    	echo json_encode($result);
	}
	public function getUsersByCycleConfig(){
		header('Content-type: application/json');
		$id_ravisao_ciclo	=	$this->input->post('id_ravisao_ciclo');
		$service 			= 	new servicedao();
		$result 			= 	$service->get_users_by_ravisao_ciclo_id($id_ravisao_ciclo);
    	echo json_encode($result);
	}
	public function getCycleConfigUsersByTypeValidation(){
		header('Content-type: application/json');
		$service 			= 	new servicedao();
		$cycleId			=	$this->input->post('cycleId');
		$data['type1'] 		= 	$service->get_users_by_type_validation($cycleId,1);
		$data['type2'] 		= 	$service->get_users_by_type_validation($cycleId,2);
		$data['type3'] 		= 	$service->get_users_by_type_validation($cycleId,3);
		$data['type4'] 		= 	$service->get_users_by_type_validation($cycleId,4);
		if(empty($data['type1'])&&empty($data['type2'])&&empty($data['type3'])&&empty($data['type4']))
		{
			echo 0;
		}else
    	echo json_encode($data);
	}
	
	public function getFasesByCycleId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$componentValues		=	json_decode(CICLO_VIEW_STEPS_BREADCRUMPS,true);
    	$orderRepeat			=	0;
    	$out 					= 	array();
    	$componente 			= 	array();
    	$componenteKey 			= 	array();
    	$fases_data 			= 	array();
    	$orderBy 				= 	array();
    	$service 				= 	new servicedao();
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
    	$id_usuario 			= 	$this->input->post('user_id');
    	$id_ciclo 				= 	$this->input->post('cycle_id');
		$this->session->set_userdata('userid',$id_usuario);
		$this->session->set_userdata('id_ciclo',$id_ciclo);
		$fasesData 				= 	$service->get_fases_by_ciclo_id($id_usuario,$id_ciclo);
		if(!empty($fasesData)){
			foreach($fasesData as $key=>$row){
				if($row['ordem'] == 1){
					$orderRepeat++;
				}
				if($orderRepeat>1){
					if($row['componente'] == 'P'){
						$row['ordem']	=	0;
					}else{
						$row['ordem']	=	$row['ordem'];
					}
				}else{
					$row['ordem']	=	$row['ordem'];
				}
				$orderBy[]			=	$row['ordem'];
				$fases_data[]		=	$row;
			}
			array_multisort($orderBy, SORT_ASC,$fases_data);
			foreach($fases_data as $face){
				$componenteKey[]	=	$face['componente'];
				$componente[]		=	$componentValues[$face['componente']];
			}
		}
		$data['first_step_key']		=	reset($componenteKey);
		$data['components']			=	$componente;
		$data['fasesData']			=	$fases_data;
    	echo json_encode($data);
	}
	public function getComponentType(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$componentValues		=	json_decode(CICLO_VIEW_STEPS_BREADCRUMPS,true);
    	$orderRepeat			=	0;
    	$out 					= 	array();
    	$componente 			= 	array();
    	$componenteKey 			= 	array();
    	$fases_data 			= 	array();
    	$orderBy 				= 	array();
    	$service 				= 	new servicedao();
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
    	$id_usuario 			= 	$this->input->post('user_id');
    	$id_ciclo 				= 	$this->input->post('cycle_id');
    	$click_id 				= 	$this->input->post('click_id');
		$this->session->set_userdata('userid',$id_usuario);
		$this->session->set_userdata('id_ciclo',$id_ciclo);
		$fasesData 				= 	$service->get_fases_by_ciclo_id($id_usuario,$id_ciclo);
		if(!empty($fasesData)){
			foreach($fasesData as $key=>$row){
				if($row['ordem'] == 1){
					$orderRepeat++;
				}
				if($orderRepeat>1){
					if($row['componente'] == 'P'){
						$row['ordem']	=	0;
					}else{
						$row['ordem']	=	$row['ordem'];
					}
				}else{
					$row['ordem']	=	$row['ordem'];
				}
				$orderBy[]			=	$row['ordem'];
				$fases_data[]		=	$row;
			}
			array_multisort($orderBy,SORT_ASC,$fases_data);
			foreach($fases_data as $face){
				$componenteKey[]	=	$face['componente'];
			}
		}
		echo json_encode($componenteKey[$click_id]);
	}
	public function userpotentialByCycle(){
		header('Content-type: application/json');
		$service 	= 	new servicedao();
		$id_empresa	=	$this->session->userdata('id_empresa');
		$userId		=	$this->session->userdata('id');
		$data 		= 	$service->get_questions_by_id_cycle($userId,$id_empresa);
    	echo json_encode($data);
	}
	public function getCycleConfigUsersByCycleId(){
		header('Content-type: application/json');
		$cycleId			=	$this->input->post('cycleId');
		$service 			= 	new servicedao();
		$result 			= 	$service->get_users_of_ciclo_availicao_by_cycle_id($cycleId);
    	echo json_encode($result);
	}
	
	public function getCycleReviewers(){
		header('Content-type: application/json');
		$cycleId			=	$this->input->post('cycleId');
		$search_by_name		=	$this->input->post('search_by_name');
		$search_by_status	=	$this->input->post('search_by_status');
		$select_team_filter	=	$this->input->post('select_team_filter');
		$service 			= 	new servicedao();
		$result 			= 	$service->get_cycle_reviewers_by_cycle_id($cycleId, $search_by_name, $search_by_status, $select_team_filter);
    	echo json_encode($result);
	}

	public function sendNotaEmail(){
		
		header('Content-type: application/json');
		//$cycleId			=	$this->input->post('cycleId');
		$userId				=	$this->input->post('userId');
		$service 			= 	new servicedao();
		$this->load->model('servicedao');
    	$service = new servicedao();

    	$result 	= 	$service->get_activities_added_alert();
		$response 	= 	$service->get_ravisao_ciclo_by_id($cycleId);
		
		if (!is_array($userId)) $userId = [$userId];
		$errors = [];
		foreach ($userId as $key => $value) {
			$user 		= 	$service->get_user_by_id_usuario($value);
    	//if(!empty($response)){
			$replace_array 			= 	array(
											$user['nome_usuario'],
											base_url('perfil'),
											$response['ravisao_ciclo']['revisao'],
											$response['ravisao_ciclo']['nome_ciclo'],
											base_url('carreira'),

												$response['ravisao_ciclo']['data_fim']

										);
										
			$status = $this->sendMail('grant_evaluation_access_mail',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
			
    	//}else{
	    		$errors[$user['email_usuario']];
    	//}
	}
		if (count($errors)==0)	echo 1;
		else echo 0;

		
	}

	
	public function sendCycleReviewEmail(){
		
		header('Content-type: application/json');
		$cycleId			=	$this->input->post('cycleId');
		$userId				=	$this->input->post('userId');
		$service 			= 	new servicedao();
		$this->load->model('servicedao');
    	$service = new servicedao();

    	$result 	= 	$service->get_activities_added_alert();
		$response 	= 	$service->get_ravisao_ciclo_by_id($cycleId);
		
		if (!is_array($userId)) $userId = [$userId];
		$errors = [];
		foreach ($userId as $key => $value) {
			$user 		= 	$service->get_user_by_id_usuario($value);
    	if(!empty($response)){
			$replace_array 			= 	array(
											$user['nome_usuario'],
											base_url('perfil'),
											$response['ravisao_ciclo']['revisao'],
											$response['ravisao_ciclo']['nome_ciclo'],
											base_url('cycleconfiguration')."#!/".$response['ravisao_ciclo']['id_revisao']."/CycleReview",
												$response['ravisao_ciclo']['data_fim']

										);
										
			$status = $this->sendMail('appraisal_review_request',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
			
    	}else{
	    		$errors[$user['email_usuario']];
    	}
	}
		if (count($errors)==0)	echo 1;
		else echo 0;

		
	}

	public function sendCycleEmailToUsers(){
		header('Content-type: application/json');
		$users				=	$this->input->post('users');
		$email_content		=	$this->input->post('email_content');
		$cycleId			=	$this->input->post('cycleId');
		$service 			= 	new servicedao();
		$cycleLink			=	base_url('cycleconfiguration')."#!/".$cycleId."/CycleReview";
		$constants			=	array('{USER_NAME}','{REVIEW_LINK}');
		$cycleLinkButton	=	'<div style="margin-left:33%"><a href="'.$cycleLink.'" title="Responder Review" style="text-align:center;font-family:Arial;font-size:16px;padding:15px;font-weight:bold;letter-spacing:normal;text-align:center;text-decoration:none;background-color:#d132a8;width:180px;display:block">Responder Review</a></div>';
    	if(!empty($users)){
			foreach($users as $user){
				$replace_array			=	array($user['nome_usuario'],$cycleLink);
				$Message				=  	str_replace($constants,$replace_array,$email_content);
				$replace_array 			= 	array(
												$user['nome_usuario'],
												$Message,
											);								
				$status = $this->sendMail('send_cycle_review_link',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
			}
    		echo 1;
    	}else{
    		echo 0;
    	}
	}
	public function updateRevisaoUsersAutorizado(){
		header('Content-type: application/json');
		$ravisaoAvalicaoIds	=	$this->input->post('ravisaoAvalicaoIds');
		$cycleId			=	$this->input->post('cycleId');
		$service 			= 	new servicedao();
		$result 			= 	$service->update_ravisao_usres_autorizado($ravisaoAvalicaoIds,$cycleId);
    	echo 1;
	}
	public function getCycleConfigUsersByFilter(){
		header('Content-type: application/json');
		$cycleId		=	$this->input->post('cycleId');
		$nomeUsuario	=	$this->input->post('name');
		$autorizado		=	$this->input->post('type');
		$teamId			=	$this->input->post('teamId');
		$service 		= 	new servicedao();
		$result 		= 	$service->get_users_of_ciclo_availicao_by_filter($cycleId,$nomeUsuario,$autorizado,$teamId);
		echo json_encode($result);
	}
	public function getCycles(){
		header('Content-type: application/json');
		$result			=	array();
		$service 		= 	new servicedao();
		$id_usuario		=	$this->session->userdata('id');
		$id_empresa		=	$this->session->userdata('id_empresa');
		if($this->session->userdata('admin') == 1 || $this->session->userdata('gestor') == 1){
			$result 	= 	$service->get_cycles($id_usuario,$id_empresa);
		}
		echo json_encode($result);
	}
	public function getCycleUsersByType(){
		header('Content-type: application/json');
		$result			=	array();
		$service 		= 	new servicedao();
		$id_usuario		=	$this->session->userdata('id');
		$id_empresa		=	$this->session->userdata('id_empresa');
		$userId			=	$this->input->post('userId');
		$cycle_id		=	$this->input->post('cycle_id');
		$typeCycleUser	=	$this->input->post('type');
		$result 		= 	$service->get_users_by_type_validation_and_cycle_id($cycle_id,$userId,$typeCycleUser);
		echo json_encode($result);
	}
	public function getUserIAmGestorOrPeer(){
		header('Content-type: application/json');
		$result			=	array();
		$service 		= 	new servicedao();
		$id_usuario		=	$this->session->userdata('id');
		$id_empresa		=	$this->session->userdata('id_empresa');
		$userId			=	$this->input->post('userId');
		$cycle_id		=	$this->input->post('cycle_id');
		$typeCycleUser	=	$this->input->post('type');
		$result 		= 	$service->get_user_i_am_gestor_or_peer($cycle_id,$userId,$typeCycleUser);
		echo json_encode($result);
	}
	public function addUpdateCycleUsers(){
		header('Content-type: application/json');
		$result			=	array();
		$service 		= 	new servicedao();
		$id_usuario		=	$this->session->userdata('id');
		$id_empresa		=	$this->session->userdata('id_empresa');
		$cycle_id		=	$this->input->post('cycle_id');
		$userId			=	$this->input->post('userId');
		$gestors		=	$this->input->post('gestors');
		$pares			=	$this->input->post('pares');
		$equipes		=	$this->input->post('equipes');
		$service->add_update_cycle_users($cycle_id,$userId,$gestors,$pares, $equipes);
		echo json_encode(1);
	}
	public function getAllUserForCompanyNotGivenId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$userId 		= 	$this->input->post('userId');
    	$userForCompany = 	$service->get_all_user_for_by_id_company($id_empresa);
    	$user_data		=	array();
    	if($userForCompany){
			foreach($userForCompany as $index=>$user){
				if($user['id'] != $userId){
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
		}
    	echo json_encode($user_data);	
	}
	public function getGestorsExceptGivenId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData	=	array();
    	$service 	= 	new servicedao();
    	$id_empresa = 	$this->session->userdata('id_empresa');
		$userId 	= 	$this->input->post('userId');
    	$gestorForCompany = $service->get_all_gestor_for_by_id_company_active($id_empresa);
    	if(!empty($gestorForCompany)){
				foreach($gestorForCompany as $index=>$usercompany){
					if($usercompany['id'] !== $userId){
						$gestorData[$index] = $usercompany;
						if(!empty($usercompany['image'])){
							$img_url = $usercompany['image'];
							$gestorData[$index]['image'] 	= 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/'.$img_url;
							$gestorData[$index]['xs_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/50/'.$img_url;
							$gestorData[$index]['md_image'] = 	base_url('assets/img') . '/'. $usercompany['id_empresa'] .'/150/'.$img_url;
						}else{
							$gestorData[$index]['image'] 	= 	null;
							$gestorData[$index]['xs_image'] = 	null;
							$gestorData[$index]['md_image'] = 	null;
						}
					}
				}
			}
    	echo json_encode($gestorData);
	}
	public function getFasesDetailsForUser(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData		=	array();
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
		$userId 		= 	$this->input->post('user_id');
		$avaliacoa_id 	= 	$this->input->post('avaliacoa_id');
		$this->session->set_userdata('id_revisao_ciclo_avaliacoes',$avaliacoa_id);
    	$fasesdetaislforuser 	= 	$service->get_fases_details_for_user($userId, $avaliacoa_id, $id_empresa);
		
    	echo json_encode($fasesdetaislforuser);
	}
	
	
	public function getQuestionDataProfile(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id_usuario 					= 	$this->session->userdata('id');
		$id_questionario 				= 	$this->input->post('id_questionario');
		$user_id 						= 	$this->input->post('user_id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_revisao_ciclo_avaliacoes 	= 	$this->session->userdata('id_revisao_ciclo_avaliacoes');

		$self_result = $service->get_self_appraisal($id_revisao_ciclo_avaliacoes);
		$selfappraisalforuser = [];
		if (count($self_result) > 0) {
			$id_self_appraisal = $self_result[0]['id_revisao_ciclos_avaliacoes'];
			$selfappraisalforuser 			= 	$service->get_question_data_profile($id_questionario, $user_id, $id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_self_appraisal, true);
		}
		
    	$fasesdetaislforuser 			= 	$service->get_question_data_profile($id_questionario, $user_id, $id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, false);
    	
		
    	echo json_encode(array($fasesdetaislforuser, $selfappraisalforuser, $self_result));
	}
	
	
	public function getCompetenciasDataProfile(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
		$id_usuario 					= 	$this->input->post('user_id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_time 						= 	$this->input->post('id_time');
		$id_revisao_ciclo_avaliacoes 	= 	$this->session->userdata('id_revisao_ciclo_avaliacoes');

		$self_result = $service->get_self_appraisal($id_revisao_ciclo_avaliacoes);
		$selfappraisalforuser = [];
		if (count($self_result) > 0) {
			$id_self_appraisal = $self_result[0]['id_revisao_ciclos_avaliacoes'];
			$selfappraisalforuser 			= 	$service->get_competencias_data_profile($id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_self_appraisal,$id_time);
		}

    	$fasesdetaislforuser 			= 	$service->get_competencias_data_profile($id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes,$id_time);
		
    	echo json_encode(array($fasesdetaislforuser, $selfappraisalforuser, $self_result));
	}
	
	public function getAllApprisialValores(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
		$id_usuario 					= 	$this->session->userdata('id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_revisao_ciclo_avaliacoes 	= 	$this->session->userdata('id_revisao_ciclo_avaliacoes');

		$self_result = $service->get_self_appraisal($id_revisao_ciclo_avaliacoes);
		$selfappraisalforuser = [];
		if (count($self_result) > 0) {
			$id_self_appraisal = $self_result[0]['id_revisao_ciclos_avaliacoes'];
			$selfappraisalforuser 			= 	$service->get_valerea_by_empressa_apprisial($id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_self_appraisal);
		}

    	$fasesdetaislforuser 			= 	$service->get_valerea_by_empressa_apprisial($id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes);
		
    	echo json_encode(array($fasesdetaislforuser, $selfappraisalforuser));
	}
	
	public function saveApprisialFaseData(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id_usuario 					= 	$this->session->userdata('id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_revisao_ciclo_avaliacoes 	= 	$this->input->post('id_revisao_ciclo_avaliacoes');
		$form_data 						= 	$this->input->post('form_data');
		$field_type 					= 	$this->input->post('field_type');
		
    	$fasesdetaislforuser 			= 	$service->save_apprisial_fase_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $form_data,$field_type, $id_usuario);
		
    	echo json_encode($fasesdetaislforuser);
	}
	
	public function saveApprisialFinish(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id_usuario 					= 	$this->session->userdata('id');
		$id_revisao_ciclo_avaliacoes 	= 	$this->input->post('id_revisao_ciclo_avaliacoes');
		
    	$fasesdetaislforuser 			= 	$service->save_apprisial_finish( $id_revisao_ciclo_avaliacoes, $id_usuario);
		
    	echo json_encode($fasesdetaislforuser);
	}
	
	public function saveApprisialFaseParesData(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id_usuario 					= 	$this->session->userdata('id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_revisao_ciclo_avaliacoes 	= 	$this->input->post('id_revisao_ciclo_avaliacoes');
		$paresAdded 					= 	$this->input->post('paresAdded');
		$field_type						=	$this->input->post('field_type');
    	$fasesdetaislforuser 			= 	$service->save_apprisial_fase_pares_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $paresAdded, $field_type,$id_usuario);
		
    	echo json_encode($fasesdetaislforuser);
	}
	
	public function saveApprisialFaseCompetenciasData(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id_usuario 					= 	$this->session->userdata('id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_revisao_ciclo_avaliacoes 	= 	$this->input->post('id_revisao_ciclo_avaliacoes');
		$form_data 						= 	$this->input->post('form_data');
		$field_type						=	$this->input->post('field_type');
    	$fasesdetaislforuser 			= 	$service->save_apprisial_fase_competencias_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $form_data,$field_type, $id_usuario);
		
    	echo json_encode($fasesdetaislforuser);
	}
	
	public function saveApprisialFaseValoresData(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id_usuario 					= 	$this->session->userdata('id');
		$id_revisao_ciclo_fases 		= 	$this->input->post('id_revisao_ciclo_fases');
		$id_revisao_ciclo_avaliacoes 	= 	$this->input->post('id_revisao_ciclo_avaliacoes');
		$form_data 						= 	$this->input->post('form_data');
		$field_type						=	$this->input->post('field_type');
    	$fasesdetaislforuser 			= 	$service->save_apprisial_fase_valores_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $form_data, $field_type,$id_usuario);
		
    	echo json_encode($fasesdetaislforuser);
	}
	public function getUserFeedbacksByCycleId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->session->userdata('id');
		$user_id 		= 	$this->input->post('user_id');
		$cycle_id 		= 	$this->input->post('cycle_id');
		$feedbackData 	= 	$service->get_user_feedback_on_review_steps($cycle_id,$user_id);
    	echo json_encode($feedbackData);
	}
	public function getUserGoalsByCycleId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->session->userdata('id');
		$user_id 		= 	$this->input->post('user_id');
		$cycle_id 		= 	$this->input->post('cycle_id');
		$goalsData 		= 	$service->get_user_goals_on_review_steps($cycle_id,$user_id,$id_empresa);
    	echo json_encode($goalsData);
	}
	public function updateSituacao(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->session->userdata('id');
		$id_revisao_ciclo 		= 	$this->input->post('id_revisao_ciclo');
		$updateValue 			= 	$this->input->post('value');
		echo $service->update_revisao_ciclo_situacao($id_revisao_ciclo, $updateValue);
	}

	public function getUserGoalsKeyresultsByCycleId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->session->userdata('id');
		$user_id 		= 	$this->input->post('user_id');
		$cycle_id 		= 	$this->input->post('cycle_id');
		$goalsData 		= 	$service->get_user_goals_keyresults_on_review_steps($cycle_id,$user_id,$id_empresa);
    	echo json_encode($goalsData);
	}
	
	public function saveAutorizar(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->session->userdata('id');
		$id_revisao_ciclo 		= 	$this->input->post('id_revisao_ciclo');
		echo $service->save_autorizar($id_revisao_ciclo);
	}
	public function saveDeautorizar(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= 	new servicedao();
    	$id_empresa 	= 	$this->session->userdata('id_empresa');
    	$id_usuario 	= 	$this->session->userdata('id');
		$id_revisao_ciclo 		= 	$this->input->post('id_revisao_ciclo');
		echo $service->save_deautorizar($id_revisao_ciclo);
	}
	public function getCategories(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$service 		= 	new servicedao();
		$categories 	= 	$service->get_categories();
    	echo json_encode($categories);
	}
	public function saveCategory(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 			= 	new servicedao();
		$data				=	$this->input->post('data');
		$category_id		=	$service->save_category($data);
		echo $category_id;
	}
	public function getCategory(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 			= 	new servicedao();
		$category_id		=	$this->input->post('category_id');
		$categoryData		=	$service->get_category_by_id($category_id);
		echo json_encode($categoryData);
	}
	public function getCompetencias(){
		header('Content-type: application/json');
    	//$this->get_acesso_user (true);
    	$service 		= 	new servicedao();
		$categories 	= 	$service->get_competencias();
    	echo json_encode($categories);
	}
	public function saveCompetencia(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 			= 	new servicedao();
		$formdata			=	$this->input->post('formdata');
		$id					=	$service->save_competencia($formdata);
		echo 1;
	}
	public function getCompetencia(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 	= 	new servicedao();
		$id			=	$this->input->post('id');
		$data		=	$service->get_competencia_by_id($id);
		echo json_encode($data);
	}
	public function searchCompetencia(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$service 	= 	new servicedao();
		$data		=	$this->input->post('data');
		$category			=	$this->input->post('category');
		$tipo				=	$this->input->post('tipo');
		$ativo				=	$this->input->post('ativo');
		$reviewed			=	$this->input->post('reviewed');
		$groupBy			=	$this->input->post('groupBy');
		$search_team		=	$this->input->post('search_team');
		$search_cargo		=	$this->input->post('search_cargo');
		$search_nome		=	$this->input->post('search_nome');
		$response			=	$service->search_competencias($category,$tipo,$ativo,$reviewed,$groupBy, $search_team, $search_cargo, $search_nome);
		echo json_encode($response);
	}
	public function getTeams(){
		header('Content-type: application/json');
    	//$this->get_acesso_user (true);
    	$service 	= 	new servicedao();
		$teams 		= 	$service->get_teams();
    	echo json_encode($teams);
	}
	public function getUsersNotInGivenCycle(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$type			=	$this->input->post('type');
    	$user_data		=	array();
    	$service 		= 	new servicedao();
		$cycleId		=	$this->input->post('cycleId');
		$id_empresa     = 	$this->session->userdata('id_empresa');
		$userForCompany	=	$service->get_users_except_given_cycle_users($id_empresa,$cycleId,$type);
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
    	echo json_encode($user_data);
	}
	public function getUsersForPeerSelection(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$user_data		=	array();
    	$service 		= 	new servicedao();
		$cycleId		=	$this->input->post('cycleId');
		$id_usuario 	= 	$this->session->userdata('id');
		$id_empresa     = 	$this->session->userdata('id_empresa');
		$userForCompany	=	$service->get_users_for_peer_selection($cycleId, $id_usuario, $id_empresa);
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
    	echo json_encode($user_data);
	}
	public function getIdRevisaoCycleById(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$service 		= 	new servicedao();
    	$id_usuario = 	$this->session->userdata('id');
		$cycleId		=	$this->input->post('cycleId');
		$revisaos	=	$service->get_id_revisao_ciclo_by_id($cycleId, $id_usuario);
    	echo json_encode($revisaos);
	}
	public function addCycleParesUsers(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$service 	= 	new servicedao();
		$cycle_id	=	$this->input->post('cycle_id');
		$id_usuario_avaliado	=	$this->input->post('id_usuario_avaliado');
		$users		=	$this->input->post('users');
		$auto		=	1;
		$response	=	$service->save_cycle_pares_users($cycle_id,$users,$id_usuario_avaliado,$auto);
		echo json_encode($response);
	}
	public function addUsersForCycle(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$service 	= 	new servicedao();
    	$id_usuario = 	$this->session->userdata('id');
		$cycles	=	$this->input->post('cycles');
		$users		=	$this->input->post('users');
		$response	=	$service->save_users_for_cycle($id_usuario, $cycles,$users);

		// $result = 0;
		// if(!empty($users)){
  //   		foreach ($users as $userId) {
  //   			$user = $service->get_user_by_id_usuario($userId);
		// 		$replace_array 	= 	array(
		// 									$user['nome_usuario'],
		// 									base_url('perfil'),
		// 									'peers'
		// 								);
		// 		$status = $this->sendMail('activity_added',$user['email_usuario'],$user['nome_usuario'],$replace_array, null, $user['id_empresa']);
		// 		if($status == 'Sucesso'){
		// 			$result = 1;
		// 		}
  //   		}
  //   	}
    	echo json_encode($response);
	}
	public function saveEmpressaImage(){
		$this->get_acesso_user(true);
		$id_empresa			=	$this->session->userdata('id_empresa');
		$fileToSave 		= 	UPLOAD .'/'.$id_empresa;
		if( !file_exists( UPLOAD . '/' .  $id_empresa )){
			mkdir( $fileToSave , 0777, true);
			chmod( $fileToSave , 0777);
		}
		$fileNameDoc 		=	$_FILES["image"]["name"];
		if(!empty($fileNameDoc)){
			$fileTypeDoc 		= 	pathinfo($fileNameDoc,PATHINFO_EXTENSION);
	    	$filename			=	$this->createRandWord(40).'.'.$fileTypeDoc;
	    	$destinationPath 	= 	UPLOAD.$id_empresa.'/'.$filename;
			move_uploaded_file($_FILES["image"]["tmp_name"],$destinationPath);
			header('Content-type: application/json');
	    	$service 	= 	new servicedao();
			$response	=	$service->save_the_empressa_image($id_empresa,$filename);
			$this->session->set_userdata('profile_logo',$filename);
			$imageUrl	=	base_url('assets/upload/'.$id_empresa.'/'.$filename);
			echo $imageUrl;
		}
    	
	}
	public function getCycleUsersByTypeId(){
		header('Content-type: application/json');
		$service 	= 	new servicedao();
		$cycleId	=	$this->input->post('cycle_id');
		$id_empresa	=	$this->session->userdata('id_empresa');
		$users 		= 	$service->get_users_by_cycle_and_type($cycleId,3);
    	echo json_encode($users);
	}
	public function getSelfAddedCycleUsersByTypeId(){
		header('Content-type: application/json');
		$service 	= 	new servicedao();
		$cycleId	=	$this->input->post('cycle_id');
		$id_empresa	=	$this->session->userdata('id_empresa');
		$auto		=	1;
		$users 		= 	$service->get_users_by_cycle_and_type($cycleId,3,$auto);
    	echo json_encode($users);
	}
	public function getAlreadyAddedUsersByCycleId(){
		header('Content-type: application/json');
		$service 	= 	new servicedao();
		$cycles	=	$this->input->post('cycles');
		$id_empresa	=	$this->session->userdata('id_empresa');
		$auto		=	1;
		$users 		= 	$service->get_added_users_by_cycle($cycles);
    	echo json_encode($users);
	}
	public function getAllUserForCompanyId(){
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= new servicedao();
    	$id_empresa 	= $this->session->userdata('id_empresa');
    	$userForCompany = $service->get_all_users_by_company_id($id_empresa);
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
    	echo json_encode($user_data);
    }
    public function getMatrizProjects(){
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= new servicedao();
    	$id_empresa 	= $this->session->userdata('id_empresa');
    	$nome	=	$this->input->post('nome');
    	$responsavel	=	$this->input->post('responsavel');
    	$corresponsavel	=	$this->input->post('corresponsavel');
    	$ativo	=	$this->input->post('ativo');
    	$projects = $service->get_matriz_projects_company_id($id_empresa, $nome, $responsavel, $corresponsavel, $ativo);
    	echo json_encode($projects);
    }
    public function getMatrizProjectsForCompany(){
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= new servicedao();
    	$id_empresa 	= $this->session->userdata('id_empresa');
    	$projects = $service->get_matriz_projects_for_company_id($id_empresa);
    	echo json_encode($projects);
    }
    public function getMatrizProjectsForUser(){
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 		= new servicedao();
    	$userId	=	$this->input->post('userid');
    	$projects = $service->get_matriz_projects_for_user_id($userId);
    	echo json_encode($projects);
    }
    public function insertMatrizProjects()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
		
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		$nome = $this->input->post('nome');
		$responsavel = $this->input->post('responsavel');
		$corresponsavel = $this->input->post('corresponsavel') != '' ?$this->input->post('corresponsavel'):NULL;

		$this->load->model('servicedao');
		$service = new servicedao();
		$id_ciclo = $service->insert_matriz_project($id_usuario, $id_empresa, $nome, $responsavel, $corresponsavel);
		echo $id_ciclo;
    }
    public function editMatrizProjects()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
		
		$id = $this->input->post('id');
		$nome = $this->input->post('nome');
		$responsavel = $this->input->post('responsavel');
		$corresponsavel = $this->input->post('corresponsavel') != '' ?$this->input->post('corresponsavel'):NULL;

		$this->load->model('servicedao');
		$service = new servicedao();
		$result = $service->edit_matriz_project($nome, $responsavel, $corresponsavel, $id);
		echo $result;
    }
    public function saveCycleUsers(){
		header('Content-type: application/json');
    	$this->get_acesso_user(true);
    	$service 	= 	new servicedao();
		$cycle_id	=	$this->input->post('cycle_id');
		$users		=	$this->input->post('users');
		$type		=	$this->input->post('type');
		$response	=	$service->save_cycle_users($cycle_id,$users,$type);
		echo json_encode($response);
	}
	public function declineFeedbackbyId(){
		
    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');
		$service = new servicedao();
		
		$id_feedback 			= $this->input->post('id_feedback');
		$feedback_justificativa = $this->input->post('feedback_justificativa');
		$id_usuario 			= $this->session->userdata('id');
		$id_empresa 			= $this->session->userdata('id_empresa');

		$result = $service->decline_feedback_by_id_feedback($id_feedback, $feedback_justificativa);

		/* NOTIFICAÇÃO PARA REJEIÇÃO */
		if($result == true){
			$userId	 = $id_usuario;
			//$service = new servicedao();
			//$this->load->model('servicedao');
			$dados = $service->get_user_asker_by_feedback($id_feedback);

			$nomeUsuarioSolicitador = $dados['nome_usuario'];
			$emailUsuarioSolicitador = $dados['email_usuario'];
			
			$user 		= 	$service->get_user_by_id_usuario($id_usuario);
			$replace_array = array(
									$user['nome_usuario'],
									$feedback_justificativa,
									$nomeUsuarioSolicitador,
									base_url('carreira')
								);
			$status = $this->sendMail('crossfeed_rejeitado',$emailUsuarioSolicitador,$nomeUsuarioSolicitador,$replace_array, null, $user['id_empresa']);
		}
		
    	echo json_encode($result);
	}

	public function archiveFeedbackbyId(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');

    	$service = new servicedao();
		$id_feedback = $this->input->post('id_feedback');
    	$result = $service->archive_feedback_by_id_feedback($id_feedback);

    	echo json_encode($result);
	}
	public function unarchiveFeedbackbyId(){

    	header('Content-type: application/json');

    	$this->get_acesso_user ( true );
    	$this->load->model('servicedao');

    	$service = new servicedao();
		$id_feedback = $this->input->post('id_feedback');
    	$result = $service->unarchive_feedback_by_id_feedback($id_feedback);

    	echo json_encode($result);
	}
	
	public function approveObjective(){

    	header('Content-type: application/json');
    	$this->load->model('servicedao');
    	$service = new servicedao();
		$id_objetivo = $this->input->post('id_objetivo');

		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$id_empresa = $this->session->userdata('id_empresa');

		$result = $service->approve_objective($id_objetivo);
		
		if($result){
			//{USER_NAME},{LINK}
			$replace_array 	= array(
				$nome,
				base_url('planejamento#!/tatic/'.$id_objetivo)
			);
			
			$status = $this->sendMail('objetivos_aprovados',$email,$nome,$replace_array, null, $id_empresa);
		}

    	echo json_encode($result);
	}

	public function disapproveObjective(){

    	header('Content-type: application/json');
    	$this->load->model('servicedao');
    	$service = new servicedao();
		$id_objetivo = $this->input->post('id_objetivo');

		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$id_empresa = $this->session->userdata('id_empresa');

    	$result = $service->disapprove_objective($id_objetivo);

		if($result){
			//{USER_NAME},{LINK}
			$replace_array 	= array(
				$nome,
				base_url('planejamento#!/tatic/'.$id_objetivo)
			);
			$status = $this->sendMail('objetivos_reprovados',$email,$nome,$replace_array, null, $id_empresa);
		}

		
    	echo json_encode($result);
	}

	public function resendObjective(){

    	header('Content-type: application/json');
    	$this->load->model('servicedao');
    	$service = new servicedao();
		$id_objetivo = $this->input->post('id_objetivo');
    	$result = $service->resend_objective($id_objetivo);

    	echo json_encode($result);
	}

    public function GetAllCompetenciasTipos(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$tipos 			= 	$service->get_competencias_tipos($id_empresa);
		
    	echo json_encode($tipos);
	}
    public function update_tipo(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$id								=	$this->input->post('id');
    	$new_tipo						=	$this->input->post('new_tipo');
    	$tipos 							= 	$service->update_tipo_compentencia($id,$new_tipo);
    	echo json_encode($tipos);
	}
    public function add_tipo(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$new_tipo						=	$this->input->post('new_tipo');
    	$tipos 							= 	$service->add_tipo_compentencia($new_tipo);
    	echo json_encode($tipos);
	}
    public function getTipoFaseById(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$cycle_id						=	$this->input->post('cycle_id');
    	$tipos 							= 	$service->get_tipo_fase_by_id($cycle_id);
    	echo json_encode($tipos);
	}

    public function getEscalaByEmpresaId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$escalas 							= 	$service->get_escala_by_empresa_id($id_empresa);
    	echo json_encode($escalas);
	}
    public function getNineBoxes(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$nboxes 						= 	$service->get_nine_boxes_by_id_empresa($id_empresa);
    	echo json_encode($nboxes);
	}
    public function getRevisoesByEmpresaId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$escalas 							= 	$service->get_revisao_by_empresa_id($id_empresa);
    	echo json_encode($escalas);
	}
    public function getNiveisByEmpresaId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$escalas 							= 	$service->get_niveis_by_empresa_id($id_empresa);
    	echo json_encode($escalas);
	}

    public function getReguaByCycleId(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$cycle_id						=	$this->input->post('cycle_id');
    	$escalas 						= 	$service->get_regua_by_cycle_id($cycle_id);
    	echo json_encode($escalas);
	}


    public function getTipoFaseScoreById(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$gestorData						=	array();
    	$service 						= 	new servicedao();
    	$id_empresa 					= 	$this->session->userdata('id_empresa');
    	$fase_id						=	$this->input->post('fase_id');
    	$tipos 							= 	$service->get_tipo_fase_score_by_id($fase_id);
    	echo json_encode($tipos);
	}

	public function removeSocialAccount(){
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$id_usuario						=	$this->input->post('id_usuario');
    	$type							=	$this->input->post('type');

    	if($id_usuario && $type){
    		$this->db->where('id_usuario',$id_usuario);
    		$data = $this->db->update('ttl_usuario',[$type =>null]);
    		if($data){
    			$this->session->unset_userdata($type);
    			$out ['error'] = false;
    			$out ['error_message'] = '';
    		}

    	}else{
    		$out ['error'] = true;
    		$out ['error_message'] = '';
    	}						
    	echo json_encode($out);
	}
	public function setUserProfilePicture(){
		
		header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$service 						= 	new servicedao();
    	$user_data 						= 	$this->session->userdata('social_logins');
    	
    	if(!empty($user_data)){
			
			$file = $user_data['image'];
			$user_loggedin_type =  $user_data['updated_type'];
			if(!empty($file)){
				/* getting useradata */
				
				$this->db->where($user_loggedin_type,$user_data['email']);
				$this->db->from('ttl_usuario');
				$record = $this->db->get()->row();
				if(!empty($record)){
					$id_empresa = $record->id_empresa;
					$id_usuario = $record->id_usuario;
					$fileTypeDoc 	= 	'jpg';
					$url_image 		= 	'';
					$userImage 		= 	file_get_contents($file);
					$nome 			= 	$this->createRandWord(40).'.'.$fileTypeDoc;
					$fileToSave 	= 	IMG . $id_empresa ;
					$md_imageSave 	= 	IMG . $id_empresa.'/150/';
					$xs_imageSave 	= 	IMG . $id_empresa.'/50/';
					if( !file_exists($xs_imageSave)){
						mkdir( $xs_imageSave , 0777, true);
						chmod( $xs_imageSave , 0777);
					}
					if( !file_exists($md_imageSave)){
						mkdir( $md_imageSave , 0777, true);
						chmod( $md_imageSave , 0777);
					}
					if( !file_exists( IMG . $id_empresa )){
						mkdir( $fileToSave , 0777, true);
						chmod( $fileToSave , 0777);
					}
					$file_path		=	$fileToSave.'/'.$nome;
					$file_path_md	=	$md_imageSave.'/'.$nome;
					$file_path_xs	=	$xs_imageSave.'/'.$nome;
					$url_image 		= 	base_url('assets/img') . '/'. $id_empresa .'/'.$nome;
					file_put_contents($file_path,$userImage);
					file_put_contents($file_path_md,$userImage);
					file_put_contents($file_path_xs,$userImage);
					/* update user profile pic*/
					$this->db->where('id_usuario',$id_usuario);
					$data = $this->db->update('ttl_usuario',['url_image' =>$nome]);
					$this->session->set_userdata('image',$nome);
					$this->session->set_userdata('url_image',$nome);
					if($data){
						$this->session->unset_userdata('social_logins');
						$out ['error'] = false;
						$out ['error_message'] = '';
					}
				}else{
					$out ['error'] = false;
					$out ['error_message'] = 'Social media picture not found.';
				}
			}else{
				$out ['error'] = true;
				$out ['error_message'] = 'Social media picture not found.';
			}
		}else{
			$out ['error'] = true;
			$out ['error_message'] = 'Somthing went wrong.';
		}
		echo json_encode($out);
	}
	
	public function cancelToSaveImage(){
		header('Content-type: application/json');
		$user_data = $this->session->unset_userdata('social_logins');
		$out ['error'] = false;
		$out ['error_message'] = '';
		echo json_encode($out);
		
	}
	public function getObjectivoComments(){
		header('Content-type: application/json');
    	$service 				= 	new servicedao();
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
    	$id_objectivo			=	$this->input->post('id_objectivo');
    	$comments 				= 	$service->get_all_comments_by_objectivo($id_objectivo);
		
		echo json_encode($comments);
		
	}
	public function saveObjectivoComments(){
		header('Content-type: application/json');
    	$service 				= 	new servicedao();
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
    	$id_objectivo			=	$this->input->post('id_objectivo');
    	$parent_id				=	$this->input->post('parent_id');
    	$comment				=	$this->input->post('comment');
    	$comments 				= 	$service->save_comments_by_objectivo($id_objectivo,$parent_id,$comment);
    	if($comments){
    		$goal = $service->get_goal_details_with_user_by_id($id_objectivo);
    		if(!empty($goal)){
    			
    			$alerta_data = array (
    					'id_usuario' 	=> $goal['user_id'],
    					'id_empresa' 	=> $this->session->userdata('id_empresa'),
    					'tipo_entidade' => 2,
    					'id_entidade' 	=> $goal['id'],
    					'nome_entidade' => $goal['title'],
    					'descricao' 	=> $comment,
    					'progresso' 	=> 0,
    				);

    			$alert_save_data = $service->add_atividade_alert($alerta_data);
    			$out ['error'] = false;
				$out ['error_message'] = '';
    		}
    	}else{
    		$out ['error'] = false;
			$out ['error_message'] = '';
    	}
		echo json_encode($out);
		
	}
	public function saveObjectivoEmojiFaces(){
		header('Content-type: application/json');
    	$service 				= 	new servicedao();
    	$id_objectivo			=	$this->input->post('id_objectivo');
    	$id_objetivo_comentario	=	$this->input->post('id_objetivo_comentario');
    	$tipo					=	$this->input->post('tipo');
    	$tiposave 				= 	$service->save_tipo_face_by_objectivo($id_objectivo,$id_objetivo_comentario,$tipo);
    	if($tiposave){
		echo 1;
		}
	}
	public function likeobjetivo(){
        header('Content-type: application/json');

        $this->get_acesso_user ( true );
        $viewerId = $this->session->userdata('id');

        $this->load->model('servicedao');
        $id_objetivo_comentario = $this->input->post('id_objetivo_comentario');

        $service = new servicedao();

        $liked = $service->like_objetivo($id_objetivo_comentario, $viewerId);
		if($liked){
			echo 1;
		}
        
	}
	public function downloadAllCompetencia()
    {

				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Type: application/vnd.ms-excel');
				header("Content-Disposition: attachment; filename=filename.csv");
    	
		$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Competencias-".date('d-m-Y').".csv";
        $this->db->select("ttl_competencias.*,ttl_categoria_competencias.nome_categoria");
		$this->db->join('ttl_categoria_competencias',"ttl_categoria_competencias.id_categoria_competencias = ttl_competencias.id_categoria_competencia",'LEFT');
		$this->db->where("ttl_competencias.id_empresa",$this->session->userdata('id_empresa'));
		$this->db->order_by("ttl_competencias.id_competencia desc");
		$query	=	$this->db->get('ttl_competencias');
		//$result	=	$query->result_array();
        // $data 	= 	utf8_decode($this->dbutil->csv_from_result($query, $delimiter, $newline));
        $data 	= 	$this->dbutil->csv_from_result($query, $delimiter, $newline);
		$data = chr(239) . chr(187) . chr(191) .$data;
		force_download($filename, $data);
    }
    public function getGraphData(){
		header('Content-type: application/json');
    	$service 				= 	new servicedao();
    	$id_empresa 			= 	$this->session->userdata('id_empresa');
    	$id_ciclo			=	$this->input->post('id_ciclo');
    	$id_time			=	$this->input->post('id_time');
    	$parent_id			=	$this->input->post('parent_id');
    	$data 				= 	$service->get_graph_data_my_dashboard($id_ciclo,$id_time,$id_empresa,$parent_id);
		
		echo json_encode($data);
		
	}
}
