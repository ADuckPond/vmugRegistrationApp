<?php
	include('session.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>VMUG Checkin</title>
	<link rel="stylesheet" type="text/css" href="../css/adminCss.css" />
	<link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
</head>

<body>
	<div id="top">
		<a href="index.html">
			<img id="vmugPeople" src="../images/vmugPeople.png" />
		</a>
		<a href="admin.html">
			<button type="button" id="admin">
				<p id="adminTxt">administration</p>
			</button>
		</a>
	</div>
	<div id="content">
        <div id="pageTitleDiv">
        	<p class="pageTitle">Admin Page</p>
		</div>
		<div id="buttonContainer">
			<div class="navBar" id="topNavButton">
				<p>Import</p>
			</div>
			<div class="navBar">
				<p>Export</p>
			</div>
			<div class="navBar">
				<p>Reset</p>
			</div>
			<div class="navBar">
				<p>Test Print</p>
			</div>
			<a href="logout.php">
				<div class="navBar" id="logoutButton">
					<p>Logout</p>
				</div>
			</a>
		</div>
		<div id="phpContent">
			
		</div>
    </div>
</body>
</html>