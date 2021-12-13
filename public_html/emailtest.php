<?php
    $receiver = "egwtoalani@gmail.com";
    $subject = "test";
    $body = "This is a test";
    $sender = "restaurant.kindofa.bot@gmail.com";

    $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    if(mail($receiver,"My subject",$msg)){
      echo "Email sent";
    }else{
        echo "elouses";
    }

    if(mail($sender,$subject,$body,$sender)){
        echo "Email sent";
    }else{
        echo "elouses";
    }
?>

<style>
    #map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}

</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hi threeas</h1>

     <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
</body>
</html>