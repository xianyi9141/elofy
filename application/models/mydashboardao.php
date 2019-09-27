<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class mydashboardao extends App_DAO {

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
		var $tableObjetivoComentario = null ;
		var $tableObjetivoComentarioReaction = null ;
		var $tableObjetivoCurtir = null ;

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

	   	    $this->viewUsuariosTime = 'v_usuariostime';
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
	   	    $this->tableObjetivoComentario = 'ttl_objetivo_comentario';
	   	    $this->tableObjetivoComentarioReaction = 'ttl_objetivo_comentario_reactions';
	   	    $this->tableObjetivoCurtir = 'ttl_objetivo_curtir';

	}
		
	public function get_graph_data_my_dashboard($id_ciclo='',$id_time,$id_empresa,$parent_id = '',$year = '')
    {
    	$this->load->model('servicedao');
    	$service = new servicedao();

    	$genela_query = $this->db->query("SELECT * FROM ttl_janela WHERE descricao = $year AND id_empresa = $id_empresa")->row_array();
		if(!empty($genela_query)){
			$id_janela = $genela_query['id_janela'];

			$ciclos = $this->db->query("SELECT GROUP_CONCAT(id_ciclo) as id_janelas FROM v_ciclos WHERE id_janela = $id_janela")->row_array();
			//print_r($ciclos);die;

			//$ciclos = $this->db->query("SELECT GROUP_CONCAT(id_ciclo) as id_janelas FROM ttl_ciclos WHERE id_janela = $id_janela")->row_array();
			$clies = $ciclos['id_janelas'];
		}

    	$where_time = "";
		if($id_time != ''){
			$where_time .= " and o.id_time=".$id_time;
		}

		$where_ciclo = "";
		$left_ciclo = "";
		if($id_ciclo != ''){
			$left_ciclo   .= "left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)";
			$where_ciclo .= " and oc.id_ciclo=".$id_ciclo;
		}else{
			$left_ciclo   .= "left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)";
			$where_ciclo .= " and oc.id_ciclo IN (".$clies.")";
		}
		/*else{
			$left_ciclo   .= "left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)";
			$where_ciclo .= " and oc.id_ciclo  IN ($ciclos)";
		}*/

    	if($parent_id != ''){
    		
    		$graph1_sql = $this->db->query("select situacao, count(*) as total,(case when situacao = '0' then 'Pendente' WHEN  situacao = '1' THEN 'Atingido' WHEN  situacao = '2' THEN 'Em Andamento' WHEN situacao = '3' THEN 'Encerrado' else 'NO' end) as situacaos from ttl_objetivos o
					".$left_ciclo."
					where o.parent_id ='".$parent_id."'
					and o.id_empresa='".$id_empresa."'
					".$where_time."
					".$where_ciclo."
					and ativo=1 group by o.situacao");		
    		//$this->PQUERY($graph1_sql);

    		$graph2_sql = $this->db->query("select cor, count(*) as total,(case when cor = '1' then 'Acima de 80%' WHEN  cor = '2' THEN 'Entre 50% e 80%' WHEN  cor = '3' THEN 'Até 50%' else 'Nunca Atualizado' end) as cors from ttl_objetivos o
					".$left_ciclo."
					where o.parent_id ='".$parent_id."'
					and o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and ativo=1 group by o.cor");

    		$graph3_sql = $this->db->query("select ut.id_time,ut.nome_unidade,count(*) as total from ttl_objetivos o
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					".$left_ciclo."
					where o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and o.parent_id='".$parent_id."'
					and o.ativo=1 group by ut.nome_unidade");

    				/*$graph4_sql = $this->db->query("select ci.nome_ciclo,count(*) as total from ttl_objetivos o
					inner join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					inner join ttl_ciclos ci on (oc.id_ciclo = ci.id_ciclo)
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					".$where_time."
					and o.parent_id='".$parent_id."'
					and o.ativo=1 group by oc.id_ciclo");*/
					$this->db->select('count(*) as total, nome_ciclo,'.$this->tableCycle.'.id_ciclo');
			    	$this->db->from($this->tableCycle);
			    	$this->db->join($this->tableObjCiclo, $this->tableCycle.'.id_ciclo = '.$this->tableObjCiclo.'.id_ciclo', 'inner');
					$this->db->join($this->tableObjetivos, $this->tableObjCiclo.'.id_objetivo = '.$this->tableObjetivos.'.id_objetivo', 'inner');
					$this->db->where($this->tableObjetivos.'.parent_id',$parent_id);
			    	$this->db->where($this->tableCycle.'.ativo', 1);
			    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
			    	$this->db->where($this->tableObjetivos.'.ativo', 1);
			    	if(isset($id_janela)){
			    		$this->db->where($this->tableObjetivos.'.id_janela', $id_janela);
			    	}
			    	
			    	if($id_time){
			    		$this->db->where($this->tableObjetivos.'.id_time', $id_time);
			    	}
			    	
			    	if($id_ciclo){
			    		$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
			    	}else{
			    		if($clies != ''){
			    			$this->db->where_in($this->tableCycle.'.id_ciclo', $clies);
			    		}
			    	}
			    	
			    	$this->db->group_by($this->tableCycle.'.nome_ciclo');
			    	
			    	$graph4_sql = $this->db->get();

					$query5 = $this->db->query("select o.id_objetivo as id, o.nome as title, o.percentual as percentage, o.situacao as status,o.comentario_status, o.cor as color, o.peso as weight, o.qtd_rchaves, o.responsavel, o.id_janela, o.id_time, o.usuario_atualizador as auth
					 from ttl_objetivos o
					inner join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					inner join ttl_ciclos ci on (oc.id_ciclo = ci.id_ciclo)
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and o.parent_id='".$parent_id."'
					and o.ativo=1 group by o.id_objetivo");
					$tatic = $query5->result_array();
			    	$retornoTatico = array();
			    	if($tatic != null){
			    		foreach ($tatic as $value) {
			    			$user 	= $service->get_data_resp($value['responsavel']);
			    			$cycle 	= $service->get_cycles_by_id_objetivo_related($value['id']);
			    			$team 	= $service->get_team_by_obj($value['id_time']);

			    			array_pop($value);
			    			array_pop($value);

			    			$value['user'] = isset($user[0])?$user[0]:[];
			    			$value['cycles'] = $cycle;

			    			if(sizeof($team) > 0){
			    				$value['team'] = $team[0];
			    			}
			    			$value['total_key'] = $service->count_all_key_results_by_id($value['id']);

			    			array_push($retornoTatico, $value);
			    		}
			    	}
    	}else{
    		$graph1_sql = $this->db->query("select situacao, count(*) as total,(case when situacao = '0' then 'Pendente(s)' WHEN  situacao = '1' THEN 'Atingido(s)' WHEN  situacao = '2' THEN 'Em Andamento' WHEN situacao = '3' THEN 'Encerrado' else 'NO' end) as situacaos from ttl_objetivos o
					".$left_ciclo."
					where o.parent_id is not null
					and o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and ativo=1 group by o.situacao");
    		//$this->PQUERY($graph1_sql);

    		$graph2_sql = $this->db->query("select cor, count(*) as total,(case when cor = '1' then ' - Acima de 80%' WHEN  cor = '2' THEN ' - Entre 50% e 80%' WHEN  cor = '3' THEN ' - Até 50%' else ' - Nunca Atualizado' end) as cors from ttl_objetivos o 
					".$left_ciclo."
					where o.parent_id is not null
					and o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and ativo=1 group by o.cor");
					
    		$graph3_sql = $this->db->query("select ut.id_time,ut.nome_unidade,count(*) as total from ttl_objetivos o
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					".$left_ciclo."
					where o.parent_id is not null AND o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and o.ativo=1 group by ut.nome_unidade");

		    		$this->db->select('count(*) as total,'.$this->tableCycle.'.id_ciclo,nome_ciclo');
			    	$this->db->from($this->tableCycle);
			    	$this->db->join($this->tableObjCiclo, $this->tableCycle.'.id_ciclo = '.$this->tableObjCiclo.'.id_ciclo', 'inner');
			    	$this->db->join($this->tableObjetivos, $this->tableObjCiclo.'.id_objetivo = '.$this->tableObjetivos.'.id_objetivo', 'inner');
			    	$this->db->where($this->tableObjetivos.'.parent_id IS NOT NULL');
			    	$this->db->where($this->tableCycle.'.ativo', 1);
			    	$this->db->where($this->tableObjetivos.'.ativo', 1);
			    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
			    	
			    	if(isset($id_janela)){
			    		$this->db->where($this->tableObjetivos.'.id_janela', $id_janela);
			    	}
			    	
			    	if($id_time){
			    		$this->db->where($this->tableObjetivos.'.id_time', $id_time);
			    	}
			    	
			    	if($id_ciclo){
			    		$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
			    	}else{
			    		if($clies != ''){
			    			$this->db->where_in($this->tableCycle.'.id_ciclo', $clies);
			    		}
			    	}
			    	
			    	$this->db->group_by($this->tableCycle.'.nome_ciclo');
			    	
			    	$graph4_sql = $this->db->get();
			    	
			    	//$this->PQUERY();
			    	
			    	//$graph4_sql =   $querys->result_array();

    				/*$graph4_sql = $this->db->query("select ci.nome_ciclo,count(*) as total from ttl_objetivos o
					inner join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					inner join ttl_ciclos ci on (oc.id_ciclo = ci.id_ciclo)
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					".$where_time."
					and o.ativo=1 group by oc.id_ciclo");*/

    			$query5 = $this->db->query("select o.id_objetivo as id, o.nome as title, o.percentual as percentage, o.situacao as status,o.comentario_status, o.cor as color, o.peso as weight, o.qtd_rchaves, o.responsavel, o.id_janela, o.id_time, o.usuario_atualizador as auth
					 from ttl_objetivos o
					".$left_ciclo."
					
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					and o.ativo=1 AND o.parent_id is not null");
					
					
					$tatic = $query5->result_array();
			    	$retornoTatico = array();
			    	if($tatic != null){
			    		foreach ($tatic as $value) {
			    			$user 	= $service->get_data_resp($value['responsavel']);
			    			$cycle 	= $service->get_cycles_by_id_objetivo_related($value['id']);
			    			$team 	= $service->get_team_by_obj($value['id_time']);

			    			array_pop($value);
			    			array_pop($value);

			    			$value['user'] = isset($user[0])?$user[0]:[];
			    			$value['cycles'] = $cycle;

			    			if(sizeof($team) > 0){
			    				$value['team'] = $team[0];
			    			}
			    			$value['total_key'] = $service->count_all_key_results_by_id($value['id']);

			    			array_push($retornoTatico,$value);
			    		}
			    	}


    	}
    	
    	//echo $graph1_sql;die;
    	$graph1_data = $graph1_sql->result_array();
    	$graph2_data = $graph2_sql->result_array();
    	$graph3_data = $graph3_sql->result_array();
    	$graph4_data = $graph4_sql->result_array();
		return array($graph1_data,$graph2_data,$graph3_data,$graph4_data,$retornoTatico);
    }
	
	public function getSubGoals($id_empresa,$id_ciclo="",$id_time="",$column_name="",$columnValue="", $parent_id=null){
		$this->load->model('servicedao');
    	$service 		= 	new servicedao();
		$where_ciclo 	= 	"";
		$where_type 	= 	"";
		$where_time 	= 	"";
		if($id_time != ''){
			$where_time .= " and o.id_time=".$id_time;
		}
		if($id_ciclo != ''){
			$where_ciclo .= " and oc.id_ciclo=".$id_ciclo;
		}
		if($column_name != '' && $columnValue != ""){
			$where_type .= " AND o.".$column_name."=".$columnValue;
		}
		$where_parent_id = '';
		if($parent_id!=null){
			$where_parent_id .= " and o.parent_id='".$parent_id."'";
		}
		$query5 = $this->db->query("select o.id_objetivo as id, o.nome as title, o.percentual as percentage, o.situacao as status,o.comentario_status, o.cor as color, o.peso as weight, o.qtd_rchaves, o.responsavel, o.id_janela, o.id_time, o.usuario_atualizador as auth
					 from ttl_objetivos o
					inner join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					inner join ttl_ciclos ci on (oc.id_ciclo = ci.id_ciclo)
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					".$where_ciclo."
					".$where_time."
					".$where_type."
					".$where_parent_id."
					and o.ativo=1 AND o.parent_id is not null group by o.id_objetivo");			
			
					$tatic = $query5->result_array();
			    	$retornoTatico = array();
			    	if($tatic != null){
			    		foreach($tatic as $value) {
			    			$user 	= 	$service->get_data_resp($value['responsavel']);
			    			$cycle 	= 	$service->get_cycles_by_id_objetivo_related($value['id']);
			    			$team 	= 	$service->get_team_by_obj($value['id_time']);
			    			array_pop($value);
			    			array_pop($value);
			    			$value['user'] = isset($user[0])?$user[0]:[];
			    			$value['cycles'] = $cycle;

			    			if(sizeof($team) > 0){
			    				$value['team'] = $team[0];
			    			}
			    			$value['total_key'] = $service->count_all_key_results_by_id($value['id']);
			    			array_push($retornoTatico,$value);
			    		}
			    	}
		return $retornoTatico;			
	}

	public function get_all_current_cycles($id_empresa,$year){
		$this->load->model('servicedao');
    	$service 		= 	new servicedao();
    	$result = array();

    	$genela_query = $this->db->query("SELECT * FROM ttl_janela WHERE descricao = $year AND id_empresa = $id_empresa")->row_array();
		if(!empty($genela_query)){
			$id_janela = $genela_query['id_janela'];

			$result = $this->db->query("SELECT * FROM v_ciclos WHERE id_janela = $id_janela")->result_array();
		}
		return $result;			
	}
}
