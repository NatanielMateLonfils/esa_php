<?php
session_start();
require '../system/functions.php';
$file_path = '../models/tasks.csv';
$tasks = getTasks($file_path);
$task = $tasks[$_POST['id']]['task'];
$completed = $tasks[$_POST['id']]['completed'];

# Duplicate the selected task in the task database
$tasks[] = [
    'task' => $task,
    'completed' => $completed
];

# Update the task database
saveTasks($file_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');