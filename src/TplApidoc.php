<?php

namespace TplApidoc;

class TplApidoc {

    private static $_classStore = null;

    public static function factory($class) {
        if(!isset(self::$_classStore)) {
            $className = __namespace__.'\\'.$class;
            if(!class_exists($className)) {
                throw new \Exception('module not exists.');
            }
            self::$_classStore = new $className;
        }
        return self::$_classStore;
    }
}
