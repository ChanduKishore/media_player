<?php 
session_start();
if(!isset($_SESSION['user'])){
header('Location:login.php');
}
header('Location:amzflip_video_tuts.php')
?>