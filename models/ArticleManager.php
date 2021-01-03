<?php



class ArticleManager extends Model 
{
    //récupérer tout les articles dans la bdd

    public function getArticles(){

        return $this->getAll('articles','Article');
    }

    //récupérer les categorie dans la bdd

    public function getCategories(){

        return $this->getAll('categories','Categorie');
    }

    //récupérer les editeurs dans la bdd

    public function getEditors(){

        return $this->getAll('editors','Editor');
    }

    

    public function getArticle($id){
        return $this->getOne('articles', 'Article', $id);
    }

    public function createArticle(){
        return $this->createOne('articles', 'Article');
    }

    public function deleteArticle($id){
        return $this->deleteOne('articles', 'Article',$id);
    }
}