<?php
require_once 'views/view.php';

class Router
{
    private $ctrl;
    private $view;

    public function routerReq(){
        try{
            //charge automatiquement les classes 

            spl_autoload_register(function($class){
            require_once('models/'.$class.'.php');
            });

            //On crée une variable $url
            $url = '';
            //On va déterminer le controller en fonction de $url

            if (isset($_GET['url'])) {
                //On décompose l'url e on lui applique un filtre

                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                
                $controller = ucfirst(strtolower($url[0]));

                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if (file_exists($controllerFile)){

                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);


                }else{
                    throw new \Exception("page introuvable", 1);
                }
            }
            else {
                require_once ('controllers/ControllerAccueil.php');
                $this->ctrl = new ControllerAccueil($url);
            }

        } catch (\Exception $e) {
            $errorMsg = $e->getMessage();
            var_dump($errorMsg);
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}