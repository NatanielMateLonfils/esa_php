<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$group = $_POST['group'];
$task = $tasks[$group][$_POST['task_id']]['task'];
$completed = $tasks[$group][$_POST['task_id']]['completed'];
$property = $tasks[$group][$_POST['task_id']]['property'];
$date = $tasks[$group][$_POST['task_id']]['date'];

# Duplicate the selected task in the task database
$copied_task = [
    'task' => '(copy) '.$task,
    'completed' => $completed,
    'group' => $group,
    'property' => $property,
    'date' => $date
];
array_push($tasks[$group], $copied_task);

# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');