</div>
<?php
global $pex_page;
if($pex_page->layout!='full'&&$pex_page->layout!='none'){
	print_sidebar($pex_page->sidebar);
}

?>
<div class="clear"></div>
<?php if(isset($pex_page->carousel) && $pex_page->carousel && $pex_page->carousel!='hide'){?>
<!--portfolio projects carousel-->
<div class="center">
<?php 
//function located in lib/functions/general.php
echo pexeto_portfolio_carousel($pex_page->carousel, 5, $pex_page->carousel_title); ?></div>
<?php }?>
</div>
</div>
