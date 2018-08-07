<?php

$autoload = array_reduce(range(1, 3), function($d, $v) {
    $d[] = __DIR__ . '/'.str_repeat('../', $v).'autoload.php';
    $d[] = __DIR__ . '/'.str_repeat('../', $v).'vendor/autoload.php';
    return $d;

}, []);

foreach($autoload as $file) {
    if (file_exists($file)) {
        define('PHPUNIT_COMPOSER_INSTALL_CUS', $file);
        break;
    }
}
unset($file);

if (!defined('PHPUNIT_COMPOSER_INSTALL_CUS')) {
    fwrite(
        STDERR,
        'You need to set up the project dependencies using Composer:' . PHP_EOL . PHP_EOL .
        '    composer install' . PHP_EOL . PHP_EOL .
        'You can learn all about Composer on https://getcomposer.org/.' . PHP_EOL
    );
    die(1);
}
require_once PHPUNIT_COMPOSER_INSTALL_CUS;
