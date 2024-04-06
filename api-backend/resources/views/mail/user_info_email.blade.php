<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send User Info</title>
</head>

<body>
    <p>Xin chào anh/chị</p>
    <p>Anh/chị đã đăng ký thành công tài khoản trên hệ thống, chúng tôi gửi cho bạn thông tin đăng nhập hệ thống: </p>
    <p>Tên cửa hàng: <strong>{{ $shopName }}</strong></p>
    <p>Thành phố: <strong>{{ $city }}</strong></p>
    <p>Quận/huyện: <strong>{{ $district }}</strong></p>
    <p>Email: <strong>{{ $email }}</strong></p>
    <p>Mật khẩu: <strong>{{ $password }}</strong></p>
    <p>Vui lòng đăng nhập hệ thống.</p>
    <p>Trân trọng</p>
    <p><strong>Training Team</strong></p>
</body>

</html>