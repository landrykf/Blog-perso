<?php



class CategorieManager extends Model 
{
    //récupérer tout les articles dans la bdd

    public function getCategories(){

        return $this->getAll('categories','Categorie');
    }

    public function getCategorie($id){
        return $this->getOne('categories','Categorie', $id);
    }

    public function createCategorie(){
        return $this->createOneCategorie('categories','Categorie');
    }

    public function deleteCategorie($id){
        return $this->deleteOne('categories','Categorie',$id);
    }
}