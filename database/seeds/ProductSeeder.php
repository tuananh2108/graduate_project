<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_code' => 'KC89001',
                'name' => 'PORCELAIN MEN KIM CƯƠNG SIÊU BÓNG KC89001',
                'price' => 260000,
                'info' => json_encode(["PORCELAIN MEN KIM CƯƠNG SIÊU BÓNG KC89001","Kích thước: 800x800mm","Chất liệu: Porcelain, phẳng","Công nghệ: Kim cương NANO siêu bóng","Màu: Xám tro - vân đá rễ cây","Bề mặt : Bề mặt: phẳng - siêu bóng, được phủ lớp men Kim Cương siêu cứng giúp chống trầy xước tốt","Độ bóng đạt 99%, Bóng nhưng không trơn - trượt"]),
                'img' => json_encode(["KC89001.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX6639',
                'name' => 'PORCELAIN MÀI BÓNG NANO LX6639',
                'price' => 180000,
                'info' => json_encode([null,null,null,null,null,null,null]),
                'img' => json_encode(["LX6639.jpg", "no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'W158001',
                'name' => 'Gạch ốp lát gỗ thanh cao cấp W158001',
                'price' => 200000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch ốp lát gỗ thanh cao cấp","Mã sản phẩm: W158001","Kích thước: 150x800mm","Chất liệu: Ceramic",null,null]),
                'img' => json_encode(["W158001.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 13,
            ],
            [
                'product_code' => 'LX8825',
                'name' => 'GẠCH PORCELAIN MÀI NANO SIÊU BÓNG LX8825',
                'price' => 230000,
                'info' => json_encode([null,null,null,null,null,null,null]),
                'img' => json_encode(["LX8825.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX8814',
                'name' => 'PORCELAIN MÀI NANO SIÊU BÓNG LX8814',
                'price' => 220000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch Porcelain mài nano siêu bóng","Mã sản phẩm: LX8814","Chất liệu: Porcelain xương bán sứ - độ cứng cao",null,null,null]),
                'img' => json_encode(["LX8814.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX8820',
                'name' => 'PORCELAIN MÀI NANO SIÊU BÓNG LX8820',
                'price' => 220000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch Porcelain mài nano siêu bóng","Mã sản phẩm: LX8820","Chất liệu: Porcelain xương bán sứ - độ cứng cao","Bề mặt: Phẳng - bóng",null,null]),
                'img' => json_encode(["LX8820.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX8821',
                'name' => 'PORCELAIN MÀI NANO SIÊU BÓNG LX8821',
                'price' => 220000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch Porcelain mài nano siêu bóng","Mã sản phẩm: LX8821","Chất liệu: Porcelain xương bán sứ - độ cứng cao","Bề mặt: Phẳng - bóng",null,null]),
                'img' => json_encode(["LX8821.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX8822',
                'name' => 'GẠCH LÁT MÀI NANO SIÊU BÓNG LX8822',
                'price' => 220000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch Porcelain mài nano siêu bóng","Mã sản phẩm: LX8822","Chất liệu: Porcelain xương bán sứ - độ cứng cao","Bề mặt: Phẳng - bóng",null,null]),
                'img' => json_encode(["LX8822.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX8823',
                'name' => 'GẠCH LÁT MÀI NANO SIÊU BÓNG LX8823',
                'price' => 220000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch Porcelain mài nano siêu bóng","Mã sản phẩm: LX8823","Chất liệu: Porcelain xương bán sứ - độ cứng cao","Bề mặt: Phẳng - bóng",null,null]),
                'img' => json_encode(["LX8823.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'LX8824',
                'name' => 'GẠCH LÁT MÀI NANO SIÊU BÓNG LX8824',
                'price' => 220000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch Porcelain mài nano siêu bóng","Mã sản phẩm: LX8824","Chất liệu: Porcelain xương bán sứ - độ cứng cao","Bề mặt: Phẳng - bóng",null,null]),
                'img' => json_encode(["LX8824.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 4,
            ],
            [
                'product_code' => 'GX6801',
                'name' => 'GẠCH LÁT NỀN MEN MATT GX6801',
                'price' => 165000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch lát nền men matt","Mã sản phẩm: GX6801","Chất liệu: Porcelain xương bán sứ - độ cứng cao","Bề mặt: Phẳng - nhám",null,null]),
                'img' => json_encode(["GX6801.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 7,
            ],
            [
                'product_code' => 'VN3302',
                'name' => 'GẠCH LÁT NỀN MEN SUGAR VN3302',
                'price' => 130000,
                'info' => json_encode(["Thương hiệu: CMC","Tên sản phẩm: Gạch lát nền men sugar","Mã sản phẩm: VN3302","Chất liệu: Ceramic","Bề mặt: Phẳng - nhám",null,null]),
                'img' => json_encode(["VN3302.jpg","no-img.jpg","no-img.jpg"]),
                'category_id' => 10,
            ],
        ]);
    }
}
