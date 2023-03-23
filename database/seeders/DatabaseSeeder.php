<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert( [
            'id' => 1,
            'name' => 'Phuc Tien',
            'email' => 'tiencacom20@gmail.com',
            'password' => Hash::make('123456'),
            'avatar' => null,
            'level' => 1,
            'description' => null,

            'company_name' => 'LapTop',
            'country' => 'Viet Nam',
            'street_address' => '1478',
            'postcode_zip' => '900000',
            'town_city' => 'Hau Giang',
            'phone' => '0123456789',
        ]);

        DB::table('users')->insert([
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ],
            [
                'id' => 3,
                'name' => 'Shane Lynch',
                'email' => 'ShaneLynch@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 2,
                'description' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo'
            ],
            [
                'id' => 4,
                'name' => 'Brandon Kelley',
                'email' => 'BrandonKelley@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 5,
                'name' => 'Roy Banks',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'description' => null,
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'The Personality Trait That Makes People Happier',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'This was one of our first days in Hawaii last week.',
                'image' => 'blog-2.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'image' => 'blog-4.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Writing has always been kind of therapeutic for me',
                'image' => 'blog-6.jpg',
                'category' => 'CodeLeanON',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Asus', //1
            ],
            [
                'name' => 'Lenovo', //2
            ],
            [
                'name' => 'Dell', //3
            ],
            [
                'name' => 'Acer', //4
            ],
            [
                'name' => 'HP', //5
            ],
            [
                'name' => 'MSI', //6
            ],
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'Laptop Gaming', //1
            ],
            [
                'name' => 'Laptop Đồ họa', //2
            ],
            [
                'name' => 'Laptop sinh viên', //3
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows 11)',
                'description' => 'Laptop ASUS TUF DashFA506ICB - HN355W đến từ thương hiệu Asus nổi tiếng được khá nhiều khách hàng ưa thích và tin dùng bởi sự chất lượng, hiệu năng làm việc vượt trội cùng với mức giá hợp lý. Ngoài ra, với thiết kế bắt mắt thu hút ánh nhìn nhiều đối tượng khách hàng, đặc biệt là giới game thủ. Hãy cùng Phong Vũ khám phá xem chiếc máy tính xách tay này có gì đặc biệt nhé!',
                'content' => 'Thương hiệu ASUS',
                'price' => 21990000,
                'qty' => 20,
                'discount' => 18990000,
                'weight' => 2.3,
                'sku' => '221000236',
                'featured' => true,
                'tag' => 'Gaming',
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Laptop ASUS Gaming ROG Strix G15 G513IH-HN015W (Ryzen 7 4800H/RAM 8GB/GTX 1650/512GB SSD/ Windows 11)',
                'description' => 'Laptop Asus Gaming ROG Strix G15 G513IH-HN015W mạnh mẽ với CPU AMD Ryzen 7 lên đến 8 nhân và GPU GeForce GTX, cung cấp hiệu năng vượt trội để xử lý các ứng dụng và trò chơi yêu thích. Chiếc laptop Asus cao cấp hứa hẹn là trợ thủ đắc lực để bạn chinh phục mọi đỉnh cao.',
                'content' => 'Thương hiệu ASUS',
                'price' => 22990000,
                'qty' => 20,
                'discount' => 19190000,
                'weight' => 2.1,
                'sku' => '220102043',
                'featured' => true,
                'tag' => 'Gaming',
            ],
            [
                'id' => 3,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Laptop ASUS Rog Strix G15 G513IE-HN192W (Ryzen 7 4800H/RAM 16GB/RTX 3050Ti/512GB SSD/ Windows 11)',
                'description' => 'Laptop Asus Rog Strix G15 G513IE-HN192W là dòng gaming cao cấp sở hữu hiệu năng đột phá từ chip Ryzen 7, mang đến trải nghiệm trò chơi mượt mà hấp dẫn. Đây hứa hẹn sẽ là chiếc laptop cấu hình cao phù hợp để người dùng thỏa mãn chiến game bất cứ lúc nào.',
                'content' => 'Thương hiệu ASUS',
                'price' => 27990000,
                'qty' => 20,
                'discount' => null,
                'weight' => 2.1,
                'sku' => 220401042,
                'featured' => true,
                'tag' => 'Đồ họa',
            ],
            [
                'id' => 4,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Laptop ASUS ROG Zephyrus GA503RW-LN076W (Ryzen 9 6900HS/RAM 32GB/RTX 3070 Ti/1TB SSD/ Windows 11)',
                'description' => 'Laptop ASUS ROG Zephyrus GA503RW-LN076W gây ấn tượng với người tiêu dùng ngay tại thời điểm ra mắt nhờ thiết kế đậm chất gaming cùng hiệu năng mạnh mẽ với bộ vi xử lý Ryzen 9. Sản phẩm không chỉ đáp ứng được nhu cầu chơi game mà còn hỗ trợ tốt các tác vụ văn phòng, giải trí cơ bản hay xử lý đồ hoạ với card RTX 3070 Ti 8GB GDDR6 siêu mạnh. ',
                'content' => 'Thương hiệu ASUS',
                'price' => 70990000,
                'qty' => 20,
                'discount' => 54990000,
                'weight' => 1.9,
                'sku' => 221000234,
                'featured' => true,
                'tag' => 'Đồ họa',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => "Laptop Asus Zenbook Flip 13 OLED UX363EA-HP726W (13.3inch Full HD/Intel Core i5-1135G7/8GB/512GB SSD/Windows 11 Home/1.3kg)",
                'description' => 'Laptop Asus UX363EA-HP726W nổi bật với thiết kế mỏng nhẹ và cũng sở hữu sức mạnh vượt trội từ chip Intel Core i5 thế hệ thứ 11, đảm bảo khả năng làm việc và trải nghiệm hiệu năng cao mượt mà. Phiên bản laptop đạt chuẩn Intel Evo cao cấp hứa hẹn sẽ là lựa chọn tuyệt vời đáng để đầu tư.',
                'content' => 'Thương hiệu ASUS',
                'price' => 24990000,
                'qty' => 20,
                'discount' => 18490000,
                'weight' => 1.3,
                'sku' => 211104788,
                'featured' => false,
                'tag' => 'Sinh viên',
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => 'Laptop ASUS Expertbook B1 B1500CBA-BQ0249W (i5-1235U/RAM 8GB/512GB SSD/ Windows 11)',
                'description' => 'Laptop ASUS Expertbook B1 B1500CBA-BQ0249W là một sản phẩm cao cấp của hãng ASUS với thiết kế đẹp mắt, hiệu năng ấn tượng và tính năng an toàn bảo mật cao. Máy được trang bị vi xử lý Intel Core i5-1235U, RAM 8GB và ổ cứng SSD 512GB giúp máy hoạt động mượt mà và xử lý nhanh các tác vụ. Laptop cũng được trang bị hệ thống âm thanh đạt chuẩn Harman Kardon và màn hình 15.6 inch Full HD IPS với viền mỏng, mang đến trải nghiệm giải trí tuyệt vời cho người dùng.',
                'content' => 'Thương hiệu ASUS',
                'price' => 21090000,
                'qty' => 20,
                'discount' => 19490000,
                'weight' => 1.7,
                'sku' => 221201474,
                'featured' => true,
                'tag' => 'Sinh viên',
            ],
            [
                'id' => 7,
                'brand_id' => 5,
                'product_category_id' => 2,
                'name' => 'Laptop HP Probook 450 G9 (i7-1255U/RAM 16GB/512GB SSD/ Windows 11)',
                'description' => 'Laptop HP Probook 450 G9 6M0Z9PA là một trong những sản phẩm ấn tượng thuộc dòng Probook của nhà HP. Không chỉ sở hữu hiệu năng mạnh mẽ với CPU Intel Core i7 mà còn mang vẻ ngoài hiện đại, sang trọng và tinh tế. Đây sẽ là lựa chọn hoàn hảo cho các bạn học sinh, sinh viên hay người làm công việc văn phòng với nhu cầu sử dụng cơ bản.',
                'content' => 'Thương hiệu HP',
                'price' => 26990000,
                'qty' => 20,
                'discount' => 23990000,
                'weight' => 1.7,
                'sku' => 220800857,
                'featured' => true,
                'tag' => 'Đồ họa',
            ],
            [
                'id' => 8,
                'brand_id' => 6,
                'product_category_id' => 2,
                'name' => 'Laptop MSI Gaming GF63 Thin 11SC (i5-11400H/RAM 8GB/GTX 1650/512GB SSD/ Windows 11)',
                'description' => 'Đang cập nhật',
                'content' => 'Thương hiệu MSI',
                'price' => 19490000,
                'qty' => 20,
                'discount' => 16490000,
                'weight' => 1.9,
                'sku' => 221101658,
                'featured' => true,
                'tag' => 'Đồ họa',
            ],
            [
                'id' => 9,
                'brand_id' => 6,
                'product_category_id' => 2,
                'name' => 'Laptop MSI Gaming GF63 Thin 11UC (i7-11800H/RAM 8GB/RTX 3050/512GB SSD/ Windows 11)',
                'description' => 'Đang cập nhật',
                'content' => 'Thương hiệu MSI',
                'price' => 25990000,
                'qty' => 20,
                'discount' => 23990000,
                'weight' => 1.8,
                'sku' => 220806390,
                'featured' => true,
                'tag' => 'Đồ họa',
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1-1.webp',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-2.webp',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-3.webp',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-1.webp',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-2.webp',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-3.webp',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-1.webp',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-2.webp',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-3.webp',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-1.webp',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-2.webp',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-3.webp',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-1.webp',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-2.webp',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-3.webp',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-1.webp',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-2.webp',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-3.webp',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-1.webp',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-2.webp',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-3.webp',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-1.webp',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-2.webp',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-3.webp',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-1.webp',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-2.webp',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-3.webp',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'color' => 'black',
                'RAM' => '8',
                'qty' => 20,
            ],
            [
                'product_id' => 2,
                'color' => 'black',
                'RAM' => '8',
                'qty' => 20,
            ],
            [
                'product_id' => 3,
                'color' => 'gray',
                'RAM' => '16',
                'qty' => 20,
            ],
            [
                'product_id' => 4,
                'color' => 'black',
                'RAM' => '32',
                'qty' => 20,
            ],
            [
                'product_id' => 5,
                'color' => 'gray',
                'RAM' => '8',
                'qty' => 20,
            ],
            [
                'product_id' => 6,
                'color' => 'black',
                'RAM' => '8',
                'qty' => 20,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'BrandonKelley@gmail.com',
                'name' => 'Brandon Kelley',
                'messages' => 'Sản phẩm tốt !',
                'rating' => 4,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Lỗi bàn phím!',
                'rating' => 2,
            ],
        ]);
    }
}

