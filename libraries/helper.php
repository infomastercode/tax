<?php

function table_checkbox($identifier, $number = '', $check = false) {
  $checked = ($check) ? 'checked' : '';

  if (!empty($number)) {
    return "<input type='checkbox' name='selected[$identifier]' class='selected' value='$number' $checked >";
  }

  return "<input type='checkbox' name='selected[]' class='selected' value='$identifier' $checked >";
}

function table_date($date) {
  return date("d-m-Y", strtotime($date));
}

function table_option($redirect, $identifier, $options = array()) {
  $html = '';
  foreach ($options as $option) {

    if ($option == 'edit') {
      $btn_class = "btn btn-primary btn-sm";
      $icon = "<i class='fa fa-pencil'></i>";
    } else if ($option == 'delete') {
      
    } else if ($option == 'view') {
      
    } else if ($option == 'task') {
      $btn_class = "btn btn-primary btn-sm";
      $icon = "<i class='fa fa-tasks'></i>";
    }

    $url = $redirect . "/" . $option . "/" . $identifier;

    $html .= "<a href='$url' data-toggle='tooltip' title='$option' class='$btn_class'>$icon</a> ";
  }

  return $html;
}

function table_active($active) {
  if ($active == Agent::ACTIVE) {
    return "<i class='fa fa-check' style='color:green'></i>";
  } else if ($active == Agent::INACTIVE) {
    return "<i class='fa fa-close' style='color:red'></i>";
  }
}

function table_default($is_default) {
  if ($is_default == 1) {
    return 'Yes';
  } else {
    return 'No';
  }
}

function table_image($image) {
  if (empty($image)) {
    $image = DEFAULT_IMAGE;
  }
  return "<img src=" . $image . " width='32' class='img-thumbnail'>";
}

function table_view_purchase($purchase_id) {
  return "<button onclick='view_detail_purchase($purchase_id)' class='btn btn-primary btn-sm' type='button'><i class='fa fa-file-text-o'></i></button>";
}

function table_radio_click($param_id, $check = false, $event = '') {
  $checked = $check ? 'checked' : '';
  $event = !empty($event) ? 'onclick=' . $event . '($(this))' : '';
  return "<input type='radio' name='checked' class='selected' value=" . $param_id . " $checked $event >";
}

function organizationButtonSelect($function, $org_id, $org_no, $company) {
  /* this bug space in javascript */
  //return "<button onclick=$function('$org_id','$org_no','$company') type='button' data-toggle='tooltip' title='select' data-dismiss='modal' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></td>";

  return "<button onclick=\"$function('$org_id','$org_no','$company')\" type='button' data-toggle='tooltip' title='select' data-dismiss='modal' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></td>";
}

function partButtonSelect($function, $product_id, $param1 = '', $param2 = '', $param3 = '') {
  if (!empty($param3)) {
    $event = $function . '(\'' . $product_id . '\',\'' . $param1 . '\',\'' . $param2 . '\',\'' . $param3 . '\')';
  } else if (!empty($param2)) {
    $event = $function . '(\'' . $product_id . '\',\'' . $param1 . '\',\'' . $param2 . '\')';
  } else if (!empty($param1)) {
    $event = $function . '(\'' . $product_id . '\',\'' . $param1 . '\')';
  } else {
    $event = $function . '(\'' . $product_id . '\')';
  }
  return "<button onclick=$event type='button' data-dismiss='modal' data-toggle='tooltip' title='Select' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i>";
}

function locationButtonSelect($function, $location_id, $location) {
  return "<button onclick=$function('$location_id','$location') type='button' data-toggle='tooltip' title='Select' data-dismiss='modal' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></td>";
}

function locationButtonSelectByStock($function, $stock_id) {
  return "<button onclick=$function('$stock_id') type='button' data-toggle='tooltip' title='Select' data-dismiss='modal' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></td>";
}

function datetime_today() {
  return date("Y-m-d H:i:s");
}

function date_today() {
  return date("Y-m-d");
}

function datetime_day_today() {
  return date("d-m-Y H:i:s");
}

function date_day_today() {
  return date("d-m-Y");
}

function date_convert_db($date) {
  if (empty($date)) {
    return null;
  }
  $str_date = str_replace('/', '-', $date);
  return date('Y-m-d H:i:s', strtotime($str_date));
}

function date_convert_php($date) {
  if (empty($date)) {
    return '';
  }
  $str_date = str_replace('/', '-', $date);
  return date('d-m-Y', strtotime($str_date));
}

function image_default($image) {
  return !empty($image) ? $image : DEFAULT_IMAGE;
}

function debug_list($count, $sql, $is_debug = false) {
  if ($is_debug && !$count) {
    print_r($sql);
    exit;
  }
}

function order_by_limit($count, $sorts, $start, $limit) {

  $sql = '';

  if ($count) {
    return $sql;
  }

  $sql = '';
  if (!empty($sorts)) {

    $order_by = key($sorts);
    $key = reset($sorts);

    if ($key == 1) {
      $sort = "DESC";
    } else {
      $sort = "ASC";
    }

    $sql .= "ORDER BY $order_by $sort ";
  }

  if (!empty($limit)) {
    $sql .= "LIMIT " . $start . ", " . $limit;
  }

  return $sql;
}

function order_by($sorts, $by) {
//    if (empty($sorts)) {
//      $sql.= "ORDER BY ST.date_add DESC ";
//    }

  $sql = '';
  if (empty($sorts)) {
    $sql .= $by . ' '; /* need blank space */
  }
  return $sql;
}

function column_search($search = '', $columns = array(), $columns_unset = array()) {
  $sql = '';

  if (empty($search)) {
    return $sql;
  }

  foreach ($columns as $key => $column) {
    $value = array_search($column, $columns_unset); // return key array > 0
    if ($value === 0 || !empty($value)) {
      // not do anything.
    } else {
      $index_like[$key] = $column . " LIKE '%" . $search . "%'";
    }
  }

  $sqlsearch = implode(' OR ', $index_like);
  $sql .= "AND (" . $sqlsearch . ") ";

  return $sql;
}

function column_all() {
  return '*';
}

function column_count() {
  return "count(1) as 'total'";
}

function column_implode($columns) {
  return implode(',', $columns);
}

function implode_comma($data) {
  return implode(',', $data);
}

function implode_comma_quote($data) {
  return "'" . implode("','", $data) . "'";
}

function offset_dyna($value) {
  $data = array(
      isset($value['queries']['search']) ? $value['queries']['search'] : '',
      isset($value['sorts']) ? $value['sorts'] : '',
      $value['perPage'],
      $value['offset']
  );
  return $data;
}

function in_empty($data, $replace = '') {
  return !empty($data) ? $data : $replace;
}

function set_image($result_id, $img_dir_name) {
  $setimage = array('path' => $img_dir_name, 'img_default' => $img_dir_name . '_default_', 'img_medium' => $img_dir_name . '_medium_', 'img_small' => $img_dir_name . '_small_');
  $url_small = Container::uploadImage($result_id, $setimage);
  return $url_small;
}

function input_post() {
  return file_get_contents('php://input');
}

function get_ip_address() {
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

function set_debug($message) {
  echo '<pre>';
  print_r($message);
  exit;
}

function get_url() {
  $request = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '';
  if (empty($request))
    return 'tax_list';

  return explode("/", $request);
}

function show_404() {
  header('HTTP/1.0 404 Not Found');
  echo "<h1>Error 404 Not Found</h1>";
  echo "The page that you have requested could not be found.";
  exit();
}

function name($name1, $name2 = "") {
  if ($name2 != "") {
    $name1 = $name1 . " " . $name2;
  }
  return iconv('UTF-8', 'TIS-620', $name1);
}
