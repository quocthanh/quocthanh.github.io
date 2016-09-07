## Cookies

+ Cookies được sử dụng để lưu lại thông tin người dùng giúp ích cho những lần truy cập tiếp theo
+ 1 cookie là 1 file có kích thước nhỏ lưu ở máy người dùng
+ Mỗi khi user truy cập trang web, nó sẽ gửi kèm cookie lên server
+ PHP có thể nhận và tạo cookie
+ Cookie mất khi hết thời hạn, thời gian tồn tại của cookie được set trong hàm setcookie

### Setcookie(name, value, expire, path, domain, secure, httponly):
tạo ra cookie, chỉnh sửa cookie, xóa cookie, phải xuất hiện trước tag <html>.

Sau khi set cookie, ở lần request tiếp theo cookie sẽ được gửi cho server, dùng $_COOKIE để truy xuất, hoặc $_REQUEST cug đc

Để xóa cookie, set expire ở quá khứ

@param

Ngoài tham số __name__ ra thì các tham số còn lại đều là optional

+ **Name:** tên cookie
+ **Value:** giá trị
+ **Expire:** thời hạn để hủy cookie, tính bằng giây kể từ epoch, nếu bỏ qua, hoặc set 0, cookie sẽ hủy khi đóng browser
+ **Path:** đường dẫn (phạm vi) ở server có thể sử dụng cookie này, set ‘/’ để sử dụng ở toàn domain, giá trị mặc định là thư mục hiện tại
+ **Domain:** set subdomain có  thể sử dụng cookie này, khi đó subdomain và các subdomain của nó  sẽ sử dụng cookie, nên nếu set chính domain của server thì toàn bộ subdomain sẽ sử dụng đc
+ **Secure:** nếu set = truethif cookie sẽ chỉ đc set nếu connection là secure
+ **Httponly:** nếu set -= true thì js ko thể truy xuất cookie