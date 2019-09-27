<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class dashboarddao extends App_DAO {

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
		var $viewAvaliacoes = null;
		var $viewUsuariosTime = null;
		
		
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
	   	    $this->tableAlert = 'ttl_alertas_usuario';
	   	    
	   	    $this->viewAvaliacoes = 'v_avaliacoes';
	   	    $this->viewUsuariosTime = 'v_usuariosTime';
	   	    
	    }
	    
	    
	    public function get_all_objetivos_by_id_empresa_count($id_empresa)
	    {
	    	$this->db->select('id_objetivo as totalOkr');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where('parent_id is not null');
	    	$this->db->where($this->tableObjetivos.'.id_empresa',  $id_empresa);
	    	
	    	$query = $this->db->get();
	    	return  $query->num_rows();
	    	
	    }
	    
	    public function get_all_objetivos_atingidos_by_id_empresa_count($id_empresa)
	    {
	    	$this->db->select('id_objetivo as totalOkr');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where('parent_id is not null');
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableObjetivos.'.situacao = 1');
	    	
	    	$query = $this->db->get();
	    	return  $query->num_rows();
	    	
	    }
	    
	    public function get_all_objetivos_cancelados_by_id_empresa_count($id_empresa)
	    {
	    	$this->db->select('id_objetivo as totalOkr');
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where('parent_id is not null');
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableObjetivos.'.avaliacao = 2');
	    	
	    	$query = $this->db->get();
	    	return  $query->num_rows();
	    	
	    }
	    
	    public function get_user_evaulated_count($id_time,$id_janela,$id_ciclo)
	    {
			$this->db->select('*');
			$this->db->from($this->viewAvaliacoes);
			
			if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			if($id_time ==null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
	    	$query = $this->db->get();
	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }
	    
	    public function get_user_reviews_completed_count($id_time,$id_janela,$id_ciclo)
	    {
			$this->db->select('*');
			$this->db->from($this->viewAvaliacoes);
			$this->db->where($this->viewAvaliacoes.'.performance >', 0);
			$this->db->where($this->viewAvaliacoes.'.potencial >', 0);
			$this->db->where($this->viewAvaliacoes.'.geral >', 0);
			
			if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			if($id_time ==null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
	    	$query = $this->db->get();
	    	if($query->num_rows() > 0 ){
	    		return $query->num_rows();
	    	}else{
	    		return 0;
	    	}

	    }
	    
	    public function get_avarage_performance($id_time,$id_janela,$id_ciclo)
	    {
			
			$this->db->select('avg(performance) as avg');
			$this->db->from($this->viewAvaliacoes);
			
			if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			if($id_time ==null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			
	    	$query = $this->db->get();
	    	if($query->num_rows() > 0 ){
	    		return $query->row()->avg;
	    	}else{
	    		return 0;
	    	}

	    }
	    
	    
	     public function get_avarage_potencial($id_time,$id_janela,$id_ciclo)
	    {
			
			$this->db->select('avg(potencial) as avgpotencial');
			$this->db->from($this->viewAvaliacoes);
			
			if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			if($id_time ==null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
	    	$query = $this->db->get();
	    	if($query->num_rows() > 0 ){
	    		return $query->row()->avgpotencial;
	    	}else{
	    		return 0;
	    	}

	    }
	    
	     public function get_pdlevel_graph_data($id_time,$id_janela,$id_ciclo)
			{
				//plevellow
				$this->db->select('count(plevel) as plevel_low');
				$this->db->from($this->viewAvaliacoes);
				$this->db->where($this->viewAvaliacoes.'.plevel', 0);
				if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$plevel_low = $this->db->get();
				$plevel_low =  $plevel_low->row()->plevel_low;
				
				// dlevel low
				$this->db->select('count(dlevel) as dlevel_low');
				$this->db->from($this->viewAvaliacoes);
				$this->db->where($this->viewAvaliacoes.'.dlevel', 0);
				if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$dlevel_low = $this->db->get();
				$dlevel_low  =  $dlevel_low->row()->dlevel_low;
				
				
				// plevel meduim
				$this->db->select('count(plevel) as plevel_medium');
				$this->db->from($this->viewAvaliacoes);
				$this->db->where($this->viewAvaliacoes.'.plevel', 1);
				if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$plevel_medium = $this->db->get();
				$plevel_medium =  $plevel_medium->row()->plevel_medium;
				
				// dlevel medium
				$this->db->select('count(dlevel) as dlevel_medium');
				$this->db->from($this->viewAvaliacoes);
				$this->db->where($this->viewAvaliacoes.'.dlevel', 1);
				if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$dlevel_medium = $this->db->get();
				$dlevel_medium =  $dlevel_medium->row()->dlevel_medium;
				
				
				// plevel high //
				$this->db->select('count(plevel) as plevel_high');
				$this->db->from($this->viewAvaliacoes);
				$this->db->where($this->viewAvaliacoes.'.plevel', 2);
				if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$plevel_high = $this->db->get();
				$plevel_high =  $plevel_high->row()->plevel_high;
				
				
				// dlevel high //
				$this->db->select('count(dlevel) as dlevel_high');
				$this->db->from($this->viewAvaliacoes);
				$this->db->where($this->viewAvaliacoes.'.dlevel', 2);
						if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$dlevel_high = $this->db->get();
				$dlevel_high =  $dlevel_high->row()->dlevel_high;
				
				
				$data1 = 	  array(['x', '0', '1', '2'],
									['Performance', $plevel_low, $plevel_medium, $plevel_high],
									['Potential', $dlevel_low, $dlevel_medium, $dlevel_high]);
				
			return $data1;
			}
		
		public function get_geral_graph_data($id_time,$id_janela,$id_ciclo)
		{
				
				$this->db->select('count(geral) as geralcount, geral');
				$this->db->from($this->viewAvaliacoes);
				if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo == null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				}
				if($id_time !=null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				if($id_time ==null && $id_janela != null && $id_ciclo != null){
					$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
					$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
				}
				$this->db->order_by($this->viewAvaliacoes.'.geral','ASC');
				$this->db->group_by($this->viewAvaliacoes.'.geral');
				$query = $this->db->get();
				if($query->num_rows() > 0 ){
					$result =  $query->result_array();
					if(!empty($result)){
						$start_data = array('Insatisfactory','Needs Improvement','Meets Expectations','Exceeds Expectations','Far Exceeds Expectations');
						for($i = 0; $i<=4;$i++ ){
							$graph_data[]	=	$start_data[$i];
							$graph_data[]	=	isset($result[$i]['geralcount'])?$result[$i]['geralcount']:0;
							$data[]			=	$graph_data;
							$graph_data = array();
						}
					}
					return 	$data;
				}else{
					$start_data = array('Insatisfactory','Needs Improvement','Meets Expectations','Exceeds Expectations','Far Exceeds Expectations');
					for($i = 0; $i<=4;$i++ ){
						$graph_data[]	=	$start_data[$i];
						$graph_data[]	=	0;
						$data[]			=	$graph_data;
						$graph_data = array();
					}
					return $data;
				}
		}
			
		public function get_user_performance_review($id_time,$id_janela,$id_ciclo)
	    {
			$this->db->select('id_protocolo_avaliacao as id,descricao as year, nome_usuario as name, data_atualizacao as last_update, performance, potencial, id_usuario as userid');
			$this->db->from($this->viewAvaliacoes);
			
			if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			if($id_time ==null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			$this->db->order_by($this->viewAvaliacoes.'.data_atualizacao');
			$this->db->group_by($this->viewAvaliacoes.'.id_usuario');
			
	    	$query = $this->db->get();
	    	if($query->num_rows() > 0 ){
	    		return $query->result_array();
	    	}else{
	    		return 0;
	    	}

	    }
	    
	    public function get_user_review_data($user_id,$avalicao_id,$id_time,$id_janela,$id_ciclo)
	    {
			$this->db->select('id_protocolo_avaliacao as id,descricao as year, data_atualizacao as last_update, performance,  potencial');
			$this->db->from($this->viewAvaliacoes);
			$this->db->where($this->viewAvaliacoes.'.id_usuario', $user_id);
			
			if($id_time ==null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo == null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
			}
			if($id_time !=null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_time', $id_time);
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
			if($id_time ==null && $id_janela != null && $id_ciclo != null){
				$this->db->where($this->viewAvaliacoes.'.id_janela', $id_janela);
				$this->db->where($this->viewAvaliacoes.'.id_ciclo', $id_ciclo);
			}
	    	$query = $this->db->get();
	    	if($query->num_rows() > 0 ){
	    	$result = $query->row();
			
			return 	$result;
	    	}else{
	    		return 0;
	    	}

	    }
	    
	    public function get_user_info($user_id)
	    {
			$this->db->select("tu.id_usuario as id, tu.nome_usuario as name, tu.url_image as image, tu.email_usuario as email, vut.nome_cargo as position, tu.data_aniversario as since, tu.data_atualizacao as last_change, tu.id_empresa as id_empresa");
		    	$this->db->from($this->tableUser . ' tu');
		    	$this->db->join($this->viewUsuariosTime . ' vut', 'vut.id_usuario = tu.id_usuario', 'left');
		    	$this->db->where('tu.id_usuario = ' . $user_id);
		    	$query = $this->db->get();
				if($query->num_rows() > 0 ){
					$result = $query->row_array();
					return $result;
				}else{
					return 0;
				}
				
	    }
	    
	    
	    
	    public function get_all_okr_by_id_empresa_group_by_ciclos($id_empresa, $id_time = null, $id_janela = null , $id_ciclo = null)
	    {
			
	    	$this->db->select('count(*) as qnt, nome_ciclo as ciclo');
	    	$this->db->from($this->tableCycle);
	    	$this->db->join($this->tableObjCiclo, $this->tableCycle.'.id_ciclo = '.$this->tableObjCiclo.'.id_ciclo', 'inner');
	    	$this->db->join($this->tableObjetivos, $this->tableObjCiclo.'.id_objetivo = '.$this->tableObjetivos.'.id_objetivo', 'inner');
	    	$this->db->where($this->tableObjetivos.'.parent_id IS NOT NULL');
	    	$this->db->where($this->tableCycle.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
	    	
	    	if($id_janela){
	    		$this->db->where($this->tableObjetivos.'.id_janela', $id_janela);
	    	}
	    	
	    	if($id_time){
	    		$this->db->where($this->tableObjetivos.'.id_time', $id_time);
	    	}
	    	
	    	if($id_ciclo){
	    		$this->db->where($this->tableCycle.'.id_ciclo', $id_ciclo);
	    	}
	    	
	    	$this->db->group_by($this->tableCycle.'.id_ciclo, '.$this->tableCycle.'.nome_ciclo');
	    	
	    	$query = $this->db->get();
	    	
	    	//$this->PQUERY();
	    	
	    	return   $query->result_array();
	    	
	    }
	    
	    
	    
	    
	    // DONUT 
	    public function get_all_objetivos_situacao_by_id_empresa($id_empresa, $id_time = null, $id_janela = null, $id_ciclo = null)
	    {
	    	$id_time   = ( $id_time )  ? $id_time :  'NULL';
	    	$id_janela = ( $id_janela) ? $id_janela: 'NULL';
	    	$id_ciclo  = ( $id_ciclo)  ? $id_ciclo:  'NULL';
	    	
	    	$query = "SELECT v1.situacao, v1.descricao, f_obj_situacao(v1.situacao, ".$id_time.", ".$id_ciclo.", ".$id_janela.", ".$id_empresa.") perc
						  FROM
						( SELECT  0 as situacao, 'Pendente' as descricao 
						   UNION
						  SELECT  1, 'Finalizado' 
						   UNION
						  SELECT  2, 'Cancelado'
						   UNION
						  SELECT  3, 'Em Andamento'
						) v1 ";
	    	
	    	$result = $this->exec_query($query);
	    	
	    	//$this->PQUERY();
	    	return $result;
	    	
	    }
	    
	    public function get_okrs_atingidos_by_id_empresa_group_by_team($id_empresa, $id_time = null, $id_janela = null, $id_ciclo = null)
	    {
	    	
	    	$id_janela = ( $id_janela) ? $id_janela: 'NULL';
	    	$id_ciclo  = ( $id_ciclo)  ? $id_ciclo:  'NULL';
	    	
	    	$query = "SELECT  t1.id_time,  t1.nome_unidade as team, f_obj_situacao(1, t1.id_time, ".$id_ciclo.", ".$id_janela.", ".$id_empresa.") perc 
	    				FROM ".$this->tableTeams." t1 WHERE t1.ativo = 1 ";
	    	 
	    	if($id_time){
	    		$query .=  " AND t1.id_time = ". $id_time ;
	    	}
	    	
	    	$query .=  " AND t1.id_empresa = ". $id_empresa;
	    	
	    	$result = $this->exec_query($query);
	    	return $result;
	    	
	    }
	    
	    
	    public function get_okrs_by_id_empresa_group_by_team($id_empresa, $id_time = null, $id_janela = null, $id_ciclo = null)
	    {
	    	
	    	$id_janela = ( $id_janela) ? $id_janela: 'NULL';
	    	$id_ciclo  = ( $id_ciclo)  ? $id_ciclo:  'NULL';
	    	
	    	$query = "SELECT  t1.id_time, t1.nome_unidade as team, f_qtd_obj(t1.id_time, ".$id_ciclo.", ".$id_janela.", ".$id_empresa.") qtd
						FROM ".$this->tableTeams." t1 WHERE t1.ativo = 1 ";
	     
	    	if($id_time){
	    		$query .=  " AND t1.id_time = ". $id_time ;
	    	} 
	    	
	    	
	    	$query .=  " AND t1.id_empresa = ". $id_empresa;
	    	
	    	$result = $this->exec_query($query);
	    	
	    	//$this->PQUERY();
	    	
	    	return $result;
	    	
	    }
	    
	    
	    // OKR
	    public function get_all_pendent_okr_by_responsible($id_usuario)
	    {
	    	$this->db->select("id_resultado_chave as id, nomeRChave as name, descricao as description, progresso as progress, situacao as status");
	    	$this->db->from($this->tableResultadoChave);
	    	$this->db->where($this->tableResultadoChave.'.responsavel', $id_usuario);
	    	$this->db->where($this->tableResultadoChave.'.progresso < 100');
	    	$this->db->where($this->tableResultadoChave.'.ativo', 1);
	    	
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }
	    
	    public function get_all_pendent_okr_by_empresa($id_empresa)
	    {
	    	$this->db->select("id_resultado_chave as id, nomeRChave as name, ".$this->tableResultadoChave.".descricao as description, progresso as progress, ".$this->tableResultadoChave.".situacao as status");
	    	$this->db->from($this->tableResultadoChave);
	    	$this->db->join($this->tableObjetivos, $this->tableObjetivos.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');
	    	$this->db->where($this->tableResultadoChave.'.progresso < 100');
	    	$this->db->where($this->tableResultadoChave.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	    public function get_all_pendent_okr_by_team($id_time)
	    {
	    	$this->db->select("id_resultado_chave as id, nomeRChave as name, ".$this->tableResultadoChave.".descricao description, progresso as progress, ".$this->tableResultadoChave.".situacao as status");
	    	$this->db->from($this->tableResultadoChave);
	    	$this->db->join($this->tableObjetivos, $this->tableObjetivos.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');
	    	$this->db->where($this->tableResultadoChave.'.progresso < 100');
	    	$this->db->where($this->tableResultadoChave.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.id_time', $id_time);
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	    
	    public function get_count_all_okr_by_empresa($id_empresa)
	    {
	    	$this->db->select("count(*) as qnt, ".$this->tableObjetivos.".situacao as status");
	    	$this->db->from($this->tableObjetivos);
	    	$this->db->where($this->tableObjetivos.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.id_empresa', $id_empresa);
	    	$this->db->where($this->tableObjetivos.'.parent_id is not null');
	    	$this->db->group_by($this->tableObjetivos.'.situacao');
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	  
	    public function get_count_all_okr_by_team($id_time)
	    {
	    	$this->db->select("count(*) as qnt, ".$this->tableResultadoChave.".situacao as status");
	    	$this->db->from($this->tableResultadoChave);
	    	$this->db->join($this->tableObjetivos, $this->tableObjetivos.'.id_objetivo = '.$this->tableResultadoChave.'.id_objetivo', 'inner');
	    	$this->db->where($this->tableResultadoChave.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.ativo', 1);
	    	$this->db->where($this->tableObjetivos.'.id_time', $id_time);
	    	$this->db->group_by($this->tableResultadoChave.'.situacao');
	    	
	    	
	    	$query = $this->db->get();
	    	
	    	return $query->result_array();
	    }
	    
	    
	    
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
