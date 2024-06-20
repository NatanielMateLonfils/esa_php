<?php
session_start();
$connected_user = $_POST['connected_user'];

# Disconnect the connected user
unset($_SESSION['connected_user']);

# Jump back to the main page
header('Location: ../index.php');