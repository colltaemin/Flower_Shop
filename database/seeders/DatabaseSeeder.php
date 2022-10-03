<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory(1)->create([
            'name' => 'Test ADmin',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$zB51E5Kktvf8iozW9k0IGek1eTQLDgv0txdcPUde1kSdnfZX0PX.O', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\Product::factory(100)->create();

        \App\Models\Permission::factory(1)->create([
            'name' => 'Danh mục sản phẩm',
            'display_name' => 'Danh mục sản phẩm',
            'parent_id' => 0,
            'key_code' => '',
        ]);

        \App\Models\Permission::factory(1)->create([
            'name' => 'Xem danh mục sản phẩm',
            'display_name' => 'Xem danh mục sản phẩm',
            'parent_id' => 1,
            'key_code' => 'list_category',
        ]);

        \App\Models\Permission::factory(1)->create([
            'name' => 'Thêm danh mục sản phẩm',
            'display_name' => 'Thêm danh mục sản phẩm',
            'parent_id' => 1,
            'key_code' => 'add_category',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Sửa danh mục sản phẩm',
            'display_name' => 'Sửa danh mục sản phẩm',
            'parent_id' => 1,
            'key_code' => 'edit_category',
        ]);

        \App\Models\Permission::factory(1)->create([
            'name' => 'Xóa danh mục sản phẩm',
            'display_name' => 'Xóa danh mục sản phẩm',
            'parent_id' => 1,
            'key_code' => 'delete_category',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Menu',
            'display_name' => 'Menu',
            'parent_id' => 0,
            'key_code' => '',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Xem menu',
            'display_name' => 'Xem menu',
            'parent_id' => 6,
            'key_code' => 'list_menu',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Thêm menu',
            'display_name' => 'Thêm menu',
            'parent_id' => 6,
            'key_code' => 'add_menu',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Sửa menu',
            'display_name' => 'Sửa menu',
            'parent_id' => 6,
            'key_code' => 'edit_menu',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Xóa menu',
            'display_name' => 'Xóa menu',
            'parent_id' => 6,
            'key_code' => 'delete_menu',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Danh sách sản phẩm',
            'display_name' => 'Danh sách sản phẩm',
            'parent_id' => 0,
            'key_code' => '',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Xem danh sách sản phẩm',
            'display_name' => 'Xem danh sách sản phẩm',
            'parent_id' => 11,
            'key_code' => 'list_product',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Thêm sản phẩm',
            'display_name' => 'Thêm sản phẩm',
            'parent_id' => 11,
            'key_code' => 'add_product',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Sửa sản phẩm',
            'display_name' => 'Sửa sản phẩm',
            'parent_id' => 11,
            'key_code' => 'edit_product',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Xóa sản phẩm',
            'display_name' => 'Xóa sản phẩm',
            'parent_id' => 11,
            'key_code' => 'delete_product',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Danh sách user',
            'display_name' => 'Danh sách user',
            'parent_id' => 0,
            'key_code' => '',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Xem danh sách user',
            'display_name' => 'Xem danh sách user',
            'parent_id' => 16,
            'key_code' => 'list_user',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Thêm user',
            'display_name' => 'Thêm user',
            'parent_id' => 16,
            'key_code' => 'add_user',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Sửa user',
            'display_name' => 'Sửa user',
            'parent_id' => 16,
            'key_code' => 'edit_user',
        ]);
        \App\Models\Permission::factory(1)->create([
            'name' => 'Xóa user',
            'display_name' => 'Xóa user',
            'parent_id' => 16,
            'key_code' => 'delete_user',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Hoa Sinh Nhật',
            'featured_image' => '../images/icon-hoa-sinh-nhat.png',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Cây Văn Phòng',
            'featured_image' => '../images/icon-cay-vp.png',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Hoa Chúc Mừng',
            'featured_image' => '../images/icon-hoa-chuc-mung.png',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Hoa Chia Buồn',
            'featured_image' => '../images/icon-hoa-tang-le.png',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Hoa Tình Yêu',
            'featured_image' => '../images/icon-hoa-tinh-yeu.png',
        ]);

        \App\Models\Category::factory(1)->create([
            'name' => 'Hoa Mừng Tốt Nghiệp',
            'featured_image' => '../images/icon-mau-hoa-moi.png',
        ]);
    }
}
