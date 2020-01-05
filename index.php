<!DOCTYPE html>
<html>
<head>
	<title>ONL VOTE</title>
	<link rel="stylesheet" href="./css/stylefp.css">
</head>
<body class="body1">
	<div id="main">
		
		<nav>
		<img src="./images/my.png" height="50" width="150">
			<ul>
				<li><a href="#" id="xy">Home</a></li>
				<li><a href="./nav_bar/about.html" id="xy">About</a></li>
				<li><a href="./nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
			</ul>
		</nav>
		<h1 class="h1">ONLINE VOTING APPLICATION</h1>
	</div>
	
	<div class="div1">
	<form action="login1.php" method="post">
		USERNAME <input type="text" name="id" required="required"><br>
		PASSWORD <input type="password" name="pass" required="required"><br>
		<input type="radio" name="choose" value="voter" required="required">VOTER<br>
		<input type="radio" name="choose" value="candidate" required="required">CANDIDATE<br>
		<input type="radio" name="choose" value="admin" required="required">ADMIN<br>
		<input type="submit" name="login">
	</form>
<pre>
<a href="./voter/vote1.php">VOTER REGISTER</a>   <a href="./candidate/cand1.php">CANDIDATE REGISTER</a>
</pre>
<div>
</body>
</html>
