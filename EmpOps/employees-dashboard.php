<?php
require 'side_employee.php';
$team="SELECT * FROM team";
$team_query=mysqli_query($conn,$team) or die(mysqli_error($conn));
echo'<!-- Team Leads List -->
									<div class="card flex-fill team-lead shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Team Leads </h4>
                                       </div>';
                                      $recordsPerPage=7;
                                      $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                      $startFrom = ($page - 1) * $recordsPerPage;
                                     $totalRecordsQuery = "SELECT COUNT(*) as total FROM team";
                                      $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
                                      $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];

                                       $totalPages = ceil($totalRecords / $recordsPerPage);
                                       $recordsQuery = "SELECT * FROM team LIMIT $startFrom, $recordsPerPage";
                                         $recordsResult = mysqli_query($conn, $recordsQuery);

                                  if(mysqli_num_rows($recordsResult) > 0) {
                                   while ($row = mysqli_fetch_assoc($recordsResult)) {
                                   		$lead=$row['leader'];
										$picture="SELECT * FROM employee WHERE id='$lead'";
										$query=mysqli_query($conn,$picture) or die(mysqli_error($conn));
                                        $pic=mysqli_fetch_assoc($query);
										if($pic['file_name'] == 'a'){
										$profile="img-2.jpg";
										}else{
										$profile=$pic['file_name'];
									}
										echo'<div class="card-body">
											<div class="media mb-3">
												<div class="e-avatar avatar-online mr-3"><img src="images/'.$profile.'" alt="'.$pic['name'].'" class="img-fluid"></div>
												<div class="media-body">
													<h6 class="m-0">'.$pic['name'].'</h6>
													<p class="mb-0 ctm-text-sm">'.$row['name'].'</p>
												</div>
											</div>
											<hr>
											</div>';
											}}
									echo"</div>
								<div class='col-lg-6 col-md-12 d-flex'>
									
		</div>
		<!-- Inner Wrapper -->
<div class='pagination'>";
                                       for ($i = 1; $i <= $totalPages; $i++) {
                                       echo "<center><a href='employees-dashboard.php?page=$i'>$i</a></center>";
}
echo'</div>
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
			
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>		
		
		<!-- Sticky sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>		
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
			
		<!-- Custom Js -->
		<script src="assets/js/script.js"></script>

	</body>
</html>';
?>