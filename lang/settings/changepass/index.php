<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Change password';
    $header='Change account\'s password';
    $currentLabel='Current password:';
    $newLabel='New password:';
    $cfLabel='Confirm new password:';
    $btn='Change password';
}
elseif ($lang == 'vi'){
    $title='Đổi mật khẩu';
    $header='Thay đổi mật khẩu tài khoản';
    $currentLabel='Mật khẩu hiện tại:';
    $newLabel='Mật khẩu mới:';
    $cfLabel='Xác nhận mật khẩu mới:';
    $btn='Đổi mật khẩu';
}
?>