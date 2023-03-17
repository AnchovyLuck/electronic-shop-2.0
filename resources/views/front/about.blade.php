@extends('front/layout/master')

@section('title', 'Home');

@section('body')
    <!--About Section Begin-->
    <main class="main">
        <article class="home">
            <div id="intro-members">
                <h1>
                    THÀNH VIÊN NHÓM
                </h1>
            </div>
            <section class="members">
                <div class="container">
                    <div class="icon">
                        <a href="https://www.facebook.com/anchovynut/"><i class="fa-brands fa-square-facebook"></i></a>
                    </div>
                    <img src="front/img/user/default-avatar.jpg" alt="">
                    <h2>Nguyễn Lê Phúc Tiến</h2>
                    <p>Ngã Bảy, Hậu Giang</p>
                    <p>Sinh viên đại học Cần Thơ</p>
                    <p>Chuyên Ngành: Tin học ứng dụng</p>
                    <p>Khóa: 44 | MSSV: B1809303</p>
                </div>
                <!--  -->
                <div class="container">
                    <img src="front/img/user/default-avatar.jpg" alt="">
                    <h2>Hồ Thiện Toàn</h2>
                    <p>Ninh Kiều, Cần Thơ</p>
                    <p>Sinh viên đại học Cần Thơ</p>
                    <p>Chuyên ngành: .........</p>
                    <p>Khóa: 42 | MSSV: B1605426</p>
                </div>
                <!--  -->

            </section>

            <div id="intro-project">
                <h1>
                    GIỚI THIỆU ĐỀ TÀI NHÓM
                </h1>
            </div>
            <section class="project-info">
                <h2 class="heading2">
                    Mô Tả Đề Tài
                </h2>

                <div class="describe" style="width: 80%; margin-left: auto; margin-right: auto;">
                    <p>
                        Đề tài nhóm chúng em thực hiện có chủ đề "Website bán laptop với Laravel".
                        Trong quá trình tìm hiểu, chúng em nhận thấy đây là một đề tài tương đối phổ biến và dễ thực hiện
                        nên chúng em đã quyết định chọn đề tài này.
                    </p>

                    <p>
                        Đồ án này được thực hiện với mục đích tạo ra một trang web đơn giản có đầy đủ
                        tính năng cơ bản cho khách hàng và admin.
                    </p>

                    <p>
                        Chúng em sẽ nỗ lực hết sức để hoàn thành đề tài một cách nhanh nhất và sẵn sàng nhận những đóng 
                        góp và ý kiến từ phía thầy cô và các bạn.
                    </p>
                    
                </div>

                <h2 class="heading2">
                    Các Chức Năng Chính (Dự Kiến)
                </h2>

                <div class="function" style="width: 80%; margin-left: auto; margin-right: auto;">
                    <p>
                        Trang web trong đề tài của chúng em dự kiến có những chức năng chính như sau:
                    </p>
                    <ul>
                        <li><h5>Đối với khách hàng:</h5></li>
                        <li>
                            <span>Tìm kiếm và phân loại laptop:</span> Người dùng có thể tìm kiếm laptop theo nhiều tiêu chí khác nhau,
                            bao gồm đối tượng sử dụng, tên thương hiệu, giá cả, dung lượng RAM.
                        </li>
                        <li>
                            <span>Giỏ hàng:</span> Người dùng có thể thêm sản phẩm vào giỏ hàng và quản lý giỏ hàng của mình trên
                            trang web. Trang web cũng sẽ tính toán tổng số tiền của giỏ hàng để người dùng có thể kiểm
                            tra trước khi thanh toán.
                        </li>
                        <li>
                            <span>Giao hàng tận nơi (optional):</span> Trang web sẽ tích hợp các dịch vụ giao hàng để đáp ứng nhu cầu của người
                            dùng. Người dùng có thể chọn các hình thức giao hàng khác nhau, bao gồm giao hàng tận nơi,
                            giao hàng tại nhà sách, và nhiều hình thức khác nữa.
                        </li>
                        <li>
                            <span>Đánh giá và bình luận:</span> Người dùng có thể đánh giá và bình luận về các sản phẩm trên trang
                            web để giúp người dùng khác có thể tham khảo và lựa chọn sản phẩm phù hợp.
                        </li>
                        <li>
                            <span>Tài khoản cá nhân:</span> Người dùng có thể đăng ký tài khoản cá nhân để quản lý thông tin và lịch
                            sử mua hàng của mình trên trang web.
                        </li>
                    </ul>
                    <ul>
                        <li><h5>Đối với admin:</h5></li>
                        <li>
                            <span>Các chức năng CRUD:</span> Admin có thể thêm, sửa, xóa, xem danh sách các sản phẩm, thương hiệu, 
                            người dùng có trong cơ sở dữ liệu thông qua trang dành cho admin.
                        </li>
                    </ul>
                </div>

            </section>

        </article>
    </main>
    <!--About Section End-->
@endsection