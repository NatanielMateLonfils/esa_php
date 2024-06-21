<?php
session_start();
require '../system/functions.php';
$theme = $_POST['theme'];

if ($theme == 'dark'){
    $_SESSION['theme'] = 'light';
}
else{
    $_SESSION['theme'] = 'dark';
}

# Jump back to the main page
header('Location: ../index.php');