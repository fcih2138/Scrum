<?php
    
    session_start();
    include_once ('../Model/admin.php');

                    $a = new admin();
                    $result = $a->listadmins();

                    while($arr = mysqli_fetch_assoc($result)){

                        if(isset($_POST[$arr["admin_id"]])){
                            /////
                            if( $arr["privs"] == 1 ){
                                $a->privall( $arr["admin_id"] );
                                header("Location:../View/adminListadmin.php");
                                exit;
                            }else{
                                $a->privuser( $arr["admin_id"] );
                                header("Location:../View/adminListadmin.php");
                                exit;
                            }

                        }  


                    }



                    
                        