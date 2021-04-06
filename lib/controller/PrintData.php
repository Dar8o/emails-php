<?php
// Class that allows you to paint the email data on the screen

namespace lib\controller;

require './lib/model/Queries.php';

use lib\model\Queries;

class PrintData {
  private $query;
  private $total_rows;

  function __construct() {
    $this->query = new Queries();
    $this->total_rows = $this->query->read_all();
  }

  public function print_API() {
    $email_array = [];

    foreach($this->query->show_all() as $email_data) {
      $emails = [];
      
      $original_date = date_create($email_data['email_date']);
      $date_format = date_format($original_date, "d.m.y - H:i");

      $subject = explode(' ', $email_data['email_subject']);
      $extract_id = count($subject) - 1;
      $id_in_subject = $subject[$extract_id];

      $email_format = explode('@', $email_data['email_from']);
      
      $emails['id'] = $email_data['id'];
      $emails['date'] = $date_format;
      $emails['subject'] = $id_in_subject;
      $emails['email'] = $email_format[0];
      $emails['emailData'] = $email_data['text_plain'];

      array_push($email_array, $emails); 
    }

    return $email_array;
  }

  public function print_select_number_rows() {
    for($i = 1; $i <= $this->total_rows; $i++) { 
      print_r('
        <option value="' . $i . '">' . $i . '</option>
      ');
    }
  }
}