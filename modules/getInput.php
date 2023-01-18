<?php
  include_once "DataProcessJSON.php";
  $dataProcess = new DataProcessJSON();
  $dataProcess->writeDailyScheduleToFileInJSONFormat();
?>