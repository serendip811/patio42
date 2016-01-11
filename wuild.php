<?php
use Wuild\FileSystem\Directory;
use Wuild\FileSystem\File;
use Wuild\Console;

require __DIR__ .'/vendor/autoload.php';

Wuild::task('build:less', function () {
    $files = (new Directory(__DIR__ . '/public/static'))->getAllFiles();
    $lessFiles = $files->filter(function (File $file) {
        return $file->getExtension() === 'less';
    });
    foreach ($lessFiles as $file) {
        Console::execute("lessc {$file} > " . $file->getPath() . '/' . $file->getNameOnly() .'.css');
    }
});
