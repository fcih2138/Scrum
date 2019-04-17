<?php
    
    session_start();
    include_once ('../Model/user.php');

                    $u = new user();
                    $result = $u->listusers();

                    while($arr = mysqli_fetch_assoc($result)){

                        if(isset($_POST[$arr["user_id"]])){
                            /////
                            if($u->deleteuser( $arr["user_id"] )){
                                header("Location:../View/adminListuser.php");
                                exit;
                            }else{
                                header("Location:../View/adminListuser.php");
                                exit;
                            }

                        }  


                    }



                    
                        