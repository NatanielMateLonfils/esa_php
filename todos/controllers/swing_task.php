<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$group = $_POST['group'];
$direction = $_POST['direction'];
$task_id = $_POST['task_id'];

# Swing the the task according to the direction given
if ($direction == 'down'){
    [$tasks[$group][$task_id], $tasks[$group][$task_id+1]] = [$tasks[$group][$task_id+1], $tasks[$group][$task_id]];
}
elseif ($direction == 'up'){
    [$tasks[$group][$task_id], $tasks[$group][$task_id-1]] = [$tasks[$group][$task_id-1], $tasks[$group][$task_id]];
}

# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');