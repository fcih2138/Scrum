<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
    exit;
}
?>

<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Add Note</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="css/style.css">
        <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
        <link href="css/jquery.fileuploader.css" media="all" rel="stylesheet">
    </head>



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


<!--                    <div id="preview"><img src="no-image.jpg" style="display: none" id="image"></div>-->
                    <div  class="addnote-form">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Note Title" aria-describedby="sizing-addon2" name="note_title" id="note_title">
                                <textarea  style="margin-top: 10px;" rows="3" type="text" class="form-control" placeholder="Enter Messege you Want to Encrypt" aria-describedby="sizing-addon2"  name="note_message" id="note_message"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="radio" for="txtContact">Granted Privileges :</label>
                            <input style="display:inline;" class="radio" type="radio" value="1" name="gallery" id="gallery" checked /><span>1- Upload From Desktop</span>
                            <input style="display:inline;" class="radio" type="radio" value="2" name="gallery" id="gallery" /> <span>2 - Pick From Gallery</span>
                        </div>

                        <div class="Gallery">

                        </div>

                        <div class="form-group" id="img-upload">
                            <input type="file" id="file"  class ="form-control-file"  name="file" class="b0tn"/>
                        </div>

                        <!--start Gallery Modal-->

                        <!--                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                                    Launch demo modal
                                                </button>-->
                        <button id="modal" data-toggle="modal">Display Modal</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <button type="button" class="btn btn-secondary" id="save_modal" data-dismiss="modal">pick</button>
                                    </div>
                                    <div class="modal-body" id="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Gallery Modal-->


                        <button  id="add_note" class="btn">Add</button>
                        <div id="Data"></div>
                    </div>
                </div>
            </div>
        </div>


        <script src='js/jquery-1.12.1.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src="js/jquery.fileuploader.js" type="text/javascript"></script>
        <script src="js/jquery.countTo.js" type="text/javascript"></script>
<!--        <script  src="js/main.js"></script>-->
        <script>



        var RadioValue = "";
        var img_url = "";
        var fd = new FormData();
        var formdata = new FormData();
//        var file;
        $(document).ready(function (e) {


//            $("#modal").click(function () {
//                $("#exampleModalLong").modal('show');
//            });
            $("#img-upload").show();
            //RadioValue = "1";

            $("#file").change(function () {
                var file = $('#file')[0].files[0];

                $.each($('#file')[0].files, function (i, file) {
                    formdata.append('file', file);
                });
            });

           RadioValue =  $("input[type=radio]:checked").val();
            console.log(RadioValue);
            $(function () {


                $('input[type=radio]').change(function () {
                    if (this.value == "2") {
                        //$("#img-upload").hide();

                        //alert("hello");
                        //e.preventDefault();
                        //exampleModalLong
                        //$("#exampleModalLong").show();
                        $("#exampleModalLong").modal('show');
                        $("#modal-body").load("http://localhost/SW2_Mohamed/View/Gallery.php");
                        $("#save_modal").click(function () {

                            img_url = $("#URL").html();
                            $("#exampleModalLong").modal('hide');
                           
                        });
                    } else {
                        $("#modal").modal({show: false});
                        $("#img-upload").show();
                        

//                    $("#file").change(function () {
//
//
////                    $("#file").change(function () {
//
//
//                        //var dataimg = $('#uploadImage')[0].files[0];
//                        //var file = $('#file')[0].files[0];
////                        file = $('#file')[0].files[0];
////
////                        fd.append("file", file);
////                        console.log(fd);
//                    });
                    }

                    //console.log(this.value);
                    RadioValue = $("input[type=radio]:checked").val();

                    console.log(RadioValue);
                });
            });
//    var radioValue = $("input[name='gallery']:checked").val();
//                
//                console.log(radioValue);
//            var radioValue = $("input[name='gallery']:checked").val();
//            console.log(radioValue);
//            if (radioValue == 2)
//            {
//                console.log(radioValue);
//                $("#modal").show();
//            $("#modal-body").load("http://localhost/SW2_Mohamed/View/Gallery.php");
//            }




            $("#add_note").click(function () {

                //alert("hello");
                var note_title = $("#note_title").val();
                var note_message = $("#note_message").val();
                var lock = "0";
                if (RadioValue == "1")
                {


                    var result1;
                    var result2;

                    $.ajax({
                        url: "http://localhost/SW2_Mohamed/Controller/addnote_controller.php",
                        cache: false,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: formdata,
                        success: function (response) {
                            result1 = response;
                            console.log(result1);
                            $("#Data").html(result1 + "<br>" + result2);
                            lock = "1";
                            $.post("http://localhost/SW2_Mohamed/Controller/addnote_controller.php", {note_title: note_title, note_message: note_message, gallery: RadioValue, lock: lock}, function (res) {
                                console.log(res);
                                result2 = res;
                                $("#Data").html(result1 + "<br>" + result2);

                                console.log(result2);
                            });

                        }
                    });

                    //fd.append('uploadImage', files);

//                    var file = $('#file')[0].files[0];
//                    var formdata = new FormData();
//                    $.each($('#file')[0].files, function (i, file) {
//                        formdata.append('file', file);
//                    });
//                    $.ajax({
//                        url: "http://localhost/SW2_Mohamed/Controller/addnote_controller.php",
//                        type: "POST",
//                        cache: false,
//                        contentType: false,
//                        processData: false,
//                        data: {note_title: note_title, note_message: note_message, gallery: RadioValue, fd: $('#file')[0].files[0]},
//                        success: function (response) {
//                            $("#Data").html(response);
//                            console.log(response);
//                            console.log(formdata);
//                        }
//                    });
//                    var file_name = $('#file')[0].files[0].name;
//                    
//                    var temp = 
//                    console.log(temp);

//                    $.post("http://localhost/SW2_Mohamed/Controller/addnote_controller.php", {note_title: note_title, note_message: note_message, gallery: RadioValue, file_name: file_name, temp: temp}, function (data) {
//                        $("#Data").html(data);
//
//                    });
//                    });
//                    });
                } else if (RadioValue == "2")
                {
                    console.log(img_url);
                    $.post("http://localhost/SW2_Mohamed/Controller/addnote_controller.php", {note_title: note_title, note_message: note_message, gallery: RadioValue, img_url: img_url}, function (data) {
                        //console.log(RadioValue);
                        //console.log(data);
                        $("#Data").html(data);
                    });
                }

                //var img_url = 




            });
            //$(".radio")



//                                    $("#uploadImage").change(function () {
//                                        filePreview(this);
//                                        //alert("New image");
//                                    });

//                                    $("#form").on('submit', (function (e) {
//                                        e.preventDefault();
//                                        $.ajax({
//                                            url: "ajaxupload.php",
//                                            type: "POST",
//                                            data: new FormData(this),
//                                            contentType: false,
//                                            cache: false,
//                                            processData: false,
//                                            beforeSend: function ()
//                                            {
//                                                //$("#preview").fadeOut();
//                                                //$("#err").fadeOut();
//                                            },
//                                            success: function (data)
//                                            {
//                                                if (data == 'invalid file')
//                                                {
//                                                    // invalid file format.
//                                                    $("#err").html("Invalid File !").fadeIn();
//                                                } else
//                                                {
//                                                    // view uploaded file.
//                                                    $("#preview").html(data).fadeIn();
//                                                    $("#form")[0].reset();
//                                                    //window.location.assign('../../Mohamed_Eman/Eman/Profile.php').load("profile_image");
//
//                                                }
//                                            },
//                                            error: function (e)
//                                            {
//                                                $("#err").html(e).fadeIn();
//                                            }
//                                        });
//                                    }));


//                                    function filePreview(input) {
//                                        if (input.files && input.files[0]) {
//                                            var reader = new FileReader();
//                                            reader.onload = function (e) {
//                                                $('#uploadImage + img').remove();
//                                                $('#uploadImage').after('<img src="' + e.target.result + '" width="150" height="150"/>');
//                                            }
//                                            reader.readAsDataURL(input.files[0]);
//                                            //$("#form")[0].reset();
//                                        }
//                                    }



        });
        </script>
    </body>

</html>
