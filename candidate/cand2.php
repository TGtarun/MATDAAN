<!DOCTYPE html>
<html>
<head>
	<title>cand2</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodya">
		<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="cand1.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="cand1.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<div class="div3">
	<p class="para3">
	<?php
	if(isset($_POST["check"]))
	{
		if(!($_POST["rid"] && $_POST["pass"]))
		{
			echo "Please Fill all Credentials.";
		}

		else
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from candidate where requestNO ='{$_POST["rid"]}' && password='{$_POST["pass"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	if($users==0)
		  	{
		  		echo "FILL DATA NOT CORRECT.<br>";
		  	}

		  	else
		  	{
		  		$data = $result->fetch_array(MYSQLI_NUM);
    			$userid = htmlspecialchars($data[8]);
		  		$query="select * from request where candidateID ='{$_POST["rid"]}'";
		  		$result   = $conn->query($query);
		  		$users = $result->num_rows;
		  		if($users==1)
		  		{
		  			    $row = $result->fetch_array(MYSQLI_NUM);
    					$r1 = htmlspecialchars($row[1]);
    					if($r1=='completed')
    					{
    						echo "your userid is ".$userid.".<br>";
    					}
    					echo "Your request is ".$r1;	
		  		}	
		  	}

		}
	}
	if(isset($_POST["go"]))
	{
	if(!($_POST["age"] && $_POST["name"] &&$_POST["mobile"] && $_POST["sex"]&&$_POST["address"] &&$_POST["pass"]&&$_POST["slogan"]&&$_POST["aadhar"]))
		{
			echo "Please Fill all Credentials";
		}

		else if($_POST["age"]<25)
		{
			echo "Minimum Age for Contesting Election is 25.";
		}

		else  //check user already exists or not by quering sql if not insert data and assign random userid
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from candidate where adhaar ='{$_POST["aadhar"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	if($users!=0)
		  	{
		  		echo "Candidate Already Exists.<br>";
		  	}
		  	else
		  	{
		  		$requestno=rand();
		  		$a= $_POST["name"];
		  		$b=$_POST["age"];
		  		$c=$_POST["sex"];
		  		$d=$_POST["mobile"];
		  		$e=$_POST["aadhar"];
		  		$f=$_POST["slogan"];
		  		$g=$requestno;
		  		$h=$_POST["pass"];
		  		$i=$_POST["address"];

		  		$query = "INSERT INTO candidate VALUES('{$a}','{$b}','{$c}' ,'{$d}','{$i}','{$e}','{$f}','{$g}','NULL','{$h}','NULL','0','0')";
		    	$result   = $conn->query($query);
		    	if (!$result) echo "Registeration Failed<br><br>";
		    	else
		    	{
		    		$query = "INSERT INTO request VALUES('{$g}','pending')";
		    		$result   = $conn->query($query);
		    		if (!$result) echo "Request Failed<br><br>";
		    		else
		    		{
		    			echo "Successfully Registered.<br>";
		    			echo "Your Auto Generated requestno is ";
		    			echo $requestno;
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






