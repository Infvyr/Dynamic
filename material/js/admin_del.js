$().ready(function(){
  $(document).on('click', '#delete', function(){
    var id=$(this).data("id3");
    if(confirm("Ești sigură că dorești să ștergi cartea din baza de date?"))
    {
      $.ajax({
        url:"delete_article.php",
        method:"POST",
        data:{id:id},
        dataType:"text",
        success:function(data){
        alert(data);
      }
      });
    }
  });
});