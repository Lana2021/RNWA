function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","search.php?q="+str,true);
    xmlhttp.send();
  }
function showTable(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
          }
      }
      xmlhttp.open("GET", "search.php?q="+str, true);
      xmlhttp.send();
  }