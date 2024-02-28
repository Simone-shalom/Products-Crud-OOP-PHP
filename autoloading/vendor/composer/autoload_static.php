<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dc9c2c7ae3595f0d9caf6cdd474e1ec
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'S' => 
        array (
            'Simon\\Autoloading\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Simon\\Autoloading\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4dc9c2c7ae3595f0d9caf6cdd474e1ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4dc9c2c7ae3595f0d9caf6cdd474e1ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4dc9c2c7ae3595f0d9caf6cdd474e1ec::$classMap;

        }, null, ClassLoader::class);
    }
}
