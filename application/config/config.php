<?php  

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
*/
$is_secure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $is_secure = true;
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
    $is_secure = true;
}
$http = $is_secure ? 'https' : 'http';
$root = $http."://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$config['base_url']	= $root;

define('base_url',$root);

/* DATABASE configuration */

define('dbase_TYPE','mysql');
define('dbase_HOST','localhost');
define('dbase_NAME','bztest_db');
define('dbase_USER','root');
define('dbase_PASS','');


/* End of file config.php */
/* Location: ./application/config/config.php */
