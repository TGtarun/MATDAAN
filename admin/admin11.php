<!DOCTYPE html>
<html>
<head>
	<title>admin11</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyo">
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
				<li><a href="admin10.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<div class="divo">
<?php
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
if(isset($_POST["set"]))
{
	if($_POST["comment"]=='completed')
	{
		$userid=$_SESSION['users']['userid'];
		$elec=$_SESSION['users']['elec'];
		require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="UPDATE candidate SET contestElection = '{$elec}' WHERE userID =$userid";
	  	$result   = $conn->query($query);
	  	if(!($result))  echo "not possible1";
	  	$h=$_POST["comment"];
	  	$query1="UPDATE requestElection SET comment = '$h' where userid =$userid";
	  	$result1   = $conn->query($query1);
	  	if(!($result1))  echo "not possible2";
header("Location: admin10.php");

	}
	else
	{
		$userid=$_SESSION['users']['userid'];
		require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
		$h=$_POST["comment"];
		$query1="UPDATE requestElection SET comment = '$h' where userid =$userid";
	  	$result1   = $conn->query($query1);
	  	header("Location: admin10.php");
	}


}

 if(isset($_GET["data"]) && isset($_GET["elec"]))
    {
    	$data=$_GET["data"];
        $_SESSION['users'] = array();
		$_SESSION['users']['userid'] =$_GET["data"] ;
		$_SESSION['users']['elec'] = $_GET["elec"];
        require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="select * from candidate where userid =$data";
	  	$result   = $conn->query($query);
	  	$users = $result->num_rows;
	  	echo "CANDIDATE PROFILE:<br><br>";
	  	for ($j = 0 ; $j < $users ; ++$j)
		{
		    $row = $result->fetch_array(MYSQLI_NUM);
		    $r0 = htmlspecialchars($row[0]);
		    $r1 = htmlspecialchars($row[1]);
		    $r2 = htmlspecialchars($row[2]);
		    $r3 = htmlspecialchars($row[3]);
		    $r4 = htmlspecialchars($row[4]);
		    $r5 = htmlspecialchars($row[5]);
		    $r6 = htmlspecialchars($row[6]);
		    echo "Name- ".$r0."<br>Age- ".$r1."<br>Sex- ".$r2."<br>Mobile- ".$r3."<br>ADDRESS- ".$r4."<br>ID- ".$r5."<br>SLOGAN- ".$r6."<br><br><br>";
		}
		
		
    }
}
    
?>
<form action="admin11.php" method="post" id="frm1">
    Write Comment <input type="text" name="comment">
    <input type="submit" name="set" value="write">
 </form>
</div>
</body>
</html>











