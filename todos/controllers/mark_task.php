<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$group = $_POST['group'];
$task_id = $_POST['task_id'];

# Mark the task according to its current status
if ($tasks[$group][$task_id]['completed'] == 'completed'){
    $tasks[$group][$task_id]['completed'] = 'not_completed';
}
else{
    $tasks[$group][$task_id]['completed'] = 'completed';
    # Put the task to the end of the list
    $file = fopen($tasks_path, 'a');
    fputcsv($file, $tasks[$group][$task_id]);
    fclose($file);
    $tasks = getTasks($tasks_path, $current_groups);
    unset($tasks[$group][$task_id]);
}
# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');