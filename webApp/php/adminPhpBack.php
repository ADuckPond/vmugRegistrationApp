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
			<img id="vmugPeople" src="../images/vmugPeople.png" />
		</a>
		<span class="popupAlert">
			<h4>TEST</h4>
		</span>
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
			<div class="navBar popup" id="topNavButton">
				<div id="importTextContainer">
					<p class="navText">Import</p>
				</div>
				<span class="popupText" id="importPopup">
					<div class="text-center" id="importForm">
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
									<button id="importButton" type="Submit" name="import" value="import"><p>Import</p></button>
								</div>
                    		</form>
						</div>
					</div>
				</span>
			</div>
			<div class="navBar navTextNoImport">
				<form class="navForms" method="post">
					<button id="exportButton" class="navButtons" type="Submit" name="Submit" value="export"><p>Export</p></button>
				</form>
			</div>
			<div class="navBar navTextNoImport">
				<form id="reset" class="navForms" method="post">
					<button id="resetButton" class="navButtons" type="Submit" name="reset" value="reset"><p>Reset</p></button>
				</form>
			</div>
			<div class="navBar navTextNoImport">
				<form class="navForms" method="post">
					<button id="exportButton" class="navButtons" type="Submit" name="theme" value="theme"><p>Theme</p></button>
				</form>
			</div>
			<div class="navBar navTextNoImport">
				<form class="navForms" method="post">
					<button id="exportButton" class="navButtons" type="Submit" name="testPrint" value="testPrint"><p>Printer Test</p></button>
				</form>
			</div>
			<a href="logout.php">
				<div class="navBar navTextNoImport" id="logoutButton">
					<p>Logout</p>
				</div>
			</a>
		</div>
		<div id="phpContent">
			
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