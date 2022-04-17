<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Feedback';
    $titleLabel='Title (no more than 100 characters)';
    $rateLabel='Rating';
    $detailLabel='Detail';
    $sendLabel='Send';
}
elseif ($lang == 'vi'){
    $title='Phản hồi';
    $titleLabel='Tiêu đề (không quá 100 kí tự)';
    $rateLabel='Xếp hạng';
    $detailLabel='Chi tiết';
    $sendLabel='Gửi';
}
?>