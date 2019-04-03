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
        $chat = new Chat();
        
        if(isset($_POST['note_id']))
        {
            $note_id = $_POST['note_id'];
            $email = $_POST['email'];
            //echo $_POST['note_id']. ' '. $_POST['email']. ' ID: '. $_SESSION["user_id"];
            $chat->throwMessage($_SESSION["user_id"], '',$note_id, $email);
        }
?>
        
        
     
    </body>
</html>
