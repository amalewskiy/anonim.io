<?php

class Avatar
{
    private $img_name;
    private $tmp_img;

    function __construct($img_name, $tmp_img)
    {
        $this->img_name = $img_name;
        $this->tmp_img =  $tmp_img;
    }

    function get_name()
    {
        return $this->img_name;
    }

    function get_tmp()
    {
        return $this->tmp_img;
    }

    function set_img_name($name)
    {
        $this->img_name = $name;
    }
}
