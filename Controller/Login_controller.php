<?php

session_start();
if(isset($_POST['submit-login']) AND $_POST['submit-login'] == "Login"){
    $username = $_POST['login-user'];
    $password = $_POST['login-password'];
    include_once '../Model/user.php';
    include_once '../Model/admin.php';
    
    $admin = new admin();
    $admin_id = $admin->Login($username,$password);
    $user = new user();
    $user_id = $user->Login($username,$password);
    
    if ($admin_id != 0){
        $_SESSION["admin_id"] = $admin_id;
        header("Location:../View/adminHome.php");
        exit;
    }else if($user_id != 0 && $user->isBlocked != "true"){
        $_SESSION["user_id"] = $user_id;
        header("Location:../View/mynotes.php");
        exit;
    }else{

        if($user_id != 0 && $user->isBlocked == "true"){
            echo'
        
                <script type="text/javascript">
                    <!--
                    Warn();
                    function Warn() {
                        alert("This Account Is Blocked");
                        document.location = "../View/index.php";
                    }
                    //-->
                </script>
        
        ';
        }
        
        
        else{
            echo'
        
                <script type="text/javascript">
                    <!--
                        Warn();
                        function Warn() {
                        alert("Failed To Login \nWrong Username Or Password");
                        document.location = "../View/index.php";
                        }
                    //-->
                </script>
        
        ';
        }

        
        exit;
    }
}  
session_end();
  
 
 