<?php
/*ini_set("display_errors", "1");
error_reporting(E_ALL);*/
include 'connect.php';

$bookTitle = $_POST['title'];
$author = $_POST['author'];
$edition = $_POST['edition'];
$volume = $_POST['volume'];
$publisher = $_POST['publisher'];
$yop = $_POST['yop'];
$abc = $_POST['abc'];
$subject = $_POST['subject'];
$accessionNo = $_POST['accessionNo'];
$isbn = $_POST['isbn'];
$submit = $_POST['submit'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "INSERT INTO books (accession,authors,title,edition,volume,year,isbn,publisher,location,subject)
VALUES ('$accessionNo','$author','$bookTitle','$edition','$volume','$yop','$isbn','$publisher','$abc','$subject')";

if (mysqli_query($conn, $query)) {
    echo "<script type='text/javascript'> alert('Book Successfully Added')</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

$conn->close();
header("Location: http://localhost/Resource-Center/Addbook.html", true, 301);
exit;
?>