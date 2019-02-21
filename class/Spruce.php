<?php
/**
 * It's the core file containing essential functions
 */
class AutoLoader{
    static function Load(){
        spl_autoload_register(function ($class_name) {
            include __DIR__ . "/" .$class_name . '.php';
        });
    }
}