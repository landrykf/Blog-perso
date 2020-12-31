<?php

class View
{
    private $_file;

    //titre de la page

    private $_t;

    function __construct($action)
    {
        $this->_file = 'views/view'.$action.'.php';
    }

    //Générer la vue de tout les articles 

    public function generate($data){
        //définir le contenu à envoyer
        $content = $this->generateFile($this->_file, $data);

        //Template

        $view = $this->generateFile('views/Template.php', array('t' => $this->_t, 'content' => $content));

        echo $view;
    }


    // générer la vue d'un article
    public function generatePost($data){
        //définir le contenu à envoyer 
        $content = $this->generateFile($this->_file, $data);

        //Template
        $view = $this->generateFile('views/template.php', array('t' => $this->_t,'content' => $content));
        echo $view;
    }

    //générer la vue du formulaire d'ajout 

    public function generateForm(){
        //définir le contenu à envoyer 
        $content = $this->generateFileSimple($this->_file);

        //Template
        $view = $this->generateFile('views/templateForm.php', array('t' => $this->_t,'content' => $content));
        echo $view;
    }


    private function generateFile($file, $data){
        if (file_exists($file)){
            extract($data);

            //commence la temporisation
            ob_start();

            require $file;

            //arreter la temporisation 
            return ob_get_clean();
        }else{
            throw new \Exception("Fichier ".$file." introuvable", 1);
        }
    
    }


    private function generateFileSimple($file){
        if (file_exists($file)) {
    
    
    
          require $file;
    
        }
        else {
          throw new \Exception("Fichier ".$file." introuvable", 1);
    
        }
      }
}

