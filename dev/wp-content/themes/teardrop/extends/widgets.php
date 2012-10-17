<?php


// SOCIAL MEDIA WIDGET
add_action('widgets_init', create_function('', 'return register_widget("teardrop_social_widget");'));
$teardrop_networks=array(
  "RSS"=>"",
  "Twitter"=>"",
  "Facebook"=>"",
  "Flickr"=>"",
  "YouTube"=>"",
  "LinkedIn"=>"",
  "Delicious"=>"",
  "Digg"=>"",
);
define('teardrop_NETWORKS', 'return '.var_export($teardrop_networks, 1).";");


class teardrop_social_widget extends WP_Widget{
  function teardrop_social_widget(){
    $widget_ops = array('classname'=>'teardrop_social_widget','description'=>__('Link to your RSS feed and social media accounts.', 'teardrop'));
    $this->WP_Widget('social_networks', __('Teardrop Socials'), $widget_ops);
  }

  function widget($args, $instance){
    extract($args);
    $title = apply_filters('widget_title', $instance['title']); if(empty($title)) $title="Follow Us";

    foreach(eval(teardrop_NETWORKS) as $n=>$v) $networks[$n] = $instance[strtolower($n)];
    if(empty($networks['RSS'])) $networks['RSS'] = get_bloginfo('rss2_url');
    $display = $instance['display'];
    $turl=get_bloginfo('template_url');

    echo $before_widget;
    echo $before_title.$title.$after_title;?>
      <div class="follow"><?php foreach($networks as $n=>$v) if(!empty($v)){?>
        <a href="<?php echo $v?>" class="<?php echo strtolower($n)?>" title="<?php echo $n?>" onclick="window.open(this.href);return false;">
          <img src="<?php echo $turl?>/i/social/<?php echo strtolower($n)?>.png" alt="<?php echo $n?>" />
        </a>
      <?php }?></div><?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['display'] = $new_instance['display'];
    foreach(eval(teardrop_NETWORKS) as $n=>$v) $instance[strtolower($n)] = $new_instance[strtolower($n)];
    return $instance;
  }

  function form($instance){
    $instance = wp_parse_args((array)$instance, array('title'=>'', 'text'=>'', 'title_link'=>''));
    $title = strip_tags($instance['title']);
    $display = $instance['display'];
    foreach(eval(teardrop_NETWORKS) as $n=>$v) $networks[$n] = $instance[strtolower($n)];

    $text = format_to_edit($instance['text']);?>
      <p><label><?php _e('Title:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('title'))?>" name="<?php echo $this->get_field_name(strtolower('title'))?>" type="text" value="<?php echo esc_attr($title)?>" /></label></p>
      <p><small>Enter the full URL to each of your social service accounts. Or leave the field blank if you wish not to display that service.</small></p>
      <?php foreach($networks as $n=>$v){
        ?><p><label><?php echo $n?> URL: <input class="widefat" id="<?php echo $this->get_field_id(strtolower($n))?>" name="<?php echo $this->get_field_name(strtolower($n))?>" type="text" value="<?php echo esc_attr($v)?>" /></label></p><?php
      }
  }
}


// OTHER PORTFOLIO WIDGET
add_action('widgets_init', create_function('', 'return register_widget("teardrop_portfolio_widget");'));
class teardrop_portfolio_widget extends WP_Widget{
  function teardrop_portfolio_widget(){
    $widget_ops = array('classname'=>'teardrop_portfolio_widget ','description'=>__('Shows a few portfolio works linked to your current work.', 'teardrop'));
    $this->WP_Widget('portfolio_items', __('Teardrop Portfolio Works'), $widget_ops);
  }
  function widget($args, $instance){
    extract($args);
    $title = apply_filters('widget_title', $instance['title']); if(empty($title)) $title="Other Works";
    $display = $instance['display'];
    $number = $instance['number']; if(empty($number)) $number=4;
    $turl=get_bloginfo('template_url');

    global $post;
    $cats=wp_get_post_terms($post->ID);

    echo $before_widget;
    echo $before_title.$title.$after_title;?>
      <div class="portfolio-linked-works clearfix">
        <?php foreach(get_posts(array("post_type"=>"portfolio", "numberposts"=>(int)$number, "exclude"=>get_the_ID(), "portfolio_cat"=>$cats->slug)) as $work){
          $arr=wp_get_attachment_image_src(get_post_thumbnail_id($work->ID),"teardrop-small");
          echo teardrop_image(array("type"=>"small","src"=>$arr[0],"url"=>get_permalink($work->ID),'width'=>87, 'height'=>67));
        }?>
      </div><?php
    echo $after_widget;
  }


  function update($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['display'] = $new_instance['display'];
    $instance['number'] = $new_instance['number'];
    return $instance;
  }

  function form($instance){
    $instance = wp_parse_args((array)$instance, array('title'=>'', 'text'=>'', 'title_link'=>''));
    $title = strip_tags($instance['title']);
    $display = $instance['display'];
    $number = $instance['number'];

    $text = format_to_edit($instance['text']);?>
      <p><label><?php _e('Title:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('title'))?>" name="<?php echo $this->get_field_name(strtolower('title'))?>" type="text" value="<?php echo esc_attr($title)?>" /></label></p>
      <p><label><?php _e('Number of works:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('number'))?>" name="<?php echo $this->get_field_name(strtolower('number'))?>" type="text" value="<?php echo esc_attr($number)?>" /></label></p>
    <?php
  }
}


/* ---------------------------------------
RECENT POSTS WIDGET
--------------------------------------- */

class teardrop_recent_posts extends WP_Widget {

	function teardrop_recent_posts() {
		$widget_ops = array('classname' => 'widget_recent_posts', 'description' => __( "Displays the recent posts on your site", 'teardrop') );
		$this->WP_Widget('recent_posts', __('Teardrop Recent Posts', 'teardrop'), $widget_ops);
		$this->alt_option_name = 'widget_recent_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('teardrop_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'striking_front') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$disable_thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$display_extra_type = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';
		
		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1);
		if(!empty($instance['cat'])){
			$query['cat'] = implode(',', $instance['cat']);
		}

		$r = new WP_Query($query);
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="posts_list">
<?php  while ($r->have_posts()) : $r->the_post(); ?>
			<li>
<?php if(!$disable_thumbnail):?>
				<a class="thumbnail" href="<?php echo get_permalink() ?>" title="<?php the_title();?>">
<?php if (has_post_thumbnail() ): ?>
					<?php the_post_thumbnail(array(65,65),array('title'=>get_the_title(),'alt'=>get_the_title())); ?>	
<?php else:?>
					<img src="<?php echo THEME_IMAGES;?>/widget_posts_thumbnail.png" width="65" height="65" title="<?php the_title();?>" alt="<?php the_title();?>"/>
<?php endif;//end has_post_thumbnail ?>
				</a>
<?php endif;//disable_thumbnail ?>
				<div class="post_extra_info">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
<?php if($display_extra_type == 'time'):?>
					<time datetime="<?php the_time('Y-m-d') ?>"><?php echo get_the_date(); ?></time>
<?php elseif($display_extra_type == 'description'):?>
					<p><?php echo wp_html_excerpt(get_the_excerpt(),$desc_length);?>...</p>
<?php endif;//end display extra type ?>
				</div>
				<div class="clearfix"></div>
			</li>
<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('teardrop_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
		$instance['cat'] = $new_instance['cat'];

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['teardrop_recent_posts']) )
			delete_option('teardrop_recent_posts');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('teardrop_recent_posts', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();

		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

		$categories = get_categories('orderby=name&hide_empty=0');
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'teardrop'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'teardrop'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
		<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?', 'teardrop' ); ?></label></p>
		
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'teardrop' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'teardrop' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'teardrop' ); ?></option>
				<option value="none"<?php selected($display_extra_type,'none');?>><?php _e( 'None', 'teardrop' ); ?></option>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'teardrop'); ?></label>
		<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" /></p>

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categorys:' , 'teardrop'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("teardrop_recent_posts");'));

/* ---------------------------------------
POPULAR POSTS WIDGET
--------------------------------------- */
class teardrop_show_popular extends WP_Widget {

	function teardrop_show_popular() {
		$widget_ops = array('classname' => 'widget_popular_posts', 'description' => __( "Displays the popular posts on your site", 'teardrop') );
		$this->WP_Widget('popular_posts', __('Teardrop Popular Posts', 'teardrop'), $widget_ops);
		$this->alt_option_name = 'widget_popular_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('teardrop_show_popular', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts', 'striking_front') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$disable_thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$display_extra_type = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';

		$query = array('showposts' => $number, 'nopaging' => 0, 'orderby'=> 'comment_count', 'post_status' => 'publish', 'caller_get_posts' => 1);
		if(!empty($instance['cat'])){
			$query['cat'] = implode(',', $instance['cat']);
		}
		$r = new WP_Query($query);
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="posts_list">
<?php  while ($r->have_posts()) : $r->the_post(); ?>
			<li>
<?php if(!$disable_thumbnail):?>
				<a class="thumbnail" href="<?php echo get_permalink() ?>" title="<?php the_title();?>">
<?php if (has_post_thumbnail() ): ?>
					<?php the_post_thumbnail(array(65,65),array('title'=>get_the_title(),'alt'=>get_the_title())); ?>	
<?php else:?>
					<img src="<?php echo THEME_IMAGES;?>/widget_posts_thumbnail.png" width="65" height="65" title="<?php the_title();?>" alt="<?php the_title();?>"/>
<?php endif;//end has_post_thumbnail ?>
				</a>
<?php endif;//disable_thumbnail ?>
				<div class="post_extra_info">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
<?php if($display_extra_type == 'time'):?>
					<time datetime="<?php the_time('Y-m-d') ?>"><?php echo get_the_date(); ?></time>
<?php elseif($display_extra_type == 'description'):?>
					<p><?php echo wp_html_excerpt(get_the_excerpt(),$desc_length);?>...</p>
<?php endif;//end display extra type ?>
				</div>
				<div class="clearfix"></div>
			</li>
<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('teardrop_show_popular', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
		$instance['cat'] = $new_instance['cat'];
		
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['teardrop_show_popular']) )
			delete_option('teardrop_show_popular');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('teardrop_show_popular', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();
		
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

		$categories = get_categories('orderby=name&hide_empty=0');

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','teardrop'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'teardrop'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
		<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?' , 'teardrop'); ?></label></p>
		
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'teardrop' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'teardrop' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'teardrop' ); ?></option>
				<option value="none"<?php selected($display_extra_type,'none');?>><?php _e( 'None', 'teardrop' ); ?></option>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'teardrop'); ?></label>
		<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" /></p>

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categorys:' , 'teardrop'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("teardrop_show_popular");'));

/* ---------------------------------------
POPULAR POSTS WIDGET
--------------------------------------- */

class Teardrop_Related_Posts extends WP_Widget {

	function Teardrop_Related_Posts() {
		$widget_ops = array('classname' => 'widget_related_posts', 'description' => __( "Displays the related posts on your site", 'teardrop') );
		$this->WP_Widget('related_posts', __('Teardrop Related Posts', 'teardrop'), $widget_ops);
		$this->alt_option_name = 'widget_related_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {

		$cache = wp_cache_get('Teardrop_Related_Posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Related Posts', 'striking_front') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$disable_thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$display_extra_type = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';

		
		global $post;
		
		$tags = wp_get_post_tags($post->ID);
		$tagIDs = array();
		if ($tags) {
			$tagcount = count($tags);
			for ($i = 0; $i < $tagcount; $i++) {
				$tagIDs[$i] = $tags[$i]->term_id;
			}

			$query = array('tag__in' => $tagIDs,'post__not_in' => array($post->ID),'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1);
			if(!empty($instance['cat'])){
				$query['cat'] = implode(',', $instance['cat']);
			}
			$r = new WP_Query($query);
				if ($r->have_posts()) :		
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul class="posts_list">
<?php  while ($r->have_posts()) : $r->the_post(); ?>
			<li>
<?php if(!$disable_thumbnail):?>
				<a class="thumbnail" href="<?php echo get_permalink() ?>" title="<?php the_title();?>">
<?php if (has_post_thumbnail() ): ?>
					<?php the_post_thumbnail(array(65,65),array('title'=>get_the_title(),'alt'=>get_the_title())); ?>	
<?php else:?>
					<img src="<?php echo THEME_IMAGES;?>/widget_posts_thumbnail.png" width="65" height="65" title="<?php the_title();?>" alt="<?php the_title();?>"/>
<?php endif;//end has_post_thumbnail ?>
				</a>
<?php endif;//disable_thumbnail ?>
				<div class="post_extra_info">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
<?php if($display_extra_type == 'time'):?>
					<time datetime="<?php the_time('Y-m-d') ?>"><?php echo get_the_date(); ?></time>
<?php elseif($display_extra_type == 'description'):?>
					<p><?php echo wp_html_excerpt(get_the_excerpt(),$desc_length);?>...</p>
<?php endif;//end display extra type ?>
				</div>
				<div class="clearfix"></div>
			</li>
<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_query();

			endif;

			$cache[$args['widget_id']] = ob_get_flush();
			wp_cache_set('Teardrop_Related_Posts', $cache, 'widget');
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
		$instance['cat'] = $new_instance['cat'];

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['Teardrop_Related_Posts']) )
			delete_option('Teardrop_Related_Posts');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('Teardrop_Related_Posts', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();

		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

		$categories = get_categories('orderby=name&hide_empty=0');
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'teardrop'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'teardrop'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
		<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?', 'teardrop' ); ?></label></p>
		
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'teardrop' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'teardrop' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'teardrop' ); ?></option>
				<option value="none"<?php selected($display_extra_type,'none');?>><?php _e( 'None', 'teardrop' ); ?></option>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'teardrop'); ?></label>
		<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" /></p>

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categorys:' , 'teardrop'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("teardrop_related_posts");'));

// FLICKR WIDGET
add_action('widgets_init', create_function('', 'return register_widget("teardrop_flickr_widget");'));
class teardrop_flickr_widget extends WP_Widget{
  function teardrop_flickr_widget(){
    $widget_ops = array('classname'=>'teardrop_flickr_widget','description'=>__('Shows Flickr photos'));
    $this->WP_Widget('flickr_widget', __('Teardrop Flickr photos'), $widget_ops);
  }
  function widget($args, $instance){
    extract($args);
    $title = apply_filters('widget_title', $instance['title']); if(empty($title)) $title="Flickr";
    $display = $instance['display'];
    $id = $instance['id'];
    $number = $instance['number']; if(empty($number)) $number=6;
    $turl=get_bloginfo('template_url');

    echo $before_widget;
    echo $before_title.$title.$after_title;?>
    <div class="teardrop-flickr-widget clearfix">
      <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
    </div><?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['display'] = $new_instance['display'];
    $instance['id'] = $new_instance['id'];
    $instance['number'] = $new_instance['number'];
    return $instance;
  }

  function form($instance){
    $instance = wp_parse_args((array)$instance, array('title'=>'', 'text'=>'', 'title_link'=>''));
    $title = strip_tags($instance['title']);
    $display = $instance['display'];
    $id = $instance['id'];
    $number = $instance['number'];

    $text = format_to_edit($instance['text']);?>
      <p><label><?php _e('Title:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('title'))?>" name="<?php echo $this->get_field_name(strtolower('title'))?>" type="text" value="<?php echo esc_attr($title)?>" /></label></p>
      <p><label><?php _e('Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('id'))?>" name="<?php echo $this->get_field_name(strtolower('id'))?>" type="text" value="<?php echo esc_attr($id)?>" /></label></p>
      <p><label><?php _e('Number of photos:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('number'))?>" name="<?php echo $this->get_field_name(strtolower('number'))?>" type="text" value="<?php echo esc_attr($number)?>" /></label></p>
    <?php
  }
}


// TWITTER WIDGET
add_action('widgets_init', create_function('', 'return register_widget("teardrop_twitter_widget");'));
class teardrop_twitter_widget extends WP_Widget{
  function teardrop_twitter_widget(){
    $widget_ops = array('classname'=>'teardrop_twitter_widget','description'=>__('Shows Twitter updates'));
    $this->WP_Widget('twitter_widget', __('Teardrop Twitter updates'), $widget_ops);
  }
  function widget($args, $instance){
    extract($args);
    $title = apply_filters('widget_title', $instance['title']); if(empty($title)) $title="Twitter";
    $display = $instance['display'];
    $id = $instance['id'];
    $number = $instance['number']; if(empty($number)) $number=4;
    $turl=get_bloginfo('template_url');

    echo $before_widget;
    echo $before_title.$title.$after_title;?>
    <div class="teardrop-twitter-widget clearfix">
      <ul id="twitter_update_list"><li></li></ul>
      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
      <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $id?>.json?callback=twitterCallback2&amp;count=<?php echo $number?>"></script>
      
    </div><?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['display'] = $new_instance['display'];
    $instance['id'] = $new_instance['id'];
    $instance['number'] = $new_instance['number'];
    return $instance;
  }

  function form($instance){
    $instance = wp_parse_args((array)$instance, array('title'=>'', 'text'=>'', 'title_link'=>''));
    $title = strip_tags($instance['title']);
    $display = $instance['display'];
    $id = $instance['id'];
    $number = $instance['number'];

    $text = format_to_edit($instance['text']);?>
      <p><label><?php _e('Title:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('title'))?>" name="<?php echo $this->get_field_name(strtolower('title'))?>" type="text" value="<?php echo esc_attr($title)?>" /></label></p>
      <p><label><?php _e('Twitter account:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('id'))?>" name="<?php echo $this->get_field_name(strtolower('id'))?>" type="text" value="<?php echo esc_attr($id)?>" /></label></p>
      <p><label><?php _e('Number of twits:')?><input class="widefat" id="<?php echo $this->get_field_id(strtolower('number'))?>" name="<?php echo $this->get_field_name(strtolower('number'))?>" type="text" value="<?php echo esc_attr($number)?>" /></label></p>
    <?php
  }
}

