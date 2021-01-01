<?php
abstract class Model
{

    private static $_bdd;

    //connexion à la bdd

    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=monblogperso;charset=utf8', 'root', '');

        //on utilise les constantes de PDO pour gérer les erreurs
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    //function de connexion par défaut de la bdd

    protected function getBdd()
    {
        if (self::$_bdd == null) {
            self::setBdd();
            return self::$_bdd;
        }
    }

    //creation de la methode de recupération de la liste d'elements 

    protected function getAll($table, $obj)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM ' . $table . ' ORDER BY id desc');
        $req->execute();

        //on crée la variable data qui
        //va cobntenir les données
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            // var contiendra les données sous forme d'objets
            $var[] = new $obj($data);
        }
        // var_dump($var);
        return $var;
        $req->closeCursor();
    }


    protected function getOne($table, $obj, $id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM " . $table . " WHERE id = ?");
        $req->execute(array($id));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }

        return $var;
        $req->closeCursor();
    }



    protected function createOne($table, $obj)
    {
        $this->getBdd();
        $req = self::$_bdd->prepare("INSERT INTO " . $table . " (title, content, date) VALUES (?, ?, ?)");
        $req->execute(array($_POST['title'], $_POST['content'], date("d.m.Y")));

        $req->closeCursor();

        var_dump($req);
    }

    protected function createOneCategorie($table, $obj)
    {
        $this->getBdd();
        $name = $_POST['name'];
        $req = self::$_bdd->prepare("INSERT INTO " . $table . " (name) VALUES ('$name')");

        $req->execute();

        $req->closeCursor();

        var_dump($req);
    }


    protected function deleteOne($table, $obj, $id)
    {
        $this->getBdd();
        $req = self::$_bdd->prepare("DELETE FROM " . $table . " WHERE id = " . $id);
        $req->execute(array($id));

        var_dump($table);
        var_dump($req);
        var_dump($id);

        $req->closeCursor();
    }
}
