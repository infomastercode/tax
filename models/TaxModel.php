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

    if ($id_tax) {
      $this->db->commit();
    } else {
      $this->rollback();
    }

    return $id_tax;
  }

  public function editTax($data) {
    //set_debug($data);
    $id_tax = $data['id_tax'];
    $today = datetime_today();
    $data_upd = array();
    $data_upd['name'] = $data['name'];
    $data_upd['card_tax'] = $data['card_tax'];
    $data_upd['address'] = $data['address'];
    $data_upd['number'] = $data['number'];
    //$data_upd['tax_type'] = $data['tax_type'];
    //$data_add['salary'] = $data['salary'];
    //$data_add['fee'] = $data['fee'];
    $data_upd['total_charactor'] = $data['total_charactor'];
   // $data_upd['pay_type'] = $data['pay_type'];
    $data_upd['signal_name'] = $data['signal_name'];
    //$data_add['date_add'] = $today;
    $data_upd['date_upd'] = $today;
    $this->db->begin_transaction();
    $affect = $this->db->update('tax', $data_upd, "WHERE id_tax = $id_tax");

    if ($affect) {
      $this->db->commit();
    } else {
      $this->rollback();
    }

    return $id_tax;
  }

  public function getTax($id_tax) {
    $sql = "SELECT * FROM tax WHERE id_tax = $id_tax ";
    $query = $this->db->query($sql);
    return $this->db->row_array($query);
  }

  public function getListTotal($search, $columns, $conditions = array()) {
    return $this->getList(0, 0, '', $search, $columns, $conditions, true);
  }

  public function getList($start, $limit, $sorts, $search, $columns = array(), $conditions = array(), $count = false) {
    if ($count) {
      $column_name = column_count();
    } else {
      $column_name = "*";
    }

    $sql = "SELECT $column_name FROM tax PM "
            . "WHERE 1 ";

    // search
    $columns_unset = array();
    $columns_search = array('id_tax', 'date_add');
    $sql .= column_search($search, $columns_search, $columns_unset);
    unset($columns_unset);
    unset($columns_search);

    // init order by
    $sql .= order_by($sorts, "ORDER BY PM.date_add DESC ");

    // order by
    $sql .= order_by_limit($count, $sorts, $start, $limit);

    /* debug */
    debug_list($count, $sql, false);

    $query = $this->db->query($sql);
    return ($count) ? $this->db->row($query)->total : $this->db->result_array($query);
  }

}

// end definition