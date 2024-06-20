<?php
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

if ($_GET['page'] && in_array($_GET['page'], $pages)){
    require './views/'.$_GET['page'].'.php';
}
else{
    require './views/main.php';
}

require './views/layout/footer.php';