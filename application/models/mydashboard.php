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

	public function get_graph_data_my_dashboard($id_ciclo,$id_time,$id_empresa,$parent_id = '')
    {
    	if($parent_id != ''){
    		$graph1_sql = $this->db->query("select situacao, count(*) as total,(case when situacao = '0' then 'Pendente' WHEN  situacao = '1' THEN 'Atingido' WHEN  situacao = '2' THEN 'Em Andamento' WHEN situacao = '3' THEN 'Encerrado' else 'NO' end) as situacaos from ttl_objetivos o
					left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					where o.parent_id ='".$parent_id."'
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and ativo=1 group by o.situacao");
    		//echo $this->PQUERY();

    		$graph2_sql = $this->db->query("select cor, count(*) as total,(case when cor = '1' then 'Em dia' WHEN  situacao = '2' THEN 'Atencao' WHEN  situacao = '3' THEN 'Atrasado' else 'NO' end) as cors from ttl_objetivos o left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					where o.parent_id ='".$parent_id."'
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and ativo=1 group by o.cor");

    		$graph3_sql = $this->db->query("select ut.nome_unidade,count(*) as total from ttl_objetivos o
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					where o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and o.parent_id='".$parent_id."'
					and o.ativo=1 group by ut.nome_unidade");

    		$graph4_sql = $this->db->query("select ci.nome_ciclo,count(*) as total from ttl_objetivos o
					inner join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					inner join ttl_ciclos ci on (oc.id_ciclo = ci.id_ciclo)
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and o.parent_id='".$parent_id."'
					and o.ativo=1 group by oc.id_ciclo");
    	}else{
    		$graph1_sql = $this->db->query("select situacao, count(*) as total,(case when situacao = '0' then 'Pendente' WHEN  situacao = '1' THEN 'Atingido' WHEN  situacao = '2' THEN 'Em Andamento' WHEN situacao = '3' THEN 'Encerrado' else 'NO' end) as situacaos from ttl_objetivos o
					left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					where o.parent_id is not null
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and ativo=1 group by o.situacao");

    		$graph2_sql = $this->db->query("select cor, count(*) as total,(case when cor = '1' then 'Em dia' WHEN  situacao = '2' THEN 'Atencao' WHEN  situacao = '3' THEN 'Atrasado' else 'NO' end) as cors from ttl_objetivos o left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					where o.parent_id is not null
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and ativo=1 group by o.cor");

    		$graph3_sql = $this->db->query("select ut.nome_unidade,count(*) as total from ttl_objetivos o
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					left join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					where o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and o.ativo=1 group by ut.nome_unidade");

    		$graph4_sql = $this->db->query("select ci.nome_ciclo,count(*) as total from ttl_objetivos o
					inner join ttl_objetivo_ciclo oc on  (oc.id_objetivo = o.id_objetivo)
					inner join ttl_ciclos ci on (oc.id_ciclo = ci.id_ciclo)
					inner join ttl_empresa_times ut on (ut.id_time = o.id_time)
					and o.id_empresa='".$id_empresa."'
					and oc.id_ciclo='".$id_ciclo."'
					and o.id_time='".$id_time."'
					and o.ativo=1 group by oc.id_ciclo");
    	}
    	

    	$graph1_data = $graph1_sql->result_array();
    	$graph2_data = $graph2_sql->result_array();
    	$graph3_data = $graph3_sql->result_array();
    	$graph4_data = $graph4_sql->result_array();

    	//$situcaoes = [0,1,2,3];
    	
    	// for($i = 0;$i <=3;$i++){

    	// 	if(isset($graph1_data[$i]['situacao'])){
    	// 		if(in_array($graph1_data[$i]['situacao'],$situcaoes)){
    	// 			echo 'list '.$graph1_data[$i]['situacao'];
	    // 			if($graph1_data[$i]['situacao'] == 0){
	    // 				$graph1_data[$i]['situacaos'] = 'Pendente';
	    // 			}else if($graph1_data[$i]['situacao'] ==1){
	    // 				$graph1_data[$i]['situacaos'] = 'Atingido';
	    // 			}else if($graph1_data[$i]['situacao'] == 2){
	    // 				$graph1_data[$i]['situacaos'] = 'Em Andamento';
	    // 			}else if($graph1_data[$i]['situacao'] == 3){
	    // 				$graph1_data[$i]['situacaos'] = 'Encerrado';
	    // 			}
    	// 			//$graph1_data[$i]['situacao'] = $i;
    	// 			$graph1_data[$i]['total'] = $graph1_data[$i]['total'];
	    // 		}else{
	    // 			$graph1_data[$i]['situacao'] = $i;
	    // 			$graph1_data[$i]['total'] = 0;
	    // 			if($i == 0){
	    // 				$graph1_data[$i]['situacaos'] = 'Pendente';
	    // 			}else if($i ==1){
	    // 				$graph1_data[$i]['situacaos'] = 'Atingido';
	    // 			}else if($i == 2){
	    // 				$graph1_data[$i]['situacaos'] = 'Em Andamento';
	    // 			}else if($i == 3){
	    // 				$graph1_data[$i]['situacaos'] = 'Encerrado';
	    // 			}

	    // 		}
    	// 	}else{
    	// 		echo 'list '.$graph1_data[$i]['situacao'];
    	// 		$graph1_data[$i]['situacao'] = $i;
	    // 		$graph1_data[$i]['total'] = 0;
	    // 		if($i == 0){
	    // 				$graph1_data[$i]['situacaos'] = 'Pendente';
	    // 			}else if($i ==1){
	    // 				$graph1_data[$i]['situacaos'] = 'Atingido';
	    // 			}else if($i == 2){
	    // 				$graph1_data[$i]['situacaos'] = 'Em Andamento';
	    // 			}else if($i == 3){
	    // 				$graph1_data[$i]['situacaos'] = 'Encerrado';
	    // 			}
    	// 	}
    		
    	// }
    	//echo '<pre>';

    	//print_r($graph1_data);die;
    	//echo $this->PQUERY();
    	//echo $this->PQUERY();die;
    	
		return array($graph1_data,$graph2_data,$graph3_data,$graph4_data);
    }

}
