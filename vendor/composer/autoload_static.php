<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3b60eba45ef69b25e5427da5bbe8aa6
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Luecano\\NumeroALetras\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Luecano\\NumeroALetras\\' => 
        array (
            0 => __DIR__ . '/..' . '/luecano/numero-a-letras/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3b60eba45ef69b25e5427da5bbe8aa6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3b60eba45ef69b25e5427da5bbe8aa6::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd3b60eba45ef69b25e5427da5bbe8aa6::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd3b60eba45ef69b25e5427da5bbe8aa6::$classMap;

        }, null, ClassLoader::class);
    }
}
