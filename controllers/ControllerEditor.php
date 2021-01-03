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
}