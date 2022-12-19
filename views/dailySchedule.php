<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/style/dailySchedule.css ">
    <title>Make a daily schedule</title>
    <script
      src="https://cdn.tiny.cloud/1/i3bfp7p2fdzdrnrua0zyl968x36bdfmf4jjv0p8u4rx8s15h/tinymce/6/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
  </head>
  <title>Make a daily schedule</title>
  <body>
    <nav>
      <div class="nav">
        <div class="nav-left">
          <img src="../public/assets/autobell-logo.png" alt="logo">
        </div>
      </div>
        <div class="nav-right">
          <p><span>C</span>reate <span>D</span>aily <span>S</span>chedule</p>
        </div>
      </div>
    </nav>
    <div class="main">
      <div class="sample" id="sample">
        <h3 class="sample-heading">Sample</h3>
        <div class="card-list">
          <div class="card-sub-list">
            <ol class="card-sub-list-holder">
              <li class="card-sub-list-item">Cleaning the house <span class="sample-time-holder">5:30 AM</span></li>
              <li class="card-sub-list-item">Preparing Breakfast<span class="sample-time-holder">6:30 AM</span></li>
              <li class="card-sub-list-item">Preparing Children<span class="sample-time-holder">7:30 AM</span></li>
              <li class="card-sub-list-item">Taking the to the school bus<span class="sample-time-holder">8:30 AM</span></li>
              <li class="card-sub-list-item">Cooking Lunch<span class="sample-time-holder">9:30 AM</span></li>
              <li class="card-sub-list-item">Taking a nap<span class="sample-time-holder">10:30 AM</span></li>
              <li class="card-sub-list-item">Preparing super<span class="sample-time-holder">17:30 PM</span></li>
            </ol>
          </div>
        </div>

        <div class="warning">
          <p>
            <span>NB:</span>  Make sure you set another schedule
            tomorrow unless you want to follow the
            same schedule.
          </p>
        </div>
      </div>

      <div class="textArea" id="textArea">
        <h3>your schedule</h3>
        <textarea id="userInput"></textarea>
        <script>
          tinymce.init({
            selector: "textarea",
            plugins:
              "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect",
            toolbar:
              "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
            tinycomments_mode: "embedded",
            tinycomments_author: "Author name",
            mergetags_list: [
              { value: "First.Name", title: "First Name" },
              { value: "Email", title: "Email" },
            ],
          });
        </script>
      </div>
      <div class="button">
        <?php
        include "./../modules/getInput.php";
        ?>
        <button id="save" name="save" onclick="writeDataToFile()">SAVE TIME</button>
      </div>
    </div>
  </body>
</html>