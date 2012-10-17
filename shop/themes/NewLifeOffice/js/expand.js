$(document).ready(function() {

 
        $('#subquickship1').hide();
		$('#subquickship2').hide();
		
        $('li.qtitle1').click(function() {
          $('#subquickship1').show('slow');
		  $('#subquickship2').hide('slow');
          return false;

        });
		
		$('li.qtitle2').click(function() {
          $('#subquickship2').show('slow');
		  $('#subquickship1').hide('slow');
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