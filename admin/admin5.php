<!DOCTYPE html>
<html>
<head>
	<title>admin5</title>
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
				<li><a href="admin1.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divp">
<?php
//shows election
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
date_default_timezone_set('Asia/Kolkata');
require_once '../login.php';
	$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");
	$query="select * from election";  //change sign of less than or greater than
	$result   = $conn->query($query);
	$users = $result->num_rows;
	echo "<br>ALL ELECTION:<br><br>";
	if($users>0)
	{
		$ename=array();
		$estart=array();
		$eend=array();
		$finished=array();
  		$future=array();
  		$ongoing=array();
		for($i=0;$i<$users;$i++)
    	{
    	$row = $result->fetch_array(MYSQLI_NUM);
    	$r0 = htmlspecialchars($row[0]);
    	$r1 = htmlspecialchars($row[1]);
		$r2 = htmlspecialchars($row[2]);
		//echo ($i+1)."<a href='admin6.php?data=".$r0."'>Election Name:  ".$r0." Start: ".$r1."End: ".$r2."</a><br><br><br>";
		array_push($ename,$r0);
		array_push($estart,$r1);
		array_push($eend,$r2);
		$start = strtotime($r1);
		$end = strtotime($r2); 
		$now= date("Y-m-d H:i:s");
		  if(date('Y-m-d H:i:s', $start) > $now)
		  {
		    array_push($future,$i);
		  }

		  else if(date('Y-m-d H:i:s', $end) <$now)
		  {
		  	array_push($finished, $i);
		  }

		  else if(date('Y-m-d H:i:s', $start) <= $now && date('Y-m-d H:i:s', $end) >=$now)
		  {
		  	array_push($ongoing, $i);
		  }
		}
		$now= date("Y-m-d H:i:s");
		echo "ongoing Elections:<br><br>";
		echo "<table border='1' id= results>
			<tr>
			<th>SR.NO</th>
			<th>Election Name</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Details</th>
			</tr>";
        for($i=0; $i<sizeof($ongoing) ; $i++)
        {
        	$r0=$ename[$ongoing[$i]];
        	$r1=$estart[$ongoing[$i]];
        	$r2=$eend[$ongoing[$i]];
        	echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
		    echo"<td>". ($i+1)."</td>";
		    echo"<td>". $r0."</td>";
		    echo"<td>". $r1."</td>";
		    echo"<td>". $r2."</td>";
		    echo "<td>" . "<a href='admin6.php?data=".$r0."& est=".$r1."& eend=".$r2."'>Details</a>" . "</td>";
		    echo "</tr>";	
        }

        echo "</table>";

        echo "<br>future Elections:<br><br>";
        echo "<table border='1' id= results>
			<tr>
			<th>SR.NO</th>
			<th>Election Name</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Details</th>
			</tr>";
        for($i=0;$i<sizeof($future);$i++)
        {
        	$r0=$ename[$future[$i]];
        	$r1=$estart[$future[$i]];
        	$r2=$eend[$future[$i]];
        	echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
		    echo"<td>". ($i+1)."</td>";
		    echo"<td>". $r0."</td>";
		    echo"<td>". $r1."</td>";
		    echo"<td>". $r2."</td>";
		    echo "<td>" . "<a href='admin6.php?data=".$r0."& est=".$r1."& eend=".$r2."'>Details</a>" . "</td>";
		    echo "</tr>";	
        }

        echo "</table>";

        echo "<br>finished Elections:<br><br>";
        echo "<table border='1' id= results>
			<tr>
			<th>SR.NO</th>
			<th>Election Name</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Details</th>
			</tr>";
        for($i=0;$i<sizeof($finished);$i++)
        {
        	$r0=$ename[$finished[$i]];
        	$r1=$estart[$finished[$i]];
        	$r2=$eend[$finished[$i]];
        	echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
		    echo"<td>". ($i+1)."</td>";
		    echo"<td>". $r0."</td>";
		    echo"<td>". $r1."</td>";
		    echo"<td>". $r2."</td>";
		    echo "<td>" . "<a href='admin6.php?data=".$r0."& est=".$r1."& eend=".$r2."'>Details</a>" . "</td>";
		    echo "</tr>";
        }

        echo "</table>";

  		echo "<br><br><br>";
    }

    else
    {
    	echo "NO Available Election.<br><br>";
    }

	}	


?>
</div>
</body>
</html>










