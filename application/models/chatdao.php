<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class chatdao extends App_DAO {

		// tabelas que tu vai manipular
		var $tableUser = null;
		var $tableCycle = null;
		var $tableGoals = null;
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
		var $tableObjPesoTime = null;
		var $tableObjResponsaveis = null;
		var $tableObjCiclo = null;
		
		var $tableResultadoChave = null;
		var $tableChaveMedicao = null;
		var $tableChaveResponsaveis = null;
		var $tableRChaveAnexos = null;
		
		var $tableEventoUsuario = null;
		
		var $tableAlert = null;
		var $tableAvaliacoes = null;
		
		var $tableCanais = null;
		var $tableCanalUsuario = null;
		var $tableCanalMensagem = null;
		var $tableCanalMensagemCitacao = null;
		
		
		
	    public function __construct()
	    {
	        $this->load->database();
	        $this->tableUser = 'ttl_usuario';
	        $this->tableCycle = 'ttl_ciclos';
	        $this->tableGoals = 'ttl_objetivos';
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
	   	    
	   	    $this->tableAvaliacoes = 'ttl_avaliacao_usuario';
	   	    
	   	    $this->tableCanais = 'ttl_canais';
	   	    $this->tableCanalUsuario = 'ttl_canal_usuario';
	   	    $this->tableCanalMensagem = 'ttl_canal_mensagem';
	   	    $this->tableCanalMensagemCitacao = 'ttl_canal_mensagem_citacao';
	   	    
	    }
    	 
	    public function getCanaisByIdEmpresa($id_empresa, $completa = null)
	    {	
	    	$this->db->select(
	    			$this->tableCanais.'.id_canal as id, '.
	    			$this->tableCanais.'.nome as name, '.
	    			$this->tableCanais.'.tipo as type,'.
	    			"(case when ".$this->tableCanais.".ativo = '1' then 'true' else 'false' end) as status"
	    	);
	    	
	    	$this->db->from($this->tableCanais);
	    	
	    	if($completa){
	    		$this->db->select(
	    				$this->tableCanais.'.descricao as description, '.
	    				$this->tableCanais.'.imagem as img, '.
	    				$this->tableCanais.'.cor as color, '.
	    				$this->tableCanais.'.id_objetivo as objective, '.
	    				$this->tableUser.'.nome_usuario as responsible, '.
	    				$this->tableUser.'.id_usuario as responsible_id, '
	    		);
	    		$this->db->join($this->tableUser, $this->tableUser.'.id_usuario = '.$this->tableCanais.'.responsavel', 'inner');
	    	}
	    	
	    	
	    	$this->db->where($this->tableCanais.'.id_empresa', $id_empresa);
	    	$this->db->order_by($this->tableCanais.'.tipo');
	    	$query = $this->db->get();
	    	
	    	$tmpResult = $query->result_array();
	    	$result = array();
	    	
	    	//$this->debugMark('teste', $tmpResult);
	    	
	    	foreach($tmpResult as $item)
	    	{
	    		if($item['type'] === "1"){
	    			$result['independent'][] = $item;
	    		}else{
	    			$result['global'][] = $item;
	    			
	    		}
	    	}
	    	
	    	return $result;
	    }
	    
	    public function getCanalDetailsByIdCanal($id_canal, $completa = null)
	    {
	    	
	    	$this->db->select('count(*)');
	    	$this->db->from($this->tableCanalUsuario);
	    	$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
	    	$this->db->where($this->tableCanalUsuario.'.ativo', "1");
	    	$subQuery = $this->db->get_compiled_select();
	    	
	    	$this->db->select(
	    			$this->tableCanais.'.id_canal as id, '.
	    			$this->tableCanais.'.nome as name, '.
	    			$this->tableCanais.'.descricao as description, '.
	    			"(case when ".$this->tableCanais.".tipo = '1' then 'Independent' else 'Global' end) as type,".
	    			"(case when ".$this->tableCanais.".ativo = '1' then 'true' else 'false' end) as status"
	    	);
	    	
	    	$this->db->from($this->tableCanais);
	    	
	    	if($completa){
	    		$this->db->select(
	    				$this->tableCanais.'.imagem as img, '.
	    				$this->tableCanais.'.cor as color, '.
	    				$this->tableCanais.'.id_objetivo as objective, '.
	    				$this->tableUser.'.nome_usuario as responsible, '.
	    				$this->tableUser.'.id_usuario as responsible_id, '
	    				);
	    		$this->db->select('('.$subQuery.') as total_active');
	    		$this->db->join($this->tableUser, $this->tableUser.'.id_usuario = '.$this->tableCanais.'.responsavel', 'inner');
	    	}
	    	
	    	$this->db->where($this->tableCanais.'.id_canal', $id_canal);
	    	$this->db->order_by($this->tableCanais.'.tipo');
	    	$query = $this->db->get();
	    	//$this->PQUERY();
	    	$result= $query->result_array();
	    	
	    	return sizeof($result) > 0 ? $result[0] : array();
	    }
	    
	    public function addCanal($data)
	    {
	    	$this->db->trans_start();
	    	
	    	$id_empresa = $data['id_empresa'];
	    	$teams = $data['teams'];
	    	
	    	if(isset($data['responsaveis'])){
	    		$usuarios = $data['responsaveis'];
	    		unset($data['responsaveis']);
	    	}
	    	
	    	if(isset($data['usuarios'])){
	    		$usuarios = $data['usuarios'];
	    		unset($data['usuarios']);
	    	}
	    	
	    	if(isset($data['tags'])){
	    		unset($data['tags']);
	    	}
	    	
	    	if(isset($data['year'])){
	    		unset($data['year']);
	    	}
	    	
	    	if(isset($data['usuario'])){
	    		unset($data['usuario']);
	    	}
	    	
	    	unset($data['teams']);
	    	
	    	$this->db->insert($this->tableCanais, $data);
	    	$id_canal = $this->db->insert_id();
	    	$usersIndexToInsert[$data['responsavel']] = $data['responsavel'];
	    	$usersToInsert = array();
	    	//$this->debugMark('', $teams);
	    	if($teams){
	    		foreach($teams as $item1){
	    			$tmpUsers = $this->getTeamsUserByIdTeam($item1['id']);
	    			foreach($tmpUsers as $item2)
	    			{
	    				$usersIndexToInsert[$item2['id']] = $item2['id'];
	    			}
	    		}
	    	}
	    	
	    	if($usuarios){
	    		foreach($usuarios as $item3){
	    			$usersIndexToInsert[$item3] = $item3;
	    		}
	    	}
	    	
	    	foreach($usersIndexToInsert as $item4)
	    	{
	    		$usersToInsert[] = array(
	    				'id_canal' => $id_canal, 
	    				'id_usuario' => $item4, 
	    				'usuario_atualizador' => $data['usuario_atualizador'],
	    				'ativo' => 1
	    		);
	    	}
	    	//$this->debugMark('', $usersToInsert);
	    	$this->insert_in_branch($usersToInsert, $this->tableCanalUsuario);
	    		    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	
	    	if($result){
	    		return $id_canal;
	    	}else{
	    		return false;		
	    	}
	    	
	    }
	    
	    public function editCanal($data)
	    {
	    	$this->db->trans_start();
	    	
	    	$id_canal = $data['id_canal'];
	    	
	    	$this->db->where($this->tableCanais.'.id_canal',$id_canal);
	    	$this->db->update($this->tableCanais, $data);
	    	
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    	
	    }
	    
	    
	    // USUARIOS
	    public function getCanaisByIdUser($id_usuario)
	    {
	    	$this->db->select($this->tableCanais.'.id_canal as id, '.$this->tableCanais.'.nome as name, '.$this->tableCanais.'.tipo as type');
	    	$this->db->from($this->tableCanalUsuario);
	    	$this->db->join($this->tableCanais, $this->tableCanais.'.id_canal = '.$this->tableCanalUsuario.'.id_canal', 'inner');
	    	$this->db->where($this->tableCanalUsuario.'.id_usuario', $id_usuario);
	    	$this->db->order_by($this->tableCanais.'.tipo');
	    	$this->db->order_by($this->tableCanalUsuario.'.data_atualizacao', 'desc');
	    	$query = $this->db->get();
	    	
	    	//	$this->PQUERY();
	    	$result= $query->result_array();
	    	
	    	//$this->debugMark('teste', $result);
	    	
	    	/*
	    	foreach($tmpResult as $item)
	    	{
	    		if($item['type'] === "1"){
	    			$result['independent'][] = $item;
	    		}else{
	    			$result['global'][] = $item;
	    			
	    		}
	    	}
	    	*/
	    	
	    	return $result;
	    }
	    
	    
	    public function addUsuarioCanal($data)
	    {	
	    	$this->db->trans_start();
	    	
	    	if(!$this->getUserHasCanal($data['id_usuario'], $data['id_canal'])){
	    		$this->db->insert($this->tableCanalUsuario, $data);
	    	}
	    	
		    $result = $this->db->trans_status();
		    $this->db->trans_complete();
		    
		    return $result;
		    
	    }
	    
	    public function addUsuariosCanal($data)
	    {
	    	
	    	$this->db->trans_start();
	    	
	    	$id_canal = $data['id_canal'];
	    	$usuarios = $data['usuarios'];
	    	
	    	$usersToInsert = array();
	    	
	    	
	    	$this->db->trans_start();
	    	if($usuarios){
	    		foreach($usuarios as $item3){
	    			$usersIndexToInsert[$item2['id']] = $item2['id'];
	    		}
	    	}
	    	
	    	foreach($usersIndexToInsert as $item4)
	    	{
	    		$usersToInsert[] = array(
	    				'id_canal' => $id_canal,
	    				'id_usuario' => $item4,
	    				'usuario_atualizador' => $data['usuario_atualizador'],
	    				'ativo' => 1
	    		);
	    	}
	    	
	    	$this->insert_in_branch($usersToInsert, $this->tableCanalUsuario);
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	
	    }
	    
	    public function addUsuarioCanalById_objetivo($data)
	    {
	    	$this->db->trans_start();
	    	
	    	$this->db->select('id_canal');
	    	$this->db->from($this->tableCanais);
	    	$this->db->where($this->tableCanais.'.id_objetivo', $data['id_objetivo']);
	    	$query = $this->db->get();
	    	
	    	//$this->PQUERY();
	    	
	    	$qryResult = $query->result_array();
	    	
	    	//$this->debugMark('', $qryResult);
	    	
	    	if(sizeof($qryResult) > 0){
	    		$data['id_canal'] = $qryResult[0]['id_canal'];
	    		unset($data['id_objetivo']);
	    		unset($data['id_time']);
	    		if(!$this->getUserHasCanal($data['id_usuario'], $data['id_canal'])){
	    			$this->db->insert($this->tableCanalUsuario, $data);
	    		}
	    		
	    	}
	    	
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	
	    	return $result;
	    	
	    }
	    
	    public function editUsuarioCanal($data)
	    {
	    	//$this->debugMark('teste',$data);
	    	
	    	$this->db->trans_start();
	    	
	    	$this->db->where($this->tableCanalUsuario.'.id_canal',$data['id_canal']);
	    	$this->db->where($this->tableCanalUsuario.'.id_usuario',$data['id_usuario']);
	    	$this->db->update($this->tableCanalUsuario, $data);
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }
	    
	    // TODO: TERMINAR O METODO 25/09
	    public function removeUsuarioCanalById_objetivo($data)
	    {
	    	
	    	$this->db->trans_start();
	    	
	    	$this->db->select('id_canal');
	    	$this->db->from($this->tableCanais);
	    	$this->db->where($this->tableCanais.'.id_objetivo', $data['id_objetivo']);
	    	$query = $this->db->get();
	    	
	    	//$this->PQUERY();
	    	
	    	$qryResult = $query->result_array();
	    	
	    	$this->db->where($this->tableCanalUsuario.'.id_canal',$data['id_canal']);
	    	$this->db->where($this->tableCanalUsuario.'.id_usuario',$data['id_usuario']);
	    	$this->db->update($this->tableCanalUsuario, $data);
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	return $result;
	    }
	    
	    public function getUserRelatedToCanal($id_canal, $str = null)
	    {	
	    	
	    	$this->db->select(
	    			$this->tableUser.".id_usuario as id, ".
	    			$this->tableUser.".nome_usuario as name, ".
	    			$this->tableUser.".url_image as image, ".
	    			"(case when ".$this->tableCanalUsuario.".ativo = '1' then 'true' else 'false' end) as status"
	    	);
    		$this->db->from($this->tableUser);
    		$this->db->join($this->tableCanalUsuario, $this->tableCanalUsuario.'.id_usuario = '.$this->tableUser.'.id_usuario');
    		$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
    		$this->db->where($this->tableUser.'.ativo', 1);
    		
    		if($str){
    			$this->db->like($this->tableUser.'.nome_usuario', $str);
    		}
    			
    		$query = $this->db->get();
    			
    		$result= $query->result_array();
    			
    		return $result;
    	}
    	
    	public function getActiveUserRelatedToCanal($id_canal, $str = null)
    	{
    		
    		$this->db->select(
    				$this->tableUser.".id_usuario as id, ".
    				$this->tableUser.".nome_usuario as name, ".
    				$this->tableUser.".url_image as image, ".
    				"(case when ".$this->tableCanalUsuario.".ativo = '1' then 'true' else 'false' end) as status"
    				);
    		$this->db->from($this->tableUser);
    		$this->db->join($this->tableCanalUsuario, $this->tableCanalUsuario.'.id_usuario = '.$this->tableUser.'.id_usuario');
    		$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
    		$this->db->where($this->tableCanalUsuario.'.ativo', 1);
    		$this->db->where($this->tableUser.'.ativo', 1);
    		
    		if($str){
    			$this->db->like($this->tableUser.'.nome_usuario', $str);
    		}
    		
    		$query = $this->db->get();
    		
    		$result= $query->result_array();
    		
    		return $result;
    	}
    	
    	public function getUserRelatedToCanalAll($id_canal, $str = null)
    	{
    		
    		$this->db->select(
    				$this->tableUser.".id_usuario as id, ".
    				$this->tableUser.".nome_usuario as name, ".
    				$this->tableUser.".url_image as image, ".
    				"(case when ".$this->tableCanalUsuario.".ativo = '1' then 'true' else 'false' end) as status"
    				);
    		$this->db->from($this->tableUser);
    		$this->db->join($this->tableCanalUsuario, $this->tableCanalUsuario.'.id_usuario = '.$this->tableUser.'.id_usuario');
    		$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
    		
    		if($str){
    			$this->db->like($this->tableUser.'.nome_usuario', $str);
    		}
    		
    		$query = $this->db->get();
    		
    		$result= $query->result_array();
    		
    		return $result;
    	}
    	
    	
	    public function getUserAbleToRelateToCanal($id_canal, $id_empresa)
	    {
	    	$this->db->select($this->tableCanalUsuario.'.id_usuario as id');
	    	$this->db->from($this->tableCanalUsuario);
	    	$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
	    	$this->db->where($this->tableCanalUsuario.'.ativo', '1');
	    	
	    	$query = $this->db->get_compiled_select();
	    	
	    	$this->db->select($this->tableUser.'.id_usuario as id, '.$this->tableUser.'.nome_usuario as name');
	    	$this->db->from($this->tableUser);
	    	$this->db->where($this->tableUser.'.id_usuario NOT IN ('.$query.')');
	    	$this->db->where($this->tableUser.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableUser.'.ativo', "1");
	    	
	    	$query = $this->db->get();
	    	
	    	$result= $query->result_array();
	    	
	    	return $result;
	    }
	    
	    public function getUserHasCanal($id_usuario, $id_canal){
	    	
	    	$this->db->select($this->tableCanalUsuario.'.id_usuario as id');
	    	$this->db->from($this->tableCanalUsuario);
	    	$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
	    	$this->db->where($this->tableCanalUsuario.'.id_usuario', $id_usuario);
	    	$this->db->where($this->tableCanalUsuario.'.ativo', '1');
	    	
	    	
	    	$query = $this->db->get();
	    	$hasAccess = $query->num_rows();
	    	
	    	$result = ($hasAccess > 0 )? true : false;
	    	
	    	return $result;
	    	
	    }
	    
	    
	    // MENSAGENS
	    // TESTAR
	    public function getMensByIdCanal($id_canal,  $order = null, $order_type = 'Desc', $limit_start = null, $limit_end = null)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableCanalMensagem);
	    	$this->db->join($this->tableUser, $this->tableCanalMensagem.'.id_usuario = '.$this->tableUser.'.id_usuario');
	    	$this->db->join($this->tableUser);
	    	
	    	if($order){
	    		$this->db->order_by($order, $order_type);
	    	}else{
	    		$this->db->order_by($this->tableCanalMensagem.'.id', $order_type);
	    	}
	    	
	    	if($limit_start && $limit_end){
	    		$this->db->limit($limit_start, $limit_end);
	    	}
	    	
	    	if($limit_start != null){
	    		$this->db->limit($limit_start, $limit_end);
	    	}
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }    
	    
	    public function countMensByIdCanal($id_canal)
	    {
	    	$this->db->select($this->tableCanalMensagem.'.id_canal_mensagem');
	    	$this->db->from($this->tableCanalMensagem);
	    	$this->db->join($this->tableUser, $this->tableCanalMensagem.'.id_usuario = '.$this->tableUser.'.id_usuario');
	    	$this->db->join($this->tableUser);
	    	
	    	$query = $this->db->get();
	    	return $query->num_rows();
	    }    	
	    
	    // MENSAGENS
	    public function getMensByIdCanalUserAccess($id_canal, $id_usuario, $idReferenceOrder = null, $order_type = 'desc', $limit_start = null, $limit_end = null)
	    {
	    	
	    	$dateInativity = $this->checkUserAtividadeCanal($id_canal, $id_usuario);
	    	if( $dateInativity != 0){
	    		$this->db->where($this->tableCanalMensagem.'.data_envio < ', $dateInativity);
	    	}
	    	
	    	$this->db->select(
	    			$this->tableCanalMensagem.'.id_canal_mensagem as id ,'.
	    			$this->tableCanalMensagem.'.descricao as mens,'.
	    			$this->tableCanalMensagem.'.file as file,'.
	    			$this->tableCanalMensagem.'.mime as mime,'.
	    			$this->tableCanalMensagem.'.data_envio as date,'.
	    			$this->tableCanalMensagem.'.id_usuario as user_id,'.
	    			$this->tableUser.'.nome_usuario as user,'.
	    			$this->tableUser.'.url_image as image'
	    	);
	    	$this->db->from($this->tableCanalMensagem);
	    	$this->db->join($this->tableUser, $this->tableCanalMensagem.'.id_usuario = '.$this->tableUser.'.id_usuario');
	    	$this->db->where($this->tableCanalMensagem.'.id_canal', $id_canal);
	    	
	    	if($idReferenceOrder){
	    		if(strtolower($order_type) == 'desc'){
	    			$this->db->where($this->tableCanalMensagem.'.id_canal_mensagem >=  ', $idReferenceOrder);
	    		}else{
	    			$this->db->where($this->tableCanalMensagem.'.id_canal_mensagem < ', $idReferenceOrder);
	    		}
	    	}
	    	
	    	$this->db->order_by($this->tableCanalMensagem.'.id_canal_mensagem', $order_type);
	    	
	    	
	    	if($limit_start && $limit_end){
	    		$this->db->limit($limit_start, $limit_end);
	    	}
	    	
	    	if($limit_start != null){
	    		$this->db->limit($limit_start, $limit_end);
	    	}
	    	
	    	
	    	$subQuery = $this->db->get_compiled_select();
	    	
	    	$this->db->select('*');
	    	$this->db->from('('.$subQuery.') as s1');
	    	$this->db->order_by('id', 'ASC');
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	    public function getMensByIdCanalUserAccessNav($id_canal, $id_usuario, $idReferenceOrder, $order_type, $limit_start = null, $limit_end = null)
	    {
	    	
	    	$dateInativity = $this->checkUserAtividadeCanal($id_canal, $id_usuario);
	    	if( $dateInativity != 0){
	    		$this->db->where($this->tableCanalMensagem.'.data_envio < ', $dateInativity);
	    	}
	    	
	    	$this->db->select(
	    			$this->tableCanalMensagem.'.id_canal_mensagem as id ,'.
	    			$this->tableCanalMensagem.'.descricao as mens,'.
	    			$this->tableCanalMensagem.'.file as file,'.
	    			$this->tableCanalMensagem.'.mime as mime,'.
	    			$this->tableCanalMensagem.'.data_envio as date,'.
	    			$this->tableCanalMensagem.'.id_usuario as user_id,'.
	    			$this->tableUser.'.nome_usuario as user,'.
	    			$this->tableUser.'.url_image as image');
	    	$this->db->from($this->tableCanalMensagem);
	    	$this->db->join($this->tableUser, $this->tableCanalMensagem.'.id_usuario = '.$this->tableUser.'.id_usuario');
	    	$this->db->where($this->tableCanalMensagem.'.id_canal', $id_canal);
	    	
	    	if($idReferenceOrder){
	    		if(strtolower($order_type) == 'desc'){
	    			$this->db->where($this->tableCanalMensagem.'.id_canal_mensagem >  ', $idReferenceOrder);
	    			$order_type = 'asc';
	    		}else{
	    			$this->db->where($this->tableCanalMensagem.'.id_canal_mensagem < ', $idReferenceOrder);
	    			$order_type = 'desc';
	    		}
	    	}
	    	
	    	$this->db->order_by($this->tableCanalMensagem.'.id_canal_mensagem', $order_type);
	    	
	    	
	    	if($limit_start && $limit_end){
	    		$this->db->limit($limit_start, $limit_end);
	    	}
	    	
	    	if($limit_start != null){
	    		$this->db->limit($limit_start, $limit_end);
	    	}
	    	
	    	
	    	$subQuery = $this->db->get_compiled_select();
	    	
	    	$this->db->select('*');
	    	$this->db->from('('.$subQuery.') as s1');
	    	$this->db->order_by('id', 'ASC');
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	    //testar
	    public function addMens($data)
	    {
	    	$this->db->trans_start();
	    	
	    	$tagSearch = '@';
	    	
	    	$this->db->insert($this->tableCanalMensagem, $data);
	    	//$this->PQUERY();
	    	$return = $this->db->insert_id();
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	
	    	if($result){
	    		return $return;
	    	}else{
	    		return $result;
	    	}
	    }
	    
	    // testar
	    public function editMens($data)
	    {
	    	$this->db->trans_start();
	    	
	    	$tagSearch = '@';
	    	
	    	$this->db->select('*');
	    	$this->db->from($this->tableCanalMensagem);
	    	$this->db->where($this->tableCanalMensagem.'.id_canal_mensagem', $data['id_canal_mensagem']);
	    	$this->db->where($this->tableCanalMensagem.'.id_usuario', $data['id_usuario']);
	    	
	    	$query = $this->db->get();
	    	$userResp =  $query->num_rows();
	    	
	    	if($userResp == 1){
	    		$this->db->where($this->tableCanalMensagem.'.id_canal_mensagem', $data['id']);
	    		$this->db->update($this->tableCanalMensagem, $data);
	    	}
	    	
	    	$return = $data['id'];
	    	
	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	
	    	if($result){
	    		return $return;
	    	}else{
	    		return $result;
	    	}
	    }
	    
	    // TESTAR
	    public function countMensByIdCanalUserAccess($id_canal, $id_usuario)
	    {
	    	$this->db->select($this->tableCanalMensagem.'.id_canal_mensagem');
	    	$this->db->from($this->tableCanalMensagem);
	    	$this->db->join($this->tableUser, $this->tableCanalMensagem.'.id_usuario = '.$this->tableUser.'.id_usuario');
	    	$this->db->where($this->tableCanalMensagem.'.id_canal', $id_canal);
	    	$this->db->where($this->tableCanalMensagem.'.id_usuario', $id_usuario);
	    	
	    	$query = $this->db->get();
	    	return $query->num_rows();
	    } 
	    
	    //CITACOES
	    public function getCitacoesByidUsuario($id_usuario)
	    {
	    	$this->db->trans_start();
	    	
	    	$this->db->select(
	    			$this->tableCanalMensagemCitacao.'.id_canal_mensagem as id,'.
	    			$this->tableCanalMensagemCitacao.'.id_canal as id_canal,'.
	    			$this->tableCanais.'.nome as name,'.
	    			$this->tableCanalMensagemCitacao.'.usuario_atualizador as user_id,'.
	    			$this->tableCanalMensagemCitacao.'.data_citacao as date, '.
	    			$this->tableCanalMensagem.'.descricao as mens' 
	    	);
	    	
	    	$this->db->from($this->tableCanalMensagemCitacao);
	    	$this->db->join($this->tableCanalMensagem, $this->tableCanalMensagem.'.id_canal_mensagem = '.$this->tableCanalMensagemCitacao.'.id_canal_mensagem');
	    	$this->db->join($this->tableUser, $this->tableCanalMensagemCitacao.'.usuario_atualizador = '.$this->tableUser.'.id_usuario');
	    	$this->db->join($this->tableCanais, $this->tableCanais.'.id_canal = '.$this->tableCanalMensagemCitacao.'.id_canal');
	    	$this->db->where($this->tableCanalMensagemCitacao.'.id_usuario_referencia', $id_usuario);
	    	$this->db->order_by($this->tableCanalMensagemCitacao.'.data_citacao', 'desc');
	    	
	    	$query = $this->db->get();
	    	$return =  $query->result_array();
	    	
	    	$this->db->where($this->tableCanalMensagemCitacao.'.id_usuario_referencia', $id_usuario);
	    	$this->db->update($this->tableCanalMensagemCitacao, array('visualizado' => "1"));

	    	$result = $this->db->trans_status();
	    	$this->db->trans_complete();
	    	
	    	if($result){
	    		return $return;
	    	}else{
	    		return $result;
	    	}
	    }
	    /*
	    public function getCitacoesByidUsuario($id_usuario)
	    {
	    	$this->db->select(
	    			$this->tableCanalMensagemCitacao.'.id_canal_mensagem as id'
	    	);
	    	
	    	$this->db->from($this->tableCanalMensagemCitacao);
	    	
	    	$this->db->where($this->tableCanalMensagemCitacao.'.id_usuario_referencia', $id_usuario);
	    	$this->db->where($this->tableCanalMensagemCitacao.'.visualizado', "1");
	    	
	    	$query = $this->db->get();
	    	
	    	return  $query->num_rows();
	    }
	    */
	    
	    // Metodos Auxilares
	    private function getTeamsUserByIdTeam($id_team)
	    {
	    	$this->db->select($this->tableUserTeam.'.id_usuario as id');
	    	$this->db->from($this->tableUserTeam);
	    	$this->db->where($this->tableUserTeam.'.id_empresa_time', $id_team);
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	    public function checkUserAtividadeCanal($id_canal, $id_usuario)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->tableCanalUsuario);
	    	$this->db->where($this->tableCanalUsuario.'.id_canal', $id_canal);
	    	$this->db->where($this->tableCanalUsuario.'.id_usuario', $id_usuario);
	    	$query = $this->db->get();
	    	
	    	$tmp = $query->result_array();
	    	if(sizeof($tmp) > 0){
	    		if($tmp[0]['ativo'] === "1"){
	    			return 0;
	    		}else{
	    			return $tmp[0]['data_atualizacao'];
	    		}
	    	}else{
	    		return 1;
	    	}
	    	
	    	
	    	
	    }
	    
	    
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 