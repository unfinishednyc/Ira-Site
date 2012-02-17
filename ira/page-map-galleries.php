<?php
/*
Template Name: IraLippkeMap
 */
?>

<head>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>Location Galleries &mdash; Ira Lippke Studios</title>



  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="screen"  />
  
  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/pp/css/prettyPhoto.css" media="screen"  />

	<script type="text/javascript" src="http://use.typekit.com/tox4tzn.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript"  src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.prettyPhoto.js" ></script>
  <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/video.js"></script>
  
  
  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/infobox.js"></script>
  <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/markerclusterer_compiled.js"></script>
  <script type="text/javascript">
           
    //<![CDATA[
    var markers = [];
    weddingToggle = "on";
    documentaryToggle = "on";
    explorationsToggle = "on";
    
		var customIcons = {
      documentary: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/mapicon_doc.png'//,
      },
      wedding: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/mapicon_wedding.png'//,
      },
      explorations: {
        icon: '<?php bloginfo('stylesheet_directory'); ?>/images/mapicon_explore.png'//,
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
	        { lightness: "-.5"},
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
	        { hue: "0xffffff"	},
	        { saturation: "0"	},
	        { lightness: "100"}
	      ]
	    },
	    {
	      featureType: "landscape.man_made",
	      elementType: "labels",
	      stylers: [
	        { visibility: "off"},
	        {	saturation: -80 }
	      ]
	    },
	    {
	      featureType: "poi",
	      elementType: "geometry",
	      stylers: [
	        { visibility: "off" }
	      ]
	    },{
		    featureType: "road.arterial",
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
	
     
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			social_tools:false,
			animation_speed: 'fast',
			theme: 'light_square',
			slideshow: 3000,
			default_width: 500,
			default_height: 500,
			horizontal_padding:0,
			deeplinking:false,
			overlay_gallery: false,
			custom_markup:'',
			changepicturecallback: function(){
			//Cufon.refresh();
			  VideoJS.setupAllWhenReady({
					controlsHiding: false, // Hide controls when mouse is not over the video
					defaultVolume: 0.7 // Will be overridden by user's last volume if available
				}); 
      }   
		});
     
   
      //Associate the styled map with the MapTypeId and set it to display.
      map.mapTypes.set('grey_parks', photoMapType);
      map.setMapTypeId('grey_parks');
		  //map.addControl(new TextualZoomControl());
  
	    //infobox instead of infowindow
	    //var infoWindow = new google.maps.InfoWindow;
      var ib = new InfoBox({
          boxStyle:{
                                         
          },
          disableAutoPan:true
         
      });
      
      ib.mappy = map;
      
      
      var oldDraw = ib.draw;
          ib.draw = function() {
             oldDraw.apply(this);
             
             
              ib.div_.firstChild.ib = ib; 
            
              jQuery(ib.div_).hide().fadeIn("fast");
              
              };
//              .click(function(){
//                  alert("hit");
//              }); 
              //jQuery(ib.div_).fadeIn("slow");
      //}
      
     
         var oldHide = ib.hide ;
          ib.hide  = function() {
              jQuery(ib.div_).delay(1000).fadeOut("fast").mouseover(function(){
                 jQuery(ib.div_).stop(true).css('opacity', 1).mouseout(function(){
                     jQuery(ib.div_).fadeOut("fast");
                 });
                
                  
              });
               oldHide.apply(this);
      }
      
     
           //jQuery.prettyPhoto.open(data.img, data.art, data.cap); 
       //});
 
        
 "<?php $args = array('post_type'=> 'mapgallery', 'posts_per_page' => -1);query_posts( $args );?>"
     
 
//<!-- BEGIN THE LOOP OF ALL THE MAP GALLERY POSTS -->
"<?php if (have_posts()) : while (have_posts()) : the_post(); ?>"
//<!-- BEGIN A GALLERY POST -->
                
                     // var artist = "Joe Smith";
                     var name = "<?php the_title();?>";
                     var type = "<?php the_field('map_gallery_category'); ?>";
                     var picpath = "<?php the_field('map_gallery_thumbnail'); ?>";
                     
                     
                     var coordsarray = "<?php $the_field = the_field('map_gallery_lat_long'); ?>".split(',');
                     
                     var lat = coordsarray[0];
                     var lng = coordsarray[1];
                     
                     var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
                     var picInfo = "<?php the_field('map_gallery_summary'); ?>";
                     var rolloverInfo = "<?php the_field('map_gallery_summary'); ?>";
                      
                     
                     var html = "<div id=\"infowindow\" style=\"z-index:99999\"><div class=\"infopic\"><image src=" + picpath + " width=\"200\" height=\"200\"/></a></div><div class=\"infoboxtext\"><p1>" + name + "</p1><p2>"+ rolloverInfo +"</p2><p3 class='" + type + "'>" + type + "</p3></div></div>";

                      var icon = customIcons[type] || {};
                       
                      var marker = new google.maps.Marker({
                      map: map,
                      position: point,
                      icon: icon.icon,
                      shadow: icon.shadow
                      });
                      
                    //var html = "<div class=\"infopic\"><a href=\"javascript:openAlbum(" + ib + ") \"><image src=" + picpath + " width=\"200\" height=\"200\"/></a></div><div class=\"infoboxtext\"><p1>" + name + "</p1><p2>"+ rolloverInfo +"</p2><p3 class='" + type + "'>" + type + "</p3></div>";

                
          
          marker.postId = "<?php echo $post->ID; ?>";
          marker.mytype = type;
          marker.photographerName = name;
          markers.push(marker);
          
          
           
          
          
          bindInfoWindow(marker, map, ib, html);

                  //-->
        
//<!-- END OF ONE MAP GALLERY -->
"<?php endwhile;endif;?>"
     
        }
        //var markerCluster = new MarkerClusterer(map, markers);
      
    
    
    
    //-------------------End Initialize----------------------//

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
   function bindInfoWindow(marker, map, ib, html) {
    google.maps.event.addListener(marker, 'click', function() {
    ib.markery = marker;
    ib.setContent(html);
    ib.open(map, marker);
    
    var oldHide = ib.hide ;
          ib.hide  = function() {
              jQuery(ib.div_).delay(1000).fadeOut("medium").mouseover(function(){
                 jQuery(ib.div_).stop(true).css('opacity', 1).mouseout(function(){
                     jQuery(ib.div_).fadeOut("medium");
                 });
                
                  
              });
               oldHide.apply(this);
      }
    
    
    ib.close(map,marker);
    var positionMarker = ib.getPosition();
    map.setZoom(13);
    map.panTo(positionMarker);
    

        var data = 'postid=' + marker.postId;
     
        jQuery.ajax({
            type: "GET",
            url:"http://216.70.89.244/?page_id=1188",
            data: data,
            dataType: "json",
            success: function(data){
               if(data.img != null || data.art != null || data.cap != null){
                   jQuery.prettyPhoto.open(data.img, data.art, data.cap); 
               }
            }
        })
   
          });
        
				/*function update() {
					ib.close();
				}*/
        google.maps.event.addListener(marker, 'mouseover', function() {
		      ib.markery = marker;
                      ib.setContent(html);
		      ib.open(map, marker);
		      ib.show();
                      
        });
        
	google.maps.event.addListener(marker, 'mouseout', function() {
			ib.hide();

				});
        
       
       };
       
       function openAlbum(ib){
           alert(ib.postId);
   
       }
 
      function boxclick(category){
          //alert(category + ": " + weddingToggle)
          if (category == "wedding"&& weddingToggle == "on") {
          weddingToggle = "off";
          hide(category);
          
          }
          else if(category == "wedding" && weddingToggle == "off"){
           weddingToggle = "on";
           show(category);
            
      } 
      else if(category == "documentary" && documentaryToggle == "on"){
            documentaryToggle = "off";
            hide(category);
            
      }
      else if(category == "documentary" && documentaryToggle == "off"){
            documentaryToggle = "on";
            show(category);
            
      }
      else if(category == "explorations" && explorationsToggle == "on"){
            explorationsToggle = "off";
            hide(category);
            
      }
      else if(category == "explorations" && explorationsToggle == "off"){
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
            boxclick("wedding");
        });
         google.maps.event.addDomListener(Documentary, 'click', function(){
            //alert("zoomin");
           boxclick("documentary");
        });
        google.maps.event.addDomListener(Explorations, 'click', function(){
            //alert("zoomin");
            boxclick("explorations");           
        });
/*
         google.maps.event.addDomListener(ShowAll, 'click', function(){
            //alert("zoomin");
            showAll();
        });
*/
      }
      
      function GlobalZoomControl(zoomDiv, map){
        var GlobalZoomControl = document.getElementById("globalzoomout");  
        
        google.maps.event.addDomListener(GlobalZoomControl, 'click', function(){
            //alert("zoomin");
           
           map.setZoom(2);
        });
      }

     </script>
    
</head>

<body class="mapgallery" onload="load();">
     
<?php include('inc/static-menu.php'); ?>

    <div id="map" style="height: 100%; width: 100%; position: relative; background-color: rgb(229, 227, 223); overflow: hidden; cursor: default;"></div>

			<div id="footer">
			  <div id="footer_container">

					<div id="globalzoomout" class="zoomControl" title="Global View">
				    <img style="width:22px; height:22px; margin-top:3px;" src="<?php bloginfo('stylesheet_directory'); ?>/images/map-zoom.png">
					</div>

			    <div id="zoomOut" class="zoomControl" title="Zoom Out">
			    <img alt="-" src="<?php bloginfo('stylesheet_directory'); ?>/images/zoomout.gif">
			    </div>

			    <div id="zoomIn" class="zoomControl" title="Zoom In">
			    <img alt="+" src="<?php bloginfo('stylesheet_directory'); ?>/images/zoomin.gif">
			    </div>
			  
			    <div id="mapcats">
			      <div id="wedding" class="filterControl" title="Wedding">
			      	<span>Wedding</span>
			      </div> 
			    
			      <div id="documentary" class="filterControl" title="Documentary">
			      	<span>Documentary</span>
			      </div>
			      
			      <div id="explorations" class="filterControl" title="Explorations">
			      	<span>Explorations</span>
			      </div>
			    </div>
			  </div><!--#/footer-container-->
			</div><!--#/footer-->
    </div> 
    
    

<script type="text/javascript">
	$(document).ready(function() {
	
		$('div.filterControl').click(function() {
			$(this).toggleClass("off");
			return false;
	  });
	
	});	
</script>


    
    
        
</body>
</html>