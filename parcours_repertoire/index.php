<?php
    include "system/functions.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCUMENT_ROOT content</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <header>
        <a href="https://github.com/nml18"><img src="images/signature.png" alt="Nataniel's signature"></a>
        <h1>Parcours répertoire</h1>
        <div></div>
    </header>
    <section id="filesArea">
        <?php
            displayFiles();
        ?> 
    </section>
</body>
</html>