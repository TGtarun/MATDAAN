<!DOCTYPE html>
<html>
<head>
	<title>admin10</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodyn">
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
				<li><a href="admin1.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divn">
<?php
session_start();
  if($_SESSION["uid"]&& $_SESSION["upass"])
  {
		require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="select * from requestElection where comment ='pending'";
	  	$result   = $conn->query($query);
	  	$users = $result->num_rows;
	  	echo "PENDING ELECTION REQUEST<br><br>";
	  	if($users!=0)
	  	{
	  		echo "<table border='1' id= results>
			<tr>
			<th>SR.NO</th>
			<th>USERID</th>
			<th>ELECTION</th>
			<th>Pending</th>
			</tr>";

	  		for ($j = 0 ; $j < $users ; ++$j)
		{
		    $row = $result->fetch_array(MYSQLI_NUM);
		    $r0 = htmlspecialchars($row[0]);
		    $r1 = htmlspecialchars($row[1]);
		     echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
		    echo"<td>". ($j+1)."</td>";
		    echo"<td>". $r0."</td>";
		    echo"<td>". $r1."</td>";
		    echo "<td>" . "<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>" . "</td>";
		    echo "</tr>";

		}
		echo "</table>";
	  	}
	  	
	  	else
	  	{
	  		echo "NO Pending Reqest.<br><br>";
	  	}
}
?>
</div>
</body>
</html>






