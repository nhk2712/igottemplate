<?php
$lang =$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Error';
    $notExist='User does not exist. Wanna sign up?';
    $again='Sign in again';
    $signUp='Sign up';
    $home='Back to home';
    $wrong='Wrong password!';
}
else if ($lang == 'vi'){
    $title='Lỗi';
    $notExist='Người dùng không tồn tại. Muốn đăng kí?';
    $again='Đăng nhập lại';
    $signUp='Đăng kí';
    $home='Quay về trang chủ';
    $wrong='Sai mật khẩu!';
}
?>