// JavaScript Document
jQuery(document).ready(function() {
	
	var trazaViewPortWidth = '',
		trazaViewPortHeight = '';

	function trazaViewport(){

		trazaViewPortWidth = jQuery(window).width(),
		trazaViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( trazaViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var trazaSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var trazaSiteHeaderWidth = jQuery('.site-header').width();
			var trazaSiteHeaderPadding = ( trazaSiteHeaderWidth * 2 )/100;
			var trazaMenuHeight = jQuery('.menu-container').height();
			
			var trazaMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var trazaMenuPadding = ( trazaSiteHeaderHeight - ( (trazaSiteHeaderPadding * 2) + trazaMenuHeight ) )/2;
			var trazaMenuButtonsPadding = ( trazaSiteHeaderHeight - ( (trazaSiteHeaderPadding * 2) + trazaMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':trazaMenuPadding});
			jQuery('.site-buttons').css({'padding-top':trazaMenuButtonsPadding});
			
		}else{

			jQuery('.menu-container, .site-buttons').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		trazaViewport();
		
	});
	
	trazaViewport();
	
	jQuery('.site-branding .search-button').on('click', function(){
		
		if( trazaViewPortWidth > 1200 ){

			jQuery('.fullSearchContainer').css({'height':trazaSiteHeaderHeight,'position':'fixed','top':'0','left':'0'}).fadeIn(500);
		
		}else{
			jQuery('.main-navigation').slideToggle();
		}	
		
				
	});

	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( trazaViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

	jQuery('.site-branding .account-button').on('click', function(){
		
		if( trazaViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}		
				
	});

	jQuery('.site-buttons .search-button').on('click', function(){

		if( trazaViewPortWidth > 1200 ){

		
			jQuery('.fullSearchContainer').css({'height':trazaViewPortHeight,'position':'fixed','top':'0','left':'0','z-index':'99'}).fadeIn(500, function(){
				
				var fullSearchContainerHeight = jQuery('.fullSearchFieldContainer').height();
				var fullSearchContainerPadding = ( trazaViewPortHeight - fullSearchContainerHeight ) / 2;
			
			
				jQuery('.fullSearchFieldContainer').css({'padding-top':fullSearchContainerPadding}).fadeIn(1000);				
				
			});
		
		}else{
			
		}	
		
				
	});	
	
	jQuery('.fullSearchContainerClose').on('click', function(){
		
		if( trazaViewPortWidth > 1200 ){

			jQuery('.fullSearchContainer').fadeOut(1000, function(){
				jQuery('.fullSearchContainer, .fullSearchFieldContainer').removeAttr('style');
			});
		
		}else{
			
		}	
		
				
	});
	
    var owl = jQuery("#traza-owl-basic");
         
    owl.owlCarousel({
             
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem:true,
		navigation : true,
      	pagination : false,
      	navigationText : false,
         
    });	
	
});		