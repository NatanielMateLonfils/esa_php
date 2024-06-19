<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);

# Check if the task is empty or not
if(empty($_POST['task'])){
    $_SESSION['add_task_error'] = true;
}
else{
    $_SESSION['add_task_error'] = false;
    # Update the task database with the new task
    $group = $_POST['selectedGroup'];
    $task = [
        'task' => $_POST['task'],
        'completion' => 'not_completed',
        'group' => $_POST['selectedGroup']
    ];
    array_push($tasks[$group], $task);
    # Update the task database
    saveTasks($tasks_path, $tasks);
}

# Jump back to the main page
header('Location: ../index.php');