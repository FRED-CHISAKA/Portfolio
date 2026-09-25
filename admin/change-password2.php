<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon.jpg" style="border-radius: 50% !important;">
    <title>TechDive Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom-css.css">
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
                <div class="account-box">
                    <form class="form-signin" action="#">
						<div class="account-logo">
                            <a href="index.php"><img src="assets/img/icon.jpg" alt="" style="border-radius: 50% !important;"></a>
                        </div>
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="text" class="form-control" autofocus>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="login.php">Back to Login</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">Change Password</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="index.php"><img src="assets/img/icon.jpg" alt=""></a>
                        </div>
                        <form action="#">
                            <div class="form-group form-focus">
                                <label class="focus-label">Current Password</label>
                                <input class="form-control floating" type="password">
                            </div>
                            <div class="form-group form-focus">
                                <label class="focus-label">New Password</label>
                                <input class="form-control floating" type="password">
                            </div>
                            <div class="form-group form-focus">
                                <label class="focus-label">New Repeat Password</label>
                                <input class="form-control floating" type="password">
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Change Password</button>
                            </div>
                        </form>
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