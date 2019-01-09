<!DOCTYPE html>
<html>
<head>
	<title>test homepage</title>
</head>
<body>
	<link rel="stylesheet" href="includes/dragDrop.css" />
	<?php

		session_start();
		if(empty($_SESSION['user'])){
			header('location: logout.php');
		}
		if(file_exists("uploads/".$_SESSION['user']."/") == 0){
			mkdir("uploads/".$_SESSION['user']."/");
		}
	?>
	<form method="post" action="logout.php">
		<input type="submit" name="logout" value="logout">
	</form>
	<form method="post" action="workPage.php">
		<input type="submit" name="work" value="I Want To Work">
	</form>
	<!-- <form action="upload.php" method="post" enctype="multipart/form-data">

	    <input type="file" name="uploaded_file" id="fileToUpload" >

	</form> -->
	<div id="upload">
	<form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">

	<fieldset>
	<legend></legend>

	<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

			<div>
				<label for="fileselect">Files to upload:</label>
				<input type="file" id="fileselect" name="fileselect" multiple="multiple" />
				<div id="filedrag">or drop files here</div>
			</div>


				<button type="submit" name="submit">Upload Files</button>


			</fieldset>

			</form>
			<div id="messages">
			<p>Status Messages</p>
			</div>
		</div>
			<script src="includes/dragDrop.js"></script>

</body>
</html>
