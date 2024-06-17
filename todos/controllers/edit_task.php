<?php
session_start();
require '../system/functions.php';
$file_path = '../models/tasks.csv';
$tasks = getTasks($file_path);

# Edit the task
$tasks[$_POST['id']]['task'] = $_POST['task'];

# Update the task database
saveTasks($file_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');