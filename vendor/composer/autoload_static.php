<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit509f01194a2b3485d348d459ef6fdbce
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sovit\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sovit\\' => 
        array (
            0 => __DIR__ . '/..' . '/ssovit/tiktok-api/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit509f01194a2b3485d348d459ef6fdbce::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit509f01194a2b3485d348d459ef6fdbce::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit509f01194a2b3485d348d459ef6fdbce::$classMap;

        }, null, ClassLoader::class);
    }
}
