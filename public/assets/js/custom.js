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
	start: [ 0, 60000 ],
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
  start: [ 0, 80000 ],
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
  

var odometerValues = [
  document.getElementById('min-odometer'),
  document.getElementById('max-odometer')
];

odometerSlider.noUiSlider.on('update', function( values, handle ) {
  odometerValues[handle].innerHTML = values[handle];
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
