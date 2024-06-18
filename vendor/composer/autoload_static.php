<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5c6b84fc4d871a7ffbf329302ff771c
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jakgh\\LaravelBrevoMailer\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jakgh\\LaravelBrevoMailer\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita5c6b84fc4d871a7ffbf329302ff771c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita5c6b84fc4d871a7ffbf329302ff771c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita5c6b84fc4d871a7ffbf329302ff771c::$classMap;

        }, null, ClassLoader::class);
    }
}
