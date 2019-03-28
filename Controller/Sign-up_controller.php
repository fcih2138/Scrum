<?php


session_start();
if(isset($_POST['submit-sign-up']) AND $_POST['submit-sign-up'] == "Sign Up")
{
	$fname    = $_POST['sign-fname'];
    $lname    = $_POST['sign-lname'];
    $email    = $_POST['sign-email'];
    $psw      = $_POST['sign-password'];
    $phone    = $_POST['sign-phone'];
    $address  = $_POST['sign-address'];
    include_once '../Model/user.php';
    $user = new user();
    $user_id = $user->Sign_up($email,$fname,$lname,$psw,$phone,$address);
    if( $user_id != 0 ){
        $_SESSION["user_id"] = $user_id;
        header("Location:../View/mynotes.php");
        exit;
    }else{
        echo'
        
        <script type="text/javascript">
         <!--
         Warn();
         function Warn() {
            alert("Failed To Register");
            document.location = "../View/index.php";
            //if(confirm("Failed To Login")){document.location = "../View/index.php";}
           // else{document.location = "../View/index.php";}
         }
         //-->
        </script>
        
        ';
        exit;
    }
              			   	
}     
    	
 
