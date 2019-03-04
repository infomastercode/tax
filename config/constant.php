<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
//
// SET CONSTANT
define('BASE_URL', $config['base_url']);
define('PATH', realpath(__DIR__ . "/../"));
define('DB_HOST', $config['db_host']);
define('DB_NAME', $config['db_name']);
define('DB_PASS', $config['db_pass']);
define('DB_DATABASE', $config['db_database']);

define('STMP_EMAIL', $config['stmt_email']);
define('STMP_PASSWORD', $config['stmt_password']);
define('EMAIL_SENDFROM', $config['email_sendfrom']);
define('EMAIL_SENDTO', $config['email_sendto']);
