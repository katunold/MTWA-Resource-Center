<?php
	ini_set("display_errors", "1");
	error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$access = $_GET["a"];
$conn = mysql_connect($servername, $username, $password);
mysql_select_db("library");
$sql = "SELECT * FROM books";
$result = mysql_query($sql);
if($result === false){
	die(mysql_error());
	}
while($myrow = mysql_fetch_array($result)){
	if($myrow["accession"] == $access){
		echo "<span style='color:rgb(100%,0%,0%);'>You entered a duplicate value</span>";
		}
	}
?>