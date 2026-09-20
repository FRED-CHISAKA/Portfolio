<?php

    include "../include/config.php";
    include "header.php";
    include "sidebar.php";

    // Get all messages
    $sql = "SELECT * FROM contact ORDER BY created_at DESC, id DESC";

    $result = mysqli_query($conn, $sql);

    // Total messages
    $total_sql = "SELECT COUNT(*) AS total FROM contact";

    $total_result = mysqli_query($conn, $total_sql);
    $total_data = mysqli_fetch_assoc($total_result);

    $total_messages = $total_data['total'];

    // Unread messages
    $unread_sql = "SELECT COUNT(*) AS total FROM contact WHERE status = 0";

    $unread_result = mysqli_query($conn, $unread_sql);
    $unread_data = mysqli_fetch_assoc($unread_result);

    $unread_messages = $unread_data['total'];

    // Read messages
    $read_sql = "SELECT COUNT(*) AS total FROM contact WHERE status = 1";

    $read_result = mysqli_query($conn, $read_sql);
    $read_data = mysqli_fetch_assoc($read_result);

    $read_messages = $read_data['total'];

?>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Messages</h4>
                <p>Manage messages received through your contact form.</p>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-Services.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Edit Resume</a>
            </div>
        </div>
    </div>

    <!-- MESSAGE STATISTICS -->
    <div class="row g-3 mb-4">
        <!-- Total Messages -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>

                            <p class="text-muted mb-1">
                                Total Messages
                            </p>

                            <h3 class="mb-1">
                                <?= $total_messages ?>
                            </h3>

                            <small class="text-muted">
                                All received messages
                            </small>
                        </div>

                        <div
                            class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-envelope text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unread -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">
                                Unread
                            </p>

                            <h3 class="mb-1">
                                <?= $unread_messages ?>
                            </h3>

                            <small class="text-muted">
                                Awaiting review
                            </small>
                        </div>

                        <div
                            class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-envelope-exclamation text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Read -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">
                                Read
                            </p>

                            <h3 class="mb-1">
                                <?= $read_messages ?>
                            </h3>

                            <small class="text-muted">
                                Messages reviewed
                            </small>
                        </div>

                        <div
                            class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-envelope-open text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MESSAGES TABLE -->
    <div class="card shadow-sm border-0">

        <!-- Card Header -->
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h3 class="h5 mb-1">
                        <i class="bi bi-chat-left-text me-2"></i>
                        Contact Messages
                    </h3>

                    <p class="text-muted small mb-0">
                        Messages submitted through your website contact form.
                    </p>
                </div>

                <span class="badge bg-primary">
                    <?= $total_messages ?>
                    Message<?= $total_messages == 1 ? '' : 's' ?>
                </span>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            <?php if ($result && mysqli_num_rows($result) > 0) { ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>Sender</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-end"> Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $number = 1;
                                while ($message = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr
                                    class="<?= $message['status'] == 0 ? 'table-warning' : '' ?>"
                                >
                                    <!-- Number -->
                                    <td><?= $number++ ?></td>

                                    <!-- Sender -->
                                    <td>
                                        <strong>
                                            <?= htmlspecialchars(
                                                $message['name']
                                            ) ?>
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            <?= htmlspecialchars(
                                                $message['email']
                                            ) ?>
                                        </small>
                                    </td>

                                    <!-- Subject -->
                                    <td>
                                        <strong>
                                            <?= htmlspecialchars(
                                                $message['subject']
                                            ) ?>
                                        </strong>
                                    </td>

                                    <!-- Message -->
                                    <td>
                                        <div
                                            class="text-truncate"
                                            style="max-width: 300px;"
                                            title="<?= htmlspecialchars(
                                                $message['message']
                                            ) ?>"
                                        >

                                            <?= htmlspecialchars(
                                                $message['message']
                                            ) ?>
                                        </div>
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        <span class="text-nowrap">
                                            <?= date(
                                                'd M Y',
                                                strtotime(
                                                    $message['created_at']
                                                )
                                            ) ?>
                                        </span>

                                        <br>

                                        <small class="text-muted">
                                            <?= date(
                                                'H:i',
                                                strtotime(
                                                    $message['created_at']
                                                )
                                            ) ?>
                                        </small>
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        <?php if ($message['status'] == 0) { ?>
                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-envelope me-1"></i>
                                                Unread
                                            </span>
                                        <?php } else { ?>
                                            <span class="badge bg-success">
                                                <i class="bi bi-envelope-open me-1"></i>
                                                Read
                                            </span>

                                        <?php } ?>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <div class="btn-group">

                                            <!-- View -->
                                            <a
                                                href="message-view.php?id=<?= $message['id'] ?>"
                                                class="btn btn-sm btn-outline-primary"
                                                title="View Message"
                                            >
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a
                                                href="message-delete.php?id=<?= $message['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete Message"
                                                onclick="return confirm('Are you sure you want to delete this message?')"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            <?php } else { ?>

                <!-- Empty State -->
                <div class="text-center py-5">
                    <i class="bi bi-envelope-open fs-1 text-muted"></i>
                    <h5 class="mt-3">
                        No Messages Found
                    </h5>

                    <p class="text-muted mb-0">
                        You haven't received any messages through your contact form yet.
                    </p>
                </div>

            <?php } ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>