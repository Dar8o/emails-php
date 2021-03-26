<?php
// file to handle all queries to the database

namespace lib\model;

require './lib/model/ConnectionDB.php';

use lib\model\ConnectionDB;
use PDO;

class Queries extends ConnectionDB{
  function __construct() {
    parent::__construct();
  }
  
  public function read() {
    $rows = [];
    $sql = 'SELECT * FROM emails';
    $sentence = $this->connection->prepare($sql);
    $sentence->execute();
  
    while($row = $sentence->fetch(PDO::FETCH_ASSOC)){
      array_push($rows, $row);
    }

    return $rows;
  }

  public function insert($from, $to, $date, $subject, $plain, $html) {
    $sql = 'INSERT INTO emails(email_from, email_to, email_date, email_subject, text_plain, text_html) VALUES(:EMAIL_FROM, :EMAIL_TO, :EMAIL_DATE, :EMAIL_SUBJECT, :TEXT_PLAIN, :TEXT_HTML)';
    $sentence = $this->connection->prepare($sql);
    $sentence->execute(array(
      ':EMAIL_FROM' => $from,
      ':EMAIL_TO' => $to,
      ':EMAIL_DATE' => $date,
      ':EMAIL_SUBJECT' => $subject,
      ':TEXT_PLAIN' => $plain,
      ':TEXT_HTML' => $html
    ));
  }

  public function delete($id) {
    $sql = 'DELETE FROM emails WHERE id = :EMAIL_ID';
    $sentence = $this->connection->prepare($sql);
    $sentence->execute(array(
      ':EMAIL_ID' => $id
    ));
  }
}