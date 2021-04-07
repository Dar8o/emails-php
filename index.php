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
  <title>ProtonSMS</title>
  <link rel="stylesheet" href="./public/style/styles.css" />
</head>

<body>

  <main id="main" >
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
        <select id="rows">
          
          <?php $print->print_select_number_rows(); ?>

        </select>

        <input id="button-select" class="button-select" type="submit" value="Select" />

        <button id="button-refresh" class="button-refresh" >Refresh</button>
      </div>

      <table id="table">
        <thead>
          <tr>
            <th>Date & Time</th>
            <th>Receiver ID</th>
            <th>Sender ID</th>
            <th>Message</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody id="tbody"></tbody>

      </table>

    </div>

    <div class="container-pagination" id="container-pagination"></div>
    
    <div class="loaded-box">
      <img class="loaded" src="./public/asset/Spinner-1s-200px.svg" alt="loaded..." />
    </div>

  </main>

  <script src="./public/js/script.js" type="module" ></script>
</body>
</html>