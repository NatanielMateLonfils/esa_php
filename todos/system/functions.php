<?php

function getTasks($file_path){
    $tasks = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        while ($line = fgetcsv($file)){
            $tasks[] = [
                'task' => $line[0],
                'completed' => $line[1],
                'group' => $line[2]
            ];
        }
        fclose($file);
    }
    return $tasks;
}

function saveTasks($file_path, $tasks){
    $file = fopen($file_path, 'w');

    foreach ($tasks as $task){
        fputcsv($file, $task);
    }

    fclose($file);
}

function getGroups($file_path){
    $groups = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        while ($line = fgetcsv($file)){
            $groups[] = [
                'group' => $line[0]
            ];
        }
        fclose($file);
    }
    return $groups;
}

function saveGroups($file_path, $groups){
    $file = fopen($file_path, 'w');

    foreach ($groups as $group){
        fputcsv($file, $group);
    }

    fclose($file);
}

function getCurrentGroups($file_path){
    $current_groups = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        while ($line = fgetcsv($file)){
            array_push($current_groups, $line[0]);
        }
        fclose($file);
    }
    return $current_groups;
}