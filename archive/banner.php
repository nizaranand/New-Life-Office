<?php
add_action('template_redirect', 'them_js_head_load');

function them_js_head_load(){

 // we don't need this on admin pages, so...
	if(is_admin()) return;

      wp_enqueue_script('tabber', get_bloginfo('template_directory') . '/scripts/tabs.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'), '1.0');
}
 ?>

 <div id="s3slider">
   <ul id="s3sliderContent">
      <li class="s3sliderImage">
       	   <img src="img/banner/incubator.jpg" width="950" height="340" /> <span>RTLS, Real Time Location Systems, RFID, Radio Frequency Identification, Barcode, Reader</span>
      </li>
      <li class="s3sliderImage">
          <img src="img/banner/hospital.jpg" width="950" height="340" /> <span>Conexus Inc. specializes in Asset Tracking, Locating in Real Time, RTLS, RFID, and Barcode.</span>
      </li>
	  <li class="s3sliderImage">
           <img src="img/banner/medc17.jpg" width="950" height="340" /> <span>Effective asset management can reduce loss by 10% to 20% and decrease cost of ownership by 20% to 40%.</span>
      </li>
       <li class="s3sliderImage">
          <img src="img/banner/plexusLaptop.jpg" width="950" height="340" /> <span>Plexus Vision is a software platform that interfaces with RTLS, RFID and Barcode capture systems. Allowing the user to use multiple forms of data capture and have a uniform system to analyze the and use the data.</span>
      </li>
      <li class="s3sliderImage">
      <img src="img/banner/propaq.jpg" width="950" height="340" /> <span>PMITS is a commercial off the shelf product licensed for use in the patient movement items with government owned modifications made to the Commercial off-the-shelf.</span>
      </li>
      <div class="clear s3sliderImage"></div>
      </ul>
    <!-- end .s3slider --></div>
    
$(document).ready(function() { 
   $('#s3slider').s3Slider({ 
      timeOut: 12000 
   });
});
