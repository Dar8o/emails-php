<?php
// Painted on screen of the information to the database

require './lib/controller/PrintData.php';

use lib\controller\PrintData;

isset($_GET['page']) 
  ? $num_page = $_GET['page'] 
  : $num_page = null;

isset($_GET['rows']) 
  ? $num_row = $_GET['rows'] 
  : $num_row = null;

$print = new PrintData($num_page, $num_row);

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

      <form method="GET" action="/" class="button-box">
        <select name="rows">
          
          <?php $print->print_select_number_rows(); ?>

        </select>

        <input class="button-select" type="submit" value="Select" />

        <button id="button-refresh" class="button-refresh" >Refresh</button>
      </form>

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

    <div class="container-pagination">

      <?php $print->print_pagination() ?>

    </div>

  </main>

  <script src="./public/js/script.js" type="module" ></script>
</body>
</html>