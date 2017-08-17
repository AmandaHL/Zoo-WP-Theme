jQuery(function($) {
//responsive menu function	
$('.nav-icon').on('click', function(event){
		event.preventDefault();
		var slideoutMenu = $('.main-navigation');	
		slideoutMenu.slideToggle(200);
});
$(document).ready(function(){
$('.nav-subhead a').removeAttr('href');
});
$(document).ready(function(){
	 $('.sub-menu').hide();
	 //navigation hover style 
	$('.topnav > li').on('mouseenter', function(){
		$(this).siblings().children('.sub-menu').hide();
		if($(this).hasClass('menu-item-has-children')) {
    	$(this).children('.sub-menu').delay('300').show();
    	}
		})		
	$('.topnav > li').on('mouseleave', function(){
		$(this).children('.sub-menu').hide();
	})
	$('.arrow-toggle').on('click', function(){
		$('.portmenu').slideToggle('fast');
	})
});
$(document).ready(function(){
$('.secondnav > .sub-menu').hide();
$('.secondnav > .sub-menu > ul').show();
var upLink = $('.secondnav > li > ul > li:first-child')
upLink.addClass('active-link');
$('.active-link').children('ul').show();
 upLink.siblings('li').removeClass('active-link');
//secondary navigation  
$('.secondnav > li').on('mouseenter', function(){
	$(this).siblings().children('.sub-menu').hide();	
	if($(this).hasClass('menu-item-has-children')) {
		$(this).children('.sub-menu').delay('300').show();
		$('.header-drop-down').show();
		$(this).addClass('open');    
		}
	upLink.addClass('active-link');
    upLink.siblings('li').removeClass('active-link');
    })
$('.secondnav > li').on('mouseleave', function(){
$(this).children('.sub-menu').hide();
//$(this).children('.nav-image').hide();
$('.header-drop-down').hide();
$(this).removeClass('open');
 upLink.siblings('li').removeClass('active-link');
})


$('.secondnav > li > ul > li').on('mouseenter', function(){
$(this).addClass('active-link');
$(this).siblings().children('ul').hide();
	$(this).children('ul').show();
	//$('.nav-image').not($(this).children()).hide();
    $(this).children('.nav-image').show();
   $(this).siblings('li').removeClass('active-link');
})
$('.secondnav > li > ul > li').on('mouseleave', function(){
    $(this).children('.nav-image').hide();
    $(this).children('ul').hide();
    $(this).removeClass('active-link');
    upLink.addClass('active-link');
	$('.active-link').children('ul').show();
})
$('.secondnav > li > ul ul li').on('mouseenter', function(){
	$(this).siblings().children('ul').hide();	
	$(this).siblings().children('.nav-image').hide();
	$(this).children('.nav-image').show();
	$(this).parents('li').siblings().removeClass('active-link');
	$(this).parents().children('.nav-image').hide();
	$(this).siblings('li').removeClass('active-link');
})
$('.secondnav > li > ul ul li').on('mouseleave', function(){
	$(this).children('.nav-image').hide();
	
})
});



$(document).ready(function($){
  	var submitIcon = $('header .searchbox-icon');
  	var inputBox = $('header .searchbox-input');
  	var searchBox = $('header .searchbox');
  	var isOpen = false;
  	submitIcon.click(function(){
  		if(isOpen == false){
    		searchBox.addClass('searchbox-open');
    		inputBox.focus();
    		isOpen = true;
  		} else {
   	 		searchBox.removeClass('searchbox-open');
    		inputBox.focusout();
    		isOpen = false;
   		}
  	}); 
   	submitIcon.mouseup(function(){
    	return false;
   	});
   	searchBox.mouseup(function(){
    	return false;
   	});
  	$(document).mouseup(function(){
   		if(isOpen == true){
    	$('header .searchbox-icon').css('display','block');
    	submitIcon.click();
  	}
	});
function buttonUp(){
 var inputVal = $('header .searchbox-input').val();
 inputVal = $.trim(inputVal).length;
 if( inputVal !== 0){
  	$('header .searchbox-icon').css('display','none');
 	} else {
  	$('header .searchbox-input').val('');
  	$('.searchbox-icon').css('display','block');
 	}
}
});
// Find all iframes
var $iframes = $( "iframe" );
 
// Find &#x26; save the aspect ratio for all iframes
$iframes.each(function () {
  $( this ).data( "ratio", this.height / this.width )
    // Remove the hardcoded width &#x26; height attributes
    .removeAttr( "width" )
    .removeAttr( "height" );
});
 
// Resize the iframes when the window is resized
$( window ).resize( function () {
  $iframes.each( function() {
    // Get the parent container&#x27;s width
    var width = $( this ).parent().width();
    $( this ).width( width )
      .height( width * $( this ).data( "ratio" ) );
  });
// Resize to fix all iframes on page load.
}).resize();

//Image Gallery?
$(document).ready(function($){
var slideshows = $('.cycle-slideshow').on('scroll-next scroll-prev', function(e, opts) {
    // advance the other slideshow
    slideshows.not(this).cycle('goto', opts.currSlide);
});
$('#prod-2 div').click(function(){
    var index = $('#prod-2').data('cycle.API').getSlideIndex(this);
    slideshows.cycle('goto', index);
});

});

//Collapsible Content
$('.collapsible').hide();
$('.toggle').on('click',function(){
		var $closest = $(this).next('.collapsible');
		//var $sibBtn = $(this).siblings().children('.arrows');
		$('.collapsible').not($closest).slideUp();
		//$(this).parent().siblings().find('.arrows').removeClass('exp');
		//$(this).children('.arrows').toggleClass('exp');
		$closest.slideToggle('fast');	
});
//Social media icons open in new window
$('li.heateorSssSharingRound').click(function(){
  $(this).attr('target', '_blank');
  
});

});