<!DOCTYPE html>
<html>
<head>
	<title>cand6</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodye">
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
	<div class="dive">
	<?php
//this is for show results of candidate election in candidate dashboard
session_start();
if(($_SESSION["uid"] && $_SESSION["upass"]))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from candidate where userID ='{$_SESSION["uid"]}' AND password ='{$_SESSION["upass"]}'";  //change sign of less than or greater than
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	echo "RESULTS : <br><br>";
		  	if($users>0)
		  	{
	            	$row = $result->fetch_array(MYSQLI_NUM);
	            	$r10 = htmlspecialchars($row[10]);
	            	$query1="select * from election  where name ='{$r10}' AND end<=now() ";
		  			$result1   = $conn->query($query1);
		  			$users1 = $result1->num_rows;
			  		if($users1>0)
			  		{
				  		$query="select * from candidate where contestElection='$r10'";
					  	$result   = $conn->query($query);
					  	if ($conn->connect_error) die("Fatal Error");
					  	if(!$result) echo "error";
 					  	$users = $result->num_rows;
					  	if($users>0)
					  	{
					  		echo "<table border='1' id= results>
							<tr>
							<th>SR.NO</th>
							<th>Candidate Name</th>
							<th>Candidate ID</th>
							<th>Votes</th>
							</tr>";
					  		for($i=0;$i<$users;$i++)
				            {
				            	$row = $result->fetch_array(MYSQLI_NUM);
				            	$r0 = htmlspecialchars($row[0]);
				            	$r12 = htmlspecialchars($row[12]);
				            	$r5 = htmlspecialchars($row[5]);
					    		echo "<tr>";
							    echo"<td>". ($i+1)."</td>";
							    echo"<td>". $r0."</td>";
							    echo"<td>". $r5."</td>";
							    echo "<td>" .$r12. "</td>";
							    echo "</tr>";
				            }
				            echo "</table>";
					  	
						}

						else
						{
							echo "No results<br><br>";
						}

				  	}

		  	else
		  	{
		  		echo "Check later, results not available yet<br><br>";
		  	}
		    		

		  		
		  	}
		}

?>
</div>
</body>
</html>