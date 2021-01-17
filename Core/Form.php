<?php
namespace App\Core;

class Form 
{
    private $formCode = '';


    /**
     * valide si tous les champs sont remplis
     * @param array $form Tableau issu du formulaire($_POST,$_GET)
     * @param array $champs 
     * @return bool 
     */

    public function create(){
        return $this->formCode;
    }

    public static function validate(array $form, array $champs)
    {
        //On parcourt les champs 
        foreach($champs as $champ){
            //Si le champ est absent ou vide dans le formulaire 
            if(!isset($form[$champ]) || empty($form[$champ])){
                //On sort en retournant false

                return false;
            } 
            return true;
        }
    }

    /**
     * Ajoute les attributs envoyés à la balise 
     * @param array $attributes Tableau associatif
     * @return string chaine de caractère générée
     */

    public function addAttributes(array $attributes):string
    {
        //On initialise une chaine de caractères
        $str = '';

        //On liste les attributs "courts"
        $courts = ['checked', 'disable', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formvalidate'];
        
        //On boucle sur le tableau d'attributs courts
        foreach ($attributes as $attribute => $valeur){

            //Si l'atttribut est dans la liste des attributs courts

        if(in_array($attributes, $courts)&& $valeur == true){
            $str .= " $attribute";
        }else{
            //On ajoute attribute = 'valeur'

            $str .= " $attribute = ''";
            }

        }

        return $str;


        
    }

        public function startForm(string $methode = 'post', string $action = '#', array $attributes = []): self
        {
            //On crée la balise form

            $this->formCode .= "<form action='$action'method='$methode'";

            //On ajoute les attributs éventuels            
            $this->formCode .= $attributes ? $this->addAttributes.'>' : '>';
            
            return $this;
        }

        public function findForm():self
        {
            $this->formCode .='</form>';

            return $this;
        }

        public function endForm():self
        {
            $this->formCode .= '</form>';
            return $this;
        }


        public function addLabelFor(string $for, string $text, array $attributes = []):self
        {
            // On ouvre la balise 

            $this->formCode .= "<label for='$for'";
            //On ajoute les attributs
            $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';

            // On ajoute le texte
            $this->formCode .= ">$text</label>";

            return $this;
        }

        public function addInput(string $type, string $name, array $attributes = []):self
        {
            // On ouvre la balise 
            $this->formCode.="<input type='$type' name='$name'";
            
            //On ajoute les attributs
            $this->formCode .= $attributes ? $this->addAttributes($attributes).'>' : '>';

            return $this;
        }

        public function addTextarea(string $name, string $valeur = '', array $attributes=[]):self
        {
                        // On ouvre la balise 

                        $this->formCode .= "<textarea name='$name'";
                        //On ajoute les attributs
                        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
            
                        // On ajoute le texte
                        $this->formCode .= ">$valeur</textarea>";
                        return $this;
        }


        public function addSelect(string $name , array $options,array $attributes = []):self
        {
            // On crée le select 
            $this->formCode .= "<select name'$name'";

            //On ajoute les attributs
            $this->formCode .= $attributes ? $this->addAttributes($attributes).'>' : '>';

            //On ajoute les options
            foreach($options as $valeur => $text){
                $this->formCode .="<option value='$valeur'>$text</option>";
            }

            //On ferme le select 
            $this->formCode .= '</select>';

            return $this;
        }


        public function addButton(string $text, array $attributes = []):self
        {
            $this->formCode .= '<button ';

            //On ajoute les attributs
            $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
            
            //On ajoute le texte et on ferme la balise
            $this->formCode .=">$text</button>";
            

            return $this;
        }
}
