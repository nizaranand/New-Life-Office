<?php

$PAGE_TITLE = 'Welcome to InstallNET!';		// text which appears at top of page and in browser's page title bar

$SEND_TO_EMAIL = 'newlifeoffice1@gmail.com';		// email address where form contents should be sent

$CONTACT_FORM_THANKS_URL = '/thank-you';	// where to go once form has been submitted

$CONTACT_FORM_CANCEL_URL = '/';				// where to go if form's 'cancel' button is clicked

$LOGIN_FORM_URL = 'login.html';				// where to go when login form is submitted


// ########################################################################################################################

require_once('functions.lib.php');
if ( formSubmitted('contact_form') )
	{
	set_time_limit(0);
	if ( cgiParam('_cancel') )
		{
		httpRedirect($CONTACT_FORM_CANCEL_URL);
		}
	else if ( cgiParam('_submit') )
		{
		if ( formValidate() )
			{
			$msg = '';
			foreach(cgiParamNames() as $n)
				{
				if ( substr($n, 0, 1) != '_' )
					{
					$msg .= ucwords(str_replace('_', ' ', $n)) . ': ' . cgiParam($n) . "\n";
					}
				}
			$attachments = array();
			foreach ($_FILES as $f)
				{
				if ( $f['error'] == 0 && $f['size'] > 0 )
					{
					$attachments[] = array
						(
						'name' => $f['name'],
						'size' => $f['size'],
						'data' => file_get_contents($f['tmp_name'])
						);
					}
				}
			$extraHeaders = array
				(
				'MIME-Version' => '1.0',
				);
			if ( count($attachments) > 0 )
				{
				$boundary = md5(time()).':'.sprintf("%08d", mt_rand(0, 99999999));
				$extraHeaders['content-type'] = 'multipart/mixed; boundary="'.$boundary.'"';
				$msg = "--{$boundary}\r\nContent-Type: text/plain;\r\n\r\n$msg\r\n\r\n";
				foreach($attachments as $a)
					{
					$msg .= "--$boundary\r\n";
					$msg .= "Content-Type: application/octet-stream; name=\"{$a['name']}\"\r\n";
					$msg .= "Content-Transfer-Encoding: base64\r\n";
					$msg .= "Content-Disposition: attachment; filename=\"{$a['name']}\"\r\n";
					$msg .= "\r\n";
					$msg .= chunk_split(base64_encode($a['data']));
					$msg .= "\r\n";
					}
				}
			$email = array
				(
				'from' => cgiParam('contact_email'),
				'to' => $SEND_TO_EMAIL,
				'subject' => 'Installnet Inquiry',
				'message' => $msg
				);
			foreach($extraHeaders as $k => $v)
				{
				$email[$k] = $v;
				}
			if ( emailSend($email) )
				{
				httpRedirect($CONTACT_FORM_THANKS_URL);
				}
			}
		}
	}
?>
<html>
<head>
<title><?php echo $PAGE_TITLE ?></title>
<style type="text/css">
body
	{
	margin: 20px;
	background-color: #ffffff;
	color: #000000;
	font-family: times new roman, times, serif;
	font-size: 11pt;
	font-weight: normal;
	}
td
	{
	color: #000000;
	font-family: times new roman, times, serif;
	font-size: 11pt;
	font-weight: normal;
	font-weight: normal;
	}
div
	{
	padding: 5px;
	}
.box
	{
	border: 1px solid #000000;
	}
.header
	{
	color: #003399;
	font-family: arial, helvetica, sans-serif;
	font-size: 18pt;
	font-weight: bold;
	}
.error
	{
	color: #cc0000;
	font-weight: bold;
	}
.green
	{
	color: #008000;
	}
.grey
	{
	color: #666666;
	}
</style>
<script type="text/javascript">
<!--
function clearLoginForm()
	{
	document.getElementById('username').value = '';
	document.getElementById('password').value = '';
	document.getElementById('terms_and_conditions').checked = false;
	document.getElementById('username').focus();
	return false;
	}
//-->
</script>
</head>
<body>
<table border="0" cellspacing="10" cellpadding="10" width="750" align="center">
	<tr>
		<td width="66%" align="left" valign="top">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
				<tr>
					<td align="left" valign="center"><img src="installnet_logo.jpg" alt="" title="" /></td>
					<td width="99%" align="right" valign="center"><span class="header"><?php echo $PAGE_TITLE ?></span></td>
				</tr>
			</table>
		</td>
		<td width="33%" align="left"valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top">
			<div class="box">
				<p>
					If you are new to InstallNET and would like to request an installation quote, 
					please complete the following:
				</p>
				<?php if ( formSubmitted('contact_form') && formErrors() ) { ?>
				<p class="error">
					Please complete the highlighted field<?php echo formErrors()==1 ? '' : 's' ?> and try again:
				</p>
				<?php } ?>
				<?php echo formHeader('contact_form', array('method'=>'post', 'enctype'=>'multipart/form-data')) ?>
				<table border="0" cellspacing="5" cellpadding="0">
					<tr valign="top">
						<td><?php echo formLabel('company_name','Company Name*:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('company_name', array('size'=>30,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_name','Contact Name*:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('contact_name', array('size'=>30,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_phone','Phone*:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('contact_phone', array('size'=>20,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_email','Email*:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('contact_email', array('size'=>30,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_address1','Address:') ?></td>
						<td>&nbsp;</td>
						<td>
							<?php echo formInput('contact_address1', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?>
							<br />
							<?php echo formInput('contact_address2', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?>
							<br />
							<?php echo formInput('contact_address3', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?>
						</td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_city','City:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('contact_city', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_state','State:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('contact_state', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('contact_zip','Zip:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('contact_zip', array('size'=>5,'maxlength'=>5,'mandatory'=>false)) ?></td>
					</tr>
					<tr><td colspan="3">&nbsp;</td></tr>
					<tr valign="top">
						<td><?php echo formLabel('end_user_company_name','End User Company Name:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('end_user_company_name', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('end_user_phone','Phone:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('end_user_phone', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('end_user_address1','Address:') ?></td>
						<td>&nbsp;</td>
						<td>
							<?php echo formInput('end_user_address1', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?>
							<br />
							<?php echo formInput('end_user_address2', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?>
							<br />
							<?php echo formInput('end_user_address3', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?>
						</td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('end_user_city','City:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('end_user_city', array('size'=>30,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('end_user_state','State*:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('end_user_state', array('size'=>30,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('end_user_zip','Zip*:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('end_user_zip', array('size'=>5,'maxlength'=>5,'mandatory'=>true)) ?></td>
					</tr>
					<tr><td colspan="3">&nbsp;</td></tr>
					<tr valign="top">
						<td><?php echo formLabel('job_details','Job Details:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formTextArea('job_details', array('cols'=>30,'rows'=>3,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('quote_needed_by','Quote Request Needed By:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('quote_needed_by', array('size'=>20,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('estimated_start_date','Estimated Start Date:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('estimated_start_date', array('size'=>20,'maxlength'=>100,'mandatory'=>false)) ?></td>
					</tr>
					<tr valign="top">
						<td><?php echo formLabel('attachments','Attachments:') ?></td>
						<td>&nbsp;</td>
						<td>
							1: <?php echo formFile('attachment1') ?>
							<br />
							2: <?php echo formFile('attachment2') ?>
							<br />
							3: <?php echo formFile('attachment3') ?>
						</td>
					</tr>
					<tr><td colspan="3">&nbsp;</td></tr>
					<tr>
						<td colspan="3" align="center">
							<?php echo formSubmit('_submit', array('value'=>'SUBMIT')) ?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php echo formSubmit('_cancel', array('value'=>'CANCEL')) ?>
						</td>
					</tr>
				</table>
				</form>
			</div>
		</td>
		<td align="left"valign="top">
			<div>
				<p><b>What is InstallNET and why should I use you?</b></p>
				<p class="green">
					InstallNET is a national network of over 220 independent office furniture 
					installation companies in more then 100 cities throughout the US and Canada.  
					We provide a single point of contact to manage all of your projects and take 
					accountability for each job through close-out.  Our service providers are 
					high quality, full-service companies that are committed to outstanding 
					customer service. Our interactive website provides customers with the 
					ability to submit quotes and monitor project status in real time.  
					InstallNET is about giving you Peace of Mind.
				</p>
				<p class="green">
					<b>Installations made Easy. Anywhere.</b>
				</p>
			</div>
			<br />
			<div class="box" style="font-size:10pt;">
				<p><b>If you are a current member of InstallNET, please login below:</b></p>
				<?php echo formHeader('login_form', array('method'=>'post', 'action'=>$LOGIN_FORM_URL)) ?>
				<table border="0" cellspacing="2" cellpadding="0">
					<tr>
						<td><?php echo formlabel('username', 'Username:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formInput('username', array('size'=>15,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr>
						<td><?php echo formlabel('password', 'Password:') ?></td>
						<td>&nbsp;</td>
						<td><?php echo formPassword('password', array('size'=>15,'maxlength'=>100,'mandatory'=>true)) ?></td>
					</tr>
					<tr>
						<td colspan="3">
							<label for="terms_and_conditions"><?php echo formLabel('terms_and_conditions', 'I accept the InstallNET <a href="#">Terms and Conditions</a>') ?></label>
							<?php echo formCheckboxSingle('terms_and_conditions', array('value'=>'Y', 'mandatory'=>true)) ?>
						</td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<?php echo formSubmit('submit', array('value'=>'Login')) ?>
							&nbsp;&nbsp;
							<?php echo formSubmit('clear', array('value'=>'Clear','onclick'=>'return clearLoginForm();')) ?>
						</td>
					</tr>
				</table>
				</form>
				<p class="grey" style="font-size:9pt;">
					<i>Please note: The Members Section uses cookies. Your browser must be set to 
					accept cookies or you will not be able to access the member section. 
					Our cookies are set so that they can only be read by our server, and 
					cannot be used by other sites to determine your personal information. 
					If you are using Internet Explorer (IE), to take advantage of all of the 
					website features please use a version of IE 7 and above.</i>
				</p>
			</div>
		</td>
	</tr>
</table>
</body>
</html>
