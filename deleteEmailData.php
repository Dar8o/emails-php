<?php
require './lib/controller/QueryController.php';

use lib\controller\QueryController;

if(isset($_POST['id'])) {
  $email_id = $_POST['id'];
  
  $query = new QueryController();
  
  $query->delete_data($email_id);
}

header('Location: /');