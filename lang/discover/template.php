<?php
$lang=$_SESSION['lang'];

if ($lang == 'en-US'){
    $invalid='Invalid template URL';
    $invalidLong='Invalid template URL!';
    $return='Return to home';
    $uploadedBy='Uploaded by';
    $shareHeader='Share template:';
    $copiedNoti='Link copied to clipboard!';
    $downloadHeader='Download template:';
    $downloadBtn='Download';
    $previewHeader='Template preview:';
    $noPreview='No preview available.';
    $descHeader='Description:';
    $noDesc='No description.';
    $detailHeader='Template details:';
    $dateRow='Date uploaded';
    $cateRow='Category';
    $sizeRow='Size';
    $cateContent=array('technology'=>'Technology',
    'business'=>'Business',
    'education'=>'Education',
    'medical'=>'Medical',
    'science'=>'Science',
    'language'=>'Language',
    'society'=>'Society',
    'religion'=>'Religion',
    'culture'=>'Culture');
    $likeHeader='Like template:';
    $likeLabel='like(s)';
    $downloadLabel='downloads';
    $cmtHeader='Comments on template:';
    $noAccCmt='You have to login to comment!';
    $placeholderCmt='Type something...';
    $sendLabel='Send';
    $noCmt='No comments.';
    $cmtCountLabel='comment(s)';
    $noUserLike='You have to login to like this template!';
}
elseif ($lang == 'vi'){
    $invalid='Liên kết bị lỗi';
    $invalidLong='Liên kết đến template không hợp lệ!';
    $return='Quay về trang chủ';
    $uploadedBy='Tải lên bởi';
    $shareHeader='Chia sẻ template:';
    $copiedNoti='Đường link đã được sao chép vào bộ nhớ tạm!';
    $downloadHeader='Tải về template:';
    $downloadBtn='Tải xuống';
    $previewHeader='Xem trước template:';
    $noPreview='Không có bản xem trước khả dụng.';
    $descHeader='Mô tả:';
    $noDesc='Không có mô tả.';
    $detailHeader='Chi tiết về template:';
    $dateRow='Ngày tải lên';
    $cateRow='Danh mục';
    $sizeRow='Kích thước';
    $cateContent=array('technology'=>'Công nghệ',
    'business'=>'Kinh doanh',
    'education'=>'Giáo dục',
    'medical'=>'Y khoa',
    'science'=>'Khoa học',
    'language'=>'Ngôn ngữ',
    'society'=>'Xã hội',
    'religion'=>'Tôn giáo',
    'culture'=>'Văn hóa');
    $likeHeader='Thích template:';
    $likeLabel='lượt thích';
    $downloadLabel='lượt tải về';
    $cmtHeader='Bình luận về template:';
    $noAccCmt='Bạn phải đăng nhập để bình luận!';
    $placeholderCmt='Hãy nhập gì đó...';
    $sendLabel='Gửi';
    $noCmt='Không có bình luận.';
    $cmtCountLabel='bình luận';
    $noUserLike='Bạn phải đăng nhập để thích template này!';
}
?>
