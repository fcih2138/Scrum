var chat = {}  //global object

chat.fetchMessages = function(){
    $.post('../Controller/chat.php', {method: 'fetch'},function(data){
        $('.chat .messages').html(data);
    });
 $.ajax({
  url: '../Controller/chat.php',
  type: 'POST',
  data: {method: 'fetch'},
  success: function(data){
   $('.chat .messages').html(data);
  }
 });
}
chat.throwMessage = function (message, email){
 if ($.trim(message).length != 0){
     $.post('http://localhost/SW2_Mohamed/Controller/chat.php', {method: 'throw',email: email,message: message},function(data){
           //console.log(email);     
       //console.log(message); 
       //../Controller/chat.php
       $("#email").val('');
       $("#messages").html(data);
     });
//  $.ajax({
//   url: '../Controller/chat.php',
//   type: 'POST',
//   data: {method: 'throw', message: message, email: email},
//   success: function(){
//       console.log(email);     
//       console.log(message);     
//    //chat.fetchMessages();
//   //$(".entry").val('');
//   },
//   fail: function()
//   {        
//        console.log('bad one');
//   }
//  });
 }
}





//var Message, Email, flag;
//chat.entry = $('.chat .entry');
//chat.entry.bind('keydown', function(e){
// if (e.keyCode===13 && e.shiftKey===false) {
//  //throw message
//  Message = $(this).val();
//  flag = 1;
//  e.preventDefault();
// }
//});

//chat.email = $('.chat .email');
//chat.email.bind('keydown', function(e){
// if (e.keyCode===13 && e.shiftKey===false) {
//  //throw message
//  Email = $(".email").val(); 
//  e.preventDefault();
// }
//});
//console.log(Email);
//if(flag === 1)
//{
//    console.log(Email);
//    chat.throwMessage(Message, Email);
//}

$('#btn').click(function (){
    var email = $("#email").val();
    var message = $("#message").val();
    var note = $("#note").val();
   chat.throwMessage(message, email);    
});



//chat.interval=setInterval(chat.fetchMessages, 3000);
chat.fetchMessages();

