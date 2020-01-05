<!DOCTYPE html>
<html>
<head>
	<title>vote11</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body4">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="vote3.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="vote3.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<h1 class="h1">EDIT PROFILE</h1>
		<div class="divback">
	<a href="vote3.php">Go Back</a><br>
</div>
	<div class="div4">
	<form action="vote12.php" method="post">
		AGE <input type="text" name="age" ><br>
		MOBILE NO. <input type="text" name="mobile" ><br>
		ADDRESS <input type="text" name="address" ><br>
		CREATE PASS<input type="password" name="pass" ><br>
		<input type="submit" name="go" value="UPDATE">
	</form>
</div>
</body>
</html>