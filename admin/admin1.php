<!DOCTYPE html>
<html>
<head>
	<title>admin1</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body5">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="#" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
			</ul>
		</nav>
	</div>
	<h1 class="h1"> ADMIN DASHBOARD</h1>
	<div class="div6">
		<?php
		session_start();
		 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
		echo <<<_END
	<form action="admin2.php" method="post">
		CREATE ELECTIONS:
		<p>ELECTION NAME - <input type="text" name="name" placeholder="Enter Election Name" required="required"></p><br>
		<p>START Date -    <input type="date" name="sd" placeholder="yyyy-mm-dd hh:mm:ss" required="required"></p><br>
		<p>START TIME -      <input type="time" name="st" placeholder="yyyy-mm-dd hh:mm:ss" required="required"></p><br>
		<p>END Date -    <input type="date" name="ed" placeholder="yyyy-mm-dd hh:mm:ss" required="required"></p><br>
		<p>END TIME -      <input type="time" name="et" placeholder="yyyy-mm-dd hh:mm:ss" required="required"></p><br>
		<input type="submit" name="go">
	</form>
</div>
	
	<div class="div7">
	<a href="admin3.php">Verify Candidate</a><br>
	<a href="admin10.php">Verify Election Request</a><br>
	<a href="admin12.php">Show voter List</a><br>
	<a href="admin5.php">Show elections</a><br>
	<a href="../logout.php">LogOut</a><br><br>
</div>
_END;
}
	?>
</body>
</html>