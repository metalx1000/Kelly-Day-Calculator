<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kelly Day Calculator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="icons/manifest.json">
  <link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="icons/favicon.ico">
  <meta name="apple-mobile-web-app-title" content="Kelly Day Calculator">
  <meta name="application-name" content="Kelly Day Calculator">
  <meta name="msapplication-config" content="icons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!--end favicon-->
  <style>
    .well{
      margin: 5px;
      text-align: center;
      font: bold;
    }
  </style>

  <script>
    var kellyWeeks = 6;
    $(document).ready(function(){
      $("#note").html("Based on a " + kellyWeeks + " week Kelly Day");
      $("#date").on("change",function() {
        var dateText = $("#date").val();
        saveDate(dateText);
        getDates(dateText); 
      });  
      loadDate();
    });

    function getDates(day){
      $("#list").html("");
      $("#note").html("Based on a " + kellyWeeks + " week Kelly Day starting on " + day);
      var kellyDay = new Date(day);
      kellyDay.setDate(kellyDay.getDate() + 1);
      for(var i=1;i<11;i++){
        kellyDay.setDate(kellyDay.getDate() + 7 * kellyWeeks);
        //kellyDay = kellyDay.setHours(0,0,0,0);
        var k = kellyDay.toString().split(" ");
        var text = k[0]+" "+k[1]+" "+k[2]+" "+k[3];
        addItem(text,i);
        color();
      }

      //setTimeout(color,2000);
    }

    function addItem(text,d){
      //var id = Math.floor((Math.random() * 10000) + 1);
      var id = new Date(text).getTime();
      var i = '<div class="well well-sm items" id="'+id+'"style="display: none;"><h3>'+text+'</h3></div>';
      $("#list").append(i);
      setTimeout(function(){
        $("#"+id).show('slow');
      },200*d);
      
    }

    function saveDate(day){
      if(typeof(Storage) !== "undefined") {
        localStorage.kellyday = day;
      }
    }

    function loadDate(){
      if (localStorage.kellyday) {
        var startDay = localStorage.kellyday;
        getDates(startDay);
      }
    }

    function color(){
      var today = new Date().getTime();
      var color = "#0000a8";
      var next = 0;
      $(".items").each(function(i,d){
        var id = $(this).attr("id");
        if(id >= today){
          if(next == 0){
            next = 1;
            console.log(id);
            var nk = new Date(0); // The 0 there is the key, which sets the date to the epoch
            nk.setUTCSeconds(id);
            //console.log(nk);
            nk = nk.toString().split(" ");

            //$("#next").html("Next Kelly Day is <b>" + nk[0] + " " + nk[1] + " " + nk[2] + " " + nk[3] + "</b>");
          }
          $(this).css("background",color);
          $(this).css("color","white");
          color = "#0000f0";
        }
        
      });
    }
  </script>
</head>
<body>
  
<div class="container">
  <h1>Calculate Kelly Days</h1>
  <p id="note"></p>
  <p id="next"></p>
  <input type="date" id="date"></input><span> Please Select a Start Date</span>
  <div class="container" id="list">
  </div>
</div>

</body>
</html>


