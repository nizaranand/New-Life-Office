/**
 * Portfolio previewer-  displays previews of the portfolio
 * items separated by pages and adds a functionality for displaying a post after
 * clicking on the smaller preview
 * 
 * @author Pexeto http://pexeto.com
 */

(function($){
	$.fn.portfolioPreviewer=function(options){
	// main default settings
		var defaults={
			itemnum : 6,
			pageWidth : 270,
			speed : 500, // will be overwritten by the XML data
			catId : -1,
			autoThumbnail:'on'
		};

		
		var options=$.extend(defaults, options);
		
	// data containers
	var items = [], divContainer, firstColumn, wrapper, pageWrappers = [], currentShown = 0, ie=$.browser.msie, maxWrapperHeight=0,images=[], inAnimation=false;
	var root=$(this);

	/**
	 * Parses the data from the XML file, creates objects from the data and
	 * saves the objects into arrays.
	 */
	var parseData = function() {
		
				
				$('.portfolio-showcase-item').each(
						function(i) {
							
							var current = $(this),
							post = {};
							
							// create the object for the post
							post.obj = current.find('.preview-item:first');
							post.html = post.obj.html();
							post.smallObj = current.find('.showcase-item:first');

							items.push(post);
						});
				
				if (items.length > 0) {
					displayContent();
					bindEventHandlers();
				}
		
	};


	/**
	 * Displays the main content of the items container.
	 */
	var displayContent = function() {
		firstColumn = $('<div id="portfolio-preview"><div class="loading"></div></div>');
		var secondColumn = $('<div class="portfolio-sidebar"><h4>'+options.more+'</h4><div class="double-line"></div><div id="portfolio-wrapper"></div></div>');
		$('.preview-items').detach();
		root.html('').append(firstColumn).append(secondColumn);
		wrapper = secondColumn.find('#portfolio-wrapper');

		// show the first post
		showFirstPost();

		// show the other posts from the right
		displayPostList();
		
		pexetoSite.loadCufon();
	};

	var showFirstPost = function(post) {
		firstColumn.html(items[0].obj);
	};

	/**
	 * Displays all the smaller post previews to the right, separated by pages.
	 */
	var displayPostList = function() {

		for ( var i = 0; i < items.length; i++) {
			if (i % options.itemnum === 0) {
				var pageWrapper = $('<div class="portfolio-items"></div>');
				pageWrappers.push(pageWrapper);
				wrapper.width(wrapper.width() + 500);
				wrapper.append(pageWrapper);
			}
			var post = items[i].smallObj;
			
			pageWrappers[pageWrappers.length - 1]
					.append(post);
					
					
		}

		if (items.length > options.itemnum) {
			setWrapperHeight();
			showNavigation();
		}

		setPostClickHandlers();
	};
	
	var setWrapperHeight = function(){
		for(var i=0,length=pageWrappers.length; i<length; i++){
			if(pageWrappers[i].height()>maxWrapperHeight){
				maxWrapperHeight=pageWrappers[i].height();
			}
			
			wrapper.height(maxWrapperHeight);
		}
	}
	
	/**
	 * Binds a change slide event handler to the wrapper so that when a navigation button has been clicked,
	 * to change the slide according to the index of the slide to be displayed.
	 */
	var bindEventHandlers=function(){
		wrapper.bind('changeSlide', function(e, index){
			if(!inAnimation){
				//it is not currently animated, do the animation now
				inAnimation=true;
				$('.portf-navigation').trigger('slideChanged', [index]);
				var margin = - index * (options.pageWidth + 31);
				wrapper.animate( {
					marginLeft :  margin
				}, options.speed, function(){
					currentShown=index;
					inAnimation=false;
				});
			}
		});
	}


	/**
	 * Shows the pagination below the smaller post previews.
	 */
	var showNavigation = function() {
		var paginationHolder=$('<div id="portfolio-big-pagination" class="hover"></div>').appendTo(wrapper.parent()),
			ul=null,
			pageNumber=pageWrappers.length,
			selectedClass='selected';
		
		// set the next button click handler
		$('<a />', {'class':'alignright', 'id':'next-item'})
		.click(function(event) {
			event.preventDefault();
			if (currentShown < pageWrappers.length - 1) {
				wrapper.trigger('changeSlide', [currentShown+1]);
			}
		}).appendTo(paginationHolder);

		// set the previous button click handler
		$('<a />', {'class':'alignright', 'id':'prev-item'})
		.click(function(event) {
			event.preventDefault();
			if (currentShown !== 0) {
				wrapper.trigger('changeSlide', [currentShown-1]);
			}
		}).appendTo(paginationHolder);
		
		
		//build the navigation buttons
		ul=$('<ul />', {'class':'portf-navigation'}).appendTo(paginationHolder);
		
		var html='';
		while(pageNumber--){
			html+='<li></li>';
		}
		
		ul.bind('slideChanged', function(event, index){
			$(this).find('li').removeClass(selectedClass).eq(index).addClass(selectedClass);
		})
		.append(html).find('li').click(function(){
			if(currentShown!=$(this).index()){
				wrapper.trigger('changeSlide', [$(this).index()]);
			}
		}).eq(0).addClass(selectedClass);
	};

	/**
	 * Sets post click handlers to the smaller previews. When a small preview post is clicked
	 * the whole content of the post is shown to the left.
	 */
	var setPostClickHandlers = function() {
		var itemsNumber = items.length;
		for ( var i = 0; i < itemsNumber; i++)
			(function(i) {
				items[i].smallObj.each(function(j) {
					$(this).bind(
							{
								'click' : function() {
									var current = items[i];
									firstColumn.html(current.obj);
									pexetoSite.loadCufon();
									pexetoSite.setLightbox(jQuery("a[rel^='lightbox'],a[rel^='lightbox[group]']"));
								},
								'mouseover' : function() {
									$(this).css( {
										cursor : 'pointer'
									});
								}
							});
				});
			})(i);

	};
	
	if(root.length){
		parseData();
	}

	};
}(jQuery));