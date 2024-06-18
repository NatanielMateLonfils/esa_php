<?php
require './models/secure.php';
require './views/layout/head.php';
require './system/functions.php';
$tasks_path = './models/tasks.csv';
$groups_path = './models/groups.csv';
$tasks = getTasks($tasks_path);
$groups = getGroups($groups_path);
$current_groups = getCurrentGroups($groups_path);

if ($_GET['page'] && in_array($_GET['page'], $pages)){
    require './views/'.$_GET['page'].'.php';
}
else{
    require './views/main.php';
}

require './views/layout/footer.php';