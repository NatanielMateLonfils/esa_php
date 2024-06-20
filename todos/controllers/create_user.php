<?php
session_start();
require '../system/functions.php';
$users_path = '../models/users.csv';
$username = $_POST['username'];
$password = $_POST['password'];
$hashed_password = md5($password);
$current_users = getCurrentUsers($users_path);

# Check if the username already exists or is empty
if (empty($username) || in_array($username, $current_users)){
    $_SESSION['create_user_error'] = true;

    # Jump back to the create user page
    header('Location: ../index.php?page=create_user');
}
else{
    $_SESSION['create_user_error'] = true;
    $_SESSION['connected_user'] = $username;

    # Create the new user
    $user = [
        $username,
        $hashed_password
    ];
    
    # Add the new user to the users database
    $file = fopen($users_path, 'a');
    fputcsv($file, $user);
    fclose($file);

    # Jump back to the main page
    header('Location: ../index.php');
}