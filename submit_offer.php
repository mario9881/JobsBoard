<?php
	session_start();
	if($_SESSION["username"] == ""){
		header("Location: login.php");
	}

	$GLOBALS["dbConnection"] = new mysqli("localhost", "root", "", "jobsboard");

	if(isset($_POST["submit-form"])) {
		$title = $_POST["job-title"];
		$companyName = $_POST["company-name"];
		$salary = $_POST["salary"];
		$jobType = $_POST["job-type"];

		$GLOBALS["dbConnection"]->query(
			"INSERT INTO offers (title, companyName, salary, jobType)
			VALUES('$title', '$companyName', $salary, '$jobType')"
		);

		header("Location: submit_offer.php");
	}

	if(isset($_POST["logout"])){
		session_destroy();

		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Submit Offer</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="#">Job Offers</a></h1>
		</header>

		<ul class="jobs-listing">	
            <li class="job-card">
                <form method="post">
                    <p>Job Title: <input type="text" name="job-title"></p>
                    <p>Company Name: <input type="text" name="company-name"></p>
                    <p>Job Type: <input type="text" name="job-type"></p>
                    <p>Salary: <input type="number" name="salary"></p>
					<p><input type="submit" name="submit-form" value="Submit offer"></p>
                </form>
            </li>
		</ul>

		<p><a href="index.php">Job Offers</a></p>
		<p><a href="login.php">Login</a></p>
		<p><a href="dashboard.php">Dashboard</a></p>
		<p><a href="submit_offer.php">Submit offer</a></p>
		<p><a href="register.php">Register</a></p>

		<form method="post">
			<input type="submit" name="logout" value="LOGOUT">
		</form>
		
		<footer class="site-footer">
			<p>Copyright 2021 | Developer links: 
				<a href="/edits.html">Edits</a>,
				<a href="/index.html">Home</a>,
				<a href="/single.html">Single</a>
			</p>
		</footer>
	</div>

</body>
</html>