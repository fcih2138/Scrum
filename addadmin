<?php

session_start();
if(isset($_POST['submit'])){

    $email = $_POST['edit-email'];
    $password = $_POST['edit-password'];
    $privs = $_POST['privs'];

    include_once '../Model/admin.php';
    $a = new admin();
    $curr = $a->admininfo( $_SESSION['admin_id'] );
    //$arr["privs"] == 2
    if ($curr[0]['privs']==1){
        echo'
        
        <script type="text/javascript">
         <!--
         Warn();
         function Warn() {
            alert("You Dont Have Privellege To Add Admin");
            document.location = "../View/adminaddadmin.php";
            //if(confirm("Failed To Add")){document.location = "../View/adminAddadmin.php";}
           // else{document.location = "../View/index.php";}
         }
         //-->
        </script>
        
        ';
        exit;
    }
    if( $a->addadmin($email,$password,$privs) ){
        header("Location:../View/adminListadmin.php");
        exit;
    }else{
        echo'
        
        <script type="text/javascript">
         <!--
         Warn();
         function Warn() {
            alert("Failed To Add");
            document.location = "../View/adminAddadmin.php";
            //if(confirm("Failed To Add")){document.location = "../View/adminAddadmin.php";}
           // else{document.location = "../View/adminListadmin.php";}
         }
         //-->
        </script>
        
        ';
        exit;
    }

}

