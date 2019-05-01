<?php

/**
 * Description of ChatRoom
 *
 * @author demo2
 */
class ChatRoom {

    private $ChatId;
    private $ChatText;
    private $ChatUserId_Send;
    private $ChatUserId_Rec;
    
    function __construct() {
        
    }

    public function InsertMessage() {
        include '../Model/Meesage_Core.php';
//        $this->query("
//   INSERT INTO `chat` (`user_id_send`,`user_id_rec`,`message`,`note_id`,`timestamp`)
//   VALUES (". (int)$user_id .",'". $user_id_rec."',' ".$this->db->real_escape_string(htmlentities($message))."','".$note_id."',CURRENT_TIMESTAMP)");
        $sql = "INSERT INTO `chatroom`(`UserId_Send`, `ChatMessage`, `userId_Rec`) VALUES ('".$this->getChatUserId_Send()."','".$this->getChatText()."','".$this->getChatUserId_Rec()."');";
        //$sql = "INSERT INTO `chatroom`(`ChatUserId`, `ChatMessage`) VALUES ('" . $this->getChatUserId() . "','" . $this->getChatText() . "')";
        $chat_obj = new Mesage_Core();
        $chat_obj->query($sql);
    }

    public function DisplayMessage() {
        //session_start();
        require_once ('../Model/Meesage_Core.php');
        $rec_id = $this->getChatUserId_Rec();
        $send_id = $this->getChatUserId_Send();
        $sql = "SELECT * FROM chatroom JOIN users WHERE userId_Rec  in('".$rec_id."','".$send_id."') and UserId_Send in ('".$send_id."','".$rec_id."') and users.username = (SELECT users.username FROM users WHERE users.user_id = UserId_Send)";
//        $sql = " SELECT `chatroom`.`UserId_Send`,`chatroom`.`userId_Rec`,`chatroom`.`ChatMessage`,`users`.`username`,`users`.`user_id` 
//                FROM `chatroom` JOIN `users`
//                WHERE `users`.`username` = (SELECT `users`.`username` FROM `users` WHERE `users`.`user_id` = `chatroom`.`UserId_Send`)
//                AND `chatroom`.`userId_Rec` = '".$_SESSION["user_id"]."' AND";
        //$sql = "SELECT * FROM `chatroom` join `users` ON `chatroom`.`ChatUserId` = `users`.`user_id` ORDER BY `ChatId`;";
        $messages = new Mesage_Core();
        $messages->query($sql);
        //$messages->rows();

        return $messages->rows();
    }

    function setChatId($ChatId) {
        $this->ChatId = $ChatId;
    }
    function setChatUserId_Send($ChatUserId_Send) {
        $this->ChatUserId_Send = $ChatUserId_Send;
    }

    function setChatUserId_Rec($ChatUserId_Rec) {
        $this->ChatUserId_Rec = $ChatUserId_Rec;
    }

        function setChatText($ChatText) {
        $this->ChatText = $ChatText;
    }

    function setChatUserId($ChatUserId) {
        $this->ChatUserId = $ChatUserId;
    }

    function getChatUserId_Send() {
        return $this->ChatUserId_Send;
    }

    function getChatUserId_Rec() {
        return $this->ChatUserId_Rec;
    }

        function getChatId() {
        return $this->ChatId;
    }

    function getChatText() {
        return $this->ChatText;
    }

    function getChatUserId() {
        return $this->ChatUserId;
    }

}
