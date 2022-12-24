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
    
    public function writeWeatherDataToFileInJSONFormat(){
        if(isset($_POST['userInput'])){
            $userInput = $_POST['userInput'];
            $inputPerLine = explode("\n", $userInput);
            $clearInput = array(); //Array to be filled with clear elements
        
            //Remove first and last elements which ol or ul tags
            array_pop($inputPerLine);
            array_shift($inputPerLine);

            //Remove the li tags
            foreach ($inputPerLine as $input){
                $input = str_replace("<li>", "", $input);
                $input = str_replace("</li>", "", $input);
                
                //Add clear input to the clearInput array - Clear input means input without the html tags
                array_push($clearInput, $input);

                //Remove nbsp
                if ($clearInput[count($clearInput)-1] == "&nbsp;") {
                    array_pop($clearInput);
                }
                if(strpos($clearInput[count($clearInput)-1], "&nbsp;")!==false){
                    $clearInput[count($clearInput)-1] = str_replace("&nbsp;", "", $clearInput[count($clearInput)-1]);
                }
            }
            

            //Extract clear input (activity and time)
            $jsonFormat = "";
            foreach($clearInput as $item) {
                $item = trim($item);
                $activity = explode(" - ", $item)[0];
                $time = explode(" - ", $item)[1];
                $jsonFormat .= "{\"activity\":\"$activity\", \"time\":\"$time\"},";
            }
            
            //Write the JSON-format schedule into file
            $f = fopen($this->FILENAME, "w");
            fwrite($f, "{\"day\":\"".$this->getTimestamp(2)."\", \"data\":[".$jsonFormat."]}");
            fclose($f);
        }
    }
}
?>