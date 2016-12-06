**file\_get\_contents(path, include_path, context, start, max-length)**: đọc nội dung của 1 file và chuyển nó thành 1 chuỗi, trả về chuỗi đó

@param

**path**: đường dẫn đến file

**include_path**: optional, context: optional

**start**: optional, chỉ chỗ bắt đầu đọc.

**max-length**: optional, đọc bao nhiêu byte.

Là 1 cách tốt để đọc nội dung của 1 file thành 1 chuỗi, sử dụng memory mapping để tăng hiệu quả
