<?php

    $jsonFormat = "";
    $counter = 0;

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
            $counter = $counter + 1;
            $counter_tasks =  0;

            $item = trim($item);
            list($day,$tasks) = explode(":",$item);

            $day = str_replace("<ol>","",$day);
            $day = str_replace("<li>","",$day);
            $day = str_replace("</ol>","",$day);
            $day = str_replace("</li>","",$day);
            $day = str_replace("</ul>","",$day);
            $day = str_replace("<ul>","",$day);
            $day_replaced = trim($day);

            $jsonFormat.= "\r\t\t{\r\t\t\t\"day\":\"$day_replaced\",\r";
            $tasks = explode("\n",$tasks);
            $jsonFormat.="\t\t\t\"data\":[\r";
            // echo "\nThe size is".sizeof($tasks). "<br><br>";
            foreach($tasks as $task) {
                // print_r($tasks);
                $counter_tasks = $counter_tasks + 1;
                $task = trim($task);
                list($activity, $time) = explode("--",$task);
                $activity = str_replace("<li>", "", $activity);
                $time = str_replace("</li>","",$time);
                if(empty($task)) {
                    unset($task);
                }
                if($activity == '' && $time == '') {
                    unset($activity);
                    unset($time);
                }
                else if($activity == "<ul>" || $activity == "<li>" || $activity == "<ol>"
                || $activity == "</ul>" || $activity == "</li>" || $activity == "</ol>") {
                    unset($activity);
                    unset($time);
                }

                $activity_replaced = trim($activity);
                $time_replaced = trim($time);
                if($counter_tasks == sizeof($tasks)) {
                    $jsonFormat.="\t\t\t\t{\"activity\":\"$activity_replaced\",\"time\":\"$time_replaced\"}\r";
                }
                
                else {
                    $jsonFormat.="\t\t\t\t{\"activity\":\"$activity_replaced\",\"time\":\"$time_replaced\"},\r";
                }
            }

            if($counter == sizeof($data_exploded)) {
                $jsonFormat.="\t\t\t]\r\t\t}";
            }
            else {
                $jsonFormat.="\t\t\t]\r\t\t},";
            }
        }

        $jsonStringFormat = json_encode($jsonFormat, JSON_PRETTY_PRINT);

        fwrite($f,"{\r\t\"schedule\":[".$jsonFormat."\r\t]\r}");
        echo "<br><br>Successfully written in file";
        fclose($f);
    }
    
?>