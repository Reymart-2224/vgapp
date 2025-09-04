<div class="row">
<div class="col-lg-12">
<h3 class="text-center">
My Victory Groups
	</h3>
</div>
	
	<style>
	
	span.myvg-time {
    font-size: 10px;
    font-weight: 700;
    color: black;
    text-align: center;
}
span.myvg-name {
    color: black;
    font-weight: 700;
}
.vgcards{
	cursor:pointer
}
	</style>
	
	<div class="col-lg-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-gradient-primary">
				<h6 class="m-0 font-weight-bold text-light text-center">

				Monday
				</h6>

			</div>
				<div class="card-body" >
      <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." and day='monday' ORDER BY time_start ASC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
						  ?>
			
			
			
				<div class="card  border-bottom-primary vgcards" onclick="vgattendance(<?php echo $row_vg["id"];?>)">
				<div class="card-body">
				<center>
					<span class='myvg-name'><?php echo $vg_name;?></span><br>
					<span class='myvg-time'><?php echo $vg_start." to ".$vg_end;?></span><br>
					<span class='myvg-time'><?php echo $churchname;?></span>
					</center>
				</div>
				</div>

			
			<?php
                                   
				  
				 
				
		
  }
  
}

?>
			
		</div>
	</div>
	</div>
	<div class="col-lg-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-gradient-primary">
				<h6 class="m-0 font-weight-bold text-light text-center">

				Tuesday
				</h6>

			</div>

			<div class="card-body">
 <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." and day='tuesday' ORDER BY time_start ASC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
						  ?>
			
			
			
				<div class="card  border-bottom-primary vgcards" onclick="vgattendance(<?php echo $row_vg["id"];?>)">
				<div class="card-body">
				<center>
					<span class='myvg-name'><?php echo $vg_name;?></span><br>
					<span class='myvg-time'><?php echo $vg_start." to ".$vg_end;?></span><br>
					<span class='myvg-time'><?php echo $churchname;?></span>
					</center>
				</div>
				</div>

			
			<?php
                                   
				  
				 
				
		
  }
  
}

?>

			</div>
		</div>
	</div>
	
	
	<div class="col-lg-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-gradient-primary">
				<h6 class="m-0 font-weight-bold text-light text-center">

				Wednesday
				</h6>

			</div>

			<div class="card-body">

 <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." and day='wednesday' ORDER BY time_start ASC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
						  ?>
			
			
			
				<div class="card  border-bottom-primary vgcards" onclick="vgattendance(<?php echo $row_vg["id"];?>)">
				<div class="card-body">
				<center>
					<span class='myvg-name'><?php echo $vg_name;?></span><br>
					<span class='myvg-time'><?php echo $vg_start." to ".$vg_end;?></span><br>
					<span class='myvg-time'><?php echo $churchname;?></span>
					</center>
				</div>
				</div>

			
			<?php
                                   
				  
				 
				
		
  }
  
}

?>
			</div>
		</div>
	</div>
	
	
	<div class="col-lg-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-gradient-primary">
				<h6 class="m-0 font-weight-bold text-light text-center">

				Thursday
				</h6>

			</div>

			<div class="card-body">
 <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." and day='thusday' ORDER BY time_start ASC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
						  ?>
			
			
			
				<div class="card  border-bottom-primary vgcards" onclick="vgattendance(<?php echo $row_vg["id"];?>)">
				<div class="card-body">
				<center>
					<span class='myvg-name'><?php echo $vg_name;?></span><br>
					<span class='myvg-time'><?php echo $vg_start." to ".$vg_end;?></span><br>
					<span class='myvg-time'><?php echo $churchname;?></span>
					</center>
				</div>
				</div>

			
			<?php
                                   
				  
				 
				
		
  }
  
}

?>

			</div>
		</div>
	</div>
	
	<div class="col-lg-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-gradient-primary">
				<h6 class="m-0 font-weight-bold text-light text-center">

				Friday
				</h6>

			</div>

			<div class="card-body">
 <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." and day='friday' ORDER BY time_start ASC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
						  ?>
			
			
			
				<div class="card  border-bottom-primary vgcards" onclick="vgattendance(<?php echo $row_vg["id"];?>)">
				<div class="card-body">
				<center>
					<span class='myvg-name'><?php echo $vg_name;?></span><br>
					<span class='myvg-time'><?php echo $vg_start." to ".$vg_end;?></span><br>
					<span class='myvg-time'><?php echo $churchname;?></span>
					</center>
				</div>
				</div>

			
			<?php
                                   
				  
				 
				
		
  }
  
}

?>

			</div>
		</div>
	</div>
	
	<div class="col-lg-2">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-gradient-primary">
				<h6 class="m-0 font-weight-bold text-light text-center">

				Saturday
				</h6>

			</div>

			<div class="card-body">

 <?php 
					
$checkvg= "SELECT * FROM victory_group where leader=".$user_id." and day='saturday' ORDER BY time_start ASC";
$result_vg = $conn->query($checkvg);

if ($result_vg->num_rows > 0) {
  while($row_vg = $result_vg->fetch_assoc()) {
				 $vg_name = ucfirst($row_vg["name"]);
				  $vg_day = ucfirst($row_vg["day"]);
			
				   	  
					  
					  	$checkchurch =  "SELECT * FROM churches where id=".$row_vg["church"];
								$result_checkchurch = $conn->query($checkchurch);
								if ($result_checkchurch->num_rows > 0) {
								while($row_church = $result_checkchurch->fetch_assoc()) {
									$churchname = $row_church['name'];
								}
								}
								
						 
						 $vg_start  = date("g:i a", strtotime($row_vg["time_start"]));
						 
						  $vg_end  = date("g:i a", strtotime($row_vg["time_end"]));
						  ?>
			
			
			
				<div class="card  border-bottom-primary vgcards" onclick="vgattendance(<?php echo $row_vg["id"];?>)">
				<div class="card-body">
				<center>
					<span class='myvg-name'><?php echo $vg_name;?></span><br>
					<span class='myvg-time'><?php echo $vg_start." to ".$vg_end;?></span><br>
					<span class='myvg-time'><?php echo $churchname;?></span>
					</center>
				</div>
				</div>

			
			<?php
                                   
				  
				 
				
		
  }
  
}

?>
			</div>
		</div>
	</div>
	
	
	
	
</row>



    <div class="modal fade" id="vgattendance" tabindex="-1" role="dialog" aria-labelledby="vgattendance"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
				<div class='vgattendance-content'>
              
				</div>
            </div>
        </div>
    </div>
	
	
	
	