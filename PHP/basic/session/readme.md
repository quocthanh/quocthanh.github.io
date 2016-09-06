## Sessions

+ HTTP là 1 stateless protocol, không có cách để duy trì trạng thái giữa 2 transaction.
  Có nghĩa là nếu 1 user request 1 page, sau đó mở tab khác request tiếp page đó thì HTTP ko nói cho ta biết cả 2 request đều là cùng 1 user
+ Dùng session để phân biệt giữa các user
+ 1 session: 1 quá trình làm việc với 1 ứng dụng gồm mở, thao tác, đóng ứng dụng
+ Nội dung biến session lưu ở server, client chỉ có thể thấy được session ID
+ Session ID: 1 số mã hóa ngẫu nhiên, lưu ở client bằng cookie, và tồn tại trong 1 session
+ Session ID là để phân biệt các user, dùng để đăng ký biến session

-----------------------------------------------------------------------------------------------

**session_start():** bắt đầu 1 session

**session_destroy():** hủy 1 section

**$_SESSION:** superglobal, là 1 mảng chứa các biến session

-----------------------------------------------------------------------------------------------

## So sánh cookies và sessions

__cookies__:

Lưu ở  client, được gửi về server mỗi khi request

Tồn tại dựa vào thông số expires

User có thể thấy đc thông tin

Kích thước giới hạn

__sessions__:

Lưu ở server, client chỉ thấy session ID

Session ID phân biệt user

Tồn tại trong 1 session

Kích thước lớn hơn