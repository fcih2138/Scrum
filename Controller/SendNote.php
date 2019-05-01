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
        
    </head>
    <body>
        <?php 
        require '../Controller/Message_init.php';
        include_once '../Model/Meesage_Core.php';
        $obj = new Mesage_Core();
        $chat = new Chat();
        
        if(isset($_POST['note_id']))
        {
            $note_id = $_POST['note_id'];
            $obj->query("SELECT `user_email` FROM `users` where `user_id`='".$_POST['user_id']."'");
            $result =  $obj->rows();
            //$email = $_POST['email'];
            $email = $result[0]['user_email'];
            //$chat->throwMessage($_SESSION["user_id"], '',$note_id, $email);
            //echo 'email '. $result[0]['user_email'];
            //echo $_POST['note_id']. ' '. $_POST['email']. ' ID: '. $_SESSION["user_id"];
            if($chat->throwMessage($_SESSION["user_id"], '',$note_id, $email) == TRUE){
                echo '<h3>Note Sent Successfully.</h3>';
            }else{
                echo 'error!';
            }
        }
?>
        
        
     
    </body>
</html>
