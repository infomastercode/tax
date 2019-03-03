<?php

class TaxModel extends Models {

  public function addTax($data) {
    //set_debug($data);
    $is_commit = true;
    $today = datetime_today();
    $data_add = array();
    $data_add['name'] = $data['name'];
    $data_add['card_tax'] = $data['card_tax'];
    $data_add['address'] = $data['address'];
    $data_add['number'] = $data['number'];
    $data_add['tax_type'] = isset($data['tax_type']) ? $data['tax_type'] : '';
    $data_add['total_charactor'] = $data['total_charactor'];
    $data_add['pay_type'] = isset($data['pay_type']) ? $data['pay_type'] : '';
    $data_add['signal_name'] = $data['signal_name'];
    $data_add['date_add'] = $today;
    $data_add['date_upd'] = $today;
    $this->db->begin_transaction();
    $this->db->insert('tax', $data_add);
    $id_tax = $this->db->insert_id();

    if (empty($id_tax)) {
      $is_commit = false;
    }

    foreach ($data['detail'] as $value) {
      $detail = array();
      $detail['id_tax'] = $id_tax;
      $detail['code_tax'] = $value['code_tax'];
      $detail['pay_date'] = $value['pay_date'];
      $detail['pay_total'] = $value['pay_total'];
      $detail['pay_tax'] = $value['pay_tax'];
      //set_debug($detail);
      $affected = $this->db->insert('tax_detail', $detail);

      if ($affected <= 0) {
        $is_commit = false;
      }
    }

    if ($is_commit) {
      $this->db->commit();
    } else {
      $this->rollback();
    }

    return $id_tax;
  }

  public function editTax($data) {
    //set_debug($data);
    $id_tax = $data['id_tax'];
    $is_commit = true;
    $today = datetime_today();
    $data_upd = array();
    $data_upd = array();
    $data_upd['name'] = $data['name'];
    $data_upd['card_tax'] = $data['card_tax'];
    $data_upd['address'] = $data['address'];
    $data_upd['number'] = $data['number'];
    $data_upd['tax_type'] = isset($data['tax_type']) ? $data['tax_type'] : '';
    $data_upd['total_charactor'] = $data['total_charactor'];
    $data_upd['pay_type'] = isset($data['pay_type']) ? $data['pay_type'] : '';
    $data_upd['signal_name'] = $data['signal_name'];
    // $data_upd['date_add'] = $today;
    $data_upd['date_upd'] = $today;
    $this->db->begin_transaction();
    $affected = $this->db->update('tax', $data_upd, "WHERE id_tax = $id_tax");

    if ($affected <= 0) {
      $is_commit = false;
    }

    foreach ($data['detail'] as $key => $value) {
      $detail = array();
      $detail['id_tax'] = $id_tax;
      $detail['code_tax'] = $value['code_tax'];
      $detail['pay_date'] = $value['pay_date'];
      $detail['pay_total'] = $value['pay_total'];
      $detail['pay_tax'] = $value['pay_tax'];

      if (!empty($value['id_tax_detail'])) {
        $id_tax_detail = $value['id_tax_detail'];
        $affect = $this->db->update('tax_detail', $detail, "WHERE id_tax_detail = $id_tax_detail");
      } else {
        // add detail
      }

      if ($affected <= 0) {
        $is_commit = false;
      }
    }

    if ($is_commit) {
      $this->db->commit();
    } else {
      $this->rollback();
    }

    return $id_tax;
  }

  public function getTax($id_tax) {
    $sql = "SELECT * FROM tax WHERE id_tax = $id_tax ";
    $query = $this->db->query($sql);
    $master = $this->db->row_array($query);

    $sql = "SELECT * FROM tax_detail WHERE id_tax = $id_tax ";
    $query = $this->db->query($sql);
    $details = $this->db->result_array($query);

    $detail = array();
    foreach ($details as $d) {
      $detail[$d['code_tax']] = $d;
    }

    $data = array();
    $data = $master;
    $data['detail'] = $detail;

    return $data;
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