<?php
include 'connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="general.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="Display.css" rel="stylesheet" type="text/css" />
<link href="form.css" rel="stylesheet" type="text/css" />
<link href="modal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="edit.js"></script>
<script type="text/javascript" src="modal.js"></script>
<script src="respond.min.js"></script>
        <script type="text/javascript">
			function searching(){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","search.php?q="+ document.getElementById("search").value,false);
				xmlhttp.send(null);
				document.getElementById("d2").innerHTML = xmlhttp.responseText;
				document.getElementById("d2").style.display='block';
				document.getElementById("d1").style.display='none';
			}
		</script>	

<title>Resource Center</title>
</head>
<body>
<div id="head" align="center" class="head">
<p align="center" id="tito" class="tito">
<img src="ugandanCoatofarms.jpg" alt="Coat of arms" width="80px" height="80px" /><br />
MINISTRY OF TOURISM, WILDLIFE &amp; ANTIQUITIES<br />
<span id="subtito" style="letter-spacing:0.9em;">Resource Center</span>
</p>
</div>
    <ul>
        <li><a href="index.php" class="act2">View Records</a></li>
  		<li><a href="addBook.html">Add Book</a></li>
        <li><input type="text" id="search" placeholder="search ...." onKeyUp="searching();" /></li>
	</ul>
<div id="bcontent" class="bcontent" >
<div id="bcontent1"></div>
<div id="bcontent2" align="center" >

        <div id="tabular">
        <div id="d2" style="Display:none;" ></div>
        <div id="d3" style="Display:none;" align="center"></div>
        <div id="d1" style="Display:block;">
		<?php
			$rowcount = 0;

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			$sql = "SELECT * FROM books ";
			if($result = mysqli_query($conn,$sql)) {
				$rowcount=mysqli_num_rows($result);
			?>
			<table id="table1">
				<tr>
                <th>Accession Number</th>
                <th>Book title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Volume</th>
                <th>Year</th>
                <th>ISBN/ISSN</th>
                <th>Publisher</th>
                <th>Location</th>
                <th>Subject</th></tr>
                <?php
				$id = null;
				while($myrow = mysqli_fetch_array($result)) {
					$id = $myrow['id']; 
					?>
                    <tr id="id<?php echo $id?>" onclick="generate('<?php echo $id ?>');">
                    	<td><?php echo $myrow["accession"] ?></td>
                        <td><?php echo $myrow["title"] ?></td>
                        <td><?php echo $myrow["authors"] ?></td>
                        <td><?php echo $myrow["edition"] ?></td>
                        <td><?php echo $myrow["volume"] ?></td>
                        <td><?php echo $myrow["year"] ?></td>
                        <td><?php echo $myrow["isbn"] ?></td>
                        <td><?php echo $myrow["publisher"] ?></td>
                        <td><?php echo $myrow["location"] ?></td>
                        <td><?php echo $myrow["subject"] ?></td>
                    </tr>
				<?php
                }
				echo "</table><br>";
			}else {
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
			
		?>
        </div>

        </div>
        <?php
			echo "<h5 align='center'>Books recorded : ".$rowcount."</h5>";
        ?>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Resource Center</h2>
    </div>
    <div class="modal-body">
     <button id="cancel" >Cancel</button>
     <button id="edit" >Edit</button>
     <button id="delete" >Delete</button>
    </div>
  </div>

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