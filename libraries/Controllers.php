<?php

class Controllers {

  public function __construct() {
    //set_debug(get_url());
  }
  
  public function route(){
    set_debug(get_url());
  }

  public function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
  }

  public function getPostValue() {
    return $_POST;
  }

  public function view($view, $data = array()) {
    $var = array();
    if (!empty($data)) {
      foreach ($data as $key => $value) {
        ${$key} = $value;
      }
    }
    require PATH . '/views/' . $view . '.php';
  }

}
