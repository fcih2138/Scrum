<?php

session_start();
include_once '../Model/ChatRoom.php';
if (isset($_POST['chat_text'])) {

    $chat = new ChatRoom();
    $chat->setChatUserId_Send($_SESSION['user_id']);
    $chat->setChatUserId_Rec($_POST['UserId_Rec']);
    //echo $_SESSION['user_id'];
    $chat->setChatText($_POST['chat_text']);
    //$id = $chat->getChatUserId();

    //echo $_POST['UserId_Rec'];

    $chat->InsertMessage();
    //echo $id;

}
?>

