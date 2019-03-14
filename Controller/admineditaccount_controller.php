<?php

session_start();
if(isset($_POST['submit'])){

    $email = $_POST['edit-email'];
    $password = $_POST['edit-password'];

    include_once '../Model/admin.php';
    $a = new admin();
 
    if( $a->adminedit( $_SESSION['admin_id'] , $email , $password  ) ){
        
        header("Location:../View/adminHome.php");
        exit;
    }else{
        echo'
        
        <script type="text/javascript">
         <!--
         Warn();
         function Warn() {
            alert("Failed To Edit");
            document.location = "../View/index.php";
            //if(confirm("Failed To Login")){document.location = "../View/adminEditaccount.php";}
           // else{document.location = "../View/index.php";}
         }
         //-->
        </script>
        
        ';
        exit;
    }

}

