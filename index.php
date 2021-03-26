<?php
// Painted on screen of the information to the database

require './lib/controller/PrintData.php';

use lib\controller\PrintData;

$print = new PrintData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ProtonSms</title>
  <link rel="stylesheet" href="./style/styles.css" />
</head>

<body>
  
  <main>
    <div class='container'>
      <table>
        <thead>
          <tr>
            <th>Date & Time</th>
            <th>Receiver ID</th>
            <th>From</th>
            <th>Message</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php  $print->print_all(); ?>
        </tbody>
      </table>
    </div>
  </main>

</body>
</html>