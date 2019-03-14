<?php
    
    session_start();
    include_once ('../Model/admin.php');

                    $a = new admin();
                    $result = $a->listadmins();

                    while($arr = mysqli_fetch_assoc($result)){

                        if(isset($_POST[$arr["admin_id"]])){
                            /////
                            if($a->deleteadmin( $arr["admin_id"] )){
                                header("Location:../View/adminListadmin.php");
                                exit;
                            }else{
                                header("Location:../View/adminListadmin.php");
                                exit;
                            }

                        }  


                    }



                    
                        