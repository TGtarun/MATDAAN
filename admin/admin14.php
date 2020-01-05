<!DOCTYPE html>
<html>
<head>
	<title>admin14</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodyp">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="admin1.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="admin13.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divp">
<?php
//shows election
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
if($_SESSION["voterid"])
		{
require_once '../login.php';
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die("Fatal Error");
	$query="select * from election";  //change sign of less than or greater than
	$result   = $conn->query($query);
	$users = $result->num_rows;
	echo "<br>ALL ELECTION:<br><br>";
	if($users>0)
	{
		echo "<table border='1' id= results>
					<tr>
					<th>SR.NO</th>
					<th>Election</th>
					<th>Start time</th>
					<th>End time</th>
					<th>flag</th>
					<th>Approve</th>
					</tr>";
		for($i=0;$i<$users;$i++)
    	{
	    	$row = $result->fetch_array(MYSQLI_NUM);
	    	$r0 = htmlspecialchars($row[0]);
	    	$r1 = htmlspecialchars($row[1]);
			$r2 = htmlspecialchars($row[2]);
			echo "<tr>";
					    echo"<td>". ($i+1)."</td>";
					    echo"<td>". $r0."</td>";
					    echo"<td>". $r1."</td>";
					    echo "<td>" .$r2. "</td>";
					    $query1="select * from voterlist where elecname='{$r0}' AND username='{$_SESSION["voterid"]}'";  //change sign of less than or greater than
						$result1   = $conn->query($query1);
						$users1 = $result1->num_rows;
						if($users1==0)
						{
							 echo "<td>" .'0'. "</td>";	
						}
						else
						{
							echo "<td>" .'1'. "</td>";	
						}

						 echo "<td>" ."<a href='admin15.php?data=".$r0."'>Set</a>". "</td>";
					    echo "</tr>";
		            }

		            echo '</table>';
		}

    else
    {
    	echo "NO Available Election.<br><br>";
    }
}
		
}

?>
</div>
</body>
</html>