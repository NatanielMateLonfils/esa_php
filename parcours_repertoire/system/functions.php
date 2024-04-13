<?php
    function displayFiles () {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $pointer = opendir($path);
        
        // Display the current path
        echo "<h1>Listing content of " . $path . "</h1>";

        // Display all the files and directories found in the path
        while (($fileName = readdir($pointer)) !== false) {
            if ($fileName != '.' && $fileName != '..') {
                $filePath = $path . '/' . $fileName;
                if (filetype($filePath) == 'file') {
                    $src = 'images/file.png';
                }
                else {
                    $src = 'images/directory.png';
                }
                echo "<div class='fileContainer'><img src='" . $src . "'><span>" . $fileName . "</span>";
            }
            echo "</div>";
        }
        closedir($pointer);
    }
?>