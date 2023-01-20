<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../public/style/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="../public/style/dashboard.css ">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
   <div class="container">
    <div class="navbar">
    </div>
    <div class="sidebar">
        <div class="upper-div">
            
            <div class="icon">
                <span class="material-symbols-rounded menu">menu</span>
            </div>
              
            <div class="row timers">
                <div class="icon"><span class="material-symbols-rounded">notifications_active</span></div>
                <div class="text">weekly</div>
            </div>
            <div class="row timers">
                <div class="icon"><span class="material-symbols-rounded">timelapse</span>
            </div>
                <div class="text">daily</div>
            </div>
            <div class="row timers">
                <div class="icon"><span class="material-symbols-rounded">hourglass_top</span>
            </div> 
                <div class="text">timer</div>
            </div>
            
        </div>
        <div class="lower-div">
            <div class="row help">
                <div class="icon">
                    <span class="material-symbols-rounded ">question_mark</span>
                </div>
                <div class="text FAQ">faqs</div>
            </div>
            <div class="row help">
                <div class="icon">
                    <span class="material-symbols-rounded">settings_suggest</span>
                </div>
                <div class="text">settings</div>
            </div>
            <div class="row help logout">
                <div class="icon">
                    <span class="material-symbols-rounded">logout</span>
                </div>
                <div class="text">logout</div>
            </div>
        </div>
    </div>
        <div class="nav--container">
            <div class="nav--container--input">
                <span class="search--box">
                    <input type="text" name="search" id="search" placeholder="Search ...">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <div class="nav--container--right">
                <div class="nav--container--right--icons">
                    <i class="fas fa-plus-square icons"></i>
                    <i class="fas fa-bell icons"></i>
                </div>
                <div class="nav--container--right--persona">
                    <img src="../public/assets/avatar.png" alt="Image holder">
                    <div class="description">
                        <h3 class="description--name">John Doe</h3>
                        <p class="description--position">School manager</p>
                    </div>
                    <div class="description--icon">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
    </div>
    <div class="main"></div>
   </div> 
</body>
</html>