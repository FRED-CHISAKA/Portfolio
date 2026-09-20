<?php
    include_once "../include/config.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $user_id = 1;

    function e($value) {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }

    function redirect_resume($message = '', $type = 'success') {
        $url = 'resume.php';
        if ($message !== '') {
            $url .= '?msg=' . urlencode($message) . '&type=' . urlencode($type);
        }
        header("Location: $url");
        exit;
    }

    function post_string($name, $default = '') {
        return trim($_POST[$name] ?? $default);
    }

    function post_int($name, $default = 0) {
        return (int)($_POST[$name] ?? $default);
    }

    function require_id() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id || $id < 1) {
            redirect_resume('Invalid record ID.', 'danger');
        }
        return $id;
    }
?>
