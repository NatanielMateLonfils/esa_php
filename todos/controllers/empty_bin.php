<?php
session_start();
require '../system/functions.php';
$bin_path = '../models/bin.csv';
$groups_path = '../models/groups.csv';
$current_groups = getCurrentGroups($groups_path);
$deleted_tasks = getTasks($bin_path, $current_groups);
$connected_user = $_POST['connected_user'];

# Empty the user's bin
foreach ($deleted_tasks as $group_name => $group){
    foreach ($group as $deleted_task_id => $deleted_task){
        if ($deleted_task['property'] == $connected_user){
            unset($deleted_tasks[$group_name][$deleted_task_id]);
        }
    }
}

# Update the bin database
saveTasks($bin_path, $deleted_tasks);

# Jump back to the main page
header('Location: ../index.php');