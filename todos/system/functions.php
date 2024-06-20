<?php

function getTasks($file_path, $current_groups){
    $tasks = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        $tasks['Ungrouped'] = [];
        foreach($current_groups as $group){
            $tasks[$group] = [];
        }

        if (!(filesize($file_path) == 0)){
            while ($line = fgetcsv($file)){
                $group = $line[2];
                if (!(in_array($group, array_keys($tasks)))){
                    $tasks[$group] = [];
                }
                $task = [
                    'task' => $line[0],
                    'completed' => $line[1],
                    'group' => $group
                ];
                array_push($tasks[$group], $task);
            }   
        }
        fclose($file);
    }
    return $tasks;
}

function saveTasks($file_path, $tasks){
    $file = fopen($file_path, 'w');
    var_dump($tasks);
    foreach($tasks as $group){
        foreach ($group as $task){
            fputcsv($file, $task);
        }
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