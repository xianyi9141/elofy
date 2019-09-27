<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
class dashboardService extends App_controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboarddao');
       
    }
   
    public function index()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->model('dashboarddao');
    	$dash = new dashboarddao();
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	
    	if ($this->input->server ( 'REQUEST_METHOD' ) === 'POST') {
    		
    		$this->form_validation->set_rules ( 'team', 'Time', '' );
    		$this->form_validation->set_rules ( 'year', 'Window', '' );
    		$this->form_validation->set_rules ( 'cycle', 'Ciclo', '' );
    		
    		if ($this->form_validation->run ()) {

    			$ano = $this->input->post('year');
    			
    			if($ano){
    				$id_janela = $service->get_id_janela_by_ano_base($ano,$id_empresa);
    			}else{
    				$id_janela = $this->input->post('year');
    			}
    			//$this->debugMark('null', $this->input->post());
    			$id_time  = $this->input->post('team');
    			$id_ciclo = $this->input->post('cycle');
    			
    			$resultDonut = $dash->get_all_objetivos_situacao_by_id_empresa($id_empresa, $id_time, $id_janela, $id_ciclo);
    			$result1 = $dash->get_okrs_by_id_empresa_group_by_team($id_empresa, $id_time, $id_janela, $id_ciclo);
    			$result2 = $dash->get_okrs_atingidos_by_id_empresa_group_by_team($id_empresa, $id_time, $id_janela, $id_ciclo);
    			$resLineChart = $dash->get_all_okr_by_id_empresa_group_by_ciclos($id_empresa, $id_time, $id_janela, $id_ciclo);
    			
				$user_evaulated 	= $dash->get_user_evaulated_count($id_time,$id_janela,$id_ciclo);
				$reviews_completed 	= $dash->get_user_reviews_completed_count($id_time,$id_janela,$id_ciclo);
				$performance_review 	= $dash->get_user_performance_review($id_time,$id_janela,$id_ciclo);
				$avgPerformance = $dash->get_avarage_performance($id_time,$id_janela,$id_ciclo);
				$avgPotencial = $dash->get_avarage_potencial($id_time,$id_janela,$id_ciclo);
				$pdLevelGraphData = $dash->get_pdlevel_graph_data($id_time,$id_janela,$id_ciclo);
				$geralGraphData = $dash->get_geral_graph_data($id_time,$id_janela,$id_ciclo);
    			
    			
    		}else{
    			$resultDonut = $dash->get_all_objetivos_situacao_by_id_empresa($id_empresa, null, null, null);
    			$result1 = $dash->get_okrs_by_id_empresa_group_by_team($id_empresa, null, null, null);
    			$result2 = $dash->get_okrs_atingidos_by_id_empresa_group_by_team($id_empresa, null, null, null);
    			$resLineChart = $dash->get_all_okr_by_id_empresa_group_by_ciclos($id_empresa, null, null, null);
    			$user_evaulated = $dash->get_user_evaulated_count(null,null,null);
    			$reviews_completed 	= $dash->get_user_reviews_completed_count(null,null,null);
    			$performance_review 	= $dash->get_user_performance_review(null,null,null);
    			$avgPerformance = $dash->get_avarage_performance(null,null,null);
    			$avgPotencial = $dash->get_avarage_potencial(null,null,null);
    			$pdLevelGraphData = $dash->get_pdlevel_graph_data(null,null,null);
    			$geralGraphData = $dash->get_geral_graph_data(null,null,null);
    		}
    		
    	}else{
    		$resultDonut = $dash->get_all_objetivos_situacao_by_id_empresa($id_empresa, null, null, null);
    		$result1 = $dash->get_okrs_by_id_empresa_group_by_team($id_empresa, null, null, null);
    		$result2 = $dash->get_okrs_atingidos_by_id_empresa_group_by_team($id_empresa, null, null, null);
    		$resLineChart = $dash->get_all_okr_by_id_empresa_group_by_ciclos($id_empresa, null, null, null);
    		$user_evaulated = $dash->get_user_evaulated_count(null,null,null);
    		$reviews_completed 	= $dash->get_user_reviews_completed_count(null,null,null);
    		$performance_review 	= $dash->get_user_performance_review(null,null,null);
    		$avgPerformance = $dash->get_avarage_performance(null,null,null);
    		$avgPotencial = $dash->get_avarage_potencial(null,null,null);
    		$pdLevelGraphData = $dash->get_pdlevel_graph_data(null,null,null);
    		$geralGraphData = $dash->get_geral_graph_data(null,null,null);
    	}    		
    	
    	$resTotalOkr = $dash->get_all_objetivos_by_id_empresa_count($id_empresa);
    	$resTotalOkrAtingidos = $dash->get_all_objetivos_atingidos_by_id_empresa_count($id_empresa);
    	$resTotalOkrCancelados = $dash->get_all_objetivos_cancelados_by_id_empresa_count($id_empresa);
    	
    	
    	$out['userEvaulated'] = $user_evaulated;
    	$out['userReviewsCompleted'] = $reviews_completed;
    	$out['avaragePerformance'] = $avgPerformance;
    	$out['avaragePotencial'] = $avgPotencial;
    	$out['PDLevelGraph'] = $pdLevelGraphData;
    	$out['geralGraph'] = $geralGraphData;
    	$out['userperformanceReview'] = $performance_review;
    	//print_r($out['geralGraph']);die;
    	
    	$out['totalOkr'] = $resTotalOkr;
    	$out['totalOkrAtingidos'] = $resTotalOkrAtingidos;
    	$out['totalOkrCancelados'] = $resTotalOkrCancelados;
    	
    	$parsedDonut = array();
    	foreach($resultDonut as $item)
    	{
    		$parsedDonut[] = array($item['descricao'], ROUND($item['perc'] * 100, 2));
    	}
    	
    	$parsedBarChartName[] = 'Times';
    	$parsedBarChartQnt[] = 'Quantidade';
    	foreach($result1 as $item)
    	{
    		$parsedBarChartName[] = $item['team'];
    		$parsedBarChartQnt[] = $item['qtd'];
    	}
    	
    	$parsedBarChartVertName[] = 'Times';
    	$parsedBarChartVertPerc[] = 'Porcentagem';
    	foreach($result2 as $item)
    	{
    		$parsedBarChartVertName[] = $item['team'];
    		$parsedBarChartVertPerc[] = ROUND($item['perc'], 2);
    	}
    	
    	$parsedBarChartLineName[] = 'Ciclo';
    	$parsedBarChartLineQnt[] = 'Quantidade';
    	foreach($resLineChart as $item)
    	{
    		$parsedBarChartLineName[] = $item['ciclo'];
    		$parsedBarChartLineQnt[] = 	$item['qnt'];
    	}
    	
    	
    	$out['donut'] = $parsedDonut;
    	
    	$out['barchart']['name'] = $parsedBarChartName;
    	$out['barchart']['quantidade'] = $parsedBarChartQnt;
    	
    	$out['barchartvertical']['times'] = $parsedBarChartVertName;
    	$out['barchartvertical']['porcentagem'] = $parsedBarChartVertPerc;
    	
    	$out['barchartline']['ciclo'] = $parsedBarChartLineName;
    	$out['barchartline']['qnt'] = $parsedBarChartLineQnt;

    	
    	//$this->debugMark('testes', $out);
    	
    	echo json_encode($out);
    	exit();
    }
    
    public function GetReviewById()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->model('dashboarddao');
    	$dash = new dashboarddao();
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	$ano = $this->input->get('year');
    			
		if($ano){
			$id_janela = $service->get_id_janela_by_ano_base($ano,$id_empresa);
		}else{
			$id_janela = $this->input->get('year');
		}
		$id_time  = $this->input->get('team');
		$id_ciclo = $this->input->get('cycle');
		$user_id = $this->input->get('user_id');
		$avalicao_id = $this->input->get('avalicao_id');
		
		if($id_time !=null && $id_janela == null && $id_ciclo == null){
			$user_review_graph 	= $dash->get_user_review_data($user_id,$avalicao_id,$id_time,null,null); 
		}
		
		if($id_time ==null && $id_janela != null && $id_ciclo == null){
			$user_review_graph 	= $dash->get_user_review_data($user_id,$avalicao_id,null,$id_janela,null);
		}
		
		if($id_time ==null && $id_janela == null && $id_ciclo != null){
			$user_review_graph 	= $dash->get_user_review_data($user_id,$avalicao_id,null,null,$id_ciclo);
		}
		
		if($id_time !=null && $id_janela != null && $id_ciclo != null){
			$user_review_graph 	= $dash->get_user_review_data($user_id,$avalicao_id,$id_time,$id_janela,$id_ciclo);
		}
		 		
    	
    	$out['userInfo'] = $dash->get_user_info($user_id);
    	if(!empty($out['userInfo']['image'])){
			$out['userInfo']['image'] = base_url('assets/img') . '/'. $out['userInfo']['id_empresa'] .'/50/'.$out['userInfo']['image'];
		}else{
			$out['userInfo']['image'] = null;
		}
    	$out['userReviewGraph'] = $user_review_graph;

    	
    	//$this->debugMark('testes', $out);
    	
    	echo json_encode($out);
    	exit();
    }
    
   
    
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
    
    public function getRChavePendentByCompany()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	
    	$result = $service->get_all_pendent_okr_by_empresa($id_empresa);
    	$out['okr'] = $result;
    	
    	echo json_encode($out);
    	exit();
    }
    
    /*
    public function getRChavePendentByTeam()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_usuario = $this->session->userdata('id');
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	
    	$result = $service->get_all_pendent_okr_by_team($id_usuario);
    	$out['okr'] = $result;
    	
    	echo json_encode($out);
    	exit();
    }
    */
    
    public function get_all_okr_by_company()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	
    	$result = $service->get_count_all_okr_by_empresa($id_empresa);
    	$out['okr'] = $result;
    	
    	echo json_encode($out);
    	exit();
    }
    
    public function get_all_okr__done_by_company()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	
    	$result = $service->get_count_all_okr_by_empresa($id_empresa);
    	$out['okr'] = $result;
    	
    	echo json_encode($out);
    	exit();
    }
    
    /*
    public function getCountRChavePendentByTeam()
    {
    	header('Content-type: application/json');
    	$this->get_acesso_user ( true );
    	$out = array();
    	
    	$id_usuario = $this->session->userdata('id');
    	$id_empresa = $this->session->userdata('id_empresa');
    	
    	$this->load->model('servicedao');
    	$service = new servicedao();
    	
    	$result = $service->get_count_all_okr_by_team($id_usuario);
    	$out['okr'] = $result;
    	
    	echo json_encode($out);
    	exit();
    }
    
    */
    
}













