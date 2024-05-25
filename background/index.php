<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Background modifier</title>
</head>
<?php
// Initialize color data
$colors = ['salmon' => 'Saumon', 'seagreen' => 'Vert mer', 'cyan' => 'Cyan', 'gray' => 'Gris', 'blue' => 'Bleu'];
// Determine the mode to apply to the background color
if (isset($_COOKIE['defaultColor'])) {
    if (isset($_POST['selectedColor'])) {
        $_COOKIE['defaultColor'] = $_POST['selectedColor'];
        if (isset($_POST['darkMode'])) {
            $backgroundColor = 'dark' . $_POST['selectedColor'];
        }
        else {
            $backgroundColor = 'light' . $_POST['selectedColor'];
        }
    }
}
else {
    setcookie('defaultColor', '...');
    $backgroundColor = 'white';
}
?>
<body style="background-color: <?php echo $backgroundColor?>;">

    <form action="index.php" method="post">
        <b>Sélectionnez une couleur :</b>
        <select name="selectedColor">
            <option value="<?php echo $_COOKIE['defaultColor']?>"><?php echo $colors[$_COOKIE['defaultColor']]?></option>
            <?php foreach ($colors as $englishColor => $frenchColor) {
                if ($_COOKIE['defaultColor'] != $englishColor) {
                    echo "<option value='" . $englishColor . "'>" . $frenchColor . "</option>";
                }
            }
            ?>
        </select>
        <b>Mode sombre :</b>
        <input type="checkbox" name="darkMode" value="Mode sombre">
        <input type="submit" value="Appliquer">
    </form>
    <div id="numberContainer">
    <b id="number"><?php echo rand(1, 999)?></b>
    </div>
</body>
</html>