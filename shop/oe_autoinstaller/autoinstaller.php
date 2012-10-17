<?php
//The idea and written by pektsekye@gmail.com on Thursday Jun 25  2009
//version 2.14


class AutoInstaller
{	

	const xml_filename = "install.xml";	
	const unxml_filename = "uninstall.xml";	
	const backup_dir = "backup";
	const files_dir = "files";	
	const catalog_dir = "../";
	const check_dir_if_exists = "admin";
	const path_to_config = "../includes/configure.php";
	
    public $osfile,$osfile_content,$osfopen,$message,$dom,$dom_uninstall,$xml,$unxml,$step,$stepnumber,$autoinstaller_dir;
	
	
	function __construct() {
		
		$this->dom = new DomDocument('1.0');
		$this->dom->preserveWhiteSpace = FALSE;
		$this->dom->load(self::unxml_filename);
		$uninstall = $this->dom->getElementsByTagName('uninstall');
		$this->dom_uninstall = $uninstall->item(0);
		
		$this->xml = simplexml_load_file(self::xml_filename, 'SimpleXMLElement', LIBXML_NOCDATA);
		$this->unxml = simplexml_load_file(self::unxml_filename, 'SimpleXMLElement', LIBXML_NOCDATA);
		
		$directories = explode('/', getcwd());
		$directories = array_reverse($directories);
		
		$this->autoinstaller_dir = $directories[0];
		$catalog_dir = $directories[1];
		
		$not_writable_directories = array();
		$not_writable_files = array();
				
		if (!is_writable(self::backup_dir)){
			
			$not_writable_directories [] = $catalog_dir . '/' . $this->autoinstaller_dir . '/' . self::backup_dir;
			
		}
		
		if (!is_writable(self::unxml_filename)){
			
			$not_writable_files [] = $catalog_dir . '/' . $this->autoinstaller_dir . '/' . self::unxml_filename;
			
		}	
		
		foreach ($this->xml->steps->step as $step) {
			
			switch ((string) $step->action){
				case "copy_file"  :
				
					$dest_path = self::catalog_dir . $step->destname;
					$dest_dir = dirname($dest_path);
					
					if (!file_exists($dest_path)){
						
						if (!is_writable($dest_dir)){
							
							$not_writable_directories [] = dirname($catalog_dir . '/' . $step->destname);
							
						}		
						
					} else {
						
						if (!is_writable($dest_path)){
							
							$not_writable_files [] = $catalog_dir . '/' . $step->destname;
							
						}
						
					}	
					
				break;	
				case "copy_file_if_destination_exists"  :
				
					$dest_path = self::catalog_dir . $step->destname;
					$dest_dir = dirname($dest_path);		
					
					if (!file_exists($dest_path)){	
					
						if (file_exists($dest_dir) && !is_writable($dest_dir)){
							
							$not_writable_directories [] = dirname($catalog_dir . '/' . $step->destname);
							
						}	
						
					} else {
						
						if (!is_writable($dest_path)){
							
							$not_writable_files [] = $catalog_dir . '/' . $step->destname;
							
						}						
						
					}	
					
				break;					
				case "open_file" : 
				
					if (!is_writable(self::catalog_dir . $step->filename)){
						
						$not_writable_files [] = $catalog_dir . '/' . $step->filename;
						
					}	
					
				break;
				case "open_file_if_exists" :
				
					if (file_exists(self::catalog_dir . $step->filename) && !is_writable(self::catalog_dir . $step->filename)){
						
						$not_writable_files [] = $catalog_dir . '/' . $step->filename;
						
					}		
					
				break;																																																			
			}
				
		}	
		

		$not_writable_directories = array_unique($not_writable_directories);
		$number_of_not_writable_directories = count($not_writable_directories);
		$number_of_not_writable_files = count($not_writable_files);
		
		if ($number_of_not_writable_directories > 0 || $number_of_not_writable_files > 0){
			
			echo '<br><br>You should set 777 permissions for:<br><br>';
			
			if ($number_of_not_writable_directories > 0){	
			
				echo '<b>' . $number_of_not_writable_directories . ' director' . ($number_of_not_writable_directories > 1 ? 'ies' : 'y') . ':</b><br>';

				sort($not_writable_directories, SORT_STRING);
				
				foreach ($not_writable_directories as $dir_name){
					
					echo $dir_name . '<br>'; 
					
				}	
			
			}
			
			if ($number_of_not_writable_files > 0){	
			
				echo '<br><b>' . $number_of_not_writable_files . ' file' . ($number_of_not_writable_files > 1 ? 's' : '') . ':</b><br>';
				
				sort($not_writable_files, SORT_STRING);
				
				foreach ($not_writable_files as $file_name){
					
					echo $file_name . '<br>'; 
					
				}	
			
			}			
			
			echo '<br><br>Then refresh the page.<br><br>NOTE: Don\'t forget to change the permissions back at the end of the installation. (755 for the directories and 644 for the files)';			
			exit;
			
		}	
					
		if (!file_exists(self::catalog_dir  . self::check_dir_if_exists)) exit("Cannot find directory '" . self::check_dir_if_exists . "' . Looks like you have uploaded the '" . $this->autoinstaller_dir . "' folder to the wrong directory. Try to move the '" . $this->autoinstaller_dir . "' folder to your store root so it to be on the same level with the 'admin' directory.");
			
		if (@include(self::path_to_config)){
		
			if (@mysql_connect (DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD)){
				
				if (!@mysql_select_db (DB_DATABASE)) exit("Cannot select the database '" . DB_DATABASE . "' .<br>Mysql error: " . mysql_error() . "<br> Try to set the correct database name in the oscommerce configuration file '" . self::path_to_config . "' .");				
				
			} else exit("Cannot connect to the database.<br>Mysql error: " . mysql_error() . "<br> Try to set the correct database login and password in the oscommerce configuration file '" . self::path_to_config . "' .");			
			
		} else exit("Cannot include the oscommerce configuration file '" . self::path_to_config . "'. Check if the file exists and it is not empty. Try to change the configuration file permissions.");

	}	
	
	
	
    function open_file() {

        $this->osfile = $this->step->filename;
		$filepath = self::catalog_dir . $this->step->filename;
		
		if (file_exists($filepath) && is_writable($filepath)){
			
			$this->backup_file();
			
			if (!isset($this->errortype)){	
			
				$this->osfile_content = @file_get_contents($filepath);
				
				if ($this->osfile_content === FALSE){
					
					$this->message = "Cannot read file '" . $this->step->filename . "' . Try to change file permissions and click the \"Retry\" button.";
					$this->errortype = 2;
					
				} else {
					
					if (!$this->osfopen = @fopen($filepath,"w")){	
					
						$this->message = "Cannot open file '" . $this->step->filename . "' for writing. Try to change file permissions and click the \"Retry\" button.";
						$this->errortype = 2;
						
					}
					
				}

			}
		
		} else {
			
			$this->message = "Cannot open file '" . $this->step->filename . "' for writing. Check if the file exists or try to change file permissions and click the \"Retry\" button.";
			$this->errortype = 2;			
			
		}	
		
    }
	
	
	
    function open_file_if_exists() {
		
		$filepath = self::catalog_dir . $this->step->filename;
		
		if (file_exists($filepath))
			$this->open_file();
			
    }	
	
	
	
	function save_file() {

		if (isset($this->osfopen) && $this->osfopen  !== FALSE){
			
			fwrite($this->osfopen,$this->osfile_content);
			fclose($this->osfopen);
			unset($this->osfopen);
			
		 }
		 
    }	
	
	
	
	function backup_file() {
		
		if (!(isset($this->unxml->result->filetoopen) && $this->unxml->result->filetoopen == $this->osfile && $this->unxml->result->errortype > 2)){
			
			$filepath = self::catalog_dir . $this->osfile;				
			$backupfile = preg_replace('/\W/','_',$this->osfile);
				
			if (!file_exists(self::backup_dir . '/' . $backupfile)){
					
				if (@copy($filepath,self::backup_dir . '/' . $backupfile)){
			
						$dom_step = $this->dom_uninstall->appendChild($this->dom->createElement('step'));
						$action = $dom_step->appendChild($this->dom->createElement('action'));
						$action->appendChild($this->dom->createTextNode('restore_backup'));
						$filename = $dom_step->appendChild($this->dom->createElement('filename'));
						$filename->appendChild($this->dom->createTextNode($this->osfile));
						$backupname = $dom_step->appendChild($this->dom->createElement('backupname'));
						$backupname->appendChild($this->dom->createTextNode($backupfile));
						
				} else {
						
						$this->message = "Cannot create backup file '" . $backupfile . "' in the '" . $this->autoinstaller_dir . "/" . self::backup_dir . "' directory. Try to change the backup directory permissions and click the \"Retry\" button.";
						$this->errortype = 1;
						
				}
					
			} else {
					
						$this->message = "The script cannot overwrite the backup files in the '" . $this->autoinstaller_dir . "/" . self::backup_dir . "' directory. Copy all the backup files to your computer then delete them from the server.";
						$this->errortype = 1;				
			}
				
		}
		
    }
	
	
	
	function restore_backup() {

		$filepath = self::catalog_dir . $this->step->filename;	
		$backuppath = self::backup_dir . '/' . $this->step->backupname;
		
        copy($backuppath,$filepath);
	
    }
	
	
	
	function remove_file() {

		$filepath = self::catalog_dir . $this->step->filename;
		
        unlink($filepath);
				
    }	



	function replace() {
		
		if (isset($this->osfopen)){
			
			if (isset($this->step->limit))
				$limit = $this->step->limit;
			else
				$limit = 1;
			
			$content = preg_replace($this->step->pattern,$this->step->replacement,$this->osfile_content,$limit,$count);

			if ($count > 0){
				
				$this->osfile_content = $content;
				
			} else {
				
				$this->message = "Cannot replace: <pre style=\"border: 1px solid #aaaaaa; padding: 5px ;font-size: 8px;\">" . htmlspecialchars($this->step->manual_from) . "</pre> <br><br> with: <pre style=\"border: 1px solid #aaaaaa; padding: 5px ;font-size: 8px;\">" . htmlspecialchars($this->step->manual_to) . "</pre> <br> in the '" . $this->osfile . "' file.<br><br>  Clik the \"Edit Manually\" button to edit the file manually";
				$this->errortype = 3;	
				
			}
		
		}

    }
	
			
		
	function add_to_file() {
		
		if (isset($this->osfopen))
			$this->osfile_content = preg_replace('/(\?\>[\r\n\s]*$|$)/D',$this->step->code . '$0',$this->osfile_content,1);

    }	
	  
	  
	  
	function retry() {
		
		if (isset($this->unxml->result->filetoopen) && $this->unxml->result->errortype > 2){

			$this->step->filename = $this->unxml->result->filetoopen ;
			$this->open_file() ;

		}
		
		$this->install($this->unxml->result->stepnumber);

    }
	
	
	
	function skip() {

		if (isset($this->unxml->result->filetoopen)){
			
			$this->step->filename = $this->unxml->result->filetoopen ;
			$this->open_file() ;
			
		}
		
		$this->install($this->unxml->result->stepnumber + 1);

    }
	
	
	
	function save_and_continue($content) {
				
		$content = str_replace("\r\n","\n",$content);
		
		if (1 == get_magic_quotes_gpc())
			$content = stripslashes($content); 		
	
		$content = htmlspecialchars_decode($content);			
		$filepath = self::catalog_dir . $this->unxml->result->filetoopen;	
		
		$fopen = fopen($filepath,"w");
		fwrite($fopen,$content);
		fclose($fopen);			
	
    }



	function copy_file() {

		$sourcepath = self::files_dir . '/' . $this->step->filename;	
		$destpath = self::catalog_dir . $this->step->destname;		
		
		if (file_exists($destpath)){
			
			$this->osfile = $this->step->destname;
			$this->backup_file();	
		
			if (!isset($this->errortype)){
				
				if (!@copy($sourcepath,$destpath)){
					
					$this->message = "Cannot replace file '" . $this->step->destname . "' . Try to change the file permissions and click the \"Retry\" button.";
					$this->errortype = 4;
					
				}
				
			}
		
		} else {
			
			if (@copy($sourcepath,$destpath)){
				
				$dom_step = $this->dom_uninstall->appendChild($this->dom->createElement('step'));
				$action = $dom_step->appendChild($this->dom->createElement('action'));
				$action->appendChild($this->dom->createTextNode('remove_file'));
				$filename = $dom_step->appendChild($this->dom->createElement('filename'));
				$filename->appendChild($this->dom->createTextNode($this->step->destname));		
				
			} else {
				
				$this->message = "Cannot copy file '" . $this->step->filename . "' to the destination '" . $this->step->destname . "'. Try to change the destination directory permissions and click the \"Retry\" button.";
				$this->errortype = 4;
				
			}
		
		}
		
    }

	
	
	function copy_file_if_destination_exists() {
		
		$destpath = dirname(self::catalog_dir . $this->step->destname);		
		
		if (file_exists($destpath)){		
		
			$this->copy_file();
			
		}
		
	}
	
	
	
	function run_query() {

		if (isset($this->step->query) && !@mysql_query($this->step->query)){
			
			$this->message = "<b>Cannot run MySql query:</b><br><i>" . htmlspecialchars($this->step->query) . "</i> ; <br><b>Mysql error:</b>" . mysql_error() . "<br><br>Use phpMyadmin to run this query. Then click \"Skip\" button to continue installation.";
			$this->errortype = 4;	
			
		}	

		if (isset($this->step->unquery) && !isset($this->errortype)){
			
			$dom_step = $this->dom_uninstall->appendChild($this->dom->createElement('step'));
			$action = $dom_step->appendChild($this->dom->createElement('action'));
			$action->appendChild($this->dom->createTextNode('un_run_query'));
			$query = $dom_step->appendChild($this->dom->createElement('query'));
			$query->appendChild($this->dom->createCDATASection($this->step->unquery));	
			
		}	
		
    }
	
	
	
	function un_run_query() {

		if(!@mysql_query($this->step->query)) echo mysql_error();

    }
	
	
	
	function save_result() {

		if (isset($this->unxml->result)){
			
			$result = $this->dom_uninstall->getElementsByTagName('result')->item(0);
			
			if (!isset($this->errortype)){
				
				$this->dom_uninstall->removeChild($result);
				$result = $this->dom_uninstall->appendChild($this->dom->createElement('result'));
				
			}
			
		} else {
			
			$result = $this->dom_uninstall->appendChild($this->dom->createElement('result'));
			
		}
		
		
		if (isset($this->osfopen) && isset($this->errortype) && $this->step->action != "open_file" && $this->step->action != "open_file_if_exists" && $this->step->action != "open_or_create_file"){
			
			$this->save_file();
			
			if (isset($this->unxml->result->filetoopen)){
				
				$filetoopen = $result->getElementsByTagName('filetoopen')->item(0);
				$filetoopen->nodeValue = $this->osfile;
				
			} else {		
			
				$filetoopen = $result->appendChild($this->dom->createElement('filetoopen'));
				$filetoopen->appendChild($this->dom->createTextNode($this->osfile));
				
			}
			
		}


		if (isset($this->errortype)){
			
			if (isset($this->unxml->result)){
				
				$stepnumber = $result->getElementsByTagName('stepnumber')->item(0);
				$stepnumber->nodeValue = $this->stepnumber;
				$errortype = $result->getElementsByTagName('errortype')->item(0);
				$errortype->nodeValue = $this->errortype;
				
			} else {			
			
				$stepnumber = $result->appendChild($this->dom->createElement('stepnumber'));
				$stepnumber->appendChild($this->dom->createTextNode($this->stepnumber));
				$errortype = $result->appendChild($this->dom->createElement('errortype'));
				$errortype->appendChild($this->dom->createTextNode($this->errortype));
			}
			
		} else {	
		
			$this->message = "The contribution has been successfully installed! Check your site now. If everything works as it must don't forget to remove the '" . $this->autoinstaller_dir . "' directory. If something doesn't work click the \"Uninstall\" button.";

		}	
		
		
		if (isset($this->unxml->result->message)){
			
			if ($message = $result->getElementsByTagName('message')->item(0))
				$result->removeChild($message);

			$message = $result->appendChild($this->dom->createElement('message'));
			$message->appendChild($this->dom->createCDATASection($this->message));
			
		} else {		
		
			$message = $result->appendChild($this->dom->createElement('message'));
			$message->appendChild($this->dom->createCDATASection($this->message));
		}
		
		
		$this->dom->formatOutput = TRUE; 
		$this->dom->save(self::unxml_filename); 
	
    }
	
	
	
	function reset_result(){

		$fopen = fopen(self::unxml_filename,"w");
		$content = '<?xml version="1.0"?>
<uninstall/>';
		fwrite($fopen,$content);
		fclose($fopen);
		unset($this->unxml->result->message);
		unset($this->message);
		
	}	
	
	
	
	function install($start = 0) {

			$this->stepnumber = 0;

			foreach ($this->xml->steps->step as $step) {

				    if ($this->stepnumber >= $start){
						
							$this->step = $step;							
							
							switch ((string) $step->action){
								case "open_file" : $this->open_file(); break;
								case "open_file_if_exists" : $this->open_file_if_exists(); break;						
								case "replace"  : $this->replace(); break;								
								case "add_to_file"  : $this->add_to_file(); break;																
								case "save_file"  : $this->save_file(); break;
								case "copy_file"  : $this->copy_file(); break;
								case "copy_file_if_destination_exists"  : $this->copy_file_if_destination_exists(); break;								
								case "run_query"  : $this->run_query(); break;																	
							}	
							
							if (isset($this->errortype))
								break;
					}
					
					$this->stepnumber++;
			  }
			
			   $this->save_result();
      }
	  
	  
	  
	function uninstall() {

			  foreach ($this->unxml->step as $step) {
				  
						$this->step = $step;		
						
						switch ((string) $step->action){
							case "restore_backup" : $this->restore_backup(); break;
							case "remove_file" : $this->remove_file(); break;
							case "un_run_query" : $this->un_run_query(); break;								
						}	

			  }
			
			   $this->reset_result();
	}
	
	
	
}

?>