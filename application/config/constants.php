<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('EMAIL_SEND_FROM', 'team@elofy.com.br');
define('EMAIL_SEND_NAME_FROM', 'Elofy');

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

$colum_data = array('nome_tipo_ativ'=>array('name' => 'nome_tipo_ativ','text' => 'Tipo Atividade'),
					'descr_atividade'=>array('name' => 'descr_atividade','text' => 'Descrição Atividade'),
					'descr_situacao_ativ'=>array('name' => 'descr_situacao_ativ','text' => 'Situacao atividade'),	
					'corresponsaveis_ativ'=>array('name' => 'corresponsaveis_ativ','text' => 'Coresponsaveis atividade'),	
					'data_atualiz_ativ'=>array('name' => 'data_atualiz_ativ','text' => 'Data atualização'),	
					'descr_situacao_ativ'=>array('name' => 'descr_situacao_ativ','text' => 'Situação Atividade'),	
					'nome_empresa'=>array('name' => 'nome_empresa','text' => 'Nome empresa'),	
					'nome_time'=>array('name' => 'nome_time','text' => 'Nome time'),	
					'nome_objetivo'=>array('name' => 'nome_objetivo','text' => 'Nome objetivo'),	
					'progresso_objetivo'=>array('name' => 'progresso_objetivo','text' => 'Progresso Objetivo'),	
					'descricao_objetivo'=>array('name' => 'descricao_objetivo','text' => 'Descrição Objetivo'),	
					'data_ini_objetivo'=>array('name' => 'data_ini_objetivo','text' => 'Data Inicio Objetivo'),	
					'data_fim_objetivo'=>array('name' => 'data_fim_objetivo','text' => 'Data Fim Objetivo'),	
					'objetivo_pai'=>array('name' => 'objetivo_pai','text' => 'Objetivo Pai'),	
					'situacao'=>array('name' => 'situacao','text' => 'Situação Id'),	
					'descr_situacao'=>array('name' => 'descr_situacao','text' => 'Situação'),	
					'nome_RChave'=>array('name' => 'nome_RChave','text' => 'Nome Resultado Chave'),	
					'descr_RChave'=>array('name' => 'descr_RChave','text' => 'Descrição Resultado Chave'),	
					'meta_final_prev_RChave'=>array('name' => 'meta_final_prev_RChave','text' => 'Meta'),	
					'medicao_RChave'=>array('name' => 'medicao_RChave','text' => 'Medição'),	
					'peso_RChave'=>array('name' => 'peso_RChave','text' => 'Peso'),	
					'progresso_RChave'=>array('name' => 'progresso_RChave','text' => 'Progresso '),	
					'nome_resp_RChave'=>array('name' => 'nome_resp_RChave','text' => 'Responsável'),	
					'descr_RChave'=>array('name' => 'descr_RChave','text' => 'Descrição resultado chave'),	
					'Data_execucao'=>array('name' => 'Data_execucao','text' => 'Data atualização'),	
					'Nome_usuario'=>array('name' => 'Nome_usuario','text' => 'Nome usuario'),	
					'percentual_avaliacao'=>array('name' => 'percentual_avaliacao','text' => 'Percentual avaliacao'),	
					'peso'=>array('name' => 'peso','text' => 'Peso'),	
					'qtd_objetivos'=>array('name' => 'qtd_objetivos','text' => 'Qtd objetivos'),	
					'qtd_atividades'=>array('name' => 'qtd_atividades','text' => 'Qtd atividades'),	
					'qtd_rchaves'=>array('name' => 'qtd_rchaves','text' => 'Qtd rchaves'),	
					'publico'=>array('name' => 'publico','text' => 'Publico'),	
					'descr_situacao'=>array('name' => 'descr_situacao','text' => 'Situação Rchave'),	
					'avaliacao'=>array('name' => 'avaliacao','text' => 'Avaliacao'),	
					'descr_avaliacao'=>array('name' => 'descr_avaliacao','text' => 'Descr avaliacao'),	
					'destaque'=>array('name' => 'destaque','text' => 'Destaque'),	
					'data_atualiz_obj'=>array('name' => 'data_atualiz_obj','text' => 'Data atualiz obj'),	
					'ativo'=>array('name' => 'ativo','text' => 'Ativo'),	
					'hierarquia_times'=>array('name' => 'hierarquia_times','text' => 'Hierarquia times'),	
					'corresponsaveis'=>array('name' => 'corresponsaveis','text' => 'Corresponsaveis'),	
					'frequencia_RChave'=>array('name' => 'frequencia_RChave','text' => 'Frequencia RChave'),	
					'unidade_meta_RChave'=>array('name' => 'unidade_meta_RChave','text' => 'Unidade meta RChave'),	
					'progresso_ajust_RChave'=>array('name' => 'progresso_ajust_RChave','text' => 'Progresso ajust RChave'),	
					'corresponsaveis_RChave'=>array('name' => 'corresponsaveis_RChave','text' => 'Corresponsaveis RChave'),	
					'publico_RChave'=>array('name' => 'publico_RChave','text' => 'Publico RChave'),	
					'situacao_RChave'=>array('name' => 'situacao_RChave','text' => 'Situacao RChave'),	
					'descr_situacao_RChave'=>array('name' => 'descr_situacao_RChave','text' => 'Descr situacao RChave'),	
					'tipo_calculo_RChave'=>array('name' => 'tipo_calculo_RChave','text' => 'Tipo calculo RChave'),	
					'data_atualiz_RChave'=>array('name' => 'data_atualiz_RChave','text' => 'Data atualiz RChave'),	
					'ativo_RChave'=>array('name' => 'ativo_RChave','text' => 'Ativo RChave'),	
					'hora_ativ'=>array('name' => 'hora_ativ','text' => 'Hora ativ'),	
					'data_fim_real_ativ'=>array('name' => 'data_fim_real_ativ','text' => 'Data fim real ativ'),	
					'nome_time_atv'=>array('name' => 'nome_time_atv','text' => 'Time Resp Atividade')	
					);

define('ActivitiesColums', serialize($colum_data));

$colum_data = array('prazo_visible'=>array('name' => 'prazo_visible','text' => 'Prazo'),
					'time_r_visible'=>array('name' => 'time_r_visible','text' => 'Time De Remetente'),
					'time_d_visible'=>array('name' => 'time_d_visible','text' => 'Time De Destinatário'),	
					'sol_visible'=>array('name' => 'sol_visible','text' => 'Solicitação'),	
					'tipo_visible'=>array('name' => 'tipo_visible','text' => 'Tipo'),	
					'valore_visible'=>array('name' => 'valore_visible','text' => 'Valores')
					);

define('FeedbacksColums', serialize($colum_data));

$colum_data = array('description_visible'=>array('name' => 'description_visible','text' => 'Descrição'),
                    'objective_visible'=>array('name' => 'objective_visible','text' => 'Objetivo')
                    );

define('IndicatorsColums', serialize($colum_data));

$tipo_cargo = array(['value'=>'0','name'=>'Contribuidor'],['value'=>'4','name'=>'Gestor']);
define('TIPOCARGO', serialize($tipo_cargo));

$components			=	array();
$components['O']	=	'resultadous';
$components['C']	=	'competencias';
$components['T']	=	'potentials';
$components['V']	=	'valores';
$components['S']	=	'feedback';

define('COMPONENTS', serialize($components));

$tipo_avaliacaos	=	array();
$tipo_avaliacaos[1]	=	'autoavailicao';
$tipo_avaliacaos[2]	=	'gestor';
$tipo_avaliacaos[3]	=	'pares';
$tipo_avaliacaos[4]	=	'equipe';

define('TIPO_AVALIACAOS', serialize($tipo_avaliacaos));
// define('BASE_URL', "https://app.elofy.com.br/");
define('BASE_URL', "http://localhost/xelofy/");
/* Google App Client Id */
define('CLIENT_ID', '301314620901-iih49qtbp10js04bdvne5tj1ce5pvhst.apps.googleusercontent.com');
/* Google App Client Secret */
define('CLIENT_SECRET', 'OXyBDxhmoJ_QT8RHmJt0TYRT');
/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', BASE_URL.'google_login');

$google_login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
/* define google login url */
define('GOOGLE_LOGIN_URL', $google_login_url);


define('LINKEDIN_CLIENT_ID','788qxg55at0utq');
define('LINKEDIN_CLIENT_SECRET_ID','XQ48ABKBgachUBAg');
define('LINKED_IN_SCOPE', 'r_basicprofile r_emailaddress');
define('LINKEDIN_REDIRECT_URL', 'linkedin_login');



define('SLACK_API_TOKEN', '438673718294.437144024068');
define('SLACK_API_SECRET', 'e266a4b4190aead22b02fdfe6b9cbe1a');
define('SLACK_REDIRECT_URL', BASE_URL.'slack_login');
define('SLACK_SCOPE', 'identity.basic,identity.email,identity.avatar');



/*define('OUTLOOK_CLIENT_ID', '000000004025B96C');
define('OUTLOOK_SECRET_KEY', 'wruM6812?ubtmCLNTSM4=~]');
define('OUTLOOK_REDIRECT_URL', 'https://www.elofysistema.com.br/outlook_login');
define('OUTLOOK_SCOPE', 'wl.basic wl.emails');
*/

/*define('OUTLOOK_CLIENT_ID', '6b090e35-9a14-464e-a3b5-46ae280e2045');
define('OUTLOOK_SECRET_KEY', 'zqwUVOD0862;-)oohqYEX2-');
define('OUTLOOK_REDIRECT_URL', 'https://www.elofysistema.com.br/outlook_login');
define('OUTLOOK_SCOPE', 'User.Read offline_access openid');
*/

define('OUTLOOK_CLIENT_ID', '6b20818b-5068-4815-925a-33e61842f736');
define('OUTLOOK_SECRET_KEY', 'hlnVXP903}@ttynFSPA44;:');
define('OUTLOOK_REDIRECT_URL', 'https://app.elofy.com.br/outlook_login');
define('OUTLOOK_SCOPE', 'User.Read offline_access openid');



/* End of file constants.php */
/* Location: ./application/config/constants.php */