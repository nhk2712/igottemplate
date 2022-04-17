<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $case1=['Upload error','Invalid file type!','Return to home','Upload again'];
    $case2=['Oops! There was an error while uploading the file.'];
    $case3=['Uploaded successfully','Uploaded template successfully!','Upload more','Back to home'];
}
elseif ($lang == 'vi'){
    $case1=['Tải lên bị lỗi','Loại file không hợp lệ!','Quay về trang chủ','Tải lên lại'];
    $case2=['Ôi! Đã có lỗi xảy ra khi tải file lên.'];
    $case3=['Tải lên thành công','Đã tải template lên thành công!','Tải thêm lên','Quay về trang chủ'];
}
?>