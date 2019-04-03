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
  <base href="http://localhost/SW2_Mohamed/" target="_blank">
</head>
        <link href="http://localhost/SW2_Mohamed/View/css/note.css" rel="stylesheet" type="text/css"/>
        <link href="http://localhost/SW2_Mohamed/View/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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

            if (isset($_POST[$arr["note_id"]])) {


                $d = new Decryption();
                $msg = $d->decrypte($arr["note_imageurl"], $arr["note_id"]);
                //echo $msg;




                echo '<div class="container">
  <div class="Image">
    <img src="http://localhost/SW2_Mohamed/encrypted/' . $arr["note_imageurl"] . '" class="img img-responsive" alt="Cinque Terre">
  </div>
  <div class="Message">
    <p>"' . $msg . '"</p>
  </div>
  <input type="hidden" name="note_id" id="note_id" value="'.$arr["note_id"].'">
  <button class="btn btn-success" id="send_note">Send Note To user</button>
  <a href="http://localhost/SW2_Mohamed/View/mynotes.php">Go Back</a>
  
    <div id="Note_Div">
    <input type="text" class="email" name="email" id="email">
            <input type="hidden"  class="note" name="note" id="note" value="'.$arr["note_id"].'">
            <Button id="Submit" class="btn btn-primary">Submit</Button>
            
</div>

<div id="Result"></div>
</div>';
                



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
        }
        ?>        
        <script src="http://localhost/SW2_Mohamed/View/js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="http://localhost/SW2_Mohamed/View/js/Send_Note.js" type="text/javascript"></script>
    </body>
</html>
