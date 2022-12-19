<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  include_once "DataProcessJSON.php";
  $dataProcess = new DataProcessJSON();
  ?>

<script> 
function getUserInput() {
  var plan = tinymce.activeEditor.getContent();
  let inputPerLine = plan.split("\n");
  let clearInput = []; //Array to be filled with clear elements

  //Remove first and last elements which ol or ul tags
  inputPerLine.shift();
  inputPerLine.pop();

  inputPerLine.forEach((input) => {
    input = input.replace("<li>", "");
    input = input.replace("</li>", "");
    //Add clear input to the clearInput array
    clearInput.push(input);

    //Remove nbsp
    if (clearInput[clearInput.length - 1] == "&nbsp;") {
      clearInput.pop();
    }
    if(clearInput[clearInput.length - 1].includes("&nbsp;")){
      clearInput[clearInput.length - 1] = clearInput[clearInput.length - 1].replace("&nbsp;","")
    }
  });

  return clearInput;
}

 <?php
 $f = fopen("./../templates/schedule.json", "a");
 fwrite($f, "{\"day\":\"".$dataProcess->getTimestamp(2)."\", \"data\":[");
 ?>

function writeDataToFile() {
  const inputArr = getUserInput();
  console.log(getUserInput());
  //File system module
  let jsonFormat = "";
  inputArr.forEach(function (item) {
    const activity = item.split(" - ")[0];
    const time = item.split(" - ")[1];
    jsonFormat += `"{activity":"${activity}", "time":"${time}"},`;
    console.log(jsonFormat);
    // $jsonFormat = json_decode(jsonFormat); 
  });

  <?php 
  fwrite($f, $jsonFormat."]}");
  fclose($f);
  ?>
}
</script>
</body>
</html>

