<?php
session_start();
require '../system/functions.php';
$groups_path = '../models/groups.csv';
$groups = getGroups($groups_path);
$current_groups = getCurrentGroups($groups_path);

# Check if the group already exists or is empty
if(empty($_POST['group']) || in_array($_POST['group'], $current_groups)){
    $_SESSION['add_group_error'] = true;
}
else{
    $_SESSION['add_group_error'] = false;
    # Update the group database with the new group
    $groups[] = [
        'group' => $_POST['group']
    ];
    # Update the group database
    saveTasks($groups_path, $groups);
}

# Jump back to the main page
header('Location: ../index.php');