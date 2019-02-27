<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/libraries/Controllers.php';
require_once __DIR__ . '/libraries/Models.php';
require_once __DIR__ . '/libraries/Database.php';

init();
$url = get_url();

switch ($url[2]) {
  case 'tax_list' :
    require PATH . '/controllers/tax.php';
    $t = new Tax();
    $t->index();
    break;
  case 'tax_form' :
    require PATH . '/controllers/tax.php';
    $t = new Tax();
    $t->add();
    break;
  default:
    show_404();
    break;
}

function init() {
  // init
}

function set_debug($message) {
  echo '<pre>';
  print_r($message);
  exit;
}

function get_url() {
  $request = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '';
  if (empty($request))
    return 'tax_list';

  return explode("/", $request);
}

function show_404() {
  header('HTTP/1.0 404 Not Found');
  echo "<h1>Error 404 Not Found</h1>";
  echo "The page that you have requested could not be found.";
  exit();
}

function datetime_today() {
  return date("Y-m-d H:i:s");
}
