	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
	<script type="text/javascript">
		var map;
		function initialize() {
		      
			var iraStyles = [
			  {
			    featureType: "road.arterial",
			    elementType: "geometry",
			    stylers: [
			      { lightness: 20 },
			      { visibility: "on" }
			    ]
			  },{
			    featureType: "transit",
			    stylers: [
			      { gamma: 0.5 },
			      { saturation: -99 },
			      { lightness: -98 },
			      { visibility: "off" }
			    ]
			  },{
			    featureType: "water",
			    stylers: [
			      { hue: "#afafaf" },
			      { saturation: -100 },
			      { lightness: 100 }			      
			    ]
			  },{
			    featureType: "road.local",
			    elementType: "geometry",
			    stylers: [
			      { saturation: -100 },
			      { visibility: "simplified" },
			      { lightness: -22 }
			    ]
			  },{
			    featureType: "road.arterial",
			    elementType: "labels",
			    stylers: [
			      { visibility: "on" }
			    ]
			  },{
			    featureType: "landscape",
			    stylers: [
			      { visibility: "off" }
			    ]
			  },{
			    featureType: "poi",
			    stylers: [
			      { visibility: "off" }
			    ]
			  },{
			    featureType: "road.local",
			    elementType: "labels",
			    stylers: [
			      { visibility: "on" }
			    ]
			  },{
			    featureType: "all",
			    stylers: [
			      { hue: "#ff0000" },
			      { saturation: -100 }
			    ]
			  },{
			    featureType: "road.highway",
			    stylers: [
			      { saturation: -100 },
			      { lightness: 45 }
			    ]
			  }
			];
			      
			      
			// Create a new StyledMapType object, passing it the array of styles,
			// as well as the name to be displayed on the map type control.
			var pinkMapType = new google.maps.StyledMapType(iraStyles);
			
			// Create a map object, and include the MapTypeId to add
			// to the map type control.
			var mapOptions = {
				zoom: 15,
				center: new google.maps.LatLng(40.71485,-73.964971),
				mapTypeControlOptions: {
				  mapTypeIds: []
				}
		};
		
		var map = new google.maps.Map(document.getElementById('map_canvas'),
		mapOptions);
		
		//Associate the styled map with the MapTypeId and set it to display.
		map.mapTypes.set('ira_map', pinkMapType);
		map.setMapTypeId('ira_map');
		
		var image = '<?php bloginfo('stylesheet_directory'); ?>/images/map_icon.png';
		var myLatLng = new google.maps.LatLng(40.71485,-73.964971);
		var beachMarker = new google.maps.Marker({
	    position: myLatLng,
	    map: map,
	    icon: image
		});
		  
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
