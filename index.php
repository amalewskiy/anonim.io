<?php
session_start();
if (isset($_SESSION['discard_after']) && time() < $_SESSION['discard_after']) {
    $_SESSION['discard_after'] = time() + 10;
    header("location: home/home.php");
} else {
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['discard_after'] = time() + 10;
    header("location: auth/sign_in.php");
}
