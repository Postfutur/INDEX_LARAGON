<?php
if (!empty($_GET['q'])) {
  switch ($_GET['q']) {
    case 'info':
      phpinfo();
      exit;
      break;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./INDEX_LARAGON/Assets/bootstrap/css/bootstrap.css?t=<?php echo time(); ?>">
    <link rel="stylesheet" href="./INDEX_LARAGON/Assets/css/Index.css">
    <title>Laragon</title>
  </head>
  <body>
    <div class="date_time">
      <?php echo 'We are the : ' . date(" D. d-F-Y H:i"); ?>
    </div>
    <div class="container">
      <div class="content">
        <div>
          <div class="Help">
            <section>
              <ul class="SubTitle">
                <li>
                  <a title="Getting Started" href="https://laragon.org/docs" target="blank">
                    - Getting Started with Laragon
                  </a>
                </li>
                <li>
                  <h1 class="title" title="Laragon">
                    Laragon
                  </h1>
                </li>
          <!--  <li>
                  <a tittle="Arts&Facts" href="https://artsetfacts.com/" target="blank">
                    - Index Laragon V3.0 by Arts&Facts.com
                  </a>
                </li> -->
              </ul>
            </section>
          </div>
        <hr>
        <div class="Info">
          <div>
            <section>
              <ul>
                <li>
                  <?php print($_SERVER['SERVER_SOFTWARE']); ?>
                </li>
                <li>
                  PHP version: <?php print phpversion(); ?><span><a title="phpinfo()" href="/?q=info" target="blanck"> Info serveur</a></span>
                </li>
                <li>
                  Document Root: <?php print($_SERVER['DOCUMENT_ROOT']); ?>
                </li>
              </ul>
            </section>
          </div>
          <hr>
          <div class="Liens">
            <section>
              <ul>
                <li><a title="Mozilla DOCS" href="https://developer.mozilla.org/fr/" target="blanck">Mozilla DOCS</a></li>
                <li><a title="SQL" href="https://sql.sh/" target="blanck">SQL</a></li>
                <li><a title="W3C" href="https://www.w3.org" target="blanck">W3C</a></li>
                <li><a title="W3school" href="https://www.w3schools.com" target="blanck">W3SCHOOLS</a></li>
                <li><a title="Bootstrap" href="https://getbootstrap.com" target="blank">Bootstrap</a></li>
                <li><a title="Jquery" href="https://jquery.com/" target="blank">JQuery</a></li>
                <li><a title="Alwaysdata" href="https://admin.alwaysdata.com" target="blank">Alwaysdata</a></li>
                <li><a title="Webflow" href="https://webflow.com" target="blank">Webflow</a></li>
                <li><a title="MyPeopleDoc" href="https://www.mypeopledoc.com" target="blank">MyPeopleDoc</a></li>
                <li><a title="Favicon Generator" href="https://favicon.io/" target="blank">Favicon Generator</a></li>
                <li><a title="Favicon Drawer" href="https://www.favicon.cc/" target="blank">Favicon Drawer</a></li>
                <li><a title="Trello" href="https://trello.com/" target="blank">Trello</a></li>
                <li><a title="Open Class Room" href="https://openclassrooms.com/" target="blank">Open Class Room</a></li>
                <li><a title="Code Pen" href="https://codepen.io/" target="blank">Code Pen</a></li>
                <li><a title="Electron" href="https://www.electronjs.org/" target="blank">Electron</a></li>
                <li><a title="Progresive Web App" href="https://progressive-web-apps.fr/definition-progressive-web-apps-pwa/" target="blank">Electron</a></li>
                <li><a title="JS Bin" href="https://jsbin.com/" target="blank">JS Bin</a></li>
                <li><a title="La Cascade" href="https://la-cascade.io/" target="blank">La Cascade</a></li>
                <li><a title="SecNumAcadémie" href="https://secnumacademie.gouv.fr" target="blank">SecNumAcadémie</a></li>
              </ul>
            </section>
          </div>
        </div>
        <hr>

<!-- BEGIN Form to create site structure -->
        <div class="Border_Box">
          <?php
            
            $foldername = !empty($_POST['foldername']) ? $_POST['foldername'] : NULL;
            $filename   = $foldername;
            $path       = __DIR__ . "/..";
            $fullPath   = $path . "/" . $filename;
                echo "
                Enter name in the field to create directory in : laragon/www/
                ";
          ?>
          <form action="index.php" method="post">
            <input type="text" name="foldername" id="foldername" value="" required="" placeholder="Entrer un nom de projet" >&nbsp;
            <input class="btn btn-success" type="submit" value="submit">&nbsp;
            <input class="btn btn-danger" type="reset" value="Reset">
          </form>
        </div>
        <?php
          include './INDEX_LARAGON/Assets/To_Create_Or_Delete/Directory_Structure.php';
        ?>

<!-- END Form to create site structure -->

<!-- BEGIN list files -->
        <div class="Info">
            <h2 class="Title_List">Files and directories accessible in localhost by Laragon</h2>
          <section class="Border_Box_Simple">
              <?php              
                $dir_nom = '.'; // choose for list, current directory
                $dir = opendir($dir_nom) or die('error : Directory doesn\'t exist'); // OPEN CURRENT DIRECTORY
                $fichier = array(); // DECLARE ARRAY FILES
                $dossier = array(); // DECLARE ARRAY DIRECTORIES
                $flag = ''; // DECLARE EMPTY

                while($element = readdir($dir)) {
                  if($element != '.' && $element != '..' && $element != 'index.php' && $element != 'Assets' && $element != ' .*') { // Hide unwanted elements
                    if (!is_dir($dir_nom . '/' . $element)) {
                      $fichier[] = $element;
                    }
                    else {
                      $dossier[] = mb_strtolower($element);
                    }
                  }
                }
                closedir($dir);

                if(!empty($fichier)){
                  sort($fichier);// for ascendant, rsort() for descendant
                    echo "
                        <div class='Border_Box' style=\"clear:both; text-align:center; font-weight:bold; color:green;border:1px solid green; \">
                        ".count($fichier)." Accessible files form local server Laragon :
                        </div>
                      <ul id='Color_Link'>";
                      foreach($fichier as $lien) {
                        echo "
                          <li class='File_Link'>
                            <a href=\"$dir_nom/$lien \">
                              $lien
                            </a>
                          </li>";
                      }
                    echo "</ul>";
                }
// <!-- END list files -->

// <!-- BEGIN list directories -->
                if(!empty($dossier)) {
                  sort($dossier, SORT_STRING | SORT_FLAG_CASE ); // for ascendant, rsort() for descendant
                    echo "<div style=\"clear:both; text-align:center; font-weight:bold; color:blue; border:1px solid green; \">".count($dossier)." sites web accessibles form local server Laragon :</div>";
                    echo "<ul>";
                      foreach($dossier as $lien){
                        // test for changing first letter
                        if( $lien[0] != $flag ){
                          // update flag
                          $flag = $lien[0];
                          // print letter
                          echo '
                            <div class="Flag">
                              ' . strtoupper($flag) . '
                            </div>';
                        }
                        echo "
                          <li>
                            <a href=\"$dir_nom/$lien \">
                              $lien
                            </a>
                          </li>";
                      }
                    echo "</ul>";
                  }
                ?>
            </ul>
          </section>
<!-- END list directories -->
        </div>
      </div>
    </div>
    <hr>
    <!-- BEGIN Form to DELETE site structure -->
          <div class="Border_Box_Danger_Zone">
            <h3 class="Danger_Zone">DANGER ZONE !</h3>
              <div class='Danger_Zone'>
                <p class='Danger_Zone'>
                  Enter name in the field to DELETE directory in: laragon/www/
                </p>
                <p class='Danger_Zone'>
                  WARNING : Delete this directory and his content is with no return !
                </p>
                <?php
            $foldernametodelete = !empty($_POST['foldernametodelete']) ? $_POST['foldernametodelete'] : NULL;
            $filenametodelete   = $foldernametodelete;
            $path       = __DIR__;
            $fullPath   = $path . "/" . $filenametodelete;
          ?>
                        <!-- <form action="index.php" method="post"> -->
                <form onsubmit="return confirm('Etes-vous sur de votre choix ? Supprimer ce dossier est irréversible ! Vous perdrez définitivement tous son contenu !');" action="index.php" method="post">
                  <input type="text" name="foldernametodelete" id="foldernametodelete" value="" required="" placeholder="Nom du projet à supprimer">&nbsp;
                  <input class="btn btn-success" type="submit" value="submit">&nbsp;
                  <input class="btn btn-danger" type="reset" value="Reset">
                </form>
              </div>
              <?php
                include './INDEX_LARAGON/Assets/To_Create_Or_Delete/Delete_Directory_Structure.php';
              ?>

            </div>
            <hr>
            <div class="Liens">
              <section>
                <ul>
                  <li><a title="REAC DWWM" href="https//www.banque.di.afpa.fr%2Fespaceemployeurscandidatsacteurs%2FDownload.aspx%3Fi%3D48e5e746-396c-42ef-bf6d-19c97c374960%26d%3D1&usg=AOvVaw150PGOBrK6gfMrCmK2T6RQ" target="blanck">REAC DWWM</a></li>
                  <li><a title="RC DWWM" href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjdtNHC5aPuAhXFzIUKHTu1Az8QFjAAegQIARAC&url=https%3A%2F%2Fwww.banque.di.afpa.fr%2Fespaceemployeurscandidatsacteurs%2FDownload.aspx%3Fi%3Da636e6a8-8a35-4879-879e-81c75837da95%26d%3D1&usg=AOvVaw1a1tNEb2vtK7wuBxYjLK1g" target="blanck">RC DWWM</a></li>
                </ul>
              </section>
            </div>
          <div>
        </div>
      </body>
    </html>