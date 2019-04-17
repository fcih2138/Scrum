<!DOCTYPE html>
<html lang="en" >

  <head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <?php
      session_start();
      if(!isset($_SESSION['admin_id'])){
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
        <h3 style="font-weight: bold;">Admin Dashboard</h3>
      </div>
    </header>
    <!-- Header - End  -->

    <!-- Navigation - Start  -->
    <nav id="sidemenu">
      <div class="main-menu">
        <ul class='main-menu'>
        <li>
            <a href="adminHome.php">
          <span class='glyphicon glyphicon-home'></span> Home
          </a>
        </li>
        <li  class="link-active">
          <a href="adminAddadmin.php">
          <span class=' glyphicon glyphicon-plus'></span> Add Admin
          </a>
        </li>
        <li>
          <a href="adminListadmin.php">
          <span class=' glyphicon glyphicon-th-list'></span> List All Admins
          </a>
        </li>
        <li>
          <a href="adminListuser.php">
          <span class=' glyphicon glyphicon-th-list'></span> List All Users
          </a>
        </li>
        <li>
          <a href="adminEditaccount.php">
          <span class='glyphicon glyphicon-edit'></span> Edit Account
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
      <div class="text-center"><h1>Add An Admin <span> !</span></h1></div>
        <div class="row">
            <div class="col-xs-12">
              <div class="notes">
              
              <section class="edit-data">
      <div class="container">
          <form class="edit-cts-data" method="POST" autocomplete="off" action="../Controller/adminaddadmin_controller.php">
                
                <div class="col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" name="edit-email" required="required">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                      <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="edit-password" required="required">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="radio" for="txtContact">Granted Privileges :</label>
                    <input style="display:inline;" class="radio" type="radio" value="1" name="privs" checked /> <span>1 - Block / Delete Users Only</span>
                    <input style="display:inline;" class="radio" type="radio" value="2" name="privs" /> <span>2 - All Admin Privileges</span>
                </div>

                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input name="submit" type="submit" class="save-btn" value="Add Admin">
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
