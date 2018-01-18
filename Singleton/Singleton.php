<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 16/01/18
 * Time: 14:56
 */

class Singleton
{
    static private $_instance = array();
    private function __construct()
    {

    }

    static function getInstance($className)
    {
        if(!array_key_exists($className, self::$_instance))
        {
            self::$_instance[$className] = new $className;
        }
        return self::$_instance[$className];
    }
}