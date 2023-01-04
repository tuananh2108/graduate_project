# Hướng dẫn cài đặt và chạy dự án trên hệ điều hành windows
## 1. Download source code
## 2. Download và cài đặt composer
  Link download: https://getcomposer.org/download/
## 3. Download và cài đặt xampp với php version 7.3
  Link download: https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.3.29/
## 4. Sau khi cài đặt xong xampp, bật Apache và MySql. Sau đó, truy cập đường dẫn http://localhost/phpmyadmin/ và tạo database có tên graduate_project
## 5. Sau khi đã hoàn tất cá bước trên, mở thư mục source code và chạy lần lượt các câu lệnh sau:
  ```
  $ composer install
  $ composer dump-autoload
  $ php artisan migrate
  $ php artisan db:seed
  $ php artisan serve
  ```
## 6. Để truy cập trang admin, sử dụng 1 trong 2 account sau:
  - account super admin (chủ cửa hàng): email: super-admin@cnc-store.com, password: 123456
  - account admin (nhân viên): email: admin@cnc-store.com, password: 123456
