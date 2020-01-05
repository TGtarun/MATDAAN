<!DOCTYPE html>
<html>
<head>
	<title>Vote9</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyl">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="vote3.php" id="xy">Home</a></li>
				<li><a href="#" id="xy">About</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="#" id="xy">Contact</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="vote8.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<div class="div3">
	<p class="para3">
	
<?php
session_start();
if(($_SESSION["uid"] && $_SESSION["upass"]&&$_SESSION["data"]&&isset($_GET["datac"]) )) //session[data] election name get[datac]=cand id
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select *from voterlist where (username ='{$_SESSION["uid"]}' && elecname='{$_SESSION["data"]}' && flag= 0)";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	if($users==0)
		  	{
		  		echo "Already Voted. Cant vote Again.<br>";
		  	}
		  	else
		  	{
		  		$h=$_SESSION["data"];
		  		$query="UPDATE voterlist SET flag='1' where username ='{$_SESSION["uid"]}' && elecname='{$_SESSION["data"]}'";  
		  		$result   = $conn->query($query);
		  		if(!$result) echo "hello";
		  		$query="select * from candidate where adhaar ='{$_GET["datac"]}'";
		  		$result   = $conn->query($query);
		  		$row = $result->fetch_array(MYSQLI_NUM);
	            $r12 = htmlspecialchars($row[12]);
	            $num=(int)$r12+1;
		  		$query="UPDATE candidate SET votes='$num' where adhaar ='{$_GET["datac"]}'";  
		  		$result   = $conn->query($query);
		  		echo "vote casted.<br>Thankyou";
		  	}
		  	
		  	
		}

?>
</p>
</div>
</body>
</html>

