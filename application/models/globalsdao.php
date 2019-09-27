<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class globalsdao extends App_DAO {

		// tabelas que tu vai manipular
		var $tableUser = null;
		var $tableCycle = null;
		var $tableTeams = null;
		var $tableCompany = null;
		var $tableWindow = null;
		var $tableTags = null;
		var $tableActivities = null;
		var $tableAtvResponsive = null;
		var $tableAtvTag = null;
		var $tableTagObj = null;
		var $tableUserTeam = null;
		var $tableFavoritos = null;
		var $tableEtiquetas = null;

		var $tableEtiquetaObj = null;
		var $tableEtiquetaRChave = null;
		var $tableObjetivos = null;
		var $viewObjetivos = null;
		var $tableObjPesoTime = null;
		var $tableObjResponsaveis = null;
		var $tableObjCiclo = null;

		var $tableResultadoChave = null;
		var $tableChaveMedicao = null;
		var $tableChaveResponsaveis = null;
		var $tableRChaveAnexos = null;

		var $tableEventoUsuario = null;

	    public function __construct()
	    {
	        $this->load->database();
	        $this->tableUser = 'ttl_usuario';
	        $this->tableCycle = 'ttl_ciclos';
			$this->tableCompany = 'ttl_empresa';
			$this->tableWindow = 'ttl_janela';
			$this->tableTags = 'ttl_etiquetas';
			$this->tableActivities = 'ttl_atividades';
	        $this->tableAtvResponsive = 'ttl_atv_reponsaveis';
	        $this->tableAtvTag = 'ttl_etiqueta_atv';
	        $this->tableTeams = 'ttl_empresa_times';

	        $this->tableTagObj = 'ttl_etiqueta_obj';
	        $this->tableUserTeam = 'ttl_time_usuario';
	        $this->tableFavoritos = 'ttl_usuario_favoritos';

	        $this->tableEtiquetaObj = 'ttl_etiqueta_obj';
	        $this->tableEtiquetaRChave = 'ttl_etiqueta_rchave';

	        $this->tableObjetivos=  'ttl_objetivos';
			$this->viewObjetivos=  'v_objetivos';

			$this->tableObjPesoTime =  'ttl_obj_peso_time';
	        $this->tableObjResponsaveis = 'ttl_obj_responsaveis';
	        $this->tableObjCiclo = 'ttl_objetivo_ciclo';

	   	    $this->tableEtiquetas = 'ttl_etiquetas';

	   	    $this->tableResultadoChave = 'ttl_resultados_chave';
	   	    $this->tableChaveMedicao = 'ttl_rchave_medicoes';
	   	    $this->tableChaveResponsaveis = 'ttl_rchave_responsaveis';
	   	    $this->tableRChaveAnexos = 'ttl_rchave_anexos';

	   	    $this->tableEventoUsuario = 'ttl_eventos_usuario';

	    }


	    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
	    public function get_global_goals($id)
	    {
	    	$this->db->select('id_objetivo as id, nome as title, percentual as percentage, qtd_atividades as objectives, cor as color, responsavel');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableObjetivos.'.id_empresa', 'inner');
	    	$this->db->where($this->tableUser.'.id_usuario', $id);
	    	$this->db->where($this->tableObjetivos.'.parent_id is null');
	    	$query = $this->db->get();

	    	return $query->result_array();

	    }



	    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
	    public function get_global_goals_year($id, $year)
	    {
	    	$this->db->select($this->tableObjetivos .'.id_objetivo as id, nome as title, percentual as percentage, qtd_atividades as objectives, cor as color, responsavel');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->join($this->tableUser, $this->tableUser.'.id_empresa = '.$this->tableObjetivos.'.id_empresa', 'inner');
	    	$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableObjetivos.'.id_janela', 'inner');
	    	$this->db->where($this->tableUser.'.id_usuario', $id);
	    	$this->db->where('year(' . $this->tableWindow.'.data_final)', $year);
	    	$this->db->where($this->tableObjetivos.'.parent_id is null');

	    	$query = $this->db->get();

	    	$resultado = $query->result_array();

	    	return $resultado;

	    }

	    // get globals details by id Grobal (objetivos) ADS
	    public function get_global_goals_by_id_global($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->join($this->tableCompany, $this->tableCompany.'.id_empresa = '.$this->tableObjetivos.'.id_empresa', 'inner');
	    	$this->db->join($this->tableWindow, $this->tableWindow.'.id_janela = '.$this->tableObjetivos.'.id_janela', 'inner');
	    	$this->db->where($this->tableObjetivos.'.id_objetivo', $id);

	    	$query = $this->db->get();

	    	return $query->result_array();

	    }


	    //M�todo respons�vel por trazer os objetivos globais pela empresa do usu�rio logado.
	    public function get_global_goals_by_id($id)
	    {
	    	$this->db->select('id_objetivo as id, nome as title, responsavel as user, percentual as percentage');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where('id_objetivo', $id);
	    	$query = $this->db->get();

	    	$return = $query->result_array();


	    	$return[0]['user'] = $this->get_data_resp($return[0]['user']);

	    	return $return;
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

	    	if($tags){
		    	foreach($tags as $item2){

		    		$tagObjData = array(
		    				'id_objetivo' => $id_objetivo,
		    				'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
		    				'usuario_atualizador' => $data['usuario_atualizador']

		    		);
		    		$this->db->insert($this->tableEtiquetaObj, $tagObjData);
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
	    	return $result;

	    }


	    public function add_objetivos_taticos($data)
	    {

	    	$this->db->trans_start();

	    	$id_empresa = $data['id_empresa'];
	    	$tags = $data['tags'];
	    	$responsaveis = $data['responsaveis'];
	    	$usuario = $data['usuario'];
	    	$ciclos = $data['ciclos'];

	    	if($data['parent_id'] != 0 && $data['parent_id'] != null ){
	    		$id_janeta = $this->get_id_janela_by_parent_id($data['parent_id']);
	    	}else{
	    		$id_janeta = $this->get_id_janela_by_id_ciclo($data['ciclos'][0]);
	    	};

	    	unset($data['tags']);
	    	unset($data['responsaveis']);
	    	unset($data['usuario']);
	    	unset($data['ciclos']);

	    	$data['id_janela'] = $id_janeta;

	    	$this->db->insert($this->tableObjetivos, $data);
	    	$id_objetivo = $this->db->insert_id();

	    	if($tags){
	    		foreach($tags as $item2){

	    			$tagObjData = array(
	    					'id_objetivo' => $id_objetivo,
	    					'id_etiqueta' => $this->checkTagsCadastradas($item2, $id_empresa),
	    					'usuario_atualizador' => $data['usuario_atualizador']

	    			);
	    			$this->db->insert($this->tableEtiquetaObj, $tagObjData);
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

	    	$objPesoTime = array(
	    			'id_objetivo' => $id_objetivo,
	    			'id_time' => $data['id_time'],
	    			'peso' => $data['peso'],
	    			'usuario' => $data['usuario_atualizador']

	    	);

	    	$this->db->insert($this->tableObjPesoTime, $objPesoTime);


	    	//$this->debugMark('ciclos', $ciclos);
	    	if($ciclos){
	    		$this->editar_ciclos_objetivo_by_id_objetivo($id_objetivo, $ciclos);
	    	}

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;

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


		public function get_details_goals_by_id($id, $user)
	    {
	    	$this->db->select('id_objetivo as id, nome as title, tw.descricao as description, percentual as percentage, qtd_atividades as objectives, year(te.data_final) as \'year\', cor as color, responsavel');
	    	$this->db->from($this->tableObjetivos . ' tw');
	    	$this->db->join($this->tableWindow . ' te', 'te.id_janela = tw.id_janela', 'inner');
	    	$this->db->where('tw.id_objetivo', $id);
	    	$this->db->where('tw.parent_id is null');
	    	$this->db->where('tw.ativo', 1 );

	    	$query = $this->db->get();

	    	$retorno = array();
	    	$globals = $query->result_array();

	    	if($globals != null){

	    		foreach ($globals as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			array_pop($value);
	    			$value['user'] = $user[0];
	    			array_push($retorno, $value);
	    		}
	    	}

	    	// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    	$this->db->select('tu.id_usuario as id, tu.nome_usuario as name, url_image as image');
	    	$this->db->from($this->tableObjResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_objetivo', $id);
	    	$query2 = $this->db->get();

	    	$retorno[0]['users'] = $query2->result_array();

	    	//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    	$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    	$this->db->from($this->tableTagObj . ' toe');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query3 = $this->db->get();

	    	$retorno[0]['tags'] = $query3->result_array();

	    	// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    	$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value, too.percentual as percentage');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    	$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query4 = $this->db->get();
	    	$retorno[0]['teams'] = $query4->result_array();

	    	// GET OBJETIVOS TATICOS BY ID OBJETIVO SEE "get_objetivos_tatico_by_id_objetivo"
	    	$this->db->select($this->tableObjetivos .'.id_objetivo as id, nome as title, percentual as percentage, situacao as status, peso as weight, qtd_rchaves as \'keys\', responsavel, id_janela, id_time');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.parent_id', $id);
	    	$this->db->where('ativo', 1 );
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();
	    	$retornoTatico = array();
	    	if($tatic != null){

	    		foreach ($tatic as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			$cycle = $this->get_data_cycle_by_id($value['id_janela']);
	    			$team = $this->get_team_by_obj($value['id_time']);

	    			array_pop($value);
	    			array_pop($value);

	    			$value['user'] = $user[0];
	    			$value['cycles'] = $cycle[0];

	    			if(sizeof($team) > 0){
	    				$value['team'] = $team[0];
	    			}

	    			array_push($retornoTatico, $value);
	    		}
	    	}

	    	$retorno[0]['tatics'] = $retornoTatico;

	    	// GET TEAMWITHTATICS see "get_teamwithtatics_by_id_objetivo"
	    	$this->db->select('id_time');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.parent_id', $id);
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();

	    	$teamWithTatics = array();

	    	if($tatic != null){

	    		foreach ($tatic as $value) {

	    			$team = $this->get_team_by_obj($value['id_time']);
	    			array_pop($value);
	    			if(sizeof($team) > 0){
	    				$value = $team[0];
	    				array_push($teamWithTatics, $value);
	    			}


	    		}
	    	}

	    	$retorno[0]['teamsWithTatics'] = $teamWithTatics;

	    	return $retorno;
	    }

	    public function get_details_goals_tatics_by_id($id, $user)
	    {
	    	$this->db->select('id_objetivo as id, nome as title, tw.descricao as description, qtd_rchaves as \'keys\', peso as weight, situacao as status, percentual as percentage,  te.data_inicial as init, te.data_final as end,  year(te.data_final) as \'year\',  responsavel, id_time, te.id_janela');
	    	$this->db->from($this->tableObjetivos . ' tw');
	    	$this->db->join($this->tableWindow . ' te', 'te.id_janela = tw.id_janela', 'inner');
	    	$this->db->where('tw.id_objetivo', $id);
	    	$this->db->where('tw.parent_id is not null');

	    	$query = $this->db->get();

	    	$retorno = array();
	    	$globals = $query->result_array();


	    	if($globals != null){

	    		foreach ($globals as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);

	    			array_pop($value);
	    			array_pop($value);

	    			$value['user'] = $user[0];

	    			array_push($retorno, $value);
	    		}
	    	}

	    	$cycle = $this->get_cycles_by_id_objetivo_related($id);
	    	$retorno[0]['cycles'] = $cycle;

	    	// GET USERS/COORESPONSAVEIS BY ID OBJETIVO SEE "get_corresponsaveis_objetivo"
	    	$this->db->select('tu.id_usuario as id, tu.nome_usuario as name, url_image as image');
	    	$this->db->from($this->tableObjResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_objetivo', $id);
	    	$query2 = $this->db->get();

	    	$retorno[0]['users'] = $query2->result_array();

	    	//GET ETIQUETAS/TAGS BY ID OBJETIVO SEE "get_etiquetas_objetivo"
	    	$this->db->select('toe.id_etiqueta as id, tt.nome_etiqueta as name');
	    	$this->db->from($this->tableTagObj . ' toe');
	    	$this->db->join($this->tableTags . ' tt', 'tt.id_etiqueta = toe.id_etiqueta', 'inner');
	    	$this->db->where('toe.id_objetivo', $id);
	    	$query3 = $this->db->get();

	    	$retorno[0]['tags'] = $query3->result_array();


	    	// GET TEAM BY ID OBJECTIVE SEE "get_team_by_obj()"
	    	$this->db->select('toe.id_time as id, tt.nome_unidade as name, toe.peso as value');
	    	$this->db->from($this->tableObjPesoTime . ' toe');
	    	$this->db->join($this->tableTeams . ' tt', 'tt.id_time = toe.id_time', 'inner');
	    	$this->db->join($this->tableObjetivos . ' too', 'too.id_objetivo = toe.id_objetivo', 'inner');
	    	$this->db->where('too.id_time', $globals[0]['id_time']);
	    	$query4 = $this->db->get();

	    	//$this->PQUERY();

	    	$team = $query4->result_array();
	    	$retorno[0]['team'] =  $team[0];

	    	// GET RCHAVE BY ID OBJETIVO TATICO "get_rchave_by_objetivo_tatico"
	    	$this->db->select('trc.id_resultado_chave as id, trc.nomeRChave as title, trc.meta_final_prevista as goal, trc.unidade_meta as measurement,  progresso as percentage, peso as weight, responsavel');
	    	$this->db->from($this->tableResultadoChave . ' trc');
	    	$this->db->where('trc.id_objetivo', $id);
	    	$query5 = $this->db->get();

	    	$keys = $query5->result_array();
	    	$keysReturn = array();

	    	if($keys != null){

	    		foreach ($keys as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);

	    			array_pop($value);

	    			$value['user'] = $user[0];

	    			array_push($keysReturn, $value);
	    		}
	    	}
	    	$retorno[0]['keys'] = $keysReturn;


	    	return $retorno;
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

	    // METODO GENERICO QUE EDITA DADOS DE OBJETIVOS
	    public function edit_objetivo($id, $data){

	    	$this->db->trans_start();

	    	$this->db->update($this->tableObjetivos, $data, 'id_objetivo = '.$id);

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
	    	$this->db->select('tu.id_usuario as id, tu.nome_usuario as name, url_image as image');
	    	$this->db->from($this->tableObjResponsaveis . ' tr');
	    	$this->db->join($this->tableUser . ' tu', 'tu.id_usuario = tr.id_usuario', 'inner');
	    	$this->db->where('tr.id_objetivo', $id);
	    	$query = $this->db->get();

	    	return $query->result_array();
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

	    	$this->insert_query_in( $data, $this->tableTagObj);

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
	    public function get_objetivos_tatico_by_id_objetivo($id_objetivo)
	    {
	    	$this->db->select($this->viewObjetivos .'.id_objetivo as id, parent_id,  nome as title, percentual as percentage, situacao as status, peso as weight, qtd_rchaves as \'keys\', responsavel, id_janela, id_time');
	    	$this->db->from($this->viewObjetivos);
	    	$this->db->where($this->viewObjetivos.'.parent_id', $id_objetivo);
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();
	    	$retornoTatico = array();
	    	if($tatic != null){

	    		foreach ($tatic as $value) {

	    			$user = $this->get_data_resp($value['responsavel']);
	    			$cycle = $this->get_data_cycle_by_id($value['id_janela']);
	    			$team = $this->get_team_by_obj($value['id_time']);

	    			array_pop($value);
	    			array_pop($value);

	    			$value['user'] = $user[0];
	    			$value['cycles'] = $cycle[0];

	    			if(sizeof($team) > 0){
	    				$value['team'] = $team[0];
	    			}

	    			array_push($retornoTatico, $value);
	    		}
	    	}

	    	return  $retornoTatico;
	    }

	    // GET TEAMWITHTATICS BY ID OBJETIVO
	    public function get_teamwithtatics_by_id_objetivo($id_objetivo)
	    {
	    	$this->db->select('id_time');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.parent_id', $id_objetivo);
	    	$query5 = $this->db->get();

	    	$tatic = $query5->result_array();

	    	$teamWithTatics = array();

	    	if($tatic != null){

	    		foreach ($tatic as $value) {

	    			$team = $this->get_team_by_obj($value['id_time']);
	    			array_pop($value);
	    			if(sizeof($team) > 0){
	    				$value = $team[0];
	    				array_push($teamWithTatics, $value);
	    			}


	    		}
	    	}

	    	return $teamWithTatics;
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




	    public function get_tatics_goals_by_id_empresa_count($id)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.parent_id is not null');
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id);

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
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.percentual >= 100 ');
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id);

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
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.avaliacao', 1);
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id);

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
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.avaliacao', 2);
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id);

	    	$query = $this->db->get();

	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }



 }




















