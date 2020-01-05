<!DOCTYPE html>
<html>
<head>
	<title>Vote10</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodym">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="vote3.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="vote5.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divm">
<?php
//this is for result in voter dashboard
session_start();
if(($_SESSION["uid"] && $_SESSION["upass"]&&$_SESSION["data"] ))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from election  where name ='{$_SESSION["data"]}' AND end<=now()";
		  	$result   = $conn->query($query); 
		  	$users = $result->num_rows;
		  	echo "RESULTS : <br><br>";
		  	if($users>0)
		  	{
		  		$query="select * from candidate where contestElection ='{$_SESSION["data"]}'";
			  	$result   = $conn->query($query);
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
					echo "No results.<br><br>";
				}

		  	}

		  	else
		  	{
		  		echo "Check later , results not available yet.<br><br>";
		  	}
		  	
	}



?>
</div>
</body>
</html>





