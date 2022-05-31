function showHint(str) {
  fetch("search.php?s=" + str)
      .then(response => response.text())
      .then(data => {
          document.getElementById("txtHint").innerHTML = data;
      })
      .catch(error => console.error(error));
}