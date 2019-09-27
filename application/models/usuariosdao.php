<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class usuariosdao extends App_DAO {

	const VIEW_FOLDER = 'admin/usuarios';
	
		var $perfilTable = null;
		var $usuarioPerfilTable = null;
		
		var $modulosTable = null;
		var $modulosPerfilTable = null;
		var $usuarioModulosTable = null;
		
		var $submodulosTable = null;
		var $modulosSubmodulosTable = null;
		
		var $tableEmpresa = null;
		var $tableEmpresaTime = null;
		
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        //$this->table = 'usuarios';
	        $this->table = 'ttl_usuario';
	        $this->usuarioPerfilTable = 'usuario_perfil';
	        
	        $this->modulosTable = 'modulos'; 
	        $this->modulosPerfilTable = 'modulos_perfil';
	        $this->usuarioModulosTable = 'usuarios_modulos';
	        
	        $this->submodulosTable = 'submodulos';
	        $this->modulosSubmodulosTable = 'modulos_submodulos';
	        
	        $this->tableEmpresa = 'ttl_empresa';
	        $this->tableEmpresaTime = 'ttl_empresa_times';
	        
	    }
    	
    	/**
	    * Get usuario by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_usuario_by_id($id)
	    {
	    	$result = $this->db->get_where($this->table, array( 'id_usuario' => $id));
    		return $result->result_array();		 
	    } 
    	
	    /**
	    * Fetch usuarios data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_usuarios($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
	    	
	    	$this->db->select('*');
			
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('nome', $search_string);
			}
			
	
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by('id_usuario', $order_type);
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
    	
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_usuarios($search_string=null, $order=null)
	    {
			$this->db->select('*');		
			$this->db->from($this->table);
			
			if($search_string){
				$this->db->like('nome', $search_string);
			}
			if($order){
				$this->db->order_by($order, 'Asc');
			}else{
			    $this->db->order_by('id_usuario', 'Asc');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_usuario($data)
	    {
	    	if(isset($data['team']) && $data['team'] != null){
	    		$team_id = $data['team'];
	    		unset($data['team']);
	    	}
	    	$this->db->trans_start();
			$this->db->insert('ttl_usuario' , $data);
	    	$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
	    	
	    	if(isset($team_id) && $team_id != ''){
	    		$this->db->trans_start();
		    	$team_data = array('id_empresa_time'=>$team_id,'id_usuario'=>$insert_id);
				$this->db->insert('ttl_time_usuario', $team_data);
				$this->db->trans_complete();
			}
			return $insert_id;	    	
		}
    	
    	/**
	    * Update usuario
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_usuario($id, $data)
	    {
	    	if(isset($data['team']) && $data['team'] != null){
	    		$team_id = $data['team'];
	    		unset($data['team']);
	    	}
			$this->db->trans_start();
			$this->db->where('id_usuario', $id);
			$this->db->update($this->table, $data);
			$result = $this->db->trans_status();
			$this->db->trans_complete();

			if(isset($team_id)){
				$this->db->select('count(id_unidade_usuario) as total');
				$this->db->from('ttl_time_usuario');
				$this->db->where('id_usuario',$id);
				$q = $this->db->get();
				$result_data = $q->row_array();
				if($result_data['total'] > 0){
					$team_data = array('id_empresa_time'=>$team_id);
					$this->db->trans_start();
					$this->db->where('id_usuario', $id);
					$this->db->update('ttl_time_usuario', $team_data);
					$this->db->trans_complete();
				}else{
					$team_data = array('id_empresa_time'=>$team_id,'id_usuario'=>$id);
					$this->db->trans_start();
					$this->db->insert('ttl_time_usuario', $team_data);
					$this->db->trans_complete();
				}
			}
			
			return $result;
		}

		function check_email_exist($id, $email)
	    {

			if(isset($id)){
				$this->db->select('count(id_usuario) as total');
				$this->db->from('ttl_usuario');
				$this->db->where('email_usuario',$email);
				$this->db->where('id_usuario != ',$id);
				$q = $this->db->get();
				$result_data = $q->row_array();

				return $result_data['total'];
			}
			
			
		}

		function check_login_exist($id, $login)
	    {

			if(isset($id)){
				$this->db->select('count(id_usuario) as total');
				$this->db->from('ttl_usuario');
				$this->db->where('login',$login);
				$this->db->where('id_usuario != ',$id);
				$q = $this->db->get();
				$result_data = $q->row_array();

				return $result_data['total'];
			}
			
			
		}
    	
	    /**
	    * Delete usuario
	    * @param int $id - usuario id
	    * @return boolean
	    */
		function delete_usuario($id){
			// ver documentaÃ§Ã£o
    		$result = $this->db->query('DELETE FROM '.$this->table.' where id_usuario = '. $id );
    		return $result; 
		}    
		
		
		function get_usuario_perfil_by_id_usuario_alias_modulo($id, $submodulo){
			
			$query = 'select 
						  "modulos"."id", 
						  "usuario_perfil"."id" as id_usuario_perfil,
						  "usuario_perfil"."titulo" as perfil,
						  "modulos_perfil"."acesso", 
						  "modulos"."titulo" as modulo_principal, 
						  "submodulos"."titulo" as modulo, 
						  "submodulos"."alias" 
					    from usuarios_modulos
						inner join modulos ON "modulos"."id" = "usuarios_modulos"."id_modulos"
						INNER JOIN "modulos_submodulos" ON "modulos_submodulos"."id_modulos" = "modulos"."id"
						INNER JOIN "submodulos" ON "modulos_submodulos"."id_submodulos" = "submodulos"."id"
						INNER JOIN "usuario_perfil" ON "usuario_perfil"."id"  = "usuarios_modulos"."id_usuario_perfil" 
						INNER JOIN "modulos_perfil" ON "submodulos"."id"  = "modulos_perfil"."id_submodulo" 
						
					   where 
						usuarios_modulos.id_usuarios = '.$id.' AND
						submodulos.alias = \''.$submodulo.'\' AND 
						modulos_perfil.id_usuario_perfil = ( select usuario_perfil.id
									    from usuarios_modulos
										inner join modulos ON "modulos"."id" = "usuarios_modulos"."id_modulos"
										INNER JOIN "modulos_submodulos" ON "modulos_submodulos"."id_modulos" = "modulos"."id"
										INNER JOIN "submodulos" ON "modulos_submodulos"."id_submodulos" = "submodulos"."id"
										INNER JOIN "usuario_perfil" ON "usuario_perfil"."id"  = "usuarios_modulos"."id_usuario_perfil" 
									   where 
										usuarios_modulos.id_usuarios = '.$id.' AND
										submodulos.alias = \''.$submodulo.'\' );';
												
			
			$result = $this->exec_query($query) ;
			//$this->PQUERY();
			return $result;
			
		}
		
		public function getUsuarioByLoginEmail($login = null, $mail = null){
			$this->db->select('*');
				
			$this->db->from($this->table);
			
			if($login){
				$this->db->where('login',$login );
			}else if($mail){
				$this->db->where('email_usuario', $mail);
			}else{
				return array();
			}
			
			$this->db->limit(1);
			
			$query = $this->db->get();
				
			return $query->result_array();
		}
		
		public function getUsuarioByKey($key ){
				
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('hash_cadastro',$key );
			$this->db->limit(1);
		
			$query = $this->db->get();
		
			return $query->result_array();
		}
		
		/**
		 *Primeiro cadastro do Usuário
		 */
		function firstStore($data)
		{
			//$this->debugMark('teste');
			$this->db->trans_start();
			$dataEmpresa['nome_empresa'] = $data['nome_empresa'];
			$dataEmpresa['data_cadastro'] = $data['data_cadastro'];
			$dataEmpresa['nome_usuario'] = $data['nome_usuario'];
			$dataEmpresa['email_usuario'] = $data['email_usuario'];
			$dataEmpresa['ativo'] = 1;
			
			// empresa
			
			$this->db->insert($this->tableEmpresa, $dataEmpresa);
			$idEmpresa = $this->db->insert_id();
			// usuario
			unset($data['nome_empresa']);
			unset($data['data_cadastro']);
			$data['admin'] = 1;
			$data['avaliador'] = 1;
			$data['id_empresa'] = $idEmpresa;
			
			$this->db->insert($this->table, $data);
			$idUsuario = $this->db->insert_id();
			
			/* TIME NÃO MAIS OBRIGATORIO
			$dataEmpresaTime['id_empresa'] = $idEmpresa;
			$dataEmpresaTime['nome_unidade'] = $dataEmpresa['nome_empresa'];
			$dataEmpresaTime['usuario_atualizador'] = $idUsuario;
			
			$this->db->insert($this->tableEmpresaTime, $dataEmpresaTime);
			$idTime= $this->db->insert_id();
			
			$data['id_time'] = $idTime;
			*/
			$this->db->where('id_usuario', $idUsuario);
			$this->db->update($this->table, $data);
			
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			
			return $result;
		}

		function update_user_status_by_key($key,$data)
		{
			$this->db->trans_start();

			$this->db->where('hash_cadastro', $key);
			$this->db->update($this->table, $data);
			
			$result = $this->db->trans_status();
			$this->db->trans_complete();
			
			return $result;
		}
		
		function existeEmail($email){
			
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('email_usuario',$email);
			$this->db->limit(1);
			
			$query = $this->db->get();
			return $query->num_rows(); 
		}
		
		public function get_user_logged_in($id)
		{
			$this->db->select("id_usuario as id, id_empresa, nome_usuario as name, url_image as image, favorites");
			$query = $this->db->get_where($this->table, array('id_usuario' => $id));
			return $query->result_array();
			
		}	
 }