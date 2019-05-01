<?php
      session_start();
      if(!isset($_SESSION['user_id'])){
        header("Location:index.php");
        exit;
      }
      
      
  ?>
<!DOCTYPE html>
<html lang="en" >

  <head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/style.css">
    

  </head>



  <body>

    <!-- Header - Start  -->
    <div id="header"></div>
    <!-- Navigation - End  -->

    <!-- Content - Start  -->
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="text-center">
            <h1>Welcome <?php echo $_SESSION["username"]?><span>!</span></h1>          
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
    
    <script src="js/jquery-1.12.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.countTo.js" type="text/javascript"></script>
    <script src="js/header.js" type="text/javascript"></script>

<!--    <script src="http://localhost/SW2_Mohamed/View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
    <script src="http://localhost/SW2_Mohamed/View/js/jquery.countTo.js" type="text/javascript"></script>
    <script src="http://localhost/SW2_Mohamed/View/js/main.js" type="text/javascript"></script>-->
  </body>

</html>
