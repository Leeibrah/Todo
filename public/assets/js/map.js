function initialize() {

    // var locations = [
    //     ['Hougang', 1.37265, 103.893658],
    //     ['Punggol', 1.400617, 103.907833],
    //     ['MacRitchie Reservoir', 1.346002, 103.825436],
    //     ['Bishan', 1.352051, 103.849125],
    //     ['Sentosa', 1.251226, 103.830757]
    //     ];

    $(function() {  
  $(".btn").click(function() {  
    // validate and process form here

    var demo_name = $("input#demo_name").val();  
    var demo_age = $("input#demo_age").val();  
    var demo_email = $("input#demo_email").val();  
    var demo_phone = $("input#demo_phone").val();  
    var demo_where = $("input#demo_where").val();  
    var demo_text = $("input#demo_text").val();  


    var dataString = 'demo_name='+ demo_name + '&demo_age=' + demo_age + '&demo_email=' + demo_email + '&demo_phone=' + demo_phone + '&demo_where=' + demo_where + '&demo_text=' + demo_text;  

    $.ajax({  
      type: "POST",  
      url: "../map",  
      data: dataString,  
      success: function() {

        $('#demo_form').html("<div id='message'></div>");  
        $('#message').html("<h2>Contact Form Submitted!</h2>")  
        .append("<p>We will be in touch soon.</p>")  

      }});  
          return false;   
      });  
    });

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(-1.274995,36.821945),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
                                                        
    // Check if user support geo-location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var geolocpoint = new google.maps.LatLng(latitude, longitude);

            var mapOptions = {
                zoom: 8,
                center: geolocpoint,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
            // Place a marker
            var geolocation = new google.maps.Marker({
                position: geolocpoint,
                map: map,
                // title: 'Your geolocation',
                icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png'
            });
        });
    }
}
google.maps.event.addDomListener(window, 'load', initialize);