jQuery(document).ready(function() {

    var url = "" + window.location;
    var names = url.split('/');
    var name = location.pathname.substr(1).split('/', 1)[0] || '/';
    var secondname = names[4];

    jQuery('.emailreqtxt').hide();

    if(name == "boise-office")
    {
    jQuery('#menu-item-1592').html("<li id='menu-item-1592' class='menu-item menu-item-type-post_type current-page-ancestor current-page-parent menu-item-1592'><a href='http://www.newlifeoffice.com/boise-office/' title='location'>Home</a></li>");

    jQuery('#menu-item-2177').html("<li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-2177' id="menu-item-2177'><a href='#'>Refurbished Cubicles</a>
<ul class='sub-menu'>
	<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-2173' id='menu-item-2173'><a href='http://www.newlifeoffice.com/boise-office/boise-4-call-center/'>4′ call center</a></li>
	<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-2176' id="menu-item-2176'><a href='http://www.newlifeoffice.com/boise-office/boise-6x6/'>6×6</a></li>
	<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-2175' id='menu-item-2175'><a href='http://www.newlifeoffice.com/boise-office/boise-7x7/'>7×7</a></li>
	<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-2174' id='menu-item-2174'><a href='http://www.newlifeoffice.com/boise-office/boise-8x8/'>8×8</a></li>
</ul>
</li>");
    
    jQuery('#menu-item-2071').html("<li id='menu-item-2064' class='menu-item menu-item-type-post_type menu-item-1545'><a href='http://www.newlifeoffice.com/boise-office/boise-used-inventory/'>Used Product In Stock</a></li>");

    jQuery('#menu-item-1643').html("<li id='menu-item-1643' class='menu-item menu-item-type-custom menu-item-1643'><a>New Product</a><ul class='sub-menu'><li id='menu-item-1642' class='menu-item menu-item-type-post_type menu-item-1642'><a href='http://www.newlifeoffice.com/boise-office/boise-desk/'>Desks</a></li><li id='menu-item-1656' class='menu-item menu-item-type-post_type menu-item-1656'><a href='http://www.newlifeoffice.com/boise-office/boise-tables-and-storage/'>Tables &amp; Storage</a></li><li id='menu-item-1657' class='menu-item menu-item-type-post_type menu-item-1657'><a href='http://www.newlifeoffice.com/boise-office/boise-chair/'>Chairs</a></li></ul></li>");
    jQuery('#menu-item-2062').html('');
    }
    
    if(name == "salt_lake")
    {





      jQuery('#menu-item-1643').html("<li id='menu-item-1643' class='menu-item menu-item-type-custom menu-item-1643'><a>New Product</a><ul class='sub-menu'><li id='menu-item-1642' class='menu-item menu-item-type-post_type menu-item-1642'><a href='http://www.newlifeoffice.com/salt_lake/salt-lake-desk/'>Desks</a></li><li id='menu-item-1656' class='menu-item menu-item-type-post_type menu-item-1656'><a href='http://www.newlifeoffice.com/salt_lake/salt-lake-table-and-storage/'>Tables &amp; Storage</a></li><li id='menu-item-1657' class='menu-item menu-item-type-post_type menu-item-1657'><a href='http://www.newlifeoffice.com/salt_lake/salt-lake-chair/'>Chairs</a></li></ul></li>");
      jQuery('#menu-item-2062').html('');

      jQuery('#menu-item-2071').html("<li id='menu-item-2071' class='menu-item menu-item-type-post_type menu-item-object-page menu-item-1545'><a href='http://www.newlifeoffice.com/salt_lake/salt-lake-currenlty-available/'>Used Product In Stock</a></li>");

    }

    if(name == "las-vegas-office")
    {
      jQuery('#menu-item-1592').html("<li id='menu-item-1592' class='menu-item menu-item-type-post_type current-page-ancestor current-page-parent menu-item-1592'><a href='http://www.newlifeoffice.com/las-vegas-office/' title='location'>Home</a></li>");

    }
    if(secondname == "las_vegas_gallery")
    {
      jQuery('#lasVegasProduct').html("");
      jQuery('#lasVegasProduct').css('border-bottom','none');
    }


});
