<?php

class Models {

  public $db;

  public function __construct() {
    $this->db = new Database();
  }

}
