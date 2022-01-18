<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b5248621910a0b803ffa81501b2d3fe
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Juanjo\\' => 7,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Juanjo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/api',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b5248621910a0b803ffa81501b2d3fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b5248621910a0b803ffa81501b2d3fe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0b5248621910a0b803ffa81501b2d3fe::$classMap;

        }, null, ClassLoader::class);
    }
}
