<?php
$connect = @mysqli_connect('localhost','root','','form_authorization') or die('Connection failed');
mysqli_set_charset($connect,'utf8');
?>