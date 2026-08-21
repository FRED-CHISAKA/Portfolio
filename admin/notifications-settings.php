<?php
include "header.php";
?>


        
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.html"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        </li>
                        <li class="menu-title">Settings</li>
                        <li>
                            <a href="settings.html"><i class="fa fa-building"></i> <span>Company Settings</span></a>
                        </li>
                        <li>
                            <a href="localization.html"><i class="fa fa-clock-o"></i> <span>Localization</span></a>
                        </li>
                        <li>
                            <a href="theme-settings.html"><i class="fa fa-picture-o"></i> <span>Theme Settings</span></a>
                        </li>
                        <li>
                            <a href="roles-permissions.html"><i class="fa fa-key"></i> <span>Roles & Permissions</span></a>
                        </li>
                        <li>
                            <a href="email-settings.html"><i class="fa fa-envelope-o"></i> <span>Email Settings</span></a>
                        </li>
                        <li>
                            <a href="invoice-settings.html"><i class="fa fa-pencil-square-o"></i> <span>Invoice Settings</span></a>
                        </li>
                        <li>
                            <a href="salary-settings.html"><i class="fa fa-money"></i> <span>Salary Settings</span></a>
                        </li>
                        <li class="active">
                            <a href="notifications-settings.html"><i class="fa fa-bell"></i> <span>Notifications</span></a>
                        </li>
                        <li>
                            <a href="change-password.html"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                        <li>
                            <a href="leave-type.html"><i class="fa fa-cogs"></i> <span>Leave Type</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Notifications Settings</h4>
                        <div>
                            <ul class="list-group notification-list">
                                <li class="list-group-item">
                                    Employee
                                    <div class="material-switch float-right">
                                        <input id="staff_module" type="checkbox" checked="checked">
                                        <label for="staff_module" class="badge-primary"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Holidays
                                    <div class="material-switch float-right">
                                        <input id="holidays_module" type="checkbox">
                                        <label for="holidays_module" class="badge-primary"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Leave Request
                                    <div class="material-switch float-right">
                                        <input id="leave_module" type="checkbox">
                                        <label for="leave_module" class="badge-primary"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Events
                                    <div class="material-switch float-right">
                                        <input id="events_module" type="checkbox">
                                        <label for="events_module" class="badge-primary"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Chat
                                    <div class="material-switch float-right">
                                        <input id="chat_module" type="checkbox">
                                        <label for="chat_module" class="badge-primary"></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
            include "footer.php";
            ?>

</body>

</html>