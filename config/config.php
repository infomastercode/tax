<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
// config data for init
$config['base_url'] = 'http://localhost/tax/';
$config['index_page'] = 'index.php';
$config['language'] = 'english';
$config['charset'] = 'UTF-8';
$config['db_host'] = 'localhost';
$config['db_name'] = 'root';
$config['db_pass'] = '';
$config['db_database'] = 'db_tax';

// SET CONSTANT
define('BASE_URL', $config['base_url']);
define('PATH', realpath(__DIR__."/../"));
define('DB_HOST', $config['db_host']);
define('DB_NAME', $config['db_name']);
define('DB_PASS', $config['db_pass']);
define('DB_DATABASE', $config['db_database']);