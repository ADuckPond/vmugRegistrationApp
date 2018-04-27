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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/adminCss.css">
	<link rel="stylesheet" type="text/css" href="../css/commonCss.css">
	<link rel="stylesheet" type="text/css" href="../css/blueTheme.css" id="theme">

	<script src="../js/jquery-3.2.1.min.js"></script>
</head>

<body>
	<div id="top">
		<a href="../index.html">
			<div id="homeButton">
				<div id="homeImg">
					<img id="homeLogo" src="../images/homeLogo.png" />
				</div>
				<div id="homeIcon">
					<p id="homeColor">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewbox="0 0 20 17">
							<path d="M15.45,7L14,5.551V2c0-0.55-0.45-1-1-1h-1c-0.55,0-1,0.45-1,1v0.553L9,0.555C8.727,0.297,8.477,0,8,0S7.273,0.297,7,0.555  L0.55,7C0.238,7.325,0,7.562,0,8c0,0.563,0.432,1,1,1h1v6c0,0.55,0.45,1,1,1h3v-5c0-0.55,0.45-1,1-1h2c0.55,0,1,0.45,1,1v5h3  c0.55,0,1-0.45,1-1V9h1c0.568,0,1-0.437,1-1C16,7.562,15.762,7.325,15.45,7z"></path>
						</svg>
					</p>
				</div>
			</div>
		</a>
		<a href="../adminLogin.html">
			<div id="adminLoginButton">
				<div id="leftWrap">
					<p id="adminText">ADMIN</p>
				</div>
				<div id="rightWrap">
					<img id="adminLogin" src="../images/adminLogin.png" />
				</div>
			</div>
    	</a>
	</div>
	<div id="content">
		<div id="buttonContainer">
			<div class="navBar navTextNoImport">
				<form id="raffleForm" class="navForms" method="post">
					<button id="raffleButton" class="navButtons" type="Submit" name="raffle" value="raffle"><p>Start Raffle</p></button>
				</form>
			</div>
			<a href="logout.php">
				<div class="navBar navTextNoImport" id="logoutButton">
					<p>Logout</p>
				</div>
			</a>
		</div>
		<div id="phpContent">
			<div id="widgetCont">
				<div class="raffleDefault">
					<div class="card text-center formDef" id="">
						<h3 class="card-header" id="formHeader">Click Raffle to pick a winner!</h3>
					</div>
				</div>
			</div>
			<div class="raffleWin" id="raffleWinner">
				<a href="javascript:void(0)" id="raffleClose" class="closeBtn">&times;</a>
				<div class="card text-center formDef" id="">
					<h3 class="card-header" id="formHeader">CONGRATULATIONS!</h3>
					<div id="winnerResult">

					</div>
				</div>
			</div>
			<div id="raffle">
				<div id="raffleLabel">
					<p id="raffleHeader"> Raffle Winners </p>
				</div>
				<div id="winnerList">
					<?php
						$winnersQuery = "SELECT * FROM winners ORDER BY lastname ASC";
						$winnersResult=pg_query($db,$winnersQuery);

						while($row=pg_fetch_array($winnersResult)){
										
							$label="";
							$checkVal="";

							if($row['enabled'] == 't'){
								$checkVal="checked";
							}

							$winner = "<p>" .$lastName. ", " .$firstName. "</p>";
							$input = "<input type='radio' name='radio' id='" .$row['theme']. "' value='" .$row['theme']. "'" .$checkVal. ">";

							echo $winner;
						}
					?>
				</div>
			</div>
		</div>
    </div>

<script src="../js/phpTheme.js"></script>
<script src="../js/admin.js"></script>
<script type="text/javascript">

	var inputs=document.querySelectorAll('.inputFile');
	Array.prototype.forEach.call(inputs,function(input){
		var label = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener('change',function(e){
			var filename = '';
			if(this.files && this.files.length > 1)
				fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
			else
				fileName = e.target.value.split('\\').pop();

			if(fileName)
				label.querySelector('span').innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
	});
</script>
	
</body>
</html>