<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class servicedao extends App_DAO {

		// tabelas que tu vai manipular
		var $tableip = null;
		var $tableUser = null;
		var $tableEmailTemplate = null;
		var $tableEmailLogs = null;
		var $tableCycle = null;
		var $tableGoals = null;
		var $viewGoals = null;
		var $viewGoalsProfile = null;
		var $tableTeams = null;
		var $tableCompany = null;
		var $tableWindow = null;
		var $tableTags = null;
		var $tableActivities = null;
		var $tableAlertaUsuario = null;
		var $tablefeedbackAlert = null;
		var $tableSurveyAlert = null;
		var $tableAtvResponsive = null;
		var $tableAtvTag = null;
		var $tableTagObj = null;
		var $tableUserTeam = null;
		var $tableFavoritos = null;
		var $tableEtiquetas = null;

		var $tableEtiquetaObj = null;
		var $tableEtiquetaRChave = null;
		var $tableObjetivos = null;
		var $tableObjPesoTime = null;
		var $tableObjResponsaveis = null;
		var $tableObjCiclo = null;

		var $tableResultadoChave = null;
		var $tableChaveMedicao = null;
		var $tableChaveResponsaveis = null;
		var $tableRChaveAnexos = null;

		var $tableEventoUsuario = null;

		var $tableAlert = null;
		var $tableCheckinAlert = null;
		var $tableAvaliacoes = null;

		var $tablePerguntas = null;
		var $tableQuestionarioPerguntas = null;
		var $viewPerguntas = null;
		var $tablePerguntaResposta = null;
		var $tablefeedback = null;
		var $tableFeedbackProtocoloQuestionario = null;
		var $tableCargoQuestionario= null;
		var $tableCompetencias = null;
		var $tableCompetenciasTipo = null;
		var $tableProtocoloAvaliacao = null;
		var $tableProtocoloAvaliacaoPotencial = null;
		var $tableUsuarioCompetencias = null;
		var $tableUsuarioAvaliacaoCompetencias = null;
		var $tableCargos  = null;
		var $tableCargosQuestionario  = null;
		var $tableQuestionario  = null;
		var $tableProtocoloQuestionario  = null;
		var $tableProtocoloQuestionarioResposta  = null;
		var $tableValores  = null;
		var $tablefeedbackValores  = null;
		var $tableProtocoloQuestionarioRespostaComentarios  = null;
		var $tableObjetivosRelacionados  = null;
		var $tableProtocoloAvaliacaoValores  = null;
		var $tableIntegraions  = null;
		var $tableRelObjActivities  = null;
		var $tableDpObjetivo  = null;
		var $tableDpRchave  = null;
		var $tableDpAtividade  = null;
		var $tableCategoryPergunta  = null;

		var $tableElogio = null;
		var $tableElogioMencao = null;
		var $tableProtocoloQuestionarioRespostasObjetivo = null;
		var $tableElogioComentar = null;
		var $tableElogioCurtir = null;
		var $tableElogioComentarioMencao = null;
		var $tableEtiquetasTimes = null;


		var $viewUsuariosTime = null;
		var $viewAvaliacoes = null;
		var $viewCompetencias = null;
		var $viewObjetivosTimeUsuario = null;
		var $viewPerguntasGeral = null;
		var $viewPesquisa = null;
		var $viewPesquisasRespostas = null;
		var $viewApprisialCompetencias = null;

		var $tablePesquisa = null;
		var $viewPesquisaGeral = null;
		var $tablePublicPesquisa = null;
		var $tableZapier = null;
		var $tableRevisaoCiclo = null;
		var $tableRevisaoCicloFases = null;
		var $tableRevisaoCicloScore = null;
		var $tableRevisaoCicloAvaliacoes = null;
		var $tableRevisaoCicloAvaliacoesFase = null;
		var $tableCategory = null;
		var $tableCompetenciaTimes = null;
		var $tableRevisaoCicloFaseTiposcore = null ;

	    public function __construct()
	    {
	        $this->load->database();
	        $this->tableip = 'ttl_controle_ip';
	        $this->tableUser = 'ttl_usuario';
	        $this->tableEmailTemplate = 'ttl_email_templates';
	        $this->tableEmailLogs = 'ttl_email_logs';
	        $this->tableCycle = 'ttl_ciclos';
	        $this->tableGoals = 'ttl_objetivos';
	        $this->viewGoals = 'v_objetivos';
	        $this->viewGoalsProfile = 'v_objetivos_perfil';
	     	$this->tableCompany = 'ttl_empresa';
			$this->tableWindow = 'ttl_janela';
			$this->tableTags = 'ttl_etiquetas';
			$this->tableActivities = 'ttl_atividades';
			$this->tableAlertaUsuario = 'ttl_alertas_usuario';
			$this->tablefeedbackAlert = 'ttl_alertas_feedback';
			$this->tableSurveyAlert = 'ttl_alertas_pesquisa';
			$this->tableCheckinAlert = 'ttl_alertas_checkin';
			$this->tableRelObjActivities = 'ttl_rel_obj_atividade';
	        $this->tableAtvResponsive = 'ttl_atv_reponsaveis';
	        $this->tableAtvTag = 'ttl_etiqueta_atv';
	        $this->tableTeams = 'ttl_empresa_times';
	        $this->tableTagObj = 'ttl_etiqueta_obj';
	        $this->tableUserTeam = 'ttl_time_usuario';
	        $this->tableFavoritos = 'ttl_usuario_favoritos';

	        $this->tableEtiquetaObj = 'ttl_etiqueta_obj';
	        $this->tableEtiquetaRChave = 'ttl_etiqueta_rchave';
	        $this->tableObjetivos=  'ttl_objetivos';

			$this->tableObjPesoTime =  'ttl_obj_peso_time';
	        $this->tableObjResponsaveis = 'ttl_obj_responsaveis';
	        $this->tableObjCiclo = 'ttl_objetivo_ciclo';
	   	    $this->tableEtiquetas = 'ttl_etiquetas';

	   	    $this->tableResultadoChave = 'ttl_resultados_chave';
	   	    $this->tableChaveMedicao = 'ttl_rchave_medicoes';
	   	    $this->tableChaveResponsaveis = 'ttl_rchave_responsaveis';
	   	    $this->tableRChaveAnexos = 'ttl_rchave_anexos';

	   	    $this->tableEventoUsuario = 'ttl_eventos_usuario';

	   	    $this->tableAlert = 'ttl_alertas_usuario';
	   	    $this->tableIntegraions = 'ttl_integracoes';

	   	    $this->tableAvaliacoes = 'ttl_avaliacao_usuario';
	   	    $this->tablePerguntas = 'ttl_perguntas';
	   	    $this->viewPerguntas = 'v_perguntas';
	   	    $this->tablePerguntaResposta = 'ttl_pergunta_resposta';
	   	    $this->tableCargoCompetencias = 'ttl_cargo_competencias';
	   	    $this->tableCompetencias = 'ttl_competencias';
	   	    $this->tableCompetenciasTipo = 'ttl_competencias_tipo';
	   	    $this->tableProtocoloAvaliacao = 'ttl_protocolo_avaliacao';
	   	    $this->tablefeedback = 'ttl_feedback';
	   	    $this->tableFeedbackProtocoloQuestionario = 'ttl_feedback_protocolo_questionario';
	   	    $this->tableProtocoloAvaliacaoPotencial = 'ttl_protocolo_avaliacao_potencial';
	   	    $this->tableProtocoloAvaliacaoCompetencias = 'ttl_protocolo_avaliacao_competencias';
	   	    $this->tableUsuarioCompetencias = 'ttl_usuario_competencias';
	   	    $this->tableUsuarioAvaliacaoCompetencias = 'ttl_usuario_avaliacao_competencias';
	   	    $this->tableCargos = 'ttl_cargos';
	   	    $this->tableQuestionario = 'ttl_questionarios';
	   	    $this->tableValores = 'ttl_valores';
	   	    $this->tablefeedbackValores = 'ttl_feedback_valores';
	   	    $this->tableQuestionarioPerguntas = 'ttl_questionario_perguntas';
	   	    $this->tableProtocoloQuestionario = 'ttl_protocolo_questionario';
	   	    $this->tableProtocoloQuestionarioResposta = 'ttl_protocolo_questionario_respostas';
	   	    $this->tableProtocoloQuestionarioRespostaComentarios = 'ttl_protocolo_questionario_respostas_comentarios';
	   	    $this->tableObjetivosRelacionados = 'ttl_objetivos_compartilhados';
	   	    $this->tableProtocoloAvaliacaoValores = 'ttl_protocolo_avaliacao_valores';

	   	    $this->tableCategoryPergunta = 'ttl_categoria_pergunta';
	   	    $this->tableElogio = 'ttl_elogio';
	   	    $this->tableElogioMencao = 'ttl_elogio_mencao';
	   	    $this->tableProtocoloQuestionarioRespostasObjetivo = 'ttl_protocolo_questionario_respostas_objetivo';
	   	    $this->tableElogioComentar = 'ttl_elogio_comentar';
	   	    $this->tableElogioCurtir = 'ttl_elogio_curtir';
	   	    $this->tableElogioComentarioMencao = 'ttl_elogio_comentario_mencao';
	   	    $this->tableElogioHashtags = 'ttl_elogio_hashtags';
	   	    $this->tableDpObjetivo = 'ttl_dp_objetivo';
	   	    $this->tableDpRchave = 'ttl_dp_rchave';
			   $this->tableDpAtividade = 'ttl_dp_atividade';
			   /**
				* @raptor
			    */
			   $this->tablePesquisa = 'ttl_pesquisa';
			   $this->tablePublicPesquisa = 'ttl_publico_pesquisa';

	   	    $this->viewUsuariosTime = 'v_usuariosTime';
	   	    $this->viewAvaliacoes = 'v_avaliacoes';
	   	    $this->viewCompetencias = 'v_avaliacao_competencias';
	   	    $this->tableCargosQuestionario = 'ttl_cargos_questionario';
	   	    $this->viewObjetivosTimeUsuario = 'v_obj_time_usuario';
	   	    $this->viewPerguntasGeral = 'v_perguntas_geral';
	   	    $this->viewPesquisa = 'v_pesquisa';
	   	    $this->viewPesquisaGeral = 'v_pesquisa_geral';
	   	    $this->viewPesquisasRespostas = 'v_pesquisas_respostas';
	   	    $this->viewApprisialCompetencias = 'v_competencias';

	   	    $this->tableZapier = 'ttl_zapier';
	   	    $this->tableEtiquetasTimes = 'ttl_etiqueta_times';
	   	    $this->tableRevisaoCiclo = 'ttl_revisao_ciclo';
	   	    $this->tableRevisaoCicloFases = 'ttl_revisao_ciclo_fases';
	   	    $this->tableRevisaoCicloScore = 'ttl_revisao_ciclo_score';
	   	    $this->tableRevisaoCicloAvaliacoes = 'ttl_revisao_ciclo_avaliacoes';
	   	    $this->tableRevisaoCicloAvaliacoesFase = 'ttl_revisao_ciclo_avaliacoes_fase';
	   	    $this->tableCategory = 'ttl_categoria_competencias';
	   	    $this->tableCompetenciaTimes = 'ttl_competencias_times';
	   	    $this->tableRevisaoCicloFaseTiposcore = 'ttl_revisao_ciclo_fase_tipo_score';

	    }
    	/*
	    public function get_user_logged_in($id)
	    {
	    	$this->db->select("id_usuario as id, nome_usuario as name, url_image as image, favorites");
	    	$query = $this->db->get_where($this->tableUser, array('id_usuario' => $id));
	    	return $query->result_array();

	    }
	    */

	    //M�todo respons�vel por retornar dados do usu�rio respons�vel por um objetivo.
	    public function get_data_resp($id)
	    {
	    	$this->db->select("id_usuario as id, nome_usuario as name, url_image as image, id_empresa as id_empresa");
	    	$query = $this->db->get_where($this->tableUser, array('id_usuario' => $id));
	    	$data =  $query->result_array();

	    	if(!empty($data)){
				foreach($data as &$user){

					if(!empty($user['image'])){
						$image 				=	$user['image'];
						$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
						$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image;
						$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image;
					}else{
						$user['image'] 		= 	null;
						$user['xs_image'] 	= 	null;
						$user['md_image'] 	= 	null;
					}

				}
			}
			return $data;
	    }

	    public function get_email_template_by_action($action)
	    {
	    	$this->db->select("*");
	    	$query = $this->db->get_where($this->tableEmailTemplate, array('action' => $action));
	    	$data =  $query->row_array();
			return $data;
	    }

	    public function get_email_constants($string){
			preg_match_all('/\{(.*?)}/', $string, $result);
			if(!empty($result[0])){
				return $result[0];
			}else{
				return false;
			}
		}

		public function save_email_log($email,$name,$body,$email_from,$name_from,$status){
			$this->db->trans_start();

			$this->db->insert($this->tableEmailLogs, array(
					'email_from'=>$email_from,
					'from_name'=>$name_from,
					'email_to'=>$email,
					'to_name'=>$name,
					'status'=>$status,
					'body'=>$body,
				)
			);

			$result = $this->db->trans_status();
			$this->db->trans_complete();
	    	return $result;
		}

	    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
	    public function get_global_goals($id)
	    {
	    	$this->db->select('id_objetivo as id, nome as title, percentual as percentage, qtd_atividades as objectives, cor as color, responsavel');
	    	$this->db->from($this->tableGoals);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableGoals.'.id_empresa', 'inner');
	    	$this->db->where($this->tableUser.'.id_usuario', $id);
	    	$this->db->where($this->tableGoals.'.parent_id is null');
	    	$query = $this->db->get();

	    	return $query->result_array();

	    }

	    public function get_data_resp_user_data($id)
	    {

	    	$this->db->select("tu.id_usuario as id, tu.nome_usuario as name, tu.url_image as image, tu.id_empresa as id_empresa, vut.nome_unidade as team, vut.id_time as teamid");

	    	$this->db->from($this->tableUser." tu");
	    	$this->db->join($this->viewUsuariosTime.' vut' , 'vut.id_usuario = tu.id_usuario', 'inner');
	    	$this->db->where('tu.id_usuario', $id);
	    	$query = $this->db->get();

	    	$data =  $query->result_array();



	    	if(!empty($data)){
				foreach($data as $index=>$user){
					$data[$index] = $user;
					if(!empty($user['image'])){
						$data[$index]['image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$user['image'];
						$data[$index]['xs_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$user['image'];
						$data[$index]['md_image'] = base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$user['image'];
					}else{
						$data[$index]['image'] = null;
						$data[$index]['xs_image'] = null;
						$data[$index]['md_image'] = null;
					}

				}
			}
			return $data;
	    }

	    //M�todo respons�vel por trazer os objetivos t�ticos pela empresa do usu�rio logado.
	    public function get_tatics_goals($id)
	    {
	    	$this->db->select(
	    			'id_objetivo as id,'.
					'nome as title, '.
	    			'percentual as percentage,'.
					'qtd_atividades as objectives,'.
	    			'peso as weight, '.
	    			'situacao as status, '.
	    			'cor as color, '.
					'responsavel, '.
	    			$this->tableGoals.'.id_time'
	    	);
	    	$this->db->from($this->tableGoals);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableGoals.'.id_empresa', 'inner');
	    	$this->db->where($this->tableUser.'.id_usuario', $id);
	    	$this->db->where($this->tableGoals.'.parent_id is not null');

	    	$query = $this->db->get();
	    	$result1 = $query->result_array();
	    	$i = 0;

	    	foreach($result1 as $item1){
	    		$id_time = $item1['id_time'];
	    		unset($result1[$i]['id_time']);
	    		$team = ($id_time) ? $this->get_team_by_id($id_time) : array();

	    		if(isset($team[0]) ){
	    			$team[0] = array('id' => $team[0]['id_time'], 'name' => $team[0]['nome_unidade']);
	    		}

	    		$result1[$i]['team'] = (isset($team[0]) ) ? $team[0] : array();

	    		$cycles = $this->get_cycles_by_id_objetivo_related($item1['id']);
	    		if(sizeof($cycles > 0) && isset($cycles[0]) ){
	    			$result1[$i]['cycles'] = $cycles;
	    			$date = explode('-', $cycles[0]['inicio_vigencia']);
	    			$result1[$i]['year'] = $date[0];
	    		}else{
	    			$result1[$i]['cycles'] = "";
	    			$result1[$i]['year'] = "";
	    		}
	    		//$this->debugMark($item1['id'], $result1);

	    		$i++;
	    	}

	    	return $result1;

	    }

	    public function get_tatics_goals_by_id_usuario_ano_id_ciclo($id_empresa, $id_usuario= null,  $ano = null,  $id_ciclo = null)
	    {

	    	if($ano){
	    		$id_janela = $this->get_id_janela_by_ano_base($ano, $id_empresa);
	    	}

	    	$this->db->select(
	    			$this->tableGoals.'.id_objetivo as id,'.
	    			'nome as title, '.
	    			'percentual as percentage,'.
	    			'situacao as status, '.
	    			'responsavel,  '.
	    			'avaliacao'
	    	);

	    	$this->db->from($this->tableGoals);
	    	$this->db->join($this->tableObjCiclo , $this->tableObjCiclo.'.id_objetivo = '.$this->tableGoals.'.id_objetivo', 'inner');
	    	$this->db->where($this->tableGoals.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableGoals.'.parent_id is not null');

	    	if($id_usuario){
	    		$this->db->where($this->tableGoals.'.responsavel', $id_usuario);
	    	}

	    	if(isset($id_janela)){
	    		$this->db->where($this->tableGoals.'.id_janela', $id_janela);
	    	}

	    	if($id_ciclo){
	    		$this->db->where($this->tableObjCiclo.'.id_ciclo', $id_ciclo);
	    	}

	    	$this->db->group_by($this->tableGoals.'.id_objetivo');

	    	$query = $this->db->get();
	    	//$this->PQUERY();

	    	$result = $query->result_array();

	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['responsavel']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
	    			unset($result[$i]['responsavel']);
	    			$i++;
	    		}
	    	}

	    	if(!empty($result)){
					foreach($result as $index=>$tatic){
						$result[$index]['keyresults'] = $this->get_rchave_by_objetivo_tatico_by_userId($tatic['id'],$tatic['user']['id']);
					}
				}
			$this->db->where('ttl_protocolo_avaliacao.id_ciclo', $id_ciclo);
	    	$this->db->where('ttl_protocolo_avaliacao.id_usuario', $id_usuario);
	    	$queryyy = $this->db->get('ttl_protocolo_avaliacao');
	    	$finals = $queryyy->result_array();
	    	return $result;

	    }

		public function get_user_goals($id_empresa, $id_usuario= null,  $id_ciclo = null)
	    {
	    	$this->db->select(
	    			'tg.id_objetivo as id,'.
	    			'tg.nome as title, '.
	    			'tg.percentual as percentage,'.
	    			'tg.situacao as status, '.
	    			'tg.cor as color,  '.
	    			'tg.responsavel,  '.
	    			'tg.avaliacao, '.
					'trc.responsavel as keyresponsavel'
	    	);
	    	$this->db->from($this->tableResultadoChave." trc");
	    	$this->db->join($this->tableGoals.' tg' , 'trc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo.' toc' , 'toc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->where('tg.id_empresa', $id_empresa);
	    	$this->db->where('tg.ativo',1);
	    	$this->db->where('tg.parent_id is not null');

	    	if($id_usuario){
	    		$this->db->where('trc.responsavel', $id_usuario);
	    	}
	    	$this->db->where('toc.id_ciclo', $id_ciclo);
	    	$this->db->group_by('tg.id_objetivo');
	    	$query 	= $this->db->get();
	    	$result = $query->result_array();
	    	$i 		= 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['responsavel']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
	    			unset($result[$i]['responsavel']);
	    			$i++;
	    		}
	    	}
	    	if(!empty($result)){
				foreach($result as $index=>$tatic){
					$result[$index]['keyresults'] = $this->get_rchave_by_objetivo_tatico_by_userId($tatic['id'],$tatic['keyresponsavel']);
				}
			}
	    	return $result;
	    }
		
		public function get_user_goals_for_review_profile($id_empresa, $id_usuario= null,  $id_ciclo_start = null,  $id_ciclo_end = null)
	    {
	    	$this->db->select(
	    			'tg.id_objetivo as id,'.
	    			'tg.nome as title, '.
	    			'tg.percentual as percentage,'.
	    			'tg.situacao as status, '.
	    			'tg.cor as color,  '.
	    			'tg.responsavel,  '.
	    			'tg.avaliacao, '.
					'trc.responsavel as keyresponsavel'
	    	);
	    	$this->db->from($this->tableResultadoChave." trc");
	    	$this->db->join($this->tableGoals.' tg' , 'trc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo.' toc' , 'toc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->where('tg.id_empresa', $id_empresa);
	    	$this->db->where('tg.ativo',1);
	    	$this->db->where('tg.parent_id is not null');

	    	if($id_usuario){
	    		$this->db->where('trc.responsavel', $id_usuario);
	    	}
	    	$this->db->where('toc.id_ciclo', $id_ciclo_start);
	    	$this->db->group_by('tg.id_objetivo');
	    	$query 	= $this->db->get();
	    	$result = $query->result_array();
	    	$i 		= 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['responsavel']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
	    			unset($result[$i]['responsavel']);
	    			$i++;
	    		}
	    	}
	    	if(!empty($result)){
				foreach($result as $index=>$tatic){
					$result[$index]['keyresults'] = $this->get_rchave_by_objetivo_tatico_by_userId($tatic['id'],$tatic['keyresponsavel']);
				}
			}
	    	return $result;
	    }
		public function get_profile_goal_detail_by_id($goal_id,$id_usuario,$id_ciclo)
	    {

	    	$this->db->select(
	    			'tg.id_objetivo as id,'.
	    			'tg.nome as title, '.
	    			'tg.percentual as percentage,'.
	    			'tg.situacao as status, '.
	    			'tg.responsavel,  '.
	    			'tg.avaliacao, '.
					'trc.responsavel as keyresponsavel'
	    	);

	    	$this->db->from($this->tableResultadoChave." trc");
	    	$this->db->join($this->tableGoals.' tg' , 'trc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo.' toc' , 'toc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->where('tg.id_objetivo', $goal_id);


	    	//if($id_usuario){
	    		//$this->db->where('trc.responsavel', $id_usuario);
	    	//}

	    	$this->db->group_by('tg.id_objetivo');

	    	$query = $this->db->get();

	    	$result = $query->row_array();
	    	if(!empty($result)){
					$result['keyresults'] = $this->get_profile_key_results_by_id($result['id'],$result['keyresponsavel']);
					$result['activities'] = $this->get_profile_activities_by_id($result['id'],$result['keyresponsavel']);
					$result['avaliacao_details'] = $this->get_avaliacao_details_by_id($id_usuario,$id_ciclo);
			}
	    	return $result;
	    }

	    public function get_avaliacao_details_by_id($id_usuario,$id_ciclo)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableProtocoloAvaliacao . ' tpa');
	    	$this->db->where('tpa.id_ciclo', $id_ciclo);
	    	$this->db->where('tpa.id_usuario', $id_usuario);
	    	$query5 = $this->db->get();

	    	$keys = $query5->row_array();

	    	return $keys;
	    }
	    public function get_avaliacas_by_id($id_protocolo_avaliacao)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableProtocoloAvaliacao . ' tpa');
	    	$this->db->where('tpa.id_protocolo_avaliacao', $id_protocolo_avaliacao);
	    	$query5 = $this->db->get();

	    	$keys = $query5->row_array();

	    	return $keys;
	    }
	    public function get_profile_key_results_by_id($id_objetivo,$userId)
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
	    			'trc.id_objetivo as id_objetivo, '.
	    			'trc.nomeRChave as title, '.
	    			'trc.meta_final_prevista as goal, '.
	    			'trc.unidade_meta as measurement,  '.
	    			'trc.situacao as status,  '.
	    			'trc.data_atualizacao as date,  '.
	    			'progresso as percentage'

	    	);
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_objetivo', $id_objetivo);
	    	$this->db->where('trc.responsavel', $userId);
	    	$query5 = $this->db->get();

	    	$keys = $query5->result_array();

	    	return $keys;
	    }

	    public function get_profile_activities_by_id($id_objetivo,$userId){

	    	$this->db->select("id_atividade as id, atraso as atraso, nome as title, descricao as description, data_ini as init, data_fim as end, progresso as percentage, responsavel");
	    	$this->db->from($this->tableActivities);
	    	$this->db->where('parent_id = ' . $id_objetivo);
	    	$this->db->where('responsavel = ' . $userId);
	    	$query = $this->db->get();

	    	$retorno = array();

	    	$act = $query->result_array();
	    	return $act;
	    }

		public function get_goals_by_id_and_ciclo($id_empresa, $id_usuario= null,  $id_ciclo = null)
	    {

	    	$this->db->select(
	    			'tg.id_objetivo as id,'.
	    			'tg.nome as title, '.
	    			'tg.percentual as percentage,'.
	    			'tg.situacao as status, '.
	    			'tg.responsavel,  '.
	    			'tg.avaliacao, '.
					'trc.responsavel as keyresponsavel'
	    	);

	    	$this->db->from($this->tableResultadoChave." trc");
	    	$this->db->join($this->tableGoals.' tg' , 'trc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo.' toc' , 'toc.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->where('tg.id_empresa', $id_empresa);
	    	$this->db->where('tg.ativo',1);
	    	$this->db->where('tg.parent_id is not null');

	    	if($id_usuario){
	    		$this->db->where('trc.responsavel', $id_usuario);
	    	}
	    	$this->db->where('toc.id_ciclo', $id_ciclo);

	    	$this->db->group_by('tg.id_objetivo');

	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['responsavel']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
	    			unset($result[$i]['responsavel']);
	    			$i++;
	    		}
	    	}

	    	return $result;
	    }

	    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
	    public function get_global_goals_year($id, $year)
	    {
	    	$this->db->select($this->tableGoals .'.id_objetivo as id,'.$this->tableGoals .'.data_atualizacao as created, nome as title, percentual as percentage, qtd_objetivos as objectives,(case when ttl_objetivos.estrategico = "0" then true else false end) as direcionador,(case when ttl_objetivos.estrategico = "1" then true else false end) as estrategico_status,ttl_objetivos.usuario_atualizador as authorised,ttl_objetivos.id_empresa as empresa, qtd_atividades as activities, qtd_rchaves as rkeys, cor as color, responsavel,ttl_objetivos.id_empresa,ttl_objetivos.estrategico');
	    	$this->db->from($this->tableGoals);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableGoals.'.id_empresa', 'inner');
	    	$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableGoals.'.id_janela', 'inner');
	    	$this->db->where($this->tableUser.'.id_usuario', $id);
	    	$this->db->where('year(' . $this->tableWindow.'.data_final)', $year);
	    	//$this->db->where($this->tableGoals.'.estrategico',0);
	    	$this->db->where($this->tableGoals.'.ativo', 1);
			$this->db->where($this->tableGoals.'.parent_id is null');
	    	$query = $this->db->get();
	    	$resultado = $query->result_array();

	    	return $resultado;

	    }

	    public function get_global_goals_year_objetivo_pessoal($id,$id_empresa, $year,$type)
	    {
			$not_in = array(4,3);
	    	$this->db->select($this->tableGoals .'.id_objetivo as id,'.$this->tableGoals .'.data_atualizacao as created, nome as title, percentual as percentage, qtd_objetivos as objectives,ttl_objetivos.usuario_atualizador as authorised,ttl_objetivos.id_empresa as empresa, qtd_atividades as activities, qtd_rchaves as rkeys, cor as color, responsavel,ttl_objetivos.id_empresa');
	    	$this->db->from($this->tableGoals);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableGoals.'.id_empresa', 'inner');
	    	$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableGoals.'.id_janela', 'inner');
	    	$this->db->where($this->tableUser.'.id_usuario', $id);
	    	$this->db->where('year(' . $this->tableWindow.'.data_final)', $year);
	    	if($type == 1){
				$this->db->where($this->tableGoals.'.estrategico',0);
				$this->db->where($this->tableGoals.'.parent_id is null');
			}
			else if($type == 3){
				$this->db->where($this->tableGoals.'.estrategico',1);
			}
			else{
				$this->db->where($this->tableGoals.'.parent_id is not null');
				$this->db->where_not_in($this->tableGoals.'.situacao',$not_in);
				$this->db->where($this->tableGoals.'.parent_id > 0');
				$this->db->where($this->tableGoals.'.id_empresa',$id_empresa);
				$this->db->where($this->tableGoals.'.estrategico',0);
			}

	    	$this->db->where('year(' . $this->tableWindow.'.data_final)', $year);
	    	$this->db->where($this->tableGoals.'.ativo', 1);
	    	$query = $this->db->get();

	    	$resultado = $query->result_array();

	    	return $resultado;

	    }

	    public function get_global_parent_goals_year($id,$id_empresa, $year,$id_objetivo)
	    {
			$not_in = array(4,2);
	    	$this->db->select($this->tableGoals .'.id_objetivo as id,'.$this->tableGoals .'.data_atualizacao as created, nome as title, percentual as percentage, qtd_objetivos as objectives,ttl_objetivos.usuario_atualizador as authorised,ttl_objetivos.id_empresa as empresa, qtd_atividades as activities, qtd_rchaves as rkeys, cor as color, responsavel,ttl_objetivos.id_empresa');
	    	$this->db->from($this->tableGoals);
	    	//$this->db->where('year(' . $this->tableWindow.'.data_final)', $year);
			$this->db->where($this->tableGoals.'.parent_id is null');
			$this->db->where($this->tableGoals.'.id_empresa',$id_empresa);
	    	$this->db->where($this->tableGoals.'.ativo', 1);
	    	$query = $this->db->get();
	    	$resultado = $query->result_array();

	    	return $resultado;

	    }

	     public function get_recursive_goals_year($id_objetivo)
	    {
	    	$this->db->select($this->tableGoals .'.id_objetivo as id,'.$this->tableGoals .'.data_atualizacao as created, nome as title, percentual as percentage, qtd_objetivos as objectives,ttl_objetivos.usuario_atualizador as authorised,ttl_objetivos.id_empresa as empresa, qtd_atividades as activities, qtd_rchaves as rkeys, cor as color, responsavel,ttl_objetivos.id_empresa');
	    	$this->db->from($this->tableGoals);
			$this->db->where($this->tableGoals.'.parent_id',$id_objetivo);
	    	$this->db->where($this->tableGoals.'.ativo', 1);
	    	$query = $this->db->get();
	    	$resultado = $query->result_array();

	    	return $resultado;

	    }



	    public function get_global_child_goals_year($id,$id_empresa, $year,$id_objetivo)
	    {
	    	$this->db->select($this->tableGoals .'.id_objetivo as id,'.$this->tableGoals .'.data_atualizacao as created, nome as title, percentual as percentage, qtd_objetivos as objectives,ttl_objetivos.usuario_atualizador as authorised,ttl_objetivos.id_empresa as empresa, qtd_atividades as activities, qtd_rchaves as rkeys, cor as color, responsavel,ttl_objetivos.id_empresa');
	    	$this->db->from($this->tableGoals);

			$this->db->where($this->tableGoals.'.parent_id',$id_objetivo);

	    	$this->db->where($this->tableGoals.'.ativo', 1);
	    	$query = $this->db->get();

	    	$resultado = $query->result_array();

	    	return $resultado;

	    }

	    public function get_child_goals_by_goal_id($id_objetivo)
	    {
	    	$this->db->select($this->tableGoals .'.id_objetivo as id,'.$this->tableGoals .'.data_atualizacao as created, nome as title, percentual as percentage, qtd_objetivos as objectives,ttl_objetivos.usuario_atualizador as authorised,ttl_objetivos.id_empresa as empresa, qtd_atividades as activities, qtd_rchaves as rkeys, cor as color, responsavel,ttl_objetivos.id_empresa');
	    	$this->db->from($this->tableGoals);
			$this->db->where($this->tableGoals.'.parent_id',$id_objetivo);
	    	$this->db->where($this->tableGoals.'.ativo', 1);
	    	$query = $this->db->get();
	    	$resultado = $query->result_array();
	    	return $resultado;
	    }

	    // get globals details by id Grobal (objetivos) ADS
	    public function get_global_goals_by_id_global($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableGoals);
	    	$this->db->join($this->tableCompany, $this->tableCompany.'.id_empresa = '.$this->tableGoals.'.id_empresa', 'inner');
	    	$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableGoals.'.id_janela', 'inner');
	    	$this->db->where($this->tableGoals.'.id_objetivo', $id);

	    	$query = $this->db->get();

	    	return $query->result_array();

	    }

	    // get globals details by id Grobal (objetivos) ADS
	    public function add_favorito_usuarios($id_usuario, $id_objeto, $classe)
	    {
	    	if(!$this->check_exist_favorito($id_usuario, $id_objeto, $classe)){
	    		$data = array('id_usuario' => $id_usuario, 'id_objeto' => $id_objeto, 'classe' => $classe);
	    		$result = $this->db->insert($this->tableFavoritos, $data);

	    		return $result;
	    	}

	    	return true;
	    }

	    // get globals details by id Grobal (objetivos) ADS
	    public function remove_favorito_usuarios($id_usuario, $id_objeto, $classe)
	    {
	    	$registro = $this->check_exist_favorito($id_usuario, $id_objeto, $classe);
	    	if(!$registro){
	    		return true;
	    	}else{
	    		$this->db->delete($this->tableFavoritos, array('id_favorito' => $registro[0]['id_favorito']));
	    	}


	    }

	    // get globals details by id Grobal (objetivos) ADS
	    public function get_objetos_favoritos($id_usuario,  $classe)
	    {
	    	$this->db->select('id_objeto as favorites');
	    	$this->db->from($this->tableFavoritos);
	    	$this->db->where($this->tableFavoritos.'.id_usuario', $id_usuario);
	    	$this->db->where($this->tableFavoritos.'.classe', $classe);

	    	$query = $this->db->get();

    		return $query->result_array();
	    }

	    // verifica se existe favorito e retorna o id dele caso exista
	    public function check_exist_favorito($id_usuario, $id_objeto, $classe)
	    {
	    	$this->db->select('id_favorito');
	    	$this->db->from($this->tableFavoritos);
	    	$this->db->where($this->tableFavoritos.'.id_usuario', $id_usuario);
	    	$this->db->where($this->tableFavoritos.'.id_objeto', $id_objeto);
	    	$this->db->where($this->tableFavoritos.'.classe', $classe);

	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return $query->result_array();
	    	}
	    	return false;
	    }

	    //M�todo respons�vel por coletar dados dos usu�rios por empresa.
	    public function get_all_user_for_company($id)
	    {

	    	$this->db->select("id_empresa");
	    	$query = $this->db->get_where($this->tableUser, array('id_usuario' => $id));
	    	$id_empresa = $query->result_array();

	    	$array = array();

	    	if($id_empresa != null)
	    	{
	    		$this->db->select("tu.id_usuario as id, nome_usuario as name, url_image as image, email_usuario as email,  nome_unidade as team, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active");
		    	$this->db->from($this->tableUser . ' tu');
		    	$this->db->join($this->tableTeams . ' tet', 'tet.id_empresa = tu.id_empresa', 'left');
		    	$this->db->where('tu.id_empresa = ' . $id_empresa[0]['id_empresa']);
		    	$query = $this->db->get();

		    	return $query->result_array();
	    	}

	    	return $array;

	    }

	    public function get_all_user_for_by_id_company($id)
	    {

//            SELECT tu.id_usuario, tu.nome_usuario, ttu.id_empresa_time, tet.nome_unidade
//            FROM ttl_usuario tu
//            INNER JOIN ttl_time_usuario ttu ON tu.id_usuario = ttu.id_usuario
//            INNER JOIN ttl_empresa_times tet ON tet.id_time = ttu.id_empresa_time
//            WHERE tu.id_empresa = 61
//
//            union
//
//            SELECT tu.id_usuario, tu.nome_usuario, NULL as id_empresa_time, NULL as nome_unidade
//            FROM ttl_usuario tu
//            WHERE tu.id_empresa = 61 AND tu.id_usuario NOT IN
//                    (SELECT ttu.id_usuario
//                 FROM ttl_time_usuario ttu)


            $query = $this->db->query("SELECT tu.id_usuario as id, nome_usuario as name, url_image as image, tu.normal_user, tu.goal_register, tu.maintenance_user, tu.user_reviewer, email_usuario as email,  nome_unidade as team, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor LIMIT 1)as gestor,tipo_cargo, gerado_integracao
                                        FROM ttl_usuario tu
                                        INNER JOIN ttl_time_usuario ttu ON tu.id_usuario = ttu.id_usuario
                                        INNER JOIN ttl_empresa_times tet ON tet.id_time = ttu.id_empresa_time
                                        WHERE tu.id_empresa = $id AND tu.ativo=1

                                        union

                                        SELECT tu.id_usuario as id, nome_usuario as name, url_image as image, tu.normal_user, tu.goal_register, tu.maintenance_user, tu.user_reviewer, email_usuario as email,  NULL as team, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor LIMIT 1)as gestor,tipo_cargo, gerado_integracao

                                        FROM ttl_usuario tu
                                        WHERE tu.id_empresa = $id AND tu.ativo=1 AND tu.id_usuario NOT IN
                                                (SELECT ttu.id_usuario
                                             FROM ttl_time_usuario ttu)");
    		return $query->result_array();

	    }

	    public function get_all_user_for_by_id_company_active($id)
	    {
	    	$this->db->select("tu.id_usuario as id, tu.nome_usuario as name,tu.id_empresa as id_empresa, tu.url_image as image, tu.email as email, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,tu.nome_unidade AS team");
	    	$this->db->from($this->viewUsuariosTime . ' tu');
	    	$this->db->where('tu.id_empresa = ' . $id);
	    	$this->db->where('tu.ativo', 1);
	    	$this->db->group_by("tu.id_usuario");
	    	$query = $this->db->get();

	    	$res =  $query->result_array();
	    	return $res;
	    }
	    public function get_all_users_by_company_id($id)
	    {
	    	$this->db->select("tu.id_usuario as id, tu.nome_usuario as name,tu.id_empresa as id_empresa, tu.url_image as image, tu.email_usuario as email, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,(select nome_unidade from v_usuariosTime where id_usuario=tu.id_usuario ) AS team,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor) as gestor, tu.gerado_integracao");
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->where('tu.id_empresa = ' . $id);
	    	$this->db->group_by("tu.id_usuario");
	    	$query 	= 	$this->db->get();
	    	$res 	=  	$query->result_array();
	    	return $res;
	    }
	    public function get_all_gestor_for_by_id_company_active($id)
	    {
	    	$this->db->select("tu.id_usuario as id, tu.nome_usuario as name,tu.id_empresa as id_empresa, tu.url_image as image, tu.email_usuario as email");
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->where('tu.id_empresa = ' . $id);
	    	$this->db->where('tu.ativo', 1);
	    	$query 	= 	$this->db->get();
	    	$res 	=  	$query->result_array();
	    	return $res;

	    }
	    public function get_all_users_combo_active($id_empresa)
	    {

	    	$chk_admin = $this->session->userdata('admin');
	    	$id_usuario = $this->session->userdata('id');
	    	if($chk_admin != 1){
		    	$sql = "SELECT tu.id_usuario as id, u.nome_usuario as name
						FROM ttl_empresa_times et
						INNER JOIN ttl_time_usuario tu ON et.id_time = tu.id_empresa_time
						INNER JOIN ttl_usuario u ON u.id_usuario = tu.id_usuario
						WHERE id_usuario_responsavel = $id_usuario
						 and u.ativo=1	
						UNION

						SELECT u.id_usuario as id, u.nome_usuario as name
						FROM ttl_usuario u
						WHERE u.id_usuario = $id_usuario
						and u.ativo=1
						UNION

						SELECT u.id_usuario as id, u.nome_usuario as name
						FROM ttl_usuario u
						WHERE u.id_gestor = $id_usuario
						and u.ativo=1
						group by id
						order by name";
	    	}
	    	else{
    			$sql = "SELECT u.id_usuario as id, u.nome_usuario as name
					FROM ttl_usuario u
					WHERE id_empresa = $id_empresa
					and u.ativo=1
					order by name";
	    	}

      		$query = $this->db->query($sql);

	    	$result =  $query->result_array();
	    	
	    	return $result;

	    }
	    public function get_all_users_from_gestor($id_gestor){
	    	$sql = "SELECT tu.id_usuario as id, u.nome_usuario as name, u.url_image as image
						FROM ttl_empresa_times et
						INNER JOIN ttl_time_usuario tu ON et.id_time = tu.id_empresa_time
						INNER JOIN ttl_usuario u ON u.id_usuario = tu.id_usuario
						WHERE id_usuario_responsavel = $id_gestor
						 and u.ativo=1	
						UNION

						SELECT u.id_usuario as id, u.nome_usuario as name, u.url_image as image
						FROM ttl_usuario u
						WHERE u.id_gestor = $id_gestor
						and u.ativo=1
						group by id
						order by name";

      		$query = $this->db->query($sql);
	    	$result =  $query->result_array();
	    	return $result;
	    }

	    public function get_all_users_from_gestor_by_cycle($id_gestor, $id_cycle){

	    	$cycle_str = "";
	    	// if($id_cycle) $cycle_str = " AND rcs.id_revisao_ciclo = $id_cycle ";

	    	$sql = "SELECT tu.id_usuario as id, u.nome_usuario as name, u.url_image as image, rcs.media_final, rcs.liberado, rcs.id_revisao_ciclo
						FROM ttl_empresa_times et
						INNER JOIN ttl_time_usuario tu ON et.id_time = tu.id_empresa_time
						INNER JOIN ttl_usuario u ON u.id_usuario = tu.id_usuario
						INNER JOIN ttl_revisao_ciclo_score rcs ON rcs.id_usuario_avaliado = u.id_usuario
						WHERE id_usuario_responsavel = $id_gestor
						AND u.id_usuario != $id_gestor 
						$cycle_str
						and u.ativo=1	
						UNION

						SELECT u.id_usuario as id, u.nome_usuario as name, u.url_image as image, rcs.media_final, rcs.liberado, rcs.id_revisao_ciclo
						FROM ttl_usuario u
						INNER JOIN ttl_revisao_ciclo_score rcs ON rcs.id_usuario_avaliado = u.id_usuario
						WHERE u.id_gestor = $id_gestor
						AND u.id_usuario != $id_gestor 
						$cycle_str
						and u.ativo=1
						group by id
						order by name";

      		$query = $this->db->query($sql);
	    	$result =  $query->result_array();
	    	return $result;
	    }


	    public function get_all_team_user_for_by_id_company_active($id)
	    {

	    	$this->db->select("tu.id_usuario as id, tu.nome_usuario as name,tu.id_empresa as id_empresa, tu.url_image as image, tu.email_usuario as email, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,tu.nome_unidade AS team");
	    	$this->db->from($this->viewUsuariosTime . ' tu');
	    	$this->db->where('tu.id_empresa = ' . $id);
	    	$this->db->where('tu.ativo', 1);
			
	    	$this->db->group_by("tu.id_usuario");
	    	$query = $this->db->get();

	    	$result =  $query->result_array();

	    	if(!empty($result)){
				foreach($result as $userindex=>&$user){

				$updates 	=	$this->get_user_updates_for_profile($user['id'], false, $start_date=0,$end_date=0);
				$count_updates = count($updates);
					if($count_updates > 0){
						$user['updates'] 	=	1;
					}else{
						$user['updates'] 	=	0;
					}

				}

			}
	    	return $result;

	    }
		
		//created for daniel to control limit of time on company
		public function get_all_user_companytime($id, $days)
	    {

	    	$this->db->select("tu.id_usuario as id, tu.dias as dias , tu.nome_usuario as name,tu.id_empresa as id_empresa, tu.url_image as image, tu.email as email, (case when tu.admin = '1' then 'true' else 'false' end) as admin, (case when tu.avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,tu.nome_unidade AS team");
	    	$this->db->from($this->viewUsuariosTime . ' tu');
			$this->db->where('tu.id_empresa = ' . $id);
	    	//should be parameter on cycleconfiguration  -bharat
			$this->db->where('tu.dias >', $days);	
			
	    	$this->db->group_by("tu.id_usuario");
	    	$query = $this->db->get();

	    	$result =  $query->result_array();
  	
	    	return $result;

	    }
		

	    public function get_vusuariotime_by_id_usuario($id)
	    {
	    	$this->db->select("nome_unidade AS team");
	    	$this->db->from($this->viewUsuariosTime . ' vut');
	    	$this->db->where('vut.id_usuario = ' . $id);
	    	$query = $this->db->get();
	    	$res =  $query->row_array();
	    	if(!empty($res)){
	    		return $res['team'];
	    	}
	    	return false;
	    }

		public function get_admin_usuarios_time($id_empresa)
	    {
	    	$this->db->select("id_usuario as id, nome_usuario as name, id_empresa, nome_cargo, image, email");
	    	$this->db->from($this->viewUsuariosTime);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

		public function get_user_team_members_profile($id_usuario)
	    {
	    	$query = $this->db->query("SELECT `vut`.`id_usuario` as id, `vut`.`nome_usuario` as name, `vut`.`id_empresa`, `vut`.`nome_cargo`, `vut`.`image`, `vut`.`email` FROM (`v_usuariosTime` vut)
			JOIN `ttl_time_usuario` tut ON `tut`.`id_usuario`=$id_usuario JOIN `ttl_empresa_times` tt ON `tt`.`id_time` = `tut`.`id_empresa_time` AND vut.ativo=1 WHERE `vut`.`id_time` = tt.id_time AND vut.id_usuario != $id_usuario GROUP BY vut.id_usuario");

	    	return $query->result_array();
	    }

	    public function get_gestor_of_user($id_usuario)
	    {
	    	$this->db->select("vg.id_usuario as id,vg.nome_usuario as name,vg.id_empresa,vg.email_usuario as email");
			$this->db->from($this->tableUser.' vu');
			$this->db->join($this->tableUser." vg", "vu.id_gestor = vg.id_usuario");
			$this->db->where('vu.id_usuario',$id_usuario);
			$query  = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_responsavel_of_users_team($id_usuario)
	    {
	    	$this->db->select("tu.id_usuario as id,tu.nome_usuario as name,tu.id_empresa,tu.email_usuario as email");
			$this->db->from($this->tableUser. " tu");
			$this->db->join($this->viewUsuariosTime." vut", "tu.id_usuario = vut.id_resp_time");
			$this->db->where('vut.id_usuario',$id_usuario);
			$query  = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_users_teammates($id_usuario)
	    {
	    	$this->db->select("v_group.id_usuario as id,v_group.nome_usuario as name,v_group.id_empresa,v_group.email as email");
			$this->db->from($this->viewUsuariosTime." v_individual", "tu.id_usuario = vut.id_resp_time");
			$this->db->join($this->viewUsuariosTime." v_group", "v_individual.id_time = v_group.id_time");
			$this->db->where('v_individual.id_usuario',$id_usuario);
			$query  = $this->db->get();


	    	return $query->result_array();
	    }

		public function get_user_avaliacoes_details($id_protocolo_avaliacao=null, $id_usuario=null, $id_ciclo=null)
	    {
	    	$this->db->select("id_protocolo_avaliacao, id_ciclo, janela as year, nome_ciclo as cycle, performance, potencial, geral as desempenho,, avaliacao_quali as avaliacao_quali, data_atualizacao as datadeatualizacao");
	    	$this->db->from($this->viewAvaliacoes);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$this->db->where('id_protocolo_avaliacao', $id_protocolo_avaliacao);
	    	$this->db->where('id_ciclo', $id_ciclo);
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

		public function get_non_admin_usuarios_time($id_usuario, $id_empresa)
	    {

	    	$this->db->select("id_usuario as id, nome_usuario as name, id_empresa, nome_cargo, image, email");
	    	$this->db->from($this->viewUsuariosTime);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$this->db->where('(id_usuario_responsavel ='. $id_usuario. " OR id_usuario_coresponsavel=" . $id_usuario.")");
	    	$query = $this->db->get();
	    	return $query->result_array();

	    }

	    public function get_cycle_review_time($id_empresa,$id_usuario)
	    {
			$query = $this->db->query("SELECT `vut`.`id_usuario` as id, `vut`.`nome_usuario` as name, `vut`.`id_empresa`, `vut`.`nome_cargo`, `vut`.`image`, `vut`.`email`,`vut`.`id_time`,`vut`.`nome_unidade` as team FROM (`v_usuariosTime` vut)
			JOIN `ttl_time_usuario` tut ON `tut`.`id_usuario`=$id_usuario JOIN `ttl_empresa_times` tt ON `tt`.`id_time` = `tut`.`id_empresa_time` AND ativo=1 WHERE `vut`.`id_time` = tt.id_time GROUP BY vut.id_usuario");

	    	$results =  $query->result_array();
	    	if(!empty($results)){
				foreach($results as $index=>$result){
					$results[$index]['last_evalutions'] = $this->get_last_evaluations_of_cycle_review_time($result['id']);
				}
			}
			return $results;
	    }

	    public function get_last_evaluations_of_cycle_review_time($id_usuario)
	    {

	    	$this->db->select("tpa.id_protocolo_avaliacao as id, tpa.id_ciclo,tpa.performance,tpa.valores,tpa.comportamento,tpa.competencias,tpa.desempenho, tpa.potencial, tpa.geral, tpa.data_atualizacao as datadeatualizacao,tc.id_janela,tc.nome_ciclo,tc.id_ciclo,tw.descricao as year");
			$this->db->from($this->tableProtocoloAvaliacao.' tpa');
			$this->db->join($this->tableCycle . ' tc', 'tc.id_ciclo = tpa.id_ciclo', 'left');
			$this->db->join($this->tableWindow . ' tw', 'tw.id_janela = tc.id_janela', 'left');
	    	$this->db->where('tpa.id_usuario', $id_usuario);
	    	$this->db->order_by('tpa.id_ciclo ASC');
	    	$this->db->limit(4);
	    	$query = $this->db->get();
	    	//$this->PQUERY();
	    	//print_r($query->result_array());die;
	    	return $query->result_array();

	    }

		public function get_last_evaluations($id_usuario)
	    {

	    	$this->db->select("id_protocolo_avaliacao, id_ciclo, janela as year, nome_ciclo as cycle, performance, potencial, geral as desempenho, data_atualizacao as datadeatualizacao");
	    	$this->db->from($this->viewAvaliacoes);

	    	$this->db->where('id_usuario', $id_usuario);
	    	$this->db->order_by('id_ciclo ASC');
	    	$this->db->limit(4);
	    	$query = $this->db->get();
	    	return $query->result_array();

	    }

	    public function get_user_skills($id_usuario,$id_protocolo_avaliacao)
	    {
	    	$this->db->select("tc.nome_competencia as name, tc.descricao as description, tc.id_competencia, tpac.avaliacao");
	    	$this->db->from($this->tableCargoCompetencias.' tcc');
			$this->db->join($this->tableCompetencias . ' tc', 'tc.id_competencia = tcc.id_competencia', 'inner');
			$this->db->join($this->tableUser . ' us', 'us.id_cargo = tcc.id_cargo', 'inner');

			$this->db->join($this->tableProtocoloAvaliacaoCompetencias . ' tpac', 'tc.id_competencia = tpac.id_competencia AND tpac.id_protocolo_avaliacao='.$id_protocolo_avaliacao, 'LEFT');
	    	$this->db->where('tc.ativo', 1);
	    	$this->db->where('us.id_usuario', $id_usuario);
	    	$query = $this->db->get();
			return $query->result_array();
	    }
	    public function get_user_valores_review($id_usuario, $id_protocolo_avaliacao, $id_empresa)
	    {
	    	$this->db->select("tv.id_valores as id,tv.nome_valor as name,tpac.avaliacao");
	    	$this->db->from($this->tableValores.' tv');

			$this->db->join($this->tableProtocoloAvaliacaoValores . ' tpac', 'tv.id_valores = tpac.id_valores AND tpac.id_protocolo_avaliacao='.$id_protocolo_avaliacao, 'left');
	    	$this->db->where('tv.ativo', 1);
	    	$this->db->where('tv.id_empresa', $id_empresa);
	    	$query = $this->db->get();
			return $query->result_array();


	    }
	    public function get_user_skills_for_review($id_usuario, $id_protocolo_avaliacao)
	    {
	    	$this->db->select("tc.nome_competencia as name, tc.descricao as description, tc.id_competencia, tpac.avaliacao");
	    	$this->db->from($this->tableCargoCompetencias.' tcc');
			$this->db->join($this->tableCompetencias . ' tc', 'tc.id_competencia = tcc.id_competencia', 'inner');
			$this->db->join($this->tableUser . ' us', 'us.id_cargo = tcc.id_cargo', 'inner');

			$this->db->join($this->tableProtocoloAvaliacaoCompetencias . ' tpac', 'tc.id_competencia = tpac.id_competencia AND tpac.id_protocolo_avaliacao='.$id_usuario, 'left');
	    	$this->db->where('tc.ativo', 1);
	    	$this->db->where('us.id_usuario', $id_usuario);
	    	$query = $this->db->get();
			return $query->result_array();


	    }
		// get all cargo by company id
		public function get_cargos($id_empresa)
	    {
	    	$this->db->select("tc.nome_cargo as name, tc.id_cargo as id");
	    	$this->db->from($this->tableCargos.' tc');
	    	$this->db->where('tc.ativo', 1);
	    	$this->db->where('tc.id_empresa', $id_empresa);
	    	$query = $this->db->get();
			return $query->result_array();


	    }

		// get cargo id by name if not exist create and return
		public function get_cargo_id($id_empresa, $nome_cargo, $id_usuario)
	    {
			$this->db->trans_start();
	    	$this->db->where('id_empresa',$id_empresa);
			$this->db->where('nome_cargo',$nome_cargo);
			$query = $this->db->get($this->tableCargos);

			if ( $query->num_rows() > 0 ) {
				$response 	=	$query->result_array();
				return $response[0]['id_cargo'];
			} else {
				$this->db->insert($this->tableCargos, array(
						'nome_cargo'=>$nome_cargo,
						'descricao_cargo'=>$nome_cargo,
						'id_empresa'=>$id_empresa,
						'usuario_atualizador'=>$id_usuario,
					)
				);
				$insert_id 	=	$this->db->insert_id();
			}

			$result = $this->db->trans_status();
			$this->db->trans_complete();
	    	return $insert_id;
	    }

		public function get_user_pdi($id_usuario, $id_ciclo)
	    {

	    	$this->db->select("desempenho, potencial, nine_box");
	    	$this->db->from($this->tableProtocoloAvaliacao);
			$this->db->where('id_usuario', $id_usuario);
			$this->db->where('id_ciclo', $id_usuario);
	    	$query = $this->db->get();
	    	return $query->row();
	    }

		public function save_new_performance($id_usuario=null, $new_percentages=array(), $id_selectedCycle=null , $id_protocolo_avaliacao=null)
	    {

	    	$this->db->trans_start();
			if(!empty($new_percentages)){
				foreach($new_percentages as $id_resultado_chave=>$new_percentage){
					$this->db->where('id_resultado_chave',$id_resultado_chave);
					$this->db->update($this->tableResultadoChave, array('progresso_ajustado'=>$new_percentage));
				}
			}
			if($id_usuario!=null && $id_selectedCycle!=null && $id_protocolo_avaliacao!=null){
				$query = "call sp_avaliacao_desempenho(".$id_usuario.", ".$id_selectedCycle.", ".$id_protocolo_avaliacao.");";
				$this->exec_query($query);
			}

	    	$result = $this->db->trans_status();
			$this->db->trans_complete();
	    	return $result;
	    }

		public function save_answers($id_usuario=null, $answers=array(), $id_selectedCycle=null , $id_protocolo_avaliacao=null)
	    {
			$this->db->trans_start();
			if(!empty($answers)){
				foreach($answers as $id_pergunta=>$answer){
					$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
					$this->db->where('id_pergunta',$id_pergunta);
					$query = $this->db->get($this->tableProtocoloAvaliacaoPotencial);

					if ( $query->num_rows() > 0 ) {

						$data	=	array(
										'id_pergunta_resposta'=>$answer['radio'],
										'pergunta_resposta_quali'=>$answer['text'],
										'usuario_atualizador'=>$id_usuario,
									);
						$this->db->where('id_pergunta',$id_pergunta);
						$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
						$this->db->update($this->tableProtocoloAvaliacaoPotencial,$data);
					} else {
						$this->db->insert($this->tableProtocoloAvaliacaoPotencial, array(
								'id_protocolo_avaliacao'=>$id_protocolo_avaliacao,
								'id_pergunta'=>$id_pergunta,
								'id_pergunta_resposta'=>$answer['radio'],
								'pergunta_resposta_quali'=>$answer['text'],
								'usuario_atualizador'=>$id_usuario,
							)
						);
					}
				}
			}

			if($id_usuario!=null && $id_selectedCycle!=null && $id_protocolo_avaliacao!=null){
				$query = "call sp_avaliacao_potencial(".$id_usuario.", ".$id_selectedCycle.", ".$id_protocolo_avaliacao.");";
				$this->exec_query($query);
			}

			$result = $this->db->trans_status();
			$this->db->trans_complete();
			$this->session->unset_userdata('session_avalicao_id');
			$this->session->unset_userdata('session_ciclo_id');
			$this->session->unset_userdata('session_user');
	    	return $result;
	    }

		public function save_skills($id_usuario=null, $skills=array(), $id_selectedCycle=null , $id_protocolo_avaliacao=null)
	    {


			$this->db->trans_start();
			if(!empty($skills)){
				foreach($skills as $id_competencia=>$skill){

					$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
					$this->db->where('id_competencia',$id_competencia);
					$query = $this->db->get($this->tableProtocoloAvaliacaoCompetencias);

					if ( $query->num_rows() > 0 ) {

						$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
						$this->db->where('id_competencia',$id_competencia);
						$this->db->update($this->tableProtocoloAvaliacaoCompetencias, array(
									'avaliacao'=>$skill
								)
							);
					} else {
						$this->db->insert($this->tableProtocoloAvaliacaoCompetencias, array(
								'id_protocolo_avaliacao'=>$id_protocolo_avaliacao,
								'id_competencia'=>$id_competencia,
								'avaliacao'=>$skill,
								'usuario_atualizador'=>$id_usuario,
							)
						);
					}
				}
			}
			if($id_usuario!=null && $id_selectedCycle!=null && $id_protocolo_avaliacao!=null){
				$query = "call sp_nine_box(".$id_usuario.", ".$id_selectedCycle.", ".$id_protocolo_avaliacao.");";
				$this->exec_query($query);
			}
			$result = $this->db->trans_status();
			$this->db->trans_complete();
	    	return $result;
	    }
		public function save_valores_review($id_usuario=null, $valores=array(), $id_selectedCycle=null , $id_protocolo_avaliacao=null)
	    {
			$this->db->trans_start();
			if(!empty($valores)){
				foreach($valores as $id_valore=>$valore){

					$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
					$this->db->where('id_valores',$id_valore);
					$query = $this->db->get($this->tableProtocoloAvaliacaoValores);

					if ( $query->num_rows() > 0 ) {

						$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
						$this->db->where('id_valores',$id_valore);
						$this->db->update($this->tableProtocoloAvaliacaoValores, array(
									'avaliacao'=>$valore
								)
							);
					} else {
						$this->db->insert($this->tableProtocoloAvaliacaoValores, array(
								'id_protocolo_avaliacao'=>$id_protocolo_avaliacao,
								'id_valores'=>$id_valore,
								'avaliacao'=>$valore,
								'usuario_atualizador'=>$id_usuario,
							)
						);
					}
				}
			}
			$result = $this->db->trans_status();
			$this->db->trans_complete();
	    	return $result;
	    }

		public function save_geral($geral=null, $avaliacao_quali=null,$id_protocolo_avaliacao= null)
	    {
			$this->db->trans_start();

			$this->db->where('id_protocolo_avaliacao',$id_protocolo_avaliacao);
			$this->db->update($this->tableProtocoloAvaliacao, array(
						'geral'=>$geral,
						'avaliacao_quali'=>$avaliacao_quali,
					)
				);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
	    	return $result;
	    }

		public function get_user_potential_questions($id_usuario, $id_protocolo_avaliacao, $id_cargo)
	    {
	    	$this->db->select("tp.pergunta, tp.id_pergunta, tpap.id_pergunta_resposta as answered, tpap.pergunta_resposta_quali as pergunta_resposta_quali");
			$this->db->from($this->viewPerguntas." tp");
			$this->db->join($this->tableProtocoloAvaliacaoPotencial.' tpap','tpap.id_pergunta=tp.id_pergunta AND tpap.id_protocolo_avaliacao='.$id_protocolo_avaliacao.' AND tpap.usuario_atualizador='.$id_usuario, 'left');
			$this->db->where('tp.ativo', 1);
			$this->db->where('tp.tipo_questionario', 'P');
			$this->db->where('(tp.id_cargo= '.$id_cargo.' OR tp.id_cargo=0)');
			$query 			= 	$this->db->get();
			$all_questions 	=	$query->result_array();
			if(!empty($all_questions)){
				foreach ($all_questions as &$question){
					$question['answers']	=	$this->get_user_question_answers($question['id_pergunta'], $id_usuario);
				}
			}
	    	return $all_questions;
	    }
	    public function get_user_comencia($id_usuario){
	    	$this->db->select("*");
	    	$this->db->from($this->viewCompetencias);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$this->db->order_by('id_competencia DESC');
	    	$query = $this->db->get();
	    	$all_comencia 	=	$query->result_array();
	    	return $all_comencia;
	    }
	    public function get_users_pdis($id_usuario)
	    {

	    	$this->db->select("*");
	    	$this->db->from($this->viewCompetencias);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$query = $this->db->get();
	    	$all_comencia 	=	$query->result_array();
	    	return $all_comencia;
	    }

	    public function get_my_skills_for_graph($id_usuario)
	    {

	    	$this->db->select("descricao as year, nome_ciclo as name, performance,potencial");
	    	$this->db->from($this->viewAvaliacoes);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$this->db->order_by('id_ciclo', 'ASC');
	    	$query = $this->db->get();
			$result = $query->result_array();

	    	$graph_datax[] 			=	'x';
	    	$graph_dataper[] 		=	'Performance';
	    	$graph_datapot[] 		=	'Potencial';
			if(!empty($result)){
				foreach($result as $row){
					$graph_datax[]		=	$row['year'];
					$graph_dataper[]	=	$row['performance'];
					$graph_datapot[]	=	$row['potencial'];
				}
			}
			return 	array($graph_datax, $graph_dataper, $graph_datapot);
	    }

	    public function get_valores_by_valore_id($id)
	    {

	    	$this->db->select("tv.id_valores as id, tv.id_empresa, tv.nome_valor as name, tv.descricao as description");
	    	$this->db->from($this->tablefeedbackValores.' tfv');
			$this->db->join($this->tableValores . ' tv', 'tfv.id_valores = tv.id_valores', 'inner');
	    	$this->db->where('id_feedback', $id);
	    	$this->db->order_by('tv.id_valores', 'ASC');
	    	$query = $this->db->get();
			return $result = $query->result_array();
	    }

		public function get_skills_by_company_id($id_empresa)
	    {
	    	$this->db->select("id_competencia as id, nome_competencia as name");
	    	$this->db->from($this->tableCompetencias);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$this->db->order_by('nome_competencia', 'ASC');
	    	$query = $this->db->get();
			return $result = $query->result_array();
	    }

		public function add_new_skills_by_company_id($id_usuario, $id_empresa, $skills=array(), $new_gerals=array())
	    {
	    	$this->db->trans_start();
			if(!empty($skills)){
				foreach($skills as $keyname=>$skill){
					$skill	=	trim($skill);

					if($skill!=""){
						$this->db->where('nome_competencia',$skill);
						$this->db->where('id_empresa',$id_empresa);
						$this->db->limit(1);
						$query = $this->db->get($this->tableCompetencias);

						if ( $query->num_rows() < 1 ) {

							$this->db->insert($this->tableCompetencias, array(
									'id_empresa'=>$id_empresa,
									'nome_competencia'=>$skill,
									'descricao'=>'',
									'ativo'=>1,
									'usuario_atualizador'=>$id_usuario,
								)
							);
							$id_competencia 	=	$this->db->insert_id();
							$this->db->insert($this->tableUsuarioCompetencias, array(
									'id_usuario'=>$id_usuario,
									'id_competencia'=>$id_competencia,
									'ativo'=>1,
									'usuario_atualizador'=>$id_usuario,
								)
							);
						} else {

							$skill_data 		=	$query->result_array();
							$id_competencia 	=	$skill_data[0]['id_competencia'];

							$this->db->where('id_competencia',$id_competencia);

							$query = $this->db->get($this->tableUsuarioCompetencias);

							if ( $query->num_rows() < 1 ) {
								$this->db->insert($this->tableUsuarioCompetencias, array(
										'id_usuario'=>$id_usuario,
										'id_competencia'=>$id_competencia,
										'ativo'=>1,
										'usuario_atualizador'=>$id_usuario,
									)
								);
							}
						}
						$this->db->where('id_competencia',$id_competencia);
						$this->db->where('id_usuario',$id_usuario);
						$query = $this->db->get($this->tableUsuarioAvaliacaoCompetencias);

						if ( $query->num_rows() < 1 ) {
							$this->db->insert($this->tableUsuarioAvaliacaoCompetencias, array(
									'id_usuario'=>$id_usuario,
									'id_competencia'=>$id_competencia,
									'avaliacao'=>isset($new_gerals[$keyname])?$new_gerals[$keyname]:'',
									'usuario_atualizador'=>$id_usuario,
								)
							);
						}else{
							$this->db->where('id_competencia',$id_competencia);
							$this->db->where('id_usuario',$id_usuario);
							$this->db->update($this->tableUsuarioAvaliacaoCompetencias, array(
									'id_usuario'=>$id_usuario,
									'id_competencia'=>$id_competencia,
									'avaliacao'=>isset($new_gerals[$keyname])?$new_gerals[$keyname]:'',
								)
							);
						}
					}
				}
			}
			$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

		public function add_new_skills_on_cargo($id_usuario, $id_empresa, $skill)
	    {
	    	$this->db->trans_start();
			$skill	=	trim($skill);
			$id_competencia	=	null;
			if($skill!=""){
				$this->db->where('nome_competencia',$skill);
				$this->db->where('id_empresa',$id_empresa);
				$this->db->limit(1);
				$query = $this->db->get($this->tableCompetencias);

				if ( $query->num_rows() < 1 ) {

					$this->db->insert($this->tableCompetencias, array(
							'id_empresa'=>$id_empresa,
							'nome_competencia'=>$skill,
							'descricao'=>'',
							'ativo'=>1,
							'usuario_atualizador'=>$id_usuario,
						)
					);
					$id_competencia 	=	$this->db->insert_id();
					$this->db->insert($this->tableUsuarioCompetencias, array(
							'id_usuario'=>$id_usuario,
							'id_competencia'=>$id_competencia,
							'ativo'=>1,
							'usuario_atualizador'=>$id_usuario,
						)
					);
				} else {

					$skill_data 		=	$query->result_array();
					$id_competencia 	=	$skill_data[0]['id_competencia'];

					$this->db->where('id_competencia',$id_competencia);

					$query = $this->db->get($this->tableUsuarioCompetencias);

					if ( $query->num_rows() < 1 ) {
						$this->db->insert($this->tableUsuarioCompetencias, array(
								'id_usuario'=>$id_usuario,
								'id_competencia'=>$id_competencia,
								'ativo'=>1,
								'usuario_atualizador'=>$id_usuario,
							)
						);
					}
				}
				$this->db->where('id_competencia',$id_competencia);
				$this->db->where('id_usuario',$id_usuario);
				$query = $this->db->get($this->tableUsuarioAvaliacaoCompetencias);

				if ( $query->num_rows() < 1 ) {
					$this->db->insert($this->tableUsuarioAvaliacaoCompetencias, array(
							'id_usuario'=>$id_usuario,
							'id_competencia'=>$id_competencia,
							'avaliacao'=>null,
							'usuario_atualizador'=>$id_usuario,
						)
					);
				}else{
					$this->db->where('id_competencia',$id_competencia);
					$this->db->where('id_usuario',$id_usuario);
					$this->db->update($this->tableUsuarioAvaliacaoCompetencias, array(
							'id_usuario'=>$id_usuario,
							'id_competencia'=>$id_competencia,
							'avaliacao'=>null,
						)
					);
				}
			}
			$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return array('result'=>$result,'id'=>$id_competencia,'name'=>$skill);
	    }

		public function get_my_objective_for_cycle($id_usuario, $id_ciclo)
	    {

	    	$this->db->select("desempenho, potencial, nine_box");
	    	$this->db->from($this->tableProtocoloAvaliacao);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$this->db->where('id_ciclo', $id_ciclo);
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	    public function get_my_recieved_feedbacks($id_usuario,$start_date=0,$end_date=0)
	    {

	    	$this->db->select("id_feedback as id,usuario_atualizador as user, resposta as response, tf.data_atualizacao, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.usuario_atualizador', 'left');
	    	$this->db->where('tf.id_usuario_destino', $id_usuario);
			$this->db->where('tf.resposta IS NOT NULL');
			$this->db->where('tf.private != 1');
			$this->db->where('tf.desenvolvimento != 1');
			if($start_date != 0 && $end_date !=0){
				$this->db->where('date(tf.data_atualizacao) <=', $start_date);
				$this->db->where('date(tf.data_atualizacao) >=', $end_date);
			}
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	return	$query->result_array();

	    }
	    public function get_my_recieved_private_feedbacks($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,usuario_atualizador as user, resposta as response, tf.data_atualizacao, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy,tf.private as private_notes");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.usuario_atualizador', 'left');
	    	$this->db->where('tf.id_usuario_destino', $id_usuario);
			$this->db->where('tf.resposta IS NOT NULL');
			$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	$public_feedbacks = 	$query->result_array();

	    	$this->db->select("id_feedback as id,usuario_atualizador as user, resposta as response, tf.data_atualizacao, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy,tf.private as private_notes");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.usuario_atualizador', 'left');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
			$this->db->where('tf.private',1);
			$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query2 = $this->db->get();
	    	$private_feedbacks = 	$query2->result_array();
	    	return array_merge($public_feedbacks,$private_feedbacks);

	    }

	    public function get_my_given_feedbacks($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,id_usuario_destino as destino, tf.data_atualizacao,  resposta as response, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy,tf.private as private_notes");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
			$this->db->where('tf.resposta IS NOT null');
			$this->db->where('tf.private != 1');
			$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	    public function get_my_private_notes_profile($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,id_usuario_destino as destino, tf.data_atualizacao,  resposta as response, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
	    	$this->db->where('tf.private', 1);
	    	$this->db->where('tf.desenvolvimento != 1');
			$this->db->where('tf.resposta IS NOT null');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	//$this->PQUERY();
	    	return $query->result_array();
	    }

	     public function get_my_requested_feedbacks($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,id_usuario_destino as destino, tf.data_atualizacao,usuario_atualizador, resposta as response, solicitacao as solicitar, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
			$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'inner');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
	    	$this->db->where('tf.resposta IS null');
	    	$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();

	    	//print_r($this->db->last_query());
	    	return $query->result_array();
	    }
	     public function get_my_requested_feedbacks_by_me($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,id_usuario_destino as destino, tf.data_atualizacao,usuario_atualizador, resposta as response, solicitacao as solicitar, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
			$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->where('tf.id_usuario_destino', $id_usuario);
	    	$this->db->where('tf.resposta IS null');
	    	$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
//            print_r($this->db->last_query());
	    	return $query->result_array();
	    }

	    public function get_my_recieved_feedbacks_public($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,usuario_atualizador as user, resposta as response, tf.data_atualizacao, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.usuario_atualizador', 'left');
	    	$this->db->where('tf.id_usuario_destino', $id_usuario);
			$this->db->where('tf.resposta IS NOT NULL');
			$this->db->where('tf.publico',0);
			$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	return	$query->result_array();

	    }

	    public function get_my_given_feedbacks_public($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,id_usuario_destino as destino, tf.data_atualizacao,  resposta as response, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
	    	$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
			$this->db->where('tf.resposta IS NOT null');
			$this->db->where('tf.publico',0);
			$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	     public function get_my_requested_feedbacks_public($id_usuario)
	    {

	    	$this->db->select("id_feedback as id,id_usuario_destino as destino, tf.data_atualizacao,usuario_atualizador, resposta as response, solicitacao as solicitar, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, tu.id_empresa as id_empresa,tf.publico as privacy");
			$this->db->from($this->tablefeedback." tf");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
	    	$this->db->where('tf.resposta IS null');
	    	$this->db->where('tf.publico',0);
	    	$this->db->where('tf.desenvolvimento != 1');
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	   public function get_my_performance_potential($id_usuario)
	    {

	  $this->db->select("max(id_protocolo_avaliacao), performance, potencial");
	  $this->db->from($this->viewAvaliacoes);
	  $this->db->where('id_usuario', $id_usuario);
	  $this->db->where('performance IS NOT NULL');
	  $this->db->where('potencial IS NOT NULL');
	  $this->db->order_by('id_protocolo_avaliacao', 'DESC');
	  $this->db->limit(1);
	  $query = $this->db->get();

			return $query->result_array();
	  }

		public function get_user_question_answers($id_pergunta, $id_usuario=null)
	    {
	    	$this->db->select("id_pergunta_resposta,id_pergunta,resposta,percentual,ativo,data_atualizacao,usuario_atualizador");
	    	$this->db->from($this->tablePerguntaResposta);
	    	$this->db->where('id_pergunta', $id_pergunta);
	    	$query = $this->db->get();
	    	$result =  $query->result_array();
	    	if(!empty($result)){
	    		foreach ($result as $key => $res) {
	    			$result[$key]['resposta'] = html_entity_decode(strip_tags($res['resposta']));
	    		}
	    	}
	    	return $result;
	    }
	    public function get_users_view_time_by_id($id_usuario=null)
	    {
	    	$this->db->select("*");
	    	$this->db->from($this->viewUsuariosTime);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }


	    //M�todo respons�vel por trazer os detalhes de todos os usu�rios.
	    public function get_users_details_by_id($id)
	    {
	    	$this->db->select(	"tu.id_usuario as id, tu.id_empresa, tu.gerado_integracao, nome_usuario as name, tu.data_aniversario as birthday, tu.normal_user, tu.goal_register, tu.maintenance_user, tu.user_reviewer, tu.id_idioma as id_idioma,tu.id_gestor as id_gestor,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor LIMIT 1)as gestor,tipo_cargo,chk_tipo_cargo,chk_global,access_crossfeeds,
								 url_image as image, email_usuario as email,  nome_unidade as team, tu.id_cargo as id_cargo, nome_cargo as cargo, tut.id_empresa_time as id_time,
								(case when tu.admin = '1' then 'true' else 'false' end) as admin,
								(case when tu.avaliador = '1' then 'true' else 'false' end) as appraiser,
								(case when tu.ativo = '1' then 'true' else 'false' end) as active");
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->join($this->tableUserTeam . ' ute', 'ute.id_usuario = tu.id_usuario', 'left');
	    	$this->db->join($this->tableCargos. ' tc', 'tc.id_cargo = tu.id_cargo', 'left');
	    	$this->db->join($this->tableTeams. ' te', 'ute.id_empresa_time = te.id_time', 'left');
	    	$this->db->join($this->tableUserTeam. ' tut', 'tut.id_usuario = tu.id_usuario', 'left');
	    	$this->db->where("tu.id_usuario = " . $id);
	    	$this->db->group_by("tu.id_usuario");
	    	$query = $this->db->get();

	    	return $query->result_array();

	    }
	    public function get_users_details_by_ids($ids)
	    {
			$id_empresa = 	$this->session->userdata('id_empresa');
	    	$this->db->select(	"tu.id_usuario as id, tu.id_empresa, tu.gerado_integracao, nome_usuario as name, tu.data_aniversario as birthday, tu.normal_user, tu.goal_register, tu.maintenance_user, tu.user_reviewer, tu.id_idioma as id_idioma,tu.id_gestor as id_gestor,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor LIMIT 1)as gestor,tipo_cargo,chk_tipo_cargo,chk_global,
								 url_image as image, email_usuario as email,  nome_unidade as team, tu.id_cargo as id_cargo, nome_cargo as cargo, tut.id_empresa_time as id_time,
								(case when tu.admin = '1' then 'true' else 'false' end) as admin,
								(case when tu.avaliador = '1' then 'true' else 'false' end) as appraiser,
								(case when tu.ativo = '1' then 'true' else 'false' end) as active");
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->join($this->tableUserTeam . ' ute', 'ute.id_usuario = tu.id_usuario', 'left');
	    	$this->db->join($this->tableCargos. ' tc', 'tc.id_cargo = tu.id_cargo', 'left');
	    	$this->db->join($this->tableTeams. ' te', 'ute.id_empresa_time = te.id_time', 'left');
	    	$this->db->join($this->tableUserTeam. ' tut', 'tut.id_usuario = tu.id_usuario', 'left');
	    	$this->db->where("tu.id_empresa",$id_empresa);
	    	$this->db->where_in("tu.id_usuario",$ids);
	    	$this->db->group_by("tu.id_usuario");
	    	$query = $this->db->get();
	    	return $query->result_array();

	    }


	    //M�todo respons�vel por trazer os detalhes de todos os usu�rios.
	    public function get_users_details()
	    {
	    	$this->db->select("tu.id_usuario as id, nome_usuario as name, url_image as image, email_usuario as email,  nome_unidade as team, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active");
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->join($this->tableTeams . ' tet', 'tet.id_empresa = tu.id_empresa', 'left');
	    	$query = $this->db->get();

	    	return $query->result_array();

	    }

	    //M�todo respons�vel por retornar dados do ciclo por ano.
	    public function get_data_cycle($year)
	    {
	    	$this->db->select("id_ciclo as id, nome_ciclo as name");
	    	$query = $this->db->get_where($this->tableCycle, array('year(fim_vigencia)' => $year));
	    	return $query->result_array();

	    }

	    //M�todo respons�vel por retornar dados do ciclo por id janela.
	    public function get_data_cycle_by_id($id)
	    {
	    	$this->db->select("id_ciclo as id, nome_ciclo as name");
	    	$this->db->from($this->tableCycle);
	    	$this->db->where('id_janela', $id);
	    	$this->db->order_by('inicio_vigencia');
	    	$query = $this->db->get();
	    	return $query->result_array();

	    }

	    // USING "checkIntervalCicle"
	    public function get_cycles_by_id_objetivo($id_objetivo)
	    {

	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where('id_objetivo', $id_objetivo);
	    	$query = $this->db->get();
	    	// echo $query = $this->db->last_query();die;
	    	$tmp = $query->result_array();

			if(!empty($tmp)){
				$d_janela = $tmp[0]['id_janela'];
				$this->db->select("id_ciclo as id, nome_ciclo as name, inicio_vigencia, fim_vigencia");
				$this->db->from($this->tableCycle);
				$this->db->where('id_janela', $d_janela);
				$this->db->where('ativo', 1);
				$this->db->order_by('inicio_vigencia');
				$query = $this->db->get();
				return $query->result_array();
			}else{
				return array();
			}
	    }


	    public function get_cycles_by_year($id_empresa, $year)
	    {

	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableWindow);
	    	$this->db->where('YEAR(data_inicial)', $year);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();
	    	$tmp = $query->result_array();


	    	$d_janela = $tmp[0]['id_janela'];

	    	$this->db->select("id_ciclo as id, nome_ciclo as name, inicio_vigencia, fim_vigencia");
	    	$this->db->from($this->tableCycle);
	    	$this->db->where('id_janela', $d_janela);
	    	$this->db->where('ativo', 1);
	    	$this->db->order_by('inicio_vigencia');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }
	    public function get_cycles_by_year_id($id_empresa, $id_janela)
	    {
	    	$this->db->select("id_ciclo as id, nome_ciclo as name, inicio_vigencia, fim_vigencia");
	    	$this->db->from($this->tableCycle);
	    	$this->db->where('id_janela', $id_janela);
	    	$this->db->where('ativo', 1);
	    	$this->db->order_by('inicio_vigencia');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	    public function get_cycles_by_company($id_empresa)
	    {
	    	$this->db->select("*");
	    	$this->db->from($this->tableRevisaoCiclo);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$this->db->where('ativo', 1);
	    	$this->db->order_by('data_inicio');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	    public function get_cycle_id_by_date($id_empresa, $date)
	    {

	    	
	    	$date_array = explode('-',$date);
	    	$year = $date_array[0];
	    	$month = $date_array[1];
	    	$dates = $date_array[2];

	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableWindow);
	    	$this->db->where('YEAR(data_inicial)', $year);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();
	    	$tmp = $query->result_array();	 

	    	$d_janela = $tmp[0]['id_janela'];

	    	$this->db->select("id_ciclo as id, nome_ciclo as name, inicio_vigencia, fim_vigencia");
	    	$this->db->from($this->tableCycle);
	    	$this->db->where('id_janela', $d_janela);
	    	$this->db->where('YEAR(inicio_vigencia) >=', $year);
	    	$this->db->where('MONTH(inicio_vigencia) <=', $month);
	    	$this->db->where('ativo', 1);
	    	$this->db->order_by('id','DESC');
	    	$query = $this->db->get();
	    	return $query->row_array();
	    }

	    public function get_cycles_by_id_objetivo_related($id_objetivo)
	    {

	    	$this->db->select( $this->tableCycle.".id_ciclo as id, nome_ciclo as name, inicio_vigencia, fim_vigencia");
	    	$this->db->from($this->tableCycle);
	    	$this->db->join($this->tableObjCiclo, $this->tableObjCiclo.'.id_ciclo = '.$this->tableCycle.'.id_ciclo', 'inner');
	    	$this->db->where('id_objetivo', $id_objetivo);
	    	$this->db->where('ativo', 1);
	    	$this->db->order_by('inicio_vigencia');
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }
	    public function get_objective_details_by_id($id_objetivo)
	    {

	    	$this->db->select("id_objetivo,responsavel");
	    	$this->db->from($this->tableGoals);
	    	$this->db->where('id_objetivo', $id_objetivo);
	    	$query = $this->db->get();

	    	return $query->row_array();
	    }
	    public function get_shared_teams_by_id_objectivo($id_objetivo)
	    {

	    	$this->db->select("tw.id_time as id,tt.nome_unidade as name");
	    	$this->db->from($this->tableObjetivosRelacionados . " tw");
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = tw.id_time', 'left');

	    	$this->db->where('id_objetivo', $id_objetivo);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }


	    //M�todo respons�vel por coletar dados dos usu�rios por empresa.
	    public function get_year_by_company($id)
	    {

	    	$this->db->select("year(data_final) as year");
	    	$this->db->from($this->tableWindow . " tw");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_empresa = tw.id_empresa', 'inner');
	    	$this->db->where('id_usuario = ' . $id);
	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	$array_retorno['year'] = array();

	    	foreach($result as $item)
	    	{
	    		array_push($array_retorno['year'], $item['year']);
	    	}

	    	$retorno['year'] = array_unique($array_retorno['year']);

	    	return $retorno;

	    }
	    //M�todo respons�vel por coletar dados dos usu�rios por empresa.
	    public function get_year_with_id_by_company($id)
	    {

	    	$this->db->select("id_janela,year(data_final) as year");
	    	$this->db->from($this->tableWindow . " tw");
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_empresa = tw.id_empresa', 'inner');
	    	$this->db->where('id_usuario = ' . $id);
	    	$query = $this->db->get();
	    	$result = $query->result_array();
	    	return $result;

	    }

	    // Metodo retorna a lista de tags relacionadas a uma empresa
	    public function get_all_tags($id_empresa){

	    	$this->db->select("id_etiqueta as id, nome_etiqueta as name");
	    	$this->db->from($this->tableTags);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    // Metodo retorna a lista de tags relacionadas a uma empresa
	    public function get_all_tags_limit($id_objetivo){

	    	$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    	$this->db->from($this->tableTagObj . ' toe');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    	$this->db->where('toe.id_objetivo', $id_objetivo);
	    	$this->db->limit(3);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    //M�todo respons�vel por retornar as detalhes de uma atividade.
	    public function get_details_activities($id){

	    	$this->db->select(
	    			"	id_atividade as id,
						nome as title,
						descricao as description,
						data_ini as init,
						data_fim as end,
						progresso as percentage,
						responsavel as user,
						ativo as ativo,
						parent_id,
						hora as hour"
	    			);
	    	$this->db->from($this->tableActivities);
	    	$this->db->where('id_atividade = ' . $id);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    //M�todo respons�vel por retornar os usu�rios por id de atividade.
	    public function get_users_by_activities($id){

	    	$this->db->select("tu.id_usuario as id, tu.id_empresa, nome_usuario as name, url_image as image");
	    	$this->db->from($this->tableAtvResponsive . ' tar');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tar.id_usuario', 'inner');
	    	$this->db->where('tar.id_atividade = ' . $id);
	    	$query = $this->db->get();
			$users	=	$query->result_array();
			if(!empty($users)){
				foreach($users as &$user){
					$image 				=	$user['image'];
					$user['image']		=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
					$user['xs_image']	=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
					$user['md_image']	=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
				}
			}
	    	return $users;
	    }

	    //M�todo respons�vel por retornar tags atividade por id.
	    public function get_tags_by_activities($id){

	    	$this->db->select("tt.id_etiqueta as id, nome_etiqueta as name");
	    	$this->db->from($this->tableAtvTag . ' tat');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = tat.id_etiqueta', 'inner');
	    	$this->db->where('tat.id_atividade = ' . $id);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    //M�todo respons�vel por retornar todos os times.
	    public function get_all_teams($id_empresa){

	    	$this->db->select("id_time as id,  parent_id, nome_unidade as name");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_comptencia_by_id_emperssa($id_empresa){

	    	$this->db->select("id_competencia as id,nome_competencia as name");
	    	$this->db->from($this->tableCompetencias);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

        public function get_questionario_by_id_emperssa($id_empresa, $typeFilter = null, $onlyAtivos = true){

            $this->db->select("id_questionarios as id,id_empresa,nome_questionario as name, tipo_questionario, ativo");
            $this->db->from($this->tableQuestionario);
            // use $typeFilter = p to load just the Potential questionaries
            if ($typeFilter) $this->db->where('tipo_questionario', $typeFilter);

            if ($onlyAtivos) $this->db->where('ativo',1);
            $this->db->where('id_empresa', $id_empresa);

            $this->db->order_by("ativo desc, id_questionarios asc");
            $query = $this->db->get();

            return $query->result_array();
        }

        public function remove_questionario($id){

            $this->db->trans_start();

            $this->exec_delete_query("DELETE FROM ".$this->tableQuestionario." WHERE id_questionarios = ".$id);

            $result = $this->db->trans_status();
            $this->db->trans_complete();
            return $result;
        }

        public function add_update_questionario($data)
        {
        	if($data['tipo_questionario'] == 'c' && $data['ativo'] == 1){
        		$total_found = $this->count_result_by_type_questionerio('c');

        		if($total_found > 0){
		            $data['ativo'] = 0;
        			if (isset($data['id_questionarios']) && $data['id_questionarios'] > 0) {
        				$active_status = $this->get_status_by_id_questionerio($data['id_questionarios']);
        				if($total_found > 0 && $active_status == 1){
        					$data['ativo'] = 1;
        					$return_error = '';
        				}else{
        					$data['ativo'] = 0;
        					$return_error = 'Only one Checkin questionary must be active, please inactive other and then active this';
        				}
                $this->db->update($this->tableQuestionario, $data, 'id_questionarios = ' . $data['id_questionarios']);

	                $return = $data['id_questionarios'];

		            }
		            else {
		            	$return_error = 'Only one Checkin questionary must be active, please inactive other and then active this';
		                $this->db->insert($this->tableQuestionario, $data);
		                $return = $this->db->insert_id();
		            }
        		}else{
	                if (isset($data['id_questionarios']) && $data['id_questionarios'] > 0) {
                $this->db->update($this->tableQuestionario, $data, 'id_questionarios = ' . $data['id_questionarios']);

	                $return = $data['id_questionarios'];
	                $return_error = '';
		            }

		            else {
		                $this->db->insert($this->tableQuestionario, $data);
		                $return = $this->db->insert_id();
		                $return_error = '';
		            }
        		}
        	}else if($data['tipo_questionario'] == 'b' && $data['ativo'] == 1){
        		$total_found = $this->count_result_by_type_questionerio('b');
        		if($total_found > 0){
		            $data['ativo'] = 0;
        			if (isset($data['id_questionarios']) && $data['id_questionarios'] > 0) {
        				$active_status = $this->get_status_by_id_questionerio($data['id_questionarios']);
        				if($total_found > 0 && $active_status == 1){
        					$data['ativo'] = 1;
        					$return_error = '';
        				}else{
        					$data['ativo'] = 0;
        					$return_error = 'Only one development questionary must be active, please inactive other and then active this';
        				}
                $this->db->update($this->tableQuestionario, $data, 'id_questionarios = ' . $data['id_questionarios']);

	                $return = $data['id_questionarios'];

		            }
		            else {
		            	$return_error = 'Only one development questionary must be active, please inactive other and then active this';
		                $this->db->insert($this->tableQuestionario, $data);
		                $return = $this->db->insert_id();
		            }

        		}else{
	                if (isset($data['id_questionarios']) && $data['id_questionarios'] > 0) {
                $this->db->update($this->tableQuestionario, $data, 'id_questionarios = ' . $data['id_questionarios']);

	                $return = $data['id_questionarios'];
	                $return_error = '';
		            }

		            else {
		                $this->db->insert($this->tableQuestionario, $data);
		                $return = $this->db->insert_id();
		                $return_error = '';
		            }
        		}
        	}else{
        		if (isset($data['id_questionarios']) && $data['id_questionarios'] > 0) {
                $this->db->update($this->tableQuestionario, $data, 'id_questionarios = ' . $data['id_questionarios']);
                $return = $data['id_questionarios'];
	            }
	            else {
	                $this->db->insert($this->tableQuestionario, $data);
	                $return = $this->db->insert_id();
	                $return_error = '';
	            }
        	}
            return array($return,isset($return_error)?$return_error:'');
        }

        public function count_result_by_type_questionerio($type){
        	$this->db->select('count(id_questionarios) as total');
            $this->db->from($this->tableQuestionario . ' tp');
            $this->db->where(['tp.id_empresa' => $this->session->userdata('id_empresa'),'tipo_questionario'=>$type,'ativo' => 1]);
            $query = $this->db->get();
           // $this->PQUERY();
            $total_rows = $query->row_array();
            return $total_rows['total'];
        }
        public function get_status_by_id_questionerio($id){
        	$this->db->select('ativo as active');
            $this->db->from($this->tableQuestionario . ' tp');
            $this->db->where('id_questionarios',$id);
            $query = $this->db->get();
           // $this->PQUERY();
            $total_rows = $query->row_array();
            return $total_rows['active'];
        }

        public function get_questions_by_questionary_id($id){

            $this->db->select('tp.id_pergunta as id_pergunta, tp.id_empresa as id_empresa, tp.pergunta as pergunta, tp.tipo as tipo, tp.ativo as ativo, tp.escala as escala, tp.id_categoria_pergunta as perguntacat, tp.favorabilidade');
            $this->db->from($this->tablePerguntas . ' tp');
            $this->db->join($this->tableQuestionarioPerguntas . ' tqp', 'tqp.id_pergunta = tp.id_pergunta', 'inner');
            $this->db->join($this->tableQuestionario . ' tq', 'tq.id_questionarios = tqp.id_questionario', 'inner');
            $this->db->where(['tp.ativo' => '1', 'tq.id_questionarios' => $id]);
            $query = $this->db->get();

            $questions = $query->result_array();
            foreach ($questions as $key=>$question){

                $answer = $this->get_answers_by_question_id($question['id_pergunta']);
                if($answer) $questions[$key]['respostas'] = $answer;

            }
            return $questions;
        }

        public function get_answers_by_question_id($id)
        {
            $this->db->select('id_pergunta_resposta, id_pergunta, resposta as texto, percentual, ativo');
            $this->db->from($this->tablePerguntaResposta);
            $this->db->where("id_pergunta", $id);
            $query = $this->db->get();

            return $query->result_array();
        }


        public function add_update_question($data, $idQuestionario)
        {
            if (!array_key_exists("id_pergunta", $data)) $data['id_pergunta'] = NULL;
            if (!array_key_exists("id_empresa", $data)) $data['id_empresa'] = NULL;
            if (!array_key_exists("id_cargo", $data)) $data['id_cargo'] = NULL;
            if (!array_key_exists("pergunta", $data)) $data['pergunta'] = NULL;
            if (!array_key_exists("natureza", $data)) $data['natureza'] = NULL;
            if (!array_key_exists("tipo", $data)) $data['tipo'] = NULL;
            if (!array_key_exists("ordem", $data)) $data['ordem'] = NULL;
            if (!array_key_exists("ativo", $data)) $data['ativo'] = NULL;
            if (!array_key_exists("escala", $data)) $data['escala'] = 5;
            if (!array_key_exists("usuario_atualizador", $data)) $data['usuario_atualizador'] = NULL;

//            $sql = "REPLACE INTO ".$this->tablePerguntas." (id_pergunta, id_empresa, id_cargo, pergunta, natureza, tipo, ordem, ativo, usuario_atualizador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
//            $query = $this->db->query($sql, array($data['id_pergunta'], $data['id_empresa'], $data['id_cargo'], $data['pergunta'] , $data['natureza'] , $data['tipo'] , $data['ordem'] , $data['ativo'] , $data['usuario_atualizador']) );
//            return $query;

            $this->db->set('id_empresa', $data['id_empresa']);
            $this->db->set('id_cargo', $data['id_cargo']);
            $this->db->set('pergunta', $data['pergunta']);
            $this->db->set('natureza', $data['natureza']);
            $this->db->set('tipo', $data['tipo']);
            $this->db->set('ordem', $data['ordem']);
            $this->db->set('ativo', $data['ativo']);
            $this->db->set('escala', $data['escala']);
            $this->db->set('usuario_atualizador', $data['usuario_atualizador']);
            $this->db->set('id_categoria_pergunta', $data['id_categoria_pergunta']);
            $this->db->set('favorabilidade', $data['favorabilidade']);
            if ($data['id_pergunta']) {
                $this->db->where('id_pergunta', $data['id_pergunta']);
                $query = $this->db->update($this->tablePerguntas);

                // se tiver o ativo = 0 é por que foi remoção
                if ($data['ativo'] == 0) {
                    $this->db->set('ativo', 0);
                    $this->db->where(["id_questionario" => $idQuestionario, 'id_pergunta' => $data['id_pergunta']]);
                    $this->db->update($this->tableQuestionarioPerguntas);
                }

            } else {
                $query = $this->db->insert($this->tablePerguntas);

                // se está sendo inserido uma pergunta, então ela ainda não tem vinculação
                // e deve ser criada a vinculação na tabela ttl_questionario_perguntas
                $insertedId = $this->db->insert_id();
                $this->db->set('id_pergunta', $insertedId);
                $this->db->set('id_questionario', $idQuestionario);
                $this->db->set('usuario_atualizador', $data['usuario_atualizador']);
                $query2 = $this->db->insert($this->tableQuestionarioPerguntas);
            }

            $data['id_pergunta'] = (isset($insertedId)? $insertedId: $data['id_pergunta']);

            if(isset($data['respostas']))
            {
                foreach( $data['respostas'] as $resposta){
                    $this->add_update_answer($resposta , $data, $data['usuario_atualizador']);
                }
            }
            return $query;

        }

        public function add_update_answer($answer, $question, $user){

	    	$this->db->escape_str("utf8");
            $this->db->set('id_pergunta', $question['id_pergunta']);
            $this->db->set('percentual', $answer['percentual']);
            $this->db->set('resposta', $answer['texto']);
            $this->db->set('ativo', (isset($answer['ativo'])?$answer['ativo']:1));
            $this->db->set('usuario_atualizador', $user);
            if (isset($answer['id_pergunta_resposta'])) {
                $this->db->where('id_pergunta_resposta', $answer['id_pergunta_resposta']);
                $query = $this->db->update($this->tablePerguntaResposta);
            }else{
                $query = $this->db->insert($this->tablePerguntaResposta);
            }
            return $query;
        }


        public function get_cargo_by_id_emperssa($id_empresa){

	    	$this->db->select("tc.id_cargo as id,tc.id_empresa,tc.id_cargo,tc.nome_cargo as name,tc.critico as position,tc.tempo_prench_vaga as completion_time,tc.data_atualizacao as date_update,tc.usuario_atualizador as authorised,tc.ativo as active,descricao_cargo as description");
	    	$this->db->from($this->tableCargos . ' tc');
	    	$this->db->where('tc.id_empresa', $id_empresa);
	    	$this->db->order_by('tc.id_cargo', 'DESC');
	    	$query = $this->db->get();
			$cargos	=	$query->result_array();
			if(!empty($cargos)){
				foreach($cargos as &$cargo){
					$cargo['teams']	=	$this->get_all_teams_by_cargo($cargo['id']);
				}
			}
	    	return $cargos;
	    }

	    public function add_category($data)
        {
        	$this->db->trans_start();
        	$this->db->insert($this->tableCategoryPergunta, $data);
        	$result = $this->db->trans_status();
        	$this->db->trans_complete();
            return $result;
        }

	    public function get_integration_by_id_emperssa($id_empresa){

	    	$this->db->select("ti.id_integracoes as id,ti.nome as name,ti.ativo as active");
	    	$this->db->from($this->tableIntegraions . ' ti');
	    	$this->db->where('ti.id_empresa', $id_empresa);
	    	$this->db->order_by('ti.id_integracoes', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();

	    	return $result;
	    }
	    public function get_integration_by_type($id_empresa,$type){

	    	$this->db->select("ti.id_integracoes as id,ti.nome as name,ti.ativo as active");
	    	$this->db->from($this->tableIntegraions . ' ti');
	    	$this->db->where('ti.id_empresa', $id_empresa);
	    	$this->db->where('ti.ativo', 1);
	    	$this->db->where('ti.tipo', $type);
	    	$this->db->order_by('ti.id_integracoes', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();

	    	return $result;
	    }

	    public function get_carreer_by_id_usuario($id_usuario,$crossfeed_status = '', $crossfeed_time = '', $crossfeed_type = ''){
	    	$this->db->select("tf.id_feedback,tf.resposta,tf.prazo,tf.situacao,tf.data_atualizacao as posted_date,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tu.email_usuario as email,tf.situacao as situation,vut.nome_unidade as team,(select nome_usuario from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user,(select url_image from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_image,(select id_empresa from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_id_empresa");
	    	$this->db->from($this->tablefeedback . ' tf');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->join($this->viewUsuariosTime . ' vut', 'vut.id_usuario = tu.id_usuario', 'left');
	    	$this->db->where('tf.usuario_atualizador', $id_usuario);
	    	$this->db->where('tf.desenvolvimento', 1);
	    	if($crossfeed_status != ''){
	    		if($crossfeed_status == 'finalizado'){
					$this->db->where('tf.situacao', 1);
				}
				if($crossfeed_status == 'expirado'){
					$todays_date 	= date('Y-m-d');
					$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") <=', $todays_date);
					$this->db->where('tf.situacao', 0);
				}
				if($crossfeed_status == 'aguardando'){
					$todays_date 	= date('Y-m-d');
					$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
					$this->db->where('tf.situacao', 0);
				}
				if($crossfeed_status == 'declined'){
					$todays_date 	= date('Y-m-d');
					$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
					$this->db->where('tf.situacao', 5);
				}
	    	}
	    	if($crossfeed_time != ''){
	    		if($crossfeed_time == 'last_month'){
					$start_date = date('Y-m-01',strtotime('last month'));
					$end_date 	= date('Y-m-t',strtotime('last month'));
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_date);
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_date);
				}
				if($crossfeed_time == 'last_week'){
					$previous_week = strtotime("-1 week +1 day");
					$start_week = strtotime("last sunday midnight",$previous_week);
					$end_week = strtotime("next saturday",$start_week);

					$start_week = date("Y-m-d",$start_week);
					$end_week = date("Y-m-d",$end_week);
					
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_week);
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_week);
				}
				if($crossfeed_time == 'current_quarter'){
					$quarter = $this->get_current_quarter_dates();
					
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $quarter[0]);
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $quarter[1]);
				}
	    	}

	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();
			if(!empty($result)){
				foreach($result as &$user){
					$limit_date 	= strtotime($user['prazo']);
					$current_date 	= strtotime(date('Y-m-d H:i:s'));
					$user['feedback_type'] 		= 	'sent';
					if($current_date > $limit_date){
						$user['expired'] 		= 	true;
					}else{
						$user['expired'] 		= 	false;
					}
					if(!empty($user['image'])){
						$image_name 			=	$user['image'];
						$from_user_image_name 			=	$user['from_user_image'];
						$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image_name;
						$user['from_user_image'] 		= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/'.$from_user_image_name;
						$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image_name;
						$user['from_user_xs_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/50/'.$from_user_image_name;
						$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image_name;
						$user['from_user_md_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/150/'.$from_user_image_name;
					}else{
						$user['from_user_image'] 		= 	null;
						$user['image'] 		= 	null;
						$user['from_user_xs_image'] 	= 	null;
						$user['xs_image'] 	= 	null;
						$user['from_user_md_image'] 	= 	null;
						$user['md_image'] 	= 	null;
					}
				}
			}
	    	return $result;
	    }
	    
	    public function get_current_quarter_dates(){
			$curQuarter = ceil(date("m")/3);
			$year		=	date("Y");
			$firstDay	=	"01";
			$month_start = ($curQuarter*3)-2;
			if($month_start <= 9){
				$month_start = '0'.$month_start;
			}
			$startDate 	= 	$year."-".$month_start.'-'.$firstDay;
			
			$end_month = $curQuarter*3;
			if($end_month <= 9){
				$end_month = '0'.$end_month;
			}
			$endDate = date("Y") . "-" . $end_month . "-31";
			
			return array($startDate,$endDate);
		}

	    public function get_received_carreer_by_id_usuario($id_usuario,$crossfeed_status = '', $crossfeed_time = '', $crossfeed_type = ''){

	    	$this->db->select("tf.id_feedback,tf.resposta,tf.prazo,tf.situacao,tf.data_atualizacao as posted_date,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tu.email_usuario as email,tf.situacao as situation,vut.nome_unidade as team,(select nome_usuario from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user,(select url_image from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_image,(select id_empresa from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_id_empresa");
	    	$this->db->from($this->tablefeedback . ' tf');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
	    	$this->db->join($this->viewUsuariosTime . ' vut', 'vut.id_usuario = tu.id_usuario', 'left');
	    	$this->db->where('tf.id_usuario_destino', $id_usuario);
	    	$this->db->where('tf.desenvolvimento', 1);
	    	
	    	if($crossfeed_status != ''){
	    		if($crossfeed_status == 'finalizado'){
					$this->db->where('tf.situacao', 1);
				}
				if($crossfeed_status == 'expirado'){
					$todays_date 	= date('Y-m-d');
					$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") <=', $todays_date);
					$this->db->where('tf.situacao', 0);
				}
				if($crossfeed_status == 'aguardando'){
					$todays_date 	= date('Y-m-d');
					$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
					$this->db->where('tf.situacao', 0);
				}
				if($crossfeed_status == 'declined'){
					$todays_date 	= date('Y-m-d');
					$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
					$this->db->where('tf.situacao', 5);
				}
	    	}
	    	if($crossfeed_time != ''){
	    		if($crossfeed_time == 'last_month'){
					$start_date = date('Y-m-01',strtotime('last month'));
					$end_date 	= date('Y-m-t',strtotime('last month'));
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_date);
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_date);
				}
				if($crossfeed_time == 'last_week'){
					$previous_week = strtotime("-1 week +1 day");
					$start_week = strtotime("last sunday midnight",$previous_week);
					$end_week = strtotime("next saturday",$start_week);

					$start_week = date("Y-m-d",$start_week);
					$end_week = date("Y-m-d",$end_week);
					
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_week);
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_week);
				}
				if($crossfeed_time == 'current_quarter'){
					$quarter = $this->get_current_quarter_dates();
					
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $quarter[0]);
					$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $quarter[1]);
				}
	    	}
	    	$this->db->order_by('tf.id_feedback', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();
			if(!empty($result)){
				foreach($result as &$user){
					$limit_date 	= strtotime($user['prazo']);
					$current_date 	= strtotime(date('Y-m-d H:i:s'));
					$user['feedback_type'] 		= 	'received';
					if($current_date > $limit_date){
						$user['expired'] 		= 	true;
					}else{
						$user['expired'] 		= 	false;
					}
					if(!empty($user['image'])){
						$image_name 			=	$user['image'];
						$from_user_image_name 			=	$user['from_user_image'];
						$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image_name;
						$user['from_user_image'] 		= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/'.$from_user_image_name;
						$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image_name;
						$user['from_user_xs_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/50/'.$from_user_image_name;
						$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image_name;
						$user['from_user_md_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/150/'.$from_user_image_name;
					}else{
						$user['from_user_image'] 		= 	null;
						$user['image'] 		= 	null;
						$user['from_user_xs_image'] 	= 	null;
						$user['xs_image'] 	= 	null;
						$user['from_user_md_image'] 	= 	null;
						$user['md_image'] 	= 	null;
					}
				}
			}

	    	return $result;
	    }

	    public function get_dp_objectivos_by_id_usuario($id_usuario,$status = array(),$objective_time = array()){
	    	// echo '<pre>';
	    	// print_r($status);die;
	    	$this->db->select("tf.id_dp_objetivo,tf.nome_dp_objetivo,tf.situacao,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tf.data_limite as date_limit,tf.id_cargo");
	    	$this->db->from($this->tableDpObjetivo . ' tf');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_responsavel', 'left');
	    	if($id_usuario != 0){
	    		$this->db->where('tf.id_responsavel', $id_usuario);
	    	}
	    	if(!empty($status)){
	    		$this->db->where_in('tf.situacao', $status);
	    	}
	    	if($objective_time != ''){
	    		$objective_time = $objective_time[0];
		    		if($objective_time == 'last_month'){
						$start_date = date('Y-m-01',strtotime('last month'));
						$end_date 	= date('Y-m-t',strtotime('last month'));
						$this->db->where('DATE_FORMAT(data_limite, "%Y-%m-%d") >=', $start_date);
						$this->db->where('DATE_FORMAT(data_limite, "%Y-%m-%d") <=', $end_date);
					}
					if($objective_time == 'last_week'){
						$previous_week = strtotime("-1 week +1 day");
						$start_week = strtotime("last sunday midnight",$previous_week);
						$end_week = strtotime("next saturday",$start_week);

						$start_week = date("Y-m-d",$start_week);
						$end_week = date("Y-m-d",$end_week);
						
						$this->db->where('DATE_FORMAT(data_limite, "%Y-%m-%d") >=', $start_week);
						$this->db->where('DATE_FORMAT(data_limite, "%Y-%m-%d") <=', $end_week);
					}
					if($objective_time == 'current_quarter'){
						$quarter = $this->get_current_quarter_dates();
						
						$this->db->where('DATE_FORMAT(data_limite, "%Y-%m-%d") >=', $quarter[0]);
						$this->db->where('DATE_FORMAT(data_limite, "%Y-%m-%d") <=', $quarter[1]);
					}
		    	}
	    	
	    	$this->db->order_by('tf.id_dp_objetivo', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();

			if(!empty($result)){
				foreach($result as &$user){
					$user['date_limit'] = date('d/m/Y',strtotime($user['date_limit']));
					$user['cargos'] = $this->get_cargo_details_by_id($user['id_cargo']);
					if(!empty($user['image'])){
						$image_name 			=	$user['image'];
						$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image_name;
						$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image_name;
						$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image_name;
					}else{
						$user['image'] 		= 	null;
						$user['xs_image'] 	= 	null;
						$user['md_image'] 	= 	null;
					}
				}
			}
			if(!empty($result)){
				foreach ($result as $key => $objecive) {
					$result[$key]['meta'] = $this->get_dp_meta_by_objId($objecive['id_dp_objetivo']);
				}
			}
	    	return $result;
	    }
	    public function get_dp_objectivos_detail_by_id($id_dp_objetivo){

	    	$this->db->select("tf.id_dp_objetivo,tf.nome_dp_objetivo,tf.situacao,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tf.data_limite as date_limit,tf.id_cargo");
	    	$this->db->from($this->tableDpObjetivo . ' tf');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_responsavel', 'left');
	    	$this->db->where('tf.id_dp_objetivo', $id_dp_objetivo);
	    	$query = $this->db->get();
			$result	=	$query->row_array();
			if(!empty($result)){
				$result['cargos'] = $this->get_cargo_details_by_id($result['id_cargo']);
				$result['date_limit'] = date('d/m/Y',strtotime($result['date_limit']));
				if(!empty($result['image'])){
					$image_name 			=	$result['image'];
					$result['image'] 		= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$image_name;
					$result['xs_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$image_name;
					$result['md_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$image_name;
				}else{
					$result['image'] 		= 	null;
					$result['xs_image'] 	= 	null;
					$result['md_image'] 	= 	null;
				}
			}
	    	return $result;
	    }

	    public function get_meta_detail_by_id_meta($meta_id,$global_goal_id){

	    	$this->db->select("tf.id_dp_objetivo,tf.nome_dp_objetivo,tf.situacao,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tf.data_limite as date_limit,tf.id_cargo");
	    	$this->db->from($this->tableDpObjetivo . ' tf');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_responsavel', 'left');
	    	$this->db->where('tf.id_dp_objetivo', $global_goal_id);
	    	$query = $this->db->get();
			$result	=	$query->row_array();

			if(!empty($result)){
				$result['meta'] = $this->get_dp_meta_detail_by_id($meta_id);
				$result['date_limit'] = date('d/m/Y',strtotime($result['date_limit']));
				if(!empty($result['image'])){
					$image_name 			=	$result['image'];
					$result['image'] 		= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$image_name;
					$result['xs_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$image_name;
					$result['md_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$image_name;
				}else{
					$result['image'] 		= 	null;
					$result['xs_image'] 	= 	null;
					$result['md_image'] 	= 	null;
				}
			}
	    	return $result;
	    }
		
		public function get_dp_goal_detail_by_id($id_dp_objetivo){

	    	$this->db->select("tf.id_dp_objetivo,tf.nome_dp_objetivo,tf.situacao,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tf.data_limite as date_limit,tf.id_cargo");
	    	$this->db->from($this->tableDpObjetivo . ' tf');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_responsavel', 'left');
	    	$this->db->where('tf.id_dp_objetivo', $id_dp_objetivo);
	    	$this->db->order_by('tf.id_dp_objetivo', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->row_array();
			if(!empty($result)){
				$result['cargos'] = $this->get_cargo_details_by_id($result['id_cargo']);
				$result['date_limit'] = date('d/m/Y',strtotime($result['date_limit']));
				if(!empty($result['image'])){
					$image_name 			=	$result['image'];
					$result['image'] 		= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$image_name;
					$result['xs_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$image_name;
					$result['md_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$image_name;
				}else{
					$result['image'] 		= 	null;
					$result['xs_image'] 	= 	null;
					$result['md_image'] 	= 	null;
				}
				$result['meta'] = $this->get_dp_metas_by_goalid($id_dp_objetivo);
			}
	    	return $result;
	    }
		
		public function get_dp_metas_by_goalid($id_dp_objetivo){

	    	$this->db->select("tf.id_dp_rchave as id,tf.id_dp_objetivo,tf.nome_dp_rchave as name,tf.meta,tf.situacao");
	    	$this->db->from($this->tableDpRchave . ' tf');
	    	$this->db->where('tf.id_dp_objetivo', $id_dp_objetivo);
	    	$this->db->order_by('tf.id_dp_rchave', 'DESC');
	    	$query 	= $this->db->get();
			$result	=	$query->result_array();
			if(!empty($result)){
				foreach ($result as $key => $res) {
					$result[$key]['activities'] = $this->get_dp_activities_by_rchaveId($res['id']);
					$total_activities = count($result[$key]['activities']);
					$active_activities = $this->get_active_dp_ativade_by_objId($res['id']);
					if($total_activities > 0 && $total_activities == $active_activities){
						$this->update_minor_goals_by_id(array('situacao' => 1),$res['id']);
					}
				}
				
			}
	    	return $result;
	    }

	    public function get_dp_meta_detail_by_id($id_dp_rchave){

	    	$this->db->select("tf.id_dp_rchave as id,tf.id_dp_objetivo,tf.nome_dp_rchave as name,tf.meta");
	    	$this->db->from($this->tableDpRchave . ' tf');
	    	$this->db->where('tf.id_dp_rchave', $id_dp_rchave);
	    	$query = $this->db->get();
			$result	=	$query->row_array();
			if(!empty($result)){
				$result['activities'] = $this->get_dp_activities_by_rchaveId($result['id']);
			}
	    	return $result;
	    }

	    public function get_dp_activities_by_rchaveId($id_dp_rchave)
	    {
	    	$this->db->select("id_dp_atividade as id, id_dp_rchave, nome_dp_atividade as name, descricao_dp_atividade as description, DATE(data_inicio) as activity_start , DATE(data_fim) as activity_end,situacao");
	    	$this->db->from($this->tableDpAtividade);
	    	$this->db->where($this->tableDpAtividade.'.id_dp_rchave', $id_dp_rchave);

	    	$query = $this->db->get();

	    	$res = $query->result_array();
	    	if(!empty($res)){
	    		$count = 0;
	    		foreach ($res as $key => $value) {
	    			$res[$key]['activity_start'] = str_replace('-', '/',date("d-m-Y", strtotime($value['activity_start'])));
	    			$res[$key]['activity_end'] = str_replace('-', '/',date("d-m-Y", strtotime($value['activity_end'])));
	    			$res[$key]['index'] = $count;
	    			$count++;
	    		}
	    	}
	    	return $res;

	    }

	    public function get_cargo_details_by_id($id_cargo)
	    {
	    	$this->db->select("id_cargo as id, id_empresa as id_empresa, nome_cargo as name, descricao_cargo as description, critico as critical, tempo_prench_vaga as completion_time, remuneracao_media as media, ativo as active, data_atualizacao as date_update, usuario_atualizador as id_usuario");
	    	$this->db->from($this->tableCargos);
	    	$this->db->where($this->tableCargos.'.id_cargo', $id_cargo);

	    	$query = $this->db->get();

	    	$retorno = $query->result_array();
	    	return $retorno;

	    }

	    public function get_dp_meta_by_objId($id_dp_objetivo){

	    	$this->db->select("tp.id_dp_rchave as id,id_dp_objetivo,nome_dp_rchave as name,meta,data_atualizacao as date_update,situacao");
	    	$this->db->from($this->tableDpRchave . ' tp');
	    	$this->db->where('tp.id_dp_objetivo', $id_dp_objetivo);
	    	$this->db->order_by('tp.id_dp_rchave', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();
			if(!empty($result)){
				foreach ($result as $key => $meta) {
					$result[$key]['activities'] = $this->get_dp_ativade_by_objId($meta['id']);
					$total_activities = count($result[$key]['activities']);
					$active_activities = $this->get_active_dp_ativade_by_objId($meta['id']);
					if($total_activities > 0 && $total_activities == $active_activities){
						$this->update_minor_goals_by_id(array('situacao' => 1),$meta['id']);
						$result[$key]['situacao'] = 1;
					}
				}
			}
			return $result;
		}

		public function get_dp_ativade_by_objId($id_dp_rchave){

	    	$this->db->select("tpa.id_dp_atividade as id,id_dp_rchave,nome_dp_atividade as name,descricao_dp_atividade as description,data_inicio as start,data_fim as end,situacao,usuario_atualizador as authoriser");
	    	$this->db->from($this->tableDpAtividade . ' tpa');
	    	$this->db->where('tpa.id_dp_rchave', $id_dp_rchave);
	    	$this->db->order_by('tpa.id_dp_atividade', 'DESC');
	    	$query = $this->db->get();
			$result	=	$query->result_array();
			return $result;
		}

		public function get_active_dp_ativade_by_objId($id_dp_rchave){

	    	$this->db->select("count(*) as total");
	    	$this->db->from($this->tableDpAtividade . ' tpa');
	    	$this->db->where('tpa.id_dp_rchave', $id_dp_rchave);
	    	$this->db->where('tpa.situacao', 1);
	    	
	    	$query = $this->db->get();
			$result	=	$query->row_array();
			return $result['total'];
		}

		public function get_all_teams_by_cargo($id_cargo){

	    	$this->db->select(
	    			"nome_usuario as name,
	    			id_empresa as id_empresa,
	    			image as image"
	    	);
	    	$this->db->from($this->viewUsuariosTime);
	    	$this->db->where('id_cargo', $id_cargo);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_all_categories($id_empresa){

	    	$this->db->select("*");
	    	$this->db->from($this->tableCategoryPergunta);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_all_teams_no_parent($id_empresa){

	    	$this->db->select(
	    			"id_time as id,
					 parent_id,
					 nome_unidade as name,
					 (case when ativo = '1' then 'true' else 'false' end) as active,
					id_usuario_responsavel"
	    	);
	    	$this->db->from($this->tableTeams);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('id_empresa', $id_empresa);
	    	$this->db->where('( parent_id IS NULL OR parent_id = 0 )');
	    	$query = $this->db->get();

	    	$result = $query->result_array();
	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['id_usuario_responsavel']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
                    $members = $this->get_members_by_team($item['id']);
                    $j = 0;
                    foreach ($members as $member) {
                        $members[$j]["image"] = $member["image"]? (base_url('assets/img') . '/'. $id_empresa .'/'.$member["image"]) : "" ;
                        $j++;
                    }

                    $result[$i]['members'] = $members;

                    unset($result[$i]['id_usuario_responsavel']);
	    			$i++;
	    		}
	    	}
 	    	return $result;
	    }

	    public function get_all_teams_by_parent_id($id_time){

	    	$this->db->select("id_time as id, id_empresa, parent_id, nome_unidade as name, (case when ativo = '1' then 'true' else 'false' end) as active, id_usuario_responsavel");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('parent_id', $id_time);
	    	$query = $this->db->get();

	    	$result = $query->result_array();
	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['id_usuario_responsavel']);
	    			$members = $this->get_members_by_team($item['id']);
	    			$j = 0;
                    foreach ($members as $member) {
                        $members[$j]["image"] = $member["image"]? (base_url('assets/img') . '/'. $item['id_empresa'] .'/'.$member["image"]) : "" ;
                        $j++;
	    			}
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
	    			$result[$i]['members'] = $members;
	    			unset($result[$i]['id_usuario_responsavel']);
	    			$i++;
	    		}
	    	}
	    	return $result;
	    }

	    public function get_all_teams_id_by_id($id_time){

	    	$this->db->select("id_time as id, parent_id");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('parent_id', $id_time);
	    	$query = $this->db->get();

	    	$result = $query->result_array();
	    	$i = 0;

	    	return $result;
	    }


	    public function get_global_goals_by_id($id)
	    {
	    	$this->db->select("id_objetivo as id, parent_id, nome as title,  responsavel as user, percentual as percentage, (case when parent_id is null then 'global' else 'tatic' end) as type ");
	    	$this->db->from($this->tableGoals);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('id_objetivo', $id);
	    	$query = $this->db->get();

	    	$return = $query->result_array();

	    	$userData = $this->get_data_resp($return[0]['user']);
	    	$return[0]['user'] = $userData[0];

	    	return $return;
	    }

	    public function get_all_globals_by_parent_id($id_objetivo){

	    	$this->db->select("id_objetivo as id, parent_id, nome as title, responsavel as user, percentual as percentage,  (case when parent_id is null then 'global' else 'tatic' end) as type ");
	    	$this->db->from($this->tableGoals);
	    	$this->db->where('ativo = 1');
	    	$this->db->where('parent_id', $id_objetivo);
	    	$query = $this->db->get();

	    	$result = $query->result_array();
	    	//$this->debugMark('teste', $result);
	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['user']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';
	    			$i++;
	    		}
	    	}
	    	return $result;
	    }


	    //TODO
	    //M�todo respons�vel por retornar os detalhes dos objetivos globais por tag.
	    public function search_all_global_tatics_tag($tag, $id)
	    {

	    	$this->db->select('too.id_objetivo as id, too.nome as title, percentual as percentage, responsavel');
	    	$this->db->from($this->tableObjetivos . ' too');
	    	$this->db->join($this->tableEtiquetaObj . ' teo', 'teo.id_objetivo = too.id_objetivo', 'inner');
	    	$this->db->join($this->tableEtiquetas . ' te', 'te.id_etiqueta = teo.id_etiqueta', 'inner');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_empresa = te.id_empresa', 'inner');
	    	$this->db->where('te.nome_etiqueta like \'%' . $tag . '%\'');
	    	$this->db->where('tu.id_usuario', $id);
	    	$this->db->where('too.parent_id is null');

	    	$query = $this->db->get();

	    	$retorno = array();
	    	$globalsX = $query->result_array();

	    	if($globalsX != null){

	    		foreach ($globalsX as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);
	    			$value['user'] = $user[0];
	    			array_push($retorno, $value);
	    		}
	    	}

	    	$this->db->select('too.id_objetivo as id, too.nome as title, percentual as percentage, responsavel');
	    	$this->db->from($this->tableObjetivos . ' too');
	    	$this->db->join($this->tableEtiquetaObj . ' teo', 'teo.id_objetivo = too.id_objetivo', 'inner');
	    	$this->db->join($this->tableEtiquetas . ' te', 'te.id_etiqueta = teo.id_etiqueta', 'inner');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_empresa = te.id_empresa', 'inner');
	    	$this->db->where('te.nome_etiqueta like \'%' . $tag . '%\'');
	    	$this->db->where('tu.id_usuario', $id);
	    	$this->db->where('too.parent_id is not null');

	    	$query = $this->db->get();

	    	$retornoTatic = array();
	    	$globalsX = $query->result_array();

	    	if($globalsX != null){

	    		foreach ($globalsX as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);
	    			$value['user'] = $user[0];
	    			array_push($retornoTatic, $value);
	    		}
	    	}


	    	$globals['globals'] = $retorno;
	    	$globals['tatics'] = $retornoTatic;
	    	$globals['keys'] = $this->get_keys_by_tag($tag, $id);
	    	$globals['activities'] = $this->get_keys_by_activity($tag, $id);

	    	return $globals;

	    }

	    public function search_all_global_tatics_key_activities_by_id_responsavel($id_empresa,$id_usuario = 0,$year=0,$id_time=0,$id_cycle=0, $estrategico = null, $situation = null, $type = null, $color = null)
	    {

	    	$this->db->select(	'tw.id_objetivo as id, tw.nome as title, tw.descricao as description, tw.parent_id as parent_id,
								tw.qtd_rchaves as \'keys\', tw.peso as weight, tw.situacao as status, tw.tipo as tipo, tw.cor as color, tw.estrategico as estrategico, tw.usuario_atualizador as authorised, tw.percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								tw.responsavel, tw.id_time, te.id_janela'
	    		);
	    	$this->db->from($this->viewGoals . ' tw');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'left');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'left');
			$this->db->join($this->tableObjetivosRelacionados . ' tc', 'tw.id_objetivo = tc.id_objetivo', 'left');
	    	$this->db->where('tw.id_empresa', $id_empresa);

	    	if($estrategico) $this->db->where('tw.estrategico', $estrategico);
			if($situation and count($situation)>0)	$this->db->where_in('tw.situacao', $situation);
			if($type and count($type)>0)	$this->db->where_in('tw.tipo', $type);
			if($color and $color != '')	$this->db->where_in('tw.cor', $color);

	    	if($id_usuario != 0){
	    		$id_usuario	=	explode(",", $id_usuario);
				$this->db->where_in('tw.responsavel', $id_usuario);
	    	}
	    	if($id_cycle != 0){
	    		$id_cycle	=	explode(",", $id_cycle);
				$this->db->where_in('te.id_ciclo', $id_cycle);
	    	}
	    	
	    	if($year != 0){
	    		$this->db->where('year(te.inicio_vigencia)', $year );
	    	}
			
			if($id_time != 0){
				$this->db->where_not_in('tw.tipo', 'i');
			}
			
	    	if($id_time != 0){
	    		$id_time	=	explode(",", $id_time);
				$this->db->where_in('tw.id_time', $id_time);
				$this->db->or_where_in('tc.id_time',$id_time);
				
	    	}

	  		$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo');

	    	$query = $this->db->get();
			 // $this->PQUERY();

	    	$retorno = array();
	    	$globals = $query->result_array();
	    	$i = 0;
	    	if($globals != null){
	    		foreach ($globals as $value) {
	    			$user = $this->get_data_resp($value['responsavel']);
	    			$id = $value['id'];
	    			array_pop($value);
	    			array_pop($value);
	    			$value['user'] = sizeof($user) > 0 ? $user[0] : array();
	    			array_push($retorno, $value);
	    			$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    			$retorno[$i]['cycles'] = $cycle;
	    			// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    			$this->db->select('tu.id_usuario as id,tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    			$this->db->from($this->tableObjResponsaveis . ' tr');
	    			$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    			$this->db->where('tr.id_objetivo', $id);
	    			$query2 = $this->db->get();
	    			$users	 	= $query2->result_array();
					if(!empty($users)){
						foreach($users as &$auser){
							$image 				=	$auser['image'];
							if($image!=""){
								$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
							}else{
								$auser['image']		=	null;
								$auser['xs_image']	=	null;
								$auser['md_image']	=	null;
							}
						}
						$retorno[$i]['users'] = $users;
					}else{
						$retorno[$i]['users'] = array();
					}

	    			//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    			$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    			$this->db->from($this->tableTagObj . ' toe');
	    			$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    			$this->db->where('toe.id_objetivo', $id);
	    			$query3 = $this->db->get();


	    			$retorno[$i]['tags'] = $query3->result_array();

	    			// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    			$this->db->select('tt.id_time as id, tt.nome_unidade as name');
	    			$this->db->from($this->tableObjetivos . ' toe');
	    			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    			//$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    			$this->db->where('tt.id_time', $globals[$i]['id_time']);
	    			$query4 = $this->db->get();

	    			$team = $query4->result_array();
	    			$retorno[$i]['team'] =  isset($team[0])?$team[0]:[];


	    			// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    			$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,trc.medicao as Medicao,trc.tipo_calculo,trc.direcao,trc.ponto_partida as de,trc.meta_final_prevista as para,trc.medicao as atual, progresso as percentage, peso as weight, data_atualizacao as last_date, responsavel, atraso,usuario_atualizador as auth');
	    			$this->db->from($this->tableResultadoChave . ' trc');
	    			$this->db->where('trc.id_objetivo', $id);
	    			$this->db->where('trc.ativo', 1);
	    			$query5 = $this->db->get();

	    			$keys = $query5->result_array();
	    			$keysReturn = array();


	    			if($keys != null){

	    				foreach ($keys as $ind=>$value) {

	    					$user = $this->get_data_resp($value['responsavel']);

	    					array_pop($value);

	    					$value['user'] = $user[0];
	    					$value['atraso']	=	$keys[$ind]['atraso'];
	    					array_push($keysReturn, $value);

	    				}
	    			}

	    			$retorno[$i]['keys'] = $keysReturn;

	    			if(!empty($keys)){
						foreach($keys as $index=>$key){
							$activities 	= 	$this->get_details_activities_r_key($key['id']);
							if(!empty($activities)){
								foreach($activities as $index2=>$activity){
									$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
								}
							}
							$retorno[$i]['keys'][$index]['activities'] = $activities;
						}
					}
	    			// GET PARENT id, title, type
	    			$this->db->select($this->tableGoals.'.id_objetivo as id, '.$this->tableGoals.'.nome as title, (case when parent_id is null then "global" else "tatic" end) as type  ');
	    			$this->db->from($this->tableGoals);
	    			$this->db->where($this->tableGoals.'.id_objetivo', $globals[0]['parent_id']);
	    			$query6 = $this->db->get();
	    			$resultParent = $query6->result_array();
	    			$retorno[$i]['parent'] = (sizeof($resultParent) > 0 ) ? $resultParent[0] : array();
	    			$i++;
	    		}
	    	}
	    	return $retorno;

	    }

	    public function search_my_all_global_tatics_key_activities_by_id_responsavel($id_empresa,$id_usuario,$year=0,$id_time=0,$id_cycle = 0)
	    {

	    	$this->db->select(	'tw.id_objetivo as id, tw.nome as title, tw.descricao as description, tw.parent_id as parent_id,
								tw.qtd_rchaves as \'keys\', tw.peso as weight, tw.situacao as status, tg.cor as color, tg.usuario_atualizador as authorised, tw.percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								tw.responsavel, tw.id_time, te.id_janela,te.id_ciclo'
	    		);
	    	$this->db->from($this->viewGoals . ' tw');
	    	$this->db->join($this->tableGoals . ' tg', 'tg.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->where('tw.id_empresa', $id_empresa);
	    	if($id_usuario != 0){
	    		$id_usuario	=	explode(",", $id_usuario);
				$this->db->where_in('tg.responsavel', $id_usuario);
	    	}
	    	
	    	if($year != 0){
	    		$this->db->where('year(te.inicio_vigencia)', $year );
	    	}
	    	if($id_time != 0){
	    		$id_time	=	explode(",", $id_time);
				$this->db->where_in('tw.id_time', $id_time);
	    	}
	    	if($id_cycle != 0){
	    		$id_cycle	=	explode(",", $id_cycle);
				$this->db->where_in('te.id_ciclo', $id_cycle);
	    	}
	  		$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo');

	    	$query = $this->db->get();

	    	//$this->PQUERY();

	    	$retorno = array();
	    	$globals = $query->result_array();
	    	$i = 0;



	    	if($globals != null){

	    		foreach ($globals as $value) {


	    			$user = $this->get_data_resp($value['responsavel']);
	    			$id = $value['id'];

	    			array_pop($value);
	    			array_pop($value);

	    			//$this->debugMark('teste', $value);

	    			$value['user'] = sizeof($user) > 0 ? $user[0] : array();

	    			array_push($retorno, $value);


	    			$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    			$retorno[$i]['cycles'] = $cycle;



	    			// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    			$this->db->select('tu.id_usuario as id,tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    			$this->db->from($this->tableObjResponsaveis . ' tr');
	    			$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    			$this->db->where('tr.id_objetivo', $id);
	    			$query2 = $this->db->get();

	    			$users	 	= $query2->result_array();
					if(!empty($users)){
						foreach($users as &$auser){
							$image 				=	$auser['image'];
							if($image!=""){
								$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
							}else{
								$auser['image']		=	null;
								$auser['xs_image']	=	null;
								$auser['md_image']	=	null;
							}
						}
						$retorno[$i]['users'] = $users;
					}else{
						$retorno[$i]['users'] = array();
					}

	    			//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    			$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    			$this->db->from($this->tableTagObj . ' toe');
	    			$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    			$this->db->where('toe.id_objetivo', $id);
	    			$query3 = $this->db->get();


	    			$retorno[$i]['tags'] = $query3->result_array();

	    			// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    			$this->db->select('toe.id_time as id, tt.nome_unidade as name');
	    			$this->db->from($this->tableObjetivos . ' toe');
	    			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    			//$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    			$this->db->where('tt.id_time', $globals[$i]['id_time']);
	    			$query4 = $this->db->get();

	    			$team = $query4->result_array();
	    			$retorno[$i]['team'] =  isset($team[0])?$team[0]:[];


	    			// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    			$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,tipo_calculo,trc.medicao as Medicao,trc.tipo_calculo,trc.direcao,trc.ponto_partida as de,trc.meta_final_prevista as para,trc.medicao as atual, progresso as percentage, peso as weight, data_atualizacao as last_date, responsavel, atraso,usuario_atualizador as auth');
	    			$this->db->from($this->tableResultadoChave . ' trc');
	    			$this->db->where('trc.id_objetivo', $id);
	    			$this->db->where('trc.ativo', 1);
	    			$query5 = $this->db->get();

	    			$keys = $query5->result_array();
	    			$keysReturn = array();


	    			if($keys != null){

	    				foreach ($keys as $ind=>$value) {

	    					$user = $this->get_data_resp($value['responsavel']);

	    					array_pop($value);

	    					$value['user'] = $user[0];
	    					$value['atraso']	=	$keys[$ind]['atraso'];
	    					array_push($keysReturn, $value);

	    				}
	    			}

	    			$retorno[$i]['keys'] = $keysReturn;

	    			if(!empty($keys)){
						foreach($keys as $index=>$key){
							$activities 	= 	$this->get_details_activities_r_key($key['id']);
							if(!empty($activities)){
								foreach($activities as $index2=>$activity){
									$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
								}
							}
							$retorno[$i]['keys'][$index]['activities'] = $activities;
						}
					}
	    			//$retorno[$i]['activities'] = $activities;

	    			// GET PARENT id, title, type
	    			$this->db->select($this->viewGoals.'.id_objetivo as id, '.$this->viewGoals.'.nome as title, (case when parent_id is null then "global" else "tatic" end) as type  ');
	    			$this->db->from($this->viewGoals);
	    			$this->db->where($this->viewGoals.'.id_objetivo', $globals[0]['parent_id']);
	    			$query6 = $this->db->get();
	    			$resultParent = $query6->result_array();

	    			$retorno[$i]['parent'] = (sizeof($resultParent) > 0 ) ? $resultParent[0] : array();
	    			//$this->PQUERY();

	    			$i++;

	    		}
	    	}
	    	return $retorno;

	    }

	    public function search_my_all_activities($id_empresa,$id_usuario=0,$id_time=0, $situation=null)
	    {

	    	$this->db->select("tra.id_rel_obj_atividade as id,(case when tra.ativo_ativ = '1' then 'false' else 'true' end) as active_status, tra.id_atividade as activity_id, tra.id_objetivo, tra.situacao_ativ as status,tra.situacao_ativ, tra.nome_atividade as title, tra.data_ini_ativ as init, tra.data_fim_ativ as end, tra.id_time as teamid,tra.nome_time as team,tra.id_usuario, tra.progresso_ativ as percentage, tra.id_responsavel_ativ as responsavel, tra.nome_tipo_ativ as type, tra.descr_atividade as description,tra.descr_situacao_ativ as situation,tra.nome_empresa,tra.nome_time,tra.nome_usuario,tra.nome_objetivo,tra.data_ini_objetivo,tra.data_fim_objetivo,tra.progresso_objetivo,tra.descricao_objetivo,tra.objetivo_pai,tra.situacao,tra.descr_situacao,tra.descr_avaliacao,tra.nome_RChave,tra.descr_RChave,tra.meta_final_prev_RChave,tra.medicao_RChave,tra.peso_RChave,tra.progresso_RChave,tra.nome_resp_RChave,tra.situacao_RChave,tra.descr_situacao_RChave, tra.responsavel_ativ as resp_name, tra.data_execucao, tra.nome_usuario, tra.percentual_avaliacao, tra.peso, tra.qtd_objetivos, tra.qtd_atividades, tra.qtd_rchaves, tra.publico, tra.situacao, tra.avaliacao, tra.descr_avaliacao, tra.destaque, tra.hora_ativ, tra.corresponsaveis_ativ, tra.data_atualiz_ativ, tra.data_fim_real_ativ,tra.cor as color,(case when ta.atraso = '1' then 'true' else 'false' end) as atraso ,(case when ta.atraso = '1' then 4 else tra.situacao_ativ end) as filter_status,  tra.data_atualiz_obj,tra.ativo,tra.hierarquia_times, tra.corresponsaveis, tra.frequencia_RChave, tra.unidade_meta_RChave, tra.progresso_ajust_RChave, tra.corresponsaveis_RChave, tra.publico_RChave, tra.descr_situacao_RChave, tra.tipo_calculo_RChave, tra.data_atualiz_RChave, tra.ativo_RChave, tra.url_image, tra.id_time_atv, tra.nome_time_atv");
	    	$this->db->from($this->tableRelObjActivities);
	    	$this->db->from($this->tableRelObjActivities . ' tra');
	    	$this->db->join($this->tableActivities . ' ta', 'ta.id_atividade = tra.id_atividade', 'left');
	    	$this->db->where('tra.id_empresa = ' . $id_empresa);

			if($situation and count($situation)>0)	$this->db->where_in('tra.situacao_ativ', $situation);

	    	if($id_usuario != 0){
	    		$id_usuario	=	explode(",", $id_usuario);
				$this->db->where_in('ta.responsavel', $id_usuario);
	    	}

	    	if($id_time != 0){
	    		$id_time	=	explode(",", $id_time);
				$this->db->where_in('ta.id_time', $id_time);
	    	}

	    	$this->db->group_by('tra.id_atividade');

	    	$query = $this->db->get();
	    	$act = $query->result_array();
	    	return $act;
					}

	    function csv_download_my_activities($id_empresa,$id_usuario)
		{
			header('Content-Type: text/csv; charset=utf-8');
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=filename.csv");
			$this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "filename_you_wish.csv";
        $query = "SELECT * FROM ttl_rel_obj_atividade";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
	        //$this->load->dbutil();
	        //$this->load->helper('file');
	        //$this->load->helper('download');
	        //$query = $this->db->query("SELECT * FROM ttl_rel_obj_atividade");
	        //$delimiter = ",";
	        //$newline = "\r\n";
	        //$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	        //force_download('CSV_Report.csv', $data);
		}

	    public function get_global_tatics_hierarchical($id_empresa,$id_usuario = 0,$year=0,$id_time=0,$id_cycle=0, $estrategico = null, $situation = null, $type = null, $color = null)
	    {

	    	$this->db->select(	'tw.id_objetivo as id, tw.nome as title, tw.descricao as description, tw.parent_id as parent_id,
								tw.qtd_rchaves as \'keys\', tw.peso as weight, tw.situacao as status, tg.cor as color, tg.estrategico as estrategico, tg.usuario_atualizador as authorised, tw.percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								tw.responsavel, tw.id_time, te.id_janela'
	    		);
	    	$this->db->from($this->viewGoals . ' tw');
	    	$this->db->join($this->tableGoals . ' tg', 'tg.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->where('tw.id_empresa', $id_empresa);
			$this->db->where('tw.ativo', 1 );
	    	$this->db->where('(tw.parent_id IN (SELECT '.$this->tableGoals.'.id_objetivo FROM '.$this->tableGoals.' WHERE '.$this->tableGoals.'.parent_id IS NULL AND '.$this->tableGoals.'.estrategico=0) OR (tg.estrategico=1 AND tw.parent_id IS NULL))');
	    	
	    	if($estrategico) $this->db->where('tw.estrategico', $estrategico);
			if($situation and count($situation)>0)	$this->db->where_in('tw.situacao', $situation);
			if($type and count($type)>0)	$this->db->where_in('tw.tipo', $type);
			if($color and $color != '')	$this->db->where_in('tw.cor', $color);

	    	if($id_usuario != 0){
	    		$id_usuario	=	explode(",", $id_usuario);
				$this->db->where_in('tg.usuario_atualizador', $id_usuario);
	    	}
	    	
	    	if($id_time != 0){
	    		$id_time	=	explode(",", $id_time);
				$this->db->where_in('tg.id_time', $id_time);
	    	}
	    	if($id_cycle != 0){
	    		$id_cycle	=	explode(",", $id_cycle);
				$this->db->where_in('te.id_ciclo', $id_cycle);
	    	}

	    	if($year != 0){
	    		$this->db->where('year(te.inicio_vigencia)', $year );
	    	}
	 
	  		$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo');
	    	$query = $this->db->get();
	    	$retorno = array();
	    	$globals = $query->result_array();
	    	$i 		= 0;
	    	if($globals != null){

	    		foreach ($globals as $value) {
	    			$user = $this->get_data_resp($value['responsavel']);
	    			$id = $value['id'];

	    			array_pop($value);
	    			array_pop($value);

	    			array_push($retorno, $value);

	    			// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    			$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    			$this->db->from($this->tableObjPesoTime . ' toe');
	    			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    			$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    			$this->db->where('too.id_time', $globals[$i]['id_time']);
	    			$query4 = $this->db->get();

	    			$team = $query4->result_array();
	    			$retorno[$i]['team'] =  $team[0];
	    			$i++;

	    		}
	    	}
	    	return $retorno;

	    }
		public function search_all_global_goals_by_parent_id($parent_id)
		 {
			// GET objectivos with parent_id"
			$this->db->select('tg.id_objetivo as id,tg.parent_id,tg.nome as name,tg.percentual as percentage,tg.id_time as team_id,tt.nome_unidade as team');
			$this->db->from($this->tableGoals . ' tg');
			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = tg.id_time', 'inner');
			$this->db->where('tg.parent_id', $parent_id);
			$goals = $this->db->get();
			$objectives	 	= $goals->result_array();
			return $objectives;
		 }

		 public function get_all_goals_by_parent_id($parent_id){

	    	$this->db->select('tg.id_objetivo as id,tg.responsavel,tg.parent_id,tg.nome as title,tg.percentual as percentage,tg.id_time as team_id,tu.nome_usuario as user,tu.url_image as userimage, tg.estrategico as estrategico');
			$this->db->from($this->tableGoals . ' tg');
			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = tg.id_time', 'left');
			$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tg.responsavel', 'inner');
			$this->db->where('tg.parent_id', $parent_id);
			$this->db->where('tg.ativo', 1 );
	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	return $result;
	    }

		//método responsável pela meu time em perfil
		public function search_my_all_global_tatic_profile($id, $year = null, $id_ciclo = null)
	    {

	    	$this->db->select('too.id_objetivo as id, too.nome as title, percentual as percentage, responsavel');
	    	$this->db->from($this->viewObjetivosTimeUsuario . ' too');

	    	$this->db->where('too.parent_id is not null');
	    	$this->db->where('too.situacao not in(2,4)');
	    	$this->db->where('too.id_usuario = '.$id);
	    	$this->db->where('too.ativo',1);

	    	$query2 = $this->db->get();
	    	$result['tatics'] = $query2->result_array();


	    	return $result;

	    }

	    //método responsável pela meu time em perfil
		public function get_user_profile_by_id($id)
	    {

	    	$this->db->select('tu.id_usuario as id,tu.nome_usuario as name,tu.email_usuario as email,tu.id_empresa as id_empresa, vut.nome_cargo, tu.url_image as image, vut.nome_unidade as time');
	    	$this->db->from($this->tableUser . ' tu');
            $this->db->join($this->viewUsuariosTime . ' vut', 'tu.id_usuario = vut.id_usuario', 'left');

//            $this->db->join($this->tableCargos . ' tc', 'tu.id_cargo = tc.id_cargo', 'LEFT');
	    	$this->db->where('tu.id_usuario = '.$id);

			$query = $this->db->get();
	    	$result = $query->row_array();

            if(!empty($result)){
                if(!empty($result['image'])){
                    $user_image 		=	$result['image'];
                    $result['image'] 		= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$user_image;
                    $result['xs_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$user_image;
                    $result['md_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$user_image;
                }else{
                    $result['image'] 		= 	null;
                    $result['xs_image'] 	= 	null;
                    $result['md_image'] 	= 	null;
                }
            }

            return $result;

	    }

		//
		public function get_activities_for_profile($id, $year = null, $id_ciclo = null)
	    {
	    	$result['keys'] = $this->get_keys_by_id_responsavel($id, $year, $id_ciclo);
	    	$result['activities'] = $this->get_activity_by_resposavel_profile($id);

	    	return $result;

	    }

	    public function get_activities_for_profile_career($id_usuario, $ativade_time,$situacao)
	    {
	    	$this->db->select(' CASE WHEN tar.id_responsavel > 0 THEN "1" ELSE "2" END as coresponsavel', false);
	    	$this->db->select('ta.id_atividade as id, ta.parent_id as tatic_id, ta.id_resultado_chave as key_id, ta.nome as title, ta.descricao as description, ta.progresso as percentage,ta.atraso, ta.responsavel, ta.data_ini as init, ta.data_fim as fim, ta.perfil,ta.situacao', true);
	    	$this->db->from($this->tableActivities . ' ta');
	    	$this->db->join($this->tableResultadoChave, $this->tableResultadoChave.'.id_resultado_chave = ta.id_resultado_chave', 'inner');
			$this->db->join($this->tableAtvResponsive . ' tar',' tar.id_atividade = ta.id_atividade and tar.id_usuario IN ('.$id_usuario.')', 'left');
	    	$this->db->join($this->tableGoals, $this->tableGoals.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');
			
	    	$this->db->where('(ta.responsavel = '.$id_usuario.' or  tar.id_usuario IN ('.$id_usuario.') )');
			
	    	if($ativade_time != ''){
	    		$ativade_time = $ativade_time[0];
		    		if($ativade_time == 'last_month'){
						$start_date = date('Y-m-01',strtotime('last month'));
						$end_date 	= date('Y-m-t',strtotime('last month'));
						$this->db->where('DATE_FORMAT(ta.data_ini, "%Y-%m-%d") >=', $start_date);
						$this->db->where('DATE_FORMAT(ta.data_fim, "%Y-%m-%d") <=', $end_date);
					}
					if($ativade_time == 'last_week'){
						$previous_week = strtotime("-1 week +1 day");
						$start_week = strtotime("last sunday midnight",$previous_week);
						$end_week = strtotime("next saturday",$start_week);

						$start_week = date("Y-m-d",$start_week);
						$end_week = date("Y-m-d",$end_week);
						
						$this->db->where('DATE_FORMAT(ta.data_ini, "%Y-%m-%d") >=', $start_week);
						$this->db->where('DATE_FORMAT(ta.data_fim, "%Y-%m-%d") <=', $end_week);
					}
					if($ativade_time == 'current_quarter'){
						$quarter = $this->get_current_quarter_dates();
						
						$this->db->where('DATE_FORMAT(ta.data_ini, "%Y-%m-%d") >=', $quarter[0]);
						$this->db->where('DATE_FORMAT(ta.data_fim, "%Y-%m-%d") <=', $quarter[1]);
					}
		    	}
	    	if(empty($situacao)){
				$this->db->where_in('ta.situacao', [0,1,2]);
			}else{
				$this->db->where_in('ta.situacao', $situacao);
			}
	    	$this->db->where('ta.ativo', 1);
	    	
	    	$query = $this->db->get();
	    	// echo $this->db->last_query();
	    	$retornoKey = array();
	    	$retornoKey = $query->result_array();
	    	return $retornoKey;

	    }


	    function getRealIpAddr()
		{
		    $ip = file_get_contents('https://api.ipify.org');
		    if(isset($ip) && $ip != ''){
		    	$user_ip  = $ip;
		    }else{
		    	$user_ip  = $_SERVER['REMOTE_ADDR'];
		    }
			$ipInfo = file_get_contents('http://ip-api.com/json/' . $user_ip);
			$ipInfo = json_decode($ipInfo);
			$timezone = $ipInfo->timezone;

			return $timezone;
		}



	    public function get_user_updates_for_profile_section($id_usuario, $limit=4, $start_date= 0, $end_date=0)
	    {
	    	$id_empresa 	= 	$this->session->userdata('id_empresa');
	    	$id_timedata 	= 	$this->get_user_team_by_id($id_usuario);
	    	$id_time 		= 	0;
			if(isset($id_timedata['id_time'])){
				$id_time 	= 	$id_timedata['id_time'];
			}
	    	$this->db->select('id_protocolo_questionario as id,id_questionario as id_questionario,id_usuario as user_id,situacao as situation,data_atualizacao as date_update,publico, (SELECT `atualizacao` from `ttl_empresa_times` WHERE `id_time` = "'.$id_time.'") as atualizacao');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->where('tpq.id_usuario', $id_usuario);
	    	$this->db->where('tpq.tipo', 'C');
			if(isset($start_date) && isset($end_date) && $start_date != 0 && $end_date !=0){
				$this->db->where('DATE(data_atualizacao) <=', $start_date);
				$this->db->where('DATE(data_atualizacao) >=', $end_date);
			}
	    	$this->db->order_by('tpq.id_protocolo_questionario', 'DESC');
				$this->db->limit(1);

	    	$query = $this->db->get();
	    	$result =  $query->result_array();
	    	if(!empty($result)){
				foreach($result as $index=>$checkin){
					$date_update = $result[$index]['date_update'];
					$user_timezone = $this->getRealIpAddr();
					$update_time_gmt = new DateTime($date_update, new DateTimeZone('GMT'));
					$update_time_gmt->setTimezone(new DateTimeZone($user_timezone));
					$result[$index]['date_update']  = 	$update_time_gmt->format('Y-m-d H:i:s');

					$atualizacao = isset($checkin['atualizacao'])?$checkin['atualizacao']:0;
					$half_percent = ($atualizacao)/2;

					$current_date = date('Y-m-d H:i:s');
					$date_update  = $result[$index]['date_update'];

					$date1 = new DateTime($current_date);
					$date2 = new DateTime($date_update);

					$diff = $date2->diff($date1)->format("%a");
					if($diff > $atualizacao){
						$result[$index]['status_update'] = 'red_update';
					}else if($diff >= $half_percent){
						$result[$index]['status_update'] = 'yellow_update';
					}else{
						$result[$index]['status_update'] = 'no_update';
					}
					$result[$index]['unread_comments'] = $this->get_checkin_unread_comments_by_id($checkin['id'],$checkin['user_id']);
					$result[$index]['goals'] 		= $this->get_all_goals_by_update_id($checkin['id'],$checkin['user_id']);
				}
			}
			return $result;
	    }

	    public function get_user_updates_for_profile($id_usuario, $limit=4, $start_date= 0, $end_date=0)
	    {
	    	$id_empresa = $this->session->userdata('id_empresa');
	    	$this->db->select('id_protocolo_questionario as id,id_questionario as id_questionario,id_usuario as user_id,situacao as situation,data_atualizacao as date_update,publico');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->where('tpq.id_usuario', $id_usuario);
	    	$this->db->where('tpq.tipo', 'C');
			if(isset($start_date) && isset($end_date) && $start_date != 0 && $end_date !=0){
				$this->db->where('DATE(data_atualizacao) <=', $start_date);
				$this->db->where('DATE(data_atualizacao) >=', $end_date);
			}
	    	$this->db->order_by('tpq.id_protocolo_questionario', 'DESC');
			if($limit==4)
				$this->db->limit(4);

	    	$query = $this->db->get();
	    	$result =  $query->result_array();
	    	if(!empty($result)){
				foreach($result as $index=>$checkin){
					$result[$index]['unread_comments'] = $this->get_checkin_unread_comments_by_id($checkin['id'],$checkin['user_id']);
					$result[$index]['goals'] 		= $this->get_all_goals_by_update_id($checkin['id'],$checkin['user_id']);
				}
			}
			return $result;
	    }

	    public function get_search_user_updates_for_profile($id_usuario, $limit=4, $start_date= 0, $end_date=0)
	    {

	    	$this->db->select('id_protocolo_questionario as id,id_questionario as id_questionario,id_usuario as user_id,situacao as situation,data_atualizacao as date_update,publico');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->where('tpq.id_usuario', $id_usuario);
	    	$this->db->where('tpq.tipo', 'C');
	    	$this->db->where('tpq.publico', 1);
			if(isset($start_date) && isset($end_date) && $start_date != 0 && $end_date !=0){
				$this->db->where('DATE(data_atualizacao) <=', $start_date);
				$this->db->where('DATE(data_atualizacao) >=', $end_date);
			}
	    	$this->db->order_by('tpq.id_protocolo_questionario', 'DESC');
			if($limit==4)
				$this->db->limit(4);

	    	$query = $this->db->get();
	    	$result =  $query->result_array();
	    	if(!empty($result)){
				foreach($result as $index=>$checkin){
					$result[$index]['unread_comments'] = $this->get_checkin_unread_comments_by_id($checkin['id'],$checkin['user_id']);
				}
			}
			return $result;
	    }

		public function get_checkin_unread_comments_by_id($id_protocolo,$id_usuario, $count=true)
		{
				if($count){
					$this->db->select('count(tqc.id_protocolo_questionario_respostas) as unread_comment');
				}else{
					$this->db->select('tqc.id_protocolo_questionario_respostas, tqc.id_usuario');
				}
				$this->db->from($this->tableProtocoloQuestionarioResposta . ' tpq');
				$this->db->join($this->tableProtocoloQuestionarioRespostaComentarios . ' tqc', 'tqc.id_protocolo_questionario_respostas = tpq.id_protocolo_questionario_respostas', 'inner');
				$this->db->where('tpq.id_protocolo', $id_protocolo);
				$this->db->where('tpq.id_usuario', $id_usuario);
				$this->db->where('tqc.lido', 0);
				$query = $this->db->get();
				$comments	=	$query->result_array();
				return $comments;
		}

		public function mark_checkin_comments_read($id_protocolo,$id_usuario)
		{
			$data 		=	array('lido'=>1);
			$comments	=	$this->get_checkin_unread_comments_by_id($id_protocolo,$id_usuario, false);

			$this->db->trans_start();
			if(!empty($comments)){
				foreach($comments as $comment){
					$this->db->where('tqc.id_usuario', $comment['id_usuario']);
					$this->db->where('tqc.id_protocolo_questionario_respostas', $comment['id_protocolo_questionario_respostas']);
					$this->db->update($this->tableProtocoloQuestionarioRespostaComentarios . ' tqc', $data);
				}
			}
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
		}

		public function get_user_updates_for_email_by_id_questionerio($id_questionario)
	    {
	    	$id_empresa = $this->session->userdata('id_empresa');
	    	$this->db->select('id_protocolo_questionario as id,id_questionario as id_questionario,id_usuario as user_id,situacao as situation,data_atualizacao as date_update,publico');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->where('tpq.id_questionario', $id_questionario);
	    	$this->db->where('tpq.tipo', 'C');
	    	$this->db->order_by('tpq.id_protocolo_questionario', 'DESC');
	    	$this->db->limit(1);

	    	$query = $this->db->get();
	    	$result =  $query->row_array();
	    	if(!empty($result)){
				//foreach($result as $index=>$checkin){
					$result['questions'] = $this->get_user_update_by_id_for_profile($result['id'],$result['user_id'],$id_empresa,'','');
					$result['goals'] = $this->get_all_goals_by_update_id($result['id'],$result['user_id']);
				//}
			}
			return $result;
	    }

	    public function get_user_updates_for_email_by_id_questionerio_auto($id_questionario,$id_empresa, $id)
	    {
	    	$this->db->select('id_protocolo_questionario as id,id_questionario as id_questionario,id_usuario as user_id,situacao as situation,data_atualizacao as date_update,publico');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->where('tpq.id_questionario', $id_questionario);
			$this->db->where('tpq.id_usuario', $id);
	    	$this->db->where('tpq.tipo', 'C');
	    	$this->db->order_by('tpq.id_protocolo_questionario', 'DESC');
	    	$this->db->limit(1);

	    	$query = $this->db->get();
	    	$result =  $query->row_array();
	    	if(!empty($result)){
				//foreach($result as $index=>$checkin){
					$result['questions'] = $this->get_user_update_by_id_for_profile($result['id'],$result['user_id'],$id_empresa,'','');
					$result['goals'] = $this->get_all_goals_by_update_id($result['id'],$result['user_id']);
				//}
			}
			return $result;
	    }

		public function get_user_update_by_id_for_profile($id_protocolo, $id_usuario, $id_empresa,$start_date='',$end_date='')
	    {

	    	$result	= 	$this->get_questions_by_id($id_empresa,$start_date,$end_date);
			if(!empty($result)){
				foreach($result as &$question){
					if($question['type']=='o'){
						$question['answers']= $this->get_user_multiple_answers_by_id($id_protocolo, $question['id_pergunta'],$id_usuario,null);
					}
					else{
						$question['answers']= $this->get_user_answers_by_id($id_protocolo, $question['id_pergunta'],$id_usuario,null);
					}
				}
			}
			$this->mark_checkin_comments_read($id_protocolo,$id_usuario);
			return $result;
	    }

	     public function get_privacy_status_by_id_protocolo($id_protocolo, $id_usuario)
	    {
	    	$this->db->select('publico,situacao as situation');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->where('tpq.id_usuario', $id_usuario);
	    	$this->db->where('tpq.id_protocolo_questionario', $id_protocolo);
	    	$query = $this->db->get();
	    	return $query->row_array();
	    }

		public function checkin_status_update_by_id_for_profile($id_protocolo, $status)
	    {
			$data =	array('situacao'=>($status=='true')?1:0);
			$this->db->trans_start();
			$this->db->update($this->tableProtocoloQuestionario, $data, 'id_protocolo_questionario = '.$id_protocolo);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;

	    }

	    public function get_user_questions_for_development_for_profile($id_empresa,$id_usuario,$id_feedback)
	    {
	    	$this->db->select('tf.id_feedback as id,tf.id_usuario_destino,tf.id_usuario_solicitante,tf.solicitacao as response,tf.publico as public,tf.private as private,tf.desenvolvimento as development,prazo as feedback_deadline,tf.data_atualizacao as posted_date,tfp.id_feedback_protocolo_questionario,tfp.id_protocolo_questionario,tf.situacao,(select nome_usuario from ttl_usuario where id_usuario = tf.id_usuario_solicitante) as destination_user,tf.resposta as user_response');
	    	$this->db->from($this->tablefeedback . ' tf');
	    	$this->db->join($this->tableFeedbackProtocoloQuestionario . ' tfp', 'tfp.id_feedback = tf.id_feedback', 'left');
	    	$this->db->where('tf.id_feedback', $id_feedback);
			
	    	$query = $this->db->get();
	    	$result=  $query->row_array();
	    	if(!empty($result)){

    			$current_date  	= strtotime(date('Y-m-d H:i:s'));
    			$deadline 		= strtotime($result['feedback_deadline']);
    			$result['feedback_deadline_date'] = date('d/m/Y',strtotime($result['feedback_deadline']));
    			if($current_date  > $deadline){
    				$result['expired'] = true;
    			}else{
    				$result['expired'] = false;
    			}
	    		$id_protocolo = $result['id_feedback_protocolo_questionario'];
	    		$result['questions']	= 	$this->get_development_questions_by_id($id_empresa);
	    		$id_questionerio	=	null;

                if(!empty($result)){
                    foreach($result['questions'] as $index=>$res){
                        if($res['type'] == 'o'){
                            $result['questions'][$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
                        }
                    }
                    $id_questionerio = isset($result['questions'][0]['id_questionario'])?$result['questions'][0]['id_questionario']:'';
                }

				return array($result,$id_questionerio);
	    	}
			return array($result,'');
	    }

	    public function get_dev_questionario_id($idEmpresa)
        {
            $this->db->select('*');
            $this->db->from($this->tableQuestionario);
            $this->db->where('id_empresa', $idEmpresa);
            $this->db->where('tipo_questionario', 'b');
            $query = $this->db->get();
            $ra = $query->row_array();
            if($ra) return $ra['id_questionarios'];
            else return null;
        }


	    public function get_user_development_update_by_id($id_feedback, $id_usuario, $id_empresa)
	    {
	    	$this->db->select('tf.id_feedback as id,tf.id_usuario_destino,tf.resposta as response,tf.publico as public,tf.private as private,tf.desenvolvimento as development,prazo as feedback_deadline,tfp.id_feedback_protocolo_questionario,tfp.id_protocolo_questionario');
	    	$this->db->from($this->tablefeedback . ' tf');
	    	$this->db->join($this->tableFeedbackProtocoloQuestionario . ' tfp', 'tfp.id_feedback = tf.id_feedback', 'left');
	    	$this->db->where('tf.id_feedback', $id_feedback);

	    	$query = $this->db->get();
	    	$result=  $query->row_array();
	    	if(!empty($result)){
	    		$id_protocolo = $result['id_feedback_protocolo_questionario'];
	    		$result['questions']	= 	$this->get_development_questions_by_id($id_empresa);
				if(!empty($result['questions'])){
					foreach($result['questions'] as &$question){
						if($question['type']=='o'){
							$question['answers']= $this->get_user_multiple_answers_by_id($id_protocolo, $question['id_pergunta'],$id_usuario,$result['id_usuario_destino']);
						}
						else{
							$question['answers']= $this->get_user_answers_by_id($id_protocolo, $question['id_pergunta'],$id_usuario,$result['id_usuario_destino']);
						}
					}
				}
	    	}
			return $result;
	    }
		
		public function get_career_by_user($id_usuario=0,$status=array(),$objective_time=array())
	    {
	    	$this->db->select('tu.id_usuario as id,tu.nome_usuario as name,tu.email_usuario as email,tu.url_image as image,tu.id_empresa,vut.nome_cargo as cargo,vut.nome_unidade as team');
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->join($this->viewUsuariosTime . ' vut', 'tu.id_usuario = vut.id_usuario', 'left');
	    	$this->db->where('tu.id_usuario', $id_usuario);

	    	$query  = $this->db->get();
	    	$result =  $query->row_array();
			if(!empty($result)){
				if(!empty($result['image'])){
					$user_image 		=	$result['image'];
					$result['image'] 		= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$user_image;
					$result['xs_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$user_image;
					$result['md_image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$user_image;
				}else{
					$result['image'] 		= 	null;
					$result['xs_image'] 	= 	null;
					$result['md_image'] 	= 	null;
				}
				$result['dp_goals'] = $this->get_dp_objectivos_by_id_usuario($id_usuario,$status,$objective_time);
			}
			//print_r($result);die;
	    	
			return $result;
	    }

	    public function get_user_questions_for_updates_for_profile($id_empresa,$id_usuario)
	    {
	    	$this->db->select('vpg.id_pergunta as id_pergunta,vpg.id_questionario,vpg.nome_questionario as name,vpg.pergunta as question,vpg.ordem as ordem,vpg.tipo as type,tp.escala');
	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
	    	$this->db->where('vpg.id_empresa', $id_empresa);
	    	$this->db->like('vpg.tipo_questionario','c');
	    	$this->db->order_by('vpg.pergunta', 'ASC');

	    	$query = $this->db->get();
	    	$result=  $query->result_array();

			$id_questionerio	=	null;
	    	if(!empty($result)){
				foreach($result as $index=>$res){
					if($res['type'] == 'o'){
						$result[$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
						}
					}
				$id_questionerio = $result[0]['id_questionario'];
			}
			return array($result,$id_questionerio);
	    }
	    public function get_answers_for_updates_for_profile_by_id($id_pergunta)
	    {
	    	$this->db->select('id_pergunta_resposta as id,id_pergunta as id_pergunta,resposta as answer,percentual as percentage');
	    	$this->db->from($this->tablePerguntaResposta . ' tpr');
	    	$this->db->where('tpr.id_pergunta', $id_pergunta);
	    	$query = $this->db->get();
	    	return $query->result_array();


	    }


	    public function get_all_survey($id_usuario,$id_empresa)
	    {
	    	$this->db->select('vp.id_pesquisa,vp.nome_pesquisa,vp.id_questionario,vp.ativo,vp.nome_usuario,vp.respondida,vp.data_atualizacao');
	    	$this->db->from($this->viewPesquisa . ' vp');
	    	$this->db->where('vp.id_empresa', $id_empresa);
	    	$this->db->where('vp.id_usuario', $id_usuario);
	    	$this->db->where('vp.respondida !=', 1);
	    	$this->db->where('vp.situacao', 1);
	    	$this->db->where('vp.ativo', 1);
	    	$this->db->order_by('vp.respondida', 'ASC');
	    	$this->db->order_by('vp.data_atualizacao', 'DESC');
	    	$query = $this->db->get();
	    	$result=  $query->result_array();
	    	if(!empty($result)){
	    		foreach ($result as $key => $res) {
	    			$result[$key]['surveys'] = $this->get_survey_record_by_id_questionario($res['id_questionario'],$res['id_pesquisa']);
	    		}
	    	}

	    	return $result;
	    }

	    public function get_all_quick_survey_by_user($id_empresa,$id_usuario)
	    {
	    	$this->db->select('vp.id_pesquisa,vp.nome_pesquisa,vp.id_questionario,vp.ativo,(select count(id_usuario) from v_pesquisa where id_usuario = "'.$id_usuario.'" AND respondida != 1 AND id_tipo_pesquisa = 0)as total_from');
	    	$this->db->from($this->viewPesquisa . ' vp');
	    	$this->db->where('vp.id_empresa', $id_empresa);
	    	$this->db->where('vp.id_usuario', $id_usuario);
	    	$this->db->where('vp.id_tipo_pesquisa', 0);
	    	$this->db->where('vp.respondida !=', 1);
	    	$this->db->where('vp.situacao', 1);
	    	$this->db->where('vp.ativo', 1);
	    	$this->db->order_by('vp.data_atualizacao', 'DESC');
	    	$this->db->limit(1);
	    	$query = $this->db->get();
	    	$result=  $query->row_array();

	    	if(!empty($result)){
	    		$this->db->select('vpg.id_pergunta as id_pergunta,vpg.id_questionario,vpg.nome_questionario as name,vpg.pergunta as question,vpg.ordem as ordem,vpg.tipo as type,tp.escala');
		    	$this->db->from($this->viewPerguntasGeral . ' vpg');
		    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
		    	$this->db->where('vpg.id_questionario', $result['id_questionario']);
		    	$this->db->order_by('vpg.id_pergunta', 'DESC');
		    	$questionery = $this->db->get();
		    	$result['questions'] = $questionery->row_array();

		    	if(!empty($result['questions'])){
					if($result['questions']['type'] == 'o'){
						$result['questions']['options'] = $this->get_quick_survey_answers_for_updates_for_profile_by_id($result['questions']['id_pergunta']);
					}
				}
	    	}

	    	return $result;
	    }

	    public function get_quick_survey_answers_for_updates_for_profile_by_id($id_pergunta)
	    {
	    	$this->db->select('id_pergunta_resposta as id,id_pergunta as id_pergunta,resposta as answer,percentual as percentage');
	    	$this->db->from($this->tablePerguntaResposta . ' tpr');
	    	$this->db->where('tpr.id_pergunta', $id_pergunta);
	    	$query = $this->db->get();
	    	$result =  $query->result_array();
	    	if(!empty($result)){
	    		foreach ($result as $key => $res) {
	    			$result[$key]['surveys'] = $this->get_total_surveys_percentage($res['id'],$res['id_pergunta']);
	    		}
	    	}
	    	return $result;

	    }

	    public function get_total_surveys_percentage($answer_id,$id_pergunta)
	    {
	    	$this->db->select('count(id_protocolo_questionario_respostas) as total');
	    	$this->db->from($this->tableProtocoloQuestionarioResposta . ' tpqr');
	    	//$this->db->join($this->tableProtocoloQuestionario . ' tpq', 'tpq.id_protocolo_questionario = tpqr.id_protocolo', 'left');
	    	$this->db->where('tpqr.id_pergunta', $id_pergunta);
	    	$this->db->where('tpqr.id_pergunta_resposta', $answer_id);
	    	$query = $this->db->get();
	    	$result =  $query->row_array();
	    	if(!empty($result)){
	    		if($result['total'] == 0){
	    			$result['total_percentage'] = 0;
	    		}else{
	    			$result['total_percentage'] = round(100/$result['total']);
	    		}
	    	}
	    	return $result;
	    }

	    public function save_quick_survey_user($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					$value 				= 	$data['answers'];
					$id_questionario 	= 	$data['questioerio_id'];
					$id_pesquisa 	= 	$data['id_pesquisa'];
					/* storing data to ttl_protocolo_questionario starts here */
					$tbl1_data = array(
						'id_questionario' => $id_questionario,
						'id_usuario' => $id_usuario,
						'tipo' => 's',
						'id_pesquisa' => $id_pesquisa,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					$this->db->trans_start();
					$this->db->insert($this->tableProtocoloQuestionario, $tbl1_data);
					$id_protocolo = $this->db->insert_id();
					$this->db->trans_complete();
					/* storing data to ttl_protocolo_questionario end here */

					// $tbln_data = array(
					// 	'respondida' => 1,
					// );
					// $this->db->trans_start();
					// $this->db->where('id_questionario', $id_questionario);
					// $this->db->where('id_usuario', $id_usuario);
					// $this->db->update($this->viewPesquisa, $tbln_data);
					// $this->db->trans_complete();


					/* storing multi resonse question answers starts here */
					if(!empty($value['multiresponse_answer'])){
						foreach($value['multiresponse_answer'] as $index=>$multi){
							//foreach($multi as $mul){
								//if(!is_array($mul)){
									$tbl2_data = array(
										'id_protocolo' => $id_protocolo,
										'id_pergunta' => $index,
										'id_usuario' => $id_usuario,
										'id_pergunta_resposta' => $multi,
										'resposta_qualitativa' => '',
										'rating_score' => null,
										'usuario_atualizador' => $id_usuario,
										'data_atualizacao' => date('Y-m-d H:i:s'),
									);
									$this->db->trans_start();
									$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
									$id_protocolo_questionario_respostas = $this->db->insert_id();
									$this->db->trans_complete();
								//}
							//}
						}
					}
					/* storing multi resonse question answers end here */

					/* storing star rating question starts answers here */
					if(!empty($value['rating_answer'])){
						foreach($value['rating_answer'] as $index=>$rating){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => $rating['value'],
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing star rating question answers end here */

					/* storing heart rating question starts answers here */
					if(!empty($value['heart_answer'])){
						foreach($value['heart_answer'] as $index=>$heart){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => $heart['value'],
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing heart rating question answers end here */
					/* storing emoji rating question starts answers here */
					if(!empty($value['emoji_answer'])){
						foreach($value['emoji_answer'] as $index=>$emoji){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => $emoji['value'],
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();

						}
					}
					/* storing heart rating question answers end here */
				return true;
			}
	    }


	    public function get_all_survey_by_id($id_usuario,$id_empresa, $group_by_type = false)
	    {
	        $extraSelect = '';
	        if ($group_by_type) $extraSelect = ', COUNT(*) as `pendentes`';
	    	$this->db->select('vp.id_pesquisa,vp.nome_pesquisa,vp.id_questionario,vp.ativo,vp.nome_usuario as name_user, vp.id_tipo_pesquisa'.$extraSelect);
	    	$this->db->from($this->viewPesquisa . ' vp');
	    	$this->db->where('vp.id_empresa', $id_empresa);
	    	$this->db->where('vp.id_usuario', $id_usuario);
	    	$this->db->where('vp.id_tipo_pesquisa !=', 0);
	    	$this->db->where('vp.respondida !=', 1);
	    	$this->db->where('vp.situacao', 1);
	    	$this->db->where('vp.ativo', 1);
	    	if ($group_by_type) $this->db->group_by('vp.id_tipo_pesquisa');
	    	$this->db->order_by('vp.data_atualizacao', 'DESC');
	    	$query = $this->db->get();
//	    	print_r($this->db->last_query());
	    	$result=  $query->result_array();
	    	if(!empty($result)){
	    		foreach ($result as $key => $res) {
	    			$result[$key]['surveys'] = $this->get_survey_record_by_id_questionario($res['id_questionario'],$res['id_pesquisa']);
	    		}
	    	}

	    	return $result;
	    }



	    public function get_evaluated_users_by_survey_id($id_survey, $id_usuario_visualizando)
	    {
	    	$this->db->select('vp.usuario_avaliado as id, vp.nome_pesquisa,vp.nome_usuario_avaliado as name_user, tu.url_image as image, tu.id_empresa');
	    	$this->db->from($this->viewPesquisa . ' vp');
	    	$this->db->join($this->tableUser . ' tu', 'vp.usuario_avaliado = tu.id_usuario', 'INNER');
	    	$this->db->where('vp.id_usuario', $id_usuario_visualizando);
	    	$this->db->where('vp.id_tipo_pesquisa', 2);
	    	$this->db->where('vp.respondida !=', 1);
	    	$this->db->where('vp.situacao', 1);
	    	$this->db->where('vp.ativo', 1);
	    	$this->db->group_by('vp.usuario_avaliado');
	    	$this->db->order_by('vp.nome_usuario_avaliado', 'DESC');
	    	$query = $this->db->get();
	    	//print_r($this->db->last_query());
	    	$result = $query->result_array();


            if(!empty($result)){
                foreach ($result as &$item) {
                    if(!empty($item['image'])){
                        $user_image 		=	$item['image'];
                        $item['image'] 		= 	base_url('assets/img') . '/'. $item['id_empresa'] .'/'.$user_image;
                        $item['xs_image'] 	= 	base_url('assets/img') . '/'. $item['id_empresa'] .'/50/'.$user_image;
                        $item['md_image'] 	= 	base_url('assets/img') . '/'. $item['id_empresa'] .'/150/'.$user_image;
                    }else{
                        $item['image'] 		= 	null;
                        $item['xs_image'] 	= 	null;
                        $item['md_image'] 	= 	null;
                    }
                }

            }


            return $result;
	    }

	    public function get_survey_record_by_id_questionario($id_questionario,$id_pesquisa)
	    {
    		$this->db->select('tpq.id_questionario,tpqr.*');
	    	$this->db->from($this->tableProtocoloQuestionario . ' tpq');
	    	$this->db->join($this->tableProtocoloQuestionarioResposta . ' tpqr', 'tpqr.id_protocolo = tpq.id_protocolo_questionario', 'left');
	    	$this->db->where('tpq.id_questionario', $id_questionario);
	    	$this->db->where('tpq.id_pesquisa', $id_pesquisa);
	    	$this->db->where('tpq.tipo', 's');
	    	$this->db->group_by('tpqr.id_usuario');
	    	$questionery = $this->db->get();
	    	$result = $questionery->result_array();
	    	if(!empty($result)){
	    		$total_person_filled = count($result);
	    	}else{
	    		$total_person_filled = 0;
	    	}
	    	return $total_person_filled;
	    }

	    public function get_survey_questions_by_id_questionerio($id_usuario,$id_empresa,$id_questionario,$id_pesquisa)
	    {
    		$this->db->select('vpg.id_pergunta as id_pergunta,vpg.id_questionario,vpg.nome_questionario as name,vpg.pergunta as question,vpg.ordem as ordem,vpg.tipo as type,tp.escala,tp.id_categoria_pergunta,tp.favorabilidade');
	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
	    	$this->db->where('vpg.id_questionario', $id_questionario);
	    	$this->db->order_by('vpg.id_pergunta', 'DESC');
	    	$questionery = $this->db->get();
	    	$result = $questionery->result_array();

	    	$id_questionerio	=	$id_questionario;
	    	$id_pesquisa	=	$id_pesquisa;
	    	if(!empty($result)){
				foreach($result as $index=>$res){
					if($res['type'] == 'o'){
						$result[$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
						}
					}
			}
			return array($result,$id_questionerio,$id_pesquisa);
	    }

	    private function survey_has_evaluated_user($id_usuario, $id_pesquisa)
        {
            $this->db->select('usuario_avaliado');
            $this->db->from($this->viewPesquisa);
            $this->db->where('id_pesquisa', $id_pesquisa);
            $this->db->where('id_usuario', $id_usuario);
            $this->db->where('usuario_avaliado != 0');
            $query = $this->db->get();

            $ra = $query->row_array();

            //print_r($this->db->last_query());
            if($ra) return $ra;
            else return false;
        }

		public function get_survey_questions_by_id_pesquisa($id_usuario,$id_empresa,$id_pesquisa)
	    {
	        $searchForAvaliado 	= $this->survey_has_evaluated_user($id_usuario, $id_pesquisa);
	        if (!$searchForAvaliado) {
				$selectForAvaliado = '';
			}	
	        else{
				$selectForAvaliado = ', 
				tu.nome_usuario as usuario_avaliado_nome,  
				tu.email_usuario as usuario_avaliado_email,
				tu.url_image as usuario_avaliado_image,
				tc.nome_cargo as usuario_avaliado_cargo,
				tet.nome_unidade as usuario_avaliado_time,
				tet.id_time as usuario_avaliado_id_time';
			}
    		$this->db->select('vpg.id_pergunta as id_pergunta,
    		vpg.id_questionario,
    		vpg.nome_questionario as name,
    		vpg.pergunta as question,
    		vpg.ordem as ordem,
    		vpg.tipo as type,
    		vpq.id_tipo_pesquisa as tipo_pesquisa,
    		vpq.permite_pares,
    		vpq.gestor as usuario_visualizando_gestor,
    		vpq.usuario_avaliado,
    		tp.escala,
    		tp.id_categoria_pergunta,
    		tp.favorabilidade, 
    		tcp.id_categoria_pergunta as category_id, 
    		tcp.nome_categoria as category_name,
    		vpq.data_atualizacao as created,
    		vpq.nome_pesquisa as survey_name'.$selectForAvaliado);

	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
	    	$this->db->join($this->viewPesquisa . ' vpq', 'vpq.id_questionario = vpg.id_questionario', 'inner');
	    	$this->db->join($this->tableCategoryPergunta . ' tcp', 'tcp.id_categoria_pergunta = tp.id_categoria_pergunta', 'left');
	    	if ($searchForAvaliado) {
                $this->db->join($this->tableUser . ' tu', 'tu.id_usuario = vpq.usuario_avaliado', 'inner');
                $this->db->join($this->tableCargos . ' tc', 'tu.id_cargo = tc.id_cargo', 'inner');
                $this->db->join($this->tableUserTeam . ' tut', 'tu.id_usuario = tut.id_usuario', 'inner');
                $this->db->join('ttl_empresa_times' . ' tet', 'tut.id_empresa_time = tet.id_time', 'inner');
            }
	    	$this->db->where('vpq.id_pesquisa', $id_pesquisa);
	    	$this->db->where('vpq.respondida', 0);
	    	$this->db->where('vpq.id_usuario', $id_usuario);
	    	$this->db->where('vpq.id_empresa', $id_empresa);
			$this->db->group_by('id_pergunta');
	    	$questionery = $this->db->get();
	    	$result = $questionery->result_array();
            //print_r($this->db->last_query());
	    	$survey_name 			= 	'Survey Questions';
			$category_wise_data 	=	array();
			$category_none_data 	=	array();
			$category_data 			=	array();
			$id_questionerio		=	"";
			$created				=	"";
			if ($searchForAvaliado) {
                $usuario_avaliado 			= "";
                $usuario_avaliado_nome 		= "";
                $usuario_avaliado_email 	= "";
                $usuario_avaliado_cargo 	= "";
                $usuario_avaliado_time 		= "";
                $usuario_avaliado_image 	= "";
                $usuario_avaliado_id_time 	= "";
            }
            $usuario_visualizando_gestor 	= "";
            $permite_pares = "";
            $tipo = "";
			if(!empty($result)){
				$created = $result[0]['created'];
				$survey_name = $result[0]['survey_name'];
				if ($searchForAvaliado) {
                    $usuario_avaliado 			= 	$result[0]['usuario_avaliado'];
                    $usuario_avaliado_nome 		= 	$result[0]['usuario_avaliado_nome'];
                    $usuario_avaliado_email 	= 	$result[0]['usuario_avaliado_email'];
                    $usuario_avaliado_cargo 	= 	$result[0]['usuario_avaliado_cargo'];
                    $usuario_avaliado_time 		= 	$result[0]['usuario_avaliado_time'];
                    $usuario_avaliado_image 	= 	$result[0]['usuario_avaliado_image'];
                    $usuario_avaliado_id_time 	= 	$result[0]['usuario_avaliado_id_time'];
                }
                $usuario_visualizando_gestor = $result[0]['usuario_visualizando_gestor'];
                $permite_pares 	= 	$result[0]['permite_pares'];
                $tipo 			= 	$result[0]['tipo_pesquisa'];
                if(!empty($usuario_avaliado_image)){
                    $usuario_avaliado_image 	= 	base_url('assets/img') . '/'. $id_empresa .'/50/'.$usuario_avaliado_image;
                }else{
                    $usuario_avaliado_image 	= 	null;
                }
				foreach($result as $index=>$res){
                    unset($result[$index]['usuario_avaliado']);
                    unset($result[$index]['usuario_avaliado_nome']);
                    unset($result[$index]['usuario_avaliado_email']);
                    unset($result[$index]['usuario_avaliado_cargo']);
                    unset($result[$index]['usuario_avaliado_time']);
                    unset($result[$index]['usuario_avaliado_image']);
                    unset($result[$index]['usuario_visualizando_gestor']);
                    unset($result[$index]['usuario_avaliado_id_time']);

					$id_questionerio	=	$res['id_questionario'];
					if($res['type'] == 'o'){
						$result[$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
					}
					if(empty($res['category_id'])){
						$category_none_data['data']	=	array('id'=>0,'name'=>'Non categorized');
						$category_none_data['questions'][]	=	$result[$index];
					}else{
						$category_wise_data[$res['category_id']]['data']	=	array(
																					'id'=>$res['category_id'],
																					'name'=>$res['category_name']
																				);
						$category_wise_data[$res['category_id']]['questions'][]	=	$result[$index];
					}
				}
				if(!empty($category_none_data)){
					array_push($category_wise_data,$category_none_data);
				}
			}
			$newcategory_data 	=	array();
			if(!empty($category_wise_data)){
				foreach($category_wise_data as $category){
					$newcategory_data[]	=	$category;
				}
			}

            $returnArr = array('survey' => $newcategory_data, 'id_questionerio' => $id_questionerio,
                'id_pesquisa' => $id_pesquisa,
                'created' => $created,
                'type' => $tipo,
                'teste' => $searchForAvaliado,
                'survey_name' => $survey_name,
                'permite_pares' => $permite_pares,
                'usuario_visualizando_gestor' => $usuario_visualizando_gestor);


            if ($searchForAvaliado) {
                $returnArr 	= 	array_merge($returnArr, array('usuario_avaliado' => $usuario_avaliado,
                'usuario_avaliado_nome' 	=> $usuario_avaliado_nome,
                'usuario_avaliado_email' 	=> $usuario_avaliado_email,
                'usuario_avaliado_cargo' 	=> $usuario_avaliado_cargo,
                'usuario_avaliado_time' 	=> $usuario_avaliado_time,
                'usuario_avaliado_image' 	=> $usuario_avaliado_image,
                'usuario_avaliado_id_time' 	=> $usuario_avaliado_id_time));
            }
            return $returnArr;
	    }
	    public function get_questions_by_id_cycle($id_usuario,$id_empresa)
	    {
			$searchForAvaliado 		=	false;
	        //$searchForAvaliado 	= $this->survey_has_evaluated_user($id_usuario, $id_pesquisa);
	        if (!$searchForAvaliado) {
				$selectForAvaliado = '';
			}	
	        else{
				$selectForAvaliado = ', 
				tu.nome_usuario as usuario_avaliado_nome,  
				tu.email_usuario as usuario_avaliado_email,
				tu.url_image as usuario_avaliado_image,
				tc.nome_cargo as usuario_avaliado_cargo,
				tet.nome_unidade as usuario_avaliado_time,
				tet.id_time as usuario_avaliado_id_time';
			}
    		$this->db->select('vpg.id_pergunta as id_pergunta,
    		tp.escala,
    		tp.id_categoria_pergunta,
    		tp.favorabilidade, 
    		tcp.id_categoria_pergunta as category_id, 
    		tcp.nome_categoria as category_name'.$selectForAvaliado);

	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
	    	//$this->db->join($this->viewPesquisa . ' vpq', 'vpq.id_questionario = vpg.id_questionario', 'inner');
	    	$this->db->join($this->tableCategoryPergunta . ' tcp', 'tcp.id_categoria_pergunta = tp.id_categoria_pergunta', 'left');
	    	if ($searchForAvaliado) {
                $this->db->join($this->tableUser . ' tu', 'tu.id_usuario = vpq.usuario_avaliado', 'inner');
                $this->db->join($this->tableCargos . ' tc', 'tu.id_cargo = tc.id_cargo', 'inner');
                $this->db->join($this->tableUserTeam . ' tut', 'tu.id_usuario = tut.id_usuario', 'inner');
                $this->db->join('ttl_empresa_times' . ' tet', 'tut.id_empresa_time = tet.id_time', 'inner');
            }
	    	//$this->db->where('vpq.id_pesquisa', $id_pesquisa);
	    	//$this->db->where('vpq.id_usuario', $id_usuario);
	    	//$this->db->where('vpq.id_empresa', $id_empresa);
			$this->db->group_by('id_pergunta');
	    	$questionery 			= 	$this->db->get();
	    	$result 				= 	$questionery->result_array();
	    	$survey_name 			= 	'Survey Questions';
			$category_wise_data 	=	array();
			$category_none_data 	=	array();
			$category_data 			=	array();
			$id_questionerio		=	"";
			$created				=	"";
			if ($searchForAvaliado) {
                $usuario_avaliado 			= 	"";
                $usuario_avaliado_nome 		= 	"";
                $usuario_avaliado_email 	= 	"";
                $usuario_avaliado_cargo 	= 	"";
                $usuario_avaliado_time 		= 	"";
                $usuario_avaliado_image 	= 	"";
                $usuario_avaliado_id_time 	= 	"";
            }
            $usuario_visualizando_gestor 	= 	"";
            $permite_pares 					= 	"";
            $tipo 							= 	"";
			if(!empty($result)){
				if ($searchForAvaliado) {
                    $usuario_avaliado 			= 	$result[0]['usuario_avaliado'];
                    $usuario_avaliado_nome 		= 	$result[0]['usuario_avaliado_nome'];
                    $usuario_avaliado_email 	= 	$result[0]['usuario_avaliado_email'];
                    $usuario_avaliado_cargo 	= 	$result[0]['usuario_avaliado_cargo'];
                    $usuario_avaliado_time 		= 	$result[0]['usuario_avaliado_time'];
                    $usuario_avaliado_image 	= 	$result[0]['usuario_avaliado_image'];
                    $usuario_avaliado_id_time 	= 	$result[0]['usuario_avaliado_id_time'];
                }
                if(!empty($usuario_avaliado_image)){
                    $usuario_avaliado_image 	= 	base_url('assets/img') . '/'. $id_empresa .'/50/'.$usuario_avaliado_image;
                }else{
                    $usuario_avaliado_image 	= 	null;
                }
				foreach($result as $index=>$res){
                    unset($result[$index]['usuario_avaliado']);
                    unset($result[$index]['usuario_avaliado_nome']);
                    unset($result[$index]['usuario_avaliado_email']);
                    unset($result[$index]['usuario_avaliado_cargo']);
                    unset($result[$index]['usuario_avaliado_time']);
                    unset($result[$index]['usuario_avaliado_image']);
                    unset($result[$index]['usuario_visualizando_gestor']);
                    unset($result[$index]['usuario_avaliado_id_time']);

					if($res['type'] == 'o'){
						$result[$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
					}
					if(empty($res['category_id'])){
						$category_none_data['data']	=	array('id'=>0,'name'=>'Non categorized');
						$category_none_data['questions'][]	=	$result[$index];
					}else{
						$category_wise_data[$res['category_id']]['data']	=	array(
																					'id'=>$res['category_id'],
																					'name'=>$res['category_name']
																				);
						$category_wise_data[$res['category_id']]['questions'][]	=	$result[$index];
					}
				}
				if(!empty($category_none_data)){
					array_push($category_wise_data,$category_none_data);
				}
			}
			$newcategory_data 	=	array();
			if(!empty($category_wise_data)){
				foreach($category_wise_data as $category){
					$newcategory_data[]	=	$category;
				}
			}

            $returnArr = array('survey' => $newcategory_data,
                'id_pesquisa' 	=> $id_pesquisa,
                'created' 		=> $created,
                'type' 			=> $tipo,
                'teste' 		=> $searchForAvaliado,
                'survey_name' 	=> $survey_name,
                'permite_pares' => $permite_pares,
                'usuario_visualizando_gestor' => $usuario_visualizando_gestor);


            if ($searchForAvaliado) {
                $returnArr 	= 	array_merge($returnArr, array('usuario_avaliado' => $usuario_avaliado,
                'usuario_avaliado_nome' 	=> $usuario_avaliado_nome,
                'usuario_avaliado_email' 	=> $usuario_avaliado_email,
                'usuario_avaliado_cargo' 	=> $usuario_avaliado_cargo,
                'usuario_avaliado_time' 	=> $usuario_avaliado_time,
                'usuario_avaliado_image' 	=> $usuario_avaliado_image,
                'usuario_avaliado_id_time' 	=> $usuario_avaliado_id_time));
            }
            return $returnArr;
	    }

	    public function save_new_survey_user($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					$value 				= 	$data['answers'];
					$id_questionario 	= 	$data['questioerio_id'];
					$id_pesquisa 	= 	$data['id_pesquisa'];
					$pares 	= 	isset($data['pares'])?$data['pares']:null;
					$time 	= 	$data['time'];
                    $usuario_avaliado 	= 	(isset($data['usuario_avaliado']) && $data['usuario_avaliado'] != '')?$data['usuario_avaliado']:null;
					/* storing data to ttl_protocolo_questionario starts here */
					$tbl1_data = array(
						'id_questionario' => $id_questionario,
						'id_usuario_avaliado' => $usuario_avaliado,
						'id_usuario' => $id_usuario,
						'tipo' => 's',
						'id_pesquisa' => $id_pesquisa,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					$this->db->trans_start();
					$this->db->insert($this->tableProtocoloQuestionario, $tbl1_data);
					$id_protocolo = $this->db->insert_id();
					$this->db->trans_complete();
//					print_r($this->db->last_query());
					/* storing data to ttl_protocolo_questionario end here */


					/* storing multi resonse question answers starts here */
					if(!empty($value['multiresponse_answer'])){
						foreach($value['multiresponse_answer'] as $index=>$multi){
							//foreach($multi as $mul){
								//if(!is_array($mul)){
									$tbl2_data = array(
										'id_protocolo' => $id_protocolo,
										'id_pergunta' => $index,
										'id_usuario' => $id_usuario,
										'id_pergunta_resposta' => $multi,
										'resposta_qualitativa' => '',
										'rating_score' => null,
										'usuario_atualizador' => $id_usuario,
										'data_atualizacao' => date('Y-m-d H:i:s'),
									);
									$this->db->trans_start();
									$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
									$id_protocolo_questionario_respostas = $this->db->insert_id();
									$this->db->trans_complete();
								//}
							//}
						}
					}
					/* storing multi resonse question answers end here */

					/* storing text question starts answers here */
					if(!empty($value['text_answer'])){
						foreach($value['text_answer'] as $index=>$text){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => $text['value'],
								'rating_score' => null,
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing text question answers end here */

					/* storing star rating question starts answers here */
					if(!empty($value['rating_answer'])){
						foreach($value['rating_answer'] as $index=>$rating){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => isset($rating['value'])?$rating['value']:0,
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing star rating question answers end here */

					/* storing heart rating question starts answers here */
					if(!empty($value['heart_answer'])){
						foreach($value['heart_answer'] as $index=>$heart){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => isset($heart['value'])?$heart['value']:0,
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing heart rating question answers end here */

					/* storing emoji rating question starts answers here */
					if(!empty($value['emoji_answer'])){
						foreach($value['emoji_answer'] as $index=>$emoji){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => isset($emoji['value'])?$emoji['value']:0,
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing heart rating question answers end here */

					/* storing pairs start here*/
					if(!empty($pares)){
						foreach($pares as $index=>$par){

							$tbl2_data = array(
								'id_pesquisa' => $id_pesquisa,
								'id_usuario' => $par,
								'id_usuario_avaliado' => $usuario_avaliado,
								'id_tipo_questionario' => 3,
								'id_time' => $time,
								'situacao' => 0,
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tablePublicPesquisa, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
						}
					}
					/* storing pairs end here */
				return true;
			}
	    }

	    public function save_alert_update_checkin_values($data)
	    {
			if(!empty($data)){
			        $data['ativo'] = '1';
					$this->db->trans_start();
					$this->db->insert($this->tableCheckinAlert, $data);
					$this->db->trans_complete();
				return true;
			}
	    }

	    public function save_update_checkin_values($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					$value 				= 	$data['answers'];
					$id_questionario 	= 	$data['questioerio_id'];
					$public 			= 	$data['public'];
					/* storing data to ttl_protocolo_questionario starts here */
					$tbl1_data = array(
						'id_questionario' => $id_questionario,
						'id_usuario' => $id_usuario,
						'tipo' => 'C',
						'publico' => $public,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					$this->db->trans_start();
					$this->db->insert($this->tableProtocoloQuestionario, $tbl1_data);
					$id_protocolo = $this->db->insert_id();
					$this->db->trans_complete();
					/* storing data to ttl_protocolo_questionario end here */


					/* storing multi resonse question answers starts here */
					if(!empty($value['multiresponse_answer'])){
						foreach($value['multiresponse_answer'] as $index=>$multi){
							//foreach($multi as $mul){
								//if(!is_array($mul)){
									$tbl2_data = array(
										'id_protocolo' => $id_protocolo,
										'id_pergunta' => $index,
										'id_usuario' => $id_usuario,
										'id_pergunta_resposta' => $multi['answers'],
										'resposta_qualitativa' => '',
										'rating_score' => null,
										'usuario_atualizador' => $id_usuario,
										'data_atualizacao' => date('Y-m-d H:i:s'),
									);
									$this->db->trans_start();
									$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
									$id_protocolo_questionario_respostas = $this->db->insert_id();
									$this->db->trans_complete();
									if(isset($multi['goals']) && !empty($multi['goals'])){
										$this->insert_goal_for_answers($id_protocolo_questionario_respostas, $multi['goals'],$id_usuario);
									}
								//}
							//}
						}
					}
					/* storing multi resonse question answers end here */

					/* storing text question starts answers here */
					if(!empty($value['text_answer'])){
						foreach($value['text_answer'] as $index=>$text){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => $text['value'],
								'rating_score' => null,
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
							if(isset($text['goals']) && !empty($text['goals'])){
								$this->insert_goal_for_answers($id_protocolo_questionario_respostas, $text['goals'],$id_usuario);
							}
						}
					}
					/* storing text question answers end here */

					/* storing star rating question starts answers here */
					if(!empty($value['rating_answer'])){
						foreach($value['rating_answer'] as $index=>$rating){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => $rating['value'],
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
							if(isset($rating['goals']) && !empty($rating['goals'])){
								$this->insert_goal_for_answers($id_protocolo_questionario_respostas, $rating['goals'],$id_usuario);
							}
						}
					}
					/* storing star rating question answers end here */

					/* storing heart rating question starts answers here */
					if(!empty($value['heart_answer'])){
						foreach($value['heart_answer'] as $index=>$heart){

							$tbl2_data = array(
								'id_protocolo' => $id_protocolo,
								'id_pergunta' => $index,
								'id_usuario' => $id_usuario,
								'id_pergunta_resposta' => null,
								'resposta_qualitativa' => null,
								'rating_score' => $heart['value'],
								'usuario_atualizador' => $id_usuario,
								'data_atualizacao' => date('Y-m-d H:i:s'),
							);
							$this->db->trans_start();
							$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
							$id_protocolo_questionario_respostas = $this->db->insert_id();
							$this->db->trans_complete();
							if(isset($heart['goals']) && !empty($heart['goals'])){
								$this->insert_goal_for_answers($id_protocolo_questionario_respostas, $heart['goals'],$id_usuario);
							}
						}
					}
					/* storing heart rating question answers end here */
				return true;
			}
	    }

	    public function save_development_update_values($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					$feedbacktouser_id 		= 	$data['feedbacktouser'];
					$feedback_description 	= 	$data['feedback_description'];
					$deadline 		= 	date("Y-m-d", strtotime(str_replace('/', '-', $data['feedback_deadline'])));
					$feedback_deadline = $deadline.' 23:59:59';
					/* storing data to ttl_feedback starts here */
					$tbl1_data = array(
						'id_usuario_solicitante' => $id_usuario,
						'id_usuario_destino' => $feedbacktouser_id,
						'solicitacao' => $feedback_description,
						'desenvolvimento' => 1,
						'prazo' => $feedback_deadline,
						'usuario_atualizador' => $id_usuario,
					);
					$this->db->trans_start();
					$this->db->insert($this->tablefeedback, $tbl1_data);
					$id_feedback = $this->db->insert_id();
					$this->db->trans_complete();
					/* storing data to ttl_feedback end here */
				return true;
			}else{
				return false;
			}
	    }
	    public function update_feedback_deadline($id_feedback,$feedback_deadline)
	    {
			if(!empty($feedback_deadline)){
					
					$tbl1_data = array(
						'prazo' => $feedback_deadline
					);
					$this->db->trans_start();
					$this->db->where('id_feedback', $id_feedback);
					$this->db->update($this->tablefeedback, $tbl1_data);
					$this->db->trans_complete();
					/* storing data to ttl_feedback end here */
				return true;
			}else{
				return false;
			}
	    }
		public function update_feedback_privacy_status($id_feedback,$feedback_status)
	    {
			$tbl1_data = array(
				'publico' => $feedback_status==1?1:0,
				'private' => $feedback_status==0?1:0,
			);
			$this->db->trans_start();
			$this->db->where('id_feedback', $id_feedback);
			$this->db->update($this->tablefeedback, $tbl1_data);
			$this->db->trans_complete();
			/* storing data to ttl_feedback end here */
			return true;
	    }
	    public function reply_development_update_values($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
				$id_feedback = $data['id_feedback_dev'];
				$id_questionario = $data['id_questionario_dev'];
				$value = isset($data['answers'])?$data['answers']:[];

					if(isset($id_feedback) && $id_feedback != null){
						$tbl_feedback_data = array(
						'situacao' => 1,
						'resposta' => $data['feedback_resposta']
						);
						$this->db->trans_start();
						$this->db->where('id_feedback', $id_feedback);
						$this->db->update($this->tablefeedback, $tbl_feedback_data);
						$this->db->trans_complete();

						if(	!empty($value) && $id_questionario != ''){
							/* storing data to ttl_protocolo_questionario starts here */
						$tbl1_feedback_data = array(
							'id_protocolo_questionario' => $id_questionario,
							'id_feedback' => $id_feedback,
							'usuario_atualizador' => $id_usuario,
						);
						$this->db->trans_start();
						$this->db->insert($this->tableFeedbackProtocoloQuestionario, $tbl1_feedback_data);
						$id_protocolo = $this->db->insert_id();
						$this->db->trans_complete();
						/* storing data to ttl_protocolo_questionario end here */


						/* storing multi resonse question answers starts here */
						if(!empty($value['multiresponse_answer'])){
							foreach($value['multiresponse_answer'] as $index=>$multi){
								//foreach($multi as $mul){
									//if(!is_array($mul)){
										$tbl2_data = array(
											'id_protocolo' => $id_protocolo,
											'id_pergunta' => $index,
											'id_usuario' => $id_usuario,
											'id_pergunta_resposta' => $multi,
											'resposta_qualitativa' => '',
											'rating_score' => null,
											'usuario_atualizador' => $id_usuario,
										);
										$this->db->trans_start();
										$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
										$id_protocolo_questionario_respostas = $this->db->insert_id();
										$this->db->trans_complete();
									//}
								//}
							}
						}
						/* storing multi resonse question answers end here */

						/* storing text question starts answers here */
						if(!empty($value['text_answer'])){
							foreach($value['text_answer'] as $index=>$text){

								$tbl2_data = array(
									'id_protocolo' => $id_protocolo,
									'id_pergunta' => $index,
									'id_usuario' => $id_usuario,
									'id_pergunta_resposta' => null,
									'resposta_qualitativa' => $text['value'],
									'rating_score' => null,
									'usuario_atualizador' => $id_usuario,
								);
								$this->db->trans_start();
								$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
								$id_protocolo_questionario_respostas = $this->db->insert_id();
								$this->db->trans_complete();
							}
						}
						/* storing text question answers end here */

						/* storing star rating question starts answers here */
						if(!empty($value['rating_answer'])){
							foreach($value['rating_answer'] as $index=>$rating){

								$tbl2_data = array(
									'id_protocolo' => $id_protocolo,
									'id_pergunta' => $index,
									'id_usuario' => $id_usuario,
									'id_pergunta_resposta' => null,
									'resposta_qualitativa' => null,
									'rating_score' => $rating['value'],
									'usuario_atualizador' => $id_usuario,
								);
								$this->db->trans_start();
								$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
								$id_protocolo_questionario_respostas = $this->db->insert_id();
								$this->db->trans_complete();
							}
						}
						/* storing star rating question answers end here */

						/* storing heart rating question starts answers here */
						if(!empty($value['heart_answer'])){
							foreach($value['heart_answer'] as $index=>$heart){

								$tbl2_data = array(
									'id_protocolo' => $id_protocolo,
									'id_pergunta' => $index,
									'id_usuario' => $id_usuario,
									'id_pergunta_resposta' => null,
									'resposta_qualitativa' => null,
									'rating_score' => $heart['value'],
									'usuario_atualizador' => $id_usuario,
								);
								$this->db->trans_start();
								$this->db->insert($this->tableProtocoloQuestionarioResposta, $tbl2_data);
								$id_protocolo_questionario_respostas = $this->db->insert_id();
								$this->db->trans_complete();
							}
						}
						/* storing heart rating question answers end here */
						}
					}
				return true;
			}else{
				return false;
			}
	    }
	    public function save_user_dp_goals($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
				if(isset($data['id_objetivo']) && $data['id_objetivo'] != ''){
					$id_cargo 				= 	isset($data['cargoes'][0])?$data['cargoes'][0]:null;
					$name 					= 	$data['name'];
					$situacao 					= 	$data['active_status'];
					$date_limit 		= 	date("Y-m-d", strtotime(str_replace('/', '-', $data['date_limit'])));
					/* storing data to tableDpObjetivo starts here */
					$tbl1_data = array(
						'nome_dp_objetivo' => $name,
						'data_limite' => $date_limit,
						'id_responsavel' => $id_usuario,
						'id_cargo' => $id_cargo,
						'situacao' => $situacao
					);
					
					$this->db->trans_start();
					$this->db->where('id_dp_objetivo', $data['id_objetivo']);
					$this->db->update($this->tableDpObjetivo, $tbl1_data);
					$result = $this->db->trans_complete();
				}else{
					$id_cargo 				= 	isset($data['cargoes'][0])?$data['cargoes'][0]:null;
					$name 					= 	$data['name'];
					$situacao 				= 	$data['active_status'];
					$date_limit 		= 	date("Y-m-d", strtotime(str_replace('/', '-', $data['date_limit'])));
					/* storing data to tableDpObjetivo starts here */
					$tbl1_data = array(
						'nome_dp_objetivo' => $name,
						'data_limite' => $date_limit,
						'id_responsavel' => $id_usuario,
						'id_cargo' => $id_cargo,
						'situacao' => $situacao
					);
					$this->db->trans_start();
					$this->db->insert($this->tableDpObjetivo, $tbl1_data);
					$result = $this->db->trans_complete();
				}
				return $result;
			}
	    }

	    public function update_minor_goal_objective($data,$id_dp_objetivo)
	    {
			if(!empty($data)){
					$this->db->trans_start();
					$this->db->where('id_dp_objetivo', $id_dp_objetivo);
					$this->db->update($this->tableDpObjetivo, $data);
					$result = $this->db->trans_complete();

				return $result;
			}
	    }

	    public function save_minor_goals($data)
	    {
			if(!empty($data)){
					$this->db->trans_start();
					$this->db->insert($this->tableDpRchave, $data);
					$last_id = $this->db->insert_id();
					$result = $this->db->trans_complete();

				return $last_id;
			}
	    }
	    public function update_minor_goals_by_id($data,$id_dp_rchave)
	    {
			if(!empty($data)){
					$this->db->trans_start();
					$this->db->where('id_dp_rchave', $id_dp_rchave);
					$this->db->update($this->tableDpRchave, $data);
					$result = $this->db->trans_complete();

				return $result;
			}
	    }

	    public function add_minor_goal_activity($data)
	    {
			if(!empty($data)){
					/* storing data to tableDpRchave starts here */
					$this->db->trans_start();
					$this->db->insert($this->tableDpAtividade, $data);
					$result = $this->db->trans_complete();

				return $result;
			}
	    }
	    public function update_minor_goal_activity_by_id($data,$id)
	    {
			if(!empty($data)){
					/* storing data to tableDpRchave starts here */
					$this->db->trans_start();
					$this->db->where('id_dp_atividade', $id);
					$this->db->update($this->tableDpAtividade, $data);
					$result = $this->db->trans_complete();

				return $result;
			}
	    }
	    public function save_user_dp_activity($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					/* storing data to tableDpRchave starts here */
					$tbl1_data = array(
						'id_dp_rchave' => $data['meta_id'],
						'nome_dp_atividade' => $data['name'],
						'data_inicio' => date("Y-m-d"),
						'data_fim' => date("Y-m-d", strtotime(str_replace('/', '-', $data['activity_end']))),
						'usuario_atualizador' => $id_usuario,
					);
					$this->db->trans_start();
					$this->db->insert($this->tableDpAtividade, $tbl1_data);
					$new_id = $this->db->insert_id();
					$result = $this->db->trans_complete();

				return true;
			}
	    }
	    public function delete_activities_by_id_rchave($id_dp_rchave, $all_activites=array())
	    {
			if(!empty($id_dp_rchave)){

					$this->db->trans_start();
					$this->db->where('id_dp_rchave', $id_dp_rchave);
					if(!empty($all_activites)){
						$this->db->where_not_in('id_dp_atividade', $all_activites);
					}
					$this->db->delete('ttl_dp_atividade');
					$result = $this->db->trans_complete();

				return $result;
			}
	    }
	    public function update_user_dp_activity($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					/* storing data to tableDpRchave starts here */
					$tbl1_data = array(
						'situacao' => $data['situacao'],
					);
					$this->db->trans_start();
					$this->db->where('id_dp_atividade', $data['activity_id']);
					$this->db->update($this->tableDpAtividade, $tbl1_data);
					$result = $this->db->trans_complete();

				return $result;
			}
	    }
	    public function update_dp_activity($activity_id,$type,$data)
	    {
			if(!empty($activity_id)){
					/* storing data to tableDpRchave starts here */
					if($type == 'name'){
						$tbl1_data = array(
						'nome_dp_atividade' => $data,
						);
					}
					if($type == 'date'){
						$tbl1_data = array(
						'data_fim' => date("Y-m-d", strtotime(str_replace('/', '-', $data))),
						);
					}
					if($type == 'situacao'){
						$tbl1_data = array(
						'situacao' => $data,
						);
					}
					$this->db->trans_start();
					$this->db->where('id_dp_atividade', $activity_id);
					$this->db->update($this->tableDpAtividade, $tbl1_data);
					$result = $this->db->trans_complete();
					return $result;

					
			}
	    }
	    public function update_user_dp_objectivo_status($id_empresa,$id_usuario,$data)
	    {
			if(!empty($data)){
					/* storing data to tableDpRchave starts here */
					$tbl1_data = array(
						'situacao' => $data['situacao'],
					);
					$this->db->trans_start();
					$this->db->where('id_dp_objetivo', $data['objective_id']);
					$this->db->update($this->tableDpObjetivo, $tbl1_data);
					$result = $this->db->trans_complete();

				return $result;
			}
	    }
	    public function delete_user_dp_activity_by_id($activity_id)
	    {
			if(!empty($activity_id)){
					$this->db->select('id_dp_rchave');
					$this->db->where('id_dp_atividade',$activity_id);
					$this->db->from($this->tableDpAtividade);
					$q = $this->db->get()->row_array();
					$result = $q['id_dp_rchave'];

					$this->db->trans_start();
					$this->db->where('id_dp_atividade', $activity_id);
					$this->db->delete($this->tableDpAtividade);
					$this->db->trans_complete();
					return $result;

			}
	    }
	    public function delete_user_dp_objective_by_id($objective_id)
	    {
			if(!empty($objective_id)){

					$this->db->trans_start();
					$this->db->where('id_dp_objetivo', $objective_id);
					$this->db->delete($this->tableDpRchave);
					$result2 = $this->db->trans_complete();

					$this->db->trans_start();
					$this->db->where('id_dp_objetivo', $objective_id);
					$this->db->delete($this->tableDpObjetivo);
					$result = $this->db->trans_complete();



				return $result;
			}
	    }

		public function insert_goal_for_answers($answer_id, $goals,$id_usuario){
			if(!empty($goals)){
				foreach($goals as $goal_id){

					$tbl2_data = array(
						'id_protocolo_questionario_respostas' => $answer_id,
						'id_objetivo' => $goal_id,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					$this->db->trans_start();
					$this->db->insert($this->tableProtocoloQuestionarioRespostasObjetivo, $tbl2_data);
					$this->db->trans_complete();
				}
			}
	    }

	    public function save_user_comment_for_profile($id_empresa,$id_usuario,$data)
	    {
			$this->db->trans_start();
			if(!empty($data['comment'])){

				$store_data = array(
					'id_protocolo_questionario_respostas' => $data['answer_id'],
					'id_usuario' => $id_usuario,
					'comentario' => $data['comment'],
					'usuario_atualizador' => $id_usuario,
				);
				$this->db->insert($this->tableProtocoloQuestionarioRespostaComentarios, $store_data);
			}
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			$result	=	$this->get_all_comments_by_answer_id($data['answer_id']);
			return $result;
	    }

		public function delete_comment_for_profile($comment_id)
	    {
			$this->db->trans_start();
			if(!empty($comment_id)){

				// $this->db->where('id_cargo',$comment_id);
				// $query 	= 	$this->db->delete($this->tableProtocoloQuestionarioRespostaComentarios);
			}
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
	    }

	    public function get_user_team_by_id($id_usuario)
		{
			$this->db->select("id_time,nome_unidade");
			$this->db->from($this->viewUsuariosTime.' vut');
			$this->db->where('vut.id_usuario', $id_usuario);
			$query 			= 	$this->db->get();
			return $query->row_array();
		}

		public function get_my_time_by_empresa_id($id_empresa, $id_usuario,$start_date,$end_date, $team_id=null){

			if($team_id == '' || $team_id == 0){
				$team_data = $this->get_user_team_by_id($id_usuario);
				$team_id = isset($team_data['id_time'])?$team_data['id_time']:'';
	    	}
			$result = [];
	    	if($team_id){
	    		$this->db->select("tu.id_usuario as id_usuario,tu.id_usuario as member_id, tu.id_empresa,tu.url_image as image, tu.nome_usuario as name,tet.nome_unidade as teamname, tu.data_atualizacao as date_update, tet.id_usuario as authorised");
				$this->db->from($this->tableUser.' tu');
				$this->db->join($this->viewUsuariosTime . ' tet', 'tet.id_usuario = tu.id_usuario', 'left');
				$this->db->where('tet.id_time', $team_id);
				$this->db->or_where('tu.id_gestor', $id_usuario);
				$this->db->where('tu.ativo', 1);
				$this->db->group_by('tu.id_usuario');
				$is_admin 		= 	$this->session->userdata('admin');
				$query 			= 	$this->db->get();
				$result 		=  	$query->result_array();
	    	}

			$goals_len 		= 	0;
			$totalelosrec 	= 	0;
			$totalelosSent 	= 	0;

			$updates_data	=	[];
			$statics	=	[];
			if(!empty($result)){
				foreach($result as $userindex=>&$user){

					$updates 	=	$this->get_user_updates_for_profile($user['id_usuario'], false, $start_date,$end_date);
					if(!empty($updates)){
						$user['updates'] 	=	$updates;

						$total_updates = isset($user['updates'])?$user['updates']:[];
						$updates_data[count($total_updates)][]	=	array('name'=>$user['name'],'id'=>$user['id_usuario']);


						$details 			= 	$this->get_my_recieved_feedbacks($user['id_usuario'], $start_date,$end_date);
						$user['elos'] 		= 	$this->get_elos_by_members_id(array($user['id_usuario']),$start_date,$end_date, true, 0)['elos'];
						$user['elos_stats'] = 	$this->get_elos_stats_by_id($user['id_usuario']);

						$user['member_id'] 	= 	$user['id_usuario'];
						$totalelosrec		+=	$user['elos_stats']['receivedCount'];
						$totalelosSent		+=	$user['elos_stats']['sentCount'];
						if(!empty($details)){
							foreach($details as $index=>$detail){
								$details[$index] 	= 	$detail;
								$service 			= 	new servicedao();

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
						$user['feedbacks'] 	= 	$details;
						if(!empty($user['updates'])){
							foreach($user['updates'] as $key=>&$update){
								$goals_len += count($update['goals']);

								if($update['publico'] == 0){
									if($user['id_usuario'] == $id_usuario || $is_admin){
										$update['questions']	=	$this->get_user_update_by_id_for_profile($update['id'], $user['id_usuario'], $user['id_empresa']);
									}else{
										unset($update);
										unset($user['updates'][$key]);
									}
								}else{
									$update['questions']	=	$this->get_user_update_by_id_for_profile($update['id'], $user['id_usuario'], $user['id_empresa']);
								}
							}
						}
						//reindex if anything removed;
						sort($user['updates']);
					}else{
						$user['updates'] 	=	[];
						$user['elos'] 		=	[];
						$user['elos_stats'] =	[];
						$user['member_id'] 	= 	$user['id_usuario'];
					}
					$user['updatecount']	=	count($user['updates']);
					if(!empty($user['image'])){
						$user_image 		=	$user['image'];
						$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$user_image;
						$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$user_image;
						$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$user_image;
					}else{
						$user['image'] 		= 	null;
						$user['xs_image'] 	= 	null;
						$user['md_image'] 	= 	null;
					}
				}

				$statics['goals'] 			= 	$goals_len;
				sort($updates_data);
				$statics['least_updates'] 	= 	array_pop($updates_data);
				$statics['most_updates'] 	= 	isset($updates_data[0])?$updates_data[0]:$statics['least_updates'];
				sort($result);

			}
			$goals 						= 	$this->get_goals_between_period($team_id, $start_date,$end_date, $id_empresa);
			$statics['link_goals']		=	$goals;
			$statics['totalelosreceived']=	$totalelosrec;
			$statics['totalelossent']	=	$totalelosSent;
			return array($result,$statics);
	    }


		function array_sort($array, $on, $order=SORT_ASC){

			$new_array = array();
			$sortable_array = array();

			if (count($array) > 0) {
				foreach ($array as $k => $v) {
					if (is_array($v)) {
						foreach ($v as $k2 => $v2) {
							if ($k2 == $on) {
								$sortable_array[$k] = $v2;
							}
						}
					} else {
						$sortable_array[$k] = $v;
					}
				}
				switch ($order) {
					case SORT_ASC:
						asort($sortable_array);
						break;
					case SORT_DESC:
						arsort($sortable_array);
						break;
				}
				foreach ($sortable_array as $k => $v) {
					$new_array[$k] = $array[$k];
				}
			}
			return $new_array;
		}

	    public function get_goals_between_period($team_id, $start_date=0,$end_date=0, $id_empresa=null)
	    {
	    	if($team_id){
	    		$this->db->select("obj.nome, obj.id_objetivo as id, obj.percentual as percentage");
		    	$this->db->from('ttl_objetivos obj, ttl_objetivos_compartilhados comp');
		    	if($start_date != 0 && $end_date !=0){
					$this->db->where('date(obj.data_atualizacao) <=', $start_date);
					$this->db->where('date(obj.data_atualizacao) >=', $end_date);
				}
				$this->db->where('obj.ativo', 1);
				if($id_empresa!=null){
				    $this->db->where('obj.id_empresa', $id_empresa);
				}

				$this->db->where('obj.parent_id is not null');
				$this->db->where('(obj.id_time = '.$team_id.' or comp.id_time = '.$team_id.')');
				$this->db->group_by('obj.id_objetivo');
		    	$query = $this->db->get();
		    	return  $query->result_array();
	    	}else{
	    		return [];
	    	}


	    }

	    public function get_team_members_by_id_empresa($id_empresa)
	    {
	    	$this->db->select("id_usuario as id, nome_usuario as name, id_empresa, nome_cargo, image, email");
	    	$this->db->from($this->viewUsuariosTime);
	    	$this->db->where('id_empresa', $id_empresa);
	    	$query = $this->db->get();
	    	return  $query->result_array();

	    }
	    public function get_team_members_by_id_team($id_team)
	    {
	    	$this->db->select("id_usuario as id, nome_usuario as name, id_empresa, nome_cargo, image, email");
	    	$this->db->from($this->viewUsuariosTime);
	    	$this->db->where('id_time', $id_team);
	    	$query = $this->db->get();
	    	return  $query->result_array();

	    }

		public function get_questions_by_id($id_empresa,$start_date=0,$end_date=0)
	    {
	    	$this->db->select('vpg.id_pergunta as id_pergunta,vpg.id_questionario,vpg.nome_questionario as name,vpg.pergunta as question,vpg.ordem as ordem,vpg.tipo as type, vpg.data_atualizacao,tp.escala');
	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
	    	$this->db->where('vpg.id_empresa', $id_empresa);

	    	$this->db->where('vpg.tipo_questionario', 'c');
	    	$this->db->order_by('vpg.pergunta', 'ASC');
	    	$query 		= 	$this->db->get();
	    	$result 	=  	$query->result_array();
			return $result;
	    }

	    public function get_development_questions_by_id($id_empresa)
	    {
	    	$this->db->select('vpg.id_pergunta as id_pergunta,vpg.id_questionario,vpg.nome_questionario as name,vpg.pergunta as question,vpg.ordem as ordem,vpg.tipo as type, vpg.data_atualizacao,tp.escala');
	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
	    	$this->db->where('vpg.id_empresa', $id_empresa);

	    	$this->db->where('vpg.tipo_questionario', 'b');
	    	$this->db->order_by('vpg.id_pergunta', 'ASC');
	    	$query 		= 	$this->db->get();
	    	$result 	=  	$query->result_array();
			return $result;
	    }

	    public function get_user_questions_by_id($id_empresa)
	    {
	    	$this->db->select('id_pergunta as id_pergunta,id_questionario,nome_questionario as name,pergunta as question,ordem as ordem,tipo as type, data_atualizacao');
	    	$this->db->from($this->viewPerguntasGeral . ' vpg');
	    	$this->db->where('vpg.id_empresa', $id_empresa);
	    	$this->db->where('vpg.tipo_questionario', 'c');
	    	$this->db->order_by('vpg.pergunta', 'ASC');
	    	$query 				= 	$this->db->get();
	    	$result 			=  	$query->result_array();
	    	$questions_group 	=	array();
	    	if(!empty($result)){
				foreach($result as $row){
					$questions_group[$row['id_questionario']][] 	=	$row;
				}
			}else{
				$questions_group	=	array();
			}
			return $questions_group;
	    }
	    public function get_user_answers_by_id($id_protocolo, $id_pergunta,$user_id,$for_user=null)
	    {
	    	$this->db->select('id_protocolo_questionario_respostas as id,id_pergunta,resposta_qualitativa,rating_score');
	    	$this->db->from($this->tableProtocoloQuestionarioResposta . ' tqr');
	    	if($for_user != null){
	    		$this->db->where('tqr.id_usuario', $for_user);
	    	}else{
	    		$this->db->where('tqr.id_usuario', $user_id);
	    	}

	    	$this->db->where('tqr.id_pergunta', $id_pergunta);
	    	$this->db->where('tqr.id_protocolo', $id_protocolo);

	    	$query = $this->db->get();
	    	$answers 	=	$query->result_array();
			if(!empty($answers)){
				foreach($answers as &$answer){
					$answer['comments']	=	$this->get_all_comments_by_answer_id($answer['id'],2);
				}
			}
			return $answers;


	    }
	    public function get_user_multiple_answers_by_id($id_protocolo, $id_pergunta,$user_id,$for_user=null)
	    {
	    	$this->db->select('tqr.id_protocolo_questionario_respostas as id,tpr.resposta as response');
	    	$this->db->from($this->tableProtocoloQuestionarioResposta . ' tqr');
	    	$this->db->join($this->tablePerguntaResposta . ' tpr', 'tpr.id_pergunta_resposta = tqr.id_pergunta_resposta', 'inner');
	    	if($for_user != null){
	    		$this->db->where('tqr.id_usuario', $for_user);
	    	}else{
	    		$this->db->where('tqr.id_usuario', $user_id);
	    	}

	    	$this->db->where('tqr.id_pergunta', $id_pergunta);
			$this->db->where('tqr.id_protocolo', $id_protocolo);
	    	$query 		= 	$this->db->get();
	    	$answers 	=	$query->result_array();
			if(!empty($answers)){
				foreach($answers as &$answer){
					$answer['comments']	=	$this->get_all_comments_by_answer_id($answer['id'],2);
				}
			}
			return $answers;
	    }
	    public function get_all_comments_by_answer_id($answer_id, $limit=null)
	    {
	    	$this->db->select('tqrc.id_protocolo_questionario_respostas as id,tu.nome_usuario as name,tu.id_empresa,tu.url_image as image,tqrc.comentario as comment,tqrc.data_atualizacao as date_update');
	    	$this->db->from($this->tableProtocoloQuestionarioRespostaComentarios . ' tqrc');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tqrc.id_usuario', 'inner');
	    	$this->db->where('tqrc.id_protocolo_questionario_respostas', $answer_id);
	    	$this->db->order_by('tqrc.data_atualizacao', 'DESC');

	    	$query = $this->db->get();
			$all_comments 	=	$query->result_array();
			if(!empty($all_comments)){
				foreach($all_comments as &$comment){
					if(!empty($comment['image'])){
						$image_name 			=	$comment['image'];
						$comment['image'] 		= 	base_url('assets/img') . '/'. $comment['id_empresa'] .'/'.$image_name;
						$comment['xs_image'] 	= 	base_url('assets/img') . '/'. $comment['id_empresa'] .'/50/'.$image_name;
						$comment['md_image'] 	= 	base_url('assets/img') . '/'. $comment['id_empresa'] .'/150/'.$image_name;
					}else{
						$comment['image'] 		= 	null;
						$comment['xs_image'] 	= 	null;
						$comment['md_image'] 	= 	null;
					}
				}
			}
			return $all_comments;
	    }

	    public function get_all_goals_by_update_id($update_id, $limit=null)
	    {
	    	$this->db->select('tg.id_objetivo as id, nome as title, tg.descricao as description, tg.id_empresa as id_empresa, tg.percentual as percentage,tg.cor as color');
	    	$this->db->from($this->tableGoals . ' tg');
	    	$this->db->join($this->tableProtocoloQuestionarioRespostasObjetivo . ' tqro', 'tqro.id_objetivo = tg.id_objetivo', 'inner');
	    	$this->db->join($this->tableProtocoloQuestionarioResposta . ' tpqr', 'tpqr.id_protocolo_questionario_respostas = tqro.id_protocolo_questionario_respostas', 'inner');
	    	$this->db->where('tpqr.id_protocolo', $update_id);
	    	$this->db->group_by('tg.id_objetivo');
	    	$this->db->order_by('tqro.data_atualizacao', 'DESC');

	    	$query = 	$this->db->get();
			return $query->result_array();
	    }

	    public function get_keys_by_tag($tag, $id)
	    {
	    	$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, id_objetivo as tatic_id, progresso as percentage, responsavel');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableEtiquetaRChave . ' ter', 'ter.id_rchave = trc.id_resultado_chave', 'inner');
	    	$this->db->join($this->tableEtiquetas . ' te', 'te.id_etiqueta = ter.id_etiqueta', 'inner');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_empresa = te.id_empresa', 'inner');
	    	$this->db->where('te.nome_etiqueta like \'%' . $tag . '%\'');
	    	$this->db->where('tu.id_usuario', $id);

	    	$query = $this->db->get();

	    	$retornoKey = array();
	    	$keys = $query->result_array();

	    	if($keys != null){

	    		foreach ($keys as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);
	    			$value['user'] = $user[0];
	    			array_push($retornoKey, $value);
	    		}
	    	}

	    	return $retornoKey;

	    }

	    public function get_keys_by_activity($tag, $id)
	    {
	    	$this->db->select('ta.id_atividade as id, parent_id as tatic_id, id_resultado_chave as key_id, ta.nome as title, progresso as percentage, responsavel');
	    	$this->db->from($this->tableActivities . ' ta');
	    	$this->db->join($this->tableAtvTag . ' tea', 'tea.id_atividade = ta.id_atividade', 'inner');
	    	$this->db->join($this->tableEtiquetas . ' te', 'te.id_etiqueta = tea.id_etiqueta', 'inner');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_empresa = te.id_empresa', 'inner');
	    	$this->db->where('te.nome_etiqueta like \'%' . $tag . '%\'');
	    	$this->db->where('tu.id_usuario', $id);

	    	$query = $this->db->get();

	    	$retornoKey = array();
	    	$keys = $query->result_array();

	    	if($keys != null){

	    		foreach ($keys as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);
	    			$value['user'] = $user[0];
	    			array_push($retornoKey, $value);
	    		}
	    	}

	    	return $retornoKey;

	    }

	    public function get_keys_by_id_responsavel( $id, $year = null, $id_ciclo = null)
	    {
	    	$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.id_objetivo as tatic_id, progresso as percentage, trc.responsavel');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableGoals, $this->tableGoals.'.id_objetivo = trc.id_objetivo', 'inner');

	    	if($year){
	    		if($id_ciclo){
	    			$this->db->join($this->tableObjCiclo, $this->tableObjCiclo.'.id_objetivo = '.$this->tableGoals.'.id_objetivo', 'inner');
	    			$this->db->join($this->tableCycle, $this->tableObjCiclo.'.id_ciclo = '.$this->tableCycle.'.id_ciclo', 'inner');
	    			$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
	    		}else{
	    			$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableGoals.'.id_janela', 'inner');
	    			$this->db->where('YEAR('.$this->tableWindow.'.data_inicial)', $year);
	    		}
	    	}
	    	$this->db->where('trc.responsavel = '.$id);
	    	$query = $this->db->get();
	    	$retornoKey= $query->result_array();

	    	return $retornoKey;

	    }

	    public function get_keys_by_id_objective( $id, $year = null, $id_ciclo = null)
	    {
	    	$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.id_objetivo as tatic_id, progresso as percentage, trc.responsavel');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableGoals, $this->tableGoals.'.id_objetivo = trc.id_objetivo', 'inner');

	    	if($year){
	    		if($id_ciclo){
	    			$this->db->join($this->tableObjCiclo, $this->tableObjCiclo.'.id_objetivo = '.$this->tableGoals.'.id_objetivo', 'inner');
	    			$this->db->join($this->tableCycle, $this->tableObjCiclo.'.id_ciclo = '.$this->tableCycle.'.id_ciclo', 'inner');
	    			$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
	    		}else{
	    			$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableGoals.'.id_janela', 'inner');
	    			$this->db->where('YEAR('.$this->tableWindow.'.data_inicial)', $year);
	    		}
	    	}
	    	$this->db->where('trc.id_objetivo = '.$id);
	    	$query = $this->db->get();
	    	$retornoKey= $query->result_array();

	    	return $retornoKey;

	    }


	    public function get_activity_by_resposavel($id, $year = null, $id_ciclo = null)
	    {
	    	$this->db->select('ta.id_atividade as id, ta.parent_id as tatic_id, ta.id_resultado_chave as key_id, ta.nome as title, ta.progresso as percentage,ta.atraso, ta.responsavel, ta.data_ini as init, ta.data_fim as fim');
	    	$this->db->from($this->tableActivities . ' ta');
	    	$this->db->join($this->tableResultadoChave, $this->tableResultadoChave.'.id_resultado_chave = ta.id_resultado_chave', 'inner');
	    	$this->db->join($this->tableGoals, $this->tableGoals.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');

	    	if($year){
	    		if($id_ciclo){
	    			$this->db->join($this->tableObjCiclo, $this->tableObjCiclo.'.id_objetivo = '.$this->tableGoals.'.id_objetivo', 'inner');
	    			$this->db->join($this->tableCycle, $this->tableObjCiclo.'.id_ciclo = '.$this->tableCycle.'.id_ciclo', 'inner');
	    			$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
	    		}else{
	    			$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableGoals.'.id_janela', 'inner');
	    			$this->db->where('YEAR('.$this->tableWindow.'.data_inicial)', $year);
	    		}
	    	}
	    	$this->db->where('ta.responsavel = '.$id);
	    	$this->db->where('ta.ativo', 1);
	    	$this->db->where('ta.perfil', 1);

	    	$query = $this->db->get();
	    	$retornoKey = array();
	    	$retornoKey = $query->result_array();


	    	return $retornoKey;

	    }
	    public function get_activity_by_resposavel_profile($id)
	    {
	    	$this->db->select('ta.id_atividade as id, ta.parent_id as tatic_id, ta.id_resultado_chave as key_id, ta.nome as title, ta.descricao as description, ta.progresso as percentage,ta.atraso, ta.responsavel, ta.data_ini as init, ta.data_fim as fim, ta.perfil');
	    	$this->db->from($this->tableActivities . ' ta');
	    	$this->db->join($this->tableResultadoChave, $this->tableResultadoChave.'.id_resultado_chave = ta.id_resultado_chave', 'inner');
	//    	$this->db->join($this->tableAtvResponsive . ' tar','tar.id_atividade = ta.id_atividade', 'left');
	    	$this->db->join($this->tableGoals, $this->tableGoals.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');

	    	$this->db->where('(ta.responsavel = '.$id.' )');
	    	$this->db->where('ta.ativo', 1);
	    	$this->db->where('perfil', 1);

	    	$query = $this->db->get();
	    	$retornoKey = array();
	    	$retornoKey = $query->result_array();

	    	return $retornoKey;

	    }

	    public function get_members_by_team($id)
	    {
	    	$this->db->select("tu.id_usuario as id, tu.nome_usuario as name, url_image as image, ttu.id_empresa_time as id_empresa");
	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->join($this->tableUserTeam . ' ttu', 'ttu.id_usuario = tu.id_usuario', 'inner');
	    	$this->db->where('tu.ativo = 1 and ttu.id_empresa_time = ' . $id);
	    	$query = $this->db->get();

	    	$retorno = $query->result_array();
            return $retorno;

	    }
	    //M�todo respons�vel por retornar os times e os seus membros
	    public function get_all_teams_members($id_empresa)
	    {
	    	$this->db->select("id_time as id, nome_unidade as name");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where($this->tableTeams.'.id_empresa', $id_empresa);

	    	$query = $this->db->get();
	    	$retorno = $query->result_array();

	    	$array_return = array();

	    	foreach($retorno as $item)
	    	{
	    		$retornoTeam['id'] = $item['id'];
	    		$retornoTeam['name'] = $item['name'];
	    		$retornoTeam['members'] =  $this->get_members_by_team($item['id']);

	    		array_push($array_return, $retornoTeam);

	    	}

	    	return $array_return;

	    }

	    public function get_teams_details_by_id_time($id_time)
	    {
	    	$this->db->select("id_time as id, nome_unidade as name, ativo as active, atualizacao as atualizacao, parent_id as team, id_usuario_responsavel as id_usuario");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where($this->tableTeams.'.id_time', $id_time);

	    	$query = $this->db->get();

	    	$retorno = $query->result_array();

	    	$userResp = array();

	    	if($retorno[0]['id_usuario'] != null && $retorno[0]['id_usuario'] > 0 ){
	    		$userResp = $this->get_users_details_by_id($retorno[0]['id_usuario']);
	    	}
	    	$tags = array();
	    	if(!empty($retorno)){
	    		$tags = $this->get_tags_by_team($retorno[0]['id']);
	    	}


	    	$retorno[0]['user'] = (sizeof($userResp) > 0 ) ? $userResp[0] : $userResp;

	    	$retorno[0]['members'] = $this->get_members_by_team($retorno[0]['id']);
	    	$retorno[0]['tags'] = $tags;

	    	return $retorno;

	    }

	    public function get_tags_by_team($id){

	    	$this->db->select("tt.id_etiqueta as id, nome_etiqueta as name");
	    	$this->db->from($this->tableEtiquetasTimes . ' tat');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = tat.id_etiqueta', 'inner');
	    	$this->db->where('tat.id_times = ' . $id);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_cargo_details_by_id_cargo($id_cargo)
	    {
	    	$this->db->select("id_cargo as id, id_empresa as id_empresa, nome_cargo as name, descricao_cargo as description, critico as critical, tempo_prench_vaga as completion_time, remuneracao_media as media, ativo as active, data_atualizacao as date_update, usuario_atualizador as id_usuario");
	    	$this->db->from($this->tableCargos);
	    	$this->db->where($this->tableCargos.'.id_cargo', $id_cargo);

	    	$query = $this->db->get();

	    	$retorno = $query->row_array();

	    	$userResp = array();

	    	if($retorno['id_usuario'] != null && $retorno['id_usuario'] > 0 ){
	    		$userResp = $this->get_users_details_by_id($retorno['id_usuario']);
	    	}


	    	$retorno['user'] = (sizeof($userResp) > 0 ) ? $userResp : $userResp;

	    	$retorno['comptensia'] = $this->get_comptensia_by_id($retorno['id']);
	    	$retorno['questionario'] = $this->get_questionario_by_id($retorno['id']);
	    	//$retorno['comptensia'] = ["Amsterdam","Washington","Sydney","Beijing","Cairo"];
			//print_r($retorno);die;
	    	return $retorno;

	    }
	    public function get_integration_details_by_id($id)
	    {
	    	$this->db->select("id_integracoes as id,nome as name,tipo as type,connection as host,comando_sql as sql_command,porta as port,database,database, password,metodo,parametrows,username,soap_address,name_space");
	    	$this->db->from($this->tableIntegraions);
	    	$this->db->where($this->tableIntegraions.'.id_integracoes', $id);

	    	$query = $this->db->get();

	    	$retorno = $query->row_array();
	    	return $retorno;

	    }

	     public function get_questionario_by_id($id_cargo)
			{
				$this->db->select("tq.id_questionarios as id, nome_questionario as name");
				$this->db->from($this->tableCargosQuestionario . ' tcq');
				$this->db->join($this->tableQuestionario . ' tq', 'tq.id_questionarios = tcq.id_questionario', 'inner');
				$this->db->where('tcq.id_cargo = ' . $id_cargo);
				$query = $this->db->get();

				$result =  $query->row_array();

				return $result;
			}

		public function get_comptensia_by_id($id_cargo)
		{
			$this->db->select("tc.id_competencia as id, tc.nome_competencia as name");
			$this->db->from($this->tableCargoCompetencias . ' ttc');
			$this->db->join($this->tableCompetencias . ' tc', 'tc.id_competencia = ttc.id_competencia', 'inner');
			$this->db->where('ttc.ativo = 1 and ttc.id_cargo = ' . $id_cargo);
			$query = $this->db->get();

			$result =  $query->result_array();
			return $result;
		}

	    public function add_globals_labels($data)
	    {

	    	$this->db->trans_start();

	    	$id_empresa = $data['id_empresa'];
	    	$tags = $data['tags'];
	    	$teams = $data['teams'];
	    	$responsaveis = $data['responsaveis'];
	    	$usuario = $data['usuario'];
	    	$year = $data['year'];

	    	$id_janeta = $this->get_id_janela_by_ano_base($year, $id_empresa);
	    	unset($data['tags']);
	    	unset($data['teams']);
	    	unset($data['responsaveis']);
	    	unset($data['usuario']);
	    	unset($data['year']);

	    	$data['id_janela'] = $id_janeta;

	    	$this->db->insert($this->tableObjetivos, $data);
	    	$id_objetivo = $this->db->insert_id();

	    	if($teams){
		    	foreach($teams as $item){
		    		$teamData = array(
		    				'id_objetivo' => $id_objetivo,
		    				'id_time' => $item['id'],
		    				'peso' => $item['value'],
		    				'usuario' => $usuario
		    		);

		    		$this->db->insert($this->tableObjPesoTime, $teamData);
		    	}
	    	}

	    	if($tags && sizeof($tags) > 0){
		    	foreach($tags as $item2){
		    		if($item2 != "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_objetivo' => $id_objetivo,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableEtiquetaObj, $tagObjData);
		    		}

		    	}
	    	}

	    	if($responsaveis){
		    	foreach($responsaveis as $item3){

		    		$respData = array(
		    				'id_objetivo' => $id_objetivo,
		    				'id_usuario' => $item3
		    		);

		    		$this->db->insert($this->tableObjResponsaveis, $respData);
		    	}
	    	}


	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();

	    	if( $id_objetivo ){
	    		return $id_objetivo;
	    	}else{
	    		return FALSE;
	    	}


	    }

	    public function checkTagsCadastradas($tag, $id_empresa)
	    {
	    	$this->db->select('id_etiqueta');
	    	$this->db->from($this->tableEtiquetas);
	    	$this->db->where($this->tableEtiquetas.'.id_empresa',  $id_empresa);
	    	$this->db->where($this->tableEtiquetas.'.nome_etiqueta',  $tag);
	    	$this->db->limit(1);

	    	$query = $this->db->get();
	    	$result = $query->result_array();

	    	if( sizeof($result) > 0  ){
	    		return $result[0]['id_etiqueta'];
	    	}else{
	    		$tagData = array(
	    				'id_empresa' => $id_empresa,
	    				'nome_etiqueta' => $tag,
	    				'ativo' => 1
	    		);
	    		$this->db->insert($this->tableEtiquetas, $tagData);
	    		return $this->db->insert_id();
	    	}
	    }

	    public function insert_new_feedback($id_usuario, $tousers, $description, $visibility, $valore_id, $tipo_feedback)
	    {
	        $insertedIds = [];
            foreach ($tousers as $touser) {
                $data = array(
                    'id_usuario_destino' => $touser,
                    'usuario_atualizador' => $id_usuario,
                    'resposta' => $description,
                    'publico' => $visibility,
                    'tipo_feedback' => $tipo_feedback
                );
                if(!empty($data)){
                    $this->db->insert($this->tablefeedback, $data);
                    $id_feedback = $this->db->insert_id();
                    $insertedIds[] = $id_feedback;
                    if($id_feedback && !empty($valore_id)){
                        foreach($valore_id as $valore){
                            $store_data = array(
                                'id_feedback' => $id_feedback,
                                'id_valores' => $valore,
                            );
                            $this->db->insert($this->tablefeedbackValores, $store_data);
                        }
                    }
                }
            }
            return $insertedIds;
	    }
	    public function insert_private_note_profile($id_usuario,$to_user, $description, $private_notes, $valore_id)
	    {
			$data = array(
					'id_usuario_destino' => $to_user[0],
					'usuario_atualizador' => $id_usuario,
					'resposta' => $description,
					'private' => $private_notes
			);
			if(!empty($data)){
				$this->db->insert($this->tablefeedback, $data);
				$id_feedback = $this->db->insert_id();
				if($id_feedback && !empty($valore_id)){
					foreach($valore_id as $valore){
						$store_data = array(
							'id_feedback' => $id_feedback,
							'id_valores' => $valore,
						);
						$this->db->insert($this->tablefeedbackValores, $store_data);
					}
				}
				return true;
			}
	    }
	    public function request_new_feedback($id_usuario, $requestuser, $description)
	    {
			$data = array(
					'id_usuario_destino' => $id_usuario,
					'usuario_atualizador' => $requestuser[0],
					'solicitacao' => $description
			);
			if(!empty($data)){
				$this->db->insert($this->tablefeedback, $data);
				$id_feedback = $this->db->insert_id();
				return $id_feedback;
			}
			else return false;
	    }
	    public function update_activity_todo( $id_usuario, $activity_id, $todo, $atraso)
	    {
	    	if($todo == 0 && $atraso == 0){
	    		$situacao = 0;
	    	}else if($todo == 50 && $atraso == 0){
	    		$situacao = 2;
	    	}else if($todo == 100 && $atraso == 0){
	    		$situacao = 1;
	    	}else if($todo == 50 && $atraso == 1){
	    		$situacao = 2;
	    	}
			if($todo == 100 && $atraso == 0){
				$data = array(
					'atraso' => $atraso,
					'progresso' => $todo,
					'perfil' => 0,
					'situacao' => $situacao,
				);
			}else{
				$data = array(
					'atraso' => $atraso,
					'progresso' => $todo,
					'situacao' => $situacao,
				);
			}
			if(!empty($data)){
				$this->db->trans_start();

				$this->db->update($this->tableActivities, $data, 'id_atividade = '.$activity_id);

				$result = $this->db->trans_status();
				$this->db->trans_complete();
				return $result;
			}
	    }

	    public function update_desempnho_by_id( $avalicao_id, $desempnho)
	    {
			$data = array(
					'desempenho' => $desempnho
			);
			if(!empty($data)){
				$this->db->trans_start();
				$this->db->where('id_protocolo_avaliacao',$avalicao_id);
				$this->db->update($this->tableProtocoloAvaliacao, $data);
				$result = $this->db->trans_status();
				$this->db->trans_complete();
				return $result;
			}
	    }
	    public function update_valor_skills_by_id( $id_usuario, $id_ciclo, $avg_valor, $avg_skill)
	    {

				$data = array(
					'valores' => $avg_valor,
					'competencias' => $avg_skill
				);

			if(!empty($data)){
				$this->db->trans_start();
				$this->db->where('id_ciclo',$id_ciclo);
				$this->db->where('id_usuario',$id_usuario);
				$this->db->update($this->tableProtocoloAvaliacao, $data);

				$result = $this->db->trans_status();
				$this->db->trans_complete();
				return $result;
			}
	    }
	    public function update_final_review_by_id( $avalicao_id, $valore=null, $desempnho=null, $performance=null,$comment=null,$geral=null)
	    {
			$data 	= 	array(
							'valores' => $valore,
							'desempenho' => $desempnho,
							'performance' => $performance,
							'avaliacao_quali' => $comment,
							'geral' => $geral
						);

			if(!empty($data)){
				$this->db->trans_start();
				$this->db->where('id_protocolo_avaliacao',$avalicao_id);
				$this->db->update($this->tableProtocoloAvaliacao, $data);
				$result = $this->db->trans_status();
				$this->db->trans_complete();
				return $result;
			}
	    }


	    public function checkObjTagsRelated($id_etiqueta, $id_objetivo)
	    {
	    	$this->db->select('id_etiqueta');
	    	$this->db->from($this->tableTagObj );
	    	$this->db->where($this->tableTagObj.'.id_objetivo',  $id_objetivo);
	    	$this->db->where($this->tableTagObj.'.id_etiqueta',  $id_etiqueta);
	    	$this->db->limit(1);

	    	$query = $this->db->get();
	    	$result = $query->result_array();

	    	if( sizeof($result) > 0  ){
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	    public function get_id_janela_by_ano_base($year, $id_empresa)
	    {
	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableWindow);
	    	$this->db->where($this->tableWindow.'.id_empresa', $id_empresa);
	    	$this->db->where('year(' . $this->tableWindow.'.data_inicial)', $year);
	    	$this->db->limit(1);
	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	return $result[0]['id_janela'];
	    }

	    public function add_objetivos_taticos($data)
	    {

	    	$this->db->trans_start();

	    	$id_empresa 	= 	$data['id_empresa'];
	    	$tags 			= 	$data['tags'];
	    	$responsaveis 	= 	$data['responsaveis'];
	    	$usuario 		= 	$data['usuario'];
	    	$ciclos 		= 	$data['ciclos'];
	    	$id_janeta 		= 	$this->get_id_janela_by_id_ciclo($data['ciclos'][0]);
	    	if($data['estrategico'] == 1){
	    		$data['estrategico'] = 1;
	    	}else{
	    		$data['estrategico'] = 0;
	    	}

	    	unset($data['tags']);
	    	unset($data['responsaveis']);
	    	unset($data['usuario']);
	    	unset($data['ciclos']);

	    	$data['id_janela'] = $id_janeta;

	    	$this->db->insert($this->tableObjetivos, $data);
	    	$id_objetivo = $this->db->insert_id();
	    	$this->db->trans_complete();

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			$this->db->trans_start();
	    			if($item2 != "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_objetivo' => $id_objetivo,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableEtiquetaObj, $tagObjData);
	    			}
	    			$this->db->trans_complete();
	    		}
	    	}

	    	if($responsaveis){
	    		foreach($responsaveis as $teamid){
	    			$this->db->trans_start();
					$dataRelacionados = array(
						'id_objetivo' => $id_objetivo,
						'id_time' => $teamid['id'],
						'usuario_atualizador' => $data['usuario_atualizador'],
					);
					$this->db->insert($this->tableObjetivosRelacionados, $dataRelacionados);
					$this->db->trans_complete();
	    		}
	    	}

	    	$this->db->trans_start();
	    	$objPesoTime = array(
	    			'id_objetivo' => $id_objetivo,
	    			'id_time' => $data['id_time'],
	    			'peso' => $data['peso'],
	    			'usuario' => $data['usuario_atualizador']

	    	);

	    	$this->db->insert($this->tableObjPesoTime, $objPesoTime);
	    	$this->db->trans_complete();

	    	if($ciclos){
	    		$this->editar_ciclos_objetivo_by_id_objetivo($id_objetivo, $ciclos);
	    	}
	    	return $id_objetivo;
	    }

	    function update_usuario_password($id_usuario, $new_password, $current_password)
	    {

	    	$this->db->select('senha as password');
	    	$this->db->from($this->tableUser);
	    	$this->db->where('id_usuario',$id_usuario);
	    	$query = $this->db->get();
	    	$result = $query->row_array();

	    	if($result){
	    		$curr_password 		= 	sha1($current_password);
	    		$new_password_user 	= 	sha1($new_password);
	    		$data = array(
					'senha'=>$new_password_user
	    		);
	    		if($curr_password == $result['password']){

	    			$this->db->trans_start();
					$this->db->where('id_usuario', $id_usuario);
					$this->db->update($this->tableUser, $data);
					$result = $this->db->trans_status();
					$this->db->trans_complete();
					return $result;
	    		}
	    	}
			return false;
		}

	    public function get_id_janela_by_parent_id($parent_id)
	    {
	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.id_objetivo', $parent_id);
	    	$this->db->limit(1);
	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	return $result[0]['id_janela'];
	    }

	    public function get_id_janela_by_id_empresa_ano($id_empresa, $ano)
	    {
	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableWindow);
	    	$this->db->where($this->tableWindow.'.id_empresa', $id_empresa);
	    	$this->db->where('YEAR(data_inicial)', $ano);
	    	$this->db->limit(1);
	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	return $result[0]['id_janela'];
	    }

	    public function get_id_janela_by_id_ciclo($id_ciclo)
	    {
	    	$this->db->select('id_janela');
	    	$this->db->from($this->tableCycle);
	    	$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
	    	$this->db->limit(1);
	    	$query = $this->db->get();

	    	$result = $query->result_array();

	    	return $result[0]['id_janela'];
	    }
	    public function count_all_key_results_by_id($id_objectivo){
	    	$this->db->select('count(*) as total_key');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_objetivo', $id_objectivo);
	    	$this->db->where('trc.ativo', 1 );

	    	$query = $this->db->get();
	    	$globals = $query->row_array();
	    	return $globals['total_key'];
	    }

		public function get_details_goals_by_id($id, $user)
	    {
	    	$this->db->select('id_objetivo as id, nome as title, tw.descricao as description, tw.id_empresa as id_empresa, percentual as percentage, qtd_atividades as objectives, year(te.data_final) as \'year\', cor as color, responsavel');
	    	$this->db->from($this->tableGoals . ' tw');
	    	$this->db->join($this->tableWindow . ' te', 'te.id_janela = tw.id_janela', 'inner');
	    	$this->db->where('tw.id_objetivo', $id);
	    	// $this->db->where('tw.parent_id is null');
	    	$this->db->where('tw.ativo', 1 );

	    	$query = $this->db->get();

	    	$retorno = array();
	    	$globals = $query->result_array();

	    	if($globals != null){

	    		foreach ($globals as $value) {
	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);
	    			$value['user'] = $user[0];
	    			if(!empty($value['user']['image'])){
						$value['user']['image'] 	= 	$user[0]['image'];
						$value['user']['xs_image'] 	= 	$user[0]['xs_image'];
						$value['user']['md_image'] 	= 	$user[0]['md_image'];
					}else{
						$value['user']['image'] 	= 	null;
						$value['user']['xs_image'] 	= 	null;
						$value['user']['md_image'] 	= 	null;
					}
	    			array_push($retorno, $value);
	    		}
	    	}

	    	// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    	$this->db->select('tu.id_usuario as id, tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    	$this->db->from($this->tableObjResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_objetivo', $id);
	    	$query2 = 	$this->db->get();
			$users	=	$query2->result_array();
			if(!empty($users)){
				foreach($users as &$auser){
					$image 				=	$auser['image'];
					if($image!=""){
						$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
						$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
						$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
					}else{
						$auser['image']		=	null;
						$auser['xs_image']	=	null;
						$auser['md_image']	=	null;
					}
				}
				$retorno[0]['users'] = $users;
			}else{
				$retorno[0]['users'] = array();
			}

	    	//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    	$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    	$this->db->from($this->tableTagObj . ' toe');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query3 = $this->db->get();

	    	$retorno[0]['tags'] = $query3->result_array();

	    	// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj() "
	    	$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value, too.percentual as percentage');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    	$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query4 = $this->db->get();
	    	$retorno[0]['teams'] = $query4->result_array();

	    	// GET OBJETIVOS TATICOS BY ID OBJETIVO SEE "get_objetivos_tatico_by_id_objetivo"
	    	$this->db->select($this->tableGoals .'.id_objetivo as id, nome as title, percentual as percentage, situacao as status, cor as color, peso as weight, qtd_rchaves as \'keys\', responsavel, id_janela, id_time, usuario_atualizador as auth');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.parent_id', $id);
	    	$this->db->where('ativo', 1 );
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();
	    	$retornoTatico = array();
	    	if($tatic != null){

	    		foreach ($tatic as $value) {
	    	//TODO : VERIFICA ESSA REGRA COM O DANIEL
	    			$user = $this->get_data_resp($value['responsavel']);
	    			$cycle = $this->get_cycles_by_id_objetivo_related($value['id']);
	    			$team = $this->get_team_by_obj($value['id_time']);

	    			array_pop($value);
	    			array_pop($value);

	    			$value['user'] = isset($user[0])?$user[0]:[];
	    			$value['cycles'] = $cycle;

	    			if(sizeof($team) > 0){
	    				$value['team'] = $team[0];
	    			}
	    			$value['total_key'] = $this->count_all_key_results_by_id($value['id']);

	    			array_push($retornoTatico, $value);
	    		}
	    	}
	    	$retorno[0]['tatics'] = $retornoTatico;

	    	// GET TEAMWITHTATICS see "get_teamwithtatics_by_id_objetivo"
	    	$this->db->select('id_time');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.parent_id', $id);
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();

	    	$teamWithTatics = array();

	    	if($tatic != null){

	    		foreach ($tatic as $value) {

	    			$team = $this->get_team_by_obj($value['id_time']);

	    			if(sizeof($team) > 0){
	    				$teamWithTaticsTemp[$team[0]['id']] = array(
	    						'id' => $team[0]['id'],
	    						'name' =>  $team[0]['name'],
	    						'value' => $team[0]['value'],
	    						'percentage' =>  $team[0]['percentage']
	    				);
	    			}
	    		}
	    		foreach($teamWithTaticsTemp as $row){
	    			$teamWithTatics[] = $row;
	    		}
	    	}

	    	$retorno[0]['teamsWithTatics'] = $teamWithTatics;

	    	return $retorno;
	    }

		//kafruni
	    public function get_details_goals_tatics_by_id_empresa($id_empresa,$id_usuario){

	    	$this->db->select(	'tw.id_objetivo as id, tw.nome as title, tw.descricao as description, tw.parent_id as parent_id,
								tw.qtd_rchaves as \'keys\', tw.peso as weight, tw.situacao as status, tg.usuario_atualizador as authorised, tw.percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								tw.responsavel, tw.id_time, te.id_janela'
	    		);
	    	$this->db->from($this->viewGoals . ' tw');
	    	$this->db->join($this->tableGoals . ' tg', 'tg.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->where('tw.id_empresa', $id_empresa);
	    	$this->db->where('tw.id_usuario', $id_usuario );
	  		$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo');

	    	$query = $this->db->get();

	    	//$this->PQUERY();

	    	$retorno = array();
	    	$globals = $query->result_array();
	    	$i = 0;



	    	if($globals != null){

	    		foreach ($globals as $value) {


	    			$user = $this->get_data_resp($value['responsavel']);
	    			$id = $value['id'];

	    			array_pop($value);
	    			array_pop($value);
	    			$value['user'] = sizeof($user) > 0 ? $user[0] : array();

	    			array_push($retorno, $value);


	    			$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    			$retorno[$i]['cycles'] = $cycle;



	    			// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    			$this->db->select('tu.id_usuario as id,tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    			$this->db->from($this->tableObjResponsaveis . ' tr');
	    			$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    			$this->db->where('tr.id_objetivo', $id);
	    			$query2 = $this->db->get();

	    			$users	 	= $query2->result_array();
					if(!empty($users)){
						foreach($users as &$auser){
							$image 				=	$auser['image'];
							if($image!=""){
								$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
							}else{
								$auser['image']		=	null;
								$auser['xs_image']	=	null;
								$auser['md_image']	=	null;
							}
						}
						$retorno[$i]['users'] = $users;
					}else{
						$retorno[$i]['users'] = array();
					}

	    			//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    			$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    			$this->db->from($this->tableTagObj . ' toe');
	    			$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    			$this->db->where('toe.id_objetivo', $id);
	    			$query3 = $this->db->get();


	    			$retorno[$i]['tags'] = $query3->result_array();

	    			// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    			$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    			$this->db->from($this->tableObjPesoTime . ' toe');
	    			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    			$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    			$this->db->where('too.id_time', $globals[$i]['id_time']);
	    			$query4 = $this->db->get();

	    			$team = $query4->result_array();
	    			$retorno[$i]['team'] =  $team[0];


	    			// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    			$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,trc.medicao as Medicao, progresso as percentage, peso as weight, data_atualizacao as last_date, responsavel, atraso,usuario_atualizador as auth');
	    			$this->db->from($this->tableResultadoChave . ' trc');
	    			$this->db->where('trc.id_objetivo', $id);
	    			$query5 = $this->db->get();

	    			$keys = $query5->result_array();
	    			$keysReturn = array();


	    			if($keys != null){

	    				foreach ($keys as $ind=>$value) {

	    					$user = $this->get_data_resp($value['responsavel']);

	    					array_pop($value);

	    					$value['user'] = $user[0];
	    					$value['atraso']	=	$keys[$ind]['atraso'];
	    					array_push($keysReturn, $value);

	    				}
	    			}

	    			$retorno[$i]['keys'] = $keysReturn;

	    			if(!empty($keys)){
						foreach($keys as $index=>$key){
							$activities 	= 	$this->get_details_activities_r_key($key['id']);
							if(!empty($activities)){
								foreach($activities as $index2=>$activity){
									$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
								}
							}
							$retorno[$i]['keys'][$index]['activities'] = $activities;
						}
					}
	    			//$retorno[$i]['activities'] = $activities;

	    			// GET PARENT id, title, type
	    			$this->db->select($this->viewGoals.'.id_objetivo as id, '.$this->viewGoals.'.nome as title, (case when parent_id is null then "global" else "tatic" end) as type  ');
	    			$this->db->from($this->viewGoals);
	    			$this->db->where($this->viewGoals.'.id_objetivo', $globals[0]['parent_id']);
	    			$query6 = $this->db->get();
	    			$resultParent = $query6->result_array();

	    			$retorno[$i]['parent'] = (sizeof($resultParent) > 0 ) ? $resultParent[0] : array();
	    			//$this->PQUERY();

	    			$i++;

	    		}
	    	}
	    	return $retorno;


	    }


		//Método responsável por listar meus objetivos em profile
	    public function get_goals_tatics_profile($id_empresa,$id_usuario){

	    	$this->db->select('tw.id_objetivo as id, tw.nome as title, tw.descricao as description, tw.parent_id as parent_id,
								tw.qtd_rchaves as \'keys\', tw.peso as weight, tw.situacao as status, tg.cor as color, tg.situacao, tg.tipo as type, tg.usuario_atualizador as authorised, tw.percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								tw.responsavel, tw.id_time, te.id_janela'
	    		);
	    	$this->db->from($this->viewGoalsProfile . ' tw');
	    	$this->db->join($this->tableGoals . ' tg', 'tg.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->where('tw.id_empresa', $id_empresa);
	    	$this->db->where('tw.id_usuario', $id_usuario );
	    	$this->db->where('tw.parent_id is not null');
	    	$this->db->where('tw.situacao in(0,2)');
	  		$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo','DESC');
	    	$query = $this->db->get();
	    	$retorno = array();
	    	$globals = $query->result_array();
			return $globals;
	    }

	    // get with user info raptor
	    public function get_goals_tatics_profile_with_user($id_empresa,$id_usuario){

	    	$this->db->select('tw.id_objetivo as id, tw.nome as title, tw.descricao as description, tw.parent_id as parent_id,
								tw.qtd_rchaves as \'keys\', tw.peso as weight, tw.situacao as status, tg.cor as color, tg.situacao, tg.tipo as type, tg.usuario_atualizador as authorised, tu.nome_usuario as responsavel_name, tu.id_empresa as responsavel_empresa, tu.url_image as responsavel_image, tw.percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								tw.responsavel, tw.id_time, te.id_janela'
	    		);
	    	$this->db->from($this->viewGoalsProfile . ' tw');
	    	$this->db->join($this->tableGoals . ' tg', 'tg.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tw.responsavel', 'inner');
	    	$this->db->where('tw.id_empresa', $id_empresa);
	    	$this->db->where('tw.id_usuario', $id_usuario );
	    	$this->db->where('tw.parent_id is not null');
	    	$this->db->where('tw.situacao in(0,1,2)');
	  		$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo','DESC');
	    	$query = $this->db->get();
	    	$retorno = array();
	    	$globals = $query->result_array();
			return $globals;
	    }


		public function get_details_goals_tatics_by_id_empresa_id_cyclo($id_empresa,$id_ciclo){

	    	$this->db->select(	'tw.id_objetivo as id, nome as title, tw.descricao as description, tw.parent_id as parent_id,
								qtd_rchaves as \'keys\', peso as weight, situacao as status, percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								responsavel, id_time, te.id_janela'
	    	);
	    	$this->db->from($this->viewGoals . ' tw');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->where('tw.id_empresa', $id_empresa);
	    	$this->db->where('te.id_ciclo', $id_ciclo );
	    	$this->db->where('tw.ativo', 1 );
	    	$this->db->where('tw.parent_id',0);
	    	$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo');

	    	$query = $this->db->get();

	    	//$this->PQUERY();

	    	$retorno = array();
	    	$globals = $query->result_array();
	    	$i = 0;



	    	if($globals != null){

	    		foreach ($globals as $value) {


	    			$user = $this->get_data_resp($value['responsavel']);
	    			$id = $value['id'];

	    			array_pop($value);
	    			array_pop($value);

	    			//$this->debugMark('teste', $value);

	    			$value['user'] = sizeof($user) > 0 ? $user[0] : array();

	    			array_push($retorno, $value);


	    			$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    			$retorno[$i]['cycles'] = $cycle;



	    			// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    			$this->db->select('tu.id_usuario as id,tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    			$this->db->from($this->tableObjResponsaveis . ' tr');
	    			$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    			$this->db->where('tr.id_objetivo', $id);
	    			$query2 = $this->db->get();
					$users	=	$query2->result_array();
					if(!empty($users)){
						foreach($users as &$auser){
							$image 				=	$auser['image'];
							if($image!=""){
								$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
							}else{
								$auser['image']		=	null;
								$auser['xs_image']	=	null;
								$auser['md_image']	=	null;
							}
						}
						$retorno[$i]['users'] = $users;
					}else{
						$retorno[$i]['users'] = array();
					}


	    			//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    			$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    			$this->db->from($this->tableTagObj . ' toe');
	    			$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    			$this->db->where('toe.id_objetivo', $id);
	    			$query3 = $this->db->get();


	    			$retorno[$i]['tags'] = $query3->result_array();

	    			// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    			$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    			$this->db->from($this->tableObjPesoTime . ' toe');
	    			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    			$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    			$this->db->where('too.id_time', $globals[$i]['id_time']);
	    			$query4 = $this->db->get();

	    			$team = $query4->result_array();
	    			$retorno[$i]['team'] =  $team[0];


	    			// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    			$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,trc.medicao as Medicao, progresso as percentage, peso as weight, data_atualizacao as last_date, responsavel, atraso');
	    			$this->db->from($this->tableResultadoChave . ' trc');
	    			$this->db->where('trc.id_objetivo', $id);
	    			$query5 = $this->db->get();

	    			$keys = $query5->result_array();
	    			$keysReturn = array();


	    			if($keys != null){

	    				foreach ($keys as $ind=>$value) {

	    					$user = $this->get_data_resp($value['responsavel']);

	    					array_pop($value);

	    					$value['user'] = $user[0];
	    					$value['atraso']	=	$keys[$ind]['atraso'];
	    					array_push($keysReturn, $value);

	    				}
	    			}

	    			$retorno[$i]['keys'] = $keysReturn;

	    			if(!empty($keys)){
						foreach($keys as $index=>$key){
							$activities 	= 	$this->get_details_activities_r_key($key['id']);
							if(!empty($activities)){
								foreach($activities as $index2=>$activity){
									$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
								}
							}
							$retorno[$i]['keys'][$index]['activities'] = $activities;
						}
					}
	    			// $retorno[$i]['activities'] = $activities;

	    			// GET PARENT id, title, type
	    			$this->db->select($this->tableGoals.'.id_objetivo as id, '.$this->tableGoals.'.nome as title, (case when parent_id is null then "global" else "tatic" end) as type  ');
	    			$this->db->from($this->tableGoals);
	    			$this->db->where($this->tableGoals.'.id_objetivo', $globals[0]['parent_id']);
	    			$query6 = $this->db->get();
	    			$resultParent = $query6->result_array();

	    			$retorno[$i]['parent'] = (sizeof($resultParent) > 0 ) ? $resultParent[0] : array();
	    			//$this->PQUERY();

	    			$i++;

	    		}
	    	}
	    	return $retorno;
	    }

		public function get_details_goals_tatics_by_id_empresa_id_cyclo_and_user($id_usuario,$id_ciclo){

	    	$this->db->select(	'tw.id_objetivo as id, nome as title, tw.descricao as description, tw.parent_id as parent_id,
								qtd_rchaves as \'keys\', peso as weight, situacao as status, percentual as percentage,
								MIN(te.inicio_vigencia) as init, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								responsavel, id_time, te.id_janela'
	    	);
	    	$this->db->from($this->tableGoals . ' tw');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'inner');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'inner');
	    	$this->db->where('tw.responsavel', $id_usuario);
	    	$this->db->where('te.id_ciclo', $id_ciclo );
	    	$this->db->where('tw.ativo', 1 );
	    	$this->db->where('tw.parent_id',0);
	    	$this->db->group_by('tw.id_objetivo');
	    	$this->db->order_by('tw.id_objetivo');

	    	$query = $this->db->get();

	    	//$this->PQUERY();

	    	$retorno = array();
	    	$globals = $query->result_array();
	    	$i = 0;



	    	if($globals != null){

	    		foreach ($globals as $value) {


	    			$user = $this->get_data_resp($value['responsavel']);
	    			$id = $value['id'];

	    			array_pop($value);
	    			array_pop($value);

	    			//$this->debugMark('teste', $value);

	    			$value['user'] = sizeof($user) > 0 ? $user[0] : array();

	    			array_push($retorno, $value);


	    			$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    			$retorno[$i]['cycles'] = $cycle;



	    			// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    			$this->db->select('tu.id_usuario as id, tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    			$this->db->from($this->tableObjResponsaveis . ' tr');
	    			$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    			$this->db->where('tr.id_objetivo', $id);
	    			$query2 = $this->db->get();
					$users	=	$query2->result_array();
					if(!empty($users)){
						foreach($users as &$auser){
							$image 				=	$auser['image'];
							if($image!=""){
								$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
								$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
							}else{
								$auser['image']		=	null;
								$auser['xs_image']	=	null;
								$auser['md_image']	=	null;
							}
						}
						$retorno[$i]['users'] = $users;
					}else{
						$retorno[$i]['users'] = array();
					}


	    			//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    			$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    			$this->db->from($this->tableTagObj . ' toe');
	    			$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    			$this->db->where('toe.id_objetivo', $id);
	    			$query3 = $this->db->get();


	    			$retorno[$i]['tags'] = $query3->result_array();

	    			// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    			$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    			$this->db->from($this->tableObjPesoTime . ' toe');
	    			$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    			$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    			$this->db->where('too.id_time', $globals[$i]['id_time']);
	    			$query4 = $this->db->get();

	    			$team = $query4->result_array();
	    			$retorno[$i]['team'] =  $team[0];


	    			// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    			$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,trc.medicao as Medicao, progresso as percentage, peso as weight, data_atualizacao as last_date, responsavel, atraso');
	    			$this->db->from($this->tableResultadoChave . ' trc');
	    			$this->db->where('trc.id_objetivo', $id);
	    			$query5 = $this->db->get();

	    			$keys = $query5->result_array();
	    			$keysReturn = array();


	    			if($keys != null){

	    				foreach ($keys as $ind=>$value) {

	    					$user = $this->get_data_resp($value['responsavel']);

	    					array_pop($value);

	    					$value['user'] = $user[0];
	    					$value['atraso']	=	$keys[$ind]['atraso'];
	    					array_push($keysReturn, $value);

	    				}
	    			}

	    			$retorno[$i]['keys'] = $keysReturn;

	    			if(!empty($keys)){
						foreach($keys as $index=>$key){
							$activities 	= 	$this->get_details_activities_r_key($key['id']);
							if(!empty($activities)){
								foreach($activities as $index2=>$activity){
									$activities[$index2]['keyresult']=	array('title'=>$key['title'],'percentage'=>$key['percentage']);
								}
							}
							$retorno[$i]['keys'][$index]['activities'] = $activities;
						}
					}
	    			// $retorno[$i]['activities'] = $activities;

	    			// GET PARENT id, title, type
	    			$this->db->select($this->tableGoals.'.id_objetivo as id, '.$this->tableGoals.'.nome as title, (case when parent_id is null then "global" else "tatic" end) as type  ');
	    			$this->db->from($this->tableGoals);
	    			$this->db->where($this->tableGoals.'.id_objetivo', $globals[0]['parent_id']);
	    			$query6 = $this->db->get();
	    			$resultParent = $query6->result_array();

	    			$retorno[$i]['parent'] = (sizeof($resultParent) > 0 ) ? $resultParent[0] : array();
	    			//$this->PQUERY();

	    			$i++;

	    		}
	    	}
	    	return $retorno;
	    }

		public function get_goal_details_by_id($id)
	    {
	    	$this->db->select(	'tw.id_objetivo as id, nome as title, tw.parent_id as parent_id,
								 percentual as percentage,tipo as type'
	    	);
	    	$this->db->from($this->tableGoals . ' tw');
	    	$this->db->where('tw.id_objetivo', $id);
	    	$query = $this->db->get();
	    	$globals = $query->result_array();
			return $globals;
	    }

	    public function get_details_goals_tatics_by_id($id, $user)
	    {


	    	$this->db->select(	'tw.id_objetivo as id, nome as title, tw.descricao as description, tw.parent_id as parent_id,
								qtd_rchaves as \'keys\', peso as weight, situacao as status, tw.cor as color, percentual as percentage,tipo as type,tw.ativo as active,
								MIN(te.inicio_vigencia) as init,tw.data_atualizacao as last_date, MAX(te.fim_vigencia) as end,  year(te.inicio_vigencia) as \'year\',
								responsavel, id_time, te.id_janela'
	    	);
	    	$this->db->from($this->tableGoals . ' tw');
	    	$this->db->join($this->tableObjCiclo . ' toc', 'toc.id_objetivo = tw.id_objetivo', 'left');
	    	$this->db->join($this->tableCycle . ' te', 'te.id_ciclo = toc.id_ciclo', 'left');
	    	$this->db->where('tw.id_objetivo', $id);
	    	//$this->db->where('tw.ativo', 1 );
	    	// $this->db->where('tw.parent_id is not null');
	    	$query = $this->db->get();


	    	$retorno = array();
	    	$globals = $query->result_array();


	    	if($globals != null){
	    		foreach ($globals as $value) {
	    			if($value['type'] != ''){
	    				if($value['type'] == 'i'){
	    					$type = 'Individual';
	    				}else if($value['type'] == 't'){
	    					$type = 'Team';
	    				}
	    				else if($value['type'] == 'c'){
	    					$type = 'Shared';
	    				}
	    				$value['type'] = $type;
	    			}
	    			$user = $this->get_data_resp($value['responsavel']);

	    			array_pop($value);
	    			array_pop($value);
					if(isset($user[0])){
						$value['user'] = $user[0];
					}else{
						$value['user'] = array();
					}

	    			array_push($retorno, $value);
	    		}
	    	}
	    	$id_empresa = $this->session->userdata('id_empresa');
	    	if(!empty($retorno) && !empty($retorno[0]['user']) && $retorno[0]['user']['id_empresa'] != $id_empresa){
				$data  = [[]];
	    		return $data;
	    	}
	    	$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    	$retorno[0]['cycles'] = $cycle;
	    	$retorno[0]['tipo'] = $globals[0]['type'];

	    	if($retorno[0]['tipo'] == 'c'){
	    		$shred_teams = $this->get_shared_teams_by_id_objectivo($id);
	    	}else{
	    		$shred_teams = array();
	    	}



	    	// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    	$this->db->select('tu.id_usuario as id, tu.id_empresa, tu.nome_usuario as name, url_image as image');
	    	$this->db->from($this->tableObjResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_objetivo', $id);
	    	$query2 = $this->db->get();

			$users	 	= $query2->result_array();
			if(!empty($users)){
				foreach($users as &$auser){
					$image 				=	$auser['image'];
					if($image!=""){
						$auser['image']		=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
						$auser['xs_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
						$auser['md_image']	=	base_url('assets/img') . '/'. $auser['id_empresa'] .'/'.$image;
					}else{
						$auser['image']		=	null;
						$auser['xs_image']	=	null;
						$auser['md_image']	=	null;
					}
				}
				$retorno[0]['users'] = $users;
			}else{
				$retorno[0]['users'] = array();
			}
	    	//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    	$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    	$this->db->from($this->tableTagObj . ' toe');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query3 = $this->db->get();

	    	$retorno[0]['tags'] = $query3->result_array();

	    	//removed by Bharat to test something for the error of 306 objective id
	    	/* $this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'left');
	    	$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'left');
	    	$this->db->where('toe.id_time', $globals[0]['id_time']);
	    	$query4 = $this->db->get(); */

			//added by Bharat to test something for the error of 306 objective id
			$this->db->select('toe.id_time as id, toe.nome_unidade as name');
	    	$this->db->from($this->tableTeams . ' toe');
	    	$this->db->where('toe.id_time', $globals[0]['id_time']);
	    	$query4 = $this->db->get();

	    	$team 				= 	$query4->result_array();
	    	$retorno[0]['team'] =  	isset($team[0])?$team[0]:array();
			$shred_teams[]		=  	$retorno[0]['team'];
			$teamns 			= 	$this->get_team_by_objid($id);
			if(!empty($teamns)){
				$shred_teams[]	=	$teamns[0];
			}
			$unique_team		=	array();
			if(!empty($shred_teams)){
				foreach($shred_teams as $shred_team){
					if(!empty($shred_team)){
						$unique_team[$shred_team['id']]	=	isset($shred_team)?$shred_team:'';
					}

				}
			}
			$retorno[0]['shared_teams'] = $unique_team;
	    	// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    	$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,trc.tipo_calculo,trc.direcao,trc.ponto_partida as de,trc.meta_final_prevista as para,trc.medicao as Medicao,trc.medicao as atual,  progresso as percentage,  tipo_calculo, trc.ponto_partida,trc.meta_final_prevista, peso as weight, responsavel, data_atualizacao as last_date, atraso');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_objetivo', $id);
	    	$this->db->where('trc.ativo', 1);
	    	$query5 = $this->db->get();

	    	$keys = $query5->result_array();
	    	$keysReturn = array();

	    	if($keys != null){

	    		foreach ($keys as $ind=>$value) {
	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);

	    			$value['user'] = $user[0];
					$value['atraso']	=	$keys[$ind]['atraso'];
					$value['Medicao']	=	$keys[$ind]['Medicao'];

					$activities 	= 	$this->get_details_activities_r_key($value['id']);
					if(!empty($activities)){
						foreach($activities as $index2=>$activity){
							$activities[$index2]['keyresult']=	array('title'=>$value['title'],'percentage'=>$value['percentage']);
						}
					}
					$value['activities'] = $activities;
					array_push($keysReturn, $value);
	    		}
	    	}
	    	$retorno[0]['keys'] = $keysReturn;


	    	// GET PARENT id, title, type
	    	$this->db->select($this->tableGoals.'.id_objetivo as id, '.$this->tableGoals.'.nome as title, (case when parent_id is null then "global" else "tatic" end) as type  ');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.id_objetivo', $globals[0]['parent_id']);
	    	$query6 = $this->db->get();
	    	$resultParent = $query6->result_array();

	    	$retorno[0]['parent'] = (sizeof($resultParent) > 0 ) ? $resultParent[0] : array();
	    	//$this->PQUERY();
	    	return $retorno;
	    }

	    public function get_resultados_details_by_id($id_key_result)
	    {
	    	// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    	$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,trc.tipo_calculo,trc.direcao,trc.ponto_partida as de,trc.meta_final_prevista as para,trc.medicao as Medicao,trc.medicao as atual,  progresso as percentage,  tipo_calculo, trc.ponto_partida,trc.meta_final_prevista, peso as weight, responsavel, data_atualizacao as last_date, atraso');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_resultado_chave', $id_key_result);
	    	$this->db->where('trc.ativo', 1);
	    	$query5 = $this->db->get();

	    	$keys = $query5->row_array();
	    	if(!empty($keys)){
	    		$keys['medicaoes'] = $this->get_medicoes_anexos_by_id_rchave($keys['id']);
	    	}

	    	$sql_graph = "select * from ttl_acomp_kr where id_resultado_chave = ".$id_key_result;
	    	
									
									
									
	    	$graph_res = $this->db->query($sql_graph);
	    	$graph_data = $graph_res->result_array();
	    	if(!empty($graph_data)){
	    		foreach ($graph_data as $key => $value) {
	    			if($value['meta_realizada'] == ''){
	    				$graph_data[$key]['meta_realizada'] = 0;
	    			}
	    			if($value['meta_prevista_acumulada'] == ''){
	    				$graph_data[$key]['meta_prevista_acumulada'] = 0;
	    			}if($value['medicao_realizada'] == '' && (strtotime($value['data_semana']) <= strtotime(date('Y-m-d')))){
	    				$graph_data[$key]['medicao_realizada'] = 0;
	    			}
	    			
	    			if($value['medicao_realizada'] != '' && (strtotime($value['data_semana']) > strtotime(date('Y-m-d')))){
	    				$graph_data[$key]['medicao_realizada'] = null;
	    			}
	    		}
	    	}

	    	return array($keys,$graph_data);
	    }

	    // GET TEAM BY ID OBJETIVO
	    public function get_team_by_obj($id){

	    	$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value, too.percentual as percentage');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    	$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    	$this->db->where('toe.id_time', $id);

	    	$query = $this->db->get();

	    	return  $query->result_array();

	    }

		// GET TEAM BY ID OBJETIVO
	    public function get_team_by_objid($id_objetivo){

	    	$this->db->select('toe.id_time as id, tt.nome_unidade as name');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    	$this->db->where('toe.id_objetivo', $id_objetivo);

	    	$query = $this->db->get();

	    	return  $query->result_array();

	    }
	    public function update_team_peso($id_time,$id){

	    	$this->db->trans_start();
	    	$data = array('id_time'=>$id_time);

	    	$this->db->update($this->tableObjPesoTime, $data, 'id_objetivo = '.$id);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();

	    }

	    public function get_team_by_id_for_goals($id){

	    	$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    	$this->db->where('toe.id_time', $id);

	    	$query = $this->db->get();

	    	return  $query->result_array();

	    }

	    // METODO GENERICO QUE EDITA DADOS DE OBJETIVOS
	    public function edit_objetivo($id, $data){

	    	$this->db->trans_start();

	    	$this->db->update($this->tableObjetivos, $data, 'id_objetivo = '.$id);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    public function edit_tags_objetivo($id, $tags){

	    	$this->db->trans_start();
	    	$this->db->where('id_objetivo',$id);
	    	$this->db->delete($this->tableTagObj);
	    	$results = $this->db->trans_status();
	    	$this->db->trans_complete();

	    	$this->db->trans_start();
	    	if(count($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 != "" && $item2 != null){
	    				$data = array(
							'id_objetivo' => $id,
							'id_etiqueta' => $item2,
							'usuario_atualizador' => $this->session->userdata('id'),
							'id_empresa' => $this->session->userdata('id_empresa')
    					);
	    				$id_etiqueta = $this->checkTagsCadastradas($data['id_etiqueta'], $data['id_empresa']);
				    	$data['id_etiqueta'] = $id_etiqueta;
				    	unset($data['id_empresa']);

				    	if(!$this->checkObjTagsRelated($id_etiqueta, $data['id_objetivo'])){
				    		$this->insert_query_in( $data, $this->tableTagObj);
				    	}
	    			}
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    // METODO GENERICO QUE EDITA DADOS DE QUESTIONÁRIOS
	    public function edit_questionary($id, $data){

	    	$this->db->trans_start();

	    	$this->db->update($this->tableQuestionario, $data, 'id_questionarios = '.$id);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    public function delete_coresponsavel_objetivo($id, $idUsuario){

	    	$this->db->trans_start();

	    	$this->exec_delete_query("DELETE FROM ".$this->tableObjResponsaveis." WHERE id_objetivo = ".$id." AND id_usuario = ".$idUsuario);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    // GET USERS/CORESPONSAVEIS BY ID OBJETIVO
	    public function get_corresponsaveis_objetivo($id)
	    {
	    	$this->db->select('tu.id_usuario as id, tu.nome_usuario as name, url_image as image,tu.id_empresa');
	    	$this->db->from($this->tableObjResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_objetivo', $id);
	    	$query = $this->db->get();

	       $data =  $query->result_array();
	       if(!empty($data)){
	       		foreach($data as &$user){
	       			if($user['image'] != ''){
	       				$image 				=	$user['image'];
						$user['image']		=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
						$user['xs_image']	=	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image;
						$user['md_image']	=	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image;
	       			}else{
	       				$user['image']		=	null;
						$user['xs_image']	=	null;
						$user['md_image']	=	null;
	       			}

				}
	       }
	       return $data;
	    }

	    public function add_objetivo_responsaveis($data){

	    	$this->db->trans_start();

	    	if(!$data['id_time'] > 0){
	    		unset($data['id_time']);
	    	}

	    	$this->insert_query_in($data, $this->tableObjResponsaveis);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function delete_etiqueta_objetivo($id, $idEtiqueta){

	    	$this->db->trans_start();

	    	$this->exec_delete_query("DELETE FROM ".$this->tableEtiquetaObj ." WHERE id_objetivo = ".$id." AND id_etiqueta = ".$idEtiqueta);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    public function add_etiqueta_objetivo($data)
	    {
	    	$this->db->trans_start();

	    	$id_etiqueta = $this->checkTagsCadastradas($data['id_etiqueta'], $data['id_empresa']);
	    	$data['id_etiqueta'] = $id_etiqueta;
	    	unset($data['id_empresa']);

	    	if(!$this->checkObjTagsRelated($id_etiqueta, $data['id_objetivo'])){
	    		$this->insert_query_in( $data, $this->tableTagObj);
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    // GET ETIQUETAS/TAGS BY ID OBJETIVO
	    public function get_etiquetas_objetivo($id)
	    {
	    	$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    	$this->db->from($this->tableTagObj . ' toe');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    public function editar_objetivo_peso_times($id_usuario, $id_objetivo, $teams)
	    {

	    	$this->db->trans_start();

	    	$this->exec_delete_query("DELETE FROM ".$this->tableObjPesoTime.' WHERE id_objetivo = '.$id_objetivo);

	    	if($teams){
	    		foreach($teams as $item){
	    			$teamData = array(
	    					'id_objetivo' => $id_objetivo,
	    					'id_time' => $item['id'],
	    					'peso' => $item['value'],
	    					'usuario' => $id_usuario
	    			);

	    			$this->db->insert($this->tableObjPesoTime, $teamData);
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    // GET OBJETIVOS TATICO BY ID
	    public function get_objetivos_tatico_by_id_objetivo($id_objetivo,$id_usuario,$type='parent')
	    {
			$this->db->select('vg.id_objetivo as id, vg.parent_id,  vg.nome as title, vg.percentual as percentage, vg.situacao as status, vg.peso as weight, tg.usuario_atualizador as authorised, vg.ativo as active, vg.qtd_rchaves as \'keys\', vg.responsavel, vg.id_janela, vg.id_time');
	    	$this->db->from($this->viewGoals . ' vg');
	    	$this->db->join($this->tableGoals . ' tg', 'tg.id_objetivo = vg.id_objetivo', 'left');
			if($type=='parent'){
				$this->db->where('vg.parent_id', $id_objetivo);
			}else{
				$this->db->where('vg.id_objetivo', $id_objetivo);
			}
	    	$this->db->where('vg.id_usuario', $id_usuario);
	    	$this->db->where('tg.ativo', 1);
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();

	    	$retornoTatico = array();
	    	if($tatic != null){
	    		foreach ($tatic as $value) {
					if($value['responsavel']!=0 || $value['responsavel']!=''){
						$user = $this->get_data_resp($value['responsavel']);
						if(!empty($user)){
							$userData	=	$user[0];
						}else{
							$userData	=	array();
						}

					}else{
						$userData	=	array();
					}
	    			$cycle = $this->get_cycles_by_id_objetivo_related($value['id']);
	    			$team = $this->get_team_by_obj($value['id_time']);
	    			array_pop($value);
	    			array_pop($value);
	    			$value['user'] 		= 	$userData;
	    			$value['cycles'] 	= 	$cycle;
	    			if(sizeof($team) > 0){
	    				$value['team'] = $team[0];
	    			}
	    			array_push($retornoTatico, $value);
	    		}
	    	}

	    	return  $retornoTatico;
	    }

	    // GET TEAMWITHTATICS BY ID OBJETIVO
	    public function get_teamwithtatics_by_id_objetivo($id_objetivo, $type='parent')
	    {
	    	$this->db->select('id_time');
	    	$this->db->from($this->tableGoals);
			if($type='parent'){
				$this->db->where($this->tableGoals.'.parent_id', $id_objetivo);
			}else{
				$this->db->where($this->tableGoals.'.id_objetivo', $id_objetivo);
			}
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();

	    	$teamWithTatics = array();

	    	if($tatic != null){

	    		foreach ($tatic as $value) {

	    			$team = $this->get_team_by_obj($value['id_time']);

	    			if(sizeof($team) > 0){
	    				$teamWithTaticsTemp[$team[0]['id']] = array(
	    						'id' => $team[0]['id'],
	    						'name' =>  $team[0]['name'],
	    						'value' => $team[0]['value'],
	    						'percentage' =>  $team[0]['percentage']
	    				);
	    			}
	    		}
	    		foreach($teamWithTaticsTemp as $row){
	    			$teamWithTatics[] = $row;
	    		}
	    	}

	    	return $teamWithTatics;
	    }

	    public function get_rchave_by_objetivo_tatico($id_objetivo)
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
	    			'trc.id_objetivo as id_objetivo, '.
	    			'trc.nomeRChave as title, '.
	    			'trc.meta_final_prevista as goal, '.
	    			'trc.unidade_meta as measurement,  '.
	    			'trc.situacao as status,  '.
	    			'trc.tipo_calculo as tipo_calculo,  '.
	    			'trc.ponto_partida as ponto_partida,  '.
	    			'trc.ponto_partida as de,  '.
	    			'trc.usuario_atualizador as authorised,  '.
	    			'progresso as percentage, '.
	    			'medicao as Medicao, '.
	    			'medicao as atual, '.
	    			'direcao as direcao, '.
	    			'meta_final_prevista as Meta, '.
	    			'meta_final_prevista as para, '.
	    			'peso as weight, '.
	    			'responsavel,'.
	    			'atraso,'.
	    			'data_atualizacao as last_date'
	    	);
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_objetivo', $id_objetivo);
			$this->db->where('trc.ativo', 1);
	    	$query5 = $this->db->get();

	    	$keys = $query5->result_array();
	    	$keysReturn = array();

	    	if($keys != null){

	    		foreach ($keys as $ind=>$value) {

	    			$user 		= 	$this->get_data_resp($value['responsavel']);
					array_pop($value);
					$activities = $this->get_details_activities_r_key($value['id']);
	    			$value['user'] = $user[0];
					$value['atraso']	=	$keys[$ind]['atraso'];
					$value['activities']	=	$activities;
	    			array_push($keysReturn, $value);
	    		}
	    	}
	    	return $keysReturn;
	    }

	    public function get_rchave_by_objetivo_tatico_by_userId($id_objetivo,$userId)
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
	    			'trc.id_objetivo as id_objetivo, '.
	    			'trc.nomeRChave as title, '.
	    			'trc.meta_final_prevista as goal, '.
	    			'trc.unidade_meta as measurement,  '.
	    			'trc.situacao as status,  '.
	    			'progresso as percentage, '.
	    			'progresso_ajustado as progress, '.
	    			'medicao as Medicao, '.
	    			'meta_final_prevista as Meta, '.
	    			'peso as weight, '.
	    			'responsavel,'.
	    			'trc.atraso'
	    	);
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_objetivo', $id_objetivo);
	    	$this->db->where('trc.responsavel', $userId);
	    	$query5 = $this->db->get();

	    	$keys = $query5->result_array();
	    	$keysReturn = array();

	    	if($keys != null){

	    		foreach ($keys as $ind=>$value) {

	    			$user 		= 	$this->get_data_resp($value['responsavel']);
					array_pop($value);
	    			$value['user'] = $user[0];
					$value['atraso']	=	$keys[$ind]['atraso'];
	    			array_push($keysReturn, $value);
	    		}
	    	}
	    	return $keysReturn;
	    }

	    public function editar_ciclos_objetivo_by_id_objetivo($id_objetivo, $arrayIdsCiclos)
	    {

	    	$ciclesToInsert = $this->checkIntervalCicle($id_objetivo, $arrayIdsCiclos );

	    	if(sizeof($ciclesToInsert) > 0){

	    		foreach($ciclesToInsert as $item){
	    			$data[] = array('id_objetivo' => $id_objetivo, 'id_ciclo' => $item);
	    		}

	    		$this->db->trans_start();
	    		$this->exec_delete_query("DELETE FROM ".$this->tableObjCiclo.' WHERE id_objetivo = '.$id_objetivo);

	    		$this->insert_in_branch($data, $this->tableObjCiclo);
	    		$result = $this->db->trans_status();
	    		$this->db->trans_complete();
	    		return $result;
	    	}else{
	    		return false;
	    	}


	    }

	    public function remover_ciclos_objetivo_by_id_objetivo($id_objetivo, $data)
	    {

    		$this->db->trans_start();
    		$this->db->where('id_objetivo',$id_objetivo);
    		$this->db->where('id_ciclo',$data['id_ciclo']);
			$query 	= 	$this->db->delete($this->tableObjCiclo);
    		$result = $this->db->trans_status();
    		$this->db->trans_complete();
    		return $result;
	    }
	    public function remover_teams_objetivo_by_id_objetivo($id_objetivo, $data)
	    {
	    	/* delete teams from tableObjetivosRelacionados */
	    	$this->db->trans_start();
    		$this->db->where('id_objetivo',$id_objetivo);
    		$this->db->where('id_time',$data['id_time']);
			$this->db->delete($this->tableObjetivosRelacionados);
 			$this->db->trans_complete();

 			/* update id_time = null in the table ttl_objective with objective_id */
 			$this->db->trans_start();
    		$this->db->where('id_objetivo',$id_objetivo);
			$this->db->update( $this->tableGoals,['id_time' => null] );
			$this->db->trans_complete();

	    	/* getting data from tableObjetivosRelacionados after delete team */
	    	$this->db->select('id_time');
	    	$this->db->where('id_objetivo',$id_objetivo);
	    	$this->db->order_by('id_objetivos_compartilhados','DESC');
	    	$this->db->limit(1);
	    	$get_rel_obj_data = $this->db->get($this->tableObjetivosRelacionados)->row_array();

	    	if(!empty($get_rel_obj_data)){
	    		$data_to_update = array('id_time'=>$get_rel_obj_data['id_time']);
	    	}else{
	    		$this->db->select('id_time');
		    	$this->db->where('id_usuario',$this->session->userdata('id'));
		    	$get_view_user_data = $this->db->get($this->viewUsuariosTime)->row_array();
		    	$data_to_update = array('id_time'=>$get_view_user_data['id_time']);
	    	}
 			$this->db->trans_start();
    		$this->db->where('id_objetivo',$id_objetivo);
			$this->db->update($this->tableGoals,$data_to_update);
			$this->db->trans_complete();

    		return true;
	    }
	    public function add_ciclos_objetivo_by_id_objetivo($id_objetivo, $data)
	    {
	    	$data_to_insert = array('id_objetivo'=>$id_objetivo,'id_ciclo'=>$data['id_ciclo']);
    		$this->db->trans_start();

			$this->db->insert($this->tableObjCiclo,$data_to_insert);
    		$result = $this->db->trans_status();
    		$this->db->trans_complete();
    		return $result;
	    }
	    public function add_teams_data_objetivo_by_id_objetivo($id_objetivo, $data)
	    {
			$id_usuario = $this->session->userdata('id');
	    	$data_to_insert = array('id_objetivo'=>$id_objetivo,'id_time'=>$data['id_time'],'usuario_atualizador'=>$id_usuario);
    		$this->db->trans_start();

			$this->db->insert($this->tableObjetivosRelacionados,$data_to_insert);
    		$result = $this->db->trans_status();
    		$this->db->trans_complete();
    		return $result;
	    }

	    public function checkIntervalCicle($id_objetivo, $cicles)
	    {
	    	$tmpArray = $this->get_cycles_by_id_objetivo($id_objetivo);

	    	if(sizeof($tmpArray) > 0){

	    		foreach($tmpArray as $item){
	    			$array[] = $item['id'];
	    		}

		    	$validCicle = array();
		    	$first = true;
		    	if(sizeof($cicles) < 1){
		    		return $cicles;
		    	}
		    	$orderedCicle = array();
		    	foreach($array as $item){
		    		$key = array_search($item, $cicles);
		    		if( array_search($item, $cicles) !== FALSE ){
		    			$orderedCicle[] = $item;
		    		}
		    	}

		    	foreach($orderedCicle as $item){

		    		if($first){
		    			$keyAnterior = array_search($item, $array);
		    			$validCicle[] = $item;
		    			//$this->debugMark('first', $validCicle);
		    			$first = false;
		    		}else{
		    			$keyAtual = array_search($item, $array);

		    			if(($keyAtual - $keyAnterior) > 1){
		    				$keyAnterior;
		    				$i = $keyAnterior;
		    				for($i = $keyAnterior + 1; $i <= $keyAtual; $i++){
		    					$validCicle[] = $array[$i];
		    				}
		    			}else{
		    				$validCicle[] = $item;
		    			}
		    			$keyAnterior = $keyAtual;
		    		}

		    	}


		    	return $validCicle;

		    }else{
		    	return array();
		    }

	    }


	    public function add_resultados_chave($data,$status)
	    {

	    	$this->db->trans_start();
	    	$id_objetivo = $data['id_objetivo'];
	    	$id_empresa = $data['id_empresa'];
	    	$id_time = $data['id_time'];
	    	$tags = $data['tags'];
	    	$responsaveis = $data['responsaveis'];


	    	unset($data['tags']);
	    	unset($data['responsaveis']);
	    	unset($data['id_empresa']);
	    	unset($data['id_time']);


	    	$this->db->insert($this->tableResultadoChave, $data);
	    	$id_resultado_chave = $this->db->insert_id();

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 != "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_rchave' => $id_resultado_chave,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableEtiquetaRChave, $tagObjData);
	    			}
	    		}
	    	}

	    	if($responsaveis){
	    		foreach($responsaveis as $item3){
	    				if($status){
	    					$respData = array(
	    					'id_resultado_chave' => $id_resultado_chave,
	    					'id_usuario' => $item3,
	    					'id_time' => $id_time,
	    					);
	    				}else{
	    					$respData = array(
	    					'id_resultado_chave' => $id_resultado_chave,
	    					'id_usuario' => $data['usuario_atualizador'],
	    					'id_time' => $id_time,
	    					);
	    				}

	    			$this->db->insert($this->tableChaveResponsaveis, $respData);
	    		}
	    	}
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    public function update_resultados_chave($data)
	    {

	    	$this->db->trans_start();
	    	$id_rchave =  $data['id'];
	    	$id_empresa = $data['id_empresa'];
	    	$id_time = $data['id_time'];
	    	$tags = $data['tags'];
	    	$responsaveis = $data['responsaveis'];


	    	unset($data['tags']);
	    	unset($data['id']);
	    	unset($data['responsaveis']);
	    	unset($data['id_empresa']);
	    	unset($data['id_time']);


	    	$this->db->update($this->tableResultadoChave, $data, 'id_resultado_chave = '.$id_rchave);


	    	$this->exec_delete_query('delete from '.$this->tableEtiquetaRChave.' where id_rchave = '.$id_rchave);

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 != "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_rchave' => $id_rchave,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableEtiquetaRChave, $tagObjData);
	    			}
	    		}
	    	}


	    	$this->exec_delete_query('delete from '.$this->tableChaveResponsaveis.' where id_resultado_chave = '.$id_rchave);

	    	if($responsaveis){
	    		foreach($responsaveis as $item3){

	    			$respData = array(
	    					'id_resultado_chave' => $id_rchave,
	    					'id_usuario' => $item3,
	    					'id_time' => $id_time,
	    			);

	    			$this->db->insert($this->tableChaveResponsaveis, $respData);
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function delete_key_result_by_id($data ,$id)
	    {

	    	$this->db->trans_start();
	    	$this->db->update($this->tableResultadoChave, $data, 'id_resultado_chave = '.$id);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }


	    public function change_objectivo_status_by_id($objectivo_id, $active)
	    {

	    	$this->db->trans_start();
	    	$data = array('ativo'=>$active);
	    	$this->db->update($this->tableObjetivos, $data, 'id_objetivo = '.$objectivo_id);
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();


	    	return $result;

	    }

	    public function add_atividade($data)
	    {
	    	$this->db->trans_start();

	    	$id_rchave =  $data['id_resultado_chave'];
	    	$id_empresa = $data['id_empresa'];

	    	$tags = $data['tags'];
	    	$responsaveis = $data['responsaveis'];
	    	$id_time = $data['id_time'];
	    	unset($data['tags']);
	    	unset($data['responsaveis']);
	    	unset($data['id_time']);
	    	$this->db->insert($this->tableActivities , $data);
	    	$id_atividade = $this->db->insert_id();

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 !== "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_atividade' => $id_atividade,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableAtvTag, $tagObjData);
	    			}
	    		}
	    	}


	    	if($responsaveis){
	    		foreach($responsaveis as $item3){
					$user_data =	$this->get_user_team_by_id($item3);
					if(!empty($user_data) && isset($user_data['id_time'])){
						$respData = array(
								'id_atividade' => $id_atividade,
								'id_usuario' => $item3,
								'id_time' => $user_data['id_time'],
						);
						$this->db->insert($this->tableAtvResponsive, $respData);
					}
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $id_atividade;

	    }

	    public function add_atividade_alert($data)
	    {
	    	$this->db->trans_start();

	    	$this->db->insert($this->tableAlertaUsuario , $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }
	    public function add_feedback_alert($data)
	    {
	    	$this->db->trans_start();

	    	$this->db->insert($this->tablefeedbackAlert , $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }
	    public function add_survey_alert($data)
	    {
	    	$this->db->trans_start();

	    	$this->db->insert($this->tableSurveyAlert , $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function get_user_by_id_usuario($id_usuario)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableUser);
	    	$this->db->where('id_usuario', $id_usuario);
	    	$result = $this->db->get();

	    	return $result->row_array();

	    }

	    public function update_alert_status_by_id($id_alerta)
	    {
	    	$this->db->trans_start();
	    	$data = array('ativo'=>0);
	    	$this->db->where('id_alerta', $id_alerta);
	    	$this->db->update($this->tableAlertaUsuario, $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }
	    public function update_feedback_alert_status_by_id($id_alerta)
	    {
	    	$this->db->trans_start();
	    	$data = array('ativo'=>0);
	    	$this->db->where('id_alerta', $id_alerta);
	    	$this->db->update($this->tablefeedbackAlert, $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }
	    public function update_survey_alert_status_by_id($id_alerta)
	    {
	    	$this->db->trans_start();
	    	$data = array('ativo'=>0);
	    	$this->db->where('id_alerta', $id_alerta);
	    	$this->db->update($this->tableSurveyAlert, $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

        public function get_activities_added_alert()
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableAlertaUsuario);
	    	$this->db->where('ativo is NULL');
	    	$result = $this->db->get()->result_array();
	    	return $result;
	    }

        public function get_survey_pair_added_alert()
	    {
	    	$this->db->select('tSA.id_usuario, tSA.id_pesquisa, tSA.id_alerta, tP.titulo_email, tP.corpo_email, tP.titulo_email_tks, tP.corpo_email_tks');
	    	$this->db->from($this->tableSurveyAlert . ' tSA');
	    	$this->db->join($this->tablePesquisa . ' tP', 'tP.id_pesquisa = tSA.id_pesquisa', 'INNER');
	    	$this->db->where('tSA.ativo', 1);
	    	$result = $this->db->get()->result_array();
	    	return $result;
	    }
        public function get_feedback_added_alert()
	    {
	    	$this->db->select('tfa.id_usuario, tfa.desenvolvimento, tfa.descricao, tfa.tipo, tfa.id_alerta, tfa.id_feedback,
	    	                   tu_receiver.nome_usuario as nome_usuario_receiver, tu_receiver.email_usuario as email_usuario_receiver, tu_receiver.url_image as image_receiver,
	    	                   tu_sender.nome_usuario as nome_usuario_sender, tu_sender.email_usuario as email_usuario_sender, tu_sender.url_image as image_sender, tu_sender.id_empresa as id_empresa_sender,
	    	                   tf.tipo_feedback');
	    	$this->db->from($this->tablefeedbackAlert .' tfa');
	    	$this->db->join($this->tablefeedback . ' tf', 'tf.id_feedback = tfa.id_feedback', 'LEFT');
	    	$this->db->join($this->tableUser . ' tu_receiver', 'tu_receiver.id_usuario = tfa.id_usuario', 'INNER');
	    	$this->db->join($this->tableUser . ' tu_sender', 'tu_sender.id_usuario = tfa.usuario_atualizador', 'INNER');
	    	$this->db->where('tfa.ativo', 1);
	    	// $this->db->where('tfa.tipo', 'solicitado');
	    	$result = $this->db->get()->result_array();

	    	// $this->db->select('tfa.id_usuario, tfa.desenvolvimento, tfa.descricao, tfa.tipo, tfa.id_alerta, tfa.id_feedback,
	    	//                    tu_receiver.nome_usuario as nome_usuario_receiver, tu_receiver.email_usuario as email_usuario_receiver, tu_receiver.url_image as image_receiver,
	    	//                    tu_sender.nome_usuario as nome_usuario_sender, tu_sender.email_usuario as email_usuario_sender, tu_sender.url_image as image_sender, tu_sender.id_empresa as id_empresa_sender,
	    	//                    tf.tipo_feedback');
	    	// $this->db->from($this->tablefeedbackAlert .' tfa');
	    	// $this->db->join($this->tablefeedback . ' tf', 'tf.id_feedback = tfa.id_feedback', 'LEFT');
	    	// $this->db->join($this->tableUser . ' tu_sender', 'tu_sender.id_usuario = tfa.id_usuario', 'INNER');
	    	// $this->db->join($this->tableUser . ' tu_receiver', 'tu_receiver.id_usuario = tfa.usuario_atualizador', 'INNER');
	    	// $this->db->where('tfa.ativo', 1);
	    	// $this->db->where('tfa.tipo', 'recebido');
	    	// $result = array_merge($result, $this->db->get()->result_array());

	    	//print_r($this->db->last_query());
	    	return $result;
	    }

	    public function get_values_from_feedback($feedback_id){
	        $this->db->select('nome_valor');
	        $this->db->from($this->tablefeedbackValores.' tfv');
	        $this->db->join($this->tableValores.' tv', 'tfv.id_valores = tv.id_valores');
	        $this->db->where('tfv.id_feedback', $feedback_id);
            $result = $this->db->get()->result_array();
            return $result;
        }

        public function get_checkin_added_alert()
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableCheckinAlert);
	    	$this->db->where('ativo', 1);
	    	$result = $this->db->get()->result_array();
	    	return $result;

	    }

	    public function update_checkin_alert_status_by_id($id_alerta)
	    {
	    	$this->db->trans_start();
	    	$data = array('ativo'=>0);
	    	$this->db->where('id_alerta', $id_alerta);
	    	$this->db->update($this->tableCheckinAlert, $data);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function update_atividade($data)
	    {
	    	$this->db->trans_start();


	    	$id_atividade = $data['id_atividade'];
	    	$id_rchave =  $data['id_resultado_chave'];
	    	$id_empresa = $data['id_empresa'];

	    	$tags = $data['tags'];
	    	$responsaveis = $data['responsaveis'];
	    	$id_time = $data['id_time'];


	    	unset($data['tags']);
	    	unset($data['responsaveis']);
	    	unset($data['id_time']);

	    	$this->db->update($this->tableActivities, $data, 'id_atividade = '.$id_atividade);
	    	$this->exec_delete_query('delete from '.$this->tableAtvTag.' where id_atividade = '.$id_atividade);

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 !== "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_atividade' => $id_atividade,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableAtvTag, $tagObjData);
	    			}
	    		}
	    	}


	    	$this->exec_delete_query('delete from '.$this->tableAtvResponsive.' where id_atividade = '.$id_atividade);

	    	if($responsaveis){
	    		foreach($responsaveis as $item3){
					$user_data =	$this->get_user_team_by_id($item3);
					if(!empty($user_data) && isset($user_data['id_time'])){
						$respData = array(
								'id_atividade' => $id_atividade,
								'id_usuario' => $item3,
								'id_time' => $user_data['id_time'],
						);
						$this->db->insert($this->tableAtvResponsive, $respData);
					}
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function userResponsibleObjective($id_objetivo, $id_usuario){
	    	$this->db->select($this->tableObjetivos.'.id_objetivo' );
	    	$this->db->from($this->tableObjetivos);
	    	$this->db-where($this->tableObjetivos.'.id_objetivo', $id_objetivo);
	    	$this->db-where($this->tableObjetivos.'.responsavel', $id_usuario);
	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return true;
	    	}else{
	    		return false;
	    	}

	    }

	    public function userResponsibleResultKey($id_resultado_chave, $id_usuario){
	    	$this->db->select($this->tableResultadoChave.'.id_resultado_chave' );
	    	$this->db->from($this->tableResultadoChave);
	    	$this->db-where($this->tableResultadoChave.'.id_resultado_chave', $id_resultado_chave);
	    	$this->db-where($this->tableResultadoChave.'.responsavel', $id_usuario);
	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return true;
	    	}else{
	    		return false;
	    	}

	    }

	    public function userResponsibleActivity($id_atividade, $id_usuario){
	    	$this->db->select($this->tableActivities.'.id_atividade' );
	    	$this->db->from($this->tableActivities);
	    	$this->db->where($this->tableActivities.'.id_atividade', $id_atividade);
	    	$this->db->where($this->tableActivities.'.responsavel', $id_usuario);
	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return true;
	    	}else{
	    		return false;
	    	}

	    }
	    public function userResponsibleQuestionary($id_questionarios, $id_usuario){

	    	$this->db->select($this->tableQuestionario.'.id_questionarios' );
            $this->db->from($this->tableQuestionario);
            $this->db->where($this->tableQuestionario.'.id_questionarios', $id_questionarios);
            $this->db->where($this->tableQuestionario.'.usuario_atualizador', $id_usuario);
	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return true;
	    	}else{
	    		return false;
	    	}

	    }

	    public function add_medicao($data)
	    {

	    	$this->db->trans_start();

	    	$url_file = $data['url_files'];
	    	unset($data['url_files']);
	    	if($this->db->insert($this->tableChaveMedicao , $data)){
	    		$id_resultado_chave = $this->db->insert_id();

		    	if(sizeof($url_file) > 0 ){
		    		foreach($url_file as $item){

		    			$anexoData = array(
		    					'id_rchave_medicao' => $id_resultado_chave,
		    					'descricao' => $item['descricao'],
		    					'anexo' => $item['anexo'],
		    					'usuario_atualizador' => $data['usuario_atualizador'],
		    			);

		    			$this->db->insert($this->tableRChaveAnexos, $anexoData);
		    		}
		    	}

		    	$result = $this->db->trans_status();
		    	$this->db->trans_complete();
		    	return $result;
	    	}
	    		return false;



	    }

	    public function get_medicoes_anexos_by_id_rchave($id)
	    {

	    	$this->db->select('id_medicao as id, data_medicao as date, medicao as value, comentario as description, usuario_atualizador as user ');
	    	$this->db->from($this->tableChaveMedicao);
	    	$this->db->where($this->tableChaveMedicao.'.id_resultado_chave', $id);
	    	$this->db->order_by($this->tableChaveMedicao.'.id_medicao', 'DESC');
	    	//$this->db->group_by('DATE(data_medicao)');
	    	$query1 = $this->db->get();

	    	$result = $query1->result_array();

	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['user']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';

	    			$tmpAnexos = $this->get_medicoes_anexos_by_id_medicao($item['id']);
	    			$result[$i]['anexo'] = (sizeof($tmpAnexos) > 0) ? $tmpAnexos : array();

	    			$i++;
	    		}
	    	}

	    	return $result;

	    }

	    private function get_medicoes_anexos_by_id_medicao($id_medicao)
	    {
	    	$this->db->select('descricao as anexo');
	    	$this->db->from($this->tableRChaveAnexos);
	    	$this->db->where($this->tableRChaveAnexos.'.id_rchave_medicao', $id_medicao);
	    	$query1 = $this->db->get();

	    	return $medicoes = $query1->result_array();
	    }

	    public function get_medicoes_by_id_rchave($id)
	    {

	    	$this->db->select('id_medicao as id, data_medicao as date, medicao as value,SUM(`medicao`) as sum_value, comentario as description, usuario_atualizador as user ');
	    	$this->db->from($this->tableChaveMedicao);
	    	$this->db->where($this->tableChaveMedicao.'.id_resultado_chave', $id);
	    	$this->db->order_by($this->tableChaveMedicao.'.data_medicao', 'DESC');
	    	$this->db->group_by('DATE(data_medicao)');
	    	$query1 = $this->db->get();
	    	// $this->PQUERY();

	    	$result = $query1->result_array();

	    	$i = 0;
	    	if(sizeof($result) > 0 ){
	    		foreach($result as $item)
	    		{
	    			$tmpUser = $this->get_data_resp($item['user']);
	    			$result[$i]['user'] = (sizeof($tmpUser) > 0) ? $tmpUser[0] : '';

	    			$tmpAnexos = $this->get_medicoes_anexos_by_id_medicao($item['id']);
	    			$result[$i]['anexo'] = (sizeof($tmpAnexos) > 0) ? $tmpAnexos : array();

	    			$i++;
	    		}
	    	}

	    	return $result;

	    }

	    //M�todo respons�vel por devolver os detalhes de uma chave.
	    public function get_datails_key_by_id($id)
	    {
	    	$this->db->select(
	    			'id_resultado_chave as id, '.
					'nomeRChave as title, '.
					'descricao as description, '.
					'frequencia as frequency, '.
					'meta_final_prevista as goal, '.
					'ponto_partida as ponto_partida, '.
					'id_objetivo as id_projeto, '.
	    			'unidade_meta as measurement, '.
					'progresso as percentage, '.
					'ativo as ativo, '.
					'tipo_calculo as tipo_calculo, '.
					'direcao, '.
					'type, '.
					'id_integracao as id_integracao, '.
					'frequencia_int as frequencia_int, '.
					'peso as weight, responsavel'
			);

	    	$this->db->from($this->tableResultadoChave);
	    	$this->db->where('id_resultado_chave', $id);
	    	$this->db->where('ativo = 1');

	    	$query = $this->db->get();

	    	$retorno = array();
	    	$rkeys = $query->result_array();


	    	if($rkeys[0]['type'] != 2){
	    		if($rkeys[0]['tipo_calculo']=="0" && $rkeys[0]['direcao']=="0"){
				$rkeys[0]['tipo_calculo']	=	0;
				}else if($rkeys[0]['tipo_calculo']=="0" && $rkeys[0]['direcao']=="1"){
					$rkeys[0]['tipo_calculo']	=	1;
				}else if($rkeys[0]['tipo_calculo']=="1" && $rkeys[0]['direcao']=="1"){
					$rkeys[0]['tipo_calculo']	=	2;
				}
	    	}else{
	    		if($rkeys[0]['tipo_calculo']=="0" && $rkeys[0]['direcao']=="1" && $rkeys[0]['type']=="2"){
				$rkeys[0]['tipo_calculo']	=	0;
				}
				if($rkeys[0]['tipo_calculo']=="1" && $rkeys[0]['direcao']=="1" && $rkeys[0]['type']=="2"){
					$rkeys[0]['tipo_calculo']	=	1;
				}
	    	}



	    	$retorno['users'] = array(1, 2, 3);

	    	if($rkeys != null){

	    		foreach ($rkeys as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);

	    			array_pop($value);
	    			$value['user'] = $user[0];

	    			array_push($retorno, $value);
	    		}
	    	}
	    	if(!empty($rkeys[0]) && $rkeys[0]['id_integracao'] != 0){
	    		$retorno[0]['integration'] = $this->get_integration_details_by_id($rkeys[0]['id_integracao']);
	    	}else{
	    		$retorno[0]['integration'] = array();
	    	}
	    	$retorno[0]['users'] = $this->get_details_user_by_id_key($id);
	    	$retorno[0]['tag'] = $this->get_tags_by_id_key($id);

	    	$retorno[0]['activities'] = $this->get_details_activities_r_key($id);
	    	$retorno[0]['attachments'] = array();

	    	return $retorno;
	    }

	    public function get_all_key_results()
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
					'trc.nomeRChave as title, '.
					'trc.progresso as percentage, '.
					'trc.tipo_calculo as tipo_calculo, '.
					'trc.id_integracao as id_integracao, '.
					'trc.frequencia_int as frequencia_int, '.
					'ti.nome as integration_name, '.
					'ti.comando_sql as integration_command, '.
					'trc.data_atualizacao as updated'
			);

	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableIntegraions . ' ti', 'ti.id_integracoes = trc.id_integracao', 'inner');
	    	$this->db->where('trc.ativo = 1');
	    	$this->db->where('trc.id_integracao != 0');
	    	$this->db->where('trc.tipo_calculo',3);

	    	$query = $this->db->get();

	    	$retorno = array();
	    	$rkeys = $query->result_array();

	    	return $rkeys;
	    }

		public function get_all_key_results_daily()
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
					'trc.nomeRChave as title, '.
					'trc.progresso as percentage, '.
					'trc.tipo_calculo as tipo_calculo, '.
					'trc.id_integracao as id_integracao, '.
					'trc.frequencia_int as frequencia_int, '.
					'ti.nome as integration_name, '.
					'ti.connection, '.
					'ti.porta, '.
					'ti.database, '.
					'ti.username, '.
					'ti.password, '.
					'ti.comando_sql as integration_command, '.
					'trc.data_atualizacao as updated'
			);
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableIntegraions . ' ti', 'ti.id_integracoes = trc.id_integracao', 'inner');
	    	$this->db->where('trc.ativo = 1');
	    	$this->db->where('trc.id_integracao != 0');
	    	$this->db->where('trc.frequencia_int',1);
	    	// $this->db->where('CURDATE() - INTERVAL 1 DAY > last_run');
	    	$this->db->where('ti.ativo',1);
	    	// $this->db->where('trc.tipo_calculo',3);
	    	$this->db->order_by('id','DESC');
	    	$query = $this->db->get();
	    	$retorno 	= 	array();
	    	$rkeys 		= 	$query->result_array();
	    	return $rkeys;
	    }

		public function get_all_key_results_weekly()
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
					'trc.nomeRChave as title, '.
					'trc.progresso as percentage, '.
					'trc.tipo_calculo as tipo_calculo, '.
					'trc.id_integracao as id_integracao, '.
					'trc.frequencia_int as frequencia_int, '.
					'ti.nome as integration_name, '.
					'ti.connection, '.
					'ti.porta, '.
					'ti.database, '.
					'ti.username, '.
					'ti.password, '.
					'ti.comando_sql as integration_command, '.
					'trc.data_atualizacao as updated'
			);
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableIntegraions . ' ti', 'ti.id_integracoes = trc.id_integracao', 'inner');
	    	$this->db->where('trc.ativo = 1');
	    	$this->db->where('trc.id_integracao != 0');
	    	$this->db->where('trc.frequencia_int',2);
	    	// $this->db->where('CURDATE() - INTERVAL 1 WEEK > last_run');
	    	$this->db->where('ti.ativo',1);
	    	// $this->db->where('trc.tipo_calculo',3);
	    	$query = $this->db->get();
	    	$retorno 	= 	array();
	    	$rkeys 		= 	$query->result_array();
	    	return $rkeys;
	    }

		public function get_all_key_results_monthly()
	    {
	    	$this->db->select(
	    			'trc.id_resultado_chave as id, '.
					'trc.nomeRChave as title, '.
					'trc.progresso as percentage, '.
					'trc.tipo_calculo as tipo_calculo, '.
					'trc.id_integracao as id_integracao, '.
					'trc.frequencia_int as frequencia_int, '.
					'ti.nome as integration_name, '.
					'ti.connection, '.
					'ti.porta, '.
					'ti.database, '.
					'ti.username, '.
					'ti.password, '.
					'ti.comando_sql as integration_command, '.
					'trc.data_atualizacao as updated'
			);
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->join($this->tableIntegraions . ' ti', 'ti.id_integracoes = trc.id_integracao', 'inner');
	    	$this->db->where('trc.ativo = 1');
	    	$this->db->where('trc.id_integracao != 0');
	    	$this->db->where('trc.frequencia_int',3);
	    	// $this->db->where('CURDATE() - INTERVAL 1 MONTH > last_run');
	    	$this->db->where('ti.ativo',1);
	    	// $this->db->where('trc.tipo_calculo',3);
	    	$query = $this->db->get();
	    	$retorno 	= 	array();
	    	$rkeys 		= 	$query->result_array();
	    	return $rkeys;
	    }

		public function run_sql_command($keyresult=array()){

			$host 			= 	$keyresult['connection'];
			$port 			= 	$keyresult['porta'];
			$uname 			= 	$keyresult['username'];
			$password 		= 	$keyresult['password'];
			$database 		= 	$keyresult['database'];
			$sql 			= 	$keyresult['integration_command'];
			$config_app 	= 	array(
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
					if(!empty($response)){
						if(isset($response[0]['percentage']) && $response[0]['percentage']!=""){
							return $this->update_key_result($keyresult['id'], $response[0]['percentage']);
						}else if(isset($response[0]['Percentage']) && $response[0]['Percentage']!=""){
							return $this->update_key_result($keyresult['id'], $response[0]['Percentage']);
						}
					}
				}
			} catch (Exception $e) {
				return false;
			}
		}

		public function update_key_result($keyresultid, $percentage){

			$this->db->select('usuario_atualizador');
	    	$this->db->from($this->tableResultadoChave . ' tr');
	    	$this->db->where('id_resultado_chave', $keyresultid);
	    	$query 	= 	$this->db->get();
			$users	=	$query->row_array();

			$data_to_store = array (
    					'id_resultado_chave' => $keyresultid,
    					'comentario' => 'Auto updated by sql',
    					'data_medicao' => date("Y-m-d"),
    					'medicao' => $percentage,
    					'usuario_atualizador' => $users['usuario_atualizador'],
    					'url_files' => array()

    			);
    		$this->add_medicao( $data_to_store );
			return true;
		}

	    public function get_details_user_by_id_key($id)
	    {
	    	$this->db->select('tu.id_usuario as id, tu.id_empresa, tu.nome_usuario as name, tu.url_image as image');
	    	$this->db->from($this->tableChaveResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_resultado_chave', $id);
	    	$this->db->where('tu.ativo = 1');

	    	$query 	= 	$this->db->get();
			$users	=	$query->result_array();
			if(!empty($users)){
				foreach($users as &$user){
					$image 				=	$user['image'];
					$user['image']		=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
					$user['xs_image']	=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
					$user['md_image']	=	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image;
				}
			}
	    	return $users;
	    }

	    public function get_tags_by_id_key($id){
	    	$this->db->select('te.id_etiqueta, te.nome_etiqueta as name');
	    	$this->db->from($this->tableEtiquetaRChave . ' tr');
	    	$this->db->join($this->tableTags . ' te', 'te.id_etiqueta = tr.id_etiqueta', 'inner');
	    	$this->db->where('id_rchave', $id);
	    	$this->db->where('te.ativo = 1');

	    	$query = $this->db->get();

	    	return $query->result_array();

	    }

	    //M�todo respons�vel por retornar as detalhes de uma atividade.
	    public function get_details_activities_r_key($id){

	    	$this->db->select("id_atividade as id, atraso as atraso, nome as title, descricao as description, responsavel as responsible, data_ini as init, data_fim as end, progresso as percentage, responsavel");
	    	$this->db->from($this->tableActivities);
	    	$this->db->where('id_resultado_chave = ' . $id);
	    	$this->db->where('ativo',1);
	    	$query = $this->db->get();

	    	$retorno = array();

	    	$act = $query->result_array();
	    	if($act != null){

	    		foreach ($act as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);

	    			array_pop($value);
	    			$value['user'] = $user[0];

	    			$value['users'] = $this->get_users_by_activities($value['id']);

	    			array_push($retorno, $value);
	    		}
	    	}

	    	return $retorno;
	    }

	    public function get_team_by_id($id)
	    {
	    	$this->db->select("*");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where('id_time = ' . $id);
	    	$query = $this->db->get();

	    	return $query->result_array();

	    }

	    public function get_tatics_goals_by_id_empresa_count($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.parent_id is not null');
	    	$this->db->where($this->tableGoals.'.id_empresa', $id);

	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }

	    public function get_tatics_goals_by_id_empresa_done($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.percentual >= 100 ');
	    	$this->db->where($this->tableGoals.'.id_empresa', $id);

	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }

	    public function get_tatics_goals_by_id_empresa_undone($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.avaliacao', 1);
	    	$this->db->where($this->tableGoals.'.id_empresa', $id);

	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }

	    public function get_tatics_goals_by_id_empresa_canceled($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableGoals);
	    	$this->db->where($this->tableGoals.'.avaliacao', 2);
	    	$this->db->where($this->tableGoals.'.id_empresa', $id);

	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }

	    public function add_team($data)
	    {
	    	$this->db->trans_start();

	    	$id_empresa = $data['id_empresa'];
	    	$responsaveis = $data['responsaveis'];
	    	$tags = $data['tags'];

	    	unset($data['responsaveis']);
	    	unset($data['tags']);

	    	$this->db->insert($this->tableTeams , $data);
	    	$id_time = $this->db->insert_id();



	    	if($responsaveis){
	    		foreach($responsaveis as $key=>$val){

	    			$respData = array(
	    					'id_usuario' => isset($val)?$val:'',
	    					'id_empresa_time' => $id_time,
	    			);

	    			$this->db->insert($this->tableUserTeam, $respData);
	    		}
	    	}

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 !== "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_times' => $id_time,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableEtiquetasTimes, $tagObjData);
	    			}
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function dismiss_activity_by_id($id = null)
	    {
	    	$data	=	array(
							'situacao'=>2,
							'perfil'=>0
						);
			$this->db->trans_start();
			$this->db->where('id_atividade',$id);
			$this->db->update($this->tableActivities,$data);
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    public function get_members_for_teams_by_id($id_empresa,$id_usuario,$team_id=null, $onlyActives = false)
	    {
	    	$this->db->select("*");
	    	$this->db->from($this->tableTeams . ' tet', 'tet.id_empresa = tu.id_empresa', 'left');
	    	$this->db->where('tet.id_empresa = ' . $id_empresa);
	    	if($team_id){
				$this->db->where('tet.id_time != ' . $team_id);
			}
	    	$query = $this->db->get();
			$results	=	$query->result_array();
			if(!empty($results)){
				foreach($results as $result){
					$team_ids[]	=	$result['id_time'];
				}
				if(!empty($team_ids)){
					$this->db->select('id_usuario');
					$this->db->where_in('id_empresa_time',$team_ids);
					$q			=	$this->db->get('ttl_time_usuario');
					$user_ids	=	$q->result_array();
					$user_id	=	array_unique(array_column($user_ids,'id_usuario'));

					if(!empty($user_ids)){
						$this->db->select("tu.id_usuario as id,tu.nome_usuario as name");
						$this->db->from($this->tableUser . ' tu');
                        if ($onlyActives) $this->db->where('tu.ativo', 1);
						$this->db->where_not_in('tu.id_usuario',$user_id);
						$this->db->where('tu.id_empresa',$id_empresa);
						$userq	=	$this->db->get();
						$users	=	$userq->result_array();
					}else{
						$this->db->select("tu.id_usuario as id,tu.nome_usuario as name");
						$this->db->from($this->tableUser . ' tu');
						$this->db->where('tu.id_empresa',$id_empresa);
                        if ($onlyActives) $this->db->where('tu.ativo', 1);
                        $userq	=	$this->db->get();
						$users	=	$userq->result_array();
					}
				}else{
					$this->db->select("tu.id_usuario as id,tu.nome_usuario as name");
					$this->db->from($this->tableUser . ' tu');
					$this->db->where('tu.id_empresa',$id_empresa);
                    if ($onlyActives) $this->db->where('tu.ativo', 1);
                    $userq	=	$this->db->get();
					$users	=	$userq->result_array();
				}
			}else{
				$this->db->select("tu.id_usuario as id,tu.nome_usuario as name");
				$this->db->from($this->tableUser . ' tu');
				$this->db->where('tu.id_empresa',$id_empresa);
                if ($onlyActives) $this->db->where('tu.ativo', 1);
                $userq	=	$this->db->get();
				$users	=	$userq->result_array();
			}
			return $users;
	    }

	   public function get_members_for_teams_user($id_empresa,$id_usuario,$team_id=null)
	    {

	    	$this->db->from($this->tableUser . ' tu');
	    	$this->db->where('tu.id_empresa = ' . $id_empresa);
	    	$query = $this->db->get();
			$results	=	$query->result_array();
			$users_data =  [];
			foreach($results as $key=>$row){
				$this->db->from($this->tableTeams . ' tet');
				if($team_id){
					$this->db->where('tet.id_time != ' . $team_id);
				}
				$this->db->where('tet.id_empresa = ' . $id_empresa);
				$this->db->where('tet.id_usuario_responsavel = ' . $row['id_usuario']);
				$query1 	 = 	$this->db->get();
				$results1 	 =	$query1->row_array();
				if(empty($results1)){
					$users_data[$key]['id'] = $row['id_usuario'];
					$users_data[$key]['name'] = $row['nome_usuario'];
				}
			}
			return $users_data;
	    }

	    public function add_new_cargo($data,$compensia, $questionerio)
	    {
			$id_empresa = $this->session->userdata('id_empresa');
    		$id_usuario = $this->session->userdata('id');
	    	$this->db->trans_start();

	    	$this->db->insert($this->tableCargos , $data);
	    	$id_cargo = $this->db->insert_id();
			$result = $this->db->trans_status();
			$this->db->trans_complete();

			if($id_cargo){
				if(!empty($compensia)){
					foreach($compensia as $skill){

						// process to start insert record in ttl_cargo_competencias //
						$this->db->insert($this->tableCargoCompetencias, array(
										'usuario_atualizador'=>$id_usuario,
										'id_cargo'=>$id_cargo,
										'ativo'=>1,
										'id_competencia'=>$skill,
						));
						// process to end insert record in ttl_cargo_competencias //
					}
				}
				// process to start insert record in ttl_cargos_questionario //
				if($questionerio){
					$this->db->where('id_cargo',$id_cargo);
					$this->db->limit(1);
					$query = $this->db->get($this->tableCargosQuestionario);
					if ( $query->num_rows() < 1 ) {
						$this->db->insert($this->tableCargosQuestionario, array(
											'usuario_atualizador'=>$id_usuario,
											'id_cargo'=>$id_cargo,
											'id_questionario'=>$questionerio,
						));
					}else{
						$this->db->where('id_cargo',$id_cargo);
						$this->db->update($this->tableCargosQuestionario, array(
											'id_questionario'=>$questionerio,
						));
					}
				}
				// process to end insert record in ttl_cargos_questionario //
				return true;
			}else{
				return false;
			}

	    }

	    public function edit_new_cargo($data,$compensia, $questionerio, $id_cargo)
	    {
			$id_empresa = $this->session->userdata('id_empresa');
    		$id_usuario = $this->session->userdata('id');
	    	$this->db->trans_start();
	    	$this->db->where('id_cargo' , $id_cargo);
	    	$this->db->update($this->tableCargos , $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			if($id_cargo){
				$this->db->where('id_cargo',$id_cargo);
				$query 	= 	$this->db->delete($this->tableCargoCompetencias);
				if(!empty($compensia)){
					foreach($compensia as $skill){

						// process to start insert record in ttl_cargo_competencias //
						$this->db->insert($this->tableCargoCompetencias, array(
										'usuario_atualizador'=>$id_usuario,
										'id_cargo'=>$id_cargo,
										'ativo'=>1,
										'id_competencia'=>$skill,
						));
						// process to end insert record in ttl_cargo_competencias //
					}
				}
				// process to start insert record in ttl_cargos_questionario //
				if($questionerio){

						$this->db->where('id_cargo',$id_cargo);
						$this->db->limit(1);
						$query = $this->db->get($this->tableCargosQuestionario);
						if ( $query->num_rows() < 1 ) {
							$this->db->insert($this->tableCargosQuestionario, array(
												'usuario_atualizador'=>$id_usuario,
												'id_cargo'=>$id_cargo,
												'id_questionario'=>$questionerio,
							));
						}else{
							$this->db->where('id_cargo',$id_cargo);
							$this->db->update($this->tableCargosQuestionario, array(
												'id_questionario'=>$questionerio,
							));
						}
				}
				// process to end insert record in ttl_cargos_questionario //
				return true;
			}else{
				return false;
			}
	    }

	    public function add_new_integration($data)
	    {
	    	$this->db->trans_start();

	    	$this->db->insert($this->tableIntegraions , $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();

			return $result;

	    }

	    public function edit_integration($data, $id)
	    {
	    	$this->db->trans_start();
	    	$this->db->where('id_integracoes' , $id);
	    	$this->db->update($this->tableIntegraions , $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
	    }

	    public function save_the_empressa($data)
	    {
			$id_empresa = $this->session->userdata('id_empresa');
	    	$this->db->trans_start();
	    	$this->db->where('id_empresa' , $id_empresa);
	    	$this->db->update($this->tableCompany , $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
	    }

	    public function update_team($data)
	    {
	    	$this->db->trans_start();


	    	$id_time = $data['id_time'];
	    	$id_empresa = $data['id_empresa'];
	    	$responsaveis = $data['responsaveis'];
	    	$tags = $data['tags'];

	    	unset($data['responsaveis']);
	    	unset($data['id_time']);
	    	unset($data['tags']);

	    	$this->db->update($this->tableTeams, $data, 'id_time = '.$id_time);
	    	$this->exec_delete_query('delete from '.$this->tableUserTeam.' where id_empresa_time = '.$id_time);

	    	if($responsaveis){
	    		foreach($responsaveis as $item3){

	    			$respData = array(
	    					'id_usuario' => $item3,
	    					'id_empresa_time' => $id_time,
	    			);

	    			$this->db->insert($this->tableUserTeam, $respData);
	    		}
	    	}
	    	$this->exec_delete_query('delete from '.$this->tableEtiquetasTimes.' where id_times = '.$id_time);

	    	if($tags && sizeof($tags) > 0){
	    		foreach($tags as $item2){
	    			if($item2 !== "" && $item2 != null){
		    			$tagObjData = array(
		    					'id_times' => $id_time,
		    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    					'usuario_atualizador' => $data['usuario_atualizador']

		    			);
		    			$this->db->insert($this->tableEtiquetasTimes, $tagObjData);
	    			}
	    		}
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

	    }

	    public function get_users_without_team($id_empresa)
	    {
	    	$this->db->select($this->tableTeams.'.id_usuario_responsavel');
	    	$this->db->from($this->tableTeams);
	    	$this->db->where($this->tableTeams.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableTeams.'.ativo',  1);
	    	$this->db->where($this->tableTeams.'.id_usuario_responsavel is not null');
	    	$this->db->group_by($this->tableTeams.'.id_usuario_responsavel');
	    	$where_responsible = $this->db->get_compiled_select();

	    	$this->db->select('id_usuario_responsavel');
	    	$this->db->from($this->tableUserTeam);
	    	$this->db->join($this->tableTeams, $this->tableUserTeam.'.id_empresa_time = '.$this->tableTeams.'.id_time', 'inner');
	    	$this->db->where($this->tableTeams.'.id_empresa', $id_empresa);
	    	$where_participant = $this->db->get_compiled_select();

	    	$this->db->select("
				id_usuario as id, nome_usuario as name, url_image as image, favorites, email_usuario as email,
				(case when admin = '1' then 'true' else 'false' end) as admin,
				(case when avaliador = '1' then 'true' else 'false' end) as appraiser,
				(case when ativo = '1' then 'true' else 'false' end) as active");
	    	$this->db->from($this->tableUser);
	    	$this->db->where($this->tableUser.".id_usuario NOT IN ($where_responsible)", NULL, FALSE);
	    	$this->db->where($this->tableUser.".id_usuario  NOT IN ($where_participant)", NULL, FALSE);
	    	$this->db->where($this->tableUser.".ativo", 1);
	    	$this->db->where($this->tableUser.".id_empresa", $id_empresa);

	    	$query3 = $this->db->get();
	    	//$this->PQUERY();
	    	return $result = $query3->result_array();


	    }

	    public function get_empressa_by_id($id_empresa)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableCompany);
	    	$this->db->where($this->tableCompany.'.id_empresa', $id_empresa);
	    	$query3 = $this->db->get();
	    	//$this->PQUERY();
	    	return $result = $query3->row_array();


	    }
	    public function get_valerea_by_empressa($id_empresa)
	    {
	    	$this->db->select('id_valores as id,id_empresa,nome_valor as name,descricao as description');
	    	$this->db->from($this->tableValores);
	    	$this->db->where($this->tableValores.'.id_empresa', $id_empresa);
	    	$this->db->order_by($this->tableValores.'.id_valores', 'DESC');
	    	$query3 = $this->db->get();
	    	//$this->PQUERY();
	    	return $result = $query3->result_array();


	    }
	    public function get_valerea_by_id($valore_id)
	    {
	    	$this->db->select('id_valores as id,id_empresa,nome_valor as name,descricao as description');
	    	$this->db->from($this->tableValores);
	    	$this->db->where($this->tableValores.'.id_valores', $valore_id);
	    	$query3 = $this->db->get();
	    	//$this->PQUERY();
	    	return $result = $query3->row_array();


	    }

	    public function save_new_valores($data)
	    {
	    	$this->db->trans_start();
	    	$this->db->insert($this->tableValores , $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
	    }
	    public function update_valores($data,$id)
	    {
	    	$this->db->trans_start();
	    	$this->db->where('id_valores' , $id);
	    	$this->db->update($this->tableValores , $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
	    }
	    public function delete_valores_by_id($valore_id)
	    {
	    	$this->db->trans_start();
	    	$this->db->where('id_valores' , $valore_id);
	    	$this->db->delete($this->tableValores);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
	    }


	    // Essa tabela consulta todos os eventos
	    public function get_feed_by_id_usuario($id_usuario)
	    {
	    	$this->db->select(
	    				"id_evento_usuario as id,
						id_evento as type, evento as event,
						data_status as date,
						TIMESTAMPDIFF(MINUTE, data_status, NOW()) as diff,
						descricao as description,
	    				(case when lido = '1' then 'true' else 'false' end) as readed"
	    	);
	    	$this->db->from($this->tableEventoUsuario);
	    	$this->db->where($this->tableEventoUsuario.'.id_usuario', $id_usuario);
	    	$this->db->order_by($this->tableEventoUsuario.'.data_status', 'desc');

	    	$query = $this->db->get();

	    	return $query->result_array();
	    }


	    // Essa tabela consulta em eventos
	    public function get_feed_not_readed_by_id_usuario($id_usuario)
	    {
	    	$this->db->select(
	    			"id_evento_usuario as id,
						id_evento as type, evento as event,
						data_status as date,
	    				(case when lido = '1' then 'true' else 'false' end) as readed"
	    	);
	    	$this->db->from($this->tableEventoUsuario);
	    	$this->db->where($this->tableEventoUsuario.'.id_usuario', $id_usuario);
	    	$this->db->where($this->tableEventoUsuario.'.lido', 0);
	    	$this->db->order_by($this->tableEventoUsuario.'.data_status', 'desc');

	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    // Edita os eventos/feed
	    public function update_feed($data)
	    {
	    	$this->db->trans_start();

	    	$this->db->update($this->tableEventoUsuario, $data, 'id_evento_usuario = '.$data['id_evento_usuario']);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }

	    // Edita os eventos/feed
	    public function set_all_feed_to_read_by_id_usuario($id_usuario)
	    {
	    	$this->db->trans_start();
	    	$data = array('lido' => 1);

	    	$this->db->update($this->tableEventoUsuario, $data, 'id_usuario = '.$id_usuario);

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }



	    public function get_alerts($id_usuario, $id_empresa)
	    {
	    	$this->db->select(
	    			"id_alerta as id, tipo_entidade as type, id_entidade as id_entity,
					nome_entidade as name, descricao as description,
					progresso as progress, data_atualizacao as date");
	    	$this->db->from($this->tableAlert);
	    	$this->db->where($this->tableAlert.'.id_usuario', $id_usuario);
	    	$this->db->where($this->tableAlert.'.ativo', 1);
	    	$this->db->or_where($this->tableAlert.'.id_empresa', $id_empresa);
	    	$this->db->order_by($this->tableAlert.'.data_atualizacao', 'desc');

	    	$query = $this->db->get();

	    	return $query->result_array();
	    }

	    public function get_avaliacoes_by_id_empresa($id_empresa, $id_usuario = null, $id_time = null, $ano, $id_ciclo = null)
	    {

	    	$this->db->select(
	    			$this->tableAvaliacoes.'.nome_usuario as user, '.
	    			$this->tableAvaliacoes.'.nome_time as team, '.
	    			$this->tableAvaliacoes.'.ano_ciclo as year, '.
	    			$this->tableAvaliacoes.'.nome_ciclo as cycle, '.
	    			$this->tableAvaliacoes.'.numero_objetivos as objective, '.
	    			$this->tableAvaliacoes.'.perc_atingido_objetivos as perc_objective, '.
	    			$this->tableAvaliacoes.'.numero_rchave as rkeys, '.
	    			$this->tableAvaliacoes.'.perc_atingido_rchave as perc_rkeys, '.
	    			$this->tableAvaliacoes.'.data_atualizacao as date '

	    	);

	    	$this->db->from($this->tableAvaliacoes);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_usuario = '.$this->tableAvaliacoes.'.id_usuario', 'inner');

	    	$this->db->where($this->tableUser.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableUser.'.ativo', 1);
	    	$this->db->where($this->tableAvaliacoes.'.ano_ciclo', $ano);

	    	if($id_usuario){
	    		$this->db->where($this->tableAvaliacoes.'.id_usuario', $id_usuario);
	    	}

	    	if($id_time){
	    		$this->db->where($this->tableAvaliacoes.'.id_time', $id_time);
	    	}

	    	if($id_ciclo){
	    		$this->db->where($this->tableAvaliacoes.'.id_ciclo', $id_ciclo);
	    	}

	    	$this->db->order_by($this->tableAvaliacoes.'.id_ciclo', 'asc');


	    	$query = $this->db->get();
	    	//$this->PQUERY();

	    	return $query->result_array();

	    }

	    public function get_organograma()
	    {
	    	$query = 'call sp_output_file(65);';
			$this->exec_query($query);

			$query = 'select linha from tmp_output order by indice;';
			$arrayData = $this->exec_query($query);

			$return = '';
			foreach($arrayData as $item){
				$return .= $item['linha'];
			}

			$this->debugMark($return);

	    }
	    public function get_user_team($id_empresa = null,$user_id = null)
	    {
	    	$this->db->select("*");
	    	$this->db->from($this->tableTeams);
	    	$this->db->where('id_empresa = ' . $id_empresa);
	    	$this->db->where('id_usuario_responsavel = ' . $user_id);
	    	$query = $this->db->get();
	    	return $query->row_array();
	    }

        public function set_elo($data)
        {
            $this->db->trans_start();

            $insertEloData = [];
            $insertEloData['usuario_atualizador'] = $data['usuario_atualizador'];
            $insertEloData['descricao_elogio'] = $data['descricao_elogio'];
            // não tá vindo como array

            $mencoes = $data['mencoes'];

            $this->db->insert($this->tableElogio, $insertEloData);
            $id_elogio = $this->db->insert_id();

            if ($mencoes){
                foreach ($mencoes as $key=>$val) {
                    $mencaoData = array(
                        'id_elogio' => $id_elogio,
                        'id_usuario' => $val['id']
                    );
                    $this->db->insert($this->tableElogioMencao, $mencaoData);
                }
            }

            $result = $this->db->trans_status();
            $this->db->trans_complete();



            $matches = [];
            preg_match_all("/(#\w+)/", $data['descricao_elogio'], $matches);

            if (count($matches[1]) > 0) {

                foreach ($matches[1] as $hash) {
                    $this->db->trans_start();
                    $insertHashData = [];
                    $insertHashData['hashtag'] = $hash;
                    $insertHashData['id_elogio'] = $id_elogio;
                    $insertHashData['id_usuario'] = $data['usuario_atualizador'];
                    $this->db->insert($this->tableElogioHashtags, $insertHashData);
                    $this->db->trans_complete();
                }
//                $result2 = $this->db->trans_status();


            }

            return $result;

        }

        public function get_top_hashtags_from_elos($idEmpresa, $hourInterval = 24, $limit = 10)
        {
            $this->db->select('hashtag, COUNT(hashtag) as ocorrencia');
            $this->db->from($this->tableElogioHashtags);
            $this->db->join($this->tableUser, $this->tableElogioHashtags.'.id_usuario = '.$this->tableUser.'.id_usuario' , 'inner');
            $this->db->where($this->tableUser.'.id_empresa = ' . $idEmpresa);
            $this->db->where($this->tableElogioHashtags.'.data_atualizacao > DATE_SUB(CURDATE(),INTERVAL '.$hourInterval.' hour)');
            $this->db->group_by('hashtag');
            $this->db->limit($limit);

            $query = $this->db->get();
            return $query->result_array();


        }

        public function get_unread_elos_count($id)
        {
            $this->db->select("count(id_elogio_mencao) as total_unread");
            $this->db->from($this->tableElogioMencao);
            $this->db->where('id_usuario = ' . $id);
            $this->db->where('lido = 0');
            $query = $this->db->get();
            return $query->row_array();

        }

        public function get_elos_by_company_id($idEmpresa, $start_date=0,$end_date=0, $likecomments=false, $limit=0, $idViewingUser = 0, $lastEloIdLoaded = 0, $hashtagFilter = null)
        {
            $this->db->select("id_usuario");
            $this->db->from($this->tableUser);
            $this->db->where('id_empresa', $idEmpresa);
            $this->db->where('ativo', 1);
            $query = $this->db->get();
            $users = $query->result_array();

            $ids = [];
            foreach ($users as $user) {
                $ids[] = $user['id_usuario'];
            }

            return $this->get_elos_by_members_id($ids, $start_date, $end_date, $likecomments, $limit, $idViewingUser, $lastEloIdLoaded, false, $hashtagFilter);
        }


        public function get_elos_by_mentioned_member_id($id,$start_date=0,$end_date=0, $likecomments=false, $limit=0, $idViewingUser = 0, $lastEloIdLoaded = 0, $onlyUnread = false){

            $selectlike_comment	=	",(select count(id_elogio_comentar) from `ttl_elogio_comentar` where ttl_elogio_comentar.id_elogio = ttl_elogio.id_elogio)as total_comment,(select count(id_elogio_curtida) from `ttl_elogio_curtir` where ttl_elogio_curtir.id_elogio = ttl_elogio.id_elogio)as total_likes, (select count(id_elogio_curtida) from `ttl_elogio_curtir` where ttl_elogio_curtir.id_elogio = ttl_elogio.id_elogio AND ttl_elogio_curtir.id_usuario = $id)>0 as i_liked";

            $sqlString = "SELECT
                                `ttl_elogio`.`id_elogio` as id,
                                `ttl_elogio`.`usuario_atualizador` as usuario_responsavel,
                                `tu_responsavel`.`id_empresa` as id_empresa,
                                `tu_responsavel`.`nome_usuario` as name_usuario_responsavel,
                                `tu_responsavel`.`url_image` as image_usuario_responsavel,
                                `ttl_elogio`.`descricao_elogio`,
                                `ttl_elogio_comentario_mencao`.`lido`,
                                `ttl_elogio_mencao`.`novos_comentarios`,
                                `ttl_elogio_mencao`.`novas_curtidas`,
                                `ttl_elogio_mencao`.`data_atualizacao`,
                                'comment' AS `tipo`,
                                GROUP_CONCAT(ttl_elogio_mencao.id_usuario, ':', `tu_mencionado`.`nome_usuario` SEPARATOR ',') AS usuarios_mencionados $selectlike_comment from ttl_elogio
                        INNER JOIN `ttl_elogio_mencao` ON `ttl_elogio_mencao`.`id_elogio` = `ttl_elogio`.`id_elogio`
                        INNER JOIN `ttl_elogio_comentar` ON ttl_elogio_comentar.id_elogio = ttl_elogio.id_elogio
                        INNER JOIN `ttl_elogio_comentario_mencao` ON ttl_elogio_comentario_mencao.id_elogio_comentar = ttl_elogio_comentar.id_elogio_comentar
                        INNER JOIN `ttl_usuario` tu_responsavel ON `tu_responsavel`.`id_usuario` = `ttl_elogio`.`usuario_atualizador`
                        INNER JOIN `ttl_usuario` tu_mencionado ON `tu_mencionado`.`id_usuario` = `ttl_elogio_mencao`.`id_usuario`
                        WHERE `ttl_elogio_comentario_mencao`.id_usuario = $id
                        group by ttl_elogio_mencao.id_elogio

                        UNION

                        SELECT
                                `ttl_elogio`.`id_elogio` as id,
                                `ttl_elogio`.`usuario_atualizador` as usuario_responsavel,
                                `tu_responsavel`.`id_empresa` as id_empresa,
                                `tu_responsavel`.`nome_usuario` as name_usuario_responsavel,
                                `tu_responsavel`.`url_image` as image_usuario_responsavel,
                                `ttl_elogio`.`descricao_elogio`,
                                `ttl_elogio_mencao`.`lido`,
                                `ttl_elogio_mencao`.`novos_comentarios`,
                                `ttl_elogio_mencao`.`novas_curtidas`,
                                `ttl_elogio_mencao`.`data_atualizacao`,
                                'elo' AS `tipo`,
                                GROUP_CONCAT(ttl_elogio_mencao.id_usuario, ':', `tu_mencionado`.`nome_usuario` SEPARATOR ',') AS usuarios_mencionados $selectlike_comment from ttl_elogio


                        INNER JOIN `ttl_elogio_mencao` ON `ttl_elogio_mencao`.`id_elogio` = `ttl_elogio`.`id_elogio`
                        INNER JOIN `ttl_usuario` tu_responsavel ON `tu_responsavel`.`id_usuario` = `ttl_elogio`.`usuario_atualizador`
                        INNER JOIN `ttl_usuario` tu_mencionado ON `tu_mencionado`.`id_usuario` = `ttl_elogio_mencao`.`id_usuario`
                        WHERE `ttl_elogio_mencao`.id_usuario = $id
                        group by ttl_elogio_mencao.id_elogio


                        ORDER BY data_atualizacao desc LIMIT 20";

            $query = $this->db->query($sqlString);
            $returnArr = [];
            $elos = $query->result_array();


            if(!empty($elos)){
                foreach($elos as &$elo){

                    /////
                    // criação do objeto com dados do usuário responsável
                    $updaterUser = $elo['usuario_responsavel'];
                    $elo['usuario_responsavel'] = [];
                    $elo['usuario_responsavel']["id"] = $updaterUser;
                    $elo['usuario_responsavel']["name"] = $elo['name_usuario_responsavel'];
                    unset($elo['name_usuario_responsavel']);
                    if(!empty($elo['image_usuario_responsavel'])){
                        $image = $elo['image_usuario_responsavel'];
//                        $elo['image'] 		= 	base_url('assets/img') . '/'. $elo['id_empresa'] .'/'.$image;
                        $elo['usuario_responsavel']["image"] 	= 	base_url('assets/img') . '/'. $elo['id_empresa'] .'/50/'.$image;
//                        $elo['md_image'] 	= 	base_url('assets/img') . '/'. $elo['id_empresa'] .'/150/'.$image;
                    }else{
                        $elo['usuario_responsavel']["image"] 	= 	null;
                    }
                    unset($elo['image_usuario_responsavel']);

                    ///////
                    //criação e consulta do objeto com dados dos usuários mencionados
                    $mentionedUsers = explode(",",$elo['usuarios_mencionados']);
                    $elo['usuarios_mencionados'] = [];
                    foreach ($mentionedUsers as $user) {
                        $data = explode(":", $user);
                        $elo['usuarios_mencionados'][] = ['id' => $data['0'], 'name'=>$data['1']];
                    }

                }

            }

            $returnArr['elos'] = $elos;
            // TODO: implementar contagem;
            $returnArr['restCount'] = 0;
            $returnArr['lastLoadedId'] = 0;

            return $returnArr;

        }

        public function get_elos_by_members_id($ids,$start_date=0,$end_date=0, $likecomments=false, $limit=0, $idViewingUser = 0, $lastEloIdLoaded = 0, $onlyUnread = false, $hashtagFilter = null)
        {
            // SQL foi feita em string pois usando o recurso completo do codeigniter, o sistema estava escapando o separador do concat, e estava bugando a consulta.
            $stringArray = '';
            foreach ($ids as $id) {
                $stringArray .= $id.',';
            }
            $stringArray = rtrim($stringArray,",");
			$selectlike_comment	=	"";
			if($likecomments){
				$selectlike_comment	=	",(select count(id_elogio_comentar) from `ttl_elogio_comentar` where ttl_elogio_comentar.id_elogio = ttl_elogio.id_elogio)as total_comment,(select count(id_elogio_curtida) from `ttl_elogio_curtir` where ttl_elogio_curtir.id_elogio = ttl_elogio.id_elogio)as total_likes, (select count(id_elogio_curtida) from `ttl_elogio_curtir` where ttl_elogio_curtir.id_elogio = ttl_elogio.id_elogio AND ttl_elogio_curtir.id_usuario = $idViewingUser)>0 as i_liked";
			}

            $sqlString =    "SELECT `ttl_elogio`.`id_elogio` as id,
                                    `ttl_elogio`.`usuario_atualizador` as usuario_responsavel,
                                    `tu_responsavel`.`id_empresa` as id_empresa,
                                    `tu_responsavel`.`nome_usuario` as name_usuario_responsavel,
                                    `tu_responsavel`.`url_image` as image_usuario_responsavel,
                                    `ttl_elogio`.`descricao_elogio`,
                                    `ttl_elogio_mencao`.`lido`,
                                    `ttl_elogio_mencao`.`novos_comentarios`,
                                    `ttl_elogio_mencao`.`novas_curtidas`,
                                    `ttl_elogio_mencao`.`data_atualizacao`,
                                    TIMESTAMPDIFF(MINUTE, `ttl_elogio_mencao`.`data_atualizacao`, NOW()) as diff,
                                    GROUP_CONCAT(ttl_elogio_mencao.id_usuario, ':', `tu_mencionado`.`nome_usuario` SEPARATOR ',') AS usuarios_mencionados
                                    $selectlike_comment
                            FROM (`ttl_elogio_mencao`)
                            INNER JOIN `ttl_elogio` ON `ttl_elogio_mencao`.`id_elogio` = `ttl_elogio`.`id_elogio`
                            INNER JOIN `ttl_usuario` tu_responsavel ON `tu_responsavel`.`id_usuario` = `ttl_elogio`.`usuario_atualizador`
                            INNER JOIN `ttl_usuario` tu_mencionado ON `tu_mencionado`.`id_usuario` = `ttl_elogio_mencao`.`id_usuario`
                            WHERE `ttl_elogio_mencao`.`id_usuario` IN ($stringArray)";
            if ($lastEloIdLoaded > 0) $sqlString .= " AND `ttl_elogio`.`id_elogio` < $lastEloIdLoaded";
            if ($onlyUnread) $sqlString .= " AND `ttl_elogio_mencao`.`lido` = 0";
            if($start_date != 0 && $end_date !=0){
                $sqlString .= " AND date(`ttl_elogio`.`data_atualizacao`) <= $start_date";
                $sqlString .= " AND date(`ttl_elogio`.`data_atualizacao`) >= $end_date";
			}
			if ($hashtagFilter) $sqlString .= " AND `ttl_elogio`.`descricao_elogio` LIKE '%$hashtagFilter%'";
            $sqlString .=" GROUP BY `ttl_elogio_mencao`.`id_elogio` ORDER BY ";
            $sqlString .= "`ttl_elogio_mencao`.`data_atualizacao` desc";
            if ($limit>0) $sqlString .= " LIMIT $limit";


            $query = $this->db->query($sqlString);
            $elos =  $query->result_array();

            //print_r($this->db->last_query() );


            if(!empty($elos)){
                foreach($elos as &$elo){

                    /////
                    // criação do objeto com dados do usuário responsável
                    $updaterUser = $elo['usuario_responsavel'];
                    $elo['usuario_responsavel'] = [];
                    $elo['usuario_responsavel']["id"] = $updaterUser;
                    $elo['usuario_responsavel']["name"] = $elo['name_usuario_responsavel'];
                    unset($elo['name_usuario_responsavel']);
                    if(!empty($elo['image_usuario_responsavel'])){
                        $image = $elo['image_usuario_responsavel'];
//                        $elo['image'] 		= 	base_url('assets/img') . '/'. $elo['id_empresa'] .'/'.$image;
                        $elo['usuario_responsavel']["image"] 	= 	base_url('assets/img') . '/'. $elo['id_empresa'] .'/50/'.$image;
//                        $elo['md_image'] 	= 	base_url('assets/img') . '/'. $elo['id_empresa'] .'/150/'.$image;
                    }else{
                        $elo['usuario_responsavel']["image"] 	= 	null;
                    }
                    unset($elo['image_usuario_responsavel']);

                    ///////
                    //criação e consulta do objeto com dados dos usuários mencionados
                    $mentionedUsers = explode(",",$elo['usuarios_mencionados']);
                    $elo['usuarios_mencionados'] = [];
                    foreach ($mentionedUsers as $user) {
                        $data = explode(":", $user);
                        $elo['usuarios_mencionados'][] = ['id' => $data['0'], 'name'=>$data['1']];
                    }

                }

            }

            $rest = null;
            if (count($elos) > 0){
                $lastEloIdLoaded = end($elos)['id'];

                // contagem com menos custo para o banco que a sql acima
                $this->db->select('COUNT(*) as rest');
                $this->db->from($this->tableElogioMencao);
                $this->db->join($this->tableElogio, $this->tableElogioMencao.'.id_elogio = '.$this->tableElogio.'.id_elogio' , 'inner');
                $this->db->where('id_usuario IN ('.$stringArray.')');
                $this->db->where($this->tableElogioMencao.".id_elogio < $lastEloIdLoaded");
                if($start_date != 0 && $end_date !=0){
                    $this->db->where('date(`ttl_elogio`.`data_atualizacao`) <=', $start_date);
                    $this->db->where('date(`ttl_elogio`.`data_atualizacao`) >=', $end_date);
                }
                $this->db->order_by($this->tableElogio.'.data_atualizacao', 'desc');

                $query = $this->db->get();
                $rest = $query->row_array()['rest'];
            }

            $returnArr = [];
            $returnArr['elos'] = $elos;
            $returnArr['lastLoadedId'] = $lastEloIdLoaded;
            if ($rest) $returnArr['restCount'] = $rest;
            return $returnArr;

        }
        public function get_comments_by_elo_id($eloId, $lastLoadedId = 0, $limit=5)
        {

            // quando o lastloadedId é zero, não significa que o primeiro a ser carregado é o menor id após zero
            // significa que nenhum foi carregado.
            // pois na verdade o carregamento é do maior id para o menor, buscando primeiro os mais recentes.
            $this->db->select('id_elogio_comentar as id, texto_comentario as comment_text, nome_usuario as username');
            $this->db->from($this->tableElogioComentar);
            $this->db->join($this->tableUser, $this->tableUser.'.id_usuario = '.$this->tableElogioComentar.'.id_usuario' , 'inner');
            $this->db->where('id_elogio', $eloId);
            if ($lastLoadedId > 0) $this->db->where('id_elogio_comentar < '.$lastLoadedId);
            $this->db->order_by($this->tableElogioComentar.'.id_elogio_comentar', 'desc');
            if($limit>0)
                $this->db->limit($limit);

            $query = $this->db->get();
            $comments = $query->result_array();

            if (count($comments) > 0){
                $lastLoadedId = end($comments)['id'];

                $this->db->select("COUNT(*) as rest");
                $this->db->from($this->tableElogioComentar);
                $this->db->join($this->tableUser, $this->tableUser.'.id_usuario = '.$this->tableElogioComentar.'.id_usuario' , 'inner');
                $this->db->where('id_elogio', $eloId);
                $this->db->where('id_elogio_comentar < '.$lastLoadedId);
                $this->db->order_by($this->tableElogioComentar.'.id_elogio_comentar', 'desc');

                $query = $this->db->get();
                $rest = $query->row_array()['rest'];
            }

            $returnArr = [];
            $returnArr['comments'] = $comments;
            $returnArr['lastLoadedId'] = $lastLoadedId;
            $returnArr['restCount'] = $rest;

            return $returnArr;

        }

        public function set_comment_mention_as_read($idComments, $userId)
        {
            $stringArray = '';
            foreach ($idComments as $id) {
                $stringArray .= $id.',';
            }
            $stringArray = rtrim($stringArray,",");

            $this->db->trans_start();

            $data = array('lido' => 1);
            $this->db->where($this->tableElogioComentarioMencao.".id_elogio_comentar IN ($stringArray)");
            // somente o usuário visualizador pode setar sua menção como lida;
            $this->db->where($this->tableElogioComentarioMencao.".id_usuario", $userId);
            $this->db->update($this->tableElogioComentarioMencao, $data);

            $result = $this->db->trans_status();
            $this->db->trans_complete();
            return $result;

        }


        public function get_elos_stats_by_id($id)
        {
            $this->db->select("count(id_elogio) as sentCount");
            $this->db->from($this->tableElogio);
            $this->db->where('usuario_atualizador = ' . $id);
            $querySent = $this->db->get();

            $this->db->select("count(id_elogio_mencao) as receivedCount");
            $this->db->from($this->tableElogioMencao);
            $this->db->where('id_usuario = ' . $id);
            $queryReceived = $this->db->get();

            $this->db->select("COUNT(".$this->tableElogioMencao.".id_usuario) as totalFrom, nome_usuario as mostFrom");
            $this->db->from($this->tableElogioMencao);
            $this->db->join($this->tableElogio, $this->tableElogioMencao.'.id_elogio = '.$this->tableElogio.'.id_elogio' , 'inner');
            $this->db->join($this->tableUser, $this->tableElogio.'.usuario_atualizador = '.$this->tableUser.'.id_usuario' , 'inner');
            $this->db->where($this->tableElogioMencao.'.id_usuario', $id);
            $this->db->group_by('mostFrom');
            $this->db->order_by('totalFrom', 'desc');
            $queryFrom = $this->db->get();

            $this->db->select("COUNT(".$this->tableElogioMencao.".id_usuario) as totalTo, nome_usuario as mostTo");
            $this->db->from($this->tableElogioMencao);
            $this->db->join($this->tableElogio, $this->tableElogioMencao.'.id_elogio = '.$this->tableElogio.'.id_elogio' , 'inner');
            $this->db->join($this->tableUser, $this->tableElogioMencao.'.id_usuario = '.$this->tableUser.'.id_usuario' , 'inner');
            $this->db->where($this->tableElogio.'.usuario_atualizador', $id);
            $this->db->group_by('mostTo');
            $this->db->order_by('totalTo', 'desc');
            $queryTo = $this->db->get();


            return array_merge($querySent->row_array(), $queryReceived->row_array(), $queryFrom->row_array(), $queryTo->row_array());

        }

        public function get_likes_from_elo_id($elo_id){

	        $this->db->select("nome_usuario, tec.id_usuario");
	        $this->db->from($this->tableElogioCurtir.' tec');
	        $this->db->join($this->tableUser.' tu', 'tu.id_usuario = tec.id_usuario', 'inner');
	        $this->db->where('tec.id_elogio', $elo_id);
	        $this->db->group_by('tec.id_usuario');
	        $this->db->order_by('tec.id_elogio_curtida', 'desc');
	        $query = $this->db->get();
	        $likesList = $query->result_array();

	        $returnArr = [];
	        // caso eu queira enviar mais dados, já estou encapsulando os likes em um objeto separado de retorno
	        $returnArr['likes'] = $likesList;
	        return $returnArr;

        }
		
        public function get_review_perform_notifications($userId){

			$id_empresa = $this->session->userdata('id_empresa');
            $this->db->select("trc.id_revisao_ciclo, trc.nome_ciclo, trca.id_usuario_avaliado, trca.id_usuario_avaliador, trca.id_tipo_avaliacao");
            $this->db->from($this->tableRevisaoCicloAvaliacoes.' trca');
			$this->db->join($this->tableRevisaoCiclo.' trc', 'trc.id_revisao_ciclo = trca.id_revisao_ciclo', 'inner');
            $this->db->where("trca.respondido", 0);
			$this->db->where("trca.autorizado", 1);
			$this->db->where("trc.liberado", 1);
			$this->db->where("trc.ativo", 1);
			$this->db->where('data_inicio <= NOW()');
			$this->db->where('data_fim >= NOW()');
            $this->db->where("id_usuario_avaliador", $userId);
            $this->db->group_by("trc.id_revisao_ciclo");
			$this->db->where('trc.id_empresa', $id_empresa);
            $this->db->order_by("trc.id_revisao_ciclo", 'ASC');

            $query = $this->db->get();
			$reviews 	=	$query->result_array();
			
			$notifications	=	array();
			if(!empty($reviews)){
				foreach($reviews as $review){
					$notifications[] = ["type" => 'review_perform_notifications', "data" => $review];
				}
			}
			return $notifications;
        }
		
		public function get_review_peer_notifications($userId){
			
			$notifications	=	array();
			
			// if($this->session->userdata('admin') == 1 || $this->session->userdata('gestor') == 1){
				
				$id_empresa = $this->session->userdata('id_empresa');
				$sql 	=	"select trc.id_revisao_ciclo, trc.nome_ciclo, trca.id_usuario_avaliado, trca.id_usuario_avaliador,     
								   trca.id_tipo_avaliacao from ttl_revisao_ciclo trc, ttl_revisao_ciclo_avaliacoes trca, ttl_usuario tu where

							tu.id_usuario = trca.id_usuario_avaliador and
							(trca.id_usuario_avaliador in (select distinct id_usuario_avaliador from ttl_revisao_ciclo_avaliacoes) or tu.admin=1) and
							trc.id_revisao_ciclo = trca.id_revisao_ciclo  and
							trc.data_inicio <= NOW() AND data_fim >= NOW() AND trc.ativo =1 AND trc.id_empresa='".$id_empresa."' 
							and trca.id_usuario_avaliador = '".$userId."'
							and trca.id_tipo_avaliacao not in (1,3,4)
								   GROUP BY trca.id_usuario_avaliador
								   ORDER BY trc.id_revisao_ciclo ASC";

						
								   
								   
				$query = $this->db->query($sql);
				$reviews 	=	$query->result_array();
				
				if(!empty($reviews)){
					foreach($reviews as $review){
						$notifications[] = ["type" => 'review_peer_notifications', "data" => $review];
					}
				}
			// }
			return $notifications;
        }

        public function get_last_notifications($userId){
            $notifications = [];

            if ($hasNewLikes = $this->has_new_likes($userId)) $notifications[] = ["type" => 'new_likes', "msg" => "user has new likes"];
            if ($hasNewComments = $this->has_new_comments($userId)) $notifications[] = ["type" => 'new_comments', "msg" => "user has new comments"];

            $elosN = $this->get_last_unread_elos_of_user($userId);
            foreach ($elosN as &$elo) {
               $elo['type'] = 'elo';
            }

            if ($commentMentionsN = $this->get_last_comment_mentions($userId)) $notifications[] = ["type" => 'new_comment_mention', "msg" => "user was mentioned"];

			$review_peer_notifications		=	$this->get_review_peer_notifications($userId);
			$review_perform_notifications	=	$this->get_review_perform_notifications($userId);
			
            // colocarei os elos em mesma lista dos likes, comments e outras notificações para facilitar interação
            $notifications = array_merge($notifications, $elosN, $review_peer_notifications, $review_perform_notifications);
            return $notifications;
        }
		
        public function get_last_comment_mentions($userId){

            $this->db->select("*");
            $this->db->from($this->tableElogioComentarioMencao);
            $this->db->where("lido", 0);
            $this->db->where("id_usuario", $userId);
            $this->db->limit(1);

            $query = $this->db->get();
            // por enquanto só quero saber se o usuário foi mencionado
            // mostrar uma notificação por comentário mencionado fica para uma segunda etapa.
            return $query->row_array() && 1;

        }

        public function get_last_unread_elos_of_user($userId){
            return $this->get_elos_by_members_id([$userId], 0, 0, true, 3, $userId, 0 , true)['elos'];
        }
        public function has_new_likes($userId){
            $this->db->select("*");
            $this->db->from($this->tableElogioMencao.' tem');
            $this->db->where('tem.id_usuario', $userId);
            $this->db->where('tem.novas_curtidas', 1);
            $query = $this->db->get();
            return $query->row_array() && 1; // retorna true se vem linha e false se não vem

        }
        public function has_new_comments($userId){
            $this->db->select("*");
            $this->db->from($this->tableElogioMencao.' tem');
            $this->db->where('tem.id_usuario', $userId);
            $this->db->where('tem.novos_comentarios', 1);
            $query = $this->db->get();
            return $query->row_array() && 1; // retorna true se vem linha e false se não vem

        }



        public function get_elos_sent_count($user_id){
            $this->db->select("count(*) as total_sent");
            $this->db->from($this->tableElogio);
            $this->db->where('data_atualizacao > current_date()');
            $this->db->where('usuario_atualizador', $user_id);
            $q = $this->db->get();
            $arrresult = $q->row_array();
            return $arrresult['total_sent'];
        }


        public function mark_elo_as_read($ids, $reader_id)
        {
            $stringArray = '';
            foreach ($ids as $id) {
                $stringArray .= $id.',';
            }
            $stringArray = rtrim($stringArray,",");
            $this->db->set('lido', 1);
            $this->db->set('novos_comentarios', 0);
            $this->db->set('novas_curtidas', 0);
            // só posso marcar como lido pelo próprio mencionado
            $this->db->where('id_usuario', $reader_id);
            $this->db->where('id_elogio IN ('.$stringArray.')');
            $query = $this->db->update($this->tableElogioMencao);
            return $query;

        }
        public function like_elo($id, $viewer_id)
        {
            $this->db->set('id_usuario', $viewer_id);
            $this->db->set('id_elogio', $id);
            $query1 = $this->db->insert($this->tableElogioCurtir);

            $this->db->set('novas_curtidas', 1);
            $this->db->where('id_elogio', $id);
            $query2 = $this->db->update($this->tableElogioMencao);

            return $query1 && $query2;

        }
        public function comment_elo($id, $commenter_id, $comment, $mentions)
        {
            $this->db->set('id_usuario', $commenter_id);
            $this->db->set('id_elogio', $id);
            $this->db->set('texto_comentario', $comment);
            $query1 = $this->db->insert($this->tableElogioComentar);

            $id_elogio_comentar = $this->db->insert_id();

            if ($mentions){
                foreach ($mentions as $key=>$val) {
                    $mencaoData = array(
                        'id_elogio_comentar' => $id_elogio_comentar,
                        'id_usuario' => $val['id']
                    );
                    $this->db->insert($this->tableElogioComentarioMencao, $mencaoData);
                }
            }

            $this->db->set('novos_comentarios', 1);
            $this->db->where('id_elogio', $id);
            $query2 = $this->db->update($this->tableElogioMencao);



            return $query1 && $query2;
        }

        public function get_elos_limit_by_user_id($idUser)
        {
            $this->db->select("elo");
            $this->db->from($this->tableTeams);
            $this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableTeams.'.id_empresa', 'inner');
            $this->db->where($this->tableUser.'.id_usuario', $idUser);
            $q = $this->db->get();
            $arrresult = $q->row_array();
            return $arrresult['elo'];
		}

		/**
		 * @raptor add pesquisa menu
		 */
		public function get_pesquisa_by_usuario(){
			$id_usuario = $this->session->userdata('id');
			$pesquisas = [];

			$this->db->select($this->tablePesquisa.".*,".$this->tableUser.".*");
			$this->db->from($this->tablePesquisa);
			$this->db->join($this->tableUser, $this->tableUser.'.id_empresa='.$this->tablePesquisa.'.id_empresa', 'inner');
			$this->db->where($this->tableUser.'.id_usuario', $id_usuario);
			$q = $this->db->get();
			$result = $q->result_array();
			// foreach($result as $row){
			// 	// return $row;
			// 	$sql1 = "select (count(*)/ (select count(*) "
			// 	." from v_pesquisa_geral where id_pesquisa=".$row['id_pesquisa'].")*100 ) as percentage "
			// 	." from v_pesquisa_geral where id_pesquisa=".$row['id_pesquisa']." and respondida =1";
			// 	$q1 = $this->db->query($sql1);
			// 	$result1 = $q1->row_array();

			// 	$row['progresso'] = round($result1['percentage'], 2);
			// 	$row['progresso'] = 0;
			// 	array_push($pesquisas, $row);
			// }
			return $result;
		}

		public function get_users_by_empresa(){
			$id_usuario = $this->session->userdata('id');
			$sql = "select id_empresa from ttl_usuario where id_usuario=".$id_usuario;
			$q = $this->db->query($sql);
			$row = $q->row_array();
			$id_empresa = $row['id_empresa'];
			$sql = "select * from ttl_usuario where id_empresa=".$id_empresa;
			$q = $this->db->query($sql);
			$result = $q->result_array();
			return $result;
		}

		public function get_public_pesquisa_by_usuario($id_pesquisa){
			$id_usuario = $this->session->userdata('id');
			$sql = "select  c.*, b.id_time, b.nome_unidade from ".$this->tablePublicPesquisa ." a "
					// ." inner join v_usuariosTime b on a.id_usuario = b.id_usuario "
					." left join ttl_empresa_times b on a.id_time=b.id_time "
					." inner join ".$this->tableUser." c on a.id_usuario=c.id_usuario "
					//." where a.usuario_atualizador=".$id_usuario
					." where a.id_pesquisa=".$id_pesquisa;
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_questionarios($tipo = 0){
			$id_usuario = $this->session->userdata('id');

			$this->db->select($this->tableQuestionario.".*,".$this->tableUser.".*");
			$this->db->from($this->tableQuestionario);
			$this->db->join($this->tableUser, $this->tableUser.'.id_empresa='.$this->tableQuestionario.'.id_empresa', 'inner');
			if($tipo == 'b'){
				$this->db->where($this->tableQuestionario.'.tipo_questionario', 'b');
			}else if($tipo == 'h'){
				$this->db->where($this->tableQuestionario.'.tipo_questionario', 'h');
			}
			$this->db->where($this->tableQuestionario.'.ativo', '1');
			$this->db->where($this->tableUser.'.id_usuario', $id_usuario);
			$q = $this->db->get();
			$result = $q->result_array();
			return $result;
		}

		public function get_users_by_teams($strTeams){
			if($strTeams != ''){
			$sql = "select a.*, d.id_time, d.nome_unidade from ".$this->tableUser." a "
				// ." left join ttl_time_usuario b on a.id_usuario=b.id_usuario "
				." inner join v_usuariosTime d on a.id_usuario = d.id_usuario "
				." where d.id_time in (".$strTeams.") "
				." GROUP BY a.id_usuario "
				." order by d.id_time, a.id_usuario";
			$result = $this->db->query($sql);
			return $result->result_array();
			}else{
				return array();
			}
		}

		public function get_teams_by_teams_id($strTeams){
			if($strTeams != ''){
			$sql = "select a.id_time as id,a.nome_unidade as name from ".$this->tableTeams." a "
				." where a.id_time in (".$strTeams.") "
				." order by a.id_time";
			$result = $this->db->query($sql);
			return $result->result_array();
			}else{
				return array();
			}
		}

		public function get_users_by_ids($strUsers){
			if($strUsers != ''){
			$sql = "select a.*, d.id_time, d.nome_unidade from ".$this->tableUser." a "
				." left join v_usuariosTime d on a.id_usuario = d.id_usuario "
				." where a.id_usuario in (".$strUsers.") "
				." GROUP BY a.id_usuario "
				." order by d.id_time, a.id_usuario";
			$result = $this->db->query($sql);
			return $result->result_array();
			}else{
				return array();
			}
		}


		public function get_all_gestors($id_time = '',$id_category = '',$id_pergunta = '', $fechado = 0){
			$id_empresa = $this->session->userdata('id_empresa');
			$where_id_time = '';
			if($id_time != '')
			$where_id_time = "AND id_unidade IN (".$id_time.")";

			$where_id_category = '';
			if($id_category != '')
			$where_id_category = "AND id_categoria IN (".$id_category.")";

			$where_id_pergunta = '';
			if($id_pergunta != '')
			$where_id_pergunta = "AND id_pergunta IN (".$id_pergunta.")";

			$tab = ($fechado == 0)?"v_pesquisas_respostas":"ttl_snapshot_pesquisas_respostas";
			$sql = "select id_gestor,nome_gestor,id_unidade,id_categoria,id_pergunta from $tab where id_gestor != '' AND id_empresa = ".$id_empresa." ".$where_id_time." ".$where_id_category." ".$where_id_pergunta." GROUP BY id_gestor";


			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_all_cargos($id_time = '',$id_category = '',$id_pergunta = '',$id_gestor = ''){
			$id_empresa = $this->session->userdata('id_empresa');
			$where_id_time = '';
			if($id_time != '')
			$where_id_time = "AND id_unidade IN (".$id_time.")";

			$where_id_category = '';
			if($id_category != '')
			$where_id_category = "AND id_categoria IN (".$id_category.")";

			$where_id_pergunta = '';
			if($id_pergunta != '')
			$where_id_pergunta = "AND id_pergunta IN (".$id_pergunta.")";

			$where_id_gestor = '';
			if($id_gestor != '')
			$where_id_gestor = "AND id_gestor IN (".$id_gestor.")";


			$sql = "select id_cargo,nome_cargo,id_unidade,id_categoria,id_pergunta,id_gestor from v_pesquisas_respostas where id_cargo != '' ".$where_id_time." ".$where_id_category." ".$where_id_pergunta." ".$where_id_gestor." AND id_empresa =".$id_empresa." GROUP BY id_cargo";


			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_all_category($id_time = '', $fechado = 0){
			$id_empresa = $this->session->userdata('id_empresa');
			$where_id_time = '';
			$tab = ($fechado == 0)?"v_pesquisas_respostas":"ttl_snapshot_pesquisas_respostas";
			if($id_time != '')
			$where_id_time = "AND id_unidade IN (".$id_time.")";

			$sql = "select id_categoria as id_categoria_pergunta,nome_categoria,id_unidade from $tab where id_categoria != '' ".$where_id_time." AND id_empresa = ".$id_empresa."  GROUP BY id_categoria";


			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_all_teams_pesquisa($id_tags = '', $fechado = 0){
			$id_empresa = $this->session->userdata('id_empresa');
			$where_id_tag = '';
			if($id_tags != '')
			$where_id_tag = "Where tet.id_etiqueta IN (".$id_tags.") AND tt.ativo=1";

			$tab = ($fechado == 0)?"v_pesquisas_respostas":"ttl_snapshot_pesquisas_respostas";

			if($id_tags != ''){
				$sql = "select tet.id_times as id,tet.id_etiqueta,tt.nome_unidade as name from ttl_etiqueta_times tet LEFT JOIN ttl_empresa_times tt ON tt.id_time = tet.id_times ".$where_id_tag." GROUP BY tt.nome_unidade";
			}else{
				$sql = "select id_unidade as id,nome_unidade as name from $tab where id_unidade != '' AND id_empresa = ".$id_empresa." GROUP BY id_unidade ORDER BY nome_unidade ASC";
			}

			$result = $this->db->query($sql);

//			print_r($this->db->last_query());

			return $result->result_array();
		}

		public function get_all_tags_pesquisa(){
			$id_empresa = $this->session->userdata('id_empresa');
			$sql = "select tet.id_etiqueta as id,te.nome_etiqueta as name from ttl_etiqueta_times tet LEFT JOIN ttl_etiquetas te ON te.id_etiqueta = tet.id_etiqueta where te.id_empresa = ".$id_empresa." GROUP BY tet.id_etiqueta";
			$result = $this->db->query($sql);
//			print_r($this->db->last_query());
			return $result->result_array();
		}

		public function get_all_surveys_pesquisa($type){
			$id_empresa = $this->session->userdata('id_empresa');
			$sql = "select vpg.id_pesquisa as id,vpg.nome_pesquisa as name from v_pesquisa_geral vpg where vpg.id_empresa=".$id_empresa." AND vpg.id_tipo_pesquisa = 2 GROUP BY vpg.id_pesquisa";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_all_perguntas($id_time = '',$id_category = '', $fechado = 0){
			$id_empresa = $this->session->userdata('id_empresa');
			$where_id_time = '';
			if($id_time != '')
			$where_id_time = " AND id_unidade IN (".$id_time.")";

			$where_id_category = '';
			if($id_category != '')
			$where_id_category = "AND id_categoria IN (".$id_category.")";

			$tab = ($fechado == 0)?"v_pesquisas_respostas":"ttl_snapshot_pesquisas_respostas";

			$sql = "select id_pergunta as id_pergunta,pergunta as pergunta,id_unidade,id_categoria from $tab where id_pergunta != '' ".$where_id_time."  ".$where_id_category." AND id_empresa = ".$id_empresa." GROUP BY id_pergunta";

			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_users_teams_list($strUsers, $strTeams){
			$sql = "select a.*, c.id_time, c.nome_unidade from ".$this->tableUser." a "
				// ." left join ttl_time_usuario b on a.id_usuario=b.id_usuario "
				." inner join ".$this->tableTeams." c on a.id_empresa=c.id_empresa "
				." where a.id_usuario in (".$strUsers.") and c.id_time in (".$strTeams.")"
				." order by c.id_time, a.id_usuario";
			$result = $this->db->query($sql);
			return $result->result_array();
		}

		public function get_pesquisa_id($id_pesquisa){
			$this->db->select("*");
			$this->db->from($this->tablePesquisa);
			$this->db->where('id_pesquisa', $id_pesquisa);
			$q = $this->db->get();
			$result = $q->row_array();

			if($result['data_ini'] != '' && $result['data_fim'] != ''){
				$data_ini = explode(' ', $result['data_ini']);
				$data_ini = $data_ini[0];
				$data_ini = explode('-', $data_ini);
				$data_ini = $data_ini[2].'/'.$data_ini[1].'/'.$data_ini[0];
				$result['data_ini'] = $data_ini;

				$data_fim = explode(' ', $result['data_fim']);
				$data_fim = $data_fim[0];
				$data_fim = explode('-', $data_fim);
				$data_fim = $data_fim[2].'/'.$data_fim[1].'/'.$data_fim[0];
				$result['data_fim'] = $data_fim;
			}

			return $result;
		}

	    public function close_survey($id_pesquisa)
	    {
			$data = array(
				'fechado' => 1,
			);
			$this->db->trans_start();
			$this->db->where('id_pesquisa', $id_pesquisa);
			$this->db->update($this->tablePesquisa, $data);
			$result = $this->db->trans_complete();

			return $result;
	    }



		public function set_pesquisa_usuario_one($input){
			$id_usuario = $this->session->userdata('id');

			$nome_pesquisa = $input->post('nome_pesquisa');

			$id_tipo_pesquisa = $input->post('id_tipo_pesquisa');
			$id_questionario = $input->post('id_questionario');
			$numero_dias = $input->post('numero_dias');
			$anonima = $input->post('anonima');
			$periodica = $input->post('periodica');
			$frequencia = $input->post('frequencia');
			$data_ini = $input->post('data_ini');
			if($data_ini != null){
				$data_ini = explode("/",$data_ini);
				if(isset($data_ini[1])){
					$data_ini = $data_ini[2] . "-" . $data_ini[1] . "-" . $data_ini[0];
				}
			}
			$data_fim = $input->post('data_fim');
			if($data_fim != null){
				$data_fim = explode("/", $data_fim);
				if(isset($data_fim[1])){
					$data_fim = $data_fim[2] . "-" . $data_fim[1] . "-" . $data_fim[0];
				}
			}

			$this->db->set('nome_pesquisa', $nome_pesquisa);
			if($id_tipo_pesquisa!=null && $id_tipo_pesquisa!='')
				$this->db->set('id_tipo_pesquisa', $id_tipo_pesquisa);
			if($id_questionario!=null && $id_questionario!='' && is_numeric($input->post('id_questionario'))){
				$this->db->set('id_questionario', $id_questionario);
			}
			if($numero_dias!=null && $numero_dias!='')
				$this->db->set('numero_dias', $numero_dias);
			if($anonima!=null && $anonima!='')
				$this->db->set('anonima', 1);
			else
				$this->db->set('anonima', 0);
			if($periodica!=null && $periodica!='')
				$this->db->set('periodica', 1);
			else
				$this->db->set('periodica', 0);
			if($frequencia!=null && $frequencia!='')
				$this->db->set('frequencia', $frequencia);
			if($data_ini!=null && $data_ini!='' && ($id_tipo_pesquisa != 2 && $id_tipo_pesquisa != 4))
				$this->db->set('data_ini', $data_ini);
			if($data_fim!=null && $data_fim!='' && ($id_tipo_pesquisa != 2 && $id_tipo_pesquisa != 4))
				$this->db->set('data_fim', $data_fim);
			if($id_usuario!=null && $id_usuario!='')
				$this->db->set('id_usuario_atualizador', $id_usuario);
			$this->db->set('nome_tipo', $input->post('nome_tipo'));
			$this->db->set('situacao', '0');
			if($input->post('ativo') != null && $input->post('ativo') != '')
				$this->db->set('ativo', $input->post('ativo'));
			// if($input->post('avaliador') != '')
			// 	$this->db->set('avaliador', $input->post('avaliador'));

			if($input->post('template') != null && $input->post('template') != '')
				$this->db->set('template', $input->post('template'));
			if($input->post('autoavalia') != null && $input->post('autoavalia') != '')
				$this->db->set('autoavalia', $input->post('autoavalia'));
			if($input->post('gestor') != null && $input->post('gestor') != '')
				$this->db->set('gestor', $input->post('gestor'));
			if($input->post('permite_pares') != null && $input->post('permite_pares') != '')
				$this->db->set('permite_pares', $input->post('permite_pares'));

			if($id_tipo_pesquisa == 2){
				if($input->post('autoavalia') != null && $input->post('autoavalia') != '') {
					$this->db->set('autoavalia', $input->post('autoavalia'));
					if($input->post('id_questionario_avaliado')!="" && is_numeric($input->post('id_questionario_avaliado'))){
						$this->db->set('id_questionario_avaliado', $input->post('id_questionario_avaliado'));
					}
				}else{
					$this->db->set('autoavalia', 0);
					$this->db->set('id_questionario_avaliado', 0);
				}
				if($input->post('gestor') != null && $input->post('gestor') != '') {
					$this->db->set('gestor', $input->post('gestor'));
					if($input->post('id_questionario_gestor')!="" && is_numeric($input->post('id_questionario_gestor'))){
						$this->db->set('id_questionario_gestor', $input->post('id_questionario_gestor'));
					}
				}else{
					$this->db->set('gestor', 0);
					$this->db->set('id_questionario_gestor', 0);
				}
				if($input->post('permite_pares') != null && $input->post('permite_pares') != '') {
					$this->db->set('permite_pares', $input->post('permite_pares'));
					if($input->post('id_questionario_pares')!="" && is_numeric($input->post('id_questionario_pares'))){
						$this->db->set('id_questionario_pares', $input->post('id_questionario_pares'));
					}
				}else{
					$this->db->set('permite_pares', 0);
					$this->db->set('id_questionario_pares', 0);
				}

			}else if($id_tipo_pesquisa == 4){
				$this->db->set('previa', 0);
			}

			if($input->post('id_pesquisa') == -1){
				$this->db->from($this->tableUser);
				$this->db->where('id_usuario', $id_usuario);
				$q = $this->db->get();
				$result = $q->row_array();

				$this->db->set('id_empresa', $result['id_empresa']);
				$query = $this->db->insert($this->tablePesquisa);
				$id_pesquisa = $this->db->insert_id();
			}else{
				$id_pesquisa = $input->post('id_pesquisa');
				$this->db->where('id_pesquisa', $id_pesquisa);
				$query = $this->db->update($this->tablePesquisa);
			}

			$this->add_public_of_usuario($input, $id_pesquisa);
			$this->send_pesquisa_message($input, $id_pesquisa);

			return $id_pesquisa;
		}

		public function add_public_of_usuario($input, $id_pesquisa){
			$id_usuario = $this->session->userdata('id');

			$public_mode = $input->post('public_mode');
			$user_ids = $input->post('user_ids');
			$amostra = $input->post('public_mode');

			$this->db->set('situacao', '0');
			$this->db->set('amostra', $amostra);
			$this->db->where('id_pesquisa', $id_pesquisa);
			$this->db->update($this->tablePesquisa);

			$this->db->where('id_pesquisa', $id_pesquisa);
			$this->db->where('usuario_atualizador', $id_usuario);
			$this->db->delete($this->tablePublicPesquisa);
			if($public_mode == 1){
				foreach($user_ids as $team_user_id){
					$team_user_id = explode('_', $team_user_id);
					$team_id = $team_user_id[0];
					$user_id = $team_user_id[1];
					$this->db->set('id_pesquisa', $id_pesquisa);
					$this->db->set('id_usuario', $user_id);
					$this->db->set('id_time', $team_id);
					$this->db->set('usuario_atualizador', $id_usuario);
					if($input->post('avaliador') != '')
						$this->db->set('id_usuario_avaliado', $input->post('avaliador'));
					$query = $this->db->insert($this->tablePublicPesquisa);
					if(!$query){
						return $this->db->last_query();
					}
				}
			}

			return "success";
		}

		public function send_pesquisa_message($input, $id_pesquisa){
			$id_usuario = $this->session->userdata('id');

			$send_message = $input->post('send_message');
			$titulo_email = $input->post('titulo_email');
			$corpo_email = $input->post('corpo_email');

			$this->db->set('situacao', $input->post('situacao'));
			if($send_message==1){
				$this->db->set('titulo_email', $titulo_email);
				$this->db->set('corpo_email', $corpo_email);
				$this->db->set('titulo_email_tks', $input->post('titulo_email_tks'));
				$this->db->set('corpo_email_tks', $input->post('corpo_email_tks'));
			}
			$this->db->where('id_pesquisa', $id_pesquisa);
			$query = $this->db->update($this->tablePesquisa);

			if(!$query){
				return $this->db->last_query();
			}
			return "success";
		}

		public function generate_zapier_token($idUser)
        {
            $tokenRecord = $this->get_zapier_token($idUser);
            $zapierToken = uniqid('ELZ'.$idUser);
            $data_to_insert = array('id_usuario'=>$idUser, 'zapier_token'=>$zapierToken);
            $this->db->trans_start();

            if (!$tokenRecord) $this->db->insert($this->tableZapier,$data_to_insert);
            else
            {
                $this->db->where('id_usuario', $idUser);
                $this->db->update($this->tableZapier,$data_to_insert);
            }
            $result = $this->db->trans_status();
            $this->db->trans_complete();
            if ($result) return $zapierToken;
            else return null;

        }
		public function get_zapier_token($idUser)
        {
            $this->db->select("*");
            $this->db->from($this->tableZapier);
            $this->db->where($this->tableZapier.'.id_usuario', $idUser);
            $q = $this->db->get();
            $result = $q->row_array();
            return $result;
        }
        public function get_user_by_zapier_token($token)
        {

            $this->db->select(
                $this->tableZapier.'.id_usuario, '.
                $this->tableZapier.'.data_atualizacao, '.
                $this->tableUser.'.id_empresa, '.
                $this->tableUser.'.login, '.
                $this->tableCompany.'.nome_empresa, '.
                $this->tableUser.'.nome_usuario, '.
                $this->tableUser.'.nome_usuario, '.
                $this->tableUser.'.admin, '.
                $this->tableUser.'.gestor, '.
                $this->tableUser.'.maintenance_user, '
            );

            $this->db->from($this->tableZapier);
            $this->db->join($this->tableUser, $this->tableUser.'.id_usuario = '.$this->tableZapier.'.id_usuario', 'inner');
            $this->db->join($this->tableCompany, $this->tableUser.'.id_empresa = '.$this->tableCompany.'.id_empresa', 'inner');
            $this->db->where($this->tableZapier.'.zapier_token', $token);
            $q = $this->db->get();
            $result = $q->row_array();
            return $result;
        }

        public function create_user($data)
        {
            $this->db->trans_start();

            $this->db->insert($this->tableUser , $data);
            $result = $this->db->trans_status();
            $this->db->trans_complete();

            return $result;

        }

        public function remove_user($data)
        {
            $this->db->trans_start();
            $this->db->set('ativo', 0);
            $this->db->where('login', $data['login']);
            $this->db->update($this->tableUser);
            $result = $this->db->trans_status();
            $this->db->trans_complete();

            return $result;
        }


        public function test_user_with_login_exists($email)
        {
            $this->db->select('*');
            $this->db->from($this->tableUser);
            $this->db->where('login', $email);
            $q = $this->db->get();
            $result = $q->row_array();
            return boolval($result);
        }



		public function get_pesquisa_full_info_by_id($id_pesquisa){
			$sql = "select a.*, b.nome_usuario, 0 remain_time "
				." from ".$this->viewPesquisaGeral." a "
				." inner join ".$this->tableUser." b on a.id_usuario_atualizador=b.id_usuario "
				." where a.id_pesquisa=".$id_pesquisa;
			$q = $this->db->query($sql);
			$result = $q->row_array();
			// print_r($result);
			if (count($result) > 0 && isset($result['fechado'])) 
				{
					$fechado = $result['fechado']; 
				}
			else 
				{
					$fechado = 0;
					// $sql = "SELECT fechado FROM ttl_pesquisa where id_pesquisa = $id_pesquisa";
					// $q = $this->db->query($sql);
					// $result2 = $q->row_array();
					// $fechado = $result2['fechado']; 
				}

			if(!empty($result)){
				$dteStart 				= new DateTime($result['data_ini']);
				$dteEnd 				= new DateTime($result['data_fim']);
				$dteEndStamp 			= strtotime($result['data_fim']);
				$currentDateTimeStamp 	= strtotime(date('Y-m-d H:i:s'));
				if($dteEndStamp > $currentDateTimeStamp){
					$dteDiff  = $dteStart->diff($dteEnd);
					$y = $dteDiff->y;
					$m = $dteDiff->m;
					$d = $dteDiff->d;
					$h = $dteDiff->h;
					$i = $dteDiff->i;
					$s = $dteDiff->s;

					$dteDiff = (($y*8760)+($m*730.001)+($d*24)+$h).':'.$i.':'.$s;
					$result['remain_time'] = $dteDiff;
				}else{
					$result['remain_time'] = "00:00:00";
				}

			}



			$sql = "select (count(*)/ (select count(*) "
			." from v_pesquisa_geral where id_pesquisa=".$id_pesquisa.")*100 ) as percentage "
			." from v_pesquisa_geral where id_pesquisa=".$id_pesquisa." and respondida =1";
			$q = $this->db->query($sql);
			$row = $q->row_array();


			if ($fechado == 0)
				$sqlescala = "select count(*) as ten_escala from v_pesquisas_respostas where  escala = 10 AND id_pesquisa = ".$id_pesquisa."";
			else 
				$sqlescala = "select count(*) as ten_escala from ttl_snapshot_pesquisas_respostas where  escala = 10 AND id_pesquisa = ".$id_pesquisa."";

			$q_escala = $this->db->query($sqlescala);
			$total_ten_escala = $q_escala->row_array()['ten_escala'];

			$result['ten_escala'] = $total_ten_escala;
			$result['percentage'] = round($row['percentage'], 2);
			return $result;
		}

		public function get_question_list($id_pesquisa, $escala){
			$where_escala = '';
			if($escala != 0)
				$where_escala = " and v1.escala=".$escala;
			$sql = "select v1.id_pergunta, v1.pergunta, v1.escala "
			."from v_pesquisas_respostas v1 where id_pesquisa=".$id_pesquisa. $where_escala."  group by id_pergunta";
			$q = $this->db->query($sql);
			return $q->result_array();
		}

		public function get_filter_cat_pergunta_gestor_list($id_times,$id_cats,$id_perguntas,$id_gestors,$types){
			$id_empresa 	= $this->session->userdata('id_empresa');

			$categories 		= array();
			$perguntas 			= array();
			$gestors 			= array();
			$teams_array 		= array();


			if($types == 'times'){

				$where_id_times_not_in = '';
				if($id_times != '') $where_id_times_not_in = 'id_unidade NOT IN ("'.$id_times.'")';

				$where_id_cats_in = '';
				if($id_cats != '') $where_id_cats_in = 'AND id_categoria IN ("'.$id_cats.'")';

				$where_id_pergunta_in = '';
				if($id_perguntas != '') $where_id_pergunta_in = 'AND id_pergunta IN ("'.$id_perguntas.'")';

				$where_id_gestors_in = '';
				if($id_gestors != '') $where_id_gestors_in = 'AND id_gestor IN ("'.$id_gestors.'")';

				$catsql = "select DISTINCT id_categoria as id_categoria_pergunta,nome_categoria as nome_categoria from v_pesquisas_respostas where ".$where_id_times_not_in." ".$where_id_cats_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_cat = $this->db->query($catsql);
				$categories = $q_cat->result_array();

				$perguntasql = "select DISTINCT id_pergunta as id_pergunta,pergunta as pergunta from v_pesquisas_respostas where ".$where_id_times_not_in." ".$where_id_cats_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_pergunta = $this->db->query($perguntasql);
				$perguntas = $q_pergunta->result_array();

				$gestorsql = "select DISTINCT id_gestor as id_gestor,nome_gestor as nome_gestor from v_pesquisas_respostas where ".$where_id_times_not_in." ".$where_id_cats_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_gestor = $this->db->query($gestorsql);
				$gestors = $q_gestor->result_array();

				$team_sql = "select DISTINCT id_unidade as id,nome_unidade as name from v_pesquisas_respostas where ".$where_id_times_not_in." ".$where_id_cats_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_team_data = $this->db->query($team_sql);
				$teams_array = $q_team_data->result_array();

			}

			if($types == 'cats'){

				if($id_cats != ''){
					$where_id_cats_not_in = '';
				if($id_cats != '') $where_id_cats_not_in = 'id_categoria NOT IN ("'.$id_cats.'")';

				$where_id_times_in = '';
				if($id_times != '') $where_id_times_in = 'AND id_unidade IN ("'.$id_times.'")';

				$where_id_pergunta_in = '';
				if($id_perguntas != '') $where_id_pergunta_in = 'AND id_pergunta IN ("'.$id_perguntas.'")';

				$where_id_gestors_in = '';
				if($id_gestors != '') $where_id_gestors_in = 'AND id_gestor IN ("'.$id_gestors.'")';

				$catsql = "select DISTINCT id_categoria as id_categoria_pergunta,nome_categoria as nome_categoria from v_pesquisas_respostas where ".$where_id_cats_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_cat = $this->db->query($catsql);
				$categories = $q_cat->result_array();

				$perguntasql = "select DISTINCT id_pergunta as id_pergunta,pergunta as pergunta from v_pesquisas_respostas where ".$where_id_cats_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_pergunta = $this->db->query($perguntasql);
				$perguntas = $q_pergunta->result_array();

				$gestorsql = "select DISTINCT id_gestor as id_gestor,nome_gestor as nome_gestor from v_pesquisas_respostas where ".$where_id_cats_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_gestor = $this->db->query($gestorsql);
				$gestors = $q_gestor->result_array();

				$team_sql = "select DISTINCT id_unidade as id,nome_unidade as name from v_pesquisas_respostas where ".$where_id_cats_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_gestors_in."";
				$q_team_data = $this->db->query($team_sql);
				$teams_array = $q_team_data->result_array();

				}
			}

			if($types == 'gestor'){

				if($id_gestors != ''){
					$where_id_gestors_not_in = '';
					if($id_gestors != '') $where_id_gestors_not_in = 'id_gestor NOT IN ("'.$id_gestors.'")';

					$where_id_times_in = '';
					if($id_times != '') $where_id_times_in = 'AND id_unidade IN ("'.$id_times.'")';

					$where_id_pergunta_in = '';
					if($id_perguntas != '') $where_id_pergunta_in = 'AND id_pergunta IN ("'.$id_perguntas.'")';

					$where_id_cats_in = '';
					if($id_cats != '') $where_id_cats_in = 'AND id_categoria IN ("'.$id_cats.'")';

					$catsql = "select DISTINCT id_categoria as id_categoria_pergunta,nome_categoria as nome_categoria from v_pesquisas_respostas where ".$where_id_gestors_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_cats_in."";
					$q_cat = $this->db->query($catsql);
					$categories = $q_cat->result_array();

					$perguntasql = "select DISTINCT id_pergunta as id_pergunta,pergunta as pergunta from v_pesquisas_respostas where ".$where_id_gestors_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_cats_in."";
					$q_pergunta = $this->db->query($perguntasql);
					$perguntas = $q_pergunta->result_array();

					$gestorsql = "select DISTINCT id_gestor as id_gestor,nome_gestor as nome_gestor from v_pesquisas_respostas where ".$where_id_gestors_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_cats_in."";
					$q_gestor = $this->db->query($gestorsql);
					$gestors = $q_gestor->result_array();

					$team_sql = "select DISTINCT id_unidade as id,nome_unidade as name from v_pesquisas_respostas where ".$where_id_gestors_not_in." ".$where_id_times_in." ".$where_id_pergunta_in." ".$where_id_cats_in."";
					$q_team_data = $this->db->query($team_sql);
					$teams_array = $q_team_data->result_array();

				}
			}

			if($types == 'pergunta'){

				if($id_perguntas != ''){
					$where_id_perguntas_not_in = '';
					if($id_perguntas != '') $where_id_perguntas_not_in = 'id_pergunta NOT IN ("'.$id_perguntas.'")';

					$where_id_times_in = '';
					if($id_times != '') $where_id_times_in = 'AND id_unidade IN ("'.$id_times.'")';

					$where_id_gestors_in = '';
					if($id_gestors != '') $where_id_gestors_in = 'AND id_gestor IN ("'.$id_gestors.'")';

					$where_id_cats_in = '';
					if($id_cats != '') $where_id_cats_in = 'AND id_categoria IN ("'.$id_cats.'")';

					$catsql = "select DISTINCT id_categoria as id_categoria_pergunta,nome_categoria as nome_categoria from v_pesquisas_respostas where ".$where_id_perguntas_not_in." ".$where_id_times_in." ".$where_id_gestors_in." ".$where_id_cats_in."";
					$q_cat = $this->db->query($catsql);
					$categories = $q_cat->result_array();

					$perguntasql = "select DISTINCT id_pergunta as id_pergunta,pergunta as pergunta from v_pesquisas_respostas where ".$where_id_perguntas_not_in." ".$where_id_times_in." ".$where_id_gestors_in." ".$where_id_cats_in."";
					$q_pergunta = $this->db->query($perguntasql);
					$perguntas = $q_pergunta->result_array();

					$gestorsql = "select DISTINCT id_gestor as id_gestor,nome_gestor as nome_gestor from v_pesquisas_respostas where ".$where_id_perguntas_not_in." ".$where_id_times_in." ".$where_id_gestors_in." ".$where_id_cats_in."";
					$q_gestor = $this->db->query($gestorsql);
					$gestors = $q_gestor->result_array();

					$team_sql = "select DISTINCT id_unidade as id,nome_unidade as name from v_pesquisas_respostas where ".$where_id_perguntas_not_in." ".$where_id_times_in." ".$where_id_gestors_in." ".$where_id_cats_in."";
					$q_team_data = $this->db->query($team_sql);
					$teams_array = $q_team_data->result_array();

				}
			}


			return array($categories,$perguntas,$gestors,$teams_array);
		}

		public function get_pesquisa_respostas_list($id_pesquisa,$search_data){
			$sql = "SELECT u.id_usuario, u.nome_usuario AS usuario, if(v.pergunta is null, '', v.pergunta) AS pergunta, "
			." if(v.resposta_qualitativa is null, '', v.resposta_qualitativa) AS comentario, "
			." if(v.rating_score is null, '', v.rating_score) AS rating, "
			." if(v.nome_categoria is null, '', v.nome_categoria) AS categoria,(select favorabilidade from ttl_perguntas where id_categoria_pergunta = v.id_categoria LIMIT 1) as favorabilidade, "
			." if(v.resposta is null, '', v.resposta) AS posta, "
			." u1.nome_usuario avaliado "
			." FROM ttl_usuario u , v_pesquisas_respostas v "
			." left join ttl_usuario u1 on v.usuario_avaliado=u1.id_usuario "
			." WHERE u.id_usuario = v.id_usuario and  v.id_Pesquisa=".$id_pesquisa
			." AND (u.nome_usuario LIKE '%".$search_data."%'"
			." OR v.pergunta LIKE '%".$search_data."%'"
			." OR v.resposta_qualitativa LIKE '%".$search_data."%'"
			." OR v.rating_score LIKE '%".$search_data."%'"
			." OR v.nome_categoria LIKE '%".$search_data."%'"
			." OR v.resposta LIKE '%".$search_data."%')";
			//echo $sql;die;
			$q = $this->db->query($sql);
			return $q->result_array();
		}

		public function get_pesquisa_respostas_type_q($id_pergunta,$id_pesquisa,$id_categoria,$id_gestors,$id_times,$tempo_empresa, $fechado = 0){

			$andString = '';
			if($id_pergunta !=''){
				$andString.= ' AND v.id_pergunta = '.$id_pergunta.' ';
			}
			if($id_categoria !=''){
				$andString.= ' AND v.id_categoria IN ('.$id_categoria.') ';
			}
			if($id_gestors !=''){
				$andString.= ' AND v.id_gestor IN ('.$id_gestors.') ';
			}
			if($id_times !=''){
				$andString.= ' AND v.id_unidade IN ('.$id_times.') ';
			}
			if($tempo_empresa !=''){
				$timeInterval = explode("-", $tempo_empresa);
				$andString.= ' AND v.dif_meses >= '.$timeInterval[0].' ';
				if($timeInterval[1] != '*') $andString.= 'AND v.dif_meses <= '.$timeInterval[1].' ';
			}

			$tab = ($fechado == 0)?"v_pesquisas_respostas":"ttl_snapshot_pesquisas_respostas";

			$sql = "SELECT v.nome_usuario as usuario, if(v.pergunta is null, '', v.pergunta) AS pergunta, "
			." if(v.resposta_qualitativa is null, '', v.resposta_qualitativa) AS comentario, "
			." if(v.nome_categoria is null, '', v.nome_categoria) AS categoria, "
			." if(v.resposta is null, '', v.resposta) AS posta "
			." FROM $tab v "
			." WHERE v.id_Pesquisa=".$id_pesquisa
			." AND v.resposta_qualitativa is not null "
			.$andString
			." AND v.tipo = 'q'";
//			." AND v.anonima = '1'";

			// echo $sql;die;
			$q = $this->db->query($sql);
			return $q->result_array();
		}

		public function get_pesquisa_respostas_type_o($id_pergunta,$id_pesquisa,$id_categoria,$id_gestors,$id_times,$tempo_empresa, $fechado = 0){

			$andString = '';
			if($id_pergunta !=''){
				$andString.= ' AND v.id_pergunta = '.$id_pergunta.' ';
			}
			if($id_categoria !=''){
				$andString.= ' AND v.id_categoria IN ('.$id_categoria.') ';
			}
			if($id_gestors !=''){
				$andString.= ' AND v.id_gestor IN ('.$id_gestors.') ';
			}
			if($id_times !=''){
				$andString.= ' AND v.id_unidade IN ('.$id_times.') ';
			}
			if($tempo_empresa !=''){
				$timeInterval = explode("-", $tempo_empresa);
				$andString.= ' AND v.dif_meses >= '.$timeInterval[0].' ';
				if($timeInterval[1] != '*') $andString.= 'AND v.dif_meses <= '.$timeInterval[1].' ';
			}

			$tab = ($fechado == 0)?"v_pesquisas_respostas":"ttl_snapshot_pesquisas_respostas";

			$sql = "SELECT v.nome_usuario as usuario, if(v.pergunta is null, '', v.pergunta) AS pergunta, count(*) as quantidade, "
			." if(v.nome_categoria is null, '', v.nome_categoria) AS categoria, "
			." if(v.resposta is null, '', v.resposta) AS posta "
			." FROM $tab v "
			." WHERE v.id_Pesquisa=".$id_pesquisa
			.$andString
			." AND v.tipo = 'o' "
			."group by v.nome_categoria, v.pergunta, v.resposta";

			// echo $sql;die;
			$q = $this->db->query($sql);
			return $q->result_array();
		}

		public function get_rating_datas_10($id_pergunta, $id_pesquisa, $id_users, $id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado = 0){

			$this->db->select('id_pesquisa, id_pergunta, escala, id_categoria, nome_categoria, pergunta,
			SUM(CASE rating_score WHEN 0 THEN 1 ELSE 0 END) r0,
			SUM(CASE rating_score WHEN 1 THEN 1 ELSE 0 END) r1,
			SUM(CASE rating_score WHEN 2 THEN 1 ELSE 0 END) r2,
			SUM(CASE rating_score WHEN 3 THEN 1 ELSE 0 END) r3,
			SUM(CASE rating_score WHEN 4 THEN 1 ELSE 0 END) r4,
			SUM(CASE rating_score WHEN 5 THEN 1 ELSE 0 END) r5,
			SUM(CASE rating_score WHEN 6 THEN 1 ELSE 0 END) r6,
			SUM(CASE rating_score WHEN 7 THEN 1 ELSE 0 END) r7,
			SUM(CASE rating_score WHEN 8 THEN 1 ELSE 0 END) r8,
			SUM(CASE rating_score WHEN 9 THEN 1 ELSE 0 END) r9,
			SUM(CASE rating_score WHEN 10 THEN 1 ELSE 0 END) r10'
			);
			if($fechado == 0) $this->db->from($this->viewPesquisasRespostas);
			else $this->db->from('ttl_snapshot_pesquisas_respostas');

			$this->db->where('id_pesquisa', $id_pesquisa);

			if($id_users != ''){
				$id_users	=	explode(",", $id_users);
				$this->db->where_in('id_usuario', $id_users);
			}

			if($id_pergunta !=''){
				$this->db->where('id_pergunta', $id_pergunta);
			}
			if($id_categoria !=''){
				$this->db->where_in('id_categoria', explode(",",$id_categoria));
			}
			if($id_gestors !=''){
				$this->db->where_in('id_gestor', explode(",",$id_gestors));
			}

			if($id_times !=''){
				$this->db->where_in('id_unidade', explode(",",$id_times));
			}

			if($tempo_empresa !=''){
				$timeInterval = explode("-", $tempo_empresa);
				$this->db->where('dif_meses >=', $timeInterval[0]);
				if($timeInterval[1] != '*') $this->db->where('dif_meses <=', $timeInterval[1]);
			}

			$this->db->where('escala', 10);
			$this->db->where('rating_score IS NOT NULL');
			$this->db->group_by('id_pesquisa');
			$this->db->group_by('id_pergunta');
			$this->db->group_by('pergunta');

			$q 				= 	$this->db->get();

			$data 			= 	$q->result_array();



			$category_wise_data 	=	array();
			$category_none_data 	=	array();
			$category_data 			=	array();

			if(!empty($data)){
				foreach($data as $index=>$res){

					$data[$index]['total_count'] = $res['r0']+$res['r1']+$res['r2']+$res['r3']+$res['r4']+$res['r5']+$res['r6']+$res['r7']+$res['r8']+$res['r9']+$res['r10'];

					if($data[$index]['total_count'] != 0){
						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							$rating = 'r'.$i;
							$data[$index][$percentage] = ($res[$rating]*100)/$data[$index]['total_count'];
						}

						$data[$index]['actual_red_percentage']   = $data[$index]['r0_percent']+$data[$index]['r1_percent']+$data[$index]['r2_percent']+$data[$index]['r3_percent']+$data[$index]['r4_percent']+$data[$index]['r5_percent']+$data[$index]['r6_percent'];
					$data[$index]['actual_grey_percentage']  = $data[$index]['r7_percent']+$data[$index]['r8_percent'];
					$data[$index]['actual_green_percentage'] = $data[$index]['r9_percent']+$data[$index]['r10_percent'];

						$to_be_less_count 	= 0;
						$to_be_less_percent = 0;
						$orignal_percentage = 0;

						/* getting count how much zero value percentage are there */
						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							if($data[$index][$percentage] < 5){
								$to_be_less_count = $to_be_less_count+1;
								$orignal_percentage += $data[$index][$percentage];
							}
						}


					/* getting r0,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10 percentage are 0 then all percenteage 9.090909091% else percentage 5 minimum */
						if($data[$index]['r0_percent'] == 0 && $data[$index]['r1_percent'] == 0 && $data[$index]['r2_percent'] == 0 && $data[$index]['r3_percent'] == 0 && $data[$index]['r4_percent'] == 0 && $data[$index]['r5_percent'] == 0 && $data[$index]['r6_percent'] == 0 && $data[$index]['r7_percent'] == 0 && $data[$index]['r8_percent'] == 0 && $data[$index]['r9_percent'] == 0 && $data[$index]['r10_percent'] == 0){

							for($i = 0;$i<=10;$i++){
								$percentage = 'r'.$i.'_percent';
								$data[$index][$percentage] = '9.090909091';
							}

						}else{
							for($i = 0;$i<=10;$i++){
								$percentage = 'r'.$i.'_percent';
								if($data[$index][$percentage] < 5)
								$data[$index][$percentage] = 5;
							}
						}
						$total_of 	= 0;
						$divide_of 	= 0;
						if($to_be_less_count == 0)
							$total_of = 0;
						if($to_be_less_count == 1)
							$total_of = 5;
						if($to_be_less_count == 2)
							$total_of = 10;
						if($to_be_less_count == 3)
							$total_of = 15;
						if($to_be_less_count == 4)
							$total_of = 20;
						if($to_be_less_count == 5)
							$total_of = 25;
						if($to_be_less_count == 6)
							$total_of = 30;
						if($to_be_less_count == 7)
							$total_of = 35;
						if($to_be_less_count == 8)
							$total_of = 40;
						if($to_be_less_count == 9)
							$total_of = 45;
						if($to_be_less_count == 10)
							$total_of = 0;


						$data[$index]['total_of'] = $total_of;
						if($to_be_less_count>0){
							$divide_of = 11-$to_be_less_count;
							$to_be_less_percent = ($total_of-$orignal_percentage)/$divide_of;
						}


						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							if($data[$index][$percentage] > 5)
							$data[$index][$percentage] = ($data[$index][$percentage])-$to_be_less_percent;
						}

					}else{
						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							$data[$index][$percentage] = '9.090909091';
						}
					}

					$data[$index]['red_percentage']   = $data[$index]['r0_percent']+$data[$index]['r1_percent']+$data[$index]['r2_percent']+$data[$index]['r3_percent']+$data[$index]['r4_percent']+$data[$index]['r5_percent']+$data[$index]['r6_percent'];
					$data[$index]['grey_percentage']  = $data[$index]['r7_percent']+$data[$index]['r8_percent'];
					$data[$index]['green_percentage'] = $data[$index]['r9_percent']+$data[$index]['r10_percent'];

					if(empty($res['id_categoria'])){
						$category_none_data['data']	=	array('id'=>0,'name'=>'Non categorized');
						$category_none_data['questions'][]	=	$data[$index];
					}else{
						$category_wise_data[$res['id_categoria']]['data']	=	array(
																					'id'=>$res['id_categoria'],
																					'name'=>$res['nome_categoria']
																				);
						$category_wise_data[$res['id_categoria']]['questions'][]	=	$data[$index];
					}
				}
				if(!empty($category_none_data)){
					array_push($category_wise_data,$category_none_data);
				}
			}
			$catdata 	=	array();
				if(!empty($category_wise_data)){
					foreach($category_wise_data as $category){
						$catdata[]	=	$category;
					}
				}
			$data1 	=	array();
			if(!empty($category_wise_data)){
				foreach($category_wise_data as $category){

					$r0 			=	0;
					$r1 			=	0;
					$r2 			=	0;
					$r3 			=	0;
					$r4 			=	0;
					$r5 			=	0;
					$r6 			=	0;
					$r7 			=	0;
					$r8 			=	0;
					$r9 			=	0;
					$r10 			=	0;
					$total 			=	0;
					if(!empty($category['questions'])){
						foreach($category['questions'] as $question){
							$r0		+=	$question['r0'];
							$r1		+=	$question['r1'];
							$r2		+=	$question['r2'];
							$r3		+=	$question['r3'];
							$r4		+=	$question['r4'];
							$r5		+=	$question['r5'];
							$r6		+=	$question['r6'];
							$r7		+=	$question['r7'];
							$r8		+=	$question['r8'];
							$r9		+=	$question['r9'];
							$r10	+=	$question['r10'];

							$total	+=	$question['r0']+$question['r1']+$question['r2']+$question['r3']+$question['r4']+$question['r5']+$question['r6']+$question['r7']+$question['r8']+$question['r9']+$question['r10'];

						}
					}
					$category['r0']	=	$r0;
					$category['r1']	=	$r1;
					$category['r2']	=	$r2;
					$category['r3']	=	$r3;
					$category['r4']	=	$r4;
					$category['r5']	=	$r5;
					$category['r6']	=	$r6;
					$category['r7']	=	$r7;
					$category['r8']	=	$r8;
					$category['r9']	=	$r9;
					$category['r10']=	$r10;
					$category['total']	=	$total;


					if($total != 0){
						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							$rating = 'r'.$i;
							$category[$percentage] = ($category[$rating]*100)/$total;
						}

						$category['actual_red_percentage']   =$category['r0_percent']+$category['r1_percent']+$category['r2_percent']+$category['r3_percent']+$category['r4_percent']+$category['r5_percent']+$category['r6_percent'];
					$category['actual_grey_percentage']  = $category['r7_percent']+$category['r8_percent'];
					$category['actual_green_percentage'] = $category['r9_percent']+$category['r10_percent'];

						$to_be_less_count_cat 	= 0;
						$to_be_less_percent_cat = 0;
						$orignal_percentage_cat = 0;

						/* getting count how much zero value percentage are there */
						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							if($category[$percentage] < 5){
								$to_be_less_count_cat = $to_be_less_count_cat+1;
								$orignal_percentage_cat += $category[$percentage];
							}
						}


					/* getting r0,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10 percentage are 0 then all percenteage 9.090909091% else percentage 5 minimum */
						if($category['r0_percent'] == 0 && $category['r1_percent'] == 0 && $category['r2_percent'] == 0 && $category['r3_percent'] == 0 && $category['r4_percent'] == 0 && $category['r5_percent'] == 0 && $category['r6_percent'] == 0 && $category['r7_percent'] == 0 && $category['r8_percent'] == 0 && $category['r9_percent'] == 0 && $category['r10_percent'] == 0){

							for($i = 0;$i<=10;$i++){
								$percentage = 'r'.$i.'_percent';
								$category[$percentage] = '9.090909091';
							}

						}else{
							for($i = 0;$i<=10;$i++){
								$percentage = 'r'.$i.'_percent';
								if($category[$percentage] < 5)
								$category[$percentage] = 5;
							}
						}

						$total_of_cat 	= 0;
						$divide_of_cat 	= 0;
						if($to_be_less_count_cat == 0)
							$total_of_cat = 0;
						if($to_be_less_count_cat == 1)
							$total_of_cat = 5;
						if($to_be_less_count_cat == 2)
							$total_of_cat = 10;
						if($to_be_less_count_cat == 3)
							$total_of_cat = 15;
						if($to_be_less_count_cat == 4)
							$total_of_cat = 20;
						if($to_be_less_count_cat == 5)
							$total_of_cat = 25;
						if($to_be_less_count_cat == 6)
							$total_of_cat = 30;
						if($to_be_less_count_cat == 7)
							$total_of_cat = 35;
						if($to_be_less_count_cat == 8)
							$total_of_cat = 40;
						if($to_be_less_count_cat == 9)
							$total_of_cat = 45;
						if($to_be_less_count_cat == 10)
							$total_of_cat = 0;


						if($to_be_less_count_cat>0){
							$divide_of_cat = 11-$to_be_less_count_cat;
							$to_be_less_percent_cat = ($total_of_cat-$orignal_percentage_cat)/$divide_of_cat;
						}


						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							if($category[$percentage] > 5)
							$category[$percentage] = ($category[$percentage])-$to_be_less_percent_cat;
						}

					}else{
						for($i = 0;$i<=10;$i++){
							$percentage = 'r'.$i.'_percent';
							$category[$percentage] = '9.090909091';
						}
					}
					$category['red_percentage']   =$category['r0_percent']+$category['r1_percent']+$category['r2_percent']+$category['r3_percent']+$category['r4_percent']+$category['r5_percent']+$category['r6_percent'];
					$category['grey_percentage']  = $category['r7_percent']+$category['r8_percent'];
					$category['green_percentage'] = $category['r9_percent']+$category['r10_percent'];

					$data1[]		=	$category;
				}
			}
			return 	array(
						'categorywise'=>$data1,
						'non_categorywise'=>$catdata
					);
		}

		public function get_rating_datas_5($id_pergunta, $id_pesquisa, $id_users, $id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado = 0){

			$this->db->select('id_pesquisa, id_pergunta, escala, id_categoria, nome_categoria, pergunta,
			SUM(CASE rating_score WHEN 1 THEN 1 ELSE 0 END) r1,
			SUM(CASE rating_score WHEN 2 THEN 1 ELSE 0 END) r2,
			SUM(CASE rating_score WHEN 3 THEN 1 ELSE 0 END) r3,
			SUM(CASE rating_score WHEN 4 THEN 1 ELSE 0 END) r4,
			SUM(CASE rating_score WHEN 5 THEN 1 ELSE 0 END) r5');

			if($fechado == 0) $this->db->from($this->viewPesquisasRespostas);
			else $this->db->from('ttl_snapshot_pesquisas_respostas');
			
			$this->db->where('id_pesquisa', $id_pesquisa);

			if($id_users != ''){
				$id_users	=	explode(",", $id_users);
				$this->db->where_in('id_usuario', $id_users);
			}

			if($id_pergunta !=''){
				$this->db->where('id_pergunta', $id_pergunta);
			}
			if($id_categoria !=''){
				$this->db->where_in('id_categoria', explode(",",$id_categoria));
			}
			if($id_gestors !=''){
				$this->db->where_in('id_gestor', explode(",",$id_gestors));
			}

			if($id_times !=''){
				$this->db->where_in('id_unidade', explode(",",$id_times));
			}

			if($tempo_empresa !=''){
				$timeInterval = explode("-", $tempo_empresa);
				$this->db->where('dif_meses >=', $timeInterval[0]);
				if($timeInterval[1] != '*') $this->db->where('dif_meses <=', $timeInterval[1]);
			}

			$this->db->where('escala', 5);
			$this->db->where('rating_score IS NOT NULL');
			$this->db->group_by('id_pesquisa');
			$this->db->group_by('id_pergunta');
			$this->db->group_by('pergunta');

			$q 				= 	$this->db->get();
			$data 			= 	$q->result_array();


			$category_wise_data 	=	array();
			$category_none_data 	=	array();
			$category_data 			=	array();

			if(!empty($data)){
				foreach($data as $index=>$res){

					$data[$index]['total_count'] = $res['r1']+$res['r2']+$res['r3']+$res['r4']+$res['r5'];

					if($data[$index]['total_count'] != 0){
						$data[$index]['r1_percent'] = ($res['r1']*100)/$data[$index]['total_count'];
						$data[$index]['r2_percent'] = ($res['r2']*100)/$data[$index]['total_count'];
						$data[$index]['r3_percent'] = ($res['r3']*100)/$data[$index]['total_count'];
						$data[$index]['r4_percent'] = ($res['r4']*100)/$data[$index]['total_count'];
						$data[$index]['r5_percent'] = ($res['r5']*100)/$data[$index]['total_count'];

			$data[$index]['actual_red_percentage']   = $data[$index]['r1_percent']+$data[$index]['r2_percent'];
			$data[$index]['actual_grey_percentage']  = $data[$index]['r3_percent'];
			$data[$index]['actual_green_percentage'] = $data[$index]['r4_percent']+$data[$index]['r5_percent'];

						$to_be_less_count 	= 0;
						$to_be_less_percent = 0;
						$orignal_percentage = 0;

						/* getting count how much zero value percentage are there */
						if($data[$index]['r1_percent'] < 5){
							$to_be_less_count = $to_be_less_count+1;
							$orignal_percentage += $data[$index]['r1_percent'];
						}
						if($data[$index]['r2_percent'] < 5){
							$to_be_less_count = $to_be_less_count+1;
							$orignal_percentage += $data[$index]['r2_percent'];
						}
						if($data[$index]['r3_percent'] < 5){
							$to_be_less_count = $to_be_less_count+1;
							$orignal_percentage += $data[$index]['r3_percent'];
						}
						if($data[$index]['r4_percent'] < 5){
							$to_be_less_count = $to_be_less_count+1;
							$orignal_percentage += $data[$index]['r4_percent'];
						}
						if($data[$index]['r5_percent'] < 5){
							$to_be_less_count = $to_be_less_count+1;
							$orignal_percentage += $data[$index]['r5_percent'];
						}

					/* getting r1,r2,r3,r4,r5 percentage are 0 then all percenteage 20 else percentage 5 minimum */
						if($data[$index]['r1_percent'] == 0 && $data[$index]['r2_percent'] == 0 && $data[$index]['r3_percent'] == 0 && $data[$index]['r4_percent'] == 0 && $data[$index]['r5_percent'] == 0){
							$data[$index]['r1_percent'] = 20;
							$data[$index]['r2_percent'] = 20;
							$data[$index]['r3_percent'] = 20;
							$data[$index]['r4_percent'] = 20;
							$data[$index]['r5_percent'] = 20;
						}else{
							if($data[$index]['r1_percent'] < 5)
							$data[$index]['r1_percent'] = 5;


							if($data[$index]['r2_percent'] < 5)
								$data[$index]['r2_percent'] = 5;

							if($data[$index]['r3_percent'] < 5)
								$data[$index]['r3_percent'] = 5;


							if($data[$index]['r4_percent'] < 5)
								$data[$index]['r4_percent'] = 5;

							if($data[$index]['r5_percent'] < 5)
								$data[$index]['r5_percent'] = 5;
						}
						$total_of 	= 0;
						$divide_of 	= 0;
						if($to_be_less_count == 0)
							$total_of = 0;
						if($to_be_less_count == 1)
							$total_of = 5;
						if($to_be_less_count == 2)
							$total_of = 10;
						if($to_be_less_count == 3)
							$total_of = 15;
						if($to_be_less_count == 4)
							$total_of = 20;
						if($to_be_less_count == 5)
							$total_of = 0;

						$data[$index]['total_of'] = $total_of;
						if($to_be_less_count>0){
							$divide_of = 5-$to_be_less_count;
							$to_be_less_percent = ($total_of-$orignal_percentage)/$divide_of;
						}


						if($data[$index]['r1_percent'] > 5)
						$data[$index]['r1_percent'] = ($data[$index]['r1_percent'])-$to_be_less_percent;

						if($data[$index]['r2_percent'] > 5)
						$data[$index]['r2_percent'] = ($data[$index]['r2_percent'])-$to_be_less_percent;

						if($data[$index]['r3_percent'] > 5)
						$data[$index]['r3_percent'] = ($data[$index]['r3_percent'])-$to_be_less_percent;


						if($data[$index]['r4_percent'] > 5)
						$data[$index]['r4_percent'] = ($data[$index]['r4_percent'])-$to_be_less_percent;

						if($data[$index]['r5_percent'] > 5)
						$data[$index]['r5_percent'] = ($data[$index]['r5_percent'])-$to_be_less_percent;
					}else{
						$data[$index]['r1_percent'] = 20;
						$data[$index]['r2_percent'] = 20;
						$data[$index]['r3_percent'] = 20;
						$data[$index]['r4_percent'] = 20;
						$data[$index]['r5_percent'] = 20;
					}

					$data[$index]['red_percentage']   = $data[$index]['r1_percent']+$data[$index]['r2_percent'];
					$data[$index]['grey_percentage']  = $data[$index]['r3_percent'];
					$data[$index]['green_percentage'] = $data[$index]['r4_percent']+$data[$index]['r5_percent'];


					if(empty($res['id_categoria'])){
						$category_none_data['data']	=	array('id'=>0,'name'=>'Non categorized');
						$category_none_data['questions'][]	=	$data[$index];
					}else{
						$category_wise_data[$res['id_categoria']]['data']	=	array(
																					'id'=>$res['id_categoria'],
																					'name'=>$res['nome_categoria']
																				);
						$category_wise_data[$res['id_categoria']]['questions'][]	=	$data[$index];
					}
				}

				if(!empty($category_none_data)){
					array_push($category_wise_data,$category_none_data);
				}
			}
			$catdata 	=	array();
				if(!empty($category_wise_data)){
					foreach($category_wise_data as $category){
						$catdata[]	=	$category;
					}
				}
			$data1 	=	array();
			if(!empty($category_wise_data)){
				foreach($category_wise_data as $category){

					$r1 			=	0;
					$r2 			=	0;
					$r3 			=	0;
					$r4 			=	0;
					$r5 			=	0;
					$total 			=	0;
					if(!empty($category['questions'])){
						foreach($category['questions'] as $question){
							$r1		+=	$question['r1'];
							$r2		+=	$question['r2'];
							$r3		+=	$question['r3'];
							$r4		+=	$question['r4'];
							$r5		+=	$question['r5'];

							$total	+=	$question['r1']+$question['r2']+$question['r3']+$question['r4']+$question['r5'];
						}
					}
					$category['r1']	=	$r1;
					$category['r2']	=	$r2;
					$category['r3']	=	$r3;
					$category['r4']	=	$r4;
					$category['r5']	=	$r5;
					$category['total']	=	$total;

					if($total != 0){
						$category['r1_percent'] = ($r1*100)/$total;
						$category['r2_percent'] = ($r2*100)/$total;
						$category['r3_percent'] = ($r3*100)/$total;
						$category['r4_percent'] = ($r4*100)/$total;
						$category['r5_percent'] = ($r5*100)/$total;

						$category['actual_red_percentage']   =$category['r1_percent']+$category['r2_percent'];
						$category['actual_grey_percentage']  = $category['r3_percent'];
						$category['actual_green_percentage'] = $category['r4_percent']+$category['r5_percent'];

						$to_be_less_count_cat 	= 0;
						$to_be_less_percent_cat = 0;
						$orignal_percentage_cat = 0;

						/* getting count how much zero value percentage are there */
						if($category['r1_percent'] < 5){
							$to_be_less_count_cat = $to_be_less_count_cat+1;
							$orignal_percentage_cat += $category['r1_percent'];
						}
						if($category['r2_percent'] < 5){
							$to_be_less_count_cat = $to_be_less_count_cat+1;
							$orignal_percentage_cat += $category['r2_percent'];
						}
						if($category['r3_percent'] < 5){
							$to_be_less_count_cat = $to_be_less_count_cat+1;
							$orignal_percentage_cat += $category['r3_percent'];
						}
						if($category['r4_percent'] < 5){
							$to_be_less_count_cat = $to_be_less_count_cat+1;
							$orignal_percentage_cat += $category['r4_percent'];
						}
						if($category['r5_percent'] < 5){
							$to_be_less_count_cat = $to_be_less_count_cat+1;
							$orignal_percentage_cat += $category['r5_percent'];
						}

					/* getting r1,r2,r3,r4,r5 percentage are 0 then all percenteage 20 else percentage 5 minimum */
						if($category['r1_percent'] == 0 && $category['r2_percent'] == 0 && $category['r3_percent'] == 0 && $category['r4_percent'] == 0 && $category['r5_percent'] == 0){
							$category['r1_percent'] = 20;
							$category['r2_percent'] = 20;
							$category['r3_percent'] = 20;
							$category['r4_percent'] = 20;
							$category['r5_percent'] = 20;
						}else{
							if($category['r1_percent'] < 5)
							$category['r1_percent'] = 5;


							if($category['r2_percent']< 5)
								$category['r2_percent'] = 5;

							if($category['r3_percent'] < 5)
								$category['r3_percent'] = 5;


							if($category['r4_percent'] < 5)
								$category['r4_percent'] = 5;

							if($category['r5_percent'] < 5)
								$category['r5_percent'] = 5;
						}
						$total_of_cat 	= 0;
						$divide_of_cat 	= 0;
						if($to_be_less_count_cat == 0)
							$total_of_cat = 0;
						if($to_be_less_count_cat == 1)
							$total_of_cat = 5;
						if($to_be_less_count_cat == 2)
							$total_of_cat = 10;
						if($to_be_less_count_cat == 3)
							$total_of_cat = 15;
						if($to_be_less_count_cat == 4)
							$total_of_cat = 20;
						if($to_be_less_count_cat == 5)
							$total_of_cat = 0;

						if($to_be_less_count_cat>0){
							$divide_of_cat = 5-$to_be_less_count_cat;
							$to_be_less_percent_cat = ($total_of_cat-$orignal_percentage_cat)/$divide_of_cat;
						}


						if($category['r1_percent'] > 5)
						$category['r1_percent'] = ($category['r1_percent'])-$to_be_less_percent_cat;

						if($category['r2_percent'] > 5)
						$category['r2_percent'] = ($category['r2_percent'])-$to_be_less_percent_cat;

						if($category['r3_percent'] > 5)
						$category['r3_percent'] = ($category['r3_percent'])-$to_be_less_percent_cat;

						if($category['r4_percent'] > 5)
						$category['r4_percent'] = ($category['r4_percent'])-$to_be_less_percent_cat;

						if($category['r5_percent'] > 5)
						$category['r5_percent'] = ($category['r5_percent'])-$to_be_less_percent_cat;
				}else{
					$category['r1_percent'] = 20;
					$category['r2_percent'] = 20;
					$category['r3_percent'] = 20;
					$category['r4_percent'] = 20;
					$category['r5_percent'] = 20;
				}
				$category['red_percentage']   =$category['r1_percent']+$category['r2_percent'];
				$category['grey_percentage']  = $category['r3_percent'];
				$category['green_percentage'] = $category['r4_percent']+$category['r5_percent'];



					$data1[]		=	$category;
				}
			}
			return 	array(
						'categorywise'=>$data1,
						'non_categorywise'=>$catdata
					);
		}

		public function get_glabal_rating_datas10($id_pergunta, $id_pesquisa, $id_users, $id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado = 0){

			$this->db->select('id_pesquisa, escala,
			SUM(CASE rating_score WHEN 0 THEN 1 ELSE 0 END) r0,
			SUM(CASE rating_score WHEN 1 THEN 1 ELSE 0 END) r1,
			SUM(CASE rating_score WHEN 2 THEN 1 ELSE 0 END) r2,
			SUM(CASE rating_score WHEN 3 THEN 1 ELSE 0 END) r3,
			SUM(CASE rating_score WHEN 4 THEN 1 ELSE 0 END) r4,
			SUM(CASE rating_score WHEN 5 THEN 1 ELSE 0 END) r5,
			SUM(CASE rating_score WHEN 6 THEN 1 ELSE 0 END) r6,
			SUM(CASE rating_score WHEN 7 THEN 1 ELSE 0 END) r7,
			SUM(CASE rating_score WHEN 8 THEN 1 ELSE 0 END) r8,
			SUM(CASE rating_score WHEN 9 THEN 1 ELSE 0 END) r9,
			SUM(CASE rating_score WHEN 10 THEN 1 ELSE 0 END) r10');

			if ($fechado == 0) $this->db->from($this->viewPesquisasRespostas);
			else $this->db->from('ttl_snapshot_pesquisas_respostas');

			$this->db->where('id_pesquisa', $id_pesquisa);

			if($id_users != ''){
				$id_users	=	explode(",", $id_users);
				$this->db->where_in('id_usuario', $id_users);
			}

			if($id_pergunta !=''){
				$this->db->where('id_pergunta', $id_pergunta);
			}
			if($id_categoria !=''){
				$this->db->where_in('id_categoria', explode(",",$id_categoria));
			}
			if($id_gestors !=''){
				$this->db->where_in('id_gestor', explode(",",$id_gestors));
			}

			if($id_times !=''){
				$this->db->where_in('id_unidade', explode(",",$id_times));
			}

			if($tempo_empresa !=''){
				$timeInterval = explode("-", $tempo_empresa);
				$this->db->where('dif_meses >=', $timeInterval[0]);
				if($timeInterval[1] != '*') $this->db->where('dif_meses <=', $timeInterval[1]);
			}


			$this->db->where('escala', 10);
			$this->db->where('rating_score IS NOT NULL');
			$this->db->group_by('id_pesquisa');
			$this->db->group_by('escala');

			$q 		= 	$this->db->get();
			$data 	=	$q->result_array();

			$retrun_data 	=	array();
			if(!empty($data)){

				$total_responses 	=	$data[0]['r0']+$data[0]['r1']+$data[0]['r2']+$data[0]['r3']+$data[0]['r4']+$data[0]['r5']+$data[0]['r6']+$data[0]['r7']+$data[0]['r8']+$data[0]['r9']+$data[0]['r10'];
				$retrun_data 	=	array(
										'totalresponses'=>$total_responses,
										'r0'=>$data[0]['r0'],
										'r1'=>$data[0]['r1'],
										'r2'=>$data[0]['r2'],
										'r3'=>$data[0]['r3'],
										'r4'=>$data[0]['r4'],
										'r5'=>$data[0]['r5'],
										'r6'=>$data[0]['r6'],
										'r7'=>$data[0]['r7'],
										'r8'=>$data[0]['r8'],
										'r9'=>$data[0]['r9'],
										'r10'=>$data[0]['r10'],
										'desfavorable'=>number_format((($data[0]['r0']+$data[0]['r1']+$data[0]['r2']+$data[0]['r3']+$data[0]['r4']+$data[0]['r5']+$data[0]['r6']) * 100) / $total_responses,2),
										'nutro'=>number_format((($data[0]['r7']+$data[0]['r8']) * 100) / $total_responses,2),
										'favoravel'=>number_format((($data[0]['r9']+$data[0]['r10']) * 100) / $total_responses,2),
									);
			}
			return $retrun_data;
		}

		public function get_glabal_rating_datas5($id_pergunta, $id_pesquisa, $id_users, $id_categoria,$type,$group_by,$id_gestors,$id_times,$tempo_empresa, $fechado = 0){

			$this->db->select('
			SUM(CASE rating_score WHEN 1 THEN 1 ELSE 0 END) r1,
			SUM(CASE rating_score WHEN 2 THEN 1 ELSE 0 END) r2,
			SUM(CASE rating_score WHEN 3 THEN 1 ELSE 0 END) r3,
			SUM(CASE rating_score WHEN 4 THEN 1 ELSE 0 END) r4,
			SUM(CASE rating_score WHEN 5 THEN 1 ELSE 0 END) r5');

			if ($fechado == 0) $this->db->from($this->viewPesquisasRespostas);
			else $this->db->from('ttl_snapshot_pesquisas_respostas');

			$this->db->where('id_pesquisa', $id_pesquisa);

			if($id_users != ''){
				$id_users	=	explode(",", $id_users);
				$this->db->where_in('id_usuario', $id_users);
			}

			if($id_pergunta !=''){
				$this->db->where('id_pergunta', $id_pergunta);
			}
			if($id_categoria !=''){
				$this->db->where_in('id_categoria', explode(",",$id_categoria));
			}
			if($id_gestors !=''){
				$this->db->where_in('id_gestor', explode(",",$id_gestors));
			}

			if($id_times !=''){
				$this->db->where_in('id_unidade', explode(",",$id_times));
			}

			if($tempo_empresa !=''){
				$timeInterval = explode("-", $tempo_empresa);
				$this->db->where('dif_meses >=', $timeInterval[0]);
				if($timeInterval[1] != '*') $this->db->where('dif_meses <=', $timeInterval[1]);
			}


			$this->db->where('escala', 5);
			$this->db->where('rating_score IS NOT NULL');
			$this->db->group_by('id_pesquisa');
			$this->db->group_by('escala');
			$q 				= 	$this->db->get();
			$data 			=	$q->result_array();
			$retrun_data 	=	array();
			if(!empty($data)){

				$total_responses 	=	$data[0]['r1']+$data[0]['r2']+$data[0]['r3']+$data[0]['r4']+$data[0]['r5'];
				$retrun_data 		=	array(
											'totalresponses'=>$total_responses,
											'r1percent'=>number_format((($data[0]['r1']) * 100) / $total_responses,2),
											'r2percent'=>number_format((($data[0]['r2']) * 100) / $total_responses,2),
											'r3percent'=>number_format((($data[0]['r3']) * 100) / $total_responses,2),
											'r4percent'=>number_format((($data[0]['r4']) * 100) / $total_responses,2),
											'r5percent'=>number_format((($data[0]['r5']) * 100) / $total_responses,2),
											'r1'=>$data[0]['r1'],
											'r2'=>$data[0]['r2'],
											'r3'=>$data[0]['r3'],
											'r4'=>$data[0]['r4'],
											'r5'=>$data[0]['r5'],
										);
				$ration_type1 =  ['desfavorable'=> ($retrun_data['r1percent']*1)+($retrun_data['r2percent']*1),
								 'nutro'=> ($retrun_data['r3percent']*1),
								 'favoravel'=> ($retrun_data['r4percent']*1)+($retrun_data['r5percent']*1),
								 'desfavorable_count'=> ($retrun_data['r1'])+($retrun_data['r2']),
								 'nutro_count'=> $retrun_data['r3'],
								 'favoravel_count'=> ($retrun_data['r4'])+($retrun_data['r5']),
								 'total_count'=> $retrun_data['r1']+$retrun_data['r2']+$retrun_data['r3']+$retrun_data['r4']+$retrun_data['r5'],

								];
				$ration_type2 =  ['desfavorable'=> ($retrun_data['r1percent']*1)+($retrun_data['r2percent']*1)+($retrun_data['r3percent']*1),
								 'nutro'=> ($retrun_data['r4percent']*1),
								 'favoravel'=> ($retrun_data['r5percent']*1),
								 'desfavorable_count'=> ($retrun_data['r1'])+($retrun_data['r2'])+($retrun_data['r3']),
								 'nutro_count'=> $retrun_data['r4'],
								 'favoravel_count'=> ($retrun_data['r5']),
								 'total_count'=> $retrun_data['r1']+$retrun_data['r2']+$retrun_data['r3']+$retrun_data['r4']+$retrun_data['r5'],

								];
				$retrun_data['scaletype1'] = $ration_type1;
				$retrun_data['scaletype2'] = $ration_type2;
			}
			return $retrun_data;
	}
	
	public function get_people_developement($id_empresa,$id_surveys=0,$id_tags=0,$id_teams=0,$id_gestors=0,$id_users=0,$start_time=0, $return_array = true){
		$this->db->select("v.id_pesquisa,v.nome_pesquisa,v.usuario_avaliado as id_usuario, v.usuario_avaliado, v.nome_usuario_avaliado , v.nome_usuario, v.time_avaliado,v.admissao_avaliado,v.gestor_avaliado,v.data_envio_respostas,v.media_gestor, v.media_pares,v.media_avaliador,v.nota_final");
		$this->db->from($this->viewPesquisaGeral." as v");
		$this->db->where('v.id_tipo_pesquisa', 2);
		$this->db->where('id_empresa', $id_empresa);
		$this->db->group_by('usuario_avaliado,nome_pesquisa');
		if($id_surveys != 0){
			$id_surveys	=	explode(",", $id_surveys);
			$this->db->where_in('id_pesquisa', $id_surveys);
		}
		if($id_teams != 0){
			$id_teams	=	explode(",", $id_teams);
			$this->db->where_in('id_time_avaliado', $id_teams);
		}
		if($id_gestors != 0){
			$id_gestors	=	explode(",", $id_gestors);
			$this->db->where_in('id_gestor_avaliado', $id_gestors);
		}
		if($id_users != 0){
			$id_users	=	explode(",", $id_users);
			$this->db->where_in('usuario_avaliado', $id_users);
		}
		if($start_time != 0){
			$start_time	=	date("Y-m-d", strtotime(str_replace('/', '-', $start_time)));
			$this->db->where('DATE(data_ini) >=', $start_time);
		}
		$query 		= 	$this->db->get();
		//echo $this->db->last_query();die;
		$results 	=	$query->result_array();
		
		$totalnota_final	=	0; 
		$count = 0;
		if(!empty($results)){
			foreach($results as $row){
				if($row['nota_final'] > 0){
					$totalnota_final	+=	$row['nota_final'];
					$count++;	
				}
			}
		}
		
		$avgnota_final	=	0;
		if($count>0){
			$avgnota_final	=	$totalnota_final/$count;
		}

		if (!$return_array) return $query;

		return 	array(
					'results'=>$results, 
					'totalnota_final'=> $totalnota_final,
					'avgnota_final'=> $avgnota_final,
				);
	}
	
	public function get_survey_details_developement($survey_id, $id_empresa, $user_id){
		$this->db->select("v.id_pesquisa,v.nome_pesquisa,v.id_usuario, v.nome_usuario, v.time_avaliado,v.admissao_avaliado,v.gestor_avaliado,v.data_envio_respostas,v.media_gestor, v.media_pares,v.media_avaliador,v.nota_final");
		$this->db->from($this->viewPesquisaGeral." as v");
		$this->db->where('v.id_tipo_pesquisa', 2);
		$this->db->where('id_empresa', $id_empresa);
		$this->db->where('id_pesquisa', $survey_id);
		$this->db->where('usuario_avaliado', $user_id);
		$this->db->group_by('usuario_avaliado');
		// $this->db->limit(1);
		$query 		= 	$this->db->get();
		$result 	=	$query->row_array();
		return 	$result;//!empty($results)?$results[0]:array();
	}
	
	public function get_all_questions_people_developement($survey_id, $user_id){

		if($survey_id != null){
			
			// all questions
			$this->db->select("v1.id_pergunta, v.tipo_avaliador, v1.pergunta, v1.resposta_qualitativa,v1.usuario_avaliado as user");
			$this->db->from($this->viewPesquisaGeral." as v, ".$this->viewPesquisasRespostas." as v1");
			$this->db->where('v.id_pesquisa = v1.id_pesquisa');
			$this->db->where('v.id_tipo_pesquisa', 2);
			$this->db->where('v.id_pesquisa', $survey_id);
			$this->db->where('v1.usuario_avaliado', $user_id);
			$this->db->where('v1.tipo', 'q');
			$this->db->where_in('v.tipo_avaliador ', array(1,2,3));
			$this->db->group_by('v1.pergunta');
			$query 		= 	$this->db->get();
			$results 	=	$query->result_array();
			$all_questions 		=	array();
			foreach($results as $question){
				$all_questions[$question['id_pergunta']]['question_detail']	=	$question;
				$all_questions[$question['id_pergunta']]['answers'][]		=	$question;
				if(!empty($all_questions[$question['id_pergunta']]['answers'])){

					foreach ($all_questions[$question['id_pergunta']]['answers'] as $key => $answer) {

						$all_questions[$question['id_pergunta']]['answers'][$key]['user_detail'] = $this->get_details_of_user_by_id($answer['user']);
					}
				}									
			} 
			sort($all_questions);
			return 	array('results' => $all_questions);
		}else{
			return array();
		}		
	}

	public function get_details_of_user_by_id($id)
	{
		$this->db->select(	"tu.id_empresa, nome_usuario as name,
							 url_image as image");
		$this->db->from($this->tableUser . ' tu');
		$this->db->where("tu.id_usuario = " . $id);
		$query = $this->db->get();
		$res = $query->row_array();
		if(!empty($res['image'])){
			$image 				=	$res['image'];
			$res['image'] 		= 	base_url('assets/img') . '/'. $res['id_empresa'] .'/'.$image;
			$res['xs_image'] 	= 	base_url('assets/img') . '/'. $res['id_empresa'] .'/50/'.$image;
			$res['md_image'] 	= 	base_url('assets/img') . '/'. $res['id_empresa'] .'/150/'.$image;
		}else{
			$res['image'] 		= 	null;
			$res['xs_image'] 	= 	null;
			$res['md_image'] 	= 	null;
		}
		return $res;
	}

	public function get_activity_detail_by_id_for_profile_career($activity_id)
	    {
	    	$this->db->select('ta.id_atividade as id, ta.parent_id as tatic_id, ta.id_resultado_chave as key_id, ta.nome as title, ta.descricao as description, ta.progresso as percentage,ta.atraso, ta.responsavel, ta.data_ini as init, ta.data_fim as fim, ta.perfil,'.$this->tableResultadoChave.'.nomeRChave as key_name');
	    	$this->db->from($this->tableActivities . ' ta');
	    	$this->db->join($this->tableResultadoChave, $this->tableResultadoChave.'.id_resultado_chave = ta.id_resultado_chave', 'inner');
	//    	$this->db->join($this->tableAtvResponsive . ' tar','tar.id_atividade = ta.id_atividade', 'left');
	    	$this->db->join($this->tableGoals, $this->tableGoals.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');

	    	$this->db->where('(ta.id_atividade = '.$activity_id.' )');

	    	$query = $this->db->get();
	    	$retornoKey = array();
	    	$retornoKey = $query->row_array();

	    	if(!empty($retornoKey)){
	    		$retornoKey['responsible_user'] = $this->get_users_details_by_id($retornoKey['responsavel']);  
	    	}

	    	return $retornoKey;

	    }
	public function get_cycle_configuration_list(){
		$id_empresa = $this->session->userdata('id_empresa');
		$this->db->from($this->tableRevisaoCiclo);
		$this->db->where('id_empresa', $id_empresa);
		$query		=	$this->db->get();
		$results 	=	$query->result_array();
		$records	=	array();
		if(!empty($results)){
			foreach($results as $result){
				$cycleId	=	$result['id_revisao_ciclo'];
				$this->db->where('id_revisao_ciclo',$cycleId);
				$q	=	$this->db->get($this->tableRevisaoCicloAvaliacoes);
				$usersavaliados =	$q->result_array();
				if(!empty($usersavaliados)){
					foreach($usersavaliados as $availido){
						if($availido['respondido'] != 1){
							$completeCycle	=	0;
							break;
						}else{
							$completeCycle	=	1;
						}
					}
				}
				$result['complete']		=	isset($completeCycle)?$completeCycle:0;
				$records[]				=	$result;
			}
		}
		return $records;
	}
	public function getGenelaIdByYear($year){
		$id_janela = "";
		$this->db->where('descricao',$year);
		$this->db->where('id_empresa',$this->session->userdata('id_empresa'));
		$query 	= $this->db->get($this->tableWindow);
        $result = $query->row();
		if(!empty($result)){
			$id_janela	=	$result->id_janela;
		}
		return $id_janela;
	}
	public function deleteFasesByRavsaoCicloId($id_revisao_ciclo){
		$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
		$this->db->delete($this->tableRevisaoCicloFases);
	}
	public function deleteRevisaoCicloScoreByCicloId($id_revisao_ciclo){
		//we never delete should update ativo =0
		//$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
		//$this->db->delete($this->tableRevisaoCicloScore);
	}
	public function deleteRevisaoCicloAvaliacoesByCicloId($id_revisao_ciclo,$type){
		//we never delete should update ativo =0
		//$this->db->where('id_tipo_avaliacao',$type);
		//$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
		//$this->db->delete($this->tableRevisaoCicloAvaliacoes);
	}
	
	public function deletefasesnotin($id_revisao_ciclo,$all_fases){
		//$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
		//$this->db->where_not_in('id_revisao_ciclo_fases',$all_fases);
		//$this->db->delete($this->tableRevisaoCicloAvaliacoesFase);
		
		//$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
		//$this->db->where_not_in('id_revisao_ciclo_fases',$all_fases);
		//$this->db->delete($this->tableRevisaoCicloFases);
	}
	public function save_new_configuration_cycle($request,$userTeams,$disableform){
		
		$get_array	=	array();
		parse_str($request,$get_array);
		if($disableform==1){
			$this->db->set('data_inicio',$this->changeDateToDatabaseFormat(isset($get_array['data_inicio'])?$get_array['data_inicio']:''));
			$this->db->set('data_fim',$this->changeDateToDatabaseFormat(isset($get_array['data_fim'])?$get_array['data_fim']:''));
			$this->db->set('ativo',isset($get_array['ativo'])?$get_array['ativo']:'');
			$this->db->where('id_revisao_ciclo',isset($get_array['id_revisao_ciclo'])?$get_array['id_revisao_ciclo']:'');
			$this->db->update($this->tableRevisaoCiclo);
			
			$id_revisao_ciclo	=	$get_array['id_revisao_ciclo'];
			
			if(!empty($get_array['id_fase_score'])||isset($get_array['id_fase_score'])){
				
				foreach ($get_array['id_fase_score'] as $key => $value) {
					
					$newdata	=	array();
					$component= str_replace("'",'',$key);	
					if($get_array['final']["'$component'"]==1)	{				
						$newdata['media_final']	=	1;
					}else{
						$newdata['media_final']	=	0;
					}
					if($get_array['final']["'$component'"]==1){
						if($get_array['linear']["'$component'"]!=''){
							$newdata['peso']	=	$get_array['linear']["'$component'"];
						}
					}
					// Condition if Cycle Id Found then Update Data.Else Insert The Data.
					if($value != ""){
						$this->db->where('id_revisao_ciclo_fases',$value);
						$this->db->update($this->tableRevisaoCicloFases, $newdata);
						$insert_id = $value;
					}
				}
				$faseresult=$this->insert_by_fase_id($get_array,$id_revisao_ciclo);
				
			}
			return true;
		}else{
			$id_ciclo_ini				=	ltrim(isset($get_array['id_ciclo_ini'])?$get_array['id_ciclo_ini']:'','number:');
			$Id_ciclo_fim				=	ltrim(isset($get_array['Id_ciclo_fim'])?$get_array['Id_ciclo_fim']:'','number:');
			$revisao_pares				=	isset($get_array['revisao_pares'])?1:0;
			$days						=	isset($get_array['days'])?$get_array['days']:'';
			$nota_maxima				=	isset($get_array['nota_maxima'])?$get_array['nota_maxima']:'';
			$more_info					=	isset($get_array['more_info'])?$get_array['more_info']:0;
			$numero_pares				=	isset($get_array['numero_pares'])?$get_array['numero_pares']:'';
			$escala						=	isset($get_array['escala'])?$get_array['escala']:'';
			$escolhe_par				=	isset($get_array['escolhe_par'])?1:0;
			$revisao_gestor				=	isset($get_array['revisao_gestor'])?1:0;
			if(isset($get_array['id_janela'])){
				$janela_year				=	ltrim($get_array['id_janela'],'number:');
				$janela_id					=	$this->getGenelaIdByYear($janela_year);
		
			}
			if(isset($get_array['escala'])){
				if($escala=='1'|| $escala=='4'){
					$nota_maxima		=	5;
				}else if($escala=='2'){
						$nota_maxima		=	10;
				}else{
						$nota_maxima		=	4;
				}
			}
			$data	=	array(
				'id_empresa'			=>	$this->session->userdata('id_empresa'),
				'nome_ciclo'			=>	isset($get_array['nome_ciclo'])?$get_array['nome_ciclo']:'',
				'escala'				=>	$escala,
				'numero_pares'			=>	isset($numero_pares)?$numero_pares:0,
				'more_info'				=>	$more_info,
				'nota_maxima'			=>	$nota_maxima,
				'id_janela'				=>	$janela_id,
				'amostra'				=>	isset($get_array['public_mode'])?$get_array['public_mode']:'',
				'days'					=>	isset($get_array['days'])?$get_array['days']:'',
				'email'					=>	isset($get_array['corpo_email'])?$get_array['corpo_email']:'',
				'data_inicio'			=>	$this->changeDateToDatabaseFormat($get_array['data_inicio']),
				'data_fim'				=>	$this->changeDateToDatabaseFormat($get_array['data_fim']),
				'id_ciclo_ini'			=>	$id_ciclo_ini,
				'revisao_pares'			=>	$revisao_pares,
				'escolhe_par'			=>	$escolhe_par,
				'revisao_gestor'		=>	$revisao_gestor,
				'Id_ciclo_fim'			=>	$Id_ciclo_fim,
				'ativo'					=>	$get_array['ativo'],
				'send_message'			=>	isset($get_array['send_message'])?$get_array['send_message']:'',
				'usuario_atualizador'	=>	$this->session->userdata('id'),
			);
			
			if(isset($get_array['id_revisao_ciclo']) && $get_array['id_revisao_ciclo'] != ""){
				$this->db->where('id_revisao_ciclo',$get_array['id_revisao_ciclo']);
				$this->db->update($this->tableRevisaoCiclo,$data);
				$id_revisao_ciclo	=	$get_array['id_revisao_ciclo'];
			}else{
				$this->db->insert($this->tableRevisaoCiclo,$data);
				$id_revisao_ciclo = $this->db->insert_id();
			}
			if(!empty($get_array['nome_fase'])||isset($get_array['nome_fase'])){
				
				$all_fases	=	array();
				foreach ($get_array['nome_fase'] as $key => $value) {
					$this->db->set('id_revisao_ciclo',$id_revisao_ciclo);
					$this->db->set('nome_fase',$get_array['nome_fase'][$key]);
					
					if(isset($get_array['ordem'][$key]) && $get_array['ordem'][$key]  !=""){
						$this->db->set('ordem',$get_array['ordem'][$key]);
					}
					if(isset($get_array['componente'][$key]) && $get_array['componente'][$key] !=""){
						$this->db->set('componente',$get_array['componente'][$key]);
					}
					if(isset($get_array['questionario'][$key]) && $get_array['questionario'][$key] !=""){
						if($get_array['questionario'][$key] != '? string:0 ?'){
							$this->db->set('questionario',$get_array['questionario'][$key]);
						}
					}else{
						$this->db->set('questionario',0);
					}
					if(isset($get_array['autoavalia'][$key]) && $get_array['autoavalia'][$key] !=""){
						$this->db->set('autoavalia',$get_array['autoavalia'][$key]);
					}else{
						$this->db->set('autoavalia',0);
					}
					if(isset($get_array['pares'][$key]) && $get_array['pares'][$key] !=""){
						$this->db->set('pares',$get_array['pares'][$key]);
					}else{
						$this->db->set('pares',0);
					}
					if(isset($get_array['gestor'][$key]) && $get_array['gestor'][$key] !=""){
						$this->db->set('gestor',$get_array['gestor'][$key]);
					}else{
						$this->db->set('gestor',0);
					}
					
					if(isset($get_array['equipe'][$key]) && $get_array['equipe'][$key] !=""){
						$this->db->set('equipe',$get_array['equipe'][$key]);
					}else{
						$this->db->set('equipe',0);
					}
					if(isset($get_array['grafico'][$key]) && $get_array['grafico'][$key] !=""){
						$this->db->set('grafico',$get_array['grafico'][$key]);
					}else{
						$this->db->set('grafico',0);
					}
					if(isset($get_array['x_nine'][$key]) && $get_array['x_nine'][$key] !=""){
						$this->db->set('x_nine',$get_array['x_nine'][$key]);
					}else{
						$this->db->set('x_nine',0);
					}
					if(isset($get_array['y_nine'][$key]) && $get_array['y_nine'][$key] !=""){
						$this->db->set('y_nine',$get_array['y_nine'][$key]);
					}else{
						$this->db->set('y_nine',0);
					}
					$component= $get_array['componente'][$key];	
					if($get_array['final']["'$component'"]==1)	{				
						$this->db->set('media_final',1);
					}else
						$this->db->set('media_final',0);
					if($get_array['final']["'$component'"]==1){
						if($get_array['linear']["'$component'"]!=''){						
							$this->db->set('peso',$get_array['linear']["'$component'"]);
						}
					}
						
						
					$this->db->set('usuario_atualizador',$this->session->userdata('id'));
					
					
					// Condition if Cycle Id Found then Update Data.Else Insert The Data.
					if(isset($get_array['cycleId'][$key]) && $get_array['cycleId'][$key] != ""){
						$this->db->where('id_revisao_ciclo_fases',$get_array['cycleId'][$key]);
						$this->db->update($this->tableRevisaoCicloFases);
						$insert_id = $get_array['cycleId'][$key];
						
					}else{
						$this->db->insert($this->tableRevisaoCicloFases);
						$insert_id = $this->db->insert_id();
					}
					$all_fases[]	=	$insert_id;
				}
				$this->deletefasesnotin($id_revisao_ciclo,$all_fases);
				$faseresult=$this->insert_by_fase_id($get_array,$id_revisao_ciclo);
				
			}
			$all_users	=	array();
			if(isset($get_array['public_mode'])){
				if(!empty($userTeams) && $get_array['public_mode']==1){
					foreach ($userTeams as $key => $value) {
						if(isset($value['id_usuario']) && $value['id_usuario'] !=""){
							$all_users[]	=	$value['id_usuario'];
							if(!$this->check_cycle_user_already($id_revisao_ciclo, $value['id_usuario'],1)){
								$this->db->set('id_revisao_ciclo',$id_revisao_ciclo);
								$this->db->set('id_tipo_avaliacao',1);
								$this->db->set('id_usuario_avaliado',$value['id_usuario']);
								$this->db->set('id_usuario_avaliador',$value['id_usuario']);
								
								$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
								if(isset($value['id_revisao_ciclos_avaliacoes']) && $value['id_revisao_ciclos_avaliacoes'] != ""){
									$this->db->where('id_revisao_ciclos_avaliacoes',$value['id_revisao_ciclos_avaliacoes']);
									$this->db->insert($this->tableRevisaoCicloAvaliacoes);
								}else{
									$this->db->insert($this->tableRevisaoCicloAvaliacoes);
								}
							}
						}
					}
					if(!empty($all_users)){
						$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
						$this->db->where_not_in('id_usuario_avaliador',$all_users);
						$this->db->delete($this->tableRevisaoCicloAvaliacoes);
					}
					
				}else{
					$id_empresa 	= 	$this->session->userdata('id_empresa');
					$userteams 		=	$this->get_all_user_companytime($id_empresa, $get_array['days']);
					if(!empty($userteams) && $get_array['public_mode']==0){
						foreach ($userteams as $key => $value) {
							$all_users[]	=	$value['id'];					
							if(!$this->check_cycle_user_already($id_revisao_ciclo, $value['id'],1)){
								$this->db->set('id_revisao_ciclo',$id_revisao_ciclo);
								$this->db->set('id_tipo_avaliacao',1);
								$this->db->set('id_usuario_avaliado',$value['id']);
								$this->db->set('id_usuario_avaliador',$value['id']);
								
								$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
								$this->db->insert($this->tableRevisaoCicloAvaliacoes);
							}
						}
					}
				}
			}
			return true;
		}
	}
	
	public function remove_cycle_users_not_in($id_revisao_ciclo, $all_users){
		$id_usuario 	= 	$this->session->userdata('id');
		$conditions 	=	array(
								'id_revisao_ciclo'=>$id_revisao_ciclo
							);
		$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
		if(!empty($all_users)){
			$this->db->where_not_in('id_usuario_avaliado',$all_users);	
		}
		$this->db->delete($this->tableRevisaoCicloAvaliacoes);
	}
	
	
	public function get_ravisao_ciclo_by_id($id_ravisao_ciclo){
			$fase_data				=	array();
			$availicao_user_data	=	array();
			$raviso_ciclo			=	array();
			$this->db->select("*");
			$this->db->from($this->tableRevisaoCiclo);
			$this->db->where('id_revisao_ciclo', $id_ravisao_ciclo);
			$query1 		= 	$this->db->get();
			$raviso_ciclo 	= 	$query1->row_array();
			if(!empty($raviso_ciclo)){
				$raviso_ciclo['data_inicio']	=	date('d/m/Y',strtotime($raviso_ciclo['data_inicio']));
				$raviso_ciclo['data_fim']		=	date('d/m/Y',strtotime($raviso_ciclo['data_fim']));
				$data['ravisao_ciclo']			=	$raviso_ciclo;
				if($raviso_ciclo['id_revisao_ciclo'] != ''){
					$this->db->select("*");
					$this->db->where('id_revisao_ciclo', $id_ravisao_ciclo);
					$query2 	= $this->db->get($this->tableRevisaoCicloFases);
					$fase_data 	= $query2->result_array();
				}
				if($raviso_ciclo['id_revisao_ciclo'] != ''){
					$availicao_user_data 	= $this->get_users_by_ravisao_ciclo_id($id_ravisao_ciclo);
				}
			}
			$data['fase_data']				=	$fase_data;
			$data['availicao_user_data']	=	$availicao_user_data;
			return $data;
	}
	public function get_cycle_by_id($id_ravisao_ciclo){
		$this->db->select("*");
		$this->db->from($this->tableRevisaoCiclo);
		$this->db->where('ativo', 1);
		$this->db->where('id_revisao_ciclo', $id_ravisao_ciclo);
		$query1 		= 	$this->db->get();
		$raviso_ciclo 	= 	$query1->row_array();
		if(count($raviso_ciclo)!=0){
			return $raviso_ciclo;
		}else{
			return 1;
		}
	}
	public function get_users_by_ravisao_ciclo_id($ravisao_ciclo_id){
		$id_usuario = $this->session->userdata('id');
		$sql 		= "select  c.*,a.id_revisao_ciclos_avaliacoes,a.id_usuario_avaliado as id_user,a.valores,a.competencias,a.resultados,a.potencial,a.survey from ".$this->tableRevisaoCicloAvaliacoes ." a "
						//." inner join v_usuariosTime b on a.id_usuario = b.id_usuario "
						." inner join ".$this->tableUser." c on a.id_usuario_avaliado=c.id_usuario "
						." where a.id_revisao_ciclo='".$ravisao_ciclo_id."' AND a.id_tipo_avaliacao=1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	public function check_cycle_user_already($ravisao_ciclo_id, $id_usuario,$type){
		$sql 		= "select  c.*, a.id_usuario_avaliado as id_user from ".$this->tableRevisaoCicloAvaliacoes ." a "
						//." inner join v_usuariosTime b on a.id_usuario = b.id_usuario "
						." inner join ".$this->tableUser." c on a.id_usuario_avaliado=c.id_usuario "
						." where a.id_revisao_ciclo='".$ravisao_ciclo_id."' AND a.id_usuario_avaliado='".$id_usuario."' AND a.id_tipo_avaliacao='".$type."'";
		$result 	= 	$this->db->query($sql);
		$response 	=	$result->row();
		if(!empty($response)){
			return true;
		}
		return false;
	}
	public function changeDateToDatabaseFormat($date){
		  $new_date 		= 	str_replace('/', '-', $date);
		  $date_new 		= 	date('Y-m-d',strtotime($new_date));
		  return $date_new;
	}
	
	public function get_users_by_type_validation($cycleId,$type_id){
		
		$id_usuario = 	$this->session->userdata('id');
		$id_empresa = 	$this->session->userdata('id_empresa');
		
		$this->db->select("tu.*, rca.id_usuario_avaliado as id_user,rca.id_usuario_avaliado as id,rca.id_revisao_ciclos_avaliacoes as avaliacoa_id,rca.id_revisao_ciclo,rca.valores,rca.competencias,rca.resultados,rca.potencial,rca.survey,rc.id_ciclo_ini,rc.Id_ciclo_fim,rca.autorizado,rca.respondido,rca.resultados");
		$this->db->from($this->tableRevisaoCicloAvaliacoes ." rca ");
		$this->db->join($this->tableUser." tu",'rca.id_usuario_avaliado=tu.id_usuario', 'inner');
		$this->db->join($this->tableRevisaoCiclo." rc",'rca.id_revisao_ciclo=rc.id_revisao_ciclo', 'inner');
		$this->db->where('rca.id_tipo_avaliacao', $type_id);
		
		$this->db->where('rca.id_usuario_avaliador', $id_usuario);
		$this->db->where('tu.id_empresa', $id_empresa);
		$this->db->where('rca.id_revisao_ciclo', $cycleId);
		$this->db->order_by('rca.id_revisao_ciclos_avaliacoes', 'DESC');
		
		$query 					= 	$this->db->get();
		
		$results				=	$query->result_array();
		
		if(!empty($results)){
			foreach($results as &$result){
				if(!empty($result['url_image'])){
					$image 				=	$result['url_image'];
					$result['image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$image;
					$result['xs_image'] = 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$image;
					$result['md_image'] = 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$image;
				}else{
					$result['image'] 	= 	null;
					$result['xs_image'] = 	null;
					$result['md_image'] = 	null;
				}
				$result['fases'] = 	$this->get_fases_by_ciclo_id("", $result['id_revisao_ciclo'], $result['avaliacoa_id']);
			}
		}
		return $results;
	}
	
	public function get_users_by_type_validation_and_cycle_id($cycle_id,$userId,$type_id){
		
		$id_usuario = 	$this->session->userdata('id');
		
		$sql 		= 	"select  c.*,c.nome_usuario as name,c.id_usuario as id,a.id_usuario_avaliador,a.respondido,a.id_usuario_avaliado as id_user,a.id_revisao_ciclos_avaliacoes as avaliacoa_id,a.id_revisao_ciclo,b.id_ciclo_ini,b.Id_ciclo_fim from ".$this->tableRevisaoCicloAvaliacoes ." a "
						." inner join ".$this->tableUser." c on a.id_usuario_avaliador=c.id_usuario "
						." inner join ".$this->tableRevisaoCiclo." b on b.id_revisao_ciclo=a.id_revisao_ciclo "
						." where a.id_tipo_avaliacao='".$type_id."' AND a.id_usuario_avaliado='".$userId."' AND a.id_revisao_ciclo='".$cycle_id."' group by c.id_usuario order by avaliacoa_id";
		
		$result 	= 	$this->db->query($sql);
		$records	=	$result->result_array();
		$data		=	array();
		if(!empty($records)){
			foreach($records as &$record){
				if(!empty($record['url_image'])){
					$image 				=	$record['url_image'];
					$record['image'] 	= 	base_url('assets/img') . '/'. $record['id_empresa'] .'/'.$image;
					$record['xs_image'] = 	base_url('assets/img') . '/'. $record['id_empresa'] .'/50/'.$image;
					$record['md_image'] = 	base_url('assets/img') . '/'. $record['id_empresa'] .'/150/'.$image;
				}else{
					$record['image'] 	= 	null;
					$record['xs_image'] = 	null;
					$record['md_image'] = 	null;
				}
				$record['name'] 			= 	ucfirst(strtolower($record['name']));
				$record['nome_usuario'] 	= 	ucfirst(strtolower($record['nome_usuario']));
				$incompleteRewives	=	$this->get_count_reviews($record['id_user'],0);	// Get Users count which respondido is equal to 0(Incomplete Reviews);
				$completeReviews	=	$this->get_count_reviews($record['id_user'],1);	// Get Users count which respondido is equal to 1(Complete Reviews);
				$record['in_complete_reviews']	=	$incompleteRewives;
				$record['complete_reviews']		=	$completeReviews;
				$data[]							=	$record;
				
			}
		}
		return $data;
	}
	
	public function get_user_i_am_gestor_or_peer($cycle_id,$userId,$type_id){
		
		/* $id_usuario = 	$this->session->userdata('id');
		$sql 		= 	"select  c.*,c.nome_usuario as name,c.id_usuario as id,a.id_usuario_avaliador,a.id_usuario_avaliado as id_user,a.id_revisao_ciclos_avaliacoes as avaliacoa_id,a.id_revisao_ciclo,b.id_ciclo_ini,b.Id_ciclo_fim from ".$this->tableRevisaoCicloAvaliacoes ." a "
						." inner join ".$this->tableUser." c on a.id_usuario_avaliado=c.id_usuario "
						." inner join ".$this->tableRevisaoCiclo." b on b.id_revisao_ciclo=a.id_revisao_ciclo "
						." where a.id_tipo_avaliacao='".$type_id."' AND a.id_usuario_avaliador='".$userId."' AND a.id_revisao_ciclo='".$cycle_id."'";	
		
		$result 	= 	$this->db->query($sql);
		$records	=	$result->result_array(); */
		
		$id_empresa = 	$this->session->userdata('id_empresa');
		$this->db->select("tu.*,tu.nome_usuario as name,tu.id_usuario as id,rca.id_usuario_avaliador,rca.id_usuario_avaliado as id_user,rca.id_revisao_ciclos_avaliacoes as avaliacoa_id,rca.id_revisao_ciclo,rca.respondido,rc.id_ciclo_ini,rc.Id_ciclo_fim");
		$this->db->from($this->tableRevisaoCicloAvaliacoes ." rca ");
		$this->db->join($this->tableUser." tu",'rca.id_usuario_avaliado=tu.id_usuario', 'inner');
		$this->db->join($this->tableRevisaoCiclo." rc",'rca.id_revisao_ciclo=rc.id_revisao_ciclo', 'inner');
		$this->db->where('rca.id_tipo_avaliacao', $type_id);
		$this->db->where('rca.id_usuario_avaliador', $userId);
		$this->db->where('tu.id_empresa', $id_empresa);
		$this->db->where('rca.id_revisao_ciclo', $cycle_id);
		$this->db->order_by('rca.id_revisao_ciclos_avaliacoes', 'DESC');
		
		$query 					= 	$this->db->get();
		$records				=	$query->result_array();
		$data		=	array();
		if(!empty($records)){
			foreach($records as &$record){
				if(!empty($record['url_image'])){
					$image 				=	$record['url_image'];
					$record['image'] 	= 	base_url('assets/img') . '/'. $record['id_empresa'] .'/'.$image;
					$record['xs_image'] = 	base_url('assets/img') . '/'. $record['id_empresa'] .'/50/'.$image;
					$record['md_image'] = 	base_url('assets/img') . '/'. $record['id_empresa'] .'/150/'.$image;
				}else{
					$record['image'] 	= 	null;
					$record['xs_image'] = 	null;
					$record['md_image'] = 	null;
				}
				$incompleteRewives	=	$this->get_count_reviews($record['id_user'],0);	// Get Users count which respondido is equal to 0(Incomplete Reviews);
				$completeReviews	=	$this->get_count_reviews($record['id_user'],1);	// Get Users count which respondido is equal to 1(Complete Reviews);
				$record['in_complete_reviews']	=	$incompleteRewives;
				$record['complete_reviews']		=	$completeReviews;
				$data[]							=	$record;
			}
		}
		return $data;
	}
	public function get_fases_by_ciclo_id($id_usuario,$id_ciclo, $id_tipo_avaliacao=null){
		
		$this->db->select("*");
		$this->db->from($this->tableRevisaoCicloFases);
		$this->db->where('componente !=', 'P');
		
		$this->db->where('id_revisao_ciclo', $id_ciclo);
		
		if($id_tipo_avaliacao!=null){
			if($id_tipo_avaliacao==1){
				$this->db->where('autoavalia', 1);
			}else if($id_tipo_avaliacao==2){
				$this->db->where('gestor', 1);
			}else if($id_tipo_avaliacao==3){
				$this->db->where('pares', 1);
			}else if($id_tipo_avaliacao==4){
				$this->db->where('equipe', 1);
			}
		}
		
		$this->db->order_by('ordem', 'asc');
		$this->db->order_by('id_revisao_ciclo_fases', 'asc');
		$query1 		= 	$this->db->get();
		
		$cyclo_fases 	= 	$query1->result_array();
		return $cyclo_fases;
		
	}
	
	public function get_users_of_ciclo_availicao_by_cycle_id($cycleId){
		
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		
		$this->db->select("tu.*,rca.autorizado,rca.id_revisao_ciclos_avaliacoes,rca.id_usuario_avaliado as id_user,rca.respondido,vut.nome_unidade,vut.id_time");
		$this->db->from($this->tableRevisaoCicloAvaliacoes ." rca ");
		$this->db->where_in('rca.id_tipo_avaliacao', Array(1,2));
		$this->db->where('tu.id_empresa', $id_empresa);
		if($this->session->userdata('admin') == 1 || $this->session->userdata('user_reviewer') == 1){
			$this->db->join($this->tableUser." tu","rca.id_usuario_avaliado=tu.id_usuario", 'inner');
		}else{
			//$this->db->join($this->tableUser." tu","rca.id_usuario_avaliado=tu.id_usuario AND (tu.id_gestor=$id_usuario OR tu.id_usuario=$id_usuario OR rca.id_usuario_avaliador=$id_usuario)", 'inner');
			$this->db->join($this->tableUser." tu","rca.id_usuario_avaliado=tu.id_usuario AND (tu.id_usuario=$id_usuario OR rca.id_usuario_avaliador=$id_usuario)", 'inner');
	}
		$this->db->join($this->viewUsuariosTime.' vut' , 'vut.id_usuario = tu.id_usuario', 'inner');
		$this->db->where('rca.id_revisao_ciclo', $cycleId);
		$this->db->group_by('rca.id_usuario_avaliado');
		
		$result 					= 	$this->db->get();
		$records					=	$result->result_array();
		$data						=	array();
		$data['records']			=	array();
		$totalReviewsArray			=	array();
		$completeReviewArray		=	array();
		$fullCompleteReviewsArray	=	array();
		$notStartedReviewsArray		=	array();
		$checkrespondido			=	1;
		
		if(!empty($records)){
			foreach($records as $record){
				$total_reviews		=	$this->get_count_reviews($cycleId,$record['id_user']);	// Get Users reviews count;
				$completeReviews	=	$this->get_count_reviews($cycleId,$record['id_user'],1);	// Get Users count which respondido is equal to 1(Complete Reviews);
				if($total_reviews == $completeReviews){
					$fullCompleteReviewsArray[]	=	1;
				}
				if($completeReviews==0){
					$notStartedReviewsArray[]	=	1;
				}
				$record['total_reviews']		=	$total_reviews;
				$record['complete_reviews']		=	$completeReviews;
				$record['complete_reviews']		=	$completeReviews;
				$complete_status				=	$completeReviews/$total_reviews;
				if($complete_status == 0){
					$record['complete_status']		=	1;
				}else if($complete_status > 0 && $complete_status < 1){
					$record['complete_status']		=	2;
				}else if($complete_status == 1){
					$record['complete_status']		=	3;
				}
				if($record['respondido'] == 0){
				   $checkrespondido				=	0;   
			    }
				$data['records'][]				=	$record;
				$totalReviewsArray[]			=	$total_reviews;
				$completeReviewArray[]			=	$completeReviews;
				
			}
			$totalReviewsArraySum				=	array_sum($totalReviewsArray);
			$completeReviewArraySum				=	array_sum($completeReviewArray);
			$fullCompleteReviewsArraySum		=	array_sum($fullCompleteReviewsArray);
			$notStartedReviewsArraySum			=	array_sum($notStartedReviewsArray);
			$incompleteReviewsSum				=	$totalReviewsArraySum-$completeReviewArraySum;
			// Calculation for %.
			$data['complete_reviews_per']		=	round(($completeReviewArraySum/$totalReviewsArraySum)*100);
			$data['completed_reviews']			=	$completeReviewArraySum;
			
			$data['no_answer_reviews_per']		=	round(($incompleteReviewsSum/$totalReviewsArraySum)*100);
			$data['no_answer_reviews']			=	$incompleteReviewsSum;
			
			
			$data['not_started_reviews_per']	=	round(($notStartedReviewsArraySum/$totalReviewsArraySum)*100);
			$data['not_started_reviews']		=	$notStartedReviewsArraySum;
			$data['checkrespondido']			=	$checkrespondido;
		}
		return $data;
	}
	
	public function get_cycle_reviewers_by_cycle_id($cycleId, $nome_usuario, $search_by_status,$teamId){
		
		$id_usuario = $this->session->userdata('id');
		$id_empresa = $this->session->userdata('id_empresa');
		
		$this->db->select("tu.*,rca.autorizado,rca.id_revisao_ciclos_avaliacoes,rca.id_usuario_avaliado as id_user,rca.id_tipo_avaliacao,rca.respondido,vut.nome_unidade,vut.id_time");
		$this->db->from($this->tableRevisaoCicloAvaliacoes ." rca ");
		$this->db->join($this->tableUser." tu",'rca.id_usuario_avaliador=tu.id_usuario', 'inner');
		$this->db->join($this->viewUsuariosTime.' vut' , 'vut.id_usuario = tu.id_usuario', 'inner');
		$this->db->where('rca.id_revisao_ciclo', $cycleId);
		if(!empty($nome_usuario)){
			$this->db->like('tu.nome_usuario',$nome_usuario);
		}
		if(!empty($teamId)){
			$this->db->where('vut.id_time',$teamId);
		}
		$this->db->group_by('vut.id_usuario');
		$result 					= 	$this->db->get();
		$records					=	$result->result_array();
		$data						=	array();
		$data['records']			=	array();
		$totalReviewsArray			=	array();
		$completeReviewArray		=	array();
		$fullCompleteReviewsArray	=	array();
		$notStartedReviewsArray		=	array();
		if(!empty($records)){
			foreach($records as $record){
				$total_reviews		=	$this->get_count_reviews_for_reviewers($cycleId,$record['id_user']);	// Get Users reviews count;
				$completeReviews	=	$this->get_count_reviews_for_reviewers($cycleId,$record['id_user'],1);	// Get Users count which respondido is equal to 1(Complete Reviews);
				if($total_reviews == $completeReviews){
					$fullCompleteReviewsArray[]	=	1;
				}
				if($completeReviews==0){
					$notStartedReviewsArray[]		=	1;
				}
				$record['total_reviews']		=	$total_reviews;
				$record['complete_reviews']		=	$completeReviews;
				$complete_status				=	$completeReviews/$total_reviews;
				if($completeReviews == 0){
					$record['complete_status']		=	1;
				}else if($completeReviews > 0 && $complete_status < 1){
					$record['complete_status']		=	2;
				}else if($complete_status == 1){
					$record['complete_status']		=	3;
				}
				if($search_by_status == 1){
					if($record['complete_status'] == 1){
						$data['records'][]		=	$record;
					}
				}else if($search_by_status == 2){
					if($record['complete_status'] == 2){
						$data['records'][]		=	$record;
					}
				}else if($search_by_status == 3){
					if($record['complete_status'] == 3){
						$data['records'][]		=	$record;
					}
				}else{
					$data['records'][]			=	$record;
				}
				$totalReviewsArray[]			=	$total_reviews;
				$completeReviewArray[]			=	$completeReviews;
			}
			$totalReviewsArraySum				=	array_sum($totalReviewsArray);
			$completeReviewArraySum				=	array_sum($completeReviewArray);
			$fullCompleteReviewsArraySum		=	array_sum($fullCompleteReviewsArray);
			$notStartedReviewsArraySum			=	array_sum($notStartedReviewsArray);
			$incompleteReviewsSum				=	$totalReviewsArraySum-$completeReviewArraySum;
			// Calculation for %.
			$data['complete_reviews_per']		=	round(($completeReviewArraySum/$totalReviewsArraySum)*100);
			$data['completed_reviews']			=	$fullCompleteReviewsArraySum;
			
			$data['no_answer_reviews_per']		=	round(($incompleteReviewsSum/$totalReviewsArraySum)*100);
			$data['no_answer_reviews']			=	$incompleteReviewsSum;
			
			
			$data['not_started_reviews_per']	=	round(($notStartedReviewsArraySum/$totalReviewsArraySum)*100);
			$data['not_started_reviews']		=	$notStartedReviewsArraySum;
		}
		return $data;
	}
	
	public function get_count_reviews($cycleId,$userId,$respondido=""){
		//$this->db->where('id_empresa',$id_empresa);
		$this->db->where('id_usuario_avaliado',$userId);
		if($respondido != ""){
			$this->db->where('respondido',$respondido);
		}
		$this->db->where('id_revisao_ciclo',$cycleId);
		$num_rows 	= 	$this->db->count_all_results($this->tableRevisaoCicloAvaliacoes);
		return $num_rows;
	}
	
	public function get_count_reviews_for_reviewers($cycleId,$userId,$respondido=""){
		//$this->db->where('id_empresa',$id_empresa);
		$this->db->where('id_usuario_avaliador',$userId);
		if($respondido != ""){
			$this->db->where('respondido',$respondido);
		}
		$this->db->where('id_revisao_ciclo',$cycleId);
		$num_rows 	= 	$this->db->count_all_results($this->tableRevisaoCicloAvaliacoes);
		return $num_rows;
	}
	
	public function get_users_of_ciclo_availicao_by_filter($cycleId,$nome_usuario,$autorizado,$teamId=""){
		
		if($this->session->userdata('admin') == 1 || $this->session->userdata('gestor') == 1 || $this->session->userdata('user_reviewer') == 1){
			
			$id_usuario = $this->session->userdata('id');
			$id_empresa = $this->session->userdata('id_empresa');
			
			$this->db->select("tu.*,rca.autorizado,rca.id_revisao_ciclos_avaliacoes,rca.id_usuario_avaliado as id_user,rca.respondido,vut.nome_unidade,vut.id_time");
			$this->db->from($this->tableRevisaoCicloAvaliacoes ." rca ");
			$this->db->join($this->tableUser." tu",'rca.id_usuario_avaliado=tu.id_usuario', 'inner');
			$this->db->join($this->viewUsuariosTime.' vut' , 'vut.id_usuario = tu.id_usuario', 'inner');
			$this->db->where('rca.id_tipo_avaliacao', 1);
			$this->db->where('tu.id_empresa', $id_empresa);
			$this->db->where('rca.id_revisao_ciclo', $cycleId);
			$this->db->group_by('tu.id_usuario');
			if(!empty($nome_usuario)){
				$this->db->like('tu.nome_usuario',$nome_usuario);
			}
			if(!empty($autorizado)){
				$this->db->where('rca.autorizado',$autorizado);
			}
			if(!empty($teamId)){
				$this->db->where('vut.id_time',$teamId);
			}
			$result 					= 	$this->db->get();
			$records					=	$result->result_array();
			$data						=	array();
			$data['records']			=	array();
			$totalReviewsArray			=	array();
			$completeReviewArray		=	array();
			$fullCompleteReviewsArray	=	array();
			$notStartedReviewsArray		=	array();
			if(!empty($records)){
				foreach($records as $record){
					$total_reviews		=	$this->get_count_reviews($cycleId,$record['id_user']);	// Get Users reviews count;
					$completeReviews	=	$this->get_count_reviews($cycleId,$record['id_user'],1);	// Get Users count which respondido is equal to 1(Complete Reviews);
					if($total_reviews == $completeReviews){
						$fullCompleteReviewsArray[]	=	1;
					}
					if($completeReviews	==	0){
						$notStartedReviewsArray[]	=	1;
					}
					$record['total_reviews']		=	$total_reviews;
					$record['complete_reviews']		=	$completeReviews;
					$complete_status				=	$completeReviews/$total_reviews;
					if($completeReviews == 0){
						$record['complete_status']		=	1;
					}else if($completeReviews > 0 && $complete_status < 1){
						$record['complete_status']		=	2;
					}else if($complete_status == 1){
						$record['complete_status']		=	3;
					}
					if($autorizado == 1){
						if($record['complete_status'] == 1){
							$data['records'][]		=	$record;
						}
					}else if($autorizado == 2){
						if($record['complete_status'] == 2){
							$data['records'][]		=	$record;
						}
					}else if($autorizado == 3){
						if($record['complete_status'] == 3){
							$data['records'][]		=	$record;
						}
					}else{
						$data['records'][]			=	$record;
					}
					$totalReviewsArray[]			=	$total_reviews;
					$completeReviewArray[]			=	$completeReviews;
				}
				$totalReviewsArraySum				=	array_sum($totalReviewsArray);
				$completeReviewArraySum				=	array_sum($completeReviewArray);
				$fullCompleteReviewsArraySum		=	array_sum($fullCompleteReviewsArray);
				$notStartedReviewsArraySum			=	array_sum($notStartedReviewsArray);
				$incompleteReviewsSum				=	$totalReviewsArraySum-$completeReviewArraySum;
				// Calculation for %.
				$data['complete_reviews_per']		=	round(($completeReviewArraySum/$totalReviewsArraySum)*100);
				$data['completed_reviews']			=	$completeReviewArraySum;
				
				$data['no_answer_reviews_per']		=	round(($incompleteReviewsSum/$totalReviewsArraySum)*100);
				$data['no_answer_reviews']			=	$incompleteReviewsSum;
				
				
				$data['not_started_reviews_per']	=	round(($notStartedReviewsArraySum/$totalReviewsArraySum)*100);
				$data['not_started_reviews']		=	$notStartedReviewsArraySum;
			}
		}
		return $data;
	}
	public function update_ravisao_usres_autorizado($ravisaoAvalicaoIds,$cycleId){
		if(!empty($ravisaoAvalicaoIds)){
			$data	=	array(
							'autorizado'	=>	1
						);
			foreach($ravisaoAvalicaoIds as $avalicaoId){
				$this->db->where('id_revisao_ciclo',$cycleId);
				// $this->db->where('id_tipo_avaliacao',1);
				$this->db->where('id_usuario_avaliado',$avalicaoId['value']);
				$this->db->update($this->tableRevisaoCicloAvaliacoes,$data);
			}
		}
		return 1;
	}
	public function get_cycles($id_usuario,$id_empresa){
		$this->db->where('id_empresa',$id_empresa);
		$this->db->where('data_inicio <= NOW()');
		$this->db->where('data_fim >= NOW()');
		$this->db->where('ativo',1);
		$this->db->order_by("id_revisao_ciclo", "DESC");
		$query		=	$this->db->get($this->tableRevisaoCiclo);
		$records	=	$query->result_array();
		return $records;
	}
	public function add_update_cycle_users($cycle_id,$userId,$Gestors=array(),$Pares=array(),$Equipes=array()){
		$insert_gestors	=	array();
		$insert_pares	=	array();
		$insert_equipes	=	array();
		if(!empty($Gestors)){
			foreach ($Gestors as $id_gestor) {
				if(!$this->check_cycle_user_already_by_availido($cycle_id,$userId,$id_gestor,2)){
					$this->db->set('id_revisao_ciclo',$cycle_id);
					$this->db->set('id_tipo_avaliacao',2);
					$this->db->set('id_usuario_avaliado',$userId);
					$this->db->set('id_usuario_avaliador',$id_gestor);
					$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
					$this->db->insert($this->tableRevisaoCicloAvaliacoes);
				}
				$insert_gestors[] = $id_gestor;
			}
		}
		if(!empty($Pares)){
			foreach ($Pares as $key => $id_peer) {
				if(!$this->check_cycle_user_already_by_availido($cycle_id,$userId,$id_peer,3)){
					$this->db->set('id_revisao_ciclo',$cycle_id);
					$this->db->set('id_tipo_avaliacao',3);
					$this->db->set('id_usuario_avaliado',$userId);
					$this->db->set('id_usuario_avaliador',$id_peer);
					$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
					$this->db->insert($this->tableRevisaoCicloAvaliacoes);
				}
				$insert_pares[] = $id_peer;
			}
		}
		if(!empty($Equipes)){
			foreach ($Equipes as $key => $id_equipe) {
				if(!$this->check_cycle_user_already_by_availido($cycle_id,$userId,$id_equipe,4)){
					$this->db->set('id_revisao_ciclo',$cycle_id);
					$this->db->set('id_tipo_avaliacao',4);
					$this->db->set('id_usuario_avaliado',$userId);
					$this->db->set('id_usuario_avaliador',$id_equipe);
					$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
					$this->db->insert($this->tableRevisaoCicloAvaliacoes);
				}
				$insert_equipes[] = $id_equipe;
			}
		}
		$this->removeAvailicaoUsersByTypeNoIn($cycle_id,$userId, $insert_gestors,2);
		$this->removeAvailicaoUsersByTypeNoIn($cycle_id,$userId, $insert_pares,3);
		$this->removeAvailicaoUsersByTypeNoIn($cycle_id,$userId, $insert_equipes,4);
	}
	
	public function removeAvailicaoUsersByTypeNoIn($cycleId,$userId, $reviewers, $type){
		
		$this->db->where('id_revisao_ciclo',$cycleId);
		$this->db->where('id_usuario_avaliado',$userId);
		if(!empty($reviewers)){
			$this->db->where_not_in('id_usuario_avaliador',$reviewers);
		}
		$this->db->where('id_tipo_avaliacao',$type);
		$this->db->delete($this->tableRevisaoCicloAvaliacoes);
	}
	
	public function removeAvailicaoUsersByType($cycleId,$userId,$type){
		$this->db->where('id_revisao_ciclo',$cycleId);
		if($userId != ""){
			$this->db->where('id_usuario_avaliado',$userId);
		}
		$this->db->where('id_tipo_avaliacao',$type);
		$this->db->delete($this->tableRevisaoCicloAvaliacoes);
	}
	public function check_cycle_user_already_by_availido($ravisao_ciclo_id,$availidoId,$id_usuario,$type){
		
		$sql 		= "select  c.*, a.id_usuario_avaliado as id_user from ".$this->tableRevisaoCicloAvaliacoes ." a "
					//." inner join v_usuariosTime b on a.id_usuario = b.id_usuario "
					." inner join ".$this->tableUser." c on a.id_usuario_avaliado=c.id_usuario "
					." where a.id_revisao_ciclo='".$ravisao_ciclo_id."' AND a.id_usuario_avaliado='".$availidoId."' AND a.id_usuario_avaliador='".$id_usuario."' AND a.id_tipo_avaliacao='".$type."'";
		
		$result 	= 	$this->db->query($sql);
		$response 	=	$result->row();
		if(!empty($response)){
			return true;
		}
		return false;
	}
	
	
	public function get_revisao_ciclo_avaliacoes_details($avaliacoa_id){
		
		$this->db->where('id_revisao_ciclos_avaliacoes',$avaliacoa_id);
		$query 		= 	$this->db->get($this->tableRevisaoCicloAvaliacoes);
		$result 	= 	$query->row_array();
		return $result;
	}
	
	
	public function get_fases_details_for_user($user_id,$avaliacoa_id, $id_empresa){
		
		$revisao_ciclo_avaliacoes_details		=	$this->get_revisao_ciclo_avaliacoes_details($avaliacoa_id);
		$fasesData								=	array();
		$ciclo_details							=	array();
		if(!empty($revisao_ciclo_avaliacoes_details)){
			$id_ciclo							=	$revisao_ciclo_avaliacoes_details['id_revisao_ciclo'];
			$ciclo_details						=	$this->get_cycle_by_id($revisao_ciclo_avaliacoes_details['id_revisao_ciclo']);
			if(!empty($ciclo_details)){
				
				$fasesData 						= 	$this->get_fases_by_ciclo_id($user_id, $id_ciclo, $revisao_ciclo_avaliacoes_details['id_tipo_avaliacao']);			
			}
		}
		return array(
						'avaliacoescycledetails'=>$revisao_ciclo_avaliacoes_details,
						'cycledetails'=>$ciclo_details,
						'fasesData'=>$fasesData,
					);
	}
	
	
	public function get_question_data_profile($id_questionario, $user_id, $id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes){

		$this->db->select('vpg.id_pergunta as id_pergunta,vpg.id_questionario,vpg.nome_questionario as name,vpg.pergunta as question,vpg.ordem as ordem,vpg.tipo as type,tp.escala, trcaf.score, trcaf.descricao, tcp.id_categoria_pergunta as category_id, 
    		tcp.nome_categoria as category_name');
		$this->db->from($this->viewPerguntasGeral . ' vpg');
		$this->db->join($this->tablePerguntas . ' tp', 'tp.id_pergunta = vpg.id_pergunta', 'left');
		$this->db->where('vpg.id_empresa', $id_empresa);
		
		// $this->db->like('vpg.tipo_questionario','c');
		
		$this->db->where('vpg.id_questionario',$id_questionario);
		$this->db->join($this->tableCategoryPergunta . ' tcp', 'tcp.id_categoria_pergunta = tp.id_categoria_pergunta', 'left');
		$this->db->join($this->tableRevisaoCicloAvaliacoesFase . ' trcaf', 'trcaf.id_pergunta = vpg.id_pergunta AND trcaf.usuario_atualizador= "'.$id_usuario.'" AND trcaf.id_revisao_ciclo_avaliacoes= "'.$id_revisao_ciclo_avaliacoes.'" AND trcaf.id_revisao_ciclo_fases="'.$id_revisao_ciclo_fases.'"', 'left');
		$this->db->order_by('vpg.pergunta', 'ASC');
		$this->db->group_by('vpg.id_pergunta');

		$query = $this->db->get();
		$result=  $query->result_array();
		$category_wise_data 	=	array();
		
		
		if(!empty($result)){
			
			foreach($result as $index=>$res){
				
				if($res['type'] == 'o'){
					$result[$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
				}				
				if($res['type'] == 'a'){
					$result[$index]['options'] = $this->get_answers_for_updates_for_profile_by_id($res['id_pergunta']);
				}
				
				if(empty($res['category_id'])){
					$category_none_data['data']	=	array('id'=>0,'name'=>'Non categorized');
					$category_none_data['questions'][]	=	$result[$index];
				}else{
					$category_wise_data[$res['category_id']]['data']	=	array(
																				'id'=>$res['category_id'],
																				'name'=>$res['category_name']
																			);
					$category_wise_data[$res['category_id']]['questions'][]	=	$result[$index];
				}
			}
			if(!empty($category_none_data)){
				array_push($category_wise_data,$category_none_data);
			}
		}
		$newcategory_data 	=	array();
		if(!empty($category_wise_data)){
			foreach($category_wise_data as $category){
				$newcategory_data[]	=	$category;
			}
		}
		
		return $newcategory_data;
	}
	
	
	public function get_competencias_data_profile($id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes,$id_time=null){

	
		$id_empresa 					= 	$this->session->userdata('id_empresa');
		$authid_usuario 					= 	$this->session->userdata('id');
		
		// if needed please uncomment this to revert START
		/* $this->db->select('vac.*, trcaf.score, trcaf.descricao,tc.ativo');
		$this->db->from($this->viewApprisialCompetencias . ' vac');
		$this->db->where('vac.id_empresa', $id_empresa);
		$this->db->join($this->tableRevisaoCicloAvaliacoesFase . ' trcaf', 'trcaf.id_competencia = vac.id_competencia AND trcaf.usuario_atualizador= "'.$id_usuario.'" AND trcaf.id_revisao_ciclo_avaliacoes= "'.$id_revisao_ciclo_avaliacoes.'" AND trcaf.id_revisao_ciclo_fases="'.$id_revisao_ciclo_fases.'"', 'left');
		
		$this->db->join($this->tableCompetencias . ' tc', 'tc.id_competencia = vac.id_competencia', 'left');
		$this->db->order_by('vac.nome_competencia', 'ASC');
		$this->db->where('tc.ativo',1);
		if($id_time!= null){
			$this->db->where('(vac.id_time = '.$id_time.' OR vac.id_time IS NULL)');
		}
		$this->db->group_by('vac.id_competencia');
		$query 					= 	$this->db->get(); */
		// if needed please uncomment this REVERT END
		
		
		// if needed please comment this to revert START
		$sql =	"SELECT vac.*, trcaf.score, trcaf.descricao, tc.ativo, vut.id_usuario, vut.nome_usuario, tcp.nome_tipo as competencia_name
		FROM (v_competencias vac)
		LEFT JOIN ttl_revisao_ciclo_avaliacoes_fase trcaf ON trcaf.id_competencia = vac.id_competencia 
		AND trcaf.usuario_atualizador= '".$authid_usuario."' 
		AND trcaf.id_revisao_ciclo_avaliacoes= '".$id_revisao_ciclo_avaliacoes."' 
		AND trcaf.id_revisao_ciclo_fases='".$id_revisao_ciclo_fases."'
		LEFT JOIN ttl_competencias tc ON tc.id_competencia = vac.id_competencia
		LEFT JOIN ttl_competencias_tipo tcp ON tcp.id_tipo_competencia = tc.tipo_competencia
		LEFT OUTER JOIN v_usuariostime vut
		  on vac.id_time = vut.id_time
		WHERE vac.id_empresa =  '".$id_empresa."'
		AND ( vut.id_usuario = '".$id_usuario."' OR vac.id_time IS NULL )
		AND tc.ativo =  1
		ORDER BY vac.id_competencia, vac.nome_competencia ASC";
		// if needed please comment this REVERT END
		
		$query 					= 	$this->db->query($sql); 
		
		
		$result					=  	$query->result_array();
		
		$category_wise_data 	=	array();
		if(!empty($result)){
			$tipo_none_data 		=	array();
			$tipo_wise_data 		=	array();
			foreach($result as $index=>$res){

				if(empty($res['tipo_competencia']) || empty($res['tipo_competencia'])){
					$tipo_none_data['data']				=	array(	
																	'id'	=>	'',
																	'name'	=>	'',
																);
					$tipo_none_data['competencias'][]	=	$result[$index];
				}else{
					$competence_id			=	$res['tipo_competencia'];
					$competencia_name		=	$res['competencia_name'];
					$tipo_wise_data[$res['tipo_competencia']]['data']	=	array(
																			'id'	=>	$competence_id,
																			'name'	=>	 $competencia_name,
																					);
					$tipo_wise_data[$res['tipo_competencia']]['competencias'][]	=	$result[$index];
				}
			}
			if(!empty($tipo_none_data)){
				array_push($tipo_wise_data,$tipo_none_data);
			}
		}
		$newtipo_data 	=	array();
		if(!empty($tipo_wise_data)){
			foreach($tipo_wise_data as $tipo){
				$newtipo_data[]	=	$tipo;
			}
		}
		if(!empty($newtipo_data)){
			foreach($newtipo_data as &$tipo_data){
				$tipo_data['categorywisedata']	=	array();
							
				if(!empty($tipo_data['competencias'])){
					$category_none_data	=	array();
					$category_wise_data	=	array();
					foreach($tipo_data['competencias'] as $index=>$competencias){
						if(empty($competencias['id_categoria_competencias'])){
							$category_none_data['data']				=	array(	
																			'id'	=>	'',
																			'name'	=>	'',
																		);
							$category_none_data['competencias'][]	=	$tipo_data['competencias'][$index];
						}else{
							$category_wise_data[$competencias['id_categoria_competencias']]['data']	=	array(
																									'id'	=>	$competencias['id_categoria_competencias'],
																									'name'	=>	$competencias['nome_categoria'],
																								);
							$category_wise_data[$competencias['id_categoria_competencias']]['competencias'][]	=	$tipo_data['competencias'][$index];
						}
					}
					if(!empty($category_none_data)){
						array_push($category_wise_data,$category_none_data);
					}
					$newcategory_data 	=	array();
					if(!empty($category_wise_data)){
						foreach($category_wise_data as $category_data){
							$newcategory_data[]	=	$category_data;
						}
					}
					$tipo_data['categorywisedata']	=	$newcategory_data;
				}
			}
		}
		return $newtipo_data;
	}
	
	public function get_valerea_by_empressa_apprisial($id_empresa, $id_usuario, $id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes)
	{
		$this->db->select('tv.id_valores as id,tv.id_empresa,tv.nome_valor as name,tv.descricao as description, trcaf.score, trcaf.descricao');
		$this->db->from($this->tableValores. ' tv');
		$this->db->join($this->tableRevisaoCicloAvaliacoesFase . ' trcaf', 'trcaf.id_valores = tv.id_valores AND trcaf.usuario_atualizador= "'.$id_usuario.'" AND trcaf.id_revisao_ciclo_avaliacoes= "'.$id_revisao_ciclo_avaliacoes.'" AND trcaf.id_revisao_ciclo_fases="'.$id_revisao_ciclo_fases.'"', 'left');
	
		$this->db->where('tv.id_empresa', $id_empresa);
		$this->db->order_by('tv.id_valores', 'DESC');
		$this->db->group_by('tv.id_valores');
		$query3 = $this->db->get();
		return $result = $query3->result_array();
	}
	
	 // check if fase data already saved.
	public function check_apprisial_fase_data($data)
	{
		$this->db->select('*');
		$this->db->from($this->tableRevisaoCicloAvaliacoesFase);
		if($data['id_revisao_ciclo_avaliacoes']!=null){
			$this->db->where($this->tableRevisaoCicloAvaliacoesFase.'.id_revisao_ciclo_avaliacoes', $data['id_revisao_ciclo_avaliacoes']);
		}
		if($data['id_revisao_ciclo_fases']!=null){
			$this->db->where($this->tableRevisaoCicloAvaliacoesFase.'.id_revisao_ciclo_fases', $data['id_revisao_ciclo_fases']);
		}
		if($data['id_pergunta']!=null){
			$this->db->where($this->tableRevisaoCicloAvaliacoesFase.'.id_pergunta', $data['id_pergunta']);
		}
		if($data['id_competencia']!=null){
			$this->db->where($this->tableRevisaoCicloAvaliacoesFase.'.id_competencia', $data['id_competencia']);
		}
		if($data['id_valores']!=null){
			$this->db->where($this->tableRevisaoCicloAvaliacoesFase.'.id_valores', $data['id_valores']);
		}
		if($data['usuario_atualizador']!=null){
			$this->db->where($this->tableRevisaoCicloAvaliacoesFase.'.usuario_atualizador', $data['usuario_atualizador']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0 ){
			return $query->row_array();
		}
		return false;
	}
	
	public function save_apprisial_fase_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $form_data,$field_type,$id_usuario){
		parse_str($form_data, $data);
		
		if(!empty($data)){
			if(!empty($data['description'])){
				foreach($data['description'] as $id_pergunta=>$text){
					
					$score 	=	isset($data['apprisialanswers']['rating_answer'][$id_pergunta]['value'])?$data['apprisialanswers']['rating_answer'][$id_pergunta]['value']:0;
					$tbl2_data = array(
						'id_revisao_ciclo_avaliacoes' => $id_revisao_ciclo_avaliacoes,
						'id_revisao_ciclo_fases' => $id_revisao_ciclo_fases,
						'id_pergunta' => $id_pergunta,
						'id_competencia' => null,
						'id_valores' => null,
						'score' => $score,
						'descricao' => $text,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					$this->savetableRevisaoCicloAvaliacoesFase($tbl2_data, $field_type);
				}
			}
		}
		$this->save_each_step($id_revisao_ciclo_avaliacoes, $field_type);
		return true;
	}
	
	public function save_apprisial_finish($id_revisao_ciclo_avaliacoes, $id_usuario){
		$this->db->trans_start();
		$tbl2_data	=	array(
							'respondido'=>1
						);		
		$this->db->where('id_revisao_ciclos_avaliacoes',$id_revisao_ciclo_avaliacoes);
		$this->db->update($this->tableRevisaoCicloAvaliacoes, $tbl2_data);
		$this->db->trans_complete();
		return true;
	}
	
	public function save_apprisial_fase_competencias_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $form_data,$field_type,$id_usuario){
		
		parse_str($form_data, $data);
		
		if(!empty($data)){
			if(!empty($data['description'])){
				foreach($data['description'] as $id_competencia=>$text){
					
					$score 	=	isset($data['apprisialanswers']['rating_answer'][$id_competencia]['value'])?$data['apprisialanswers']['rating_answer'][$id_competencia]['value']:0;
					$tbl2_data = array(
						'id_revisao_ciclo_avaliacoes' => $id_revisao_ciclo_avaliacoes,
						'id_revisao_ciclo_fases' => $id_revisao_ciclo_fases,
						'id_pergunta' => null,
						'id_competencia' => $id_competencia,
						'id_valores' => null,
						'score' => $score,
						'descricao' => $text,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					$this->savetableRevisaoCicloAvaliacoesFase($tbl2_data, $field_type);
				}
			}
		}
		$this->save_each_step($id_revisao_ciclo_avaliacoes, $field_type);
		return true;
	}
	
	public function save_apprisial_fase_valores_data($id_revisao_ciclo_fases, $id_revisao_ciclo_avaliacoes, $form_data,$field_type,$id_usuario){
		
		parse_str($form_data, $data);
		
		if(!empty($data)){
			
			if(!empty($data['description'])){
				foreach($data['description'] as $id_valores=>$text){
					
					$score 	=	isset($data['apprisialanswers']['rating_answer'][$id_valores]['value'])?$data['apprisialanswers']['rating_answer'][$id_valores]['value']:0;
					$tbl2_data = array(
						'id_revisao_ciclo_avaliacoes' => $id_revisao_ciclo_avaliacoes,
						'id_revisao_ciclo_fases' => $id_revisao_ciclo_fases,
						'id_pergunta' => null,
						'id_competencia' => null,
						'id_valores' => $id_valores,
						'score' => $score,
						'descricao' => $text,
						'usuario_atualizador' => $id_usuario,
						'data_atualizacao' => date('Y-m-d H:i:s'),
					);
					
					$this->savetableRevisaoCicloAvaliacoesFase($tbl2_data, $field_type);
				}
			}
		}
		$this->save_each_step($id_revisao_ciclo_avaliacoes, $field_type);
		return true;
	}
	
	function savetableRevisaoCicloAvaliacoesFase($tbl2_data, $field_type){
		
		if($tbl2_data['score'] == null){
			$tbl2_data['score']	=	0;
		}
		$already_data 	=	$this->check_apprisial_fase_data($tbl2_data);
		
		if($already_data){
			$this->db->trans_start();
			$this->db->where('id_revisao_ciclo_avaliacoes_fase',$already_data['id_revisao_ciclo_avaliacoes_fase']);
			$this->db->update($this->tableRevisaoCicloAvaliacoesFase, $tbl2_data);
			$this->db->trans_complete();
		}else{						
			$this->db->trans_start();
			$this->db->insert($this->tableRevisaoCicloAvaliacoesFase, $tbl2_data);
			$this->db->trans_complete();
		}
	}
	
	function save_each_step($id_revisao_ciclo_avaliacoes, $field_type){
		
		$this->db->trans_start();		
		$this->db->where('id_revisao_ciclos_avaliacoes',$id_revisao_ciclo_avaliacoes);
		$this->db->update($this->tableRevisaoCicloAvaliacoes,array($field_type=>1));
		$this->db->trans_complete();
	}

	function get_revisao_ciclo_score($gestor_id = null, $usuario_avaliado_id = null, $times_id = null, $return_array = true){

		$endWhere = "WHERE";
        $sql = "SELECT *, CASE 
			    WHEN nine_box='1' 
			    THEN  'Insuficiente'
			    WHEN nine_box='2' 
			    THEN  'Questionável'
			    WHEN nine_box='3' 
			    THEN  'Enigma'
			    WHEN nine_box='4' 
			    THEN  'Eficaz'
			    WHEN nine_box='5' 
			    THEN  'Eficaz'
			    WHEN nine_box='6' 
			    THEN  'Mantenedor'
			    WHEN nine_box='7' 
			    THEN  'Mantenedor'
			    WHEN nine_box='8' 
			    THEN  'Forte desempenho'
			    WHEN nine_box='9' 
			    THEN  'Alto potencial'
			 	END AS nine_box_label 
			 	FROM $this->tableRevisaoCicloScore ";

        if ($gestor_id) 
    	{
    		$sql .= "$endWhere id_gestor = $gestor_id ";
    		$andWhere = 'AND';
    	}
        if ($usuario_avaliado_id) 
    	{
    		$sql .= "$endWhere id_usuario_avaliado = $usuario_avaliado_id ";
    		$andWhere = 'AND';
    	}
        if (isset($times_id)) 
    	{
    		$implode = implode(',', $times_id);
    		$sql .= "$endWhere id_time IN ($implode) ";
    		$andWhere = 'AND';
    	}

        $query = $this->db->query($sql);
        if ($return_array) $result =  $query->result_array();
        else $result = $query;

        return $result;
    }

    function update_nine_box_by_id($id_revisao_ciclo_score, $value){
    	$query = $this->db->query("update $this->tableRevisaoCicloScore set nine_box = $value
									where id_revisao_ciclo_score = $id_revisao_ciclo_score ");

    	return true;
    }


	function get_revisao_ciclo_score_nine_box($gestor_id = null, $usuario_avaliado_id = null, $times_id = null, $cycles = null, $responsibles = null){

		$where = "WHERE";
		$sql = "SELECT trcs.nine_box as nine_box, count(trcs.id_revisao_ciclo_score) as total, tu.id_empresa, 
        		GROUP_CONCAT(tu.id_usuario) AS id_users,
        		GROUP_CONCAT(trcs.id_revisao_ciclo_score) AS ids_revisao_ciclo_score,
        		GROUP_CONCAT(trcs.nome_usuario) AS user_names,
        		GROUP_CONCAT(ifnull(trcs.media_final,'')) AS user_averages,
        		GROUP_CONCAT(ifnull(tu.url_image,'')) AS user_images, 
        		GROUP_CONCAT(ifnull(trcs.tempo_empresa, '0')) AS tempo_empresa,
        		GROUP_CONCAT(ifnull(tc.nome_cargo, '')) AS cargos
        		FROM $this->tableRevisaoCicloScore trcs
        		INNER JOIN $this->tableUser tu ON trcs.id_usuario_avaliado = tu.id_usuario
        		LEFT JOIN $this->tableCargos tc ON tu.id_cargo = tc.id_cargo";
        if ($gestor_id) {
    		$sql .= " $where trcs.id_gestor = $gestor_id";
    		$where = "AND";
    	}
        if ($usuario_avaliado_id) {
        	$sql .= " $where trcs.id_usuario_avaliado = $usuario_avaliado_id"; 
        	$where = "AND";
    	}
        if (isset($times_id)) {
        	$sql .= " $where trcs.id_time IN (". implode(',', $times_id) . ")"; 
        	$where = "AND";
    	}
        if (isset($cycles) && $cycles != '') {
        	$sql .= " $where trcs.id_revisao_ciclo IN (". implode(',', $cycles) . ")"; 
        	$where = "AND";
    	}
        if (isset($responsibles) && $responsibles != '') {
        	$sql .= " $where trcs.id_gestor IN (". implode(',', $responsibles) . ")"; 
        	$where = "AND";
    	}
        $sql .= " group by nine_box";


        $query = $this->db->query($sql);
        $results =  $query->result_array();

		if(!empty($results)){
			foreach($results as &$result){
				if(!empty($result['id_users'])){
					$result['users'] = [];
					$ids = explode(',', $result['id_users']);
					$revisao_ids = explode(',', $result['ids_revisao_ciclo_score']);
					$images = explode(',', $result['user_images']);
					$names = explode(',', $result['user_names']);
					$tempo = explode(',', $result['tempo_empresa']);
					$averages = explode(',', $result['user_averages']);
					$cargos = explode(',', $result['cargos']);
					unset($result['id_users']);
					unset($result['ids_revisao_ciclo_score']);
					unset($result['user_images']);
					unset($result['user_names']);
					unset($result['tempo_empresa']);
					unset($result['user_averages']);
					unset($result['cargos']);
					foreach ($ids as $key => $value) {
						$imageStr = "";
						if ($images[$key]) $imageStr = base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$images[$key];
						$result['users'][] = ["id" => $value, "image" => $imageStr, "name" => $names[$key], "id_revisao_ciclo_score" => $revisao_ids [$key], "tempo_empresa" => $tempo[$key], "media_final" => $averages[$key], "cargo" => $cargos[$key]];
					}
				}
			}
		}

        return $results;
    }

	function get_results_from_user_by_cycle($user_id, $cycle_id = null){

		$liberado = "";
		if ($user_id == $this->session->userdata('id')) $liberado = " AND t.liberado = 1 ";
		$sql = "select ifnull(t.valores_gestor_calibrado,t.valores_gestor)as 'Valores Gestor ',
		    	 t.valores_par as 'Valores pelos Pares',
				 ifnull(t.resultados_gestor_calibrado,t.resultados_gestor) as 'Resultados Gestor ',
				 t.resultados_par as 'Resultados pelos Pares',
				 ifnull(t.competencias_gestor_calibrado,t.competencias_gestor) as 'Competências pelo Gestor',
				 t.competencias_par as 'Competencias Pares',
				 t.potencial_par as 'Potencial Pares',
				 t.survey_gestor as 'Feedback Gestor',
				 t.survey_par as 'Feedback Pares' 
				from ttl_revisao_ciclo_score t
				WHERE t.id_usuario_avaliado = $user_id
				$liberado";

		if ($cycle_id) $sql = $sql." AND t.id_revisao_ciclo = $cycle_id";

        $query = $this->db->query($sql);
        $result =  $query->row_array();

        if (count($result) == 0) return null;

        return $result;
    }


	function get_user_average_scores($user_id){

        $this->db->select('id_usuario_avaliado, id_revisao_ciclo, nome_revisao_ciclo, nome_usuario, media_final');
        $this->db->from($this->tableRevisaoCicloScore);
        if ($user_id) $this->db->where('id_usuario_avaliado', $user_id);
        if ($user_id == $this->session->userdata('id')) $this->db->where('liberado', 1);
		$this->db->order_by('id_revisao_ciclo_score', 'ASC');
        $query = $this->db->get();
        $result =  $query->result_array();
        return $result;
    }

    function get_single_scores_from_revisao_ciclo_id($revisao_ciclo_id, $user_id, $type){

    	if ($type == 'competencias'){
			$query = $this->db->query("select rcaf.id_competencia,vc.nome_competencia as name, rcaf.score, rcaf.score_calibrado, rcaf.id_revisao_ciclo_avaliacoes_fase
			 	from  ttl_revisao_ciclo_avaliacoes_fase rcaf, v_competencias vc ,  ttl_revisao_ciclo_avaliacoes rcv
				where rcaf.id_competencia = vc.id_competencia and
				rcv.id_revisao_ciclos_avaliacoes = rcaf.id_revisao_ciclo_avaliacoes and 
				rcaf.id_competencia > 0 and
				rcv.id_revisao_ciclo = $revisao_ciclo_id and  
				rcv.id_tipo_avaliacao = 2 and  
				rcv.id_usuario_avaliado = $user_id");
    	}
    	else if ($type == 'valores')
    	{
	    	$query = $this->db->query("select rcaf.id_valores,va.nome_valor as name, rcaf.score, rcaf.score_calibrado, rcaf.id_revisao_ciclo_avaliacoes_fase
			 	from  ttl_revisao_ciclo_avaliacoes_fase rcaf, ttl_valores va  ,ttl_revisao_ciclo_avaliacoes rcv
				where rcaf.id_valores = va.id_valores and
				rcv.id_revisao_ciclos_avaliacoes = rcaf.id_revisao_ciclo_avaliacoes and 
				rcaf.id_valores > 0 and
				rcv.id_revisao_ciclo = $revisao_ciclo_id and  
				rcv.id_tipo_avaliacao = 2 and  
				rcv.id_usuario_avaliado = $user_id");

    	} 
    	else 
    	{
    		$query = $this->db->query("select rcaf.id_pergunta,pe.pergunta as name, rcaf.score, rcaf.score_calibrado, rcaf.id_revisao_ciclo_avaliacoes_fase
			 	from  ttl_revisao_ciclo_avaliacoes_fase rcaf, ttl_perguntas pe  ,ttl_revisao_ciclo_avaliacoes rcv, ttl_revisao_ciclo_fases rf
				where rcaf.id_pergunta = pe.id_pergunta and
				rf.componente = 'O' and
				rf.id_revisao_ciclo_fases = rcaf.id_revisao_ciclo_fases and
				rcv.id_revisao_ciclos_avaliacoes = rcaf.id_revisao_ciclo_avaliacoes and 
				
				rcv.id_revisao_ciclos_avaliacoes = rcaf.id_revisao_ciclo_avaliacoes and 
				rcaf.id_pergunta > 0 and
				rcaf.score is not null and
				rcaf.score > 0 and
				rcv.id_revisao_ciclo = $revisao_ciclo_id and  
				rcv.id_tipo_avaliacao = 2 and  
				rcv.id_usuario_avaliado = $user_id");
				
				
    	}
    	$result = $query->result_array();
    	return $result;

    }

    function get_valores_from_usuario_by_cycle($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("select id_revisao_ciclo_fases,nome_fase from ttl_revisao_ciclo_fases where componente = 'v' AND id_revisao_ciclo = $revisao_ciclo_id and grafico=1");
    	$test = $query->result_array();
    	if (count($test) == 0) return false;


    	if ($user_id == $this->session->userdata('id')) {
	    	$query = $this->db->query("select * from ttl_revisao_ciclo_score where liberado = 1 AND id_revisao_ciclo = $revisao_ciclo_id AND id_usuario_avaliado = $user_id ");
	    	$test = $query->result_array();
	    	if (count($test) == 0) return false;
	    }

    	$query = $this->db->query("select f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_valores, v.nome_valor,  
							        avg(CASE a.id_tipo_avaliacao WHEN 1 THEN af.score_ajustado ELSE NULL END) score_1,
							        avg(CASE a.id_tipo_avaliacao WHEN 2 THEN af.score_ajustado ELSE NULL END) score_2, 
							        avg(CASE a.id_tipo_avaliacao WHEN 3 THEN af.score_ajustado ELSE NULL END) score_3,
							        avg(CASE a.id_tipo_avaliacao WHEN 4 THEN af.score_ajustado ELSE NULL END) score_4,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 1 THEN 1 ELSE 0 END) as numComentarios_1,       
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 2 THEN 1 ELSE 0 END) as numComentarios_2,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 3 THEN 1 ELSE 0 END) as numComentarios_3,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 4 THEN 1 ELSE 0 END) as numComentarios_4
									
									from ttl_revisao_ciclo_fases f INNER JOIN ttl_revisao_ciclo_avaliacoes_fase af
							         	ON f.id_revisao_ciclo_fases = af.id_revisao_ciclo_fases
						       		INNER JOIN ttl_revisao_ciclo_avaliacoes a
									   	ON af.id_revisao_ciclo_avaliacoes = a.id_revisao_ciclos_avaliacoes
							       	INNER JOIN ttl_valores v
										ON af.id_valores = v.id_valores

									WHERE a.id_usuario_avaliado = $user_id
									AND f.id_revisao_ciclo = $revisao_ciclo_id

									group by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_valores, v.nome_valor
								   	order by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_valores, v.nome_valor");







    	$result = $query->result_array();
    	return $result;
    }
    function get_outraetapa_from_usuario_by_cycle($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("select id_revisao_ciclo_fases, nome_fase from ttl_revisao_ciclo_fases where componente = 's' AND id_revisao_ciclo = $revisao_ciclo_id and grafico=1");
    	$test = $query->result_array();
    	if (count($test) == 0) return false;

    	if ($user_id == $this->session->userdata('id')) {
	    	$query = $this->db->query("select * from ttl_revisao_ciclo_score where liberado = 1 AND id_revisao_ciclo = $revisao_ciclo_id AND id_usuario_avaliado = $user_id");
	    	$test = $query->result_array();
	    	if (count($test) == 0) return false;
	    }

    	$query = $this->db->query("select f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta ,  
							        avg(CASE a.id_tipo_avaliacao WHEN 1 THEN af.score_ajustado ELSE NULL END) score_1,
							        avg(CASE a.id_tipo_avaliacao WHEN 2 THEN af.score_ajustado ELSE NULL END) score_2, 
							        avg(CASE a.id_tipo_avaliacao WHEN 3 THEN af.score_ajustado ELSE NULL END) score_3,
							        avg(CASE a.id_tipo_avaliacao WHEN 4 THEN af.score_ajustado ELSE NULL END) score_4,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 1 THEN 1 ELSE 0 END) as numComentarios_1,       
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 2 THEN 1 ELSE 0 END) as numComentarios_2,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 3 THEN 1 ELSE 0 END) as numComentarios_3,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 4 THEN 1 ELSE 0 END) as numComentarios_4
									
									from ttl_revisao_ciclo_fases f INNER JOIN ttl_revisao_ciclo_avaliacoes_fase af
							         	ON f.id_revisao_ciclo_fases = af.id_revisao_ciclo_fases
							       	INNER JOIN ttl_revisao_ciclo_avaliacoes a
									   	ON af.id_revisao_ciclo_avaliacoes = a.id_revisao_ciclos_avaliacoes
							       	INNER JOIN ttl_perguntas p
										ON af.id_pergunta = p.id_pergunta

									WHERE f.componente = 's' 
									AND a.id_usuario_avaliado = $user_id
									AND f.id_revisao_ciclo = $revisao_ciclo_id 

								 	group by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta
								   	order by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta");

    	$result = $query->result_array();

    	return $result;
    }

    function grant_evaluation_access($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("update ttl_revisao_ciclo_score r set r.liberado = 1
									where r.id_usuario_avaliado = $user_id and r.id_revisao_ciclo = $revisao_ciclo_id ");
    	if($this->db->affected_rows() > 0) return true; else return false;

    }
    function revoke_evaluation_access($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("update ttl_revisao_ciclo_score r set r.liberado = 0
									where r.id_usuario_avaliado = $user_id and r.id_revisao_ciclo = $revisao_ciclo_id ");
    	if($this->db->affected_rows() > 0) return true; else return false;
    }

    function get_potencial_from_usuario_by_cycle($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("select id_revisao_ciclo_fases,nome_fase from ttl_revisao_ciclo_fases where componente = 't' AND id_revisao_ciclo = $revisao_ciclo_id and grafico=1");
    	$test = $query->result_array();
    	if (count($test) == 0) return false;

    	if ($user_id == $this->session->userdata('id')) {
	    	$query = $this->db->query("select * from ttl_revisao_ciclo_score where liberado = 1 AND id_revisao_ciclo = $revisao_ciclo_id AND id_usuario_avaliado = $user_id");
	    	$test = $query->result_array();
	    	if (count($test) == 0) return false;
	    }

      	$query = $this->db->query("select f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta ,  
							        avg(CASE a.id_tipo_avaliacao WHEN 1 THEN af.score_ajustado ELSE NULL END) score_1,
							        avg(CASE a.id_tipo_avaliacao WHEN 2 THEN af.score_ajustado ELSE NULL END) score_2, 
							        avg(CASE a.id_tipo_avaliacao WHEN 3 THEN af.score_ajustado ELSE NULL END) score_3,
							        avg(CASE a.id_tipo_avaliacao WHEN 4 THEN af.score_ajustado ELSE NULL END) score_4,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 1 THEN 1 ELSE 0 END) as numComentarios_1,       
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 2 THEN 1 ELSE 0 END) as numComentarios_2,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 3 THEN 1 ELSE 0 END) as numComentarios_3,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 4 THEN 1 ELSE 0 END) as numComentarios_4
									
									from ttl_revisao_ciclo_fases f INNER JOIN ttl_revisao_ciclo_avaliacoes_fase af
							         	ON f.id_revisao_ciclo_fases = af.id_revisao_ciclo_fases
							       	INNER JOIN ttl_revisao_ciclo_avaliacoes a
									   	ON af.id_revisao_ciclo_avaliacoes = a.id_revisao_ciclos_avaliacoes
							       	INNER JOIN ttl_perguntas p
										ON af.id_pergunta = p.id_pergunta

									WHERE f.componente = 't' 
									AND a.id_usuario_avaliado = $user_id
									AND f.id_revisao_ciclo = $revisao_ciclo_id 

								 	group by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta
								   	order by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta");

    	$result = $query->result_array();
    	return $result;
    }

    function get_resultado_from_usuario_by_cycle($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("select id_revisao_ciclo_fases,nome_fase from ttl_revisao_ciclo_fases where componente = 'o' AND id_revisao_ciclo = $revisao_ciclo_id and grafico=1");
    	$test = $query->result_array();
    	if (count($test) == 0) return false;

    	if ($user_id == $this->session->userdata('id')) {
	    	$query = $this->db->query("select * from ttl_revisao_ciclo_score where liberado = 1 AND id_revisao_ciclo = $revisao_ciclo_id AND id_usuario_avaliado = $user_id");
	    	$test = $query->result_array();
	    	if (count($test) == 0) return false;
	    }

      	$query = $this->db->query("select f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta ,  
							        avg(CASE a.id_tipo_avaliacao WHEN 1 THEN af.score_ajustado ELSE NULL END) score_1,
							        avg(CASE a.id_tipo_avaliacao WHEN 2 THEN af.score_ajustado ELSE NULL END) score_2, 
							        avg(CASE a.id_tipo_avaliacao WHEN 3 THEN af.score_ajustado ELSE NULL END) score_3,
							        avg(CASE a.id_tipo_avaliacao WHEN 4 THEN af.score_ajustado ELSE NULL END) score_4,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 1 THEN 1 ELSE 0 END) as numComentarios_1,       
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 2 THEN 1 ELSE 0 END) as numComentarios_2,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 3 THEN 1 ELSE 0 END) as numComentarios_3,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 4 THEN 1 ELSE 0 END) as numComentarios_4
									
									from ttl_revisao_ciclo_fases f INNER JOIN ttl_revisao_ciclo_avaliacoes_fase af
							         	ON f.id_revisao_ciclo_fases = af.id_revisao_ciclo_fases
							       	INNER JOIN ttl_revisao_ciclo_avaliacoes a
									   	ON af.id_revisao_ciclo_avaliacoes = a.id_revisao_ciclos_avaliacoes
							       	INNER JOIN ttl_perguntas p
										ON af.id_pergunta = p.id_pergunta

									WHERE f.componente = 'o' 
									AND a.id_usuario_avaliado = $user_id
									AND f.id_revisao_ciclo = $revisao_ciclo_id 
								 
								 	group by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta
								   	order by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_pergunta, p.pergunta");

    	$result = $query->result_array();
    	return $result;
    }

    function get_competencia_from_usuario_by_cycle($revisao_ciclo_id, $user_id){
    	$query = $this->db->query("select id_revisao_ciclo_fases,nome_fase from ttl_revisao_ciclo_fases where componente = 'c' AND id_revisao_ciclo = $revisao_ciclo_id and grafico=1");
    	$test = $query->result_array();
    	if (count($test) == 0) return false;

    	if ($user_id == $this->session->userdata('id')) {
	    	$query = $this->db->query("select * from ttl_revisao_ciclo_score where liberado = 1 AND id_revisao_ciclo = $revisao_ciclo_id AND id_usuario_avaliado = $user_id");
	    	$test = $query->result_array();
	    	if (count($test) == 0) return false;
	    }

      	$query = $this->db->query("select c.id_competencia, f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_valores, c.nome_competencia,  
							        avg(CASE a.id_tipo_avaliacao WHEN 1 THEN af.score_ajustado ELSE NULL END) score_1,
							        avg(CASE a.id_tipo_avaliacao WHEN 2 THEN af.score_ajustado ELSE NULL END) score_2, 
							        avg(CASE a.id_tipo_avaliacao WHEN 3 THEN af.score_ajustado ELSE NULL END) score_3,
							        avg(CASE a.id_tipo_avaliacao WHEN 4 THEN af.score_ajustado ELSE NULL END) score_4,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 1 THEN 1 ELSE 0 END) as numComentarios_1,       
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 2 THEN 1 ELSE 0 END) as numComentarios_2,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 3 THEN 1 ELSE 0 END) as numComentarios_3,
							        sum(CASE WHEN af.descricao IS NOT NULL AND af.descricao != '' AND a.id_tipo_avaliacao = 4 THEN 1 ELSE 0 END) as numComentarios_4
									
									from ttl_revisao_ciclo_fases f INNER JOIN ttl_revisao_ciclo_avaliacoes_fase af
							         	ON f.id_revisao_ciclo_fases = af.id_revisao_ciclo_fases
							       	INNER JOIN ttl_revisao_ciclo_avaliacoes a
									   	ON af.id_revisao_ciclo_avaliacoes = a.id_revisao_ciclos_avaliacoes
							       	INNER JOIN ttl_competencias c
										ON af.id_competencia = c.id_competencia

									WHERE a.id_usuario_avaliado = $user_id
									AND f.id_revisao_ciclo = $revisao_ciclo_id

								 	group by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_valores, c.nome_competencia
								   	order by f.id_revisao_ciclo, a.id_usuario_avaliado, f.componente, af.id_valores, c.nome_competencia");

    	$result = $query->result_array();
    	return $result;
    }

	function get_comments_by_value($id_valores, $id_usuario, $id_tipo_avaliacao){
	    	$query = $this->db->query("select af.descricao
										from ttl_revisao_ciclo_fases f, ttl_revisao_ciclo_avaliacoes_fase af, ttl_revisao_ciclo_avaliacoes a, ttl_valores v
										where componente = 'v' and
										(af.descricao is not null and af.descricao != '') and
										a.id_tipo_avaliacao = $id_tipo_avaliacao and
										a.id_usuario_avaliado =$id_usuario and
										af.id_revisao_ciclo_fases = f.id_revisao_ciclo_fases and
										a.id_revisao_ciclos_avaliacoes = af.id_revisao_ciclo_avaliacoes and
										af.id_valores = v.id_valores and
										af.id_valores = $id_valores");

	    	$result = $query->result_array();
	    	return $result;
    }
    function get_comments_by_outraetapa($id_pergunta, $id_usuario, $id_tipo_avaliacao){
	    	$query = $this->db->query("select af.descricao
										from ttl_revisao_ciclo_fases f, ttl_revisao_ciclo_avaliacoes_fase af, ttl_revisao_ciclo_avaliacoes a,ttl_perguntas p
										where componente = 's' and
										(af.descricao is not null and af.descricao != '') and
										a.id_tipo_avaliacao = $id_tipo_avaliacao and
										a.id_usuario_avaliado =$id_usuario and
										a.id_revisao_ciclos_avaliacoes = af.id_revisao_ciclo_avaliacoes and
										af.id_revisao_ciclo_fases = f.id_revisao_ciclo_fases and
										af.id_pergunta = p.id_pergunta and
										af.id_pergunta = $id_pergunta
											");

	    	$result = $query->result_array();
	    	return $result;
    }

	function get_comments_by_potencial($id_pergunta, $id_usuario, $id_tipo_avaliacao){
	    	$query = $this->db->query("select af.descricao
										from ttl_revisao_ciclo_fases f, ttl_revisao_ciclo_avaliacoes_fase af, ttl_revisao_ciclo_avaliacoes a,ttl_perguntas p
										where componente = 't' and
										(af.descricao is not null and af.descricao != '') and
										a.id_tipo_avaliacao = $id_tipo_avaliacao and
										a.id_usuario_avaliado =$id_usuario and
										a.id_revisao_ciclos_avaliacoes = af.id_revisao_ciclo_avaliacoes and
										af.id_revisao_ciclo_fases = f.id_revisao_ciclo_fases and
										af.id_pergunta = p.id_pergunta and
										af.id_pergunta = $id_pergunta 
										");

	    	$result = $query->result_array();
	    	return $result;
    }
	function get_comments_by_resultado($id_pergunta, $id_usuario, $id_tipo_avaliacao){
	    	$query = $this->db->query("select af.descricao
										from ttl_revisao_ciclo_fases f, ttl_revisao_ciclo_avaliacoes_fase af, ttl_revisao_ciclo_avaliacoes a,ttl_perguntas p
										where componente = 'o' and
										(af.descricao is not null and af.descricao != '') and
										a.id_tipo_avaliacao = $id_tipo_avaliacao and
										a.id_usuario_avaliado =$id_usuario and
										a.id_revisao_ciclos_avaliacoes = af.id_revisao_ciclo_avaliacoes and
										af.id_revisao_ciclo_fases = f.id_revisao_ciclo_fases and
										af.id_pergunta = p.id_pergunta and
										af.id_pergunta = $id_pergunta
										 ");

	    	$result = $query->result_array();
	    	return $result;
    }
	function get_comments_by_competencia($id_competencia, $id_usuario, $id_tipo_avaliacao){
	    	$query = $this->db->query("select af.descricao
										from ttl_revisao_ciclo_fases f, ttl_revisao_ciclo_avaliacoes_fase af, ttl_revisao_ciclo_avaliacoes a,v_competencias p
										where componente = 'c' and
										(af.descricao is not null and af.descricao != '') and
										a.id_tipo_avaliacao = $id_tipo_avaliacao and
										a.id_usuario_avaliado =$id_usuario and
										a.id_revisao_ciclos_avaliacoes = af.id_revisao_ciclo_avaliacoes and
										af.id_revisao_ciclo_fases = f.id_revisao_ciclo_fases and
										af.id_competencia = p.id_competencia and
										af.id_competencia = $id_competencia
										");

	    	$result = $query->result_array();
	    	return $result;
    }

	function get_all_cycles_by_user($id_usuario){
	    	$query = $this->db->query("select distinct(c.id_revisao_ciclo), c.nome_ciclo, c.nota_maxima from ttl_revisao_ciclo c, ttl_revisao_ciclo_avaliacoes a
										where c.id_revisao_ciclo = a.id_revisao_ciclo
										and c.ativo=1
										and a.ativo=1
										and  a.id_usuario_avaliado = $id_usuario
										order by c.id_revisao_ciclo desc");

	    	$result = $query->result_array();
	    	return $result;
    }

    function save_update_calibrated_scores($id, $score){
    	$query = $this->db->query("update ttl_revisao_ciclo_avaliacoes_fase r set r.score_calibrado = $score
									where id_revisao_ciclo_avaliacoes_fase =$id ");

    	return true;
    }
    function save_update_calibrated_average($id, $average, $field){
    	$query = $this->db->query("update ttl_revisao_ciclo_score r set r.$field = $average
									where id_revisao_ciclo_score = $id ");

    	return true;
    }

    function save_score_suggestion($id, $suggestion){
    	$query = $this->db->query("update ttl_revisao_ciclo_score r set r.id_recomendacao = $suggestion
									where id_revisao_ciclo_score = $id ");

    	return true;
    }
	function get_user_goals_on_review_steps($cycleId,$usuario_avaliado){
		$sql	=	'select op.id_objetivo,op.nome,op.percentual, op.responsavel,op.`type` from ttl_revisao_ciclo rc, ttl_objetivos o, v_objetivos_perfil op, ttl_objetivo_ciclo oc
					where 
					o.id_objetivo = op.id_objetivo and
					o.id_objetivo = oc.id_objetivo and
					oc.id_ciclo in (rc.id_ciclo_ini,rc.Id_ciclo_fim) and
					rc.id_revisao_ciclo ='.$cycleId.' and
					op.responsavel = '.$usuario_avaliado.' group by op.id_objetivo';
		$cycle_details 	=	$this->get_cycle_by_id($cycleId);
			
		$sql	=	'select op.id_objetivo,op.nome,op.percentual, op.responsavel,op.`type`
					from ttl_revisao_ciclo rc, ttl_objetivos o, v_objetivos_perfil op, ttl_objetivo_ciclo oc
					where
					o.id_objetivo = op.id_objetivo and
					o.id_objetivo = op.id_objetivo and
					o.id_objetivo = oc.id_objetivo and
					oc.id_ciclo in ('.$cycle_details['id_ciclo_ini'].','.$cycle_details['Id_ciclo_fim'].') and
					rc.id_revisao_ciclo  = '.$cycleId.' and
					op.responsavel = '.$usuario_avaliado.'
					group by id_objetivo';
						
		$query  = 	$this->db->query($sql);	
		$result = 	$query->result_array();
		if(sizeof($result) > 0 ){
			foreach($result as &$item)
			{
				$tmpUser = $this->get_data_resp($item['responsavel']);
				$item['responsaveldata']	=	isset($tmpUser[0])?$tmpUser[0]:array();
			}
		}
	    return $result;
	}

	function get_user_feedback_on_review_steps($cycleId,$userId){
		/* $sql	=		'select vt.id_usuario, vt.nome_usuario, f.resposta, v.nome_valor, f.tipo_feedback
						from ttl_feedback f, ttl_feedback_valores fv, v_usuariosTime vt, ttl_valores v, ttl_ciclos c, ttl_revisao_ciclo rc
						where f.id_feedback = fv.id_feedback and
						vt.id_usuario = f.id_usuario_destino and
						fv.id_valores = v.id_valores and
						c.id_ciclo in (rc.id_ciclo_ini,rc.Id_ciclo_fim) and
						f.id_usuario_destino = '.$userId.' and
						rc.id_revisao_ciclo = '.$cycleId.' group by f.id_feedback'; */
						
		$sql	=		'select vt.id_usuario, f.id_feedback,nome_usuario,f.id_usuario_destino, f.resposta, v.nome_valor, f.tipo_feedback,f.data_atualizacao, c.inicio_vigencia,c.fim_vigencia
						from ttl_feedback f, ttl_feedback_valores fv, v_usuariostime vt, ttl_valores v,
						ttl_revisao_ciclo rc join ttl_ciclos c on  (c.id_ciclo in(rc.id_ciclo_ini,rc.id_ciclo_fim))
						where f.id_feedback = fv.id_feedback and
						vt.id_usuario = f.usuario_atualizador and
						fv.id_valores = v.id_valores and
						f.id_usuario_destino = '.$userId.' and
						rc.id_revisao_ciclo = '.$cycleId.' and
						f.data_atualizacao >= c.inicio_vigencia and
						f.data_atualizacao <= c.fim_vigencia
						group by fv.id_valores,f.id_feedback';
						
		$query  = $this->db->query($sql);				
		$result = $query->result_array();
		if(sizeof($result) > 0 ){
			foreach($result as &$item)
			{
				$tmpUser = $this->get_data_resp($item['id_usuario']);
				$item['feedbackdata']	=	isset($tmpUser[0])?$tmpUser[0]:array();
			}
		}
	    return $result;
	}
	
	function save_autorizar($id_revisao_ciclo=null){
		
		if($id_revisao_ciclo!=null && !empty($id_revisao_ciclo)){
			$this->db->trans_start();
			$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
			$this->db->update($this->tableRevisaoCiclo, array('liberado'=>1));
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			
			$data	=	array(
								'autorizado'	=>	1
							);
			$this->db->trans_start();
			$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
			$this->db->update($this->tableRevisaoCicloAvaliacoes,$data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();
		}
		$result = $this->db->trans_status();
		$this->db->trans_complete();
		return $result;
	}
	function save_deautorizar($id_revisao_ciclo=null){
		
		if($id_revisao_ciclo!=null && !empty($id_revisao_ciclo)){
			$this->db->trans_start();
			$this->db->where('id_revisao_ciclo',$id_revisao_ciclo);
			$this->db->update($this->tableRevisaoCiclo, array('liberado'=>0));
			$result = $this->db->trans_status();
			$this->db->trans_complete();
		}
		$result = $this->db->trans_status();
		$this->db->trans_complete();
		return $result;
	}
	function get_categories(){
		$this->db->where('id_empresa',$this->session->userdata('id_empresa'));
		$this->db->where('usuario_atualizador',$this->session->userdata('id'));
		$this->db->order_by("$this->tableCategory.id_categoria_competencias desc");
		$query	=	$this->db->get($this->tableCategory);
		$result	=	$query->result_array();
		return $result;
		
	}
	function save_category($form_data){
		parse_str($form_data, $data);
		$this->db->set('id_empresa',$this->session->userdata('id_empresa'));
		$this->db->set('nome_categoria',$data['nome_categoria']);
		$this->db->set('descricao_categoria',$data['descricao_categoria']);
		$this->db->set('usuario_atualizador',$this->session->userdata('id'));
		if($data['id_categoria_competencias'] != ""){
			$this->db->where('id_categoria_competencias',$data['id_categoria_competencias']);
			$this->db->update($this->tableCategory);
			return $data['id_categoria_competencias'];
		}else{
			$this->db->insert($this->tableCategory);
			return $this->db->insert_id();
		}
	}
	function get_category_by_id($category_id){
		$this->db->where('id_categoria_competencias',$category_id);
		$query	=	$this->db->get($this->tableCategory);
		$result	=	$query->row_array();
		return $result;
	}
	function get_competencias(){
		$this->db->select("$this->tableCompetencias.*,$this->tableCategory.nome_categoria");
		$this->db->join($this->tableCategory,"$this->tableCategory.id_categoria_competencias = $this->tableCompetencias.id_categoria_competencia",'LEFT');
		$this->db->where("$this->tableCompetencias.id_empresa",$this->session->userdata('id_empresa'));
		$this->db->order_by("$this->tableCompetencias.id_competencia desc");
		$query	=	$this->db->get($this->tableCompetencias);
		$result	=	$query->result_array();
		$data	=	array();
		if(!empty($result)){
			foreach($result as $row){
				$teams			=	$this->get_competencia_teams($row['id_competencia']);
				$row['teams']	=	$teams;
				$data[]			=	$row;
			}
		}
		return $data;
		
	}
	function get_competencia_teams($id_competencia){
		$this->db->select("$this->tableTeams.id_time as id,$this->tableTeams.parent_id,$this->tableTeams.nome_unidade as name");
		$this->db->join($this->tableTeams,"$this->tableTeams.id_time = $this->tableCompetenciaTimes.id_time",'INNER');
		$this->db->where('id_competencia',$id_competencia);
		$query	=	$this->db->get($this->tableCompetenciaTimes);
		$result	=	$query->result_array();
		return $result;
	}
	function save_competencia($form_data){
		parse_str($form_data,$data);
		$teams	=	$this->input->post('teams');
		$this->db->set('id_empresa',$this->session->userdata('id_empresa'));
		$this->db->set('nome_competencia',$data['nome_competencia']);
		$this->db->set('id_categoria_competencia',$data['id_categoria_competencia']);
		$this->db->set('tipo_competencia',$data['tipo_competencia']);
		$this->db->set('descricao',$data['descricao']);
		$this->db->set('ativo',$data['ativo']);
		$this->db->set('usuario_atualizador',$this->session->userdata('id'));
		if($data['id_competencia'] != ""){
			$this->db->where('id_competencia',$data['id_competencia']);
			$this->db->update($this->tableCompetencias);
			$this->delete_compentencias_times($data['id_competencia']);
			if(!empty($data['id_team'])){
				foreach($data['id_team'] as $id_team){
					$this->save_compentencias_times($id_team,$data['id_competencia']);
				}
			}
			return $data['id_competencia'];
		}else{
			$this->db->insert($this->tableCompetencias);
			$competencia_id	=	$this->db->insert_id();
			if(!empty($teams)){
				
				foreach($teams as $id_team){
					$this->save_compentencias_times($id_team,$competencia_id);
				}
			}
			return $this->db->insert_id();
		}
	}
	function save_compentencias_times($id_team,$competencia_id){
		$this->db->set('id_competencia',$competencia_id);
		$this->db->set('id_time',$id_team);
		$this->db->set('usuario_atualizador',$this->session->userdata('id'));
		$this->db->insert($this->tableCompetenciaTimes);
	}
	function delete_compentencias_times($id_competencia){
		$this->db->where('id_competencia',$id_competencia);
		$this->db->delete($this->tableCompetenciaTimes);
	}
	function get_competencia_by_id($id_competencia){
		$this->db->where('id_competencia',$id_competencia);
		$query	=	$this->db->get($this->tableCompetencias);
		$result	=	$query->row_array();
		$data	=	array();
		if(!empty($result)){
			$teams				=	$this->get_competencia_teams($result['id_competencia']);
			$result['teams']	=	$teams;
			$data				=	$result;
		}
		return $data;
	}
	function search_competencias($searchData){
		if(!empty($searchData)){
			foreach($searchData as $key=>$search){
				if($search!=""){
					if($key == 'nome_categoria'){
						$this->db->like("$this->tableCategory.$key",$search);
					}elseif($key == 'ativo' || $key == 'tipo_competencia'){
						$this->db->where("$this->tableCompetencias.$key",$search);
					}else{
						$this->db->like("$this->tableCompetencias.$key",$search);
					}
				}
			}
		}
		$this->db->select("$this->tableCompetencias.*,$this->tableCategory.nome_categoria");
		$this->db->join($this->tableCategory,"$this->tableCategory.id_categoria_competencias = $this->tableCompetencias.id_categoria_competencia",'LEFT');
		$this->db->where("$this->tableCompetencias.id_empresa",$this->session->userdata('id_empresa'));
		$this->db->order_by("$this->tableCompetencias.id_competencia desc");
		$query	=	$this->db->get($this->tableCompetencias);
		$result	=	$query->result_array();
		$data	=	array();
		if(!empty($result)){
			foreach($result as $row){
				$teams			=	$this->get_competencia_teams($row['id_competencia']);
				$row['teams']	=	$teams;
				$data[]			=	$row;
			}
		}
		return $data;
	}
	function get_users_except_given_cycle_users($id,$cycleId,$type){
		$sql 			= 	"SELECT * FROM (SELECT tu.id_usuario as id, nome_usuario as name, url_image as image, tu.normal_user, tu.goal_register, tu.maintenance_user, tu.user_reviewer, email_usuario as email,  nome_unidade as team, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor LIMIT 1)as gestor,tipo_cargo, gerado_integracao
                                        FROM ttl_usuario tu
                                        INNER JOIN ttl_time_usuario ttu ON tu.id_usuario = ttu.id_usuario
                                        INNER JOIN ttl_empresa_times tet ON tet.id_time = ttu.id_empresa_time
                                        WHERE tu.id_empresa = $id AND tu.ativo=1

                                        union

                                        SELECT tu.id_usuario as id, nome_usuario as name, url_image as image, tu.normal_user, tu.goal_register, tu.maintenance_user, tu.user_reviewer, email_usuario as email,  NULL as team, (case when admin = '1' then 'true' else 'false' end) as admin, (case when avaliador = '1' then 'true' else 'false' end) as appraiser, (case when tu.ativo = '1' then 'true' else 'false' end) as active,(select nome_usuario from ttl_usuario where id_usuario = tu.id_gestor LIMIT 1)as gestor,tipo_cargo, gerado_integracao

                                        FROM ttl_usuario tu
                                        WHERE tu.id_empresa = $id AND tu.ativo=1 AND tu.id_usuario NOT IN
                                                (SELECT ttu.id_usuario
                                             FROM ttl_time_usuario 
                                             ttu)) as tbl WHERE id NOT IN
                                                (SELECT id_usuario_avaliador
                                             FROM
                                             ttl_revisao_ciclo_avaliacoes WHERE ttl_revisao_ciclo_avaliacoes.id_revisao_ciclo= ".$cycleId." AND ttl_revisao_ciclo_avaliacoes.id_tipo_avaliacao=".$type.")";
        $query  = 	$this->db->query($sql);	
		$result = 	$query->result_array();
		return $result;                                     
	}
	public function save_cycle_pares_users($id_revisao_ciclo,$users,$id_usuario_avaliado,$auto=0){
		if(!empty($users)){
			foreach($users as $userId){
				$this->db->set('id_revisao_ciclo',$id_revisao_ciclo);
				$this->db->set('id_tipo_avaliacao',3);
				$this->db->set('id_usuario_avaliado',$id_usuario_avaliado);
				$this->db->set('id_usuario_avaliador',$userId);
				$this->db->set('auto',$auto);
				$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
				$this->db->insert($this->tableRevisaoCicloAvaliacoes);
			}
		}
		return 1;
	}
	public function save_cycle_users($id_revisao_ciclo,$users,$type){
		if(!empty($users)){
			foreach($users as $userId){
				$this->db->set('id_revisao_ciclo',$id_revisao_ciclo);
				$this->db->set('id_tipo_avaliacao',$type);
				$this->db->set('id_usuario_avaliado',$userId);
				$this->db->set('id_usuario_avaliador',$userId);
				$this->db->set('id_usuario_atualizador',$this->session->userdata('id'));
				$this->db->insert($this->tableRevisaoCicloAvaliacoes);
			}
		}
		return 1;
	}
	public function save_the_empressa_image($id_empresa,$fileName){
		$this->db->trans_start();
		$this->db->set('profile_logo',$fileName);
		$this->db->where('id_empresa',$id_empresa);
		$this->db->update($this->tableCompany);
		$result = $this->db->trans_status();
		$this->db->trans_complete();
		return $result;
	}
	public function get_users_by_cycle_and_type($cycleId,$type_id,$auto=0){
		
		$id_usuario = 	$this->session->userdata('id');
		$id_empresa = 	$this->session->userdata('id_empresa');
		
		$this->db->select("tu.*,rca.id_usuario_avaliador as id,rca.id_revisao_ciclos_avaliacoes as avaliacoa_id,rca.id_revisao_ciclo,rca.valores,rca.competencias,rca.resultados,rca.potencial,rca.survey,rc.id_ciclo_ini,rc.Id_ciclo_fim,rca.autorizado,rca.respondido,rca.resultados,rca.auto");
		$this->db->from($this->tableRevisaoCicloAvaliacoes ." rca ");
		$this->db->join($this->tableUser." tu",'rca.id_usuario_avaliador=tu.id_usuario', 'inner');
		$this->db->join($this->tableRevisaoCiclo." rc",'rca.id_revisao_ciclo=rc.id_revisao_ciclo', 'inner');
		$this->db->where('rca.id_tipo_avaliacao', $type_id);
		$this->db->where('tu.id_empresa', $id_empresa);
		$this->db->where('rca.id_usuario_avaliado', $id_usuario);
		if($auto == 1){
			$this->db->where('rca.auto',$auto);
		}
		$this->db->where('rca.id_revisao_ciclo', $cycleId);
		$this->db->order_by('rca.id_revisao_ciclos_avaliacoes', 'DESC');
		
		$query 					= 	$this->db->get();
		$results				=	$query->result_array();
		if(!empty($results)){
			foreach($results as &$result){
				if(!empty($result['url_image'])){
					$image 				=	$result['url_image'];
					$result['image'] 	= 	base_url('assets/img') . '/'. $result['id_empresa'] .'/'.$image;
					$result['xs_image'] = 	base_url('assets/img') . '/'. $result['id_empresa'] .'/50/'.$image;
					$result['md_image'] = 	base_url('assets/img') . '/'. $result['id_empresa'] .'/150/'.$image;
				}else{
					$result['image'] 	= 	null;
					$result['xs_image'] = 	null;
					$result['md_image'] = 	null;
				}
			}
		}
		return $results;
	}
	
	 public function get_ip_info($id_empresa,$ipaddress){
		 
		$this->db->select('tp.ip');
		$this->db->from($this->tableip . " tp");
		$this->db->where('tp.id_empresa',$id_empresa);
		$query=$this->db->get();
		
		$totalipfound	=	$query->num_rows();
		
		if($totalipfound==0){
			return true;
		}else{
			$this->db->select('tp.ip');
			$this->db->from($this->tableip . " tp");
			$this->db->where('tp.id_empresa',$id_empresa);
			$this->db->where('tp.ip',$ipaddress);
			$query=$this->db->get();
			$result=$query->row_array();
			
			if(!empty($result)){
				return true;
			}
		}
		return false;
	}
	public function decline_feedback_by_id_feedback($id_feedback)
		{
			$data 		=	array('situacao'=>5);

			$this->db->trans_start();
			if(!empty($id_feedback)){
				$this->db->where('tf.id_feedback', $id_feedback);
				$this->db->update($this->tablefeedback . ' tf', $data);
			}
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			return $result;
		}

	public function get_carreer_by_id_usuario_for_others($id_usuario,$crossfeed_status = '', $crossfeed_time = '', $crossfeed_type = ''){

		$this->db->select("tu.access_crossfeeds");
		$this->db->from($this->tableUser . ' tu');
    	$this->db->where('tu.id_usuario', $this->session->userdata('id'));
    	$query_user_result = $this->db->get()->row();
    	if(!empty($query_user_result)){
    		if($query_user_result->access_crossfeeds == 1){
    			$this->db->select("tf.id_feedback,tf.resposta,tf.prazo,tf.situacao,tf.data_atualizacao as posted_date,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tu.email_usuario as email,tf.situacao as situation,vut.nome_unidade as team,(select nome_usuario from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user,(select url_image from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_image,(select id_empresa from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_id_empresa,tu.access_crossfeeds");
		    	$this->db->from($this->tablefeedback . ' tf');
		    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
		    	$this->db->join($this->viewUsuariosTime . ' vut', 'vut.id_usuario = tu.id_usuario', 'left');
		    	$this->db->where('tf.usuario_atualizador', $id_usuario);
		    	$this->db->where('tf.desenvolvimento', 1);
		    	$this->db->where('tf.publico', 1);
		    	$this->db->where('tf.private', 0);
		    	if($crossfeed_status != ''){
		    		if($crossfeed_status == 'finalizado'){
						$this->db->where('tf.situacao', 1);
					}
					if($crossfeed_status == 'expirado'){
						$todays_date 	= date('Y-m-d');
						$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") <=', $todays_date);
						$this->db->where('tf.situacao', 0);
					}
					if($crossfeed_status == 'aguardando'){
						$todays_date 	= date('Y-m-d');
						$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
						$this->db->where('tf.situacao', 0);
					}
					if($crossfeed_status == 'declined'){
						$todays_date 	= date('Y-m-d');
						$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
						$this->db->where('tf.situacao', 5);
					}
		    	}
		    	if($crossfeed_time != ''){
		    		if($crossfeed_time == 'last_month'){
						$start_date = date('Y-m-01',strtotime('last month'));
						$end_date 	= date('Y-m-t',strtotime('last month'));
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_date);
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_date);
					}
					if($crossfeed_time == 'last_week'){
						$previous_week = strtotime("-1 week +1 day");
						$start_week = strtotime("last sunday midnight",$previous_week);
						$end_week = strtotime("next saturday",$start_week);

						$start_week = date("Y-m-d",$start_week);
						$end_week = date("Y-m-d",$end_week);
						
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_week);
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_week);
					}
					if($crossfeed_time == 'current_quarter'){
						$quarter = $this->get_current_quarter_dates();
						
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $quarter[0]);
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $quarter[1]);
					}
		    	}

		    	$this->db->order_by('tf.id_feedback', 'DESC');
		    	$query = $this->db->get();
				$result	=	$query->result_array();
    		}else{
    			$result = [];
    		}
    	}else{
    		$result = [];
    	}
		
		if(!empty($result)){
			foreach($result as &$user){
				$limit_date 	= strtotime($user['prazo']);
				$current_date 	= strtotime(date('Y-m-d H:i:s'));
				$user['feedback_type'] 		= 	'sent';
				if($current_date > $limit_date){
					$user['expired'] 		= 	true;
				}else{
					$user['expired'] 		= 	false;
				}
				if(!empty($user['image'])){
					$image_name 			=	$user['image'];
					$from_user_image_name 			=	$user['from_user_image'];
					$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image_name;
					$user['from_user_image'] 		= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/'.$from_user_image_name;
					$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image_name;
					$user['from_user_xs_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/50/'.$from_user_image_name;
					$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image_name;
					$user['from_user_md_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/150/'.$from_user_image_name;
				}else{
					$user['from_user_image'] 		= 	null;
					$user['image'] 		= 	null;
					$user['from_user_xs_image'] 	= 	null;
					$user['xs_image'] 	= 	null;
					$user['from_user_md_image'] 	= 	null;
					$user['md_image'] 	= 	null;
				}
			}
		}
    	return $result;
    }
    public function get_received_carreer_by_id_usuario_for_others($id_usuario,$crossfeed_status = '', $crossfeed_time = '', $crossfeed_type = ''){

    	$this->db->select("tu.access_crossfeeds");
		$this->db->from($this->tableUser . ' tu');
    	$this->db->where('tu.id_usuario', $this->session->userdata('id'));
    	$query_user_result = $this->db->get()->row();
    	if(!empty($query_user_result)){
    		if($query_user_result->access_crossfeeds == 1){
    			$this->db->select("tf.id_feedback,tf.resposta,tf.prazo,tf.situacao,tf.data_atualizacao as posted_date,tu.nome_usuario,tu.url_image as image,tu.id_empresa as id_empresa,tu.email_usuario as email,tf.situacao as situation,vut.nome_unidade as team,(select nome_usuario from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user,(select url_image from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_image,(select id_empresa from ttl_usuario where id_usuario = tf.usuario_atualizador)as from_user_id_empresa");
		    	$this->db->from($this->tablefeedback . ' tf');
		    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tf.id_usuario_destino', 'left');
		    	$this->db->join($this->viewUsuariosTime . ' vut', 'vut.id_usuario = tu.id_usuario', 'left');
		    	$this->db->where('tf.id_usuario_destino', $id_usuario);
		    	$this->db->where('tf.desenvolvimento', 1);
		    	$this->db->where('tf.publico', 1);
		    	$this->db->where('tf.private', 0);
		    	
		    	if($crossfeed_status != ''){
		    		if($crossfeed_status == 'finalizado'){
						$this->db->where('tf.situacao', 1);
					}
					if($crossfeed_status == 'expirado'){
						$todays_date 	= date('Y-m-d');
						$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") <=', $todays_date);
						$this->db->where('tf.situacao', 0);
					}
					if($crossfeed_status == 'aguardando'){
						$todays_date 	= date('Y-m-d');
						$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
						$this->db->where('tf.situacao', 0);
					}
					if($crossfeed_status == 'declined'){
						$todays_date 	= date('Y-m-d');
						$this->db->where('DATE_FORMAT(tf.prazo, "%Y-%m-%d") >=', $todays_date);
						$this->db->where('tf.situacao', 5);
					}
		    	}
		    	if($crossfeed_time != ''){
		    		if($crossfeed_time == 'last_month'){
						$start_date = date('Y-m-01',strtotime('last month'));
						$end_date 	= date('Y-m-t',strtotime('last month'));
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_date);
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_date);
					}
					if($crossfeed_time == 'last_week'){
						$previous_week = strtotime("-1 week +1 day");
						$start_week = strtotime("last sunday midnight",$previous_week);
						$end_week = strtotime("next saturday",$start_week);

						$start_week = date("Y-m-d",$start_week);
						$end_week = date("Y-m-d",$end_week);
						
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $start_week);
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $end_week);
					}
					if($crossfeed_time == 'current_quarter'){
						$quarter = $this->get_current_quarter_dates();
						
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") >=', $quarter[0]);
						$this->db->where('DATE_FORMAT(tf.data_atualizacao, "%Y-%m-%d") <=', $quarter[1]);
					}
		    	}
		    	
		    	$this->db->order_by('tf.id_feedback', 'DESC');
		    	$query = $this->db->get();
				$result	=	$query->result_array();
    		}else{
    			$result = [];
    		}
    	}else{
    		$result = [];
    	}
		
		//echo $this->db->last_query();die;
		if(!empty($result)){
			foreach($result as &$user){
				$limit_date 	= strtotime($user['prazo']);
				$current_date 	= strtotime(date('Y-m-d H:i:s'));
				$user['feedback_type'] 		= 	'received';
				if($current_date > $limit_date){
					$user['expired'] 		= 	true;
				}else{
					$user['expired'] 		= 	false;
				}
				if(!empty($user['image'])){
					$image_name 			=	$user['image'];
					$from_user_image_name 			=	$user['from_user_image'];
					$user['image'] 		= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/'.$image_name;
					$user['from_user_image'] 		= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/'.$from_user_image_name;
					$user['xs_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/50/'.$image_name;
					$user['from_user_xs_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/50/'.$from_user_image_name;
					$user['md_image'] 	= 	base_url('assets/img') . '/'. $user['id_empresa'] .'/150/'.$image_name;
					$user['from_user_md_image'] 	= 	base_url('assets/img') . '/'. $user['from_user_id_empresa'] .'/150/'.$from_user_image_name;
				}else{
					$user['from_user_image'] 		= 	null;
					$user['image'] 		= 	null;
					$user['from_user_xs_image'] 	= 	null;
					$user['xs_image'] 	= 	null;
					$user['from_user_md_image'] 	= 	null;
					$user['md_image'] 	= 	null;
				}
			}
		}

    	return $result;
    }
    public function get_competencias_tipos($id_empresa){
		
		$this->db->select("tcp.*");
		    	$this->db->from($this->tableCompetenciasTipo . ' tcp');
		    	$this->db->where('tcp.id_empresa', $id_empresa);
		$this->db->order_by("id_tipo_competencia", "DESC");
				$query = $this->db->get();
				$result	=	$query->result_array();
		return $result;
	}
    public function update_tipo_compentencia($id,$new_tipo){
		if($new_tipo!=''){
			$this->db->set('nome_tipo', $new_tipo);
			$this->db->where('id_tipo_competencia', $id);
			$this->db->update($this->tableCompetenciasTipo );
			$this->db->select("tcp.*");
			$this->db->from($this->tableCompetenciasTipo . ' tcp');
			$this->db->order_by("id_tipo_competencia", "DESC");
			$query = $this->db->get();
			$result	=	$query->result_array();
			return $result;
		}else
			return 0;
		//*return true;
	}
    public function add_tipo_compentencia($new_tipo){
		if($new_tipo!=''){
			$this->db->set('nome_tipo',$new_tipo);
			$this->db->set('id_empresa',$this->session->userdata('id_empresa'));
			$this->db->set('usuario_atualizador',$this->session->userdata('id'));
			$this->db->insert($this->tableCompetenciasTipo);
			$this->db->select("tcp.*");
			$this->db->from($this->tableCompetenciasTipo . ' tcp');
			$this->db->order_by("id_tipo_competencia", "DESC");
			$query = $this->db->get();
			$result	=	$query->result_array();
			return $result;
		}else
			return 0;
		//*return true;
	}
	
	
	public function insert_by_fase_id($get_array,$insert_id){
		$i=0;
		$this->db->select('id_revisao_ciclo_fases');
		$this->db->from($this->tableRevisaoCicloFases);
		$this->db->where('id_revisao_ciclo',$insert_id);
		$query		= 	$this->db->get();
		$id_fases	=	$query->result_array();
		foreach($get_array['id_fase'] as $id_array){
			$id_score=$get_array['id_fase_score']["'$id_array'"];
			if($id_score!=''){
								$this->db->select('id_revisao_ciclo_fase_tipo_score');
								$this->db->where('id_revisao_ciclo_fases',$id_score);
								$this->db->from($this->tableRevisaoCicloFaseTiposcore);
								$query		= 	$this->db->get();
								$id_tipo_fase_score	=	$query->result_array();
							}
			foreach($id_fases as $key => $value){
				if($key==$i){
					$id_fase=$value['id_revisao_ciclo_fases'];
					$j=0;
					while($j<4){
						$peso_for_id='';
						$tipo_for_id=0;
						$counter='';
						$k=0;
						if(isset($get_array['table_tipo'][$j])){
							foreach($get_array['table_tipo'][$j] as $tipos=>$tipo_id){
								if($tipo_id==$id_array){
										$tipo_for_id=$j+1;
										$counter=$k;
										$peso_for_id=$get_array['checkpeso'][$j][$counter];
								}
								$k++;
							}
						}
						$this->db->set('usuario_atualizador',$this->session->userdata('id'));
						$this->db->set('id_revisao_ciclo_fases',$id_fase);
						$this->db->set('tipo_avaliacao',$tipo_for_id);
						if($peso_for_id !=''){
							$this->db->set('peso',$peso_for_id);
						}else if($peso_for_id=='' && $id_score !=''){
							$this->db->set('peso',1);
							}
							
						if(!empty($id_tipo_fase_score)&&isset($id_tipo_fase_score[$j])){
							$this->db->where('id_revisao_ciclo_fase_tipo_score', $id_tipo_fase_score[$j]['id_revisao_ciclo_fase_tipo_score']);
							$this->db->update($this->tableRevisaoCicloFaseTiposcore );
							}else{
							$this->db->insert($this->tableRevisaoCicloFaseTiposcore);
						}
						$j++;
					}
				}
			}
			$i++;
		}
		$this->db->where('tipo_avaliacao',0);
		$this->db->delete($this->tableRevisaoCicloFaseTiposcore);
		return ;
	}
	
	 public function get_tipo_fase_by_id($cycle_id){
		$this->db->select("trcf.*");
		$this->db->from($this->tableRevisaoCicloFases . ' trcf');
		$this->db->where('trcf.id_revisao_ciclo', $cycle_id);
		$query = $this->db->get();
		$result	=	$query->result_array();
		return $result;
	}
	 public function get_tipo_fase_score_by_id($fase_id){
		 $length=sizeof($fase_id);
		 $i=0;
		 while($i<$length){
			 $tipo=1;
			 while($tipo<5){
				$this->db->select("trcfs.*");
				$this->db->from($this->tableRevisaoCicloFaseTiposcore . ' trcfs');
				$this->db->where('trcfs.id_revisao_ciclo_fases', $fase_id[$i]);
				$this->db->where('trcfs.tipo_avaliacao', $tipo);
				$query = $this->db->get();
				$result[$i][$tipo]	=	$query->row();
				$tipo++;
			}
			$i++;
		}
		return $result;
	}
}
