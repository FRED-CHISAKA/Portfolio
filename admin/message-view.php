<?php

    include "../include/config.php";
    include "header.php";
    include "sidebar.php";

    /* Get Message ID */
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: contact.php");
        exit;
    }

    $id = intval($_GET['id']);

    /* Fetch Message */
    $sql = "SELECT * FROM contact WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        header("Location: contact.php");
        exit;
    }

    $message = mysqli_fetch_assoc($result);

    /* Mark Message as Read */
    if ($message['status'] == 0) {

        $update_sql = "UPDATE contact SET status = 1 WHERE id = $id";
        mysqli_query($conn, $update_sql);

        // Update local status for display
        $message['status'] = 1;
    }

?>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-8">
                <h4 class="page-title">View Message</h4>
                <p class="text-muted">
                    View the complete message submitted through your contact form.
                </p>
            </div>

            <div class="col-sm-4 text-right m-b-20">

                <a href="contact.php"
                   class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left"></i>
                    Back to Messages
                </a>

            </div>
        </div>


        <!-- Message Details -->
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">

                    <!-- Card Header -->
                    <div class="card-header bg-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">
                                    <i class="bi bi-chat-left-text me-2"></i>
                                    <?= htmlspecialchars($message['subject']) ?>
                                </h5>

                                <small class="text-muted">
                                    Received on
                                    <?= date(
                                        'd M Y \a\t H:i',
                                        strtotime($message['created_at'])
                                    ) ?>
                                </small>
                            </div>

                            <?php if ($message['status'] == 1) { ?>

                                <span class="badge bg-success">
                                    <i class="bi bi-envelope-open me-1"></i>
                                    Read
                                </span>

                            <?php } else { ?>

                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-envelope me-1"></i>
                                    Unread
                                </span>

                            <?php } ?>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Sender -->
                        <div class="mb-4">

                            <h6 class="text-muted mb-2">Sender</h6>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;"
                                >
                                    <i class="bi bi-person text-primary fs-4"></i>
                                </div>

                                <div>
                                    <h6 class="mb-1">
                                        <?= htmlspecialchars($message['name']) ?>
                                    </h6>

                                    <a href="mailto:<?= htmlspecialchars($message['email']) ?>" class="text-muted">
                                        <?= htmlspecialchars($message['email']) ?>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Subject -->
                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Subject</h6>
                            <p class="mb-0"><?= htmlspecialchars($message['subject']) ?> </p>
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <h6 class="text-muted mb-2">Message</h6>

                            <div class="border rounded p-3 bg-light" style="white-space: pre-wrap;">
                                <?= htmlspecialchars($message['message']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Information -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">
                        <h5 class="mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            Message Information
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <small class="text-muted d-block">
                                Sender
                            </small>

                            <strong>
                                <?= htmlspecialchars($message['name']) ?>
                            </strong>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">
                                Email
                            </small>

                            <a href="mailto:<?= htmlspecialchars($message['email']) ?>">
                                <?= htmlspecialchars($message['email']) ?>
                            </a>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">
                                Date
                            </small>

                            <?= date(
                                'd M Y',
                                strtotime($message['created_at'])
                            ) ?>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">
                                Time
                            </small>

                            <?= date(
                                'H:i',
                                strtotime($message['created_at'])
                            ) ?>
                        </div>

                        <div class="mb-4">
                            <small class="text-muted d-block">
                                Status
                            </small>

                            <span class="badge bg-success">
                                <i class="bi bi-envelope-open me-1"></i>
                                Read
                            </span>
                        </div>

                        <!-- Reply -->
                        <a href="mailto:<?= htmlspecialchars($message['email']) ?>?subject=Re: <?= rawurlencode($message['subject']) ?>"
                            class="btn btn-primary btn-block mb-2"
                        >
                            <i class="fa fa-reply"></i>
                            Reply
                        </a>

                        <!-- Delete -->
                        <a href="message-delete.php?id=<?= $message['id'] ?>"
                            class="btn btn-outline-danger btn-block"
                            onclick="return confirm('Are you sure you want to delete this message?')"
                        >
                            <i class="fa fa-trash"></i>
                            Delete Message
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>