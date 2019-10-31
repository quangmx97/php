  $(document).ready(function(){
        $('.menucha').change(function(){
            var id = $('.menucha').val();
           $.post("data.php", {id:id}, function(data){
                $(".menucon").html(data);
           })
          // alert(id);
        })
    })

