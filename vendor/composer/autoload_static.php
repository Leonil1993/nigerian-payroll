<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf19db192039e0e7ff017d60cab0b5f86
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Payroll\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Payroll\\' => 
        array (
            0 => __DIR__ . '/../..' . '/server',
        ),
    );

    public static $classMap = array (
        'Payroll\\Classes\\Database\\Controller' => __DIR__ . '/../..' . '/server/classes/database/controller.php',
        'Payroll\\Classes\\Database\\ServerConnect' => __DIR__ . '/../..' . '/server/classes/database/server-connect.php',
        'Payroll\\Classes\\Sql\\AddUser' => __DIR__ . '/../..' . '/server/classes/sql/add-user.php',
        'Payroll\\Classes\\Sql\\DeleteUser' => __DIR__ . '/../..' . '/server/classes/sql/delete-user.php',
        'Payroll\\Classes\\Sql\\UpdateUser' => __DIR__ . '/../..' . '/server/classes/sql/update-user.php',
        'Payroll\\Classes\\Sql\\UserInfo' => __DIR__ . '/../..' . '/server/classes/sql/user-info.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf19db192039e0e7ff017d60cab0b5f86::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf19db192039e0e7ff017d60cab0b5f86::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf19db192039e0e7ff017d60cab0b5f86::$classMap;

        }, null, ClassLoader::class);
    }
}
