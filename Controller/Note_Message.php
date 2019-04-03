<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <head>
  
</head>

<link href="../View/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../View/css/note.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php        
        session_start();
        include_once ('../Model/Note.php');
        include_once ('../Model/Decryption.php');

        $n = new Note();
        $id = $_SESSION['user_id'];
        $result = $n->listNotes($id);

        while ($arr = mysqli_fetch_assoc($result)) {

            


                $d = new Decryption();
                $msg = $d->decrypte($arr["note_imageurl"], $arr["note_id"]);
                //echo $msg;


                echo '<section class="details-card">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="http://localhost/SW2_Mohamed/encrypted/' . $arr["note_imageurl"] . '" class="img img-responsive" alt="Cinque Terre">                        
                    </div>
                    <div class="card-desc">
                        <h3>'.$arr['note_title'].'</h3>
                        <p>' . $msg . '</p>
                             
                    </div>
                </div>
            </div>
     
        </div>
    </div>
</section>
<!-- details card section starts from here -->';

//                echo '<div class="container">
//  <div class="Image">
//    <img src="http://localhost/SW2_Mohamed/encrypted/' . $arr["note_imageurl"] . '" class="img img-responsive" alt="Cinque Terre">
//  </div>
//  <div class="Message">
//    <p>"' . $msg . '"</p>
//  </div>
//  
//  
//   
//</div>';
                



//                            echo'
//        
//                                <script type="text/javascript">
//                                    <!--
//                                            alert("'.$msg.'");
//                                            document.location = "../View/mynotes.php";
//                                        
//                                    //-->
//                                </script>
//        
//                            ';
            }
        
        ?>        
        <script src="../View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="../View/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
