</div>
<?php wp_footer(); ?>
<?php 
$analytics = get_option('analytics'); 
if($analytics) { echo stripslashes($analytics); } ?>
</body>
</html>