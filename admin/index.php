<?php

include "header.php";

?>
<body>
    <div class="main-wrapper">
        
        <?php
        include "sidebar.php";
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-sm-4 col-8 text-right m-b-30">
                        <a href="add-project.php" class="btn btn-primary btn-rounded float-right">
                            <i class="fa fa-download"></i> Generate Report
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-code" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
                                <h3>24</h3>
                                <span class="widget-title1">Projects <i class="fa fa-code"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-cogs"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>12</h3>
                                <span class="widget-title2">Services <i class="fa fa-cogs"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-users" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>148</h3>
                                <span class="widget-title3">Clients <i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-comments" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>37</h3>
                                <span class="widget-title4">Messages <i class="fa fa-comments"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Website Traffic Overview</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Project Performance</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>Target</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> Result</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-12 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Recent Project Activities</h4> <a href="appointments.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Client</th>
												<th>Project</th>
												<th>Deadline</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.php">S</a>
													<h2><a href="profile.php">SyncWave </a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">IoT Dashboard</h5>
													
												</td>
												<td>
													<h5 class="time-title p-0">May 28</h5>
												</td>
												<td class="text-right">
													<a href="appointments.php" class="btn btn-outline-warning take-btn">Active</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.php">B</a>
													<h2><a href="profile.php">Bemaso LTD Kenya</a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Enterprise Application</h5>
												</td>
												<td>
													<h5 class="time-title p-0">June 5</h5>
												</td>
												<td class="text-right">
													<a href="appointments.php" class="btn btn-outline-success take-btn">Complete</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.php">E</a>
													<h2><a href="profile.php">Electro Company</a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">E-Commerce Site</h5>
												</td>
												<td>
													<h5 class="time-title p-0">June 19</h5>
												</td>
												<td class="text-right">
													<a href="appointments.php" class="btn btn-outline-success take-btn">Complete</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.php">E</a>
													<h2><a href="profile.php">Smart Farming</a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">E-Agriculture Platform</h5>
												</td>
												<td>
													<h5 class="time-title p-0">July 7</h5>
												</td>
												<td class="text-right">
													<a href="appointments.php" class="btn btn-outline-success take-btn">Complete</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.php">D</a>
													<h2><a href="profile.php">Dasfon Builders</a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Building Company</h5>
												</td>
												<td>
													<h5 class="time-title p-0">April 13</h5>
												</td>
												<td class="text-right">
													<a href="appointments.php" class="btn btn-outline-success take-btn">Complete</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Client Requests </h4> <a href="patients.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Maina</h2>
												</td>
												<td>kenmaina@gmail.com</td>
												<td>0717008769</td>
												<td><button class="btn btn-primary btn-primary-one float-right">Cloud</button></td>
											</tr>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Richard</h2>
												</td>
												<td>Richard717@gmail.com</td>
												<td>0114456778</td>
												<td><button class="btn btn-primary btn-primary-two float-right">Storage</button></td>
											</tr>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Lynn</h2>
												</td>
												<td>Lynnann@gmail.com</td>
												<td>0023985678</td>
												<td><button class="btn btn-primary btn-primary-three float-right">Consulting</button></td>
											</tr>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2>Peter</h2>
												</td>
												<td>peterena@user-care.com</td>
												<td>+56 783452</td>
												<td><button class="btn btn-primary btn-primary-two float-right">DevOps</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">TechDive Performance</h4>
						</div>
						<div class="bar-chart">
							<div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>
								
								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div>
							<div class="chart clearfix">
								<div class="item">
									<div class="bar">
										<span class="percent">16%</span>
										<div class="item-progress" data-percent="16">
											<span class="title">Website Traffic</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">71%</span>
										<div class="item-progress" data-percent="71">
											<span class="title">New Clients</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">82%</span>
										<div class="item-progress" data-percent="82">
											<span class="title">System Deployments</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">67%</span>
										<div class="item-progress" data-percent="67">
											<span class="title">Completed Projects</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">30%</span>									
										<div class="item-progress" data-percent="30">
											<span class="title">Closed Tickets</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					 </div>
				</div>
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Chisaka Fred</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="messages.php">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="messages.php">See all messages</a>
                    </div>
                </div>
            </div>
        </div>

		<?php
		include "footer.php";
		?>
	</div>

</body>



</html>