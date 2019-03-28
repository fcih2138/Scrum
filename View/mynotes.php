<!DOCTYPE html>
<html lang="en" >

  <head>
    <meta charset="UTF-8">
    <title>My Notes</title>
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
        <li class="link-active">
            <a href="mynotes.php">
          <span class='glyphicon glyphicon-home'></span> My Notes
          </a>
        </li>
        <li>
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
        <div class="text-center">
          <h1>Welcome<span>!</span></h1>
          <h3>See all Notes you have Encrypted</h3>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="notes">
                <?php
                  
                  include_once ('../Model/Note.php');
                  $n = new Note();
                  $result = $n->listNotes($_SESSION['user_id']);

                  while($arr = mysqli_fetch_assoc($result)){

                    echo'

                    
                    <a class="ad text-center">
                        <div class="n1">
                            <p class="ad">
                                <p class="ad">'.$arr["note_title"].'</p>
                            </p>
                            <img src="'.$arr["note_imageurl"].'" alt=""/ class="ad">
                            <div class="text">
                            <form action = "../Controller/mynotes_controller.php" method="POST">
                            <input class="btn" value="Preview" type="submit" name="'.$arr["note_id"].'">
                            </form>
                            </div>
                        </div>
                    </a>
                    

                    ';

                  }
                ?>
              </div>
            </div>
        </div>
      </div>
    </div>
    
  

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script  src="js/main.js"></script>
  </body>

</html>
