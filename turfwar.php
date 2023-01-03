<script>
  fetch('https://ipv4.games/user.html?name=holalluis')
    .then(response=>response.text())
    .then(data=>console.log(data));

  fetch('http://ipv4.games/user.html?name=holalluis')
    .then(response=>response.text())
    .then(data=>console.log(data));
</script>
