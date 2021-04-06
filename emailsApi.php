<?php
require './lib/controller/PrintData.php';

use lib\controller\PrintData;

$print = new PrintData();

print_r(json_encode($print->print_API()));