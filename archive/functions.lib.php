<?php
// ----------------------------------------------------------------------
// General User Functions
// Copyright (c) 2001-2008, Matt Durell, internetwebthing.com (http://internetwebthing.com/)
// ----------------------------------------------------------------------

// ----------------------------------------------------------------------
// globals, etc
// ----------------------------------------------------------------------

$FORM_DEFAULT_METHOD = 'GET';
$FORM_DEFAULT_ATTRIBUTES = array();
$FORM_ERROR_FIELDS = array();
$FORM_ERROR_MESSAGES = array();
$FORM_ERROR_COLOUR = '#cc0000';
$FORM_ERROR_CLASS = 'error';
$FORM_ERROR_COUNT = 0;
$FORM_SUBMIT_CHECK_PARAM = '_submit_check';
$FORM_MANDATORY_FIELD = '_mandatory';
$FORM_SUBMIT_NAME = null;
$FORM_REQUEST_METHOD = isset($_SERVER['REQUEST_METHOD']) ? strtoupper($_SERVER['REQUEST_METHOD']) : 'GET';

$MIN_PASSWORD_LEN = 6;
$MAX_PASSWORD_LEN = 20;
$GEN_KEY = md5("Something Wicked This Way Comes!");
$ENC_SALT = "SS";
$DAY_SECONDS = 86400;
$DAY_NAMES = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$DAY_NAMES_SHORT = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
$MONTH_NAMES = array(null,'January','February','March','April','May','June','July','August','September','October','November','December');
$MONTH_NAMES_SHORT = array(null,'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
$DAYS_IN_MONTH = array(null,31,28,31,30,31,30,31,31,30,31,30,31);
$HUMAN_HOURS = array(12,1,2,3,4,5,6,7,8,9,10,11,12,1,2,3,4,5,6,7,8,9,10,11);

date_default_timezone_set('UTC'); // set default timezone

// ----------------------------------------------------------------------
function getUniqueToken( $numChars=16 )
	{
	$str = uniqid('', FALSE);
	$str = base_convert($str, 16, 10);
	$str = strrev($str);
	while( strlen($str) < 19 )
		{
		$str = rand(0,3) . $str;
		}
	$str = base_convert($str, 10, 36);
	$str = str_pad($str, $numChars ,'0' ,STR_PAD_LEFT);
	$str = strtoupper($str);
	return $str;
	}

// ----------------------------------------------------------------------
function getUnique12CharToken()
	{
	return getUniqueToken(12);
	}

// ----------------------------------------------------------------------
function ssEncode( $text )
	{
	global $ENC_SALT;
	return strtoupper(md5(crypt($text, $ENC_SALT)));
	}

// ----------------------------------------------------------------------
function blowfishEncrypt( $plaintext )
	{
	global $GEN_KEY;
	$initVector = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB), MCRYPT_RAND);
	$plaintext = trim($plaintext);
	$ciphertext = mcrypt_encrypt(MCRYPT_BLOWFISH, $GEN_KEY, $plaintext, MCRYPT_MODE_ECB, $initVector);
	return bin2hex($ciphertext);
	}

// ----------------------------------------------------------------------
function blowfishDecrypt($ciphertext)
	{
	global $GEN_KEY;
	$initVector = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB), MCRYPT_RAND);
	$ciphertext = hex2bin($ciphertext);
	$plaintext = mcrypt_decrypt(MCRYPT_BLOWFISH, $GEN_KEY, $ciphertext, MCRYPT_MODE_ECB, $initVector);
	return trim($plaintext);
	}

// ----------------------------------------------------------------------
function hex2bin( $data )
	{
	return pack("H".strlen($data), $data);
	} 

// ----------------------------------------------------------------------
function getEnvVar( $name )
	{
	global $_SERVER, $_ENV;
	$retval = null;
	if ( isset($_ENV[$name]) )
		{
		$retval = $_ENV[$name];
		}
	else if ( isset($_SERVER[$name]) )
		{
		$retval = $_SERVER[$name];
		}
	return $retval;
	}

// ----------------------------------------------------------------------
function clientIP()
	{
	$remoteAddr = getenv('REMOTE_ADDR');
	$clientIP = getenv('HTTP_CLIENT_IP');
	$xForward = getenv('HTTP_X_FORWARDED_FOR');
	$clientIP = "(unknown)";
	if ( strlen(getenv('REMOTE_ADDR')) )
		{
		$clientIP = getenv('REMOTE_ADDR');
		}
	if ( strlen(getenv('HTTP_CLIENT_IP')) )
		{
		$clientIP = getenv('HTTP_CLIENT_IP');
		}
	else if ( strlen(getenv('HTTP_X_FORWARDED_FOR')) )
		{
		$tmp = getenv('HTTP_X_FORWARDED_FOR');
		if ( preg_match_all( "/([0-9\.]+)/", $tmp, $matches, PREG_PATTERN_ORDER ) )
			{
			$clientIP = join(', ', $matches[1]);
			}
		else
			{
			$clientIP = $tmp;
			}
		}
	return $clientIP;
	}

// ----------------------------------------------------------------------
function getDaysInMonth( $month, $year )
	{
	global $DAYS_IN_MONTH;
	if ( $month == 2 )
		{
		if ( $year % 4 || (!($year % 100) && ($year % 1000)) )
			{
			return 28;
			}
		return 29;
		}
	return $DAYS_IN_MONTH[$month];
	}

// ----------------------------------------------------------------------
function dayPostfix( $day )
	{
	$day = intval( $day );
	if ( $day==11 || $day==12 || $day==13 )
		{
		return 'th';
		}
	else if ( $day % 10 == 1 )
		{
		return 'st';
		}
	else if ( $day % 10 == 2 )
		{
		return 'nd';
		}
	else if ( $day % 10 == 3 )
		{
		return 'rd';
		}
	return 'th';
	}

// ----------------------------------------------------------------------
function dayOfWeek()
	{
	$date = func_num_args() ? func_get_arg(0) : time();
	if ( preg_match( "/\D/", $date ) )
		{
		$date = dateToUXTimestamp($date);
		}
	$dateBits = getdate($date);
	return $dateBits['wday'];
	}

// ----------------------------------------------------------------------
function dateToUXTimestamp()
	{
	$date = dateFromUXTimestamp();
	if ( func_num_args() )
		{
		$date = func_get_arg(0);
		}
	return strtotime($date);
	}

// ----------------------------------------------------------------------
function dateFromUXTimestamp()
	{
	$timestamp = time();
	if ( func_num_args() )
		{
		$timestamp = func_get_arg(0);
		}
	$dateinfo = getdate($timestamp);
	return sprintf( "%04d-%02d-%02d", $dateinfo['year'], $dateinfo['mon'], $dateinfo['mday'] );
	}

// ----------------------------------------------------------------------
function dateFromISO( $date=null, $delimiter='-' )
	{
	if ( ! $date )
		{
		$date = dateFromUXTimestamp();
		}
	if ( preg_match( "/^\d{4}\D\d{2}\D\d{2}$/", $date ) )
		{
		$date = sprintf( "%02d$delimiter%02d$delimiter%04d", substr($date,8,2), substr($date,5,2), substr($date,0,4) );
		}
	return $date;
	}

// ----------------------------------------------------------------------
function dateToISO( $date )
	{
	if ( preg_match( "/^\d{2}\D\d{2}\D\d{4}$/", $date ) )
		{
		$date = sprintf( "%04d-%02d-%02d", substr($date,6,4), substr($date,3,2), substr($date,0,2) );
		}
	return $date;
	}

// ----------------------------------------------------------------------
function timeFromUXTimestamp()
	{
	$timestamp = time();
	if ( func_num_args() )
		{
		$timestamp = func_get_arg(0);
		}
	$dateinfo = getdate($timestamp);
	return sprintf( "%02d:%02d:%02d", $dateinfo['hours'], $dateinfo['minutes'], $dateinfo['seconds'] );
	}

// ----------------------------------------------------------------------
function humanDate( $date, $short=false, $year=true )
	{
	global $MONTH_NAMES_SHORT, $DAY_NAMES_SHORT, $MONTH_NAMES, $DAY_NAMES;
	$d = intval(substr($date,8,2));
	$m = intval(substr($date,5,2));
	$y = intval(substr($date,0,4));
	if ( $short )
		{
		return $DAY_NAMES_SHORT[dayOfWeek($date)].' '.$d.'<span class="small"><sup>'.dayPostfix($d).'</sup></span> '.$MONTH_NAMES_SHORT[$m].($year?" $y":'');
		}
	else
		{
		return $DAY_NAMES[dayOfWeek($date)].' '.$d.'<span class="small"><sup>'.dayPostfix($d).'</sup></span> '.$MONTH_NAMES[$m].($year?" $y":'');
		}
	}

// ----------------------------------------------------------------------
function humanTime( $time, $addSuffix=true )
	{
	global $HUMAN_HOURS;
	if ( preg_match("/^(\d{1,2})\:(\d{2})/", $time, $matches) )
		{
		$hour = intval($matches[1]);
		$mins = intval($matches[2]);
		if ( $hour > 11 )
			{
			$ampm = 'pm';
			}
		else
			{
			$ampm = 'am';
			} 
		$time = sprintf("%d:%02d%s", $HUMAN_HOURS[$hour], $mins, $addSuffix?$ampm:'');
		}
	return $time;
	}

// ----------------------------------------------------------------------
function getAgeFromDOB( $date )
	{
	$today = dateFromUXTimestamp();
	$now['y'] = intval(substr($today,0,4));
	$now['m'] = intval(substr($today,5,2));
	$now['d'] = intval(substr($today,8,2));
	$then['y'] = intval(substr($date,0,4));
	$then['m'] = intval(substr($date,5,2));
	$then['d'] = intval(substr($date,8,2));
	$age = $now['y'] - $then['y'];
	if ( $now['m'] < $then['m'] )
		{
		--$age;
		}
	else if ( $now['m'] == $then['m'] )
		{
		if ( $now['d'] < $then['d'] )
			{
			--$age;
			}
		}
	return $age;
	}

// ----------------------------------------------------------------------
function nl2brStrip( $text )
	{
	return preg_replace("/([\r\n]+)/", '', nl2br($text));
	}

// ----------------------------------------------------------------------
// emailSend - just give it an array of args... array('to'=>$to,'from'=>$from,'subject'=>$subject,'message'=>$message)
// ----------------------------------------------------------------------
function emailSend( $args )
	{
	$retval = false;
	$params = array('To'=>null,'Subject'=>null,'Message'=>null);
	while ( list($key,$val) = each($args) )
		{
		$key = trim($key);
		$val = trim($val);
		if ( $key && $val )
			{
			$key = ucwords($key);
			$params[$key] = $val;
			}
		}
	$addHeaders = "";
	while ( list($key,$val) = each($params) )
		{
		if ( $key != 'To' && $key != 'Subject' && $key != 'Message' )
			{
			$addHeaders .= "$key: $val\n";
			}
		}
	if ( $params['To'] )
		{
		$retval = mail($params['To'], $params['Subject'], $params['Message'], $addHeaders);
		}
	return $retval;	
	}

// ----------------------------------------------------------------------
function httpRedirect( $uri, $exit=true )
	{
	$url = $uri;
	
	header ("Location: $url");
	if ( $exit == true )
		{
		exit;
		}
	}

// ----------------------------------------------------------------------
function validDate( $date )
	{
	$timestamp = @strtotime($date);
	if ( $timestamp > -1 )
		{
		$dateinfo = getdate($timestamp);
		return sprintf( "%04d-%02d-%02d", $dateinfo['year'], $dateinfo['mon'], $dateinfo['mday'] );
		}
	return false;
	}

// ----------------------------------------------------------------------
function validTime( $time )
	{
	$timestamp = @strtotime($time);
	if ( $timestamp > -1 )
		{
		$dateinfo = getdate($timestamp);
		return sprintf( "%02d:%02d:%02d", $dateinfo['hours'], $dateinfo['minutes'], $dateinfo['seconds'] );
		}
	return false;
	}

// ----------------------------------------------------------------------
function validEmail( $test )
	{
	if ( preg_match( "/^[^\@]+?\@[^\.]+?\.[^\.]+?/", $test ) )
		{
		return true;
		}
	return false;
	}

// ----------------------------------------------------------------------
function validPostcode( $postcode )
	{
	$test = trim(strtoupper($postcode));
	if ( preg_match( "/^([A-Z]{1,2}\d{1,2}[A-Z]{0,1})\s*(\d[A-Z]{2})$/", $test, $matches ) )
		{
		return array
			(
			$postcode,
			$matches[1].' '.$matches[2],
			$matches[1],
			$matches[2]
			);
		}
	return false;
	}

// ----------------------------------------------------------------------
function validZipcode5( $zipcode )
	{
	if ( preg_match("/^\d{5}$/", $zipcode) )
		{
		return true;
		}
	return false;
	}

// ----------------------------------------------------------------------
function validZipcode9( $zipcode )
	{
	if ( preg_match("/^\d{5}\-\d{4}$/", $zipcode) )
		{
		return true;
		}
	return false;
	}

// ----------------------------------------------------------------------
function isMember( $test, $array )
	{
	if ( is_array($array) )
		{
		return in_array($test, $array);
		}
	return false;
	}

// ----------------------------------------------------------------------
function indexOf( $test, $array )
	{
	$count = 0;
	if ( is_array($array) )
		{
		foreach ( $array as $element )
			{
			if ( strtolower($element) == strtolower($test) )
				{
				return $count;
				}
			++$count;
			}
		}
	return null;
	}

// ----------------------------------------------------------------------
function getMicroTime()
	{
	list($usec, $sec) = explode(' ', microtime()); 
	return ((float)$usec + (float)$sec);
	}

// ----------------------------------------------------------------------
function cgiParamNames()
	{
	global $FORM_REQUEST_METHOD, $_POST, $_GET;
	$params = array();
	if ( $FORM_REQUEST_METHOD == 'POST' )
		{
		$params = $_POST;
		}
	else
		{
		$params = $_GET;
		}
	$names = array();
	while ( list($key,$val) = each($params) )
		{
		$names[] = $key;
		}
	return $names;
	}

// ----------------------------------------------------------------------
function cgiParam( $name )
	{
	global $FORM_REQUEST_METHOD;
	if ( $FORM_REQUEST_METHOD == 'POST' )
		{
		if ( func_num_args() > 1 )
			{
			$arg = func_get_arg(1);
			return cgiPostParam($name, $arg);
			}
		else
			{
			if ( is_array($name) )
				{
				$arr = array();
				foreach ( $name as $n )
					{
					$arr[] = cgiPostParam($n);
					}
				return $arr;
				}
			else
				{
				return cgiPostParam($name);
				}
			}
		}
	else
		{
		if ( func_num_args() > 1 )
			{
			$arg = func_get_arg(1);
			return cgiGetParam($name, $arg);
			}
		else
			{
			if ( is_array($name) )
				{
				$arr = array();
				foreach ( $name as $n )
					{
					$arr[] = cgiGetParam($n);
					}
				return $arr;
				}
			else
				{
				return cgiGetParam($name);
				}
			}
		}
	}

// ----------------------------------------------------------------------
function cgiGetParam( $name )
	{
	global $FORM_REQUEST_METHOD, $_GET;
	if ( func_num_args() > 1 )
		{
		$setValue = func_get_arg(1);
		$oldValue = isset($_GET[$name]) ? $_GET[$name] : null;
		$_GET[$name] = $setValue;
		return $oldValue;
		}
	else
		{
		$value = null;
		if ( isset($_GET[$name]) )
			{
			$value = $_GET[$name];
			}
		if ( is_array($value) )
			{
			$arr = array();
			foreach ( $value as $elem )
				{
				$arr[] = trim(htmlentities(stripslashes($elem)));
				}
			return $arr;
			}
		else
			{
			return trim(stripslashes($value));
			}
		}
	}

// ----------------------------------------------------------------------
function cgiPostParam( $name )
	{
	global $FORM_REQUEST_METHOD, $_POST;
	if ( func_num_args() > 1 )
		{
		$setValue = func_get_arg(1);
		$oldValue = isset($_POST[$name]) ? $_POST[$name] : null;
		$_POST[$name] = $setValue;
		return $oldValue;
		}
	else
		{
		$value = null;
		if ( isset($_POST[$name]) )
			{
			$value = $_POST[$name];
			}
		if ( is_array($value) )
			{
			$arr = array();
			foreach ( $value as $elem )
				{
				$arr[] = trim(htmlentities(stripslashes($elem)));
				}
			return $arr;
			}
		else
			{
			return trim(stripslashes($value));
			}
		}
	}

// ----------------------------------------------------------------------
function formErrors()
	{
	global $FORM_ERROR_COUNT;
	return $FORM_ERROR_COUNT;
	}

// ----------------------------------------------------------------------
function formValidate()
	{
	global $FORM_REQUEST_METHOD, $FORM_MANDATORY_FIELD, $_POST, $_GET,
		$MIN_PASSWORD_LEN, $MAX_PASSWORD_LEN, $FORM_ERROR_COUNT, $FORM_ERROR_FIELDS;
	$retval = true;
	$fields = array();
	if ( $FORM_REQUEST_METHOD == 'POST' )
		{
		$fields =& $_POST;
		}
	else
		{
		$fields =& $_GET;
		}
	$emails = array();
	$passwords = array();
	$checkFields = array();
	if ( isset( $fields[$FORM_MANDATORY_FIELD]) )
		{
		if ( count($fields[$FORM_MANDATORY_FIELD]) )
			{
			$checkFields = array_unique($fields[$FORM_MANDATORY_FIELD]);
			}
		}
	foreach ( $checkFields as $key )
		{
		$test = null;
		if ( isset($fields[$key]) )
			{
			if ( is_array($fields[$key]) )
				{
				$test = join(',',$fields[$key]);
				}
			else
				{
				$test = trim(stripslashes($fields[$key]));
				}
			}
		if ( preg_match( "/email/i", $key ) )
			{
			if ( strlen($test) == 0 )
				{
				$retval = formValidateAddErrors( $key, "Missing Email Address" );
				}
			else if ( ! validEmail($test) )
				{
				$retval = formValidateAddErrors( $key, "Invalid Email Address" );
				}
			else
				{
				$emails[$key] = $test;
				}
			}
		else if ( preg_match( "/post/i", $key ) && preg_match( "/code/i", $key ) )
			{
			if ( strlen($test) == 0 )
				{
				$retval = formValidateAddErrors( $key, "Missing Post Code" );
				}
			else if ( ! validPostcode($test) )
				{
				$retval = formValidateAddErrors( $key, "Invalid Post Code" );
				}
			}
		else if ( preg_match( "/password/i", $key ) )
			{
			if ( strlen($test) == 0 )
				{
				$retval = formValidateAddErrors( $key, "Missing Password" );
				}
			else if ( strlen($test)<$MIN_PASSWORD_LEN || strlen($test)>$MAX_PASSWORD_LEN )
				{
				$retval = formValidateAddErrors( $key, "Password must be between $MIN_PASSWORD_LEN and $MAX_PASSWORD_LEN characters" );
				}
			else
				{
				$passwords[$key] = $test;
				}
			}
		else
			{
			if ( ! strlen($test) )
				{
				$retval = formValidateAddErrors( $key, "Missing information for '$key'" );
				}
			}
		}
	if ( count($emails) > 1 )
		{
		if ( count(array_unique($emails)) > 1 )
			{
			$retval = formValidateAddErrors( array_keys($emails), "Specified email addresses do not match" );
			}
		}
	if ( count($passwords) > 1 )
		{
		if ( count(array_unique($passwords)) > 1 )
			{
			$retval = formValidateAddErrors( array_keys($passwords), "Mis-matching Passwords" );
			}
		}
	$FORM_ERROR_COUNT = count($FORM_ERROR_FIELDS);
	return $retval;
	}

// ----------------------------------------------------------------------
function formValidateAddErrors( $fields, $message )
	{
	global $FORM_ERROR_FIELDS, $FORM_ERROR_MESSAGES, $FORM_ERROR_COUNT;
	$arr = array();
	if ( is_array($fields) )
		{
		// if given argument is an array, set the interal array the same
		$arr = $fields;
		}
	else
		{
		// if given argument is a scalar, push onto internal array
		$arr[] = $fields;
		}
	foreach ( $arr as $elem )
		{
		if ( ! isMember($elem, $FORM_ERROR_FIELDS) )
			{
			$FORM_ERROR_FIELDS[] = $elem;
			}
		}
	if ( ! isMember($message, $FORM_ERROR_MESSAGES) )
		{
		$FORM_ERROR_MESSAGES[] = $message;
		}
	$FORM_ERROR_COUNT = count($FORM_ERROR_FIELDS);
	return false;
	}

// ----------------------------------------------------------------------
function formAddDefaultAttributes( $name, $params )
	{
	global $FORM_DEFAULT_ATTRIBUTES;
	$output = "";
	$idSpecified = false;
	reset( $FORM_DEFAULT_ATTRIBUTES );
	while ( list($key,$val) = each($FORM_DEFAULT_ATTRIBUTES) )
		{
		$key = strtolower( $key );
		if ( ! $params[$key] )
			{
			$output .= " $key=\"$val\"";
			}
		}
	// add default 'id' attribute (same as element name) if not explicitly set
	if ( ! in_array('id', array_map('strtolower', array_keys($params))) )
		{
		$output .= " id=\"$name\"";
		}
	// add 'mandatory' attribute to actual element, for javascript processing
	$mand = 0;
	if ( in_array('mandatory', array_map('strtolower', array_keys($params))) )
		{
		$mand = $params['mandatory'] ? 1 : 0;
		}
	$output .= " mandatory=\"$mand\"";
	return $output;
	}

// ----------------------------------------------------------------------
function formAddMandatoryFlag( $name, $params )
	{
	global $FORM_MANDATORY_FIELD;
	if ( (isset($params['mandatory']) && $params['mandatory']) || (isset($params['mand']) && $params['mand']) )
		{
		return formHidden( $FORM_MANDATORY_FIELD.'[]', array('value'=>$name) );
		}
	return null;
	}

// ----------------------------------------------------------------------
function formHeader( $name )
	{
	global $FORM_DEFAULT_METHOD;
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		}
	$output = "<form name=\"$name\"";
	$methodSet = false;
	while ( list($key,$val) = each($params) )
		{
		if ( strtoupper($key) == 'METHOD' )
			{
			$methodSet = true;
			}
		$output .= " $key=\"$val\"";
		}
	if ( ! $methodSet )
		{
		$output .= " method=\"$FORM_DEFAULT_METHOD\"";
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= ">\n";
	$output .= formHiddenCheckSubmit( $name );
	$output .= "\n";
	return $output;
	}

// ----------------------------------------------------------------------
function formInput( $name )
	{
	$output = "<input type=\"text\" name=\"$name\"";
	$params = array();
	$attribs = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			$attribs[$key] = $val;
			}
		}
	$default = cgiParam($name);
	if ( strlen($default) )
		{
		$attribs['value'] = htmlentities( $default );
		}
	while ( list($key,$val) = each($attribs) )
		{
		if ( $key != 'mandatory' && $key != 'mand' )
			{
			$output .= " $key=\"$val\"";
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formPassword( $name )
	{
	$output = "<input type=\"password\" name=\"$name\"";
	$params = array();
	$attribs = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			$attribs[$key] = $val;
			}
		}
	$default = cgiParam($name);
	if ( strlen($default) )
		{
		$attribs['value'] = htmlentities( $default );
		}
	while ( list($key,$val) = each($attribs) )
		{
		if ( $key != 'mandatory' && $key != 'mand' )
			{
			$output .= " $key=\"$val\"";
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formRadio( $name )
	{
	$output = "<input type=\"radio\" name=\"$name\"";
	$params = array();
	$checked = false;
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'checked' )
				{
				$checked = true;
				}
			else if ( $key != 'mandatory' && $key != 'mand' )
				{
				$output .= " $key=\"$val\"";
				}
			}
		}
	$default = cgiParam($name);
	if ( $default )
		{
		if ( $params['value'] == $default )
			{
			$output .= " checked";
			}
		}
	else if ( $checked )
		{
		$output .= " checked";
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formCheckbox( $name )
	{
	$output = "<input type=\"checkbox\" name=\"".$name."[]\"";
	$params = array();
	$checked = false;
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'checked' )
				{
				if ( $val )
					{
					$checked = true;
					}
				}
			else if ( $key != 'mandatory' && $key != 'mand' )
				{
				$params[$key] = $val;
				$output .= " $key=\"$val\"";
				if ( $key == 'value' )
					{
					$default = $val;
					}
				}
			}
		}
	$values = cgiParam($name);
	if ( is_array($values) )
		{
		if ( isMember( $params['value'], $values ) )
			{
			$checked = true;
			}
		}
	else if ( strlen($values) && ($values == $default) )
		{
		$checked = true;
		}
	if ( $checked )
		{
		$output .= " checked";
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formCheckboxSingle( $name )
	{
	$output = "<input type=\"checkbox\" name=\"".$name."\"";
	$params = array();
	$checked = false;
	$default = '';
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'checked' )
				{
				if ( $val )
					{
					$checked = true;
					}
				}
			else if ( $key != 'mandatory' && $key != 'mand' )
				{
				$params[$key] = $val;
				$output .= " $key=\"$val\"";
				if ( $key == 'value' )
					{
					$default = $val;
					}
				}
			}
		}
	$value = cgiParam($name);
	if ( strlen($value) && ($value == $default) )
		{
		$output .= " checked";
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formTextArea( $name )
	{
	$output = "<textarea name=\"$name\"";
	$params = array();
	$default = cgiParam($name);
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'value' )
				{
				if ( ! $default )
					{
					$default = $val;
					}
				}
			else if ( $key != 'mandatory' && $key != 'mand' )
				{
				$output .= " $key=\"$val\"";
				}
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= ">".htmlentities($default)."</textarea>";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formFile( $name )
	{
	$output = "<input type=\"file\" name=\"$name\"";
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key != 'mandatory' && $key != 'mand' )
				{
				$output .= " $key=\"$val\"";
				}
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formImage( $name )
	{
	$output = "<input type=\"image\" name=\"$name\"";
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		$border = 0;
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'border' )
				{
				$border = $val;
				}
			else
				{
				$output .= " $key=\"$val\"";
				}
			}
		$output .= " border=\"$border\"";
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />\n";
	return $output;
	}

// ----------------------------------------------------------------------
function formSelect( $name, $values )
	{
	$output = "<select name=\"$name\"";
	$default = "";
	$params = array();
	if ( func_num_args() > 2 )
		{
		$params = func_get_arg(2);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'value' )
				{
				$default = $val;
				}
			else if ( $key != 'mandatory' && $key != 'mand' )
				{
				$output .= " $key=\"$val\"";
				}
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= ">\n";
	$param = cgiParam($name);
	if ( strlen($param) )
		{
		$default = $param;
		}
	for ( $i=0; $i<count($values); $i+=2 )
		{
		$output .= "<option value=\"".$values[$i]."\"";
		if ( strlen($default) && ($values[$i] == $default) )
			{
			$output .= " selected";
			}
		if ( $values[$i] == null && $values[$i+1] == str_repeat('-', strlen($values[$i+1])) )
			{
			$output .= " disabled=\"disabled\"";
			}
		$output .= "> ".$values[$i+1]." </option>\n";
		}
	$output .= "</select>";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formSelectMulti( $name, $values )
	{
	$output = "<select multiple name=\"".$name."[]\"";
	$params = array();
	$default = array();
	if ( func_num_args() > 2 )
		{
		$params = func_get_arg(2);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			if ( $key == 'value' )
				{
				$default = $val;
				}
			else if ( $key != 'mandatory' && $key != 'mand' )
				{
				$output .= " $key=\"$val\"";
				}
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= ">\n";
	$param = cgiParam($name);
	if ( count($param) )
		{
		$default = $param;
		}
	for ( $i=0; $i<count($values); $i+=2 )
		{
		$output .= "<option value=\"".$values[$i]."\"";
		if ( count($default) && isMember($values[$i],$default) )
			{
			$output .= " selected";
			}
		$output .= "> ".$values[$i+1]." </option>\n";
		}
	$output .= "</select>";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formHidden( $name )
	{
	$output = "<input type=\"hidden\" name=\"$name\"";
	$attribs = array();
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			$attribs[$key] = $val;
			}
		}
	$default = cgiParam($name);
	if ( $default != null )
		{
		$attribs['value'] = htmlentities( $default );
		}
	while ( list($key,$val) = each($attribs) )
		{
		if ( $key != 'mandatory' && $key != 'mand' )
			{
			$output .= " $key=\"$val\"";
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	$output .= formAddMandatoryFlag( $name, $params );
	return $output;
	}

// ----------------------------------------------------------------------
function formSubmit( $name )
	{
	$output = "<input type=\"submit\" name=\"$name\"";
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			$output .= " $key=\"$val\"";
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	return $output;
	}

// ----------------------------------------------------------------------
function formButton( $name )
	{
	$output = "<input type=\"button\" name=\"$name\"";
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			$output .= " $key=\"$val\"";
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	return $output;
	}

// ----------------------------------------------------------------------
function formReset( $name )
	{
	$output = "<input type=\"reset\" name=\"$name\"";
	$params = array();
	if ( func_num_args() > 1 )
		{
		$params = func_get_arg(1);
		while ( list($key,$val) = each($params) )
			{
			$key = strtolower($key);
			$output .= " $key=\"$val\"";
			}
		}
	$output .= formAddDefaultAttributes($name, $params);
	$output .= " />";
	return $output;
	}

// ----------------------------------------------------------------------
function formHiddenCheckSubmit()
	{
	global $FORM_SUBMIT_CHECK_PARAM;
	$val = 1;
	if ( func_num_args() > 0 )
		{
		$val = func_get_arg(0);
		}
	return formHidden($FORM_SUBMIT_CHECK_PARAM, array('value'=>$val));
	//return "<input type=\"hidden\" name=\"$FORM_SUBMIT_CHECK_PARAM\" value=\"$val\" />\n";
	}

// ----------------------------------------------------------------------
function formSubmitted( $formName=null )
	{
	global $FORM_SUBMIT_CHECK_PARAM, $FORM_SUBMIT_NAME;
	if ( $formName )
		{
		$FORM_SUBMIT_NAME = $formName;
		return ( cgiParam($FORM_SUBMIT_CHECK_PARAM) == $formName );
		}
	else
		{
		$FORM_SUBMIT_NAME = null;
		return cgiParam($FORM_SUBMIT_CHECK_PARAM);
		}
	}

// ----------------------------------------------------------------------
function formLabel( $name, $text )
	{
	global $FORM_ERROR_FIELDS, $FORM_ERROR_COLOUR, $FORM_ERROR_CLASS;
	$output = '';
	$errorCondition = isMember($name, $FORM_ERROR_FIELDS);
	if ( $errorCondition )
		{
		$output .= '<font color="'.$FORM_ERROR_COLOUR.'"><span class="'.$FORM_ERROR_CLASS.'">';
		}
	$output .= trim($text);
	if ( $errorCondition )
		{
		$output .= '</span></font>';
		}
	return $output;
	}

// ----------------------------------------------------------------------
function populateCGIFromArray( $arr )
	{
	foreach( array_keys($arr) as $k )
		{
		cgiParam($k, $arr[$k]);
		}
	}

// ----------------------------------------------------------------------
function escapeCGIParams( $paramNames )
	{
	$values = array();
	foreach( $paramNames as $key )
		{
		$val = cgiParam($key);
		if ( is_array($val) )
			{
			$newVal = array();
			foreach( $val as $v )
				{
				$v = str_replace( "'", "\'", $v );
				$v = str_replace( '"', '\"', $v );
				$newVal[] = $v;
				}
			$values[] = $newVal;
			}
		else
			{
			$val = str_replace( "'", "\'", $val );
			$val = str_replace( '"', '\"', $val );
			$values[] = $val;
			}
		}
	return $values;
	}

// ----------------------------------------------------------------------
function fprint( $fh, $str )
	{
	return fwrite( $fh, $str );
	}

// ----------------------------------------------------------------------
if ( ! function_exists('fprintf') )
	{
	function fprintf( $fh, $fmt )
		{
		$args = array();
		for( $i=2; $i<func_num_args(); $i++ )
			{
			$args[] = func_get_arg($i);
			}
		return fwrite( $fh, vsprintf($fmt, $args) );
		}
	}

// ----------------------------------------------------------------------
// generate a clickable link to toggle-sort table contents on current page by given column name
// ----------------------------------------------------------------------
function generateTableSortHeader( $sortColumnName, $defaultSortOrder='ASC' )
	{
	global $_SERVER, $_REQUEST;
	$kvPairs = array();
	$sortOrder = cgiParam('sortCol')==$sortColumnName ? cgiParam('sortOrd')=='ASC' ? 'DESC' : 'ASC' : $defaultSortOrder;
	$kvPairs[] = 'sortOrd='.$sortOrder;
	$kvPairs[] = 'sortCol='.$sortColumnName;
	foreach(getHTTPRequestParameters() as $k => $v)
		{
		if ( $k != 'sortCol' && $k != 'sortOrd' )
			{
			$kvPairs[] = $k.'='.urlencode($v);
			}
		}
	$output = $_SERVER['PHP_SELF'].'?'.join('&', $kvPairs);
	return $output;
	}

// ----------------------------------------------------------------------
// extract HTTP parameters (key/value pairs) from query string
// ----------------------------------------------------------------------
function getHTTPRequestParameters()
	{
	global $_SERVER;
	$params = array();
	if ( isset($_SERVER['QUERY_STRING']) )
		{
		if ( strlen($_SERVER['QUERY_STRING']) )
			{
			$kvPairs = explode('&', $_SERVER['QUERY_STRING']);
			foreach( $kvPairs as $kvp )
				{
				$parts = explode('=', $kvp);
				$params[$parts[0]] = urldecode($parts[1]);
				}
			}
		}
	return $params;
	}

?>
