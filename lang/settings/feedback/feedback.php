<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Feedback sent';
    $thank='Thanks for sending feedback!';
    $home='Return to home';
}
elseif ($lang == 'vi'){
    $title='Đã gửi phản hồi';
    $thank='Cảm ơn bạn đã gửi phản hồi!';
    $home='Về trang chủ';
}
?>