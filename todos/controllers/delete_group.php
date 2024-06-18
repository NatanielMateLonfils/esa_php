<?php
session_start();
require '../system/functions.php';
$groups_path = '../models/groups.csv';
$tasks_path = '../models/tasks.csv';
$tasks = getTasks($tasks_path);
$groups = getGroups($groups_path);

# Set every task's group value related to the group to default value
foreach($tasks as $index => $task){
    $tasks[$index]['group'] = 'Ungrouped';
}

# Remove the selected group from the group database
unset($groups[$_POST['id']]);

# Update both databases
saveTasks($tasks_path, $tasks);
saveGroups($groups_path, $groups);

# Jump back to the main page
header('Location: ../index.php');