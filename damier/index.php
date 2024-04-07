<?php
    include "system/functions.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessboard</title>
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <header>
        <a href="https://github.com/nml18"><img src="images/signature.png" alt="Nataniel's signature"></a>
    </header>
    <section id="gameArea">
        <section class="playerArea">
            <img src="images/maitrepylos.png" alt="Gérard le plus beau">
            <p>G² le plus beau &#x1F451;<br>(3264)</p>
        </section>
        <section id="boardArea">
            <div id="chessBoard">
                <?php
                    displayChessboard();
                ?>
            </div>
        </section>
        <section class="playerArea">
            <img src="images/razor.png" alt="Jolie rasoir">
            <p>Élève de Maitrepylos &#8205;<br>(1000)</p>
        </section>
    </section>
</body>
</html>