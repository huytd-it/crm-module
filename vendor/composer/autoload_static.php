<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite550ba3e53f84d3bd1202e54671740e0
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite550ba3e53f84d3bd1202e54671740e0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite550ba3e53f84d3bd1202e54671740e0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite550ba3e53f84d3bd1202e54671740e0::$classMap;

        }, null, ClassLoader::class);
    }
}
