  function saveleader(){
		
			
			var fname = $(".leader-fname").val();
			var lname = $(".leader-lname").val();
			var password = $(".leader-password").val();
			var username = $(".leader-username").val();
			var churchIds = $(".leader-church").val();
			
			if(churchIds==0){
				alert("Please select a church.");
			}
			else{
			$.ajax({ 
					method:"post",
					url: "../functions/saveleader.php",
					data: {'fname':fname,'lname':lname,'password':password,'username':username,'churchIds':churchIds},
					success: function(result){
						
						if(result==1){
							alert("VG Leader "+fname+" successfully added.");
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
			}
			
			
			function deleteleader(id){


				$.ajax({ 
				method:"post",
				url: "../functions/deleteleader.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG Leader doesn't exist");
				}

				else{
				alert("Successfully Deleted.");
				location.reload();

				}
				}

				})



				}
				
				
				function viewleader(id){

 
				$.ajax({ 
				method:"post",
				url: "../functions/viewleader.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG Leader doesn't exist");
				}

				else{
				$("#viewleader").modal();
				$(".leader-content").html(result);


				}
				}

				})



				}


function updateleader(id){
				var fname= $(".update-leader-fname").val();
				var lname= $(".update-leader-lname").val();
				var username= $(".update-leader-username").val();
				var password= $(".update-leader-password").val();
				var status= $(".update-leader-status").val();
					var churchIds= $(".update-leader-church").val();
				$.ajax({
				method:"post",
				url: "../functions/updateleader.php",
				data: {'fname':fname,'lname':lname,'username':username,'password':password,'status':status,'churchIds':churchIds,'id':id},
				success: function(result){
console.log(username);
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
				
					$(document).ready( function () {
			$('#leadertable').DataTable({
					aLengthMenu: [
					[25, 50, 100, 200, -1],
					[25, 50, 100, 200, "All"]
					],
					iDisplayLength: 100,
					"ordering": false
			});
			} );