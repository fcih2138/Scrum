<?php
      session_start();
      if(isset($_SESSION['user_id'])){
        header("Location:mynotes.php");
        exit;
      }
      
      
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>My Notes Login</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" href="images/lo.png"/>
  </head>
  <body>

    <!--start of login page body-->
    <section class="login-body">
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="login-info">
              <h1>Welcome To My Notes</h1>
              <h2>Login Now</h2>
              <P>We are wait for you to serve you with love <i class="fa fa-heart"></i></P>
              <form autocomplete="off" action = "../Controller/Login_controller.php" class="login-form" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" aria-describedby="sizing-addon2" required="required" name="login-user">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" aria-describedby="sizing-addon2" required="required" name="login-password">
                  </div>
                    <p><input type="checkbox" name="remember" /> Remember me
	</p>
                </div>
                <input type="submit" name="submit-login" value="Login" class="btn">
              </form>
            </div>

            

          </div>
          
          
        </div>
        

        <div class="row">
        
          <div class="sign-up-info">
              <h1>Don't Have Account</h1>
              <h2>Sign Up Now</h2>
              <P>And join us to be our guest to serve you with love <i class="fa fa-heart"></i></P>
              <form autocomplete="off" action = "../Controller/Sign-up_controller.php"  class="sign-up-form" method="POST">
                <div class="row">
                  <div class="col-sm-12 col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">FN</span>
                        <input type="text" class="form-control" placeholder="Fristname" aria-describedby="sizing-addon2" name="sign-fname" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">LN</span>
                        <input type="text" class="form-control" placeholder="Lastname" aria-describedby="sizing-addon2" name="sign-lname" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">@</span>
                        <input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" name="sign-email" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2" name="sign-password" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-mobile"></i></span>
                        <input type="text" class="form-control" placeholder="Phone Number" aria-describedby="sizing-addon2" name="sign-phone" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-home"></i></span>
                        <input type="text" class="form-control" placeholder="Address" aria-describedby="sizing-addon2" name="sign-address" required="required">
                      </div>
                    </div>
                  </div>
                </div>
                <input type="submit" name="submit-sign-up" class="btn" value="Sign Up">
              </form>
            </div>
          </div>
      </div>
    </section>
    <!--end of login page body-->

    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="dist/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
