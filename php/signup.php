<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($fname) && !empty($lname) && !empty($user) && !empty($password)) {
    if (filter_var($user, FILTER_SANITIZE_STRING)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user = '{$user}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$user - This user already exists.";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                            $ran_id = rand(time(), 100000000);
                            $status = "online";
                            $encrypt_pass = md5($password);
                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, user, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$user}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                            if ($insert_query) {
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE user = '{$user}'");
                                if (mysqli_num_rows($select_sql2) > 0) {
                                    $result = mysqli_fetch_assoc($select_sql2);
                                    $_SESSION['unique_id'] = $result['unique_id'];
                                    echo "success";
                                } else {
                                    echo "This user does not exist.";
                                }
                            } else {
                                echo "Something went wrong, please try again.";
                            }
                        }
                    } else {
                        echo "Please select an image in .jpeg, .png, .jpg format.";
                    }
                } else {
                    echo "Please select an image in .jpeg, .png, .jpg format.";
                }
            }
        }
    } else {
        echo "$user is not a valid user.";
    }
} else {
    echo "All fields are required.";
}
