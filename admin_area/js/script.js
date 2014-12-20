




$("#logout").click(function(){
  $.ajax({url:"functions/files/logout.php",success:function(result){
     
     if(result){
     	 window.location='../index.php';
     }
  
  }});
});

$(".action").addClass("text-center");
