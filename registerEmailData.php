<?php
// Execution of the request for a new email record

require './lib/controller/QueryController.php';

use lib\controller\QueryController;

header("Content-type: text/plain");

if(isset($_POST['headers'])) {
  $envelope_to = $_POST['envelope']['to'];
  $envelope_from = $_POST['envelope']['from'];
  $headers_subject = $_POST['headers']['subject'];
  $headers_date = $_POST['headers']['date'];
  $html = $_POST['html'];
  $plain = $_POST['plain'];

  $query = new QueryController();
  $query->insert_data($envelope_from, $envelope_to, $headers_date, $headers_subject, $plain, $html);
}

header('Location: /');