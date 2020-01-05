<!DOCTYPE html>
<html>
<head>
	<title>admin16</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body4">
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
				<li><a href="admin6.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<h1 class="h1">EDIT ELECTION</h1>
	<div class="div4">
	<?php
	session_start();
	 if($_SESSION["uid"]&& $_SESSION["upass"])
  {echo <<<_END
	
	
	<form action="admin17.php" method="post">
		Start Date <input type="date" name="sd" ><br>
		Start Time <input type="time" name="st" ><br>
		End Date <input type="date" name="ed" ><br>
		End Time <input type="time" name="et" ><br>
		<input type="submit" name="go" value="Update">
	</form>

_END;
}
?>
</div>
</body>
</html>