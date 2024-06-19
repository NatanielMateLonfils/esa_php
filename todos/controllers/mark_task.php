<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$group = $_POST['group'];

# Mark the task according to its current status
if ($tasks[$group][$_POST['task_id']]['completed'] == 'completed'){
    $tasks[$group][$_POST['task_id']]['completed'] = 'not_completed';
}
else{
    $tasks[$group][$_POST['task_id']]['completed'] = 'completed';
}
# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');