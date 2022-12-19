<?php
class DataProcessJSON{
    private $FILENAME = "";
    
    public function __construct($any_filename="./../templates/schedule.json"){
        $this->FILENAME = $any_filename;
    }
    public function getTimestamp($offsetParam){
        #Offset is the number of hours counted from GMT.
        $offsetToSeconds=$offsetParam*60*60; #converting offset to seconds
        $dateFormat="Y-m-d H:i:s";
        return gmdate($dateFormat, time()+$offsetToSeconds);
    } 
    
    public function writeWeatherDataToFileInJSONFormat($activity, $time){
        #check if the file exists and if not create a new one
        if(!is_file($this->FILENAME)){
            file_put_contents($this->FILENAME, null);
        }
        
        #load the existing content into server memory in the variable $existing_data
        $existing_data = file_get_contents($this->FILENAME);
        
        // #remove {\"data\":[ and ]} from the existing content
        // $existing_data = str_replace("{\"data\":[","", $existing_data);
        // $existing_data = str_replace("]}","",$existing_data);
    
        #capture new data and manually write it in JSON Format
        $new_data = "{\"day\": \""
                    .$this->getTimestamp(2) # In Rwanda the offset is 2 hours
                    ."\", {\"data\":[\". \"activity\": \""
                    .$activity
                    ."\", \"time\": \""
                    .$time."\"}";
        
        #append new data at the end of existing data and store the whole in the variable $semi_final_data
        $semi_final_data = $existing_data.$new_data;
        
        #wrap {\"data\":[ and ]} around the whole data to complete JSON
        // $final_data = "{\"data\":[".$semi_final_data."]}";
        
        #Add comma except at the far end
        $final_data = str_replace("}{","},{",$semi_final_data);
        $final_data = str_replace("}\n{","},\n{",$semi_final_data);
        
        #overwrite the existing content
        file_put_contents($this->FILENAME, $final_data);      
    }
}
?>