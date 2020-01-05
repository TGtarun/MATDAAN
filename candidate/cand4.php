<!DOCTYPE html>
<html>
<head>
	<title>cand4</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodyc">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="cand3.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="cand3.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<div class="divc">
	<?php
		session_start();
		if(($_SESSION["uid"] && $_SESSION["upass"]))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from election where start>=now()";  //change sign of less than or greater than
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	echo "CHOOSE ANY ONE ELECTION<br><br><br>";
		  	if($users>0)
		  	{
		  		echo "<table border='1' id= results>
					<tr>
					<th>SR.NO</th>
					<th>Election</th>
					<th>Start time</th>
					<th>End time</th>
					<th>Choose</th>
					</tr>";
		  		for($i=0;$i<$users;$i++)
	            {
	            	$row = $result->fetch_array(MYSQLI_NUM);
	            	$r0 = htmlspecialchars($row[0]);
	            	$r1 = htmlspecialchars($row[1]);
		    		$r2 = htmlspecialchars($row[2]);	           
		    		echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
				    echo"<td>". ($i+1)."</td>";
				    echo"<td>". $r0."</td>";
				    echo"<td>". $r1."</td>";
				    echo"<td>". $r2."</td>";
				    echo "<td>" . "<a href='cand5.php?data=".$r0."'>Choose</a>". "</td>";
				    echo "</tr>";
	            }

	            echo '</table>';
		  	
		}

		  	else
		  	{
		  		echo "No election Available<br><br>";
		  	}
		}

?>

</div>
</body>
</html>



