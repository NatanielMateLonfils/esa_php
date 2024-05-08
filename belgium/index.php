<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>belgium.gov</title>
</head>
<body>
    <header>
        <a href="https://github.com/nml18"><img src="images/signature.png" alt="Nataniel's signature"></a>
        <p id="title">Belgian assignment</p>
        <div></div>
    </header>
    <form action="actions/byr.php" method="post">
        <label>Type at least 10 cool words here :</label>
        <input type="text" name="sentence">
        <input type="submit" name="send">
    </form>
    <?php
    if (isset($_GET['msg'])) {
        echo "<p id='warning'>" . $_GET['msg'] . "</p>";
        echo "<img src='images/smurfs.gif' alt='Unhappy smurf'>";
    }
    ?>
</body>
</html>