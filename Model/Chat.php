<?php

//session_start();

class Chat extends Mesage_Core {

    public function fetchMessages() {

        $this->query(" SELECT `chat`.`user_id_send`, `chat`.`user_id_rec` ,`chat`.`message`,`users`.`username`,`users`.`user_id` 
FROM `chat` JOIN `users` 
WHERE `users`.`username` = (SELECT `users`.`username` from `users` WHERE `users`.`user_id` = `chat`.`user_id_send`)
AND `chat`.`user_id_rec` = '" . $_SESSION["user_id"] . "' ");
        //return $this->rows();
        //$this->query("SELECT  `username` FROM `users` WHERE `user_id` = 1");
        return $this->rows();
    }

    public function throwMessage($user_id, $message = null, $note_id, $email) {
//insert into db
        $sql = "SELECT `users`.`user_id` FROM  `users` WHERE  `users`.`user_email` = '" . $email . "'";
        //$sql .= stripslashes($sql);        
        $query = $this->query($sql);

//        include_once 'select.php';
//        $sedata = new select("user_id","users","user_email = '".$email."'");
//        $data = $sedata->getuserRecord();
//        $arr = mysqli_fetch_assoc($data);
//        $user_id_rec = (int)$arr['user_id'];
        $arr = $this->rows();
//        echo print_r($arr[0]).'<br>';
//        echo var_dump($arr[0]['user_id']);
//        $user_id_rec = $arr;
//        echo $arr[0]['user_id'];
//        
        $user_id_rec = $arr[0]['user_id'];
        //echo "<script> console.log($email);</script>" ;
        //$user_id_rec = $this->rows();
        //echo $user_id_rec. ' '. $user_id, ' '. $email. ' '. $message;
        //echo "<script> console.log($user_id_rec);</script>";     
//  include_once 'Add.php';
//  $coloum = "`message_id`, `user_id_send`, `user_id_rec`, `message`, `timestamp`";
//        $data = "'" .(int)$user_id . "','".$user_id_rec."','".$this->db->real_escape_string(htmlentities($message))."','UNIX_TIMESTAMP()'";        
//        $insert = new Add( $coloum , $data , `chat`);

        if ($this->query("
   INSERT INTO `chat` (`user_id_send`,`user_id_rec`,`message`,`note_id`,`timestamp`)
   VALUES (" . (int) $user_id . ",'" . $user_id_rec . "',' " . $this->db->real_escape_string(htmlentities($message)) . "','" . $note_id . "',CURRENT_TIMESTAMP)")) {
            return TRUE;
        }else{
            return FALSE;
        }



//          if($insert === TRUE)
//        {              
//            echo '<script>console.log("'.$user_id_rec.'"); console.log("good query");</script>';            
//        }else{
//            echo '<script>console.log("bad query"); </script>';
//        }
        //put your code here
    }

}

//$this->query("
//   INSERT INTO `chat` (`user_id`,`message`,`timestamp`)
//   VALUES (". (int)$user_id .",'". $this->db->real_escape_string(htmlentities($message)) ."', UNIX_TIMESTAMP())
//  ");
?>