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
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(array_combine(explode(',', $bind), array_values($data)));
    return $stmt->rowCount() > 0 ? true : false;
  }

  public function insert_id() {
    return $this->conn->lastInsertId();
  }

}
