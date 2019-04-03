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
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/NoteCar.css" rel="stylesheet" type="text/css"/>
        <link href="css/Note_Message.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
           <div id="header"></div>
          
        <?php
        include_once '../Controller/Message_init.php';
        $messages = new Mesage_Core();
        $messages->query(" SELECT `chat`.`user_id_send`, `chat`.`user_id_rec` ,`chat`.`timestamp`,`chat`.`note_id`,`chat`.`message`,`users`.`username`,`users`.`user_id` 
FROM `chat` JOIN `users` 
WHERE `users`.`username` = (SELECT `users`.`username` from `users` WHERE `users`.`user_id` = `chat`.`user_id_rec`)
AND `chat`.`user_id_send` = '" . $_SESSION["user_id"] . "' ");
        $result = $messages->rows();



        //echo var_dump(count($result));
        //echo print_r($result);
        //echo "<head>'".print_r($result)."'</head>";        
        $rows_no = count($result);
        //echo var_dump($result);
        // echo $result[0]['note_id'];
        //echo $note_title;
        echo ' <div class="headerUI">
               <h2>Your Messages</h2>
               <hr>
           </div>';
        echo ' <div class="Comment">';
        for ($x = 0; $x < $rows_no; $x++) {
            //echo $result[$x]['note_id'];
            $ago = time_elapsed_string($result[$x]['timestamp']);
            //echo print_r($note_title);

            $NoteTitle = getNoteTitle($result[$x]['note_id']);
            
            
            ?>
            <div><?php echo '<!-- comments container -->
       
            <div class="comment_block">

            <!-- new comment -->
            <div class="new_comment">

                <!-- build comment -->
                <ul class="user_comment">

                    <!-- current #{user} avatar -->
                    <div class="user_avatar">
                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/73.jpg">
                    </div><!-- the comment body --><div class="comment_body">                        
                        <input type="hidden" name="note_id" id="note_id" value="' . $result[$x]['note_id'] . '">                        
                        <div>Sent to ' . $result[$x]['username'] . ' <a href="http://localhost/SW2_Mohamed/Controller/Note_Message.php?note_id= '.$result[$x]['note_id'].'&user_id_send='.$result[$x]['user_id_send'].'&user_id_rec='.$result[$x]['user_id_rec'].'">' . $NoteTitle . '</a></div>
                        
                        <div class="time_ago"><br><br><br>
                        <p class="ago"> ' . $ago . '<p>
                            </div>
                        <div id="Result"></div>
                    </div>

                    <!-- comments toolbar -->
                    <div class="comment_toolbar">

                        <!-- inc. date and time -->
                        <div class="comment_details">
                            <ul>
                                <li><i class="fa fa-clock-o"></i> 13:94</li>
                                <li><i class="fa fa-calendar"></i> 04/01/2015</li>
                                <li><i class="fa fa-pencil"></i> <span class="user">' . $result[$x]['username'] . '</span></li>
                            </ul>
                        </div><!-- inc. share/reply and love --><div class="comment_tools">
                            <ul>
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><i class="fa fa-reply"></i></li>
                                <li><i class="fa fa-heart love"></i></li>
                            </ul>
                        </div>

                    </div>



                </ul>

            </div>



        </ul>

    </div>
'
            
             ?></div>
            <?php
            
        }
        echo '</div>';

        function DisplayNoteMessage($username, $timestamp, $ago, $note_id, $NoteTitle) {

            ;
        }

        function getNoteTitle($NoteId) {
            $message_obj = new Mesage_Core();
            $sql = $message_obj->query("SELECT `note_title` FROM `note` WHERE `note_id` = '" . $NoteId . "' ");
            $sql_result = $message_obj->rows();
            $note_title = $sql_result[0]['note_title'];
            //$ago = time_elapsed_string($result[$x]['timestamp']);
            return $note_title;
        }

        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full)
                $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
        ?>


        <script src="js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/Message_viewnote.js" type="text/javascript"></script>
        <script src="js/header.js" type="text/javascript"></script>
    </body>
</html>
