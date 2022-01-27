<?php
session_start();
session_destroy();
$url = 'adminLogin.php';
header('Location: ' . $url);

?>