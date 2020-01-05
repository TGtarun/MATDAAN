<!DOCTYPE html>
<html>
<head>
	<title>admin12</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
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
<body class="bodyp">
	<br>
<div class="divp">
<?php
//shows voters
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
require_once '../login.php';
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die("Fatal Error");
	$query="select * from voter";  //change sign of less than or greater than
	$result   = $conn->query($query);
	$users = $result->num_rows;
	echo "ALL VOTERS:<br><br>";
	if($users>0)
	{
		echo "<table border='1' id= results>
			<tr>
			<th>SR.NO</th>
			<th>Voter Name</th>
			<th>Voter ID</th>
			<th>Details</th>
			</tr>";
		for($i=0;$i<$users;$i++)
    {
    	$row = $result->fetch_array(MYSQLI_NUM);
    	$r0 = htmlspecialchars($row[0]);
    	$r5=htmlspecialchars($row[5]);
    	$r6=htmlspecialchars($row[6]);
    	echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
		    echo"<td>". ($i+1)."</td>";
		    echo"<td>". $r0."</td>";
		    echo"<td>". $r5."</td>";
		    echo "<td>" . "<a href='admin13.php?data=".$r6."'>Details</a>" . "</td>";
		    echo "</tr>";
    }

    echo "</table>";
}

    else
    {
    	echo "NO Available Voter.<br><br>";
    }

		
}

?>
</div>
</body>
</html>










