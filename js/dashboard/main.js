	
	var intervalId = window.setInterval(function(){

			$.ajax({ 
				method:"post",
				url: "../functions/refreshsession.php",
				success: function(result){
					console.log(result);
				}
		
	})
}, 20000);



	function logout(){
		window.location.replace("../functions/logout.php");
		
	}
	