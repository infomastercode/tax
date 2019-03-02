<?php

require_once PATH . '/models/TaxModel.php';

class Tax extends Controllers {

  public function __construct() {
    parent::__construct();
    $this->base_url = BASE_URL . "tax_form";
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

    $data = $this->initForm();
    $data['b'] = $this->form();
    $this->view('tax_form', $data);
  }

  public function edit($id_tax = null) {
    if ($this->isPost()) {
      $value = $this->getPostValue();
      $id = $this->tax_model->editTax($value);

//      if (!empty($purchase_id)) {
//        Container::setLog(__METHOD__, "purchase update success", $purchase_id);
//        Container::setNotification($this->notice_type, Agent::S, "The purchase $number has updated");
//      } else {
//        Container::setLog(__METHOD__, "purchase update error", $purchase_id);
//        Container::setNotification($this->notice_type, Agent::E, 'The purchase has an error');
//      }

      header('Location: ' . $this->base_url . "/edit/$id");
      // redirect($this->base_url . "/edit/$id", 'refresh');
//      if ($this->value['save'] == 'save') {
//        redirect($this->base_url, 'refresh');
//      } else {
//        redirect($this->base_url . "/edit/$purchase_id", 'refresh');
//      }
    }
    $this->getFormData($id_tax);
  }

  private function getFormData($id_tax) {
    $b = $this->tax_model->getTax($id_tax);
    $data = $this->initForm();
    $data['action'] = $this->base_url . "/edit/" . $id_tax;

//    $data = array();
//    
//    $data['back'] = $this->base_url . "tax_list";
//    $data['pdf'] = $this->base_url . "displayPDF";
    $data['id_tax'] = $id_tax;
    $data['b'] = array_merge($this->form(), $b);
    //set_debug($data);
    $this->view('tax_form', $data);
  }

  private function initForm() {
    $data = array();
    $data['add'] = $this->base_url . "/add";
    $data['action'] = $this->base_url . "/add";
    $data['back'] = $this->base_url;
    $data['pdf'] = $this->base_url . "/displayPDF";
    return $data;
  }

  private function form() {
    return array(
        'name' => '',
        'id_tax' => '',
        'card_tax' => '',
        'address' => '',
        'number' => '',
        'tax_type' => '',
        'total_charactor' => '',
        'pay_type' => '',
        'signal_name' => '',
    );
  }

  private function getList() {
    $data = $this->initForm();
    $this->view('tax_list', $data);
  }

  public function getListRecord() {
    if ($this->isPost()) {
      $value = $this->getPostValue();
      $offset = offset_dyna($value);
      list($search, $sorts, $limit, $start) = $offset;

      $columns = array();
      $conditions = array();
      $data = array();
      $data['queryRecordCount'] = $this->tax_model->getListTotal($search, $columns, $conditions);
      $data['totalRecordCount'] = $data['queryRecordCount'];
      $data['records'] = array();
      $results = $this->tax_model->getList($start, $limit, $sorts, $search, $columns, $conditions);

      $tmp = array();
      foreach ($results as $key => $result) {
        $tmp['row'] = $start + ($key + 1);
        $tmp['id_tax'] = $result['id_tax'];
        $tmp['name'] = $result['card_tax'];
        $tmp['vendor'] = $result['address'];
        $tmp['store'] = $result['number'];
        $tmp['tax_type'] = $result['tax_type'];
        $tmp['salary'] = $result['salary'];
        $tmp['fee'] = $result['fee'];
        $tmp['copy_right'] = $result['copy_right'];
        $tmp['interest'] = $result['interest'];
        $tmp['total_charactor'] = $result['total_charactor'];
        $tmp['other'] = $result['other'];
        $tmp['detail'] = $result['detail'];
        $tmp['pay_type'] = $result['pay_type'];
        $tmp['signal_name'] = $result['signal_name'];
        $tmp['date_add'] = table_date($result['date_add']);
        $tmp['option'] = table_option($this->base_url, $result['id_tax'], array('edit'));
        array_push($data['records'], $tmp);
      }
      echo json_encode($data);
    }
  }

  public function displayPDF() {
    require_once PATH . '/controllers/fpdf.php';
    $pdf = new DisplayPDF();
    $pdf->display();
  }

}
