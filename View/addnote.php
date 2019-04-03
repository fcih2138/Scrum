<!DOCTYPE html>
<html lang="en" >

  <head>
    <meta charset="UTF-8">
    <title>Add Note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link href="css/jquery.fileuploader.css" media="all" rel="stylesheet">
  </head>

  <?php
      session_start();
      if(!isset($_SESSION['user_id'])){
        header("Location:index.php");
        exit;
      }
  ?>

   <script>


            function imagePreview(input) {
                if (input.files && input.files[0])
                {
                    var File = new fileReader();
                    File.onload = function (e) {
                        $("#image").attr("src", e.target.result);
                    };

                    File.readAsDataURL(input.files[0]);
                }
            }

        </script>        
        <link href="css/jquery.fileuploader.css" rel="stylesheet" type="text/css"/>
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
          <div id="preview"><img src="no-image.jpg" style="display: none" id="image"></div>
          <form id="form" action = "../Controller/addnote_controller.php" class="addnote-form" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Note Title" aria-describedby="sizing-addon2" required="required" name="note_title">
                    <textarea  style="margin-top: 10px;" rows="3" type="text" class="form-control" placeholder="Enter Messege you Want to Encrypt" aria-describedby="sizing-addon2" required="required" name="note_message"></textarea>
                  </div>
                </div>
              <div class="form-group">
                  <input required="required" type="file" id="uploadImage" onchange= "imagePreview(this);" class ="form-control-file"  name="image" class="b0tn"/>
              </div>
                
                <input type="submit" name="submit" value="Add" class="btn">
        </form>
        </div>
      </div>
    </div>
    
    
    <script src='js/jquery-1.12.1.min.js'></script>
    <script src='js/bootstrap.min.js'></script>    
    <script src="js/jquery.fileuploader.js" type="text/javascript"></script>
    <script src="js/jquery.countTo.js" type="text/javascript"></script>
    <script  src="js/main.js"></script>
    <script>




                            $(document).ready(function (e) {


                                $("#uploadImage").change(function () {
                                    filePreview(this);
                                    //alert("New image");
                                });

                                $("#form").on('submit', (function (e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: "ajaxupload.php",
                                        type: "POST",
                                        data: new FormData(this),
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        beforeSend: function ()
                                        {
                                            //$("#preview").fadeOut();
                                            //$("#err").fadeOut();
                                        },
                                        success: function (data)
                                        {
                                            if (data == 'invalid file')
                                            {
                                                // invalid file format.
                                                $("#err").html("Invalid File !").fadeIn();
                                            } else
                                            {
                                                // view uploaded file.
                                                $("#preview").html(data).fadeIn();
                                                $("#form")[0].reset();
                                                //window.location.assign('../../Mohamed_Eman/Eman/Profile.php').load("profile_image");

                                            }
                                        },
                                        error: function (e)
                                        {
                                            $("#err").html(e).fadeIn();
                                        }
                                    });
                                }));


                                function filePreview(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#uploadImage + img').remove();
                                            $('#uploadImage').after('<img src="' + e.target.result + '" width="150" height="150"/>');
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                        //$("#form")[0].reset();
                                    }
                                }



                            });
        </script>
  </body>

</html>
