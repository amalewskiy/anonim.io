<?php
$hostname = "sql11.freesqldatabase.com";
$username = "sql11470868";
$password = "MEk1DwVMaW";
$dbname = "sql11470868";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
  echo "Error connecting to database." . mysqli_connect_error();
}
