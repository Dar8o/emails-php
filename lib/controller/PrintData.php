<?php
// Class that allows you to paint the email data on the screen

namespace lib\controller;

require './lib/model/Queries.php';

use lib\model\Queries;

class PrintData {
  private $limit_row = 5;
  private $page = 1;
  private $query;
  private $total_rows;

  function __construct($num_page, $num_row) {
    $this->query = new Queries();
    $this->total_rows = $this->query->read_all();
    if($num_page !== null) $this->page = $num_page;
    if($num_row !== null) $this->limit_row = $num_row;
  }

  public function print_all() {
    $offset = ($this->page - 1) * $this->limit_row;

    foreach($this->query->read_by_range($this->limit_row, $offset) as $email_data) {
      $original_date = date_create($email_data['email_date']);
      $date_format = date_format($original_date, "d.m.y - H:i");

      $subject = explode(' ', $email_data['email_subject']);
      $extract_id = count($subject) - 1;
      $id_in_subject = $subject[$extract_id];

      $email_format = explode('@', $email_data['email_from']);
      
      print_r('
        <tr>
          <td>' . $date_format . '</td>
          <td>' . $id_in_subject . '</td>
          <td>' . $email_format[0] . '</td>
          <td>' . $email_data['text_plain'] . '</td>
          <td>
            <form action="./deleteEmailData.php" method="POST">
              <input class="button-delete" type="submit" value="delete" />
              <input type="hidden" name="id" value="' . $email_data['id'] . '" />
            </form>
          </td>
        </tr>
      ');
    }
  }

  public function print_pagination() {
    $total_pages = ceil($this->total_rows / $this->limit_row);
    $rows = $this->limit_row;

    for($i = 1; $i <= $total_pages; $i++) {
      if($this->page == $i){
        print_r("
        <a class='active' href='/?page=$i&rows=$rows'>$i</a>
        ");  
      } else {
        print_r("
        <a href='/?page=$i&rows=$rows'>$i</a>
        ");
      }
    }
  }

  public function print_select_number_rows() {
    for($i = 1; $i <= $this->total_rows; $i++) { 
      print_r('
      <option value="' . $i . '">' . $i . '</option>
      ');
    }
  }
}