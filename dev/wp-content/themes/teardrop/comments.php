<div id="comments-wrapper">
  <h3>
  <?php comments_number (__('No comments', '1 Comment', '% Comments'))?></h3>
  <?php if(have_comments()):?><ol class="commentlist"><?php wp_list_comments(array('callback'=>'teardrop_comment'))?></ol><?php endif?>
  <div class="add-comment"><?php comment_form(array('label_submit'=>__('Submit comment','teardrop')))?></div>
  
</div>
