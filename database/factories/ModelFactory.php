<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('1234'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Model\Client::class, function (Faker\Generator $faker) {
    return [
        'client_name' => $faker->company,
    ];
});


$factory->define(App\Model\Project::class, function (Faker\Generator $faker) {

    $random_type = ['Sistem Informasi', 'Aplikasi', 'Monitoring', 'Microapp'];

    $random_app = [
        'Alumni', 'Sekolah', 'Akademik', 'Kepegawaian', 'Pajak Elektronik',
        'Pendaftaran Siswa Baru', 'Pendaftaran Mahasiswa Baru', 'Keuangan',
        'Perjalanan Dinas', 'Akuntansi', 'SMS Notification', 'Penjualan', 
        'Point of Sales', 'Harga Komoditas', 'Groupware', 'Distribusi',
    ];

    $app_language = ['PHP Laravel', 'Java Spring', 'Java Grails', 'PHP Yii', 'Java Play Framework'];
    $app_database = ['MySQL', 'Oracle', 'PostgreSQL', 'SQL Lite', 'MongoDB'];
    $app_server   = ['Apache', 'Nginx', 'Tomcat', 'Glashfish'];

    return [
        'name' => $random_type[array_rand($random_type)] . ' ' . $random_app[array_rand($random_app)],
        'description' => $faker->text(900),
        'bahasa_prog' => $app_language[array_rand($app_language)],
        'database' => $app_database[array_rand($app_database)],
        'server' => $app_server[array_rand($app_server)],
    ];
});