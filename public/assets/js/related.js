

class Related extends React.Component {

	constructor(props) {
	    super(props);

	    this.state = {vehicles: []};
	}

  	componentDidMount() {
    	this.VehicleList();
  	}

	VehicleList() {
		var slug = window.location.pathname.split('/').pop();
        console.log(base_url+'/vehicle-related/'+slug);
	    return $.getJSON(base_url+'/vehicle-related/'+slug)
	      .then((data) => {
	      	console.log(data)
	        this.setState({ vehicles: data });
	      });
	}

	render(){
		const vehiclehtml = this.state.vehicles.map((item, i) => {
		if(item.photos.length>0)
			var src = item.photos[0].path;
		else
			var src = '';
      	return <div>
              	<div className="fetured-box">
                <a href={base_url+"/vehicle/"+item.slug}>
                	<h4>{item.year+' '+item.make.make_name+' '+item.model.model_name}</h4>
                    <div className="featured-img">
                    	<img src={src} alt={item.make.make_name+' '+item.model.model_name} onError={(e)=>{e.target.src='/assets/images/placeholder.jpg'}}/>
                        <span className="overlay"></span>
                    </div>
                    <div className="featured-details">
                    	<div className="price"><i className="fa fa-tag"></i> ${item.price}</div>
                        <div className="run"><i className="fa fa-dashboard"></i> {item.odometer} KM</div>
                    </div>
                    </a>
                </div>
                </div>
    });


	var settings = {
      	dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
                breakpoint: 1000,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,

                }
            }, {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,

                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }

        ]
    };
    return (
      <Slider className="featured-list related-slider" {...settings}>
        {vehiclehtml}
      </Slider>
    );
	}
}


 ReactDOM.render(<Related />,
  document.getElementById('related-vehicles')
);
