<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite445f053c75408d128d5e2efd5450d8f
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite445f053c75408d128d5e2efd5450d8f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite445f053c75408d128d5e2efd5450d8f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}