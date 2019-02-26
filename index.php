<?php

require __DIR__ . '/libraries/Controllers.php';

$request = $_SERVER['REDIRECT_URL'];
$url = explode("/", $request);

switch ($url[2]) {
    case '/' :
        require __DIR__ . '/views/welcome.php';
        break;
    case 'tax_list' :
        require __DIR__ . '/views/tax_list.php';
        break;
//    case 'tax_form' :
//        require __DIR__ . '/views/tax_form.php';
//        break;
    case 'tax_form' :
        require __DIR__ . '/controllers/tax.php';
        $t = new Tax($url);
        break;
    default:
        require __DIR__ . '/views/404.php';
        break;
}

function set_debug($message) {
    echo '<pre>';
    print_r($message);
    exit;
}

function view($view, $data = array()) {
    $var = array();
    if (!empty($data)) {
        foreach ($data as $key => $value) {
            ${$key} = $value;
        }
    }
    require __DIR__ . '/views/' . $view . '.php';
}
