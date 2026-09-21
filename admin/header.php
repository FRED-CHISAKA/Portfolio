<?php
/*
|--------------------------------------------------------------------------
| HEADER
|--------------------------------------------------------------------------
| Make sure config.php is included before header.php on your pages.
| Your existing admin pages already do this:
|
| include "../include/config.php";
| include "header.php";
|
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| UNREAD CONTACT MESSAGES
|--------------------------------------------------------------------------
*/

$unread_count = 0;
$recent_messages = [];

if (isset($conn)) {

    // Count unread messages
    $unread_sql = "
        SELECT COUNT(*) AS total
        FROM contact
        WHERE status = 0
    ";

    $unread_result = mysqli_query($conn, $unread_sql);

    if ($unread_result) {
        $unread_data = mysqli_fetch_assoc($unread_result);
        $unread_count = (int) $unread_data['total'];
    }


    /*
    |--------------------------------------------------------------------------
    | GET RECENT CONTACT MESSAGES
    |--------------------------------------------------------------------------
    | Shows the latest 5 messages in the header.
    */

    $recent_sql = "
        SELECT id, name, email, subject, message, status, created_at
        FROM contact
        ORDER BY created_at DESC, id DESC
        LIMIT 5
    ";

    $recent_result = mysqli_query($conn, $recent_sql);

    if ($recent_result) {

        while ($row = mysqli_fetch_assoc($recent_result)) {
            $recent_messages[] = $row;
        }

    }
}


/*
|--------------------------------------------------------------------------
| TIME AGO FUNCTION
|--------------------------------------------------------------------------
*/

function timeAgo($datetime)
{
    $timestamp = strtotime($datetime);

    if (!$timestamp) {
        return '';
    }

    $difference = time() - $timestamp;

    if ($difference < 60) {
        return 'Just now';
    }

    if ($difference < 3600) {
        $minutes = floor($difference / 60);
        return $minutes . ' min' . ($minutes != 1 ? 's' : '') . ' ago';
    }

    if ($difference < 86400) {
        $hours = floor($difference / 3600);
        return $hours . ' hour' . ($hours != 1 ? 's' : '') . ' ago';
    }

    if ($difference < 604800) {
        $days = floor($difference / 86400);
        return $days . ' day' . ($days != 1 ? 's' : '') . ' ago';
    }

    return date('d M Y', $timestamp);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="assets/img/icon.jpg"
        style="border-radius: 50% !important;"
    >

    <title>Chisaka Fred - Admin Panel</title>

    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        type="text/css"
        href="assets/css/bootstrap.min.css"
    >

    <link
        rel="stylesheet"
        type="text/css"
        href="assets/css/font-awesome.min.css"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        rel="stylesheet"
        type="text/css"
        href="assets/css/style.css"
    >

    <link
        rel="stylesheet"
        type="text/css"
        href="assets/css/custom-css.css"
    >

</head>

<body>

<div class="main-wrapper">

    <!-- HEADER -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">

            <a href="index.php" class="logo">

                <img
                    src="assets/img/icon.jpg"
                    width="35"
                    height="35"
                    alt="Chisaka Fred"
                    style="border-radius: 50% !important;"
                >

                <span>Chisaka Fred</span>

            </a>

        </div>


        <!-- Toggle Button -->
        <a
            id="toggle_btn"
            href="javascript:void(0);"
        >
            <i class="fa fa-bars"></i>
        </a>


        <!-- Mobile Button -->
        <a
            id="mobile_btn"
            class="mobile_btn float-left"
            href="#sidebar"
        >
            <i class="fa fa-bars"></i>
        </a>


        <!-- USER MENU -->
        <ul class="nav user-menu float-right">


            <!-- =======================================================
                 NOTIFICATIONS
            ======================================================== -->

            <li class="nav-item dropdown d-none d-sm-block">

                <a
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown"
                >

                    <i class="fa fa-bell-o"></i>

                    <?php if ($unread_count > 0) { ?>

                        <span class="badge badge-pill bg-danger float-right">
                            <?= $unread_count ?>
                        </span>

                    <?php } ?>

                </a>


                <div class="dropdown-menu notifications">

                    <div class="topnav-dropdown-header">

                        <span>
                            Notifications
                        </span>

                    </div>


                    <div class="drop-scroll">

                        <ul class="notification-list">


                            <?php if ($unread_count > 0) { ?>

                                <?php foreach ($recent_messages as $notification) { ?>

                                    <?php if ($notification['status'] == 0) { ?>

                                        <li class="notification-message">

                                            <a
                                                href="message-view.php?id=<?= $notification['id'] ?>"
                                            >

                                                <div class="media">

                                                    <span class="avatar">

                                                        <?= strtoupper(
                                                            substr(
                                                                htmlspecialchars($notification['name']),
                                                                0,
                                                                1
                                                            )
                                                        ) ?>

                                                    </span>


                                                    <div class="media-body">

                                                        <p class="noti-details">

                                                            <span class="noti-title">
                                                                <?= htmlspecialchars(
                                                                    $notification['name']
                                                                ) ?>
                                                            </span>

                                                            sent you a new message.

                                                        </p>


                                                        <p class="noti-time">

                                                            <span class="notification-time">

                                                                <?= timeAgo(
                                                                    $notification['created_at']
                                                                ) ?>

                                                            </span>

                                                        </p>

                                                    </div>

                                                </div>

                                            </a>

                                        </li>

                                    <?php } ?>

                                <?php } ?>


                            <?php } else { ?>

                                <li class="notification-message">

                                    <div class="media">

                                        <span class="avatar">
                                            <i class="fa fa-check"></i>
                                        </span>

                                        <div class="media-body">

                                            <p class="noti-details">
                                                No new notifications.
                                            </p>

                                            <p class="noti-time">
                                                <span class="notification-time">
                                                    You're all caught up.
                                                </span>
                                            </p>

                                        </div>

                                    </div>

                                </li>

                            <?php } ?>


                        </ul>

                    </div>


                    <div class="topnav-dropdown-footer">

                        <a href="messages.php">
                            View all Messages
                        </a>

                    </div>

                </div>

            </li>


            <!-- =======================================================
                 MESSAGES ICON
            ======================================================== -->

            <li class="nav-item dropdown d-none d-sm-block">

                <a
                    href="javascript:void(0);"
                    id="open_msg_box"
                    class="hasnotifications nav-link"
                >

                    <i class="fa fa-comment-o"></i>

                    <?php if ($unread_count > 0) { ?>

                        <span class="badge badge-pill bg-danger float-right">
                            <?= $unread_count ?>
                        </span>

                    <?php } ?>

                </a>

            </li>


            <!-- =======================================================
                 ADMIN PROFILE
            ======================================================== -->

            <li class="nav-item dropdown has-arrow">

                <a
                    href="#"
                    class="dropdown-toggle nav-link user-link"
                    data-toggle="dropdown"
                >

                    <span class="user-img">

                        <img
                            class="rounded-circle"
                            src="assets/img/user.jpg"
                            width="24"
                            alt="Admin"
                        >

                        <span class="status online"></span>

                    </span>

                    <span>Admin Panel</span>

                </a>


                <div class="dropdown-menu">

                    <a
                        class="dropdown-item"
                        href="profile.php"
                    >
                        My Profile
                    </a>

                    <a
                        class="dropdown-item"
                        href="edit-profile.php"
                    >
                        Edit Profile
                    </a>

                    <a
                        class="dropdown-item"
                        href="settings.php"
                    >
                        Settings
                    </a>

                    <a
                        class="dropdown-item"
                        href="login.php"
                    >
                        Logout
                    </a>

                </div>

            </li>

        </ul>


        <!-- MOBILE USER MENU -->
        <div class="dropdown mobile-user-menu float-right">

            <a
                href="#"
                class="dropdown-toggle"
                data-toggle="dropdown"
                aria-expanded="false"
            >
                <i class="fa fa-ellipsis-v"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <a
                    class="dropdown-item"
                    href="profile.php"
                >
                    My Profile
                </a>

                <a
                    class="dropdown-item"
                    href="edit-profile.php"
                >
                    Edit Profile
                </a>

                <a
                    class="dropdown-item"
                    href="settings.php"
                >
                    Settings
                </a>

                <a
                    class="dropdown-item"
                    href="login.php"
                >
                    Logout
                </a>

            </div>

        </div>

    </div>