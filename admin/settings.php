<?php
include "header.php";
?>

<body>
    <div class="main-wrapper">
        
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        </li>
                        <li class="menu-title">Settings</li>
                        <li class="active">
                            <a href="settings.php"><i class="fa fa-building"></i> <span>Company Settings</span></a>
                        </li>
                        <li>
                            <a href="localization.php"><i class="fa fa-clock-o"></i> <span>Localization</span></a>
                        </li>
                        <li>
                            <a href="theme-settings.php"><i class="fa fa-picture-o"></i> <span>Theme Settings</span></a>
                        </li>
                        <li>
                            <a href="roles-permissions.php"><i class="fa fa-key"></i> <span>Roles & Permissions</span></a>
                        </li>
                        <li>
                            <a href="email-settings.php"><i class="fa fa-envelope-o"></i> <span>Email Settings</span></a>
                        </li>
                        <li>
                            <a href="invoice-settings.php"><i class="fa fa-pencil-square-o"></i> <span>Invoice Settings</span></a>
                        </li>
                        <li>
                            <a href="salary-settings.php"><i class="fa fa-money"></i> <span>Salary Settings</span></a>
                        </li>
                        <li>
                            <a href="notifications-settings.php"><i class="fa fa-globe"></i> <span>Notifications</span></a>
                        </li>
                        <li>
                            <a href="change-password.php"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                        <li>
                            <a href="leave-type.php"><i class="fa fa-cogs"></i> <span>Leave Type</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <h3 class="page-title">Company Settings</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Company Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input class="form-control " value="Daniel Porter" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control " value="3864 Quiet Valley Lane, Sherman Oaks, CA, 91403" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select">
                                            <option>USA</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control" value="Sherman Oaks" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>State/Province</label>
                                        <select class="form-control select">
                                            <option>California</option>
                                            <option>Alaska</option>
                                            <option>Alabama</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input class="form-control" value="91403" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="danielporter@example.com" type="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" value="818-978-7102" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input class="form-control" value="818-635-5579" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input class="form-control" value="818-978-7102" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Website Url</label>
                                        <input class="form-control" value="https://www.example.com" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <button type="button" class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include "footer.php";
            ?>
</body>


<!-- settings23:11-->
</html>