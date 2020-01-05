<!DOCTYPE html>
<html>
<head>
	<title>admin4</title>
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
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="admin3.php" id="xy">Go Back</a></li>
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
		$requestNo=$_SESSION["data"];
		require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$g=rand();
	  	$query="UPDATE candidate SET userID = '$g', verified='1'  WHERE requestNo =$requestNo";
	  	$result   = $conn->query($query);
	  	if(!($result))  echo "not possible1";
	  	$h=$_POST["comment"];
	  	$query1="UPDATE request SET comment = '$h' where candidateID =$requestNo";
	  	$result1   = $conn->query($query1);
	  	if(!($result1))  echo "not possible2";

	  	$query3="select * from candidate where requestNo =$requestNo";
	  	$result   = $conn->query($query3);
	  	$users = $result->num_rows;
	  	for ($j = 0 ; $j < $users ; ++$j)
		{
		    $row = $result->fetch_array(MYSQLI_NUM);
		    $r0 = htmlspecialchars($row[0]);
		    $r1 = htmlspecialchars($row[1]);
		    $r2 = htmlspecialchars($row[2]);
		    $r3 = htmlspecialchars($row[3]);
		    $r4 = htmlspecialchars($row[4]);
		    $r5 = htmlspecialchars($row[5]);
		    $r9 = htmlspecialchars($row[9]);
		    $query = "INSERT INTO voter VALUES('{$r0}','{$r3}','{$r2}' ,'{$r1}','{$r4}','{$r5}','{$g}','{$r9}')";
		    $result   = $conn->query($query);
		    if (!$result) echo "Not possible<br><br>";
		}
	  	header("Location: admin3.php");

	}
	else
	{
		$requestNo=$_SESSION["data"];
		require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
		$h=$_POST["comment"];
		$query1="UPDATE request SET comment = '$h' where candidateID =$requestNo";
	  	$result1   = $conn->query($query1);
	  	header("Location: admin3.php");
	}


}

 if(isset($_GET["data"]))
    {
        $data = $_GET["data"];
        require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="select * from candidate where requestNo =$data";
	  	$result   = $conn->query($query);
	  	$users = $result->num_rows;
	  	echo "<br>CANDIDATE PROFILE:<br><br>";
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
		    $r10 = htmlspecialchars($row[10]);
		    echo "*Name- ".$r0."<br>*Age- ".$r1."<br>*Sex- ".$r2."<br>*Mobile- ".$r3."<br>*ID- ".$r5."<br>*Slogan- ".$r5."<br>*Address- ".$r4."<br>*Election Participate- ".$r10."<br><br><br>";
		}
		$_SESSION["data"] = $data;
		
    }

    }
?>
<form action="admin4.php" method="post" id="frm1">
    Write Comment <input type="text" name="comment">
    <input type="submit" name="set" value="write">
 </form>
 <br>
 <pre>
</div>
</body>
</html>











