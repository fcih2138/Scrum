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

    $sql = "SELECT * from chat WHERE user_id_send = 3 and user_id_rec = 1 and note_id = 2";
    $result = $n->listNotes($id);

    //echo 'Hello';
//echo $_REQUEST["note_id"];
    while ($arr = mysqli_fetch_assoc($result)) {

        if (isset($_REQUEST["note_id"])) {
            
            echo $_REQUEST["note_id"];
            echo $_REQUEST['user_id_send'];
            echo $_REQUEST['user_id_rec'];;

            $d = new Decryption();
            $msg = $d->decrypte($arr["note_imageurl"], $_REQUEST["note_id"]);
            //echo $msg;




            echo '<div class="container">
  <div class="Image">
    <img src="http://localhost/SW2_Mohamed/encrypted/' . $arr["note_imageurl"] . '" class="img img-responsive" alt="Cinque Terre">
  </div>
  <div class="Message">
    <p>"' . $msg . '"</p>
  </div>';
        }
        }
  
  

            ?>        
    <script src="../View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
    <script src="../View/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>