<?php
require_once 'autoload.php';

// Connect the database.
$database = new \Medoo\Medoo([
  'type' => 'mysql',
  'host' => LOCALHOST,
  'database' => DBNAME,
  'username' => USERNAME,
  'password' => PASSWORD,
  'prefix' => 'fxl_'
]);