<?php 
// $connect = new mysqli_connect("localhost ", "root","","ayurvedic");

// //database_connection.php
// if ($connect->connect_error) {
//     die("Connection failed: " . $connect->connect_error);
// }
// else {
//     echo "Connected successfully";
// }
$connect = new PDO("mysql:host=localhost;dbname=ayurvedic", "root", "");

?>
