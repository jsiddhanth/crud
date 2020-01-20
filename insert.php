<?php

require 'connect.php';

if(isset($_POST['firstname'],$_POST['lastname'],$_POST['bio']))
{
    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $bio       = trim($_POST['bio']);
    $country   = trim($_POST['country']);
    if(!empty($firstname) && !empty($lastname) && !empty($bio) && !empty($country))
    {
        $insert = $db->prepare(
        "INSERT INTO people (first_name,last_name,bio,country,created) VALUES(?,?,?,?,NOW())"
        );

        $insert->bind_param('sssi',$firstname,$lastname,$bio,$country);

        if($insert->execute())
        {
            header('location:index.php');
        }
    }
}