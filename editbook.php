<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include 'connect.php';
	

$bookTitle = $_POST['title'];
$author = $_POST['author'];
$edition = $_POST['edition'];
$volume = $_POST['volume'];
$publisher = $_POST['publisher'];
$yop = $_POST['yop'];
$location = $_POST['abc'];
$subject = $_POST['subject'];
//$accessionNo = $_POST['accessionNo'];
$isbn = $_POST['isbn'];
$id = $_POST['id'];
$submit = $_POST['submit'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query = "UPDATE books SET authors='$author',title='$bookTitle',edition='$edition',volume='$volume',year='$yop',isbn='$isbn',publisher='$publisher',location='$location',subject='$subject' WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    echo "<script type='text/javascript'> alert('Book Successfully Editted')</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

$conn->close();
header("Location: http://localhost/Resource-Center/index.php", true, 301);
exit;
?>