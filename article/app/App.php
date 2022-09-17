<?php
    namespace App;

    /**
     * gestion totale de l'application
     */
    class App{
        /**
         * @param string $key propriétée inaccessible apelée
         */
        public function __get($key)
        {
            $method = 'get'.ucfirst($key);
            $this->$key = $this->$method();
            return $this->$key;
        }
    }
?>