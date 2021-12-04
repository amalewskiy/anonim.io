<?php
session_start();
if (isset($_SESSION['discard_after']) && time() > $_SESSION['discard_after']) {
    header("location: ../auth/sign_in.php");
} else {
    $_SESSION['discard_after'] = time() + 10;
    require('../header.php');
}
?>

<body>

    <h1>HOME</h1>


</body>