<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
$db=mysqli_connect('localhost:3307','root','','my_auto');
session_start();


require_once 'functions.php';
?>