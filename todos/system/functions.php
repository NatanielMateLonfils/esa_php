<?php

function getTasks($file_path){
    $tasks = [];

    if (file_exists($file_path)){
        $file = fopen($file_path, 'r');

        while ($line = fgetcsv($file)){
            $tasks[] = [
                'task' => $line[0],
                'completed' => $line[1]
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