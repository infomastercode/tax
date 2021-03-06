<?php

class Database {

  public function __construct() {
    $this->conn = '';
    $this->connection();
  }

  public function test() {
    return 'test database';
  }

  public function connection() {
    $servername = DB_HOST;
    $username = DB_NAME;
    $password = DB_PASS;
    $database = DB_DATABASE;
    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
//      echo "Connected successfully";
//      exit();
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      exit();
    }
  }

  public function begin_transaction() {
    $this->conn->beginTransaction();
  }

  public function commit() {
    $this->conn->commit();
  }

  public function rollback() {
    $dbh->rollback();
  }

  public function insert($table = "", $data = array()) {
    if ($table == "" || empty($data))
      return false;

    $bind = ':' . implode(',:', array_keys($data));
    $sql = 'insert into ' . $table . '(' . implode(',', array_keys($data)) . ') ' .
            'values (' . $bind . ')';

    //if($table == 'tax_detail')set_debug($sql);

    $stmt = $this->conn->prepare($sql);
    $stmt->execute(array_combine(explode(',', $bind), array_values($data)));
    return $stmt->rowCount() > 0 ? true : false;
  }

  public function update($table = "", $data = array(), $where, $is_debug = false) {
    if ($table == "" || empty($data) || empty($where))
      return false;

    $sql = "UPDATE $table SET ";
    $c = array();
    foreach ($data as $key => $value) {
      if ($value === null) {
        $c[] = $key . " = null ";
      } else {
        $c[] = $key . " = '$value' ";
      }
    }

    $c = implode(",", $c) . " ";
    $sql = $sql . $c . $where;

//    if ($is_debug)
//      set_debug($sql);

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute();
  }

  public function insert_id() {
    return $this->conn->lastInsertId();
  }

  public function query($sql) {
    return $this->conn->query($sql);
  }

  public function row($query) {
    $result = $query->fetchObject();
    return $result;
  }

  public function result_array($query) {
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function row_array($query) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

}
