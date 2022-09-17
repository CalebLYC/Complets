<?php
    namespace App\Tables;

use App\Database;

    /**
     * Manipuler et uploader facilement une image
     */
    class Image{
        /**
         * @var array image
         */
        private $image;
        /**
         * @var string nom de la base de données
         */
        private $database = 'projetarticle';
        /**
         * @var string nom de l'image
         */
        private $name;
        /**
         * @var string dossier temporaire de l'image
         */
        private $tmp_name;
        /**
         * @var string extension de l'image
         */
        private $extension;
        /**
         * @var int identifiant id de l'image
         */
        private $id;
        /**
         * @var string $table nom de la table de l'image
         */
        private $table;
        /**
         * @pvar string dossier de destination de l'image
         */
        private $destination =  'files/';

        const EXTENSIONS_AUTORIZES = array('.jpg', '.jpeg', '.gif', '.png');

        /**
         * @param array $image image
         * @param string $correspondant correspondant
         * @param string $table nom de la table de l'image
         */
        public function __construct($image, $database, $table)
        {
            $this->table = $table;
            $this->image = $image;
            $this->database = $database;

            $this->name = $this->image['name'];
            $this->tmp_name = $this->image['tmp_name'];

            $this->extension = strchr($this->name, '.');
        }

        /**
         * @return int identifiant id de l'image
         */
        public function getId(){
            return $this->id;
        }
        /**
         * @param string $destination dossier de destination de l'image
         */
        public function setDestination($destination){
            $this->destination = $destination;
        }
        /**
         * @param string $name nom défini de l'image
         */
        public function verify($name){
            do{
                $this->id = mt_rand(1000000, 999999999);
                $this->name = $name.$this->id.$this->extension;
                $images = (new Database($this->database))->getPDO()->query('SELECT * FROM '.$this->table);
                $images = $images->fetchAll();
            }while(in_array($this->name, $images));
            $this->destination = $this->destination.$this->name;
        }
        /**
         * @return bool Upload réussi ou pas
         */
        public function insert(){
            if(in_array($this->extension, self::EXTENSIONS_AUTORIZES)){
                if(move_uploaded_file($this->tmp_name, $this->destination)){
                    (new Database($this->database))->insert("INSERT INTO {$this->table}(name, url, id) VALUES(?,?,?)", array($this->name, $this->destination, $this->id));
                    return 'Fichier uploadé avec succès';
                }else{
                    return false;
                }
            }else{
                return false;
            }    
        }
    }
?>