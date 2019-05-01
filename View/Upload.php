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
    </head>
    <body>
        <div class="form-group" id="img-upload">
            <input type="file" id="file"  class ="form-control-file"  name="file" class="b0tn"/>
        </div>
        <button class="btn btn-default" id="upload" name="upload">Send</button>
        <div id="Data"></div>
        <input type="hidden" name="id" id="name" value="2015">
        <script src="js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>

            var formdata = new FormData();
            $(document).ready(function () {


                $("#file").change(function () {
                    var file = $('#file')[0].files[0];

                    $.each($('#file')[0].files, function (i, file) {
                        formdata.append('file', file);
                    });
                });

                $("#upload").click(function () {
                    var id = $("#name").val();

                    var result1;
                    var result2;

                    $.ajax({
                        url: "http://localhost/SW2_Mohamed/Controller/test.php",
                        cache: false,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: formdata,
                        success: function (response) {
                            result1 = response;
                            $.post("http://localhost/SW2_Mohamed/Controller/test.php", {id: id}, function (res) {
                                console.log(res);
                                result2 = res;
                                $("#Data").html(result1 + "<br>" + result2);
                                console.log(result1);
                                console.log(result2);
                            });

                        }
                    });



                });



            });
        </script>
    </body>
</html>
