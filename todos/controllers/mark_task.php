<?php
session_start();
require '../system/functions.php';
$file_path = '../models/tasks.csv';
$tasks = getTasks($file_path);

# Mark the task according to its current status
if ($tasks[$_POST['id']]['completed'] == 'completed'){
    $tasks[$_POST['id']]['completed'] = 'not_completed';
}
else{
    $tasks[$_POST['id']]['completed'] = 'completed';
}

# Update the task database
saveTasks($file_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');