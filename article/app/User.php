<?php
    namespace App;

    /**
     * configurer et enregistrer un utilisateur
     */
    class User extends App{
        public $id;
        public $username;
        private $email;
        private $password;
        private $image_id;
        private $passwordConfirm;
        private $date;
        public $error;

        public function __construct($user)
        {
            if(isset($user['username']) && isset($user['email']) && isset($user['password']) && isset($user['passwordConfirm'])){
                $this->username = htmlspecialchars(strip_tags($user['username']));
                $this->password = password_hash(htmlspecialchars(strip_tags($user['password'])), PASSWORD_DEFAULT);
                $this->email = htmlspecialchars(strip_tags($user['email']));
                $this->passwordConfirm = $user['passwordConfirm'];
                $this->date = date('d-m-y h:i:s');
            }
        }

        public function getId(){
            return $this->id;
        }
        public function getUsername(){
            return $this->username;
        }

        public function isEmpty(){
            if(empty($this->username)){
                 $this->error = 'Nom d\'utilisateur invalide';
                 return true;
            }
            if(empty($this->email)){
                $this->error = 'Email invalide';
                return true;
            }
            if(empty($this->password)){
                $this->error = 'Mot de passe invalide';
                return true;
            }
            if(empty($this->passwordConfirm)){
                $this->error = 'Mot de passe invalide';
                return true;
            }
            return false;
        }
        public function isLoginEmpty(){
            if(empty($this->email)){
                $this->error = 'Nom d\'utilisateur invalide';
                return true;
            }
            if(empty($this->password)){
                $this->error = 'Mot de passe invalide';
                return true;
            }
            return false;
        }

        public function insert($image_id=1){
            $this->image_id = $image_id;
            if(password_verify($this->passwordConfirm, $this->password)){
                if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                    $this->insertInto();
                    $this->error = 'Inscription effectué avec succès';
                    return true;
                }else{
                    $this->error = 'Email invalide';
                    return false;
                }
            }else{
                $this->error = 'Mots de passe non correspondants';
                return false;
            }
        }
        public function insertInto(){
            (new Database('projetarticle'))->insert('INSERT INTO users(username, email, password, image_id, date) VALUES(?,?,?,?,?)', array($this->username, $this->email, $this->password, $this->image_id, $this->date));
            return $this;
        }
        public function login(){
            if((new Database('projetarticle'))->rowCount('SELECT * FROM users WHERE email=?', array($this->email)) > 0){
                $user = (new Database('projetarticle'))->prepare('SELECT * FROM users WHERE email=?', array($this->email), __CLASS__, true)->id;
                $this->id = $user->id;
                $this->image_id = $user->image_id;
                $this->username = $user->username;
                return true;
            }
        }
    }
?>