<?php
// Class that allows you to paint the email data on the screen

namespace lib\controller;

require './lib/model/Queries.php';

use lib\model\Queries;

class PrintData {
  private $limit_row = 2;
  private $index_row = 0;

  public function print_all() {
    $query = new Queries();
    
    foreach($query->read_by_range($this->limit_row, $this->index_row) as $email_data) {
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
              <input class="button" type="submit" value="delete" />
              <input type="hidden" name="id" value="' . $email_data['id'] . '" />
            </form>
          </td>
        </tr>
      ');
    }
  }

  public function print_pagination() {

  }
}