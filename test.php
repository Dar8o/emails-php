<?php

$date = date_create('Wed, 24 Mar 2021 14:42:20 -0400');
$date_formate = date_format($date, 'Y-m-d H:i:s');

print($date_formate);