<?php


class ControllerImg
{
    private  $_imageManager;
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
            $this->image();
        }
    }

    //Fonction pour afficher un article
    private function image(){
        if(isset($_GET['id'])){
            
            $this->_imageManager = new ImageManager();
            $image = $this->_imageManager->getImage($_GET['id']);
    
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('image' => $image));
        }


    }

    //Fonction pour creer un article

    private function create(){
        if(isset($_GET['create'])){
            
            
    
            $this->_view = new View('CreateImage');
            $this->_view->generateForm();
        }


    }


      //fonction pour insérer un aticle dans la bdd
       
    private function store()
    {
      $this->_imageManager = new ImageManager;
      $image = $this->_imageManager->createImage();
      $images = $this->_imageManager->getImages();
      $this->_view = new View('Image');
      $this->_view->generate(array('Image' => $images));
    }

    //fonction pour supprimer un article

    private function delete()
    {

        $this->_imageManager = new ImageManager();
        $image = $this->_imageManager->deleteImage($_GET['id']);
        
        if(isset($_GET['delete'])){
            $this->view = new View ('DeleteImg');
            // $this->_view->generateFileSimple();
            var_dump($this->view);

        }
    }
}