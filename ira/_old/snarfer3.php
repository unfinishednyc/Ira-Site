<head>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>map test</title>

          <link type="text/css" rel="stylesheet" href="http://216.70.89.244/wp-content/themes/ira/colors/prettyPhoto.css" media="screen"  />
          
          <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
          <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/jquery-1.6.2.min.js"></script> 
          <script type="text/javascript"  src="http://216.70.89.244/wp-content/themes/ira/js/jquery.prettyPhoto.js" ></script>
          <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/infobox.js"></script>
          <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/markerclusterer_compiled.js"></script>
          
<!--            <link type="text/css" rel="stylesheet" href="http://216.70.89.244/wp-content/themes/ira/js/pp/css/prettyPhoto.css" media="screen"  />
          
          <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
          <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/pp/js/jquery-1.6.2.min.js"></script> 
          <script type="text/javascript"  src="http://216.70.89.244/wp-content/themes/ira/js/pp/js/jquery.prettyPhoto.js" ></script>
          <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/pp/js/infobox.js"></script>
          <script type="text/javascript" src="http://216.70.89.244/wp-content/themes/ira/js/pp/js/markerclusterer_compiled.js"></script>
-->            <script type="text/javascript">
              
  //<![CDATA[
  var markers = [];
  weddingToggle = "on";
  documentaryToggle = "on";
  explorationsToggle = "on";
  
  var customIcons = {
    Documentary: {
      icon: 'http://216.70.89.244/wp-content/themes/ira/images/documentarysmall.png'//,
      //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    },
    Wedding: {
      icon: 'http://216.70.89.244/wp-content/themes/ira/images/weddingsmall.png'//,
      //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    },
    Explorations: {
      icon: 'http://216.70.89.244/wp-content/themes/ira/images/explorationssmall.png'//,
      //shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    },
    ShowAll: {
      icon: 'http://216.70.89.244/wp-content/themes/ira/images/explorationssmall.png'//,
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
      { visibility: "off" }//,
      //{ hue: "#000000"}
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
      { visibility: "on" 
  },
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
  }//,
      //{ hue: "#000000"}
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
      
      
      
     
    // XML
    downloadUrl("http://216.70.89.244/wp-content/themes/ira/phpsqlajax_genxml2.php", function(data) {
      var xml = data.responseXML;
      var imarkers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < imarkers.length; i++) {
        var photographer = "Joe Smith"; //imarkers[i].getAttribute("photographerid");
        var name = imarkers[i].getAttribute("name");
        var address = imarkers[i].getAttribute("address");
        var type = imarkers[i].getAttribute("type");
        var picpath = imarkers[i].getAttribute("filepath");
        var point = new google.maps.LatLng(
            parseFloat(imarkers[i].getAttribute("lat")),
            parseFloat(imarkers[i].getAttribute("lng")));
            
           alert(point);
          var pic1 = "/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke008.jpg"
          var pic2 = "/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke015.jpg"
          var pic3 = "/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke021.jpg"
          var pic4 = "/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke023.jpg"
          var pic5 = "/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke026.jpg"   

          var api_images = ['/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke008.jpg'
              ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke015.jpg'
              ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke021.jpg'
              ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke023.jpg'
              ,'/maptest/wp-content/themes/twentyeleven/colorboxpics/weddingDC/Lippke026.jpg'
              ,'<iframe src="http://player.vimeo.com/video/29774730?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><p><a href="http://vimeo.com/29774730">Uitgeleefd (Leave on a High)</a> from <a href="http://vimeo.com/louterfilm">Louter Film</a> on <a href="http://vimeo.com">Vimeo</a>.</p>'] 

         var photographerName = ['Satya and Jeff, Location </br> John Smith','Satya and Jeff, Location </br> Joe David', 'Satya and Jeff, Location </br> Earnst Wolschlagel', 'Satya and Jeff, Location </br> Anne Simpson', 'Satya and Jeff, Location </br> Chris Schmidt', 'Satya and Jeff, Location </br> Dries Meinema']
         
         var picInfo = ['Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','This','is','the','next','Picture.']
         var rolloverInfo = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
         
        
        var html = "<div class=\"infopic\"><a href=\"" + picpath + "\"><image src=" + picpath + " width=\"200\" height=\"200\"/></a></div><div class=\"infoboxtext\"><tr><td><p1>" + name + "</p1></td></tr></br></br><tr><td><p2>"+ rolloverInfo +"</p2></td></tr><br /><br /><tr><td><p3>" + type + "</p3></td></tr></div>";
        var icon = customIcons[type] || {};
        var marker = new google.maps.Marker({
        map: map,
        position: point,
        icon: icon.icon,
        shadow: icon.shadow
    });
         
        marker.mytype = type;
        marker.photographerName = name;
        markers.push(marker);
        
        marker.setValues({type: "point", id: 1});

        
        bindInfoWindow(marker, map, ib, html, api_images, name, type, photographerName, picInfo);
        
        
      }
      
      //var markerCluster = new MarkerClusterer(map, markers);
    });
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
  //-------------------End Initialize----------------------//
  }
  
  
  

   function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };
    
    request.open('GET', url, true);
    request.send(null);
    
  }
  
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
     function bindInfoWindow(marker, map, ib, html, api_images, albumName, type,picInfo, photgrapherName) {
      google.maps.event.addListener(marker, 'click', function() {
      ib.setContent(html);
      //ib.open(map, marker);
      ib.close(map,marker);
      var positionMarker = ib.getPosition();
      map.setZoom(13);
      map.panTo(positionMarker);
     
      jQuery.prettyPhoto.open(api_images ,photgrapherName,picInfo);
      });
      ;
      
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
<style>
      #menu
      {
          position: absolute;
          bottom:10px;
      }
      .dropsheet
      {
          background-color/**/: #FFFFFF;     
          background-image/**/: none;     
          opacity: 0.5;     
          filter: alpha(opacity=75);
      }
      p1
      {
          color: #FFFFFF;
          font-family: "Helvetica", sans-serif;
          font-size: small;
      }
      p2
      {
          color: #D4D0C8;
          font-family: "Helvetica", sans-serif;
          font-size: small;
          font-style: italic;
      }
      p3
      {
          color: #D4D0C8;
          font-family: "Helvetica", sans-serif;
          font-size: small;
      }
      .infoboxtext
      {
          padding: 10px;
      }
      .infopic
      {
          padding: 10px;
      }
      .zoomControl {
          margin-right: -1px;
          line-height: 40px;
          height: 40px;
          width:35px;
          cursor: pointer;
          position: relative;
          text-align: center;
          float: left;
      }
      .zoomControl:hover {
          background: #333;
          background: -webkit-gradient(linear, left top, left bottom, from(#444444), to(#222222));
          background: -moz-linear-gradient(top, #444444, #222222);
      }
      .zoomControl img {
          vertical-align: middle; padding: 12px 0
      }
      #zoomOut img{
          padding-top: 17px
      }
      .filterControl {
          margin-right: -1px;
          line-height: 40px;
          height: 40px;
          width:35px;
          cursor: pointer;
          position: relative;
          text-align: center;
          float: left;
      
      }
      
      .filterControl:hover {
           background: #333;
          background: -webkit-gradient(linear, left top, left bottom, from(#444444), to(#222222));
          background: -moz-linear-gradient(top, #444444, #222222);
      }
      
      .filterControl img {
          vertical-align: middle; padding: 13px 0
      }
      .filterControl p {
          color: #FFFFFF;
          font-family: "Helvetica", sans-serif;
          font-size: small;
          vertical-align: middle;
      }
      #footer {
          width:100%;
          height: 40px;
          border-top: 1px solid #000;
          position: fixed;
          bottom: 0;
          left: 0;
          z-index: 1000;
          line-height: 40px;
          font-size: 11px;
          background: #171717;
          background: -webkit-gradient(linear, left top, left bottom, from(#282828), to(#171717));
          background: -moz-linear-gradient(top, #282828, #171717);
      }
      #footer:before {
          border-top: 1px solid #2c2c2c;
          border-top: 1px solid rgba(255,255,255,.05); 
          content:""; 
          position: absolute; 
          top: 0; 
          left: 0; 
          right:0; 
          bottom:0; 
          z-index: 0;
      }
      #message { 
          position:absolute; 
          padding:10px; 
          background:#555; 
          color:#fff; 
          width:75px; 
      }
      
      
     
  </style>

</head>

<body onload="load()">
   

  
           

  <div id="map" style="height: 100%; width: 100%; position: relative; background-color: rgb(229, 227, 223); overflow: hidden; cursor: default;"></div>
  <div id="message"style="display:none;">Test text.</div>

  <div id="footer">
      
      <div id="zoomOut" class="zoomControl" title="Zoom Out">
      <img alt="-" src="http://216.70.89.244/wp-content/themes/ira/images/zoomout.png">
      </div>
      <div id="zoomIn" class="zoomControl" title="Zoom In">
      <img alt="+" src="http://216.70.89.244/wp-content/themes/ira/images/zoomin.png">
      </div>
      <div id="wedding" class="filterControl" title="Wedding">
          <img src="http://216.70.89.244/wp-content/themes/ira/images/weddingsmall.png"><p>Wedding</p>
      </div> 
    
      <div id="documentary" class="filterControl" title="Documentary">
          <img src="http://216.70.89.244/wp-content/themes/ira/images/documentarysmall.png"><p>Documentary</p>
      </div>
      <div id="explorations" class="filterControl" title="Explorations">
          <img src="http://216.70.89.244/wp-content/themes/ira/images/explorationssmall.png"><p>Explorations</p>
      </div>
      <div id="showall" class="filterControl" title="Show All">
          <img src="http://216.70.89.244/wp-content/themes/ira/images/showallsmall.png"><p>Show All</p>
      </div>
     <div id="globalzoomout" class="zoomControl" title="Global View">
          <img src="http://216.70.89.244/wp-content/themes/ira/images/globalzoomout.png">
      </div>
      </div>
      
  </div> 
  
  
  
  
      
</body>
  

</html>