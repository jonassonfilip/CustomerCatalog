<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79d0f8ad3d9d0bff2f08f692a6005ebe
{
    public static $prefixLengthsPsr4 = array (
        'b' => 
        array (
            'benhall14\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'benhall14\\' => 
        array (
            0 => __DIR__ . '/..' . '/benhall14/php-calendar/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79d0f8ad3d9d0bff2f08f692a6005ebe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79d0f8ad3d9d0bff2f08f692a6005ebe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79d0f8ad3d9d0bff2f08f692a6005ebe::$classMap;

        }, null, ClassLoader::class);
    }
}
