<script>
  let protocol = (new URL(document.location)).protocol;
  //"http:" or "https:"

  fetch(`${protocol}//ipv4.games/claim?name=holalluis`)
    .then(response=>response.text())
    .then(data=>console.log(data));
</script>
