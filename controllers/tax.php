<?php

class Tax extends Controllers {

  public function __construct($url) {
    if ($url[3]) {
      $this->add();
    }
  }

  public function index() {
    
  }

  public function add() {
    if ($this->isPost()) {
      set_debug($this->getPostValue());
    }


    $data = array();
    $data['reference'] = "I re";

    view('tax_form', $data);
  }

}
