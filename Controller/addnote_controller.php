<?php

session_start();
if(isset($_POST['submit'])){

    $note_title = $_POST['note_title'];
    $note_message = $_POST['note_message'];

    $uploadfile = '../Uploads/';
    $path = $uploadfile.date('Y-m-d H-i-s').basename($_FILES['image']['name']);

    include_once '../Model/Note.php';
    include_once '../Model/Encryption.php';
    $note = new Note();
    $encr = new Encryption();
    //if
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
    //if
    $enc = $encr->encrypte($note_message,$path);
    //
    //echo $encr->getMessage_length();
    if( $note->addNote($_SESSION['user_id'],$note_title,$enc, $encr->getMessage_length()) ){
        header("Location:../View/mynotes.php");
        exit;
    }else{
        echo'
        
        <script type="text/javascript">
         <!--
         Warn();
         function Warn() {
            alert("Failed To Add Note");
            document.location = "../View/index.php";
            //if(confirm("Failed To Add")){document.location = "../View/addnote.php";}
           // else{document.location = "../View/index.php";}
         }
         //-->
        </script>
        
        ';
        exit;
    }

}

