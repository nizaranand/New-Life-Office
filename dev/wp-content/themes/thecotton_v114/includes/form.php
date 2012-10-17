<form action="<?php echo get_template_directory_uri().'/includes/send-email.php';?>" method="post" id="submit-form" class="pexeto-contact-form">
<div class="error-box error-message"><?php echo pex_text('_contact_error'); ?></div>
<div class="info-box sent-message"><?php echo pex_text('_message_sent_text'); ?></div>
 <div class="contact-form-input">
 <label class="contact-label"><?php echo pex_text('_name_text');?><span class="mandatory">*</span></label>
  <input type="text" name="name" class="required" />
  </div>
  
  <div class="contact-form-input">
  <label class="contact-label"><?php echo pex_text('_your_email_text');?> <span class="mandatory">*</span> </label>
  <input type="text" name="email" class="required email" />
 	</div>
 
 <div class="contact-form-textarea">
  <label class="contact-label"><?php echo pex_text('_question_text');?><span class="mandatory">*</span></label>
  <textarea name="question" rows="" cols="" class="required"></textarea>
    <br/><br/>
  </div>
  
  <a class="button send-button"><span><?php echo pex_text('_send_text');?></span></a>
 <div class="contact-loader"></div>
</form>


