<?php
session_start();
unset($_SESSION['uid']);
unset($_COOKIE['uid']);
setcookie('uid','',time() - 3600,'/',$_SERVER['SERVER_NAME'],false,true);
?>
<script>history.go(-1);</script>