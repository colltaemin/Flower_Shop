<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
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
            'name' => 'ADmin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$zB51E5Kktvf8iozW9k0IGek1eTQLDgv0txdcPUde1kSdnfZX0PX.O', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(1)->create([
            'name' => 'Staff',
            'email' => 'staff@staff.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$zB51E5Kktvf8iozW9k0IGek1eTQLDgv0txdcPUde1kSdnfZX0PX.O', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Role::factory(1)->create([
            'name' => 'admin',
            'display_name' => 'Quản trị viên',
        ]);

        \App\Models\Role::factory(1)->create([
            'name' => 'staff',
            'display_name' => 'Nhân viên',
        ]);

        \App\Models\RoleUser::factory(1)->create([
            'role_id' => 1,
            'user_id' => 101,
        ]);

        \App\Models\RoleUser::factory(1)->create([
            'role_id' => 2,
            'user_id' => 102,
        ]);

        \App\Models\Product::factory(100)->create();

        $dates = [
            '2021-01-01', '2021-01-02', '2021-01-03',  '2021-01-04', '2021-01-05', '2021-01-06',
            '2022-01-01', '2022-01-02', '2022-01-03',
            '2022-01-04', '2022-01-05', '2022-01-06',
            '2022-01-07', '2022-01-08', '2022-01-09',
            '2022-01-10', '2022-01-11', '2022-01-12',
            '2023-01-01', '2023-01-02', '2023-01-03',
            '2023-01-04', '2023-01-05', '2023-01-06',
            '2023-01-07', '2023-01-08', '2023-01-09',
            '2023-01-10', '2023-01-11', '2023-01-12',
        ];
        \App\Models\Order::factory(100)->has(
            \App\Models\OrderFlower::factory(random_int(1, 4))->state([
                'product_id' => Product::inRandomOrder()->limit(1)->first()->id,
                'product_name' => Product::inRandomOrder()->limit(1)->first()->name,
                'price' => Product::inRandomOrder()->limit(1)->first()->price,
            ]),
            'orderFlowers'
        )
            ->state([
            ])->create()
        ;

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
