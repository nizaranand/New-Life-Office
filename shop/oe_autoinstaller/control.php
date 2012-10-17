<?php

session_start();

include "autoinstaller.php";

if (file_exists("extend.php")){
	
	include "extend.php";
	$aut = new AutoInstallerExtended();
	
} else {	

	$aut = new AutoInstaller();

}


if (!isset($_SESSION[$aut->autoinstaller_dir]))
	$_SESSION[$aut->autoinstaller_dir] = 0;	
	 
	 
if (isset($_POST['action']) && $_SESSION[$aut->autoinstaller_dir] != $_POST['unique']) {
	
	switch ((string) $_POST['action']) {
		case "Install" : $aut->install(); break;
		case "Retry" : $aut->retry(); break;
		case "Skip" : $aut->skip(); break;
		case "Uninstall" : $aut->uninstall(); break;		
		case "Save the File" : $aut->save_and_continue($_POST['file_content']); break;				
   }
   
   $_SESSION[$aut->autoinstaller_dir] = $_POST['unique'];
	   
} else {
	
   if (isset($aut->unxml->result->message))
	   $aut->message = $aut->unxml->result->message;
	
   if (isset($aut->unxml->result->errortype))		
		$aut->errortype = $aut->unxml->result->errortype;
		
}	
	
	
?>

<html>
<head>
<title>AutoInstaller</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
</head>
<body>

<?php

if (isset($_GET['action']) && $_GET['action'] == "Edit_Manually") {
	
?>

	<form method="post" action="index.php">
	<center>
		<textarea name="file_content" cols="120" rows="25" wrap="off"><?php  echo htmlspecialchars(file_get_contents(AutoInstaller::catalog_dir . $aut->unxml->result->filetoopen)); ?></textarea>
		<br><br>
		<input type="submit" name="action" value="Save the File">
	</center>
	</form>
<?php

} elseif (isset($_POST['action']) && $_POST['action'] == "Save the File") {
	
?>

	<br><br><br>
	The file was successfully saved. Click here to <a href="javascript:window.close();">close the window</a>. Then click the "Skip" button in the main window to continue installation.
	
<?php

} else {	

?>
	<form method="post">
<?php

	if (isset($aut->message)) { 
	
			echo $aut->message ;
?>
			<center><br><br><br>
<?php					
			if (isset($aut->errortype)) {
?>
					<input type="submit" name="action" value="Retry">
<?php
					if ($aut->errortype == 3) {
?>	
						<input type="submit" name="action" value="Edit Manually" onclick="window.open('index.php?action=Edit_Manually','remote','scrollbars=1,width=900,height=500,top=100,left=100');return false;">
<?php  
					}
										
					if ($aut->errortype > 2) {		
?>
						<input type="submit" name="action" value="Skip">
<?php  
					}
						
			}

?>
			<input type="submit" name="action" value="Uninstall">
			<br><br><br></center>						
<?php 		
					
			if (!isset($aut->errortype))
				echo $aut->xml->after_installation_message;
						
	} else { 
		
?>
			<center><br><br><br>
<?php				
			echo $aut->xml->before_installation_message;
?>
			<br><br><br>
			<input type="submit" name="action" value="Install">
			</center>	
<?php 	
	}
?>

	<input type="hidden" name="unique" value="<?php echo $_SESSION[$aut->autoinstaller_dir] + 1;?>">
	</form>
	
<?php 
} 
?>

</body>
</html>