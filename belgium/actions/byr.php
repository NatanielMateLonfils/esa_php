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
    $wordsAmount = str_word_count($sentence);

    if ($wordsAmount < 10) {
        $msg = "$wordsAmount words isn't enough !";
        header('Location: ../index.php?msg=' . $msg);
    }
    else {
        $lst = explode(' ', $sentence);
        $counter = 0;
        foreach ($lst as $index => $word) {
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