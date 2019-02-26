<?php

class Controllers {

  public function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
  }
  
  public function getPostValue() {
    return $_POST;
  }

}
