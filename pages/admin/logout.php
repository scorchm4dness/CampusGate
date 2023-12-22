<?php

session_start();


session_unset();
session_destroy();


if (isset($_COOKIE['cookie_name'])) {
    unset($_COOKIE['cookie_name']);
    setcookie('cookie_name', '', time() - 3600, '/');
}


$cookie_value = 'cookie_value';
setcookie('new_cookie_name', $cookie_value, time() + 3600, '/');


header('Location: /CampusGate/pages/admin/landing_page.php');
exit();
?>