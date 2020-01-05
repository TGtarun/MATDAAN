<!DOCTYPE html>
<html>
<head>
	<title>cand8</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body4">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="cand3.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="cand3.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<h1 class="h1">EDIT PROFILE</h1>
		<div class="divback">
	<a href="cand3.php">Go Back</a><br>
</div>
	<div class="div4">
	<form action="cand9.php" method="post">
		AGE <input type="text" name="age" ><br>
		MOBILE NO. <input type="text" name="mobile" ><br>
		ADDRESS <input type="text" name="address" ><br>
		SLOGAN <input type="text" name="slogan" ><br>
		CREATE PASS<input type="password" name="pass" ><br>
		<input type="submit" name="go" value="Edit profile">
	</form>
</div>
</body>
</html>