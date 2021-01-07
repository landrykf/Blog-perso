<?php

use App\Autoloader;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Images;

require_once 'Autoloader.php';
Autoloader::register();

$model = new Images;


$images= $model->setName('image')
            ->setLink('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_uC7k_ugr4-2NG8NKuStyQLV07ZQwrCnxEA&usqp=CAU');
            // ->setPassword(password_hash('toto', PASSWORD_ARGON2I));

$model->create($images);

var_dump($images);

