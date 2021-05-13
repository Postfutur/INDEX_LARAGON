<?php

if (file_exists($filename)) {

echo $foldernametodelete . "have been deleted from : laragon/www/";
    echo '<hr>';
} else {
    if (!file_exists($fullPath)) {
    mkdir($fullPath, 0777);
        echo '<div>The following directory <span class="Important">' . $filename . '</span> doesn\'t exist in laragon/www/ :</div>';
        echo '<div>Please choose another directory to delete in laragon/www/</div>';
        echo '<hr>';
}
    }
?>