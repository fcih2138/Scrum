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
    include '../Model/Meesage_Core.php';
    $Note_message = new Mesage_Core();

    $n = new Note();
    $id = $_SESSION['user_id'];

    $sql = "SELECT * , note.note_imageurl,note.note_title, note.note_id from chat join note WHERE chat.user_id_send = '" . $_REQUEST['user_id_send'] . "' and chat.user_id_rec = '" . $_REQUEST['user_id_rec'] . "' and chat.note_id = '" . $_REQUEST["note_id"] . "' and chat.note_id = note.note_id";

    $message_obj = new Mesage_Core();
    $message_obj->query($sql);
    $result = $message_obj->rows();


    $d = new Decryption();
    $msg = $d->decrypte($result[0]["note_imageurl"], $_REQUEST["note_id"]);
    $imgurl = $result[0]["note_imageurl"];
?>
    <div id="header"></div>
  <?php  
    echo '<section class="details-card">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="http://localhost/SW2_Mohamed/encrypted/' . $imgurl . '" class="img img-responsive" alt="Cinque Terre">                        
                    </div>
                    <div class="card-desc">
                        <h3>' . $result[0]["note_title"] . '</h3>
                        <p>' . $msg . '</p>
                             
                    </div>
                </div>
            </div>
     
        </div>
    </div>
</section>
<!-- details card section starts from here -->';
    ?>        
    <script src="../View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
    <script src="../View/js/bootstrap.min.js" type="text/javascript"></script>
    
</body>
</html>