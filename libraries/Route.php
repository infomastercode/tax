<?php

class Route {

//  Array
//(
//    [0] => 
//    [1] => tax
//    [2] => tax_form
//    [3] => edit
//    [4] => 10
//)

  public function __construct() {
    $url = get_url();
    $class = isset($url[1]) ? $url[1] : '';
    $file = isset($url[2]) ? $url[2] : '';
    $function = isset($url[3]) ? $url[3] : '';
    $param_1 = isset($url[4]) ? $url[4] : '';
    $param_2 = isset($url[5]) ? $url[5] : '';

    if ($param_2 != "") {
      $c = new $class();
      $c->$function($param_1, $param_2);
    } else if ($param_1 != "") {
      $c = new $class();
      $c->$function($param_1);
    } else if ($function != "") {
      $c = new $class();
      $c->$function();
    } else if ($file != "") {
      $c = new $class();
      $c->index();
    } else {
      show_404();
    }
  }

}
