## Hướng dẫn cài đặt sau khi clone source code từ github về:
Tại phpmyadmin tiến hành thêm một database mới. Import database vào mysql. Database được lưu trữ trong folder Database của project

Mở thư mục project vừa clone, mở command prompt từ thư mục và chạy lệnh theo thứ tự sau:

-	**composer install**
-	**composer update**
-	**cp .env.example .env**
-	**php artisan config:clear**
-	**php artisan cache:clear**
-	**php artisan key:generate**

Sau khi chạy xong, mở file .env lên và thay đổi **DB_DATABASE=laravel** thành **DB_DATABASE=<tên database vừa thêm>**

Ở phần MAIL cũng tiến hành thay đổi nội dung như sau:

**MAIL_DRIVER=smtp**

**MAIL_HOST=smtp.gmail.com <đây là server của gmail>**

**MAIL_PORT=587**

**MAIL_USERNAME=<tên mail dùng để gửi mật khẩu tài khoản>**

**MAIL_PASSWORD=<password của mail>**

**MAIL_ENCRYPTION=tls**

Để truy cập vào trang đăng nhập tài khoản
nhập đường dẫn như sau:

+ <-domain->/private hoặc <-domain->/login
+ Tài khoản admin: **admin@gmail.com**
+ Password: **123456**

## Hướng dẫn cài đặt sử dụng sau khi tải source code từ file zip về

Giải nén ra thư mục

Tại phpmyadmin tiến hành thêm một database mới. Import database vào mysql. Database được lưu trữ trong folder Database của project

Tại thư mục project vừa giải nén ra, mở command prompt  và chạy các lệnh sau:

-	**composer update**

-	**php artisan config:clear**

-	**php artisan cache:clear**

-	**php artisan key:generate**

-	**cp .env.example .env**
Để truy cập vào trang đăng nhập tài khoản
nhập đường dẫn như sau:
+ <-domain->/private hoặc <-domain->/login
+ Tài khoản admin: **admin@gmail.com**
+ Password: **123456**
