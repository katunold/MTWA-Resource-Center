<?php
	include 'connect.php';
	ini_set("display_errors", "1");
	error_reporting(E_ALL);

	$q = $_GET["q"];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$sql = "SELECT * FROM books WHERE title LIKE ('%$q%') OR authors LIKE ('%$q%') OR subject LIKE ('%$q%') OR location LIKE ('%$q%') OR year LIKE ('%$q%') OR isbn LIKE ('%$q%') OR accession LIKE ('%$q%')";
	
	if($result = mysqli_query($conn,$sql)) {
		$rowcount=mysqli_num_rows($result);
	?>
			<table id="table1">
            <thead>
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
           </thead>
           <tbody>
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
				echo "</tbody></table><br>";
			}else {
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
			
		?>