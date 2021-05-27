<?php
	session_start();

	$GLOBALS["dbConnection"] = new mysqli("localhost", "root", "", "jobsboard");

	function arrayResultFromQuery($sql) {
		$array = [];
		if ($queryResult = $GLOBALS["dbConnection"]->query($sql)) {
			while ($row = $queryResult->fetch_assoc()) {
				$array[] = $row;
			}
		}
		return $array;
	}

	if(isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$user = arrayResultFromQuery(
			"SELECT * FROM admins
			WHERE username = '$username'"
		);
		
		if(empty($user)){
			die("Error! Wrong username or password!");
		}
		else{
			$passwordHash = $user[0]["password_hash"];
			if(password_verify($password, $passwordHash)){
				$_SESSION["username"] = $username;
				header("Location: dashboard.php");
			}
			else{
				die("Error! Wrong username or password!");
			}
		}	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="#">Login</a></h1>
		</header>

		<ul class="jobs-listing">	
            <li class="job-card">
                <form method="post">
                    <p>Username: <input type="text" name="username"></p>
                    <p>Password: <input type="password" name="password"></p>
					<p><input type="submit" name="login" value="LOGIN"></p>
                </form>
            </li>
		</ul>

		<p><a href="index.php">Job Offers</a></p>
		<p><a href="login.php">Login</a></p>
		<p><a href="dashboard.php">Dashboard</a></p>
		<p><a href="submit_offer.php">Submit offer</a></p>
		<p><a href="register.php">Register</a></p>
		
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