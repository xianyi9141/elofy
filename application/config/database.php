<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;






$db['default']['hostname'] = '144.22.107.127';

// $db['default']['username'] = 'elofy';

// $db['default']['password'] = 'Elofypoc123#';

// $db['default']['database'] = 'copia_prod';
// $db['default']['database'] = 'demo0104';


$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'elofy_0719';
$db['default']['database'] = 'elofy_0807';
$db['default']['database'] = 'elofy_0904';

// $db['default']['hostname'] = 'hmlprod.chrl69p7e0bd.us-east-2.rds.amazonaws.com';
// $db['default']['hostname'] = 'trial2.chrl69p7e0bd.us-east-2.rds.amazonaws.com';

// $db['default']['username'] = 'elofy';

// $db['default']['password'] = 'zm2me3ha1';

// $db['default']['database'] = 'elofy_bd2';

//$db['default']['hostname'] = 'homologa.chrl69p7e0bd.us-east-2.rds.amazonaws.com';
//$db['default']['database'] = 'copia_prod';

// $db['default']['hostname'] = 'xian.chrl69p7e0bd.us-east-2.rds.amazonaws.com';
// $db['default']['username'] = 'elofy';

// $db['default']['password'] = 'zm2me3ha1';

// $db['default']['database'] = 'elofy_bd2';


$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

// POSTGRE

$db['postgres']['hostname'] = 'localhost';
$db['postgres']['port']     = 5432;
$db['postgres']['username'] = 'postgres';
$db['postgres']['password'] = 'root';
$db['postgres']['database'] = 'porto';
$db['postgres']['dbdriver'] = 'postgre';
$db['postgres']['dbprefix'] = '';
$db['postgres']['pconnect'] = TRUE;
$db['postgres']['db_debug'] = TRUE;
$db['postgres']['cache_on'] = FALSE;
$db['postgres']['cachedir'] = '';
$db['postgres']['char_set'] = 'utf8';
$db['postgres']['dbcollat'] = 'utf8_general_ci';
$db['postgres']['swap_pre'] = '';
$db['postgres']['autoinit'] = TRUE;
$db['postgres']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */
