<?php

/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/13/2015
 * @Time: 11:31 AM
 */
class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            ['id' => 1, 'title' => 'Hành Động', 'slug' => 'hanh-dong', 'parent_id' => 0, 'position' => 1],
            ['id' => 2, 'title' => 'Phiêu Lưu', 'slug' => 'phieu-luu', 'parent_id' => 0, 'position' => 2],
            ['id' => 3, 'title' => 'Kinh Dị', 'slug' => 'kinh-di', 'parent_id' => 0, 'position' => 3],
            ['id' => 4, 'title' => 'Tình Cảm', 'slug' => 'tinh-cam', 'parent_id' => 0, 'position' => 4],
            ['id' => 5, 'title' => 'Hoạt Hình', 'slug' => 'hoat-hinh', 'parent_id' => 0, 'position' => 5],
            ['id' => 6, 'title' => 'Võ Thuật', 'slug' => 'vo-thuat', 'parent_id' => 0, 'position' => 6],
            ['id' => 7, 'title' => 'Hài Hước', 'slug' => 'hai-huoc', 'parent_id' => 0, 'position' => 7],
            ['id' => 9, 'title' => 'Tâm Lý', 'slug' => 'tam-ly', 'parent_id' => 0, 'position' => 8],
            ['id' => 10, 'title' => 'Viễn Tưởng', 'slug' => 'vien-tuong', 'parent_id' => 0, 'position' => 9],
            ['id' => 11, 'title' => 'Thần Thoại', 'slug' => 'than-thoai', 'parent_id' => 0, 'position' => 10],
            ['id' => 12, 'title' => 'Cổ Trang', 'slug' => 'co-trang', 'parent_id' => 0, 'position' => 11],
            ['id' => 22, 'title' => 'Chiến Tranh', 'slug' => 'chien-tranh', 'parent_id' => 0, 'position' => 12],
            ['id' => 23, 'title' => 'Truyền Hình', 'slug' => 'truyen-hinh', 'parent_id' => 0, 'position' => 13],
            ['id' => 24, 'title' => 'Gia Đình', 'slug' => 'gia-dinh', 'parent_id' => 0, 'position' => 14],
            ['id' => 25, 'title' => 'Hình Sự', 'slug' => 'hinh-su', 'parent_id' => 0, 'position' => 15],
            ['id' => 26, 'title' => 'Học Đường', 'slug' => 'hoc-duong', 'parent_id' => 0, 'position' => 16],
            ['id' => 27, 'title' => 'Âm Nhạc', 'slug' => 'am-nhac', 'parent_id' => 0, 'position' => 17],
            ['id' => 28, 'title' => '18+', 'slug' => 'over-18', 'parent_id' => 0, 'position' => 18],
            ['id' => 29, 'title' => 'Giật Gân', 'slug' => 'giat-gan', 'parent_id' => 0, 'position' => 19],
            ['id' => 31, 'title' => 'Lãng Mạn', 'slug' => 'lang-man', 'parent_id' => 0, 'position' => 20],
            ['id' => 32, 'title' => 'Tài Liệu', 'slug' => 'tai-lieu', 'parent_id' => 0, 'position' => 21],
        ];
        DB::table('categories')->insert($categories);
    }
}