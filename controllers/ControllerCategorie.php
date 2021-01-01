<?php


class ControllerCategorie
{
    private  $_categorieManager;
    private $_view;


    public function __construct()
    {
        if (isset($url) && count($url)> 1) {
            throw new \Exception("page introuvable",1);

        }else{
            $this->categories();
        }
    }

    private function categories(){

        $this->_categorieManager = new CategorieManager();
        $categories = $this->_categorieManager->getCategories();

        $this->_view = new View('Categorie');
        $this->_view->generate(array('categories' => $categories));
    }
}