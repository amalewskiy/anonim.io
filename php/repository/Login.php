<?php
class Login
{
    public $user;
    public $password;
    public $connect;
    public $sql;
    public $row;
    public $sql2;

    function __construct($connect, $user, $password)
    {
        $this->connect = $connect;
        $this->user = mysqli_real_escape_string($this->connect, $user);
        $this->password = mysqli_real_escape_string($this->connect, $password);
    }

    function get_user()
    {
        return $this->user;
    }

    function get_password()
    {
        return $this->password;
    }

    function get_user_from_db()
    {
        $this->sql = mysqli_query($this->connect, "SELECT * FROM users WHERE user = '{$this->user}'");
        return $this->sql;
    }

    function get_associative_array()
    {
        return mysqli_fetch_assoc($this->sql);
    }

    function check_password()
    {
        $this->row = $this->get_associative_array();
        return md5($this->password) === $this->row['password'];
    }

    function login_user()
    {
        $status = "online";
        $this->sql2 = mysqli_query($this->connect, "UPDATE users SET status = '{$status}' WHERE unique_id = {$this->row['unique_id']}");
        return $this->sql2;
    }
}
