<?php
$currentPage = basename($_SERVER['PHP_SELF']);


/*
|--------------------------------------------------------------------------
| Website Management
|--------------------------------------------------------------------------
*/

$websitePages = [
    'about.php',
    'resume.php',
    'services.php',
    'portfolio.php',
    'certifications.php',
    'contact.php',
    'media.php'
];

$websiteActive = in_array($currentPage, $websitePages);


/*
|--------------------------------------------------------------------------
| Engagement
|--------------------------------------------------------------------------
*/

$engagementPages = [
    'message-view.php',
    'mail-view.php',
    'about.php'
];

$engagementActive = in_array($currentPage, $engagementPages);


/*
|--------------------------------------------------------------------------
| Administration / User Accounts
|--------------------------------------------------------------------------
*/

$userAccountPages = [
    'login.php',
    'register.php',
    'users.php',
    'admins.php',
    'forgot-password.php',
    'change-password.php',
    'error-404.php',
    'error-500.php'
];

$userAccountsActive = in_array($currentPage, $userAccountPages);

$administrationActive = $userAccountsActive;


/*
|--------------------------------------------------------------------------
| Analytics
|--------------------------------------------------------------------------
*/

$analyticsPages = [
    'charts.php',
    'tables.php'
];

$analyticsActive = in_array($currentPage, $analyticsPages);


/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

$settingsPages = [
    'settings.php',
    'profile.php'
];

$settingsActive = in_array($currentPage, $settingsPages);

?>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>


                <!-- =====================================================
                     DASHBOARD
                ====================================================== -->

                <li class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <!-- =====================================================
                     WEBSITE MANAGEMENT
                ====================================================== -->

                <li class="submenu">

                    <a href="#"
                       class="<?php echo $websiteActive ? 'subdrop' : ''; ?>">

                        <i class="fa fa-globe"></i>

                        <span>Website Management</span>

                        <span class="menu-arrow"></span>

                    </a>


                    <ul style="<?php echo $websiteActive ? 'display:block;' : 'display:none;'; ?>">


                        <li class="<?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">
                            <a href="about.php">
                                About
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'resume.php') ? 'active' : ''; ?>">
                            <a href="resume.php">
                                Resume
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'services.php') ? 'active' : ''; ?>">
                            <a href="services.php">
                                Services
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'portfolio.php') ? 'active' : ''; ?>">
                            <a href="portfolio.php">
                                Portfolio
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'certifications.php') ? 'active' : ''; ?>">
                            <a href="certifications.php">
                                Certifications
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">
                            <a href="contact.php">
                                Contact Details
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'media.php') ? 'active' : ''; ?>">
                            <a href="media.php">
                                Media Library
                            </a>
                        </li>


                    </ul>

                </li>


                <!-- =====================================================
                     ENGAGEMENT
                ====================================================== -->

                <li class="submenu">

                    <a href="#"
                       class="<?php echo $engagementActive ? 'subdrop' : ''; ?>">

                        <i class="fa fa-phone"></i>

                        <span>Engagement</span>

                        <span class="menu-arrow"></span>

                    </a>


                    <ul style="<?php echo $engagementActive ? 'display:block;' : 'display:none;'; ?>">


                        <li class="<?php echo ($currentPage == 'message-view.php') ? 'active' : ''; ?>">
                            <a href="message-view.php">
                                Messages
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'mail-view.php') ? 'active' : ''; ?>">
                            <a href="message-view.php">
                                Emails
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">
                            <a href="about.php">
                                Testimonials
                            </a>
                        </li>


                    </ul>

                </li>


                <!-- =====================================================
                     ADMINISTRATION
                ====================================================== -->

                <li class="submenu">

                    <a href="#"
                       class="<?php echo $administrationActive ? 'subdrop' : ''; ?>">

                        <i class="fa fa-lock"></i>

                        <span>Administration</span>

                        <span class="menu-arrow"></span>

                    </a>


                    <ul style="<?php echo $administrationActive ? 'display:block;' : 'display:none;'; ?>">


                        <!-- USER ACCOUNTS -->

                        <li class="submenu">

                            <a href="#"
                               class="<?php echo $userAccountsActive ? 'subdrop' : ''; ?>">

                                <span>User Accounts</span>

                                <span class="menu-arrow"></span>

                            </a>


                            <ul style="<?php echo $userAccountsActive ? 'display:block;' : 'display:none;'; ?>">


                                <li class="<?php echo ($currentPage == 'login.php') ? 'active' : ''; ?>">
                                    <a href="login.php">
                                        Login
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'register.php') ? 'active' : ''; ?>">
                                    <a href="register.php">
                                        Register
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'users.php') ? 'active' : ''; ?>">
                                    <a href="users.php">
                                        Registered Users
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'admins.php') ? 'active' : ''; ?>">
                                    <a href="admins.php">
                                        System Admins
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'forgot-password.php') ? 'active' : ''; ?>">
                                    <a href="forgot-password.php">
                                        Forgot Password
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'change-password.php') ? 'active' : ''; ?>">
                                    <a href="change-password.php">
                                        Change Password
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'error-404.php') ? 'active' : ''; ?>">
                                    <a href="error-404.php">
                                        Error 404
                                    </a>
                                </li>


                                <li class="<?php echo ($currentPage == 'error-500.php') ? 'active' : ''; ?>">
                                    <a href="error-500.php">
                                        Error 500
                                    </a>
                                </li>


                            </ul>

                        </li>

                    </ul>

                </li>


                <!-- =====================================================
                     ANALYTICS
                ====================================================== -->

                <li class="submenu">

                    <a href="#"
                       class="<?php echo $analyticsActive ? 'subdrop' : ''; ?>">

                        <i class="fa fa-line-chart"></i>

                        <span>Analytics</span>

                        <span class="menu-arrow"></span>

                    </a>


                    <ul style="<?php echo $analyticsActive ? 'display:block;' : 'display:none;'; ?>">


                        <li class="<?php echo ($currentPage == 'charts.php') ? 'active' : ''; ?>">
                            <a href="charts.php">
                                All Charts
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'tables.php') ? 'active' : ''; ?>">
                            <a href="tables.php">
                                All Tables
                            </a>
                        </li>


                    </ul>

                </li>


                <!-- =====================================================
                     SETTINGS
                ====================================================== -->

                <li class="submenu">

                    <a href="#"
                       class="<?php echo $settingsActive ? 'subdrop' : ''; ?>">

                        <i class="fa fa-cog"></i>

                        <span>Settings</span>

                        <span class="menu-arrow"></span>

                    </a>


                    <ul style="<?php echo $settingsActive ? 'display:block;' : 'display:none;'; ?>">


                        <li class="<?php echo ($currentPage == 'settings.php') ? 'active' : ''; ?>">
                            <a href="settings.php">
                                General Settings
                            </a>
                        </li>


                        <li class="<?php echo ($currentPage == 'profile.php') ? 'active' : ''; ?>">
                            <a href="profile.php">
                                Profile Settings
                            </a>
                        </li>


                    </ul>

                </li>


                <!-- =====================================================
                     VIEW WEBSITE
                ====================================================== -->

                <li>
                    <a href="../index.php">
                        <i class="fa fa-cube"></i>
                        <span>View Website</span>
                    </a>
                </li>


                <!-- =====================================================
                     LOGOUT
                ====================================================== -->

                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>


<!-- =============================================================
     SIDEBAR AUTO-SCROLL
============================================================== -->

<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Find the currently active sidebar item
    |--------------------------------------------------------------------------
    */

    var $activeItem = $('#sidebar-menu li.active').last();


    /*
    |--------------------------------------------------------------------------
    | Scroll sidebar to active item
    |--------------------------------------------------------------------------
    */

    if ($activeItem.length) {

        setTimeout(function () {

            var $sidebar = $('#sidebar .sidebar-inner');

            if ($sidebar.length) {

                var sidebarTop = $sidebar.offset().top;

                var activeTop = $activeItem.offset().top;

                var currentScroll = $sidebar.scrollTop();

                var activePosition =
                    currentScroll +
                    (activeTop - sidebarTop);

                var sidebarHeight = $sidebar.height();

                var activeHeight = $activeItem.outerHeight();


                /*
                |--------------------------------------------------------------------------
                | Put active item approximately in the middle
                |--------------------------------------------------------------------------
                */

                var targetScroll =
                    activePosition -
                    (sidebarHeight / 2) +
                    (activeHeight / 2);


                /*
                |--------------------------------------------------------------------------
                | Prevent negative scrolling
                |--------------------------------------------------------------------------
                */

                if (targetScroll < 0) {
                    targetScroll = 0;
                }


                /*
                |--------------------------------------------------------------------------
                | Scroll
                |--------------------------------------------------------------------------
                */

                $sidebar.animate({
                    scrollTop: targetScroll
                }, 500);

            }

        }, 500);

    }

});

</script>
