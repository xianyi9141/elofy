<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
class view extends App_controller {

   	public function __construct()
    {
        parent::__construct();
      
    }
	
	function is_valid_user(){
	  if($this->session->userdata('maintenance_user') == '1' || $this->session->userdata('admin') == '1') {
            return true;
        } else {
            redirect('perfil');
        }
	}

    function is_okr_user(){
      if($this->session->userdata('okr') == '1') {
            return true;
        } else {
            redirect('perfil');
        }
    }
	

    function is_goal_or_maintaince_user(){
      if($this->session->userdata('maintenance_user') == '1' || $this->session->userdata('goal_register') == '1' || $this->session->userdata('admin') == '1')
        { 
            return true;
        }else{
            redirect('perfil');
        }
    }
    function is_goal_or_admin(){
      if( $this->session->userdata('goal_register') == '1' || $this->session->userdata('admin') == '1')
        { 
            return true;
        }else{
            redirect('perfil');
        }
    }

    function is_reviewer_or_maintaince_user(){
      if($this->session->userdata('maintenance_user') == '1' || $this->session->userdata('user_reviewer') == '1' || $this->session->userdata('admin') == '1')
        { 
            return true;
        }else{
            redirect('perfil');
        }
    }
    function is_reviewer_or_admin(){
      if( $this->session->userdata('user_reviewer') == '1' || $this->session->userdata('admin') == '1')
        { 
            return true;
        }else{
            redirect('perfil');
        }
    }
    
    //aqui daniel
    public function index()
    {
    	if($this->session->userdata('logged_in')){
    		redirect('perfil');
    	}
		//load the view
        $data['google_login_url'] = GOOGLE_LOGIN_URL;
        $data['main_content'] = 'portal/login';
        $this->load->view('includes/template_login', $data );  

    }
	
	//Login for Suvey
    public function survey_login()
    {
    	if($this->session->userdata('logged_in')){
    		redirect('perfil');
    	}
		//load the view
        $data['main_content'] = 'portal/survey-login';
        $this->load->view('includes/template_login', $data );  

    }
    
    public function redefinirSenha()
    {
    	
    	//load the view
    	$data['main_content'] = 'portal/redefinirSenha';
    	$this->load->view('includes/template_login', $data );
    	
    }
    
    public function confirmaEmail()
    {
    	
    	//load the view
    	$data['main_content'] = 'portal/confirmarEmail';
    	$this->load->view('includes/template_login', $data );
    	
    }
    	
    public function cadastro()
    {
    	
    	//load the view
    	$data['main_content'] = 'portal/cadastro';
    	$this->load->view('includes/template_login', $data );
    	
    }  
    
    public function dashboard()
    {
        $this->is_okr_user();
    	$this->is_goal_or_admin();

    	$data = array();
    	$data = array_merge($data, $this->get_acesso_user(true));
		$data['main_content'] = 'portal/dashboard';
        $data['css_personalization_file'] = $this->getCssFile();

    	$this->load->view('includes/template_dashboard', $data );
    	
    }  
    
    public function planejamento()
    {
    	$this->is_okr_user();

    	$data = array();
    	$data = array_merge($data, $this->get_acesso_user(true));
		$data['main_content'] = 'portal/planejamento';
        $data['css_personalization_file'] = $this->getCssFile();
    	$this->load->view('includes/template_dashboard', $data );
    	
    }

    public function okr($key_id = null)
    {
        $this->is_okr_user();
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $this->get_acesso_user(true);
        
        if($key_id){
            $this->session->set_userdata('id_key_result', $this->uri->segment(2));

            $data['main_content'] = 'portal/okrmedicaoes';
        }  
        else{
            $data['main_content'] = 'portal/okr1';
        }
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }

    public function okr2($tatic_id = null,$key_id = null)
    {
        $this->is_okr_user();
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $this->get_acesso_user(true);
        
        if($tatic_id && $key_id){
            $this->session->set_userdata('id_key_result', $this->uri->segment(3));
            $this->session->set_userdata('id_tatic', $this->uri->segment(2));

            $data['main_content'] = 'portal/okrmedicaoes1';
        }  
        else{
            $data['main_content'] = 'portal/okr1';
        }
        $this->load->view('includes/template_dashboard', $data );
    }
    public function indicators()
    {

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/indicators';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );

    }
    public function rchavehistory($history_id = null)
    {
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        if($history_id){
            $this->session->set_userdata('id_history', $this->uri->segment(2));
            $data['main_content'] = 'portal/rchavehistory';
        } else {
            $this->session->set_userdata('id_history', 0);
            $data['main_content'] = 'portal/rchavehistory';
        }
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }

    public function feed()
    {
        
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/feed';
        $this->load->view('includes/template_dashboard', $data );
        
    }
    public function results()
    {

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/results';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );

    }
    public function feedbacks()
    {

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/feedbacks';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );

    }
    public function ninebox()
    {

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/ninebox';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );

    }

    public function nineboxdetail()
    {
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/nineboxdetail';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }

    public function performance_dashboard()
    {
        $this->is_reviewer_or_admin();
    	
        $data = array();
        //$data = array_merge($data, $this->get_acesso_user(true, null, true));  
        $data['main_content'] = 'portal/performance_dashboard';
        $data['css_personalization_file'] = $this->getCssFile();

        $this->load->view('includes/template_dashboard', $data );
        
    }
	
	public function peopledevelopment()
    {
        $this->is_reviewer_or_admin();
    	
        $data = array();
        $data['css_personalization_file'] = $this->getCssFile();

        $data['main_content'] = 'portal/peopledevelopment';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
        
    }
    
    public function avaliacoes()
    {
        $this->is_reviewer_or_admin();
    	
        $data = array();
        //$data = array_merge($data, $this->get_acesso_user(true, null, true));  
        $data['main_content'] = 'portal/avaliacoes';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
        
    }
    

    public function organograma($id = null)
    {   
        if($id){
            $data = array();
          //  $data = array_merge($data, $this->get_acesso_user(true, null, true)); remocçao de controle de acesso.
            
            $data['id'] = $id;

            $data['main_content'] = 'portal/organograma';
            $this->load->view('includes/template_dashboard', $data );
        }
    }

    public function usuarios()
    {
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/usuarios';
        $data['css_personalization_file'] = $this->getCssFile();

        $this->load->view('includes/template_dashboard', $data );        
    }
    public function questionarios()
    {
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/questionarios';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }
    public function zapier()
    {
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/zapier';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }
    public function survey_list($idSurvey)
    {
        if($this->session->userdata('survey_logged_in') || $this->session->userdata('logged_in')){
            $data = array();
            $data['main_content'] = 'portal/survey_list';
            $data['idSurvey'] = $idSurvey;
            $data['css_personalization_file'] = $this->getCssFile();

            $this->load->view('includes/template_dashboard', $data );
        }else{
            //redirect('survey-login');
            // estou contanto com a hash que será automaticamente concatenada pelo browser
            redirect('login?redirectUrl='. urlencode('survey_list/'.$idSurvey) );
        }
    }
    public function feedback()
    {
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/feedback';
        $data['css_personalization_file'] = $this->getCssFile();

        $this->load->view('includes/template_dashboard', $data );
    }

    public function cargos()
    {   
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/cargos';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );        
    }
	
	public function survey($id=null)
    {   
		
		if($this->session->userdata('survey_logged_in') || $this->session->userdata('logged_in')){			
			$data = array();
			$data['main_content'] = 'portal/survey';
            $data['css_personalization_file'] = $this->getCssFile();

			$this->load->view('includes/template_dashboard', $data );        
		}else{
			//redirect('survey-login');
            // estou contanto com a hash que será automaticamente concatenada pelo browser
            redirect('login?redirectUrl='. urlencode('survey/') );
		}
    }
    public function empresa()
    {        
        $this->is_valid_user();
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/empresa';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );        
    }
    public function integrations()
    {  
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/integrations';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );        
    }
    public function carreer_development()
    {  
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/carreer_development';
        $this->load->view('includes/template_dashboard', $data );        
    }

    public function times()
    {        
        $this->is_valid_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true, true));
        $data['main_content'] = 'portal/times';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );        
    }
    
    public function tags()
    {
    	
    	$data = array();
    	$data = array_merge($data, $this->get_acesso_user(true));

        $data['tag'] = $this->input->post('tag');

		$data['main_content'] = 'portal/tags';
    	$this->load->view('includes/template_dashboard', $data);
    	
    }
    
    public function perfil($id = null)
    {
		$data = array();
    	$data = array_merge($data, $this->get_acesso_user(true));
        if($id){
            $data['main_content'] = 'portal/user_perfil';
        }else{
            $data['main_content'] = 'portal/perfil';
        }

        $data['css_personalization_file'] = $this->getCssFile();

    	$this->load->view('includes/template_dashboard', $data );
    	
    }

public function carreira($id = null, $cicle = null, $from_results = null)
    {
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/carreira';
        if ($id) $data['id_user'] = $id;
        if ($cicle) $data['id_cicle'] = $cicle;
        if ($from_results) $data['from_results'] = $from_results;

        $data['css_personalization_file'] = $this->getCssFile();

        $this->load->view('includes/template_dashboard', $data );
        
    }


    public function atividades($id = null)
    {
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/atividades';

        $data['css_personalization_file'] = $this->getCssFile();

        $this->load->view('includes/template_dashboard', $data );
        
    }

    public function checkin()
    {
        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/checkin';

        $data['css_personalization_file'] = $this->getCssFile();

        $this->load->view('includes/template_dashboard', $data );
    }

    private function getCssFile(){
        $this->load->model('servicedao');
        $service = new servicedao();
        return $service->get_empressa_by_id($this->session->userdata('id_empresa')) ['template_css'];

    }
    
    public function canais($id = null)
    {
    	if($id){
    		$data = array();
    		$data = array_merge($data, $this->get_acesso_user(true));
    		
    		$data['id'] = $id;
    		
    		$data['main_content'] = 'portal/canais';
    		$this->load->view('includes/template_dashboard', $data );
    	}
    }
    
    public function principalTemp(){
    	
    	//load the view
    	//$data['main_content'] = 'portal/index';
    	$this->load->view('portal/index' );
    }
/**
 * @raptor pesquisas action
 */
    public function pesquisas($id=null){
        $this->is_valid_user();       
        $data = array();
        
		if($id)
            $data['main_content'] = 'portal/pesquisaseditor';
        else
            $data['main_content'] = 'portal/pesquisas';
		
		$this->get_acesso_user(true);
        $this->session->set_userdata('id_pesquisa', $id);
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );   
    }

    public function pesquisaquestion($id=null){
        $this->is_valid_user();       
        $data = array();
        $data['main_content'] = 'portal/pesquisaquestion';
        $this->session->set_userdata('id_pesquisa', $id);
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );   
    }
	/**
	* @raptor Cycle Configuration action
	*/
    public function cycleconfiguration($id=null){
		
		if($id>0){
			$this->session->set_userdata('id_revisao_ciclo',$id);
		}else{
			$this->session->set_userdata('id_revisao_ciclo',"");
		}
		if($this->session->userdata('admin') == 1 || $this->session->userdata('user_reviewer') == 1 || $this->session->userdata('id_gestor') != ""){
			$cycleConfigShow	=	1;
		}else{
			$cycleConfigShow	=	0;
		}
        // $this->is_reviewer_or_admin();
        $data = array();
		if($id){
			$data['main_content'] = 'portal/cycle-configuration-editor';
		}else{
			$data['main_content'] = 'portal/cycle-configuration';
		}
		//$this->get_acesso_user(true);
        //$this->session->set_userdata('id_pesquisa', $id);
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );   
    }
	
	/**
	* @raptor Cycle Configuration action
	*/
    public function gerenciar($id=null){
        
        $this->is_reviewer_or_admin();
		if($id>0){
			$this->session->set_userdata('id_revisao_ciclo',$id);
		}else{
			$this->session->set_userdata('id_revisao_ciclo',"");
		}
		
        $data = array();
		if($id){
			$data['main_content'] = 'portal/cycle-configuration-gerenciar';
		}
		//$this->get_acesso_user(true);
        //$this->session->set_userdata('id_pesquisa', $id);
        $this->load->view('includes/template_dashboard', $data );   
    }
	/**
	* @raptor Category action
	*/
    public function category(){
		
		$this->is_valid_user();
		$data['main_content'] = 'portal/category';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );   
    }
	/**
	* @raptor competencia action
	*/
    public function competencia(){
		$this->is_valid_user();
		$data['main_content'] = 'portal/competencia';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );   
    }
    public function ciclos()
    {
        $this->is_valid_user();
        $data['main_content'] = 'portal/ciclos';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }
    public function matriz()
    {
        $this->is_valid_user();
        $data['main_content'] = 'portal/matriz';
        $data['css_personalization_file'] = $this->getCssFile();
        $this->load->view('includes/template_dashboard', $data );
    }
    public function my_dashboard()
    {
        $this->is_okr_user();

        $data = array();
        $data = array_merge($data, $this->get_acesso_user(true));
        $data['main_content'] = 'portal/my_dashboard';
        $this->load->view('includes/template_dashboard', $data );
        
    }
    
}
