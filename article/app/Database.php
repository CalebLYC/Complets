<?php
    namespace App;
    use \PDO;

    /**
     * Interface abstraite et personnalisée de la base de donnée
     * 
     * Instance de PDO
     */
    class Database{
        /**
         * @var string $db_name nom de la base de donnée
         */
        private $db_name;
        /**
         * @var string $db_user username(nom d'utilisateur) de la base de donnée
         */
        private $db_user;
        /**
         * @var string $db_pass password(mot de passe) de la base de donnée
         */
        private $db_pass;
        /**
         * @var string $db_host nom d'hôte de la base de donnée
         */
        private $db_host;
        /**
         * @var string type de caractère
         */
        private $charset = 'utf8';
        /**
         * @var PDO $db interface de la base de donnée
         */
        private $db;

        /**
         * @param string $db_name nom de la base de donnée
         * @param string $db_user username(nom d'utilisateur) de la base de donnée
         * @param string $db_pass password(mot de passe) de la base de donnée
         * @param string $db_host nom d'hôte de la base de donnée
         */
        public function __construct($db_name, $db_user='root', $db_pass='', $db_host='127.0.0.1')
        {
            $this->db_name = $db_name;   
            $this->db_user = $db_user;   
            $this->db_pass = $db_pass;   
            $this->db_host = $db_host;   
        }

        /**
         * @return string type de cartère(jeu de caractère)
         */
        public function getCharset(){
            return $this->charset;
        }
        /**
         * @param string $charset type de cartère(jeu de caractère)
         */
        public function setCharset($charset){
            $this->charset = $charset;
            return $this;
        }

        /**
         * @return PDO $db interface de la base de donnée
         */
        public function getPDO(){
            if($this->db == null){
                $db = new PDO("mysql:host={$this->db_host}; dbname={$this->db_name}; charset={$this->charset}", $this->db_user, $this->db_pass);
                $this->db = $db;
            }
            return $this->db;
        }

        /**
         * @param string $statement requête(query) sql non préparée
         * @param string $class_name nom de la classe qui contiendra le résultat de la requête	
         * @return class résultat de la requête
         */
        public function query($statement, $class_name){
            $req = $this->getPDO()->query($statement);
            $data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
            return $data;
        }
        /**
         * @param string $statement requête sql préparée
         * @param array $values paramètres inconnus de la requête
         * @param string $class_name nom de la classe qui contiendra le résultat de la requête	
         * @param bool $one récupérer un seul élément(le premier) ou pas
         * @return class résultat de la requête
         */
        public function prepare($statement, $values, $class_name, $one=false){
            $req = $this->getPDO()->prepare($statement);
            $req->execute($values);
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
            if($one){
                $data = $req->fetch();
            }else{
                $data = $req->fetchAll();
            }
            return $data;        
        }
        /**
         * @param string $statement requête sql préparée
         * @param array $values paramètres inconnus de la requête
         * @return int nombre d'éléments durésultat de la requête
         */
        public function rowCount($statement, $values){
            $req = $this->getPDO()->prepare($statement);
            $req->execute($values);
            return $req->rowCount();              }
        /**
         * @param string $statement requête sql préparée
         * @param array $values paramètres inconnus de la requête
         * @return class résultat de la requête
         */
        public function insert($statement, $values){
            $req = $this->getPDO()->prepare($statement);
            $req->execute($values);
        }
    }
?>