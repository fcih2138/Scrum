

<?php
require './Message_init.php';
if (isset($_POST['method']) === true && empty($_POST['method']) === false) {
            
    $chat = new Chat();
    $method = trim($_POST['method']);

    if ($method === 'fetch') {
        //fetch messages and output
        $messages = $chat->fetchMessages();
        if (empty($messages) === true) {
            echo 'There are currently no messages in the chat';
        } else {
            foreach ($messages as $message) {
                ?>
                <div class="message">
                    <a href="#"><?php echo $message['username']; ?></a> says:
                    <p><?php echo nl2br($message['message']); ?></p>
                </div>

                <?php
            }
        }
    }
     
    else if ($method === 'throw' && isset($_POST['message']) === true) {
        
        //throw messages into database
        $message = trim($_POST['message']);
        $email = trim($_POST['email']);
        //echo $method;        
            //echo $_SESSION["user_id"];
        if (empty($message) === false && empty($email) === false) {
            //throw it
            //echo $email.'  '.$message;            
            $chat->throwMessage($_SESSION["user_id"], $message, $email);
        } else {
            echo 'empty email';
        }
    }
    
//echo $_POST['email'].'<br>'.$_POST['message'];
}﻿
?>



