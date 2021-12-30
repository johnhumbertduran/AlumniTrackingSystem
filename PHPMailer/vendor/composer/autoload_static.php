<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc00e20e59421a94f43978cfcc9f7222c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc00e20e59421a94f43978cfcc9f7222c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc00e20e59421a94f43978cfcc9f7222c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc00e20e59421a94f43978cfcc9f7222c::$classMap;

        }, null, ClassLoader::class);
    }
}