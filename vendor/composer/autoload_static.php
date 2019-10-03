<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb3baf6c9c8729638f72c924ac031566
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'IM\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'IM\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb3baf6c9c8729638f72c924ac031566::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb3baf6c9c8729638f72c924ac031566::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}