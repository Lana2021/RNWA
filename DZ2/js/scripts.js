$(document).ready(function() {

  $.ajax({   
  type: "GET",
  url: "search.php",             
  dataType: "html", 
  data: { s: "" },
  success: function(response){                    
    $("#tableAll").html(response); 
    }
  });

$( "#target" ).keyup(function() {
$( "#tableAll" ).hide();
var str = $("#target").val();
 

$.ajax({   
  type: "GET",
  url: "search.php",             
  dataType: "html", 
  data: { s: str },
  success: function(response){                    
    $("#txtHint").html(response); 
    }

  });
  });
  });