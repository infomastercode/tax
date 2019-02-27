<?php

class TaxModel extends Models {

  public function addTax($data) {
    //set_debug($data);
    $today = datetime_today();
    $data_add = array();
    $data_add['name'] = $data['name'];
    $data_add['card_tax'] = $data['card_tax'];
    $data_add['address'] = $data['address'];
    $data_add['number'] = $data['number'];
    $data_add['tax_type'] = $data['tax_type'];
    //$data_add['salary'] = $data['salary'];
    //$data_add['fee'] = $data['fee'];
    $data_add['total_charactor'] = $data['total_charactor'];
    $data_add['pay_type'] = $data['pay_type'];
    $data_add['signal_name'] = $data['signal_name'];
    $data_add['date_add'] = $today;
    $data_add['date_upd'] = $today;
    $this->db->begin_transaction();
    $this->db->insert('tax', $data_add);
    $id_tax = $this->db->insert_id();
    
    if($id_tax){
      $this->db->commit();
    }else{
      $this->rollback();
    }

    return $id_tax;
  }

}

// end definition