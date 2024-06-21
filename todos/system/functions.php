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
                    'group' => $group,
                    'property' => $line[3]
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
                'group' => $line[0],
                'property' => $line[1]
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

function getUsers($file_path){
    $users = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        while ($line = fgetcsv($file)){
            array_push($users, $line);
        }
        fclose($file);
    }
    return $users;
}

function getCurrentUsers($file_path){
    $current_users = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        while ($line = fgetcsv($file)){
            array_push($current_users, $line[0]);
        }
        fclose($file);
    }
    return $current_users;
}

function countUserBin($deleted_tasks, $connected_user){
    $total = 0;
    foreach ($deleted_tasks as $group){
        foreach ($group as $task){
            if ($task['property'] == $connected_user){
                $total++;
            }
        }
    }
    return $total;
}

function swingUp($tasks, $group_name, $swap_id, $connected_user){
    $target_id = 0;
    foreach ($tasks[$group_name] as $task_id => $task){
        if (($task['property'] == $connected_user) && !($task_id == $swap_id)){
            $target_id = $task_id;
        }
        elseif (($task['property'] == $connected_user) && ($task_id == $swap_id)){
            [$tasks[$group_name][$swap_id], $tasks[$group_name][$target_id]] = [$tasks[$group_name][$target_id], $tasks[$group_name][$swap_id]];
        }
    }
    return $tasks;
}

function swingDown($tasks, $group_name, $swap_id, $connected_user){
    foreach ($tasks[$group_name] as $task_id => $task){
        if (($task['property'] == $connected_user) && ($task_id > $swap_id)){
            [$tasks[$group_name][$swap_id], $tasks[$group_name][$task_id]] = [$tasks[$group_name][$task_id], $tasks[$group_name][$swap_id]];
            return $tasks;
        }
    }
}

function isLowestTask($tasks, $group_name, $swap_id, $connected_user){
    $ids = [];
    foreach ($tasks[$group_name] as $task_id => $task){
        if ($task['property'] == $connected_user){
            array_push($ids, $task_id);
        }
    }
    if ($ids[0] == $swap_id){
        return true;
    }
    else{
        return false;
    }
}

function isHighestTask($tasks, $group_name, $swap_id, $connected_user){
    $ids = [];
    foreach ($tasks[$group_name] as $task_id => $task){
        if ($task['property'] == $connected_user){
            array_push($ids, $task_id);
        }
    }
    $ids = array_reverse($ids);
    if ($ids[0] == $swap_id){
        return true;
    }
    else{
        return false;
    }
}