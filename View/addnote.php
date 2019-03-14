<!DOCTYPE html>
<html lang="en" >

  <head>
    <meta charset="UTF-8">
    <title>Add Note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <?php
      session_start();
      if(!isset($_SESSION['user_id'])){
        header("Location:index.php");
        exit;
      }
  ?>

  <body>

    <!-- Header - Start  -->
    <header id="header">
      <div class="menu-button">
        <div id="nav-icon3">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        </div>
      </div>
      <div id="top-bar">
        <h3 style="font-weight: bold;">Dashboard</h3>
      </div>
    </header>
    <!-- Header - End  -->

    <!-- Navigation - Start  -->
    <nav id="sidemenu">
      <div class="main-menu">
        <ul class='main-menu'>
        <li>
            <a href="mynotes.php">
          <span class='glyphicon glyphicon-home'></span> My Notes
          </a>
        </li>
        <li class="link-active">
          <a href="addnote.php">
          <span class='glyphicon glyphicon-comment'></span> Add Note
          </a>
        </li>
        <li>
          <a href="myaccount.php">
          <span class='glyphicon glyphicon-edit'></span> Edit Profile
          </a>
        </li>
        <li class="main-menu">
          <a href="../Controller/Logout.php">
          <span class='glyphicon glyphicon-log-out'></span> Logout
          </a>
        </li>
        </ul>
      </div>
      <p class="copyright">My Notes - &copy; 2018</p>
    </nav>
    <!-- Navigation - End  -->

    <!-- Content - Start  -->
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="addnote-info" style="margin: 50px;">
          <h1>Add Security Note</h1>
          <form action = "../Controller/addnote_controller.php" class="addnote-form" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Note Title" aria-describedby="sizing-addon2" required="required" name="note_title">
                    <input style="margin-top: 10px; height:90px;" type="text" class="form-control" placeholder="Enter Messege you Want to Encrypt" aria-describedby="sizing-addon2" required="required" name="note_message">
                  </div>
                </div>
                <input required="required" type="file" name="image" class="b0tn">
                <input type="submit" name="submit" value="Add" class="btn">
        </form>
        </div>
      </div>
    </div>
    


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script  src="js/main.js"></script>
  </body>

</html>
