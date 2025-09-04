




		
	
			
			
			function deletemember(id){


				$.ajax({ 
				method:"post",
				url: "../functions/deletemember.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG Member doesn't exist");
				}

				else{
				alert("Successfully Deleted.");
				location.reload();

				}
				}

				})



				}
				
				
				function viewmember(id){

				
				$.ajax({ 
				method:"post",
				url: "../functions/viewmember.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG Member doesn't exist");
				}

				else{
				$("#viewmember").modal();
				$(".member-content").html(result);


				}
				}

				})



				}

				function sendreferral(id){ 
				
						var type = $(".refer-type").val();
						var leader = $(".refer-leader").val();
						var notes = $(".refer-notes").val();
						
							$.ajax({ 
							method:"post",
							url: "../functions/reffer.php",
							data: {'type':type,'leader':leader,'notes':notes,'id':id},
							success: function(result){
							if(result==1){
							alert("Request Successfully Sent");
							viewmember(id);
							}
							else{
							alert("Request already exists.");


							}
							}

				})
				
				 
				}




				
					$(document).ready( function () {
			$('#membertable').DataTable({
					aLengthMenu: [
					[25, 50, 100, 200, -1],
					[25, 50, 100, 200, "All"]
					],
					iDisplayLength: 100,
					"ordering": false
			});
			} );