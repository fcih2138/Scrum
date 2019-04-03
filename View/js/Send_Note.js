
$(document).ready(function(){
    $("#Note_Div").hide();
    $("#send_note").click(function () {
    
        $("#Note_Div").show();
          
    
    
    $("#Submit").click(function (){
        var email = $("#email").val();
        var NoteId = $("#note_id").val();  
        $.post("http://localhost/SW2_Mohamed/Controller/SendNote.php", {email:email,note_id: NoteId}, function (data) {
        console.log(NoteId);
        console.log(email);
        $("#Result").html(data);
    });
    });
    
});
});

