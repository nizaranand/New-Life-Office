jQuery(document).ready(function() {

 
        jQuery('#subquickship1').hide();
		jQuery('#subquickship2').hide();
		
        jQuery('li.qtitle1').click(function() {
          jQuery('#subquickship1').show('slow');
		  jQuery('#subquickship2').hide('slow');
          return false;

        });
		
		jQuery('li.qtitle2').click(function() {
          jQuery('#subquickship2').show('slow');
		  jQuery('#subquickship1').hide('slow');
          return false;

        });           

      });


function showcheck(id)
{
	document.getElementById(id).style.display = 'block';
}
function hidecheck(id)
{
	document.getElementById(id).style.display = 'none';
}	