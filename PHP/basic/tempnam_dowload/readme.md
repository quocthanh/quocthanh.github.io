### tempnam(dir, prefix):
tạo 1 file tạm thời với tên duy nhất trong thư mục được chỉ ra.

Nếu success trả về path của file được tạo ra, nếu fail thì trả về false

@param

+ **dir:** nếu thư mục ko tồn tại thì sẽ tạo 1 file trong thư mục temporary của hệ thống
+ **prefix:** chỉ ra phần đầu của tên file, windows chỉ sử dụng 3 ký tự đầu tiên của prefix

### fputcsv(file, field, separator, enclosure):

ghi dữ liệu vào file theo dạng csv từ array

@param

+ **file:** file handle để ghi vào
+ **field:** array để lấy data
+ **separator:** optional, dấu phân cách, mặc định là ‘,’

### rename(oldname, newname):
đặt lại tên cho thư mục hoặc file

trả về true nếu success, false nếu fail