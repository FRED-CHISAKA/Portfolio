<?php
include "header.php";
?>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Website Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="services.php">Services</a></li>
                                <li><a href="projects.php">Projects</a></li>
                                <li><a class="active" href="portfolio.php">Portfolio</a></li>
                                <li><a href="team.php">Team</a></li>
                                <li><a href="clients.php">Clients</a></li>
                                <li><a href="blog.php">Insights</a></li>
                                <li><a href="media.php">Media Library</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>HR Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="employees.php">Employees</a></li>
                                <li><a href="attendance.php">Attendance</a></li>
                                <li><a href="leaves.php">Leaves</a></li>
                                <li><a href="holidays.php">Holidays</a></li>
                                <li>
                                    <a href="#">
                                        <span>Payroll</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="display:none;">
                                        <li><a href="salary.php">Salary</a></li>
                                        <li><a href="taxes.php">Taxes</a></li>
                                        <li><a href="salary-view.php">Payslips</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Operations</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="calendar.php">Calender</a></li>
                                <li><a href="schedule.php">Schedule</a></li>
                                <li><a href="appointments.php">Appointments</a></li>
                                <li><a href="activities.php">Activities</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-money"></i>
                                <span>Finance</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="invoices.php">Invoices</a></li>
                                <li><a href="expenses.php">Expenses</a></li>
                                <li><a href="payments.php">Payments</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="assets.php">
                                <i class="fa fa-cube"></i>
                                <span>Assets</span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-phone"></i>
                                <span>Communication</span>
                            <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li>
                                    <a href="#">
                                        <span>Calls</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="display:none;">
                                        <li><a href="voice-call.php">Voice Call</a></li>
                                        <li><a href="video-call.php">Video Call</a></li>
                                    </ul>
                                </li>
                                <li><a href="mail-view.php">Emails</a></li>
                            </ul>
                        </li>

                       <li class="submenu">
                            <a href="#">
                                <i class="fa fa-lock"></i>
                                <span>Administration</span>
                            <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="roles-permissions.php">Roles & Permissions</a></li>
                                <li>
                                    <a href="#">
                                        <span>User Accounts</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul style="display:none;">
                                        <li><a href="login.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                        <li><a href="users.php">Registered Users</a></li>
                                        <li><a href="admins.php">System Admins</a></li>
                                        <li><a href="forgot-password.php">Forgot Password</a></li>
                                        <li><a href="change-password.php">Change Password</a></li>
                                        <li><a href="lock-screen.php">Lock Screen</a></li>
                                        <li><a href="error-404.php">Error 404</a></li>
                                        <li><a href="error-500.php">Error 500</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-line-chart"></i>
                                <span>Analytics</span>
                            <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="charts.php">All Charts</a></li>
                                <li><a href="tables.php">All Tables</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span>Customer Relations</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="leads.php">Leads</a></li>
                                <li><a href="prospects.php">Prospects</a></li>
                                <li><a href="follow-ups.php">Follow-ups</a></li>
                                <li><a href="contracts.php">Contracts</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Settings</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="display:none;">
                                <li><a href="settings.php">General Settings</a></li>
                                <li><a href="profile.php">Profile Settings</a></li>
                            </ul>
                        </li>

                        <!-- <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i>
                                <span>Logout</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper projects">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Projects Management</h4>
                    </div>
                    <div class="col-sm-4 col-8 text-right m-b-30">
                        <a href="add-project.php" class="btn btn-primary btn-rounded float-right">
                            <i class="fa fa-plus"></i> Add Project
                        </a>
                    </div>
                </div>

                <!-- Project Stats -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1">
                                <i class="fa fa-code" aria-hidden="true"></i>
                            </span>

                            <div class="dash-widget-info text-right">
                                <h3>24</h3>
                                <span class="widget-title1">
                                    Total Projects
                                    <i class="fa fa-code" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2">
                                <i class="fa fa-cloud" aria-hidden="true"></i>
                            </span>

                            <div class="dash-widget-info text-right">
                                <h3>12</h3>
                                <span class="widget-title2">
                                    Cloud Systems
                                    <i class="fa fa-cloud" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3">
                                <i class="fa fa-shield" aria-hidden="true"></i>
                            </span>
                            <div class="dash-widget-info text-right">
                                <h3>9</h3>
                                <span class="widget-title3">
                                    Cybersecurity
                                    <i class="fa fa-shield" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4">
                                <i class="fa fa-laptop" aria-hidden="true"></i>
                            </span>
                            <div class="dash-widget-info text-right">
                                <h3>18</h3>
                                <span class="widget-title4">
                                    Active Systems
                                    <i class="fa fa-laptop" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Cards -->
                <div class="row">

                    <!-- Project 1 -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-box project-box">

                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>

                            <h4 class="project-title">
                                <a href="project-detail.php">Agriculture Smartfarming</a>
                            </h4>

                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">PHP</span>
                                <span class="text-muted"> • MySQL • Cloud</span>
                            </small>

                            <p class="text-muted">
                                Cloud-based agricultural management system for smart farming operations and automation.
                            </p>

                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Project Status
                                </div>

                                <div class="text-muted">
                                    Active Development
                                </div>
                            </div>

                            <div class="project-members m-b-15">
                                <div>Team</div>

                                <ul class="team-members">
                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/1.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/2.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/3.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="m-b-5">
                                Progress
                                <span class="text-success float-right">82%</span>
                            </p>

                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 82%"></div>
                            </div>

                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-box project-box">

                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>

                            <h4 class="project-title">
                                <a href="project-detail.php">School ERP System</a>
                            </h4>

                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">Java STS</span>
                                <span class="text-muted"> • MongoDB • Cloud</span>
                            </small>

                            <p class="text-muted">
                                Full educational ERP platform for managing school operations and student activities.
                            </p>

                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Project Status
                                </div>

                                <div class="text-muted">
                                    Maintenance
                                </div>
                            </div>

                            <div class="project-members m-b-15">
                                <div>Team</div>

                                <ul class="team-members">
                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/2.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/1.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="m-b-5">
                                Progress
                                <span class="text-success float-right">95%</span>
                            </p>

                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 95%"></div>
                            </div>

                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-box project-box">
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>

                            <h4 class="project-title">
                                <a href="project-detail.php">Flood Prediction System</a>
                            </h4>
                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">Python</span>
                                <span class="text-muted"> • Machine Learning • AI</span>
                            </small>
                            <p class="text-muted">
                                AI-powered flood prediction and monitoring platform using machine learning algorithms.
                            </p>

                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Project Status
                                </div>

                                <div class="text-muted">
                                    Testing Phase
                                </div>
                            </div>

                            <div class="project-members m-b-15">
                                <div>Team</div>

                                <ul class="team-members">
                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/3.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/2.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/1.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="m-b-5">
                                Progress
                                <span class="text-success float-right">70%</span>
                            </p>

                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%"></div>
                            </div>

                        </div>
                    </div>

                    <!-- Project 4 -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-box project-box">

                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>

                            <h4 class="project-title">
                                <a href="project-detail.php">Email Security System</a>
                            </h4>

                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">SPF</span>
                                <span class="text-muted"> • DKIM • DMARC</span>
                            </small>

                            <p class="text-muted">
                                Advanced email authentication and protection platform for enterprise security.
                            </p>

                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Project Status
                                </div>

                                <div class="text-muted">
                                    Completed
                                </div>
                            </div>

                            <div class="project-members m-b-15">
                                <div>Team</div>

                                <ul class="team-members">
                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/3.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/5.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="m-b-5">
                                Progress
                                <span class="text-success float-right">100%</span>
                            </p>

                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                            </div>

                        </div>
                    </div>

                    <!-- Project 5 -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-box project-box">

                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>

                            <h4 class="project-title">
                                <a href="project-detail.php">Hosting Platform</a>
                            </h4>

                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">Node JS</span>
                                <span class="text-muted"> • Cloud • MySQL</span>
                            </small>

                            <p class="text-muted">
                                Fast and scalable hosting infrastructure platform for business and client websites.
                            </p>

                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Project Status
                                </div>

                                <div class="text-muted">
                                    Deployment
                                </div>
                            </div>

                            <div class="project-members m-b-15">
                                <div>Team</div>

                                <ul class="team-members">
                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/4.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/1.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/4.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="m-b-5">
                                Progress
                                <span class="text-success float-right">88%</span>
                            </p>

                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 88%"></div>
                            </div>

                        </div>
                    </div>

                    <!-- Project 6 -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-box project-box">

                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-trash-o m-r-5"></i> Delete
                                    </a>
                                </div>
                            </div>

                            <h4 class="project-title">
                                <a href="project-detail.php">Enterprise System</a>
                            </h4>

                            <small class="block text-ellipsis m-b-15">
                                <span class="text-xs">C++</span>
                                <span class="text-muted"> • MariaDB • Cloud</span>
                            </small>

                            <p class="text-muted">
                                Enterprise-grade management system tailored for large scale organizations and operations.
                            </p>

                            <div class="pro-deadline m-b-15">
                                <div class="sub-title">
                                    Project Status
                                </div>

                                <div class="text-muted">
                                    Ongoing
                                </div>
                            </div>

                            <div class="project-members m-b-15">
                                <div>Team</div>

                                <ul class="team-members">
                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/6.jpg">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <img alt="" src="assets/img/projects/2.jpg">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <p class="m-b-5">
                                Progress
                                <span class="text-success float-right">76%</span>
                            </p>

                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 76%"></div>
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
