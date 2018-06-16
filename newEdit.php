<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="general.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="Untitled-2.css" rel="stylesheet" type="text/css">
<link href="form.css" rel="stylesheet" type="text/css" />
<script src="respond.min.js"></script>
<title>Resource Center (Edit)</title>
</head>
<body>
<div id="head" style="margin-top:0px;" align="center" class="head">
<p align="center" id="tito" class="tito">
<img src="ugandanCoatofarms.jpg" alt="Coat of arms" width="80px" height="80px" /><br />
MINISTRY OF TOURISM, WILDLIFE &amp; ANTIQUITIES<br />
<span id="subtito" style="letter-spacing:0.9em; color:#090">Resource Center</span>
</p>
</div>
    <ul>
        <li><a href="index.php" class="act2">View Records</a></li>
  		<li><a href="addBook.html">Add Book</a></li>
	</ul>
<div id="bcontent" class="bcontent" >
<div id="bcontent1"></div>
<div id="bcontent2" align="center" >
    <div align="center" style="width:100%;" id="form1">
<?php
	include'connect.php';
	ini_set("display_errors", "1");
	error_reporting(E_ALL);

	$q = $_GET["q"];
	$connect = mysql_connect($servername, $username, $password);
	mysql_select_db($dbname);
	$sql = "SELECT * FROM books WHERE id LIKE ('$q') ";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);
	?>
    <form method="post"  action="editbook.php" onsubmit="alert('Book Edited successfully');" class="form">
        <table>
            <tr>
                <td><label for="bookTitle">Book Title</label></td>
                <td><input type="text" name="title" id="title" style="text-transform: capitalize;" value="<?php echo $myrow['title']?>"  required="required"/><input type="hidden" id="id" name="id" value="<?php echo $myrow['id']?>"  /></td>
            </tr>
            <tr>
                <td><label for="authors">Author(s)</label></td>
                <td><input type="text" name="author" id="author" style="text-transform: capitalize;" value="<?php echo $myrow['authors']?>"/></td>
            </tr>
            <tr>
                <td><label for="edition">Edition</label></td>
                <td><input type="text" name="edition" id="edition" value="<?php echo $myrow['edition']?>"/></td>
            </tr>
            <tr>
                <td><label for="volume">Volume</label></td>
                <td><input type="text" name="volume" id="volume" value="<?php echo $myrow['volume']?>"/></td>
            </tr>
            <tr>
                <td><label for="publisher">Publisher</label></td>
                <td><input type="text" name="publisher" id="publisher" value="<?php echo $myrow['publisher']?>"/></td>
            </tr>
            <tr>
                <td><label for="yop">Year of Publication</label></td>
                <td><input type="number" name="yop" id="yop" min="1880" max="2050" value="<?php echo $myrow['year']?>" /></td>
            </tr>
            <tr>
                <td><label for="location">Location</label></td>
                <td><input type="text" name="abc" id="location" required="required" value="<?php echo $myrow['location']?>" /></td>
            </tr>
            <tr>
                <td><label for="subject">Subject</label></td>
                <td><input type="text" name="subject" id="subject" value="<?php echo $myrow['subject']?>" /></td>
            </tr>
            <tr>
                <td><label for="accessionNo">Accession Number</label></td>
                <td><input type="text" name="accessionNo" disabled="disabled" id="accessionNo" onblur="verify();" value="<?php echo $myrow['accession']?>" required="required" /><br />
                <label id="duplicate" style="display:none"></label>
                </td>
            </tr>
            <tr>
             	<td><label for="isbn">ISBN/ISSN</label></td>
                <td><input type="text" name="isbn" id="isbn" value="<?php echo $myrow['isbn']?>" /></td>
            </tr>
            <tr>
            	<td colspan="2" align="center" style="margin:auto" class="submit">
                	<a href="index.php" style="text-decoration:none;"><input type="button"  name="submit" value="Cancel" /></a>
                    <input type="Submit" name="submit" value="Edit" />
                </td>
            </tr>
       	</table>
      </form>
   
<?php
	mysql_close($connect);
?>
</div>
</div>
<div id="footer" align="center" class="footer">
<p id="foot" class="foot">
&copy;copyright Ministry of Tourism, Wildlife &amp; Antiquities<br />  
<span style="color:#03F">Developed by :</span> Katumba Arnold<br />  
<span style="color:#03F">email :</span> katunold94@gmail.com
</p>
</div>
</body>
</html>
