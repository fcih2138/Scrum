<?php
    
    session_start();
    include_once ('../Model/Note.php');
    include_once ('../Model/Decryption.php');

                    $n = new Note();
                    $id =  $_SESSION['user_id'];
                    $result = $n->listNotes( $id );

                    while($arr = mysqli_fetch_assoc($result)){

                        if(isset($_POST[$arr["note_id"]])){
                            

                            $d = new Decryption();
                            $msg = $d->decrypte($arr["note_imageurl"], $arr["note_id"]);
                            //echo $msg;

                            echo'
        
                                <script type="text/javascript">
                                    <!--
                                            alert("'.$msg.'");
                                            document.location = "../View/mynotes.php";
                                        
                                    //-->
                                </script>
        
                            ';

                        }  


                    }



                    
                        