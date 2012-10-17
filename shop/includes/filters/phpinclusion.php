<?php /* Copyright (C) : <Dec 2008> <Roya Khosravi> */ ?>
<?php
/* Allows you to insert the content of a .php file into your page's content using  include(), require() , requireonce() and includeonce() functions.
Usage : 
[include:Path to your php file]
[include_once:Path to your php file]
[require:Path to your php file]
[require_once:Path to your php file]
Examples:
[include:MyPhpFile.php]
[include:MyDir/MyPhpFile.php]
*/
function phpinclusion($content) {
	if ((strpos($content, "[require:")!==FALSE)||(strpos($content, "[include:")!==FALSE)|| (strpos($content, "[require_once:")!==FALSE)||(strpos($content, "[include_once:")!==FALSE) || (strpos($content, "[requireonce:")!==FALSE)||(strpos($content, "[includeonce:")!==FALSE)) { 
	preg_match_all('/\[(?<name>\w+):([^\])]+)/', $content, $matches, PREG_SET_ORDER); 
	foreach($matches as $match) { 
	$content = preg_replace("/\[(?<name>\w+):([^\])]+)\]/", insert_phpinclusion($match[1], $match[2]), $content,1);
	}		
	}
    return $content;
}
function insert_phpinclusion($mode,$files) {
	switch ($mode) {
		case "include":
    		include($files);
    		break;
	case "include_once":
	case "includeonce":
    		include_once($files);
    		break;
	case "require":
    		require($files);
    		break;
	case "require_once":
	case "requireonce":
    		require_once($files);
    		break;
	default:
	}
}
$content = phpinclusion($content); 
?>