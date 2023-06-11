
<?php
$uri = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
$domain = $_SERVER['HTTP_HOST'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url3 = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = bin2hex($url3);
?>