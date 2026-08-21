<?php
include "header.php"
?>

<body>
    <div class="main-wrapper">

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a href="Tech Team.php"><i class="fa fa-user-md"></i> <span>Tech Team</span></a>
                        </li>
                        <li>
                            <a href="Clients.php"><i class="fa fa-wheelchair"></i> <span>Clients</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li class="active">
                            <a href="Services.php"><i class="fa fa-calendar-check-o"></i> <span>Services</span></a>
                        </li>
                        <li>
                            <a href="departments.php"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees.php">Employees List</a></li>
								<li><a href="leaves.php">Leaves</a></li>
								<li><a href="holidays.php">Holidays</a></li>
								<li><a href="attendance.php">Attendance</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="invoices.php">Invoices</a></li>
								<li><a href="payments.php">Payments</a></li>
								<li><a href="expenses.php">Expenses</a></li>
								<li><a href="taxes.php">Taxes</a></li>
								<li><a href="provident-fund.php">Provident Fund</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.php"> Employee Salary </a></li>
								<li><a href="salary-view.php"> Payslip </a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat.php"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="voice-call.php">Voice Call</a></li>
                                <li><a href="video-call.php">Video Call</a></li>
                                <li><a href="incoming-call.php">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.php">Compose Mail</a></li>
                                <li><a href="inbox.php">Inbox</a></li>
                                <li><a href="mail-view.php">Mail View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="blog-details.php">Blog View</a></li>
                                <li><a href="add-blog.php">Add Blog</a></li>
                                <li><a href="edit-blog.php">Edit Blog</a></li>
                            </ul>
                        </li>
						<li>
							<a href="assets.php"><i class="fa fa-cube"></i> <span>Assets</span></a>
						</li>
						<li>
							<a href="activities.php"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-reports.php"> Expense Report </a></li>
								<li><a href="invoice-reports.php"> Invoice Report </a></li>
							</ul>
						</li>
                        <li>
                            <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">UI Elements</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-laptop"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="uikit.php">UI Kit</a></li>
                                <li><a href="typography.php">Typography</a></li>
                                <li><a href="tabs.php">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="form-basic-inputs.php">Basic Inputs</a></li>
                                <li><a href="form-input-groups.php">Input Groups</a></li>
                                <li><a href="form-horizontal.php">Horizontal Form</a></li>
                                <li><a href="form-vertical.php">Vertical Form</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="tables-basic.php">Basic Tables</a></li>
                                <li><a href="tables-datatables.php">Data Table</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>
                        <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.php"> Login </a></li>
                                <li><a href="register.php"> Register </a></li>
                                <li><a href="forgot-password.php"> Forgot Password </a></li>
                                <li><a href="change-password2.php"> Change Password </a></li>
                                <li><a href="lock-screen.php"> Lock Screen </a></li>
                                <li><a href="profile.php"> Profile </a></li>
                                <li><a href="gallery.php"> Gallery </a></li>
                                <li><a href="error-404.php">404 Error </a></li>
                                <li><a href="error-500.php">500 Error </a></li>
                                <li><a href="blank-page.php"> Blank Page </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span>Level 1</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Services</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-Services.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Services</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Department</th>
										<th>Available Days</th>
										<th>Available Time</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> Henry Daniels</td>
										<td>Cardiology</td>
										<td>Sunday, Monday, Tuesday</td>
										<td>10:00 AM - 7:00 PM</td>
										<td><span class="custom-badge status-green">Active</span></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-Services.php"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_Services"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
                </div>
                </div>
            </div>
            
        </div>
		<div id="delete_Services" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Services?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <?php
include "footer.php";
?>
</body>

</html>