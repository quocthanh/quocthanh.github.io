**Fopen(path, mode)**: cung cấp nhiều thứ hơn readfile(), có thể dùng để tạo file mới, trả về file pointer , nếu fail sẽ trả về false, và error, hide error bằng cách thêm dấu “@” trc function

**Mode**:

+ r: chỉ được đọc, con trỏ nằm ở vị trí bắt đầu của file.
+ r+: đọc hoặc ghi, sau 1 tác vụ đọc hoặc ghi con trỏ nằm ở vị trí bắt đầu của file.
+ w: chỉ ghi, xóa nội dung trc đó, hoặc tạo mới  nếu file chưa có, con trỏ nằm ở vị trí bắt đầu của file.
+ w+: ghi hoặc đọc, xóa nội dung trc đó, hoặc tạo mới  nếu file chưa có, con trỏ nằm ở vị trí bắt đầu của file.
+ a: chỉ ghi, nội dung trc đó đc giữ lại, con trỏ nằm ở vị trí kết thúc của file, nếu  chưa có thì tạo mới
+ a+: tương tự a, có thể đọc.
+ x: chỉ ghi, tạo ra 1 file mới, trả về false  nếu file đã tồn tại.
+ x+: đọc/ghi, còn lại tương tự x.

**fread(openFile, size)**: đọc 1 file đã được mở với số byte đc chỉ ra
VD: fread($myfile,filesize("webdictionary.txt")); đọc toàn bộ file
