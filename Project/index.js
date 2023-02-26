window.onload = function () {
  const xhttp = new XMLHttpRequest();

  xhttp.onload = function () {
    document.getElementById("data").innerHTML = this.responseText;
  };

  const json = JSON.stringify({
    links: [
      "https://www.nytimes.com/svc/collections/v1/publish/https://www.nytimes.com/section/world/rss.xml",
      "http://rss.cnn.com/rss/edition_world.rss",
    ],
  });

  xhttp.open(
    "POST",
    "http://localhost/proyecto_optimizacion_web/Project/php/index.php",
    true
  );
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`links=${json}`);
};
