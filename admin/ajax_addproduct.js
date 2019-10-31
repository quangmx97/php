$(document).ready(function(){
	$(".theloai").change(function(){
		var id = $(".theloai").val();
		$.post("data_addproduct.php", {id:id}, function(data){
			$(".loaitin").html(data);
		})
		//alert(id);
	})
})