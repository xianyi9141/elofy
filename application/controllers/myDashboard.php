<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
class mydashboard extends App_controller {

    private static $itensTeams = array();

    public function __construct()
    {
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        parent::__construct();
        // vai ser o modelo que tu vai acessar
        $this->load->model('mydashboardao');

    }

    
    public function getGraphData(){
        header('Content-type: application/json');
        $service                =   new mydashboardao();
        $id_empresa             =   $this->session->userdata('id_empresa');
        $id_ciclo           =   $this->input->post('id_ciclo');
        $id_time            =   $this->input->post('id_time');
        $parent_id          =   $this->input->post('parent_id');
        $year               =   $this->input->post('year');
        //  echo $year;die;
        $data               =   $service->get_graph_data_my_dashboard($id_ciclo,$id_time,$id_empresa,$parent_id,$year);
        
        echo json_encode($data);
        
    }
	public function filterChartAndObjectivos(){
        header('Content-type: application/json');
        $service            =   new mydashboardao();
        $id_empresa         =   $this->session->userdata('id_empresa');
        $id_ciclo           =   $this->input->post('id_ciclo');
        $id_time            =   $this->input->post('id_time');
        $column_name        =   $this->input->post('type');
        $value              =   $this->input->post('value');
        $parent_id           =   $this->input->post('parent_id');
        $data               =   $service->getSubGoals($id_empresa,$id_ciclo,$id_time,$column_name,$value, $parent_id);
        echo json_encode($data);
    }

    public function getAllCurrentCycles(){
		header('Content-type: application/json');
        $service            =   new mydashboardao();
        $id_empresa         =   $this->session->userdata('id_empresa');
        $year               =   $this->input->post('year');
		$data               =   $service->get_all_current_cycles($id_empresa,$year);
        echo json_encode($data);
	}
}
