  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Victory Churches</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											
											<?php 
					$checkchurches = "SELECT * FROM churches where status=1";
					$result_checkchurches= $conn->query($checkchurches);
					echo $result_checkchurches->num_rows;
					?>
						
											
											
											
											
											</div>
                                        </div>
                                        <div class="col-auto">
										
							<style>

							img.fas.fa-2x {
							float: right;
							/* position: absolute; */
							margin-top: -10%;
							}
							</style>
								<img src="../img/vglogo-blue.png" style="width:10%" class="fas fa-2x" >
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pastors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
														<?php 
					$checkchurches = "SELECT * FROM users where status=1 and type=2";
					$result_checkchurches= $conn->query($checkchurches);
					echo $result_checkchurches->num_rows;
					?>
						
											
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">VG Groups
                                            </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800">
										   								<?php 
					$checkchurches = "SELECT * FROM victory_group where status=1";
					$result_checkchurches= $conn->query($checkchurches);
					echo $result_checkchurches->num_rows;
					?>
						
										   
										   </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pray fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                NEWCOMERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											
																	   								<?php 
					$checkchurches = "SELECT * FROM members where status=1 and  indicator=2";
					$result_checkchurches= $conn->query($checkchurches);
					echo $result_checkchurches->num_rows;
					?>
											
											
											
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- bar Chart -->
                        <div class="col-xl-8 col-lg-7">
 <!-- Project Card Example -->
                                                       <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">VG Monthly Attendance Report</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">VG Attendees Report</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i>Active Attendees
                                        </span>

                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i>  Newcomers
                                        </span>
										
										     <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Inactive Members
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
                <!-- /.container-fluid -->