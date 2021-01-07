<?php
namespace App\Models;

use App\Db\Db;


class Model extends Db
{
    //Table de la base de données
    protected $table;

    // Instance de Db

    private $db;

    public function findAll()
    {
        $query = $this->requete('SELECT * FROM '. $this->table);
        return $query->fetchAll();
    }

    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        //On boucle pour éclater le taleau

        foreach($criteres as $champ => $valeur){
            //SELECT * FROM annonces where actif = ? AND signale = 0
            //bindValue(1, valeur)

            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;


        }
        //On transforme le tableau "champs" en une chaine de caratères
        
        $liste_champs = implode (' AND ', $champs);

        //On execute la requête 

        return $this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs,$valeurs)->fetchAll();

    }



    public function find(int $id)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }


    public function create(model $model)
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        //On boucle pour éclater le taleau

        foreach($model as $champ => $valeur){
            //INSERT INTO annonces WHERE (titre, description, date) VALUES (?, ?; ?)
            //bindValue(1, valeur)

            if($valeur !=null && $champ != 'db' && $champ != 'table'){
                $champs[] = "$champ";
                $inter[] = "?";
                $valeurs[] = $valeur;
            }



        }
        //On transforme le tableau "champs" en une chaine de caratères
        
        $liste_champs = implode (', ', $champs);
        $liste_inter = implode(', ', $inter);


        //On execute la requête 

        return $this->requete('INSERT INTO '.$this->table.' ('.$liste_champs.') VALUES('.$liste_inter.')', $valeurs);
    }


    public function update(int $id,model $model)
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        //On boucle pour éclater le taleau

        foreach($model as $champ => $valeur){
            //UPDATE table SET titre = ?, description = ?, date =?) WHERE id = ?
            //bindValue(1, valeur)

            if($valeur !== null && $champ != 'db' && $champ != 'table'){
                $champs[] = "$champ = ?";
                $inter[] = "?";
                $valeurs[] = $valeur;
            }

        }

        $valeurs[] = $id;

        //On transforme le tableau "champs" en une chaine de caratères
        
        $liste_champs = implode (', ', $champs);


        //On execute la requête 

        return $this->requete('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }


    public function delete(int $id)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }




    public function requete(string $sql, array $attributs = null)
    {
        //On récupère l'instance de Db

        $this->db = Db::getInstance();

        //On vérifie si on a des attributs

        if($attributs !== null){
            //Requête préparée 
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            //Requête simple
            return $this->db->query($sql);
        }
    }




    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value){
            //On récupère le nom du setter correspondant à la clé (key)
            //titre -> setTitre

            $setter = 'set'.ucfirst($key);

            //On vérifie si le setter existe 

            if(method_exists($this , $setter)) 

            //On appelle le setter(value)

            $this->$setter($value);
        }
        return $this;

    }
}