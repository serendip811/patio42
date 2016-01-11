<?php
namespace Wandu\Http\Factory;

use Wandu\Http\UploadedFile;

class UploadedFileFactory
{
    /**
     * @param array $files
     * @return array
     */
    public static function fromFiles(array $files)
    {
        $uploadedFiles = [];
        foreach ($files as $name => $file) {
            $uploadedFiles[$name] = static::factoryFilesTree(
                $file['tmp_name'],
                $file['size'],
                $file['error'],
                $file['name'],
                $file['type']
            );
        }
        return $uploadedFiles;
    }

    /**
     * @param array|string $fileDatas
     * @param array|int $sizeDatas
     * @param array|int $errorDatas
     * @param array|string $nameDatas
     * @param array|string $typeDatas
     * @return array
     */
    protected static function factoryFilesTree($fileDatas, $sizeDatas, $errorDatas, $nameDatas, $typeDatas)
    {
        if (!is_array($errorDatas)) {
            return new UploadedFile($fileDatas, $sizeDatas, $errorDatas, $nameDatas, $typeDatas);
        }
        $filesTree = [];
        foreach ($errorDatas as $name => $errorData) {
            $filesTree[$name] = static::factoryFilesTree(
                $fileDatas[$name],
                $sizeDatas[$name],
                $errorData,
                $nameDatas[$name],
                $typeDatas[$name]
            );
        }
        return $filesTree;
    }
}
