<!DOCTYPE html>
<?php
  $api_endpoint = $_ENV["API_ENDPOINT"] ?: "http://localhost:5000/api/";
  $url = "";
  if(isset($_GET["url"]) && $_GET["url"] != "") {
    $url = $_GET["url"];
    $json = @file_get_contents($api_endpoint . $url);
    if($json == false) {
      $err = "Something is wrong with the URL: " . $url;
    } else {
      $links = json_decode($json, true);
      $domains = [];
      foreach($links as $link) {
        array_push($domains, parse_url($link["href"], PHP_URL_HOST));
      }
      $domainct = @array_count_values($domains);
      arsort($domainct);
    }
  }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DevOps Project</title>
  <link rel="stylesheet" href="util/bootstrap.min.css">
  <link rel="stylesheet" href="util/style.css">
  <link rel="stylesheet" href="util/fixed.css">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<!--- Start Home Section --->
<div id="home">

<!--- Navigation --->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"><img src="util/logo.png" width="200" height="60"></a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#home"><h4>DevOPs Project - Link Extractor</h4></a>
      </li>
    </ul>
  </div>
</nav>  
<!--- End Navigation --->

<!--- Start Landing Page Section --->
<div class="landing">
  <div class="home-wrap">
    <div class="home-inner">
    </div>
  </div>
</div>

<div class="caption text-center">
  <section>
      <form action="/">
        <input class="btn-lg" type="text" name="url" placeholder="place url">
        <input class="btn btn-outline-light btn-lg" type="submit" value="Extract Links">
    </section>
    
    <?php if(isset($err)): ?>
      <section>
        <h2>Error</h2>
        <p class="error"><?php echo $err; ?></p>
      </section>
    <?php endif; ?>

    <?php if($url != "" && !isset($err)): ?>
      <section>
        <h2>Summary</h2>
        <p>
          <strong>Page:</strong> <?php echo "<a href=\"" . $url . "\">" . $url . "</a>"; ?>
        </p>
        <table class="table">
          <thead class="thead-dark">
          <tr>
            <th>Domain</th>
            <th># Links</th>
          </tr>
        </thead>
          <?php
            foreach($domainct as $key => $value) {
              echo "<tr>";
              echo "<td>" . $key . "</td>";
              echo "<td>" . $value . "</td>";
              echo "</tr>";
            }
          ?>
          <tr>
            <td><strong>Total</strong></td>
            <td><strong><?php echo count($links); ?></strong></td>
          </tr>
        </table>
      </section>

      <section>
        <h2>Links</h2>
        <ul>
        <?php
          foreach($links as $link) {
            echo "<li><a href=\"" . $link["href"] . "\">" . $link["text"] . "</a></li>";
          }
        ?>
        </ul>
      </section>
    <?php endif; ?>
  

</div>
<!--- End Landing Page Section --->
</div>
<!--- End Home Section --->




<!--- End of Script Source Files -->

</body>

<!--- Start Contact Section --->
<div id="contact" class="offset">

<footer>
<div class="row justify-content-center">

  <div class="col-md-5 text-center">
    <img src="util/logo.png" width="120" height="50">
    <p>This website is the web interface for the Link Extractor project.</p>
  </div>

  <hr class="socket">
  &copy; Team ICCN2

</div>
</footer>

</div>
<!--- End Contact Section --->


</html>




