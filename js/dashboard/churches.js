function viewchurch(id){
		
		
			$.ajax({ 
				method:"post",
				url: "../functions/viewchurch.php",
				data: {'id':id},
				success: function(result){
					
					if(result==0){
							alert("Church doesn't exist");
					}
				
					else{
						$("#viewchurch").modal();
							$(".church-content").html(result);


					}
				}
		
	})
	
	
		
	}
	
	function deletechurch(id){
		
		
			$.ajax({ 
				method:"post",
				url: "../functions/deletechurch.php",
				data: {'id':id},
				success: function(result){
					
					if(result==0){
							alert("Church doesn't exist");
					}
				
					else{
						alert("Successfully Deleted.");
						location.reload();

					}
				}
		
	})
	
	
		
	}
	
	function savechurch(){
		var name= $(".church-name").val();
		var address= $(".church-address").val();
		
			$.ajax({
				method:"post",
				url: "../functions/savechurch.php",
				data: {'name':name,'address':address},
				success: function(result){
					
					if(result==1){
							location.reload();
					}
				else if(result==2){
						alert("Church already exist");
					}
					else{
							alert("An error occur please reload.");


					}
				}
		
	})
	
	
		
	}
	
	
	function updatechurch(id){
		var name= $(".update-church-name").val();
		var address= $(".update-church-address").val();
			var status= $(".update-church-status").val();
	
		
			$.ajax({
				method:"post",
				url: "../functions/updatechurch.php",
				data: {'name':name,'address':address,'status':status,'id':id},
				success: function(result){
					
					if(result==1){
						alert("Successfully Updated");
							location.reload();
					}
				else if(result==2){
						alert("Church already exist");
					}
					else{
							alert("An error occur please reload.");


					}
				}
		
	})
	
	
		
	}
	
	