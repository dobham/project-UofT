<?php 
	session_start();
	//echo $_SESSION['dir'];
	$dir = getcwd();//"/uploads/".$_SESSION['user']."/".$_SESSION['dir']."/";
	//$options = "";
	if (is_dir($dir)){
  		if ($dh = opendir($dir)){
    		while (($file = readdir($dh)) !== false){
    			if($file != '.' && $file != '..' && $file!="index.php"){
	               // select option with files names
	               //$options = $options."<option>$file</option>";   
	               // display the file names
	               echo $file."<br>";
	            }
	         }
    		closedir($dh);
  		}
	}
	if(isset($_POST['download'])){

		$dir = getcwd();
		if (is_dir($dir)){
	  		if ($dh = opendir($dir)){
	    		while (($file = readdir($dh)) !== false){
	    			if($file != '.' && $file != '..' && $file!="index.php"){
			            if (file_exists($file)) {
						    header('Content-Description: File Transfer');
						    header('Content-Type: application/octet-stream');
						    header('Content-Disposition: attachment; filename="'.basename($file).'"');
						    header('Expires: 0');
						    header('Cache-Control: must-revalidate');
						    header('Pragma: public');
						    header('Content-Length: ' . filesize($file));
						    readfile($file);
						    exit;
						}
		            }
		        }
	    		closedir($dh);
  			}
		}
		

		
	}
?>
    <head>
        
    <title></title>
    </head>
    
    <body>
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"> 
        	<input type="submit" name="download" value="Download All">
        	<input type='submit' name='Homepage' value='Homepage' formaction="/project/homepage.php">
        </form>       
    </body>
