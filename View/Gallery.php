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
        <link href="css/gallery.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include_once '../Controller/Message_init.php';
        $messages = new Mesage_Core();
        $messages->query("SELECT `img_url` FROM `gallery` WHERE 1");
        $result = $messages->rows();

        $rows_no = count($result);

//        <div class="container">
//            <select class="image-picker">
//                
//                    
//                </optgroup>
//                <option data-img-src =<></option>
//            </select>
//        </div>
//        echo '  <div class="container">
//            <select class="image-picker"><optgroup>';
//
//        for ($x = 0; $x < $rows_no; $x++) {
//            echo '<option data-img-src ="http://localhost/SW2_Mohamed/Wallpaper/' . $result[$x]['img_url'] . '"</option>';
//        }
//        echo '<optgroup></select></div>';


        echo '<div class="gallery"> <div class="row">';
        for ($x = 0; $x < $rows_no; $x++) {
            //echo '<img src="http://localhost/SW2_Mohamed/Wallpaper/' . $result[$x]['img_url'] . '" class="img img-responsive" alt="Cinque Terre">';

            echo'
                <div class="col-md-3">
                <figure>
                    <img src="http://localhost/SW2_Mohamed/Wallpaper/' . $result[$x]['img_url'] . '" alt="" class="img-thumbnail image" id="' . $result[$x]['img_url'] . '" />
                    <figcaption>Daytona Beach <small>United States</small></figcaption>
                </figure>
                 </div>

           ';
        }
        echo '  </div></div>';
        ?>

        <p id="URL"></p>
        <!--        <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            
                        </div>
                    </div>
                </div>-->
        
        <script src="js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="js/image-picker.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
//            $(".image-picker").imagepicker(alert("hello"));
            $("img").click(function () {
                //$("img").removeClass('clickImg');
                $("img").css('background','white');
                $(this).css('background','gold');
                var img_url = this.id;
                
                //console.log(img_url);
                document.getElementById("URL").innerHTML = img_url;
                $("#URL").hide();
//                $.post("http://localhost/SW2_Mohamed/View/addnote.php", {ImgUrl: img_url}, function () {
//                    console.log(img_url);
//                });

            });
        </script>
    </body>
</html>
