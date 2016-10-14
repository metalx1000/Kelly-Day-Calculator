<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kelly Day Calculator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .well{
      margin: 5px;
      text-shadow: 2px 2px #ffffff;
      text-align: center;
      font: bold;
    }
  </style>

  <script>
    var kellyWeeks = 6;
    $(document).ready(function(){
      $("#note").html("Based on a " + kellyWeeks + " week Kelly Day");
      getDates("10/12/16");   
    });

    function getDates(day){
      var kellyDay = new Date(day);
      for(var i=1;i<11;i++){
        kellyDay.setDate(kellyDay.getDate() + 7 * kellyWeeks);
        //kellyDay = kellyDay.setHours(0,0,0,0);
        var k = kellyDay.toString().split(" ");
        var text = k[0]+" "+k[1]+" "+k[2]+" "+k[3];
        addItem(text,i);
      }
    }

    function addItem(text,d){
      var id = Math.floor((Math.random() * 10000) + 1);
      var i = '<div class="well well-sm" id="'+id+'"style="display: none;"><h3>'+text+'</h3></div>';
      $("#list").append(i);
      setTimeout(function(){
        $("#"+id).show('slow');
      },200*d);
      
    }
  </script>
</head>
<body>
  
<div class="container">
  <h1>Calculate Kelly Days</h1>
  <p id="note"></p>

  <div class="container" id="list">
  </div>
</div>

</body>
</html>


