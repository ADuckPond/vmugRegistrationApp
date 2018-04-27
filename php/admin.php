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
			<div class="navBar" id="topNavButton">
				<div class="popup" id="popupImportButton">
					<p class="navText">Import</p>
				</div>
			</div>
			<div class="navBar navTextNoImport">
				<form class="navForms" method="GET" action="../php/export.php">
					<button id="exportButton" class="navButtons" type="Submit" name="export" value="export"><p>Export DB</p></button>
				</form>
			</div>
			<div class="navBar">
				<div class="popup" id="popupResetButton">
					<p class="navText">Reset DB</p>
				</div>
			</div>
			<div class="navBar">
				<div class="popup" id="popupThemeButton">
					<p class="navText">Theme Settings</p>
				</div>
			</div>
			<div class="navBar navTextNoImport">
				<form class="navForms" method="post">
					<button id="exportButton" class="navButtons" type="Submit" name="testPrint" value="testPrint"><p>Printer Test</p></button>
				</form>
			</div>
			<div class="navBar navTextNoImport">
				<form action="raffle.php" class="navForms" method="post">
					<button id="raffleButton" class="navButtons" type="Submit" name="raffle" value="raffle"><p>Raffle</p></button>
				</form>
			</div>
			<a href="logout.php">
				<div class="navBar navTextNoImport" id="logoutButton">
					<p>Logout</p>
				</div>
			</a>
		</div>
		<div class="sideNav" id="importForm">
			<a href="javascript:void(0)" class="closeBtn" id="importClose">&times;</a>
			<div class="card text-center formDef" id="formCont">
				<h3 class="card-header" id="formHeader"> Upload a File </h3>
				<div class="card-block" id="fields">
					<form id="importFileForm" enctype="multipart/form-data" method="post" >
						<div id="fileBrowserLabel">
							<input type="file" name="importFile" id="fileBrowser" class="inputFile" data-multiple-caption="{count} files selected" multiple />
							<label for="fileBrowser" id="fileBrowserFormat">
								<p>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewbox="0 0 20 17">
										<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
									</svg>
									<span>Choose a file...</span>
								</p>
							</label>
						</div>
						<div>
							<button id="importButton" type="Submit" name="import" value="import"><p>Import</p></button>
						</div>
            		</form>
				</div>
			</div>
		</div>
		<div class="sideNav" id="resetForm">
			<a href="javascript:void(0)" id="resetClose" class="closeBtn">&times;</a>
			<div class="card text-center formDef" id="">
				<h3 class="card-header" id="formHeader"> Are you sure you want to reset the database?</h3>
				<div class="card-block" id="">
					<form id="reset" class="navForms" method="post">
						<button id="resetButton" class="navButtons" type="Submit" name="reset" value="reset"><p>Reset DB</p></button>
					</form>
				</div>
			</div>
		</div>
		<div class="sideNav" id="themeForm">
			<a href="javascript:void(0)" id="themeClose" class="closeBtn">&times;</a>
			<div class="card text-center formDef" id="">
				<h3 class="card-header" id="formHeader"> Modify Theme </h3>
				<div class="card-block" id="">
					<form id="themeSettings" enctype="multipart/form-data" method="post">
						<p>Select a color scheme:</p>
						<section class="section">
                            <div class="radioButtons">
								<?php
									$labelQuery = "SELECT * FROM theme ORDER BY theme ASC";
									$labelResult=pg_query($db,$labelQuery);

									while($row=pg_fetch_array($labelResult)){
										
										$label="";
										$checkVal="";

										if($row['enabled'] == 't'){
											$checkVal="checked";
										}

										$input = "<input type='radio' name='radio' id='" .$row['theme']. "' value='" .$row['theme']. "'" .$checkVal. ">";
										$label = "<label id='" .$row['theme']. "Label' class='radioLabel' for='" .$row['theme']. "'><span class='radio'>" .ucfirst($row['theme']). "</span></label><br>"; 
										
										echo $input;
										echo $label;
									}
								?>
							</div>
						</section>
						<hr>
						<p>Select a file to change the admin logo</p>
						<div id="logoBrowserLabel">
							<input type="file" name="logoFile" id="logoBrowser" class="inputFile" data-multiple-caption="{count} files selected" multiple />
							<label for="logoBrowser" id="logoBrowserFormat">
								<p>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewbox="0 0 20 17">
										<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
									</svg>
									<span>Choose a file...</span>
								</p>
							</label>
						</div>
						<hr>
						<p>Select a file to change the home logo</p>
						<div id="logoBrowserLabel">
							<input type="file" name="homeFile" id="homeBrowser" class="inputFile" data-multiple-caption="{count} files selected" multiple />
							<label for="homeBrowser" id="logoBrowserFormat">
								<p>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewbox="0 0 20 17">
										<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
									</svg>
									<span>Choose a file...</span>
								</p>
							</label>
						</div>
						<div>
							<button id="themeButton" type="Submit" name="setTheme" value="setTheme"><p>Set Theme</p></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="sideNav" id="successAlert">
			<a href="javascript:void(0)" id="successClose" class="closeBtn">&times;</a>
			<div class="card text-center formDef" id="">
				<h3 class="card-header" id="formHeader">Successfully uploaded file</h3>
			</div>
		</div>
		<div id="phpContent">
			<div id="widgetCont">

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