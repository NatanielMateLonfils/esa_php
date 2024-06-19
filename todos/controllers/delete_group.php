<?php
session_start();
require '../system/functions.php';
$groups_path = '../models/groups.csv';
$tasks_path = '../models/tasks.csv';
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$groups = getGroups($groups_path);
$old_group = $groups[$_POST['group_id']]['group'];

# Set every task's group value related to the group to default value
foreach($tasks[$old_group] as $task_id => $task){
    $tasks[$old_group][$task_id]['group'] = 'Ungrouped';
}

# Remove the selected group from the group database
unset($groups[$_POST['group_id']]);

# Update both databases
saveTasks($tasks_path, $tasks);
saveGroups($groups_path, $groups);

# Jump back to the main page
header('Location: ../index.php');