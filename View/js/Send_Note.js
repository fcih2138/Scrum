
$(document).ready(function () {
    $("#Note_Div").hide();
//      var user_id;
//        function getId(id)
//        {
//            user_id = id;
//        }
//          getId();
//    $("#user_btn").click(function () {
//            console.log(user_id);
//        });
    var id;
    $("li").click(function () {
        id = $(this).attr('id');
        console.log(id);
    });
    $("#send_note").click(function () {



        $("#Note_Div").show();


        $("#Submit").click(function () {
            var email = $("#email").val();
            var NoteId = $("#note_id").val();
            $.post("http://localhost/SW2_Mohamed/Controller/SendNote.php", {email: email, note_id: NoteId, user_id: id}, function (data) {
                console.log(NoteId);
                console.log(email);
                $("#Result").html(data);
            });
        });

    });
});

