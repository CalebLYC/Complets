<?php
    namespace App\Tables;

use App\App;

    /**
     * article récupérée de la base de donnée
     * 
     * Gestion de la table article/résultat des requêtes sur la table article
     */

     class Article extends App{
        /**
         * @return string url de l'article
         */
        public function getUrl(){
            return 'index.php?p=article&id='.$this->id;
        }
        /**
         * @return string extrait de l'article
         */
        public function getExtrait(){
            return 'p'.substr($this->content, 0, 230).'...</p>';
        }
     }
?>