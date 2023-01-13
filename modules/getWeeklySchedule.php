<?php

    $jsonFormat = "";

    if(isset($_POST['weeklySchedule'])) {
        $data = $_POST['weeklySchedule'];
        $data_exploded = explode(",",$data);
    }

    $f = fopen("/opt/lampp/htdocs/auto-bell-scheduling/templates/weekly-schedule.json", "w");

    if(is_null($f)) {
        echo "Failed to open file";
    }

    else if(!is_null($f)){
        echo "File opened";
        foreach($data_exploded as $item) {
            $item = trim($item);
            list($day,$tasks) = explode(":",$item);
            $jsonFormat.= "{\"day\":\"$day\",";
            $tasks = explode("\n",$tasks);
            foreach($tasks as $task) {
                $task = trim($task);
                list($activity, $time) = explode("--",$task);
                $jsonFormat.="\"data\":[{\"activity\":\"$activity\",\"time\":\"$time\"},";
            }
            
        }

        fwrite($f,"{\"schedule\":[".$jsonFormat."]}");
        fclose($f);
    }
    
?>