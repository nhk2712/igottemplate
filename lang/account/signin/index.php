<?php
$lang =$_SESSION['lang'];

if($lang == 'en-US'){
    $title='Sign in';
    $username='Username';
    $password='Password';
    $forgot='Forgot password';
}
elseif ($lang == 'vi'){
    $title='Đăng nhập';
    $username='Tên người dùng';
    $password='Mật khẩu';
    $forgot='Quên mật khẩu';
}
?>