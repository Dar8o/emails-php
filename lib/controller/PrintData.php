<?php
// Class that allows you to paint the email data on the screen

namespace lib\controller;

require './lib/model/Queries.php';

use lib\model\Queries;

class PrintData {
  public function print_all() {
    $query = new Queries();
    foreach($query->read() as $email_data) {
      $date = date_create($email_data['email_date']);
      $date_format = date_format($date, 'd.m.y - H:i'); 

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
}