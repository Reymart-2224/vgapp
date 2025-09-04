
	  function savepastor(){
			event.preventDefault();
			var churchIds = $(" input:checkbox:checked.churches").map(function(){
			return $(this).val();
			}).get(); // <----
			var churchIds = JSON.stringify(churchIds);
			var fname = $(".pastor-fname").val();
			var lname = $(".pastor-lname").val();
			var password = $(".pastor-password").val();
			var username = $(".pastor-username").val();
			
			
			$.ajax({ 
					method:"post",
					url: "../functions/savepastor.php",
					data: {'fname':fname,'lname':lname,'password':password,'username':username,'churchIds':churchIds},
					success: function(result){
						
						if(result==1){
							alert("Pastor "+fname+" successfully added.");
								location.reload();
								
						}
					else if(result==2){
							alert("Username already exist");
						}
						else{
								alert("An error occur please reload.");


						}
					}
 
			})
			}
			
			
				function updatepastor(id){
				var fname= $(".update-pastor-fname").val();
				var lname= $(".update-pastor-lname").val();
				var username= $(".update-pastor-username").val();
				var password= $(".update-pastor-password").val();
				var status= $(".update-pastor-status").val();
					event.preventDefault();
					var churchIds = $(" input:checkbox:checked.update-churches").map(function(){
					return $(this).val();
					}).get(); // <----

				var churchIds = JSON.stringify(churchIds);
				$.ajax({
				method:"post",
				url: "../functions/updatepastor.php",
				data: {'fname':fname,'lname':lname,'username':username,'password':password,'status':status,'churchIds':churchIds,'id':id},
				success: function(result){

				if(result==1){
				alert("Successfully Updated");
				location.reload();
				}
				else if(result==2){
				alert("Username already exist");
				}
				else{
				alert("An error occur please reload.");


				}
				}

				})



				}
	 
				function deletepastor(id){


				$.ajax({ 
				method:"post",
				url: "../functions/deletepastor.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("Pastor doesn't exist");
				}

				else{
				alert("Successfully Deleted.");
				location.reload();

				}
				}

				})



				}

	
			
				function viewpastor(id){

 
				$.ajax({ 
				method:"post",
				url: "../functions/viewpastor.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("Pastor doesn't exist");
				}

				else{
				$("#viewpastor").modal();
				$(".pastor-content").html(result);


				}
				}

				})



				}


			
			
			$(document).ready( function () {
			$('#pastortable').DataTable({
					aLengthMenu: [
					[25, 50, 100, 200, -1],
					[25, 50, 100, 200, "All"]
					],
					iDisplayLength: 100,
					"ordering": false
			});
			} );
			