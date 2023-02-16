
$(document).ready(function() { 
    $("#submit").click(function() { 
     var name = $("#name").val(); 
     var email = $("#email").val(); 
     var password = $("#password").val(); 
    
     $.ajax({ 
      url: "/php/register.php", 
      type: "POST", 
      data: { name: name, email: email, password: password }, 
      success: function(response) { 
       $("#response").html(response); 
      } 
     }); 
    }); 
   });