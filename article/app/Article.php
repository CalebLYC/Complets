<?php
    namespace App;

    /**
     * manipuler et uploader un article
     */
    class Article{
        private $title;
        private $category;
        private $content;
        private $date;
        private $database;

        public function __construct($article, $database)
        {
            if(!empty($article['title']) && !empty($article['category']) && !empty($article['content'])){
                $this->title = $article['title'];
                $this->category = $article['category'];
                $this->content = $article['content'];
    
                $this->database = $database;
    
                $this->date = date('Y-M-D : H-i-m'); 
                echo $this->date; 
            }else{
                return 'Champs vides';
            }
        }

        /**
         * @param int $image_id identifiant id de l'image illustrant l'article
         * @return string mesage de succès
         */
        public function insert($image_id){
            (new Database($this->database))->insert("INSERT INTO articles(title, category, content, date, image_id) VALUES(?,?,?,?,?)", array($this->title, $this->category, $this->content, $this->date, $image_id));
            return 'Article enregistré avec succès';
        }
    }
?>