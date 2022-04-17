<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $title='Upload';
    $noUser='nouser-en-US.html';
    $h2='Upload a template';
    $select='Select file:';
    $tempName='Template name:';
    $accept='Only .ppt and .pptx files are accepted.';
    $maxLength='Maximum length is 50 charaters.';
    $description='Template description:';
    $thumb='Template thumbnail:';
    $category='Template category:';
    $cateContent=array('technology'=>'Technology',
    'business'=>'Business',
    'education'=>'Education',
    'medical'=>'Medical',
    'science'=>'Science',
    'language'=>'Language',
    'society'=>'Society',
    'religion'=>'Religion',
    'culture'=>'Culture');
    $selectCate='Choose a category';
}
elseif ($lang == 'vi'){
    $title='Tải lên';
    $noUser='nouser-vi.html';
    $h2='Tải template lên';
    $select='Chọn tệp:';
    $tempName='Tên template:';
    $accept='Chỉ có file .ppt và .pptx được chấp nhận.';
    $maxLength='Độ dài tối đa là 50 kí tự.';
    $description='Mô tả template:';
    $thumb='Hình thu nhỏ cho template:';
    $category='Danh mục template:';
    $cateContent=array('technology'=>'Công nghệ',
    'business'=>'Kinh doanh',
    'education'=>'Giáo dục',
    'medical'=>'Y khoa',
    'science'=>'Khoa học',
    'language'=>'Ngôn ngữ',
    'society'=>'Xã hội',
    'religion'=>'Tôn giáo',
    'culture'=>'Văn hóa');
    $selectCate='Hãy chọn một danh mục';
}
?>