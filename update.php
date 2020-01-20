<?php

require 'connect.php';

$id = $_GET['id'];

if($result = $db->query("SELECT * FROM people WHERE id = $id"))
{
    $row = $result->fetch_object();
}

if(empty($_POST['firstname']))
{
    $firstname = $row->first_name;
}
else
{
    $firstname = $_POST['firstname'];
}

if(empty($_POST['lastname']))
{
    $lastname = $row->last_name;
}
else
{
    $lastname = $_POST['lastname'];
}

if(empty($_POST['bio']))
{
    $bio = $row->bio;
}
else
{
    $bio = $_POST['bio'];
}

if(empty($_POST['country']))
{
    $country = $row->country;
}
else
{
    $country = $_POST['country'];
}

if(!empty($firstname) && !empty($lastname) && !empty($bio))
{
    $update = $db->prepare(
    "UPDATE  people SET  first_name = ?,last_name = ?,bio = ?,country = ?,created = NOW() 
     WHERE id = $id"
    );

    $update->bind_param('sssi',$firstname,$lastname,$bio,$country);

    if($update->execute())
    {
        header('location:index.php');
    }

}