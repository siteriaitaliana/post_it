 $(document).ready(function(){
 

 	
   $('#post_content').Keyup(function(){
    var iddi = $('.iddi').val();
   
     var contenuto = $(this).val();
    alert(iddi+contenuto);
    $.ajax({
   	 type: "POST",
   	 url: "post/content",
     data: "id="+iddi+"&contenuto="+contenuto,
     success: function(msg){
     alert( "Data Saved: " + msg );
    
    });
   
   
   
   });
 });
