<?php
include "app/Database.php";

$db = new \Crud\App\Database();

$db->updateData(1,[
    'name' => 'WOW',
    'age' => 20,
    'bari' => 'meherpur'
]);