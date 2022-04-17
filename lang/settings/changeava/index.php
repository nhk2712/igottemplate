<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Change avatar';
    $header='Change account\'s profile picture';
    $selectLabel='Select picture:';
    $sendBtn='Change picture';
}
elseif ($lang == 'vi'){
    $title='Thay đổi avatar';
    $header='Thay đổi hình đại diện hồ sơ';
    $selectLabel='Chọn hình ảnh:';
    $sendBtn='Thay đổi hình ảnh';
}
?>