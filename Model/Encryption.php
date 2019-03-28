<?php

require_once (realpath(dirname(__FILE__) .'/encryption_utilities.php')) ;
class Encryption {

    private $message_length;

    public function encrypte($message, $image) {

        $message_to_hide = $message;
        $binary_message = toBin($message_to_hide);
        $this->message_length = strlen($binary_message);
        $src = $image;
        $im = imagecreatefromjpeg($src);

        for($x=0;$x<$this->message_length;$x++){
            $y = $x;
            $rgb = imagecolorat($im,$x,$y);
            $r = ($rgb >>16) & 0xFF;
            $g = ($rgb >>8) & 0xFF;
            $b = $rgb & 0xFF;
            
            $newR = $r;
            $newG = $g;
            $newB = toBin($b);
            $newB[strlen($newB)-1] = $binary_message[$x];
            $newB = toString($newB);
            
            $new_color = imagecolorallocate($im,$newR,$newG,$newB);
            imagesetpixel($im,$x,$y,$new_color);
        }
        
        $new_image = '../encrypted/'.date('Y-m-d H-i-s').'.png';
        imagepng($im,$new_image);
        imagedestroy($im);
        return $new_image;
    }
    public function getMessage_length() {
        return intval($this->message_length);
    }

}
