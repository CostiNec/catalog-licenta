<?php

require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\','/',$class_name);
    if(file_exists(__DIR__.'/../'.$class_name.'.php')) {
        require __DIR__.'/../'.$class_name.'.php';
    }
});


use models\User;

$user = new User([
    'first_name' => 'John',
    'last_name' => 'Doe',
    'gender' => 'm',
    'email' => 'admin@upb.ro',
    'phone' => '',
    'password' => md5('123123123'),
    'role' => User::ADMIN
]);

$user->save();
