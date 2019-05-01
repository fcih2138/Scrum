<?php

session_start();

   include_once '../Model/ImageUpload.php';
        include_once '../Model/ImgUpFactory.php';
        include_once '../Model/DesktopImage.php';
        include_once '../Model/Gallery.php';

//echo 'temp: '.$_FILES['file']['name'];
//echo 'file Name: ' . $_FILES['file']['name'];
//echo 'temp: ' . $_FILES['file']['tmp_name'];
//$lock = "";
//if(isset($_POST['lock']))
//{
//    $lock = $_POST['lock'];
//}else{
//    $lock = "0";
//}
//if(isset($_POST['']))

function upload() {
    if (isset($_FILES['file']['name'])) {
        //echo $_FILES['file']['name'].'<br>'.$_FILES['file']['tmp_name'];
        $file_Name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $uploadfile = '../Uploads/';
        $path = $uploadfile . date('Y-m-d H-i-s') . basename($file_Name);
        $file_name = $temp;
        //$file_name = $_POST['fd'];
        $upload_type = "desktop";

     

        $ImageFactory = new ImgUpFactory();

        $desktopUp = $ImageFactory->getUpload($upload_type, $path, $temp);
        $desktopUp->uploadImage();
        //echo 'path:-' . $path;
        $_SESSION['path'] = $path;
    }

    return $_SESSION['path'];
}

function pickGallery() {

//        $url = $_POST['img_url'];
//
//        $file_source = '../Wallpaper/';
//        $path = $file_source . basename($url);
    //if

    $ImageFactory = new ImgUpFactory();

    $upload_type = "gallery";
    $url = $_POST['img_url'];

    $file_source = '../Wallpaper/';
    $path = $file_source . basename($url);

    //$img_url = trim("http://localhost/SW2_Mohamed/Wallpaper/$url",'"');

    echo 'Url: ' . $path;
    $galleryUp = $ImageFactory->getUpload($upload_type, NULL, NULL, $path);
    $galleryUp->uploadImage($path);

    $_SESSION['path'] = $path;
}

if (isset($_POST['gallery'])) {
    $source = $_POST['gallery'];
    if ($source == "2") {
        pickGallery();
    }
} else {
    if (!isset($Path)) {
        $Path = upload();
    }
}

function Note() {
    if (isset($_POST['note_title'])) {
        include_once '../Model/Note.php';
        include_once '../Model/Encryption.php';

        $note_title = $_POST['note_title'];
        $note_message = $_POST['note_message'];
        //echo 'path:-'. $path;
        $encr = new Encryption();
        $note = new Note();
        $enc = $encr->encrypte($note_message, $_SESSION['path']);
        if ($note->addNote($_SESSION['user_id'], $note_title, $enc, $encr->getMessage_length())) {
            echo '<p class="success">Note Added Successfully</p>';
        } else {
            echo 'failed';
        }
    }
}

Note();

// if(!isset($path))
// {
//    $path = ""; 
// }
// echo 'lock: '.$lock;
// if (isset($_FILES['file']['name']) && $lock == "0") {
//     //echo $_FILES['file']['name'].'<br>'.$_FILES['file']['tmp_name'];
//     $file_Name = $_FILES['file']['name'];
//     $temp = $_FILES['file']['tmp_name'];
//     $uploadfile = '../Uploads/';
//     $path = $uploadfile . date('Y-m-d H-i-s') . basename($file_Name);
//     $file_name = $temp;
// //$file_name = $_POST['fd'];
//     $upload_type = "desktop";
//     include_once '../Model/Note.php';
//     include_once '../Model/Encryption.php';
//     include_once '../Model/ImageUpload.php';
//     include_once '../Model/ImgUpFactory.php';
//     include_once '../Model/DesktopImage.php';
//     include_once '../Model/Gallery.php';
//     $ImageFactory = new ImgUpFactory();
//     $desktopUp = $ImageFactory->getUpload($upload_type, $path, $temp);
//     $desktopUp->uploadImage();
//      echo 'path:-'. $path;
// }
//  echo 'path:-'. $path;
//  if (isset($_POST['note_title']) && $lock == "1") {
//         $note_title = $_POST['note_title'];
//         $note_message = $_POST['note_message'];
//         echo 'path:-'. $path;
//        $enc = $encr->encrypte($note_message, $path);
//        if ($note->addNote($_SESSION['user_id'], $note_title, $enc, $encr->getMessage_length())) {
//            echo '<p class="success">Note Added Successfully</p>';
//        } else {
//            echo 'failed';
//        }
//     }
//if (isset($_FILES['file']['name'])) {
//    $file_Name = $_FILES['file']['name'];
//    $temp = $_FILES['file']['tmp_name'];
//    $uploadfile = '../Uploads/';
//    $path = $uploadfile . date('Y-m-d H-i-s') . basename($file_Name);
//    $file_name = $temp;
////$file_name = $_POST['fd'];
//    $upload_type = "desktop";
//
//
//
//// echo 'temp: '.$_FILES['file']['tmp_name'];
////echo 'file Name: '.$file_Name;
////echo 'file Name: ' . $file_Name;
////echo 'temp: ' . $temp;
//
//    include_once '../Model/Note.php';
//    include_once '../Model/Encryption.php';
//    include_once '../Model/ImageUpload.php';
//    include_once '../Model/ImgUpFactory.php';
//    include_once '../Model/DesktopImage.php';
//    include_once '../Model/Gallery.php';
//
//    $ImageFactory = new ImgUpFactory();
//
//    $desktopUp = $ImageFactory->getUpload($upload_type, $path, $temp);
//    $desktopUp->uploadImage();
//}
//$encr = new Encryption();
//$flag = "";
//
//
//
//if (isset($_POST['note_title'])) {
//    $note_title = $_POST['note_title'];
//    $note_message = $_POST['note_message'];
//    $enc = $encr->encrypte($note_message, $path);
//    if ($note->addNote($_SESSION['user_id'], $note_title, $enc, $encr->getMessage_length())) {
//        $flag = "1";
//    } else {
//        $flag = "0";
//    }
//}
//
//
//
//
//if ($flag == "1") {
//    echo '<p class="success">Note Added Successfully</p>';
//    header("http://localhost/SW2_Mohamed/View/mynotes.php");
//    exit;
//}
//if (isset($_POST['gallery'])) {
//
//
//    $note_title = $_POST['note_title'];
//    $note_message = $_POST['note_message'];
//    $source = $_POST['gallery'];
//
//
//
//    include_once '../Model/Note.php';
//    include_once '../Model/Encryption.php';
//    include_once '../Model/ImageUpload.php';
//    include_once '../Model/ImgUpFactory.php';
//    include_once '../Model/DesktopImage.php';
//    include_once '../Model/Gallery.php';
//
//    $note = new Note();
//    $encr = new Encryption();
//
//    $flag = "";
//    //if
//
//    $ImageFactory = new ImgUpFactory();
//    if ($source == "1") {
//        $uploadfile = '../Uploads/';
//
//        $path = $uploadfile . date('Y-m-d H-i-s') . basename($_FILES['file']['name']);
//        $file_name = $_FILES['file']['tmp_name'];
//        //$file_name = $_POST['fd'];
//        $upload_type = "desktop";
//
//        // echo 'temp: '.$_FILES['file']['tmp_name'];
//        //echo 'file Name: '.$file_Name;
//        echo 'file Name: ' .$file_Name;
//        echo 'temp: ' . $temp;
//
//        $desktopUp = $ImageFactory->getUpload($upload_type, $path, $file_name);
//        $desktopUp->uploadImage();
//        //$enc = $encr->encrypte($note_message, $path);
////        if ($note->addNote($_SESSION['user_id'], $note_title, $enc, $encr->getMessage_length())) {
////            $flag = "1";
////        } else {
////            $flag = "0";
////        }
//    } else if ($source == "2") {
//        $upload_type = "gallery";
//        $url = $_POST['img_url'];
//
//        $file_source = '../Wallpaper/';
//        $path = $file_source . basename($url);
//
//        //$img_url = trim("http://localhost/SW2_Mohamed/Wallpaper/$url",'"');
//
//        echo 'Url: ' . $path;
//        $galleryUp = $ImageFactory->getUpload($upload_type, NULL, NULL, $path);
//        $galleryUp->uploadImage($path);
//        $enc = $encr->encrypte($note_message, $path);
//        if ($note->addNote($_SESSION['user_id'], $note_title, $enc, $encr->getMessage_length())) {
//            $flag = "1";
//        } else {
//            $flag = "0";
//        }
//    }
//
//
////    $desktopUp = $ImageFactory->getUpload($upload_type, $path, $file_name);
////    $desktopUp->uploadImage();
//    //move_uploaded_file($_FILES['image']['tmp_name'],$path);
//    //if
//    //$enc = $encr->encrypte($note_message, $path);
//    //$e
//    //
//    //echo $encr->getMessage_length();
//    if ($flag == "1") {
//        echo '<p class="success">Note Added Successfully</p>';
//        header("http://localhost/SW2_Mohamed/View/mynotes.php");
//        exit;
//    } else if ($flag == "0") {
//        echo'
//        
//        <script type="text/javascript">
//         <!--
//         Warn();
//         function Warn() {
//            alert("Failed To Add Note");
//            document.location = "../View/index.php";
//            //if(confirm("Failed To Add")){document.location = "../View/addnote.php";}
//           // else{document.location = "../View/index.php";}
//         }
//         //-->
//        </script>
//        
//        ';
//        exit;
//    }
//}
//

    