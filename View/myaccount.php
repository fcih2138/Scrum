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
      }else{
        include_once ('../Model/user.php');
        $u = new user();
        $userinfo = $u->userinfo( $_SESSION['user_id'] );
        // $userinfo[0]['user_address']
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
        <li>
          <a href="addnote.php">
          <span class='glyphicon glyphicon-comment'></span> Add Note
          </a>
        </li>
        <li class="link-active">
          <a href="myaccount.php">
          <span class='glyphicon glyphicon-edit'></span> Edit Profile
          </a>
        </li>
        <li>
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
      <div class="text-center"><h1>Edit Your Profile Data <span> !</span></h1></div>
        <div class="row">
            <div class="col-xs-12">
              <div class="notes">
              
              <section class="edit-data">
      <div class="container">
          <form autocomplete="off" class="edit-cts-data" method="POST" action="../Controller/myaccount_controller.php">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="text" class="form-control" value="<?php echo $userinfo[0]['user_fname'];?>" aria-describedby="sizing-addon2" name="edit-fname" required="required">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="text" class="form-control" value="<?php echo $userinfo[0]['user_lname'];?>" aria-describedby="sizing-addon2" name="edit-lname" required="required">
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="password" class="form-control" value="<?php echo $userinfo[0]['user_password'];?>" aria-describedby="sizing-addon2" name="edit-password" required="required">
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="text" class="form-control" value="<?php echo $userinfo[0]['user_phhone'];?>" aria-describedby="sizing-addon2" name="edit-phone" required="required">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="text" class="form-control" value="<?php echo $userinfo[0]['user_address'];?>" aria-describedby="sizing-addon2" name="edit-address" required="required">
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input name="submit" type="submit" class="save-btn" value="Save">
                    </div>
                  </div>
                </div>

              </div>
              
            </form>
            
      </div>
    </section>
    

              </div>
            </div>
        </div>
      </div>
    </div>
    
  

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script  src="js/main.js"></script>
  </body>

</html>
