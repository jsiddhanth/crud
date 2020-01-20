<?php

$db = new mysqli('localhost','root','','app');

if($db->connect_errno)
{
    echo $db->connect_error;
    die('server issues');
}