<?php
session_start();
require '../system/functions.php';
$bin_path = '../models/bin.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$deleted_tasks = getTasks($bin_path, $current_groups);
$group = $_POST['group'];
$task_id = $_POST['task_id'];

# Remove the selected task from the bin database
unset($deleted_tasks[$group][$task_id]);

# Update the bin database
saveTasks($bin_path, $deleted_tasks);

# Jump back to the main page
header('Location: ../index.php?page=view_bin');