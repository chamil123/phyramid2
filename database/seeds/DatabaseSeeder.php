<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'user_nic' => '123456789V',
            'name' => "Admin",
            'user_contact_1' => '123456789V',
            'user_address' => '',
            'user_gender' => '',
            'user_dob' => '',
            'user_contact_2' => '',
            'user_bank_name' => '',
            'user_bank_branch' => '',
            'user_account_no' => '',
            'user_benifit_name' => '',
            'user_benifit_address' => '',
            'user_status' => '1',
            'user_pv' => '',
//                    'lastname' => $data['lastname'],
            'image' => "default_image.png",
            'password' => bcrypt(123456),
        ]);

        DB::table('dummeys')->insert([
            'dummey_name' => '123456789V_PL1_A',
            'placement_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('dummeys')->insert([
            'dummey_name' => '123456789V_PL1_B',
            'placement_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('dummeys')->insert([
            'dummey_name' => '123456789V_PL1_C',
            'placement_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('categories')->insert([
            'cat_name' => 'ELECTRIC ITEMS',
            'cat_description' => "Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'cat_status' => '1',
        ]);
        DB::table('products')->insert([
            'product_name' => 'ELECTRIC KETTLE 2',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 1500,
            'product_pv_value' => 20,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "kettle.jpg",
        ]);
        DB::table('products')->insert([
            'product_name' => 'BARA IRON 2',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 1200,
            'product_pv_value' => 15,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "download.jpg",
        ]);
        DB::table('products')->insert([
            'product_name' => 'visil ketle',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 2500,
            'product_pv_value' => 25,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "01-500x500.jpg",
        ]);
        DB::table('products')->insert([
            'product_name' => 'NIKAL RICE COOKER',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 5500,
            'product_pv_value' => 35,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "item_L_7878671_6972648.jpg",
        ]);
        DB::table('products')->insert([
            'product_name' => 'Blender',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 3500,
            'product_pv_value' => 25,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "images.jpg",
        ]);
        DB::table('products')->insert([
            'product_name' => 'ELECTRIC OVEN',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 15000,
            'product_pv_value' => 45,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "ip118635_00.jpg",
        ]);
        DB::table('products')->insert([
            'product_name' => 'FRIGE 02 2D',
            'product_description' => 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'product_price' => 65000,
            'product_pv_value' => 55,
            'product_status' => 1,
            'cat_id' => 1,
            'product_image' => "LG-GS-X6011NS-Refrigerator-300x300.jpg",
        ]);
    }

}
