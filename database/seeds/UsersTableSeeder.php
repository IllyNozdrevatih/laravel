<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'full_name' => 'иван',
            'email' => 'ivan@mail.ru',
            'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
            'number' =>'321',
            'address' =>'dsada',
            'path_to_image' =>'storage/app/images/default.png',
            'role' =>'client',
            'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
        ]);
        DB::table('users')->insert([
            'full_name' => 'петр',
            'email' => 'preto@mail.ru',
            'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
            'number' =>'123',
            'address' =>'dsada',
            'path_to_image' =>'storage/app/images/default.png',
            'role' =>'client',
            'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
        ]);
        DB::table('users')->insert([
            'full_name' => 'григорий',
            'email' => 'gregoro@mail.ru',
            'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
            'number' =>'321321',
            'address' =>'dfas',
            'path_to_image' =>'storage/app/images/default.png',
            'role' =>'doctor',

            'start_working' => '08:00:00',
            'finish_working' => '17:00:00',
            'specialization' => 'уролог',
            'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
        ]);
        DB::table('users')->insert([
            'full_name' => 'кирилл',
            'email' => 'kirilo@mail.ru',
            'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
            'number' =>'312',
            'address' =>'dasda',
            'path_to_image' =>'storage/app/images/default.png',
            'specialization' => 'окулист',
            'start_working' => '08:00:00',
            'finish_working' => '17:00:00',
            'role' =>'doctor',
            'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
         ]);
         DB::table('users')->insert([
             'full_name' => 'владислав',
             'email' => 'vlad@mail.ru',
             'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
             'number' =>'12331',
             'address' =>'dsada',
             'path_to_image' =>'storage/app/images/default.png',
             'role' =>'doctor',
             'start_working' => '08:00:00',
             'finish_working' => '17:00:00',
             'specialization' => 'теропевт',
             'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
         ]);
        DB::table('users')->insert([
            'full_name' => 'игорь',
            'email' => 'igor@mail.ru',
            'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
            'number' =>'12331',
            'address' =>'dsada',
            'path_to_image' =>'storage/app/images/default.png',
            'role' =>'doctor',
            'start_working' => '08:00:00',
            'finish_working' => '17:00:00',
            'specialization' => 'педиатр',
            'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
        ]);
        DB::table('users')->insert([
            'full_name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' =>'$2y$10$EySE3wVwVh7Y1VjLAQIaZubu/HMjnlb8Qu516/Nb07VmPdHuuv2xe',
            'number' =>'12331',
            'address' =>'dsada',
            'path_to_image' =>'storage/app/images/default.png',
            'role' =>'admin',
            'start_working' => '08:00:00',
            'finish_working' => '17:00:00',
            'specialization' => 'педиатр',
            'remember_token' =>'dbeWBr4kHZWQ7oddYCJfYpE0OY3e0jAABBzONFJJBEvp4URUik0K0JYrJYLX'
        ]);
    }
}
