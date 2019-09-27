<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_controller extends CI_Controller {

	function __constructor(){

		parent::Controller();

	}

	protected  $enclist = array(
			'UTF-8', 'ASCII',
			'ISO-8859-1', 'ISO-8859-2', 'ISO-8859-3', 'ISO-8859-4', 'ISO-8859-5',
			'ISO-8859-6', 'ISO-8859-7', 'ISO-8859-8', 'ISO-8859-9', 'ISO-8859-10',
			'ISO-8859-13', 'ISO-8859-14', 'ISO-8859-15', 'ISO-8859-16',
			'Windows-1251', 'Windows-1252', 'Windows-1254',
	);

	public function index(){

	}

	function do_crypt($var1, $var2)
	{
		$this->load->library('encrypt');
		$encrypted_str = $this->encrypt->encode($var1, $var2);
		return $encrypted_str;
	}
	function do_decrypt($var1, $var2)
	{
		$this->load->library('encrypt');
		$decrypted_str = $this->encrypt->decode($var1, $var2);
		return $decrypted_str;
	}
	function deserialize($str = null)
	{
		if($str == null){
			return 0;
		}else{
			$aux3 = array();
			$str = explode("&", str_replace('+', ' ', $str));
			foreach($str as $aux):
			$aux2 = explode("=", $aux);
			$aux3 += array($this->format_serialize($aux2[0]) => $this->format_serialize($aux2[1]));
			endforeach;
			return $aux3;
		}
	}
	function format_serialize($str)
	{
		$arr1 = array( '  ','”'         ,'“'        ,'-'  		,''   ,'á'     ,'à'     ,'ã'     ,'â'     ,'ä'     ,'é'     ,'è'     ,'ê'     ,'ë'     ,'í'     ,'ì'     ,'î'     ,'ï'     ,'ó'     ,'ò'     ,'õ'     ,'ô'		,'ö'	 ,'ú'	  ,'ù'	   ,'û'	    ,'ü'	 ,'ç'    ,'@'  ,'#'  ,'$'  ,'%'  ,'¨'     ,'&'  ,'{'  ,'}'  ,'['  ,']'  ,'+'  ,'='  ,'¹'     ,'²'     ,'³'     ,'£'     ,'¢'	 ,'¬'	  ,'§'	   ,'ª'	    ,'°'	 ,'º'	  ,'?'	,'/'  ,'\\'	,'|'  ,':'	,';'  ,'<'  ,'>'  ,','  ,'"'  ,'Á'     ,'À'     ,'Ã'     ,'Â'     ,'Ä'     ,'É'		,'È'	 ,'Ê'	  ,'Ë'	   ,'Í'		,'Ì'	 ,'Î'	  ,'Ï'	   ,'Ó'		,'Ò'	 ,'Õ'	  ,'Ô'	   ,'Ö'		,'Ú'	 ,'Ù'	  ,'Û'	   ,'Ü'	    ,'Ç'	 ,'´'	  ,'`'	,'^'  );
		$arr2 = array('%0D', '%E2%80%9D','%E2%80%9C','%E2%80%93','%0A','%C3%A1','%C3%A0','%C3%A3','%C3%A2','%C3%A4','%C3%A9','%C3%A8','%C3%AA','%C3%AB','%C3%AD','%C3%AC','%C3%AE','%C3%AF','%C3%B3','%C3%B2','%C3%B5','%C3%B4','%C3%B6','%C3%BA','%C3%B9','%C3%BB','%C3%BC','%C3%A7','%40','%23','%24','%25','%C2%A8','%26','%7B','%7D','%5B','%5D','%2B','%3D','%C2%B9','%C2%B2','%C2%B3','%C2%A3','%C2%A2','%C2%AC','%C2%A7','%C2%AA','%C2%B0','%C2%BA','%3F','%2F','%5C','%7C','%3A','%3B','%3C','%3E','%2C','%22','%C3%81','%C3%80','%C3%83','%C3%82','%C3%84','%C3%89','%C3%88','%C3%8A','%C3%8B','%C3%8D','%C3%8C','%C3%8E','%C3%8F','%C3%93','%C3%92','%C3%95','%C3%94','%C3%96','%C3%9A','%C3%99','%C3%9B','%C3%9C','%C3%87','%C2%B4','%60','%5E');
		$str = str_replace($arr2, $arr1, $str);
		return $str;
	}

	function process_login($view = null)
	{
		$arr = $this->deserialize($this->input->post('post'));
		$username = $arr['username'];
		$password = $arr['password'];
		$this->load->model('user_model');
		if(!$result = $this->user_model->select_by_login($username, 'Normal')){
			$return = 0;
		}
		else{
			$pass = $this->do_decrypt($result[0]['pass'], $result[0]['chave']);
			//$pass = 'teste';
			if ($pass == $password){
				$data = array('username'  => $username,'logged_in'  => TRUE);
				$this->session->set_userdata($data);
				$return = 2;
			}
			else{
				$return = 1;
			}
		}
		return  $return;
	}

	function logout($target = null)
	{
		$this->session->sess_destroy();
		$this->load->view($target);
	}
	function set_conf($fileId){
		$error = "";
		$msg = "";
		$conf['error'] 	  = $_FILES[$fileId]['error'];
		$conf['tmp_name'] = $_FILES[$fileId]['tmp_name'];
		$conf['name'] 	  = $_FILES[$fileId]['name'];
		$conf['type'] 	  = $_FILES[$fileId]['type'];
		return $conf;
	}

	function test_file_upd($conf, $fileId){
		$error = "";
		$msg = "";
		$result = false;
		if(!empty($conf['error'])){
			$error = $this->up_load_error_msg($conf['error']);

		}elseif(empty($conf['tmp_name']) || $conf['tmp_name'] == 'none'){
			$error = 'No file was uploaded..';
		}else
		{
			$result = true;
			$msg .= " File Name: " . $conf['name'] . ", ";
			$msg .= " File Size: " . @filesize($conf['tmp_name']);
			@unlink($_FILES[$fileId]);
		}
		echo "{";
		echo				"error: '" . $error . "',\n";
		echo				"msg: '" . $msg . "'\n";
		echo "}";
		return $result;
	}

	function save_to_locate($file, $path, $fileOut, $pathOut){

		$file_ext = strtolower(substr($file, strrpos($file, '.') + 1));
		if(file_exists($pathOut.$fileOut.'.'.$file_ext)){
			unlink($pathOut.$fileOut.'.'.$file_ext);
		}
		copy($path.$file, $pathOut.$file);
		rename($pathOut.$file, $pathOut.$fileOut.'.'.$file_ext);
	}

	function getHeight($image) {
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}

	function getWidth($image) {
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
	}

	function resizeImage($image,$width,$height,$scale) {
		$file_ext = substr($image, strrpos($image, '.') + 1);
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);

		if($file_ext == 'jpg' or $file_ext == 'jpeg'){
			$source = imagecreatefromjpeg($image);
			imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
			imagejpeg($newImage,$image,90);
		}else if($file_ext == 'png'){
			$source = imagecreatefrompng($image);
			imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
			imagepng($newImage,$image,0);
		}else{
			return false;
		}

		chmod($image, 0777);
		return $image;
	}

	function config_img($path, $img, $max_width, $max_height){
		$width =  $this->getWidth($path.$img);
		$height = $this->getHeight($path.$img);
		if ($width > $max_width && $width > $height){
			if($height > $max_height){
				$scale = $max_height/$height;
			}else{
				$scale = $max_width/$width;
			}
		}else if($height > $max_height && $width < $height){
			if($width > $max_width){
				$scale = $max_width/$width;
			}else{
				$scale = $max_height/$height;
			}
		}else if($width == $height){
			$scale = $max_height/$height;
		}else{
			$scale = 1;
		}

		return $uploaded = $this->resizeImage($path.$img,$width,$height,$scale);
	}

	function config_imgFixedWidth($path, $img, $max_width){
		$width =  $this->getWidth($path.$img);
		$height = $this->getHeight($path.$img);
		if ($width > $max_width){
			$scale = $max_width/$width;
		}else{
			$scale = 1;
		}

		return $uploaded = $this->resizeImage($path.$img,$width,$height,$scale);
	}


	function save_file($tmp_name, $name, $path){
		move_uploaded_file($tmp_name,$path.$name);
	}

	function up_load_error_msg($str_error){
		switch($str_error)
		{
			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '6969':
				$error = 'Extension not allowed';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
		return $error;
	}

	function resizeMinSize($hsize, $wsize, $path, $img)
	{
		$this->load->library('image_lib');
		$width =  $this->getWidth($path.$img);
		$height = $this->getHeight($path.$img);

		if($height >= $hsize){
			if($width >= $wsize){
				return true;
			}else{
				// resize img to increase width
			}
		}else{
			// resize img to increase heigth
			$width =  $this->getWidth($path.$img);
			if($width >= $wsize){
				return true;
			}else{
				// resize img to increase width
			}
		}
		return true;
	}
	function cropImg($hsize, $wsize, $path, $img){
		$this->resizeMinSize($hsize, $wsize, $path, $img);
		$y_axis = $hsize;
		$x_axis = $wsize;

	}

	function getMonth($mm){
		$month = array('','janeiro','fevereiro','março','abril','maio','junho'
				,'julho','agosto','setembro','outubro','novembro','dezenbro');
		return $month[$mm];
	}

	function getMonthInt($mm){
		$mm = strtolower($mm);
		$month = array('','jan','fev','mar','abr','mai','jun'
				,'jul','ago','set','out','nov','dez');

		return array_search($mm, $month);;
	}

	function debugMark($text = null, $array = null,  $var = null){
		echo ($text) ? '<br>Debug: '.$text.'<br>' : '';

		if($array){
			$this->PAR($array);
		}
		echo ($var) ? $var : '';

		DIE;
	}

	public function sendMail($action,$email,$name,$replace_array, $subjectReplace = null, $empresa_id = null) {
		
		$this->load->model('servicedao');
    	$service 				= 	new servicedao();
    	$template 				= 	$service->get_email_template_by_action($action);
    	$body 					= 	$template['body'];
    	if( !$subjectReplace) $subject = $template['subject'];
    	else $subject = $subjectReplace;
    	$constants				=  	explode(",", $template['constants']);
		$messageBody			=  	str_replace($constants,$replace_array,$body);
		$subjectBody			=  	str_replace($constants,$replace_array,$subject);
		$userEmpresa = 
		$headerImg 				=   $service->get_email_header_image_from_company_id($empresa_id)['url'];
		if ($headerImg) $headerImg = base_url('assets/img') . '/'. $empresa_id .'/'.$headerImg;
		$messageBody 			= 	$this->load->view('email/email.php',array('messageBody'=> $messageBody, 'headerImage' => $headerImg),TRUE);

    	$email_from 			= 	EMAIL_SEND_FROM;
    	$name_from 				= 	EMAIL_SEND_NAME_FROM;
		$result 				= 	$this->send_email_SMTP($email_from,$name_from,null,null,$subjectBody,$messageBody,$email,$name);
		if($result == 'Sucesso'){
			$status = 'sent';
		}else{
			$status = 'not sent';
		}
		$service->save_email_log($email,$name,$subjectBody.'{***}'.$messageBody,$email_from,$name_from,$status);

		return $result;
	}

	// 	email, nome , assunto, menssagem, para, blind para
	public function send_email($email, $name, $subject, $message, $to, $bcc = null)
	{
		$this->load->library('email');

		$config['protocol'] = 'mail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($email,$name);
		$this->email->to($to);
		$this->email->cc('');
		if($bcc != ''){
			$this->email->bcc($bcc);
		}else{
			$this->email->bcc('');
		}
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

	}

	public function emailJson($emailData = null){


		$url = 'http://10.100.11.112/email/api/EnviarEmail';
		$defaultEmailTo = array('');
		$defaultEmailCc = array('');
		$defaultEmailTitulo = 'Email enviado da Área de Contatos SGPLAN';

		if($emailData == null){
			$EmailsTo = array('', '');
			$EmailsCc = array();
			$Titulo   =  'teste de envio' ;
			$EmailBody =  'Corpo do <b>Email</b>';
			$NomeRemetente = '';
			$EmailRemetente = '';
			$Anexos = null;

			$emailData = array(
					'emailsTo' => $EmailsTo,
					'emailsCc' => $EmailsCc,
					'titulo' => $Titulo ,
					'emailBody' => $EmailBody ,
					'nomeRemetente' => $NomeRemetente ,
					'emailRemetente' => $EmailRemetente
			);
		}



		if($emailData['emailsTo'] == ''){
			$emailData['emailsTo'] == $defaultEmailTo;
		}

		if($emailData['titulo'] == ''){
			$emailData['titulo'] == $defaultEmailTitulo;
		}

		$data_string = json_encode($emailData);


		$resultEmail = file_get_contents($url, null, stream_context_create(array(
				'http' => array(
						'method' => 'POST',
						'header' => 'Content-Type: application/json' . "\r\n".
						'Content-Length: ' . strlen($data_string) . "\r\n",
						'content' => $data_string,
				),
		)));

		$result = json_decode($resultEmail);

		return $result;

	}

	public function send_email_SMTP( 	$fromSender, $nomeSender,
			$reply = null, $replyName = null,
			$assunto, $mens,
			$toDestino, $nomeDestino, $debug = null){

				$this->load->library('email');


				$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
				if($debug){
					$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				}
				$mail->SMTPAuth = true; // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = "mail.smtp2go.com";
				$mail->Port = 465; // or 587
				$mail->IsHTML(true);
				$mail->Username = "mensagem@elofy.com.br"; //Usuário do gMail
				$mail->Password = "Txe9YF9fWpRV"; //Senha do gMail

				$mail->Username = "mensagem@elofy.com.br"; //Usuário do gMail
				$mail->Password = "Txe9YF9fWpRV"; //Senha do gMail

				$mail->CharSet = 'UTF-8';
				$mail->SetFrom($fromSender, $nomeSender); //Quem está enviando o e-mail.

				//$mail->AddReplyTo('afurg.secretaria@gmail.com', 'Secretaria Afurg');
				$mail->Subject = $assunto; //Assunto do e-mail.
				$mail->Body = $mens;
				$destino = $toDestino;
				$mail->AddAddress($destino, $nomeDestino);
				$mail->AddReplyTo($destino, $nomeDestino);

				if(!$mail->Send()) {
					//$result = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
					$result = "Erro";
				} else {
					$result = "Sucesso";
				}

				return $result;
				//$this->debugMark($data["message"]);
				// $this->load->view('sent_mail',$data);
	}

	public function createRandWord($size = null){

		$char = array(
				"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
				"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
				"1","2","3","4","5","6","7","8","9","0"
		);
		$word = '';
		if($size == null){
			$size = 20;
		}
		for($i=0; $i<$size; $i++){
			$word = $word.$char[array_rand($char)];

		}

		return $word;
	}

	public function PAR($array)
	{
		echo '<PRE>';
		echo print_r($array);
		echo '</PRE>';
	}

	function tirarAcentos($string){
		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ý|ÿ)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N y Y"),$string);
	}

	function slogUnderscore($string){
		$str = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ý|ÿ)/","/(Ý)/", "/(ç)/", "/(Ç)/"),explode(" ","a A e E i I o O u U n N y Y c C"),$string);
		$especialCaracter = array('@','#','$','%','¨','&','{','}','[',']','+','=','¹','²','³','£','¢','¬','§','ª','°','º','?','/','\\','|',':',';','<','>',',','"','´','`','^','!');
		$str = str_replace($especialCaracter, ":",$str);
		$str = str_replace(array(": ", ":"), "",strtolower($str));
		return  str_replace(" ", "_",strtolower($str));
	}


	// esse modulo funciona especificamente para controle de acesso do SGPLAN
	/*
	function get_acesso_user($testLoged = null, $controller = null){

		$data = array();
		$id_usuario = $this->session->userdata('id');

		$this->load->model('usuarios_modulosdao');
		$usuario_acesso = new usuarios_modulosdao();
		$modulos = $usuario_acesso->get_usuarios_modulos_by_id_usuarios($id_usuario);

		$this->load->model('usuariosdao');
		$usuarios = new usuariosdao();
		//$this->debugMark($controller);


		if($testLoged){

			if(!$this->session->userdata('logged_in')){
				//$this->debugMark("primeira entrada");
				redirect('home');
			}else{
				// testa a existencia do módulo para o usuário
				$calledClass = get_called_class();
				$key = array_search($calledClass, array_column($modulos, 'alias'));
				//$this->debugMark($key, $modulos);

				if($key AND $modulos[$key]['tipo'] == 'acesso'){
					//$this->debugMark($modulos[$key]['tipo']);
					//$this->PAR($modulos[$key]);
					//echo $controller;
					//DIE;
					$moduloArray = $modulos[$key];
					$data['usuarioPerfil'] =  array('id_perfil' => $moduloArray['id_usuario_perfil'],
													'perfil'	=> $moduloArray['perfil'],
													'acesso'	=> $moduloArray['acesso'],

					);

					//$this->debugMark("Perfil", $data['usuarioPerfil'] );

					if($controller){
						if(!($this->check_access($controller) == $data['usuarioPerfil']['acesso'])){
							//$this->debugMark("Controler Check 1");
							redirect('home');

						}
					}


				}else{


					//$this->debugMark("Terceira entrada");
					$submodulos = $usuarios->get_usuario_perfil_by_id_usuario_alias_modulo($id_usuario,$calledClass );
					//$this->debugMark($id_usuario, $submodulos);

					if(sizeof($submodulos) > 0){
						//echo "submodulos";
						$data['usuarioPerfil'] =  array('id_perfil' => $submodulos[0]['id_usuario_perfil'],
														'perfil'	=> $submodulos[0]['perfil'],
														'acesso'	=> $submodulos[0]['acesso'],
						);
						//echo $controller;
						//$this->debugMark($controller, $data['usuarioPerfil'] );

						if($controller){
							// CHECA TAMBEM SE O METODO É PROPRIETARIO
							// TODO : alterar isso para uma parcela do nome
							if(!($this->check_access($controller, $data['usuarioPerfil']['perfil']) == $data['usuarioPerfil']['acesso'])){
								//$this->debugMark("Quarta entrada", $data['usuarioPerfil'] );
								redirect('home');

							}
						}

					}else{
						//echo "SEM submodulos";
						redirect('home');
					}


				}

				//DIE;
				$data['logout'] = true;
			}

		}

		$i = 0;
		foreach($modulos as $link){

			$data['link_acessos'][] = array( $link['modulos'] => $link['alias']);
			$data['link_acessos'][$i]['acesso'] = $link['acesso'];
			$data['link_acessos'][$i]['alias'] = $link['alias'];
			$data['link_acessos'][$i]['direct_link'] = $link['direct_link'];

			$i++;
		}
		//$this->PAR($data['link_acessos']);
		//$this->debugMark("Terceira entrada", $data['link_acessos']);
		//die;

		return $data ;

	}
	*/

	function get_acesso_user($testLoged = null, $admin = null, $avaliador = null, $ativo = null){


		$data = array();
		$data['link_acessos'][] = array();
		//$this->debugMark($testLoged,$this->session->userdata);
		if($testLoged){
			//$this->debugMark($this->session->userdata('logged_in'),$this->session->userdata);
			if(!$this->session->userdata('logged_in')){
				redirect('login');

			}
		}else{
			if($this->session->userdata('logged_in')){
				$data['logout'] = true;
				if($this->session->userdata('acesso') == 'Adm'){
					$data['link_acessos'][1]['Área Administrativa'] = 'area_administrativa';
				}
			}

		}

		if($admin || $avaliador || $ativo){
			$this->load->model('servicedao');
			$service = new servicedao();
			$id = $this->session->userdata('id');
			$userForCompany = $service->get_users_details_by_id($id);
		}


		if($admin){
			if($userForCompany[0]['admin'] == 'true' || $this->session->userdata('maintenance_user') == '1')
			{

			}else{
				redirect('perfil');
			}
		}

		if($avaliador){
			if($userForCompany[0]['appraiser'] == 'false' && $userForCompany[0]['admin'] == 'false')
			{
				redirect('perfil');
			}
		}

		if($ativo){
			if($userForCompany[0]['ativo'] == 'false')
			{
				redirect('perfil');
			}
		}


		return $data ;

	}

	public function check_access($method, $perfil = null){
		 //echo $method;
		 //die;
		//$this->debugMark($method.' ' . $perfil);

		switch ($method) {

			case 'add' 		: $type = 'editar'; break;
			case 'update' 	: $type = 'editar'; break;
			case 'delete' 	: $type = 'editar'; break;
			default 		: $type = 'visualizar';break;

		}

		if($perfil AND $perfil == $method){
			$type = 'editar';
		}else if( stristr( $method, $perfil)){
			$type = 'editar';
		}

		return $type;

	}

	public function diff_date_Db_Format($date1, $date2){

		$data1 = new DateTime(  $date1 );
		$data2 = new DateTime( $date2 );

		$intervalo = $data1->diff( $data2 );

		return $intervalo->days;
	}

	public function diff_date($date1, $date2){

		$data1 = new DateTime( date('Y-m-d', $date1) );
		$data2 = new DateTime( date('Y-m-d', $date2) );

		$intervalo = $data1->diff( $data2 );

		return $intervalo->days;
	}

	public function format_date($date1){

		if($date1){
			$dateTmp =  explode( '/', $date1);
			$dateReturn = $dateTmp[2].'-'.$dateTmp[1].'-'.$dateTmp[0];
		}else{
			$dateReturn = $date1;
		}

		return $dateReturn;
	}

}