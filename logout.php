<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['email']);
echo '<script language="javascript" type="text/javascript">';
echo 'window.location.href ="http://gradforce.xyz/planb/index.html";';
echo '</script>';
die();
// PHP script to call the logout function and kill the session
?>
