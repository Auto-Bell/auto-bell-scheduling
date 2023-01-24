<?php

    $jsonFormat = "";
    $counter = 0;

    if(empty($_POST['weeklySchedule'])) {
        echo "Empty input";
        exit(); 
    }

    if(isset($_POST['weeklySchedule'])) {
        $data = $_POST['weeklySchedule'];
        $data_exploded = explode(",",$data);

        $f = fopen("/opt/lampp/htdocs/auto-bell-scheduling/templates/weekly-schedule.json", "w");

        if(is_null($f)) {
            echo "Failed to open file";
        }

        else if(!is_null($f)){
            echo "File opened";
            foreach($data_exploded as $item) {
                $counter = $counter + 1;
                $counter_tasks = 0;
                $item = trim($item);
                list($day,$tasks) = explode(":",$item);

                $day = str_replace("<ol>","",$day);
                $day = str_replace("<li>","",$day);
                $day = str_replace("</ol>","",$day);
                $day = str_replace("</li>","",$day);
                $day = str_replace("</ul>","",$day);
                $day = str_replace("<ul>","",$day);
                $day = str_replace("&nbsp;","",$day);
                $day_replaced = trim($day);

                $jsonFormat.= "\r\t\t{\r\t\t\t\"day\":\"$day_replaced\",\r";
                $tasks = explode("\n",$tasks);
                $jsonFormat.="\t\t\t\"data\":[\r";

                
                foreach($tasks as $task) {
                    $counter_tasks = $counter_tasks + 1;
                    $task = trim($task);
                    list($activity, $time) = explode("--",$task);
                    $activity = str_replace("<li>", "", $activity);
                    $time = str_replace("</li>","",$time);
                    if(!empty($task)) {
                        if($activity == "<ul>" || $activity == "<li>" || $activity == "<ol>"
                        || $activity == "</ul>" || $activity == "</li>" || $activity == "</ol>") {
                            unset($activity);
                            unset($time);
                        }
                        if(!empty($activity) && !empty($time)) {
                            $activity_replaced = trim($activity);
                            $time_replaced = trim($time);
                            if($counter_tasks == sizeof($tasks)) {
                                $jsonFormat.="\t\t\t\t{\"activity\":\"$activity_replaced\",\"time\":\"$time_replaced\"}\r";
                            }
                        
                            else {
                                $jsonFormat.="\t\t\t\t{\"activity\":\"$activity_replaced\",\"time\":\"$time_replaced\"},\r";
                            }
                        }
                    }
                }

                if($counter == sizeof($data_exploded)) {
                    $jsonFormat.="\t\t\t]\r\t\t}";
                }
                else {
                    $jsonFormat.="\t\t\t]\r\t\t},";
                }
            }


            fwrite($f,"{\r\t\"schedule\":[".$jsonFormat."\r\t]\r}");

            echo "<br><br>Successfully written in file";
            fclose($f);

            header("Location: ../views/dashboard.php");
            exit();
        }
    }
    
?>