<?php
session_start();
$category=$_GET['category'];
$type=$_GET['type'];
$_SESSION['category']=$category;
if($category=='footwears')
{
header('location:footwears.html');
}
?>
