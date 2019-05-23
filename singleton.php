<?php

class Singleton {

    // внутренний массив значений класса
    private $props = array();

    // экземпляр самого себя
    private static $_instance;

    // защищает класс от new
    private function __construct(){}

    // защищает класс от клонирования
    private function __clone(){}

    // защищает класс от unserialize
    private function __wakeup(){}

    // получаем объект
    public static function getInstance() {
        if(empty(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // можем установить значение
    public function setProperty($key, $val) {
        $this->props[$key] = $val;
    }

    // можем получить значение
    public function getProperty($key) {
        return $this->props[$key];
    }

    // любой публичный метод касса
    public function methodName(){}

}

// выдаст ошибку
// $var = new Singleton();

$pp = Singleton::getInstance();
$pp->setProperty('variable',12);
echo 'From "pp" = '.$pp->getProperty('variable').'<br>';
$zz = Singleton::getInstance();
echo 'From "zz" = '.$zz->getProperty('variable').'<br>';