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
  <link rel="stylesheet" href="./public/style/styles.css" />
</head>

<body>

  <main>
    <div class="container">
      <table class="width-70">
        <thead>
          <tr>
            <th><p>+4792093912<span class="green">&nbsp;(Online)</span></p> 
            <th><p>-
            <th><p>+4792093201<span class="green">&nbsp;(Online)</span></p>
            <th><p>-
            <th><p>+4792093837<span class="green">&nbsp;(Online)</span></p>
            <th><p>-
            <th><p>+4792093654</span><span class="green">&nbsp;(Online)</span></p>
            <th><p>-
            <th><p>+4792093571<span class="green">&nbsp;(Online)</span></p> 
        </thead>
      </table>

      <div class="button-box">
        <button id="button-refresh" class="button-refresh" >Refresh</button>
      </div>

      <table>
        <thead>
          <tr>
            <th>Date & Time</th>
            <th>Receiver ID</th>
            <th>Sender ID</th>
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

  <script src="./public/js/script.js" type="module" ></script>
</body>
</html>