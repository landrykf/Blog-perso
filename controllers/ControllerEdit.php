<?php


class ControllerEdit
{
    private  $_editorManager;
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
            $this->editor();
        }
    }

    //Fonction pour afficher un article
    private function editor(){
        if(isset($_GET['id'])){
            
            $this->_editorManager = new EditorManager();
            $editor = $this->_editorManager->getEditor($_GET['id']);
    
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('editor' => $editor));
        }


    }

    //Fonction pour creer un article

    private function create(){
        if(isset($_GET['create'])){
            
            
    
            $this->_view = new View('CreateEditor');
            $this->_view->generateForm();
        }


    }


      //fonction pour insérer un editeur dans la bdd
       
    private function store()
    {
      $this->_editorManager = new EditorManager;
      $editor = $this->_editorManager->createEditor();
      $editors = $this->_editorManager->getEditors();
      $this->_view = new View('Editor');
      $this->_view->generate(array('editors' => $editors));
      var_dump($editors);
    }



    //fonction pour supprimer un article

    private function delete()
    {

        $this->_editorManager = new EditorManager();
        $editor = $this->_editorManager->deleteEditor($_GET['id']);
        
        if(isset($_GET['delete'])){
            $this->view = new View ('DeletePost');
            // $this->_view->generateFileSimple();
            var_dump($this->view);

        }
    }
}