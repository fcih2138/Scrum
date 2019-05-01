<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DesktopImage
 *
 * @author Mohamed Adel
 */
class DesktopImage implements ImageUpload{
    public $path;
    public $file_name;

    function __construct($file_name, $path) {
        $this->path = $path;
        $this->file_name = $file_name;
    }

    public function uploadImage() {
        move_uploaded_file($this->file_name, $this->path);
        
    }

}
