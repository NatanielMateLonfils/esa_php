<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$groups_path = '../models/groups.csv';
$bin_path = '../models/bin.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$group = $_POST['group'];

# Change task's group to default value
$tasks[$group][$_POST['task_id']]['group'] = 'Ungrouped';

# Add the task to the bin database
$bin_file = fopen($bin_path, 'a');
fputcsv($bin_file, $tasks[$group][$_POST['task_id']]);
fclose($bin_file);

# Remove the selected task from the task database
unset($tasks[$group][$_POST['task_id']]);

# Update the task database
saveTasks($tasks_path, $tasks);

# Jump back to the main page
header('Location: ../index.php');