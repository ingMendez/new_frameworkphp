<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit671bb47e029a198bc424543bbe71d505
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit671bb47e029a198bc424543bbe71d505::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit671bb47e029a198bc424543bbe71d505::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit671bb47e029a198bc424543bbe71d505::$classMap;

        }, null, ClassLoader::class);
    }
}
