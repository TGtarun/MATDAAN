<!DOCTYPE html>
<html>
<head>
	<title>admin2</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodya">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="admin1.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="admin1.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<div class="div3">
	<p class="para3">
	
<?php
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
if(isset($_POST["go"]))
{
	if(!($_POST["name"] &&$_POST["ed"] &&$_POST["et"] && $_POST["sd"] && $_POST["st"]))
	{
		echo "Please fill all credentials";
	}

	else
	{
		require_once '../login.php';
	  	$conn = new mysqli($hn, $un, $pw, $db);
	  	if ($conn->connect_error) die("Fatal Error");
	  	$query="select * from election where name ='{$_POST["name"]}'";
	  	$result   = $conn->query($query);
	  	$users = $result->num_rows;
	  	if($users!=0)
	  	{
	  		echo "Election Already Exists.<br>";
	  	}
	  	else
	  	{
	  		$a= $_POST["name"];
	  		$b=$_POST["sd"];
	  		$c=$_POST["st"];
	  		$d=$_POST["ed"];
	  		$e=$_POST["et"];
	  		$c.=":00";
	  		$e.=":00";
	  		$b.=" ";
	  		$d.=" ";
	  		$b.=$c;
	  		$d.=$e;
	  		$start = strtotime($b);
			$end = strtotime($d); 
		  	if(date('Y-m-d H:i:s', $end) > date('Y-m-d H:i:s', $start))
		  	{
		  		$query = "INSERT INTO election VALUES('{$a}','{$b}','{$d}')";
		    	$result   = $conn->query($query);
		    	if (!$result) echo "Creation Failed<br><br>";
		    	else
		    	{
		    		echo "Election created successfully.<br>";
		    	}
		  	}

		  	else
		  	{
		  		echo "End time should be greater than start time.<br>";
		  	}
	  		

	  	}
	}
}
}
?>
</p>
</div>
</body>
</html>





