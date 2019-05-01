<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gallery
 *
 * @author Mohamed Adel
 */
class Gallery implements ImageUpload {

    public $image_url;

    function __construct($image_url) {
        $this->image_url = $image_url;
    }

    public function uploadImage() {
//        require './Meesage_Core.php';
//        $obj = new Mesage_Core();
//        $sql = 
//        $obj->query($sql);
        
    }

}
