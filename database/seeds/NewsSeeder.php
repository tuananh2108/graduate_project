<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => "Tin tức mới nhất của CND",
                'content' => json_encode([null,null]),
                'img' => json_encode(["slide-8Zo.jpg","no-img.jpg"]),
                'status' => "show",
            ],
            [
                'title' => "Bộ sưu tập 2020 mới được CND cập nhật",
                'content' => json_encode([null,null]),
                'img' => json_encode(["slide-3D6.jpg","no-img.jpg"]),
                'status' => "show",
            ],
            [
                'title' => "Hướng dẫn cách chọn mẫu gạch cho ngôi nhà của bạn",
                'content' => json_encode([null,null]),
                'img' => json_encode(["slide-ZLa.jpg","no-img.jpg"]),
                'status' => "show",
            ],
        ]);
    }
}
