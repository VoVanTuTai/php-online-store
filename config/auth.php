<?php
function ensure_session_started() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function redirect_to_login() {
    header("Location: ../html/dangnhap.php");
    exit();
}

function require_login() {
    ensure_session_started();

    if (empty($_SESSION['user_id'])) {
        redirect_to_login();
    }
}

function require_admin() {
    require_login();

    if (!isset($_SESSION['phanquyen']) || (int) $_SESSION['phanquyen'] !== 1) {
        header("Location: ../html/home.php");
        exit();
    }
}
