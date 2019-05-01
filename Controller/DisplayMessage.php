<?php
session_start();
include '../Model/ChatRoom.php';


if (isset($_POST['UserId_Rec']) && isset($_SESSION['user_id'])) {
    $chat_obj = new ChatRoom();
    $chat_obj->setChatUserId_Send($_POST['UserId_Rec']);

    $chat_obj->setChatUserId_Rec($_SESSION['user_id']);
    $messages = $chat_obj->DisplayMessage();
    
    include_once '../Model/Meesage_Core.php';
    $sender_avatar = new Mesage_Core();
    $sql = "select * from users where `user_id` = '" . $_SESSION['user_id'] . "'";
    $sender_avatar->query($sql);
    $result_send = $sender_avatar->rows();
    
    $rec_avatar = new Mesage_Core();
    $rec_sql = "select * from users where `user_id` = '" . $_POST['UserId_Rec'] . "'";
    $rec_avatar->query($rec_sql);
    $result_reciever = $rec_avatar->rows();

//echo $_SESSION['user_id'];
//echo 'Request:- '.$_POST['UserId_Rec'];
    if (empty($messages) === true) {
        echo 'There are currently no messages in the chat';
    } else {
        foreach ($messages as $message) {
            ?>
            <div class="message">
                <?php
                if ($message['UserId_Send'] == $_SESSION['user_id']) {
                    ?>
                    <div class="message_text me">
                        <img src="<?php echo $result_send[0]['avatar'];?>" width="50" height="50">
                <!--                        <a href="#" class="right"><?php echo $message['username']; ?></a> -->
                        <p class="right"><?php echo nl2br($message['ChatMessage']); ?></p>
                    </div>

                    <?php
                } else {
                    ?>
                    <div class="message_text friend">
                        <img src="<?php echo $result_reciever[0]['avatar'];?>" width="50" height="50">
                <!--                        <a href="#" class="left"><?php echo $message['username']; ?></a> -->
                        <p class="left"><?php echo nl2br($message['ChatMessage']); ?></p>
                    </div>

                    <?php
                }
                ?>

            </div>
            <?php
        }
    }
}
?>



