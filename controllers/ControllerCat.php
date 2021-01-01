<?php


class ControllerCat
{
    private  $_categorieManager;
    private $_view;


    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new \Exception("page introuvable",1);

        }elseif(isset($_GET['create'])){
            $this->create();
        }elseif(isset($_GET['status']) && isset($_GET['status'])=="new"){
            $this->store();
        }elseif(isset($_GET['delete'])){
            $this->delete();
        }
        
        else{
            $this->categorie();
        }
    }

    //Fonction pour afficher un article
    private function categorie(){
        if(isset($_GET['id'])){
            
            $this->_categorieManager = new CategorieManager();
            $categorie = $this->_categorieManager->getCategorie($_GET['id']);
    
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('categorie' => $categorie));
        }


    }

    //Fonction pour creer un article

    private function create(){
        if(isset($_GET['create'])){
            
            
    
            $this->_view = new View('CreateCategorie');
            $this->_view->generateForm();
        }


    }


      //fonction pour insérer un aticle dans la bdd
       
    private function store()
    {
      $this->_categorieManager = new CategorieManager;
      $categorie = $this->_categorieManager->createCategorie();
      $categories = $this->_categorieManager->getCategories();
      $this->_view = new View('Categorie');
      $this->_view->generate(array('categories' => $categories));
    }

    //fonction pour supprimer un article

    private function delete()
    {

        $this->_categorieManager = new CategorieManager();
        $categorie = $this->_categorieManager->deleteCategorie($_GET['id']);
        
        if(isset($_GET['delete'])){
            $this->view = new View ('DeletePost');
            // $this->_view->generateFileSimple();
            var_dump($this->view);

        }
    }
}