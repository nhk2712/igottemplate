<?php
$lang =$_SESSION['lang'];

if($lang == 'en-US'){
    $title='Sign in';
    $username='Username';
    $password='Password';
}
elseif ($lang == 'vi'){
    $title='Đăng nhập';
    $username='Tên người dùng';
    $password='Mật khẩu';
}
?>