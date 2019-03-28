<?php

require_once (realpath(dirname(__FILE__) .'/encryption_utilities.php')) ;

class Decryption {
    private $message_length;
    private $encryption;
    public $real_message;

    function getReal_message() {
        return $this->real_message;
    }

    public function decrypte($image, $id) {
        $src = $image;

        $connection = mysqli_connect("localhost", "root", "");
        mysqli_select_db($connection , "mynotes");
        $sql = 'select message_length from note where note_id = "'.$id.'"';
        $query = mysqli_query($connection, $sql);
       $row = $query->fetch_assoc();
       $this->message_length =  $row['message_length'];
        
        $im = imagecreatefrompng($src);
        $this->real_message = '';



        for ($x = 0; $x < $this->message_length; $x++) {
            $y = $x;
            $rgb = imagecolorat($im, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            $blue = toBin($b);
            $this->real_message .= $blue[strlen($blue) - 1];
        }
        $this->real_message = toString($this->real_message);

        return $this->real_message;


        
    }

}
