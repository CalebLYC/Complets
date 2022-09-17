<?php
    namespace App\HTTP;

    /**
     * gérer les requêtes ajax
     */
    class Ajax{
        /**
         * @var array données envoyées par la requête
         */
        private $data;
        /**
         * @var string message d'erreur ou de succès
         */
        private $msg = 'Une erreur s\'est produite';
        /**
         * @var bool Etat du résultat de la requête(succès:true, échec:false)
         */
        private $success = false;

        /**
         * @param array $data données envoyées par la requête
         */
        public function __construct($data)
        {
            $this->data = $data;
        }

        /**
         * @return string message d'erreur ou de succès
         */
        public function getMsg(){
            return $this->msg;
        }
        /**
         * @return bool Etat du résultat de la requête(succès:true, échec:false)
         */
        public function getSuccess(){
            return $this->success;
        }
        /**
         * @param string $msg message d'erreur ou de succès
         */
        public function setMsg($msg){
            $this->msg = $msg;
        }
        /**
         * @param bool $success Etat du résultat de la requête(succès:true, échec:false)
         */
        public function setSuccess($success){
            $this->success = $success;
        }
        public function answer($result){
            echo json_encode(array('msg'=>$this->msg, 'success'=>$this->success, 'result'=>$result));
        }
    }
?>