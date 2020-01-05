<!DOCTYPE html>
<html>
<head>
	<title>Vote9</title>
	<link rel="stylesheet" href="./css/stylefp.css">
</head>
<body class="bodyl">
	<div id="main">
		<nav>
		<img src=".images/my.png" height="50" width="150">
			<ul>
				<li><a href="index.php" id="xy">Home</a></li>
				<li><a href="#" id="xy">About</a></li>
				<li><a href="Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="#" id="xy">Contact</a></li>
				<li><a href="index.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<div class="div3">
	<p class="para3">
	
<?php

session_start();
if(isset($_POST["login"]))
{
	if(!($_POST["id"] && $_POST["pass"] && $_POST["choose"]))
	{
		echo "Please fill all credentials<br>";
	}

    else
    {

	if($_POST["choose"]=='voter')
	{
		$_SESSION["uid"] = $_POST["id"];
		$_SESSION["upass"] = $_POST["pass"];
		require_once 'login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="select * from voter where userid ='{$_POST["id"]}' AND pass ='{$_POST["pass"]}'";
	  	$result   = $conn->query($query);
	  	$users = $result->num_rows;
	  	if($users==1)
	  	{
	  		header("Location: ./voter/vote3.php");
	  	}
	  	else
	  	{
	  		echo "Fill Data Not Correct.<br><br>";
	  	}

	}

	if($_POST["choose"]=='candidate')
	{
		$_SESSION["uid"] = $_POST["id"];
		$_SESSION["upass"] = $_POST["pass"];
		require_once 'login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="select * from candidate where userID ='{$_POST["id"]}' AND password ='{$_POST["pass"]}'";
	  	$result   = $conn->query($query);
	  	$users = $result->num_rows;
	  	if($users==1)
	  	{
	  		header("Location: ./candidate/cand3.php");
	  	}
	  	else
	  	{
	  		echo "Fill Data Not Correct.<br><br>";
	  	}

	}

	if($_POST["choose"]=='admin')
	{
		if(($_POST["id"]=='admin' && $_POST["pass"]=='admin'))
		{
			$_SESSION["uid"] = $_POST["id"];
			$_SESSION["upass"] = $_POST["pass"];
			header("Location: ./admin/admin1.php"); 
		}
		else
	  	{
	  		echo "Fill Data Not Correct.<br><br>";
	  	}

	}
}


}
?>
</p>
<a href="index.php">Go back</a><br>
</div>
</body>
</html>



