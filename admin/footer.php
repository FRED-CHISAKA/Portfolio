<!-- =========================================================
             MESSAGE SIDEBAR
        ========================================================== -->

        <div class="notification-box">

            <div class="msg-sidebar notifications msg-noti">


                <!-- Header -->
                <div class="topnav-dropdown-header">

                    <span>
                        Messages
                    </span>

                </div>


                <!-- Message List -->
                <div
                    class="drop-scroll msg-list-scroll"
                    id="msg_list"
                >

                    <ul class="list-box">


                        <?php

                        /*
                        |--------------------------------------------------------------------------
                        | GET RECENT MESSAGES
                        |--------------------------------------------------------------------------
                        */

                        $footer_messages = [];

                        if (isset($conn)) {

                            $footer_sql = "
                                SELECT
                                    id,
                                    name,
                                    email,
                                    subject,
                                    message,
                                    status,
                                    created_at
                                FROM contact
                                ORDER BY created_at DESC, id DESC
                                LIMIT 5
                            ";

                            $footer_result = mysqli_query(
                                $conn,
                                $footer_sql
                            );

                            if ($footer_result) {

                                while (
                                    $footer_message =
                                    mysqli_fetch_assoc($footer_result)
                                ) {

                                    $footer_messages[] =
                                        $footer_message;

                                }

                            }

                        }

                        ?>


                        <?php if (!empty($footer_messages)) { ?>


                            <?php foreach (
                                $footer_messages
                                as $footer_message
                            ) { ?>


                                <li>

                                    <a
                                        href="message-view.php?id=<?= $footer_message['id'] ?>"
                                    >

                                        <div
                                            class="list-item <?= $footer_message['status'] == 0 ? 'new-message' : '' ?>"
                                        >


                                            <!-- Avatar -->
                                            <div class="list-left">

                                                <span class="avatar">

                                                    <?= strtoupper(
                                                        substr(
                                                            htmlspecialchars(
                                                                $footer_message['name']
                                                            ),
                                                            0,
                                                            1
                                                        )
                                                    ) ?>

                                                </span>

                                            </div>


                                            <!-- Message Details -->
                                            <div class="list-body">

                                                <span class="message-author">

                                                    <?= htmlspecialchars(
                                                        $footer_message['name']
                                                    ) ?>

                                                </span>


                                                <span class="message-time">

                                                    <?= timeAgo(
                                                        $footer_message['created_at']
                                                    ) ?>

                                                </span>


                                                <div class="clearfix"></div>


                                                <span class="message-content">

                                                    <?= htmlspecialchars(
                                                        $footer_message['subject']
                                                    ) ?>

                                                </span>

                                            </div>

                                        </div>

                                    </a>

                                </li>


                            <?php } ?>


                        <?php } else { ?>


                            <li>

                                <div class="list-item">

                                    <div class="list-left">

                                        <span class="avatar">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>

                                    </div>


                                    <div class="list-body">

                                        <span class="message-author">
                                            No messages
                                        </span>

                                        <div class="clearfix"></div>

                                        <span class="message-content">
                                            You have no contact messages yet.
                                        </span>

                                    </div>

                                </div>

                            </li>


                        <?php } ?>


                    </ul>

                </div>


                <!-- Footer -->
                <div class="topnav-dropdown-footer">

                    <a href="messages.php">
                        See all messages
                    </a>

                </div>

            </div>

        </div>


        <!-- =========================================================
             SIDEBAR OVERLAY
        ========================================================== -->

        <div
            class="sidebar-overlay"
            data-reff=""
        ></div>


        <!-- =========================================================
             JAVASCRIPT
        ========================================================== -->

        <script src="assets/js/jquery-3.2.1.min.js"></script>

        <script src="assets/js/popper.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>

        <script src="assets/js/Chart.bundle.js"></script>

        <script src="assets/js/chart.js"></script>

        <script src="assets/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/js/select2.min.js"></script>

        <script src="assets/js/moment.min.js"></script>

        <script src="assets/js/tagsinput.js"></script>

        <script src="assets/js/jquery-ui.min.php"></script>

        <script src="assets/js/fullcalendar.min.js"></script>

        <script src="assets/js/jquery.fullcalendar.js"></script>

        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

        <script src="assets/js/app.js"></script>


        <!-- =========================================================
             DATETIME PICKERS
        ========================================================== -->



        




        <script>



            // $(document).ready(function () {

            //     var $activeItem = $('#sidebar-menu li.active').last();

            //     if ($activeItem.length) {

            //         setTimeout(function () {

            //             var $sidebarInner = $('.sidebar-inner');

            //             if ($sidebarInner.length) {

            //                 var activeOffset = $activeItem.offset().top;
            //                 var sidebarOffset = $sidebarInner.offset().top;

            //                 var scrollPosition =
            //                     $sidebarInner.scrollTop() +
            //                     (activeOffset - sidebarOffset) -
            //                     ($sidebarInner.height() / 2) +
            //                     ($activeItem.outerHeight() / 2);

            //                 $sidebarInner.animate({
            //                     scrollTop: scrollPosition
            //                 }, 500);

            //             }

            //         }, 300);

            //     }

            // });












            $(function () {

                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });

                $('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });

            });

        </script>

    </div>
    <!-- End main-wrapper -->

</body>

</html>