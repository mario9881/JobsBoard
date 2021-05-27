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
	
	if(isset($_POST["logout"])){
		session_destroy();

		header("Location: index.php");
	}

	$allOffers = arrayResultFromQuery(
		"SELECT * FROM offers 
		 JOIN companies 
		 ON offers.companyName = companies.name
		 WHERE offers.status = 'approved'"
	);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
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
			<?php foreach($allOffers as $offer) { ?>
			
				<li class="job-card">
					<div class="job-primary">
						<h2 class="job-title"><a href="#"><?php echo $offer["title"]; ?></a></h2>
						<div class="job-meta">
							<a class="meta-company" href="#"><?php echo $offer["companyName"]; ?></a>
							<span class="meta-date">Posted 14 days ago</span>
						</div>
						<div class="job-details">
							<span class="job-location"><?php echo $offer["location"];?></span>
							<span class="job-type"><?php echo $offer["jobType"]; ?></span>
						</div>
					</div>
					<div class="job-logo">
						<div class="job-logo-box">
							<img src="https://i.imgur.com/ZbILm3F.png" alt="">
						</div>
					</div>
				</li>

			<?php } ?>
		</ul>

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