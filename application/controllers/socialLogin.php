<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
require_once(APPPATH . 'controllers/usuarios' . EXT);
class socialLogin extends App_controller {

	private static $itensTeams = array();

    public function __construct()
    {
        parent::__construct();
		// vai ser o modelo que tu vai acessar
        $this->load->model('servicedao');
        require_once APPPATH.'third_party/google/google-login-api.php';
        $this->load->library('linkedin'); // load library
        session_name('linkedin');
        session_start();

    }

    public function google_login(){
		
    	if(isset($_GET['code'])) {
			try {

				$gapi = new GoogleLoginApi();
				
				// Get the access token 
				$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
				
				// Get user information
				$user_info = $gapi->GetUserProfileInfo($data['access_token']);
				
				if(!empty($user_info)){
					
					
					$name 	= $user_info['displayName'];
					$email 	= $user_info['emails'][0]['value'];
					$id 	= $user_info['id'];
					$image 	= str_replace("?sz=50","?sz=500", $user_info['image']['url']);
					$login_type 	= 2;
					
					$this->makeAccessUser($name,$email,$id,$image,$login_type);
				}
			}
			catch(Exception $e) {
				$this->session->set_userdata('cancel_message','Oops something went wrong');
				redirect('/');
			}
		}else{
			$this->session->set_userdata('cancel_message','Oops something went wrong');
			redirect('/');
		}
    }

   function linkedin_login() {
        // OAuth 2 Control Flow
        if (isset($_GET['error'])) {
			$this->session->set_userdata('cancel_message','Oops something went wrong');
			redirect('/');
			
            // LinkedIn returned an error
            // load any error view here
            exit;
        } elseif (isset($_GET['code'])) {
            // User authorized your application
            if ($_SESSION['state'] == $_GET['state']) {
                // Get token so you can make API calls
                $this->linkedin->getAccessToken();
            } else {

                // CSRF attack? Or did you mix up your states?
                exit;
            }
        } else {
            if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
                // Token has expired, clear the state
                $_SESSION = array();
            }
            if (empty($_SESSION['access_token'])) {
                // Start authorization process
                $this->linkedin->getAuthorizationCode();
            }
        }
        // define the array of profile fields
        $profile_fileds = array(
            'id',
            'firstName',
            'maiden-name',
            'lastName',
            'picture-url',
            'email-address',
            'location:(country:(code))',
            'industry',
            'summary',
            'specialties',
            'interests',
            'public-profile-url',
            'last-modified-timestamp',
            'num-recommenders',
            'date-of-birth',
        );
        $profileData = $this->linkedin->fetch('GET', '/v1/people/~:(' . implode(',', $profile_fileds) . ')');
        if ($profileData) {
        	$name 	= $profileData->firstName;
			$email 	= $profileData->emailAddress;
			$id 	= $profileData->id;
			if(isset($profileData->pictureUrl)){
				$image 	= $profileData->pictureUrl;
			}else{
				$image 	= '';
			}
			
			$login_type 	= 3;
			$this->makeAccessUser($name,$email,$id,$image,$login_type);
        } else {
           header('Location: '.BASE_URL);
        }
    }

    public function slack_login(){

    	if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $data = file_get_contents('https://slack.com/api/oauth.access?client_id='.SLACK_API_TOKEN.'&client_secret='.SLACK_API_SECRET.'&redirect_uri='.SLACK_REDIRECT_URL.'&code='.$code.'');
			
            $raw_data = json_decode($data,true);
            if($raw_data){
            	if(isset($raw_data['user'])){
            		$name 	= $raw_data['user']['name'];
					$email 	= $raw_data['user']['email'];
					$id 	= $raw_data['user']['id'];
					if(isset($raw_data['user']['image_512'])){
						$image 	= $raw_data['user']['image_512'];
					}else{
						$image 	= '';
					}
					
					$login_type 	= 4;
					$this->makeAccessUser($name,$email,$id,$image,$login_type);
            	}else{
					$this->session->set_userdata('cancel_message','Oops something went wrong');
            		header('Location: '.BASE_URL);
					die;
            	}
            }else{
				$this->session->set_userdata('cancel_message','Oops something went wrong');
            	header('Location: '.BASE_URL);
				die;
            }
        }else{
			$this->session->set_userdata('cancel_message','Oops something went wrong');
        	header('Location: '.BASE_URL);
			die;
        }
    }



        public function outlook_login(){

        if (isset($_GET["error"])){

            $this->session->set_userdata('cancel_message','Oops something went wrong');
            redirect('/');
            
            exit;
        }

        //  $client_id = "6b090e35-9a14-464e-a3b5-46ae280e2045";
        //  $client_secret = "zqwUVOD0862;-)oohqYEX2-";
        //  $redirect_uri = "https://www.elofysistema.com.br/outlook_login";
		
		
		  $client_id = OUTLOOK_CLIENT_ID;
          $client_secret = OUTLOOK_SECRET_KEY;
          $redirect_uri = OUTLOOK_REDIRECT_URL;	
		
		
          $fields_string = "";
          //$_GET["code"] is the authorization code
          if(isset($_GET["code"])){

		  $client_id = OUTLOOK_CLIENT_ID;
          $client_secret = OUTLOOK_SECRET_KEY;
          $redirect_uri = OUTLOOK_REDIRECT_URL;		
            //user granted permission
            //get access token using the authorization code
            /*$url = "https://login.live.com/oauth20_token.srf";
                $fields = array("client_id" => $client_id, "redirect_uri" => $redirect_uri, "client_secret" => $client_secret, "code" => $_GET["code"], "grant_type" => "authorization_code");*/

            $url = "https://login.microsoftonline.com/common/oauth2/v2.0/token";
            $fields = array("client_id" => $client_id, "redirect_uri" => $redirect_uri, "client_secret" => $client_secret, "code" => $_GET["code"], "grant_type" => "authorization_code");

                foreach($fields as $key=>$value) { $fields_string .= $key."=".$value."&"; }

                rtrim($fields_string, "&");
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
                curl_setopt($ch,CURLOPT_POST, count($fields));
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                $result = curl_exec($ch);
                $result = json_decode($result);
                curl_close($ch);
            //this is the refresh token used to access Microsoft Live REST APIs
                $access_token = $result->access_token;
            //    $refresh_token = $result->refresh_token;
                
                /*function new_access_token($refresh_token)
                    {
                        $url = "https://login.live.com/oauth20_token.srf";
                        $fields = array("client_id" => OUTLOOK_CLIENT_ID, "redirect_uri" => OUTLOOK_REDIRECT_URL, "client_secret" => OUTLOOK_SECRET_KEY, "grant_type" => "refresh_token", "refresh_token" => $refresh_token);
                        foreach($fields as $key=>$value) { $fields_string .= $key."=".$value."&"; }
                        rtrim($fields_string, "&");
                        $ch = curl_init();
                        curl_setopt($ch,CURLOPT_URL, $url);
                        curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
                        curl_setopt($ch,CURLOPT_POST, count($fields));
                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                        $result = curl_exec($ch);
                        $result = json_decode($result);
                        curl_close($ch);
                        $access_token = $result->access_token;
                        return $access_token;
                    }*/
                
                
                
             //   $outlookdata =  file_get_contents("https://apis.live.net/v5.0/me?access_token=" . $access_token);
                
                $responsearray = array();
                $responsearray[] = "Authorization: ".$access_token;
                $responsearray[] = "Host: graph.microsoft.com";

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $responsearray);
                $responseget = curl_exec($ch); 
                
             //   $outlook_raw_data = json_decode($outlookdata,true);

                $outlook_raw_data = json_decode($responseget,true);
                
               /* if($outlook_raw_data == ""){
                    new_access_token($refresh_token);
                    $outlookdata =  file_get_contents("https://apis.live.net/v5.0/me?access_token=" . $access_token);
                    $outlook_raw_data = json_decode($outlookdata,true);
                }*/
                
                    
                    /*    $id = $outlook_raw_data['id'];
                        $name = $outlook_raw_data['name'];
                        $email = $outlook_raw_data['emails']['account'];
                        $image = '';
                        if($email==""){
                            $email = $outlook_raw_data['emails']['preferred'];
                        }*/

                    if($outlook_raw_data){
                        $id = $outlook_raw_data['id'];
                        $name = $outlook_raw_data['displayName'];
                        $email = strtolower($outlook_raw_data['userPrincipalName']);
                        
                        $image='';
            }

                        $login_type  = 1;
                    $this->makeAccessUser($name,$email,$id,$image,$login_type);
               
            }else{
                $this->session->set_userdata('cancel_message','Oops something went wrong');
                header('Location: '.BASE_URL."?error2");
                die;
            }


    }



    public function makeAccessUser($name='',$login='',$id='',$image='',$login_type=1){
		
        if($this->session->userdata('logged_in') == true){
			
			if(!$this->check_email_with_type($login, $login_type)){
				$user_id  = $this->session->userdata('id');
				if($login_type == 2){
					$data = array('email_google' => $login);
					$message = 'Google account sucessfully added';
					$updated_type = 'email_google';
					$social_login_type = 'google';
				}else if($login_type == 3){
					$data = array('email_linkedin' => $login);
					$message = 'Linkedin account sucessfully added';
					$updated_type = 'email_linkedin';
					$social_login_type = 'linkedin';
				}else if($login_type == 4){
                    $data = array('email_slack' => $login);
                    $message = 'Slack account sucessfully added';
                    $updated_type = 'email_slack';
                    $social_login_type = 'slack';
                }else if($login_type == 5){
                    $data = array('email_outlook' => $login);
                    $message = 'Outlook account sucessfully added';
                    $updated_type = 'email_outlook';
                    $social_login_type = 'outlook';
                }
				$update = $this->update_user_account($user_id,$data);
				
				if($update == true){
					
					$this->session->set_userdata('updated_item', $message);
					$this->session->set_userdata($updated_type, $login);
					$this->session->set_userdata('social_logins', ['email' =>$login,'login_type'=>$social_login_type,'image' => $image,'updated_type' => $updated_type]);
					if(empty($this->session->userdata('image')) || trim($this->session->userdata('image'))=="" || $this->session->userdata('image')==null){
						// $this->session->set_userdata('check_social_logins', ['email' =>$login,'login_type'=>$social_login_type,'image' => $image,'updated_type' => $updated_type]);
					}
					redirect('/');
				}else{
					$this->session->set_userdata('cancel_message','There is something wrong, please try again.'); 
					redirect('/');
					die;
				}
			}else{
				$this->session->set_userdata('cancel_message','This account is already linked with another account.');
				redirect('/');
				die;
			}
        }else{
            if($login_type == 2){
                $column = 'email_google';

            }elseif($login_type == 3){
                $column = 'email_linkedin';

            }elseif($login_type == 4){
                $column = 'email_slack';

            }elseif($login_type == 5){
                $column = 'email_outlook';
            }

            $check = $this->check_email_with_type($login,$login_type);
            if($check == 0){
                $this->session->set_flashdata('item', array('message' => 'E-mail was not found please ask for login on Elofy to estabilsh connection.','class' => 'success'));
    			redirect('/');
    			die;
            }else{
                $this->db->select('*');
                //custom
                if($login_type == 1){
                $column = 'login';    
                $this->db->where("(login = '$login')");
            }else{
                $this->db->where("($column = '$login' OR email_usuario = '$login' OR login = '$login')");
            }
            //end custom
                //$this->db->where($column,$login);
                $this->db->from('ttl_usuario');
                $data = $this->db->get()->row();
				
                if(empty($data)){

    				$this->session->set_flashdata('item', array('message' => 'E-mail was not found please ask for login on Elofy to estabilsh connection.','class' => 'success'));
    				// header('Location: '.BASE_URL);
    				redirect('/');
    				die;

                }else{
    				if($data->$column != ''){
    					$choose_column = $column;
    				}else{
    					$choose_column = 'email_usuario';
    				}
    				

                    if($data->$choose_column != $login){
                        $this->session->set_flashdata('item', array('message' => 'E-mail was not found please ask for login on Elofy to estabilsh connection.','class' => 'success'));
    					redirect('/');
    					die;
                    }
					
                    $this->load->model('usuario');
                    $this->load->model('servicedao');
                    $usuario = new Usuario();
                    $service = new servicedao();

                    $userData       =   $usuario->criarSessao($data->login);
					
                    if(!empty($userData)){
                        if($login_type == 2){
                            $social_login_type = 'google';
                            $updated_type = 'email_google';
                        }elseif($login_type == 3){
                            $social_login_type = 'linkedin';
                            $updated_type = 'email_linkedin';
                        }elseif($login_type == 4){
                            $social_login_type = 'slack';
                            $updated_type = 'email_slack';
                        }elseif($login_type == 5){
                            $social_login_type = 'outlook';
                            $updated_type = 'email_outlook';
                        }

                        $maf_flag = $userData['maf'];
                        if ($maf_flag == 1) {
                            $this->load->model('servicedao');
                            $service = new servicedao();

                            $verification_code = mt_rand(100000, 999999);
                            $service->add_verifcation_code($userData['id'], $userData['email_usuario'], $verification_code);
                            $result = $this->send_verification_email($userData['email_usuario'], $verification_code);

                            $this->session->set_flashdata('social_maf', 1);
                            $this->session->set_flashdata('social_login', $data->login);
                            $this->session->set_flashdata('social_email', $userData['email_usuario']);

                            redirect('/');
                        } else {
                            
                            $this->session->set_userdata($userData);
                            $this->session->set_userdata('social_logins', ['email' =>$login,'login_type'=>$social_login_type,'image' => $image,'updated_type' => $updated_type]);
                            
                            if(empty($this->session->userdata('image')) || trim($this->session->userdata('image'))==""){
                                // $this->session->set_userdata('check_social_logins', ['email' =>$login,'login_type'=>$social_login_type,'image' => $image,'updated_type' => $updated_type]);
                            }
                            redirect('/');
                        }
                    }else{
                        $this->session->sess_destroy();
                        redirect('/');
                    }
                    
                }
            }
        }
    }

    public function check_email_with_type($email,$login_type){
        if($login_type == 2){
            $type = 'email_google';
        }elseif($login_type == 3){
            $type = 'email_linkedin';
        }elseif($login_type == 4){
            $type = 'email_slack';
        }elseif($login_type == 5){
            $type = 'email_outlook';
        }
        $this->db->select('*');
        // $this->db->where($type,$email);
        if($login_type == 1){
            $this->db->where("login = '$email'");
        }else{
        $this->db->where("$type = '$email' OR email_usuario = '$email'");
        }
        $this->db->from('ttl_usuario');
        $query = $this->db->get();
		$data 	=	$query->row();
        if(empty($data)){
            return 0;
        }else{
            return 1;
        }
        
    }

    public function update_user_account($user_id,$data){
        $this->db->where('id_usuario',$user_id);
        $update = $this->db->update('ttl_usuario',$data);
        return $update;
    }

    function send_verification_email($email, $code)
    {
        $emailData = array (
                'emailDestino' => $email,
                'code' =>  $code
        );
        $emailCheck = new usuarios();
        $result = $emailCheck->send_auth_code( $emailData );

        if ($result == "Sucesso") {
            return true;
        } else {
            return false;
        }
    }
}
