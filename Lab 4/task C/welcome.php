<?php 

	session_start();

	if (isset($_SESSION['uname'])) {
		echo "<h2>Welcome ". $_SESSION['uname']. "</h2>";
		echo "<a href='dashboard.php'>Dashboard</a><br>";
		echo "<a href='logout.php'>Logout</a>";
	}else{
		header("location:login.php");
	}

 ?>
