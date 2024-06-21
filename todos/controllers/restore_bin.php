<?php
session_start();
require '../system/functions.php';
$tasks_path = '../models/tasks.csv';
$bin_path = '../models/bin.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$deleted_tasks = getTasks($bin_path, $current_groups);
$group = $_POST['group'];
$task_id = $_POST['task_id'];
$connected_user = $_POST['connected_user'];

# Open the tasks csv file
$file = fopen($tasks_path, 'a');

# Restore the user's bin
foreach ($deleted_tasks as $group_name => $group){
    foreach ($group as $deleted_task_id => $deleted_task){
        if ($deleted_task['property'] == $connected_user){
            fputcsv($file, $deleted_tasks[$group_name][$deleted_task_id]);
            unset($deleted_tasks[$group_name][$deleted_task_id]);
        }
    }
}

# Close the tasks csv file
fclose($file);

# Update the bin database
saveTasks($bin_path, $deleted_tasks);

# Jump back to the main page
header('Location: ../index.php');