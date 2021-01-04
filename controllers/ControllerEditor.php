<?php


class ControllerEditor
{
    private  $_editorManager;
    private $_view;


    public function __construct()
    {
        if (isset($url) && count($url)> 1) {
            throw new \Exception("page introuvable",1);

        }else{

            $this->editor();
        }
    }

    private function editor(){


        $this->_editorManager = new EditorManager();
        $editors = $this->_editorManager->getEditors();

        $this->_view = new View('Editor');
        $this->_view->generate(array('editors' => $editors));
    }


    public function index()
    {
        var_dump($_SESSION);
        //On vérifie si on est admin 
        if($this->isAdmin()){

        }
    }

    public function isAdmin()
    {
        //On vérifie si on est connecté et si "ROLE ADMIN" est dans nos roles

        if (isset($_SESSION['user']) && in_array('ROLE_ADMIN', $_SESSION['user']['role'])){

        } 
    }

}