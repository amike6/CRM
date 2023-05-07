<!DOCTYPE html>
<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'CRM';

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);
// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>