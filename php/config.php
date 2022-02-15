<?php
$hostname = "sql11.freesqldatabase.com";
$username = "sql11472996";
$password = "GJBgU1vKig";
$dbname = "sql11472996";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
  echo "Error connecting to database." . mysqli_connect_error();
}
