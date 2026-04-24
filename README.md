# 👟 Quản Lý Web Bán Giày (Shop Cloudyy / SneakerHub)

Một hệ thống website thương mại điện tử chuyên bán giày thể thao chính hãng. Dự án bao gồm giao diện dành cho khách hàng (Frontend) và trang quản trị viên (Admin Dashboard) với đầy đủ các tính năng cần thiết của một trang web bán hàng thực tế.

## ✨ Các tính năng nổi bật

### 🛍️ Dành cho Khách hàng (User)
- Xem danh sách sản phẩm, chi tiết sản phẩm.
- Tìm kiếm và lọc sản phẩm theo danh mục.
- Thêm sản phẩm vào giỏ hàng, cập nhật số lượng.
- Tiến hành thanh toán (Checkout) đơn hàng.
- Viết đánh giá, bình luận (Review) và chấm điểm sao cho sản phẩm.
- Đăng ký, đăng nhập tài khoản.

### 🛡️ Dành cho Quản trị viên (Admin)
- **Bảo mật:** Đăng nhập để vào trang quản trị (được bảo vệ bởi Middleware).
- **Dashboard:** Thống kê tổng doanh thu, số lượng đơn hàng, số lượng sản phẩm.
- **Quản lý Sản phẩm:** Thêm, sửa, xóa sản phẩm và tải ảnh lên (Upload image).
- **Quản lý Đơn hàng:** Xem danh sách đơn hàng khách vừa đặt, chi tiết thông tin giao hàng, cập nhật trạng thái đơn hàng (Chờ xử lý, Đang giao, Đã giao, Đã hủy).

## 💻 Công nghệ sử dụng
- **Backend:** Laravel Framework (PHP).
- **Frontend:** HTML, Blade Templates, Tailwind CSS.
- **Database:** MySQL.
- **Khác:** FontAwesome (Icons).

## 🚀 Hướng dẫn Cài đặt & Chạy dự án (Local)

Làm theo các bước sau để chạy dự án trên máy tính của bạn:

**Bước 1: Clone mã nguồn về máy**
```bash
git clone [https://github.com/kyru1511/quan-ly-web-ban-giay.git](https://github.com/kyru1511/quan-ly-web-ban-giay.git)
cd quan-ly-web-ban-giay
## 📂 Cấu trúc thư mục chính (Folder Structure)

Dự án được tổ chức theo cấu trúc chuẩn của Laravel (MVC), dưới đây là các thư mục quan trọng nhất mà bạn cần lưu ý:

```text
quan-ly-web-ban-giay/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/       # Các Controller xử lý logic cho Admin (Quản lý giày, đơn hàng...)
│   │   │   └── Auth/        # Controller xử lý Đăng nhập, Đăng ký
│   │   └── Middleware/      # Chứa file kiểm tra quyền truy cập (vd: chỉ Admin mới được vào)
│   └── Models/              # Các Model tương tác với Database (Product, Order, User...)
├── database/
│   ├── migrations/          # Chứa các file code dùng để tạo bảng trong Database
│   └── seeders/             # Chứa file tạo dữ liệu mẫu (vd: tự động tạo tài khoản Admin)
├── public/
│   └── storage/             # Nơi chứa hình ảnh sản phẩm được upload lên
├── resources/
│   └── views/               # Nơi chứa toàn bộ giao diện của trang web (Blade Template)
│       ├── admin/           # Giao diện trang quản trị viên (Thêm sửa xóa sản phẩm)
│       ├── auth/            # Giao diện Đăng nhập / Đăng ký
│       └── ...              # Các trang khách hàng (Trang chủ, Chi tiết giày, Giỏ hàng)
├── routes/
│   └── web.php              # Nơi định nghĩa tất cả các đường link (URL) của website
├── .env.example             # File mẫu cấu hình Database (đổi thành .env khi chạy thật)
└── README.md                # File thông tin dự án (chính là file bạn đang đọc)
