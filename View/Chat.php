<?php
//session_start();
//      if(!isset($_SESSION['user_id'])){
//        header("Location:index.php");
//        exit;
//      }else{
//          echo $_SESSION['user_id'];
//      }
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
        <link href="http://localhost/SW2_Mohamed/View/css/Message.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php if(isset($_POST['note_id']))
        {
            echo '<h1>"'.$_POST['note_id'].'"</h1>';
        }
?>
            <div class="chat">
                <div class="messages" id="messages"></div>
            <input type="text" class="email" name="email" id="email">
            <input type="text" class="note" name="note" id="note">
            <textarea class="entry" name="message" id="message"></textarea>
            <button  id="btn">Submit</button>
        </div>
        
        
        <script src="http://localhost/SW2_Mohamed/View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="http://localhost/SW2_Mohamed/View/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="http://localhost/SW2_Mohamed/View/js/Chat.js" type="text/javascript"></script>
        
    </body>
</html>
