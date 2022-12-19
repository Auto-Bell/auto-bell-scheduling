<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/style/dailySchedule.css ">
    <title>Make a daily schedule</title>
    <script language="javascript" type="text/javascript" src="/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
  tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    elements : "elm1",
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap",
    theme_advanced_buttons3 : "",
    height:"350px",
    width:"600px"
});

</script>
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

    <?php echo $sHeader;?>
 <h2>Sample using TinyMCE and PHP</h2>
 <form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
  <textarea id="elm1" name="elm1" rows="15" cols="80"><?php echo $sContent;?></textarea>
<br />
<input type="submit" name="save" value="Submit" />
<input type="reset" name="reset" value="Reset" />
</form>
     
      <div class="button">
        <?php
          include ("./../modules/getInput.php");
        ?>
        <button id="save" name="save" onclick="writeDataToFile()">SAVE TIME</button>
      </div>
    </div>
  </body>
</html>