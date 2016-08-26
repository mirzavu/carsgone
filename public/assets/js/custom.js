$(document).ready(function(){
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
	   

/** range slider **/
	
var snapSlider = document.getElementById('price-range');

noUiSlider.create(snapSlider, {
	start: [ 0, 500 ],
	snap: false,
	connect: true,
	range: {
		'min': 0,
		
		'max': 1000
	}
});
  

var snapValues = [
	document.getElementById('min-price'),
	document.getElementById('max-price')
];

snapSlider.noUiSlider.on('update', function( values, handle ) {
	snapValues[handle].innerHTML = values[handle];
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


})
