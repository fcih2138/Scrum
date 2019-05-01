<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/SW2_Mohamed/View/css/Message.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../View/mynotes.php">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <div class="row">


                <ul class="list-group col-lg-4 user_list" >

                    <?php
                    include_once '../Model/Meesage_Core.php';
                    echo '<h1 id="Reciever"></h1>';
                    $userlist = new Mesage_Core();
                    $sql = "select * from users";
                    $userlist->query($sql);
                    $result = $userlist->rows();

                    $rows_no = count($result);

                    for ($x = 0; $x < $rows_no; $x++) {
                        echo '<li class="list-group-item"><img src="' . $result[$x]['avatar'] . '" id="userlist_img" width="60" height="60"  class="img-responsive"> <a href="?userid=' . $result[$x]['user_id'] . '" id="user">' . $result[$x]['username'] . '</a></li>';
                        //echo '<span><a href="?userid=' . $result[$x]['user_id'] . '">' . $result[$x]['username'] . '</a></span>   ';
                    }
                    ?>



<!--                <li class="list-group-item">New <span class="badge">12</span></li>
<li class="list-group-item">Deleted <span class="badge">5</span></li> 
<li class="list-group-item">Warnings <span class="badge">3</span></li> -->
                </ul>


                <div class="chat col-lg-8">
                    <div class="messages" id="messages"></div>            
                    <textarea class="entry" name="ChatText" id="message"></textarea>                
                </div>
            </div>
        </div>

        <script src="http://localhost/SW2_Mohamed/View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="http://localhost/SW2_Mohamed/View/js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            var flag = 1;
            var UserId_Rec = <?php echo(json_encode($_REQUEST['userid'])); ?>;

            

            $(document).ready(function () {
                //$("body").css('background-color','red');


                $("#user").click(function () {
                var x = $(this).text();
                $("#Reciever").html(x);
            });

                $(".chat .entry").keydown(function (e) {
                    window.setTimeout(function () {
                        //                    console.log(keyCode);
                        flag = 0;
//                        var chat_text = $("#entry").val();
//                        console.log(chat_text);
                        if (e.keyCode === 13)
                        {
                            //console.log(keyCode);

                            flag = 0;
                            var chat_text = $(".chat .entry").val();

                            //console.log(chat_text);


                            $.post("http://localhost/SW2_Mohamed/Controller/InsertMessage.php", {chat_text: chat_text, UserId_Rec: UserId_Rec}, function (data) {

                                //
                                flag = 1;
                                fillDisplay();
                                //$("#messages").load("http://localhost/SW2_Mohamed/Controller/DisplayMessage.php");
                                $(".chat .entry").val("");

                                //console.log(data);
                                //console.log(UserId_Rec);
                            });

                            //fillDisplay();
//                        $.ajax({
//                            url: "http://localhost/SW2_Mohamed/Controller/InsertMessage.php",
//                            type: 'POST',
//                            data: {chat_text: chat_text},
//                            success: function () {
//                                $("#messages").load("../Controller/DisplayMessage.php");
//                                $("#entry").val("");
//                            }
//                        });
                        }
                    });


                });

                function fillDisplay()
                {

                    $.post("http://localhost/SW2_Mohamed/Controller/DisplayMessage.php", {UserId_Rec: UserId_Rec}, function (data) {
//                            $("#messages").load("http://localhost/SW2_Mohamed/Controller/DisplayMessage.php");
//                            $(".chat .entry").val("");
                        //$("#messages").load("http://localhost/SW2_Mohamed/Controller/DisplayMessage.php");

                        $("#messages").html(data);
                        //$(".right").css({"text-align":"right",'display': 'block'});
                        //console.log(data);
//                            console.log(UserId_Rec);
                    });
                    console.log(flag);
                }
                //fillDisplay();
                if (flag == 1)
                {
                    fillDisplay();
                    //setInterval(fillDisplay(), 1000);
                    setInterval(function () {
                        fillDisplay();
                    }, 500);
                    //fillDisplay();
                }

//                $("a.right").css({"text-align": "right", "display": "block"});
//                $(".right").css('text-align', 'right');
//                setInterval(function () {
//                    $("#messages").load("http://localhost/SW2_Mohamed/Controller/DisplayMessage.php");
//                }, 1500);
//                $("#messages").load("http://localhost/SW2_Mohamed/Controller/DisplayMessage.php");
            });
        </script>
        <?php $userlist->DbClose(); ?>
    </body>
</html>
