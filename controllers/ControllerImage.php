<?php


class ControllerImage
{
    private  $_imageManager;
    private $_view;


    public function __construct()
    {
        if (isset($url) && count($url)> 1) {
            throw new \Exception("page introuvable",1);

        }else{
            $this->images();
        }
    }

    private function images(){

        $this->_imageManager = new ImageManager();
        $images = $this->_imageManager->getImages();

        $this->_view = new View('Image');
        $this->_view->generate(array('images' => $images));
    }
}