<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$tasks = getTasks($tasks_path);

# Update the task database with the edited group
$tasks[$_POST['id']]['group'] = $_POST['selectedGroup'];
var_dump($tasks);
# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');