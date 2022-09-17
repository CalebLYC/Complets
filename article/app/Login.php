<?php
    namespace App;

    class Login extends User{

       public function __construct($user)
        {
            if(isset($user['email']) && isset($user['password'])){
                $this->password = htmlspecialchars(strip_tags($user['password']));
                $this->email = htmlspecialchars(strip_tags($user['email']));
                $this->date = date('d-m-y h:i:s');
                return true;
            }
            return false;
        }

        public function isEmpty(){
            if(empty($this->email)){
                $this->error = 'Champs vides';
                return true;
            }
            if(empty($this->password)){
                $this->error = 'Champs vides';
                return true;
            }
            return false;
        }

        public function login(){
            if((new Database('projetarticle'))->rowCount('SELECT * FROM users WHERE email=?', array($this->email)) > 0){
                $user = (new Database('projetarticle'))->prepare('SELECT * FROM users WHERE email=?', array($this->email), 'App\Tables\User', true);
                if(password_verify($this->password, $user->password)){
                    $this->id = $user->id;
                    $this->image_id = $user->image_id;
                    $this->username = $user->username;
                    $this->error = 'Connexion effectuée avec succès';
                    (new Database('projetarticle'))->prepare('INSERT INTO deconnexions(user_id, username, date) VALUES(?,?,?)', array($this->id, $this->username, $this->date), 'App\Tables\User', true);
                    return true;
                }
            }
            $this->error = 'Identifiant ou mot de passe invalide';
            return false;
        }
    }
?>