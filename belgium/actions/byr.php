<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <title>belgium-strongbox.gov</title>
</head>
<body>
    <?php
    $sentence = $_POST['sentence'];
    $colors = ['black', 'yellow', 'red'];
    $words = explode(' ', $sentence);
    $wordsAmount = count($words);

    if ($wordsAmount < 10) {
        $msg = "$wordsAmount words isn't enough !";
        header('Location: ../index.php?msg=' . $msg);
    }
    else {
        $counter = 0;
        foreach ($words as $index => $word) {
            foreach (mb_str_split($word) as $char) {
                echo "<span id='" . $colors[$counter % 3] . "'>" . $char . "</span>";
                $counter++;
            }
            echo ' ';
        }
    }
    ?>
    <br>
    <hr>
    <img id="tintin" src="../images/tintin.gif" alt="Tintin's victory dance">
</body>
</html>