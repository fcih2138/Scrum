//$("#Note_link").click(function(){
//    //alert("sdfsd");
//    var note_id = $("#note_id").val();
//    console.log(note_id);
//    if (this.readyState === 4 && this.status === 200) {
//                console.log(this.responseText); 
//            }
//    
//    if (window.XMLHttpRequest) {
//        // code for IE7+, Firefox, Chrome, Opera, Safari
//        xmlhttp = new XMLHttpRequest();
//    } else {
//        // code for IE6, IE5
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    xmlhttp.open("GET", "http://localhost/SW2_Mohamed/Controller/Note_Message.php?note_id=" + note_id, true);
//    xmlhttp.send();
//});
//
////function Note()
////{
////
////    var note_id = $("#note_id").val();
////    if (window.XMLHttpRequest) {
////        // code for IE7+, Firefox, Chrome, Opera, Safari
////        xmlhttp = new XMLHttpRequest();
////    } else {
////        // code for IE6, IE5
////        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
////    }
////    xmlhttp.open("GET", "http://localhost/SW2_Mohamed/Controller/Note_Message.php?note_id=" + note_id, true);
////    xmlhttp.send();
////}
////
////
//////$("#Note_link").on('click', function(event){
////        event.preventDefault();
////        var noteid = $("#note_id").val();
////        alert("Hello");
////    console.log(noteid);
////});
//
////function Note()
////{
////    //alert("Hello");
////     var noteid = $("#note_id").val();
//////        alert("Hello");
////         $.post("http://localhost/SW2_Mohamed/Controller/Note_Message.php", {noteid:noteid}, function (data) {
////        $("#Result").html(data);
////        
////         });
////    //console.log(noteid);
////}
//
////$("#Note_link").click(function () {
////    var noteid = $("#note_id").val();
////    console.log(noteid);
////    $.post("http://localhost/SW2_Mohamed/Controller/Note_Message.php", {noteid: noteid}, function (data) {
////        $("#Result").html(data);
////        //console.log(data);
////    });
////});
//
////$("#displayNote").click(function(){
////    alert("hello");
////    var noteid = $("#note_id").val();
////    console.log(noteid);
////    
////    $.post("http://localhost/SW2_Mohamed/Controller/Note_Message.php", {noteid:noteid}, function (data) {
////        //$("#Result").html(data);
////        
////         });
////    
////});
//
//
