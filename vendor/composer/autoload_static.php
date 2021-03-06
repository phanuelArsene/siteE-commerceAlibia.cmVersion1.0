<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5ad712adab3b359d672ce76660f21b5
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5ad712adab3b359d672ce76660f21b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5ad712adab3b359d672ce76660f21b5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd5ad712adab3b359d672ce76660f21b5::$classMap;

        }, null, ClassLoader::class);
    }
}
