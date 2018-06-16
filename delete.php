<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include 'connect.php';
$id=$_GET['q'];

//$id=$_GET['q'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = "DELETE FROM books WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    echo "<script type='text/javascript'> alert('Book Successfully Deleted')</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

$conn->close();
header("Location: http://localhost/Resource-Center/viewRecords.php", true, 301);
exit;
?>