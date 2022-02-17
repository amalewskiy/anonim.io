<?php

require_once 'Avatar.php';

class Signup
{
    public $connect;
    public $fname;
    public $lname;
    public $user;
    public $password;
    public $avatar;
    public $sql;

    function __construct($connect, $fname, $lname, $user, $password)
    {
        $this->connect = $connect;
        $this->fname = mysqli_real_escape_string($this->connect, $fname);
        $this->lname = mysqli_real_escape_string($this->connect, $lname);
        $this->user = mysqli_real_escape_string($this->connect, $user);
        $this->password = mysqli_real_escape_string($this->connect, $password);
    }

    function get_fname()
    {
        return $this->fname;
    }

    function get_lname()
    {
        return $this->lname;
    }

    function get_user()
    {
        return $this->user;
    }

    function get_password()
    {
        return $this->password;
    }

    function get_avatar()
    {
        return $this->avatar;
    }

    function is_user_exists()
    {
        $sql = mysqli_query($this->connect, "SELECT * FROM users WHERE user = '{$this->user}'");
        return mysqli_num_rows($sql) > 0 ? true : false;
    }

    function create_image($img_name, $tmp_img)
    {
        $this->avatar = new Avatar($img_name, $tmp_img);
    }

    function upload_image()
    {
        $time = time();
        $this->avatar->set_img_name($time . $this->avatar->get_name());
        return move_uploaded_file($this->avatar->get_tmp(), "images/" . $this->avatar->get_name());
    }

    function create_account()
    {
        $ran_id = rand(time(), 100000000);
        $encrypt_pass = md5($this->password);
        return mysqli_query($this->connect, "INSERT INTO users (unique_id, fname, lname, user, password, img, status)
                                VALUES ({$ran_id}, '{$this->fname}','{$this->lname}', '{$this->user}', '{$encrypt_pass}', '{$this->avatar->get_name()}', 'online')");
    }

    function get_user_from_db()
    {
        $this->sql = mysqli_query($this->connect, "SELECT * FROM users WHERE user = '{$this->user}'");
        return mysqli_num_rows($this->sql);
    }


    function get_sql()
    {
        return $this->sql;
    }
}
