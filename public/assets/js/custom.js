$(document).ready(function(){

  $('.modal-trigger').leanModal();
/** select box**/	
   $('select').material_select();
/** sliding sidebar for mobile view **/	  
   $('.slide-nav').click(function(){
	   $('body').addClass('sidebar-open');
	   return false;
	   });
	   
$('.sidebar-overlay').click(function(){
	   $('body').removeClass('sidebar-open');
	   return false;
	   });
	   
    $('.auto-desc .btn').click(function(event){ /* find all a.read_more elements and bind the following code to them */

        event.preventDefault(); /* prevent the a from changing the url */
        $(this).closest('.auto-desc').toggleClass('show-all'); /* show the .more_text span */

    });


/** featured corousel **/
$('.featured-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
     
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
   
  ]
});


/** related corousel **/
$('.related-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
     
      }
    },
	{
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
     
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
   
  ]
});



/** Item Gallery corousel **/
$('.item-image-list').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
  
   
  ]
});


/*==========================*/	
/* Lighbox */	
/*==========================*/	
$('.item-gallery-container').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  type: 'image',
  // other options
  gallery: {
  enabled: true,
  preload: [0,2], 
  removalDelay: 300,
  navigateByImgClick: true,
  titleSrc: 'title', 
  arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

  tPrev: 'Previous (Left arrow key)', // title for left button
  tNext: 'Next (Right arrow key)', // title for right button
  tCounter: '<span class="mfp-counter"></span>' // markup of counter
}
});



$timeSlots = $('.link-list');
$timeSlots.each(function() {
    var $times = $(this).children();
    if ($times.length > 5) {
        $timeSlots.children(':nth-of-type(n+6)').hide();
        $(this).append('<span class="more-times">+More</span>');
    }
});

$timeSlots.on('click', '.more-times', function() {
    $(this).prevAll().show().end().remove();
});



})



var callback = function () {
     
if ($(window).width() > 1049) {
$('.fix-sidebar, .fix-content')
.theiaStickySidebar({
	additionalMarginTop: 0
});
        
};
  };
  $(document).ready(callback);
  $(window).resize(callback);	





var callback2 = function () {
     
if ($(window).width() > 992) {
$('.half-left, .half-right')
.theiaStickySidebar({
	additionalMarginTop: 0
});
        
};
  };
  $(document).ready(callback2);
  $(window).resize(callback2);	

/** range slider **/
  
var snapSlider = document.getElementById('price-range');

noUiSlider.create(snapSlider, {
  start: [  price[0], price[1] ],
  decimals: 0,
  thousand: ',',
  snap: false,
  connect: true,
  step: 1000,
  range: {
    'min': 0,
    
    'max': 60000
  },
  format: wNumb({
    decimals: 0,
    thousand: ','
  })
});
  

var snapValues = [
  document.getElementById('min-price'),
  document.getElementById('max-price')
];

snapSlider.noUiSlider.on('update', function( values, handle ) {
  snapValues[handle].innerHTML = values[handle];
});

var odometerSlider = document.getElementById('odometer-range');

noUiSlider.create(odometerSlider, {
  start: [ odometer[0], odometer[1] ],
  decimals: 0,
  thousand: ',',
  snap: false,
  connect: true,
  step: 1000,
  range: {
    'min': 0,
    
    'max': 80000
  },
  format: wNumb({
    decimals: 0,
    thousand: ','
  })
});
  

var odometerValues = [
  document.getElementById('min-odometer'),
  document.getElementById('max-odometer')
];

odometerSlider.noUiSlider.on('update', function( values, handle ) {
  odometerValues[handle].innerHTML = values[handle];
});

var yearSlider = document.getElementById('year-range');

noUiSlider.create(yearSlider, {
  start: [ year[0], year[1] ],
  decimals: 0,
  thousand: ',',
  snap: false,
  connect: true,
  step: 1,
  range: {
    'min': 2000,
    
    'max': 2017
  },
  format: wNumb({
    decimals: 0
  })
});
  

var yearValues = [
  document.getElementById('min-year'),
  document.getElementById('max-year')
];

yearSlider.noUiSlider.on('update', function( values, handle ) {
  yearValues[handle].innerHTML = values[handle];
});
	



