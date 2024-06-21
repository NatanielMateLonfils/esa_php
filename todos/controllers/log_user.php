<?php
session_start();
require '../system/functions.php';
$users_path = '../models/users.csv';
$users = getUsers($users_path);
$trial_username = $_POST['username'];
$trial_password = $_POST['password'];

foreach ($users as $user){
    $username = $user[0];
    $hashed_password = $user[1];

    # Check if both username and password are in the users database
    if (($trial_username == $username) && (password_verify($trial_password, $hashed_password))){
        $_SESSION['connected_user'] = $username;
        $_SESSION['log_user_error'] = false;

        # Jump back to the main page
        header('Location: ../index.php');
    }
}

$_SESSION['log_user_error'] = true;

# Jump back to the main page
header('Location: ../index.php');