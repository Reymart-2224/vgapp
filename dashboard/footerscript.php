 <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-bar2.js"></script>
    <script src="../js/demo/chart-pie.js"></script>
	
	  <script src="../js/dashboard/churches.js"></script>
	  	 <script src="../js/dashboard/member.js"></script>
	  <script src="../js/dashboard/main.js"></script>
	  <script src="../js/dashboard/pastor.js"></script>
	    <script src="../js/dashboard/leaders.js"></script>
	 <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
	   <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>

  function saveattendance(id){
	 	
			var members = $("input:checkbox:checked.vg-members").map(function(){
			return $(this).val();
			}).get(); // <----
			var members = JSON.stringify(members);
			var referrals = $("input:checkbox:checked.vg-referrals").map(function(){
			return $(this).val();
			}).get(); // <----
			var referrals = JSON.stringify(referrals);
			
			var referralsid = $("input:checkbox:checked.vg-referrals").map(function(){
			return $(this).attr('dataid');
			}).get(); // <----
			var referralsid = JSON.stringify(referralsid);
			$.ajax({ 
					method:"post",
					url: "../functions/saveattendance.php",
					data: {'members':members,'id':id,'referrals':referrals,'referralsid':referralsid},
					success: function(result){
				
						if(result==1){
							alert("VG Attendance successfully saved.");
								location.reload();
								
						}
						else{
								alert("An error occur please reload.");


						}
					}
  
			})
			
			
			}
			
			
			
		 
function viewattendance(id){
	$.ajax({ 
				method:"post",
				url: "../functions/viewattendance.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG doesn't exist");
				}

				else{
				$("#viewattendance").modal();
				$(".viewattendance-content").html(result);


				}
				}

				})

	
}

	
 
function vgattendance(id){
	$.ajax({ 
				method:"post",
				url: "../functions/vgattendance.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG doesn't exist");
				}

				else{
				$("#vgattendance").modal();
				$(".vgattendance-content").html(result);


				}
				}

				})

	
}





	 function accept(id){
		 	$.ajax({ 
					method:"post",
					url: "../functions/updatereferral.php",
					data: {'id':id,'type':1},
					success: function(result){
						
						if(result==1){
							alert("Referral successfully accepted.");
								location.reload();
								
						}
						else{
								alert("An error occur please reload.");
			

						}
					}
  
			})
	 }
	 
	 
	 
	 function reject(id){
		 	$.ajax({ 
					method:"post",
					url: "../functions/updatereferral.php",
					data: {'id':id,'type':2},
					success: function(result){
						
						if(result==1){
							alert("Referral  successfully rejected.");
								location.reload();
								
						}
						else{
								alert("An error occur please reload.");


						}
					}
 
			})
	 }
	 
	 
	 
	 
	 

  function savemember(){
		
			
			var church = $(".member-church").val();
			var fname = $(".member-fname").val();
			var lname = $(".member-lname").val();
			var contact = $(".member-contact").val();
			$.ajax({ 
					method:"post",
					url: "../functions/savemember.php",
					data: {'fname':fname,'lname':lname,'contact':contact,'church':church},
					success: function(result){
						
						if(result==1){
							alert("VG Member "+fname+" successfully added.");
								location.reload();
								
						}
						else{
								alert("An error occur please reload.");


						}
					}
  
			})
			
			
			}
			
			
			
function updatemember(id){
	var church= $(".update-member-church").val();
				var fname= $(".update-member-fname").val();
				var lname= $(".update-member-lname").val();
							var contact = $(".update-member-contact").val();
							var status = $(".update-member-status").val();
				$.ajax({
				method:"post",
				url: "../functions/updatemember.php",
				data: {'fname':fname,'lname':lname,'contact':contact,'status':status,'id':id,'church':church},
				success: function(result){
				if(result==1){
				alert("Successfully Updated");
				location.reload();
				}
				else{
				alert("An error occur please reload.");


				}
				}

				})



				}
				 
			function viewvg(id){	
			$.ajax({ 
				method:"post",
				url: "../functions/viewvg.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG doesn't exist");
				}

				else{
				$("#viewvg").modal();
				$(".member-content").html(result);


				}
				}

				})

			
			}
			
			
			
			
				$(document).ready( function () {
			$('#vgtable').DataTable({
			aLengthMenu: [
			[25, 50, 100, 200, -1],
			[25, 50, 100, 200, "All"]
			],
			iDisplayLength: 100,
					"ordering": false
			});
			} );
			
			$('.vg-church').on("change",function(){
				
				var id = $(this).val();
				
				if(id!=0){
				$.ajax({ 
					method:"post",
					url: "../functions/membersselection.php",
					data: {'id':id},
					success: function(result){ 
						
						$('.membersselection').html(result);
						
					}
 
			})
				}
				else{
					$('.membersselection').html("");
					
				}
			
				
				
			});
			
			
			
			
			function checkmembers(vgid){
				
					
				var id = $(".update-vg-church").val();
				if(id!=0){
				$.ajax({ 
					method:"post",
					url: "../functions/membersselections.php",
					data: {'id':id,'vgid':vgid},
					success: function(result){ 
						$('.update-membersselection').html(result);
						
					}
 
			})
				}
				else{
					$('.update-membersselection').html("");
					
				}
			
				
			}
			
				function deletevg(id){
  

				$.ajax({ 
				method:"post",
				url: "../functions/deletevg.php",
				data: {'id':id},
				success: function(result){

				if(result==0){
				alert("VG  doesn't exist");
				}

				else{
				alert("Successfully Deleted.");
				location.reload();

				}
				}

				})



				}
				
				
			
			 function updatevg(id){
		
				var members = $("input:checkbox:checked.update-vg-members").map(function(){
			return $(this).val();
			}).get(); // <----
			var members = JSON.stringify(members);
		
			var status = $(".update-vg-status").val();
			
			var name = $(".update-vg-name").val();
			var day = $(".update-vg-day").val();
			var start = $(".update-vg-start").val();
			var end = $(".update-vg-end").val();
			var church = $(".update-vg-church").val();
			$.ajax({ 
					method:"post",
					url: "../functions/updatevg.php",
					data: {'name':name,'day':day,'start':start,'end':end,'church':church,'members':members,'status':status,'id':id,'members':members},
					success: function(result){
					
						if(result==1){
							alert("VG  "+name+" successfully updated.");
								location.reload();
								
						}
						else if(result==2){
								alert("VG "+name+" Already Exists");
						}
						else{
								alert("An error occur please reload.");
		

						}
					}
 
			})
			
			
			}
			
			
			
			
			
			
			 function savevg(){
		
				var members = $(" input:checkbox:checked.vg-members").map(function(){
			return $(this).val();
			}).get(); // <----
			var members = JSON.stringify(members);
			
			
			
			var name = $(".vg-name").val();
			var day = $(".vg-day").val();
			var start = $(".vg-start").val();
			var end = $(".vg-end").val();
			var church = $(".vg-church").val();
			$.ajax({ 
					method:"post",
					url: "../functions/savevg.php",
					data: {'name':name,'day':day,'start':start,'end':end,'church':church,'members':members},
					success: function(result){
						
						if(result==1){
							alert("VG  "+name+" successfully added.");
								location.reload();
								
						}
						else if(result==2){
								alert("VG "+name+" Already Exists");
						}
						else{
								alert("An error occur please reload.");
		

						}
					}
 
			})
			
			
			}
			
			
			
			
</script>