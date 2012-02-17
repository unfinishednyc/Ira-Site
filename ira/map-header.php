
	<!-- jQuery and PrettyPhoto have already been loaded -->

	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
            
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/infobox.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/markerclusterer_compiled.js"></script>

	
	<script type="text/javascript">
                
    //<![CDATA[
    var markers = [];
    weddingToggle = "on";
    documentaryToggle = "on";
    explorationsToggle = "on";
    
    var customIcons = {
      documentary: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/documentarysmall.png'//,
        //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      wedding: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/weddingsmall.png'//,
        //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      explorations: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/explorationssmall.png'//,
        //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      ShowAll: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/explorationssmall.png'//,
        //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };
    

	  function load() {
	        
	  // Begin array of styles.
	  var ParksStyles = [
	    {
	      featureType: "landscape",
	      elementType: "geometry",
	      stylers: [
	        { hue: "0xffffff" }, 
	        {saturation: "-100"},
	        { lightness: "-20"},
	        {visibility: "on"}
	      ]
	    },
	    {
	      featureType: "administrative",
	      elementType: "labels",
	      stylers: [
	        { 
	           visibility: "off"
	        }
	      ]
	    },
	    {
	      featureType: "administrative",
	      elementType: "geometry",
	      stylers: [
	        { 
	            visibility: "off"
	        }
	      ]
	    },
	     {
	      featureType: "road",
	      elementType: "labels",
	      stylers: [
	        { hue: "0xffffff" }, 
	        {saturation: "-100"},
	        { lightness: "-20"},
	            {visibility: "on"}
	      ]
	    },
	    {
	      featureType: "transit",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off" }
	        ]
	    },
	    {
	      featureType: "transit",
	      elementType: "geometry",
	      stylers: [
	        { visibility: "off" }
	        ]
	    },
	     {
	      featureType: "road.arterial",
	      elementType: "geometry",
	      stylers: [
	        { hue: "0xffffff" }, 
	        {saturation: "-100"},
	        { lightness: "100"},
	            {visibility: "on"}
	      ]
	    },
	    {
	      featureType: "road.highway",
	      elementType: "geometry",
	      stylers: [
	        { visibility: "off"},
	         { hue: "0xffffff"}
	      ]
	    },
	    {
	      featureType: "road.highway",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off"}
	      ]
	    },
	    {
	      featureType: "poi",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off" }
	      ]
	    },
	    {
	      featureType: "water",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off"},
	        { hue: "#000000"}
	      ]
	    },
	    {
	      featureType: "water",
	      elementType: "geometry",
	      stylers: [
	        { visibility: "on"},
	        { hue: "0xffffff"},
	        { saturation: "0"},
	        { lightness: "100"}
	      ]
	    },
	    {
	      featureType: "landscape.man_made",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off",
	          saturation: -80 
	      	}
	      ]
	    },
	    {
	      featureType: "poi",
	      elementType: "geometry",
	      stylers: [
	        { visibility: "off" }
	      ]
	    }
	  ];
	
	  // Create a new StyledMapType object, passing it the array of styles,
	  // as well as the name to be displayed on the map type control.
	  var photoMapType = new google.maps.StyledMapType(ParksStyles,
	    {name: "Grey Parks"});
	
	  // Create a map object, and include the MapTypeId to add
	  // to the map type control.
	  var mapOptions = {
	    zoom: 11,
	    center: new google.maps.LatLng(45.6468, 37.581),
	    mapTypeControlOptions: {
	      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'grey_parks']
	    }
	  };
	        
	  //original code  
	  var map = new google.maps.Map(document.getElementById("map"), {
	    center: new google.maps.LatLng(29.84064389983441, 2.00),
	    zoom: 2,
	    scrollwheel: false,
	    navigationControl: false,
	    draggable: true,
	    streetViewControl: false,
	    mapTypeControl: false,
	    mapTypeId: 'roadmap', 
	    keyboardShortcuts:false
	  });
      
    //zoom controls
    var zoomControlDiv = document.getElementById("footer");
    var zoomControl = new ZoomControl(zoomControlDiv, map);
    //filter controls
    var filterControlDiv = document.getElementById("footer");
    var filterControl = new FilterControl(filterControlDiv, map);
    
    var globalConrtolDiv = document.getElementById("footer");
    var globalZoomControl = new GlobalZoomControl(globalConrtolDiv, map);
     
   
    //Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set('grey_parks', photoMapType);
    map.setMapTypeId('grey_parks');
		//map.addControl(new TextualZoomControl());

    //infobox instead of infowindow
    //var infoWindow = new google.maps.InfoWindow;
      var ib = new InfoBox({
          boxStyle:{
              background: "black"
              ,opacity: .75
                                         
          },
          disableAutoPan:true
         
      });
      
      var oldDraw = ib.draw;
          ib.draw = function() {
             oldDraw.apply(this);
              jQuery(ib.div_).hide();
              jQuery(ib.div_).fadeIn('slow'); 
      }
      
      var oldHide = ib.onRemove ;
          ib.onRemove  = function() {
              jQuery(ib.div_).fadeOut('slow');
              oldHide.apply(this);
      }
    
             
          
      "<?php $args = array('post_type'=> 'mapgallery',); query_posts( $args );?>"

//<!-- BEGIN THE LOOP OF ALL THE MAP GALLERY POSTS -->
"<?php if (have_posts()) : while (have_posts()) : the_post(); ?>"
//<!-- BEGIN A GALLERY POST -->

         var artist = "Joe Smith";
         var name = "<?php the_title();?>";
         var type = "<?php the_field('map_gallery_category'); ?>";
         var picpath = "<?php the_field('map_gallery_thumbnail'); ?>";
         
         
         var coordsarray = "<?php the_field('map_gallery_lat_long'); ?>".split(',') ;
         
         var lat = coordsarray[0];
         var lng = coordsarray[1];
         
         var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
         var picInfo = "<?php the_field('map_gallery_summary'); ?>"
         var rolloverInfo = "<?php the_field('map_gallery_summary'); ?>"
         
         
          var html = "<div class=\"infopic\"><a href=\"" + picpath + "\"><image src=" + picpath + " width=\"200\" height=\"200\"/></a></div><div class=\"infoboxtext\"><tr><td><p1>" + name + "</p1></td></tr></br></br><tr><td><p2>"+ rolloverInfo +"</p2></td></tr><br /><br /><tr><td><p3>" + type + "</p3></td></tr></div>";
          var icon = customIcons[type] || {};
          
          var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon.icon,
          shadow: icon.shadow
          });
         
          var html = "<div class=\"infopic\"><a href=\"" + picpath + "\"><image src=" + picpath + " width=\"200\" height=\"200\"/></a></div><div class=\"infoboxtext\"><tr><td><p1>" + name + "</p1></td></tr></br></br><tr><td><p2>"+ rolloverInfo +"</p2></td></tr><br /><br /><tr><td><p3>" + type + "</p3></td></tr></div>";
         
           
          marker.mytype = type;
          marker.photographerName = name;
          markers.push(marker);
          
          

            
           var api_images = ['/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke008.jpg'
                ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke015.jpg'
                ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke021.jpg'
                ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke023.jpg'
                ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke026.jpg'
                ,'<iframe src="http://player.vimeo.com/video/29774730?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><p><a href="http://vimeo.com/29774730">Uitgeleefd (Leave on a High)</a> from <a href="http://vimeo.com/louterfilm">Louter Film</a> on <a href="http://vimeo.com">Vimeo</a>.</p>'] 

          
          bindInfoWindow(marker, map, ib, html, api_images, name, type,  picInfo);
                      
                   
                  //-->
                    
        
//<!-- END OF ONE MAP GALLERY -->
"<?php endwhile; endif;?>"
//<!-- END OF THE GALLERY POSTS -->
          

          
       
        
        }
        //var markerCluster = new MarkerClusterer(map, markers);
      //);
     jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
    //-------------------End Initialize----------------------//
    
    
    
    

//     function downloadUrl(url, callback) {
//      var request = window.ActiveXObject ?
//          new ActiveXObject('Microsoft.XMLHTTP') :
//          new XMLHttpRequest;
//
//      request.onreadystatechange = function() {
//        if (request.readyState == 4) {
//          request.onreadystatechange = doNothing;
//          callback(request, request.status);
//        }
//      };
//      
//      request.open('GET', url, true);
//      request.send(null);
//      
//    }
    
//       function globalZoomOut(map){
//        alert("hit");
//        map.setCenter(29.84064389983441, 2.00);
//        map.setZoom(2);
//       }
        
      function showAll(){
        for (var i=0; i<markers.length; i++) {
            weddingToggle = "on"
            documentaryToggle = "on"
            explorationsToggle = "on"
        markers[i].setVisible(true);
       }
    }
  
      function show(type) {
      for (var i=0; i<markers.length; i++) {
        if (markers[i].mytype == type) {
          markers[i].setVisible(true);
        }
      }
    }
       function hide(type) {
      for (var i=0; i<markers.length; i++) {
        if (markers[i].mytype == type) {
          markers[i].setVisible(false);
        }
      }
     
      //infowindow.close();
    }

   
    
   function doNothing() 
        {}

     // infobox Bind Function  
       function bindInfoWindow(marker, map, ib, html, api_images, albumName, type,picInfo) {
         
        google.maps.event.addListener(marker, 'click', function() {
        ib.setContent(html);
        //ib.open(map, marker);
        ib.close(map,marker);
        var positionMarker = ib.getPosition();
        map.setZoom(13);
        map.panTo(positionMarker);
       
        jQuery.prettyPhoto.open(api_images ,picInfo);
        });
        
        
        google.maps.event.addListener(marker, 'mouseover', function() {
        ib.setContent(html);
        
//        if(document.getElementById("infoboxtext.p3").textContent()== "Wedding"){
//            jQuery.(this).css("color","blue");
//        }
        ib.open(map, marker);
        ib.show();

        });
       
       google.maps.event.addListener(marker, 'mouseout', function() {
       ib.close();

        });
        
       }
       
       
       
        
      function boxclick(category){
          //alert(category + ": " + weddingToggle)
          if (category == "Wedding"&& weddingToggle == "on") {
          weddingToggle = "off";
          hide(category);
          
          }
          else if(category == "Wedding" && weddingToggle == "off"){
           weddingToggle = "on";
           show(category);
            
      } 
      else if(category == "Documentary" && documentaryToggle == "on"){
            documentaryToggle = "off";
            hide(category);
            
      }
      else if(category == "Documentary" && documentaryToggle == "off"){
            documentaryToggle = "on";
            show(category);
            
      }
      else if(category == "Explorations" && explorationsToggle == "on"){
            explorationsToggle = "off";
            hide(category);
            
      }
      else if(category == "Explorations" && explorationsToggle == "off"){
            explorationsToggle = "on";
            show(category);
            
      }
     }

     
//                $(ib).mouseover(function () {
//        $('.infoBox').fadeIn("slow");
//      });


    jQuery('#wedding').click(function(){
        boxclick('Wedding');
    });
     jQuery('#documentary').click(function(){
        boxclick('Documentary');
    });
     jQuery('#explorations').click(function(){
        boxclick('Explorations');
    });
     jQuery('#showall').click(function(){
        showAll();
    });

        
     
    
    
        //ZoomControls
      function ZoomControl(zoomDiv, map){
        var zoomout = document.getElementById("zoomOut");  
        var zoomin = document.getElementById("zoomIn");
        
        google.maps.event.addDomListener(zoomout, 'click', function(){
            //alert("zoomout");
            map.setZoom(map.getZoom()-1);
        });
        
         google.maps.event.addDomListener(zoomin, 'click', function(){
            //alert("zoomin");
            map.setZoom(map.getZoom()+1);
        });
      }
 
      function FilterControl(zoomDiv, map){
        var Wedding = document.getElementById("wedding");  
        var Documentary = document.getElementById("documentary");
        var Explorations = document.getElementById("explorations");
        var ShowAll = document.getElementById("showall");
        
        
        google.maps.event.addDomListener(Wedding, 'click', function(){
            //alert("zoomout");
            boxclick("Wedding");
        });
         google.maps.event.addDomListener(Documentary, 'click', function(){
            //alert("zoomin");
           boxclick("Documentary");
        });
        google.maps.event.addDomListener(Explorations, 'click', function(){
            //alert("zoomin");
            boxclick("Explorations");           
        });
         google.maps.event.addDomListener(ShowAll, 'click', function(){
            //alert("zoomin");
            showAll();
        });
      }
      
      function GlobalZoomControl(zoomDiv, map){
        var GlobalZoomControl = document.getElementById("globalzoomout");  
        
        google.maps.event.addDomListener(GlobalZoomControl, 'click', function(){
            //alert("zoomin");
           
           map.setZoom(2);
        });
      }

     
     </script>

		<style><?php include('css/map-styles.css'); ?></style>
