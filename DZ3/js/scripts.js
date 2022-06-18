function showHint(str) {
  axios.get("search.php?s=" + str)
      .then(response => {
          document.getElementById("txtHint").innerHTML = response.data;
      })
      .catch(error => console.error(error));
}