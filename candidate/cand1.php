<!DOCTYPE html>
<html>
<head>
	<title>cand1</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body4">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="index.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
			</ul>
		</nav>
	</div>
<h1 class="h1">CANDIDATE REGISTER</h1>
	<div class="div4">
	<form action="cand2.php" method="post">
		NAME <input type="text" name="name" required="required"><br>
		AGE <input type="text" name="age" required="required"><br>
		SEX <input type="text" name="sex" required="required"><br>
		MOBILE NO. <input type="text" name="mobile" required="required"><br>
		ADDRESS <input type="text" name="address" required="required"><br>
		ID NO. <input type="text" name="aadhar" required="required"><br>
		SLOGAN <input type="text" name="slogan" required="required"><br>
		CREATE PASS<input type="password" name="pass" required="required"><br>
		<input type="submit" name="go" value="Register">
	</form>
</div>

	<div class="div5">
<form action="cand2.php" method="post">
REQUEST ID<input type="text" name="rid" required="required">
PASSWORD<input type="password" name="pass" required="required">
<input type="submit" name="check">
</form>
</div>
<div class="divback">
	<a href="index.php">Go Back</a><br>
</div>

</body>
</html>