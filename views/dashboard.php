<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/dashboard.css ">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
   <div class="container">
    <div class="navbar">
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