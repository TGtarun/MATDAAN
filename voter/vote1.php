<!DOCTYPE html>
<html>
<head>
	<title>vote1</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body2">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="index.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="index.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<h1 class="h1">VOTER REGISTER</h1>
	<div class="div2">
	<form action="vote2.php" method="post">
		NAME <input type="text" name="name" placeholder="Enter your name" required="required"><br>
		MOBILE NO. <input type="text" name="mobile" placeholder="Enter Mobile" required="required" ><br>
		SEX <input type="text" name="sex" placeholder="Enter M/F/O" required="required"><br>
		AGE <input type="text" name="age" placeholder="Enter Age>=18" required="required"><br>
		ADDRESS <input type="text" name="address" placeholder="Enter Address" required="required"><br>
		ID NO. <input type="text" name="aadhar" placeholder="Enter Unique ID" required="required"><br>
		CREATE PASS- <input type="password" name="pass" placeholder="Create own password" required="required"><br>
		<input type="submit" name="go" value="Register">
		</pre>
	</form>
</div>

	
	

</body>
</html>