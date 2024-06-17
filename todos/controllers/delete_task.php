<?php
session_start();
require '../system/functions.php';

# Remove the selected task from the database
$file_path = '../models/tasks.csv';
$tasks = getTasks($file_path);
unset($tasks[$_POST['id']]);

# Update the task database
saveTasks($file_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');