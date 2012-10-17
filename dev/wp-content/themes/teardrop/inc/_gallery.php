<?php $tdir=get_bloginfo('template_directory'); global $wp_query;?>
<?php 
  $postid = $wp_query->post->ID;
  $pimg_url=get_post_meta($postid, '_portimage_full_value', true); ?>	
<?php $checkPasswd = false;
					if (!empty($post->post_password)) { // if there's a password
					if (isset($_COOKIE['wp-postpass_' . COOKIEHASH]) && $_COOKIE['wp-postpass_' . COOKIEHASH] == $post->post_password) {
						$checkPasswd = true;
					 }
					 else
						 $checkPasswd = false;
					}
					else{
						$checkPasswd = true;
					}
					if($checkPasswd == true) :
					?>	
							<?php 
								$args = array('post_type' => 'attachment', 'post_parent' => $post->ID,  'orderby' => menu_order, 'order' => ASC); 
								$attachments = get_children($args); 
								$url_post_img = "";								

									foreach ($attachments as $attachment) { 
									$post_title = $attachment->post_title;
									$full_url = wp_get_attachment_url($attachment->ID);
								?>
								  <div class="galleries">    
  <?php echo teardrop_image(array('type'=>'square','url'=>$full_url, 'src'=>$full_url,'title'=>$post_title,'rel'=>'prettyPhoto[gallery]','width'=>160, 'height'=>160)) ?>
  </div>							
							<?php }	?>	
<?php endif;?> 							
