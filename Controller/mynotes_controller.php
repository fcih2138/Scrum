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
        <title></title>
        <link href="../View/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../View/css/note.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        //session_start();
        include_once ('../Model/Note.php');
        include_once ('../Model/Decryption.php');
        include_once '../Model/Meesage_Core.php';

        $n = new Note();
        $obj = new Mesage_Core();
        $obj->query("SELECT * FROM users");
        $users = $obj->rows();

        $users_size = count($users);

        $id = $_SESSION['user_id'];
        $result = $n->listNotes($id);

        while ($arr = mysqli_fetch_assoc($result)) {

            if (isset($_POST[$arr["note_id"]])) {


                $d = new Decryption();
                $msg = $d->decrypte($arr["note_imageurl"], $arr["note_id"]);
                //echo $msg;




                echo '<div class="container text-center">
                    <h1>'.$arr["note_title"].'</h1>
  <div class="Image">
    <img src="http://localhost/SW2_Mohamed/encrypted/' . $arr["note_imageurl"] . '" class="img img-responsive" id="note_img" alt="Cinque Terre">
  </div>
  <p class="message_title">Real Message:-</p>
  <div class="Message well">
    <p>' . $msg . '</p>
  </div>
  <input type="hidden" name="note_id" id="note_id" value="' . $arr["note_id"] . '">
  
  

<input type="hidden" id="user_id">
   <div class="dropdown" id="user_menue">
  <button class="btn btn-primary btn-lg dropdown-toggle" id="drop_down" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">';
                for ($x = 0; $x < $users_size; $x++) {
                    echo '<li id="' . $users[$x]['user_id'] . '"><a href="#">' . $users[$x]['username'] . '</a></li>';
                    //<li id="user_btn" onclick="getId(' . $users[$x]['user_id'] . ',' . $x . ')">' . $users[$x]['username'] . ' ' . $users[$x]['user_id'] . '</li>
//                    echo '<li id="user_btn" onclick="getElementById(user_id).innerHTML=' . $users[$x]['user_id'] . ';"><a href="#">' . $users[$x]['username'] . '</a></li>';
//                    echo '<li id="user_btn" onclick="getId(' . $users[$x]['user_id'] . ',' . $x . ')"><a href="#">' . $users[$x]['username'] .'</a></li>';
                    //echo '<button class="dropdown-item"  id="user_btn" onclick="getId(' . $users[$x]['user_id'] . ',' . $x . ')" type="button">' . $users[$x]['username'] . ' ' . $users[$x]['user_id'] . '<span va></span></button>';
                }
                echo '</ul>
</div>

<button class="btn btn-lg btn-success" id="send_note">Send Note To user</button>
  <a href="http://localhost/SW2_Mohamed/View/mynotes.php" id="goback">Go Back</a>

<div id="Result"></div>
</div>';








//                            echo'
//        
//                                <script type="text/javascript">
//                                    <!--
//                                            alert("'.$msg.'");
//                                            document.location = "../View/mynotes.php";
//                                        
//                                    //-->
//                                </script>
//        
//                            ';
            }
        }
        ?>   

        <script src="http://localhost/SW2_Mohamed/View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="http://localhost/SW2_Mohamed/View/js/bootstrap.min.js" type="text/javascript"></script>
<!--        <script src="http://localhost/SW2_Mohamed/View/js/Send_Note.js" type="text/javascript"></script>-->
        <script>

            $(document).ready(function () {

//      var user_id;
//        function getId(id)
//        {
//            user_id = id;
//        }
//          getId();
//    $("#user_btn").click(function () {
//            console.log(user_id);
//        });
                var id;
                $("li").click(function () {
                    id = $(this).attr('id');
                    console.log(id);
                });
                $("#send_note").click(function () {

                    //var email = $("#email").val();
                    var NoteId = $("#note_id").val();
                    $.post("http://localhost/SW2_Mohamed/Controller/SendNote.php", {note_id: NoteId, user_id: id}, function (data) {
                        //console.log(NoteId);
                        //console.log(email);
                        $("#Result").html(data);
                    });


                });
            });


        </script>
    </body>
</html>
