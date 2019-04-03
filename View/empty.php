<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/NoteCar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <!-- comments container -->
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
                        <div>' . $result[$x]['username'] . ' Sent <a href="http://localhost/SW2_Mohamed/Controller/Note_Message.php">' . $NoteTitle . '</a></div>
            
                        <p> ' . $result[$x]['timestamp'] . '<p>
                        <p> ' . $ago . '<p>
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

        </div>
        <script src="js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
