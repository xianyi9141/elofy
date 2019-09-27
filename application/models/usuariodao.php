<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
class usuariodao extends App_DAO {
const VIEW_FOLDER = 'admin/usuario';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'ttl_usuario';
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
	    * Fetch usuario data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_usuario($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			$this->db->group_by('id_usuario');
	
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
	    function count_usuario($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like('titulo', $search_string);
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
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update usuario
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_usuario($id, $data)
	    {
			$this->db->where('id_usuario', $id);
			$this->db->update($this->table, $data);
			$report = array();
			$report['error'] = $this->db->_error_number();
			$report['message'] = $this->db->_error_message();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}
    	
	    /**
	    * Delete usuario
	    * @param int $id - usuario id
	    * @return boolean
	    */
		function delete_usuario($id){
			$result = $this->db->query('DELETE FROM '.$this->table.' where id_usuario = '. $id );
    		return $result;
		}

		/**
		* @raptor -> added for notification device token
	    * Update usuario device token
	    * @param int $id - usuario id
	    * 		 String $token - device token
	    * @return boolean
	    */
		function updateDeviceToken($id, $token) {
			$result = $this->db->query('UPDATE '.$this->table.' SET device_token = "'.$token.'" where id_usuario = '. $id );
    		return $result;
		}


		/**
		* @raptor -> added for notification device token
	    * get device tokens from users
	    * @param int $id - usuario id array
	    * @return array
	    */
		function getDeviceToken($ids) {
			$this->db->select('device_token');
			$this->db->from($this->table);
			$this->db->where_in('id_usuario', $ids);
			$query = $this->db->get();
			
			return $query->result_array();
		}
}