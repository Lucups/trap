<?php

/**
 * 使用 intervention/image 来处理图片
 * 
 * 需要 imagick 扩展
 * 		Mac 下: brew install php55-imagick
 * 经确认 /usr/local/etc/php/5.5/conf.d/ext-imagick.ini 
 * 		imagick 扩展已安装
 */


// 图片信息 1280 × 800, 659 KB

// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'imagick'));

// to finally create image instances
$image = $manager->make('img01.jpg');

// 调整大小
$image->resize(600, 400);

// 保存
$image->save('_img_' . time() . '_a.jpg');

// 插入文字
//$image->text('The quick brown fox jumps over the lazy dog.', 10, 10);

$image->text('你好', 30, 30, function($font) {
    $font->file('华康俪金黑W8.TTF');
    $font->size(14);
    $font->color('#fdf6e3');
    $font->align('center');
    $font->valign('top');
    //$font->angle(10);
});

// 插入另一张图片
$image2 = $manager->make('img02.jpg');

$image->insert($image2->resize(50, 50),'bottom-right', 10, 10);

$image->save('_img_' . time() . '_b.jpg');
