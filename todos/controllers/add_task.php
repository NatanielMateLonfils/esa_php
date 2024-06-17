<?php
session_start();
require '../system/functions.php';
$file_path = '../models/tasks.csv';
$tasks = getTasks($file_path);

# Check if the task is empty or not
if(empty($_POST['task'])){
    $_SESSION['error'] = true;
}
else{
    $_SESSION['error'] = false;
    # Update the task database with the new task
    $tasks[] = [
        'task' => $_POST['task'],
        'completion' => 'not_completed'
    ];
    # Update the task database
    saveTasks($file_path, $tasks);
}

# Jump back to the main page
header('Location: ../index.php');