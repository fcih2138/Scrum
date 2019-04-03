<?php

session_start();
if(isset($_POST['submit'])){

    $fname = $_POST['edit-fname'];
    $lname = $_POST['edit-lname'];
    $password = $_POST['edit-password'];
    $phone = $_POST['edit-phone'];
    $address = $_POST['edit-address'];

    include_once '../Model/user.php';
    $u = new user();
 
    if( $u->useredit( $_SESSION['user_id'] , $fname , $lname , $password , $phone , $address ) ){
        
        header("Location:../View/mynotes.php");
        exit;
    }else{
        echo'
        
        <script type="text/javascript">
         <!--
         Warn();
         function Warn() {
            alert("Failed To Edit");
            document.location = "../View/index.php";
            //if(confirm("Failed To Login")){document.location = "../View/myaccount.php";}
           // else{document.location = "../View/index.php";}
         }
         //-->
        </script>
        
        ';
        
        exit;
    }

}

