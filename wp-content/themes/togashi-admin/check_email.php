<?php
// Lấy thông tin email
$email = isset($_POST['email']) ? $_POST['email'] : false;
// Nếu email không có thì dừng, thông báo lỗi
if (!$email){
    die ('{error:"bad_request"}');
}
// Kết nối database
$conn = mysqli_connect('mysql2203.xserver.jp', 'tohgashi_ag', 'zuq7eihv', 'tohgashi_2017') or die ('{error:"bad_request"}');


// Khai báo biến lưu lỗi
$error = array(
    'error' => 'success',
    'email_dk' => ''
);

// Kiểm tra tên email
if ($email)
{
    $query = mysqli_query($conn, 'select count(*) as count from register_togashi where email_dk = \''.  addslashes($email).'\'');

    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['email'] = 'このメールアドレスは既に登録されています。';
        }
        else{
            $error['email'] ='';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}

// Trả kết quả về cho client
die (json_encode($error));


?>
