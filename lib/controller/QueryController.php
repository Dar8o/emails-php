<?php
namespace lib\controller;

require './lib/model/Queries.php';

use lib\model\Queries;

class QueryController {
  private $query;

  function __construct() {
    $this->query = new Queries();
  }

  public function insert_data($from, $to, $date, $subject, $plain, $html) {
    $year = date('Y');
    $original_date = date_create($date);
    $date_format = date_format($original_date, "$year-m-d H:i:s");

    $this->query->insert($from, $to, $date_format, $subject, $plain, $html);
  }

  public function delete_data($id) {
    $this->query->delete($id);
  }
}