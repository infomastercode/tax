<?php

require_once PATH . '/models/TaxModel.php';

class Tax extends Controllers {

  public function __construct() {
    $this->base_url = BASE_URL;
    $this->tax_model = new TaxModel();
  }

  public function index() {
    $this->getList();
  }

  public function add() {
    if ($this->isPost()) {
      $value = $this->getPostValue();
      $id = $this->tax_model->addTax($value);
    }

    $data = array();
    $data['action'] = $this->base_url . "tax_form/add";
    $data['back'] = $this->base_url . "tax_list";
    $this->view('tax_form', $data);
  }

  private function getList() {
    $data = array();
    $data['add'] = $this->base_url . "tax_form/add";
    
    
//    $data = $this->initForm();
//    $data['action'] = '#';
//    $data['add'] = $this->base_url . '/add';
//    $data['delete'] = $this->base_url . '/delete';
//    $data['selector'] = array(Agent::SELECTOR_ADD, Agent::SELECTOR_DELETE);
//    $data['load_js'] = array('additional/admin/catalog/product_list');
//    $data['load_page'] = 'theme/admin/catalog/product_list';
//    $this->load->view('layout/admin/pattern', $data);
    $this->view('tax_list', $data);
  }

}
