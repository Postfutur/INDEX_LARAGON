<?php

if (file_exists($filename)) {
    echo "<p class='Danger_Zone'>Le dossier existe dèjà, merci de choisir un autre nom de projet ou de cliquer sur ce lien pour y accéder : <span class='Important'><a href=" . $filename . '/index.php">' .  $filename . "</a></span> .</p>";
    echo '<hr>';
} else {
    if (!file_exists($fullPath)) {
    mkdir($fullPath, 0777);
        echo '<div>The following directory <span class="Important">' . $filename . '</span> was successfully created in www/ :</div>';
        echo '<div>Follow this link <span class="Important"><a href="' . $filename . '/index.php">' . $filename . '</a></span> to access to the index in www/ : ' . $filename . '</div>';
        echo '<hr>';
        $fichier = fopen($fullPath . '/' . 'index.php', 'c+b');
    fwrite($fichier, '<!DOCTYPE html>
    <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="./Assets/Css/bootstrap.css">
      <link href="./Assets/Css/Index.css" rel="stylesheet">
      <link rel="icon" href="./Assets/Pictures/favicon.ico" />
      <title>15151515</title>
  </head>
  <body>
    <h1>A structure with directory "Assets" have been created</h1>
    <h2>And this basic "Index.php"</h2>
    <h3> This three links is to download the last version or the one you want and must be installed in there respective directory nested in "Assets" in this project</h3> 
    <h4><a title="Jquery" href="https://jquery.com/download/" target="blanck">Link to jquery</a></h4>
    <h4><a title="BootStrap" href="https://getbootstrap.com/docs/versions/" target="blanck">Link to BootStrap</a></h4>
    <h4><a title="Popper" href="https://github.com/popperjs/popper-core" target="blanck">Link to popper</a></h4>
    <h5> if you don\'t need one or all, you need to comment or delete the lines in the code of this page with your favorite editor</h5>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>
    
    ');
    mkdir($filename . "/Assets", 0777);
        /* opendir($filename . "Assets"); */
    mkdir($filename . "/Assets/Bootstrap", 0777);
    mkdir($filename . "/Assets/Css", 0777);
        fopen($filename . "/Assets/Css/Index.css", 'c+b');
    mkdir($filename . "/Assets/Jquery", 0777);
    mkdir($filename . "/Assets/Js", 0777);
    mkdir($filename . "/Assets/Pictures", 0777);
        fopen($filename . "/Assets/Pictures/favicon.ico", 'c+b');
    mkdir($filename . "/Assets/Popper", 0777);
    mkdir($filename . "/Assets/Pictures/Svg", 0777);
    mkdir($filename . "/Assets/Sources", 0777);
    mkdir($filename . "/Assets/Upload", 0777);
}
    }
?>