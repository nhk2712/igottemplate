<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Settings';
    $webSettings='Website settings';
    $language='Language';
    $save='Save settings';
    $accountPref='Account preferences';
    $changeAva='Change profile picture';
    $changeUsername='Change username';
    $changePass='Change password';
    $feedback='Feedback';
    $about='About';
    $noUser='You have to sign in to manage your account.';
    $feedbackLink='Send feedback to us';
}
elseif ($lang == 'vi'){
    $title='Cài đặt';
    $webSettings='Cài đặt website';
    $language='Ngôn ngữ';
    $save='Lưu cài đặt';
    $accountPref='Cài đặt tài khoản';
    $changeAva='Đổi hình đại diện';
    $changeUsername='Đổi tên người dùng';
    $changePass='Đổi mật khẩu';
    $feedback='Phản hồi';
    $about='Giới thiệu';
    $noUser='Bạn phải đăng nhập để quản lý tài khoản.';
    $feedbackLink='Gửi phản hồi cho chúng tôi';
}
?>