<?php
session_start();
if (isset($_SESSION['connected_user'])){
    $connected_user = $_SESSION['connected_user'];
}
else{
    $connected_user = 'Anonymous';
}

if (isset($_SESSION['theme'])){
    if ($_SESSION['theme'] == 'dark'){
        $theme = 'dark';
        $theme_message = 'Light mode';
        $button_theme = 'buttonlight';
    }
    else{
        $theme = 'light';
        $theme_message = 'Dark mode';
        $button_theme = 'buttondark';
    }
}
else{
    $theme = 'light';
    $theme_message = 'Dark mode';
}

require './models/secure.php';
require './views/layout/head.php';
require './system/functions.php';
$tasks_path = './models/tasks.csv';
$groups_path = './models/groups.csv';
$bin_path = './models/bin.csv';
$groups = getGroups($groups_path);
$current_groups = getCurrentGroups($groups_path);
$tasks = getTasks($tasks_path, $current_groups);
$deleted_tasks = getTasks($bin_path, $current_groups);
$users_groups = getUsersGroups($groups_path);

if ($_GET['page'] && in_array($_GET['page'], $pages)){
    require './views/'.$_GET['page'].'.php';
}
else{
    require './views/main.php';
}

require './views/layout/footer.php';