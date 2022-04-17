<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $invalid='Invalid URL';
    $invalidLong='Invalid user profile URL!';
    $return='Return to home';
    $uploadedHeader='Uploaded templates';
    $noUpload='No template uploaded.';
    $noDesc='No description';
}
elseif ($lang == 'vi'){
    $invalid='Liên kết bị lỗi';
    $invalidLong='Liên kết đến người dùng không hợp lệ!';
    $return='Quay về trang chủ';
    $uploadedHeader='Template đã tải lên';
    $noUpload='Chưa tải template nào lên.';
    $noDesc='Không có mô tả';
}
?>