<?php
	include('session.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>VMUG Checkin</title>

	<link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/adminCss.css">
	<link rel="stylesheet" type="text/css" href="css/commonCss.css">
</head>

<body>
	<div id="top">
		<a href="index.html">
			<img id="vmugPeople" src="images/vmugPeople.png" />
		</a>
		<a href="adminLogin.html">
			<div id="adminLoginButton">
				<div id="leftWrap">
					<p id="adminText">ADMIN</p>
				</div>
				<div id="rightWrap">
					<img id="adminLogin" src="images/adminLogin.png" />
				</div>
			</div>
    	</a>
	</div>
	<div id="content">
        <div id="pageTitleDiv">
        	<p class="pageTitle">Admin Page</p>
		</div>
		<div id="buttonContainer">
			<div class="navBar popup" id="topNavButton" onclick="importPopupFunction()">
				<p class="navText">Import</p>
				<span class="card-header popupText" id="importPopup">
					<form action="/php/adminButtons.php" method="post">
                        <input type="'file'" name="importFile" placeholder="Click here to browse to the file..."/><br/><br/>
                        <button id="loginButton" type="Submit" name="Submit" value="Submit">Import</button>
                    </form>
				</span>
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

<script type="text/javascript">
	function importPopupFunction(){
		var popup = document.getElementById("importPopup");
		popup.classList.toggle("show");
	}
</script>

</body>
</html>