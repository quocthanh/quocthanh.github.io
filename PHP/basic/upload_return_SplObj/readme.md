**SplFileObject**:

+ là giao diện hướng  đối tượng để thao tác với 1 file
+ kế thừa từ class SplFileInfo,SplFileInfo cung cấp thông tin về file (size, date, path, …), còn SplFileObject cung cấp tương tác với file
+ có thể tạo các class kế thừa từ class này với nhiều chức năng có sẵn
+ cung cấp nhiều method hữu ích hơn như:
    + current(): trả về chuỗi của dòng hiện tại của file
    + seek(pos):  dịch con trỏ tới dòng thứ pos trong file
    + ...
+ Từ đó giúp ta ko cần phải đọc quá nhiều nội dung ko cần thiết -> giảm bộ nhớ
+ ko có hàm close handle lại, gán null vào handler để close

**Nhược**:
+ ko sử dụng được với các hàm có sẵn liên quan đến stream resource
