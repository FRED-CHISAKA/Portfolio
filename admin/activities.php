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
                                <li><a href="portfolio.php">Portfolio</a></li>
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
                                <li><a class="active" href="activities.php">Activities</a></li>
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
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Activities</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="activity">
                            <div class="activity-box">
                                <ul class="activity-list">
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Lesley Grauer" data-toggle="tooltip" class="avatar">
                                                <img alt="Lesley Grauer" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Lesley Grauer</a> added new task <a href="#">Hospital Administration</a>
                                                <span class="time">4 mins ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" class="avatar" title="Jeffery Lalor" data-toggle="tooltip">L</a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Jeffery Lalor</a> added <a href="profile.php" class="name">Loren Gatlin</a> and <a href="profile.php" class="name">Tarah Shropshire</a> to project <a href="#">Client appointment booking</a>
                                                <span class="time">6 mins ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Catherine Manseau" data-toggle="tooltip" class="avatar">
                                                <img alt="Catherine Manseau" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Catherine Manseau</a> completed task <a href="#">Appointment booking with payment gateway</a>
                                                <span class="time">12 mins ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="#" title="Bernardo Galaviz" data-toggle="tooltip" class="avatar">
                                                <img alt="Bernardo Galaviz" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Bernardo Galaviz</a> changed the task name <a href="#">Doctor available module</a>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Mike Litorus" data-toggle="tooltip" class="avatar">
                                                <img alt="Mike Litorus" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Mike Litorus</a> added new task <a href="#">Client and Doctor video conferencing</a>
                                                <span class="time">2 days ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.php" title="Jeffery Lalor" data-toggle="tooltip" class="avatar">
                                                <img alt="Jeffery Lalor" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="profile.php" class="name">Jeffery Lalor</a> added <a href="profile.php" class="name">Jeffrey Warden</a> and <a href="profile.php" class="name">Bernardo Galaviz</a> to the task of <a href="#">Private chat module</a>
                                                <span class="time">7 days ago</span>
                                            </div>
                                        </div>
										<a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include "footer.php"
    ?>

</body>
</html>