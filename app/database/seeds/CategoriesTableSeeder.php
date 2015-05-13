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
            ['id' => 1, 'title' => 'Hành Động', 'slug' => Str::slug('Hành Động'), 'parent_id' => 0, 'position' => 1],
            ['id' => 2, 'title' => 'Phiêu Lưu', 'slug' => Str::slug('Phiêu Lưu'), 'parent_id' => 0, 'position' => 2],
            ['id' => 3, 'title' => 'Kinh Dị', 'slug' => Str::slug('Kinh Dị'), 'parent_id' => 0, 'position' => 3],
            ['id' => 4, 'title' => 'Tình Cảm', 'slug' => Str::slug('Tình Cảm'), 'parent_id' => 0, 'position' => 4],
            ['id' => 5, 'title' => 'Hoạt Hình', 'slug' => Str::slug('Hoạt Hình'), 'parent_id' => 0, 'position' => 5],
            ['id' => 6, 'title' => 'Võ Thuật', 'slug' => Str::slug('Võ Thuật'), 'parent_id' => 0, 'position' => 6],
            ['id' => 7, 'title' => 'Hài Hước', 'slug' => Str::slug('Hài Hước'), 'parent_id' => 0, 'position' => 7],
            ['id' => 9, 'title' => 'Tâm Lý', 'slug' => Str::slug('Tâm Lý'), 'parent_id' => 0, 'position' => 8],
            ['id' => 10, 'title' => 'Viễn Tưởng', 'slug' => Str::slug('Viễn Tưởng'), 'parent_id' => 0, 'position' => 9],
            ['id' => 11, 'title' => 'Thần Thoại', 'slug' => Str::slug('Thần Thoại'), 'parent_id' => 0, 'position' => 10],
            ['id' => 12, 'title' => 'Cổ Trang', 'slug' => Str::slug('Cổ Trang'), 'parent_id' => 0, 'position' => 11],
            ['id' => 22, 'title' => 'Chiến Tranh', 'slug' => Str::slug('Chiến Tranh'), 'parent_id' => 0, 'position' => 12],
            ['id' => 23, 'title' => 'Truyền Hình', 'slug' => Str::slug('Truyền Hình'), 'parent_id' => 0, 'position' => 13],
            ['id' => 24, 'title' => 'Gia Đình', 'slug' => Str::slug('Gia Đình'), 'parent_id' => 0, 'position' => 14],
            ['id' => 25, 'title' => 'Hình Sự', 'slug' => Str::slug('Hình Sự'), 'parent_id' => 0, 'position' => 15],
            ['id' => 26, 'title' => 'Học Đường', 'slug' => Str::slug('Học Đường'), 'parent_id' => 0, 'position' => 16],
            ['id' => 27, 'title' => 'Âm Nhạc', 'slug' => Str::slug('Âm Nhạc'), 'parent_id' => 0, 'position' => 17],
            ['id' => 28, 'title' => '18+', 'slug' => Str::slug('18+'), 'parent_id' => 0, 'position' => 18],
            ['id' => 29, 'title' => 'Giật Gân', 'slug' => Str::slug('Giật Gân'), 'parent_id' => 0, 'position' => 19],
            ['id' => 31, 'title' => 'Lãng Mạn', 'slug' => Str::slug('Lãng Mạn'), 'parent_id' => 0, 'position' => 20],
            ['id' => 32, 'title' => 'Tài Liệu', 'slug' => Str::slug('Tài Liệu'), 'parent_id' => 0, 'position' => 21],
        ];
        DB::table('categories')->insert($categories);
    }
}