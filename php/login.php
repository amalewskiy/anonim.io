<?php
session_start();
include_once "config.php";
$user = mysqli_real_escape_string($conn, $_POST['user']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($user) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE user = '{$user}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['password'];
        if ($user_pass === $enc_pass) {
            $status = "online";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if ($sql2) {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "Success";
            } else {
                echo "Something went wrong, please try again.";
            }
        } else {
            echo "Wrong username or password.";
        }
    } else {
        echo "$user - This user does not exist.";
    }
} else {
    echo "All data is required.";
}
