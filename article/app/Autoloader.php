<?php
    namespace App;

    /**
     * autoloader toutes les classes du namespace App
     * @package App
     */
    class Autoloader{
        public static function register(){
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        /**
         * @param string $class_name nom de la classe à autoloader(détectable automatiquement)
         */
        static function autoload($class_name){
            if(strpos($class_name, __NAMESPACE__) === 0){
                $class_name = str_replace('App\\', '', $class_name);
                require __DIR__.'/'.$class_name.'.php';
            }
        }
    }
?>