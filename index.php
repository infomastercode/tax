<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/libraries/Route.php';
require_once __DIR__ . '/libraries/Controllers.php';
require_once __DIR__ . '/libraries/Models.php';
require_once __DIR__ . '/libraries/Database.php';
require_once __DIR__ . '/libraries/helper.php';

init();
$url = get_url();

switch ($url[2]) {
  case 'tax_list' :
    require PATH . '/controllers/tax.php';
    $r = new Route();
    break;
  case 'tax_form' :
    require PATH . '/controllers/tax.php';
    $r = new Route();
    break;
  default:
    show_404();
    break;
}

function init() {
  // init
}
