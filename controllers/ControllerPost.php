<?php


class ControllerPost
{
    private  $_articleManager;
    private $_view;


    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new \Exception("page introuvable",1);

        }elseif(isset($_GET['create'])){
            $this->create();
        }elseif(isset($_GET['status']) && isset($_GET['status'])=="new"){
            $this->store();
        }
        
        else{
            $this->article();
        }
    }

    //Fonction pour afficher un article
    private function article(){
        if(isset($_GET['id'])){
            
            $this->_articleManager = new ArticleManager();
            $article = $this->_articleManager->getArticles($_GET['id']);
    
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('article' => $article));
        }


    }

    //Fonction pour creer un article

    private function create(){
        if(isset($_GET['create'])){
            
            
    
            $this->_view = new View('CreatePost');
            $this->_view->generateForm();
        }


    }


      //fonction pour insérer un aticle
    //en bdd
    private function store()
    {
      $this->_articleManager = new ArticleManager;
      $article = $this->_articleManager->createArticle();
      $articles = $this->_articleManager->getArticles();
      $this->_view = new View('Accueil');
      $this->_view->generate(array('articles' => $articles));
    }
}