<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$group = $_POST['group'];
$direction = $_POST['direction'];
$task_id = intval($_POST['task_id']);
$connected_user = $_POST['property'];

# Swing the the task according to the direction given
if ($direction == 'down'){
    $tasks = swingDown($tasks, $group, $task_id, $connected_user);
}
elseif ($direction == 'up'){
    $tasks = swingUp($tasks, $group, $task_id, $connected_user);
}

# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');