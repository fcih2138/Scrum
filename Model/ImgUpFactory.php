<?php


/**
 * Description of ImgUpFactory
 *
 * @author Mohamed Adel
 */
class ImgUpFactory {
    
    public function  getUpload($upload_type, $path = null, $file_name = null, $image_url = null) {
        
        if(strtolower($upload_type) == "gallery")
        {
            return new Gallery($image_url);
        }else if(strtolower($upload_type) == "desktop")
        {
            return new DesktopImage($file_name, $path);
        }else{
            return NULL;
        }
    }
}

