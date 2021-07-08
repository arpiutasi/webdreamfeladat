<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45bdeca36f19fe446f82c725df7de2b7
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'webdreamfeladat\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'webdreamfeladat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'webdreamfeladat\\App\\Person' => __DIR__ . '/../..' . '/src/app/Person.php',
        'webdreamfeladat\\App\\Student' => __DIR__ . '/../..' . '/src/app/Student.php',
        'webdreamfeladat\\app\\Course' => __DIR__ . '/../..' . '/src/app/Course.php',
        'webdreamfeladat\\app\\Teacher' => __DIR__ . '/../..' . '/src/app/Teacher.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45bdeca36f19fe446f82c725df7de2b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45bdeca36f19fe446f82c725df7de2b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit45bdeca36f19fe446f82c725df7de2b7::$classMap;

        }, null, ClassLoader::class);
    }
}
