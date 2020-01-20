<?php

require 'connect.php';

$id = $_GET['id'];

$delete = $db->prepare("DELETE FROM people WHERE id = ? ");

$delete->bind_param('i',$id);

if($delete->execute())
{
    header('location:index.php');
}