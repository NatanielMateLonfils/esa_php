<?php
require './models/secure.php';
require './views/layout/head.php';
require './system/functions.php';
$file_path = './models/tasks.csv';
$tasks = getTasks($file_path);

if ($_GET['page'] && in_array($_GET['page'], $pages)){
    require './views/'.$_GET['page'].'.php';
}
else{
    require './views/main.php';
}

require './views/layout/footer.php';