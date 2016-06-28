<?php
use Wandu\Template\Syntax\Template;

Template::setLayout('layout/master2', [
    'cssFiles' => [
        '/static/css/index2.css'
    ],
    'jsFiles' => [
        '/static/vendor/jquery.simpleslider/jquery.simpleslider.min.js',
        '/static/js/index2.js',
        '/static/js/jquery.instashow.packaged.js',
    ]
]);
?>

