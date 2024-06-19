<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$oldGroup = $_POST['group'];
$newGroup = $_POST['selectedGroup'];

# Update the task database with the edited group
$tasks[$oldGroup][$_POST['task_id']]['group'] = $newGroup;

# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');