<?php
/**
 * Search - this is the page that displays the search results.
 */
get_header();
//get all the page data needed and set it to an object that can be used in other files
$pex_page=new stdClass();
$pex_page->subtitle=pex_text('_search_results_text').' "'.get_search_query().'"';
$pex_page->slider='none';
$pex_page->excerpt=true;
$pex_page->layout=get_opt('_blog_layout');
$pex_page->sidebar=get_opt('_blog_sidebar');

//include the before content template
locate_template( array( 'includes/html-before-content.php'), true, true );

if(have_posts()){
	while(have_posts()){
		the_post();
		global $more;
		$more = 0;

		//include the post template
		locate_template( array( 'includes/post-template.php'), true, false );

	}

	print_pagination();

}else{
	echo ('<p>'.pex_text('_no_results_text').'</p>');
	//include the search template
	locate_template( array( 'searchform.php'), true, true );
}

//include the after content template
locate_template( array( 'includes/html-after-content.php'), true, true );

get_footer();
?>